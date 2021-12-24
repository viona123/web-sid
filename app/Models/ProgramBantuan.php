<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sensus;

class ProgramBantuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penerima() {
        return $this->hasMany(PenerimaBantuan::class, 'bantuan_id');
    }
}
