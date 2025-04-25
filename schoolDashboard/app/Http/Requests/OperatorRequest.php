<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'name' => 'string|max:255',
            'phoneNumber' => 'string|max:255',
            'address' => 'string|max:255',
            'gender' => 'string|max:255',
            'title' => 'string|max:255',
        ];
    }
}
