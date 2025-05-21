<?php 
///pastikan path menuju pada file congif.php benar
include 'service/config.php';
session_start();

// Validasi input sebelum diproses
if (isset($_POST['username']) && isset($_POST['password'])) {
    $aliuser = $_POST['username'];
    $alipass = $_POST['password'];

    // Cek apakah username ada di database
    $aliquery = "SELECT * FROM tb_petugas WHERE username = '$aliuser'";
    $aliresult = mysqli_query($conn, $aliquery);

    if (mysqli_num_rows($aliresult) > 0) {
        $alidata = mysqli_fetch_assoc($aliresult);

        // Cek apakah password sesuai
        if ($alidata['password'] == $alipass) {
            // Set session untuk semua peran
            session_regenerate_id(true);
            $_SESSION['id_petugas'] = $alidata['id_petugas'];
            $_SESSION['nama_petugas'] = $alidata['nama_petugas'];
            $_SESSION['username'] = $alidata['username'];
            $_SESSION['hak'] = $alidata['hak'];

            // Catat aktivitas login
            $aliid_petugas = $alidata['id_petugas'];
            $aliaksi = "Login sebagai " . $alidata['hak'];
            $alitanggal = date('Y-m-d H:i:s');

            $log_query = "INSERT INTO tb_aktivitas (id_petugas, aksi, tanggal) 
            VALUES ('$aliid_petugas', '$aliaksi', '$alitanggal')";
            if (!mysqli_query($conn, $log_query)) {
                echo "<script>alert('Aktivitas gagal dicatat!');</script>";
            }

            // Redirect sesuai hak akses
            if ($alidata['hak'] == 'pemerintah') {
                header("Location: Pemerintah/dashboard.php");
            }
            elseif ($alidata['hak'] == 'petugas') {
                header("Location: Petugas/dashboard-p.php");
            } else {
                echo "<script>alert('Hak akses tidak dikenali!');</script>";
                echo "<script>window.location.href='index.php';</script>";
            }
            exit();
        } else {
            echo "<script>alert('Password salah!');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Akun tidak ditemukan!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('Silakan masukkan username dan password Anda!');</script>";
    echo "<script>window.location.href='index.php';</script>";
}

?>