<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahTangga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kepala() {
        return $this->hasOne(Sensus::class, 'nik', 'nik_kepala_rt');
    }

    public function anggota() {
        return $this->hasMany(Sensus::class, 'no_rumah_tangga', 'no_rt');
    }

    public function bantuan() {
        return $this->belongsToMany(PenerimaBantuan::class, 'no_rt_penerima', 'no_rt');
    }
}
