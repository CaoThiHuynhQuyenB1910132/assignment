<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'product_id' => ['required'],
            'quantity' => ['required']
        ];
    }
}
