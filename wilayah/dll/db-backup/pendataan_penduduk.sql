-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2025 pada 13.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan_penduduk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggotakeluarga`
--

CREATE TABLE `tanggotakeluarga` (
  `id_anggota` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `hubungan` enum('Kepala Keluarga','Istri','Anak','Orang Tua','Saudara','Lainnya') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id`, `id_petugas`, `aksi`, `tanggal`) VALUES
(1, 2, 'Login sebagai petugas', '2025-05-12'),
(2, 2, 'Login sebagai petugas', '2025-05-13'),
(3, 2, 'Login sebagai petugas', '2025-05-13'),
(4, 2, 'Login sebagai petugas', '2025-05-14'),
(5, 2, 'Login sebagai petugas', '2025-05-14'),
(6, 2, 'Login sebagai petugas', '2025-05-15'),
(7, 2, 'Login sebagai petugas', '2025-05-15'),
(8, 2, 'Login sebagai petugas', '2025-05-16'),
(9, 2, 'Login sebagai petugas', '2025-05-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id_kelurahan` bigint(20) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_kelurahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lahir`
--

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lahir`
--

INSERT INTO `tb_lahir` (`id_lahir`, `id_keluarga`, `nik`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `nama_ayah`, `nama_ibu`, `tanggal_input`, `id_petugas`) VALUES
(1, 0, '3273161107070001', 'ali', 'P', '2011-10-28', 'Tokyo', 'dummy', 'dummy', '2025-05-16 17:00:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak` enum('admin','petugas','pemerintah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `alamat`, `no_hp`, `username`, `password`, `hak`) VALUES
(1, 'ali', 'cimahi', '081234567890', 'admin', 'admin1', 'admin'),
(2, 'Liya', 'bandung', '081234567890', 'petugas1', 'PTS1', 'petugas'),
(3, 'Anzu', 'jakarta', '081234567890', 'pemerintah1', 'PMT1', 'pemerintah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tkeluarga`
--

CREATE TABLE `tkeluarga` (
  `id_keluarga` int(11) NOT NULL,
  `no_kartu_keluarga` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_kepala_kk` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpendidikan`
--

CREATE TABLE `tpendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tingkat_pendidikan` varchar(100) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `tahun_lulus` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpenduduk`
--

CREATE TABLE `tpenduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kartu_keluarga` varchar(16) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `agama` varchar(50) NOT NULL,
  `status_perkawinan` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') NOT NULL,
  `status_hidup` enum('Hidup','Mati') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tpenduduk`
--

INSERT INTO `tpenduduk` (`id_penduduk`, `nik`, `no_kartu_keluarga`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `id_wilayah`, `agama`, `status_perkawinan`, `status_hidup`, `pekerjaan`, `no_hp`, `tanggal_input`) VALUES
(1, '3273161107070001', '', 'ali', 'Tokyo', '2011-10-28', 'P', '日本、〒462-0034 愛知県名古屋市北区天道町５丁目３０−３０', NULL, 'Katolik', 'Cerai Hidup', 'Hidup', 'Nelayan', '081234567890', '2025-05-17 01:13:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `twafat`
--

CREATE TABLE `twafat` (
  `id_wafat` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_wafat` text NOT NULL,
  `tanggal_wafat` date NOT NULL,
  `penyebab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `twilayah`
--

CREATE TABLE `twilayah` (
  `id_wilayah` int(11) NOT NULL,
  `id_kelurahan` bigint(20) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tanggotakeluarga`
--
ALTER TABLE `tanggotakeluarga`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_keluarga` (`id_keluarga`);

--
-- Indeks untuk tabel `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD PRIMARY KEY (`id_lahir`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_keluarga` (`id_keluarga`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `tkeluarga`
--
ALTER TABLE `tkeluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `no_kartu_keluarga` (`no_kartu_keluarga`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indeks untuk tabel `tpendidikan`
--
ALTER TABLE `tpendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_penduduk` (`nik`);

--
-- Indeks untuk tabel `tpenduduk`
--
ALTER TABLE `tpenduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `nik_2` (`nik`),
  ADD KEY `id_wilayah` (`id_wilayah`),
  ADD KEY `no_kartu_keluarga` (`no_kartu_keluarga`);

--
-- Indeks untuk tabel `twafat`
--
ALTER TABLE `twafat`
  ADD PRIMARY KEY (`id_wafat`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_penduduk` (`nik`);

--
-- Indeks untuk tabel `twilayah`
--
ALTER TABLE `twilayah`
  ADD PRIMARY KEY (`id_wilayah`),
  ADD KEY `id_kelurahan` (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tanggotakeluarga`
--
ALTER TABLE `tanggotakeluarga`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tkeluarga`
--
ALTER TABLE `tkeluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tpendidikan`
--
ALTER TABLE `tpendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tpenduduk`
--
ALTER TABLE `tpenduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `twafat`
--
ALTER TABLE `twafat`
  MODIFY `id_wafat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `twilayah`
--
ALTER TABLE `twilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
