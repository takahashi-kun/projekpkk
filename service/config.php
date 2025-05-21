<?php
//koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendataan_penduduk";
//buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
// Check koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//table penduduk
$dataPenduduk = $conn->query("
    SELECT 
        nik,
        nama_lengkap,
        tempat_lahir,
        tanggal_lahir,
        jenis_kelamin,
        alamat,
        rt,
        rw,
        agama,
        status_perkawinan,
        status_hidup,
        pekerjaan,
        no_hp,
        tanggal_input,
        status_penduduk
    FROM 
        tpenduduk
");

$deletePenduduk = $conn->query(query: "SELECT * FROM tpenduduk");

//table keluarga
$keluarga = $conn->query("
    SELECT 
        id_keluarga,
        no_kartu_keluarga,
        nik,
        nama_kepala_kk,
        alamat,
        tanggal_input
    FROM
        tkeluarga
");

//table anggota keluarga
$anggotakk = $conn->query("
    SELECT 
        tanggotakeluarga.id_keluarga, 
        tpenduduk.nik, 
        tpenduduk.nama_lengkap AS nama, 
        tanggotakeluarga.hubungan, 
        tanggotakeluarga.id_anggota 
    FROM 
        tanggotakeluarga 
    INNER JOIN 
        tpenduduk 
    ON 
        tanggotakeluarga.nik = tpenduduk.nik
");

$keluargaupdate = $conn->query("
    SELECT * 
    FROM 
        tkeluarga
");

$keluargadelete = $conn->query("
    SELECT * 
    FROM 
        twafat
");

//table kelahiran
$querylahir = $conn->query(" 
    SELECT * 
    FROM 
        tb_lahir 
");

// query hubungan keluarga 
$queryhubungan = $conn->query("
    SELECT 
        hubungan 
    FROM 
        tanggotakeluarga
");

//table kematian
$querymati = $conn->query("
    SELECT * 
    FROM 
        twafat
");

//laporan keluarga
$data = $conn->query("
    SELECT * 
    FROM 
        tkeluarga
");

//cetak data kartu keluarga
$cetak_kk = $conn->query("
    SELECT 
        tpenduduk.nama_lengkap AS nama,
        tb_lahir.nik,
        tb_lahir.jenis_kelamin, 
        tb_lahir.tempat_lahir, 
        tb_lahir.tanggal_lahir, 
        tkeluarga.alamat, 
        tpenduduk.agama, 
        tpendidikan.tingkat_pendidikan,
        tpenduduk.pekerjaan,
        tpenduduk.status_perkawinan, 
        tanggotakeluarga.hubungan, 
        tb_lahir.nama_ayah,
        tb_lahir.nama_ibu,
        tb_provinsi.nama_provinsi AS provinsi, 
        tb_kabupaten.nama_kabupaten AS kabupaten, 
        tb_kecamatan.nama_kecamatan AS kecamatan, 
        tb_kelurahan.nama_kelurahan AS kelurahan
    FROM 
        tpenduduk 
    INNER JOIN
        tkeluarga 
    ON 
        tpenduduk.nik = tkeluarga.nik
    INNER JOIN 
        tanggotakeluarga 
    ON 
        tpenduduk.nik = tanggotakeluarga.nik
    INNER JOIN 
        tb_lahir 
    ON
        tpenduduk.nik = tb_lahir.nik
    INNER JOIN 
        twafat 
    ON 
        tpenduduk.nik = twafat.nik
    INNER JOIN 
        twilayah 
    ON 
        tpenduduk.id_wilayah = twilayah.id_wilayah
    INNER JOIN 
        tpendidikan 
    ON 
        tpenduduk.nik = tpendidikan.nik
    INNER JOIN 
        tb_provinsi 
    ON 
        twilayah.id_provinsi = tb_provinsi.id_provinsi
    INNER JOIN 
        tb_kabupaten 
    ON 
        twilayah.id_kabupaten = tb_kabupaten.id_kabupaten
    INNER JOIN 
        tb_kecamatan 
    ON 
        twilayah.id_kecamatan = tb_kecamatan.id_kecamatan
    INNER JOIN 
        tb_kelurahan 
    ON 
        twilayah.id_kelurahan = tb_kelurahan.id_kelurahan;
");
