<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateObatmasukRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_obat' => 'required|exists:masterobats,id_obat',
            'nama_obat' => 'required|string',
            'jumlah_masuk' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
        ];
    }
}
