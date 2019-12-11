<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentExamAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_exam_attempts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('exam_id')->unsigned();
            $table->string('Attempt');
            $table->integer('created_by');
            $table->integer('student_id')->unsigned();
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
        Schema::dropIfExists('student_exam_attempts');
    }
}
