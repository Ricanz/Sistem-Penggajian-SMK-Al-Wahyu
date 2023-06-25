-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 02:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pelajaran` varchar(20) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id`, `nama`, `jabatan`, `agama`, `pelajaran`, `kategori`, `jenis_kelamin`) VALUES
(2, 'Alexander Rabbani', 'Guru', 'Islam', 'Penjaskes', 'pns', 'laki-laki'),
(3, 'Wildan', 'Wali Kelas', 'Kristen', 'Bahasa Indonesia', 'honorer', 'laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `jabatan`, `jenis_kelamin`, `agama`) VALUES
(1, 'Rully', 'operasional', 'laki-laki', 'Budha');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gaji_pokok` bigint(20) NOT NULL,
  `tunjangan` bigint(20) NOT NULL,
  `tambahan` bigint(20) NOT NULL,
  `lembur` bigint(20) NOT NULL,
  `total_lembur` bigint(20) NOT NULL,
  `dicetak_pada` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `user_id`, `gaji_pokok`, `tunjangan`, `tambahan`, `lembur`, `total_lembur`, `dicetak_pada`, `type`) VALUES
(1, 2, 5000000, 1000000, 150000, 600000, 3, '2023/06/25 13:50:09', 'guru'),
(4, 1, 4000000, 500000, 0, 0, 0, '2023/06/25 14:37:45', 'karyawan'),
(5, 2, 3500000, 1000000, 250000, 1600000, 8, '2023/06/25 14:42:00', 'guru'),
(6, 1, 4000000, 500000, 0, 600000, 3, '2023/06/25 14:45:48', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `presensi` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu_absen` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `user_id`, `presensi`, `keterangan`, `waktu_absen`, `type`) VALUES
(1, 2, 'Hadir', '', '2023/06/24 21:21:02', 'guru'),
(2, 3, 'Sakit', 'diare', '2023/06/24 21:25:54', 'guru'),
(3, 1, 'Hadir', '', '2023/06/24 21:41:32', 'karyawan'),
(4, 2, 'Hadir', '', '2023/06/24 21:42:24', 'guru'),
(5, 2, 'Hadir', '', '2023/06/24 21:42:57', 'guru'),
(6, 1, 'Sakit', 'pusing', '2023/06/24 21:43:19', 'karyawan'),
(7, 2, 'Hadir', 'hi', '2023/06/24 21:58:18', 'guru'),
(8, 1, 'Hadir', '', '2023/06/25 12:59:49', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
