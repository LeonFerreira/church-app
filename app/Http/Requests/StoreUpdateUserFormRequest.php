<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
            [
                'name' => 'required|string|max:255|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'state_id' => 'required',
                'gender' => 'required',
                'marital_status' => 'required'
            ];
    }
}
