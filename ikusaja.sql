-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2021 at 04:54 AM
-- Server version: 10.5.5-MariaDB-log
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikusaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kinerja`
--

CREATE TABLE `bidang_kinerja` (
  `id_bidang` bigint(20) NOT NULL,
  `nama_bidang` varchar(255) DEFAULT NULL,
  `kode_bidang` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_kinerja`
--

INSERT INTO `bidang_kinerja` (`id_bidang`, `nama_bidang`, `kode_bidang`) VALUES
(1, 'Pendidikan', 'A'),
(2, 'Penelitian', 'B'),
(3, 'Inovasi', 'C'),
(4, 'Pengabdian Masyarakat', 'D'),
(5, 'Sumber Daya Manusia', 'E'),
(6, 'Sarana dan Prasarana', 'F'),
(7, 'Keuangan', 'G'),
(8, 'Tata Kelola', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_kinerja`
--

CREATE TABLE `evaluasi_kinerja` (
  `id_ek` int(11) NOT NULL,
  `id_ik` bigint(20) DEFAULT NULL,
  `baseline` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `realisasi` varchar(255) DEFAULT NULL,
  `bobot` varchar(255) DEFAULT NULL,
  `skor` varchar(255) DEFAULT NULL,
  `nilai_iku` varchar(255) DEFAULT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  `id_unit_kerja` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `sebagai_sumber_data` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi_kinerja`
--

INSERT INTO `evaluasi_kinerja` (`id_ek`, `id_ik`, `baseline`, `target`, `realisasi`, `bobot`, `skor`, `nilai_iku`, `tahun`, `id_unit_kerja`, `id_jabatan`, `sebagai_sumber_data`) VALUES
(127, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 50, 1),
(129, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 2, 208, 1),
(130, 93, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 2, 208, 1),
(131, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(132, 93, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(133, 94, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(134, 95, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(135, 96, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(136, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(137, 9, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(138, 48, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(139, 49, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(140, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(141, 51, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(142, 91, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(143, 92, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(144, 47, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(145, 29, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(146, 115, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(147, 30, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(148, 31, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(149, 32, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(150, 46, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(151, 58, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(152, 61, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(153, 97, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(154, 101, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(155, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(156, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(157, 21, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(158, 22, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(159, 23, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(160, 24, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(161, 25, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(162, 26, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(163, 27, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(164, 28, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(165, 33, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(166, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(167, 98, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(168, 99, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(169, 102, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(170, 103, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(171, 104, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(172, 105, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(173, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(174, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(175, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(176, 16, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(177, 17, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(178, 18, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(179, 19, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(180, 40, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(181, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(182, 36, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(183, 37, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(184, 39, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(185, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(186, 112, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(187, 113, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(188, 38, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(189, 41, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(190, 42, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(191, 43, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(192, 45, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(193, 110, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(194, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(195, 109, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(196, 34, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(197, 78, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(198, 86, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(199, 87, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(200, 44, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(201, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(202, 63, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(203, 64, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(204, 65, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(205, 66, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(206, 67, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(207, 68, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(208, 62, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(209, 107, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(210, 108, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(211, 72, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(212, 73, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(213, 74, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(214, 75, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(215, 76, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(216, 77, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(217, 111, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(218, 116, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(219, 117, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(220, 69, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(221, 88, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(222, 89, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(223, 118, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(224, 90, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(225, 70, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(226, 79, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(227, 80, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(228, 81, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(229, 82, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(230, 83, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(231, 84, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(232, 85, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(233, 52, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(234, 53, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(235, 54, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(236, 57, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(237, 59, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(238, 71, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(239, 55, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(240, 56, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(241, 106, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(242, 114, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(243, 119, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(244, 120, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(245, 121, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 37, 1),
(246, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 47, 1),
(247, 93, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 47, 1),
(248, 94, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 47, 1),
(249, 9, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 1, 50, 1),
(250, 94, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 2, 208, 1);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_kinerja`
--

CREATE TABLE `indikator_kinerja` (
  `id_ik` bigint(20) NOT NULL,
  `kode_iku` varchar(5) NOT NULL,
  `nama_ik` varchar(255) DEFAULT NULL,
  `id_ss` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_kinerja`
--

INSERT INTO `indikator_kinerja` (`id_ik`, `kode_iku`, `nama_ik`, `id_ss`) VALUES
(5, 'A1.1', 'Jumlah Peminat', 5),
(8, 'A1.2', 'Jumlah Mahasiswa baru yang diterima', 5),
(9, 'A1.3', 'Jumlah Daya Tampung', 5),
(10, 'C3.1', 'Jumlah penelitian/riset mahasiswa yang bekerja sama dengan lembaga pemerintah dan DUDI', 15),
(11, 'A4.1', 'Rata-rata lama studi D3', 8),
(12, 'A4.2', 'Rata-rata lama studi D4', 8),
(13, 'A4.3', 'Rata-rata lama studi S1', 8),
(14, 'A4.4', 'Rata-rata Lama Studi S2', 8),
(15, 'A4.5', 'Rata-rata Lama Studi S3', 8),
(16, 'A4.6', 'Rata-rata Lama Studi Profesi', 8),
(17, 'A4.7', 'Rata- rata indeks prestasi kumulatif D3', 8),
(18, 'A4.8', 'Rata- rata indeks prestasi kumulatif D4', 8),
(19, 'A4.9', 'Rata- rata indeks prestasi kumulatif S1', 8),
(20, 'A4.10', 'Rata- rata indeks prestasi kumulatif Profesi', 8),
(21, 'A4.11', 'Rata- rata indeks prestasi kumulatif S2', 8),
(22, 'A4.12', 'Rata- rata indeks prestasi kumulatif S3', 8),
(23, 'A4.13', 'Rata-rata lama penyelesaiannya Tugas Akhir S1', 8),
(24, 'A4.14', 'Rata-rata lama penyelesaiannya Tugas Akhir S2', 8),
(25, 'A4.15', 'Rata-rata lama penyelesaiannya Tugas Akhir S3', 8),
(26, 'A4.16', 'Persentase lulusan dengan IPK 3.25 dan tepat waktu Program Sarjana', 8),
(27, 'A4.17', 'Persentase lulusan dengan IPK 3.25 dan tepat waktu Program Magister', 8),
(28, 'A4.18', 'Persentase lulusan dengan IPK 3.25 dan tepat waktu Program Doktor', 8),
(29, 'A3.1', 'Persentase lulusan dengan skor TOEFL (PBT) minimal 450 untuk Program Sarjana', 7),
(30, 'A3.2', 'Persentase lulusan dengan skor TOEFL (PBT) minimal 450 untuk Program Magister', 7),
(31, 'A3.3', 'Persentase lulusan dengan skor TOEFL (PBT) minimal 450 untuk Program Doktor', 8),
(32, 'A3.4', 'Persentase mahasiswa menghabiskan paling sedikit 20 SKS di Luar Kampus PT Sendiri', 7),
(33, 'A4.19', 'Persentase tersedianya database akademik yang terintegrasi', 8),
(34, 'E1.1', 'Persentase dosen berkegiatan Tridharma  di kampus lain (dalam dan luar negeri QS100 by subject)', 19),
(35, 'B2.1', 'Jumlah publikasi pada jurnal terakreditasi nasional', 10),
(36, 'B2.2', 'Jumlah jurnal terakreditasi nasional yang dimiliki', 10),
(37, 'B2.3', 'Jumlah jurnal terindeks Scopus/WoS', 10),
(38, 'C2.1', 'Jumlah Hak Kekayaan Intelektual (HKI) (Paten, Hak Cipta) per dosen', 14),
(39, 'B2.4', 'Jumlah Sitasi Per dosen', 10),
(40, 'B1.1', 'Jumlah riset/penelitian yang dilaksanakan', 11),
(41, 'C2.2', 'Jumlah produk inovasi', 14),
(42, 'C2.3', 'Jumlah keluaran penelitian  yang berhasil mendapat rekognisi internasional atau diterapkan oleh masyarakat per jumlah dosen', 14),
(43, 'C2.4', 'Jumlah pengabdian kepada masyarakat yang berhasil mendapat rekognisi internasional atau diterapkan oleh masyarakat', 14),
(44, 'E1.2', 'Persentase dosen yang mengikuti forum ilmiah tingkat internasional', 19),
(45, 'C2.5', 'Jumlah prototipe industri', 14),
(46, 'A3.5', 'Persentase mata kuliah S1 dan D4/D3 yang menggunakan metode pembelajaran pemecahan kasus (case method) atau pembelajaran kelompok berbasis projek (team based project) sebagai bobot evaluasi', 7),
(47, 'A2.1', 'Persentase program studi S1 dan D4/D3 yang memiliki akreditasi atau sertifikat internasional yang diakui pemerintah.', 6),
(48, 'A1.4', 'Persentase program studi terakreditasi A', 5),
(49, 'A1.5', 'Jumlah program studi terakreditasi A', 5),
(50, 'A1.6', 'Persentase program studi terakreditasi B', 5),
(51, 'A1.7', 'Jumlah program studi terakreditasi B', 5),
(52, 'H1.1', 'Jumlah jurnal nasional terakreditasi yang dilanggan', 25),
(53, 'H1.2', 'Jumlah jurnal internasional terakreditasi yang dilanggan', 25),
(54, 'H1.3', 'Jumlah koleksi buku di perpustakaan', 25),
(55, 'H2.1', 'Jumlah koleksi e-book di perpustakaan', 26),
(56, 'H2.2', 'Ketersediaan e-library', 26),
(57, 'H1.4', 'Jumlah usulan kebijakan yang diterbitkan mengenai sistem pendidikan dan pengajaran', 25),
(58, 'A3.6', 'Jumlah Mata kuliah dengan pembelajaran daring/blended learning', 7),
(59, 'H1.5', 'Kelengkapan laporan PDDIKTI', 25),
(60, 'E1.3', 'Rasio jumlah dosen terhadap jumlah mahasiswa', 19),
(61, 'A3.7', 'Jumlah program studi yang menerapkan kurikulum Merdeka Belajar Kampus Merdeka', 7),
(62, 'E2.1', 'Indeks Kepuasan Layanan Masyarakat', 20),
(63, 'E1.4', 'Persentase dosen tetap yang berkualifikasi S3', 19),
(64, 'E1.5', 'Jumlah dosen tetap yang berkualifikasi S3', 19),
(65, 'E1.6', 'Persentase dosen tetap yang memiliki sertifikat kompetensi', 19),
(66, 'E1.7', 'Persentase dosen yang bersertifikasi pendidik', 19),
(67, 'E1.8', 'Persentase dosen dalam jabatan lektor kepala dan guru besar', 19),
(68, 'E1.9', 'Persentase jumlah dosen PNS bergelar Doktor dibandingkan dengan total jumlah dosen', 19),
(69, 'G2.1', 'Persentase kepatuhan terhadap penyampaian laporan kegiatan dan pelaksanaan anggaran', 24),
(70, 'G2.2', 'Persentase ketercapaian volume output dalam RKAKL', 24),
(71, 'H1.6', 'Jumlah POS (Prosedur Operasional Standar) yang dihasilkan', 25),
(72, 'F2.1', 'Jumlah ruang kuliah yang dalam kondisi baik (memenuhi standar)', 22),
(73, 'F2.2', 'Jumlah laboratorium dengan sarana prasarana memenuhi standar', 22),
(74, 'F2.3', 'Rasio luas ruang kerja dosen', 22),
(75, 'F2.4', 'Rasio luas ruang baca dengan jumlah pemustaka', 22),
(76, 'F2.5', 'Jumlah sarana dan prasarana untuk civitas akademika berkebutuhan khusus yang memenuhi standar (difabel, laktasi, penitipan anak)', 22),
(77, 'F2.6', 'Rasio luas ruang ibadah dengan civitas akademika', 22),
(78, 'E1.10', 'Jumlah tenaga kependidikan yang tersertifikasi (laboran, pustakawan, dan arsiparis)', 19),
(79, 'G2.3', 'Persentase capaian kinerja anggaran dalam aplikasi yang tersedia', 23),
(80, 'G2.4', 'Persentase penurunan nominal temuan audit BPK', 24),
(81, 'G2.5', 'Persentase peningkatan target PNBP', 24),
(82, 'G2.6', 'Persentase tersedianya pedoman penatalaksanaan dan pelaporan keuangan, akuntansi, dan aset yang terintegrasi', 24),
(83, 'G2.7', 'Persentase tersedianya pedoman perencanaan dan penganggaran yang terintegrasi', 24),
(84, 'G2.8', 'Persentase tersedianya pedoman penatalaksanaan dan manajemen aset yang terintegrasi', 24),
(85, 'G2.9', 'Persentase penyelesaian modernisasi pengelolaan keuangan BLU', 24),
(86, 'E1.11', 'Jumlah tenaga kependidikan penerima beasiswa S2', 19),
(87, 'E1.12', 'Persentase jumlah tenaga kependidikan PNS yang mengikuti diklat pengembangan', 19),
(88, 'G2.10', 'Jumlah nominal realisasi PNBP BLU', 24),
(89, 'G2.11', 'Persentase PNBP BLU yang digunakan untuk Belanja Operasional', 24),
(90, 'G2.12', 'Persentase kepatuhan terhadap penyampaian laporan kegiatan dan pelaksanaan anggaran', 24),
(91, 'A1.8', 'Jumlah mahasiswa 3T', 5),
(92, 'A1.9', 'Jumlah mahasiswa asing', 5),
(93, 'A1.10', 'Jumlah mahasiswa penerima bidik misi', 5),
(94, 'A1.11', 'Jumlah mahasiswa peserta KIP', 5),
(95, 'A1.12', 'Jumlah mahasiswa penerima beasiswa prestasi dan akademik', 5),
(96, 'A1.13', 'Jumlah mahasiswa penerima beasiswa tahfidz Qur\'an', 5),
(97, 'A3.8', 'Jumlah program kepada masyarakat yang dilakukan mahasiswa (PHP2D, desa wisata dan yang terkait, PPM yang dilakukan dosen melibatkan mahasiswa)', 7),
(98, 'A4.20', 'Persentase tingkat penurunan jumlah kasus pelanggaran kode etik mahasiswa', 8),
(99, 'A4.21', 'Persentase mahasiswa peraih prestasi paling rendah tingkat nasional', 8),
(100, 'C1.1', 'Jumlah mahasiswa yang berwirausaha', 13),
(101, 'A3.9', 'Jumlah stadium generale', 7),
(102, 'A4.22', 'Persentase lulusan mendapatkan pekerjaan kurang dari 6 bulan', 8),
(103, 'A4.23', 'Persentase lulusan melanjutkan studi', 8),
(104, 'A4.24', 'Persentase lulusan yang menjadi wiraswasta', 8),
(105, 'A4.25', 'Jumlah usulan kebijakan yang diterbitkan mengenai kemahasiswaan dan alumni', 8),
(106, 'H2.3', 'Persentase tersedianya database kemahasiswaan dan alumni yang terintegrasi', 26),
(107, 'E2.2', 'Indeks Kepuasan Pemberi Kerja', 19),
(108, 'E2.3', 'Persentase dosen sebagai pembina kompetisi mahasiswa yang berprestasi minimal tingkat nasional', 20),
(109, 'C3.1', 'Jumlah mahasiswa yang mengikuti pemagangan ke DUDI', 15),
(110, 'C2.6', 'Persentase dosen tetap yang berasal praktisi professional atau DUDI', 14),
(111, 'G1.1', 'Jumlah kemitraan dalam pendanaan PT dalam pemerintah dan industri (DUDI) yang relevan dengan masing-masing program studi', 23),
(112, 'C1.2', 'Jumlah MoU dengan lembaga internasional', 15),
(113, 'C1.3', 'Jumlah usulan kebijakan yang diterbitkan mengenai kerjasama dan kelembagaan', 15),
(114, 'H2.4', 'Persentase tersedianya database kerjasama yang terintegrasi dengan pihak eksternal', 26),
(115, 'A3.10', 'Persentase program studi S1 dan D4/D3 yang melaksanakan kerjasama dengan mitra', 7),
(116, 'G1.2', 'Ketersediaan rencana pengembangan/Renstra/RKT', 23),
(117, 'G1.3', 'Jumlah kemitraan dalam pendanaan Perguruan Tinggi dalam pemerintah dan industri', 23),
(118, 'G2.12', 'Persentase tersedianya pedoman perencanaan dan penganggaran yang terintegrasi', 24),
(119, 'H2.5', 'Manajemen dashboard terpadu', 26),
(120, 'H2.6', 'Proses bisnis bidang akademik berbasis IT', 26),
(121, 'H2.7', 'Proses bisnis bidang pendukung akademik berbasis IT', 26);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `queue` varchar(254) DEFAULT NULL,
  `payload` text DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `reserved_at` int(11) DEFAULT NULL,
  `available_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(887, 'default', '{\"displayName\":\"App\\\\Jobs\\\\KirimEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":5,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\KirimEmail\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\KirimEmail\\\":9:{s:4:\\\"data\\\";a:8:{s:8:\\\"username\\\";s:12:\\\"120131270676\\\";s:8:\\\"password\\\";s:3:\\\"123\\\";s:14:\\\"nama_mahasiswa\\\";s:14:\\\"Lailatul Husna\\\";s:8:\\\"angkatan\\\";s:4:\\\"2020\\\";s:11:\\\"prodi_lulus\\\";s:17:\\\"Sistem Informasi \\\";s:5:\\\"email\\\";s:23:\\\"lailahusna042@gmail.com\\\";s:24:\\\"tanggal_mulai_registrasi\\\";s:15:\\\"16 Agustus 2020\\\";s:24:\\\"tanggal_tutup_registrasi\\\";s:15:\\\"20 Agustus 2020\\\";}s:5:\\\"tries\\\";i:5;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1597570798, 1597570798),
(888, 'default', '{\"displayName\":\"App\\\\Jobs\\\\KirimEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":5,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\KirimEmail\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\KirimEmail\\\":9:{s:4:\\\"data\\\";a:8:{s:8:\\\"username\\\";s:12:\\\"120151230165\\\";s:8:\\\"password\\\";s:3:\\\"123\\\";s:14:\\\"nama_mahasiswa\\\";s:7:\\\"Harpeni\\\";s:8:\\\"angkatan\\\";s:4:\\\"2020\\\";s:11:\\\"prodi_lulus\\\";s:14:\\\"Ekonomi Islam \\\";s:5:\\\"email\\\";s:22:\\\"nismaharpeni@gmail.com\\\";s:24:\\\"tanggal_mulai_registrasi\\\";s:15:\\\"16 Agustus 2020\\\";s:24:\\\"tanggal_tutup_registrasi\\\";s:15:\\\"20 Agustus 2020\\\";}s:5:\\\"tries\\\";i:5;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1597604725, 1597604725);

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log_aktivitas` int(11) NOT NULL,
  `id_pelaku` varchar(45) DEFAULT NULL,
  `nama_pelaku` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `aktifitas` text DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(45) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `id_html` varchar(45) DEFAULT NULL,
  `parent_id` varchar(45) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tipe_menu` enum('admin','front') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id_menu`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`, `tipe_menu`) VALUES
(1, 'MENU DEVELOPER', '#', NULL, NULL, '0', 2, 'admin'),
(2, 'User Role Menu', '#', 'glyphicon glyphicon-tags', NULL, '1', 21, 'admin'),
(3, 'Kelola User', 'admin/manage-user', '', NULL, '2', 211, 'admin'),
(4, 'Kelola Role', 'admin/manage-role', NULL, NULL, '2', 212, 'admin'),
(5, 'Kelola Menu', 'admin/manage-menu', NULL, NULL, '2', 213, 'admin'),
(7, 'MENU UTAMA', '#', NULL, NULL, '0', 1, 'admin'),
(8, 'Dashboard', 'admin/dashboard', 'fa fa-desktop', NULL, '7', 11, 'admin'),
(25, 'Setting Carousel', 'admin/setting-carousel', NULL, NULL, '24', 221, 'admin'),
(47, 'Manajemen Artikel', 'admin/manajemen-artikel', NULL, NULL, '46', 161, 'admin'),
(49, 'Setting Tampilan Home', 'admin/setting-konten-statis', NULL, NULL, '46', 223, 'admin'),
(61, 'Log Aktivitas', 'admin/log-aktivitas', 'fa fa-history', NULL, '1', 18, 'admin'),
(66, 'File Manager', 'admin/file-manager', NULL, NULL, '46', NULL, 'admin'),
(79, 'Manajemen Kegiatan', 'admin/manajemen-kegiatan', NULL, NULL, '78', NULL, 'admin'),
(80, 'Bidang Kerja', 'admin/bidang', 'fa fa-suitcase', NULL, '7', 12, 'admin'),
(81, 'Sasaran Strategis', 'admin/sasaran-strategis', 'fa fa-line-chart', NULL, '7', 13, 'admin'),
(82, 'Indikator Kinerja', 'admin/indikator-kinerja', 'fa fa-bar-chart', NULL, '7', 14, 'admin'),
(83, 'Evaluasi Kinerja', 'admin/evaluasi-kinerja', 'fa fa-book', NULL, '7', 15, 'admin'),
(84, 'Setup Jabatan IKU', 'admin/setup-jabatan-indikator-kinerja', NULL, NULL, '2', NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `parent_evaluasi_kinerja`
--

CREATE TABLE `parent_evaluasi_kinerja` (
  `id_parent_evaluasi_kinerja` int(11) NOT NULL,
  `id_ek` int(11) DEFAULT NULL,
  `id_parent_ek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_evaluasi_kinerja`
--

INSERT INTO `parent_evaluasi_kinerja` (`id_parent_evaluasi_kinerja`, `id_ek`, `id_parent_ek`) VALUES
(36, 246, 131),
(37, 247, 132),
(38, 248, 133),
(39, 249, 137),
(40, 127, 131),
(41, 129, 246),
(42, 129, 127);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id_permission` int(11) NOT NULL,
  `permission` varchar(45) DEFAULT NULL,
  `keterangan_permission` varchar(100) DEFAULT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `permission`, `keterangan_permission`, `menu_id`) VALUES
(1, 'read-user', 'Membaca data user aplikasi', 3),
(2, 'update-user', 'Memperbaharui data user', 3),
(3, 'delete-user', 'Menghapus data user', 3),
(4, 'create-user', 'Menambah data user', 3),
(6, 'read-dashboard-admin', 'Membaca dashboard admin', 8),
(7, 'read-role', 'Menambah Role', 4),
(8, 'update-role', 'Merubah role', 4),
(9, 'create-role', 'Menambah data role', 4),
(10, 'delete-role', 'Menghapus data role', 4),
(52, 'create-info-pendaftaran', 'Membaca info pendaftaran', 47),
(53, 'read-info-pendaftaran', 'Membaca info pendaftaran', 47),
(54, 'update-info-pendaftaran', 'Merubah info pendaftaran', 47),
(55, 'delete-info-pendaftaran', 'Menghapus info pendaftaran', 47),
(74, 'read-file-manager', 'Membaca arsip file', 66),
(75, 'create-file-manager', 'Menambah arsip file', 66),
(76, 'update-file-manager', 'Merubah arsip file', 66),
(77, 'delete-file-manager', 'Menghapus arsip file', 66),
(86, 'create-kegiatan', 'Menambah kegiatan', 79),
(87, 'update-kegiatan', 'Meerubah atau memperbaharui kegiatan', 79),
(88, 'read-kegiatan', 'Membaca  kegiatan', 79),
(89, 'delete-kegiatan', 'Menghapus kegiatan', 79),
(90, 'validasi-kegiatan', 'Memvalidasi Kegiatan', 79),
(95, 'ekport-excel', 'Mengkspor datas user ke excel', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(100) DEFAULT NULL,
  `keterangan_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `nama_role`, `keterangan_role`) VALUES
(1, 'Developer', 'Mengelola Seluruh Sistem'),
(9, 'Pejabat', 'Pejabat'),
(10, 'Operator', 'Melakukan Proses Pengiputan'),
(11, 'Monitor Sirado', 'Memonitor aplikasi sirado');

-- --------------------------------------------------------

--
-- Table structure for table `roles_has_menus`
--

CREATE TABLE `roles_has_menus` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_has_menus`
--

INSERT INTO `roles_has_menus` (`role_id`, `menu_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 61),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(9, 7),
(9, 8),
(10, 7),
(10, 8),
(11, 7),
(11, 8),
(11, 79);

-- --------------------------------------------------------

--
-- Table structure for table `roles_has_permissions`
--

CREATE TABLE `roles_has_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_has_permissions`
--

INSERT INTO `roles_has_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 95),
(9, 6),
(10, 6),
(11, 6),
(11, 88);

-- --------------------------------------------------------

--
-- Table structure for table `sasaran_strategis`
--

CREATE TABLE `sasaran_strategis` (
  `id_ss` bigint(20) NOT NULL,
  `kode_ss` varchar(3) DEFAULT NULL,
  `nama_ss` varchar(255) DEFAULT NULL,
  `id_bidang` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sasaran_strategis`
--

INSERT INTO `sasaran_strategis` (`id_ss`, `kode_ss`, `nama_ss`, `id_bidang`) VALUES
(5, 'A1', 'Meningkatnya Akses Pendidikan Tinggi di Universitas Jambi', 1),
(6, 'A2', 'Berkembangnya Program Pendidikan Tinggi Unggulan', 1),
(7, 'A3', 'Berkembangnya Program Pendidikan Tinggi yang Inovatif', 1),
(8, 'A4', 'Meningkatnya Kualitas Pendidikan Tinggi', 1),
(10, 'B2', 'Menguatnya Entitas Penelitian', 2),
(11, 'B1', 'Menguatnya Kepakaran Peneliti Lintas Disiplin', 2),
(13, 'C1', 'Berkembangnya Jiwa Entrepreneurship', 3),
(14, 'C2', 'Meningkatnya Jumlah Produk Inovasi dan Hak atas Kekayaan Intelektual', 3),
(15, 'C3', 'Berkembangnya Ekosistem Inovasi', 3),
(16, 'D3', 'Meningkatnya Kegiatan Pengabdian kepada Masyarakat', 4),
(17, 'D2', 'Berdayanya Masyarakat yang Berkearifan Lokal', 4),
(18, 'D1', 'Meningkatnya Jumlah Mitra Strategis untuk Penyelesaian Masalah Bangsa', 4),
(19, 'E1', 'Meningkatnya Kompetensi dan Kecukupan Dosen dan Tenaga Kependidikan', 5),
(20, 'E2', 'Menguatnya Budaya UNJA-SMART', 5),
(21, 'F1', 'Meningkatnya Jumlah dan Kualitas Peralatan Pembelajaran dan Penelitian', 6),
(22, 'F2', 'Meningkatnya Kapasitas Operasi, Pemeliharaan dan Keberlanjutan Infrastruktur untuk keberlangsungan Pembelajaran, Penelitian, Inovasi dan PkM', 6),
(23, 'G1', 'Berkembangnya Kemitraan untuk Penyelenggaraan Akademik', 7),
(24, 'G2', 'Meningkatnya Kualitas Sistem Pengelolaan Keuangan', 7),
(25, 'H1', 'Menguatnya Sistem Tata Kelola (Management Transformation)', 8),
(26, 'H2', 'Berkembangnya Sistem Informasi Terpadu (Technology for Digital Transformation)', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_akun` enum('aktif','tidak_aktif') DEFAULT 'tidak_aktif',
  `jenis_akun` enum('admin','nonadmin') DEFAULT 'nonadmin',
  `ganti_password` int(1) NOT NULL DEFAULT 1 COMMENT '1 = harus ganti, 0 = tidak perlu ganti',
  `email` varchar(100) DEFAULT NULL,
  `level_akun` varchar(20) NOT NULL DEFAULT '0' COMMENT '0, univ, 1 fakultas, 2 jurusan/bagian, 3 prodi',
  `password_teks` varchar(255) DEFAULT NULL,
  `admin_beasiswa` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nip`, `password`, `remember_token`, `created_at`, `updated_at`, `status_akun`, `jenis_akun`, `ganti_password`, `email`, `level_akun`, `password_teks`, `admin_beasiswa`) VALUES
(15, '196307261989031002', '196307261989031002', NULL, NULL, '2020-11-27 13:00:58', '2021-01-04 09:49:14', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(50, '196510011994021001', '196510011994021001', NULL, 'JjOpgxAw4tVA1YaF8EWKhkbky45BKRI5nKkEVA7ibyZXCeXdJ20JmuFxZeb6', '2020-12-01 02:46:10', '2020-12-02 05:27:49', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(61, '196308141989031005', '196308141989031005', NULL, '5AwLG0UHHOnDTxInTQwWUnsJx6c2ud2C8jCLkTYJqAeSq09A7Hsfpc6Ca76b', '2020-11-27 06:41:37', '2020-11-27 06:41:37', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(106, '197605212009121002', '197605212009121002', NULL, 'R4TyvsrsqlFj1Yv9EGgtAhDLuIlldyMDG1z4A4FbIzsk5FPVwC3uwUuKYcBu', '2020-11-26 01:37:46', '2020-11-26 11:26:14', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(124, '196601311988031001', '196601311988031001', NULL, NULL, '2020-12-01 02:46:07', '2020-12-01 03:14:29', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(170, '198204192001122003', '198204192001122003', NULL, 'qPXwkbdWtfdzkkQBGwsg0so6pRG18HVYvOwPgLCywCCJ5PxOx2f4l1WUGWcw', '2020-11-27 06:42:43', '2020-12-02 03:25:10', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(304, '20051013', '20051013', NULL, 'AwSxOLu2sRB5RqW8rYs6g8NfBjEYMCXUejQytczCyDixRwCeWPZkaON1nMpw', '2020-11-26 02:08:46', '2020-11-26 02:08:46', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(312, '20072002', '20072002', NULL, NULL, '2020-12-08 02:04:03', '2020-12-08 02:04:03', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(323, '20081016', '20081016', NULL, 'HXV0k5icAKykl2Ct93aV5OnelxYxmWswZEO4ZCNHRDUX7VmvalCufQ0HK5HF', '2020-11-25 10:00:40', '2020-11-25 10:09:53', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(384, '20122007', '20122007', NULL, NULL, '2020-12-04 02:36:09', '2020-12-04 02:36:09', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(386, '20122009', '20122009', NULL, 'MMob5nKqhlghwZ2peRZ1DxYPdhLDbpJ2POjnFWuaeunhmzi8fQIIomnegoKt', '2020-11-27 07:28:06', '2020-12-02 05:19:54', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(392, '20121037', '20121037', NULL, NULL, '2020-12-12 19:48:32', '2020-12-12 19:48:32', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(394, '20121044', '20121044', NULL, 'zIZLkSixkeHPKLbYLXRwpEiERXdF0oWx9DKV9z4s5EXW8tivetM6haihM9uh', '2020-11-26 02:07:05', '2020-11-26 02:11:46', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(403, '20122064', '20122064', NULL, 'R6hYzHwDrs4A47jJqc7ImEnGRdocIVPO1msb9TmAZr1OZx8cwHviPfQeb23m', '2020-11-26 10:34:36', '2020-11-26 10:34:36', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(405, '20122060', '20122060', NULL, NULL, '2020-12-10 08:08:32', '2020-12-10 08:08:32', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(423, '20131033', '20131033', NULL, NULL, '2020-12-17 06:43:43', '2020-12-17 06:45:38', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(435, '20131052', '20131052', NULL, 'WTDsGxsuQElALNowJnQy0pyY4S5OozNjB8jK7cdaQNmrWycgXSZaUbGIPpyg', '2020-12-08 02:06:56', '2020-12-08 02:06:56', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(441, '20131062', '20131062', NULL, 'x9B6dV0KNMwftyvBVUZdm8CnCTshLVWnp6DCUmmOOr7HUrQe3WK53uYtJF0V', '2020-11-25 10:04:43', '2020-11-25 10:11:16', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(452, '20131083', '20131083', NULL, 'VYqhMXYPN7XaHOhtMLx5M6QWteSRJaKikQHK8PYYB2GUKBDRAucBu6K8Vu6g', '2020-11-24 14:28:20', '2020-11-24 14:28:20', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(457, '20132091', '20132091', NULL, 'o2WmSSrQsmAilwuHP1qavbsSDpNBGsaiWFbN6qIxVM0rNDAoPoxcvma3LJjS', '2020-12-08 05:54:41', '2020-12-10 08:41:22', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(518, '20142068', '20142068', NULL, NULL, '2020-12-10 05:49:54', '2020-12-10 05:49:54', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(520, '20142072', '20142072', NULL, NULL, '2020-12-08 02:02:44', '2020-12-08 02:02:44', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(522, '20142079', '20142079', NULL, 'Rt5bPgCN6Z3dnKx93kZnapW7rcBtNByYtg8eQj97cXaOTUxaJIVxJ0H3TnV3', '2020-12-08 02:05:17', '2020-12-08 02:05:17', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(526, '20142086', '20142086', NULL, 'EL4HBiPqlvzJGpBnXEfuQ9jajESzJMru9QDFlvTAJ0xhOG3L37eOuoi43v6s', '2020-11-25 09:57:07', '2020-11-25 09:57:07', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(563, '20141146', '20141146', NULL, 'A24KTQktXj292jxbS2m3eTTkDn1hrjlphBBVGOSl0NcOCesp9vjUGlQCWREf', '2020-11-26 10:35:35', '2020-11-26 10:35:35', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(578, '20141176', '20141176', NULL, NULL, '2020-11-27 07:30:55', '2020-11-27 07:30:55', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(582, '20142182', '20142182', NULL, 'GfYjkQLx2i2wEc9tC1lKVCQN8RCmqHRTkZCayNuBbaDOjWqFCHQnv6OeSgWf', '2020-12-01 04:25:07', '2020-12-02 05:19:23', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(584, '20141184', '20141184', NULL, 'sXfxUOQpYWpbbdpNr3PBhjQK4V7TLKle88Tr36vwuGkKjIyhF8WycO6nPRcZ', '2020-11-26 10:37:35', '2020-11-26 10:37:35', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(589, '20152003', '20152003', NULL, NULL, '2020-11-25 09:54:16', '2020-11-25 09:54:16', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(601, '20152022', '20152022', NULL, 'WPFEbHAlTUSEiY783ZYGlCZVqYtGVWw9qqpQJBa1w818ts4j3q7gXeJLkEh8', '2020-11-25 10:00:02', '2020-11-25 10:00:02', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(603, '20152024', '20152024', NULL, NULL, '2020-12-03 03:35:19', '2020-12-03 03:35:19', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(605, '20152026', '20152026', NULL, '5MYS5YOARPJt78zGb1GCXJypyD7n1RWySPL1UiEfRKCzyCT7KAOH4SwpBHbZ', '2020-12-02 05:20:43', '2020-12-03 08:35:57', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(614, '20152036', '20152036', NULL, 'zydu2NnK4HCN0A1YgFJf91XIWoye6qC5yHBYfN9QSwZa3La9k23GTvHlCQeG', '2020-11-24 14:26:39', '2020-11-24 14:26:39', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(616, '20152039', '20152039', NULL, NULL, '2020-12-15 03:51:03', '2020-12-15 03:51:03', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(623, '20152048', '20152048', NULL, 'htjOQ3Bbs9QibDJ4G4dnIVY4upOmhANXbVIxihzcIw0qnA9N4D0Aftp3JoCP', '2020-11-25 10:01:17', '2020-11-25 10:01:17', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(646, '20152085', '20152085', NULL, 'b5RVsf31xw69FcrDrJK1RuKSBdp3TJTSTe8D0P80OATfppxe7AgfPuxA5vzT', '2020-11-25 09:55:08', '2020-11-25 09:55:08', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(661, '20152105', '20152105', NULL, 'AsCPRGm2GrVLsO5Ajmf9wWlguB0RTBpshGR5TIqV13GEAF0AdLlcnhX3ncLz', '2020-11-26 10:36:38', '2020-11-26 10:36:38', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(663, '20151107', '20151107', NULL, NULL, '2020-12-01 07:07:55', '2020-12-01 07:07:55', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(685, '20162010', '20162010', NULL, NULL, '2020-12-08 06:38:11', '2020-12-08 06:38:11', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(696, '20162024', '20162024', NULL, 'xapImYInLcmo0xBQMjBX8bGRxI1tWf2aHLcSjCpBwuV4VaWlyYIt5ebvXx7E', '2020-11-27 06:47:25', '2020-11-27 06:47:25', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(707, '20162039', '20162039', NULL, NULL, '2020-12-01 02:19:50', '2020-12-02 08:07:50', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(732, '20162090', '20162090', NULL, 'R5PiyuI2vLso52IY61J8vZr3JIa7Q2GUWxRCcwQKs6fhGCn65xZwkJeIy5b3', '2020-11-25 09:58:01', '2020-11-25 09:58:01', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(770, '20161139', '20161139', NULL, NULL, '2020-11-27 07:27:39', '2020-12-17 06:48:28', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(779, '20161149', '20161149', NULL, NULL, '2020-11-27 07:27:53', '2020-11-27 07:27:53', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(798, '20172006', '20172006', NULL, 'dHcgFprIpFUJYsJRLr4V1J9hn53NKxMprOek61HWCTmFRKsobMyKCL6FnTjI', '2020-12-10 05:17:57', '2020-12-10 08:41:00', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(799, '20171007', '20171007', NULL, 'yZDc8F9chCc2ITeL3GYESIDDlvsa4Sgm3wSBnj9GpVeURaQstqxPqTkpONVk', '2020-11-27 06:44:13', '2020-11-27 06:44:13', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(835, '20171047', '20171047', NULL, NULL, '2020-12-10 08:41:58', '2020-12-10 08:41:58', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(849, '20171067', '20171067', NULL, 'rkdv61dpHprPFCE7d9RYmhCTUEYv46cIP4xfyCvbZLQexr5HKrcH2sBTeRiG', '2020-11-26 11:27:17', '2020-11-26 11:27:17', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(868, '20171090', '20171090', NULL, NULL, '2020-12-01 07:00:25', '2020-12-01 07:00:25', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(876, '20172099', '20172099', NULL, 'H45v6ioViG235FAaEPJBWoUzXjZjkOJiQFg8bE6BffeI1YlJhLPuPVDcxXdJ', '2020-12-02 05:22:04', '2020-12-02 05:22:04', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(878, '20172101', '20172101', NULL, NULL, '2020-12-17 05:42:44', '2020-12-17 05:42:44', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(879, '20171102', '20171102', NULL, 'ALmULyX5fkYbYRLTurIzBhegZu1ptmuTyw6DjC6BFJ18Ki7fBMn1Ya3UBykz', '2020-12-08 02:06:16', '2020-12-08 02:06:16', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(885, '20172110', '20172110', NULL, 'joddSc65BEqSiCvvgcSjKnlpdhqTUcHvJLqf50QZwIiGNsNtNnuy6fhmH9ci', '2020-12-02 05:21:32', '2020-12-02 05:21:32', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(899, '20181003', '20181003', NULL, NULL, '2020-11-27 07:18:22', '2020-11-27 07:18:22', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1030, '0024028704', '201406011010', NULL, NULL, '2020-12-04 06:39:18', '2020-12-04 06:39:18', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1040, '1610012005', '201610012005', NULL, NULL, '2020-12-06 08:56:21', '2020-12-08 15:04:51', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1046, '0007099101', '201401012014', NULL, NULL, '2020-12-07 08:38:43', '2020-12-07 08:38:43', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1068, '1609091005', '198601122019031009', NULL, 't53wZTuiCErR3WcaIRUEBmW6kOfegbcygi5kvkVOYej4CsVd6JdvrDseqgB9', '2020-12-08 04:06:52', '2020-12-08 04:06:52', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1074, '0006098405', '198409062019031006', NULL, 'nB6GM84FpNHSijNu1wUzJWvdGnzFhqZ1IFkCrOLrg1YK8DFoohG3KnnaUoZ7', '2020-11-27 07:54:46', '2020-11-27 07:54:46', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1085, '1801091008', '201801091008', NULL, NULL, '2020-12-10 07:27:05', '2020-12-10 07:27:05', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1126, '1605081001', '201605081001', NULL, NULL, '2020-12-11 04:47:45', '2020-12-11 04:47:45', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1128, '0031129002', '199012312019031017', NULL, 'ylZgrJXQuakas7KgPDZMygYvrnazWf86pYR7kcIwdtBTgyExKYXEsGmdBvc9', '2020-12-08 05:46:55', '2020-12-10 08:39:38', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1133, '0009069301', '199306092018031001', NULL, NULL, '2020-12-10 08:56:19', '2020-12-10 08:56:19', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1160, '1605051005', '201605051005', NULL, NULL, '2020-12-15 22:51:47', '2020-12-15 22:51:47', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1163, '1706052011', '201706052011', NULL, NULL, '2020-12-10 07:15:56', '2020-12-10 07:15:56', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1173, '1605051007', '201605051007', NULL, NULL, '2020-12-11 02:10:54', '2020-12-11 02:10:54', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1176, '0001088607', '198608012019032015', NULL, NULL, '2020-12-07 13:06:40', '2020-12-07 13:06:40', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1192, '1706051013', '201706051013', NULL, NULL, '2020-12-08 02:48:58', '2020-12-08 02:48:58', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1199, '0015018902', '198901152018032001', NULL, NULL, '2020-12-14 10:10:33', '2020-12-14 10:10:33', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1210, '0026089301', '199308262019032018', NULL, NULL, '2020-12-12 04:35:50', '2020-12-12 04:35:50', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1226, '0023108703', '198710232019031011', NULL, NULL, '2020-11-30 03:49:24', '2020-11-30 03:49:24', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1230, '1002028704', '198702022019031007', NULL, NULL, '2020-11-27 13:27:20', '2020-12-02 08:00:24', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1233, '0011108804', '198810112019032013', NULL, NULL, '2020-12-04 09:09:26', '2020-12-04 09:09:26', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1239, '1310088801', '198808102019032013', NULL, 'pI6M0mVYITNndxzf1O9x35PZbsJOGHkaZQtuWmGIUEJ3id8fXaomC0t1qecm', '2020-12-06 14:31:50', '2020-12-06 14:31:50', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1257, '1028108704', '198710282019031010', NULL, 'xRGWMJht1yN22aKqD37MgJlm6TfH8VljflHvAtclLIKJaeRZ1i4pQuv4Iv5U', '2020-11-10 02:19:18', '2020-11-10 02:19:18', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1268, '0229128903', '198912292019032018', NULL, 'TTdKONrWWvuKRL0yupOn1yXGgt2hDZDj7HSqSNuMS6A41QWci7hyXJ6OXpcU', '2020-12-02 08:21:42', '2020-12-02 08:21:42', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1276, '0021108905', '198910212019032015', NULL, NULL, '2020-12-06 14:00:50', '2020-12-06 14:00:50', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1283, '0019019001', '199001192019031009', NULL, NULL, '2020-12-07 16:08:24', '2020-12-07 16:08:24', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1292, '1801111002', '201801111002', NULL, NULL, '2020-12-01 22:44:32', '2020-12-01 22:44:32', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1309, '8893750017', '201609051010', NULL, NULL, '2020-12-09 04:45:01', '2020-12-09 04:45:01', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1340, '0004019302', '199301042019031014', NULL, NULL, '2020-12-04 07:51:48', '2020-12-04 07:51:48', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1356, '198106232009022003', '198106232009022003', NULL, NULL, '2020-12-07 04:52:16', '2020-12-07 04:52:16', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1362, '0020025205', '195202201979031001', NULL, NULL, '2020-12-06 08:15:39', '2020-12-06 08:15:39', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1367, '0025025801', '195802251986012002', NULL, NULL, '2020-12-01 06:58:05', '2020-12-01 06:58:05', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1368, '0016045403', '195404161986031002', NULL, NULL, '2020-12-03 08:32:59', '2020-12-03 08:32:59', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1369, '0010106209', '196210101988031002', NULL, 'BbD10xXTpiAJqzKphRKqJ57kpiamhNrryj1mPO4jegDu21D9T1vpYoRb5ZYI', '2020-12-09 05:48:11', '2020-12-09 05:48:11', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1372, '0007125404', '195412071980011001', NULL, NULL, '2020-12-07 05:26:57', '2020-12-07 05:26:57', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1373, '0009085612', '195608091984031002', NULL, NULL, '2020-12-15 10:51:04', '2020-12-15 10:51:04', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1385, '0007086304', '196308071990031002', NULL, NULL, '2020-11-27 08:01:55', '2020-11-27 08:01:55', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1388, '0001116310', '196311011989021001', NULL, NULL, '2020-12-07 03:44:35', '2020-12-07 03:44:35', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1392, '0027016903', '196901271993032003', NULL, NULL, '2020-12-14 06:33:59', '2020-12-14 06:33:59', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1393, '0021016703', '196701211993032001', NULL, NULL, '2020-12-06 14:46:10', '2020-12-06 14:46:10', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1396, '0002096009', '196009021987021002', NULL, 'qgtZxSlvn2LDFRzrUF5o4fAHBZya1qf1QD7nVdWpDiG1n0iYG50ZhjfF1j0f', '2020-12-16 06:53:15', '2020-12-16 06:53:15', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1398, '0025075903', '195907251985032003', NULL, '2gednNPr0JQq3N0WiBHK2qFepDtLK8wUEcM8UmXHymQr9MYoeloJDlIgo9wa', '2020-12-11 10:04:35', '2020-12-11 10:04:35', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1405, '0001065904', '195906011991021001', NULL, NULL, '2020-12-01 00:38:08', '2020-12-01 00:38:08', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1407, '0007096309', '196309071989021002', NULL, NULL, '2020-12-07 13:05:35', '2020-12-07 13:05:35', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1418, '0022065908', '195906221985031002', NULL, NULL, '2020-12-04 03:22:50', '2020-12-04 03:22:50', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1420, '0018116004', '196011181985031002', NULL, NULL, '2020-12-04 03:21:04', '2020-12-04 03:21:04', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1422, '0006116305', '196311061988031004', NULL, NULL, '2020-12-07 02:06:38', '2020-12-07 02:06:38', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1425, '0027075905', '195907271987011002', NULL, NULL, '2020-12-07 03:23:14', '2020-12-07 03:23:14', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1426, '0001036605', '196603011990032002', NULL, NULL, '2020-12-05 13:10:51', '2020-12-05 13:10:51', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1440, '0013046501', '196504131993031002', NULL, 'T9nDSHp9hLgRBqNu1DXxdFQ5iA03PaDoLI6TmCJLz1SYARk2HXrdBgoobsm5', '2020-12-10 07:49:44', '2020-12-10 07:49:44', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1445, '0015126604', '196612151992031002', NULL, NULL, '2020-12-01 06:05:02', '2020-12-01 06:05:02', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1447, '0010116709', '196711101993031005', NULL, NULL, '2020-11-30 02:36:31', '2020-11-30 02:36:31', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1464, '0028056006', '196005281989021001', NULL, 'z591VrB0zYzOZ9ixeykiKg5ZaQN0O0J5hcv0KkdxreTG4TQn5GhYwSojXuLh', '2020-12-01 03:02:55', '2020-12-01 03:02:55', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1465, '0020116105', '196111201987031006', NULL, 'Bl2DQLMgrVwCrvO0AeamF1u3hWrGpoKWFRs8nvFCg6N3FQdFnxmofqdPjf0o', '2020-12-10 02:17:50', '2020-12-10 02:17:50', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1472, '0005056506', '196505051991121001', NULL, 'NQV8pbjGViILUbXjXyMvXA5UukTzLtiiAoDrQUpZMECIi1oJ0y0OOFbJ8cT2', '2020-12-08 07:05:06', '2020-12-08 07:05:06', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1475, '0031126433', '196412311990031037', NULL, '6lUusMmcWzWCgQoxVx8ajvUT4vOApKk2njeYsaSEFxinnb5sKIxh2VeqPx8U', '2020-11-26 06:05:19', '2020-12-01 02:39:47', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1479, '0004096603', '196609041992031002', NULL, NULL, '2020-12-06 14:20:24', '2020-12-06 14:20:24', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1491, '0012126404', '196412121990011001', NULL, NULL, '2020-12-04 06:52:58', '2020-12-04 06:52:58', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1494, '0003116602', '196611031992031005', NULL, 'my9524SzwCA1TPMVm3dLH12FZEfnTHYsaS2QhqeZFnzqhN46VkgDDj5Ndl2N', '2020-11-24 14:48:50', '2020-11-24 14:48:50', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1498, '0027127307', '197312271999032003', NULL, 'pUR7giYsDXGBkXpu8rFyKNoTj3Elg7kPE97GLfFJoNA4DmroSl3Fxy22xkXg', '2020-11-24 14:28:51', '2020-12-03 07:00:37', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1508, '0008116705', '196711081995112001', NULL, 'oL4tTDjrOTDH2WbFaJr4gh71VNvM2zNduBZ1gS5cmkEwkFwDez1Kv0QzkeVW', '2020-11-25 09:49:36', '2020-11-25 09:49:36', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1528, '0029086504', '196508291992032001', NULL, NULL, '2020-11-28 13:27:27', '2020-11-28 13:27:27', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1533, '0016096603', '196609161991031003', NULL, NULL, '2020-12-14 08:11:49', '2020-12-14 08:11:49', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1549, '0028026303', '196302281991031002', NULL, 'dzBHGrw7AlYVmB1E1sbWwr7D7obBg3z2Nlv6JAsfJ68fLaThPjX5ize43Efd', '2020-11-27 06:04:01', '2020-11-27 06:04:01', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1550, '0012056015', '196005121988031001', NULL, NULL, '2020-12-04 07:49:58', '2020-12-04 07:49:58', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1574, '0004106504', '196510041993031005', NULL, NULL, '2020-12-09 09:45:47', '2020-12-09 09:45:47', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1576, '0020076902', '196907201994031002', NULL, NULL, '2020-12-11 19:02:52', '2020-12-11 19:02:52', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1586, '0007076107', '196107071986031003', NULL, NULL, '2020-12-06 01:37:36', '2020-12-06 01:37:36', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1588, '0008036106', '196103081986031004', NULL, 'GqYDITH0TmtR591AhLMcgWqCOJrDfvX2hX9ZhNH153zSVP5IInYfJS3zIRyH', '2020-12-03 13:03:45', '2020-12-03 13:03:45', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1592, '0030036007', '196003301985031008', NULL, 't69N7YBLikmkCfzGU48lPkH0Y0S5gBHQ8Bic72nlvS7b4tPfJknYoTSGu5KH', '2020-12-04 08:11:35', '2020-12-04 08:11:35', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1605, '0013106206', '196210131988031004', NULL, NULL, '2020-11-25 17:06:44', '2020-11-25 17:06:44', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1660, '0025116405', '196411251993031003', NULL, NULL, '2020-12-09 03:31:56', '2020-12-09 03:31:56', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1664, '0015116704', '196711151993032001', NULL, NULL, '2020-12-03 14:07:04', '2020-12-03 14:07:04', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1668, '0021016007', '196001211988031004', NULL, NULL, '2020-12-08 07:03:21', '2020-12-08 07:03:21', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1671, '0029126606', '196612291993032002', NULL, '7yf0LVXNUXzI1kLM8QxIshoxDRp6Isl2TFAmiEAg5uQrmgZSBadfOXl0Vc0t', '2020-11-27 07:40:28', '2020-11-27 07:40:28', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1672, '0009036601', '196603091991032001', NULL, 'iv5Ss8aMdNUijwhAk95IiLzNAuRpM9Ss9YuepPZxAOt6Hl4cU3uPnGlUU3so', '2020-11-25 09:51:54', '2020-11-25 09:51:54', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1675, '0014107003', '197010141995122002', NULL, NULL, '2020-12-02 02:13:04', '2020-12-02 02:13:04', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1680, '0021058001', '198005212003121003', NULL, NULL, '2020-12-02 15:06:08', '2020-12-02 15:06:08', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1684, '0010096408', '196409101991021001', NULL, NULL, '2020-12-10 14:40:42', '2020-12-10 14:40:42', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1685, '0027057402', '197405271998021001', NULL, NULL, '2020-12-07 07:02:12', '2020-12-07 07:02:12', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1696, '0009056004', '196005091986032002', NULL, NULL, '2020-11-27 07:45:10', '2020-11-27 07:45:10', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1701, '0002066707', '196706021992031003', NULL, NULL, '2020-12-12 19:46:18', '2020-12-12 19:46:18', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1703, '0005096602', '196609051994031006', NULL, NULL, '2020-12-14 03:18:23', '2020-12-14 03:18:23', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1704, '0011066902', '196906111994031003', NULL, 'RGhTu4hquXJAxOY3BzNeBUzsEn9yvT8t9lNVZDHH1VtZAAPv3qIPqe0JlOHo', '2020-11-24 14:59:30', '2020-11-24 14:59:30', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1705, '0022037302', '197303222000031001', NULL, NULL, '2020-11-27 23:57:42', '2020-11-27 23:57:42', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1709, '0010116909', '196911101995121001', NULL, NULL, '2020-11-30 03:17:04', '2020-11-30 03:17:04', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1712, '0024096802', '196809241999032001', NULL, NULL, '2020-11-28 14:52:22', '2020-11-28 14:52:22', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1716, '0012046207', '196204121987011001', NULL, NULL, '2020-12-03 22:30:02', '2020-12-03 22:30:02', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1717, '0014106105', '196110141985032001', NULL, NULL, '2020-12-02 14:40:41', '2020-12-02 14:40:41', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1720, '0020116405', '196411201990012001', NULL, 'oTwWG4BURhwbPvojxk1BDFdwDnF2dxCyDbFYgcbSAkgWfdxB7s1FaTQUfoe7', '2020-12-02 08:23:59', '2020-12-02 08:23:59', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1725, '0012017202', '197201121997022001', NULL, NULL, '2020-12-14 04:26:13', '2020-12-14 04:26:13', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1730, '0023017302', '197301232000031001', NULL, 'H3MMF7HSqewXu6gKdyFQG86MWpSA6zmrUzeSXF7ObdNUgqZ53IFthTCQAeT2', '2020-11-30 04:42:12', '2020-11-30 04:42:12', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1738, '0021067402', '197406211999032001', NULL, NULL, '2020-11-29 02:41:01', '2020-11-29 02:41:01', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1739, '0006097901', '197909062003121004', NULL, NULL, '2020-11-24 14:58:57', '2020-11-24 14:58:57', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1744, '0005077204', '197207052000031003', NULL, NULL, '2020-11-27 07:41:53', '2020-11-27 07:41:53', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1747, '0014097502', '197509142005012012', NULL, NULL, '2020-12-07 04:58:26', '2020-12-07 04:58:26', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1758, '0017017504', '197501172003121003', NULL, NULL, '2020-12-08 09:32:02', '2020-12-08 09:32:02', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1760, '0023108101', '198110232005012002', NULL, NULL, '2020-12-06 11:21:59', '2020-12-06 11:21:59', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1766, '0008025904', '195902081986031001', NULL, 'gyECdz20g2zslA18td6v3AsrLTrdYHlxyZvy6hqBnIaE2BNb0ryjFLk8oILP', '2020-12-07 03:47:42', '2020-12-07 03:47:42', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1767, '0012066211', '196206121989022001', NULL, NULL, '2020-12-14 02:13:57', '2020-12-14 02:13:57', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1770, '0007096006', '196009071985031004', NULL, 'ERvxinzgUZlAmUVDr0pVkg48QKPWTfQNZlH2Vr3k3WpswAV53cAbec5HHv7e', '2020-12-08 02:53:21', '2020-12-08 02:53:21', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1771, '0013076307', '196307131990012001', NULL, 'J4YL31GGp6PwM3ORLJZhxbiSQpOvNTXWLR3p5aeJBSDu0EvcFJzLp9Cwga1B', '2020-11-26 10:37:11', '2020-11-26 10:37:11', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1778, '0030116308', '196311301989022001', NULL, NULL, '2020-12-10 11:09:02', '2020-12-10 11:09:02', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1801, '0031086604', '196608311994122001', NULL, NULL, '2020-11-30 03:01:36', '2020-11-30 03:01:36', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1803, '0009076803', '196807091993032002', NULL, 'A8CdNNR43gRQ1JVphde4LzQ4Bg2sYacidb2tXPWuy0TqDWNO5GMV0JYUEGSm', '2020-11-26 10:34:11', '2020-11-26 10:34:11', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1813, '0020016407', '196401201989031005', NULL, NULL, '2020-11-27 12:34:20', '2020-11-27 12:34:20', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1815, '0017036706', '196703171993031003', NULL, NULL, '2020-12-08 04:09:11', '2020-12-08 04:09:11', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1821, '0011116406', '196411111991021002', NULL, NULL, '2020-12-07 04:09:00', '2020-12-07 04:09:00', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1822, '0014126605', '196612141994021001', NULL, NULL, '2020-11-27 07:27:55', '2020-12-01 02:38:25', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1827, '0013016603', '196601131992032001', NULL, NULL, '2020-12-06 10:24:32', '2020-12-06 10:24:32', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1829, '0008116308', '196311081988061001', NULL, '3eN0BoAE3EnnahFdtXt3SnbzcI9BujIQqqXvQbzxOseoD6qVvG3e3VEPGPTV', '2020-12-03 09:48:32', '2020-12-03 09:48:32', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1831, '0008078004', '198007082005011003', NULL, 'Xpxd8Ot479dYQF8kWRQm8jPhXoKlmqevSawCUegTB1xTE5udTQioZWCdMP2X', '2020-11-25 09:51:02', '2020-12-02 08:20:59', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1832, '0010117002', '197011101994021001', NULL, NULL, '2020-12-06 15:20:11', '2020-12-06 15:20:11', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1841, '0028027803', '197802282005011003', NULL, NULL, '2020-12-11 02:48:47', '2020-12-11 02:48:47', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1853, '0017067702', '197706172006042001', NULL, 'gJVOHAB4MfTgrWO416c4lX6NG8BlJXWUCoPW7wABGxIEc39TLIYiTi61RzJL', '2020-11-26 10:35:10', '2020-11-26 10:35:10', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1856, '0013077403', '197407132006042002', NULL, 'fF5aSTIJApcjl7ai0rc2D3WUBwbBEiV3hg7k9z6vEkbgeOJyJ0G6A3hN9C0N', '2020-12-02 08:02:59', '2020-12-02 08:02:59', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1857, '0006037702', '197703062003012001', NULL, 'fJk66cd8aBAcaUE8RQdMB7N2RLa3hyKpBFb5kxtY0GVnYuiaX45VDFDHotUH', '2020-12-07 05:27:30', '2020-12-07 05:27:30', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1858, '0004027304', '197302041999031005', NULL, NULL, '2020-11-28 16:51:59', '2020-11-28 16:51:59', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1874, '0028047810', '197804282008012019', NULL, NULL, '2020-12-10 00:08:42', '2020-12-10 00:08:42', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1877, '0029128105', '198112292008122003', NULL, NULL, '2020-12-16 03:17:01', '2020-12-16 03:17:01', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1879, '0006108102', '198110062008121002', NULL, 'ZocamWOBOwV6bRazmzYnjfB0b2GJgrlnlmQe93xEQa9o36bbfIvS8M5jHUmh', '2020-11-25 07:30:14', '2020-11-25 07:30:14', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1880, '0027118005', '198011272008122001', NULL, NULL, '2020-11-28 14:55:07', '2020-11-28 14:55:07', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1895, '0001118503', '198511012012121001', NULL, '9RQkplDUO19QPLPI7yvAn3TZBpsVzB02dgtRg3Ux3tEsoQzZOby7BERR5jZL', '2020-11-30 06:46:00', '2020-11-30 06:46:00', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1898, '0024058301', '198305242006041002', NULL, NULL, '2020-12-06 13:33:14', '2020-12-06 13:33:14', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1905, '0001127704', '197712012006041001', NULL, NULL, '2020-12-08 15:05:51', '2020-12-08 15:05:51', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1908, '0008027604', '197602082001121002', NULL, NULL, '2020-12-07 13:22:35', '2020-12-07 13:22:35', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1909, '0007067306', '197306072003121002', NULL, NULL, '2020-11-30 04:36:36', '2020-11-30 04:36:36', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1911, '0011028201', '198202112005011002', NULL, 'KQKMPLkD0uBwOTmbdRlBOBKmwR6FsgRRvcRnQKpY8PcNiYsIPymJzo2w5PLL', '2020-11-27 07:41:10', '2020-12-01 04:29:23', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1918, '0015097901', '197909152005012002', NULL, NULL, '2020-12-02 23:31:20', '2020-12-02 23:31:20', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1921, '0016018301', '198301162006042002', NULL, NULL, '2020-12-03 05:16:11', '2020-12-03 05:16:11', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1923, '0006098002', '198009062006041003', NULL, NULL, '2020-12-10 05:14:20', '2020-12-10 05:14:20', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1927, '0014067702', '197706142006041003', NULL, NULL, '2020-12-04 08:17:45', '2020-12-04 08:17:45', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1929, '0027078201', '198207272006042003', NULL, NULL, '2020-12-06 13:11:29', '2020-12-06 13:11:29', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1935, '0017077407', '197407172006041003', NULL, NULL, '2020-12-11 08:28:30', '2020-12-11 08:28:30', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1937, '0030108301', '198310302006041002', NULL, 'IeaZqMopstCmMcVfaYZ3FX9OkIQS5HCQxA4uRTDfrwcMhYhkrttAZctCRhIt', '2020-12-01 07:36:49', '2020-12-15 05:10:50', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1946, '0029078101', '198107292008011011', NULL, 'cbgc4duYA4ZCKzoksw9H6opST2mnnXWPos1bwjWXNdpbJPgSi2VPpkoPI12b', '2020-11-26 10:36:05', '2020-12-07 08:22:12', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1955, '0001017128', '197101011996031007', NULL, 'CBGy0xydumdwGltB5edtGjr2CVq75zzaQtCmPe3h252KnvxghzsqCmsP2knE', '2020-12-08 02:06:38', '2020-12-08 02:06:38', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1964, '0015067907', '197906152008011016', NULL, NULL, '2020-12-06 05:02:27', '2020-12-06 05:02:27', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1969, '0029068104', '198106292008122002', NULL, NULL, '2020-12-08 02:03:09', '2020-12-08 02:03:15', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1971, '0007107709', '197710072008121001', NULL, 'uuAOdWRSWZjQ4PRnZT7dggPATyESbIDvYG9kVf0czrqb4KfEuy5E4lDRj634', '2020-11-26 02:05:26', '2020-11-26 02:05:26', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1983, '0003028603', '198602032012122002', NULL, NULL, '2020-11-30 10:12:47', '2020-11-30 10:12:47', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1984, '0022108501', '198510222012122002', NULL, 'KGpFxgnO7rMtKHhE6stOI1lAG7Oi8Gq5pnCQYoDe95WPknO74VOQHO7CdICK', '2020-12-14 10:13:18', '2020-12-14 10:13:19', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1985, '0022108401', '198410222012122002', NULL, NULL, '2020-12-10 10:04:48', '2020-12-10 10:04:48', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1988, '1021108501', '198510212014042001', NULL, NULL, '2020-12-07 05:14:15', '2020-12-07 05:14:15', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1992, '1012118404', '198411122014041002', NULL, '0ewVf21rDqK5kqZBOkfWqFaxxabiM2zWsub2U8d1qETuLw0ywqGxYkZmGl6o', '2020-12-01 23:02:02', '2020-12-01 23:02:02', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1994, '0012048505', '198504122014041003', NULL, 'oRq6fIYZhYdFkjyqx0GKehGt7dKmYyoXeuOWt4p7wWOdfrqaENi3DS9A2iuQ', '2020-12-08 05:58:29', '2020-12-08 05:58:29', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(1996, '0026068303', '198306262014042002', NULL, NULL, '2020-12-10 03:22:38', '2020-12-10 03:22:38', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(1998, '0026058704', '198705262015041001', NULL, 'RVGb1hYvIkOPCs5lSCMFIKQlDgYzDVNNVxuYbWiQZi3qlUebTIJeS7JbZSpg', '2020-11-27 07:32:52', '2020-11-27 07:32:52', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2001, '0008018505', '198501082015041003', NULL, NULL, '2020-11-26 06:10:57', '2020-12-02 07:59:38', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2006, '0022018801', '198801222015042003', NULL, NULL, '2020-12-02 08:00:02', '2020-12-02 08:00:02', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2014, '0001088704', '198708012015042002', NULL, '0BgXb1N4n6J3vBWIjR9q9DH6Y8yCwLJ8QZNujZCVjAE1Ho7RrynKmcYyManO', '2020-12-02 03:04:43', '2020-12-02 03:04:43', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2015, '0008026304', '196302081991021001', NULL, NULL, '2020-12-01 00:51:27', '2020-12-01 00:51:27', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2019, '0027037901', '197903272003121002', NULL, NULL, '2020-12-01 06:25:47', '2020-12-01 06:25:47', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2025, '0007048002', '198004072006041001', NULL, NULL, '2020-11-28 08:38:57', '2020-11-28 08:38:57', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2030, '0024098201', '198209242006041002', NULL, NULL, '2020-12-07 05:07:27', '2020-12-07 05:07:27', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2044, '0028047407', '197404282008121002', NULL, 'Qw8yosi9c0ldaVUtGZAZPqoiRRpP8Qklm6DF6UKoFbRIXeF503np33reg4KI', '2020-11-25 09:55:55', '2020-11-25 09:55:55', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2046, '0027058401', '198405272008121003', NULL, 'B12HgA2EffJshmcC7Phh84TqTH2vXUNDvJTgnkWZaiFSgJVgsBdt7R58wtuh', '2020-11-26 02:02:57', '2020-11-26 02:05:45', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2049, '0003068010', '198006032010122003', NULL, 'DV8w0ydmao5etMpei65f1XV02FLVDJyMQhQC7y9kZdrkqalXBBEbqTlh8Mfk', '2020-11-26 13:56:58', '2020-11-26 13:56:58', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2050, '1002058302', '198305022010122006', NULL, NULL, '2020-12-08 02:04:52', '2020-12-08 02:04:52', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2052, '0022077508', '197507222000031003', NULL, NULL, '2020-11-28 17:09:37', '2020-11-28 17:09:37', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2054, '0005108607', '198610052014021002', NULL, NULL, '2020-11-30 06:29:57', '2020-11-30 06:29:57', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2064, '0013118401', '198411132009122003', NULL, NULL, '2020-12-07 05:52:08', '2020-12-07 05:52:08', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2067, '0028018603', '198601282015042001', NULL, 'j4dx3UHC5cMo1En0NnQuu6uEoJ960cnlwbJVgZ4L52dMKIQu74Iq9uQgUqNp', '2020-12-08 02:05:36', '2020-12-08 02:05:36', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2069, '0013098702', '198709132015042001', NULL, NULL, '2020-11-26 14:13:37', '2020-11-26 14:13:37', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2072, '0027106804', '196810271997031001', NULL, 'eBhSH0tWeTmckxG1fdgY4S4LfEjJPDBrckBfzimpns3HluBgBWL9fYoPtbpf', '2020-11-25 11:33:32', '2020-12-09 02:02:47', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(2080, '0008058808', '198805082018032001', NULL, NULL, '2020-12-03 05:48:52', '2020-12-03 05:48:52', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2081, '0030098305', '198309302018031001', NULL, NULL, '2020-12-04 03:22:05', '2020-12-04 03:22:05', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2087, '0008069301', '199306082018032001', NULL, NULL, '2020-12-06 13:00:03', '2020-12-06 13:00:03', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(2088, '0015018605', '198601152018031001', NULL, NULL, '2020-12-15 03:48:58', '2020-12-15 03:48:58', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5619, '0014068505', '198506142019031010', NULL, NULL, '2020-12-03 16:23:18', '2020-12-10 08:40:25', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(5674, '20192002', '20192002', NULL, 'PKkavkJMBB8EQ28NzbqcKVsFux4hjPTfk4678gdbhOp2Ttmcxd0NjL8CBFQp', '2020-11-27 06:44:51', '2020-11-27 06:44:51', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(5679, '20192007', '20192007', NULL, NULL, '2020-11-27 07:28:42', '2020-11-27 07:28:42', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5680, '20191008', '20191008', NULL, NULL, '2020-11-27 07:27:45', '2020-11-27 07:27:45', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5683, '20191011', '20191011', '$2y$10$25zy9jkO4JSF.G9OSdvGueOOWQROrE2h9NBEfxZ1Ksp1Mr9V9w2La', '7moUpsWAcVtVXum6QjqI1tX1UsQGRVuB71gWe30S2m5VRNjRFxtshb27YNv8', '2019-11-15 02:34:00', '2021-01-14 06:18:59', 'aktif', 'admin', 1, NULL, '1', NULL, 0),
(5696, '0025065905', '195906251986012001', NULL, NULL, '2020-12-17 05:42:32', '2020-12-17 05:42:32', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5720, '20192030', '20192030', NULL, NULL, '2020-12-01 03:44:09', '2020-12-01 03:44:09', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5750, '2002029202', '199202022019032020', NULL, NULL, '2020-12-01 03:59:21', '2020-12-01 03:59:21', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5756, '0815058704', '198705152019031013', NULL, NULL, '2020-11-27 09:16:21', '2020-11-27 09:16:21', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5765, '0026069104', '199106262019031015', NULL, NULL, '2020-11-27 09:16:56', '2020-11-27 09:16:56', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5769, '0011019402', '199401112019032021', NULL, NULL, '2020-12-11 03:12:04', '2020-12-11 03:12:04', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5781, '1029078405', '198407292019032012', NULL, NULL, '2020-12-01 01:16:12', '2020-12-01 01:16:12', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5783, '0020019004', '199001202019032012', NULL, NULL, '2020-12-02 08:22:18', '2020-12-02 08:22:18', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(5784, '0029068909', '198906292019031007', NULL, NULL, '2020-11-27 13:15:35', '2020-12-02 08:00:50', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(5785, '1009108402', '198410092019032014', NULL, NULL, '2020-12-02 08:22:02', '2020-12-02 08:22:02', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(5788, '0002059002', '199005022019031013', NULL, NULL, '2020-11-27 12:59:06', '2020-11-27 12:59:06', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(5792, '1001068901', '198906012019031012', NULL, NULL, '2020-12-12 05:09:19', '2020-12-12 05:09:19', 'aktif', 'admin', 0, NULL, '1', NULL, 0),
(5844, '2017099001', '199009172019031011', NULL, NULL, '2020-12-02 03:07:17', '2020-12-02 03:07:17', 'aktif', 'admin', 0, NULL, '0', NULL, 0),
(5986, '1976042810', '197604282010011010', NULL, NULL, '2020-12-01 01:10:23', '2020-12-01 01:10:23', 'aktif', 'admin', 0, NULL, '1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_has_roles`
--

CREATE TABLE `users_has_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_has_roles`
--

INSERT INTO `users_has_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(19, 1),
(50, 10),
(61, 9),
(106, 9),
(124, 11),
(127, 4),
(128, 4),
(129, 4),
(130, 4),
(131, 4),
(132, 4),
(133, 4),
(134, 4),
(135, 4),
(136, 4),
(137, 4),
(138, 4),
(139, 4),
(140, 4),
(141, 4),
(142, 4),
(143, 4),
(144, 4),
(145, 4),
(146, 4),
(147, 4),
(148, 4),
(149, 4),
(150, 4),
(151, 4),
(152, 4),
(153, 4),
(154, 4),
(155, 4),
(156, 4),
(157, 4),
(158, 4),
(159, 4),
(160, 4),
(161, 4),
(162, 4),
(163, 4),
(164, 4),
(165, 4),
(166, 4),
(167, 4),
(168, 4),
(169, 4),
(170, 9),
(171, 4),
(172, 4),
(173, 4),
(174, 4),
(175, 4),
(176, 4),
(177, 4),
(178, 4),
(179, 4),
(180, 4),
(181, 4),
(182, 4),
(183, 4),
(184, 4),
(185, 4),
(186, 4),
(187, 4),
(188, 4),
(189, 4),
(190, 4),
(191, 4),
(192, 4),
(193, 4),
(194, 4),
(195, 4),
(196, 4),
(197, 4),
(198, 4),
(199, 4),
(200, 4),
(201, 4),
(202, 4),
(203, 4),
(204, 4),
(205, 4),
(206, 4),
(207, 4),
(208, 4),
(209, 4),
(210, 4),
(211, 4),
(212, 4),
(213, 4),
(214, 4),
(215, 4),
(216, 4),
(217, 4),
(218, 4),
(219, 4),
(220, 4),
(221, 4),
(222, 4),
(223, 4),
(224, 4),
(225, 4),
(226, 4),
(227, 1),
(228, 4),
(229, 4),
(230, 4),
(231, 4),
(232, 4),
(233, 4),
(234, 4),
(235, 4),
(236, 1),
(237, 4),
(238, 4),
(240, 4),
(241, 4),
(242, 4),
(294, 5),
(304, 9),
(312, 10),
(323, 10),
(358, 6),
(359, 6),
(386, 10),
(394, 9),
(403, 10),
(423, 10),
(435, 10),
(441, 10),
(452, 10),
(457, 10),
(520, 10),
(522, 10),
(526, 10),
(563, 10),
(582, 10),
(584, 10),
(589, 10),
(601, 10),
(605, 10),
(614, 10),
(623, 10),
(646, 10),
(661, 10),
(696, 10),
(707, 10),
(732, 10),
(770, 10),
(798, 10),
(799, 10),
(835, 10),
(849, 10),
(876, 10),
(879, 10),
(885, 10),
(1040, 10),
(1068, 9),
(1074, 9),
(1128, 9),
(1230, 10),
(1239, 9),
(1257, 1),
(1268, 10),
(1369, 9),
(1396, 9),
(1398, 9),
(1440, 9),
(1464, 9),
(1465, 9),
(1472, 9),
(1475, 11),
(1494, 9),
(1498, 9),
(1508, 9),
(1549, 9),
(1588, 9),
(1592, 9),
(1671, 9),
(1672, 9),
(1696, 9),
(1704, 9),
(1720, 9),
(1730, 9),
(1739, 9),
(1758, 9),
(1760, 9),
(1766, 9),
(1770, 9),
(1771, 9),
(1803, 9),
(1822, 11),
(1829, 9),
(1831, 9),
(1831, 10),
(1853, 9),
(1853, 10),
(1856, 9),
(1857, 9),
(1879, 9),
(1895, 9),
(1905, 10),
(1911, 9),
(1937, 10),
(1946, 9),
(1955, 9),
(1969, 9),
(1971, 10),
(1984, 9),
(1988, 9),
(1992, 9),
(1994, 9),
(1998, 9),
(2001, 10),
(2006, 10),
(2014, 9),
(2044, 9),
(2046, 10),
(2049, 9),
(2050, 9),
(2067, 9),
(2072, 9),
(2072, 10),
(5619, 9),
(5674, 10),
(5683, 1),
(5783, 10),
(5784, 10),
(5785, 10),
(5788, 9),
(5792, 9),
(5986, 9),
(24354, 1),
(24355, 1),
(24359, 7),
(24470, 2),
(26089, 3),
(26104, 1),
(26107, 2),
(26108, 1),
(26109, 6),
(26110, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_instansi`
--

CREATE TABLE `user_instansi` (
  `id_user_intsansi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_unit_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_instansi`
--

INSERT INTO `user_instansi` (`id_user_intsansi`, `id_user`, `id_unit_kerja`) VALUES
(52, 614, 96),
(53, 614, 97),
(54, 614, 98),
(55, 614, 174),
(56, 614, 175),
(57, 614, 176),
(58, 614, 181),
(59, 614, 201),
(60, 614, 202),
(61, 614, 1025),
(62, 452, 96),
(63, 452, 97),
(64, 452, 98),
(65, 452, 174),
(66, 452, 175),
(67, 452, 176),
(68, 452, 181),
(69, 452, 201),
(70, 452, 202),
(71, 452, 1025),
(73, 1494, 1046),
(74, 1739, 1045),
(75, 1704, 1047),
(76, 1879, 33),
(80, 1508, 211),
(81, 1831, 150),
(82, 1672, 96),
(83, 589, 33),
(84, 589, 34),
(85, 589, 211),
(86, 646, 40),
(87, 646, 41),
(88, 646, 214),
(89, 2044, 169),
(90, 526, 35),
(91, 526, 36),
(92, 526, 169),
(93, 526, 212),
(94, 526, 213),
(95, 732, 38),
(96, 732, 44),
(97, 732, 45),
(98, 732, 215),
(99, 601, 37),
(100, 601, 39),
(101, 601, 42),
(102, 601, 43),
(103, 601, 217),
(104, 601, 218),
(105, 323, 178),
(106, 323, 179),
(107, 623, 168),
(108, 623, 170),
(109, 623, 171),
(110, 623, 172),
(111, 441, 150),
(112, 441, 186),
(114, 2046, 62),
(115, 2046, 164),
(116, 2046, 165),
(117, 1971, 62),
(118, 1971, 164),
(119, 1971, 165),
(120, 1971, 197),
(121, 1971, 205),
(122, 2046, 197),
(123, 2046, 205),
(124, 394, 62),
(125, 394, 164),
(126, 394, 165),
(127, 394, 197),
(128, 394, 205),
(129, 304, 62),
(130, 304, 164),
(131, 304, 165),
(132, 304, 197),
(133, 304, 205),
(134, 1803, 81),
(135, 403, 81),
(136, 1853, 82),
(137, 563, 82),
(138, 1946, 79),
(139, 661, 79),
(140, 1771, 80),
(141, 584, 80),
(142, 2072, 150),
(143, 106, 123),
(144, 106, 124),
(145, 106, 125),
(146, 106, 126),
(147, 849, 123),
(148, 849, 124),
(149, 849, 125),
(150, 849, 126),
(151, 2049, 192),
(153, 1549, 42),
(154, 1549, 42),
(156, 61, 151),
(157, 61, 152),
(158, 61, 153),
(159, 61, 186),
(160, 61, 188),
(161, 61, 189),
(165, 170, 142),
(166, 170, 150),
(167, 170, 154),
(168, 170, 155),
(169, 799, 186),
(170, 799, 187),
(171, 799, 188),
(172, 799, 189),
(173, 5674, 150),
(174, 5674, 151),
(175, 5674, 152),
(176, 5674, 153),
(177, 696, 142),
(178, 696, 146),
(179, 696, 148),
(180, 696, 149),
(181, 696, 154),
(182, 696, 155),
(183, 1831, 150),
(184, 1998, 178),
(185, 1671, 218),
(186, 1696, 37),
(187, 1998, 178),
(188, 1074, 168),
(189, 1074, 168),
(190, 5788, 186),
(191, 1549, 42),
(192, 1730, 217),
(193, 1730, 217),
(194, 1549, 42),
(195, 1549, 42),
(196, 1730, 217),
(197, 1730, 217),
(198, 1730, 217),
(199, 1549, 42),
(200, 1895, 39),
(201, 1730, 217),
(202, 1730, 217),
(203, 1549, 42),
(204, 1730, 217),
(205, 1549, 42),
(206, 5986, 169),
(207, 1730, 217),
(208, 1822, 27),
(209, 1475, 27),
(210, 1464, 215),
(211, 124, 27),
(212, 1895, 39),
(213, 1911, 38),
(214, 1549, 42),
(215, 1803, 81),
(216, 1730, 217),
(217, 1992, 135),
(218, 1549, 42),
(219, 1549, 42),
(220, 1549, 42),
(221, 1803, 81),
(222, 2014, 148),
(223, 170, 146),
(224, 170, 148),
(225, 170, 149),
(226, 2014, 148),
(227, 1549, 42),
(228, 1549, 42),
(229, 1549, 42),
(230, 1549, 42),
(231, 582, 33),
(232, 582, 34),
(233, 582, 211),
(234, 386, 178),
(235, 386, 179),
(238, 885, 39),
(239, 885, 42),
(240, 876, 36),
(241, 876, 213),
(242, 50, 33),
(243, 50, 34),
(244, 50, 35),
(245, 50, 36),
(246, 50, 37),
(247, 50, 38),
(248, 50, 39),
(249, 50, 40),
(250, 50, 41),
(251, 50, 42),
(252, 50, 43),
(253, 50, 44),
(254, 50, 45),
(255, 50, 168),
(256, 50, 169),
(257, 50, 170),
(258, 50, 171),
(259, 50, 172),
(260, 50, 178),
(261, 50, 179),
(262, 50, 211),
(263, 50, 212),
(264, 50, 213),
(265, 50, 214),
(266, 50, 215),
(267, 50, 217),
(268, 50, 218),
(269, 50, 1050),
(270, 2014, 148),
(271, 2014, 148),
(272, 1730, 217),
(273, 2001, 161),
(274, 2006, 161),
(275, 1230, 161),
(276, 5784, 161),
(277, 1730, 217),
(279, 1856, 97),
(280, 707, 96),
(281, 707, 97),
(282, 707, 98),
(283, 707, 174),
(284, 707, 175),
(285, 707, 176),
(286, 707, 181),
(287, 707, 201),
(288, 707, 202),
(289, 707, 1025),
(290, 1730, 217),
(291, 1730, 217),
(292, 1268, 150),
(293, 5785, 150),
(294, 5783, 150),
(295, 1720, 43),
(296, 1720, 43),
(297, 1895, 39),
(298, 1730, 217),
(299, 1549, 42),
(300, 1549, 42),
(301, 1549, 42),
(302, 1720, 43),
(303, 1549, 42),
(304, 1549, 42),
(305, 1730, 217),
(306, 1549, 42),
(307, 1464, 215),
(308, 1549, 42),
(309, 1895, 39),
(310, 2014, 148),
(311, 2014, 148),
(312, 1730, 217),
(313, 1549, 42),
(315, 605, 43),
(316, 605, 37),
(317, 605, 39),
(318, 605, 42),
(319, 1720, 43),
(321, 1498, 1045),
(322, 1464, 215),
(323, 605, 217),
(324, 605, 218),
(325, 1696, 37),
(326, 1549, 42),
(327, 1720, 43),
(328, 1829, 41),
(329, 1696, 37),
(330, 1730, 217),
(331, 1588, 45),
(332, 1588, 45),
(333, 1549, 42),
(334, 1720, 43),
(336, 1895, 39),
(337, 1549, 42),
(338, 1998, 178),
(339, 2014, 148),
(340, 1730, 217),
(341, 2014, 148),
(342, 1829, 41),
(343, 1074, 168),
(344, 1895, 39),
(345, 1074, 168),
(347, 1549, 42),
(348, 1592, 44),
(349, 1592, 44),
(350, 1730, 217),
(351, 1549, 42),
(352, 1829, 41),
(353, 1829, 41),
(354, 1829, 41),
(355, 1829, 41),
(356, 1696, 37),
(357, 1549, 42),
(358, 1549, 42),
(359, 1730, 217),
(360, 1730, 217),
(361, 1829, 41),
(362, 1829, 41),
(363, 1829, 41),
(364, 1588, 45),
(365, 1803, 81),
(366, 1803, 81),
(367, 1803, 81),
(368, 1803, 81),
(369, 1829, 41),
(370, 1803, 81),
(371, 1829, 41),
(372, 1720, 43),
(373, 1803, 81),
(374, 1464, 215),
(375, 1853, 82),
(376, 1998, 178),
(377, 1549, 42),
(378, 1760, 36),
(379, 1853, 82),
(380, 1831, 150),
(381, 1671, 218),
(382, 1853, 82),
(383, 1671, 218),
(384, 1853, 82),
(385, 1720, 43),
(386, 1730, 217),
(387, 1831, 150),
(388, 1831, 150),
(389, 1760, 36),
(390, 1696, 37),
(391, 1771, 80),
(392, 1239, 142),
(393, 1239, 142),
(394, 1771, 80),
(395, 1771, 80),
(396, 1720, 43),
(397, 1853, 82),
(398, 1853, 82),
(399, 1992, 135),
(400, 1760, 36),
(401, 1696, 37),
(402, 1730, 217),
(403, 2014, 148),
(404, 1831, 150),
(405, 1771, 80),
(406, 1549, 42),
(407, 1696, 37),
(408, 1771, 80),
(409, 1464, 215),
(410, 1998, 178),
(411, 1853, 82),
(412, 1879, 33),
(413, 1853, 82),
(414, 1766, 35),
(415, 1766, 35),
(416, 1831, 150),
(417, 1592, 44),
(418, 1998, 178),
(419, 1853, 82),
(420, 1988, 147),
(421, 1464, 215),
(422, 1857, 38),
(423, 1549, 42),
(424, 1508, 211),
(425, 1853, 82),
(426, 1853, 82),
(427, 1730, 217),
(428, 1803, 81),
(429, 1803, 81),
(430, 1803, 81),
(431, 1671, 218),
(432, 1671, 218),
(433, 1730, 217),
(434, 1853, 82),
(435, 1730, 217),
(436, 1696, 37),
(437, 1588, 45),
(438, 1588, 45),
(439, 1464, 215),
(440, 1549, 42),
(441, 1588, 45),
(442, 1549, 42),
(443, 1588, 45),
(444, 1671, 218),
(445, 1720, 43),
(446, 1730, 217),
(447, 1696, 37),
(448, 1803, 81),
(449, 2014, 148),
(450, 1696, 37),
(451, 1895, 39),
(452, 1853, 82),
(453, 1730, 217),
(454, 1592, 44),
(455, 1853, 82),
(456, 2014, 148),
(457, 520, 134),
(458, 1969, 134),
(459, 312, 133),
(460, 2050, 133),
(461, 522, 135),
(462, 2067, 135),
(463, 879, 192),
(464, 1955, 192),
(465, 435, 147),
(466, 1998, 178),
(467, 1770, 34),
(468, 1770, 34),
(469, 1770, 34),
(470, 1895, 39),
(471, 1730, 217),
(472, 1998, 178),
(473, 1696, 37),
(474, 1879, 33),
(475, 1879, 33),
(476, 1829, 41),
(477, 1068, 170),
(478, 1766, 35),
(479, 1592, 44),
(480, 1766, 35),
(481, 1771, 80),
(482, 1508, 211),
(483, 1829, 41),
(484, 1998, 178),
(485, 1998, 178),
(486, 1853, 82),
(487, 1128, 164),
(488, 1770, 34),
(489, 1994, 179),
(490, 1994, 179),
(491, 1879, 33),
(492, 1766, 35),
(493, 1766, 35),
(494, 1766, 35),
(495, 1730, 217),
(496, 1128, 164),
(497, 1803, 81),
(498, 1998, 178),
(499, 1472, 40),
(500, 1720, 43),
(501, 1998, 178),
(502, 1549, 42),
(503, 1760, 36),
(504, 1696, 37),
(505, 1730, 217),
(506, 1758, 199),
(507, 1696, 37),
(508, 1730, 217),
(509, 1998, 178),
(510, 1994, 179),
(511, 1994, 179),
(512, 1994, 179),
(513, 1239, 142),
(514, 1998, 178),
(515, 1549, 42),
(516, 1696, 37),
(517, 1998, 178),
(518, 1994, 179),
(519, 1508, 211),
(520, 1853, 82),
(521, 1730, 217),
(522, 1040, 82),
(523, 1040, 83),
(524, 1040, 166),
(525, 1040, 210),
(526, 1905, 82),
(527, 1905, 83),
(528, 1905, 166),
(529, 1905, 210),
(530, 1068, 170),
(531, 1696, 37),
(532, 1853, 82),
(533, 1853, 82),
(534, 1549, 42),
(535, 1994, 179),
(536, 2072, 161),
(537, 1730, 217),
(538, 1895, 39),
(539, 1998, 178),
(540, 1994, 179),
(541, 1508, 211),
(542, 1994, 179),
(543, 1760, 36),
(544, 1998, 178),
(545, 1994, 179),
(546, 1369, 198),
(547, 1853, 82),
(548, 1829, 41),
(549, 1672, 96),
(550, 1549, 42),
(551, 1994, 179),
(552, 1879, 33),
(553, 1994, 179),
(554, 1994, 179),
(555, 1994, 179),
(556, 1994, 179),
(557, 1994, 179),
(558, 1671, 218),
(559, 1998, 178),
(560, 1998, 178),
(561, 1998, 178),
(562, 1998, 178),
(563, 1803, 81),
(564, 1803, 81),
(565, 1671, 218),
(566, 1770, 34),
(567, 1672, 96),
(568, 1994, 179),
(569, 1760, 36),
(570, 1994, 179),
(571, 1672, 96),
(572, 1998, 178),
(573, 1998, 178),
(574, 1895, 39),
(575, 1239, 142),
(576, 2049, 192),
(577, 1856, 97),
(578, 1730, 217),
(579, 1696, 37),
(580, 1549, 42),
(581, 1770, 34),
(582, 1766, 35),
(583, 1994, 179),
(584, 1592, 44),
(585, 1465, 212),
(586, 1465, 212),
(587, 1766, 35),
(588, 1879, 33),
(589, 1879, 33),
(590, 1879, 33),
(591, 1465, 212),
(592, 1465, 212),
(593, 1465, 212),
(594, 1465, 212),
(595, 1730, 217),
(596, 1879, 33),
(597, 2014, 148),
(598, 1766, 35),
(599, 1853, 82),
(600, 1992, 135),
(601, 1856, 97),
(602, 1879, 33),
(603, 1760, 36),
(604, 1992, 135),
(605, 1992, 135),
(606, 1879, 33),
(607, 1998, 178),
(608, 1998, 178),
(609, 1672, 96),
(610, 1998, 178),
(611, 1879, 33),
(612, 1895, 39),
(613, 2044, 169),
(614, 1803, 81),
(615, 1994, 179),
(616, 1803, 81),
(617, 1998, 178),
(618, 1760, 36),
(619, 1672, 96),
(620, 1672, 96),
(621, 1672, 96),
(622, 1128, 164),
(623, 1766, 35),
(624, 1998, 178),
(625, 1720, 43),
(626, 1766, 35),
(627, 1770, 34),
(628, 1998, 178),
(629, 1766, 35),
(630, 1730, 217),
(631, 1766, 35),
(632, 1766, 35),
(633, 1853, 82),
(634, 1766, 35),
(635, 1766, 35),
(636, 1766, 35),
(637, 1440, 171),
(638, 1766, 35),
(639, 1879, 33),
(640, 1440, 171),
(641, 1766, 35),
(642, 1465, 212),
(643, 1465, 212),
(644, 1440, 171),
(648, 5619, 165),
(649, 798, 165),
(650, 457, 164),
(651, 835, 62),
(652, 1672, 96),
(653, 1730, 217),
(654, 1853, 82),
(655, 1128, 164),
(656, 1128, 164),
(657, 1998, 178),
(658, 1730, 217),
(659, 1672, 96),
(660, 1853, 82),
(661, 1856, 97),
(662, 1128, 164),
(663, 1128, 164),
(664, 1128, 164),
(665, 1128, 164),
(666, 5619, 165),
(667, 1803, 81),
(668, 5619, 165),
(669, 1128, 164),
(670, 1128, 164),
(671, 1128, 164),
(672, 5619, 165),
(673, 5619, 165),
(674, 1760, 36),
(675, 1853, 82),
(676, 1128, 164),
(677, 1856, 97),
(678, 1472, 40),
(679, 1592, 44),
(680, 1998, 178),
(681, 1128, 164),
(682, 1760, 36),
(683, 1128, 164),
(684, 1766, 35),
(685, 1672, 96),
(686, 1128, 164),
(687, 2044, 169),
(688, 5619, 165),
(689, 1857, 38),
(690, 1829, 41),
(691, 1696, 37),
(692, 1857, 38),
(693, 1472, 40),
(694, 1128, 164),
(695, 1829, 41),
(696, 1857, 38),
(697, 1857, 38),
(698, 1879, 33),
(699, 1829, 41),
(700, 1857, 38),
(701, 1829, 41),
(702, 1829, 41),
(703, 1128, 164),
(704, 1853, 82),
(705, 1472, 40),
(706, 5619, 165),
(707, 1829, 41),
(708, 1672, 96),
(709, 1829, 41),
(710, 1829, 41),
(711, 1829, 41),
(712, 1857, 38),
(713, 1879, 33),
(714, 1998, 178),
(715, 1829, 41),
(716, 1770, 34),
(717, 1440, 171),
(718, 1440, 171),
(719, 1672, 96),
(720, 1730, 217),
(721, 1760, 36),
(722, 1398, 214),
(723, 1672, 96),
(724, 1760, 36),
(725, 1239, 142),
(726, 1440, 171),
(727, 1853, 82),
(728, 1672, 96),
(729, 1831, 150),
(730, 1369, 198),
(731, 1672, 96),
(732, 1369, 198),
(733, 1128, 164),
(734, 1895, 39),
(735, 1998, 178),
(736, 1549, 42),
(737, 1857, 38),
(738, 1074, 168),
(739, 1730, 217),
(740, 5792, 189),
(741, 1730, 217),
(742, 1672, 96),
(743, 1803, 81),
(744, 1803, 81),
(745, 1857, 38),
(746, 1672, 96),
(747, 1672, 96),
(748, 1856, 97),
(749, 1696, 37),
(750, 1853, 82),
(751, 1369, 198),
(752, 1672, 96),
(753, 1771, 80),
(754, 1771, 80),
(755, 1771, 80),
(756, 1771, 80),
(757, 1672, 96),
(758, 1672, 96),
(759, 1760, 36),
(760, 1672, 96),
(761, 1803, 81),
(762, 1672, 96),
(763, 1672, 96),
(764, 1895, 39),
(765, 1672, 96),
(766, 1672, 96),
(767, 1672, 96),
(768, 1672, 96),
(769, 1672, 96),
(770, 1672, 96),
(771, 1696, 37),
(772, 1672, 96),
(773, 1672, 96),
(774, 1856, 97),
(775, 1672, 96),
(776, 1672, 96),
(777, 1672, 96),
(778, 1672, 96),
(779, 1549, 42),
(780, 1549, 42),
(781, 1549, 42),
(782, 1879, 33),
(783, 1853, 82),
(784, 1766, 35),
(785, 1766, 35),
(786, 1672, 96),
(787, 1672, 96),
(788, 1770, 34),
(789, 1770, 34),
(790, 1770, 34),
(791, 1857, 38),
(792, 1672, 96),
(793, 1770, 34),
(794, 1856, 97),
(795, 1766, 35),
(796, 1760, 36),
(797, 1672, 96),
(798, 1672, 96),
(799, 1984, 181),
(800, 1672, 96),
(801, 1730, 217),
(802, 1672, 96),
(803, 1672, 96),
(804, 1465, 212),
(805, 1984, 181),
(806, 1856, 97),
(807, 1672, 96),
(808, 1672, 96),
(809, 1730, 217),
(810, 1803, 81),
(811, 1766, 35),
(812, 1440, 171),
(813, 1770, 34),
(814, 1672, 96),
(815, 1440, 171),
(816, 2014, 148),
(817, 2014, 148),
(818, 1074, 168),
(819, 1074, 168),
(820, 1856, 97),
(821, 1856, 97),
(822, 2014, 148),
(823, 1770, 34),
(824, 2049, 192),
(825, 1937, 150),
(826, 1760, 36),
(827, 2049, 192),
(828, 1766, 35),
(829, 1829, 41),
(830, 1672, 96),
(831, 1803, 81),
(832, 1803, 81),
(833, 1803, 81),
(834, 1803, 81),
(835, 1856, 97),
(836, 1803, 81),
(837, 1672, 96),
(838, 1672, 96),
(839, 1770, 34),
(840, 1672, 96),
(841, 1672, 96),
(842, 1672, 96),
(843, 1672, 96),
(844, 1856, 97),
(845, 1672, 96),
(846, 1853, 82),
(847, 1672, 96),
(848, 1588, 45),
(849, 1074, 168),
(850, 2049, 192),
(851, 1853, 82),
(852, 1856, 97),
(853, 1856, 97),
(854, 1770, 34),
(855, 1803, 81),
(856, 1766, 35),
(857, 1074, 168),
(858, 1831, 150),
(859, 2014, 148),
(860, 1770, 34),
(861, 2049, 192),
(862, 2044, 169),
(863, 2044, 169),
(864, 1730, 217),
(865, 1829, 41),
(866, 1984, 181),
(867, 1984, 181),
(868, 1770, 34),
(869, 1770, 34),
(870, 1396, 172),
(871, 1770, 34),
(872, 1396, 172),
(873, 1672, 96),
(874, 2050, 136),
(875, 1396, 172),
(876, 1068, 170),
(877, 2044, 169),
(878, 1672, 96),
(879, 2044, 169),
(880, 1672, 96),
(881, 1672, 96),
(882, 1592, 44),
(883, 1074, 168),
(884, 1856, 97),
(885, 1803, 81),
(886, 1672, 96),
(887, 1856, 97),
(888, 1853, 82),
(889, 1856, 97),
(890, 1672, 96),
(891, 1803, 81),
(892, 1440, 171),
(893, 1857, 38),
(894, 2049, 192),
(895, 1857, 38),
(896, 1672, 96),
(897, 1672, 96),
(898, 1396, 172),
(899, 1803, 81),
(900, 1588, 45),
(901, 1239, 142),
(902, 1766, 35),
(903, 1766, 35),
(904, 1766, 35),
(905, 1770, 34),
(906, 1770, 34),
(907, 1730, 217),
(908, 1766, 35),
(909, 1766, 35),
(910, 1549, 42),
(911, 1853, 82),
(912, 1396, 172),
(913, 1730, 217),
(914, 1396, 172),
(915, 1856, 97),
(916, 1856, 97),
(917, 1672, 96),
(918, 1440, 171),
(919, 1396, 172),
(920, 1396, 172),
(921, 1672, 96),
(922, 1440, 171),
(923, 1440, 171),
(924, 1770, 34),
(925, 1672, 96),
(926, 1853, 82),
(927, 1440, 171),
(928, 423, 96),
(929, 423, 97),
(930, 423, 98),
(931, 423, 174),
(932, 423, 175),
(933, 423, 176),
(934, 423, 181),
(935, 423, 202),
(936, 423, 1025),
(937, 770, 96),
(938, 770, 97),
(939, 770, 98),
(940, 770, 174),
(941, 770, 175),
(942, 770, 176),
(943, 770, 181),
(944, 770, 201),
(945, 770, 202),
(946, 770, 1025),
(947, 1396, 172),
(948, 1396, 172),
(949, 1396, 172),
(950, 2044, 169),
(951, 1984, 181),
(952, 5683, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_kinerja`
--
ALTER TABLE `bidang_kinerja`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `evaluasi_kinerja`
--
ALTER TABLE `evaluasi_kinerja`
  ADD PRIMARY KEY (`id_ek`);

--
-- Indexes for table `indikator_kinerja`
--
ALTER TABLE `indikator_kinerja`
  ADD PRIMARY KEY (`id_ik`),
  ADD KEY `id_ss` (`id_ss`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log_aktivitas`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `parent_evaluasi_kinerja`
--
ALTER TABLE `parent_evaluasi_kinerja`
  ADD PRIMARY KEY (`id_parent_evaluasi_kinerja`),
  ADD KEY `fk_id_ek_idx` (`id_ek`),
  ADD KEY `fk_id_parent_ek_idx` (`id_parent_ek`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permission`),
  ADD KEY `fk_permissions_menus1_idx` (`menu_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `roles_has_menus`
--
ALTER TABLE `roles_has_menus`
  ADD PRIMARY KEY (`role_id`,`menu_id`),
  ADD KEY `fk_roles_has_menus_menus1_idx` (`menu_id`),
  ADD KEY `fk_roles_has_menus_roles1_idx` (`role_id`);

--
-- Indexes for table `roles_has_permissions`
--
ALTER TABLE `roles_has_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `fk_roles_has_permissions_permissions1_idx` (`permission_id`),
  ADD KEY `fk_roles_has_permissions_roles1_idx` (`role_id`);

--
-- Indexes for table `sasaran_strategis`
--
ALTER TABLE `sasaran_strategis`
  ADD PRIMARY KEY (`id_ss`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_has_roles`
--
ALTER TABLE `users_has_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `fk_users_has_roles_roles1_idx` (`role_id`),
  ADD KEY `fk_users_has_roles_users_idx` (`user_id`);

--
-- Indexes for table `user_instansi`
--
ALTER TABLE `user_instansi`
  ADD PRIMARY KEY (`id_user_intsansi`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_kinerja`
--
ALTER TABLE `bidang_kinerja`
  MODIFY `id_bidang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `evaluasi_kinerja`
--
ALTER TABLE `evaluasi_kinerja`
  MODIFY `id_ek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `indikator_kinerja`
--
ALTER TABLE `indikator_kinerja`
  MODIFY `id_ik` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=889;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log_aktivitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `parent_evaluasi_kinerja`
--
ALTER TABLE `parent_evaluasi_kinerja`
  MODIFY `id_parent_evaluasi_kinerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sasaran_strategis`
--
ALTER TABLE `sasaran_strategis`
  MODIFY `id_ss` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_instansi`
--
ALTER TABLE `user_instansi`
  MODIFY `id_user_intsansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=953;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parent_evaluasi_kinerja`
--
ALTER TABLE `parent_evaluasi_kinerja`
  ADD CONSTRAINT `fk_id_ek` FOREIGN KEY (`id_ek`) REFERENCES `evaluasi_kinerja` (`id_ek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_parent_ek` FOREIGN KEY (`id_parent_ek`) REFERENCES `evaluasi_kinerja` (`id_ek`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
