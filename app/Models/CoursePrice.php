<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'cost',
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
}
