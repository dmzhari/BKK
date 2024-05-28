-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2024 pada 04.29
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bkkmahardhika`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('admin','partner','client') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `level`, `foto`) VALUES
(1, 'admin', '$2y$10$eh.nPxyfNZ4.7JfJwyQ9IuxNLiCnaUd9LZ95X8QdAIplc49V6yb9G', 'admin', 'admin_foto.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_client`
--

CREATE TABLE `tb_client` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `usia` int(11) NOT NULL,
  `jurusan` varchar(150) NOT NULL,
  `pekerjaan_terakhir` varchar(100) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `nowa` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `level` enum('admin','partner','client') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_client`
--

INSERT INTO `tb_client` (`id`, `username`, `password`, `email`, `nama_lengkap`, `jk`, `pendidikan`, `asal_sekolah`, `tanggal_lahir`, `tempat_lahir`, `usia`, `jurusan`, `pekerjaan_terakhir`, `tinggi_badan`, `berat_badan`, `nowa`, `nik`, `level`, `foto`, `cv`, `ktp`, `kk`) VALUES
(1, 'dmzhari', '$2a$10$O7xcwBVnroFKOcWHfXGzv.7WpJSqVoSzz/B6voF.yTPOibLLlv0Nu', 'hari990@gmail.com', 'Hari Permana Sidiq', 'laki-laki', 'SMK', 'SMK Mahardhika Batujajar', '2003-06-02', 'Bandung', 20, 'RPL', 'Staff HUBIN BKK', 170, 53, '083822080039', '', 'client', '60d5fa44bf86d3f0a323e81e620fbb73.jpg', '7550586825838ac2406f831c1ef8ab4d.jpg', '600ae74b1affb5a7b8a3a6febfacea01.png', 'bfcd9f809926833fdd4ea64f745114e6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_loker`
--

CREATE TABLE `tb_loker` (
  `id_loker` int(100) NOT NULL,
  `judul_loker` varchar(100) NOT NULL,
  `posisi_loker` varchar(100) NOT NULL,
  `foto_pengumuman` varchar(50) NOT NULL,
  `penempatan_job` varchar(100) NOT NULL,
  `syarat_job` varchar(255) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_loker`
--

INSERT INTO `tb_loker` (`id_loker`, `judul_loker`, `posisi_loker`, `foto_pengumuman`, `penempatan_job`, `syarat_job`, `tanggal_kadaluarsa`, `id_user`) VALUES
(1, 'Dibutuhkan Mekanik untuk motor dan mobil cabang bandung dan cimahi', 'Mekanik, Operator Bubut , Operator CNC', '0e6a8646061b5a2490c04c951ece4121.jpeg', 'Cimahi, Bandung', 'Berpengalaman 4\r\nSiap Bekerja\r\nTidak Buta Warna\r\nSiap Bekerja dengan Sistem Shift', '2024-02-05', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_partner`
--

CREATE TABLE `tb_partner` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nowa` varchar(50) NOT NULL,
  `foto_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `tentang_perusahaan` varchar(255) NOT NULL,
  `level` enum('admin','client','partner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_partner`
--

INSERT INTO `tb_partner` (`id`, `username`, `password`, `email`, `nama_perusahaan`, `nik`, `nowa`, `foto_perusahaan`, `alamat_perusahaan`, `tentang_perusahaan`, `level`) VALUES
(1, 'smkmahardhika', '$2a$10$i4J9Tcvl6rJPeSbLIQ6wauB5NhCAEC7FhoV9qEjbbv/GTtisE5pjK', 'partner@gmail.com', 'SMK MAHARDHIKA BATUJAJAR', '', '087432431313', '46728462f9dad05a51a72f96b904c64b.jpeg', 'Jl. Batujajar No. 30', 'SMK Mahardhika Terakditasi A', 'partner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelamar`
--

CREATE TABLE `tb_pelamar` (
  `id_pel` int(11) NOT NULL,
  `id_loker` int(100) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_loker`
--
ALTER TABLE `tb_loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indeks untuk tabel `tb_partner`
--
ALTER TABLE `tb_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pelamar`
--
ALTER TABLE `tb_pelamar`
  ADD PRIMARY KEY (`id_pel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_loker`
--
ALTER TABLE `tb_loker`
  MODIFY `id_loker` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_partner`
--
ALTER TABLE `tb_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
