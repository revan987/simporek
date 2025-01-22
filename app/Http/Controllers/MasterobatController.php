<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterobat;
use App\Http\Requests\StoreMasterobatRequest;

class MasterobatController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('nama_obat');
    
    $masterobats = Masterobat::query()
        ->when($search, function($query, $search) {
            return $query->where('nama_obat', 'like', '%' . $search . '%');
        })
        ->paginate(10);

    return view('pages.masterobat.index', compact('masterobats'));
}


public function search(Request $request)
{
    $query = $request->get('query');
    $obats = Masterobat::where('nama_obat', 'like', '%' . $query . '%')->orderBy('nama_obat', 'asc')->get();

    $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
    foreach ($obats as $obat) {
        $output .= '<li>' . $obat->nama_obat . '</li>';
    }
    $output .= '</ul>';
    return $output;
}


    public function create()
{
    // Fetch all used ID obat in ascending order
    $usedIdObat = Masterobat::orderBy('id_obat')->pluck('id_obat')->toArray();
    
    // Initialize the emptyIdObat variable as null
    $emptyIdObat = null;
    
    // Find the lowest unused ID obat
    if (count($usedIdObat) > 0) {
        for ($i = 1; $i <= max($usedIdObat); $i++) {
            if (!in_array($i, $usedIdObat)) {
                $emptyIdObat = $i;
                break;
            }
        }
    } else {
        // If there are no records at all, set the initial ID to 1
        $emptyIdObat = 1;
    }
    
    // Get the last used ID obat
    $lastUsedIdObat = Masterobat::max('id_obat');

    // Determine the next ID obat to be used
    if ($emptyIdObat) {
        $nextIdObat = $emptyIdObat;
    } else {
        // If there are no gaps, use the next ID obat after the last used one
        $nextIdObat = $lastUsedIdObat + 1;
    }

    return view('pages.masterobat.create', compact('nextIdObat'));
}

    /**
     * Menyimpan obat baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
{
    // Validasi data yang dikirimkan oleh formulir
    $validatedData = $request->validate([
        'id_obat' => 'required|numeric|unique:masterobats',
        'nama_obat' => 'required|string',
    ]);

    try {
        // Mengubah huruf awal dari nama obat menjadi huruf besar
        $namaObat = ucwords($validatedData['nama_obat']);

        // Lakukan pengecekan apakah nama obat sudah ada di database (dengan memperhatikan perbedaan besar kecilnya huruf)
        $existingObat = Masterobat::whereRaw('LOWER(nama_obat) = ?', strtolower($namaObat))->first();

        // Jika obat sudah ada, kirimkan pemberitahuan bahwa obat tersebut sudah ada
        if ($existingObat) {
            return redirect()->back()->with('error', 'Nama Obat Sudah Terdaftar.');
        }

        // Jika obat belum ada, simpan obat baru ke dalam database
        $masterobat = new Masterobat;
        $masterobat->id_obat = $validatedData['id_obat'];
        $masterobat->nama_obat = $namaObat; // Gunakan $namaObat yang sudah diubah menjadi huruf besar
        $masterobat->save();

        return redirect()->route('masterobats.index')->with('success', 'Obat berhasil ditambahkan');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menambahkan obat. Silakan coba lagi.');
    }
}


    public function edit(Masterobat $masterobat)
    {
        return view('pages.masterobat.edit', compact('masterobat'));
    }




    public function update(Request $request, Masterobat $masterobat)
    {
        $request->validate([
            'id_obat' => 'required|integer|unique:masterobats,id_obat,' . $masterobat->id_obat . ',id_obat',
            'nama_obat' => 'required|string|max:100',
        ]);
    
        try {
            $namaObat = ucwords($request->input('nama_obat'));
    
            // Lakukan pengecekan apakah nama obat sudah ada di database (dengan memperhatikan perbedaan besar kecilnya huruf)
            $existingObat = Masterobat::whereRaw('LOWER(nama_obat) = ?', strtolower($request->input('nama_obat')))
                ->where('id_obat', '!=', $masterobat->id_obat)
                ->first();
    
            // Jika obat sudah ada, kirimkan pemberitahuan bahwa obat tersebut sudah ada
            if ($existingObat) {
                return redirect()->back()->with('error', 'Nama Obat Sudah Terdaftar.');
            }
    
            $masterobat->update([
                'id_obat' => $request->input('id_obat'),
                'nama_obat' => $namaObat,
            ]);
    
            return redirect()->route('masterobats.index')->with('success', 'Data obat berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data obat. Silakan coba lagi.');
        }
    }
    

    



    public function destroy(Masterobat $masterobat)
    {

        
        try {
            $masterobat->delete();
            return redirect()->route('masterobats.index')->with('success', 'Obat berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus obat. Silakan coba lagi.');
        }
    }
}
