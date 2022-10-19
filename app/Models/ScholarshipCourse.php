<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'course_id'
        ];
    public $timestamps = true;

    function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    function course()
    {
        return $this->belongsTo(Course::class);
    }

    function scholarshipStudent()
    {
        return $this->hasMany(ScholarshipStudent::class);
    }



}
