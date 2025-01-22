@extends('layouts.app')

@section('title', 'Dashboard')

@section('main')
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .main-content {
            background-image: url('img/white.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
            animation: fadeIn 0.75s ease-in-out; /* Animasi fadeIn selama 1 detik */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #71ba9f7c; /* Transparansi 50% */
            z-index: 1;
        }
    </style>

    <div class="main-content">
        <div class="overlay"></div> <!-- Overlay transparan -->
        <section class="section">
            <div class="section-header">
                <h1>Selamat Datang Admin</h1>
            </div>
            <!-- Isi konten lainnya -->
        </section>
    </div>
@endsection
