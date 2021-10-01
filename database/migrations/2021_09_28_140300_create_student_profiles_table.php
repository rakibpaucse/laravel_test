<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
//            $table->string('id_number',13)->unique();
            $table->string('name' , 60)->nullable();
            $table->string('email' , 60)->nullable();
            $table->string('contact_number', 20)->nullable();
            $table->string('sgpa', 20)->nullable();
            $table->string('cgpa', 20)->nullable();
            $table->string('credit_earned', 20)->nullable();
            $table->string('course_completed', 20)->nullable();
            $table->string('batch', 20)->nullable();
            $table->string('blood_group', 20)->nullable();
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
        Schema::dropIfExists('student_profiles');
    }
}
