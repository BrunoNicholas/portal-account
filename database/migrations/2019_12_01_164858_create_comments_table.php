<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->nullable()->unsigned()->index()->index();
            $table->bigInteger('question_id')->nullable()->unsigned()->index()->index();
            $table->bigInteger('company_id')->nullable()->unsigned()->index()->index();
            $table->bigInteger('job_application_id')->nullable()->unsigned()->index()->index();
            $table->bigInteger('order_id')->nullable()->unsigned()->index()->index();
            $table->bigInteger('style_id')->nullable()->unsigned()->index()->index();
            $table->bigInteger('user_id')->nullable()->unsigned()->index();
            $table->text('comment');
            $table->string('status')->nullable()->default('pending');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('job_application_id')->references('id')->on('job_applications')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
