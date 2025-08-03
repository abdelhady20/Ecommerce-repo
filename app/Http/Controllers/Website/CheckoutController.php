<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderPlacedMail;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Repositories\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    protected CartRepositoryInterface $cartRepo;

    public function __construct(CartRepositoryInterface $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    public function index()
    {
        $cart = $this->cartRepo->all();

        $cartItems = $cart['items'] ?? [];
        $cartSummary = $cart['summary'] ?? [
            'subtotal' => 0,
            'tax' => 0,
            'discount' => 0,
            'total' => 0,
        ];

        $addresses = Address::where('user_id', session('user_id'))->get();
        $defaultAddress = $addresses->where('is_default', true)->first();

        return view('website.checkout', compact('cartItems', 'cartSummary', 'addresses', 'defaultAddress'));

    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();

        $cart = $this->cartRepo->all();
        $cartItems = $cart['items'] ?? [];
        $cartSummary = $cart['summary'] ?? [
            'subtotal' => 0,
            'tax' => 0,
            'discount' => 0,
            'total' => 0,
        ];

        if ($data['payment_method'] === 'cod') {
            DB::beginTransaction();

            try {

                if ($request->filled('use_default_address') && $request->use_default_address == 1) {
                    $address = Address::where('user_id', session('user_id'))
                        ->where('is_default', true)
                        ->firstOrFail();
                } else {

                    Address::where('user_id', session('user_id'))->update(['is_default' => false]);
                    $address = Address::create([
                        'user_id'    => session('user_id'),
                        'country'    => $data['country'],
                        'city'       => $data['city'],
                        'area'       => null,
                        'street'     => $data['address'],
                        'building'   => null,
                        'phone'      => $data['phone'],
                        'is_default' => true,
                    ]);
                }


                $order = Order::create([
                    'user_id'        => session('user_id'),
                    'address_id'     => $address->id,
                    'status'         => 'pending',
                    'total'          => $cartSummary['total'],
                    'payment_method' => 'cod',
                    'payment_status' => 'unpaid',
                ]);

                foreach ($cartItems as $item) {
                    $product =Product::find($item['product_id']);

                    if (!$product || $product->stock < $item['quantity']) {
                        DB::rollBack();
                        return redirect()->back()
                            ->withErrors(['checkout' => "Product '{$item['name']}' is out of stock."]);
                    }

                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity'   => $item['quantity'],
                        'price'      => $item['unit_price'],
                    ]);


                    $product->decrement('stock', $item['quantity']);
                }

//                Mail::to($order->customer_email)
//                    ->queue(new OrderPlacedMail($order));
                Mail::to('rewantarekhady@gmail.com')
                    ->queue(new OrderPlacedMail($order));


                DB::commit();
                $this->cartRepo->clear();

                return redirect()->route('shop.thankyou')->with('success', 'Order placed successfully.');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->withErrors(['checkout' => 'Error: ' . $e->getMessage()]);
            }
        }


        session()->put('stripe_checkout', [
            'user_id' => session('user_id'),
            'total'   => $cartSummary['total'],
            'items'   => $cartItems,
            'data'    => $data,
        ]);

        return redirect()->route('shop.stripe');
    }



}
