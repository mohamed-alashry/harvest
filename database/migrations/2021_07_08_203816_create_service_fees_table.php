<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceFeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_service_id')->unsigned();
            $table->integer('timeframe_id')->unsigned();
            $table->integer('payment_method_id')->unsigned();
            $table->decimal('fees');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('training_service_id')->references('id')->on('training_services');
            $table->foreign('timeframe_id')->references('id')->on('timeframes');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_fees');
    }
}
