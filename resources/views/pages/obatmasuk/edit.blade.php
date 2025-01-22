@extends('layouts.app')

@section('title', 'Edit Obat Masuk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Obat Masuk</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <form action="{{ route('obatmasuks.update', $obatmasuk->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_obat">ID Obat</label>
                            <input type="text" id="id_obat" name="id_obat" class="form-control" value="{{ $obatmasuk->id_obat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="{{ $obatmasuk->nama_obat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_masuk">Jumlah Obat Masuk</label>
                            <input type="number" id="jumlah_masuk" name="jumlah_masuk" class="form-control @error('jumlah_masuk') is-invalid @enderror" value="{{ old('jumlah_masuk', $obatmasuk->jumlah_masuk) }}">
                            @error('jumlah_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk', $obatmasuk->tanggal_masuk) }}">
                            @error('tanggal_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('obatmasuks.index') }}" class="btn btn-danger">Batal</a>
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
