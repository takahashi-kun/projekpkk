<?php
include '../service/config.php';
// query untuk menggabungkan semua data yang di perlukan untuk pengisian kartu keluarga yang ada di bawa ini
// $keluarga = $conn->query("
//     SELECT
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Title -->
    <title>KK-Naswanida Nafiula</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../templates/css/cetak-kk/style.css" />
</head>

<body>
    <!-- Container Header -->
    <div class="container">
        <img src="../templates/images/Garuda.png" alt="Garuda" />

        <div class="text-center">
            <h1>Kartu Keluarga</h1>
            <h3>No. 1234567890123456</h3>
        </div>

        <div class="text-right">
            <h4><b>K-1234567</b></h4>
        </div>
    </div>

    <!-- Container address -->
    <div class="container-address">
        <div class="left">
            <h4>Nama Kepala Keluarga: <b>RYAN RENALDI</b></h4>
            <h4>Alamat: JL. IKAN MUJAIR N0.9</h4>
            <h4>RT / RW: 007/001</h4>
            <h4>Kode Pos: 62412</h4>
        </div>
        <div class="right">
            <h4>Desa / Kelurahan : TUNJUNGSEKAR</h4>
            <h4>Kecamatan: LOWOKWARU</h4>
            <h4>Kabupaten / Kota: KOTA MALANG</h4>
            <h4>Provinsi: JAWA TIMUR</h4>
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
            <tr>
                <td>1</td>
                <td>RYAN RENALDI</td>
                <td>3573060708980001</td>
                <td>LAKI-LAKI</td>
                <td>MEDAN</td>
                <td>19-02-1981</td>
                <td>ISLAM</td>
                <td>DIPLOMA IV/STRATA I</td>
                <td>WIRASWASTA</td>
                <td>TIDAK TAHU</td>
            </tr>
            <tr>
                <td>2</td>
                <td>ISABELLA ANGELINE</td>
                <td>3573060403250001</td>
                <td>PEREMPUAN</td>
                <td>MALANG</td>
                <td>08-03-1982</td>
                <td>ISLAM</td>
                <td>DIPLOMA IV/STRATA I</td>
                <td>MENGURUS RUMAH TANGGA</td>
                <td>TIDAK TAHU</td>
            </tr>
            <tr>
                <td>3</td>
                <td>ALEXANDER RENALDI</td>
                <td>3573060302570001</td>
                <td>LAKI-LAKI</td>
                <td>JAKARTA</td>
                <td>17-07-2004</td>
                <td>ISLAM</td>
                <td>SLTP/SEDERAJAT</td>
                <td>PELAJAR/MAHASISWA</td>
                <td>TIDAK TAHU</td>
            </tr>
            <tr>
                <td>4</td>
                <td>ANAYA RENALDI</td>
                <td>3573060603920001</td>
                <td>PEREMPUAN</td>
                <td>JAKARTA</td>
                <td>18-11-2007</td>
                <td>ISLAM</td>
                <td>TAMAT SD/SEDERAJAT</td>
                <td>PELAJAR/MAHASISWA</td>
                <td>TIDAK TAHU</td>
            </tr>
            <tr>
                <td>5</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>6</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>7</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>8</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>9</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>10</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
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
            <tr>
                <td>1</td>
                <td>KAWIN TERCATAT</td>
                <td>28-02-2000</td>
                <td>KEPALA KELUARGA</td>
                <td>WNI</td>
                <td>-</td>
                <td>-</td>
                <td>REYHAN RENALDI</td>
                <td>EMIRA PUTRI</td>
            </tr>
            <tr>
                <td>2</td>
                <td>KAWIN TERCATAT</td>
                <td>28-02-2000</td>
                <td>ISTRI</td>
                <td>WNI</td>
                <td>-</td>
                <td>-</td>
                <td>CHRISTIAN</td>
                <td>ADENA</td>
            </tr>
            <tr>
                <td>3</td>
                <td>BELUM KAWIN</td>
                <td>-</td>
                <td>ANAK</td>
                <td>WNI</td>
                <td>-</td>
                <td>-</td>
                <td>RYAN RENALDI</td>
                <td>ISABELLA ANGELINE</td>
            </tr>
            <tr>
                <td>4</td>
                <td>BELUM KAWIN</td>
                <td>-</td>
                <td>ANAK</td>
                <td>WNI</td>
                <td>-</td>
                <td>-</td>
                <td>RYAN RENALDI</td>
                <td>ISABELLA ANGELINE</td>
            </tr>
            <tr>
                <td>5</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>6</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>7</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>8</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>9</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>10</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
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
            <h4 class="name"><b>RYAN RENALDI, S.E.</b></h4>
            <hr />
            <h5>Tanda Tangan / Cap Jempol</h5>
        </div>
        <div class="right-lower">
            <h3 class="title">
                KEPALA DINAS KEPENDUDUKAN DAN <br />
                PENCATATAN SIPIL KOTA MALANG
            </h3>
            <h4 class="name">Dra. Eny Hari Sutiarni, M.M</h4>
            <hr />
            <h5>NIP : 123456789012345</h5>
        </div>
    </div>

    <script>
        // Timer untuk pop up muncul
        const countdown = 1;

        // Menghitung mundur timer + pop up print muncul
        function startCountdown() {
            let timeLeft = countdown;
            const countdownInterval = setInterval(() => {
                console.log(`Printing in ${timeLeft} seconds...`);
                timeLeft--;

                if (timeLeft < 0) {
                    clearInterval(countdownInterval);
                    window.print();
                }
            }, 1000);
        }

        // Tutup tab otomatis saat pop up tertutup
        window.onafterprint = function() {
            window.close(); // Close the tab
        };

        // Memulai program
        window.onload = startCountdown;
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