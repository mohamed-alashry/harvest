<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupSessionAttendancesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_session_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_id');
            $table->unsignedInteger('group_session_id');
            $table->unsignedInteger('group_id');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->tinyInteger('attendance')->nullable()->comment('1 => present, 0 => absent');
            $table->boolean('need_makeup')->default(0);

            $table->foreign('lead_id')->references('id')->on('leads');
            $table->foreign('group_session_id')->references('id')->on('group_sessions');
            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::drop('group_session_attendances');
    }
}
