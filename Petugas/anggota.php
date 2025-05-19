<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>

<?php 
$id_keluarga = $_GET['id_keluarga'] ?? null;
$no_kartu_keluarga_anggota = '';

if ($id_keluarga) {
    $queryKK = mysqli_query($conn, "SELECT no_kartu_keluarga FROM tkeluarga WHERE id_keluarga = '$id_keluarga'");
    if ($dataKK = mysqli_fetch_assoc($queryKK)) {
        $no_kartu_keluarga_anggota = $dataKK['no_kartu_keluarga'];
    }
}
?>
<!-- form tambah anggota keluarga -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin strecth-card">
        <div class="card">
          <div class="card-body">
            <h3>Data Anggota Keluarga — KK No: <?php echo $no_kartu_keluarga_anggota; ?></h3>
            <p class="card-description">Data Anggota Keluarga yang tercatat di sistem</p>
            <div class="container mt-5">
              <h3>Form tambah data anggota keluarga</h3>
              <form action="anggota.php" method="POST">
                <input type="hidden" name="id_keluarga" value="<?php echo $_GET['id_keluarga'] ?? ''; ?>">
                <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="text" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                  <label for="hubungan" class="form-label">Hubungan Keluarga</label>
                  <select class="form-select" id="hubungan" name="hubungan" required>
                    <option value="" disabled selected>Pilih Hubungan keluarga</option>
                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                    <option value="Istri">Istri</option>
                    <option value="Anak">Anak</option>
                    <option value="Orang Tua">Orang Tua</option>
                    <option value="Saudara">Saudara</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
                <button type="submit" id="submitanggota" name="submitanggota" value="submitanggota" class="btn btn-primary">Simpan</button>
                <a href="anggota.php" class="btn btn-danger">Batal</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>