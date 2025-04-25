<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VanChild extends Model
{
    //
    protected $fillable = [
        'VanID',
        'ChildID',
    ];

    public function vanChildren () {
        return $this->hasMany(VanChild::class, 'VanID', 'VanID');
    }

    public function van()
    {
        return $this->belongsTo(Van::class, 'VanID', 'VanID');
    }

    public function child()
    {
        return $this->belongsTo(Child::class, 'ChildID', 'ChildID');
    }
}
