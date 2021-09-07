<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('track_id');
            $table->unsignedInteger('course_id');
            $table->string('title');
            $table->string('pattern')->comment('AM, PM, MIX');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('tracks')->onDelete('cascade');
        });

        Schema::create('training_service_levels', function (Blueprint $table) {
            $table->unsignedInteger('training_service_id');
            $table->unsignedInteger('level_id');

            $table->foreign('training_service_id')->references('id')->on('training_services')->onDelete('cascade');

            $table->primary(['training_service_id', 'level_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('training_service_levels');
        Schema::drop('training_services');
    }
}
