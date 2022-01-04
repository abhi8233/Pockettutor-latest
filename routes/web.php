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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth', 'verified','admin']], function () { 

});

Route::group(['middleware' => ['auth', 'verified','student']], function () { 

});

Route::group(['middleware' => ['auth', 'verified','tutor']], function () { 

});

// Route::group(['middleware' => ['auth', 'verified','booking']], function () { 

// });

// Route::group(['middleware' => ['auth', 'verified','front']], function () { 

// });