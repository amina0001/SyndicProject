<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetteLocauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recette_locaux', function (Blueprint $table) {
            $table->increments('id');
            $table->String('category');
            $table->String('nom');
            $table->integer('building_id');
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->date('date')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('recette_locaux');
    }
}
