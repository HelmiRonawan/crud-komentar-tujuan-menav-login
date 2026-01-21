-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2026 pada 07.58
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
-- Database: `dbcoment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nim` char(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nim`, `nama`, `id_tujuan`, `komentar`, `timestamps`) VALUES
(1, 'C030324002', 'Helmi', 2, 'Mlakukan update tujuan dengan postman', '2026-01-17 04:46:11'),
(2, 'A030100008', 'Rina Lestari', 1, 'update tujuan 3 ke 2', '2026-01-17 04:48:55'),
(3, 'C030100009', 'Rian Saja', 2, 'Lagi testing komentar', '2026-01-17 04:20:32'),
(4, 'C030100011', 'Joko', 1, 'Testing testing komentar', '2026-01-17 04:20:32'),
(9, 'C030324006', 'Roku', 3, 'tambah dengan tujuan DOsen', '2026-01-17 04:35:19'),
(10, 'C030324007', 'Kuro', 2, 'tambah dari html & get_tujuuan dengan tujuan akademik', '2026-01-17 04:41:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `nama_tujuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `nama_tujuan`) VALUES
(1, 'Jurusan'),
(2, 'Akademik'),
(3, 'Dosen'),
(6, 'Prodi');

--
-- Indexes for dumped tables
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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
