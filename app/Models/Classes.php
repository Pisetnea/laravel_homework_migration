<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function studentClasses()
    {
        return $this->hasMany(StudentClass::class, 'class_id');
    }

    public function teacherClassSubjects()
    {
        return $this->hasMany(TeacherClassSubject::class, 'class_id');
    }

    public function addClassToTerms()
    {
        return $this->hasMany(AddClassToTerm::class, 'class_id');
    }
}
