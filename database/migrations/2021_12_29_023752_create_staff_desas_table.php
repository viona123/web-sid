<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_desas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_desa');
            $table->string('nik_staff');
            $table->string('nipd')->nullable();
            $table->string('nip')->nullable();
            $table->string('jabatan');
            $table->string('periode_jabatan');
            $table->string('no_sk_pengangkatan');
            $table->date('tanggal_sk_pengangkatan');
            $table->string('no_sk_pemberhentian');
            $table->date('tanggal_sk_pemberhentian');
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
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
        Schema::dropIfExists('staff_desas');
    }
}
