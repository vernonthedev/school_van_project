<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'driverId' => $this->driver_id,
            'operatorId' => $this->operator_id,
            'name' => $this->name,
            'numberPlate' => $this->numberPlate,
            'vanCapacity' => $this->vanCapacity,
        ];
    }
}
