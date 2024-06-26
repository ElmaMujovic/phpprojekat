<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tests extends Model
{
    use HasFactory;
    protected $fillable=[
        'nameT','tipeT','course_id'
    ];
    public function courses()
    {
        return $this->hasMany(Course::class,'id','course_id','idUser');
    }
}
