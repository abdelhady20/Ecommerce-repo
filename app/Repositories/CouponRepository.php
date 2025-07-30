<?php

namespace App\Repositories;

use App\Models\Coupon;

class CouponRepository implements CouponRepositoryInterface
{
    public function getAll()
    {
        return Coupon::latest()->get();
    }

    public function findById($id): Coupon
    {
        return Coupon::findOrFail($id);
    }

    public function create(array $data): Coupon
    {
        return Coupon::create($data);
    }

    public function update(Coupon $coupon, array $data): Coupon
    {
        $coupon->update($data);
        return $coupon;
    }

    public function delete(Coupon $coupon): void
    {
        $coupon->delete();
    }
}
