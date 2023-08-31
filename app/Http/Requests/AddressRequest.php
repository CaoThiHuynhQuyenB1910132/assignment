<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'house_number' => ['required'],
            'phone' => ['required', 'numeric', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'user_id' => ['required'],
            'district_id' => ['required'],
            'province_id' => ['required'],
            'ward_id' => ['required'],
        ];
    }
}
