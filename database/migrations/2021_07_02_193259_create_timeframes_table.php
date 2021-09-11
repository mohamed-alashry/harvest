<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeframesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeframes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('total_hours');
            $table->integer('session_hours');
            $table->integer('week_session');
            $table->string('days');
            $table->tinyInteger('status')->default(1)->comment('0 => Inactive, 1 => active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('interval_timeframe', function (Blueprint $table) {
            $table->unsignedInteger('timeframe_id');
            $table->unsignedInteger('interval_id');

            $table->foreign('timeframe_id')->references('id')->on('timeframes')->onDelete('cascade');

            $table->primary(['timeframe_id', 'interval_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('interval_timeframe');
        Schema::drop('timeframes');
    }
}
