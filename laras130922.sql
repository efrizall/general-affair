-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2022 at 04:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `divisi`) VALUES
(1, 'Pendukung Strategik'),
(2, 'Pelayanan Strategis SDM & Umum'),
(3, 'Optimalisasi & Komersial Aset'),
(4, 'Strategi & Sinergi Aset'),
(5, 'Operasional & Pengelolaan Informasi Aset'),
(6, 'Anggaran'),
(7, 'Akuntansi'),
(8, 'Tresuri'),
(9, 'Keuangan'),
(10, 'Riset & Inovasi');

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
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
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id`, `nama`, `tujuan`, `sifat`, `no_resi`, `divisi`, `pemeriksa`, `tgl_surat`, `tgl_diterima`, `no_surat`, `user_id`, `ttd_avp`, `ttd_pemeriksa`, `catatan`, `file`, `created_at`) VALUES
(2, 'tess', 'tes', 'Urgent - Kirim Langsung', 123123123, 'tres', 'AVP Pendukung Strategik', '2022-05-11', '0000-00-00', 123123123, 10, 'Tidak Disetujui', 'Belum Disetujui', '', '', '2022-09-12 16:31:37'),
(4, 'testtt', 'tessttt', 'Biasa - Ekspedisi', 112222, 'testtt', 'AVP Tresuri', '2022-05-13', '0000-00-00', 12222, 10, 'Disetujui', 'Belum Disetujui', '', '', '2022-09-12 16:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `log_app_maintenance`
--

CREATE TABLE `log_app_maintenance` (
  `id` int(11) NOT NULL,
  `maintenance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `ttd_avp` varchar(50) NOT NULL,
  `ttd_pemeriksa` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_app_maintenance`
--

INSERT INTO `log_app_maintenance` (`id`, `maintenance_id`, `user_id`, `pemeriksa`, `ttd_avp`, `ttd_pemeriksa`, `created_at`) VALUES
(4, 40, 10, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-07-14 15:09:52'),
(5, 40, 10, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-07-14 15:13:00'),
(6, 40, 10, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-04 01:44:55'),
(7, 41, 10, 'AVP Keuangan', 'Belum Disetujui', 'Belum Disetujui', '2022-09-11 14:48:03'),
(8, 40, 10, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-11 14:50:25'),
(9, 40, 10, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-11 14:51:17'),
(10, 40, 10, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-11 14:51:27'),
(11, 42, 5, 'AVP Riset & Inovasi', 'Belum Disetujui', 'Disetujui', '2022-09-12 13:48:59'),
(12, 40, 10, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Tidak Disetujui', '2022-09-12 13:49:14'),
(13, 43, 15, 'AVP Operasional & Pengelolaan Informasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 13:53:16'),
(14, 44, 12, 'AVP Akuntansi', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 14:25:54'),
(15, 44, 12, 'AVP Akuntansi', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 14:26:40'),
(16, 44, 12, 'AVP Komunikasi & Relasi Korporasi', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 14:27:12'),
(17, 44, 12, 'AVP Akuntansi', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 14:28:57'),
(18, 44, 12, 'AVP Akuntansi', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 14:29:11'),
(19, 42, 5, 'AVP Riset & Inovasi', 'Belum Disetujui', 'Disetujui', '2022-09-12 14:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `log_app_transportasi`
--

CREATE TABLE `log_app_transportasi` (
  `id` int(11) NOT NULL,
  `transportasi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pemeriksa` varchar(50) NOT NULL,
  `ttd_avp` varchar(50) NOT NULL,
  `ttd_pemeriksa` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_app_transportasi`
--

INSERT INTO `log_app_transportasi` (`id`, `transportasi_id`, `user_id`, `pemeriksa`, `ttd_avp`, `ttd_pemeriksa`, `created_at`) VALUES
(1, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-04 06:47:28'),
(2, 7, 1, 'AVP Tresuri', 'Disetujui', 'Belum Disetujui', '2022-09-04 06:48:50'),
(3, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:04:01'),
(4, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:05:01'),
(5, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:06:01'),
(6, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:07:01'),
(7, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:08:01'),
(8, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:08:01'),
(9, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:08:01'),
(10, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:08:01'),
(11, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:08:01'),
(12, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:08:01'),
(13, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:09:01'),
(14, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:09:01'),
(15, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:09:01'),
(16, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:09:01'),
(17, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:09:01'),
(18, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:09:01'),
(19, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:10:01'),
(20, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:10:01'),
(21, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:10:01'),
(22, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:10:01'),
(23, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:10:01'),
(24, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:10:01'),
(25, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:11:01'),
(26, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:11:01'),
(27, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:11:01'),
(28, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:11:01'),
(29, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:11:01'),
(30, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:11:01'),
(31, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:12:01'),
(32, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:12:01'),
(33, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:12:01'),
(34, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:12:01'),
(35, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:12:01'),
(36, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:12:01'),
(37, 10, 10, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:12:01'),
(38, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:13:01'),
(39, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:13:01'),
(40, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:13:01'),
(41, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:13:01'),
(42, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:13:01'),
(43, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:13:01'),
(44, 10, 10, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:13:01'),
(45, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:14:01'),
(46, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:14:01'),
(47, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-05 10:14:01'),
(48, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:14:01'),
(49, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-05 10:14:01'),
(50, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:14:01'),
(51, 10, 10, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-05 10:14:01'),
(52, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-08 20:52:44'),
(53, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-08 20:52:44'),
(54, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-08 20:52:44'),
(55, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-08 20:52:44'),
(56, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-08 20:52:44'),
(57, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-08 20:52:44'),
(58, 10, 10, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-08 20:52:44'),
(59, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(60, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(61, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(62, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(63, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(64, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(65, 10, 10, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(66, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(67, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(68, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(69, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(70, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(71, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(72, 10, 10, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-08 02:15:14'),
(73, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(74, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(75, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(76, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(77, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(78, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(79, 10, 10, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(80, 2, 5, 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(81, 4, 5, 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(82, 5, 5, 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(83, 7, 1, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(84, 8, 10, 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(85, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Belum Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(86, 10, 10, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-11 20:20:32'),
(87, 11, 10, 'AVP Hukum Bisnis & Kepatuhan', 'Belum Disetujui', 'Belum Disetujui', '2022-09-11 14:55:57'),
(88, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', '2022-09-11 15:07:48'),
(89, 12, 10, 'AVP Akuntansi', 'Belum Disetujui', 'Belum Disetujui', '2022-09-11 15:08:05'),
(90, 9, 13, 'AVP Pengembangan Usaha & Portofolio', 'Tidak Disetujui', 'Belum Disetujui', '2022-09-11 15:32:12'),
(91, 13, 15, 'AVP Strategi & Sinergi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 13:58:31'),
(92, 13, 4, 'AVP Komunikasi & Relasi Korporasi', 'Belum Disetujui', 'Disetujui', '2022-09-12 13:58:42'),
(93, 13, 4, 'AVP Komunikasi & Relasi Korporasi', 'Belum Disetujui', 'Disetujui', '2022-09-12 14:02:06'),
(94, 13, 15, 'AVP Komunikasi & Relasi Korporasi', 'Belum Disetujui', 'Disetujui', '2022-09-12 14:05:42'),
(95, 13, 15, 'AVP Anggaran', 'Belum Disetujui', 'Tidak Disetujui', '2022-09-12 14:06:36'),
(96, 14, 12, 'AVP Anggaran', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 14:44:03'),
(97, 15, 12, 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 14:47:05'),
(98, 17, 13, 'AVP Pendukung Direksi & Kesekretariatan', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 15:08:55'),
(99, 18, 13, 'AVP Pendukung Direksi & Kesekretariatan', 'Belum Disetujui', 'Belum Disetujui', '2022-09-12 15:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
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
  `ttd_pemeriksa` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `nama`, `divisi`, `permintaan`, `keterangan`, `status`, `tanggal`, `pemeriksa`, `file`, `user_id`, `ttd_avp`, `ttd_pemeriksa`, `created_at`) VALUES
(38, 'Masayu Olivia Nurjanah', 'SDM', 'permintaan', 'barang', 'Sedang diproses', '2022-04-06', 'AVP Pelayanan Strategis SDM & Umum', 'Tidak ada', 13, 'Disetujui', 'Disetujui', '2022-09-12 11:55:23'),
(40, 'tes trigger', 'tes', 'tes', 'tes', 'Sedang diproses', '2022-07-14', 'AVP Strategi & Sinergi Aset', 'Tidak ada', 10, 'Disetujui', 'Tidak Disetujui', '2022-09-12 11:55:23'),
(42, 'guest', 'Anggaran', 'asdasd', 'asdasd', 'Sedang diproses', '2022-09-11', 'AVP Riset & Inovasi', 'Tidak ada', 5, 'Belum Disetujui', 'Disetujui', '2022-09-12 11:55:23');

--
-- Triggers `maintenance`
--
DELIMITER $$
CREATE TRIGGER `aft_upd_maintenance` AFTER UPDATE ON `maintenance` FOR EACH ROW begin
insert into log_app_maintenance (maintenance_id,user_id,pemeriksa,ttd_avp,ttd_pemeriksa,created_at)
values (old.id,old.user_id,old.pemeriksa,new.ttd_avp,new.ttd_pemeriksa,now());
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nopol` char(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `jenis`, `nopol`, `status`) VALUES
(1, 'Toyotan Innova', 'B 2753 STM', 'Tidak Ters'),
(2, 'Suzuki Ertiga', 'B 1863 SRQ', 'Tersedia'),
(3, 'Mazda Biante', 'B 1607 SYI', 'Tersedia'),
(4, 'Suzuki Ertiga', 'B 1635 SRQ', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksa`
--

CREATE TABLE `pemeriksa` (
  `id` int(11) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemeriksa`
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
-- Table structure for table `proses`
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
-- Dumping data for table `proses`
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
-- Table structure for table `status_mobil`
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
-- Dumping data for table `status_mobil`
--

INSERT INTO `status_mobil` (`id`, `nama`, `divisi`, `catatan`, `status`, `transportasi_id`, `update_at`) VALUES
(1, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 1, '2022-03-27 11:27:22'),
(2, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 2, '2022-03-27 11:33:32'),
(3, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 3, '2022-03-28 09:06:09'),
(4, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 4, '2022-03-29 01:40:39'),
(5, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 5, '2022-03-29 01:46:03'),
(7, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 6, '2022-03-29 04:51:47'),
(8, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 7, '2022-09-03 21:45:25'),
(9, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '', 'Sudah dikembalikan', 12, '2022-09-11 10:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
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
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id`, `nama`, `divisi`, `mobil_id`, `tujuan`, `keperluan`, `tgl_pakai`, `tgl_kembali`, `jam_pakai`, `jam_kembali`, `pemeriksa`, `ttd_avp`, `ttd_pemeriksa`, `status`, `tanggal`, `file`, `user_id`, `created_at`) VALUES
(2, 'Efrizal', 'SDM', 2, 'GBK', 'Lari pagi', '2022-03-27', '2022-03-27', '10:28:00', '10:28:00', 'AVP Operasional & Pengelolaan Informasi Aset', 'Tidak Disetujui', 'Belum Disetujui', 'Sudah dikembalikan', '2022-03-27', 'Tidak ada', 5, '2022-09-12 16:30:52'),
(4, 'tes edit lagi', 'tes edit', 1, 'tujuan', 'keperluan', '2022-03-28', '2022-03-28', '22:33:00', '22:33:00', 'AVP Strategi & Sinergi Aset', 'Disetujui', 'Belum Disetujui', 'Sudah dikembalikan', '2022-03-28', 'Tidak ada', 5, '2022-09-12 16:30:52'),
(5, 'status', 'divisi', 1, 'status', 'sksksks', '2022-03-29', '2022-03-29', '13:45:00', '13:45:00', 'AVP Strategi & Sinergi Aset', 'Tidak Disetujui', 'Belum Disetujui', 'Sudah dikembalikan', '2022-03-29', 'Tidak ada', 5, '2022-09-12 16:30:52'),
(7, 'update', 'testingasdasd', 2, 'testingddddd', 'testingddddd', '2022-04-03', '2022-04-03', '08:01:00', '15:34:00', 'AVP Pengembangan Usaha & Portofolio', 'Disetujui', 'Belum Disetujui', 'Sudah dikembalikan', '2022-04-03', 'Tidak ada', 1, '2022-09-12 16:30:52'),
(8, 'asd', 'Pelayanan Strategis SDM & Umum', 2, 'asd', 'asd', '2022-09-04', '2022-09-04', '13:26:00', '13:26:00', 'AVP Pelayanan Strategis SDM & Umum', 'Disetujui', 'Belum Disetujui', 'Sudah dikembalikan', '2022-09-04', 'Tidak ada', 10, '2022-09-12 16:30:52'),
(10, 'tes event', 'Optimalisasi & Komersial Aset', 4, 'dasdsa', 'asdawas', '2022-09-05', '2022-09-05', '17:10:00', '17:11:00', 'AVP Optimalisasi & Komersialisasi Aset', 'Belum Disetujui', 'Belum Disetujui', 'Sudah dikembalikan', '2022-09-05', 'Tidak ada', 10, '2022-09-12 16:30:52'),
(12, 'tambah', 'Anggaran', 4, 'aksjd', 'askdj', '2022-09-11', '2022-09-11', '22:04:00', '22:04:00', 'AVP Akuntansi', 'Belum Disetujui', 'Belum Disetujui', 'Sudah dikembalikan', '2022-09-11', 'Tidak ada', 10, '2022-09-12 16:30:52'),
(16, 'achmad', 'Optimalisasi & Komersial Aset', 1, 'dasdas', 'asdasd', '2021-07-10', '2021-07-10', '20:00:00', '20:01:00', 'AVP Pendukung Direksi & Kesekretariatan', 'Belum Disetujui', 'Belum Disetujui', 'Belum Dikembalikan', '2021-07-11', 'Tidak ada', 12, '2022-09-12 16:30:52');

--
-- Triggers `transportasi`
--
DELIMITER $$
CREATE TRIGGER `aft_upd_status_transportasi_kmbl` AFTER UPDATE ON `transportasi` FOR EACH ROW UPDATE mobil SET mobil.status = 'Tersedia' WHERE mobil.id = old.mobil_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `aft_upd_transportasi` AFTER UPDATE ON `transportasi` FOR EACH ROW begin
insert into log_app_transportasi (transportasi_id,user_id,pemeriksa,ttd_avp,ttd_pemeriksa,created_at)
values (old.id,old.user_id,old.pemeriksa,new.ttd_avp,new.ttd_pemeriksa,now());
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `name`, `divisi`, `password`, `role_id`, `date_created`) VALUES
(10, 121, 'Muhajir', 'Pelayanan Strategis SDM & Umum', '$2y$10$R7YAyw.iTS4j4tiDegI/4ehRIW8J1hMdXqpliLHVyNB1XjvXFNv86', 1, '2022-04-04 10:54:53'),
(12, 123, 'Achmad Mashuri', 'Pelayanan Strategis SDM & Umum', '$2y$10$iZMwGcTbCnxAbx7Envy3AebuqYodLQJWjohJhg1z07tvrWd788nOK', 3, '2022-04-04 10:56:30'),
(13, 124, 'Masayu Olivia Nurjanah', 'Pelayanan Strategis SDM & Umum', '$2y$10$nzwPFMBakt2xaX/4bCXXCuLugijzxV/xmzXc6ZjYpJHCDmNCwpvdO', 4, '2022-04-04 10:57:09'),
(15, 122, 'Nani Indriyani', 'Optimalisasi & Komersial Aset', '$2y$10$Q4C1nfM86uQmcih2fEOgeOMtK/eg9qj2iUbaDeW7tfHowa3RMEzIS', 2, '2022-09-12 11:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
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
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_app_maintenance`
--
ALTER TABLE `log_app_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_app_transportasi`
--
ALTER TABLE `log_app_transportasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksa`
--
ALTER TABLE `pemeriksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_mobil`
--
ALTER TABLE `status_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_app_maintenance`
--
ALTER TABLE `log_app_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `log_app_transportasi`
--
ALTER TABLE `log_app_transportasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemeriksa`
--
ALTER TABLE `pemeriksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status_mobil`
--
ALTER TABLE `status_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_status_mobil` ON SCHEDULE EVERY 1 DAY STARTS '2022-09-01 14:35:01' ENDS '2024-02-29 14:35:01' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE transportasi
SET transportasi.status = 'Sudah dikembalikan'
WHERE transportasi.tgl_kembali < CURRENT_DATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
