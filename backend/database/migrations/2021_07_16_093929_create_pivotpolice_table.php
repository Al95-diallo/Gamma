<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotpoliceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivotpolices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charges_id')->nullable();
            $table->foreign('charges_id')->references('id')->on('charges')->onDelete('SET NULL');
            $table->unsignedBigInteger('assuree_id')->nullable();
            $table->foreign('assuree_id')->references('id')->on('assurees')->onDelete('SET NULL');
            $table->unsignedBigInteger('polices_id')->nullable();
            $table->foreign('polices_id')->references('id')->on('polices')->onDelete('SET NULL');
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
        Schema::dropIfExists('pivotpolice');
    }
}
