<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    //
    protected $primaryKey = 'VanOperatorID';
    public $incrementing = true;

    protected $fillable = [
        "VanOperatorID",
        "VanOperatorName",
        "PhoneNumber",
        "Email",
        "api_key",
    ];
    public function van()
    {
        return $this->hasOne(Van::class, 'VanOperatorID');
    }
}
