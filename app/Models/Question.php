<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'question','a','b','c','d','points','answer',
    ];
    public function tests()
    {
        return $this->hasMany(Tests::class,'id','idTest');
    }
}
