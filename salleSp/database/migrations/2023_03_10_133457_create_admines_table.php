<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('IdAdmin');
            $table->unsignedInteger('Id_Compte');
            $table->timestamps();
        });
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('Id_Compte')
      ->references('IdComptes')
      ->on('comptes')
      ->where('role','admin');

                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
