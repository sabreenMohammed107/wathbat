<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_name', 1000)->nullable();
            $table->string('en_name', 1000)->nullable();
            $table->string('ar_position', 1000)->nullable();
            $table->string('en_position', 1000)->nullable();
            $table->text('client_ar_review')->nullable();
            $table->text('client_en_review')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_reviews');
    }
}
