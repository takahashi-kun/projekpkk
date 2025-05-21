<?php 
session_start();
include '../service/config.php';

if (isset($_GET['nik'])) {
    $nik = mysqli_real_escape_string($conn, $_GET['nik']);

    $query = "SELECT tpenduduk.*, tb_lahir.nama_ayah, tb_lahir.nama_ibu 
              FROM tpenduduk
              LEFT JOIN tb_lahir ON tpenduduk.nik = tb_lahir.nik
              WHERE tpenduduk.nik = '$nik'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data penduduk tidak ditemukan.");
    }
} else {
    die("NIK tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>KTP Indonesia</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #e0e0e0;
    }

    .ktp-card {
      width: 850px;
      height: 540px;
      background: linear-gradient(to right, #b3e5fc, #81d4fa);
      border: 2px solid #0277bd;
      border-radius: 10px;
      padding: 30px;
      margin: 50px auto;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      color: #000;
      position: relative;
    }

    .ktp-header {
      text-align: center;
      font-weight: bold;
      font-size: 22px;
      margin-bottom: 20px;
    }

    .ktp-photo {
      position: absolute;
      top: 120px;
      right: 30px;
      width: 140px;
      height: 180px;
      border: 1px solid #000;
      background-color: #cfd8dc;
    }

    .ktp-table {
      font-size: 18px;
      line-height: 1.8;
    }

    .ktp-table td {
      vertical-align: top;
    }

    .label {
      width: 180px;
      font-weight: bold;
    }

    .signature {
      position: absolute;
      bottom: 30px;
      right: 30px;
      text-align: center;
      font-size: 14px;
    }

    .signature img {
      width: 100px;
      margin-bottom: 5px;
    }
  </style>
</head>
<body>
  <div class="ktp-card">
    <div class="ktp-header">PROVINSI JAWA BARAT<br>KABUPATEN BANDUNG</div>

    <table class="ktp-table">
      <tr><td class="label">NIK</td><td>: 3275012309980001</td></tr>
      <tr><td class="label">Nama</td><td>: RYAN RENALDI</td></tr>
      <tr><td class="label">Tempat/Tgl Lahir</td><td>: BANDUNG, 23-09-1998</td></tr>
      <tr><td class="label">Jenis Kelamin</td><td>: LAKI-LAKI</td></tr>
      <tr><td class="label">Alamat</td><td>: JL. MERPATI NO. 12</td></tr>
      <tr><td class="label">RT/RW</td><td>: 002/003</td></tr>
      <tr><td class="label">Kel/Desa</td><td>: SUKAMAJU</td></tr>
      <tr><td class="label">Kecamatan</td><td>: BOJONGLOA KALER</td></tr>
      <tr><td class="label">Agama</td><td>: ISLAM</td></tr>
      <tr><td class="label">Status Perkawinan</td><td>: BELUM KAWIN</td></tr>
      <tr><td class="label">Pekerjaan</td><td>: MAHASISWA</td></tr>
      <tr><td class="label">Kewarganegaraan</td><td>: WNI</td></tr>
      <tr><td class="label">Berlaku Hingga</td><td>: SEUMUR HIDUP</td></tr>
    </table>

    <div class="ktp-photo">
      <!-- Tempat foto -->
    </div>

    <div class="signature">
      Bandung, 01 Januari 2025<br>
      Kepala Dinas<br><br><br>
      <u>Drs. SUHERMAN</u>
    </div>
  </div>
</body>
</html>
