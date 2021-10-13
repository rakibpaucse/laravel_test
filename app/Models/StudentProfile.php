<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class StudentProfile extends Model
{
    use HasFactory;
    use Mediable;
    protected $guarded = [];
    protected $appends = ['profile_picture'];

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function getProfilePictureAttribute()
    {
        return $this->firstMedia('profilePic') ? $this->firstMedia('profilePic')->getUrl() : null;
    }
}
