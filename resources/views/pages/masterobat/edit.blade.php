@extends('layouts.app')

@section('title', 'Edit Obat')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Obat</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('masterobats.update', $masterobat->id_obat) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_obat">ID Obat</label>
                            <!-- Menambahkan atribut readonly -->
                            <input type="text" name="id_obat" class="form-control" value="{{ $masterobat->id_obat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" value="{{ $masterobat->nama_obat }}" required>
                            @error('nama_obat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-danger" href="{{ route('masterobats.index') }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
