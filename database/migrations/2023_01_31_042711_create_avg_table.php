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
        Schema::create('avg_nilai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('mapel_id')->unsigned();
            $table->foreign('mapel_id')->references('id')->on('mapel')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('guru_mapel_id')->unsigned();
            $table->foreign('guru_mapel_id')->references('id')->on('guru_mapel')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('kategori_nilai_id')->unsigned();
            $table->foreign('kategori_nilai_id')->references('id')->on('kategori_nilai')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('avg_nilai');
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
        Schema::dropIfExists('avg_nilai');
    }
};
