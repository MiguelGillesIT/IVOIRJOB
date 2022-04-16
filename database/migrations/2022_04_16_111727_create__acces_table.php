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
        Schema::create('Acces', function (Blueprint $table) {
            $table->id('id_Acces');
            $table->unsignedBigInteger('fonctionnalite_id');
            $table->foreign('fonctionnalite_id')->references('id_Fonctionnalite')->on('Fonctionnalites')->onDelete('cascade');
            $table->unsignedBigInteger('groupe_id');
            $table->foreign('groupe_id')->references('id_Groupe')->on('Groupes')->onDelete('cascade');
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
        Schema::dropIfExists('Acces');
    }
};
