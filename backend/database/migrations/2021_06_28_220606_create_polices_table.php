<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polices', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('types');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->string('montant');
            $table->unsignedBigInteger('souscripteur_id');
            $table->foreign('souscripteur_id')->references('id')->on('souscripteurs')->onDelete('SET NULL');
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
        Schema::dropIfExists('polices');
    }
}
