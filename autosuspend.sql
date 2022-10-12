-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 02:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autosuspend`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_layanan_pelanggan`
--

CREATE TABLE `akun_layanan_pelanggan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_paket_produk` int(11) NOT NULL,
  `akun_pppoe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama_produk`) VALUES
(1, 'Broadband'),
(2, 'Dedicated');

-- --------------------------------------------------------

--
-- Table structure for table `paket_produk`
--

CREATE TABLE `paket_produk` (
  `id_produk` int(11) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `nama_paket` varchar(25) NOT NULL,
  `profile` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(50) NOT NULL,
  `id_data_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_tabel_desa` int(10) NOT NULL,
  `no_kontak` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgllahir` date NOT NULL,
  `pekerjaan` text NOT NULL,
  `dll` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_langganan`
--

CREATE TABLE `status_langganan` (
  `id` int(12) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `id_akun_layanan` int(20) NOT NULL,
  `status_pelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` int(11) NOT NULL,
  `id_akun_layanan` int(11) NOT NULL,
  `tanggal_bayar` varchar(50) NOT NULL,
  `status_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_suspend`
--

CREATE TABLE `status_suspend` (
  `id` int(11) NOT NULL,
  `id_akun_layanan_pel` int(11) NOT NULL,
  `status_suspend` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_desa`
--

CREATE TABLE `tabel_desa` (
  `id` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kode_desa` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kab`
--

CREATE TABLE `tabel_kab` (
  `id` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `nama_kab` varchar(50) NOT NULL,
  `kode_kab` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kec`
--

CREATE TABLE `tabel_kec` (
  `id` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `nama_kec` varchar(50) NOT NULL,
  `kode_kec` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_log`
--

CREATE TABLE `tabel_log` (
  `id` int(11) NOT NULL,
  `log` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_log`
--

INSERT INTO `tabel_log` (`id`, `log`, `waktu`) VALUES
(1, 'user \'ini\' merubah status', '2022-05-13 06:43:21'),
(4, 'User admin melakukan login', '2022-05-17 03:19:02'),
(5, 'User admin melakukan login dengan ip ::1', '2022-05-17 03:49:56'),
(6, 'User admin gagal login', '2022-05-17 03:50:37'),
(7, 'User admin melakukan login dengan ip ::1', '2022-05-17 03:51:17'),
(8, 'User admin melakukan login dengan ip ::1', '2022-05-17 03:51:33'),
(9, 'User admin gagal login dengan ip ::1', '2022-05-17 03:51:55'),
(10, 'User adm gagal login dengan ip ::1', '2022-05-17 03:59:45'),
(11, 'User  melakukan logout dengan ip ::1', '2022-05-17 04:00:57'),
(12, 'User  melakukan logout dengan ip ::1', '2022-05-17 04:01:08'),
(13, 'User  melakukan logout dengan ip ::1', '2022-05-17 04:01:30'),
(14, 'User  melakukan logout dengan ip ::1', '2022-05-17 04:02:15'),
(15, 'User g gagal login dengan ip ::1', '2022-05-17 04:03:03'),
(16, 'User admin melakukan login dengan ip ::1', '2022-05-17 04:03:41'),
(17, 'User  melakukan logout dengan ip ::1', '2022-05-17 04:04:24'),
(18, 'User  melakukan logout dengan ip ::1', '2022-05-17 04:09:56'),
(19, 'User  melakukan logout dengan ip ::1', '2022-05-17 04:09:56'),
(20, 'User aaa gagal login dengan ip ::1', '2022-05-17 04:10:26'),
(21, 'User admin gagal login dengan ip ::1', '2022-05-17 04:14:27'),
(22, 'User admin melakukan login dengan ip ::1', '2022-05-17 04:24:28'),
(23, 'User admin melakukan logout dengan ip ::1', '2022-05-17 06:28:05'),
(24, 'User admin melakukan login dengan ip ::1', '2022-05-17 06:28:57'),
(25, 'User admin melakukan logout dengan ip ::1', '2022-05-17 06:31:17'),
(26, 'User  melakukan logout dengan ip ::1', '2022-05-17 06:31:25'),
(27, 'User  melakukan logout dengan ip ::1', '2022-05-17 06:31:25'),
(28, 'User  melakukan logout dengan ip ::1', '2022-05-17 06:32:37'),
(29, 'User  melakukan logout dengan ip ::1', '2022-05-17 06:34:02'),
(30, 'User  melakukan logout dengan ip ::1', '2022-05-17 06:37:56'),
(31, 'User  melakukan logout dengan ip ::1', '2022-05-17 06:37:57'),
(32, 'User aa gagal login dengan ip ::1', '2022-05-17 06:38:05'),
(33, 'User  melakukan logout dengan ip ::1', '2022-05-17 06:39:03'),
(34, 'User  melakukan logout dengan ip ::1', '2022-05-17 06:39:26'),
(35, 'User admin melakukan login dengan ip ::1', '2022-05-17 06:39:43'),
(36, 'User admin melakukan logout dengan ip ::1', '2022-05-17 06:41:50'),
(37, 'User admin melakukan logout dengan ip ::1', '2022-05-17 06:44:10'),
(38, 'User admin melakukan login dengan ip ::1', '2022-05-17 06:44:40'),
(39, 'User admin melakukan logout dengan ip ::1', '2022-05-17 07:17:12'),
(40, 'User admin melakukan logout dengan ip ::1', '2022-05-17 07:36:09'),
(41, 'User admin melakukan logout dengan ip ::1', '2022-05-17 07:41:53'),
(42, 'User admin melakukan login dengan ip ::1', '2022-05-17 07:42:02'),
(43, 'User admin melakukan logout dengan ip ::1', '2022-05-17 07:44:17'),
(44, 'User admin melakukan logout dengan ip ::1', '2022-05-17 07:45:16'),
(45, 'User  melakukan logout dengan ip ::1', '2022-05-17 07:45:18'),
(46, 'User admin melakukan login dengan ip ::1', '2022-05-17 07:45:58'),
(47, 'User admin melakukan logout dengan ip ::1', '2022-05-17 08:12:19'),
(48, 'User admin melakukan login dengan ip ::1', '2022-05-18 02:42:28'),
(49, 'User admin melakukan logout dengan ip ::1', '2022-05-18 03:03:28'),
(50, 'User okmelakukan logout IP Address ::1', '2022-05-18 03:11:23'),
(51, 'User coba error login username / password salah dengan IP Address ::1', '2022-05-18 03:14:03'),
(52, 'User oke gagal login dengan IP Address ::1', '2022-05-18 03:34:30'),
(53, 'User jajal gagal login dengan IP Address ::1', '2022-05-18 03:35:21'),
(54, 'User admin login dengan IP Address ::1', '2022-05-18 03:36:36'),
(55, 'User admin melakukan logout dengan ip ::1 dengan IP Address ::1', '2022-05-18 03:37:35'),
(56, 'User admin login dengan IP Address ::1', '2022-05-18 03:40:56'),
(57, 'User admin login dengan IP ::1', '2022-05-18 03:45:04'),
(58, 'User admin login dengan IP ::1', '2022-05-20 04:22:29'),
(59, 'User admin logout dengan IP ::1', '2022-05-20 04:29:19'),
(60, 'User admin login dengan IP ::1', '2022-05-20 04:32:02'),
(61, 'User admin login dengan IP ::1', '2022-05-20 08:09:38'),
(62, 'User admin logout dengan IP ::1', '2022-05-20 08:17:48'),
(63, 'User admin login dengan IP ::1', '2022-05-20 08:18:07'),
(64, 'User admin login dengan IP ::1', '2022-05-21 01:34:18'),
(65, 'User admin melakukan reaktivasi PWT19B00029@pusko.net', '2022-05-21 01:45:26'),
(66, 'User admin login dengan IP ::1', '2022-05-21 02:17:22'),
(67, 'User admin login dengan IP ::1', '2022-05-21 02:19:44'),
(68, 'User admin melakukan reaktivasi PWT19B00029@pusko.net', '2022-05-21 02:35:14'),
(69, 'User admin melakukan reaktivasi PWT19B00029@pusko.net', '2022-05-21 02:44:03'),
(70, 'User admin login dengan IP ::1', '2022-05-21 02:56:45'),
(71, 'User admin login', '2022-05-21 05:35:10'),
(72, 'User admin login', '2022-05-21 05:37:13'),
(73, 'User admin logout', '2022-05-21 05:41:35'),
(74, 'User admin login', '2022-05-21 05:41:46'),
(75, 'User admin logout', '2022-05-21 05:42:01'),
(76, 'User admin gagal login', '2022-05-21 05:42:09'),
(77, 'User admin login Via 10.5.255.202', '2022-05-21 05:56:52'),
(78, 'User admin logout Via 192.168.30.15', '2022-05-21 05:57:19'),
(79, 'User admin login Via 192.168.30.15', '2022-05-21 05:57:27'),
(80, 'User admin logout Via 192.168.30.15', '2022-05-21 05:58:10'),
(81, 'User admin login Via 192.168.30.15', '2022-05-21 05:58:22'),
(82, 'User admin logout Via 8.34.202.60', '2022-05-21 05:58:46'),
(83, 'User admin login Via 10.5.255.202', '2022-05-21 05:58:49'),
(84, 'User admin login Via 8.34.202.60', '2022-05-21 05:58:52'),
(85, 'User admin login Via 114.10.19.179', '2022-05-21 05:59:34'),
(86, 'User admin login Via 112.215.240.202', '2022-05-21 06:00:51'),
(87, 'User admin melakukan reaktivasi pelanggan ID 09809703453', '2022-05-21 06:37:45'),
(88, 'User admin logout Via 10.5.255.202', '2022-05-21 06:56:42'),
(89, 'User admin login Via 10.5.255.202', '2022-05-21 06:56:50'),
(90, 'User admin login Via 192.168.30.66', '2022-05-23 03:24:55'),
(91, 'User admin login Via 114.142.170.37', '2022-05-24 05:54:07'),
(92, 'User admin login Via 114.142.170.37', '2022-05-24 05:54:42'),
(93, 'User admin login Via 114.142.170.37', '2022-05-24 05:55:48'),
(94, 'User admin login Via 172.16.11.10', '2022-05-26 09:25:45'),
(95, 'User admin login Via 192.168.30.42', '2022-05-27 01:46:03'),
(96, 'User admin login Via 172.16.11.10', '2022-05-30 11:39:27'),
(97, 'User admin login Via 10.5.0.169', '2022-06-02 06:27:36'),
(98, 'User admin login Via 192.168.30.5', '2022-06-10 03:27:40'),
(99, 'User admin login Via 10.5.255.92', '2022-07-13 08:24:41'),
(100, 'User admin login Via 10.5.255.92', '2022-07-14 02:49:58'),
(101, 'User admin login Via 36.73.35.67', '2022-07-19 16:10:26'),
(102, 'User admin gagal login Via 10.5.255.65', '2022-08-01 01:22:27'),
(103, 'User admin login Via 10.5.255.65', '2022-08-01 01:22:31'),
(104, 'User autosuspend gagal login Via 160.177.71.191', '2022-08-11 00:17:18'),
(105, 'User admin login Via 10.5.255.59', '2022-08-15 04:13:56'),
(106, 'User admin login Via 103.170.22.19', '2022-08-19 15:31:52'),
(107, 'User admin login Via 10.5.255.1', '2022-08-31 04:45:47'),
(108, 'User admin login Via 10.5.255.242', '2022-09-28 04:46:21'),
(109, 'User admin login Via 10.5.255.242', '2022-09-28 07:01:40'),
(110, 'User admin login Via 10.5.255.242', '2022-09-29 01:06:21'),
(111, 'User admin login Via 10.5.255.242', '2022-09-29 08:48:15'),
(112, 'User admin logout Via 10.5.255.242', '2022-09-29 08:48:25'),
(113, 'User admin login Via 10.5.255.242', '2022-09-30 01:32:36'),
(114, 'User admin login Via 103.170.22.34', '2022-10-02 15:01:12'),
(115, 'User admin login Via 103.170.22.34', '2022-10-02 15:04:36'),
(116, 'User admin login Via 10.5.254.245', '2022-10-03 04:38:13'),
(117, 'User admin login Via 192.168.31.33', '2022-10-06 05:31:02'),
(118, 'User admin login Via 10.5.1.37', '2022-10-07 08:36:32'),
(119, 'User admin login Via ::1', '2022-10-11 15:09:50'),
(120, 'User admin login Via ::1', '2022-10-11 15:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_prov`
--

CREATE TABLE `tabel_prov` (
  `id` int(11) NOT NULL,
  `nama_prov` varchar(50) NOT NULL,
  `kode_prov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_layanan_pelanggan`
--
ALTER TABLE `akun_layanan_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_produk`
--
ALTER TABLE `paket_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pelanggan` (`id_data_pelanggan`);

--
-- Indexes for table `status_langganan`
--
ALTER TABLE `status_langganan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_suspend`
--
ALTER TABLE `status_suspend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_desa`
--
ALTER TABLE `tabel_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_kab`
--
ALTER TABLE `tabel_kab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_kec`
--
ALTER TABLE `tabel_kec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_prov`
--
ALTER TABLE `tabel_prov`
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
-- AUTO_INCREMENT for table `akun_layanan_pelanggan`
--
ALTER TABLE `akun_layanan_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paket_produk`
--
ALTER TABLE `paket_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_langganan`
--
ALTER TABLE `status_langganan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_suspend`
--
ALTER TABLE `status_suspend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_desa`
--
ALTER TABLE `tabel_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_kab`
--
ALTER TABLE `tabel_kab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_kec`
--
ALTER TABLE `tabel_kec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tabel_prov`
--
ALTER TABLE `tabel_prov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
