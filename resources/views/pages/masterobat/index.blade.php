@extends('layouts.app')

@section('title', 'Daftar Obat')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        .negative-stock {
            background-color: red;
            color: white;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .main-content {
            animation: fadeIn 0.75s ease-out; /* Animasi fadeIn selama 0.5 detik */
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header"> 
                <h1>Daftar Obat</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-secondary">
                            <i class="fas fa-calendar-alt" style="font-size: 30px; color: black;"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 style="font-size: 20px; font-weight: bold; color: black">Date/Time</h4>
                                <div style="text-align: center">
                                    <span id="current-date" style="font-size: 20px"></span>
                                </div>
                                <script>
                                    const currentDate = new Date().toLocaleDateString('id-ID', {
                                        day: '2-digit',
                                        month: '2-digit',
                                        year: '2-digit'
                                    });
                                    document.getElementById('current-date').textContent = currentDate;
                                </script>
                            </div>
                            <div class="card-body">
                                <!-- Kosong -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-pills"></i>
                        </div>
                        <div class="card-wrap text-center">
                            <div class="card-header">
                                <h4>Jumlah Daftar Obat</h4>
                            </div>
                            <div class="card-body">
                                {{ $masterobats->total() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <img alt="image" src="{{ asset('img/SIMPOREK.png') }}" class="img-thumbnail smaller-image">
                        </div>
                        <div class="card-wrap text-center">
                            <div class="card-header"></div>
                            <div class="card-body">
                                Pencatatan Data Obat
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        {{-- nyalakan yang di bawah ini jika ingin menambahkan alertnya --}}
                        {{-- @include('layouts.alert') --}}
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Daftar Obat</h4>
                                <div class="section-header-button">
                                <div class="btn-group mr-12">
                                    
                                    </div>
                                    <a href="{{ route('masterobats.create') }}" class="btn btn-primary">Tambahkan</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('masterobats.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama_obat">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-2"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th style="width: 25%; text-align:center">ID Obat</th>
                                            <th style="width: 55%;text-align:center">Nama Obat</th>
                                            <th style="width: 20%;text-align:center">Action</th>
                                        </tr>
                                        @foreach ($masterobats as $masterobat)
                                        <tr>
                                            <td style="text-align:center">{{ $masterobat->id_obat }}</td>
                                            <td style="text-align:center">{{ $masterobat->nama_obat }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('masterobats.edit', $masterobat->id_obat) }}" class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('masterobats.destroy', $masterobat->id_obat) }}" method="POST" class="ml-2 delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                            <i class="fas fa-times"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>

                                <!-- Tombol navigasi halaman -->
                                {{ $masterobats->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<!-- JS Libraries -->
<script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
<script src="{{ asset('js/page/features-posts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// message with sweetalert
@if(session('success'))
Swal.fire({
    icon: "success",
    title: "BERHASIL",
    text: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 2000
});
@elseif(session('error'))
Swal.fire({
    icon: "error",
    title: "GAGAL!",
    text: "{{ session('error') }}",
    showConfirmButton: false,
    timer: 2000
});
@endif

// handle delete confirmation
document.querySelectorAll('.confirm-delete').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const form = this.closest('form');
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

// handle duplicate dataobat
@if($errors->has('nama_obat'))
Swal.fire({
    icon: "error",
    title: "GAGAL!",
    text: "{{ $errors->first('nama_obat') }}",
    showConfirmButton: true,
    confirmButtonColor: '#d33',
});
@endif
</script>
@endpush
