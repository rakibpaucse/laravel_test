<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function getNotifications( Course $course)
    {

         $user_type = Auth::user()->profile_type;
        $course_ids = [];

        if ($user_type == User::PROFILE_STUDENT)
            return auth()->user()->studentCourses()->with('notifications')->get();

        if ($user_type == User::PROFILE_TEACHER)
            return $course->notifications()->get();


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNotifications(Request $request , Course $course)
    {
        //
        return $course->notifications()->save(new Notification($request->all()));
    }
}
