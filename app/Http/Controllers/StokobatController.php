<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stokobat;

class StokobatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('nama_obat');
        
        $stokobats = Stokobat::query()
            ->when($search, function($query, $search) {
                return $query->where('nama_obat', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('pages.stokobat.index', compact('stokobats'));
    }
}
