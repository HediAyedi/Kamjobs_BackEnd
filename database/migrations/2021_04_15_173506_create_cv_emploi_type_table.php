<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvEmploiTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_emploi_type', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cvs')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('emploi_type_id');
            $table->foreign('emploi_type_id')->references('id')->on('emploi_types')
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
        Schema::table('cv_emploi_type', function (Blueprint $table) {
            //
        });
    }
}
