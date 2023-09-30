<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function destroy(Notification $notification){
        $notification->delete();
       return redirect('/adminNotificationPage',)->with('message', 'Zahtev je uspešno odbijen!')->with('notifications', Notification::all());
    
   }
    public function show(Notification $notification){
       
       return view('courses.lessonsHenlde');
  
   }
}
