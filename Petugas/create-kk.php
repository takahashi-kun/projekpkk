<?php include "header.php" ?>
<?php include "../service/crud-query.php" ?>

<?php
$id_keluarga = $_GET['id_keluarga'] ?? null;
$no_kartu_keluarga_anggota = '';
$daftar_nik = [];

if ($id_keluarga) {
    // Ambil nomor KK lama
    $queryKK = mysqli_query($conn, "SELECT no_kartu_keluarga FROM tkeluarga WHERE id_keluarga = '$id_keluarga'");
    if ($dataKK = mysqli_fetch_assoc($queryKK)) {
        $no_kartu_keluarga_anggota = $dataKK['no_kartu_keluarga'];
    }

    // Ambil daftar NIK anggota keluarga dari KK lama
    $queryNIK = mysqli_query($conn, "SELECT nik FROM tanggotakeluarga WHERE id_keluarga = '$id_keluarga'");
    while ($row = mysqli_fetch_assoc($queryNIK)) {
        $daftar_nik[] = $row['nik'];
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Form tambah data kartu keluarga baru</h3>
                        <p class="card-description">Data Kartu Keluarga yang tercatat di sistem</p>
                        <p class="card-description">Kartu Keluarga Lama : <?php echo $no_kartu_keluarga_anggota ?></p>
                        <form action="data-kk.php" method="POST">
                            <input type="hidden" name="id_keluarga" value="<?php echo $_GET['id_keluarga'] ?? ''; ?>">
                            <div class="mb-3">
                                <label for="no_kartu_keluarga" class="form-label">No Kartu Keluarga</label>
                                <input type="text" class="form-control" id="no_kartu_keluarga" name="no_kartu_keluarga" required placeholder="Masukkan No Kartu Keluarga Baru">
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">Pilih NIK Anggota untuk Dijadikan Kepala Keluarga Baru</label>
                                <select class="form-control" name="nik" id="nik" required>
                                    <option value="">– Pilih NIK –</option>
                                    <?php foreach ($daftar_nik as $nik) : ?>
                                        <option value="<?= $nik ?>"><?= $nik ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_kepala_kk" class="form-label">Nama Kepala Keluarga</label>
                                <input type="text" class="form-control" id="nama_kepala_kk" name="nama_kepala_kk" required placeholder="Masukkan nama lengkap kepala keluarga Baru">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Masukkan nama jalan, blok, nomor rumah">
                            </div>
                            <div class="mb-3">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" id="rt" name="rt" required placeholder="Masukkan RT Baru">
                            </div>
                            <div class="mb-3">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" id="rw" name="rw" required placeholder="Masukkan RW Baru">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_input">Tanggal Input</label>
                                <input type="date" class="form-control" name="tanggal_input" required>
                            </div>
                            <button type="submit" id="tambah_kk_baru" name="tambah_kk_baru" value="tambah_kk_baru" class="btn btn-primary">Simpan</button>
                            <a href="data-kk.php" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>