<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->string('cv');
            $table->multiLineString('lettre_motivation')->nullable();
            $table->text('status');
            $table->UnsignedBigInteger('candidat_id');
            $table->foreign('candidat_id')->references('id')->on('candidats')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('emploi_id');
            $table->foreign('emploi_id')->references('id')->on('emplois')
                ->onDelete('cascade');
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
        Schema::dropIfExists('candidatures');
    }
}
