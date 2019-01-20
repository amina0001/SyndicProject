<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->increments('id');
            $table->float('user_id')->unsigned()->nullable();
            $table->string('description')->nullable();
            $table->integer('price')->nullable();
            $table->date('date')->nullable();
            $table->string('image')->nullable();            
            $table->timestamps();
        });
    }
   /**
     * obtient le technicien du commande
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recettes');
    }
}
