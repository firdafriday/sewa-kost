-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 10:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nama_rental` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `nama_rental`, `username`, `alamat`, `gender`, `no_telp`, `no_ktp`, `password`, `role_id`) VALUES
(22, 'admin', '', 'admin', 'Jl Mawar Putih no 56', 'Laki-laki', '08123456789', '0987654321', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(23, 'pemilik', 'Kost Tipe A', 'pemilik', 'Jl Jenita no 99', 'Perempuan', '083123456', '4312345689', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(24, 'pencari', '', 'pencari', 'Jl Kenangan no 57', 'Perempuan', '0886572345', '345698712', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(25, 'pemilik2', 'Kost Tipe B', 'pemilik2', 'Jl Indah Prima no 12', 'Laki-laki', '08734567345', '3456788765', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(26, 'pemilik3', 'Kost Tipe C', 'pemilik3', 'Jl Ubah Jalan no 65', 'Laki-laki', '0834565445', '34560987656', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(27, 'pemilik4', 'Apartemen A', 'pemilik4', 'Jl Indahsari no 64', 'Perempuan', '0897648765', '8786234567', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(28, 'pemilik5', 'Apartemen B', 'pemilik5', 'Jl Kereta Indah no 12', 'Perempuan', '0895434567', '7564897453', '827ccb0eea8a706c4c34a16891f84e7b', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kos`
--

CREATE TABLE `kos` (
  `id_kos` int(11) NOT NULL,
  `nama_rental` varchar(120) NOT NULL,
  `kode_type` varchar(120) NOT NULL,
  `merk` varchar(120) NOT NULL,
  `no_plat` varchar(200) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `ac` int(11) NOT NULL,
  `supir` int(11) NOT NULL,
  `mp3_player` int(11) NOT NULL,
  `central_lock` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kos`
--

INSERT INTO `kos` (`id_kos`, `nama_rental`, `kode_type`, `merk`, `no_plat`, `warna`, `tahun`, `status`, `harga`, `denda`, `ac`, `supir`, `mp3_player`, `central_lock`, `gambar`) VALUES
(21, 'Kost Tipe C', 'KMC', 'Kamar Indah 2', 'Jl Puri Indah no 12', '24 x 25', '2020', '0', 300000, 3000, 1, 1, 1, 1, 'kos.jpg'),
(22, 'Kost Tipe A', 'KMB', 'Best Kamar', 'Jl Danau no 56', '20 x 20', '2022', '1', 400000, 4000, 1, 1, 1, 1, 'apart.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `nama_payment` varchar(120) NOT NULL,
  `key_payment` varchar(120) NOT NULL,
  `atas_nama` varchar(120) DEFAULT NULL,
  `nama_rental` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `nama_payment`, `key_payment`, `atas_nama`, `nama_rental`) VALUES
(2, 'Bank BRI', '42367482374', 'Mang Group', 'Jaya Rental'),
(3, 'Bank Kai', '123', NULL, 'Murah Rental'),
(6, 'nro', 'ljk', NULL, 'Murah Rental'),
(7, 'jkjk', '899', 'fdsfs', 'Murah Rental'),
(8, 'Paypal', 'mang@mangkok.com', 'Mang Group', 'Jaya Rental'),
(9, 'BANK BRI', '478657865432656', 'Sejahtera Travel', 'Sejahtera Travel'),
(10, 'DANA', '08115656777', 'Sejahtera Travel', 'Sejahtera Travel'),
(11, 'OVO', '08115656777', 'Sejahtera Travel', 'Sejahtera Travel'),
(12, 'BANK BNI', '2367489773', 'Sejahtera Travel', 'Sejahtera Travel'),
(13, 'BANK MANDIRI', '3493439897432', 'Sejahtera Travel', 'Sejahtera Travel'),
(14, 'BANK BRI', '324349897689743', 'Permata Rental', 'Permata Rental'),
(15, 'BANK BNI', '2487539893', 'Permata Rental', 'Permata Rental'),
(16, 'BANK BRI', '47254587854765', 'Putra Riau Travel', 'Putra Riau Travel'),
(17, 'BANK BNI', '5247698584', 'Putra Riau Travel', 'Putra Riau Travel'),
(18, 'BANK MANDIRI', '4373487899322', 'Putra Riau Travel', 'Putra Riau Travel');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_rental` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_rental` varchar(50) NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `nama_rental` varchar(120) NOT NULL,
  `tanggal_rental` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `total_denda` varchar(120) NOT NULL DEFAULT '0',
  `tanggal_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL,
  `status_rental` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(130) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_rental`, `id_customer`, `id_kos`, `nama_rental`, `tanggal_rental`, `tanggal_kembali`, `harga`, `denda`, `total_denda`, `tanggal_pengembalian`, `status_pengembalian`, `status_rental`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(10, 9, 17, 'Sejahtera Travel', '2020-06-08', '2020-06-12', 800000, 100000, '58604166.666667', '2022-01-19', 'Kembali', 'Selesai', '009.PNG', 1),
(15, 20, 9, 'Putra Riau Travel', '2022-01-09', '2022-01-12', 300000, 45000, '90000', '2022-01-14', 'Kembali', 'Selesai', 'Bukti_Pembayaran_Contoh.jpg', 1),
(16, 21, 9, 'Putra Riau Travel', '2023-05-25', '2023-05-27', 300000, 45000, '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', 'wallpaperflare_com_wallpaper.jpg', 0),
(18, 24, 21, 'Kost Tipe C', '2023-05-25', '2023-05-27', 300000, 3000, '0', '2023-05-27', 'Belum Kembali', 'Belum Selesai', 'wallpaperflare_com_wallpaper1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `kode_type` varchar(10) NOT NULL,
  `nama_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `kode_type`, `nama_type`) VALUES
(1, 'KMC', 'Standard Room'),
(2, 'KMB', 'Superior Room'),
(3, 'KMA', 'Deluxe Room'),
(4, 'APA', 'Junior Suite'),
(5, 'APB', 'Single Room');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id_kos`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kos`
--
ALTER TABLE `kos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
