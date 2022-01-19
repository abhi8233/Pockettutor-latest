<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tutor\TutorSlotController;

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
Route::post('get-country',[App\Http\Controllers\CommonController::class, 'getCountry'])->name('get-country');
Route::post('get-states',[App\Http\Controllers\CommonController::class, 'getStates'])->name('get-states');
Route::post('get-cities',[App\Http\Controllers\CommonController::class, 'getCities'])->name('get-cities');


/*---------------------------------- ADMIN ---------------------------------------*/
Route::group(['middleware' => ['auth', 'verified','superadmin']], function () { 


	Route::resource('admin/dashboard', App\Http\Controllers\Admin\DashboardController::class)->names('SAdashboard');
	Route::get('admin/profile', [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('SAprofile');
	Route::post('admin/update-profile', [App\Http\Controllers\Admin\DashboardController::class, 'updateProfile'])->name('updateSAProfile');
	Route::post('admin/update-pasword', [App\Http\Controllers\Admin\DashboardController::class, 'updatePassword'])->name('updateSAPassword');

	/*User list*/ 
	Route::resource('admin/student', App\Http\Controllers\Admin\StudentController::class)->names('student');
	
	Route::resource('admin/tutor', App\Http\Controllers\Admin\TutorController::class)->names('tutor');
	Route::post('changeTutorStatus',[App\Http\Controllers\Admin\TutorController::class, 'changeTutorStatus'])->name('changeTutorStatus');

	/* subscription menu */ 
	Route::resource('admin/subscription', App\Http\Controllers\Admin\SubscriptionController::class)->names('subscription');
	Route::get('changeStatus',[App\Http\Controllers\Admin\SubscriptionController::class, 'changeStatus'])->name('changeStatus');


	/* meeting menu */ 
	Route::resource('admin/meetings', App\Http\Controllers\Admin\MeetingsController::class)->names('meetings');

	/* setting menu */ 
	Route::resource('admin/settings', App\Http\Controllers\Admin\SettingsController::class)->names('settings');

	Route::get('admin/payment', [App\Http\Controllers\Admin\SettingsController::class, 'getSettingStripPayment'])->name('getSettings.stripe.payment');
	Route::post('admin/setPayment', [App\Http\Controllers\Admin\SettingsController::class, 'setSettingStripPayment'])->name('setSettings.stripe.payment');

	Route::get('admin/template', [App\Http\Controllers\Admin\SettingsController::class, 'getSettingEmailTemplate'])->name('getSettings.email.template');
	Route::post('admin/setTemplate', [App\Http\Controllers\Admin\SettingsController::class, 'setSettingEmailTemplate'])->name('setSettings.email.template');

	Route::get('admin/notification', [App\Http\Controllers\Admin\SettingsController::class, 'getSettingEmailNotification'])->name('getSettings.email.notification');
	Route::post('admin/setNotification', [App\Http\Controllers\Admin\SettingsController::class, 'setSettingEmailNotification'])->name('setSettings.email.notification');

	Route::get('admin/language', [App\Http\Controllers\Admin\SettingsController::class, 'getSettingMultiLanguage'])->name('getSettings.multi.language');
	Route::post('admin/setLanguage', [App\Http\Controllers\Admin\SettingsController::class, 'setSettingMultiLanguage'])->name('setSettings.multi.language');




	// Route::get('admin/profile', [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('profile');
	// Route::get('admin/user/delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'delete'])->name('user_delete');
	// Route::get('admin/tutor/delete/{id}', [App\Http\Controllers\Admin\TutorController::class, 'delete'])->name('tutor_delete');
	// Route::get('admin/subscription', [App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('admin_subscription');
	// Route::get('admin/meetings', [App\Http\Controllers\Admin\MeetingsController::class, 'index'])->name('admin_meetings');

	// Route::get('admin/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin_settings');
	// // Route::get('admin/template', [App\Http\Controllers\Admin\SettingsController::class, 'settingstemplate'])->name('admin_template');
	// Route::get('admin/notification', [App\Http\Controllers\Admin\SettingsController::class, 'settingsnotification'])->name('admin_notification');
	// Route::get('admin/language', [App\Http\Controllers\Admin\SettingsController::class, 'settingslanguage'])->name('admin_language');
	// Route::post('admin/stripe', [App\Http\Controllers\Admin\SettingsController::class, 'stripesetting'])->name('stripe_setting');
	// Route::post('admin/add/notification', [App\Http\Controllers\Admin\SettingsController::class, 'addnotification'])->name('add_notification');
	// Route::post('admin/add/subscription', [App\Http\Controllers\Admin\SubscriptionController::class, 'store'])->name('add_subscription');
	// Route::get('changeStatus',[App\Http\Controllers\Admin\SubscriptionController::class, 'changeStatus']);

});


/*---------------------------------- STUDENT ---------------------------------------*/
Route::group(['middleware' => ['auth', 'verified','student']], function () { 

	Route::resource('booking', App\Http\Controllers\Booking\BookingController::class)->names('booking');
	Route::get('getToken', [App\Http\Controllers\Booking\BookingController::class,'saveToken'])->name('saveToken');

	Route::group(['prefix'=>'student'],function(){

		Route::resource('dashboard', App\Http\Controllers\Student\DashboardController::class)->names('sdashboard');
		Route::get('profile', [App\Http\Controllers\Student\DashboardController::class, 'profile'])->name('sprofile');
		Route::post('update-profile', [App\Http\Controllers\Student\DashboardController::class, 'updateProfile'])->name('updateSProfile');
		Route::post('update-pasword', [App\Http\Controllers\Student\DashboardController::class, 'updatePassword'])->name('updateSPassword');
		Route::resource('booking', App\Http\Controllers\Student\BookingController::class)->names('sbooking');
		Route::get('getTutor', [App\Http\Controllers\Student\BookingController::class,'getTutor'])->name('getTutor');
		/* booking page for student */

		Route::resource('feedback', App\Http\Controllers\Student\FeedbackController::class)->names('sfeedback');

		Route::resource('plan', App\Http\Controllers\Student\PlanController::class)->names('splan');

		Route::group(['prefix'=>'slots'],function(){
			Route::post('slots_list_by_date', [TutorSlotController::class, 'slots_list_by_date'])->name('getDateSlotsList');
		});
	});
});
/*------------------------------------ TUTOR ---------------------------------------*/
Route::group(['middleware' => ['auth', 'verified','tutor']], function () { 

	Route::group(['prefix'=>'tutor'],function(){
		//Tutor 
		Route::resource('dashboard', App\Http\Controllers\Tutor\DashboardController::class)->names('tdashboard');
		Route::get('profile', [App\Http\Controllers\Tutor\DashboardController::class, 'profile'])->name('tprofile');
		Route::post('update-profile', [App\Http\Controllers\Tutor\DashboardController::class, 'updateProfile'])->name('updateTProfile');
		Route::post('update-pasword', [App\Http\Controllers\Tutor\DashboardController::class, 'updatePassword'])->name('updateTPassword');
		Route::resource('meetings', App\Http\Controllers\Tutor\MeetingsController::class)->names('tmeetings');
		//Slots 
		Route::group(['prefix'=>'slots'],function(){
			Route::post('store', [TutorSlotController::class, 'store'])->name('storeTutorSlot');
			Route::get('index', [TutorSlotController::class,'index'])->name('getTutorSlot');
			Route::post('copy', [TutorSlotController::class,'copy'])->name('copyForNextWeek');
		});
	});
	
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