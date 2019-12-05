<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('categories_id')->nullable()->unsigned()->index();
            $table->bigInteger('salon_id')->nullable()->unsigned()->index();
            $table->bigInteger('style_id')->nullable()->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('style_name');
            $table->text('description')->nullable();
            $table->float('previous_price')->nullable();
            $table->float('current_price')->nullable();
            $table->string('status')->default('available');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('salon_id')->references('id')->on('salons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('styles');
    }
}
