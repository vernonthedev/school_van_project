<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'van_id' => 'integer',
            'van_student_id' => 'integer',
            'sourceRoute' => 'string|max:255',
            'destinationRoute' => 'string|max:255',
            'startTime' => 'string',
            'endTime' => 'string',
            'dateOfTrip' => 'date',
            'tripStatus' => 'in:scheduled,ongoing,completed,cancelled',
        ];
    }
}
