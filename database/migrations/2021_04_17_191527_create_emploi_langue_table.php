<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploiLangueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emploi_langue', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('langue_id');
            $table->foreign('langue_id')->references('id')->on('langues')
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
        Schema::dropIfExists('emploi_langue');
    }
}
