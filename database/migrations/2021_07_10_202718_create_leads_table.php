<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gender');
            $table->string('mobile_1');
            $table->string('mobile_2')->nullable();
            $table->string('email')->nullable();
            $table->string('preferred_time');
            $table->integer('lead_source_id')->unsigned();
            $table->integer('know_channel_id')->unsigned();
            $table->integer('offer_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('training_service_id')->unsigned();
            $table->text('notes');
            $table->unsignedInteger('assigned_employee_id')->nullable();
            // $table->string('nationality');
            // $table->string('identification');
            // $table->date('dob');
            // $table->string('country');
            // $table->string('governorate');
            // $table->string('city');
            // $table->string('university');
            // $table->string('customer_job');
            // $table->string('workplace');
            // $table->text('full_address');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('lead_source_id')->references('id')->on('lead_sources');
            $table->foreign('know_channel_id')->references('id')->on('know_channels');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('training_service_id')->references('id')->on('training_services');
            $table->foreign('assigned_employee_id')->references('id')->on('employees')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leads');
    }
}
