<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_progresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->text('course_module')->nullable();
            $table->text('Grades')->nullable();
            $table->string('Progress');
            $table->text('created_by')->nullable();
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
        Schema::dropIfExists('student_progresses');
    }
}
