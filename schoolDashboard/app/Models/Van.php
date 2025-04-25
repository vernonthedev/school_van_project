<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Van extends Model
{
    use HasFactory;
    // allowed columns;
    protected $fillable = ['name','numberPlate','vanCapacity'];

    /**
     * A driver who has to drive this specific van
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Driver, Van>
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    /**
     * An operator who has to manage this specific van
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Operator, Van>
     */
    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    /**
     * A van makes very many trips
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Trip, Van>
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    /**
     * A van can have very many students
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Student, Van, \Illuminate\Database\Eloquent\Relations\Pivot>
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'van_student')->withTimestamps();
    }
}
