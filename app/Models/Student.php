<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'age',
        'photo',
        'phone',
        'whatsapp_no',
        'email',
        'residential_address',
        'pri_sch_attended',
        'sec_sch_attended',
        'guidiance_name',
        'guidiance_address',
        'guidiance_email',
        'guidiance_phone',
        'course_id',
        'department_id',
        'sex_id',
        'marital_status_id',
        'state_id', 
        'lga_id', 
        'edu_qualification_id', 
        'employment_status_id', 
        'is_computer_knowledgeable',
        'is_certificate_needed',
        'is_approved',
        'is_duration_over',
        'status'
        ];
        public $timestamps = true;
        
        function scholarshipCourse(){
            return $this->belongsTo(scholarshipCourse::class);
        }
        function course(){
            return $this->belongsTo(Course::class);
        }

        function department(){
            return $this->belongsTo(Department::class);
        }
        
        function sex(){
            return $this->belongsTo(Sex::class);
        }

        function state(){
            return $this->belongsTo(State::class);
        }

        function lga(){
            return $this->belongsTo(Lga::class);
        }

        function eduQualification(){
            return $this->belongsTo(EduQualification::class);
        }

        function employmentStatus(){
            return $this->belongsTo(EmploymentStatus::class);
        }
}
