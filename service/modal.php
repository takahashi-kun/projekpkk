<?php include 'config.php' ?>
<?php include 'crud-query.php' ?>

<!-- modal penduduk -->
<?php
//modal update data penduduk
foreach ($dataPenduduk as $baris2) {
    $nik = $baris2['nik'];
    $nama_lengkap = $baris2['nama_lengkap'];
    $tempat_lahir = $baris2['tempat_lahir'];
    $tanggal_lahir = $baris2['tanggal_lahir'];
    $rt = $baris2['rt'];
    $rw = $baris2['rw'];
?>
    <div class="modal fade" id="updateModal<?= $nik ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $nik ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="../Petugas/data-penduduk.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?= $nik ?>">Update Data Penduduk (<?= $nik ?>)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="nik" value="<?= $nik ?>">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?= $nama_lengkap ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $tempat_lahir ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $tanggal_lahir ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" name="rt" class="form-control" value="<?= $rt ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="text" name="rw" class="form-control" value="<?= $rw ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <label for="jenis_kelamin_l">
                                <input type="radio" id="jenis_kelamin_l" name="jenis_kelamin" value="L" <?= $baris2['jenis_kelamin'] == 'L' ? 'checked' : '' ?> required> Laki-laki
                            </label>
                            <label class="ml-3" for="jenis_kelamin_p">
                                <input type="radio" id="jenis_kelamin_p" name="jenis_kelamin" value="P" <?= $baris2['jenis_kelamin'] == 'P' ? 'checked' : '' ?> required> Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" required><?= $baris2['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" class="form-control" required>
                                <option value="" selected disabled>-- Pilih Agama --</option>
                                <option value="Islam" <?= $baris2['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen" <?= $baris2['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                                <option value="Katolik" <?= $baris2['agama'] == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                                <option value="Hindu" <?= $baris2['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= $baris2['agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                                <option value="Konghucu" <?= $baris2['agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_perkawinan">Status Pernikahan</label>
                            <select name="status_perkawinan" class="form-control" required>
                                <option value="" selected disabled>-- Pilih Status --</option>
                                <option value="Belum Kawin" <?= $baris2['status_perkawinan'] == 'Belum Kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                                <option value="Kawin" <?= $baris2['status_perkawinan'] == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                                <option value="Cerai Hidup" <?= $baris2['status_perkawinan'] == 'Cerai Hidup' ? 'selected' : '' ?>>Cerai Hidup</option>
                                <option value="Cerai Mati" <?= $baris2['status_perkawinan'] == 'Cerai Mati' ? 'selected' : '' ?>>Cerai Mati</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select name="pekerjaan" class="form-control" required>
                                <option value="" selected disabled>-- Pilih Pekerjaan --</option>
                                <option value="PNS" <?= $baris2['pekerjaan'] == 'PNS' ? 'selected' : '' ?>>PNS</option>
                                <option value="Wiraswasta" <?= $baris2['pekerjaan'] == 'Wiraswasta' ? 'selected' : '' ?>>Wiraswasta</option>
                                <option value="Petani" <?= $baris2['pekerjaan'] == 'Petani' ? 'selected' : '' ?>>Petani</option>
                                <option value="Nelayan" <?= $baris2['pekerjaan'] == 'Nelayan' ? 'selected' : '' ?>>Nelayan</option>
                                <option value="Pelajar/Mahasiswa" <?= $baris2['pekerjaan'] == 'Pelajar/Mahasiswa' ? 'selected' : '' ?>>Pelajar/Mahasiswa</option>
                                <option value="Lainnya" <?= $baris2['pekerjaan'] == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Handphone</label>
                            <input type="tel" name="no_hp" class="form-control" pattern="[0-9]{10,15}" title="Please enter a valid phone number (10-15 digits)" value="<?= $baris2['no_hp'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_input">Tanggal input</label>
                            <input type="date" name="tanggal_input" class="form-control" value="<?= $baris2['tanggal_input']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group m-3">
                        <!-- update button -->
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <!-- cancel button -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
<?php } ?>

<?php
// kk delete modal
foreach ($deletePenduduk as $row) {
    $nik = $row['nik'];
?>
    <div class="modal fade" id="deleteModal<?= $nik ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $nik ?>" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="data-penduduk.php">
                        <input type="hidden" name="nik" value="<?= $nik ?>">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                        <p><strong><?= $row['nama_lengkap'] ?></strong></p>
                        <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal keluarga -->
<!-- Modal Tambah KK -->
<div class="modal fade" id="tambahKKModal" tabindex="-1" aria-labelledby="tambahKKModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="../Petugas/data-kk.php" enctype="multipart/form-data" class="forms-sample">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKKModalLabel">Tambah Kartu
                        Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no_kartu_keluarga">No Kartu Keluarga</label>
                        <input type="text" class="form-control" name="no_kartu_keluarga" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK Kepala Keluarga</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kepala_kk">Nama Kepala Keluarga</label>
                        <input type="text" class="form-control" name="nama_kepala_kk" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input class="form-control" name="rt" required></input>
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input class="form-control" name="rw" required></input>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_input">Tanggal Input</label>
                        <input type="date" class="form-control" name="tanggal_input" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="tambahkk" value="tambahkk" name="tambahkk"
                        class="btn btn-primary">Simpan</button>
                    <a href="../Petugas/data-kk.php" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Kartu Keluarga -->
<?php
foreach ($keluargaupdate as $row): ?>
    <div class="modal fade" id="updateKKModal<?php echo $row['id_keluarga']; ?>" tabindex="-1"
        aria-labelledby="updateKKModalLabel<?php echo $row['id_keluarga']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateKKModalLabel<?php echo $row['id_keluarga']; ?>">
                        Update Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Update -->
                    <form method="POST" action="data-kk.php" enctype="multipart/form-data"
                        class="forms-sample">
                        <input type="hidden" name="id_keluarga"
                            value="<?php echo $row['id_keluarga']; ?>">
                        <div class="form-group">
                            <label for="no_kartu_keluarga">No Kartu Keluarga</label>
                            <input type="text" class="form-control" name="no_kartu_keluarga"
                                value="<?php echo $row['no_kartu_keluarga']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK Kepala Keluarga</label>
                            <input type="text" class="form-control" name="nik"
                                value="<?php echo $row['nik']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kepala_kk">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" name="nama_kepala_kk"
                                value="<?php echo $row['nama_kepala_kk']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" class="form-control" name="rt"
                                value="<?php echo $row['rt']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" name="rw"
                                value="<?php echo $row['rw']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat"
                                required><?php echo $row['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_input">Tanggal Input</label>
                            <input type="date" class="form-control" name="tanggal_input"
                                value="<?php echo $row['tanggal_input']; ?>" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="update_kk"
                                class="btn btn-primary">Simpan</button>
                            <a href="../Petugas/data-kk.php" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Delete Kartu Keluarga -->
<?php foreach ($keluargadelete as $row): ?>
    <div class="modal fade" id="deleteKKModal<?php echo $row['id_keluarga']; ?>" tabindex="-1"
        aria-labelledby="deleteKKModalLabel<?php echo $row['id_keluarga']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteKKModalLabel<?php echo $row['id_keluarga']; ?>">
                        Hapus Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus kartu keluarga ini?</p>
                    <p><strong><?php echo $row['no_kartu_keluarga']; ?></strong></p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="data-kk.php">
                        <input type="hidden" name="id_keluarga" value="<?php echo $row['id_keluarga']; ?>">
                        <button type="submit" name="delete_kk" class="btn btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- modal anggota keluarga -->
<!-- modal lihat anggota keluarga -->
<?php
$anggota_data = [];
while ($row = $anggotakk->fetch_assoc()) {
    $anggota_data[$row['id_keluarga']][] = $row;
}
foreach ($anggota_data as $id_keluarga => $anggota_list):
?>
    <!-- Modal lihat anggota keluarga -->
    <div class="modal fade" id="lihatAnggotaModal<?php echo $id_keluarga; ?>" tabindex="-1"
        aria-labelledby="lihatAnggotaModalLabel<?php echo $row['id_keluarga']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatAnggotaModalLabel<?php echo $id_keluarga; ?>">
                        Anggota Keluarga</h5>
                    <!-- button tambah data anggota keluarga -->
                    <a href="../Petugas/create-kk.php?id_keluarga=<?php echo $id_keluarga; ?>" class="btn btn-primary m-3">
                        <?php echo ucwords("buat kartu keluarga baru"); ?>
                    </a>
                    <a href="../Petugas/anggota.php?id_keluarga=<?php echo $id_keluarga; ?>" class="btn btn-success m-3">
                        <?php echo ucwords("tambah anggota keluarga"); ?>
                    </a>
                    <a href="../Petugas/cetak-data-kk.php?id_keluarga=<?php echo $id_keluarga; ?>" class="btn btn-success m-3">
                        <?php echo ucwords("cetak kartu keluarga"); ?>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Hubungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($anggota_list as $anggota):
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $anggota['nik']; ?></td>
                                    <td><?php echo $anggota['nama']; ?></td>
                                    <td><?php echo $anggota['hubungan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal anggota keluarga khusus pemerintah -->
<!-- modal lihat anggota keluarga -->
<?php
$anggota_data_pemerintah = [];
while ($row = $anggotakk->fetch_assoc()) {
    $anggota_data_pemerintah[$row['id_keluarga']][] = $row;
}
foreach ($anggota_data_pemerintah as $id_keluarga => $urutan_anggota):
?>
    <!-- Modal lihat anggota keluarga -->
    <div class="modal fade" id="lihatanggotapemerintahmodal<?php echo $id_keluarga; ?>" tabindex="-1"
        aria-labelledby="lihatanggotapemerintahmodalLabel<?php echo $row['id_keluarga']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatanggotapemerintahmodalLabel<?php echo $id_keluarga; ?>">
                        Anggota Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Hubungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($urutan_anggota as $anggota):
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $anggota['nik']; ?></td>
                                    <td><?php echo $anggota['nama']; ?></td>
                                    <td><?php echo $anggota['hubungan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- modal update pendiidkan -->
 
<div class="modal fade" id="updatePendidikanModal<?php echo $row['id_pendidikan']; ?>" tabindex="-1" aria-labelledby="updatePendidikanModalLabel<?php echo $row['id_pendidikan']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="../Petugas/data-pendidikan.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePendidikanModalLabel<?php echo $row['id_pendidikan']; ?>">Update Data Pendidikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pendidikan" value="<?php echo $row['id_pendidikan']; ?>">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_institusi">Nama Institusi</label>
                        <input type="text" name="nama_institusi" class="form-control" value="<?php echo $row['nama_institusi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tingkat_pendidikan">Tingkat Pendidikan</label>
                        <select name="tingkat_pendidikan" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Tingkat Pendidikan --</option>
                            <option value="SD" <?php echo ($row['tingkat_pendidikan'] == 'SD') ? 'selected' : ''; ?>>SD</option>
                            <option value="SMP" <?php echo ($row['tingkat_pendidikan'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
                            <option value="SMA" <?php echo ($row['tingkat_pendidikan'] == 'SMA') ? 'selected' : ''; ?>>SMA</option>
                            <option value="D3" <?php echo ($row['tingkat_pendidikan'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                            <option value="S1" <?php echo ($row['tingkat_pendidikan'] == 'S1') ? 'selected' : ''; ?>>S1</option>
                            <option value="S2" <?php echo ($row['tingkat_pendidikan'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                            <option value="S3" <?php echo ($row['tingkat_pendidikan'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="date" name="tahun_lulus" class="form-control" value="<?php echo $row['tahun_lulus']; ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_pendidikan" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>  
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal delete pendiidkan -->
<?php foreach ($pendidikan as $row): ?>
    <div class="modal fade" id="deletePendidikanModal<?php echo $row['id_pendidikan']; ?>" tabindex="-1" aria-labelledby="deletePendidikanModalLabel<?php echo $row['id_pendidikan']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePendidikanModalLabel<?php echo $row['id_pendidikan']; ?>">Hapus Data Pendidikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../Petugas/data-pendidikan.php">
                        <input type="hidden" name="id_pendidikan" value="<?php echo $row['id_pendidikan']; ?>">
                        <p>Apakah Anda yakin ingin menghapus data pendidikan ini?</p>
                        <p><strong><?php echo $row['nama_institusi']; ?></strong></p>
                        <button type="submit" name="delete_pendidikan" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>