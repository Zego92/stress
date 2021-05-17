<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackPageUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'unique:feedback_pages',
            'headerTitle' => 'string|max:100',
            'fioTitle' => 'string|max:100',
            'fioPlaceholderTitle' => 'string|max:100',
            'emailTitle' => 'string|max:100',
            'emailPlaceholderTitle' => 'string|max:100',
            'phoneTitle' => 'string|max:100',
            'phonePlaceholderTitle' => 'string|max:100',
            'messageTitle' => 'string|max:100',
            'messagePlaceholderTitle' => 'string|max:100',
            'messageDescriptionTitle' => 'string|max:100',
            'messageDescriptionPlaceholderTitle' => 'string|max:100',
        ];
    }
}
