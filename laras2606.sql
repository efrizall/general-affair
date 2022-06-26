-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Jun 2022 pada 08.22
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
-- Struktur dari tabel `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `no_resi` int(11) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `no_surat` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ttd_avp` varchar(100) NOT NULL,
  `ttd_pemeriksa` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ekspedisi`
--

INSERT INTO `ekspedisi` (`id`, `nama`, `tujuan`, `sifat`, `no_resi`, `divisi`, `pemeriksa`, `tgl_surat`, `tgl_diterima`, `no_surat`, `user_id`, `ttd_avp`, `ttd_pemeriksa`, `catatan`, `file`) VALUES
(2, 'tess', 'tes', 'Biasa - Ekspedisi', 123123123, 'tres', 'AVP Tresuri', '2022-05-11', '0000-00-00', 123123123, 10, 'Disetujui', 'Tidak Disetujui', '', ''),
(5, 'pemeriksaa', 'asdasd', 'Urgent - Kirim Langsung', 2147483647, 'asdas', 'AVP Pendukung Strategik', '2022-05-17', '0000-00-00', 2147483647, 11, 'Belum Disetujui', 'Tidak Disetujui', '', ''),
(6, 'pemeriksaaaa', 'periksa', 'Biasa - Ekspedisi', 3333333, 'periksa', 'AVP Pendukung Strategik', '2022-05-17', '0000-00-00', 333333, 11, 'Belum Disetujui', 'Disetujui', '', '');

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
  `pemeriksa` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ttd_avp` varchar(50) NOT NULL,
  `ttd_pemeriksa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `maintenance`
--

INSERT INTO `maintenance` (`id`, `nama`, `divisi`, `permintaan`, `keterangan`, `status`, `tanggal`, `pemeriksa`, `file`, `user_id`, `ttd_avp`, `ttd_pemeriksa`) VALUES
(39, 'nama', 'divisi', 'permintaan', 'keterangan', 'Selesai', '2022-04-14', 'AVP Pelayanan Strategis SDM & Umum', 'Tidak ada', 10, 'Belum Disetujui', 'Belum Disetujui'),
(40, 'guest', 'guest', 'gurst', 'alksjdhakjsd', 'Belum diproses', '2022-05-16', 'AVP Pelayanan Strategis SDM & Umum', 'Tidak ada', 5, 'Belum Disetujui', 'Belum Disetujui'),
(42, 'asd', 'asd', 'asd', 'asd', 'Belum diproses', '2022-06-02', 'AVP Anggaran', 'Tidak ada', 10, 'Belum Disetujui', 'Belum Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nopol` char(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `jenis`, `nopol`, `status`) VALUES
(1, 'Toyotan Innova', 'B 2753 STMS', 'Tidak Tersedia'),
(2, 'Suzuki Ertiga', 'B 1863 SRQ', 'Tidak Tersedia'),
(3, 'Mazda Biante', 'B 1607 SYI', 'Tersedia'),
(4, 'Suzuki Ertiga', 'B 1635 SRQ', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksa`
--

CREATE TABLE `pemeriksa` (
  `id` int(11) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksa`
--

INSERT INTO `pemeriksa` (`id`, `pemeriksa`) VALUES
(1, 'AVP Pendukung Direksi & Kesekretariatan'),
(2, 'AVP Komunikasi & Relasi Korporasi'),
(3, 'AVP TJSL & CSR'),
(4, 'AVP Hukum Bisnis & Kepatuhan'),
(5, 'AVP Penasihat Hukum & Litigasi'),
(6, 'AVP Strategi Korporasi & Transformasi Organisasi'),
(7, 'AVP Pengendalian Kinerja Korporasi'),
(8, 'AVP Pengembangan Usaha & Portofolio'),
(9, 'AVP Riset & Inovasi'),
(10, 'AVP Keuangan'),
(11, 'AVP Tresuri'),
(12, 'AVP Akuntansi'),
(13, 'AVP Anggaran'),
(14, 'AVP Operasional & Pengelolaan Informasi Aset'),
(15, 'AVP Strategi & Sinergi Aset'),
(16, 'AVP Optimalisasi & Komersialisasi Aset'),
(17, 'AVP Pelayanan Strategis SDM & Umum'),
(18, 'AVP Pendukung Strategik');

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
(6, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Selesai', 18, '2022-03-25 04:53:58'),
(7, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sedang diproses', 28, '2022-03-25 21:47:40'),
(8, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Selesai', 29, '2022-03-29 09:25:24'),
(9, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sedang diproses', 30, '2022-03-26 22:04:21'),
(10, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Selesai', 31, '2022-04-06 03:06:05'),
(11, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sedang diproses', 32, '2022-03-29 04:46:22'),
(12, 'Nani Indriyani', 'Pelayanan Strategis SDM & Umum', '', 'Selesai', 33, '2022-04-06 03:03:51'),
(13, 'Achmad Mashuri', 'Pelayanan Strategis SDM & Umum', '', 'Selesai', 35, '2022-04-06 03:03:16'),
(14, 'Achmad Mashuri', 'Pelayanan Strategis SDM & Umum', '', 'Selesai', 0, '2022-04-05 21:47:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_mobil`
--

CREATE TABLE `status_mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `transportasi_id` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_mobil`
--

INSERT INTO `status_mobil` (`id`, `nama`, `divisi`, `catatan`, `status`, `transportasi_id`, `update_at`) VALUES
(1, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 1, '2022-03-27 11:27:22'),
(2, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 2, '2022-03-27 11:33:32'),
(3, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 3, '2022-03-28 09:06:09'),
(4, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 4, '2022-03-29 01:40:39'),
(5, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 5, '2022-03-29 01:46:03'),
(7, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 6, '2022-03-29 04:51:47'),
(8, 'Nani Indriyani', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 9, '2022-05-16 09:15:12'),
(9, 'Nani Indriyani', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 8, '2022-05-16 09:23:14'),
(10, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 7, '2022-05-16 09:24:47'),
(11, 'Achmad Mashuri', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 11, '2022-05-17 20:21:43');

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
  `pemeriksa` varchar(100) NOT NULL,
  `ttd_avp` varchar(50) NOT NULL,
  `ttd_pemeriksa` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transportasi`
--

INSERT INTO `transportasi` (`id`, `nama`, `divisi`, `mobil_id`, `tujuan`, `keperluan`, `tgl_pakai`, `tgl_kembali`, `jam_pakai`, `jam_kembali`, `pemeriksa`, `ttd_avp`, `ttd_pemeriksa`, `status`, `tanggal`, `file`, `user_id`) VALUES
(15, 'tes update mobil', 'asdasd', 2, 'asdasd', 'asdasdasd', '2022-06-02', '2022-06-02', '21:56:00', '21:56:00', 'AVP Akuntansi', 'Belum Disetujui', 'Belum Disetujui', 'Belum Dikembalikan', '2022-06-02', 'Tidak ada', 10),
(16, 'asldkj', 'alskdj', 1, 'alskdj', 'alskdj', '2022-06-03', '2022-06-03', '10:36:00', '10:36:00', 'AVP Akuntansi', 'Belum Disetujui', 'Belum Disetujui', 'Belum Dikembalikan', '2022-06-03', 'Tidak ada', 10);

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nip`, `name`, `divisi`, `password`, `role_id`, `date_created`) VALUES
(10, 121, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '$2y$10$R7YAyw.iTS4j4tiDegI/4ehRIW8J1hMdXqpliLHVyNB1XjvXFNv86', 1, '2022-04-04 10:54:53'),
(11, 122, 'Nani Indriyani', 'Pelayanan Strategis SDM & Umum', '$2y$10$N25PdY9u2vgG3VN/eKnAr.KB2teThqJ8mwCb3tu9F0IwzSs.Dh8N2', 2, '2022-04-04 10:55:52'),
(12, 123, 'Achmad Mashuri', 'Pelayanan Strategis SDM & Umum', '$2y$10$iZMwGcTbCnxAbx7Envy3AebuqYodLQJWjohJhg1z07tvrWd788nOK', 3, '2022-04-04 10:56:30'),
(13, 124, 'Nuril Fikri', 'Pelayanan Strategis SDM & Umum', '$2y$10$KRSUr/TF/j6Xxd/aKErejO2LHBnwv3WYb3JELVknbHrNOWrcf1SZC', 4, '2022-06-07 03:46:13');

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
-- Indeks untuk tabel `ekspedisi`
--
ALTER TABLE `ekspedisi`
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
-- Indeks untuk tabel `pemeriksa`
--
ALTER TABLE `pemeriksa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_mobil`
--
ALTER TABLE `status_mobil`
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
-- AUTO_INCREMENT untuk tabel `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemeriksa`
--
ALTER TABLE `pemeriksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `proses`
--
ALTER TABLE `proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `status_mobil`
--
ALTER TABLE `status_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
