-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 05:30 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` char(5) NOT NULL,
  `kd_nim` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `level`, `kd_nim`) VALUES
(9, 'mufli', 'boboiboy', 'user', '1715015003'),
(10, 'admin', 'admin', 'admin', '02'),
(11, 'ss', 'ss', 'user', '43'),
(12, 'kk', 'kk', 'user', '69'),
(15, '44', '44', 'user', '45345');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(30) NOT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `pengarang` varchar(30) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `penerbit` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `cover` varchar(30) DEFAULT NULL,
  `kd_fakultas` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`isbn`, `jenis`, `pengarang`, `judul`, `penerbit`, `status`, `cover`, `kd_fakultas`) VALUES
('23432', 'sdasd', 'fdvdf', 'xs', 'x', 'dfvdfv', 'vfdvdfvd', '6'),
('31', 'dadw', 'sdf', 'sdfs', 'dsfs', 'sdfs', 'dsf', '5'),
('3432', 'sdf', 'dsf', 'dsf', 'dsf', 'dsf', '5c05f477e1fb1.jpg', '5'),
('657', 'asds', 'asda', 'asdasd', 'sdasad', 'asdsasd', '5c05ebb24de33.png', '5'),
('65765', 'rdgdfg', 'fdgd', 'dfgdfg', 'fdg', 'fdgd', '5c0601a155ee0.jpg', '4'),
('gfb', 'fgb', 'gfb', 'gbf', 'fgb', 'gfb', 'gfb', '4');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` char(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
('1', 'Fakultas Ilmu Komputer dan Teknologi Informasi'),
('10', 'Fakultas Kesehatan Masyarakat'),
('11', 'Fakultas Matematika dan Ilmu Pengetahuan Alam'),
('12', 'Fakultas Perikanan dan Ilmu Kelautan'),
('13', 'Fakultas Pertanian'),
('14', 'Fakultas Teknik'),
('2', 'Fakultas Ekonomi dan Bisnis'),
('3', 'Fakultas Farmasi'),
('4', 'Fakultas Hukum'),
('5', 'Fakultas Ilmu Budaya'),
('6', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
('7', 'Fakultas Kedokteran'),
('8', 'Fakultas Keguruan dan Ilmu Pendidikan'),
('9', 'Fakultas Kehutanan');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nim` char(10) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` char(13) DEFAULT NULL,
  `kd_fakultas` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`gambar`, `nama`, `nim`, `alamat`, `no_hp`, `kd_fakultas`) VALUES
('', 'admin', '02', NULL, NULL, '1'),
('', 'Ahmad Mufli Hasan', '1715015003', 'Jl. Bayam', '081348171027', '1'),
('', 'sdas', '43', 'sefsf', '234234', '5'),
('5c060255d409e.png', 'Thoriq Firdhusyi Hany Pratama', '45345', '43534453', '345354', '4'),
('', 'loki', '69', 'dfgdv', '9876', '3');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `peminjam` char(10) NOT NULL,
  `buku` varchar(30) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `peminjam`, `buku`, `tgl_pinjam`, `tgl_kembali`, `denda`) VALUES
(11, '1715015003', '31', '2018-12-04', '2018-12-11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akun_ibfk_1` (`kd_nim`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `buku_ibfk_1` (`kd_fakultas`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `mahasiswa_ibfk_1` (`kd_fakultas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_ibfk_1` (`peminjam`),
  ADD KEY `transaksi_ibfk_2` (`buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`kd_nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`peminjam`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`buku`) REFERENCES `buku` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
