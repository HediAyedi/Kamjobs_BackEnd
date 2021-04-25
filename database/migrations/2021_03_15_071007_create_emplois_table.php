<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->string('genre');
            $table->string('experience');
            $table->string('niveau_education');
            $table->text('description_emploi');
            $table->string('exigence_emploi');
            $table->boolean('etat');
            $table->UnsignedBigInteger('employeur_id');
            $table->foreign('employeur_id')->references('id')->on('employeurs')
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
        Schema::dropIfExists('emplois');
    }
}
