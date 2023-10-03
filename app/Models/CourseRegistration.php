<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;
   
   
    protected $fillable = ['user_id','course_id','user_email','user_role','user_name','course_image','course_duration','course_tags','course_description','course_title'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'user_id');
    }
}
