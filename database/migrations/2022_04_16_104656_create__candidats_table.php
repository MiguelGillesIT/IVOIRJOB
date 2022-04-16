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
        Schema::create('Candidats',function(Blueprint $table){
            $table->id('id_Candidat');
            $table->string('nom_Candidat',20);
            $table->string('prenoms_Candidat',30);
            $table->string('e_mail_Candidat',40)->unique();
            $table->string('password',255);
            $table->boolean('statut_Candidat');
            $table->dateTime('date_Verrouillage_Candidat')->nullable();
            $table->dateTime('date_Deverrouillage_Candidat')->nullable();
            $table->dateTime('date_Naissance_Candidat')->nullable();
            $table->string('nationalite_Candidat',20)->nullable();
            $table->string('sexe_Candidat',10)->nullable();
            $table->string('photo_Candidat',255)->nullable();
            $table->string('telephone_Candidat',15);
            $table->string('situation_Matrimoniale_Candidat',30)->nullable();
            $table->string('permis_Candidat',15)->nullable();
            $table->string('lieu_Residence_Candidat',30)->nullable();
            $table->string('numero_Piece_Candidat',20)->nullable();
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
        Schema::dropIfExists('Candidats');
    }
};
