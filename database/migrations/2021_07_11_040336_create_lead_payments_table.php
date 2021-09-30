<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadPaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_id');
            $table->morphs('paymentable');
            $table->integer('amount');
            $table->integer('discount')->nullable();
            $table->integer('payment_plan_id')->unsigned();
            $table->tinyInteger('print_count')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('payment_plan_id')->references('id')->on('payment_plans');
        });

        Schema::create('sub_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_payment_id');
            $table->integer('amount');
            $table->integer('payment_method_id')->unsigned()->nullable();
            $table->string('reference_num')->nullable();
            $table->date('due_date');
            $table->tinyInteger('paid')->default(0);
            $table->timestamps();

            $table->foreign('lead_payment_id')->references('id')->on('lead_payments')->onDelete('cascade');
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
        Schema::drop('sub_payments');
        Schema::drop('lead_payments');
    }
}
