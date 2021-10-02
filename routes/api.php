<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::prefix('student')->name('student.')->group(function () {

    Route::get('/try', function () { return 'index';} );

    Route::post('/registration', ['App\Http\Controllers\StudentProfileController', 'registration']);
    Route::post('/login', ['App\Http\Controllers\StudentProfileController', 'login']);
    Route::get('/getProfile', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');


    Route::get('/dashboard', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::get('/routine', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/events', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::get('/profile', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/notification', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');


    // submenu

    Route::get('/course/{course}/posts', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/posts/{post}/comment', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');


    Route::get('/assignments', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/exam', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::get('/lecture', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/gallery', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::get('/lecture', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');


});


Route::prefix('teacher')->name('teacher.')->group(function () {

    Route::get('/try', function () { return 'index';} );

    Route::post('/registration', ['App\Http\Controllers\TeacherProfileController', 'registration']);
    Route::post('/login', ['App\Http\Controllers\TeacherProfileController', 'login']);
    Route::get('/getProfile', ['App\Http\Controllers\TeacherProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/dashboard', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::get('/schedule', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/events', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::get('/profile', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    // submenu

    Route::get('/course/{course}/posts', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::post('/course/{course}/posts', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::post('/course/{course}/posts', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::post('/assignments', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::post('/exam', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::post('/lecture', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/gallery', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');
    Route::get('/lecture', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');


});


Route::post('/course/{id}', ['App\Http\Controllers\TeacherProfileController', 'registration']);

