<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscripteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscripteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('Adresse');
            $table->string('telephone');
            $table->string('email');
            $table->string('nb_adherant');
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
        Schema::dropIfExists('souscripteurs');
    }
}
