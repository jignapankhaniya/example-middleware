<?php

use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

// Route::view('/home','home')->middleware('protectedPage');

// Route::middleware(['protected'])->group(function(){
//     Route::view('about-us','about-us');
//     Route::view('contact-us','contact-us');
// });

// Route::view('about-us','about-us');
// Route::view('contact-us','contact-us');

// Route::view('noaccess','noaccess');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('admin-dashboard','admin-dashboard')->middleware(['auth','role:admin']);

Route::get('admin-dashboard',[HomeController::class,'viewAdmin'])->middleware(['auth','role:admin']);
 Route::get('manager-dashboard',[HomeController::class,'viewManager'])->middleware(['auth','role:manager']);


// Route::middleware(['auth'])->group(function(){
//     Route::view('about-us','about-us');
//     Route::view('contact-us','contact-us');
// });

Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get('user-dashboard',[HomeController::class,'viewUser']);
    Route::view('about-us','about-us');
    Route::view('contact-us','contact-us');
});


