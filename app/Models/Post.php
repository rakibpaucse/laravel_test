<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
    use HasFactory;

    protected $guarded=[];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->with(['user']);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->with('profile');
    }
}
