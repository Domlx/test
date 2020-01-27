<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('exam_id');
            $table->string('question', 255);
            $table->string('additional_info')->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('order');
            $table->integer('type')->comment('type of the question: text, select, multiselect, etc');
            $table->boolean('active')->default(1);

            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exam')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_questions');
    }
}
