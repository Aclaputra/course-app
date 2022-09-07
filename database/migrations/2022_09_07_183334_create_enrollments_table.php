<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Enrollment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('StudentID');
            $table->foreign('StudentID')
                  ->references('id')
                  ->on('Students')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('CourseID');
            $table->foreign('CourseID')
                  ->references('id')
                  ->on('Courses')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->string('updated_at');
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Enrollment');
    }
}
