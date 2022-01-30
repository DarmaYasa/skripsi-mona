-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2022 at 12:20 PM
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
-- Database: `mona_backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_pensiun`
--

CREATE TABLE `berkas_pensiun` (
  `id` int(11) NOT NULL,
  `id_pensiun` int(11) NOT NULL,
  `berkas_sk_pns` text NOT NULL,
  `berkas_kenaikan_pangkat` text NOT NULL,
  `kartu_pegawai` text NOT NULL,
  `berkas_karsi_karsu` text NOT NULL,
  `kartu_keluarga` text NOT NULL,
  `surat_ket_alamat_pensiun` text NOT NULL,
  `terverifikasi` tinyint(1) DEFAULT NULL,
  `keterangan` text NOT NULL DEFAULT '-',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas_pensiun`
--

INSERT INTO `berkas_pensiun` (`id`, `id_pensiun`, `berkas_sk_pns`, `berkas_kenaikan_pangkat`, `kartu_pegawai`, `berkas_karsi_karsu`, `kartu_keluarga`, `surat_ket_alamat_pensiun`, `terverifikasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(6, 1, '../upload/berkas_sk_pns/1639686109_berkas_sk_pns.pdf', '../upload/berkas_kenaikan_pangkat/1639686109_berkas_kenaikan_pangkat.pdf', '../upload/kartu_pegawai/1639686109_kartu_pegawai.pdf', '../upload/berkas_karsi_karsu/1639686109_berkas_karsi_karsu.pdf', '../upload/kartu_keluarga/1639686109_kartu_keluarga.pdf', '../upload/alamat_pensiun/1639686109_alamat_pensiun.pdf', 2, 'asdasdasdasd', '2021-12-16 20:21:49', '2021-12-16 20:21:49'),
(8, 2, '../upload/berkas_sk_pns/1641903186_berkas_sk_pns.pdf', '../upload/berkas_kenaikan_pangkat/1641903186_berkas_kenaikan_pangkat.pdf', '../upload/kartu_pegawai/1641903186_kartu_pegawai.pdf', '../upload/berkas_karsi_karsu/1641903186_berkas_karsi_karsu.pdf', '../upload/kartu_keluarga/1641903186_kartu_keluarga.pdf', '../upload/alamat_pensiun/1641903186_alamat_pensiun.pdf', 2, '-asdasdasdasdasd', '2022-01-11 12:13:06', '2022-01-11 12:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_gambar` varchar(255) DEFAULT NULL,
  `nama_lengkap` text NOT NULL,
  `nip` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `status` text NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `agama` text NOT NULL,
  `tempat_tugas` text DEFAULT NULL,
  `no_sk_pensiun` text DEFAULT NULL,
  `golongan` text DEFAULT NULL,
  `gaji_pokok` text DEFAULT NULL,
  `masa_kerja_gol_baru` int(11) DEFAULT NULL,
  `masa_kerja_gol_lama` int(11) DEFAULT NULL,
  `pangkat_baru` varchar(255) DEFAULT NULL,
  `pangkat_lama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `eselon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_gambar`, `nama_lengkap`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `status_perkawinan`, `agama`, `tempat_tugas`, `no_sk_pensiun`, `golongan`, `gaji_pokok`, `masa_kerja_gol_baru`, `masa_kerja_gol_lama`, `pangkat_baru`, `pangkat_lama`, `jabatan`, `eselon`, `alamat`, `telepon`, `pendidikan`) VALUES
(24, '1117206085_FOTO SUKERTI.jpeg', 'LUH PUTU SUKERTI', '196112311983032178', 'SEMPIDI', '1961-12-31', 'Perempuan', 'MENIKAH', '', 'Hindu', 'DINAS PERINDUSTRIAN DAN TENAGA KERJA KABUPATEN BADUNG', '2961/25103/AZ/08/19', 'PENATA MUDA TINGKAT I', NULL, NULL, NULL, NULL, NULL, 'FUNGSIONAL UMUM', 'II A', 'SMA', '-', 'JLN. NGURAH BENG GG.DEWA NO, 5 LINGKUNGAN BEBENGAN, MENGWI, KAN BADUNG'),
(25, '1960809595_FOTO RUDY.jpg', 'I WAYAN GEDE ADI SUPUTRA, SH', '196201151987031016', 'DENPASAR', '1964-11-01', 'Perempuan', 'MENIKAH', '', 'Hindu', 'DINAS PERINDUSTRIAN DAN TENAGA KERJA KABUPATEN BADUNG', '3448/25103/AZ/11/19', 'PEMBINA IV', NULL, NULL, NULL, NULL, NULL, 'KEPALA SEKSI USAHA MANDIRI DAN PERLUASAN', 'I A', 'S1', '-', 'JLN. TAUKU UMAR GG.CENDRAWASIH NO 16. KEC DENPASAR BARAT, KOTA DENPASAR'),
(26, '1423988255_FOTO KANDRI.jpeg', 'NI WAYAN KANDRI, SE', '196201082008012001', 'BADUNG', '1964-12-01', 'Perempuan', 'MENIKAH', '', 'Hindu', 'DINAS PERINDUSTRIAN DAN TENAGA KERJA KABUPATEN BADUNG', '3420/25103/AZ/11/19', 'PENATA MUDA TINGKAT I', NULL, 20, 15, NULL, NULL, 'FUNGSIONAL UMUM', 'II A', 'S1', '-', 'BR. CAMPUAN ASRI KAUH DALUNG PERMAI BLOCK BB 73 DESA DALUNG KECAMATAN KUTA UTARA KABUPATEN BADUNG'),
(27, '1431618832_WhatsApp Image 2022-01-25 at 13.18.11 (1).jpeg', 'Adipisci sunt itaqu', 'Vero doloribus ut qu', 'Aliquip eu non quos ', '1973-12-02', 'Perempuan', 'Velit quia elit num', '', 'Islam', 'Dolor in sunt facere', 'Vel magnam irure omn', 'Mollit omnis molesti', NULL, NULL, NULL, NULL, NULL, 'Voluptatem mollitia', 'Ut et placeat vero ', 'Similique laborum in', '+1 (405) 137-1782', 'Qui voluptas volupta'),
(28, '215475904_WhatsApp Image 2022-01-25 at 13.18.10.jpeg', 'Omnis non nemo aliqu', '123456789123456789', 'Ea fugiat laudantiu', '2018-05-06', 'Laki - laki', 'Consequatur ipsum t', '', 'Hindu', 'Voluptas sequi eu ex', 'Ab ad consequat Del', 'Omnis molestiae quib', NULL, NULL, NULL, NULL, NULL, 'Optio qui iusto obc', 'Quis obcaecati amet', 'Voluptates laboriosa', '+1 (602) 212-2632', 'Sed et dolorem sequi');

-- --------------------------------------------------------

--
-- Table structure for table `pensiun`
--

CREATE TABLE `pensiun` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `alamat_pensiun` text DEFAULT NULL,
  `berhenti_akhir_bulan` varchar(256) DEFAULT NULL,
  `tanggal_pensiun` date DEFAULT NULL,
  `masa_kerja_pensiun` varchar(255) DEFAULT NULL,
  `gaji_pokok` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pensiun`
--

INSERT INTO `pensiun` (`id`, `id_pegawai`, `nip`, `nama`, `unit_kerja`, `status`, `alamat_pensiun`, `berhenti_akhir_bulan`, `tanggal_pensiun`, `masa_kerja_pensiun`, `gaji_pokok`, `keterangan`) VALUES
(2, 24, '196112311983032178', 'LUH PUTU SUKERTI', 'DINAS PERINDUSTRIAN DAN TENAGA KERJA KABUPATEN BADUNG', 2, 'JLN. NGURAH BENG GG. DEWA NO.5 LINGKUNGAN BEBENGAN, MENGWI KAB BADUNG', '2019-12', '2020-01-01', '36', 3346800, '-'),
(3, 26, '196201082008012001', 'NI WAYAN KANDRI, SE', 'DINAS PERINDUSTRIAN DAN TENAGA KERJA KABUPATEN BADUNG', 2, 'Jl. Batukaru No.13', '2022-01', '2022-01-12', '20', 180400, '-');

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
-- Indexes for table `pensiun`
--
ALTER TABLE `pensiun`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pensiun`
--
ALTER TABLE `pensiun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
