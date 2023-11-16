<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => ['required', 'image'],
            'product_id' => ['required'],
        ];
    }
}
