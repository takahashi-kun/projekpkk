<?php include "header.php" ?>
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
<!-- form create data kartu keluarga baru berdasarkan data pada kk lama -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Form tambah data kartu keluarga baru</h3>
                        <p class="card-description">Data Kartu Keluarga yang tercatat di sistem</p>
                        <form action="data-kk.php" method="POST">
                            <input type="hidden" name="id_keluarga" value="<?php echo $_GET['id_keluarga'] ?? ''; ?>">
                            <div class="mb-3">
                                <label for="no_kartu_keluarga" class="form-label">No Kartu Keluarga</label>
                                <input type="text" class="form-control" id="no_kartu_keluarga" name="no_kartu_keluarga" required>
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK Kepala Keluarga</label>
                                <input type="text" class="form-control" id="nik" name="nik" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_kepala_kk" class="form-label">Nama Kepala Keluarga</label>
                                <input type="text" class="form-control" id="nama_kepala_kk" name="nama_kepala_kk" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" id="rt" name="rt" required>
                            </div>
                            <div class="mb-3">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" id="rw" name="rw" required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                            </div>
                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota" required>
                            </div>
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                            </div> -->
                            <div class="form-group">
                                <label for="tanggal_input">Tanggal Input</label>
                                <input type="date" class="form-control" name="tanggal_input" required>
                            </div>
                            <button type="submit" id="submitkk" name="submitkk" value="submitkk" class="btn btn-primary">Simpan</button>
                            <a href="data-kk.php" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>