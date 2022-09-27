<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    use HasFactory;
    protected $fillable = [
        'lga_name',
        'state_id'
    ];
    public $timestamps = true;

    function state()
    {
        return $this->belongsTo(State::class);
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
