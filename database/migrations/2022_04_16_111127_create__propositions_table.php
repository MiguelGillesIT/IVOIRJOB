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
        Schema::create('Propositions', function (Blueprint $table) {
            $table->id('id_Proposition');
            $table->string('reponse',100)->nullable();
            $table->string('photo_Proposition',255)->nullable();
            $table->boolean('statut_Solution')->default(false);
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id_Question')->on('Questions')->onDelete('cascade');
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
        Schema::dropIfExists('Propositions');
    }
};
