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

});

