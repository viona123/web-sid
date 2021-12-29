<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function keluarga() {
        return $this->belongsTo(Keluarga::class, 'kepala_keluarga', 'nik');
    }

    public function rumahTangga() {
        return $this->belongsTo(RumahTangga::class, 'no_rt', 'no_rumah_tangga');
    }

    public function bantuan() {
        return $this->hasMany(PenerimaBantuan::class, 'nik_penerima', 'nik');
    }

    public function staffDesa() {
        return $this->hasOne(StaffDesa::class, 'nik_staff', 'nik');
    }
}
