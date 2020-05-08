<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SectorRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //  This is Realations for the type_styles Table ..
     Schema::table('type_styles', function (Blueprint $table) {
        $table->foreign('type_id')->references('id')->on('types');
       
    });

      //  This is Realations for the sector_types Table ..
      Schema::table('sector_types', function (Blueprint $table) {
        $table->foreign('type_style_id')->references('id')->on('type_styles');
       
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
