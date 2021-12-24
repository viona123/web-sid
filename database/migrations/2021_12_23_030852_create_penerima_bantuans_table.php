<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaBantuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima_bantuans', function (Blueprint $table) {
            $table->id();
            $table->integer('bantuan_id');
            $table->string('nik_penerima')->nullable();
            $table->string('no_kk_penerima')->nullable();
            $table->string('kode_kelompok_penerima')->nullable();
            $table->string('no_rt_penerima')->nullable();
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
        Schema::dropIfExists('penerima_bantuans');
    }
}
