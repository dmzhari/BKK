-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2022 pada 11.34
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `jurusan` enum('RPL','AKL','TP','TKR','TBSM') NOT NULL,
  `pekerjaan_terakhir` varchar(100) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `nowa` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `level` enum('admin','partner','client') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_client`
--

INSERT INTO `tb_client` (`id`, `username`, `password`, `email`, `nama_lengkap`, `jk`, `pendidikan`, `asal_sekolah`, `tanggal_lahir`, `tempat_lahir`, `usia`, `jurusan`, `pekerjaan_terakhir`, `tinggi_badan`, `berat_badan`, `nowa`, `nik`, `level`, `foto`, `cv`) VALUES
(1, 'rizki', '$2a$10$IasvQPYk2sJ0qZT2rajB4ufydBr6olnewVqSMLp20ko5VswcjmSha', 'test@gmail.com', 'Rizki Ramadhani', 'laki-laki', 'SMK', 'SMK Mahardhika Batujajar', '2022-06-01', 'Bandung', 20, 'RPL', 'Operator Warnet', 171, 60, '089123345678', '3217113456789012', 'client', '336375ae5e3ef103621d6b847d2df7c6.jpg', 'fdde03f5edad8839c59091acf30b2083.jpg'),
(2, 'dmzhari', '$2y$10$gQhqsHtkS37RfGxGXfw0euO3EEyBE9EjEU0g8h2xORSqTzf7J08fm', 'hari@gmail.com', 'Dmz Hari', 'laki-laki', '', '', '0000-00-00', '', 0, 'RPL', 'BKK Hubin', 171, 53, '', '', 'client', '5cf1fde5b47061489313e541d6625184.jpg', 'fdde03f5edad8839c59091acf30b2083.jpg'),
(3, 'habib', '$2y$10$z1BjIxOts.zmBZ9bdS7Y0uhQmMn1CnZI53u02WJIvQXnI74WCQzYi', 'habib@gmail.com', '', 'laki-laki', '', '', '0000-00-00', '', 0, 'RPL', '', 0, 0, '', '', 'client', '8a70fe24f14abe613d283b1724f48f5a.jpg', 'fdde03f5edad8839c59091acf30b2083.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_partner`
--

CREATE TABLE `tb_partner` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` enum('admin','client','partner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_partner`
--

INSERT INTO `tb_partner` (`id`, `username`, `password`, `email`, `foto`, `level`) VALUES
(1, 'partner', '$2y$10$P8FBlGrucesY8efrWSWoNeViFzGutYrcZwur8Iawcr.2ICXGTTqmW', 'partner@gmail.com', 'logo_bkk.jpeg', 'partner');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_partner`
--
ALTER TABLE `tb_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
