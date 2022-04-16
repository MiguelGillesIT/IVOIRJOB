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
        Schema::create('Suivis', function (Blueprint $table) {
            $table->id('id_Suivi');
            $table->dateTime('date_Participation_Etape')->nullable();
            $table->string('Score_Etape',10)->nullable();
            $table->boolean('validation_Etape')->default(false);
            $table->string('lien_Etape',150)->nullable();
            $table->unsignedBigInteger('etape_id');
            $table->foreign('etape_id')->references('id_Etape')->on('Etapes')->onDelete('cascade');
            $table->unsignedBigInteger('soumission_id');
            $table->foreign('soumission_id')->references('id_Soumission')->on('Soumissions')->onDelete('cascade');
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
        Schema::dropIfExists('Suivis');
    }
};
