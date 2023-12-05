<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'product_id' => ['nullable'],
            'content' => ['nullable'],
            'rating' => ['required'],
        ];
    }
}
