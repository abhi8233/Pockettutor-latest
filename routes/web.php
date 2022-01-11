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
	return view('auth.login');
}); 

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('country/select', 'App\Http\Controllers\Students\CountryController@select')->name('country.select');
Route::post('get-states',[App\Http\Controllers\CommonController::class, 'getState']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*---------------------------------- ADMIN ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','admin']], function () { 
Route::group(['middleware' => ['auth', 'verified']], function () { 

	Route::get('admin/profile', [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('profile');

	Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin_dashboard');

	Route::get('admin/user/delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'delete'])->name('user_delete');
	Route::get('admin/tutor/delete/{id}', [App\Http\Controllers\Admin\TutorController::class, 'delete'])->name('tutor_delete');


	Route::resource('admin/student', App\Http\Controllers\Admin\StudentController::class)->names('student');

	Route::resource('admin/tutor', App\Http\Controllers\Admin\TutorController::class)->names('admin_tutor');

	Route::get('admin/subscription', [App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('admin_subscription');

	Route::get('admin/meetings', [App\Http\Controllers\Admin\MeetingsController::class, 'index'])->name('admin_meetings');

	Route::get('admin/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin_settings');
	Route::get('admin/template', [App\Http\Controllers\Admin\SettingsController::class, 'settingstemplate'])->name('admin_template');
	Route::get('admin/notification', [App\Http\Controllers\Admin\SettingsController::class, 'settingsnotification'])->name('admin_notification');
	Route::get('admin/language', [App\Http\Controllers\Admin\SettingsController::class, 'settingslanguage'])->name('admin_language');
	Route::post('admin/stripe', [App\Http\Controllers\Admin\SettingsController::class, 'stripesetting'])->name('stripe_setting');
	Route::post('admin/add/notification', [App\Http\Controllers\Admin\SettingsController::class, 'addnotification'])->name('add_notification');
	Route::post('admin/add/subscription', [App\Http\Controllers\Admin\SubscriptionController::class, 'store'])->name('add_subscription');

});


/*---------------------------------- STUDENT ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','student']], function () { 
Route::group(['middleware' => ['auth', 'verified']], function () { 

	Route::resource('student/dashboard', App\Http\Controllers\Student\DashboardController::class)->names('sdashboard');
	Route::get('student/profile', [App\Http\Controllers\Student\DashboardController::class, 'profile'])->name('sprofile');
	Route::post('student/update-profile', [App\Http\Controllers\Student\DashboardController::class, 'updateProfile'])->name('updateSProfile');
	Route::post('student/update-pasword', [App\Http\Controllers\Student\DashboardController::class, 'updatePassword'])->name('updateSPassword');

	Route::resource('student/booking', App\Http\Controllers\Student\BookingController::class)->names('sbooking');
	Route::get('student/getTutor', [App\Http\Controllers\Student\BookingController::class,'getTutor'])->name('getTutor');
	/* booking page for student */
	Route::get('booking', [App\Http\Controllers\Booking\BookingController::class, 'index'])->name('booking');

	Route::resource('student/feedback', App\Http\Controllers\Student\FeedbackController::class)->names('sfeedback');

	Route::resource('student/plan', App\Http\Controllers\Student\PlanController::class)->names('splan');
});


/*------------------------------------ TUTOR ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','tutor']], function () { 
Route::group(['middleware' => ['auth', 'verified']], function () { 

	Route::resource('tutor/dashboard', App\Http\Controllers\Tutor\DashboardController::class)->names('tdashboard');
	Route::get('tutor/profile', [App\Http\Controllers\Tutor\DashboardController::class, 'profile'])->name('tprofile');
	Route::post('tutor/update-profile', [App\Http\Controllers\Tutor\DashboardController::class, 'updateProfile'])->name('updateTProfile');
	Route::post('tutor/update-pasword', [App\Http\Controllers\Tutor\DashboardController::class, 'updatePassword'])->name('updateTPassword');

	Route::resource('tutor/meetings', App\Http\Controllers\Tutor\MeetingsController::class)->names('tmeetings');

	
});


/*------------------------------------ BOOKING -------------------------------------*/
/*Route::group(['middleware' => ['auth', 'verified','booking']], function () { 
	Route::get('booking', [App\Http\Controllers\Booking\BookingController::class, 'index'])->name('booking');
});*/



/*------------------------------------ FRONT ---------------------------------------*/
// Route::group(['middleware' => ['auth', 'verified','front']], function () { 
	// Route::group(['middleware' => ['auth', 'verified']], function () { 

		Route::get('front', [App\Http\Controllers\Front\FrontController::class, 'index'])->name('front');
		Route::get('front/about', [App\Http\Controllers\Front\AboutController::class, 'index'])->name('front_about');
	// });
// });