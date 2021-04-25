<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->integer('note');
            $table->UnsignedBigInteger('test_id')->unique();
            $table->foreign('test_id')->references('id')->on('tests')
                ->onDelete('cascade');
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
        Schema::dropIfExists('notes');
    }
}
