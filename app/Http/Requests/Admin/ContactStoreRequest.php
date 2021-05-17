<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'required|unique:contacts',
            'firstPhone' => 'required|string|max:100',
            'secondPhone' => 'required|string|max:100',
            'thirdPhone' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'startTimeWork' => 'required|string|max:100',
            'endTimeWork' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'gMapLink' => 'required|string|max:100',
        ];
    }
}
