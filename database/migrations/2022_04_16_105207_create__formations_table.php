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
        Schema::create('Formations',function(Blueprint $table){
            $table->id('id_Formation');
            $table->string('intitule_Formation',80)->nullable();
            $table->string('etablissement_Formation',50)->nullable();
            $table->string('diplome_Formation',50)->nullable();
            $table->string('lieu_Formation',30)->nullable();
            $table->dateTime('date_Debut_Formation')->nullable();
            $table->dateTime('date_Fin_Formation')->nullable();
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
        Schema::drop('Formations');
    }
};
