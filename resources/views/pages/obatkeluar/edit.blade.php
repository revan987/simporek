@extends('layouts.app')

@section('title', 'Edit Obat Keluar')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Obat Keluar</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <form action="{{ route('obatkeluars.update', $obatkeluar->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_obat">ID Obat</label>
                            <input type="text" id="id_obat" name="id_obat" class="form-control" value="{{ $obatkeluar->id_obat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="{{ $obatkeluar->nama_obat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_keluar">Jumlah Obat Keluar</label>
                            <input type="number" id="jumlah_keluar" name="jumlah_keluar" class="form-control @error('jumlah_keluar') is-invalid @enderror" value="{{ old('jumlah_keluar', $obatkeluar->jumlah_keluar) }}">
                            @error('jumlah_keluar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar</label>
                            <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" value="{{ old('tanggal_keluar', $obatkeluar->tanggal_keluar) }}">
                            @error('tanggal_keluar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('obatkeluars.index') }}" class="btn btn-danger">Batal</a>
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
