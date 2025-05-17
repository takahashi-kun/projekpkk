<?php 
include '../service/config.php'; // menghubungkan ke file config.php
session_start(); // memulai session
//cek apakah session id_petugas ada
if (isset($_SESSION['id_petugas'])) {
    $id_petugas = $_SESSION['id_petugas'];
    $query = "SELECT * FROM tb_petugas WHERE id_petugas = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_petugas);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $nama = mysqli_fetch_assoc($result);
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
    <title>Star Admin2 </title>

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
</head>

<body>
    <div class="container-scroller">
      <!-- navber -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.php">
                        <img src="../templates/images/logo.svg" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.php">
                        <img src="../templates/images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Good Morning, <span
                                class="text-black fw-bold"><?php echo $nama['nama_petugas'] ;?></span></h1>
                        <h3 class="welcome-sub-text">Your performance summary this week </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="../templates/images/faces/face8.jpg"
                                alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="../templates/images/faces/face8.jpg"
                                    alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                            </div>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <!-- Dashboard Section -->
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
            
                    <!-- Forms and Data Section -->
                    <li class="nav-item nav-category">Forms and Datas</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Data Petugas</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.php">Basic
                                        Elements</a></li>
                            </ul>
                        </div>
                    </li>
            
                    <!-- Tables Section -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="log_aksi.php">Log Aksi</a></li>
                                <li class="nav-item"> <a class="nav-link" href="log_aktivitas.php">Log Aktivitas</a>
                                </li>
                            </ul>
                        </div>
                    </li>
            
                    <!-- Pages Section -->
                    <li class="nav-item nav-category">Pages</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">User Pages</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register
                                        2 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html">
                                        Lockscreen </a></li>
                            </ul>
                        </div>
                    </li>
            
                    <!-- E-commerce Section -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#e-commerce" aria-expanded="false"
                            aria-controls="e-commerce">
                            <i class="menu-icon mdi mdi-cart-arrow-down"></i>
                            <span class="menu-title">E-commerce</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="e-commerce">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/orders.html"> Orders </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
            <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                <div class="card card-rounded card-bg-1">
                    <div class="card-body">
                    <h4 class="card-title card-title-dash">Jumlah Kartu Keluarga</h4>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="text-info">1.500</h2>
                        <i class="mdi mdi-home text-info icon-lg"></i>
                    </div>
                    <h6 class="card-text mb-0">Kartu Keluarga Terdaftar</h6>
                    <p class="text-muted mb-0">Data Kartu Keluarga</p>
                    </div>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                <div class="card card-rounded card-bg-2">
                    <div class="card-body">
                    <h4 class="card-title card-title-dash">Jumlah Penduduk</h4>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="text-success">3.000</h2>
                        <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <h6 class="card-text mb-0">Penduduk Terdaftar</h6>
                    <p class="text-muted mb-0">Data Penduduk</p>
                    </div>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                <div class="card card-rounded card-bg-3">
                    <div class="card-body">
                    <h4 class="card-title card-title-dash">Jumlah Kematian</h4>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="text-danger">50</h2>
                        <i class="mdi mdi-account-off text-danger icon-lg"></i>
                    </div>
                    <h6 class="card-text mb-0">Kematian Terdaftar</h6>
                    <p class="text-muted mb-0">Data Kematian</p>
                    </div>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                <div class="card card-rounded card-bg-4">
                    <div class="card-body">
                    <h4 class="card-title card-title-dash">Jumlah Kelahiran</h4>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="text-warning">100</h2>
                        <i class="mdi mdi-baby-carriage text-warning icon-lg"></i>
                    </div>
                    <h6 class="card-text mb-0">Kelahiran Terdaftar</h6>
                    <p class="text-muted mb-0">Data Kelahiran</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                    <div class="card card-rounded table-dark-bg">
                        <div class="card-body">
                            <h4 class="card-title card-title-dash">Data Kartu Keluarga</h4>
                            <div class="table-responsive table-dark">
                                <table class="table table-borderless table-dark mb-0" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kepala Keluarga</th>
                                            <th>Alamat</th>
                                            <th>Jumlah Anggota</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="text-center">No data available</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <footer class="footer">
            <!-- Removed unused Chart.min.js library -->
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © <?php echo date('Y'); ?>. All
                        rights reserved.</span>
                </div>
            </footer>

            <script src="../templates/vendors/js/vendor.bundle.base.js"></script>
            <script src="../templates/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

            <script src="../templates/vendors/chart.js/Chart.min.js"></script>
            <script src="../templates/vendors/progressbar.js/progressbar.min.js"></script>

            <script src="../templates/js/off-canvas.js"></script>
            <script src="../templates/js/hoverable-collapse.js"></script>
            <script src="../templates/js/template.js"></script>
            <script src="../templates/js/settings.js"></script>
            <script src="../templates/js/todolist.js"></script>

            <script src="../templates/js/jquery.cookie.js" type="text/javascript"></script>
            <script src="../templates/js/dashboard.js"></script>
            <script src="../templates/js/Chart.roundedBarCharts.js"></script>

</body>

</html>