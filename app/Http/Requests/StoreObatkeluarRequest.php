<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreObatkeluarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_obat' => 'required|exists:masterobats,id_obat',
            'jumlah_keluar' => 'required|numeric|min:1',
            'tanggal_keluar' => 'required|date',
        ];
    }
}
