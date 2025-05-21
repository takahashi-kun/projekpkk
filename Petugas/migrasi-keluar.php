<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>

<!-- form tambah data keluar penduduk -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin strecth-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Form Tambah Data Penduduk Keluar</h3>
                        <p class="card-description">Data Penduduk yang sudah keluar dari Wikayah</p>
                        <div class="container mt-5">
                            <h3>form tambah data keluar</h3>
                            <form action="migrasi-keluar.php" method="POST">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK Penduduk</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_pindah" class="form-label">Tanggal Pindah</label>
                                    <input type="date" class="form-control" id="tanggal_pindah" name="tanggal_pindah" required>
                                </div>

                                <div class="mb-3">
                                    <label for="alasan_pindah" class="form-label">Alasan Pindah</label>
                                    <textarea class="form-control" id="alasan_pindah" name="alasan_pindah" rows="2" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_tujuan" class="form-label">Alamat Tujuan</label>
                                    <textarea class="form-control" id="alamat_tujuan" name="alamat_tujuan" rows="2" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="id_wilayah_tujuan" class="form-label">Wilayah Tujuan</label>
                                    <select class="form-select" name="id_wilayah_tujuan" id="id_wilayah_tujuan" required>
                                        <option value="">-- Pilih Wilayah Tujuan --</option>
                                        <?php
                                        // Ambil data wilayah dari database
                                        $query_wilayah = mysqli_query($conn, "SELECT * FROM twilayah ORDER BY nama_wilayah ASC");
                                        while ($wilayah = mysqli_fetch_assoc($query_wilayah)) {
                                            echo "<option value='" . $wilayah['id_wilayah'] . "'>" . $wilayah['nama_wilayah'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <button type="submit" name="submit_migrasi" class="btn btn-primary">Proses Migrasi Keluar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>