-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2025 pada 13.04
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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tpenduduk`
--
ALTER TABLE `tpenduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
