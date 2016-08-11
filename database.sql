-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2016 at 12:03 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--
CREATE DATABASE IF NOT EXISTS `e-commerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e-commerce`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `id_merk` int(3) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga` int(7) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `jenis_lengan` enum('panjang','pendek') NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_merk`, `nama_barang`, `harga`, `warna`, `jenis_lengan`, `stok`, `gambar`) VALUES
(1, 1, 'Batik Mega Mendung', 170000, 'Biru', 'pendek', 12, '17062016104927.jpg'),
(2, 2, 'Batik Keraton', 320000, 'Merah', 'panjang', 11, '26072016133521.jpg'),
(3, 3, 'Cokelat Bunga-bunga', 190000, 'Cokelat', 'pendek', 10, '26072016140355.jpg'),
(4, 4, 'Batik Pinrang', 420000, 'Merah', 'panjang', 39, '26072016140414.jpg'),
(5, 5, 'Batik Minang Kabau', 500000, 'Cokelat', 'pendek', 8, '26072016140533.jpg'),
(6, 2, 'Corak bunga-bunga', 170000, 'Merah', 'pendek', 4, '26072016140550.jpg'),
(7, 6, 'Baru Lagi', 90000, 'Merah', 'pendek', 40, '26072016140604.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `email`, `password`) VALUES
(1, 'karyawan', 'karyawan@gmail.com', '9e014682c94e0f2cc834bf7348bda428'),
(2, 'Pemilik Toko', 'pemilik@gmail.com', '58399557dae3c60e23c78606771dfa3d');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(5) NOT NULL,
  `id_order` int(10) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `tgl_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(3) NOT NULL,
  `nama_merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(1, 'Batik Cirebon'),
(2, 'Batik Jogja'),
(3, 'Batik Solo'),
(4, 'Batik Sulawesi'),
(5, 'Batik Minang'),
(6, 'Merk Baru');

-- --------------------------------------------------------

--
-- Table structure for table `ongkos_kirim`
--

CREATE TABLE `ongkos_kirim` (
  `id_ongkos_kirim` int(3) NOT NULL,
  `kota` varchar(10) NOT NULL,
  `tarif` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkos_kirim`
--

INSERT INTO `ongkos_kirim` (`id_ongkos_kirim`, `kota`, `tarif`) VALUES
(1, 'Yogyakarta', 12000),
(2, 'Solo', 7000),
(3, 'Magelang', 13000),
(4, 'Klaten', 13000),
(5, 'Jakarta', 21000),
(6, 'Bekasi', 23000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_ongkos_kirim` int(3) NOT NULL,
  `total_bayar` int(7) NOT NULL,
  `status_konfirmasi` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `alamat_pengiriman` varchar(50) NOT NULL,
  `tgl_order` date NOT NULL,
  `tgl_tempo_order` date NOT NULL,
  `status_kirim` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `bukti_pembayaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `telpon`, `alamat`, `password`) VALUES
(1, 'sanusi', 'sanusi@gmail.com', '081221788921', 'Jl. Kaliurang KM 14 DS Lodadi RT 12 RW 01 No 201', 'd8420ee1c07a593566004a1dd88dd207'),
(2, 'oza', 'oza@gmail.com', '081255664788', 'Jl. Condong Catur RT 07 RW 01 No 102', '6231957517f0dee07453546e772c3c9b'),
(5, 'ramita', 'ramita@gmail.com', '08123456789', 'Jl. Senayan Jakarta Barat No 301 DKI Jakarta', 'be56e66270ab8b5d27808974f1794c85'),
(6, 'imam digmi', 'imam.digmi@gmail.com', '089827462378', 'Jl Cikedung terisi kecamatan cikedung No 04 Indram', 'eaccb8ea6090a40a98aa28c071810371');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
  ADD PRIMARY KEY (`id_ongkos_kirim`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ongkos_kirim` (`id_ongkos_kirim`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_buku_tamu` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
  MODIFY `id_ongkos_kirim` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_ongkos_kirim`) REFERENCES `ongkos_kirim` (`id_ongkos_kirim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
