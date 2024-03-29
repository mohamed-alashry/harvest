<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacementApplicantsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placement_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->unsignedInteger('branch_id');
            $table->string('gender')->comment('male, female');
            $table->string('job')->nullable();
            $table->string('university')->nullable();
            $table->decimal('vocabulary_score', 3, 1)->nullable();
            $table->decimal('grammar_score', 3, 1)->nullable();
            $table->decimal('reading_score', 3, 1)->nullable();
            $table->decimal('writing_score', 3, 1)->nullable();
            $table->decimal('listening_score', 3, 1)->nullable();
            $table->decimal('speaking_score', 3, 1)->nullable();
            $table->tinyInteger('level')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('new')->comment('new, done');
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('placement_applicants');
    }
}
