<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MainHeaderUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'sometimes|string|max:50',
            'brandLogoImage' => 'sometimes|mimes:png,jpeg,jpg',
            'homeTitle' => 'sometimes|string|max:50',
            'ourProjectsTitle' => 'sometimes|string|max:50',
            'contactTitle' => 'sometimes|string|max:50',
            'feedbackTitle' => 'sometimes|string|max:50',
        ];
    }
}
