<?php 
///pastikan path menuju pada file congif.php benar
include 'service/config.php';
session_start();

//validasi input sebelum di proses
if (isset($_POST['username']) && isset($_POST['password'])) {
    $aliuser = $_POST['username'];
    $alipass = $_POST['password'];
    
    //cek apakah username dan password ada di database
    $aliquery = "SELECT * FROM tb_petugas WHERE username= ?";
    $aliprepare = mysqli_prepare($conn,$aliquery); // ini persiapan sebelum query di eksekusi
    mysqli_stmt_bind_param($aliprepare, 's', $aliuser);
    mysqli_stmt_execute($aliprepare); //meng eksekusi query yang telah di persiapkan sebelumnya
    $aliresult = mysqli_stmt_get_result($aliprepare);// hasil dari query yang telah di eksekusi

    if (mysqli_num_rows($aliresult) > 0) {
        $alidata = mysqli_fetch_assoc($aliresult);

        //cek apakah password yang diinputkan sesuai dengan password di database
        if ($alidata['password'] == $alipass) {
            //set session untuk semua peran
            session_regenerate_id(true);
            $_SESSION['id_petugas'] = $alidata['id_petugas'];
            $_SESSION['nama_petugas'] = $alidata['nama_petugas'];
            $_SESSION['username'] = $alidata['username'];
            $_SESSION['hak'] = $alidata['hak'];

            //catat aktivitas login
            $aliid_petugas = $alidata['id_petugas'];// id user tabel tb_petugas
            $aliaksi = "Login sebagai " . $alidata['hak']; // aksi yang dicatat
            $alitanggal = date('Y-m-d H:i:s');// tanggal dan waktu sekarang

            //query untuk mencatat aktivitas login
            $aliquery = "INSERT INTO tb_aktivitas (id_petugas, aksi, tanggal) VALUES (?,?,?)";
            $alilogprepare = mysqli_prepare($conn,$aliquery); 
            if ($alilogprepare) {
                mysqli_stmt_bind_param($alilogprepare,"iss",$aliid_petugas,$aliaksi,$alitanggal); 
                mysqli_stmt_execute($alilogprepare);
            }else {
                echo "<script>alert(' Aktivitas Gagal di catat!');</script>";
            }
            
            // ini persiapan sebelum query di eksekusi
            // mengikat $aliuser, $aliaksi, dan $alitanggal ke parameter ? di dalam query, dengan tipe data masing-masing sesuai yang telah didefinisikan dalam string "iss".

            //cek hak akses dan arahkan ke halaman yang sesuai
            if ($alidata ['hak'] == 'admin') {
                header("Location: Admin/log_aktivitas.php");// mengrahkan ke halaman admin
            }elseif($alidata['hak'] == 'pemerintah'){
                header("location: pemerintahan/index.php");// mengrahkan ke halaman pemerintah
            }elseif($alidata['hak'] == 'petugas'){
                header("location: Petugas/dashboard-p.php");//menhgrahkan ke halaman petugas
            }else {
                echo "<script>alert('hak akses tidak dikenali!');</script>";
                echo "<script>window.location.href='index.php';</script>";
            }
            exit(); //tambahkan ini untuk menghentikan eksekusi script setelah redirect
        }else {
            echo "<script>alert('akun tidak ditemukan!');</script>";
            echo "<script>window.location.href='index.php';</script>";// untuk mengarahkan kembali ke halaman login jika password tidak sesuai
        }
    }else {
        echo "<script>alert('akun tidak ditemukan!');</script>";
        echo "<script>window.location.href='index.php';</script>"; // untuk mengarahkan kembali ke halaman login jika username tidak sesuai
    }
}else {
    echo "<script>alert('silahkan masukkan username dan password anda!');</script>";
    echo "<script>window.location.href='index.php';</script>";// untuk mengarahkan kembali ke halaman login jika username dan password tidak diisi
}
?>