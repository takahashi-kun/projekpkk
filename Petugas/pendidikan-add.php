<?php include 'header.php' ?>
<?php include '../service/crud-query.php' ?>
<?php include '../service/modal.php' ?>



<!-- form tambah data pendidikan -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Data Pendidikan</h4>
                        <p class="card-description">Silahkan isi form dibawah ini untuk menambah data pendidikan</p>
                        <!-- form tambah pendidikan dengan meng insert data nik  -->
                        <form action="pendidikan-add.php" method="POST">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_institusi" class="form-label">Nama Institusi</label>
                                <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" required>
                            </div>
                            <div class="mb-3">
                                <label for="tingkat_pendidikan" class="form-label">Pendidikan Terakhir</label>
                                <select class="form-control" name="nik" id="nik" required>
                                    <option value="">- Pilih pendidikan terakhir - </option>
                                    <option value="SD">Sekolah Dasar (SD)</option>
                                    <option value="SMP">Sekolah Menengah Pertama (SMP)</option>
                                    <option value="SMA">Sekolah Menengah Atas (SMA)</option>
                                    <option value="d1">Diploma 1 (D1)</option>
                                    <option value="d2">Diploma 2 (D2)</option>
                                    <option value="d3">Diploma 3 (D3)</option>
                                    <option value="d4/sarjana1">Diploma 4 (D4)</option>
                                    <option value="sarajna2">Magister (S2)</option>
                                    <option value="sarjana3">Doktor (S3)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                <input type="year" class="form-control" id="tahun_lulus" name="tahun_lulus" required>
                            </div>
                            <button type="submit" id="submitpendidikan" name="submitpendidikan" value="submitpendidikan" class="btn btn-primary">Simpan</button>
                            <a href="pendidikan-add.php" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabel data pendidikan -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pendidikan</h4>
                        <div class="table-responsive">
                            <table id="tabelsearch" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Institusi</th>
                                        <th>Tingkat Pendidikan</th>
                                        <th>Tahun Lulus</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pendidikan as $row):
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nik']; ?></td>
                                            <td><?php echo $row['nama_institusi']; ?></td>
                                            <td><?php echo $row['tingkat_pendidikan']; ?></td>
                                            <td><?php echo $row['tahun_lulus']; ?></td>
                                            <td>
                                                <!-- Tombol untuk mengupdate data pendidikan -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatePendidikanModal<?php echo $row['id_pendidikan']; ?>">Update</button>

                                                <!-- Tombol untuk menghapus data pendidikan -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePendidikanModal<?php echo $row['id_pendidikan']; ?>">Delete</button>
                                            </td>
                                        </tr>

                                        <!-- Modal Update Pendidikan -->
                                        <?php include 'modal-update-pendidikan.php'; ?>

                                        <!-- Modal Delete Pendidikan -->
                                        <?php include 'modal-delete-pendidikan.php'; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <?php include 'footer.php' ?>