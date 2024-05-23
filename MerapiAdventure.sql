-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 11:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_privatejet`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(15) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `id_login` int(15) NOT NULL,
  `id_motor` int(15) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lama_sewa` int(15) NOT NULL,
  `total_harga` int(15) NOT NULL,
  `konfirmasi_pembayaran` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `kode_booking`, `id_login`, `id_motor`, `ktp`, `nama`, `alamat`, `no_tlp`, `tanggal`, `lama_sewa`, `total_harga`, `konfirmasi_pembayaran`, `tgl_input`) VALUES
(1, 'KD1', 1, 5, '3121929', 'Yahya', 'Garut', '021222111444', '01-11-2021', 5, 112000000, 'Berhasil', '02-11-2021'),
(2, 'KD2', 1, 6, '938232939', 'farhan', 'Jogja', '09890876', '12-11-2021', 3, 137000000, 'Belum Berhasil', '13-11-2021'),
(3, '1701099232', 6, 6, '3232323232', 'adasda', 'dadsadsa', '212121212', '2023-11-27', 1, 70252, 'Sedang di proses', '2023-11-27'),
(4, '1702265692', 9, 6, '3232323232', 'adasda', 'dadsadsa', '085603470105', '2023-12-11', 1, 70519, 'Sedang di proses', '2023-12-11'),
(5, '1702265962', 9, 6, '3232323232', 'adasda', 'dadsadsa', '085603470105', '2023-12-11', 1, 70906, 'Sedang di proses', '2023-12-11'),
(6, '1702266995', 10, 6, '3232323232', 'jono', 'dadsadsa', '085603470105', '2023-12-11', 1, 70774, 'Sedang di proses', '2023-12-11'),
(7, '1702269878', 10, 6, '3232323232', 'jono', 'dadsadsa', '085603470105', '2023-12-11', 1, 70851, 'Sedang di proses', '2023-12-11'),
(8, '1702278204', 11, 6, '3232323232', 'doni', 'dadsadsa', '085603470105', '2023-12-11', 1, 70426, 'Pembayaran di terima', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `infoweb`
--

CREATE TABLE `infoweb` (
  `id` int(15) DEFAULT NULL,
  `corp_name` varchar(255) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_rek` text DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infoweb`
--

INSERT INTO `infoweb` (`id`, `corp_name`, `tlp`, `alamat`, `email`, `no_rek`, `update_at`) VALUES
(1, 'Merapi Adventure', '088212312435', 'Cangkringan, Sleman, Daerah Istimewa Yogyakarta', 'MerapiAdventure@gmail.com', 'BCA A/N Martono 112123124324', '2024-05-23 08:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(15) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(12, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(14, 'adi', 'adi', '7360409d967a24b667afc33a8384ec9e', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(15) NOT NULL,
  `no_seri` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id_motor`, `no_seri`, `merk`, `harga`, `deskripsi`, `status`, `gambar`) VALUES
(6, 'AB2002EI', 'Nmax 2023', 70000, 'Motor yang nyaman dengan perawatan mesin berkala, tersedia 2 helm dan 1 jas hujan ponco untuk penyewa', 'Tersedia', 'nmax.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(15) DEFAULT NULL,
  `id_booking` int(255) DEFAULT NULL,
  `no_rekening` int(255) DEFAULT NULL,
  `nama_rekening` varchar(255) DEFAULT NULL,
  `nominal` int(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`) VALUES
(3, 1, 98123244, 'Rudi', 112000000, '02-11-2021'),
(4, 2, 87943531, 'Yanza', 137000000, '13-11-2021'),
(NULL, 5, 4545345, 'jono', 70000, '2023-12-11'),
(NULL, 4, 4545345, 'jono', 70000, '2023-12-11'),
(NULL, 6, 4545345, 'jono', 70000, '2023-12-11'),
(NULL, 3, 2999898, 'uni', 20000, '2023-12-11'),
(NULL, 8, 4545345, 'doni', 70000, '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_pengambilan` int(15) NOT NULL,
  `kd_booking` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `denda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `wisata` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `wisata`) VALUES
(1, 'mumi.jpg'),
(2, 'air.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_pengambilan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id_pengambilan` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
