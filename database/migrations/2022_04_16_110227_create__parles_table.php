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
        Schema::create('Parles', function (Blueprint $table) {
            $table->id('id_Parle');
            $table->string('niveau_Langue',20)->nullable();
            $table->boolean('statut_Langue')->default(true);
            $table->unsignedBigInteger('candidat_id');
            $table->unsignedBigInteger('langue_id');
            $table->foreign('candidat_id')->references('id_Candidat')->on('Candidats')->OnDelete('cascade');
            $table->foreign('langue_id')->references('id_Langue')->on('Langues')->OnDelete('cascade');
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
        Schema::dropIfExists('Parles');
    }
};
