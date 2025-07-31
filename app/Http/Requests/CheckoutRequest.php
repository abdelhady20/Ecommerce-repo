<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'payment_method' => 'required|in:stripe,cod',
        ];

        if (!$this->has('use_default_address')) {
            $rules = array_merge($rules, [
                'first_name'   => 'required|string|max:255',
                'last_name'    => 'required|string|max:255',
                'email'        => 'required|email',
                'phone'        => 'required|string|max:20',
                'city'         => 'required|string|max:255',
                'postal_code'  => 'required|string|max:20',
                'address'      => 'required|string',
                'country'      => 'required|string|max:255',
                'notes'        => 'nullable|string',
            ]);
        }

        return $rules;
    }

}
