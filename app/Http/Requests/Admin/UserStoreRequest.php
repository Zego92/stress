<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fio' => 'required',
            'username' => 'unique:users',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users',
            'password' => 'required',
        ];
    }
}
