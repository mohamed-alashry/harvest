<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubRoundsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('round_id')->unsigned();
            $table->date('start_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('round_id')->references('id')->on('rounds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_rounds');
    }
}
