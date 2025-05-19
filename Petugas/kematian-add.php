<?php include "header.php" ?>
<?php include "../service/modal.php" ?>
<?php include "../service/crud-query.php" ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin strecth-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"></h3>
                        <p class="card-description">Data Kematian yang akan di dicatat sistem</p>
                        <div class="container mt-5">
                            <h3>form tambah data kematian</h3>
                            <form action="kematian-add.php" method="POST">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_wafat" class="form-label">Tempat Wafat</label>
                                    <input type="text" class="form-control" id="tempat_wafat" name="tempat_wafat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_wafat" class="form-label">Tanggal Wafat</label>
                                    <input type="date" class="form-control" id="tanggal_wafat" name="tanggal_wafat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="penyebab" class="form-label">Penyebab</label>
                                    <input type="text" class="form-control" id="penyebab" name="penyebab" required>
                                </div>
                                <button type="submit" id="submitkematian" name="submitkematian" value="submitkematian" class="btn btn-primary">Simpan</button>
                                <a href="kematian.php" class="btn btn-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php" ?>