<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'notes' => ['nullable','max:1024'],
            'user_id' => ['required'],
            'staff' => ['required'],
            'user_email' => ['nullable', 'email'],
            'tracking_number' => ['required'],
            'status' => ['required'],
            'payment'  => ['nullable'],
            'payment_status' => ['nullable'],
            'shipping_address' => ['required'],
            'total' => ['required'],
        ];
    }
}
