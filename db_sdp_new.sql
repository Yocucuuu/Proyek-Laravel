-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 05:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sdp_new`
--
CREATE DATABASE IF NOT EXISTS `db_sdp_new` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sdp_new`;

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

DROP TABLE IF EXISTS `administrasi`;
CREATE TABLE `administrasi` (
  `Id_administrasi` int(6) NOT NULL,
  `Nama_administrasi` varchar(30) NOT NULL,
  `Username_administrasi` varchar(30) NOT NULL,
  `No_administrasi` varchar(12) NOT NULL,
  `Alamat_administrasi` varchar(50) NOT NULL,
  `Password_admin` varchar(255) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`Id_administrasi`, `Nama_administrasi`, `Username_administrasi`, `No_administrasi`, `Alamat_administrasi`, `Password_admin`, `deleted_at`) VALUES
(111000, 'dede', 'dede1', '082264551111', 'Jl. stts no.1', 'dede1', NULL),
(111001, 'albert', 'hao1', '082264551112', 'Jl. stts no.2', 'hao1', NULL),
(111002, 'david', 'david1', '082264551113', 'Jl. stts no.3', 'david1', NULL),
(111003, 'diki', 'diki1', '082264551114', 'Jl. stts no.4', 'diki1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ajar_mengajar`
--

DROP TABLE IF EXISTS `ajar_mengajar`;
CREATE TABLE `ajar_mengajar` (
  `Id_ajar_mengajar` int(6) NOT NULL,
  `Id_kelas` int(6) NOT NULL,
  `Id_mapel` int(6) NOT NULL,
  `NIG` int(6) NOT NULL,
  `Jam_berakhir` time NOT NULL,
  `Jam_dimulai` time NOT NULL,
  `Hari` varchar(10) NOT NULL,
  `Jam_belajar` time NOT NULL,
  `Status_jadwal` int(1) NOT NULL DEFAULT 1,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ajar_mengajar`
--

INSERT INTO `ajar_mengajar` (`Id_ajar_mengajar`, `Id_kelas`, `Id_mapel`, `NIG`, `Jam_berakhir`, `Jam_dimulai`, `Hari`, `Jam_belajar`, `Status_jadwal`, `deleted_at`) VALUES
(119000, 118000, 114006, 112000, '09:00:00', '08:00:00', 'senin', '60:00:00', 1, NULL),
(119001, 118000, 114006, 112000, '10:00:00', '09:00:00', 'senin', '60:00:00', 1, NULL),
(119002, 118001, 114001, 112002, '09:00:00', '08:00:00', 'selasa', '60:00:00', 1, NULL),
(119003, 118001, 114001, 112002, '10:00:00', '09:00:00', 'selasa', '60:00:00', 1, NULL),
(119004, 118001, 114001, 112002, '09:00:00', '08:00:00', 'rabu', '60:00:00', 1, NULL),
(119005, 118001, 114001, 112002, '10:00:00', '09:00:00', 'rabu', '60:00:00', 1, NULL),
(119006, 118002, 114004, 112001, '09:00:00', '08:00:00', 'kamis', '60:00:00', 1, NULL),
(119007, 118002, 114004, 112001, '10:00:00', '09:00:00', 'kamis', '60:00:00', 1, NULL),
(119008, 118003, 114007, 112000, '09:00:00', '08:00:00', 'jumat', '60:00:00', 1, NULL),
(119009, 118003, 114007, 112000, '10:00:00', '09:00:00', 'jumat', '60:00:00', 1, NULL),
(119010, 118011, 114000, 112003, '09:00:00', '08:00:00', 'jumat', '01:00:00', 1, NULL),
(119011, 118013, 114006, 112002, '09:00:00', '08:00:00', 'kamis', '01:00:00', 1, NULL),
(119012, 118000, 114004, 112000, '09:00:00', '08:00:00', 'rabu', '01:00:00', 1, NULL),
(119013, 118000, 114004, 112001, '09:00:00', '08:00:00', 'kamis', '01:00:00', 1, NULL),
(119014, 118011, 114005, 112004, '09:00:00', '08:00:00', 'senin', '01:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `NIG` int(6) NOT NULL,
  `Nama_guru` varchar(30) NOT NULL,
  `Password_guru` varchar(255) NOT NULL,
  `No_hp_guru` varchar(12) NOT NULL,
  `Alamat_guru` varchar(50) NOT NULL,
  `Status_guru` int(1) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`NIG`, `Nama_guru`, `Password_guru`, `No_hp_guru`, `Alamat_guru`, `Status_guru`, `deleted_at`) VALUES
(112000, 'Kevin', 'kev1', '082123450000', 'Jl. petra no.1', 1, NULL),
(112001, 'Zinu', 'zin1', '082123450000', 'Jl. petra no.2', 1, NULL),
(112002, 'Uzumaki Jeremy', 'jer1', '082123450003', 'Jl. Ninja no.3', 1, NULL),
(112003, 'Jon', 'jon1', '082123450069', 'Jl. anonym no.2', 0, NULL),
(112004, 'Makenzie Wisoky Sr.', '$2y$10$CSEvjTAOYdLXKQR5XBCAY.ECcklntOBNwi0dAG0Jti04BFTx0cZc6', '888-583-0599', '9372 Gaetano Park\nDickensville, NC 25783-0943', 1, NULL),
(112005, 'Priscilla Gislason', '$2y$10$RT02jUMDqrv3anghcVAVDOBFV7QCAtCkGIwIoagZ2l9FY40oTYdLe', '888-469-4199', '5085 Klocko Mission\nBaumbachmouth, DC 28644', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history_edit`
--

DROP TABLE IF EXISTS `history_edit`;
CREATE TABLE `history_edit` (
  `Id_history_edit` int(6) NOT NULL,
  `Id_table` int(6) NOT NULL,
  `Id_pengedit` int(6) NOT NULL,
  `Tanggal_edit` datetime NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_edit`
--

INSERT INTO `history_edit` (`Id_history_edit`, `Id_table`, `Id_pengedit`, `Tanggal_edit`, `deleted_at`) VALUES
(121000, 120000, 111001, '2020-10-07 22:33:57', NULL),
(121001, 1160000, 111000, '2020-10-07 22:33:57', NULL),
(121002, 1160001, 111000, '2020-10-08 08:36:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `Id_jurusan` int(6) NOT NULL,
  `Nama_jurusan` varchar(20) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`Id_jurusan`, `Nama_jurusan`, `deleted_at`) VALUES
(117000, 'IPA', NULL),
(117001, 'IPS', NULL),
(117002, 'Bahasa', NULL),
(117003, 'Umum', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `Id_kelas` int(6) NOT NULL,
  `Id_periode` int(6) NOT NULL,
  `NIG` int(6) NOT NULL,
  `Nama_kelas` varchar(20) NOT NULL,
  `Tingkat_kelas` int(2) NOT NULL,
  `Id_jurusan` int(6) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`Id_kelas`, `Id_periode`, `NIG`, `Nama_kelas`, `Tingkat_kelas`, `Id_jurusan`, `deleted_at`) VALUES
(118000, 115000, 112000, 'Umum1', 1, 117003, NULL),
(118001, 115000, 112002, 'IPA1', 2, 117000, NULL),
(118002, 115000, 112001, 'IPS1', 2, 117001, NULL),
(118003, 115000, 112000, 'Bahasa1', 2, 117002, NULL),
(118009, 115002, 112005, 'BahasaC', 1, 117002, NULL),
(118010, 115002, 112004, 'UmumB', 1, 117003, NULL),
(118011, 115002, 112001, 'UmumB', 2, 117003, NULL),
(118012, 115001, 112003, 'IPSA', 3, 117001, NULL),
(118013, 115000, 112001, 'BahasaB', 1, 117002, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

DROP TABLE IF EXISTS `mapel`;
CREATE TABLE `mapel` (
  `Id_mapel` int(6) NOT NULL,
  `Nama_mapel` varchar(20) NOT NULL,
  `KKM` int(3) NOT NULL,
  `Tingkat` int(1) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`Id_mapel`, `Nama_mapel`, `KKM`, `Tingkat`, `deleted_at`) VALUES
(114000, 'Matematika', 65, 1, NULL),
(114001, 'Matematika', 60, 2, NULL),
(114002, 'Matematika', 55, 3, NULL),
(114003, 'Ekonomi', 80, 1, NULL),
(114004, 'Ekonomi', 75, 2, NULL),
(114005, 'Ekonomi', 70, 3, NULL),
(114006, 'Bhs.indonesia', 80, 1, NULL),
(114007, 'Bhs.indonesia', 75, 2, NULL),
(114008, 'Bhs.indonesia', 70, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membimbing`
--

DROP TABLE IF EXISTS `membimbing`;
CREATE TABLE `membimbing` (
  `NIG` int(6) NOT NULL,
  `Id_mapel` int(6) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membimbing`
--

INSERT INTO `membimbing` (`NIG`, `Id_mapel`, `deleted_at`) VALUES
(112000, 114006, NULL),
(112000, 114007, NULL),
(112002, 114001, NULL),
(112001, 114004, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

DROP TABLE IF EXISTS `pengumuman`;
CREATE TABLE `pengumuman` (
  `Id_pengumuman` int(6) NOT NULL,
  `Judul_pengumuman` varchar(50) NOT NULL,
  `Tanggal_pengumuman` date NOT NULL,
  `File_pengumuman` varchar(50) NOT NULL,
  `Id_administrasi` int(6) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`Id_pengumuman`, `Judul_pengumuman`, `Tanggal_pengumuman`, `File_pengumuman`, `Id_administrasi`, `deleted_at`) VALUES
(116000, 'Waspada Covid', '2020-10-07', 'https://www.google.com/search?q=covid+corona', 111000, NULL),
(116001, 'Demo DPR', '2020-10-08', 'https://www.google.com/search?q=demo+dpr', 111000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periode_akademik`
--

DROP TABLE IF EXISTS `periode_akademik`;
CREATE TABLE `periode_akademik` (
  `Id_periode` int(6) NOT NULL,
  `Tahun_ajaran` varchar(4) NOT NULL,
  `Semester` int(1) NOT NULL,
  `Status` int(1) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_akademik`
--

INSERT INTO `periode_akademik` (`Id_periode`, `Tahun_ajaran`, `Semester`, `Status`, `deleted_at`) VALUES
(115000, '2020', 1, 1, NULL),
(115001, '2020', 2, 1, NULL),
(115002, '2019', 1, 0, NULL),
(115003, '2019', 2, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_akademik`
--

DROP TABLE IF EXISTS `riwayat_akademik`;
CREATE TABLE `riwayat_akademik` (
  `Id_riwayat_akademik` int(6) NOT NULL,
  `Id_ajar_mengajar` int(6) NOT NULL,
  `NIS` int(6) NOT NULL,
  `Id_kelas` int(6) NOT NULL,
  `Id_mapel` int(6) NOT NULL,
  `Quiz1` int(3) NOT NULL,
  `Quiz2` int(3) NOT NULL,
  `Tugas1` int(3) NOT NULL,
  `Tugas2` int(3) NOT NULL,
  `UTS` int(3) NOT NULL,
  `UAS` int(3) NOT NULL,
  `Sikap` varchar(1) NOT NULL,
  `Hasil_akhir` int(3) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_akademik`
--

INSERT INTO `riwayat_akademik` (`Id_riwayat_akademik`, `Id_ajar_mengajar`, `NIS`, `Id_kelas`, `Id_mapel`, `Quiz1`, `Quiz2`, `Tugas1`, `Tugas2`, `UTS`, `UAS`, `Sikap`, `Hasil_akhir`, `deleted_at`) VALUES
(120002, 119003, 113003, 118001, 114001, 85, 21, 88, 76, 85, 25, 'b', 63, NULL),
(120003, 119006, 113069, 118002, 114004, 90, 39, 96, 68, 32, 68, 'b', 66, NULL),
(120004, 119004, 113000, 118001, 114001, 83, 32, 66, 41, 33, 74, 'c', 55, NULL),
(120005, 119011, 113006, 118013, 114006, 57, 23, 60, 66, 55, 33, 'b', 49, NULL),
(120006, 119005, 113014, 118001, 114001, 23, 41, 84, 50, 72, 49, 'b', 53, NULL),
(120007, 119011, 113002, 118013, 114006, 23, 74, 94, 73, 58, 23, 'c', 58, NULL),
(120008, 119013, 113003, 118000, 114004, 46, 56, 28, 51, 49, 37, 'c', 45, NULL),
(120009, 119003, 113007, 118001, 114001, 43, 82, 28, 85, 40, 99, 'a', 63, NULL),
(120010, 119008, 113015, 118003, 114007, 99, 42, 98, 63, 85, 66, 'a', 76, NULL),
(120011, 119006, 113069, 118002, 114004, 87, 91, 82, 91, 88, 39, 'c', 80, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `NIS` int(6) NOT NULL,
  `Nama_siswa` varchar(30) NOT NULL,
  `Password_siswa` varchar(255) NOT NULL,
  `Tempat_lahir_siswa` varchar(20) NOT NULL,
  `Tanggal_lahir_siswa` date NOT NULL,
  `Nama_ibu` varchar(30) NOT NULL,
  `Nama_ayah` varchar(30) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1,
  `NISN` int(10) NOT NULL,
  `Agama` varchar(10) NOT NULL,
  `Jenis_kelamin` varchar(10) NOT NULL,
  `Alamat_siswa` varchar(50) NOT NULL,
  `Id_kelas` int(6) NOT NULL,
  `id_jurusan` int(6) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `Nama_siswa`, `Password_siswa`, `Tempat_lahir_siswa`, `Tanggal_lahir_siswa`, `Nama_ibu`, `Nama_ayah`, `Status`, `NISN`, `Agama`, `Jenis_kelamin`, `Alamat_siswa`, `Id_kelas`, `id_jurusan`, `deleted_at`) VALUES
(113000, 'haphap', 'hap1', 'Olympus', '2000-10-07', 'Rhea', 'Zeus', 1, 434533200, 'Jasin', 'pria', 'Jl. land of god no.99', 118000, 117003, NULL),
(113001, 'Gilberto', 'gopek1', 'Monstadt', '2000-10-07', 'Paimon', 'Venti', 1, 434533201, 'Anemoculus', 'pria', 'Jl. xianling no.1', 118000, 117003, NULL),
(113002, 'Yosua', 'yos1', 'Okinawa', '2000-01-01', 'Hestia', 'Apollo', 1, 434532203, 'kristen', 'pria', 'Jl. odawara no.2', 118000, 117003, NULL),
(113003, 'Teddy', 'ted1', 'Sumedang', '2000-10-29', 'Hera', 'Atlas', 1, 434532204, 'kristen', 'pria', 'Jl. stts.edu no.7', 118000, 117003, NULL),
(113004, 'hestia', 'res1', 'mojokerto', '2000-06-08', 'Ember', 'Poseidon', 1, 434533205, 'katolik', 'wanita', 'Jl. land of god no.1', 118000, 117003, NULL),
(113005, 'Annisa', 'nisa1', 'surabaya', '2000-05-05', 'Suijah', 'Sutejo', 1, 434533206, 'katolik', 'wanita', 'Jl. Prof. Yamin no.7', 118000, 117003, NULL),
(113006, 'Ryan', 'ryan1', 'makassar', '2000-01-10', 'itzy', 'florida', 1, 434533207, 'katolik', 'pria', 'Jl.supratman no.3', 118000, 117003, NULL),
(113007, 'Lisa', 'lisa1', 'mojokerto', '2000-11-17', 'jaira', 'madison', 1, 434533208, 'Islam', 'wanita', 'Jl. trumpet no.1', 118000, 117003, NULL),
(113009, 'Ketty', 'ket1', 'mojokerto', '2000-10-30', 'aimer', 'jason', 1, 434533209, 'Islam', 'wanita', 'Jl. Prof. Yamin no.9', 118000, 117003, NULL),
(113010, 'satria', 'sat1', 'kendari', '2000-11-05', 'hibiki', 'setyo', 1, 434533210, 'Islam', 'pria', 'Jl. Mandonga no,3', 118000, 117003, NULL),
(113011, 'salma', 'sal1', 'kendari', '2000-09-02', 'hana', 'daisy', 1, 434533211, 'budha', 'wanita', 'Jl.pattimura no.7', 118000, 117003, NULL),
(113012, 'Mitsuha', 'mit1', 'Okinawa', '2000-10-08', 'katao', 'kyo', 1, 434533212, 'budha', 'wanita', 'Jl. wamu no.2', 118000, 117003, NULL),
(113013, 'taki', 'tak1', 'Okinawa', '2000-10-15', 'amai', 'sawamura', 1, 434533213, 'hindu', 'pria', 'Jl. odawara no.5', 118000, 117003, NULL),
(113014, 'fery', 'fer1', 'fukuoka', '2001-10-04', 'katy', 'deru', 1, 434533214, 'hindu', 'pria', 'Jl. jacko no.1', 118000, 117003, NULL),
(113015, 'anom', 'ano1', 'surabaya', '2000-10-14', 'nani', 'keshi', 1, 434533215, 'hindu', 'pria', 'Jl. Prof. Yamin no.9', 118000, 117003, NULL),
(113016, 'jade', 'jad', 'surabaya', '2001-10-06', 'ica', 'jordi', 1, 434533216, 'Islam', 'pria', 'Jl. xianling no.9', 118001, 117000, NULL),
(113017, 'leo', 'leo1', 'surabaya', '2001-10-01', 'leony', 'leonardo', 1, 434533217, 'kristen', 'pria', 'Jl. stts.edu no.9', 118001, 117000, NULL),
(113019, 'marco', 'mar1', 'surabaya', '2001-07-07', 'lidya', 'dava', 1, 434533219, 'kristen', 'pria', 'Jl. stts.edu no.2', 118001, 117000, NULL),
(113031, 'qwe', '$2y$10$n.IEMJesKbm9oqS7woNAg.rZfgyK3L/TP6zTUb/LGgAxPYx1bRf5u', 'qwe', '2020-11-23', 'qwe', 'qwe', 1, 1234567890, 'Islam', 'Pria', 'qwe', 118000, 117003, NULL),
(113069, 'Weldon Reinger', '$2y$10$PGjuW8cXVdFJk9Gf20c4VeKaz8XJJePxE7Rp/1rid7tla/OXCm3Lq', 'bury', '2003-04-16', 'Emmy', 'Randall', 1, 4, 'Hindu', 'wanita', 'bury', 118000, 117003, NULL),
(113070, 'Juliana Abshire', '$2y$10$rqw9MMymikIK2W2XcjsGqu2RzhceIahTQzkFI.t9i8ULcm3x0YENS', 'mouth', '2003-05-21', 'Opal', 'Deion', 1, 34212332, 'Islam', 'pria', 'borough', 118000, 117000, NULL),
(113071, 'Norma Tillman', '$2y$10$uzHqVNIXciY5E/wHd.fuZ.UjGRrw1yhjGoBqUwEDYICvplt9/RCWy', 'town', '2002-12-22', 'Magdalena', 'Lennie', 1, 6, 'Buddha', 'pria', 'port', 118003, 117001, NULL),
(113072, 'Tyree Bashirian', '$2y$10$mH73rWc8lvNe9wLq6Hz8XuelcaClZTpsPRJ01X6aNo9zCohyTj6Vu', 'shire', '2002-12-07', 'Lillie', 'Richard', 1, 473700431, 'Islam', 'pria', 'land', 118002, 117000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

DROP TABLE IF EXISTS `syarat`;
CREATE TABLE `syarat` (
  `Id_mapel` int(6) NOT NULL,
  `id_jurusan` int(6) NOT NULL,
  `Syarat_nilai` int(3) NOT NULL DEFAULT 0,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`Id_mapel`, `id_jurusan`, `Syarat_nilai`, `deleted_at`) VALUES
(114000, 117000, 75, NULL),
(114004, 117001, 80, NULL),
(114007, 117002, 80, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`Id_administrasi`);

--
-- Indexes for table `ajar_mengajar`
--
ALTER TABLE `ajar_mengajar`
  ADD PRIMARY KEY (`Id_ajar_mengajar`),
  ADD KEY `Id_kelas` (`Id_kelas`),
  ADD KEY `Id_mapel` (`Id_mapel`),
  ADD KEY `NIG` (`NIG`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIG`);

--
-- Indexes for table `history_edit`
--
ALTER TABLE `history_edit`
  ADD PRIMARY KEY (`Id_history_edit`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`Id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`Id_kelas`),
  ADD KEY `kelas_ibfk_1` (`NIG`),
  ADD KEY `Id_jurusan` (`Id_jurusan`),
  ADD KEY `Id_periode` (`Id_periode`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`Id_mapel`);

--
-- Indexes for table `membimbing`
--
ALTER TABLE `membimbing`
  ADD KEY `Id_mapel` (`Id_mapel`),
  ADD KEY `NIG` (`NIG`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`Id_pengumuman`),
  ADD KEY `Id_administrasi` (`Id_administrasi`);

--
-- Indexes for table `periode_akademik`
--
ALTER TABLE `periode_akademik`
  ADD PRIMARY KEY (`Id_periode`);

--
-- Indexes for table `riwayat_akademik`
--
ALTER TABLE `riwayat_akademik`
  ADD PRIMARY KEY (`Id_riwayat_akademik`),
  ADD KEY `riwayat_akademik_ibfk_1` (`Id_mapel`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `Id_kelas` (`Id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`),
  ADD UNIQUE KEY `NISN` (`NISN`),
  ADD KEY `Id_kelas` (`Id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `Id_mapel` (`Id_mapel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `Id_administrasi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111004;

--
-- AUTO_INCREMENT for table `ajar_mengajar`
--
ALTER TABLE `ajar_mengajar`
  MODIFY `Id_ajar_mengajar` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119015;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `NIG` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112006;

--
-- AUTO_INCREMENT for table `history_edit`
--
ALTER TABLE `history_edit`
  MODIFY `Id_history_edit` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121003;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `Id_jurusan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117004;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `Id_kelas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118014;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `Id_mapel` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114009;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `Id_pengumuman` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116002;

--
-- AUTO_INCREMENT for table `periode_akademik`
--
ALTER TABLE `periode_akademik`
  MODIFY `Id_periode` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115004;

--
-- AUTO_INCREMENT for table `riwayat_akademik`
--
ALTER TABLE `riwayat_akademik`
  MODIFY `Id_riwayat_akademik` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120012;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `NIS` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113073;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajar_mengajar`
--
ALTER TABLE `ajar_mengajar`
  ADD CONSTRAINT `ajar_mengajar_ibfk_1` FOREIGN KEY (`Id_kelas`) REFERENCES `kelas` (`Id_kelas`),
  ADD CONSTRAINT `ajar_mengajar_ibfk_2` FOREIGN KEY (`Id_mapel`) REFERENCES `mapel` (`Id_mapel`),
  ADD CONSTRAINT `ajar_mengajar_ibfk_3` FOREIGN KEY (`NIG`) REFERENCES `guru` (`NIG`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`NIG`) REFERENCES `guru` (`NIG`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`Id_jurusan`) REFERENCES `jurusan` (`Id_jurusan`),
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`Id_periode`) REFERENCES `periode_akademik` (`Id_periode`);

--
-- Constraints for table `membimbing`
--
ALTER TABLE `membimbing`
  ADD CONSTRAINT `membimbing_ibfk_1` FOREIGN KEY (`Id_mapel`) REFERENCES `mapel` (`Id_mapel`),
  ADD CONSTRAINT `membimbing_ibfk_2` FOREIGN KEY (`NIG`) REFERENCES `guru` (`NIG`);

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`Id_administrasi`) REFERENCES `administrasi` (`Id_administrasi`);

--
-- Constraints for table `riwayat_akademik`
--
ALTER TABLE `riwayat_akademik`
  ADD CONSTRAINT `riwayat_akademik_ibfk_1` FOREIGN KEY (`Id_mapel`) REFERENCES `mapel` (`Id_mapel`),
  ADD CONSTRAINT `riwayat_akademik_ibfk_2` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`),
  ADD CONSTRAINT `riwayat_akademik_ibfk_3` FOREIGN KEY (`Id_kelas`) REFERENCES `kelas` (`Id_kelas`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`Id_kelas`) REFERENCES `kelas` (`Id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`Id_jurusan`);

--
-- Constraints for table `syarat`
--
ALTER TABLE `syarat`
  ADD CONSTRAINT `syarat_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`Id_jurusan`),
  ADD CONSTRAINT `syarat_ibfk_2` FOREIGN KEY (`Id_mapel`) REFERENCES `mapel` (`Id_mapel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
