<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramBantuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_bantuans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->enum('sasaran', ['Penduduk Perorangan', 'Keluarga - KK', 'Rumah Tangga', 'Kelompok']);
            $table->string('nama_program');
            $table->string('keterangan');
            $table->enum('asal_dana', ['Pusat', 'Provinsi', 'Kab/Kota', 'Dana Desa', 'Lain-Lain']);
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->string('no_penerima')->nullable();
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
        Schema::dropIfExists('program_bantuans');
    }
}
