<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PointController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[MemberController::class, 'create']);

// Route::resource('courses', CourseController::class);
// Route::resource('members', MemberController::class);

Route::get('/courses',[CourseController::class, 'index'])->name('courses.index');
Route::post('/courses/store',[CourseController::class, 'store'])->name('courses.store');
Route:: get ('/courses/{id}/edit',[CourseController::class,'edit'])->name('courses.edit');
Route::put('/courses/{id}/update',[CourseController::class, 'update'])->name('courses.update');
Route::put('/courses/{id}/update',[CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}/destroy',[CourseController::class, 'destroy'])->name('courses.destroy');


//Members Route
Route::get('/members',[MemberController::class, 'index'])->name('members.index');
Route::get('/members/create',[MemberController::class, 'create'])->name('members.create');
Route::post('/members/store',[MemberController::class, 'store'])->name('members.store');
Route::get('/members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');

Route::put('/members/{id}/update',[MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{id}/destroy',[MemberController::class, 'destroy'])->name('members.destroy');



//Members Point
Route::get('/points',[PointController::class, 'index'])->name('points.index');
Route::post('/points/store',[PointController::class, 'store'])->name('points.store');
Route::get('/get-member-points', [PointController::class, 'getMemberPoints'])->name('points.getMemberPoints');
// Define a route in your web.php file
Route::get('/get-members-and-points', 'PointController@getMembersAndPoints');








