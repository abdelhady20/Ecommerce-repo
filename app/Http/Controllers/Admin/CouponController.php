<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequests\StoreOrUpdateCouponRequest;
use App\Models\Coupon;
use App\Repositories\CouponRepositoryInterface;

class CouponController extends Controller
{
    public function __construct(protected CouponRepositoryInterface $couponRepo) {}

    public function index()
    {
        $coupons = $this->couponRepo->getAll();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(StoreOrUpdateCouponRequest $request)
    {
        $this->couponRepo->create($request->validated());
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon created successfully.');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(StoreOrUpdateCouponRequest $request, Coupon $coupon)
    {
        $this->couponRepo->update($coupon, $request->validated());
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon updated successfully.');
    }

    public function destroy(Coupon $coupon)
    {
        $this->couponRepo->delete($coupon);
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon deleted.');
    }
}
