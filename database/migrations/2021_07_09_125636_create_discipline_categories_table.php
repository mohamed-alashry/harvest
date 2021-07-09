<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplineCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipline_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('max_student');
            $table->tinyInteger('status')->default(1)->comment('0 => Inactive, 1 => active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('discipline_items', function (Blueprint $table) {
            $table->unsignedInteger('discipline_id');
            $table->unsignedInteger('item_id');

            $table->foreign('discipline_id')->references('id')->on('discipline_categories')->onDelete('cascade');

            $table->primary(['discipline_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('discipline_items');
        Schema::drop('discipline_categories');
    }
}
