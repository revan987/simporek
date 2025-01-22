<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obatkeluar extends Model
{
    protected $table = 'obatkeluars';
    protected $fillable = [
        'id_obat',
        'nama_obat',
        'jumlah_keluar',
        'tanggal_keluar',
    
    ];
    public function masterobat()
    {
        return $this->belongsTo(Masterobat::class, 'id_obat', 'id_obat');
    }
}
