<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $fillable = [
        'starting_date',
        'closing_date',
        'department_id'
        
        ];
    public $timestamps = true;

    function scholarshipStudent()
    {
        return $this->hasMany(ScholarshipStudent::class);
    }

    function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    
}
