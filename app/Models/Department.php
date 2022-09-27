<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'dept_name',
    ];
    public $timestamps = true;

    function course()
    {
        return $this->hasMany(Course::class);
    }

    function student()
    {
        return $this->hasMany(Student::class);
    }

    function scholarshipCourse()
    {
        return $this->hasMany(ScholarshipStudent::class);
    }

    function scholarship()
    {
        return $this->hasMany(Scholarship::class);
    }

    function scholarshipStudent()
    {
        return $this->hasMany(ScholarshipStudent::class);
    }
}
