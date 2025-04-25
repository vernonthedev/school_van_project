<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentToStudent extends Model
{
    // allowed columns
    protected $fillable = ['name','longitude','latitude','phoneNumber','gender','occupation','address'];

    /**
     * Relationship of parent to the user account
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, ParentToStudent>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship of parent to student
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Student, ParentToStudent>
     */
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
