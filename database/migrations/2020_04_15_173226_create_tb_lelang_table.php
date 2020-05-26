<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLelangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lelang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('tb_barang')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('harga_akhir')->nullable();
            $table->UnsignedBigInteger('id_masyarakat')->nullable();
            $table->foreign('id_masyarakat')->references('id')->on('tb_masyarakat')->onUpdate('cascade')->onDelete('cascade');
            $table->UnsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('tb_petugas')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', [
                   'buka', 'tutup'
             ]);
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
        Schema::dropIfExists('tb_lelang');
    }
}
