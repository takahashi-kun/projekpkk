<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>
<!-- card jumlah Kartu Keluarga -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <!-- card jumlah Kartu Keluarga -->
            <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                <div class="card card-rounded card-bg-1">
                    <div class="card-body">
                        <h4 class="card-title card-title-dash">Jumlah Kartu Keluarga</h4>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h2 class="text-info">1.500</h2>
                            <i class="mdi mdi-home text-info icon-lg"></i>
                        </div>
                        <h6 class="card-text mb-0">Kartu Keluarga Terdaftar</h6>
                        <p class="text-muted mb-0">Data Kartu Keluarga</p>
                    </div>
                </div>
            </div>
            <!-- card jumlah Penduduk -->
            <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                <div class="card card-rounded card-bg-2">
                    <div class="card-body">
                        <h4 class="card-title card-title-dash">Jumlah Penduduk</h4>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h2 class="text-success">3.000</h2>
                            <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                        </div>
                        <h6 class="card-text mb-0">Penduduk Terdaftar</h6>
                        <p class="text-muted mb-0">Data Penduduk</p>
                    </div>
                </div>
            </div>
            <!-- card jumlah Kematian -->
            <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                <div class="card card-rounded card-bg-3">
                    <div class="card-body">
                        <h4 class="card-title card-title-dash">Jumlah Kematian</h4>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h2 class="text-danger">50</h2>
                            <i class="mdi mdi-grave-stone text-danger icon-lg"></i>
                        </div>
                        <h6 class="card-text mb-0">Kematian Terdaftar</h6>
                        <p class="text-muted mb-0">Data Kematian</p>
                    </div>
                </div>
            </div>
            <!-- card jumlah Kelahiran -->
            <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                <div class="card card-rounded card-bg-4">
                    <div class="card-body">
                        <h4 class="card-title card-title-dash">Jumlah Kelahiran</h4>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h2 class="text-warning">100</h2>
                            <i class="mdi mdi-baby-bottle text-warning icon-lg"></i>
                        </div>
                        <h6 class="card-text mb-0">Kelahiran Terdaftar</h6>
                        <p class="text-muted mb-0">Data Kelahiran</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabel kartu keluarga -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Kartu Keluarga</h4>
                        <div class="table-responsive">
                            <table id="tabelsearch" class="table table-striped table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Kartu Keluarga</th>
                                        <th>Kepala Keluarga (NIK)</th>
                                        <th>Nama Kepala Keluarga</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                        <th>Tanggal Input</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $banyakbaris = mysqli_num_rows($keluarga);
                                    $no = 1;
                                    foreach ($keluarga as $row):
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['no_kartu_keluarga']; ?></td>
                                            <td><?php echo $row['nik']; ?></td>
                                            <td><?php echo $row['nama_kepala_kk']; ?></td>
                                            <td><?php echo $row['alamat']; ?></td>
                                            <td>
                                                <form action="data-kk.php" method="POST">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteKKModal<?php echo $row['id_keluarga']; ?>">delete</button>
                                                    <button type="button" class="btn btn-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#lihatanggotapemerintahmodal<?php echo $row['id_keluarga']; ?>">Lihat Anggota</button>
                                                </form>
                                            </td>
                                            <td><?php echo $row['tanggal_input']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- tabel penduduk -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Penduduk</h4>
                        <p class="card-description">Data Penduduk yang terdaftar di sistem</p>
                        <div class="table-responsive">
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
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Agama</th>
                                        <th>Status Perkawinan</th>
                                        <th>Status Hidup</th>
                                        <th>Pekerjaan</th>
                                        <th>No Handphone</th>
                                        <th>Tanggal Input</th>
                                        <th>Status Penduduk</th>
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
                                            <td><?= $baris['rt'] ?></td>
                                            <td><?= $baris['rw'] ?></td>
                                            <td><?= $baris['agama'] ?></td>
                                            <td><?= $baris['status_perkawinan'] ?></td>
                                            <td><?= $baris['status_hidup'] ?></td>
                                            <td><?= $baris['pekerjaan'] ?></td>
                                            <td><?= $baris['no_hp'] ?></td>
                                            <td><?= $baris['tanggal_input'] ?></td>
                                            <td><?= $baris['status_penduduk'] ?></td>
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
        <!-- tabel lahir -->
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
                                    $result = $querylahir;
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
        <!-- tabel kematian -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Data Kematian</h3>
                        <p class="card-description">Data kematian yang sudah dicatat sistem</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabelsearch">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat Wafat</th>
                                        <th>Tanggal Wafat</th>
                                        <th>Penyebab</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $querymati;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['nik'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['tempat_wafat'] . "</td>";
                                        echo "<td>" . $row['tanggal_wafat'] . "</td>";
                                        echo "<td>" . $row['penyebab'] . "</td>";
                                        echo "</tr>";
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
<!-- end card jumlah Kartu Keluarga -->


<?php include "footer.php" ?>