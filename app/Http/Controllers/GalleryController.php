<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    //

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGallery()
    {
        //
        $user_type = Auth::user()->profile_type;
        $course_ids = [];

        if ($user_type == User::PROFILE_STUDENT)
            $course_ids = Auth::user()->studentCourses->pluck('id');

        if ($user_type == User::PROFILE_TEACHER)
            $course_ids = Auth::user()->teacherCourses->pluck('id');

        return Gallery::query()->with(['course'])->whereIn('course_id', $course_ids)->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGallery()
    {
        //

        return 'something';
    }
}
