<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacementAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placement_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('placement_question_id');
            $table->text('answer');
            $table->tinyInteger('is_correct')->default(0);
            $table->timestamps();

            $table->foreign('placement_question_id')->references('id')->on('placement_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placement_answers');
    }
}
