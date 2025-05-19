<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Data Kelahiran</h3>
            <p class="card-description">Data Kelahiran yang tercatat di sistem</p>
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="tabelsearch">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Tanggal Pencatatan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = $querylahir ;
                  $no = 1;
                  $barislahir = mysqli_num_rows($result);
                  foreach ($result as $row) {
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['nik']; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['jenis_kelamin']; ?></td>
                      <td><?php echo $row['tanggal_lahir']; ?></td>
                      <td><?php echo $row['tempat_lahir']; ?></td>
                      <td><?php echo $row['nama_ayah']; ?></td>
                      <td><?php echo $row['nama_ibu']; ?></td>
                      <td><?php echo $row['rt']; ?></td>
                      <td><?php echo $row['rw']; ?></td>
                      <td><?php echo $row['tanggal_input']; ?></td>
                    </tr>
                  <?php } ?>
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