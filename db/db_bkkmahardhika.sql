-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2024 pada 08.50
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
(1, 'partner', '$2a$10$IasvQPYk2sJ0qZT2rajB4ufydBr6olnewVqSMLp20ko5VswcjmSha', 'partner@gmail.com', '', '', '', '', '0000-00-00', '', 0, '', '', 0, 0, '', '', 'client', '336375ae5e3ef103621d6b847d2df7c6.jpg', '7550586825838ac2406f831c1ef8ab4d.jpg', 'ktp.png', 'kartu_keluarga.jpg'),
(2, 'Asep Nursyaid, S.T', '$2a$10$YiFT5uwgmY.kowyHapojuue9T23KQYvpx3fPO9SvtjEv9ETemlWE6', 'asepnu@gmail.com', 'Asep Nursyaid, S.T', 'laki-laki', 'S1', 'SMK Mahardhika Batujajar', '1970-06-01', 'Bandung', 45, 'RPL', 'Guru', 170, 60, '081215741949', '1234567891010101', 'client', '2e790b198f5e60a5865ffeb58e252d2e.jpeg', '7550586825838ac2406f831c1ef8ab4d.jpg', 'ktp.png', 'kartu_keluarga.jpg'),
(3, 'dmzhari', '$2a$10$1wFrmxvFYF1CuGlRgV.w0OERFw1XrpLYhDgGapE.odfAE87Hrqq7u', 'hari@gmail.com', 'Hari Permana Sidiq', 'laki-laki', 'SMK', 'SMK Mahardhika Batujajar', '2003-06-02', 'Bandung', 20, 'RPL', 'Staff HUBIN BKK', 170, 53, '083822080039', '', 'client', '60d5fa44bf86d3f0a323e81e620fbb73.jpg', '7550586825838ac2406f831c1ef8ab4d.jpg', '01a09f2d6376810e9d5e6ecf4f80e8a9.png', 'dfb889e847796a86937381d896262e5a.jpg');

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
(1, 'smkmahardhika', '$2a$10$i4J9Tcvl6rJPeSbLIQ6wauB5NhCAEC7FhoV9qEjbbv/GTtisE5pjK', 'partner@gmail.com', 'SMK MAHARDHIKA BATUJAJAR', '312142141', '087432431313', '46728462f9dad05a51a72f96b904c64b.jpeg', 'Jl. Batujajar No. 30', 'SMK Mahardhika Terakditasi A', 'partner'),
(2, 'PT. Integral Sekawan', '$2y$10$zfrk0w28e0GYKbRZHUBj/.xMFqV43PCC9Zvmw3vcqjzDN9WdhQ9Su', 'integralpt@gmail.com', '', '', '', 'logo_bkk.jpeg', '', '', 'partner');

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
-- Indeks untuk tabel `tb_partner`
--
ALTER TABLE `tb_partner`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_partner`
--
ALTER TABLE `tb_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
