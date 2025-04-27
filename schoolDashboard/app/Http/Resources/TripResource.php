<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'vanId' => $this->van_id,
            'vanStudentId' => $this->van_student_id,
            'sourceRoute' => $this->sourceRoute,
            'destinationRoute' => $this->destinationRoute,
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,
            'dateOfTrip' => $this->dateOfTrip,
            'tripStatus' => $this->tripStatus,
        ];
    }
}
