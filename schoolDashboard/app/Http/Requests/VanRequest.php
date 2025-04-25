<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'driver_id' => 'integer',
            'operator_id' => 'integer',
            'name' => 'string|max:20',
            'numberPlate' => 'string|max:10',
            'vanCapacity' => 'integer',
        ];
    }
}
