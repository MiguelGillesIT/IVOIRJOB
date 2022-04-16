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
        Schema::create('Fiche_Postes', function (Blueprint $table) {
            $table->id('id_Fiche');
            $table->string('libelle_Fiche',60)->nullable();
            $table->text('description_Fiche')->nullable();
            $table->string('type_Offre',15)->nullable();
            $table->dateTime('date_Limite_Candidature')->nullable();
            $table->unsignedBigInteger('administrateur_id');
            $table->foreign('administrateur_id')->references('id_Administrateur')->on('Administrateurs')->nullable();
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
        Schema::dropIfExists('Fiche_Postes');
    }
};
