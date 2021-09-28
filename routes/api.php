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

Route::get('/try', function () { return 'index';} );

Route::prefix('student')->name('student.')->group(function () {



    Route::post('/registration', ['App\Http\Controllers\StudentProfileController', 'registration'])->name('registration');
    Route::post('/login', ['App\Http\Controllers\StudentProfileController', 'login'])->name('login');
    Route::get('/getProfile', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum')->name('getProfile');

});

