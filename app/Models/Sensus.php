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
}
