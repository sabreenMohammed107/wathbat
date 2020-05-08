<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_sector', 1000)->nullable();
            $table->string('ar_sector', 1000)->nullable();
            $table->integer('type_style_id')->unsigned()->nullable();
            $table->double('aluminium_thickness', 10, 2);
            $table->double('glass', 10, 2);
            $table->double('price_per_meter', 10, 2);
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
        Schema::dropIfExists('sector_types');
    }
}
