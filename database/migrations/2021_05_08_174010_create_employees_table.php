<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('email');
            $table->string('password');
            $table->integer('department_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });

        Schema::create('branches_employees', function (Blueprint $table) {
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('employee_id');

            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

            $table->primary(['branch_id', 'employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches_employees');
        Schema::drop('employees');
    }
}
