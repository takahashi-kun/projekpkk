<?php
include "header.php";
include '../service/crud-query.php';
?>

<!-- card jumlah Kartu Keluarga -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <!-- card jumlah Kartu Keluarga -->
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-1">
          <div class="card-body">
            <h4 class="card-title card-title-dash">Jumlah Kartu Keluarga</h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <h2 class="text-info"><?= number_format($totalKK); ?></h2>
              <i class="mdi mdi-home text-info icon-lg"></i>
            </div>
            <h6 class="card-text mb-0">Kartu Keluarga Terdaftar</h6>
            <p class="text-muted mb-0">Data Kartu Keluarga</p>
          </div>
        </div>
      </div>
      <!-- card jumlah Penduduk -->
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-2">
          <div class="card-body">
            <h4 class="card-title card-title-dash">Jumlah Penduduk</h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <h2 class="text-info"><?= number_format($totalpdd); ?></h2>
              <i class="mdi mdi-account-multiple text-success icon-lg"></i>
            </div>
            <h6 class="card-text mb-0">Penduduk Terdaftar</h6>
            <p class="text-muted mb-0">Data Penduduk</p>
          </div>
        </div>
      </div>
      <!-- card jumlah Kematian -->
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-3">
          <div class="card-body">
            <h4 class="card-title card-title-dash">Jumlah Kematian</h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <h2 class="text-info"><?= number_format($totalwafat); ?></h2>
              <i class="mdi mdi-grave-stone text-danger icon-lg"></i>
            </div>
            <h6 class="card-text mb-0">Kematian Terdaftar</h6>
            <p class="text-muted mb-0">Data Kematian</p>
          </div>
        </div>
      </div>
      <!-- card jumlah Kelahiran -->
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-4">
          <div class="card-body">
            <h4 class="card-title card-title-dash">Jumlah Kelahiran</h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <h2 class="text-info"><?= number_format($totallahir); ?></h2>
              <i class="mdi mdi-baby-bottle text-warning icon-lg"></i>
            </div>
            <h6 class="card-text mb-0">Kelahiran Terdaftar</h6>
            <p class="text-muted mb-0">Data Kelahiran</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end card jumlah Kartu Keluarga -->

    <!-- penjelasan alur tambah data penduduk -->
    <!-- No 1 -->
    <div class="row">
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-1">
          <div class="card-body">
            <h4 class="card-title card-title-dash"><?php echo strtoupper("mencatat data penduduk / kelahiran") ?></h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
            </div>
            <p class="text-muted mb-0"><?php echo ucwords("siklus penduduk -> kelola kelahiran -> tambah data lahir") ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-1">
          <div class="card-body">
            <h4 class="card-title card-title-dash"><?php echo strtoupper("update data penduduk") ?></h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
            </div>
            <p class="text-muted mb-0"><?php echo ucwords("penduduk -> kelola data -> data penduduk") ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-1">
          <div class="card-body">
            <h4 class="card-title card-title-dash"><?php echo strtoupper("menambahkan kartu keluarga") ?></h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
            </div>
            <p class="text-muted mb-0"><?php echo ucwords("kartu keluarga -> kelola data -> tambah kartu keluarga ") ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-1">
          <div class="card-body">
            <h4 class="card-title card-title-dash"><?php echo strtoupper("membuat kartu keluarga") ?> </h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
            </div>
            <p class="text-muted mb-0"><?php echo ucwords("kartu keluarga -> kelola data -> lihat anggota -> buat kartu keluarga") ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-1">
          <div class="card-body">
            <h4 class="card-title card-title-dash"><?php echo strtoupper("mencatat data kematian") ?> </h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
            </div>
            <p class="text-muted mb-0"><?php echo ucwords("siklus penduduk -> kelola kematian -> catat kematian") ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 grid-margin stretch-card">
        <div class="card card-rounded card-bg-1">
          <div class="card-body">
            <h4 class="card-title card-title-dash"><?php echo strtoupper("mencatat anggota keluarga baru") ?> </h4>
            <div class="d-flex align-items-center justify-content-between mb-2">
            </div>
            <p class="text-muted mb-0"><?php echo ucwords("kartu keluarga -> kelola data -> lihat anggota -> tambah anggota") ?></p>
          </div>
        </div>
      </div>
        <div class="col-lg-3 col-md-6 grid-margin stretch-card">
          <div class="card card-rounded card-bg-1">
            <div class="card-body">
              <h4 class="card-title card-title-dash"><?php echo strtoupper(" Tambah Data Pendidikan") ?></h4>
              <div class="d-flex align-items-center justify-content-between mb-2">
              </div>
              <p class="text-muted mb-0"><?php echo ucwords("Pendidikan -> Kelola Pendidikan -> Tambah Data Pendidikan") ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="row">
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
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</div>
<!-- end card jumlah Kartu Keluarga -->

<?php
include "footer.php";
?>