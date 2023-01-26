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
        Schema::create('nama_nilai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('teknik_nilai_id')->unsigned();
            $table->foreign('teknik_nilai_id')->references('id')->on('teknik_nilai')->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('nama_nilai');
    }
};
