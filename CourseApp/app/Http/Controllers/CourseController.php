<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Notification;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    //get all courses
    public function getAll(){
        
        return view('courses.courses', [
            'heading' => 'Latest Courses',
            'notifications' => Notification::all(),
            'courses' => Course::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    //get a single course
    public function getById(Course $course){
        return view('courses.course', [
            'course' => $course
        ]);
    }
    public function showInfo(Course $course){

        return view('courses.showInfo', [
            'course' => $course,
            'questions'=>Question::where('course_id',$course->id)->get()
        ]);
    }

    //get create form
    public function create(){
        return view('courses.create');
    }

    //create a new course
    public function store(Request $request){
        // dd($request->all());
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('courses', 'title')],
            'description' => 'required',
            'tags' => 'required',
            'duration' => 'required'
        ]);

        if($request->hasFile('image')){ 
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }
        $formFields['user_id'] = auth()->id();
        
        $course = Course::create($formFields);

        return view('lessons.lessonsHenlde',['course'=>$course]);
    }

    //get edit form
    public function edit(Course $course){
        return view('courses.edit', ['course' => $course]);
    }

    //update course
    public function update(Request $request, Course $course){
        // dd($request->all());
        $formFields = $request->validate([
            'title' => ['required'],
            'description' => 'required',
            'tags' => 'required',
            'duration' => 'required'
        ]);

        if($request->hasFile('image')){ 
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $course->update($formFields);

        return back()->with('message', "Course updated successfully!");
    } 

    public function destroy(Course $course){
         $course->delete();
        return redirect('/courses/manage')->with('message', 'Course deleted successfully!');
    }

    public function manage(){
        return view('courses.manage',['courses'=>auth()->user()->courses()->get()]);
    }

    public function coursLessons(Course $course){
        return view('courses.lessons',['course'=>$course,
        'lessons' =>Lesson::where('course_id',$course->id)->get()
    ]);
    }
}
