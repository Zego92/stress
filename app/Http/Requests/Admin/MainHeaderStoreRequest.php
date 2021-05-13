<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MainHeaderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'required|string|max:50|unique:main_headers',
            'brandLogoImage' => 'required',
            'homeTitle' => 'required|string|max:50',
            'ourProjectsTitle' => 'required|string|max:50',
            'contactTitle' => 'required|string|max:50',
            'feedbackTitle' => 'required|string|max:50',
        ];
    }
}
