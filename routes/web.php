<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
}); 
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*---------------------------------- ADMIN ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','admin']], function () { 
Route::group(['middleware' => []], function () { 

	Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin_dashboard');
});


/*---------------------------------- STUDENT ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','student']], function () { 
Route::group(['middleware' => []], function () { 
	Route::get('student/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index'])->name('student_dashboard');
});


/*------------------------------------ TUTOR ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','tutor']], function () { 
Route::group(['middleware' => []], function () { 
	Route::get('tutor/dashboard', [App\Http\Controllers\Tutor\DashboardController::class, 'index'])->name('tutor_dashboard');
});


/*------------------------------------ BOOKING -------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','booking']], function () { 

// });

/*------------------------------------ FRONT ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','front']], function () { 

// });