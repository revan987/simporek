<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMasterobatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_obat' => 'required|integer',
            'nama_obat' => 'required|string|max:100',
        ];
    }
}
