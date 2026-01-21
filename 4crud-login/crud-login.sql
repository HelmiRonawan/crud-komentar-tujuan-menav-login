-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Jan 2026 pada 09.14
-- Versi server: 8.0.30
-- Versi PHP: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `dbcoment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `nim` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_tujuan` int NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nim`, `nama`, `id_tujuan`, `komentar`, `timestamps`) VALUES
(1, 'C030324002', 'Helmi Ronawan', 2, 'Mlakukan update tujuan dengan postman', '2026-01-20 09:05:38'),
(2, 'A030100008', 'Rina Lestari', 1, 'update tujuan 3 ke 2', '2026-01-17 04:48:55'),
(3, 'C030100009', 'Rian Saja', 2, 'Lagi testing komentar', '2026-01-17 04:20:32'),
(4, 'C030100011', 'Joko', 1, 'Testing testing komentar', '2026-01-17 04:20:32'),
(5, 'C030324006', 'Roku', 3, 'tambah dengan tujuan DOsen', '2026-01-20 07:37:58'),
(6, 'C030324007', 'Randy', 2, 'tambah dari html & get_tujuuan dengan tujuan akademik', '2026-01-20 09:11:16'),
(7, 'C030324123', 'Haikal Alfarabi', 4, 'Ini komentar (edit oleh peg1)', '2026-01-20 08:48:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int NOT NULL,
  `nama_tujuan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `nama_tujuan`) VALUES
(1, 'Jurusan'),
(2, 'Akademik'),
(3, 'Dosen'),
(4, 'Prodi'),
(5, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pegawai') NOT NULL DEFAULT 'pegawai',
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `fullname`) VALUES
(1, 'admin', '$2y$10$IbM9jjMydFmpQsC.KVD52.Z0gmIGQxsKbDu8HoA/JAYc7Kgd/kDrO', 'admin', 'Ahmad Helmi Ronawan'),
(2, 'peg1', '$2y$10$opHMSm59r1Wx7RiGtupT.eUPXMFnIIua6quEysjroevlM2.VweU7i', 'pegawai', 'John Doe');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
