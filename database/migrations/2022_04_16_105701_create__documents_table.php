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
        Schema::create('Documents', function (Blueprint $table) {
            $table->id('id_Document');
            $table->string('type_Document',30)->nullable();
            $table->string('lien_Document',255)->nullable();
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
        Schema::dropIfExists('Documents');
    }
};
