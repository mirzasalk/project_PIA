<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LessonController extends Controller
{
   
   public function show(Course $course){
    return view('lessons.lessonsHenlde',['course'=>$course,]);
   }
   public function store(Request $request,Course $course){
    
    $formFields = $request->validate([
        'title' => 'required',
        'content' => 'required',
       
    ]);

    if($request->hasFile('image')){ 
        $formFields['image'] = $request->file('image')->store('images', 'public');
    }
    $formFields['course_id'] = $course->id;
    
    Lesson::create($formFields);

    return view('lessons.lessonsHenlde',['course'=>$course]);
}
   public function showHandleLessonPage(Lesson $lesson){

    return view('lessons.edit',['lesson'=>$lesson,]);
}

public function getAllByCourseId(Course $course){
    
    return view('lessons.lessons', [
        'lessons' => Lesson::where('course_id',$course->id)->get(),
        'course' =>$course
    ]);
}

public function destroy(Lesson $lessons){
    $lessons->delete();
   return redirect("/getLessons/$lessons->course_id")->with('message', 'Lekcija je uspesno izbrisana!');
}
public function update(Request $request, Lesson $lesson){
    // dd($request->all());
    $formFields = $request->validate([
        'title' => ['required'],
        'content' => 'required',
    ]);

    if($request->hasFile('image')){ 
        $formFields['image'] = $request->file('image')->store('images', 'public');
    }

    $lesson->update($formFields);

    return back()->with('message', "Lista uspesno promenjena!");
} 
}
