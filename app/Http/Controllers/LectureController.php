<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    //

    public function getLectures(Course $course)
    {
        return $course->lectures;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLectures(Request $request , Course $course)
    {
        //
        return $course->lectures()->save(new Lecture($request->all()));
    }
}
