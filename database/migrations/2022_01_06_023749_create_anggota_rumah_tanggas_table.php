<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaRumahTanggasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_rumah_tanggas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_desa');
            $table->string('nik_anggota');
            $table->string('no_rt');
            $table->string('hubungan_rt');
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
        Schema::dropIfExists('anggota_rumah_tanggas');
    }
}
