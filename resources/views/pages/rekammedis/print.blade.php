<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Rekam Medis - {{ $pasien->nama }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      margin: 0;
      padding: 0;
    }
    
    .table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    
    .table th,
    .table td {
      border: 1px solid #0f2211ba;
      padding: 10px;
      text-align: left;
    }
    
    .table th {
      background-color: #52c76bc2;
      font-weight: bold;
    }
    
    .table tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    
    .table tr:hover {
      background-color: #f1f1f1;
    }

    .label-column {
      width: 200px;
    }

    .text-center {
      text-align: center;
    }
    
    .text-left {
      text-align: left;
    }
    
    .mb-3 {
      margin-bottom: 15px;
    }
    
    .form-control {
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 10px;
      box-sizing: border-box;
    }

    .kop-surat {
      text-align: center;
    }
    
    .kop-surat img {
      height: 100px;
    }
    
    .kop-surat h2 {
      margin: 0;
    }
    
    .kop-surat p {
      margin: 0;
    }
    
    h1 {
      text-align: center;
    }
  </style>
</head>
<body>
    <div class="kop-surat">
        {{-- <img src="/img/SIMPOREK1.png"> --}}
        <h2>Pustu Batu Badak</h2>
        <p>Desa Batu Badak, Kecamatan Petak Malai, Kabupaten Katingan</p>
        <p>No. Telp: (+62) 858-2251-7256</p>
        <hr>
    </div>

  <h1>Detail Rekam Medis</h1>
  <h4>Informasi Pasien</h4>
  <table class="table">
    <thead>
      <tr>
        <th class="label-column">Label</th>
        <th>Nilai</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="label-column">Nama</td>
        <td>{{ $pasien->nama }}</td>
      </tr>
      <tr>
        <td class="label-column">Tanggal Lahir</td>
        <td>{{ $pasien->formatted_tanggal_lahir }}</td>
    </tr>
      <tr>
        <td class="label-column">Alamat</td>
        <td>{{ $pasien->alamat }}</td>
      </tr>
      <tr>
        <td class="label-column">Pendidikan</td>
        <td>{{ $pasien->pendidikan }}</td>
      </tr>
      <tr>
        <td class="label-column">Pekerjaan</td>
        <td>{{ $pasien->pekerjaan }}</td>
      </tr>
      <tr>
        <td class="label-column">Agama</td>
        <td>{{ $pasien->agama }}</td>
      </tr>
      <tr>
        <td class="label-column">Jenis Kelamin</td>
        <td>{{ $pasien->jenis_kelamin }}</td>
      </tr>
    </tbody>
  </table>
  <h4>Anamnesa</h4>
  <table class="table">
    <thead>
      <tr>
        <th class="label-column">Label</th>
        <th>Nilai</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="label-column">Keluhan Utama</td>
        <td>{{ $pasien->anamnesa->keluhan_utama }}</td>
      </tr>
      <tr>
        <td class="label-column">Riwayat Penyakit Sekarang</td>
        <td>{{ $pasien->anamnesa->riwayat_penyakit_sekarang }}</td>
      </tr>
      <tr>
        <td class="label-column">Riwayat Penyakit Dahulu</td>
        <td>{{ $pasien->anamnesa->riwayat_penyakit_dahulu }}</td>
      </tr>
      <tr>
        <td class="label-column">Riwayat Alergi Obat</td>
        <td>{{ $pasien->anamnesa->riwayat_alergi_obat }}</td>
      </tr>
    </tbody>
  </table>
  <h4>Pemeriksaan Fisik</h4>
  <table class="table">
    <thead>
      <tr>
        <th class="label-column" scope="col">Label</th>
        <th scope="col">Nilai</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="label-column">Tensi</td>
        <td>{{ $pasien->pemeriksaanFisik->tensi }} mmHg</td>
      </tr>
      <tr>
        <td class="label-column">Berat Badan</td>
        <td>{{ $pasien->pemeriksaanFisik->bb }} Kg</td>
      </tr>
      <tr>
        <td class="label-column">Nadi</td>
        <td>{{ $pasien->pemeriksaanFisik->nadi }} Kali Per Menit</td>
      </tr>
      <tr>
        <td class="label-column">Tinggi Badan</td>
        <td>{{ $pasien->pemeriksaanFisik->tb }} cm</td>
      </tr>
      <tr>
        <td class="label-column">RR</td>
        <td>{{ $pasien->pemeriksaanFisik->rr }} Kali Per Menit</td>
      </tr>
      <tr>
        <td class="label-column">Suhu</td>
        <td>{{ $pasien->pemeriksaanFisik->suhu }} C</td>
      </tr>
      <tr>
        <td class="label-column">Keadaan Umum</td>
        <td>{{ $pasien->pemeriksaanFisik->keadaan_umum }}</td>
      </tr>
      <tr>
        <td class="label-column">Diagnosa</td>
        <td>{{ $pasien->pemeriksaanFisik->diagnosa }}</td>
      </tr>
      <tr>
        <td class="label-column">Terapi</td>
        <td>{{ $pasien->pemeriksaanFisik->terapi }}</td>
      </tr>
    </tbody>
  </table>
</body>
</html>
