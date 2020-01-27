<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamUsersAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_users_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('exam_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->enum('type', [1, 2, 3])->comment('question type: 1 - text, 2 - multiselect, 3 - select');
            $table->bigInteger('option_id')->nullable();
            $table->text('answer_text')->nullable();
            $table->timestamps();
        });

        Schema::table('exam_users_answers', function (Blueprint $table){
            $table->foreign('exam_id')->references('id')->on('exam');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('question_id')->references('id')->on('exam_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_users_answers', function (Blueprint $table){
            $table->dropForeign('exam_users_answers_exam_id_foreign');
            $table->dropForeign('exam_users_answers_user_id_foreign');
            $table->dropForeign('exam_users_answers_question_id_foreign');
        });

        Schema::dropIfExists('exam_users_answers');
    }
}
