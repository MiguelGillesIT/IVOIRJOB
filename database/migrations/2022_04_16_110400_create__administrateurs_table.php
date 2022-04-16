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
        Schema::create('Administrateurs', function (Blueprint $table) {
            $table->id('id_Administrateur');
            $table->string('nom_Administrateur',20)->nullable();
            $table->string('prenoms_Administrateur',30)->nullable();
            $table->string('e_mail_Administrateur',40)->unique();
            $table->string('service_Administrateur',30)->nullable();
            $table->string('password',255);
            $table->boolean('statut_Administrateur');
            $table->dateTime('date_Verrouillage_Administrateur')->nullable();
            $table->dateTime('date_Deverrouillage_Administrateur')->nullable();
            $table->unsignedBigInteger('groupe_id');
            $table->foreign('groupe_id')->references('id_Groupe')->on('Groupes')->nullable();
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
        Schema::dropIfExists('Administrateurs');
    }
};
