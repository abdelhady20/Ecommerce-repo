<?php

namespace App\Repositories;

use App\Models\Coupon;

interface CouponRepositoryInterface
{
    public function getAll();
    public function findById($id): Coupon;
    public function create(array $data): Coupon;
    public function update(Coupon $coupon, array $data): Coupon;
    public function delete(Coupon $coupon): void;
}
