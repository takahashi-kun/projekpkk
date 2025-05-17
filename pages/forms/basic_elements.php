<?php 
include '../../config.php'; // menghubungkan ke file config.php
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


//logika insert
    if (isset($_POST['input'])) {
      $nama_petugas = $_POST['nama_petugas'] ?? null;
      $alamat = $_POST['alamat'] ?? null;
      $no_hp = $_POST['no_hp'] ?? null;
      $username = $_POST['username'] ?? null;
      $password = $_POST['password'] ?? null;

      // jika belum di tetapkan config dalam header, harus di tambahkan sebelum eksekusi query!
      if ($nama_petugas != null && $alamat != null && $no_hp != null && $username!= null && $password!= null ) {
          $sql = "INSERT INTO tb_petugas (nama_petugas, alamat, no_hp, username, password ) VALUES ('$nama_petugas', '$alamat', '$no_hp','$username','$password')";
          $hasil = $con->query($sql);
          if ($hasil) {
            ?>
<div class="alert alert-success">
    <strong>Sukses!</strong> Data berhasil di tambahkan.
</div>
<?php
          }
      } else {
          ?>
<div class="alert alert-danger">
    <strong>Gagal!</strong> Data tidak berhasil di tambahkan.
</div>
<?php
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>

    <link rel="stylesheet" href="../../templates/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../templates/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../templates/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../templates/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../templates/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../templates/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../../templates/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../templates/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

    <link rel="stylesheet" href="../../templates/css/vertical-layout-light/style.css">

    <link rel="shortcut icon" href="../../templates/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">

        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="../../Admin/index.php">
                        <img src="../../templates/images/logo.svg" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="../../templates/images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <!-- bagian yang harus di ubah ke php -->
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Selamat Datang, <span
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
                            <img class="img-xs rounded-circle" src="../../templates/images/faces/face8.jpg"
                                alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="../../templates/images/faces/face8.jpg"
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
            <!-- sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../Admin/dashboard.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Forms and Datas</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Form elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="../pages/forms/basic_elements.php">Basic
                                        Elements</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../../Admin/log_aksi.php">Log Aksi</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="../../Admin/log_aktivitas.php">Log
                                        Aktivitas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">pages</li>
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

            <!-- partial -->
            <div class="main-panel">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Striped Sortable Table</h4>
                                <p class="card-description">Add class <code>.table-striped</code> for table</p>
                                <div class="row">
                                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                        <table id="sortable-table-2" class="table table-striped">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Petugas</th>
                                                    <th>Role</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                  include "../../config.php"; 
                                                  $query = "SELECT * FROM tb_petugas ";
                                                  $result = mysqli_query($conn, $query);
                                                  $no = 1;
                                                  
                                                  if (mysqli_num_rows($result) > 0) {
                                                      while ($row = mysqli_fetch_assoc($result)) {
                                                          echo "<tr>";
                                                          echo "<td>" . $no++ . "</td>";
                                                          echo "<td>" . htmlspecialchars($row['nama_petugas']) . "</td>";
                                                          echo "<td>" . htmlspecialchars(ucfirst($row['hak'])) . "</td>";
                                                          echo "<td class='text-center'>
                                                          <a href='../../pages/forms/basic_elements.php' class='badge badge-pill badge-danger' data-toggle='modal' data-target='#delete_{$row['id_petugas']}'>
                                                              <i class='fa fa-trash p-1'></i> Hapus
                                                          </a>
                                                          <a href='../../pages/forms/basic_elements.php' class='badge badge-pill badge-success' data-toggle='modal' data-target='#delete_{$row['id_petugas']}'>
                                                              <i class='fa fa-trash p-1'></i> Update
                                                          </a>
                                                        </td>";
                                                  echo "</tr>";
                                                      }
                                                  } else {
                                                      echo "<tr><td colspan='5' class='text-center'>Tidak ada data aktivitas</td></tr>";
                                                  }
                                                  ?>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete_<?= $data['id_petugas'] ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                                    Data</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p class="text text-warning" style="font-size: 100px">
                                                                    <i class="fa fa-exclamation-triangle"></i>
                                                                </p>
                                                                <br>
                                                                <h3>Apakah Anda Yakin?</h3>
                                                                <p>Data <strong>Petugas
                                                                        <?= $data['nama_petugas'] ?></strong> yang
                                                                    dihapus tidak dapat dikembalikan.</p>
                                                                <br>
                                                            </div>

                                                            <form action="kelas-index.php" method="post">
                                                                <div class="modal-footer">
                                                                    <input type="hidden" class="form form-control"
                                                                        name="id_petugas" id="id_petugas"
                                                                        value="<?= $data['id_petugas'] ?>">
                                                                    <button class="btn btn-secondary" type="button"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="hapus" value="hapus"
                                                                        id="hapus" class="btn btn-danger">
                                                                        Hapus
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021.
                                All rights reserved.</span>
                        </div>
                    </footer>

                </div>

            </div>

        </div>

        <script src="../../templates/vendors/js/vendor.bundle.base.js"></script>
        <script src="../../templates/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <script src="../../templates/vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <script src="../../templates/vendors/select2/select2.min.js"></script>

        <script src="../../templates/js/off-canvas.js"></script>
        <script src="../../templates/js/hoverable-collapse.js"></script>
        <script src="../../templates/js/template.js"></script>
        <script src="../../templates/js/settings.js"></script>
        <script src="../../templates/js/todolist.js"></script>

        <script src="../../templates/js/file-upload.js"></script>
        <script src="../../templates/js/typeahead.js"></script>
        <script src="../../templates/js/select2.js"></script>

</body>

</html>