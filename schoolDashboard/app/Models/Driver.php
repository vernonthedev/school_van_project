<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Driver extends Model
{
    // allowed columns
    protected $fillable = ['name','drivingPermit','phoneNumber','gender','address'];

    /**
     * Relationship of driver to the user account
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, ParentToStudent>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship of driver to his assigned vans
     * @return BelongsTo<Van, Driver>
     */
    public function van()
    {
        return $this->belongsTo(Van::class);
    }
}
