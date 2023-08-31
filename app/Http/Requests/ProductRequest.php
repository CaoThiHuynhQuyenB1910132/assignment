<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'status' => ['required', 'in:0,1'],
            'featured' => ['required', 'in:0,1'],
            'original_price' => ['required', 'numeric', 'min:0'],
            'selling_price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'in:0,1'],
            'category_id' => ['required'],
        ];
    }
}
