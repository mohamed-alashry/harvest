<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->time('time_from');
            $table->time('time_to');
            $table->string('pattern')->comment('AM, PM');
            $table->integer('sort')->unsigned();
            $table->tinyInteger('status')->default(1)->comment('0 => Inactive, 1 => active');
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
        Schema::drop('intervals');
    }
}
