<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'name',
        'email',
        'phone',
    ];

    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'student_classes');
    }

    public function studentClasses()
    {
        return $this->hasMany(StudentClass::class);
    }
}
