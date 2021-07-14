<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->morphs('installmentable');
            $table->integer('deposit');
            $table->integer('first_payment')->nullable();
            $table->tinyInteger('first_due_date')->nullable()->comment('after how many months. 13 => 1 week, 14 => 2 weeks');
            $table->integer('second_payment')->nullable();
            $table->tinyInteger('second_due_date')->nullable()->comment('after how many months. 13 => 1 week, 14 => 2 weeks');
            $table->integer('third_payment')->nullable();
            $table->tinyInteger('third_due_date')->nullable()->comment('after how many months. 13 => 1 week, 14 => 2 weeks');
            $table->integer('fourth_payment')->nullable();
            $table->tinyInteger('fourth_due_date')->nullable()->comment('after how many months. 13 => 1 week, 14 => 2 weeks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
}
