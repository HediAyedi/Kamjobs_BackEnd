<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangueProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langue_profile', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')
                ->onDelete('cascade');
            $table->UnsignedBigInteger('langue_id');
            $table->foreign('langue_id')->references('id')->on('langues')
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
        Schema::dropIfExists('langue_profile');
    }
}
