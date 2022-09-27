<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDuration extends Model
{
    use HasFactory;
    protected $fillable = [
        'months',
    ];

    public $timestamps = true;

    function courseprice(){
        return $this->hasMany(courseprice::class);
    }

}
