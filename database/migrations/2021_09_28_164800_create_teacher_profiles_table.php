<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('id_number',13)->unique();
            $table->string('name' , 60)->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('age', 20)->nullable();
            $table->string('email' , 60)->nullable();
            $table->string('contact_number', 20)->nullable();
            $table->string('position', 20)->nullable();
            $table->string('total_taken_courses', 20)->nullable();
            $table->string('no_of_classes', 20)->nullable();
            $table->string('batch_teacher', 20)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_profiles');
    }
}
