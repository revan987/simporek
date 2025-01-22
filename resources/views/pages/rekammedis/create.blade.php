@extends('layouts.app')

@section('title', 'Tambah Data Rekam Medis')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        .error-message {
            display: none;
            color: white; /* Ubah warna tulisan menjadi putih */
            background-color:  #FD1C03; /* Ubah warna latar belakang menjadi merah */
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
    </style>
@endpush


@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Rekam Medis</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <form id="rekamMedisForm" action="{{ route('rekammedis.store') }}" method="POST">
                        @csrf
                        <div id="slide1" class="slide">
                            <div class="error-message">Harap Diisi Semua</div>
                            <h2>Data Pasien</h2>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <select id="pendidikan" name="pendidikan" class="form-control" required>
                                    <option value="" selected disabled> ---Pendidikan Terakhir--- </option>
                                    <option value="SD">SD</option>
                                    <option value="SLTP">SLTP</option>
                                    <option value="SLTA">SLTA</option>
                                    <option value="Mahasiswa/i">Mahasiswa/i</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select id="agama" name="agama" class="form-control" required>
                                    <option value="" selected disabled> ---Agama--- </option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                    <option value="" selected disabled> ---Jenis Kelamin---</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('rekammedis.index') }}" class="btn btn-danger">Batal</a>
                                <button type="button" class="btn btn-primary next-slide ms-auto">Selanjutnya</button>
                            </div>
                        </div>

                        <div id="slide2" class="slide" style="display: none;">
                            <div class="error-message">Harap Diisi Semua</div>
                            <h2>Anamnesa</h2>
                            <div class="form-group">
                                <label for="keluhan_utama">Keluhan Utama</label>
                                <textarea type="text" id="keluhan_utama" name="keluhan_utama" class="form-control" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="riwayat_penyakit_sekarang">Riwayat Penyakit Sekarang</label>
                                <textarea type="text" id="riwayat_penyakit_sekarang" name="riwayat_penyakit_sekarang" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="riwayat_penyakit_dahulu">Riwayat Penyakit Dahulu</label>
                                <textarea type="text" id="riwayat_penyakit_dahulu" name="riwayat_penyakit_dahulu" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="riwayat_alergi_obat">Riwayat Alergi Obat</label>
                                <textarea type="text" id="riwayat_alergi_obat" name="riwayat_alergi_obat" class="form-control" required></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-danger prev-slide">Kembali</button>
                                <button type="button" class="btn btn-primary next-slide ms-auto">Selanjutnya</button>
                                </div>
                        </div>


                        <div id="slide3" class="slide" style="display: none;">
                            <div class="error-message">Harap Diisi Semua</div>
                            <h2>Pemeriksaan Fisik</h2>
                            <div class="form-group">
                                <label for="tensi">Tensi</label>
                                <input type="text" id="tensi" name="tensi" class="form-control" placeholder="mmHg" required>
                            </div>
                            <div class="form-group">
                                <label for="bb">BB</label>
                                <input type="text" id="bb" name="bb" class="form-control" placeholder="Kg" required>
                            </div>
                            <div class="form-group">
                                <label for="nadi">Nadi</label>
                                <input type="text" id="nadi" name="nadi" class="form-control" placeholder="bpm" required>
                            </div>
                            <div class="form-group">
                                <label for="tb">TB</label>
                                <input type="text" id="tb" name="tb" class="form-control" placeholder="cm" required>
                            </div>
                            <div class="form-group">
                                <label for="rr">RR</label>
                                <input type="text" id="rr" name="rr" class="form-control" placeholder="breaths/min" required>
                            </div>
                            <div class="form-group">
                                <label for="suhu">Suhu</label>
                                <input type="text" id="suhu" name="suhu" class="form-control" placeholder="°C" required>
                            </div>
                            <div class="form-group">
                                <label for="keadaan_umum">Keadaan Umum</label>
                                <input type="text" id="keadaan_umum" name="keadaan_umum" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="diagnosa">Diagnosa</label>
                                <input type="text" id="diagnosa" name="diagnosa" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="terapi">Terapi</label>
                                <input type="text" id="terapi" name="terapi" class="form-control" required>
                            </div>
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
            function validateSlide(slide) {
                let isValid = true;
                $(slide).find('input, select, textarea').each(function() {
                    if (!this.checkValidity()) {
                        isValid = false;
                    }
                });
                return isValid;
            }

            $('.next-slide').on('click', function() {
                const currentSlide = $(this).closest('.slide');
                if (validateSlide(currentSlide)) {
                    currentSlide.hide().next('.slide').show();
                    currentSlide.find('.error-message').hide();
                } else {
                    currentSlide.find('.error-message').show();
                    // Scroll to the top of the page
                    $('html, body').animate({scrollTop: 0}, 'medium');
                }
            });

            $('.prev-slide').on('click', function() {
                const currentSlide = $(this).closest('.slide');
                currentSlide.hide().prev('.slide').show();
                currentSlide.prev('.slide').find('.error-message').hide();
            });
        });
    </script>
@endpush

