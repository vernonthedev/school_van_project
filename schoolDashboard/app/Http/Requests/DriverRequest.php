<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'drivingPermit' => 'string|max:255|unique:drivers,drivingPermit',
            'phoneNumber' => 'string|max:20',
            'gender' => 'string|max:10',
            'address' => 'string|max:255',
        ];
    }
}
