<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateChurchFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'address' => 'required|string|max:255|min:3',
            'address_number' => 'required|max:10|min:1',
        ];
    }
}
