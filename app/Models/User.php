<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const PROFILE_STUDENT = "student_profile";
    public const PROFILE_TEACHER = "teacher_profile";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_number',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->morphTo(__FUNCTION__, 'profile_type', 'profile_id');
    }

//    public function products()
//    {
//        return $this->hasMany(Product::class);
//    }
//
//    public function sellerBankInformation()
//    {
//        return $this->hasOne(SellerBankInformation::class);
//    }

//courses
    public function teacherCourses()
    {
        return $this->hasMany(Course::class, 'teacher_id', 'id');
    }

    public function studentCourses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    }


    /* Notifications*/

    public function teacherNotifications()
    {
        return $this->hasManyThrough(Notification::class, Course::class, 'course_id', 'teacher_id');
    }

    public function studentNotifications()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'course_id', 'student_id');
    }
}
