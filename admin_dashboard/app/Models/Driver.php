<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    // defined primary key
    protected $primaryKey = 'DriverID';
    public $incrementing = true;

    protected $fillable = [
        "DriverID",
        "DriverName",
        "DriverPermit",
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function van()
    {
        return $this->hasOne(Van::class, 'DriverID');
    }

}
