<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('mapel_id')->unsigned();
            $table->foreign('mapel_id')->references('id')->on('mapel')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('nama_nilai_id')->unsigned();
            $table->foreign('nama_nilai_id')->references('id')->on('nama_nilai')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('nilai');
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
        Schema::dropIfExists('nilai_siswa');
    }
};
