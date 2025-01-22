@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
        

@endpush

@section('main')
    <div class="card card-success">
        <style>
            .card-body p {
                margin: 0;
                padding: 0;
                font-style:inherit;
                font-weight: bold;
                color: #000;
                font-size:14px;
            }
        </style>
        <div class="card-body">
            {{-- <p>Sistem Informasi Manajemen</p>
            <p>Pencatatan Obat dan Rekam Medis Pasien</p> --}}
            <p>Login Admin</p>
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                        <div class="input-group">    
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" autofocus placeholder="Masukkan email">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                </div>
                <script>
                    document.getElementById("email").addEventListener("input", function() {
                        var emailInput = document.getElementById("email");
                        if (emailInput.value !== '') {
                            emailInput.removeAttribute("placeholder");
                        } else {
                            emailInput.setAttribute("placeholder", "Masukkan email");
                        }
                    });
                </script>
                
                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                            {{-- <div class="float-right"> --}}
                                {{-- <a href="{{ route('password.request') }}">Lupa Password?</a> --}}
                            {{-- </div> --}}
                    </div>
                    </div>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" placeholder="Masukkan password">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-eye-slash" id="togglePassword"></i>
                        </span>
                        </div>
                    
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    
                </div>
                <script>
                    document.getElementById("password").addEventListener("input", function() {
                        var passwordInput = document.getElementById("password");
                        if (passwordInput.value !== '') {
                            passwordInput.removeAttribute("placeholder");
                        } else {
                            passwordInput.setAttribute("placeholder", "Masukkan password");
                        }
                    });
                </script>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>

        </div>

    </div>
<script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.getElementById("togglePassword");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    });
</script>


@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush