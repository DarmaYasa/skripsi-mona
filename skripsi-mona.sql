-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 12:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi-mona`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `nip` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `status` text NOT NULL,
  `agama` text NOT NULL,
  `masa_jabatan` text NOT NULL,
  `tempat_tugas` text NOT NULL,
  `no_sk_pensiun` text NOT NULL,
  `golongan` text NOT NULL,
  `gaji_pokok` text NOT NULL,
  `berkas_sk_pns` varchar(255) NOT NULL,
  `berkas_kenaikan_pangkat` varchar(255) NOT NULL,
  `kartu_pegawai` varchar(255) NOT NULL,
  `berkas_karsi_karsu` varchar(255) NOT NULL,
  `kartu_keluarga` varchar(255) NOT NULL,
  `alamat_pensiun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_gambar`, `nama_lengkap`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `agama`, `masa_jabatan`, `tempat_tugas`, `no_sk_pensiun`, `golongan`, `gaji_pokok`, `berkas_sk_pns`, `berkas_kenaikan_pangkat`, `kartu_pegawai`, `berkas_karsi_karsu`, `kartu_keluarga`, `alamat_pensiun`) VALUES
(10, '1384299659_instagram.png', 'asdadasd', 'dadadasd', 'dadasdads', 'dasdasdasd', 'dadasdads', 'dadasdasd', 'dadasdasd', 'dasdadasds', 'tabanan', 'dadasdad', 'dasdasdasda', 'dadadads', '', '', '', '', '', ''),
(11, '43308551_mencicipi_makanan_khas_indonesia.jpg', 'asdasdasd', 'dadad', 'dadasd', 'dadasdas', 'dasdasd', 'dasdsad', 'dasdsad', 'asdadasd', 'tabanan', 'dasdasd', 'dasdad', 'dasdasd', '', '', '', '', '', ''),
(12, '1457748266_20180111_225720-min (1).jpg', 'dasdasda', 'asdasdasd', 'asdasdasd', 'asdasdas', 'asdadas', 'asdasda', 'dsadasd', 'dasdsada', 'asdadad', 'asdsadasd', 'asdasdas', 'adssadasd', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'pensiun', 'pensiun', 'pensiun', 'pensiun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
