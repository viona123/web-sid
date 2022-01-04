<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function desa() {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function kepala() {
        return $this->belongsTo(Sensus::class, 'kepala_dusun', 'nik');
    }
}
