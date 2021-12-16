<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategori() {
        return $this->belongsTo(KategoriKelompok::class);
    }

    public function ketua() {
        return $this->hasOne(Sensus::class, 'nik', 'nik_ketua');
    }

    public function anggota() {
        return $this->hasMany(AnggotaKelompok::class, 'kode_kelompok', 'kode');
    }
}
