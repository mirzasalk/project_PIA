<?php

use App\Models\Course;
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




Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);


Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/apply', [UserController::class, 'applyForTeacher'])->middleware('auth');

Route::post('/requestSend', [UserController::class, 'storeRequest'])->middleware('auth');

Route::get('/adminNotificationPage', [UserController::class, 'showNotification'])->middleware('auth');

Route::get('/courses', [CourseController::class, 'getAll']);


Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth');


Route::post('/courses', [CourseController::class, 'store'])->middleware('auth');


Route::get('/courses/{course}/edit' , [CourseController::class, 'edit'])->middleware('auth');


Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware('auth');

Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->middleware('auth');

Route::get('/courses/manage', [CourseController::class, 'manage'])->middleware('auth');


Route::get('/courses/{course}', [CourseController::class, 'getById']);



