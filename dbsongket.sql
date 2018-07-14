-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 07:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsongket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('sidiq', '827ccb0eea8a706c4c34a16891f84e7b', 'M Sidiq Fisa Malaka');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telpon` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `email`, `password`, `nama`, `no_telpon`, `alamat`) VALUES
(4, 'siddiq@gmail.com', 'siddiq', 'muhammad siddiq fisamalaka', '081805772571', 'lombok timur kec.suralaga');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `kd_detail_pesanan` int(5) NOT NULL,
  `kode_pesanan` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `status_order` varchar(20) NOT NULL,
  `bukti_transfer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`kd_detail_pesanan`, `kode_pesanan`, `id_customer`, `id_pengiriman`, `tanggal_pesan`, `status_order`, `bukti_transfer`) VALUES
(7, '2017120629775', 4, 1, '2017-12-06', 'dibayar', 'gambar/2017120629775Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kain`
--

CREATE TABLE `jenis_kain` (
  `kd_jenis_kain` int(11) NOT NULL,
  `nm_jenis_kain` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kain`
--

INSERT INTO `jenis_kain` (`kd_jenis_kain`, `nm_jenis_kain`) VALUES
(1, 'katun'),
(2, 'sutra');

-- --------------------------------------------------------

--
-- Table structure for table `kain_masuk`
--

CREATE TABLE `kain_masuk` (
  `kd_kain_masuk` int(5) NOT NULL,
  `kd_motif` varchar(10) NOT NULL,
  `tgl_kain_masuk` date NOT NULL,
  `jmlh_kain_masuk` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kain_masuk`
--

INSERT INTO `kain_masuk` (`kd_kain_masuk`, `kd_motif`, `tgl_kain_masuk`, `jmlh_kain_masuk`) VALUES
(16, '54', '2017-12-06', 100),
(17, '58', '2017-12-06', 100),
(18, '59', '2017-12-06', 100),
(19, '62', '2017-12-06', 100),
(20, '53', '2017-12-06', 100),
(21, '55', '2017-12-06', 100),
(22, '56', '2017-12-06', 100),
(23, '57', '2017-12-06', 100),
(24, '60', '2017-12-06', 100),
(25, '61', '2017-12-06', 100);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komen`, `nama`, `email`, `komentar`, `tanggal`) VALUES
(2, 'muhammad siddiq fisamalaka', 'siddiq@gmail.com', 'Coba Komentar', '2017-12-11'),
(3, 'muhammad siddiq fisamalaka', 'siddiq@gmail.com', 'Malik Nyobak\r\n', '2017-12-11'),
(4, 'muhammad siddiq fisamalaka', 'siddiq@gmail.com', 'barangnya masih ada gak gannn saya pengen psen seratusjfjdkfjkdjfdjk barangnya masih ada gak gannn saya pengen psen seratusjfjdkfjkdjfdjk barangnya masih ada gak gannn saya pengen psen seratusjfjdkfjkdjfdjk barangnya masih ada gak gannn saya pengen psen seratusjfjdkfjkdjfdjk barangnya masih ada gak gannn saya pengen psen seratusjfjdkfjkdjfdjk', '2017-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `motif`
--

CREATE TABLE `motif` (
  `kd_motif` int(4) NOT NULL,
  `kd_jenis_kain` int(11) NOT NULL,
  `nm_motif` varchar(10) NOT NULL,
  `gambar` text NOT NULL,
  `harga` int(30) NOT NULL,
  `stock` int(30) NOT NULL,
  `dijual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motif`
--

INSERT INTO `motif` (`kd_motif`, `kd_jenis_kain`, `nm_motif`, `gambar`, `harga`, `stock`, `dijual`) VALUES
(53, 1, 'anteng', 'gambar/antenganteng.jpg', 600000, 100, 0),
(54, 2, 'keker', 'gambar/kekerkeker.jpg', 500000, 100, 0),
(55, 1, 'nanas', 'gambar/nanasnanas.jpg', 700000, 100, 0),
(56, 1, 'panah', 'gambar/panahpanah.jpg', 500000, 100, 0),
(57, 1, 'ragi genep', 'gambar/ragi genepragi genep.jpg', 400000, 100, 0),
(58, 2, 'bulan mega', 'gambar/bulan megantungbulan megantung.jpg', 400000, 100, 0),
(59, 2, 'bintang re', 'gambar/bintang remawebintang remawe.jpg', 300000, 100, 0),
(60, 1, 'bulan berk', 'gambar/bulan berkurungbulan berkurung.jpg', 500000, 100, 0),
(61, 1, 'bintang mp', 'gambar/bintang mpetbintang mpet.jpg', 300000, 100, 0),
(62, 2, 'subhanala', 'gambar/subhanalasubhanala.jpg', 800000, 90, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `nm_pengiriman` varchar(30) NOT NULL,
  `biaya_pengiriman` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `nm_pengiriman`, `biaya_pengiriman`) VALUES
(1, 'JNE', 80000),
(2, 'POST', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `kode_pesanan` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `kd_motif` int(11) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status_pesanan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `kode_pesanan`, `id_customer`, `kd_motif`, `jumlah_pesanan`, `status_pesanan`) VALUES
(12, '2017120629775', 4, 62, 5, 'Terkirim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`kd_detail_pesanan`);

--
-- Indexes for table `jenis_kain`
--
ALTER TABLE `jenis_kain`
  ADD PRIMARY KEY (`kd_jenis_kain`);

--
-- Indexes for table `kain_masuk`
--
ALTER TABLE `kain_masuk`
  ADD PRIMARY KEY (`kd_kain_masuk`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`kd_motif`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `kd_detail_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jenis_kain`
--
ALTER TABLE `jenis_kain`
  MODIFY `kd_jenis_kain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kain_masuk`
--
ALTER TABLE `kain_masuk`
  MODIFY `kd_kain_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `motif`
--
ALTER TABLE `motif`
  MODIFY `kd_motif` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
