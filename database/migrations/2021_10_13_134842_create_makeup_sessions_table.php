<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakeupSessionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makeup_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_session_id')->unsigned();
            $table->date('date')->nullable();
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->integer('branch_id')->unsigned();
            $table->integer('room_id')->unsigned()->nullable();
            $table->integer('instructor_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('group_session_id')->references('id')->on('group_sessions');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('instructor_id')->references('id')->on('employees');
        });

        Schema::create('makeup_session_attendances', function (Blueprint $table) {
            $table->unsignedInteger('makeup_session_id');
            $table->unsignedInteger('attendance_id');

            $table->foreign('makeup_session_id')->references('id')->on('makeup_sessions')->onDelete('cascade');

            $table->primary(['makeup_session_id', 'attendance_id'], 'makeup_session_attendance_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('makeup_session_attendances');
        Schema::drop('makeup_sessions');
    }
}
