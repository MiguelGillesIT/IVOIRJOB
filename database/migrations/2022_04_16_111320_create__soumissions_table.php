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
        Schema::create('Soumissions', function (Blueprint $table) {
            $table->id('id_Soumission');
            $table->dateTime('date_Soumission')->nullable();
            $table->unsignedBigInteger('candidat_id');
            $table->foreign('candidat_id')->references('id_Candidat')->on('Candidats')->onDelete('cascade');
            $table->unsignedBigInteger('fiche_id');
            $table->foreign('fiche_id')->references('id_Fiche')->on('Fiche_Postes')->onDelete('cascade');
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
        Schema::dropIfExists('Soumissions');
    }
};
