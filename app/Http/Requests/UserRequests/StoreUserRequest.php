<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'phone'    => ['required', 'string', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role'     => ['required', 'in:admin,customer'],
            'is_active'=> ['nullable', 'boolean'],
        ];
    }
}
