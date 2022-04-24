<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Logs', function (Blueprint $table) {
            $table->id('id_Log');
            $table->string('action',70)->nullable();
            $table->ipAddress("userIpAddress");
            $table->macAddress("userMacAddress");
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('groupe_id');
            $table->foreign('groupe_id')->references('id_Groupe')->on('Groupes')->nullable();
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
        Schema::dropIfExists('Logs');
    }
}
