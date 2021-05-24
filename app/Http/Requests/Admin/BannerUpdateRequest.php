<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'sometimes|unique:banners,language_id, ' . $this->banner->id,
            'title' => 'string|max:100',
            'image' => 'mimes:png,jpeg,jpg'
        ];
    }
}
