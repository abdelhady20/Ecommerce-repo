<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    public function index()
    {
        if (!session()->has('stripe_checkout')) {
            return redirect()->route('shop.checkout')
                ->withErrors(['stripe' => 'No checkout data found.']);
        }

        $checkout = session('stripe_checkout');
        $amount = $checkout['total'];

        return view('website.payment.stripe', compact('amount'));
    }

    public function charge(Request $request)
    {
        if (!session()->has('stripe_checkout')) {
            return redirect()->route('shop.checkout')
                ->withErrors(['stripe' => 'No checkout data found.']);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        DB::beginTransaction();

        try {
            $checkout = session('stripe_checkout');
            $total = $checkout['total'];


            $charge = Charge::create([
                'amount' => intval($total * 100),
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Website Order Payment',
            ]);


            $order = Order::create([
                'user_id'        => $checkout['user_id'],
                'status'         => 'processing',
                'total'          => $total,
                'payment_method' => 'stripe',
                'payment_status' => 'paid',
            ]);

            foreach ($checkout['items'] as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity'   => $item['quantity'],
                    'price'      => $item['unit_price'],
                ]);
            }

            DB::commit();

            app(\App\Services\SessionCartService::class)->clear();
            session()->forget('stripe_checkout');

            return redirect()->route('shop.thankyou')->with('success', 'Payment successful.');

        } catch (\Stripe\Exception\CardException $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['stripe' => 'Payment failed: ' . $e->getError()->message]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Stripe Payment Error: ' . $e->getMessage());

            return redirect()->route('shop.checkout')
                ->withErrors(['stripe' => 'Payment failed. Please try again later.']);
        }
    }

}
