<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdmissionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdmissionController;

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
    return view('home');
});
// Route::get('/admission-registration', [AdmissionController::class, 'create'])->name('create-admission');

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::resource('admission', AdmissionController::class);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
