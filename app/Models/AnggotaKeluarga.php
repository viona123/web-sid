<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function keluarga() {
        return $this->belongsTo(Keluarga::class, 'no_kk', 'Nomor_KK');
    }

    public function sensus() {
        return $this->belongsTo(Sensus::class, 'nik_anggota', 'nik');
    }
}
