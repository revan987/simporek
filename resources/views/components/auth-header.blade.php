<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        .login-brand {
            text-align: center; /* Mengatur teks berada di tengah */
            margin-top: 10px;
        }
        .login-brand img {
            width: 170px;
            border-radius: 10%; /* Membuat gambar menjadi rounded square */
        }
        .login-brand .title {
            font-size: 43px; /* Mengatur ukuran teks */
            font-weight: bold;
            margin-top: 2px; /* Memberi jarak antara gambar dan teks */
            color: #1ed36acd; /* Mengatur warna teks */
        }

    </style>
</head>
<body>
    <div class="login-brand">
        <img src="{{ asset('img/pusksms.png') }}" alt="logo" class="rounded-square">
        <div class="title">SIMPOREK</div>
    </div>
</body>
</html>
