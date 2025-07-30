<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class WebsiteCouponController extends Controller
{
    public function apply(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
        ]);

        $code = $request->coupon_code;

        $coupon = Coupon::where('code', $code)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('expires_at')
                    ->orWhere('expires_at', '>=', now());
            })
            ->first();

        if (!$coupon) {
            return back()->with('error', 'Invalid or expired coupon.');
        }

        $cart = session('cart');
        $subtotal = $cart['summary']['subtotal'] ?? 0;

        if ($coupon->min_order_amount && $subtotal < $coupon->min_order_amount) {
            return back()->with('error', 'This coupon requires minimum order of $' . $coupon->min_order_amount);
        }


        session()->put('cart.coupon', [
            'code' => $coupon->code,
            'discount_type' => $coupon->discount_type,
            'discount_value' => $coupon->discount_value,
        ]);
        $cartService = new \App\Services\SessionCartService();
        $cart = $cartService->get();
        $cartService->recalculateSummary($cart);
        $cartService->save($cart);

        return back()->with('success', 'Coupon applied successfully.');
    }

    public function remove()
    {
        session()->forget('cart.coupon');
        return back()->with('success', 'Coupon removed.');
    }



}
