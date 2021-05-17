<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackPageStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'required|unique:feedback_pages',
            'headerTitle' => 'required|string|max:100',
            'fioTitle' => 'required|string|max:100',
            'fioPlaceholderTitle' => 'required|string|max:100',
            'emailTitle' => 'required|string|max:100',
            'emailPlaceholderTitle' => 'required|string|max:100',
            'phoneTitle' => 'required|string|max:100',
            'phonePlaceholderTitle' => 'required|string|max:100',
            'messageTitle' => 'required|string|max:100',
            'messagePlaceholderTitle' => 'required|string|max:100',
            'messageDescriptionTitle' => 'required|string|max:100',
            'messageDescriptionPlaceholderTitle' => 'required|string|max:100',
        ];
    }
}
