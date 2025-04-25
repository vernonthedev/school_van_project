<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'drivingPermit' => $this->drivingPermit,
            'phoneNumber' => $this->phoneNumber,
            'gender' => $this->gender,
            'address' => $this->address,
        ];
    }
}
