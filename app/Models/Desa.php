<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    public function pengurus() {
        return $this->hasMany(StaffDesa::class, 'id_desa');
    }

    public function admin() {
        return $this->hasMany(User::class, 'id_desa');
    }

    public function dusun() {
        return $this->hasMany(Dusun::class, 'id_desa');
    }

    public function kepala() {
        return $this->belongsTo(Sensus::class, 'nik_kepala', 'nik');
    }

    public function kategoriKelompok() {
        return $this->hasMany(KategoriKelompok::class, 'id_desa');
    }

    public function kelompok() {
        return $this->hasMany(Kelompok::class, 'id_desa');
    }

    public function keluarga() {
        return $this->hasMany(Keluarga::class, 'id_desa');
    }

    public function sensus() {
        return $this->hasMany(Sensus::class, 'id_desa');
    }

    public function penerimaBantuan() {
        return $this->hasMany(PenerimaBantuan::class, 'id_desa');
    }

    public function programBantuan() {
        return $this->hasMany(ProgramBantuan::class, 'id_desa');
    }

    public function rumahTangga() {
        return $this->hasMany(RumahTangga::class, 'id_desa');
    }
}
