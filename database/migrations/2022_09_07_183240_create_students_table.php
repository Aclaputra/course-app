<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Students', function (Blueprint $table) {
          $table->id();
          $table->string('StudentName')->nullable();
          $table->integer('StudentSemester')->nullable();
          $table->double('StudentGPA')->nullable();
          $table->string('updated_at')->nullable();
          $table->string('created_at')->nullable();
          $table->string('user_email')->nullable();
          $table->foreign('user_email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Students');
    }
}
