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


    Route::get('/dashboard', ['App\Http\Controllers\StudentProfileController', 'getDashboardData'])->middleware('auth:sanctum');
//    Route::get('/routine', ['App\Http\Controllers\StudentProfileController', 'getRoutine'])->middleware('auth:sanctum');

    Route::get('/events', ['App\Http\Controllers\EventController', 'getEvents'])->middleware('auth:sanctum');
    Route::get('/profile', ['App\Http\Controllers\StudentProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/notification', ['App\Http\Controllers\NotificationController', 'getNotifications'])->middleware('auth:sanctum');


    // submenu

    Route::get('/course/{course}/post', ['App\Http\Controllers\PostController', 'getPosts'])->middleware('auth:sanctum');
    Route::post('/course/{course}/post', ['App\Http\Controllers\PostController', 'createPost'])->middleware('auth:sanctum');

    Route::get('/post/{post}/comment', ['App\Http\Controllers\PostController', 'getComments'])->middleware('auth:sanctum');
    Route::post('/post/{post}/comment', ['App\Http\Controllers\PostController', 'createComment'])->middleware('auth:sanctum');


    Route::get('/assignments', ['App\Http\Controllers\AssignmentController', 'getAssignments'])->middleware('auth:sanctum');

    Route::get('/course/{course}/exam', ['App\Http\Controllers\ExamController', 'getExams'])->middleware('auth:sanctum');
    Route::get('/course/{course}/lecture', ['App\Http\Controllers\LectureController', 'getLectures'])->middleware('auth:sanctum');

    Route::get('/gallery', ['App\Http\Controllers\GalleryController', 'getGallery'])->middleware('auth:sanctum');

});


Route::prefix('teacher')->name('teacher.')->group(function () {

    Route::get('/try', function () { return 'index';} );

    Route::post('/registration', ['App\Http\Controllers\TeacherProfileController', 'registration']);
    Route::post('/login', ['App\Http\Controllers\TeacherProfileController', 'login']);
    Route::get('/getProfile', ['App\Http\Controllers\TeacherProfileController', 'getProfile'])->middleware('auth:sanctum');

    Route::get('/dashboard', ['App\Http\Controllers\TeacherProfileController', 'getDashboardData'])->middleware('auth:sanctum');

    Route::get('/course', ['App\Http\Controllers\CourseController', 'getTeacherCourses'])->middleware('auth:sanctum');
//    Route::get('/schedule', ['App\Http\Controllers\TeacherProfileController', 'getRoutine'])->middleware('auth:sanctum');

    Route::get('/events', ['App\Http\Controllers\EventController', 'getEvents'])->middleware('auth:sanctum');
    Route::get('/profile', ['App\Http\Controllers\TeacherProfileController', 'getProfile'])->middleware('auth:sanctum');

    // submenu

    Route::get('/course/{course}/post', ['App\Http\Controllers\PostController', 'getPosts'])->middleware('auth:sanctum');
    Route::post('/course/{course}/post', ['App\Http\Controllers\PostController', 'createPost'])->middleware('auth:sanctum');

    Route::get('/post/{post}/comment', ['App\Http\Controllers\PostController', 'getComments'])->middleware('auth:sanctum');
    Route::post('/post/{post}/comment', ['App\Http\Controllers\PostController', 'createComment'])->middleware('auth:sanctum');

    Route::post('/assignments', ['App\Http\Controllers\AssignmentController', 'getProfile'])->middleware('auth:sanctum');

    Route::post('/course/{course}/exam', ['App\Http\Controllers\ExamController', 'createExams'])->middleware('auth:sanctum');
    Route::get('/course/{course}/exam', ['App\Http\Controllers\ExamController', 'getExams'])->middleware('auth:sanctum');

    Route::post('/course/{course}/lecture', ['App\Http\Controllers\LectureController', 'createLectures'])->middleware('auth:sanctum');
    Route::get('/course/{course}/lecture', ['App\Http\Controllers\LectureController', 'getLectures'])->middleware('auth:sanctum');

    Route::get('/gallery', ['App\Http\Controllers\GalleryController', 'getGallery'])->middleware('auth:sanctum');

    Route::get('/course/{course}/notification', ['App\Http\Controllers\NotificationController', 'getNotifications'])->middleware('auth:sanctum');
    Route::post('/course/{course}/notification', ['App\Http\Controllers\NotificationController', 'createNotifications'])->middleware('auth:sanctum');


});


Route::get('/course/{course}', ['App\Http\Controllers\CourseController', 'getCourse']);

