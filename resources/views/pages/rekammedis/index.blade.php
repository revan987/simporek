@extends('layouts.app')

@section('title', 'Rekam Medis')

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
                <h1>Rekam Medis Data Pasien</h1>
            </div>
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
                            <h4>Rekam Medis</h4>
                            <div class="section-header-button">
                                <div class="btn-group mr-12">
                                    
                                </div>
                                <a href="{{ route('rekammedis.create') }}" class="btn btn-primary">Tambahkan</a>
                            </div>
                        </div>  
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="{{ route('rekammedis.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="nama">
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
                                            <th style="width: 55%; text-align:center">Nama</th>
                                            <th style="width: 15%; text-align:center">Jenis Kelamin</th>
                                            <th style="width: 15%; text-align:center">Tanggal Lahir</th>
                                            <th style="width: 15%; text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pasiens as $pasien)
                                            <tr>
                                                <td style="margin-top:5px; text-align:center">{{ $pasien->nama }}</td>
                                                <td style="margin-top:5px; text-align:center">{{ $pasien->jenis_kelamin }}</td>
                                                <td style="margin-top:5px; text-align:center">{{ $pasien->formatted_tanggal_lahir }}</td>
                                                <td style="text-align:center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('rekammedis.show', $pasien->id) }}" class="btn btn-sm btn-primary btn-icon mr-3 mb-3 mt-3">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>

                                                        <a href="{{ route('rekammedis.edit', $pasien->id) }}" class="btn btn-sm btn-info btn-icon mr-3 mb-3 mt-3">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>

                                                        <form action="{{ route('rekammedis.destroy', $pasien) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger btn-icon mb-3 mt-3 confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
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

        // handle error alert
        @if($errors->has('nama'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ $errors->first('nama') }}",
                showConfirmButton: true,
                confirmButtonColor: '#d33',
            });
        @endif
    </script>
@endpush
