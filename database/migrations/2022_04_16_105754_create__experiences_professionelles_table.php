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
        //
        Schema::create('ExperiencesProfessionelles',function(Blueprint $table){
            $table->id('id_Experience_Professionelle');
            $table->string('poste_Occupe_Experience', 50)->nullable();
            $table->string('nom_Entreprise_Experience',80)->nullable();
            $table->string('description_Experience',255)->nullable();
            $table->string('taches_Realisees_Experience',255)->nullable();
            $table->string('lieu_Travail_Experience',100)->nullable();
            $table->dateTime('date_Debut_Experience')->nullable();
            $table->dateTime('date_Fin_Experience')->nullable();
            $table->string('secteur_Experience',100)->nullable();
            $table->string('type_Contrat_Experience',20)->nullable();
            $table->unsignedBigInteger('candidat_id');
            $table->foreign('candidat_id')->references('id_Candidat')->on('Candidats')->OnDelete('cascade');
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
        //
        Schema::dropIfExists('ExperiencesProfessionelles');
    }
};
