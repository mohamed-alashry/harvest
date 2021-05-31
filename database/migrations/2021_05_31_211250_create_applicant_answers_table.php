<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('placement_applicant_id');
            $table->unsignedInteger('placement_question_id');
            $table->string('type')->default('text')->comment('text, file');
            $table->text('answer');
            $table->decimal('score', 2, 1)->nullable();
            $table->timestamps();

            $table->foreign('placement_applicant_id')->references('id')->on('placement_applicants')->onDelete('cascade');
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
        Schema::dropIfExists('applicant_answers');
    }
}
