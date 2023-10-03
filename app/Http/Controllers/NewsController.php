<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Course;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function addNews(){

        return view('showAddNews');
    }
    public function store(Request $request){
       
        $formFields = $request->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required',  
        ]);
    News::create($formFields);

    $courses = Course::latest()->get();
    $newses = News::latest()->get();
       
       return view('showHome',['courses'=> $courses,'newses'=>$newses]);
        
    }
}
