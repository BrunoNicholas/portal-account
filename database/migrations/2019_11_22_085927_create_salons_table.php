<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('categories_id')->nullable()->unsigned()->index();
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
            $table->bigInteger('user_id')->nullable()->unsigned()->index();
            $table->string('salon_name');
            $table->text('description')->nullable();
            $table->string('salon_email');
            $table->string('salon_telephone')->nullable();
            $table->string('salon_website')->nullable();
            $table->string('salon_category')->nullable();
            $table->string('salon_location')->nullable();
            $table->string('salon_gps')->nullable();
            $table->boolean('accept_cash')->nullable();
            $table->boolean('accept_bookings')->nullable();
            $table->boolean('accept_orders')->nullable();
            $table->boolean('accept_job_applicants')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salons');
    }
}
