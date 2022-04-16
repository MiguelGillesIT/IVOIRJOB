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
        Schema::create('Questions',function(Blueprint $table){
            $table->id('id_Question');
            $table->string('type_Question',10)->nullable();
            $table->text('libelle_Question')->nullable();
            $table->string('photo_Question',255)->nullable();
            $table->string('duree_Question',5)->nullable();
            $table->string('point_Question',5)->nullable();
            $table->unsignedBigInteger('partie_id');
            $table->foreign('partie_id')->references('id_Partie')->on('Parties')->onDelete('cascade');
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
        Schema::dropIfExists('Questions');
    }
};
