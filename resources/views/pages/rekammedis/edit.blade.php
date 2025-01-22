@extends('layouts.app')

@section('title', 'Edit Data Rekam Medis')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Rekam Medis</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('rekammedis.update', $pasien) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div id="slide1" class="slide">
                            <h2>Data Pasien</h2>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ $pasien->nama }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $pasien->alamat }}">
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <select id="pendidikan" name="pendidikan" class="form-control">
                                    <option value="SD" {{ $pasien->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SLTP" {{ $pasien->pendidikan == 'SLTP' ? 'selected' : '' }}>SLTP</option>
                                    <option value="SLTA" {{ $pasien->pendidikan == 'SLTA' ? 'selected' : '' }}>SLTA</option>
                                    <option value="Mahasiswa/i" {{ $pasien->pendidikan == 'Mahasiswa/i' ? 'selected' : '' }}>Mahasiwa/i</option>
                                    <option value="Lainnya" {{ $pasien->pendidikan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" value="{{ $pasien->pekerjaan }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select id="agama" name="agama" class="form-control">
                                    <option value="Islam" {{ $pasien->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ $pasien->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ $pasien->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ $pasien->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ $pasien->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Khonghucu" {{ $pasien->agama == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki" {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <!-- Tambahkan input lainnya untuk data pasien -->
                            <!-- Contoh: tanggal_lahir, alamat, pendidikan, pekerjaan, agama, jenis_kelamin -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('rekammedis.index') }}" class="btn btn-danger">Batal</a>
                                <button type="button" class="btn btn-primary next-slide ms-auto">Selanjutnya</button>
                            </div>
                        </div>

                        <div id="slide2" class="slide" style="display: none;">
                            <h2>Anamnesa</h2>
                            <div class="form-group">
                                <label for="keluhan_utama">Keluhan Utama</label>
                                <textarea id="keluhan_utama" name="keluhan_utama" class="form-control">{{ $pasien->anamnesa->keluhan_utama ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="riwayat_penyakit_sekarang">Riwayat Penyakit Sekarang</label>
                                <textarea id="riwayat_penyakit_sekarang" name="riwayat_penyakit_sekarang" class="form-control">{{ $pasien->anamnesa->riwayat_penyakit_sekarang ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="riwayat_penyakit_dahulu">Riwayat Penyakit Dahulu</label>
                                <textarea id="riwayat_penyakit_dahulu" name="riwayat_penyakit_dahulu" class="form-control">{{ $pasien->anamnesa->riwayat_penyakit_dahulu ?? ''  }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="riwayat_alergi_obat">Riwayat Alergi Obat</label>
                                <textarea id="riwayat_alergi_obat" name="riwayat_alergi_obat" class="form-control">{{ $pasien->anamnesa->riwayat_alergi_obat ?? '' }}</textarea>
                            </div>
                            <!-- Tambahkan input anamnesa lainnya -->
                            
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-danger prev-slide">Kembali</button>
                                <button type="button" class="btn btn-primary next-slide ms-auto">Selanjutnya</button>
                            </div>
                        </div>

                        <div id="slide3" class="slide" style="display: none;">
                            <h2>Pemeriksaan Fisik</h2>
                            <div class="form-group">
                                <label for="tensi">Tensi</label>
                                <input type="text" id="tensi" name="tensi" class="form-control" value="{{ $pasien->pemeriksaanFisik->tensi ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="bb">BB</label>
                                <input type="text" id="bb" name="bb" class="form-control" value="{{ $pasien->pemeriksaanFisik->bb ?? '' }}" placeholder="Kg">
                            </div>
                            <div class="form-group">
                                <label for="nadi">Nadi</label>
                                <input type="text" id="nadi" name="nadi" class="form-control" value="{{ $pasien->pemeriksaanFisik->nadi ?? '' }}" placeholder="Cm">
                            </div>
                            <div class="form-group">
                                <label for="tb">TB</label>
                                <input type="text" id="tb" name="tb" class="form-control" value="{{ $pasien->pemeriksaanFisik->tb ?? '' }}" placeholder="x/m">
                            </div>
                            <div class="form-group">
                                <label for="rr">RR</label>
                                <input type="text" id="rr" name="rr" class="form-control" value="{{ $pasien->pemeriksaanFisik->rr ?? ''}}" placeholder="x/m">
                            </div>
                            <div class="form-group">
                                <label for="suhu">Suhu</label>
                                <input type="text" id="suhu" name="suhu" class="form-control" value="{{ $pasien->pemeriksaanFisik->suhu ?? ''}}" placeholder="C">
                            </div>
                            <div class="form-group">
                                <label for="keadaan_umum">Keadaan Umum</label>
                                <textarea id="keadaan_umum" name="keadaan_umum" class="form-control">{{ $pasien->pemeriksaanFisik->keadaan_umum ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="diagnosa">Diagnosa</label>
                                <textarea id="diagnosa" name="diagnosa" class="form-control">{{ $pasien->pemeriksaanFisik->diagnosa ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="terapi">Terapi</label>
                                <textarea id="terapi" name="terapi" class="form-control">{{ $pasien->pemeriksaanFisik->terapi ?? ''}}</textarea>
                            </div>
                            <!-- Tambahkan input pemeriksaan fisik lainnya -->
                            
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-danger prev-slide">Kembali</button>
                                <button type="submit" class="btn btn-success ms-auto">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.next-slide').on('click', function() {
                $(this).closest('.slide').hide().next('.slide').show();
            });
            $('.prev-slide').on('click', function() {
                $(this).closest('.slide').hide().prev('.slide').show();
            });
        });
    </script>
@endpush


@push('scripts')
    <script>
        var slideData = {};

        $('.next-slide').on('click', function() {
            var currentSlide = $(this).closest('.slide');
            var slideIndex = currentSlide.index();
            slideData[slideIndex] = currentSlide.find('input, textarea, select').serializeArray();
            currentSlide.hide().next('.slide').show();
        });

        $('.prev-slide').on('click', function() {
            var currentSlide = $(this).closest('.slide');
            var slideIndex = currentSlide.index();
            currentSlide.hide().prev('.slide').show();
            var formData = slideData[slideIndex - 1];
            $.each(formData, function(index, field) {
                $('#' + field.name).val(field.value);
            });
        });
    </script>
@endpush
