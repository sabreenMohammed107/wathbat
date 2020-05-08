<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWathbatPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wathbat_portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 1000)->nullable();
            $table->integer('order')->nullable();
            $table->integer('portfolio_type_id')->unsigned()->nullable();
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
        Schema::dropIfExists('wathbat_portfolios');
    }
}
