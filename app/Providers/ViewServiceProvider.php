<?php

namespace App\Providers;

use App\Services\SessionCartService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Wishlist;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $cart = session('cart', ['items' => []]);
            $cartCount = count($cart['items']);

            $wishlist = session('wishlist', []);
            $wishlistCount = count($wishlist);

            $view->with('cartCount', $cartCount)
                ->with('wishlistCount', $wishlistCount);
        });
    }
}
