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
        Schema::create('Parties',function(Blueprint $table){
            $table->id('id_Partie');
            $table->string('libelle_Partie',25)->nullable();
            $table->string('description_Partie',200)->nullable();
            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id_Quiz')->on('Quiz')->onDelete('cascade');
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
        Schema::dropIfExists('Parties');
    }
};
