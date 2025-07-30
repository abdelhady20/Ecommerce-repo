<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Coupon;
use App\Services\SessionCartService;

class CartRepository implements CartRepositoryInterface
{
    protected SessionCartService $sessionCart;

    public function __construct(SessionCartService $sessionCart)
    {
        $this->sessionCart = $sessionCart;
    }

    public function add(int $productId, int $quantity = 1)
    {
        $product = Product::findOrFail($productId);
        return $this->sessionCart->add($product, $quantity);
    }

    public function all()
    {
        return $this->sessionCart->get();
    }

    public function updateQuantity(string $itemKey, int $quantity)
    {
        return $this->sessionCart->updateQuantity($itemKey, $quantity);

    }

    public function remove(string $itemKey)
    {
        return $this->sessionCart->remove($itemKey);
    }


    public function clear()
    {
        return $this->sessionCart->clear();
    }

    public function applyCoupon(string $code): bool
    {
        $coupon = Coupon::where('code', $code)->first();

        if (! $coupon) {
            return false;
        }

        $this->sessionCart->applyCoupon($coupon);
        return true;
    }
    public function has(int $productId, ?int $variantId = null): bool
    {
        $product = Product::findOrFail($productId);
        $variant = $variantId ? \App\Models\ProductVariant::findOrFail($variantId) : null;
        return $this->sessionCart->has($product, $variant);
    }

}
