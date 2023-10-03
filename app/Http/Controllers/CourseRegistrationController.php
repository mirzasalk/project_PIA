<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\CourseRegistration;

class CourseRegistrationController extends Controller
{
    public function store(Course $course){
        $formFields ['course_id'] = $course->id;
        $formFields ['course_image'] = $course->image;
        $formFields ['course_duration'] = $course->duration;
        $formFields ['course_tags'] = $course->tags;
        $formFields ['course_description'] = $course->description;
        $formFields ['course_title'] = $course->title;
        $formFields['user_id'] = auth()->id();
        $formFields['user_email'] = auth()->user()->email;
        $formFields['user_role'] = auth()->user()->role;
        $formFields['user_name'] = auth()->user()->name;
       
       
        $registrations = CourseRegistration::create($formFields);

        return view('courses.course',['course'=>$course,'registrations'=>$registrations]);
    }
    public function destroy(Request $request,Course $course){
        
        $registration = CourseRegistration::find($request->query("regId"));
        $registration->delete();
        $newRegistration = CourseRegistration::where('course_id',$course->id)->get();
        return view('courses.showInfoSecond', [
            'registration'=>$newRegistration,
            'course' => $course,
            'questions'=>Question::where('course_id',$course->id)->get()
        ]);
    }
    
}
