<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDusunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dusuns', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kepala_dusun');
            $table->integer('jumlah_rw');
            $table->integer('jumlah_rt');
            $table->integer('jumlah_kk');
            $table->integer('jumlah_lp');
            $table->integer('jumlah_l');
            $table->integer('jumlah_p');
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
        Schema::dropIfExists('dusuns');
    }
}
