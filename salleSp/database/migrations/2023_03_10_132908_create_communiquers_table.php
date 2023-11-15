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
        Schema::create('communiquers', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('image', 300)->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('idComptes')->on('comptes')->where('role','admin');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('idComptes')->on('comptes')->where('role','user');
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
        Schema::dropIfExists('communiquers');
    }
};

