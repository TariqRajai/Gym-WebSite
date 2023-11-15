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
        Schema::create('acceders', function (Blueprint $table) {
            $table->unsignedBigInteger('code_s');
            $table->unsignedBigInteger('Code_Abo');
            $table->integer('TarifMois');
            $table->timestamps();
        });
        Schema::table('acceders', function (Blueprint $table) {
            $table->foreign('code_s')
      ->references('CodeS')
      ->on('spotrs');
            $table->foreign('Code_Abo')
      ->references('CodeAbo')
      ->on('type_abonnements');
      

                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acceders');
    }
};
