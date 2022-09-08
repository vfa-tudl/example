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
    return view('welcome');
});

Auth::routes();
Route::fallback(function() {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\ProfileController::class, 'index'])->name('home');

//Post Action
Route::get('/posts/create',[App\Http\Controllers\V1\PostController::class,'create']);
Route::get('posts/{id}', [App\Http\Controllers\V1\PostController::class,'show']);
Route::post('/posts/{id}/edit', [App\Http\Controllers\V1\PostController::class,'update']);

//Open Auth
// Route::get('auth/social', 'App\Http\Controllers\Auth\LoginController@show')->name('social.login');
// Route::get('oauth/{driver}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('social.oauth');
// Route::get('oauth/{driver}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::post('/logout', [App\Http\Controllers\V1\AuthController::class,"logout"])->name('logout');

//Account Profile
Route::get('/account', [App\Http\Controllers\V1\AccountController::class,'show'])->name('account');
Route::post('/account', [App\Http\Controllers\V1\AccountController::class,'update']);
