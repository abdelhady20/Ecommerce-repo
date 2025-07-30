<?php

namespace App\Repositories;

class WishlistRepository implements WishlistRepositoryInterface
{
    protected $sessionKey = 'wishlist';

    public function all($userId)
    {

        return session()->get($this->sessionKey, []);
    }

    public function add($userId, $productSlug)
    {
        $wishlist = session()->get($this->sessionKey, []);


        if (!in_array($productSlug, $wishlist)) {
            $wishlist[] = $productSlug;
            session()->put($this->sessionKey, $wishlist);
        }

        return $wishlist;
    }

    public function remove($userId, $productSlug)
    {
        $wishlist = session()->get($this->sessionKey, []);

        if (($key = array_search($productSlug, $wishlist)) !== false) {
            unset($wishlist[$key]);
            $wishlist = array_values($wishlist);
            session()->put($this->sessionKey, $wishlist);
        }

        return $wishlist;
    }
    public function has($userId, $productSlug): bool
    {
        $wishlist = session()->get($this->sessionKey, []);
        return in_array($productSlug, $wishlist);
    }

}
