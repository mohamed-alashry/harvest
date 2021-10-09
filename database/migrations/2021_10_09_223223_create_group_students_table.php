<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupStudentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->integer('lead_id')->unsigned();
            $table->tinyInteger('payment')->nullable();
            $table->tinyInteger('books')->nullable();
            $table->tinyInteger('activation')->nullable();
            $table->tinyInteger('certification')->nullable();
            $table->tinyInteger('abcence_per')->nullable();
            $table->tinyInteger('exam_per')->nullable();
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('lead_id')->references('id')->on('leads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('group_students');
    }
}
