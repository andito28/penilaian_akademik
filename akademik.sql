-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 08:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` int(10) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `npm`, `kelas`) VALUES
(1, 'juki', 2019020089, 'SK V D'),
(2, 'joki', 2019020078, 'SK V D'),
(3, 'jeki', 2018020012, 'TI IV C');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id` int(11) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id`, `mata_kuliah`, `kode`, `sks`) VALUES
(1, 'visual basic', 'VB002', 3),
(2, 'database', 'DB002', 3),
(3, 'pemrograman WEB', 'PW002', 3),
(4, 'sistem operasi komputer', 'SOK02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `tugas` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL,
  `akhir` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `bobot_nilai` int(11) NOT NULL,
  `npm` varchar(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `bobot_sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `tugas`, `uts`, `uas`, `akhir`, `grade`, `bobot_nilai`, `npm`, `kode`, `bobot_sks`) VALUES
(2, 80, 80, 100, 88, 'A', 4, '2019020089', 'VB002', 12),
(3, 80, 80, 60, 72, 'B', 3, '2019020089', 'DB002', 9),
(4, 80, 45, 55, 60, 'D', 1, '2019020089', 'PW002', 3),
(5, 80, 80, 80, 80, 'A', 4, '2019020078', 'VB002', 11),
(6, 80, 100, 80, 86, 'A', 4, '2019020078', 'DB002', 12),
(7, 80, 45, 80, 70, 'B', 3, '2019020078', 'PW002', 8),
(8, 100, 100, 100, 100, 'A', 4, '2018020012', 'VB002', 12),
(9, 80, 100, 80, 86, 'A', 4, '2018020012', 'DB002', 12),
(10, 100, 80, 100, 94, 'A', 4, '2018020012', 'PW002', 12),
(11, 80, 45, 60, 62, 'C', 2, '2019020089', 'SOK02', 4),
(12, 80, 80, 100, 88, 'A', 4, '', '', 0),
(13, 80, 80, 80, 80, 'A', 4, '', 'SOK02', 7),
(14, 40, 80, 100, 76, 'B', 3, '2019020078', 'SOK02', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
