<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'tanggal_lahir', 
        'alamat', 'pendidikan', 
        'pekerjaan', 
        'agama', 
        'jenis_kelamin'
    ];

    public function anamnesa()
    {
        return $this->hasOne(Anamnesa::class);
    }

    public function pemeriksaanFisik()
    {
        return $this->hasOne(PemeriksaanFisik::class);
    }
}
