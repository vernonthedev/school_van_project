<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class VanStudent extends Pivot
{
    protected $table = 'van_student';

    /**
     * Many to many relationship linking the students to the vans
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Trip, VanStudent>
     */
    public function trips()
    {
        return $this->hasMany(Trip::class, 'van_student_id');
    }
}
