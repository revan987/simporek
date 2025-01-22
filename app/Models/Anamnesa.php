<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnesa extends Model
{

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    use HasFactory;

    protected $fillable = ['pasien_id', 
    'keluhan_utama', 
    'riwayat_penyakit_sekarang', 
    'riwayat_penyakit_dahulu', 
    'riwayat_alergi_obat'];
}