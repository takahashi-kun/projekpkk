<?php 
include '../service/config.php';

session_start(); // memulai session
//cek apakah session petugas ada
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

  <style>

.dt-custom-search-end {
  display: flex;
  justify-content: flex-end;
  padding-right: 15px;
}

.dt-custom-search-end input {
  width: 250px;
  padding: 6px 12px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

</style>
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
          <a class="navbar-brand brand-logo" href="dashboard-p.php">
            <img src="../templates/images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="dashboard-p.php">
            <img src="../templates/images/logo-mini.svg" alt="logo" />
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
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="../templates/images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="../templates/images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
              </div>
              <a class="dropdown-item" href="../service/logout.php" ><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
            </div>
          </li>
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
            <a class="nav-link" href="dashboard-p.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Penduduk</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#keloladata" aria-expanded="false"
              aria-controls="keloladata">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Kelola Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="keloladata">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="data-penduduk.php">Data Penduduk </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Kartu keluarga</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#kkkeloladatakk" aria-expanded="false"
              aria-controls="kkkeloladatakk">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Kelola Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kkkeloladatakk">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="data-kk.php">Data Kartu Keluarga</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="create-kk.php">Buat kartu keluarga Baru</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="anggota.php">Tambah Anggota keluarga</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Siklus Penduduk</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#sirkulasipenduduklahir" aria-expanded="false" aria-controls="sirkulasipenduduklahir">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Kelola Kelahiran</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sirkulasipenduduklahir">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="kelahiran.php">Data Kelahiran</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="kelahiran-add.php">Tambah Data Lahir</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#sirkulasipendudukmati" aria-expanded="false" aria-controls="sirkulasipendudukmati">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Kelola Kematian</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sirkulasipendudukmati">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="kematian.php">Data Kematian</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="kematian-add.php">Catat Kematian</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="laporan.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">laporan</span>
            </a>
          </li>
        </ul>
      </nav>

       <!-- log out modal -->
        <!-- <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" style="display: none; padding-right: 17px;" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Log out ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are readyto end your current session.</div>
                <div class="modal-footer">
                <form action="../index.php" method="post">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="logout" id="logout" value="logout" class="btn btn-danger"><i class="fa fa-sign-out
                    alt"></i> Logout</button>
                </form>
                </div>
            </div>
            </div>
        </div> -->

