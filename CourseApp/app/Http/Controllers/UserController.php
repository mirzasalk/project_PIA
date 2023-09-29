<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    //get register form
    public function create(){
        return view('users.register');
    }
    
   

    public function applyForTeacher(){
        return view('users.applyForTeacher');
    }
    //create a new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            
        ]);
    $formFields['role']='Korisnik';
    $formFields['password'] = bcrypt($formFields['password']);  
    $user = User::create($formFields);
    return redirect('/login')->with('message', 'Uspesno izvrsena registracija');
    }
    
    public function storeRequest() {
        $formFields = [
            'user_id' => auth()->user()->id,
            'user_email' =>auth()->user()->email,
            'user_name' => auth()->user()->name,
        ];
  
    $notification = Notification::create( $formFields);
    return redirect('/courses')->with('message', 'Uspesno poslata prijava');
    }

    //logout user
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/courses')->with('message', 'You have been logged out!');
    }

    //get login form
    public function login(){
        return view('users.login');
    }

    //log in user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/courses')->with('message', 'You are logged in!');
        }
        return back()->withErrors(['email' => 'Invalid credientals'])->onlyInput('email');
    }
    public function showNotification(){

        return view('users.adminNotificationPage',['notifications' => Notification::all()]);
    }
}
