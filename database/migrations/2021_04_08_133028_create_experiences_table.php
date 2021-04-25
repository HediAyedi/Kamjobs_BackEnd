<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->integer("nbre_annee");
            $table->string("nom_entreprise");
            $table->string("poste");
            $table->text("description");
            $table->date("date_debut");
            $table->date("date_fin")->nullable();
            $table->UnsignedBigInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cvs')
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
        Schema::dropIfExists('experiences');
    }
}
