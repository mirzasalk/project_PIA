<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class QuestionController extends Controller
{
    public function addPageShow(Course $course){
       return view('questions.create',['course'=>$course]);
    }
    
    public function store(Request $request, Course $course){
       
        $formFields = $request->validate([
            'question' => ['required', Rule::unique('questions', 'question')],
            'answerOne' => 'required',
            'answerTwo' => 'required',
            'answerThree' => 'required',
            'answerFour' => 'required',
            'category' => 'required',
            'correctAnswer' => 'required',
        ]);
        
        $formFields['course_id'] = $course->id;
        
        Question::create($formFields);

        return view('questions.create',['course'=>$course]);
    }
}
