<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->bigInteger('jenis_buku_id')->unsigned();
            $table->foreign('jenis_buku_id')->references('id')->on('jenis_buku')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('pengarang_id')->unsigned();
            $table->foreign('pengarang_id')->references('id')->on('pengarang')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('penerbit_id')->unsigned();
            $table->foreign('penerbit_id')->references('id')->on('penerbit')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('tahun_terbit_id')->unsigned();
            $table->foreign('tahun_terbit_id')->references('id')->on('tahun_terbit')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sinopsis')->nullable();
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
        Schema::dropIfExists('buku');
    }
}
