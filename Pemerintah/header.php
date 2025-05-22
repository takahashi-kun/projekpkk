<?php
include '../service/config.php'; // menghubungkan ke file config.php
session_start(); // memulai session
if (isset($_SESSION['id_petugas'])) {
    $id_petugas = $_SESSION['id_petugas'];

    $result = mysqli_query($conn, "SELECT * FROM tb_petugas WHERE id_petugas = '$id_petugas'");

    if ($result && mysqli_num_rows($result) > 0) {
        $nama = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='alert alert-danger'>Pemerintah tidak ditemukan.</div>";
        exit();
    }
} else {
    header("location:../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DisdukNeko</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../templates/vendors/feather/feather.css">
    <link rel="stylesheet" href="../templates/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../templates/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../templates/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../templates/vendors/simple-line-icons/css/simple-line-icons.css">

    <link rel="stylesheet" href="../templates/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../templates/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../templates/js/select.dataTables.min.css">

    <link rel="stylesheet" href="../templates/css/vertical-layout-light/style.css">

    <link rel="shortcut icon" href="../templates/images/favicon.png" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css">
</head>

<body>
    <div class="container-scroller">

        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="dashboard.php">
                        <img src="../templates/images/logo-login-removebg-preview.png " style="height: 80px;" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="dashboard.php">
                        <img src="../templates/images/logo-login-removebg-preview.png" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"><?php echo $nama['nama_petugas']; ?></span></h1>
                        <h3 class="welcome-sub-text">Hari ini kamu sudah melakukan yang terbaik</h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li>
                    <!-- Tombol Logout -->
                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
    </div>

    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Data Login</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#kelolalog" aria-expanded="false"
                        aria-controls="kelolalog">
                        <i class="menu-icon mdi mdi-card-text-outline"></i>
                        <span class="menu-title">Lihat Data</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="kelolalog">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="log_aktivitas.php">Data Log</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item nav-category">Laporan</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#laporan" aria-expanded="false"
                        aria-controls="laporan">
                        <i class="menu-icon mdi mdi-card-text-outline"></i>
                        <span class="menu-title">Kelola Laporan</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="laporan">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="laporan.php">Data Laporan penduduk</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul> -->
        </nav>