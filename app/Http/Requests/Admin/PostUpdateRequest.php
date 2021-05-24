<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'mimes:png,jpeg,jpg',
            'title' => 'string|max:100',
            'description' => 'string',
        ];
    }
}
