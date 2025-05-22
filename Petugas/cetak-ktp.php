<?php 
session_start();
include '../service/config.php';

if (isset($_GET['nik'])) {
    $nik = mysqli_real_escape_string($conn, $_GET['nik']);

    $query = "
        SELECT tpenduduk.*, tb_lahir.nama_ayah, tb_lahir.nama_ibu,
               tb_provinsi.nama_provinsi AS provinsi,
               tb_kabupaten.nama_kabupaten AS kabupaten,
               tb_kecamatan.nama_kecamatan AS kecamatan,
               tb_kelurahan.nama_kelurahan AS kelurahan
        FROM tpenduduk
        LEFT JOIN tb_lahir ON tpenduduk.nik = tb_lahir.nik
        LEFT JOIN twilayah ON tpenduduk.id_wilayah = twilayah.id_wilayah
        LEFT JOIN tb_provinsi ON twilayah.id_provinsi = tb_provinsi.id_provinsi
        LEFT JOIN tb_kabupaten ON twilayah.id_kabupaten = tb_kabupaten.id_kabupaten
        LEFT JOIN tb_kecamatan ON twilayah.id_kecamatan = tb_kecamatan.id_kecamatan
        LEFT JOIN tb_kelurahan ON twilayah.id_kelurahan = tb_kelurahan.id_kelurahan
        WHERE tpenduduk.nik = '$nik'
    ";
    

    $result = mysqli_query($conn, $query);
    
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data tidak ditemukan.");
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
  <div class="ktp-header">
    PROVINSI <?= strtoupper($data['provinsi']) ?><br>
    KABUPATEN <?= strtoupper($data['kabupaten']) ?>
  </div>

  <table class="ktp-table">
    <tr><td class="label">NIK</td><td>: <?= $data['nik'] ?></td></tr>
    <tr><td class="label">Nama</td><td>: <?= strtoupper($data['nama_lengkap']) ?></td></tr>
    <tr><td class="label">Tempat/Tgl Lahir</td><td>: <?= strtoupper($data['tempat_lahir']) ?>, <?= date('d-m-Y', strtotime($data['tanggal_lahir'])) ?></td></tr>
    <tr><td class="label">Jenis Kelamin</td><td>: <?= strtoupper($data['jenis_kelamin']) ?></td></tr>
    <tr><td class="label">Alamat</td><td>: <?= strtoupper($data['alamat']) ?></td></tr>
    <tr><td class="label">RT/RW</td><td>: <?= $data['rt'] ?>/<?= $data['rw'] ?></td></tr>
    <tr><td class="label">Kel/Desa</td><td>: <?= strtoupper($data['kelurahan']) ?></td></tr>
    <tr><td class="label">Kecamatan</td><td>: <?= strtoupper($data['kecamatan']) ?></td></tr>
    <tr><td class="label">Agama</td><td>: <?= strtoupper($data['agama']) ?></td></tr>
    <tr><td class="label">Status Perkawinan</td><td>: <?= strtoupper($data['status_perkawinan']) ?></td></tr>
    <tr><td class="label">Pekerjaan</td><td>: <?= strtoupper($data['pekerjaan']) ?></td></tr>
    <tr><td class="label">Kewarganegaraan</td><td>: <?= strtoupper($data['kewarganegaraan'] ?? '-') ?></td></tr>
    <tr><td class="label">Berlaku Hingga</td><td>: SEUMUR HIDUP</td></tr>
  </table>

  <div class="ktp-photo">
    <!-- Foto jika ada -->
    <?php if (!empty($data['foto'])): ?>
      <img src="../uploads/foto/<?= $data['foto'] ?>" alt="Foto" style="width:100%; height:100%;">
    <?php endif; ?>
  </div>

  <div class="signature">
    <?= $data['kabupaten'] ?>, <?= date('d-m-Y') ?><br>
    Kepala Dinas<br><br><br>
    <u>Drs. SUHERMAN</u>
  </div>
</div>
</body>
</html>
