-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2021 at 09:55 PM
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
-- Table structure for table `berkas_pensiun`
--

CREATE TABLE `berkas_pensiun` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `berkas_sk_pns` text NOT NULL,
  `berkas_kenaikan_pangkat` text NOT NULL,
  `kartu_pegawai` text NOT NULL,
  `berkas_karsi_karsu` text NOT NULL,
  `kartu_keluarga` text NOT NULL,
  `surat_ket_alamat_pensiun` text NOT NULL,
  `terverifikasi` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas_pensiun`
--

INSERT INTO `berkas_pensiun` (`id`, `id_pegawai`, `berkas_sk_pns`, `berkas_kenaikan_pangkat`, `kartu_pegawai`, `berkas_karsi_karsu`, `kartu_keluarga`, `surat_ket_alamat_pensiun`, `terverifikasi`, `created_at`, `updated_at`) VALUES
(6, 13, '../upload/berkas_sk_pns/1639686109_berkas_sk_pns.pdf', '../upload/berkas_kenaikan_pangkat/1639686109_berkas_kenaikan_pangkat.pdf', '../upload/kartu_pegawai/1639686109_kartu_pegawai.pdf', '../upload/berkas_karsi_karsu/1639686109_berkas_karsi_karsu.pdf', '../upload/kartu_keluarga/1639686109_kartu_keluarga.pdf', '../upload/alamat_pensiun/1639686109_alamat_pensiun.pdf', 1, '2021-12-16 20:21:49', '2021-12-16 20:21:49');

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
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `status` text NOT NULL,
  `agama` text NOT NULL,
  `masa_jabatan` date NOT NULL,
  `tempat_tugas` text NOT NULL,
  `no_sk_pensiun` text NOT NULL,
  `golongan` text NOT NULL,
  `gaji_pokok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_gambar`, `nama_lengkap`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `agama`, `masa_jabatan`, `tempat_tugas`, `no_sk_pensiun`, `golongan`, `gaji_pokok`) VALUES
(13, '1493910128_b28ecbf1f67e0e1b3ad7597011e2d7b9.jpeg', 'Dolores numquam qui ', 'Nulla dolor magni re', 'Quis tempora perfere', '2013-01-07', 'Perempuan', 'Voluptate id vitae m', 'Budha', '2021-12-31', 'Id modi nisi reicien', 'Sunt dolorem ad vel', 'Eos culpa sit corpo', '10000000');

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
(2, 'pensiun', 'pensiun', 'pensiun', 'pensiun'),
(3, 'kasubag', 'kasubag', 'kasubag', 'kasubag'),
(4, 'kasubag', 'kasubag', 'kasubag', 'kasubag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_pensiun`
--
ALTER TABLE `berkas_pensiun`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `berkas_pensiun`
--
ALTER TABLE `berkas_pensiun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
