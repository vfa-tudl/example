<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
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
Route::group(['middleware'=> ['auth:sanctum']], function () {
    Route::get('/posts/search/{name}',[PostController::class,"search"]);

    Route::post('/logout', [AuthController::class,"logout"]);
});

//Pulbic Route
Route::resource('posts', PostController::class);

Route::post('/register', [AuthController::class,"register"]);
Route::post('/login', [AuthController::class,"login"]);



//Author Controller
Route::apiResource('authors', AuthorController::class);


// Route::get('/posts',[PostController::class,"index"]);

// Route::post('/posts', [PostController::class,"store"]);

// Route::get('posts/{id}',[PostController::class,'']);

// Route::put('posts/{post}', function (Post $post) {
//     $post->update([
//         'title'=> request("title"),
//         'content'=> request("content"),
//     ]);

// });


// Route::delete('posts/{post}', function (Post $post) {
//     $status =$post->delete();

//     return [
        
//         'status' =>  $status,
    
//     ];
// });