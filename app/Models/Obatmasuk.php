<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obatmasuk extends Model
{
    protected $table = 'obatmasuks';
    protected $fillable = [
        'id_obat',
        'nama_obat',
        'jumlah_masuk',
        'tanggal_masuk',
    ];

    public function masterobat()
    {
        return $this->belongsTo(Masterobat::class, 'id_obat', 'id_obat');
    }
}
