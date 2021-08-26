<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('track_id');
            $table->unsignedInteger('course_id');
            $table->integer('round_id')->unsigned();
            $table->integer('discipline_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->integer('instructor_id')->unsigned();
            $table->integer('interval_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('track_id')->references('id')->on('tracks');
            $table->foreign('course_id')->references('id')->on('tracks');
            $table->foreign('round_id')->references('id')->on('rounds');
            $table->foreign('discipline_id')->references('id')->on('discipline_categories');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('instructor_id')->references('id')->on('employees');
            $table->foreign('interval_id')->references('id')->on('intervals');
        });

        Schema::create('group_levels', function (Blueprint $table) {
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('level_id');

            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

            $table->primary(['group_id', 'level_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('group_levels');
        Schema::drop('groups');
    }
}
