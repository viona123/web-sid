<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_desa');
            $table->string('nik_anggota');
            $table->string('no_kk');
            $table->string('no_kk_sebelumnya');
            $table->string('hubungan_keluarga');
            $table->string('anak_ke')->nullable();
            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->string('pendidikan');
            $table->string('status_kawin');
            $table->date('tanggal_perkawinan')->nullable();
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
        Schema::dropIfExists('anggota_keluargas');
    }
}
