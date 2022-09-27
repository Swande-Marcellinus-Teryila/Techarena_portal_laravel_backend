<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        ];
    public $timestamps = true;
    
    function user(){
        return $this->hasMany('users');
    }
    
}
