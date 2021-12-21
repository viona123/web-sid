<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahTangga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function anggota() {
        return $this->hasMany(Sensus::class, 'no_rumah_tangga', 'no_rt');
    }
}
