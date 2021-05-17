<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FooterStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'required|unique:footers',
            'contactTitle' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'email' => 'required|string|max:50|email',
        ];
    }
}
