<?php

namespace App\Http\Requests\BrandRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
        $id = $this->route('brand')->id ?? null;
        return [
            'name' => 'required|string|max:255|unique:brands,name,' . $id,
        ];
    }

}
