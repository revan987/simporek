<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Anamnesa;
use App\Models\PemeriksaanFisik;
use PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
class RekamMedisController extends Controller
{
    public function create()
    {
        return view('pages.rekammedis.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Validasi untuk data pasien
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'agama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            // Validasi untuk anamnesa
            'keluhan_utama' => 'required|string',
            'riwayat_penyakit_sekarang' => 'required|string',
            'riwayat_penyakit_dahulu' => 'required|string',
            'riwayat_alergi_obat' => 'required|string',
            // Validasi untuk pemeriksaan fisik
            'tensi' => 'required|string',
            'bb' => 'required|string',
            'nadi' => 'required|string',
            'tb' => 'required|string',
            'rr' => 'required|string',
            'suhu' => 'required|string',
            'keadaan_umum' => 'required|string',
            'diagnosa' => 'required|string',
            'terapi' => 'required|string',
        ]);

        $pasien = Pasien::create([
            'nama' =>ucwords ($validatedData['nama']),
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'alamat' =>ucwords ($validatedData['alamat']),
            'pendidikan' => $validatedData['pendidikan'],
            'pekerjaan' => ucwords($validatedData['pekerjaan']),
            'agama' => $validatedData['agama'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
        ]);

        Anamnesa::create([
            'pasien_id' => $pasien->id,
            'keluhan_utama' => ucwords(strtolower($validatedData['keluhan_utama'])),
            'riwayat_penyakit_sekarang' => ucwords(strtolower($validatedData['riwayat_penyakit_sekarang'])),
            'riwayat_penyakit_dahulu' => ucwords(strtolower($validatedData['riwayat_penyakit_dahulu'])),
            'riwayat_alergi_obat' => ucwords(strtolower($validatedData['riwayat_alergi_obat'])),
        ]);


        PemeriksaanFisik::create([
            'pasien_id' => $pasien->id,
            'tensi' => ucwords($validatedData['tensi']),
            'bb' => ucwords($validatedData['bb']),
            'nadi' => ucwords($validatedData['nadi']),
            'tb' => ucwords($validatedData['tb']),
            'rr' => ucwords($validatedData['rr']),
            'suhu' => ucwords($validatedData['suhu']),
            'keadaan_umum' => ucwords($validatedData['keadaan_umum']),
            'diagnosa' => ucwords($validatedData['diagnosa']),
            'terapi' => ucwords($validatedData['terapi']),
        ]);

        return redirect()->route('rekammedis.index')->with('success', 'Data pasien berhasil disimpan');
    }

    public function index(Request $request)
{
    // Ambil query parameter 'nama'
    $search = $request->get('nama');

    // Cari pasien berdasarkan nama jika parameter 'nama' ada
    $pasiens = Pasien::when($search, function ($query, $search) {
        return $query->where('nama', 'like', '%' . $search . '%');
    })->get()->map(function ($pasien) {
        $pasien->formatted_tanggal_lahir = Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y');
        return $pasien;
    });

    return view('pages.rekammedis.index', compact('pasiens'));
}


    public function show($id)
    {
        $pasien = Pasien::with(['anamnesa', 'pemeriksaanFisik'])->findOrFail($id);

        // Format tanggal lahir
        $pasien->formatted_tanggal_lahir = Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y');

        return view('pages.rekammedis.show', compact('pasien'));
    }

    public function printPDF($id)
    {
        $pasien = Pasien::with(['anamnesa', 'pemeriksaanFisik'])->findOrFail($id);

         // Format tanggal lahir
        $pasien->formatted_tanggal_lahir = Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y');

        $pdf = PDF::loadView('pages.rekammedis.print', compact('pasien'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('rekam_medis_' . $pasien->nama . '.pdf');
    }


    public function destroy($id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->delete();
            return redirect()->route('rekammedis.index')->with('success', 'Data pasien berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data pasien. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $pasien = Pasien::with('anamnesa', 'pemeriksaanFisik')->findOrFail($id);

        // Format tanggal lahir
        $pasien->formatted_tanggal_lahir = Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y');

        return view('pages.rekammedis.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'agama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'keluhan_utama' => 'required|string',
            'riwayat_penyakit_sekarang' => 'required|string',
            'riwayat_penyakit_dahulu' => 'required|string',
            'riwayat_alergi_obat' => 'required|string',
            'tensi' => 'required|string',
            'bb' => 'required|string',
            'nadi' => 'required|string',
            'tb' => 'required|string',
            'rr' => 'required|string',
            'suhu' => 'required|string',
            'keadaan_umum' => 'required|string',
            'diagnosa' => 'required|string',
            'terapi' => 'required|string',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update([
        'nama' =>ucwords ($validatedData['nama']),

        'alamat' =>ucwords($validatedData['alamat']),
        'pendidikan' => $validatedData['pendidikan'],
        'pekerjaan' => ucwords($validatedData['pekerjaan']),
        'agama' => $validatedData['agama'],
        'jenis_kelamin' => $validatedData['jenis_kelamin'],
    ]);

        $pasien->anamnesa->update([
            'keluhan_utama' => ucwords(strtolower($validatedData['keluhan_utama'])),
            'riwayat_penyakit_sekarang' => ucwords(strtolower($validatedData['riwayat_penyakit_sekarang'])),
            'riwayat_penyakit_dahulu' => ucwords(strtolower($validatedData['riwayat_penyakit_dahulu'])),
            'riwayat_alergi_obat' => ucwords(strtolower($validatedData['riwayat_alergi_obat'])),
        ]);

        $pasien->pemeriksaanFisik->update([
            'tensi' => $validatedData['tensi'],
            'bb' => $validatedData['bb'],
            'nadi' => $validatedData['nadi'],
            'tb' => $validatedData['tb'],
            'rr' => $validatedData['rr'],
            'suhu' => $validatedData['suhu'],
            'keadaan_umum' => $validatedData['keadaan_umum'],
            'diagnosa' => $request['diagnosa'],
            'terapi' => $request['terapi'],
        ]);

        return redirect()->route('rekammedis.index')->with('success', 'Data pasien berhasil diperbaharui');
    }
}
