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
        Schema::create('comptes', function (Blueprint $table) {
            $table->increments('IdComptes');
            $table->string('email');
            $table->string('password');
            $table->string('nom', 20);
            $table->string('prenom', 20);
            $table->string('cni', 8);
            $table->integer('tele');
            $table->string('image', 300)->nullable();
            $table->string('gender', 20);
            $table->string('role')->default('user'); 
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
        Schema::dropIfExists('comptes');
    }
};
