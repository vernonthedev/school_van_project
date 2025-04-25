<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    //
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        
        'is_started' => 'boolean',
        'is_complete' => 'boolean',
        'VanID' => 'integer',
        'start_latitude' => 'string',
        'start_longitude' => 'string',
        'end_latitude' => 'string',
        'end_longitude' => 'string',
        'current_latitude' => 'string',
        'current_longitude' => 'string',
        'date' => 'date',
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
        'trip_status' => 'string',

    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
