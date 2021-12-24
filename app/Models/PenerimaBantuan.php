<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penerimaPerorangan() {
        return $this->hasOne(Sensus::class, 'nik', 'nik_penerima');
    }

    public function penerimaKeluarga() {
        return $this->hasOne(Keluarga::class, 'Nomor_KK', 'no_kk_penerima');
    }

    public function penerimaRumahTangga() {
        return $this->hasOne(RumahTangga::class, 'no_rt', 'no_rt_penerima');
    }

    public function penerimaKelompok() {
        return $this->hasOne(Kelompok::class, 'kode', 'kode_kelompok_penerima');
    }
}