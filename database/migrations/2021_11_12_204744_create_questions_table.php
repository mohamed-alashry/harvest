<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skill');
            $table->text('question');
            $table->string('photo')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('track_id');
            $table->unsignedInteger('course_id');
            $table->unsignedBigInteger('level_id');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('track_id')->references('id')->on('tracks');
            $table->foreign('course_id')->references('id')->on('tracks');
            $table->foreign('level_id')->references('id')->on('stage_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
