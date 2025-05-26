<?php
include 'config.php';

// logika penduduk
// update
if (isset($_POST['update'])) {
    $nik = $_POST['nik'] ?? null;
    $nama_penduduk = $_POST['nama_lengkap'] ?? null;
    $tempat_lahir = $_POST['tempat_lahir'] ?? null;
    $tanggal_lahir = $_POST['tanggal_lahir'] ?? null;
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $agama = $_POST['agama'] ?? null;
    $status_perkawinan = $_POST['status_perkawinan'] ?? null;
    $pekerjaan = $_POST['pekerjaan'] ?? null;
    $no_hp = $_POST['no_hp'] ?? null;
    $id_lahir = $_POST['id_lahir'] ?? null;
    $rt = $_POST['rt'] ?? null;
    $rw = $_POST['rw'] ?? null;
    $status_penduduk = $_POST['status_penduduk'] ?? null;

    $sql = "
        UPDATE 
            tpenduduk 
        SET 
            jenis_kelamin='$jenis_kelamin', 
            alamat='$alamat', 
            agama='$agama', 
            status_perkawinan='$status_perkawinan', 
            pekerjaan='$pekerjaan', 
            no_hp='$no_hp',
            rt='$rt',
            rw='$rw'
        WHERE 
            nik='$nik'";

    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        echo "<script>alert('Data Penduduk berhasil di update');</script>";
        echo "<script>window.location.href = 'data-penduduk.php';</script>";
    } else {
        echo "<script>alert('Data gagal diperbarui.'); window.location.href='data-penduduk.php';</script>";
        echo "<script>alert('Data gagal diperbarui.');</script>";
        echo "<script>window.location.href = 'data-penduduk.php';</script>";
    }
}

//delete
if (isset($_POST['delete'])) {
    $nik = $_POST['nik'] ?? null;
    $sql = "DELETE FROM tpenduduk WHERE nik='$nik'";
    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
    } else {
        echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
    }
}

//logika migrasi keluar penduduk
//insert data migrasi keluar
if (isset($_POST['submit_migrasi'])) {
    $nik = $_POST['nik'];
    $tanggal_pindah = $_POST['tanggal_pindah'];
    $alasan_pindah = $_POST['alasan_pindah'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $id_wilayah_tujuan = $_POST['id_wilayah_tujuan'];
    $id_petugas = $_SESSION['id_petugas'];

    // Cek apakah NIK ada di tb_lahir
    $cek_lahir = mysqli_query($conn, "SELECT * FROM tb_lahir WHERE nik = '$nik'");
    if (mysqli_num_rows($cek_lahir) == 0) {
        echo "<div class='alert alert-danger'>NIK tidak ditemukan di data kelahiran.</div>";
        exit;
    }

    // Cek apakah NIK ada di tpenduduk
    $cek_penduduk = mysqli_query($conn, "SELECT * FROM tpenduduk WHERE nik = '$nik'");
    if (mysqli_num_rows($cek_penduduk) == 0) {
        echo "<div class='alert alert-danger'>NIK tidak ditemukan di data penduduk.</div>";
        exit;
    }

    // Cek apakah NIK sudah pernah migrasi
    $cek_pindah = mysqli_query($conn, "SELECT * FROM tb_pindah WHERE nik = '$nik'");
    if (mysqli_num_rows($cek_pindah) > 0) {
        echo "<div class='alert alert-warning'>NIK ini sudah tercatat melakukan migrasi sebelumnya.</div>";
        exit;
    }

    // Ambil data wilayah asal dari penduduk
    $data_penduduk = mysqli_fetch_assoc($cek_penduduk);
    $id_wilayah_asal = $data_penduduk['id_wilayah'];

    // Update alamat baru di tpenduduk
    $update = mysqli_query($conn, "
        UPDATE tpenduduk SET 
            alamat = '$alamat_tujuan',
            id_wilayah = '$id_wilayah_tujuan'
        WHERE nik = '$nik'
    ");

    // Masukkan ke tabel tb_pindah
    $insert = mysqli_query($conn, "
        INSERT INTO tb_pindah (
            nik,
            tanggal_pindah,
            alasan_pindah,
            id_wilayah_asal,
            id_wilayah_tujuan,
            alamat_tujuan,
            id_petugas,
            tanggal_input
        ) VALUES (
            '$nik',
            '$tanggal_pindah',
            '$alasan_pindah',
            '$id_wilayah_asal',
            '$id_wilayah_tujuan',
            '$alamat_tujuan',
            '$id_petugas',
            NOW()
        )
    ");

    if ($update && $insert) {
        echo "<div class='alert alert-success'>Data migrasi keluar berhasil diproses.</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal memproses migrasi keluar.</div>";
    }
}

// logika keluarga
// tambah kartu keluarga 
if (isset($_POST['tambahkk'])) {
    $no_kartu_keluarga = $_POST['no_kartu_keluarga'] ?? null;
    $nik = $_POST['nik'] ?? null;
    $nama_kepala_kk = $_POST['nama_kepala_kk'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $rt = $_POST['rt'] ?? null;
    $rw = $_POST['rw'] ?? null;
    $tanggal_input = $_POST['tanggal_input'] ?? null;

    // Cek apakah NIK ada di tb_lahir
    $cek_nik_query = "SELECT * FROM tb_lahir WHERE nik = '$nik'";
    $cek_nik_result = mysqli_query($conn, $cek_nik_query);

    if ($cek_nik_result && mysqli_num_rows($cek_nik_result) > 0) {
        // NIK ditemukan di tabel kelahiran, lanjutkan insert ke tkeluarga
        $sql = "INSERT INTO tkeluarga (no_kartu_keluarga, nik, nama_kepala_kk, alamat,rt,rw, tanggal_input) 
                VALUES ('$no_kartu_keluarga', '$nik', '$nama_kepala_kk', '$alamat','$rt','$rw', '$tanggal_input')";
        $kk = mysqli_query($conn, $sql);

        if ($kk) {
            // Ambil id_keluarga
            $query_id_keluarga = "SELECT id_keluarga FROM tkeluarga WHERE no_kartu_keluarga = '$no_kartu_keluarga'";
            $result_id_keluarga = mysqli_query($conn, $query_id_keluarga);
            if ($result_id_keluarga && mysqli_num_rows($result_id_keluarga) > 0) {
                $data_id_keluarga = mysqli_fetch_assoc($result_id_keluarga);
                $id_keluarga = $data_id_keluarga['id_keluarga'];

                // Update id_keluarga di tb_lahir
                $query_update_lahir = "UPDATE tb_lahir SET id_keluarga = '$id_keluarga' WHERE nik = '$nik'";
                mysqli_query($conn, $query_update_lahir);
            }

            // Insert ke tanggotakeluarga sebagai Kepala Keluarga
            $query_insert_anggota = "INSERT INTO tanggotakeluarga (id_keluarga, nik, hubungan) 
            VALUES ('$id_keluarga', '$nik', 'Kepala Keluarga')";
            mysqli_query($conn, $query_insert_anggota);

            echo "<script>alert('Data KK berhasil ditambahkan.'); window.location.href='data-kk.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data KK.'); window.location.href='data-kk.php';</script>";
        }
    } else {
        // NIK tidak ditemukan
        echo "<script>alert('NIK tidak ditemukan.'); window.location.href='data-kk.php';</script>";
    }
}

// update kartu keluarga
if (isset($_POST['update_kk'])) {
    $id_keluarga = $_POST['id_keluarga'] ?? null;
    $no_kartu_keluarga = $_POST['no_kartu_keluarga'] ?? null;
    $nik = $_POST['nik'] ?? null;
    $nama_kepala_kk = $_POST['nama_kepala_kk'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $tanggal_input = $_POST['tanggal_input'] ?? null;

    $sql = "UPDATE tkeluarga SET no_kartu_keluarga='$no_kartu_keluarga', nik='$nik',nama_kepala_kk = '$nama_kepala_kk', alamat='$alamat', tanggal_input='$tanggal_input' WHERE id_keluarga='$id_keluarga'";
    $hasil = $conn->query($sql);
    if ($hasil) {
        echo '<div class="alert alert-success"><strong>Sukses!</strong> Kartu keluarga berhasil diupdate.</div>';
    } else {
        echo '<div class="alert alert-danger"><strong>Gagal!</strong> Gagal mengupdate kartu keluarga.</div>';
    }
}

// delete kartu keluarga
if (isset($_POST['delete_kk'])) {
    $id_keluarga = $_POST['id_keluarga'] ?? null;
    $sql = "DELETE FROM tkeluarga WHERE id_keluarga = '$id_keluarga'";
    $hasil = $conn->query($sql);
    if ($hasil) {
        echo '<div class="alert alert-success"><strong>Sukses!</strong> Kartu keluarga berhasil dihapus.</div>';
    } else {
        echo '<div class="alert alert-danger"><strong>Gagal!</strong> Gagal menghapus kartu keluarga.</div>';
    }
}

// logikan anggota keluarga
// insert anggota keluarga
if (isset($_POST['submitanggota'])) {
    $id_keluarga = $_POST['id_keluarga'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama']; // opsional
    $hubungan = $_POST['hubungan'];

    //Cek apakah id_keluarga valid dan nomor KK ada
    $cek_kk_result = mysqli_query($conn, "SELECT no_kartu_keluarga FROM tkeluarga WHERE id_keluarga = '$id_keluarga'");
    if (mysqli_num_rows($cek_kk_result) == 0) {
        echo "<script>alert('Nomor Kartu Tidak Ditemukan.'); window.location.href='anggota.php';</script>";
        exit;
    }

    //Cek apakah NIK ada di tabel kelahiran
    $cek = mysqli_query($conn, "SELECT * FROM tb_lahir WHERE nik = '$nik'");
    if (mysqli_num_rows($cek) > 0) {

        //Cek apakah NIK sudah pernah dimasukkan ke tanggotakeluarga
        $cek_anggota = mysqli_query($conn, "SELECT * FROM tanggotakeluarga WHERE nik = '$nik'");
        if (mysqli_num_rows($cek_anggota) > 0) {
            echo "<script>alert('NIK ini sudah terdaftar sebagai anggota keluarga lain.');</script>";
            exit;
        }

        //Insert data
        $insert = mysqli_query($conn, "INSERT INTO tanggotakeluarga (id_keluarga, nik, hubungan)
            VALUES ('$id_keluarga', '$nik', '$hubungan')");

        // Update id_keluarga di tb_lahir
        $query_update_lahir = "UPDATE tb_lahir SET id_keluarga = '$id_keluarga' WHERE nik = '$nik'";
        mysqli_query($conn, $query_update_lahir);

        if ($insert) {
            // Catat aksi ke tb_aksi
            $id_petugas = $_SESSION['id_petugas'];
            $tanggal = date('Y-m-d');
            $aksi = "Insert data penduduk NIK: $nik";

            mysqli_query($conn, "INSERT INTO tb_aksi (id_petugas, tindakan, tanggal) VALUES ('$id_petugas', '$aksi', '$tanggal')");

            echo "<div class='alert alert-success'>Data berhasil disimpan dan aksi dicatat.</div>";
        } else {
            echo "<div class='alert alert-danger'>Gagal mencatat aksi.</div>";
        }

        if ($insert) {
            echo "<script>alert('Data anggota berhasil disimpan!'); location.href='anggota.php?id_keluarga=$id_keluarga';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data.');</script>";
        }
    } else {
        echo "<script>alert('NIK tidak ditemukan dalam data kelahiran.');</script>";
    }
}

// update anggota keluarga
if (isset($_POST['update_anggota'])) {
    $id_anggota = $_POST['id_anggota'] ?? null;
    $nik = $_POST['nik'] ?? null;
    $hubungan = $_POST['hubungan'] ?? null;

    $sql = "UPDATE tanggotakeluarga SET nik='$nik', hubungan='$hubungan' WHERE id_anggota='$id_anggota'";
    $hasil = $conn->query($sql);
    if ($hasil) {
        echo '<div class="alert alert-success"><strong>Sukses!</strong> Anggota keluarga berhasil diupdate.</div>';
    } else {
        echo '<div class="alert alert-danger"><strong>Gagal!</strong> Gagal mengupdate anggota keluarga.</div>';
    }
}

// delete anggota keluarga
if (isset($_POST['delete_anggota'])) {
    $id_anggota = $_POST['id_anggota'] ?? null;
    $sql = "DELETE FROM tanggotakeluarga WHERE id_anggota = '$id_anggota'";
    $hasil = $conn->query($sql);
    if ($hasil) {
        echo '<div class="alert alert-success"><strong>Sukses!</strong> Anggota keluarga berhasil dihapus.</div>';
    } else {
        echo '<div class="alert alert-danger"><strong>Gagal!</strong> Gagal menghapus anggota keluarga.</div>';
    }
}

//logika tambah kartu keluarga baru
if (isset($_POST['tambah_kk_baru'])) {
    $id_keluarga_lama = $_POST['id_keluarga'];
    $no_kartu_keluarga_baru = $_POST['no_kartu_keluarga'];
    $nik = $_POST['nik']; // NIK yang akan dijadikan kepala keluarga
    $nama_kepala_kk = $_POST['nama_kepala_kk'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $tanggal_input = $_POST['tanggal_input'];

    // Cek apakah no KK sudah ada
    $cek_nokk = mysqli_query($conn, "SELECT * FROM tkeluarga WHERE no_kartu_keluarga = '$no_kartu_keluarga'");
    if (mysqli_num_rows($cek_nokk) > 0) {
        echo "<script>alert('Nomor KK sudah terdaftar. Gunakan nomor lain.'); window.location.href='data-kk.php';</script>";
        exit;
    }

    // Validasi dasar
    if (empty($nik) || empty($no_kartu_keluarga_baru)) {
        echo "<script>alert('Data tidak lengkap.'); window.location.href='data-kk.php';</script>";
        exit;
    }

    // Cek apakah NIK memang ada di KK lama
    $cek_nik_lama = mysqli_query($conn, "SELECT * FROM tanggotakeluarga WHERE nik = '$nik' AND id_keluarga = '$id_keluarga_lama'");
    if (mysqli_num_rows($cek_nik_lama) == 0) {
        echo "<script>alert('NIK tidak ditemukan di KK lama.'); window.location.href='data-kk.php';</script>";
        exit;
    }

    // Insert ke tkeluarga (KK baru)
    $query_kk = mysqli_query($conn, "INSERT INTO tkeluarga (no_kartu_keluarga, nik, nama_kepala_kk, alamat, rt, rw, tanggal_input) 
                VALUES ('$no_kartu_keluarga_baru', '$nik', '$nama_kepala_kk', '$alamat', '$rt', '$rw', '$tanggal_input')");

    // Ambil id_keluarga baru
    $id_keluarga_baru = mysqli_insert_id($conn);

    if ($query_kk && $id_keluarga_baru) {
        // Hapus dari tanggotakeluarga lama
        mysqli_query($conn, "DELETE FROM tanggotakeluarga WHERE nik = '$nik' AND id_keluarga = '$id_keluarga_lama'");

        // Tambahkan ke tanggotakeluarga baru dengan status kepala keluarga
        mysqli_query($conn, "INSERT INTO tanggotakeluarga (id_keluarga, nik, hubungan) VALUES ('$id_keluarga_baru', '$nik', 'Kepala Keluarga')");

        // Update id_keluarga di tb_lahir
        $query_update_lahir = "UPDATE tb_lahir SET id_keluarga = '$id_keluarga' WHERE nik = '$nik'";
        mysqli_query($conn, $query_update_lahir);

        echo "<script>alert('Kartu Keluarga baru berhasil dibuat dan anggota berhasil dipindah.'); window.location.href='data-kk.php';</script>";
    } else {
        echo "<script>alert('Gagal membuat KK baru.');</script>";
    }
}

// logika kelahiran
// insert data kelahiran ke tb_lahir, penduduk, dan anggota keluarga
if (isset($_POST['submitkelahiran'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_input = $_POST['tanggal_input'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $tanggal_pencatatan = $_POST['tanggal_input'];
    $id_petugas = $_POST['id_petugas'];

    // Ambil nilai default
    $agama = isset($_POST['agama']) ? $_POST['agama'] : '-';
    $pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '-';
    $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '-';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '-';

    // Insert ke tpenduduk
    $query_penduduk = "
        INSERT INTO 
        tpenduduk 
        (nik, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, status_perkawinan, pekerjaan, no_hp, tanggal_input, rt, rw) 
        VALUES 
        ('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', 'Belum Kawin', '$pekerjaan', '$no_hp', '$tanggal_pencatatan', '$rt', '$rw')";
    $hasil_penduduk = mysqli_query($conn, $query_penduduk);

    // Insert ke tb_lahir
    $query_lahir = "
        INSERT INTO 
        tb_lahir 
        (nik, nama, jenis_kelamin, tanggal_lahir, tempat_lahir, rt, rw, nama_ayah, nama_ibu, tanggal_input, id_petugas) 
        VALUES 
        ('$nik', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$tempat_lahir', '$rt', '$rw', '$nama_ayah', '$nama_ibu', '$tanggal_pencatatan', '$id_petugas')";

    $hasil_lahir = mysqli_query($conn, $query_lahir);

    // Cek semua query berhasil
    if ($hasil_penduduk && $hasil_lahir) {
        echo "<script>alert('Data kelahiran berhasil ditambahkan dan terdaftar sebagai penduduk');</script>";
        echo "<script>window.location.href = 'kelahiran.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data kelahiran');</script>";
    }
}

//logika kematian
// insert data kematian ke twafat
if (isset($_POST['submitkematian'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat_wafat = $_POST['tempat_wafat'];
    $tanggal_wafat = $_POST['tanggal_wafat'];
    $penyebab = $_POST['penyebab'];

    // query untuk insert data kematian
    $query = "INSERT INTO twafat (nik, nama, tempat_wafat, tanggal_wafat, penyebab) VALUES ('$nik', '$nama', '$tempat_wafat', '$tanggal_wafat', '$penyebab')";
    //query untuk update status penduduk
    $query2 = "UPDATE tpenduduk SET status_hidup = 'Mati' WHERE nik = '$nik'";
    $query3 = "DELETE FROM tpenduduk WHERE nik = '$nik'";

    if (mysqli_query($conn, $query)) {
        if (mysqli_query($conn, $query2)) {
            echo "<script>alert('Data kematian berhasil ditambahkan dan status penduduk diperbarui');</script>";
        } else {
            echo "<script>alert('Data kematian berhasil ditambahkan, tetapi gagal memperbarui status penduduk');</script>";
        }
        echo "<script>window.location.href='kematian.php';</script>";
    } else {
        echo "<script>alert('Data kematian gagal ditambahkan');</script>";
        echo "<script>window.location.href='kematian.php';</script>";
    }
}

//logika mencari alamat
//query untuk mencari alamat berdasarkan id_keluarga
//dari tabel keluarga untuk tabel penduduk
$id_keluarga = $_POST['id_keluarga'] ?? null;
$alamat = null;
if (!empty($id_keluarga)) {
    $query_alamat = "SELECT alamat FROM tkeluarga WHERE id_keluarga = '$id_keluarga'";
    $result_alamat = mysqli_query($conn, $query_alamat);
    if ($result_alamat && mysqli_num_rows($result_alamat) > 0) {
        $data_alamat = mysqli_fetch_assoc($result_alamat);
        $alamat = $data_alamat['alamat'];
    } else {
        $alamat = 'Alamat tidak ditemukan';
    }
}

//logika mencari tempat lahir
//query untuk mencari tempat_lahir berdasarkan id_lahir
//dari tabel kelahiran untuk tabel penduduk
$id_lahir = $_POST['id_lahir'] ?? null;
$tempat_lahir = null;
if (!empty($id_lahir)) {
    $query_tempat_lahir = "SELECT tempat_lahir FROM tb_lahir WHERE id_lahir = '$tempat_lahir'";
    $result_tempat_lahir = mysqli_query($conn, $query_tempat_lahir);
    if ($result_tempat_lahir && mysqli_num_rows($result_tempat_lahir) > 0) {
        $data_tempat_lahir = mysqli_fetch_assoc($result_tempat_lahir);
        $tempat_lahir = $data_tempat_lahir['tempat_lahir'];
    } else {
        echo "<script>alert('Tempat lahir valid.'); window.location.href='kelahiran.php';</script>";
        exit;
    }
}


//logika mencari tanggal lahir
//query untuk mencari tanggal_lahir berdasarkan id_lahir
//dari tabel kelahiran untuk tabel penduduk
$id_lahir = $_POST['id_lahir'] ?? null;
$tanggal_lahir = null;
if (!empty($id_lahir)) {
    $query_tanggal_lahir = "SELECT tanggal_lahir FROM tb_lahir WHERE id_lahir = '$tanggal_lahir'";
    $result_tanggal_lahir = mysqli_query($conn, $query_tanggal_lahir);
    if ($result_tanggal_lahir && mysqli_num_rows($result_tanggal_lahir) > 0) {
        $data_tanggal_lahir = mysqli_fetch_assoc($result_tanggal_lahir);
        $tanggal_lahir = $data_tanggal_lahir['tanggal_lahir'];
    } else {
        echo "<script>alert('Tanggal lahir tidak valid.'); window.location.href='kelahiran.php';</script>";
        exit;
    }
}

//logika mencari nik
//query untuk mencari nik berdasarkan id_lahir
//dari tabel kelahiran untuk tabel anggota keluarga, dan keluarga
$id_lahir = $_POST['id_lahir'] ?? null;
$nik = null;
if (!empty($id_lahir)) {
    $query_nik = "SELECT nik FROM tb_lahir WHERE id_lahir = '$nik'";
    $result_nik = mysqli_query($conn, $query_nik);
    if ($result_nik && mysqli_num_rows($result_nik) > 0) {
        $data_nik = mysqli_fetch_assoc($result_nik);
        $nik = $data_nik['nik'];
    } else {
        echo "<script>alert('NIK tidak valid.'); window.location.href='data-kk.php';</script>";
        exit;
    }
}

//logika mencari jenis kelamin
//query untuk mencari jenis_kelamin berdasarkan id_lahir
//dari tabel kelahiran untuk tabel penduduk
$id_lahir = $_POST['id_lahir'] ?? null;
$jenis_kelamin = null;
if (!empty($id_lahir)) {
    $query_jenis_kelamin = "SELECT jenis_kelamin FROM tb_lahir WHERE id_lahir = '$jenis_kelamin'";
    $result_jenis_kelamin = mysqli_query($conn, $query_jenis_kelamin);
    if ($result_jenis_kelamin && mysqli_num_rows($result_jenis_kelamin) > 0) {
        $data_jenis_kelamin = mysqli_fetch_assoc($result_jenis_kelamin);
        $jenis_kelamin = $data_jenis_kelamin['jenis_kelamin'];
    } else {
        echo "<script>alert('Tanggal lahir tidak valid.'); window.location.href='kelahiran.php';</script>";
        exit;
    }
}

//jumlah kartu keluarga
$query = "SELECT COUNT(*) AS total_kk FROM tkeluarga";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$totalKK = $data['total_kk'];

//jumlah penduduk
$query = "SELECT COUNT(*) AS total_pdd FROM tpenduduk";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$totalpdd = $data['total_pdd'];

//jumlah wafat
$query = "SELECT COUNT(*) AS total_wafat FROM twafat";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$totalwafat = $data['total_wafat'];

//jumlah lahir
$query = "SELECT COUNT(*) AS total_lahir FROM tb_lahir";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$totallahir = $data['total_lahir'];

// insert data pendidikan
if (isset($_POST['submitpendidikan'])) {
    $nik = $_POST['nik'];
    $nama_institusi = $_POST['nama_institusi'];
    $tingkat_pendidikan = $_POST['tingkat_pendidikan'];
    $tahun_lulus = $_POST['tahun_lulus'];

    $query = "INSERT INTO tpendidikan (nik, nama_institusi, tingkat_pendidikan, tahun_lulus) VALUES ('$nik', '$nama_institusi', '$tingkat_pendidikan', '$tahun_lulus')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data pendidikan berhasil ditambahkan');</script>";
        echo "<script>window.location.href='pendidikan-add.php';</script>";
    } else {
        echo "<script>alert('Data pendidikan gagal ditambahkan');</script>";
    }
}

//query catat aksi insert yang dilakukan petugas
//query catat aksi delete yang dilakukan petugas