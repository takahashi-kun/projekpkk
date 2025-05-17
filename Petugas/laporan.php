<?php
include "header.php";
?>
<!-- card cetak Laporan -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cetak Laporan</h4>
                        <p class="card-description">Pilih Laporan yang ingin dicetak</p>
                        <a href="#" class="btn btn-primary btn-icon-text mb-2 me-2"><i class="mdi mdi-printer btn-icon-prepend"></i> Cetak Data Kelahiran</a>
                        <a href="#" class="btn btn-primary btn-icon-text mb-2 me-2"><i class="mdi mdi-printer btn-icon-prepend"></i> Cetak Data Kematian</a>
                        <a href="#" class="btn btn-primary btn-icon-text mb-2 me-2"><i class="mdi mdi-printer btn-icon-prepend"></i> Cetak Data Penduduk</a>
                        <a href="cetak-data-kk.php" class="btn btn-primary btn-icon-text mb-2 me-2"><i class="mdi mdi-printer btn-icon-prepend"></i> Cetak Data Kartu Keluarga</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include "footer.php";
?>
