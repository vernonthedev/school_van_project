<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'parent_to_student_id' => $this->parent_to_student_id,
            'name' => $this->name,
            'class' => $this->class,
            'gender' => $this->gender,
        ];
    }
}
