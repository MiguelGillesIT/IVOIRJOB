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
        Schema::create('Criteres', function (Blueprint $table) {
            $table->id('id_Critere');
            $table->string('libelle_Critere',50)->nullable();
            $table->boolean('statut_Critere')->default(false);
            $table->string('valeur_Critere',100)->nullable();
            $table->string('type_Critere',30)->nullable();
            $table->unsignedBigInteger('fiche_id');
            $table->foreign('fiche_id')->references('id_Fiche')->on('fiche_postes')->onDelete('cascade');
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
        Schema::dropIfExists('Criteres');
    }
};
