<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterobat extends Model
{
    protected $table = 'masterobats';

    protected $primaryKey = 'id_obat';

    protected $fillable = [
        'nama_obat',
    ];

    // Definisikan relasi jika diperlukan
}
