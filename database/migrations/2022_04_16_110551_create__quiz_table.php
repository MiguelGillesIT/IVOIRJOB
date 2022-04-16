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
        Schema::create('Quiz', function (Blueprint $table) {
            $table->id('id_Quiz');
            $table->string('intitule_Quiz',50)->nullable();
            $table->string('score_Minimal_Quiz',5)->nullable();
            $table->dateTime('date_Limite_Quiz')->nullable();
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
        //
        Schema::dropIfExists('Quiz');
    }
};
