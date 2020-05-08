<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  This is Realations for the wathbat_portfolios Table ..
     Schema::table('wathbat_portfolios', function (Blueprint $table) {
        $table->foreign('portfolio_type_id')->references('id')->on('portfolio_types');
       
    });

      //  This is Realations for the project_sliders Table ..
      Schema::table('project_sliders', function (Blueprint $table) {
        $table->foreign('project_id')->references('id')->on('wathbat_projects');
       
    });

     //  This is Realations for the project_galleries Table ..
     Schema::table('project_galleries', function (Blueprint $table) {
        $table->foreign('project_id')->references('id')->on('wathbat_projects');
       
    });

     //  This is Realations for the wathbat_projects Table ..
     Schema::table('wathbat_projects', function (Blueprint $table) {
        $table->foreign('project_type_id')->references('id')->on('project_types');
        $table->foreign('alumital_type_id')->references('id')->on('project_alumital_types');
       
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
