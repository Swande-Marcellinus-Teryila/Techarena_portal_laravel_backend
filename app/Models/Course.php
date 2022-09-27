<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable =[
        'course_name',
        'description',
        'department_id',
    ];
    public $timestamps = true;
    
    function department()
    {
        return $this->belongsTo(Department::class);
    }

    function courseprice()
    {
        return $this->hasOne(courseprice::class);
    }

    function student()
    {
        return $this->hasMany(Student::class);
    }
    function scholarshipCourse()
    {
        return $this->hasMany(ScholarshipCourses::class);
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
