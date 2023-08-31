<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'gender' => ['required', 'in:woman,man'],
            'status' => ['required', 'in:0,1'],
            'phone' => ['required', 'numeric', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:32'],
            'is_admin' => ['required', 'in:0,1'],
        ];
    }
}
