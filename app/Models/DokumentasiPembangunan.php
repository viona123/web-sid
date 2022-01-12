<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiPembangunan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pembangunan() {
        return $this->belongsTo(Pembangunan::class, 'id_pembangunan');
    }
}
