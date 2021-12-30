<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKelompok extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelompok() {
        return $this->hasMany(Kelompok::class, 'kategori_id');
    }

    public function desa() {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
