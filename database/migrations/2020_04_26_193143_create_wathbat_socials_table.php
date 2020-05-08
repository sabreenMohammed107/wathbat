<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWathbatSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wathbat_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook_url', 1000)->nullable();
            $table->string('twitter_url', 1000)->nullable();
            $table->string('linkedin_url', 1000)->nullable();
            $table->string('instgram_url', 1000)->nullable();
            $table->string('googleplus_url', 1000)->nullable();
            $table->string('youtube_url', 1000)->nullable();
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
        Schema::dropIfExists('wathbat_socials');
    }
}
