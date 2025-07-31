<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'city'       => 'required|string|max:255',
            'postal_code'=> 'required|string|max:20',
            'address'    => 'required|string',
            'country' => 'required|string|max:255',
            'notes'      => 'nullable|string',
            'payment_method' => 'required|in:stripe,cod',

        ];
    }
}
