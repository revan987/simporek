<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanFisik extends Model
{

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    use HasFactory;

    protected $fillable = ['pasien_id', 
    'tensi', 
    'bb', 
    'nadi', 
    'tb', 
    'rr', 
    'suhu', 
    'keadaan_umum', 
    'diagnosa', 
    'terapi'];
}