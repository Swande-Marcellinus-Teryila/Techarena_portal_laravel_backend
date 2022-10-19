<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAssignedCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'Staff_id',
        'department_id',
        'course_id'
    ];

    public $timestamps = true;

    function user()
    {
        return $this->belongsTo(User::class);
    }
    function department()
    {
        return $this->belongsTo(Department::class);
    }
    function course()
    {
        return $this->belongsTo(Course::class);
    }
    function role(){
        return $this->belongsTo(Role::class);
    }
}
