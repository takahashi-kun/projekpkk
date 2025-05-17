<?php
include "header.php";
include "../service/modal.php";
include "../service/crud-query.php";
?>
<div class="main-panel">
  <div class="content-wrapper">

    <!-- <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Penduduk</h4>
            <p class="card-description">Data Penduduk yang terdaftar di sistem</p>
            <div class="container mt-5">
              <h3>Form Tambah Data Penduduk</h3>
              <form method="POST" action="data-penduduk.php">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="number" name="nik" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label for="no_kartu_keluarga">No Kartu Keluarga</label>
                  <input type="number" name="no_kartu_keluarga" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label><br>
                  <label for="jenis_kelamin_l">
                    <input type="radio" id="jenis_kelamin_l" name="jenis_kelamin" value="L" required> Laki-laki
                  </label>
                  <label class="ml-3" for="jenis_kelamin_p">
                    <input type="radio" id="jenis_kelamin_p" name="jenis_kelamin" value="P" required> Perempuan
                  </label>
                </div>

                <div class="form-group">
                  <label for="agama">Agama</label>
                  <select name="agama" class="form-control" required title="Pilih agama Anda dari daftar ini">
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="status_perkawinan">Status Pernikahan</label>
                  <select name="status_perkawinan" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="pekerjaan">Pekerjaan</label>
                  <select name="pekerjaan" class="form-control" required>
                    <option value="">-- Pilih Pekerjaan --</option>
                    <option value="PNS">PNS</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Petani">Petani</option>
                    <option value="Nelayan">Nelayan</option>
                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="no_hp">No Handphone</label>
                  <input type="tel" name="no_hp" class="form-control" pattern="[0-9]{10,15}" title="Please enter a valid phone number (10-15 digits)" required>
                </div>

                <div class="form-group">
                  <label for="tanggal_input">Tanggal input</label>
                  <input type="date" name="tanggal_input" class="form-control" required>
                </div>

                <button type="submit" value="tambahpdd" name="tambahpdd" id="tambahpdd" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> -->

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