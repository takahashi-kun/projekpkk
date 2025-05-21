<?php
include '../service/config.php';

if (isset($_GET['id_keluarga'])) {
    $id_keluarga = intval($_GET['id_keluarga']);

    // Ambil data keluarga (dari tbkeluarga dan wilayah administratif)
    $query_keluarga = "
        SELECT 
            tkeluarga.*,
            tb_kelurahan.nama_kelurahan,
            tb_kecamatan.nama_kecamatan,
            tb_kabupaten.nama_kabupaten,
            tb_provinsi.nama_provinsi
        FROM tkeluarga 
        LEFT JOIN twilayah ON tkeluarga.id_wilayah = twilayah.id_wilayah
        LEFT JOIN tb_kelurahan ON twilayah.id_kelurahan = tb_kelurahan.id_kelurahan
        LEFT JOIN tb_kecamatan ON twilayah.id_kecamatan = tb_kecamatan.id_kecamatan
        LEFT JOIN tb_kabupaten ON twilayah.id_kabupaten = tb_kabupaten.id_kabupaten
        LEFT JOIN tb_provinsi ON twilayah.id_provinsi = tb_provinsi.id_provinsi
        WHERE tkeluarga.id_keluarga = $id_keluarga
    ";
    $result_keluarga = mysqli_query($conn, $query_keluarga);
    $data_keluarga = mysqli_fetch_assoc($result_keluarga);

    // Ambil data anggota keluarga dan data penduduk
    $query_anggota = "
        SELECT 
            tanggotakeluarga.nik,
            tpenduduk.nama_lengkap,
            tpenduduk.jenis_kelamin,
            tpenduduk.tempat_lahir,
            tpenduduk.tanggal_lahir,
            tpenduduk.agama,
            tpenduduk.status_perkawinan,
            tpenduduk.pekerjaan,
            tpenduduk.status_hidup,
            tb_lahir.nama_ayah,
            tb_lahir.nama_ibu,
            tanggotakeluarga.hubungan
        FROM tanggotakeluarga
        JOIN tpenduduk ON tanggotakeluarga.nik = tpenduduk.nik
        LEFT JOIN tb_lahir ON tpenduduk.nik = tb_lahir.nik
        WHERE tanggotakeluarga.id_keluarga = $id_keluarga
    ";
    $result_anggota = mysqli_query($conn, $query_anggota);
} else {
    die("ID Keluarga tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tag -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title -->
    <title>Cetak Kartu Keluarga</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../templates/css/cetak-kk/style.css" />
</head>
<body>
    <!-- Container Header -->
    <div class="container">
        <img src="../templates/images/Garuda.png" alt="Garuda" />

        <div class="text-center">
        <h1>Kartu Keluarga</h1>
        <h3><?php echo $data_keluarga['no_kartu_keluarga']; ?></h3>
      </div>

    <div class="text-right">
        <h4><b>K-1234567</b></h4>
      </div>
    </div>

    <!-- Container address -->
    <div class="container-address">
      <div class="left">
        <h4>Nama Kepala Keluarga: <?php echo $data_keluarga['nama_kepala_kk']; ?></h4>
        <h4>Alamat:<?php echo $data_keluarga['alamat']; ?></h4>
        <h4>RT / RW:<?php echo $data_keluarga['rt']; ?> / RW <?php echo $data_keluarga['rw']; ?></h4>
        <h4>Kode Pos: - </h4>
      </div>
      <div class="right">
        <h4>Desa / Kelurahan :<?php echo $data_keluarga['nama_kelurahan']; ?></h4>
        <h4>Kecamatan: <?php echo $data_keluarga['nama_kecamatan']; ?></h4>
        <h4>Kabupaten / Kota: <?php echo $data_keluarga['nama_kabupaten']; ?></h4>
        <h4>Provinsi: <?php echo $data_keluarga['nama_provinsi']; ?></h4>
      </div>
    </div>

    <!-- Tables higher -->
    <table cellpadding="5px" class="random">
      <thead>
  <tr>
    <th>No</th>
    <th width="25%">Nama Lengkap</th>
    <th width="12%">NIK</th>
    <th width="8%">Jenis Kelamin</th>
    <th width="12%">Tempat Lahir</th>
    <th width="8%">Tanggal Lahir</th>
    <th width="6%">Agama</th>
    <th width="15%">Pendidikan</th>
    <th width="20%">Jenis Pekerjaan</th>
    <th width="5%">Golongan Darah</th>
  </tr>
  <tr class="dark">
    <th></th>
    <th>(1)</th>
    <th>(2)</th>
    <th>(3)</th>
    <th>(4)</th>
    <th>(5)</th>
    <th>(6)</th>
    <th>(7)</th>
    <th>(8)</th>
    <th>(9)</th>
  </tr>
</thead>
<tbody>
<?php
$no = 1;
while ($anggota = mysqli_fetch_assoc($result_anggota)) {
    // Ambil pendidikan terakhir berdasarkan NIK
    $nik = $anggota['nik'];
    $query_pendidikan = mysqli_query($conn, "SELECT tingkat_pendidikan FROM tpendidikan WHERE nik = '$nik' ORDER BY tahun_lulus DESC LIMIT 1");
    $pendidikan = mysqli_fetch_assoc($query_pendidikan);
    $tingkat_pendidikan = $pendidikan ? $pendidikan['tingkat_pendidikan'] : '-';

    // Ambil golongan darah berdasarkan NIK
    $query_golongan = mysqli_query($conn, "SELECT tb_golda.golongan_darah 
        FROM tpenduduk 
        JOIN tb_golda ON tpenduduk.nik = tb_golda.nik 
        WHERE tpenduduk.nik = '$nik' LIMIT 1");
    $golongan = mysqli_fetch_assoc($query_golongan);
    $gol_darah = $golongan ? $golongan['golongan_darah'] : 'Tidak Tahu';

    echo "<tr>
        <td>{$no}</td>
        <td>{$anggota['nama_lengkap']}</td>
        <td>{$anggota['nik']}</td>
        <td>" . ($anggota['jenis_kelamin'] == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN') . "</td>
        <td>{$anggota['tempat_lahir']}</td>
        <td>" . date('d-m-Y', strtotime($anggota['tanggal_lahir'])) . "</td>
        <td>{$anggota['agama']}</td>
        <td>{$tingkat_pendidikan}</td>
        <td>{$anggota['pekerjaan']}</td>
        <td>{$gol_darah}</td>
    </tr>";
    $no++;
}
?>
</tbody>

    </table>
    <br />

    <!-- Tables lower -->
    <table cellpadding="2px" class="random lower">
      <thead>
  <tr>
    <th rowspan="2" align="center" width="1%">No</th>
    <th rowspan="2" align="center" width="10%">Status Perkawinan</th>
    <th rowspan="2" align="center" width="10%">Tanggal Perkawinan</th>
    <th rowspan="2" align="center" width="10%">Status Hubungan Dalam Keluarga</th>
    <th rowspan="2" align="center" width="10%">Kewarganegaraan</th>
    <th colspan="2" width="30%">Dokumen Imigrasi</th>
    <th colspan="2" width="40%">Nama Orang Tua</th>
  </tr>
  <tr>
    <th width="10%">No.Paspor</th>
    <th width="10%">No. KITAP</th>
    <th width="20%" align="center">Ayah</th>
    <th width="20%" align="center">Ibu</th>
  </tr>
  <tr class="dark">
    <th></th>
    <th>(10)</th>
    <th>(11)</th>
    <th>(12)</th>
    <th>(13)</th>
    <th>(14)</th>
    <th>(15)</th>
    <th>(16)</th>
    <th>(17)</th>
  </tr>
</thead>
<tbody>
<?php
$no = 1;
mysqli_data_seek($result_anggota, 0); // reset pointer untuk loop ulang jika sebelumnya sudah digunakan
while ($anggota = mysqli_fetch_assoc($result_anggota)) {
    // Status perkawinan dan tanggal (jika tersedia di tabel `tpenduduk`)
    $status_perkawinan = $anggota['status_perkawinan'] ?? '-';
    $tanggal_perkawinan = isset($anggota['tanggal_perkawinan']) ? date('d-m-Y', strtotime($anggota['tanggal_perkawinan'])) : '-';

    // Kewarganegaraan (hardcoded atau dari kolom jika ada)
    $kewarganegaraan = 'WNI'; // atau ambil dari $anggota['kewarganegaraan'] jika tersedia

    // Dokumen imigrasi (jika ada di kolom, atau tanda '-')
    $paspor = $anggota['no_paspor'] ?? '-';
    $kitap = $anggota['no_kitap'] ?? '-';

    // Nama orang tua (pastikan kolom tersedia)
    $nama_ayah = $anggota['nama_ayah'] ?? '-';
    $nama_ibu = $anggota['nama_ibu'] ?? '-';

    echo "<tr>
        <td>{$no}</td>
        <td>{$status_perkawinan}</td>
        <td>{$tanggal_perkawinan}</td>
        <td>{$anggota['hubungan']}</td>
        <td>{$kewarganegaraan}</td>
        <td>{$paspor}</td>
        <td>{$kitap}</td>
        <td>{$nama_ayah}</td>
        <td>{$nama_ibu}</td>
    </tr>";
    $no++;
}
?>
</tbody>
    </table>

    <!-- Container data lower -->
    <div class="container-lower">
      <div class="left">
        <h4>Dikeluarkan Tanggal : <span>16-07-2021</span></h4>
        <div class="try">
          <h4>LEMBAR :</h4>
          <ol type="I">
            <li>Kepala Keluarga</li>
            <li>RT</li>
            <li>Desa/kelurahan</li>
            <li>Kecamatan</li>
          </ol>
        </div>
      </div>
      <div class="middle">
        <h3 class="title">KEPALA KELUARGA</h3>
        <h4 class="name"><b><?php echo $data_keluarga['nama_kepala_kk']; ?></b></h4>
        <hr />
        <h5>Tanda Tangan / Cap Jempol</h5>
      </div>
      <div class="right-lower">
        <h3 class="title">
          KEPALA DINAS KEPENDUDUKAN DAN <br />
          PENCATATAN SIPIL <?php echo $data_keluarga['nama_kabupaten']; ?>
        </h3>
        <h4 class="name">Dra. Eny Hari Sutiarni, M.M</h4>
        <hr />
        <h5>NIP : 123456789012345</h5>
      </div>
    </div>

    <script>
        // // Timer untuk pop up muncul
        // const countdown = 1;

        // // Menghitung mundur timer + pop up print muncul
        // function startCountdown() {
        //     let timeLeft = countdown;
        //     const countdownInterval = setInterval(() => {
        //         console.log(`Printing in ${timeLeft} seconds...`);
        //         timeLeft--;

        //         if (timeLeft < 0) {
        //             clearInterval(countdownInterval);
        //             window.print();
        //         }
        //     }, 1000);
        // }

        // // Tutup tab otomatis saat pop up tertutup
        // window.onafterprint = function() {
        //     window.close(); // Close the tab
        // };

        // // Memulai program
        // window.onload = startCountdown;
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>