<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QuestionController;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });




Route::get('/', [UserController::class, 'showHome']);
Route::get('/kontakt', [UserController::class, 'showContact']);



Route::get('/korisnici', [UserController::class, 'showKorisnici']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');


Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::get('/userProfile', [UserController::class, 'showUserInfo'])->middleware('auth');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/apply', [UserController::class, 'applyForTeacher'])->middleware('auth');

Route::post('/requestSend', [UserController::class, 'storeRequest'])->middleware('auth');

Route::get('/adminNotificationPage', [UserController::class, 'showNotification'])->middleware('auth');
Route::get('/changePass', [UserController::class, 'changePass'])->middleware('auth');

Route::put('/changeRoleToPrdavac/{user}/{notification}', [UserController::class, 'changeRole'])->middleware('auth');

Route::delete('/userDelete/{user}', [UserController::class, 'destroy']);

Route::get('/courses', [CourseController::class, 'getAll']);

Route::get('/coursLessonsShow/{course}', [CourseController::class, 'coursLessons']);

Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth');

Route::post('/courses', [CourseController::class, 'store'])->middleware('auth');


Route::get('/courses/{course}/edit' , [CourseController::class, 'edit'])->middleware('auth');


Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware('auth');


Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->middleware('auth');


Route::get('/courses/manage', [CourseController::class, 'manage'])->middleware('auth');


Route::get('/courses/{course}', [CourseController::class, 'getById']);

Route::get('/showInfo/{course}', [CourseController::class, 'showInfo']);

Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->middleware('auth');

Route::post('/createLesson/{course}', [LessonController::class, 'store']);

Route::get('/getLessons/{course}', [LessonController::class, 'getAllByCourseId']);

Route::delete('/questionsDelete/{{$item->id}}', [LessonController::class, 'destroy'])->middleware('auth');

Route::get('/showHandleLessons/{lesson}', [LessonController::class, 'showHandleLessonPage'])->middleware('auth');

Route::put('/editLessons/{lesson}', [LessonController::class, 'update'])->middleware('auth');

Route::get('/addLesson/{course}', [LessonController::class, 'show'])->middleware('auth');

Route::get('/addQuestions/{course}', [QuestionController::class, 'addPageShow'])->middleware('auth');

Route::get('/createNewQuestions/{course}', [QuestionController::class, 'store'])->middleware('auth');

Route::post('/showKviz/{course}', [QuestionController::class, 'showKviz'])->middleware('auth');

Route::put('/checkAnswer/{course}', [QuestionController::class, 'checkAnswer'])->middleware('auth');

Route::delete('/questionsDelete/{question}', [QuestionController::class, 'destroy'])->middleware('auth');

Route::get('/showEdit/{question}', [QuestionController::class, 'showEdit'])->middleware('auth');

Route::get('/addQuestionsSecond/{course}', [QuestionController::class, 'addPageShowSecond'])->middleware('auth');

Route::get('/createNewQuestionsSecond/{course}', [QuestionController::class, 'storeSecond'])->middleware('auth');

Route::put('/updateQuestions/{course}', [QuestionController::class, 'update'])->middleware('auth');

