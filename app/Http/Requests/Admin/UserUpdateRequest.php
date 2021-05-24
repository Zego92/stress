<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'sometimes|unique:users,email,' . $this->user->id,
            'phone' => 'sometimes|unique:users,phone,' . $this->user->id,
        ];
    }
}
