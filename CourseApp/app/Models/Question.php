<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answerOne',
        'answerTwo',
        'answerThree',
        'answerFour',
        'category',
        'correctAnswer',
        'course_id' 
        
    ];
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
