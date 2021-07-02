<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedTinyInteger('levels')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 => Inactive, 1 => active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')->references('id')->on('tracks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tracks');
    }
}
