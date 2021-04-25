<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCritiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critiques', function (Blueprint $table) {
            $table->id();
            $table->text('critique');
            $table->boolean('visible')->default(false);
            $table->UnsignedBigInteger('candidature_id')->unique();
            $table->foreign('candidature_id')->references('id')->on('candidatures')
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
        Schema::dropIfExists('critiques');
    }
}
