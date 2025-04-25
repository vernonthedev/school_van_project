<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentToStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'integer',
            'name' => 'string|max:100',
            'longitude' => 'string|max:50',
            'latitude' => 'string|max:50',
            'phoneNumber' => 'string|max:20',
            'gender' => 'string|max:10',
            'occupation' => 'string|max:100',
            'address' => 'string|max:255',
        ];
    }
}
