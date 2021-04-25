<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvDomaineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_domaine', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cvs')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('domaine_id');
            $table->foreign('domaine_id')->references('id')->on('domaines')
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
        Schema::table('cv_domaine', function (Blueprint $table) {
            //
        });
    }
}
