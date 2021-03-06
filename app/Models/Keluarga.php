<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kepala() {
        return $this->hasOne(Sensus::class, 'nik', 'kepala_keluarga');
    }

    public function anggota() {
        return $this->hasMany(AnggotaKeluarga::class, 'no_kk', 'Nomor_KK');
    }

    public function bantuan() {
        return $this->hasMany(PenerimaBantuan::class, 'no_kk_penerima', 'Nomor_KK');
    }

    public function desa() {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
