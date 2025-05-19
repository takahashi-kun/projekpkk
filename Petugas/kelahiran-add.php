<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>

<div class="main-panel">
  <div class="content-wrapper"></div>
  <div class="row">
    <div class="col-lg-12 grid-margin strecth-card">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Data Kelahiran</h3>
          <p class="card-description">Data Kelahiran yang tercatat di sistem</p>
          <div class="container mt-5">
            <h3>Form tambah data kelahiran</h3>
            <form action="kelahiran-add.php" method="POST">
              <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>

              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                  <option value="" disabled selected>Pilih Jenis Kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
              </div>

              <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
              </div>

              <div class="mb-3">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
              </div>

              <div class="mb-3">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
              </div>
              <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input type="text" class="form-control" id="rt" name="rt" required>
              </div>

              <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="text" class="form-control" id="rw" name="rw" required>
              </div>


              <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" id="agama" name="agama">
                  <option value="" disabled selected>Pilih Agama</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="tanggal_input" class="form-label">Tanggal Pencatatan</label>
                <input type="date" class="form-control " id="tanggal_input" name="tanggal_input" required>
              </div>
              <?php
              // $datapt = $querylahir->fetch_assoc();
              ?>
              <div class="mb-3">
                <label for="id_petugas" class="form-label">Petugas</label>
                <input type="text" class="form-control" id="id_petugas" name="id_petugas" value="<?php echo $id_petugas; ?>" readonly>
              </div>

              <button type="submit" id="submitkelahiran" name="submitkelahiran" value="submitkelahiran" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
              <button type="button" class="btn btn-danger" onclick="window.location.href='kelahiran.php'">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>