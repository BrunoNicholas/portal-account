<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
            $table->bigInteger('shop_id')->nullable()->unsigned()->index();
            $table->bigInteger('salon_id')->nullable()->unsigned()->index();
            $table->bigInteger('style_id')->nullable()->unsigned()->index();
            $table->bigInteger('product_id')->nullable()->unsigned()->index();
            $table->string('gallery_name');
            $table->text('description')->nullable();
            $table->bigInteger('gallery_id')->nullable()->unsigned()->index();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('status')->default('visible');
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');$table->foreign('company_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('salon_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('galleries');
    }
}
