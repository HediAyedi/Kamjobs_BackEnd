<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploiEmploiTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emploi_emploi_type', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('emploi_type_id');
            $table->foreign('emploi_type_id')->references('id')->on('emploi_types')
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
        Schema::dropIfExists('emploi_emploi_type');
    }
}
