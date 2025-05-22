<?php include '../service/config.php' ?>
<?php include '../service/crud-query.php' ?>
<?php include '../service/modal.php' ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Cetak Semua Barang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet"> 
</head>

<body>
    <center>
        <table style="margin-left: -100px;">
            <tr>
                <td>
                    <!-- Bisa disisipkan gambar max 100px -->
                    <h1 class="text text-center">
                        PT. DUMMY<br>LOGO
                    </h1>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2">
                    <center>
                        <h1 style="color: rgb(25, 0, 255)">LAPORAN DATA</h1>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni ab expedita neque in velit!<br>
                        Email : dummy@dummy.com Website : http://www.dummy.com
                    </center>
                </td>
                <td></td>
            </tr>
        </table>
    </center> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                
                <hr>
                <hr>
                <h1 class="text text-center">Laporan Barang-Barang</h1>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text text-black text-center">No</th>
                            <th class="text text-black text-center">Nama Barang</th>
                            <th class="text text-black text-center">suplier</th>
                            <th class="text text-black text-center">Stok</th>
                            <th class="text text-black text-center">Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            include "connection.php";

                            $Barang = $conn->query('SELECT * FROM tb_barang;');

                            $no = 1;

                            // foreach ($Barang as $data => $suplier) {
                            foreach ($Barang as $data) {
                                $df_Barang = $conn->query("SELECT tb_kategori_Barang.*, tb_barang.* FROM tb_kategori_Barang JOIN tb_barang ON tb_barang.id_kategori = tb_kategori_Barang.id WHERE tb_barang.id_kategori =". $data['id_kategori'] .";");
                                
                                $df_Barang = mysqli_fetch_assoc($df_Barang);
                                ?>

                                    <tr> 
                                        <td class="text text-center"><?= $data['id'] ?></td>
                                        <td><?= $data['nama_barang'] ?></td>
                                        <td><?= $data['suplier'] ?></td>
                                        <td class="text text-center"><?= $data['stok'] ?></td>
                                        <td><?= $df_Barang['nama_kategori'] ?></td>
                                    </tr>

                                <?php
                                $no++;
                            }

                        ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Timer untuk pop up muncul
        const countdown = 1;

        // Menghitung mundur timer + pop up print muncul
        function startCountdown() {
            let timeLeft = countdown;
            const countdownInterval = setInterval(() => {
                console.log(`Printing in ${timeLeft} seconds...`);
                timeLeft--;

                if (timeLeft < 0) {
                    clearInterval(countdownInterval); 
                    window.print();
                }
            }, 1000);
        }

        // Tutup tab otomatis saat pop up tertutup
        window.onafterprint = function() {
            window.close(); // Close the tab
        };

        // Memulai program
        window.onload = startCountdown;
    </script>
 
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
 
</body>

</html>
