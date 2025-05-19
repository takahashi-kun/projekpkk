<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>


<div class="main-panel">
    <div class="content-wrapper">
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
                                    $result = $querymati ;
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
<?php
include "footer.php"
?>