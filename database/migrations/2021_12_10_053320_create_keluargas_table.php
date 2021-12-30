<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_desa');
            $table->string('Nomor_KK');
            $table->string('kepala_keluarga');
            $table->string('NIK');
            $table->integer('Jumlah_Anggota_Keluarga');
            $table->string('Alamat');
            $table->string('Dusun');
            $table->integer('RW');
            $table->integer('RT');
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
        Schema::dropIfExists('keluargas');
    }
}
