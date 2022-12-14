<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EduQualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'qualification',
    ];
    public $timestamps = true;

    function student()
    {
        return $this->hasMany(Student::class);
    }

    function scholarshipStudent()
    {
        return $this->hasMany(ScholarshipStudent::class);
    }
}
