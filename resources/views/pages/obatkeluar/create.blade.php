@extends('layouts.app')

@section('title', 'Tambah Data Obat Keluar')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Obat Keluar</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('obatkeluars.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id_obat">ID Obat</label>
                            <select id="id_obat" name="id_obat" class="form-control select2" style="width: 100%;">
                                <option value="" selected disabled>Pilih ID Obat</option>
                                @foreach($masterobats as $masterobat)
                                    <option value="{{ $masterobat->id_obat }}">{{ $masterobat->id_obat }} - {{ $masterobat->nama_obat }}</option>
                                @endforeach
                            </select>
                            @error('id_obat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_keluar">Jumlah Obat Keluar</label>
                            <input type="number" id="jumlah_keluar" name="jumlah_keluar" class="form-control" value="{{ old('jumlah_keluar') }}">
                            @error('jumlah_keluar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar</label>
                            <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control" value="{{ old('tanggal_keluar', date('Y-m-d')) }}">
                            @error('tanggal_keluar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('obatkeluars.index') }}">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    }
                }
            });
        });
    </script>
@endpush
