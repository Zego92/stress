<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'required',
            'name' => 'required|string|max:50',
            'image' => 'required|mimes:png,jpeg,jpg',
        ];
    }
}
