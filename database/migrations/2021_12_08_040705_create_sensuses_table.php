<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensuses', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->enum('status_dasar', ['HIDUP', 'MATI', 'PINDAH', 'HILANG']);
            $table->string('nama');
            $table->string('no_kk');
            $table->string('no_kk_sebelumnya');
            $table->string('hubungan_keluarga');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->enum('status_penduduk', ['TETAP', 'TIDAK TETAP']);
            $table->string('ttl');
            $table->integer('umur');
            $table->integer('anak_ke');
            $table->string('pendidikan_kk');
            $table->string('pendidikan_ditempuh');
            $table->string('pekerjaan');
            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->string('no_telp');
            $table->string('alamat_email');
            $table->string('alamat');
            $table->string('dusun');
            $table->string('status_kawin');
            $table->date('tanggal_perkawinan')->nullable();
            $table->date('tanggal_terdaftar');
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
        Schema::dropIfExists('sensuses');
    }
}
