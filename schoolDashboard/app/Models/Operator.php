<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    // allowed columns
    protected $fillable = ['name','phoneNumber','gender','address', 'title','role'];

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

    /**
     * Setting the format on how to save the phoneNumbers
     * @param mixed $value
     * @return void
     */
    public function setPhoneNumberAttribute($value)
    {
        $this->attributes['phoneNumber'] = preg_replace('/[^0-9]/', '', $value);
    }
}
