<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- Tombol untuk membuka modal tambah KK -->
            <button type="button" class="btn btn-primary" id="tambahKKModal"
              data-bs-toggle="modal" data-bs-target="#tambahKKModal">Tambah Kartu
              Keluarga</button>
          </div>
        </div>
      </div>
    </div>
    <!-- tabel kartu keluarga -->
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Kartu Keluarga</h4>
            <div class="table-responsive">
              <table id="tabelsearch" class="table table-striped table-bordered"
                style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Kartu Keluarga</th>
                    <th>Kepala Keluarga (NIK)</th>
                    <th>Nama Kepala Keluarga</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                    <th>Tanggal Input</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $banyakbaris = mysqli_num_rows($keluarga);
                  $no = 1;
                  foreach ($keluarga as $row):
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['no_kartu_keluarga']; ?></td>
                      <td><?php echo $row['nik']; ?></td>
                      <td><?php echo $row['nama_kepala_kk']; ?></td>
                      <td><?php echo $row['alamat']; ?></td>
                      <td>
                        <form action="data-kk.php" method="POST">
                          <button type="button" class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#updateKKModal<?php echo $row['id_keluarga']; ?>">Update</button>
                          <button type="button" class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteKKModal<?php echo $row['id_keluarga']; ?>">Delete</button>
                          <button type="button" class="btn btn-info"
                            data-bs-toggle="modal"
                            data-bs-target="#lihatAnggotaModal<?php echo $row['id_keluarga']; ?>">Lihat Anggota</button>
                        </form>
                      </td>
                      <td><?php echo $row['tanggal_input']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- tutup content wrapper -->
  </div>
  <!-- tutup main apnel -->
</div>
<?php
include "footer.php";
?>