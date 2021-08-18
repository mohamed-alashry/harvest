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
            $table->integer('branch_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('label_id')->unsigned();
            $table->integer('label_type_id')->unsigned();
            $table->string('serial');
            $table->string('feedback')->nullable();
            $table->string('other_feedback')->nullable();
            $table->string('action')->nullable();
            $table->string('other_action')->nullable();
            $table->text('notes');
            // $table->string('status');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
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
