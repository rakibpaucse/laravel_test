<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,  'teacher_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
