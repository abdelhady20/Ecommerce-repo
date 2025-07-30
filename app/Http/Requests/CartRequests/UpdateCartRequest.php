<?php

namespace App\Http\Requests\CartRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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


    public function rules()
    {
        return [
            'item_key' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ];
    }

}
