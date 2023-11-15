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
        Schema::create('abonners', function (Blueprint $table) {
            $table->date('DateDebut');
            $table->unsignedBigInteger('Code_Abo');
            $table->foreign('Code_Abo')->references('CodeAbo')->on('type_abonnements');
            $table->unsignedBigInteger('Id_Client');
            $table->foreign('Id_Client')->references('Id_Compte')->on('clients');
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
        Schema::dropIfExists('abonners');
    }
};
