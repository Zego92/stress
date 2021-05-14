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
            'firstPhone' => 'required|string',
            'secondPhone' => 'required|string',
            'thirdPhone' => 'required|string',
            'address' => 'required|string',
            'startTimeWork' => 'required|string',
            'endTimeWork' => 'required|string',
            'email' => 'required|string',
            'gMapLink' => 'required|string',
        ];
    }
}
