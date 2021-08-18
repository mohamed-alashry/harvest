<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('label_id')->unsigned();
            $table->tinyInteger('status')->default(1)->comment('0 => Inactive, 1 => active');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('label_types');
    }
}
