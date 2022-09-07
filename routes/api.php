<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\PostController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\AuthorController;
use App\Http\Controllers\V1\AccountController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Protected Route
Route::group(['middleware'=> ['auth:api']], function () {
    Route::get('/posts/search/{name}',[PostController::class,"search"]);

    Route::post('/logout', [AuthController::class,"logout"]);

    Route::prefix('v1')->group(function(){
        //Post Controller
        Route::apiResource('posts', PostController::class);
        //Author Controller
        Route::apiResource('authors', AuthorController::class);
        // User Controller
        Route::apiResource('account', AccountController::class);
    });


});

/*
Pulbic Route
*/

Route::prefix('v1')->group(function(){
    /*
    User Access
    */
    Route::post('/register', [AuthController::class,"register"]);
    Route::post('/login', [AuthController::class,"login"]);
});

//Open Auth
Route::get('auth/social', 'App\Http\Controllers\Auth\LoginController@show')->name('social.login');
Route::get('oauth/{driver}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('social.callback');



// Route::get('/posts',[PostController::class,"index"]);

// Route::post('/posts', [PostController::class,"store"]);

// Route::get('posts/{id}',[PostController::class,'']);
