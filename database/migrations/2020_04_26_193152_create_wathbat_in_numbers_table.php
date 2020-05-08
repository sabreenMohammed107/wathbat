<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWathbatInNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wathbat_in_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_name',250)->nullable();
            $table->string('ar_name',250)->nullable();
            $table->integer('value')->nullable();
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
        Schema::dropIfExists('wathbat_in_numbers');
    }
}
