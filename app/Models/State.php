<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_name',
        'country_id'
    ];

    function country()
    {
        return $this->belongsTo(Country::class);
    }
    
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
