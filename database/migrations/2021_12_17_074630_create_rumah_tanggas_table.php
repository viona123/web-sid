<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahTanggasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_tanggas', function (Blueprint $table) {
            $table->id();
            $table->string('no_rt');
            $table->string('nik_kepala_rt');
            $table->string('alamat');
            $table->string('dusun');
            $table->integer('rw');
            $table->integer('rt');
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
        Schema::dropIfExists('rumah_tanggas');
    }
}
