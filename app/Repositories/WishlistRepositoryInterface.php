<?php

namespace App\Repositories;

interface WishlistRepositoryInterface
{
    public function all($userId);
    public function add($userId, $productId);
    public function remove($userId, $productId);
    public function has($userId, $productSlug): bool;

}
