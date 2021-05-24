<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'unique:contacts,language_id,' . $this->contact->id,
            'firstPhone' => 'string|max:100',
            'secondPhone' => 'string|max:100',
            'thirdPhone' => 'string|max:100',
            'address' => 'string|max:100',
            'startTimeWork' => 'string|max:100',
            'endTimeWork' => 'string|max:100',
            'email' => 'string|max:100',
            'gMapLink' => 'string',
        ];
    }
}
