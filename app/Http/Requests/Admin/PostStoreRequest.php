<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
        ];
    }
}
