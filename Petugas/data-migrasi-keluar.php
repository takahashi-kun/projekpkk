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
                        <h3 class="card-title">Data Penduduk yang keluar</h3>
                        <p class="card-description">Data Penduduk yang sudah keluar dari Wikayah</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabelsearch">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Alasan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $querykeluar;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['nik'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['alamat'] . "</td>";
                                        echo "<td>" . $row['tanggal_keluar'] . "</td>";
                                        echo "<td>" . $row['alasan'] . "</td>";
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
<?php include "footer.php" ?>