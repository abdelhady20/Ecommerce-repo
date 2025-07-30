<?php

namespace App\Repositories;

interface CartRepositoryInterface
{
    public function add(int $productId, int $quantity = 1);
    public function all();
    public function updateQuantity(string $itemKey, int $quantity);
    public function remove(string $itemKey);
    public function clear();
    public function applyCoupon(string $code): bool;
    public function has(int $productId, ?int $variantId = null): bool;
}
