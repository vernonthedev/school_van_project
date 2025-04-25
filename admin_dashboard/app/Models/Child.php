<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    
    protected $table = 'children';
    protected $primaryKey = 'ChildID'; // Specify the primary key
    protected $fillable = ['ChildName', 'ParentId']; // Ensure ParentId is fillable

    // Define relationship
    public function parent()
    {
        return $this->belongsTo(Parental::class, 'ParentId', 'ParentID');
    }

    // public function x(){
    //     return $this->belongsToMany(Parental::class, 'parent_child', 'ChildID', 'ParentID');
    // }
}
