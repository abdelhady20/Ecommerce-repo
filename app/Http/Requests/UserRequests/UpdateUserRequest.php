<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $userId = $this->route('user') ?? $this->route('id');

        return [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email,' . $userId],
            'phone'    => ['required', 'string', 'unique:users,phone,' . $userId],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'role'     => ['required', 'in:admin,customer'],
            'is_active'=> ['nullable', 'boolean'],
        ];
    }
}
