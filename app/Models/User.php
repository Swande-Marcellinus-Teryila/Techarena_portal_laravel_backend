<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    function userAssignedCourse()
    {
        return $this->hasMany(UserAssignedCourse::class);
    }
    function scholarshipCourse()
    {
        return $this->belongsTo(scholarshipCourse::class);
    }

    function department()
    {
        return $this->belongsTo(Department::class);
    }

    function sex()
    {
        return $this->belongsTo(Sex::class);
    }

    function state()
    {
        return $this->belongsTo(State::class);
    }

    function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    function eduQualification()
    {
        return $this->belongsTo(EduQualification::class);
    }

    function employmentStatus()
    {
        return $this->belongsTo(EmploymentStatus::class);
    }
    function role()
    {
        return $this->belongsTo(Roles::class);
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
