<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembangunan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function desa() {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function dokumentasi() {
        return $this->hasMany(DokumentasiPembangunan::class, 'id_pembangunan');
    }
}
