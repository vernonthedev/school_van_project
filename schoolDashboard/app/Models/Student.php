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
     * the student makes very many trips
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Trip, Student>
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
