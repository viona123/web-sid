<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKelompok extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelompok() {
        return $this->belongsToMany(Kelompok::class, 'kode', 'kode_kelompok');
    }

    public function sensus() {
        return $this->hasOne(Sensus::class, 'nik', 'nik_anggota');
    }
}
