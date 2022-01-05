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
	/*if (Auth::check()) {
		return view('student.dashboard');
	}else{
		return view('auth.login');
	}*/
	return view('auth.login');
}); 

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('country/select', 'App\Http\Controllers\Students\CountryController@select')->name('country.select');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*---------------------------------- ADMIN ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','admin']], function () { 
Route::group(['middleware' => []], function () { 
	Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin_dashboard');
	Route::get('admin/tutor', [App\Http\Controllers\Admin\TutorController::class, 'index'])->name('admin_tutor');
	Route::get('admin/subscription', [App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('admin_subscription');
	Route::get('admin/meetings', [App\Http\Controllers\Admin\MeetingsController::class, 'index'])->name('admin_meetings');
	Route::get('admin/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin_settings');
	Route::get('admin/template', [App\Http\Controllers\Admin\SettingsController::class, 'settingstemplate'])->name('admin_template');
	Route::get('admin/notification', [App\Http\Controllers\Admin\SettingsController::class, 'settingsnotification'])->name('admin_notification');
	Route::get('admin/language', [App\Http\Controllers\Admin\SettingsController::class, 'settingslanguage'])->name('admin_language');
});


/*---------------------------------- STUDENT ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','student']], function () { 
Route::group(['middleware' => []], function () { 
	Route::get('student/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index'])->name('student_dashboard');
	Route::get('student/feedback', [App\Http\Controllers\Student\FeedbackController::class, 'index'])->name('student_feedback');
	Route::get('student/plan', [App\Http\Controllers\Student\PlanController::class, 'index'])->name('student_plan');
});


/*------------------------------------ TUTOR ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','tutor']], function () { 
Route::group(['middleware' => []], function () { 
	Route::get('tutor/dashboard', [App\Http\Controllers\Tutor\DashboardController::class, 'index'])->name('tutor_dashboard');
	Route::get('tutor/meetings', [App\Http\Controllers\Tutor\MeetingsController::class, 'index'])->name('tutor_meetings');
	Route::get('tutor/profile', [App\Http\Controllers\Tutor\ProfileController::class, 'index'])->name('tutor_profile');
});

Route::resource('book-slot', 'App\Http\Controllers\Booking\BookingController');
Route::get('tutor/select', 'App\Http\Controllers\Booking\BookingController@select')->name('tutor.select');
/*------------------------------------ BOOKING -------------------------------------*/
/*Route::group(['middleware' => ['auth', 'verified','booking']], function () { 
	
});*/

/*------------------------------------ FRONT ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','front']], function () { 

// });