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
        Schema::create('Certifications',function(Blueprint $table){
            $table->id('id_Certification');
            $table->string('intitule_Certification',60)->nullable();
            $table->string('organisation_Certification',50)->nullable();
            $table->dateTime('date_Debut_Certification')->nullable();
            $table->dateTime('date_Fin_Certification')->nullable();
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
        Schema::dropIfExists('Certifications');
    }
};
