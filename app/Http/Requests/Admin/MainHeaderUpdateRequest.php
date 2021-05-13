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
            'language_id' => 'nullable|sometimes|string|max:50',
            'brandLogoImage' => 'nullable|sometimes|',
            'homeTitle' => 'nullable|sometimes|string|max:50',
            'ourProjectsTitle' => 'nullable|sometimes|string|max:50',
            'contactTitle' => 'nullable|sometimes|string|max:50',
            'feedbackTitle' => 'nullable|sometimes|string|max:50',
        ];
    }
}
