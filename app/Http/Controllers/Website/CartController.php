<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequests\StoreCartRequest;
use App\Http\Requests\CartRequests\UpdateCartRequest;
use App\Repositories\CartRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
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
        $cartSummary = $cart['summary'] ?? [];

        return view('website.cart.index', compact('cartItems', 'cartSummary'));
    }

    public function store(StoreCartRequest $request): RedirectResponse
    {
        $product = Product::findOrFail($request->input('product_id'));

        if ($product->stock < $request->input('quantity', 1)) {
            return redirect()->back()->with('error', 'Sorry, this product is out of stock.');
        }

        if ($this->cartRepo->has($product->id)) {
            return redirect()->route('cart.index')->with('error', 'This product is already in your cart.');
        }

        $this->cartRepo->add(
            $request->input('product_id'),
            $request->input('quantity', 1)
        );

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(UpdateCartRequest $request, $itemKey): RedirectResponse
    {

        $this->cartRepo->updateQuantity(
            $itemKey,
            $request->input('quantity')
        );

        return redirect()->route('cart.index')->with('success', 'Cart updated.');

    }

    public function destroy(string $itemKey): RedirectResponse
    {
        $this->cartRepo->remove($itemKey);
        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function clear(): RedirectResponse
    {
        $this->cartRepo->clear();
        return redirect()->back()->with('success', 'Cart cleared.');
    }
}
