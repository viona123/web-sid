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
            $table->integer('id_desa');
            $table->string('nik')->unique();
            $table->enum('status_dasar', ['HIDUP', 'MATI', 'PINDAH', 'HILANG']);
            $table->string('nama');
            $table->string('no_rumah_tangga')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->enum('status_penduduk', ['TETAP', 'TIDAK TETAP']);
            $table->string('ttl');
            $table->integer('umur');
            $table->string('pendidikan_ditempuh');
            $table->string('pekerjaan');
            $table->string('no_telp');
            $table->string('alamat_email');
            $table->string('alamat');
            $table->string('dusun');
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
