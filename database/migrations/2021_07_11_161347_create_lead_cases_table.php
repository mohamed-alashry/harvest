<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadCasesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id')->unsigned();
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('branch_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('label_id')->unsigned();
            $table->integer('label_type_id')->unsigned();
            $table->tinyInteger('type')->default(1)->comment('1 => Lead, 2 => Customer, 3 => Group');
            $table->string('serial');
            $table->tinyInteger('call_type')->default(1)->comment('1 => inbound, 2 => outbound');
            $table->string('feedback')->nullable();
            $table->string('other_feedback')->nullable();
            $table->date('feedback_date')->nullable();
            $table->string('action')->nullable();
            $table->string('other_action')->nullable();
            $table->text('notes');
            $table->tinyInteger('status')->default('0')->comment('0 => not done, 1 => done');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            // $table->foreign('student_id')->references('id')->on('group_students');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('label_id')->references('id')->on('labels');
            $table->foreign('label_type_id')->references('id')->on('label_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lead_cases');
    }
}
