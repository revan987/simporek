<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stokobat extends Model
{
    protected $table = 'stokobats';
    protected $fillable = [
        'id_obat',
        'nama_obat',
        'jumlah_tersedia',
    ];

    public function masterobat()
    {
        return $this->belongsTo(Masterobat::class, 'id_obat', 'id_obat');
    }
}
