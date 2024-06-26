<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolled extends Model
{
    use HasFactory;
    protected $fillable=[
        'idUser','idCourse',
    ];
    public function courses()
    {
        return $this->hasMany(Course::class,'id','idCourse');
    }
    public function users()
    {
        return $this->hasMany(User::class,'id','idUser');
    }
}
