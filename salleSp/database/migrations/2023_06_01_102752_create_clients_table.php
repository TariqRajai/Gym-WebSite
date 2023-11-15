<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('IdClient');
            $table->unsignedInteger('Id_Compte');
            $table->string('etat')->default('nonPaye'); 

            $table->timestamps();
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('Id_Compte')
      ->references('IdComptes')
      ->on('comptes')
      ->where('role','user');

                
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('clients');
    }
};