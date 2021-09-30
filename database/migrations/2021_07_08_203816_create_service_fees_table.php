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
            $table->integer('payment_plan_id')->unsigned();
            $table->integer('fees');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('training_service_id')->references('id')->on('training_services');
            $table->foreign('payment_plan_id')->references('id')->on('payment_plans');
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
