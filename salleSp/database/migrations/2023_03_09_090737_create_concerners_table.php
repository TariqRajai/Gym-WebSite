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
        Schema::create('concerners', function (Blueprint $table) {
        
        $table->unsignedBigInteger('No_Salle');
        $table->foreign('No_Salle')->references('NoSalle')->on('salles');
        $table->unsignedBigInteger('Id_Sport');
        $table->foreign('Id_Sport')->references('CodeS')->on('sports');
        $table->unsignedBigInteger('Id_Seance')->nullable();
        $table->foreign('Id_seance')->references('IdSeance')->on('seances');
        
        Schema::enableForeignKeyConstraints();
        
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
        Schema::dropIfExists('concerners');
       
    }
};
