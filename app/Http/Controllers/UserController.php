<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Course;
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
            'password_confirmation' => 'required|min:6|same:password',
            
        ]);
    $formFields['role']='Korisnik';
    $formFields['password'] = bcrypt($formFields['password']);  
    $user = User::create($formFields);
    return redirect('/login')->with('message', 'Uspesno izvrsena registracija');
    }
   
    public function changeRole(User $user,Notification $notification){
        
       
        if ($user->role) {
            $user->update(['role' => 'Predavac']);
            $notification->delete();
            return back()->with('message', 'Uspješno odobren zahtjev!');
            
        } else {
            return back()->with('error', 'Nedostajući podaci za ažuriranje uloge!');
        }
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
    public function showUserInfo(){
        return view('users.infoPage');
    }

    public function changePass(Request $request) {
        if (password_verify($request->oldPass, auth()->user()->password)) {
            $request->validate([
                'newPass' => 'required|min:6',
            ]);
    
            $user = User::find(auth()->user()->id);
            $user->update([
                'password' => bcrypt($request->newPass) // Ispravna sintaksa za ažuriranje lozinke
            ]);
    
            return redirect('/userProfile')->with('message', 'Uspešno promenjena šifra'); // Ispravili smo "Uspesno" i "šifra" pravilnim slovima
        } else {
            return redirect('/userProfile')->with('message', 'Uneli ste pogrešnu lozinku');
        }
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
    public function showContact(){
        return view('showContact');
    }
    public function showKorisnici(){
        
          return view('showKorisnici',['users'=> User::latest()->filter(request(['search']))->get()]);
        }
    public function destroy(User $user){
        $poruka = "Korsnik ". $user->name. " je uspesno obrisan!";
        
        $user->delete();
       return redirect('/korisnici')->with('message', $poruka );
   }
    
   public function showHome(){
       $courses = Course::latest()->get();
       $newses = News::latest()->get();
       
       return view('showHome',['courses'=> $courses,'newses'=>$newses]);
   }
  

}
