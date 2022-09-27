<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sex extends Model
{
    use HasFactory;
    protected $fillable = [
        'sex_name'
    ];

    function student()
    {
        return $this->hasMany(Student::class);
    }

    function scholarshipStudent()
    {
        return $this->hasMany(ScholarshipStudent::class);
    }
    
    function user()
    {
        return $this->hasMany(User::class);
    }
}
