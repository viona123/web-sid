<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentasiPembangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi_pembangunans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_desa');
            $table->integer('id_pembangunan');
            $table->integer('persentase');
            $table->text('keterangan');
            $table->date('tanggal_rekam');
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
        Schema::dropIfExists('dokumentasi_pembangunans');
    }
}
