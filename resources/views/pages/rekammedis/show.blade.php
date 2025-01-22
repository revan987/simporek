@extends('layouts.app')

@section('title', 'Detail Rekam Medis')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center mb-3" style="max-width: 800px;">
            <h1 class="font-weight-bold">Detail Rekam Medis</h1>
         <a href="{{ route('rekammedis.print', ['id' => $pasien->id]) }}" target="_blank"
                button class="btn btn-primary">Cetak PDF</a>
        </div>
        <div class="section-body" style="max-width: 800px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Informasi Pasien</h5>
                    <div class="row mb-3">
                        <div class="col-sm-4 mb-1 text-left">
                            <label for="nama" class="font-weight-bold">Nama</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="nama" type="text" class="form-control" value="{{ $pasien->nama }}" readonly>
                        </div>
                        <div class="col-sm-4 text-left">
                            <label for="tanggal_lahir" class="font-weight-bold">Tanggal Lahir</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input type="text" class="form-control" id="tanggal_lahir" value="{{ $pasien->formatted_tanggal_lahir }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="alamat" class="font-weight-bold">Alamat</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="alamat" type="text" class="form-control" value="{{ $pasien->alamat }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="pendidikan" class="font-weight-bold">Pendidikan</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="pendidikan" type="text" class="form-control" value="{{ $pasien->pendidikan }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="pekerjaan" class="font-weight-bold">Pekerjaan</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="pekerjaan" type="text" class="form-control" value="{{ $pasien->pekerjaan }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="agama" class="font-weight-bold">Agama</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="agama" type="text" class="form-control" value="{{ $pasien->agama }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="jenis_kelamin" type="text" class="form-control" value="{{ $pasien->jenis_kelamin }}" readonly>
                        </div>
                    </div>

                    <hr>

                    <h5 class="card-title font-weight-bold">Anamnesa</h5>
                    <div class="row mb-3">
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="keluhan_utama" class="font-weight-bold">Keluhan Utama</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="keluhan_utama" type="text" class="form-control" value="{{ $pasien->anamnesa->keluhan_utama }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="riwayat_penyakit_sekarang" class="font-weight-bold">Riwayat Penyakit Sekarang</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="riwayat_penyakit_sekarang" type="text" class="form-control" value="{{ $pasien->anamnesa->riwayat_penyakit_sekarang }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="riwayat_penyakit_dahulu" class="font-weight-bold">Riwayat Penyakit Dahulu</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="riwayat_penyakit_dahulu" type="text" class="form-control" value="{{ $pasien->anamnesa->riwayat_penyakit_dahulu }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="riwayat_alergi_obat" class="font-weight-bold">Riwayat Alergi Obat</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="riwayat_alergi_obat" type="text" class="form-control" value="{{ $pasien->anamnesa->riwayat_alergi_obat }}" readonly>
                        </div>
                    </div>

                    <hr>

                    <h5 class="card-title font-weight-bold">Pemeriksaan Fisik</h5>
                    <div class="row mb-3">
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="tensi" class="font-weight-bold">Tensi</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="tensi" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->tensi }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="bb" class="font-weight-bold">BB</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="bb" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->bb }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="nadi" class="font-weight-bold">Nadi</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="nadi" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->nadi }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="tb" class="font-weight-bold">TB</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="tb" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->tb }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="rr" class="font-weight-bold">RR</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="rr" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->rr }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="suhu" class="font-weight-bold">Suhu</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="suhu" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->suhu }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="keadaan_umum" class="font-weight-bold">Keadaan Umum</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="keadaan_umum" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->keadaan_umum }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="diagnosa" class="font-weight-bold">Diagnosa</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="diagnosa" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->diagnosa }}" readonly>
                        </div>
                        <div class="col-sm-4 mb-3 text-left">
                            <label for="terapi" class="font-weight-bold">Terapi</label>
                        </div>
                        <div class="col-sm-8 mb-3">
                            <input id="terapi" type="text" class="form-control" value="{{ $pasien->pemeriksaanFisik->terapi }}" readonly>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('rekammedis.index') }}" class="btn btn-primary mt-4" style="float: left;">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
@media print {
    .btn, .section-header {
        display: none !important;
    }
    .card {
        border: none;
        box-shadow: none;
    }
}
</style>
@endpush
