<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\CourseRegistration;


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
        $formFields['numberOfCorrectAnswer'] = 0;
        $formFields['numberOfAnswer'] = 0;
        
        
        Question::create($formFields);

        return view('questions.create',['course'=>$course]);
    }
    public function showKviz(Request $request, Course $course){
        $questions =Question::all()->where('course_id', $course->id)
        ->where('category', $request->category);
        if ($questions->count() > 0) {
            return view('quiz.show', [
                'questionNumber'=>$request->query('questionNumber')+1,
                'userCorrectAnswe'=>$request->query('userCorrectAnswe'),
                'showNextDiv'=>0,
                'course' => $course,
                'questions' => $questions,    
            ]);
        
} else {
    return redirect('/courses/manage',)->with('message', 'Kurs jos uvek nije formiran!');
}
       
    }
    public function checkAnswer(Request $request, Course $course){
        $formField =$request->validate([
            'answer' => 'required',
        ]);
        $question = Question::find($request->query('questionId'));
        
      
    $checkAnswer = ($request->answer == $question->correctAnswer) ? 1 : 0;
   
    $qNum = $request->query('qNum');

    $updateInfo=['numberOfCorrectAnswer'=>$checkAnswer + $question->numberOfCorrectAnswer,
    'numberOfAnswer'=>$question->numberOfAnswer + 1
];
    $question->update($updateInfo);
    
    return view('quiz.show', [
            'questionNumber' => $qNum,
            'showNextDiv'=>1,
            'userAnswer'=>$request->answer,
            'userCorrectAnswe'=>$request->query('userCorrectAnswe')+ $checkAnswer,
            'course' => $course,
            'questions' => Question::where('course_id', $course->id)
    ->where('category', $question->category)
    ->get(),    
        ]);
    }

    public function destroy(Request $request,Question $question){
       
        $question->delete();
        return redirect('/courses/manage')->with('message', 'pitanje uspesno izbrisano!');
   }
   public function showEdit(Question $question){
    $course = Course::find($question->course_id);
    return view('questions.edit',['question'=>$question,'course'=>$course]);
 }
 public function update(Request $request, Course $course){
    
    $question = Question::find($request->query('qId'));
    $formFields = $request->validate([
        'question' => ['required'],
        'answerOne' => 'required',
        'answerTwo' => 'required',
        'answerThree' => 'required',
        'answerFour' => 'required',
        'category' => 'required',
        'correctAnswer' => 'required',
    ]);
   
    $question->update($formFields);
    $registration = CourseRegistration::where('course_id', $course->id)
    ->where('user_id', auth()->user()->id)
    ->get();
    return view('courses.showInfo', [
        'course' => $course,
        'registration'=>$registration,
        'questions'=>Question::where('course_id',$course->id)->get()
    ]);
}
public function addPageShowSecond(Course $course){
    return view('questions.createSecond',['course'=>$course]);
 }

 public function storeSecond(Request $request, Course $course){
       
    $registration = CourseRegistration::where('course_id', $course->id)
    ->where('user_id', auth()->user()->id)
    ->get();
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
    $formFields['numberOfCorrectAnswer'] = 0;
    $formFields['numberOfAnswer'] = 0;
    
    
    Question::create($formFields);

    return view('courses.showInfo', [
        'course' => $course,
        'registration' => $registration,
        'questions'=>Question::where('course_id',$course->id)->get()
    ]);
}
}
