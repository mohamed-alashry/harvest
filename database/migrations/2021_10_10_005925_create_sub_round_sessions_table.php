<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubRoundSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_round_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('sub_round_id')->unsigned();
            $table->date('date');
            $table->foreign('sub_round_id')->references('id')->on('sub_rounds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_round_sessions');
    }
}
