<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Obatmasuk;
use App\Models\Masterobat;
use Carbon\Carbon; // Tambahkan ini untuk menggunakan Carbon
use App\Http\Requests\StoreObatmasukRequest;
use App\Http\Requests\UpdateObatmasukRequest;

class ObatmasukController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('nama_obat');
        
        $obatmasuks = Obatmasuk::query()
            ->when($search, function($query, $search) {
                return $query->where('nama_obat', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('pages.obatmasuk.index', compact('obatmasuks'));
    }

    public function create()
    {
        $masterobats = Masterobat::all();
        return view('pages.obatmasuk.create', compact('masterobats'));
    }

    public function store(StoreObatmasukRequest $request)
    {
        try {
            // Temukan Masterobat berdasarkan id_obat
            $masterobat = Masterobat::findOrFail($request->id_obat);
            
            // Konversi tanggal masuk ke format Indonesia menggunakan Carbon
            $tanggal_masuk = Carbon::parse($request->tanggal_masuk)->translatedFormat('d F Y');

            // Simpan data obat masuk
            Obatmasuk::create([
                'id_obat' => $masterobat->id_obat,
                'nama_obat' => $masterobat->nama_obat,
                'jumlah_masuk' => $request->jumlah_masuk,
                'tanggal_masuk' => $request->tanggal_masuk, // Gunakan format tanggal Indonesia di sini
            ]);

            return redirect()->route('obatmasuks.index')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data obat masuk. Silakan coba lagi.');
        }
    }

    public function edit(Obatmasuk $obatmasuk)
    {
        $masterobats = Masterobat::all();
        return view('pages.obatmasuk.edit', compact('obatmasuk', 'masterobats'));
    }

    public function update(UpdateObatmasukRequest $request, Obatmasuk $obatmasuk)
    {
        try {
            // Validasi data yang diterima dari request
            $validatedData = $request->validated();
            
            // Temukan Masterobat berdasarkan id_obat yang dikirimkan dalam request
            $masterobat = Masterobat::findOrFail($validatedData['id_obat']);
            
            // Konversi tanggal masuk ke format Indonesia menggunakan Carbon
            $tanggal_masuk = Carbon::parse($validatedData['tanggal_masuk'])->translatedFormat('d F Y');

            // Update data obat masuk dengan data yang divalidasi
            $obatmasuk->update([
                'id_obat' => $masterobat->id_obat,
                'nama_obat' => $masterobat->nama_obat,
                'jumlah_masuk' => $validatedData['jumlah_masuk'],
                'tanggal_masuk' => $validatedData['tanggal_masuk'], // Gunakan format tanggal Indonesia di sini
            ]);
    
            return redirect()->route('obatmasuks.index')->with('success', 'Data obat masuk berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data obat masuk. Silakan coba lagi.');
        }
    }
    

    public function destroy(Obatmasuk $obatmasuk)
    {
        try {
            $obatmasuk->delete();
            return redirect()->route('obatmasuks.index')->with('success', 'Data obat masuk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data obat masuk. Silakan coba lagi.');
        }
    }
}
