<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parental extends Model
{
    //
    protected $primaryKey = 'ParentID';
    public $incrementing = true;

    protected $fillable = [
        "ParentID",
        "ParentName",
        "Longitude",
        "Latitude",
        "Address",
        "PhoneNumber",
        "Email",
        "api_key",
    ];
    public function children()
    {
        return $this->hasMany(Child::class, 'ParentId', 'ParentID');
    }

    // public function x(){
    //      return $this->belongsToMany(Child::class, 'parent_child', 'ParentID', 'ChildID');
    // }
}
