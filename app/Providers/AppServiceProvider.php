<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //morph map
        Relation::morphMap([
            User::PROFILE_STUDENT => 'App\Models\StudentProfile',
            User::PROFILE_TEACHER => 'App\Models\TeacherProfile',
        ]);
    }
}
