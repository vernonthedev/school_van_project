<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    //allowed columns
    protected $fillable = ['sourceRoute','destinationRoute','startTime','endTime','dateOfTrip','tripStatus'];

    /**
     * on this trip, we assign a student to the van using our created pivot table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<VanStudent, Trip>
     */
    public function vanStudent()
    {
        return $this->belongsTo(VanStudent::class);
    }

    /**
     * assigning the van that is going to make this trip
     */
    public function van()
    {
        return $this->throughVanStudent()->van();
    }

    /**
     * a student is assigned belongs to this trip through the student van pivot table relationship
     */
    public function student()
    {
        return $this->throughVanStudent()->student();
    }

    /**
     * this is the relationship that is acting as the pivot relationship for our pivot table
     */
    protected function throughVanStudent()
    {
        return $this->hasOneDeep(
            [Van::class, Student::class],
            [Trip::class, VanStudent::class],
            [
                'id',          // Trip table
                'id',          // VanStudent table
                'id'          // Van table
            ],
            [
                'van_student_id',  // Trip table
                'van_id',         // VanStudent table
                'id'             // Van table
            ]
        );
    }
}
