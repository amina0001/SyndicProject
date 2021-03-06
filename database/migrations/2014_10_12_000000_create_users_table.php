<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_num')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('photo')->default(env('USERS_STORAGE_PATH').'default.png')->nullable();

            $table->string('cin')->unique()->nullable();
            $table->integer('building_id')->unsigned();
            $table->enum('role',['Occupant','Syndic','admin']);
            $table->string('email',160)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
