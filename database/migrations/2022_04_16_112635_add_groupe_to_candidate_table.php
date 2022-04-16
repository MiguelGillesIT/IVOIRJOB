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
        Schema::table('Candidats', function (Blueprint $table) {
            $table->unsignedBigInteger('groupe_id');
            $table->foreign('groupe_id')->references('id_Groupe')->on('Groupes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Candidats', function (Blueprint $table) {
            $table->dropColumn('groupe_id');
        });
    }
};
