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
            $table->string('mobile_2');
            $table->string('email');
            $table->string('lead_source');
            $table->string('know_from');
            $table->string('preferred_time');
            $table->string('preferred_offer');
            $table->string('preferred_branch');
            $table->string('preferred_training_service');
            $table->text('notes');
            $table->string('nationality');
            $table->string('identification');
            $table->date('dob');
            $table->string('country');
            $table->string('governorate');
            $table->string('city');
            $table->string('university');
            $table->string('customer_job');
            $table->string('workplace');
            $table->text('full_address');
            $table->timestamps();
            $table->softDeletes();
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
