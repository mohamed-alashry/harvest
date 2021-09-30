<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('fees');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('track_id');
            $table->unsignedInteger('course_id');
            $table->integer('payment_plan_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->foreign('payment_plan_id')->references('id')->on('payment_plans');
        });

        Schema::create('offer_timeframes', function (Blueprint $table) {
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('timeframe_id');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });

        Schema::create('offer_intervals', function (Blueprint $table) {
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('interval_id');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->primary(['offer_id', 'interval_id'], 'offer_interval_primary');
        });

        Schema::create('offer_branches', function (Blueprint $table) {
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('branch_id');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->primary(['offer_id', 'branch_id']);
        });

        Schema::create('offer_disciplines', function (Blueprint $table) {
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('discipline_id');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->primary(['offer_id', 'discipline_id']);
        });

        Schema::create('offer_items', function (Blueprint $table) {
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('item_id');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->primary(['offer_id', 'item_id']);
        });

        Schema::create('offer_services', function (Blueprint $table) {
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('service_id');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->primary(['offer_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offer_services');
        Schema::drop('offer_items');
        Schema::drop('offer_disciplines');
        Schema::drop('offer_branches');
        Schema::drop('offer_intervals');
        Schema::drop('offer_timeframes');
        Schema::drop('offers');
    }
}
