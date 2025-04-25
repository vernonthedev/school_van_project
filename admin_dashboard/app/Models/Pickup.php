<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pickup extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'ParentID',
        'ChildID',
        'VanOperatorID',
        'verification_time',
    ];

    public function parent()
    {
        return $this->belongsTo(Parental::class, 'ParentID', 'ParentID');
    }

    public function child()
    {
        return $this->belongsTo(Child::class, 'ChildID', 'ChildID');
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'VanOperatorID', 'VanOperatorID');
    }
}
