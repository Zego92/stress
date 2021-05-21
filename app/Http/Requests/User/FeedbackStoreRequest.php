<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fio' => 'required|string|max:50',
            'email' => 'required|string|email|max:100',
            'phone' => 'required|string|max:100',
            'title' => 'required|string|max:50',
            'description' => 'required',
        ];
    }
}
