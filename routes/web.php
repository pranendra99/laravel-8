<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('pns', \App\Http\Controllers\PnsController::class)
    ->middleware('auth');

Route::resource('userpns', \App\Http\Controllers\UserPnsController::class);

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/user-pns', [\App\Http\Controllers\UserPnsController::class, 'index'])->name('user-pns.index');
// });


// return response()->json(['valid' => auth()->check()]);


// Route::get('search/{query}', [App\Http\Controllers\UserPnsController::class, 'search'])
//     ->middleware('auth');

// Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

