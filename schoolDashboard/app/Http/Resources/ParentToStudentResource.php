<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParentToStudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'userId' => $this->user_id,
            'name' => $this->name,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'phoneNumber' => $this->phoneNumber,
            'gender' => $this->gender,
            'occupation' => $this->occupation,
            'address' => $this->address,
        ];
    }
}
