<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryLelangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_lelang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_lelang');
            $table->foreign('id_lelang')->references('id')->on('tb_lelang')->onDelete('cascade');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('tb_barang')->onDelete('cascade');
            $table->unsignedBigInteger('id_masyarakat');
            $table->foreign('id_masyarakat')->references('id')->on('tb_masyarakat')->onDelete('cascade');
            $table->integer('penawaran_harga')->length(20);
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
        Schema::dropIfExists('history_lelang');
    }
}
