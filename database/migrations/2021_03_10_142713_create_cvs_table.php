<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string("niveau_experience");
            $table->string("niveau_education");
            $table->string("status");
            $table->integer("salaire");
            $table->integer("nbre_annee");
            $table->UnsignedBigInteger('candidat_id')->unique();
            $table->foreign('candidat_id')->references('id')->on('candidats')
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
        Schema::dropIfExists('cvs');
    }
}
