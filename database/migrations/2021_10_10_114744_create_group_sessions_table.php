<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupSessionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->date('date');
            $table->integer('room_id')->unsigned();
            $table->integer('instructor_id')->unsigned();
            $table->integer('interval_id')->unsigned();
            $table->bigInteger('level_id')->unsigned()->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 => cancelled, 1 => active, 2 => Done');

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('instructor_id')->references('id')->on('employees');
            $table->foreign('interval_id')->references('id')->on('intervals');
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
        Schema::drop('group_sessions');
    }
}
