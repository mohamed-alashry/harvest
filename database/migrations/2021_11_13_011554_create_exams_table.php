<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('track_id');
            $table->unsignedInteger('course_id');
            $table->tinyInteger('duration');
            $table->tinyInteger('success_rate');
            $table->timestamps();

            $table->foreign('track_id')->references('id')->on('tracks');
            $table->foreign('course_id')->references('id')->on('tracks');
        });

        Schema::create('exam_levels', function (Blueprint $table) {
            $table->unsignedInteger('exam_id');
            $table->unsignedBigInteger('level_id');

            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');

            $table->primary(['exam_id', 'level_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exams');
    }
}
