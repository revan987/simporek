<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Obatkeluar;
use App\Models\Masterobat;
use Carbon\Carbon;
use App\Http\Requests\StoreObatkeluarRequest;
use App\Http\Requests\UpdateObatkeluarRequest;

class ObatkeluarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('nama_obat');
        
        $obatkeluars = Obatkeluar::query()
            ->when($search, function($query, $search) {
                return $query->where('nama_obat', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('pages.obatkeluar.index', compact('obatkeluars'));
    }

    public function create()
    {
        $masterobats = Masterobat::all();
        return view('pages.obatkeluar.create', compact('masterobats'));
    }

    public function store(StoreObatkeluarRequest $request)
    {
        try {
            // Temukan Masterobat berdasarkan id_obat
            $masterobat = Masterobat::findOrFail($request->id_obat);
            
            $tanggal_masuk = Carbon::parse($request->tanggal_masuk)->translatedFormat('d F Y');

            // Simpan data obat keluar
            Obatkeluar::create([
                'id_obat' => $masterobat->id_obat,
                'nama_obat' => $masterobat->nama_obat,
                'jumlah_keluar' => $request->jumlah_keluar,
                'tanggal_keluar' => $request->tanggal_keluar,
            ]);

            return redirect()->route('obatkeluars.index')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data obat keluar. Silakan coba lagi.');
        }
    }

    public function edit(Obatkeluar $obatkeluar)
    {
        $masterobats = Masterobat::all();


        return view('pages.obatkeluar.edit', compact('obatkeluar', 'masterobats'));
    }

    public function update(UpdateObatkeluarRequest $request, Obatkeluar $obatkeluar)
    {
        try {
            // Validasi data yang diterima dari request
            $validatedData = $request->validated();
            
            // Temukan Masterobat berdasarkan id_obat yang dikirimkan dalam request
            $masterobat = Masterobat::findOrFail($validatedData['id_obat']);
            
            $tanggal_masuk = Carbon::parse($request->tanggal_masuk)->translatedFormat('d F Y');

            // Update data obat keluar dengan data yang divalidasi
            $obatkeluar->update([
                'id_obat' => $masterobat->id_obat,
                'nama_obat' => $masterobat->nama_obat,
                'jumlah_keluar' => $validatedData['jumlah_keluar'],
                'tanggal_keluar' => $validatedData['tanggal_keluar'],
            ]);
    
            return redirect()->route('obatkeluars.index')->with('success', 'Data obat keluar berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data obat keluar. Silakan coba lagi.');
        }
    }
    

    public function destroy(Obatkeluar $obatkeluar)
    {
        try {
            $obatkeluar->delete();
            return redirect()->route('obatkeluars.index')->with('success', 'Data obat keluar berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data obat keluar. Silakan coba lagi.');
        }
    }
}
