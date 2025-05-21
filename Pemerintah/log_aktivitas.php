<?php include "header.php" ?>
<!-- end navbar -->
<!-- main panel -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Striped Sortable Table</h4>
                        <p class="card-description">Add class <code>.table-striped</code> for table</p>
                        <div class="row">
                            <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                <table id="sortable-table-2" class="table table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Petugas</th>
                                            <th>Role</th>
                                            <th>Aktivitas</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //query untuk mengambil data log aktivitas
                                        $query = "
                                                      SELECT 
                                                          tb_aktivitas.id, 
                                                          tb_petugas.nama_petugas, 
                                                          tb_petugas.hak, 
                                                          tb_aktivitas.aksi, 
                                                          tb_aktivitas.tanggal
                                                      FROM 
                                                          tb_aktivitas 
                                                      JOIN 
                                                          tb_petugas 
                                                      ON 
                                                          tb_aktivitas.id_petugas = tb_petugas.id_petugas;
                                                  ";
                                        $result = mysqli_query($conn, $query);
                                        $no = 1;

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>" . htmlspecialchars($row['nama_petugas']) . "</td>";
                                                echo "<td>" . htmlspecialchars(ucfirst($row['hak'])) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['aksi']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5' class='text-center'> tidak ada data aktivitas</td></tr>";
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
</div>
<?php include "footer.php" ?>