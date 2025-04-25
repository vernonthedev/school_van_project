<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    //allowed columns
    protected $fillable = ['name','class','gender'];

    /**
     * Relationship of operator to the user account
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, ParentToStudent>
     */
    public function parentToStudent()
    {
        return $this->belongsTo(ParentToStudent::class);
    }

    /**
     * a student uses many vans to make many trips
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough<Trip, VanStudent, Student>
     */
    public function trips()
    {
        return $this->hasManyThrough(Trip::class, VanStudent::class);
    }

    /**
     * Student can enter many vans on different trips
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Van, Student, \Illuminate\Database\Eloquent\Relations\Pivot>
     */
    public function vans()
    {
        return $this->belongsToMany(Van::class, 'van_student')->withTimestamps();
    }
}
