-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2019 pada 19.15
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samsatonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nama` varchar(50) NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nama`, `email`, `password`) VALUES
('Ahmad Mufli Hasan', 'afumadomufuri@gmail.com', 'boboiboy'),
('muhammad rizky fadillah', 'mrizkyfadillah@gmail.com', 'rizky123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `kode_bank` char(3) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`kode_bank`, `nama`) VALUES
('002', 'BANK BRI'),
('008', 'BANK MANDIRI'),
('009', 'BANK BNI'),
('011', 'BANK DANAMON'),
('014', 'BANK BCA'),
('016', 'BANK MAYBANK'),
('019', 'BANK PANIN'),
('022', 'BANK CIMB NIAGA'),
('028', 'BANK OCBC NISP'),
('200', 'BANK BTN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE `motor` (
  `no_kendaraan` varchar(10) NOT NULL,
  `rangka` varchar(30) NOT NULL,
  `tangki` int(2) NOT NULL,
  `mesin` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `motor`
--

INSERT INTO `motor` (`no_kendaraan`, `rangka`, `tangki`, `mesin`, `harga`) VALUES
('KT 4778 DA', 'SIRUVW938H9RW3', 8, 'SUDV-218RU0', 12500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pajak`
--

CREATE TABLE `pajak` (
  `id_pajak` int(3) NOT NULL,
  `denda` int(10) NOT NULL,
  `sumbangan` int(10) NOT NULL,
  `pajak` int(10) NOT NULL,
  `no_kendaraan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pajak`
--

INSERT INTO `pajak` (`id_pajak`, `denda`, `sumbangan`, `pajak`, `no_kendaraan`) VALUES
(14, 15000, 35000, 350000, 'KT 4778 DA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_bank` char(3) DEFAULT NULL,
  `no_kendaraan` varchar(10) NOT NULL,
  `email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tanggal`, `kode_bank`, `no_kendaraan`, `email`) VALUES
(2183022, '2019-04-24', '200', 'KT 4778 DA', 'afumadomufuri@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama` varchar(50) NOT NULL,
  `nik` char(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `nik`, `alamat`, `username`, `password`) VALUES
('Abduh', '1650091', 'Jl. Suwandi', 'abduh', 'bacod');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_motor`
--

CREATE TABLE `user_motor` (
  `id_user_motor` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `no_kendaraan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_motor`
--

INSERT INTO `user_motor` (`id_user_motor`, `nik`, `no_kendaraan`) VALUES
(10, '1650091', 'KT 4778 DA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`kode_bank`);

--
-- Indeks untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`no_kendaraan`);

--
-- Indeks untuk tabel `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id_pajak`),
  ADD KEY `no_kendaraan` (`no_kendaraan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `kode_bank` (`kode_bank`),
  ADD KEY `no_kendaraan` (`no_kendaraan`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `user_motor`
--
ALTER TABLE `user_motor`
  ADD PRIMARY KEY (`id_user_motor`),
  ADD KEY `nik` (`nik`),
  ADD KEY `no_kendaraan` (`no_kendaraan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id_pajak` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_motor`
--
ALTER TABLE `user_motor`
  MODIFY `id_user_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pajak`
--
ALTER TABLE `pajak`
  ADD CONSTRAINT `pajak_ibfk_1` FOREIGN KEY (`no_kendaraan`) REFERENCES `motor` (`no_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_kendaraan`) REFERENCES `motor` (`no_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`email`) REFERENCES `admin` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`kode_bank`) REFERENCES `bank` (`kode_bank`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_motor`
--
ALTER TABLE `user_motor`
  ADD CONSTRAINT `user_motor_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_motor_ibfk_2` FOREIGN KEY (`no_kendaraan`) REFERENCES `motor` (`no_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
