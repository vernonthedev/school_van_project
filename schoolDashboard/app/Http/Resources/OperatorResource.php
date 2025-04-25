<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OperatorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'userId' => $this->user_id,
            'name' => $this->name,
            'phoneNumber' => $this->phoneNumber,
            'address' => $this->address,
            'gender' => $this->gender,
            'title' => $this->title,
        ];
    }
}
