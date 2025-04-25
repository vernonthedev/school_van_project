<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    // allowed columns
    protected $fillable = ['name','phoneNumber','gender','address', 'title'];

    /**
     * Relationship of operator to the user account
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, ParentToStudent>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship of operator to his assigned van
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Van, Operator>
     */
    public function van()
    {
        return $this->belongsTo(Van::class);
    }
}
