<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_category_id')->unsigned();
            $table->integer('payment_plan_id')->unsigned();
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('item_category_id')->references('id')->on('item_categories');
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
        Schema::drop('extra_items');
    }
}
