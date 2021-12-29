<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDesa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sensus() {
        return $this->belongsTo(Sensus::class, 'nik_staff', 'nik');
    }
}
