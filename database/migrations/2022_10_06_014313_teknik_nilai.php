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
        Schema::create('teknik_nilai', function (Blueprint $table) {
            $table->id();
            $table->string('teknik');
            $table->bigInteger('kategori_nilai_id')->unsigned();
            $table->foreign('kategori_nilai_id')->references('id')->on('kategori_nilai')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('teknik_nilai');
    }
};
