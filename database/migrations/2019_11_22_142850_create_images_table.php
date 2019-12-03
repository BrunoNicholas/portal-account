<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
            $table->bigInteger('shop_id')->nullable()->unsigned()->index();
            $table->bigInteger('salon_id')->nullable()->unsigned()->index();
            $table->bigInteger('style_id')->nullable()->unsigned()->index();
            $table->bigInteger('product_id')->nullable()->unsigned()->index();
            $table->bigInteger('gallery_id')->nullable()->unsigned()->index();
            $table->string('image');
            $table->text('caption')->nullable();
            $table->string('title')->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('salon_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
