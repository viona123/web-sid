<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penerimaPerorangan() {
        return $this->belongsTo(Sensus::class, 'nik_penerima', 'nik');
    }

    public function penerimaKeluarga() {
        return $this->belongsTo(Keluarga::class, 'no_kk_penerima', 'Nomor_KK');
    }

    public function penerimaRumahTangga() {
        return $this->belongsTo(RumahTangga::class, 'no_rt_penerima', 'no_rt');
    }

    public function penerimaKelompok() {
        return $this->belongsTo(Kelompok::class, 'kode_kelompok_penerima', 'kode');
    }

    public function bantuan() {
        return $this->belongsTo(ProgramBantuan::class, 'bantuan_id');
    }

    public function desa() {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}