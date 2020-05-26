<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_masyarakat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lengkap', 30);
            $table->string('username', 20);
            $table->string('password', 100);
            $table->string('telp', 12);
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
        Schema::dropIfExists('tb_masyarakat');
    }
}
