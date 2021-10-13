<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function getCourse(Course $course)
    {
        return $course->load('teacher.profile');
    }

    public function getTeacherCourses()
    {
        return Auth::user()->teacherCourses()->with('students')->get();
    }


    public function getUserProfile(User $user)
    {
        return $user->profile;
    }
}
