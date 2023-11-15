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
        Schema::create('coaches', function (Blueprint $table) {
            $table->increments('IdCoach');
            $table->string('Salaire')->nullable();
            $table->unsignedBigInteger('Id_Compte');
            $table->timestamps();
        });
        Schema::table('coaches', function (Blueprint $table) {
            $table->foreign('Id_Compte')
      ->references('IdComptes')
      ->on('comptes')
      ->where('role','coach');

                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaches');
    }
};
