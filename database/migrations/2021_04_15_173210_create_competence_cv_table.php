<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_cv', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cvs')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('competence_id');
            $table->foreign('competence_id')->references('id')->on('competences')
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
        Schema::table('competence_cv', function (Blueprint $table) {
            //
        });
    }
}
