@extends('layouts.app')

@section('title', 'Stok Obat')

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
                <h1>Stok Obat</h1>
            </div>
        </section>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        {{-- nyalakan yg dibawah ini jika ingin menambahkan alertnya  --}}
                        {{-- @include('layouts.alert') --}}
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Stok Obat</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('stokobats.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama_obat">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 15%; text-align:center">ID Obat</th>
                                                <th style="width: 50%; text-align:center">Nama Obat</th>
                                                <th style="width: 35%; text-align:center">Jumlah Stok Obat</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($stokobats as $stokobat)
                                                <tr>
                                                  <td style="width: 15%; text-align:center" class="{{ $stokobat->jumlah_tersedia < 0 ? 'negative-stock' : '' }}">{{ $stokobat->id_obat }}</td>
                                                  <td style="width: 50%; text-align:center" class="{{ $stokobat->jumlah_tersedia < 0 ? 'negative-stock' : '' }}">{{ $stokobat->nama_obat }}</td>
                                                  <td style="width: 35%; text-align:center" class="{{ $stokobat->jumlah_tersedia < 0 ? 'negative-stock' : '' }}"> {{ $stokobat->jumlah_tersedia }}
                                                  </td>
                                                </tr>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $stokobats->links() }}
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
        //message with sweetalert
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
    </script>
@endpush
