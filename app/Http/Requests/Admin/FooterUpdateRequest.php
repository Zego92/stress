<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FooterUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contactTitle' => 'string|max:50',
            'phone' => 'string|max:50',
            'email' => 'string|max:50|email',
        ];
    }
}
