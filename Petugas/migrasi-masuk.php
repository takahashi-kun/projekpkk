<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>

<!-- form tambah data masuk penduduk -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin strecth-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Form Tambah Data Penduduk Masuk</h3>
                        <p class="card-description">Data Penduduk yang sudah masuk ke Wilayah</p>
                        <div class="container mt-5">
                            <h3>form tambah data masuk</h3>
                            <form action="migrasi-masuk.php" method="POST">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK Penduduk</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_asal" class="form-label">Alamat Asal</label>
                                    <textarea class="form-control" id="alamat_asal" name="alamat_asal" rows="2" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="id_wilayah_asal" class="form-label">Wilayah Asal</label>
                                    <input type="text" class="form-control" id="id_wilayah_asal" name="id_wilayah_asal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="id_wilayah_tujuan" class="form-label">Wilayah Tujuan</label>
                                    <input type="text" class="form-control" id="id_wilayah_tujuan" name="id_wilayah_tujuan" required>
                                </div>
                                <button type="submit" name="submit_migrasi" class="btn btn-primary">Proses Migrasi Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>