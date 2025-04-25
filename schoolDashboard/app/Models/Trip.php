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
     * Relationship for the van that made the trip
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Van, Trip>
     */
    public function van()
    {
        return $this->belongsTo(Van::class);
    }

    /**
     * The student who made a specific trip
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Student, Trip>
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
