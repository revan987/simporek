@extends('layouts.app')

@section('title', 'Tambah Obat')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Obat</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('masterobats.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="id_obat">ID Obat</label>

                        {{-- jika ingin agar id obat bisa diubah pakai/nyalakan yang ini di bawah ini --}}
                        {{-- <input type="number" name="id_obat" class="form-control @error('id_obat') is-invalid @enderror" required value="{{ $nextIdObat }}"> --}}

                        {{-- Jika ingin agar id obat tidak bisa diubah pakai/nyalakan yang memakai readonly di bawah ini dan matikan yang di atasnya--}}
                        <input type="number" name="id_obat" class="form-control @error('id_obat') is-invalid @enderror" required value="{{ $nextIdObat }}" readonly>
                        @error('id_obat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" required>
                        @error('nama_obat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="{{ route('masterobats.index') }}">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
