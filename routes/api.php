<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\PostController;
use App\Http\Controllers\V1\JobController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\V1\AuthorController;
use App\Http\Controllers\V1\AccountController;
use App\Http\Controllers\V1\FieldController;

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

Route::fallback(function(){
    return response()->json([
        'status'=> 'E404',
        'message' => 'Not Found'], 404);
});

//Protected Route
Route::group(['middleware'=> ['auth:sanctum']], function () {


    Route::prefix('v1')->group(function(){
        // User Controller
        Route::apiResource('account', AccountController::class);

        Route::post('/logout', [LoginController::class,"logout"]);

        // Sample Job and Field Api
        Route::apiResource('field', FieldController::class);

        Route::apiResource('job',JobController::class);

        // Route Searching
        Route::post('/job/search',[JobController::class,"search"]);
    });


});

/*
Pulbic Route
*/

Route::prefix('v1')->group(function(){
    /*
    User Access
    */
    Route::post('/register', [RegisterController::class,"register"]);
    Route::post('/login', [LoginController::class,"login"]);

});

//Open Auth
Route::get('auth/social', 'App\Http\Controllers\Auth\LoginController@show')->name('social.login');
Route::get('oauth/{driver}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('social.callback');