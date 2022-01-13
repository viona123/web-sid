<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('kode_pos')->unique();
            $table->string('nik_kepala');
            $table->string('alamat_kantor');
            $table->string('email')->nullable();
            $table->string('no_telp');
            $table->string('website')->nullable();
            $table->string('nama_kecamatan');
            $table->integer('kode_kecamatan');
            $table->string('nama_camat');
            $table->string('nip_camat')->nullable();
            $table->string('nama_kabupaten');
            $table->integer('kode_kabupaten');
            $table->string('nama_provinsi');
            $table->integer('kode_provinsi');
            $table->string('lokasi')->default('0,0');
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
        Schema::dropIfExists('desas');
    }
}
