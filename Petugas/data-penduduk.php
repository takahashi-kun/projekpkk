<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Penduduk</h4>
            <p class="card-description">Data Penduduk yang terdaftar di sistem</p>
            <div class="table-responsive" style="width: 100%;">
              <table id="tabelsearch" class="table table-responsive table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Agama</th>
                    <th>Status Perkawinan</th>
                    <th>Status Hidup</th>
                    <th>Pekerjaan</th>
                    <th>No Handphone</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="datapdd">
                  <?php
                  $updatePenduduk = $dataPenduduk;
                  $no = 1;
                  $banyakbaris = mysqli_num_rows($dataPenduduk);
                  foreach ($dataPenduduk as $baris) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $baris['nik'] ?></td>
                      <td><?= $baris['nama_lengkap'] ?></td>
                      <td><?= $baris['tempat_lahir'] ?></td>
                      <td><?= $baris['tanggal_lahir'] ?></td>
                      <td><?= $baris['jenis_kelamin'] ?></td>
                      <td><?= $baris['alamat'] ?></td>
                      <td><?= $baris['rt'] ?></td>
                      <td><?= $baris['rw'] ?></td>
                      <td><?= $baris['agama'] ?></td>
                      <td><?= $baris['status_perkawinan'] ?></td>
                      <td><?= $baris['status_hidup'] ?></td>
                      <td><?= $baris['pekerjaan'] ?></td>
                      <td><?= $baris['no_hp'] ?></td>
                      <td><?= $baris['tanggal_input'] ?></td>
                      <td><a href="#" data-bs-toggle="modal" data-bs-target="#updateModal<?= $baris['nik'] ?>" class="btn btn-warning">Update</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $baris['nik'] ?>" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include "footer.php";
?>