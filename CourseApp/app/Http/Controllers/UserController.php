<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    //get register form
    public function create(){
        return view('users.register');
    }

    //create a new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

    //hash password
    
    $formFields['password'] = bcrypt($formFields['password']);  
    //create user
    $user = User::create($formFields);

    auth()->login($user);

    return redirect('/courses')->with('message', 'User created and logged in!');

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
}
