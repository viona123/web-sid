<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembangunans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_desa');
            $table->string('sumber_dana');
            $table->string('nama');
            $table->string('volume');
            $table->integer('tahun_anggaran');
            $table->string('anggaran');
            $table->string('pelaksana');
            $table->string('lokasi');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
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
        Schema::dropIfExists('pembangunans');
    }
}
