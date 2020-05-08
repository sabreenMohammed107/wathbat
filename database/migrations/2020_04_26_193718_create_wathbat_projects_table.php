<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWathbatProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wathbat_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_ar_name', 1000)->nullable();
            $table->string('project_en_name', 1000)->nullable();
            $table->dateTime('project_date', 6)->nullable();
            $table->string('master_poster', 1000)->nullable();
            $table->text('project_ar_details')->nullable();
            $table->text('project_en_details')->nullable();
            $table->text('about_ar_project')->nullable();
            $table->text('about_en_project')->nullable();
            $table->text('about_ar_customer')->nullable();
            $table->text('about_en_customer')->nullable();
            $table->integer('project_type_id')->unsigned()->nullable();
            $table->integer('alumital_type_id')->unsigned()->nullable();
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
        Schema::dropIfExists('wathbat_projects');
    }
}
