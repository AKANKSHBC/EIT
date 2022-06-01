<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ClassRoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/' ,[LecturerController::class, 'index'])->name('home');
Route::get('/grade-A' ,[LecturerController::class, 'gradeA'])->name('gradeA');
Route::get('/grade-B' ,[LecturerController::class, 'gradeB'])->name('gradeB');
Route::get('/add-lecturer' ,[LecturerController::class, 'create'])->name('addLecturer');
Route::post('/add-lecturer' ,[LecturerController::class, 'store'])->name('storeLecturer');
Route::post('/delete-lecturer' ,[LecturerController::class, 'destroy'])->name('deleteLecturer');

Route::get('/exam',[ExamController::class, 'index'])->name('examIndex');
Route::get('/add-exam',[ExamController::class, 'create'])->name('addExam');
Route::post('/add-exam',[ExamController::class, 'store'])->name('storeExam');
Route::get('/exam/{exam}', [ExamController::class, 'show'])->name('viewExam');
Route::get('/exam-detail/{id}', [ExamController::class, 'detail'])->name('examDetail');

Route::get('/classroom', [ClassRoomController::class, 'index'])->name('classIndex');
Route::get('/add-class', [ClassRoomController::class, 'create'])->name('classAdd');
Route::post('/add-class', [ClassRoomController::class, 'store'])->name('classStore');
