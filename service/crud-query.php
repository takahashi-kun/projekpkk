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

    //logika mencari alamat
    //query untuk mencari alamat berdasarkan id_keluarga
    //dari tabel keluarga untuk tabel penduduk
    // Inisialisasi alamat

    // $alamat = null;
    // if (!empty($no_kartu_keluarga)) {
    //     $query_alamat = "SELECT alamat FROM tkeluarga WHERE id_keluarga = '$no_kartu_keluarga'";
    //     $result_alamat = mysqli_query($conn, $query_alamat);
    //     if ($result_alamat && mysqli_num_rows($result_alamat) > 0) {
    //         $data_alamat = mysqli_fetch_assoc($result_alamat);
    //         $alamat = $data_alamat['alamat'];
    //         $no_kartu_keluarga = $data_keluarga['no_kartu_keluarga'];
    //     } else {
    //         $alamat = 'Alamat tidak ditemukan';
    //     }
    // }

    //logika mencari tempat lahir
    //query untuk mencari tempat_lahir berdasarkan id_lahir
    //dari tabel kelahiran untuk tabel penduduk

    // $tempat_lahir = null;
    // if (!empty($id_lahir)) {
    //     $query_tempat_lahir = "SELECT tempat_lahir FROM tb_lahir WHERE id_lahir = '$tempat_lahir'";
    //     $result_tempat_lahir = mysqli_query($conn, $query_tempat_lahir);
    //     if ($result_tempat_lahir && mysqli_num_rows($result_tempat_lahir) > 0) {
    //         $data_tempat_lahir = mysqli_fetch_assoc($result_tempat_lahir);
    //         $tempat_lahir = $data_tempat_lahir['tempat_lahir'];
    //     } else {
    //         echo "<script>alert('Tempat lahir valid.'); window.location.href='kelahiran.php';</script>";
    //         exit;
    //     }
    // }

    //logika mencari tanggal lahir
    //query untuk mencari tanggal_lahir berdasarkan id_lahir
    //dari tabel kelahiran untuk tabel penduduk

    // $tanggal_lahir = null;
    // if (!empty($id_lahir)) {
    //     $query_tanggal_lahir = "SELECT tanggal_lahir FROM tb_lahir WHERE id_lahir = '$tanggal_lahir'";
    //     $result_tanggal_lahir = mysqli_query($conn, $query_tanggal_lahir);
    //     if ($result_tanggal_lahir && mysqli_num_rows($result_tanggal_lahir) > 0) {
    //         $data_tanggal_lahir = mysqli_fetch_assoc($result_tanggal_lahir);
    //         $tanggal_lahir = $data_tanggal_lahir['tanggal_lahir'];
    //     } else {
    //         echo "<script>alert('Tanggal lahir tidak valid.'); window.location.href='kelahiran.php';</script>";
    //         exit;
    //     }
    // }

    //logika mencari jenis kelamin
    //query untuk mencari jenis_kelamin berdasarkan id_lahir
    //dari tabel kelahiran untuk tabel penduduk

    // $jenis_kelamin = null;
    // if (!empty($id_lahir)) {
    //     $query_jenis_kelamin = "SELECT jenis_kelamin FROM tb_lahir WHERE id_lahir = '$jenis_kelamin'";
    //     $result_jenis_kelamin = mysqli_query($conn, $query_jenis_kelamin);
    //     if ($result_jenis_kelamin && mysqli_num_rows($result_jenis_kelamin) > 0) {
    //         $data_jenis_kelamin = mysqli_fetch_assoc($result_jenis_kelamin);
    //         $jenis_kelamin = $data_jenis_kelamin['jenis_kelamin'];
    //     } else {
    //         echo "<script>alert('Tanggal lahir tidak valid.'); window.location.href='kelahiran.php';</script>";
    //         exit;
    //     }
    // }

    // Ambil no_kartu_keluarga dari tpenduduk
    // $query_kk = "SELECT no_kartu_keluarga FROM tpenduduk WHERE nik = '$nik'";
    // $result_kk = mysqli_query($conn, $query_kk);

    // if ($result_kk && mysqli_num_rows($result_kk) > 0) {
    //     $data_kk = mysqli_fetch_assoc($result_kk);
    //     $no_kartu_keluarga = $data_kk['no_kartu_keluarga'];

    //     // Ambil alamat dari tkeluarga berdasarkan no_kartu_keluarga
    //     $query_alamat = "SELECT alamat FROM tkeluarga WHERE id_keluarga = '$no_kartu_keluarga'";
    //     $result_alamat = mysqli_query($conn, $query_alamat);
    //     $alamat = null;

    //     if ($result_alamat && mysqli_num_rows($result_alamat) > 0) {
    //         $data_alamat = mysqli_fetch_assoc($result_alamat);
    //         $alamat = $data_alamat['alamat'];
    //     } else {
    //         $alamat = 'Alamat tidak ditemukan';
    //     }


    $sql = "
        UPDATE 
            tpenduduk 
        SET 
            jenis_kelamin='$jenis_kelamin', 
            alamat='$alamat', 
            agama='$agama', 
            status_perkawinan='$status_perkawinan', 
            pekerjaan='$pekerjaan', 
            no_hp='$no_hp' 
        WHERE 
            nik='$nik'";

    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        echo "<div class='alert alert-success'>Data berhasil diperbarui.</div>";
    } else {
        echo "<div class='alert alert-danger'>Data gagal diperbarui.</div>";
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

// logika keluarga
// tambah kartu keluarga 
if (isset($_POST['tambah'])) {
    $no_kartu_keluarga = $_POST['no_kartu_keluarga'] ?? null;
    $nik = $_POST['nik'] ?? null;
    $nama_kepala_kk = $_POST['nama_kepala_kk'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $tanggal_input = $_POST['tanggal_input'] ?? null;

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

    //logilka insert jika data nik sudah ada di tb_lahir
    if ($no_kartu_keluarga != null && $nik != null && $nama_kepala_kk != null && $alamat != null && $tanggal_input != null) {
        $sql = "INSERT INTO tkeluarga (no_kartu_keluarga, nik, nama_kepala_kk, alamat, tanggal_input) VALUES ('$no_kartu_keluarga', '$nik', '$nama_kepala_kk', '$alamat', '$tanggal_input')";
        $hasil = $conn->query($sql);
        if ($hasil) {
            echo '<div class="alert alert-success"><strong>Sukses!</strong> Data keluarga berhasil ditambahkan.</div>';
        } else {
            echo '<div class="alert alert-danger"><strong>Gagal!</strong> Terjadi kesalahan saat menambahkan data.</div>';
        }
    }

    //update id_keluarga di tb_lahir setelah menambahkan data keluarga
    $query_id_keluarga = "SELECT id_keluarga FROM tkeluarga WHERE no_kartu_keluarga = '$no_kartu_keluarga'";
    $result_id_keluarga = mysqli_query($conn, $query_id_keluarga);
    if ($result_id_keluarga && mysqli_num_rows($result_id_keluarga) > 0) {
        $data_id_keluarga = mysqli_fetch_assoc($result_id_keluarga);
        $id_keluarga = $data_id_keluarga['id_keluarga'];

        // Update id_keluarga di tb_lahir
        $query_update_lahir = "UPDATE tb_lahir SET id_keluarga = '$id_keluarga' WHERE nik = '$nik'";
        mysqli_query($conn, $query_update_lahir);
    } else {
        echo "<script>alert('Nomor Kartu Keluarga tidak ditemukan.'); window.location.href='data-kk.php';</script>";
        exit;
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

//logikan anggota keluarga
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

// logika kelahiran
// insert data kelahiran ke tb_lahir, penduduk, dan anggota keluarga
if (isset($_POST['submitkelahiran'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_input = $_POST['tanggal_input'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $tanggal_pencatatan = $_POST['tanggal_input'];
    $id_petugas = $_POST['id_petugas'];
    // $alamat = $_POST['alamat'];
    // $no_kartu_keluarga = $_POST['no_kartu_keluarga'];
    // $nama_petugas = $_POST['nama_petugas'];

    // Ambil nilai default
    $agama = isset($_POST['agama']) ? $_POST['agama'] : '-';
    $pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '-';
    $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '-';

    //mencari id_keluarga berdasarkan no_kartu_keluarga
    // $query_data_kk = "SELECT no_kartu_keluarga FROM tkeluarga WHERE id_keluarga = '$no_kartu_keluarga'";
    // $result_data_kk = mysqli_query($conn, $query_data_kk);
    // if ($result_data_kk && mysqli_num_rows($result_data_kk) > 0) {
    //     $data_keluarga = mysqli_fetch_assoc($result_data_kk);
    //     $no_kartu_keluarga = $data_keluarga['no_kartu_keluarga'];
    // } else {
    //     echo "<script>alert('No Kartu Keluarga tidak ditemukan.'); window.location.href='kelahiran.php';</script>";
    //     exit;
    // }
    // Insert ke tanggota_keluarga
    // $query_anggota = "INSERT INTO tanggotakeluarga (id_keluarga, nik, hubungan) VALUES ('$id_keluarga', '$nik', 'Anak')";
    // $hasil_anggota = mysqli_query($conn, $query_anggota);


    // Insert ke tpenduduk
    $query_penduduk = "
    INSERT 
    INTO 
      tpenduduk 
      (nik, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, status_perkawinan, pekerjaan, no_hp, tanggal_input) 
    VALUES 
      ('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin','$agama', 'Belum Kawin', '$pekerjaan','$no_hp', '$tanggal_pencatatan')";
    $hasil_penduduk = mysqli_query($conn, $query_penduduk);

    // Insert ke tb_lahir
    $query_lahir = "INSERT INTO tb_lahir (nik, nama, jenis_kelamin, tanggal_lahir, tempat_lahir, nama_ayah, nama_ibu, tanggal_input, id_petugas) VALUES ('$nik', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$tempat_lahir', '$nama_ayah', '$nama_ibu', '$tanggal_pencatatan', '$id_petugas')";
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
