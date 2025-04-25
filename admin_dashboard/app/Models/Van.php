<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
    //
    protected $primaryKey = 'VanID'; 
    protected $fillable =[
        "VanID",
        "NumberPlate",
        "VanCapacity",
        "VanOperatorID",
        "DriverID",
    ];

    public function driver()
{
    return $this->belongsTo(Driver::class, 'DriverID', 'DriverID');
}

    // public function vanChildren () {
    //     return $this->hasMany(VanChild::class, 'VanID', 'VanID');
    // }

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'VanOperatorID', 'VanOperatorID');
    }

    public function getRouteKeyName()
    {
        return 'VanID';
    }
}
