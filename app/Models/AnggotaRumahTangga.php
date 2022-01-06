<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaRumahTangga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rumahTangga() {
        return $this->belongsTo(RumahTangga::class, 'no_rt', 'no_rt');
    }

    public function sensus() {
        return $this->belongsTo(Sensus::class, 'nik_anggota', 'nik');
    }
}
