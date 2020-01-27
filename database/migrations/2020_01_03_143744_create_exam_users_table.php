<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_users', function (Blueprint $table) {
            $table->unsignedInteger('exam_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('expire_time')->nullable();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('exam_users', function(Blueprint $table){
            $table->dropForeign('exam_users_user_id_foreign');
            $table->dropForeign('exam_users_exam_id_foreign');
            $table->dropIfExists('exam_users');
        });
    }
}
