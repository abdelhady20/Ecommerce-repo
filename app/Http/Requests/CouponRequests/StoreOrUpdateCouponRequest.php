<?php

namespace App\Http\Requests\CouponRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrUpdateCouponRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {


        return [
            'code' =>
                'required',
                'string',
                Rule::unique('coupons', 'code')->ignore($this->coupon?->id),
            'discount_type'   => 'required|in:fixed,percent',
            'discount_value'  => 'required|numeric|min:0.01',
            'min_order_amount'=> 'nullable|numeric|min:0',
            'expires_at'      => 'nullable|date|after_or_equal:today',
            'is_active' => 'nullable|boolean',

        ];
    }
}
