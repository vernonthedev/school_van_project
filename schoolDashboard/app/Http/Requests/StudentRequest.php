<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'parent_to_student_id' => 'integer',
            'name' => 'string|max:100',
            'class' => 'string|max:50',
            'gender' => 'string|max:10',
        ];
    }
}
