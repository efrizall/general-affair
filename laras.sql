-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Mar 2022 pada 02.49
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laras`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_maintenance`
--

CREATE TABLE `app_maintenance` (
  `id` int(11) NOT NULL,
  `maintenance_id` int(11) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `avp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `app_maintenance`
--

INSERT INTO `app_maintenance` (`id`, `maintenance_id`, `pemeriksa`, `avp`) VALUES
(1, 1, 'Belum disetujui', 'Belum disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_transportasi`
--

CREATE TABLE `app_transportasi` (
  `id` int(11) NOT NULL,
  `transportasi_id` int(11) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `avp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `permintaan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_maintenance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `maintenance`
--

INSERT INTO `maintenance` (`id`, `nama`, `divisi`, `permintaan`, `keterangan`, `status`, `tanggal`, `file`, `user_id`, `app_maintenance_id`) VALUES
(23, 'testing', 'testing', 'testing', 'tes', 'Belum diproses', '2022-03-25', 'Tidak ada', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nopol` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses`
--

CREATE TABLE `proses` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `maintenance_id` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses`
--

INSERT INTO `proses` (`id`, `nama`, `divisi`, `catatan`, `status`, `maintenance_id`, `update_at`) VALUES
(1, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Selesai', 14, '2022-03-25 10:50:47'),
(3, 'tes', 'tes', 'tess', 'tes', 17, '2022-03-25 10:42:15'),
(6, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Selesai', 18, '2022-03-25 04:53:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi`
--

CREATE TABLE `transportasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tgl_pakai` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jam_pakai` time NOT NULL,
  `jam_kembali` time NOT NULL,
  `status` varchar(255) NOT NULL,
  `app_transportasi_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transportasi`
--

INSERT INTO `transportasi` (`id`, `nama`, `divisi`, `mobil_id`, `tujuan`, `keperluan`, `tgl_pakai`, `tgl_kembali`, `jam_pakai`, `jam_kembali`, `status`, `app_transportasi_id`, `tanggal`, `file`) VALUES
(1, 'asd', 'asd', 1, 'asd', 'asd', '2022-03-02', '2022-03-09', '17:11:17', '20:11:17', 'asd', 1, '2022-03-16', 'tidak ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` int(10) NOT NULL,
  `name` varchar(128) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nip`, `name`, `divisi`, `password`, `role_id`, `date_created`) VALUES
(5, 121, 'Muhajir', 'Pelayanan Strategis SDM & Umum', 'admin', 1, 1636385130),
(6, 122, 'Nani Indriyani', 'IT', 'pemeriksa', 2, 1636815445),
(7, 123, 'Achmad Mashuri', 'Pelayanan Strategis SDM & Umum', 'staff', 3, 20220318),
(8, 124, 'Masayu Olivia Nurjanah', 'Pelayanan Strategis SDM & Umum', 'umum', 4, 20220318);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pemeriksa'),
(3, 'staff'),
(4, 'umum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app_maintenance`
--
ALTER TABLE `app_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `app_maintenance`
--
ALTER TABLE `app_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `proses`
--
ALTER TABLE `proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
