-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2019 pada 01.50
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
-- Database: `edukasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `nim` varchar(10) NOT NULL,
  `nama_alumni` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `tahun_masuk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`nim`, `nama_alumni`, `alamat`, `no_hp`, `tahun_masuk`) VALUES
('0707015006', 'Awang Hardi Sastrodiharjo', 'Jl. Kesuma Bangsa No. 14', '087894436511', 2007),
('0707035021', 'Veliyana Londong Allo', 'Jl. Diponegoro No. 422', '081269004339', 2007),
('0801035122', 'Maya Sri Tyas', 'Jl. R. E. Martadinata No. 17', '085247889122', 2008),
('1002025175', 'Junharsanti', 'Jl. Gatot Subroto No. 98', '081264490718', 2010),
('1007055103', 'Galih Yudha Saputra', 'Jl. Kenari No. 66', '085241772610', 2010),
('1307055002', 'Yongky Dwi Guritno', 'Jl. Durian No. 12', '081352771900', 2013),
('1307055004', 'Indra Cahya Primukti', 'Jl. Turi Putih No. 40', '087814425915', 2013),
('1307055005', 'Eko Wiji Setio Budianto', 'Jl. Pakis No. 102', '085281992514', 2013),
('1307055050', 'Oktaniar Putri Pratami', 'Jl. W.R. Supratman No. 7', '081299820144', 2013),
('1307055064', 'Pujianto', 'Jl. Perdamaian No. 9', '081371662019', 2013),
('1315015005', 'Ayu Puspita Wulandari', 'Jl. Kucing No. 32', '081244128566', 2013),
('1315015021', 'Novita Winata Mutiara Pratiwi', 'Jl. Sawi No. 4', '081358199201', 2013),
('1315015103', 'Wahyu Indrawan', 'Jl. Tomat No. 21', '087851023991', 2013),
('1315015131', 'Ahmad Firza Nugraha', 'Jl. Awang Long No. 81', '085230192283', 2013),
('1315015135', 'Muh Jamil', 'Jl. Ahmad Yani No 64', '081340192011', 2013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni_prodi`
--

CREATE TABLE `alumni_prodi` (
  `id_alumni_prodi` varchar(5) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kd_prodi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni_prodi`
--

INSERT INTO `alumni_prodi` (`id_alumni_prodi`, `nim`, `kd_prodi`) VALUES
('AP001', '1002025175', 'PR001'),
('AP002', '1007055103', 'PR002'),
('AP003', '0801035122', 'PR003'),
('AP004', '0707035021', 'PR004'),
('AP005', '0707015006', 'PR005'),
('AP006', '1307055002', 'PR002'),
('AP007', '1307055004', 'PR002'),
('AP008', '1307055005', 'PR002'),
('AP009', '1307055050', 'PR002'),
('AP010', '1307055064', 'PR002'),
('AP011', '1315015005', 'PR006'),
('AP012', '1315015021', 'PR006'),
('AP013', '1315015103', 'PR006'),
('AP014', '1315015131', 'PR006'),
('AP015', '1315015135', 'PR006'),
('AP016', '0707015006', 'PR008'),
('AP017', '0801035122', 'PR006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` varchar(5) NOT NULL,
  `nama_beasiswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`) VALUES
('BS001', 'Bidikmisi'),
('BS002', 'PPA'),
('BS003', 'LPDP'),
('BS004', 'KSE'),
('BS005', 'Beasiswa BNI'),
('BS006', 'Kaltim Cemerlang'),
('BS007', 'BBM'),
('BS008', 'Osaka Jepang'),
('BS009', 'Pertamina'),
('BS010', 'Djarum'),
('BS011', 'Toyota/Astra'),
('BS012', 'Taspen'),
('BS013', 'BUMN'),
('BS014', 'Karya Salemba Empat'),
('BS015', 'Bakrie Foundation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `kd_fakultas` varchar(5) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `laman_web` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`kd_fakultas`, `nama_fakultas`, `alamat`, `no_hp`, `laman_web`) VALUES
('FK001', 'Ilmu Sosial dan Ilmu Politik', 'Jalan Tanah Grogot, Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75119', '0541743820', 'fisip-unmul.ac.id'),
('FK002', 'Matematika dan Ilmu Pengetahuan Alam', 'Jl. Barong Tongkok, Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75242', '0541749140', 'fmipa.unmul.ac.id'),
('FK003', 'Ekonomi', 'Jl. Tanah Grogot No. 1, Samarinda Ulu, Gunung Kelua, Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalim', '0541738916', 'feb.unmul.ac.id'),
('FK004', 'Hukum', 'Jalan Sambaliung No.1, Sempaja Sel., Samarinda Utara, Kota Samarinda, Kalimantan Timur 75119', '05417774145', 'fh.unmul.ac.id'),
('FK005', 'Ilmu Komputer dan Teknologi Informasi', 'Jl. MA Pahu, Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75242', '0541735133', 'fkti.unmul.ac.id'),
('FK006', 'Pertanian', 'Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243', '0541738347', 'faperta.unmul.ac.id'),
('FK007', 'Kehutanan', 'JL. Ki Hajar Dewantara, 75116, PO Box 1013, Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalimantan Tim', '0541735089', 'fahutan.unmul.ac.id'),
('FK008', 'Keguruan dan Ilmu Pendidikan', 'Jl. Banggeris No.89, Karang Anyar, Sungai Kunjang, Kota Samarinda, Kalimantan Timur 75127', '0541743929', 'fkip.unmul.ac.id'),
('FK009', 'Perikanan dan Ilmu Kelautan', 'Jl. Gunung Tabur, Samarinda Ulu, Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75242', '0541749482', 'fpik.unmul.ac.id'),
('FK010', 'Teknik', 'Jalan Sambaliung No.9 Sempaja Sel., Samarinda Utara, Kota Samarinda, Kalimantan Timur 75117', '0541736834', 'ft.unmul.ac.id'),
('FK011', 'Kedokteran', 'Jl. Krayan, Gn. Kelua, Samarinda Utara, Kota Samarinda, Kalimantan Timur 75119', '0541748581', 'fk.unmul.ac.id'),
('FK012', 'Kesehatan Masyarakat', 'Sempaja Sel., Samarinda Utara, Kota Samarinda, Kalimantan Timur 75242', '05417031343', 'fkm.unmul.ac.id'),
('FK013', 'Farmasi', 'Jl. Penajam, Gunung Kelua, Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75242', '0541739491', 'farmasi.unmul.ac.id'),
('FK014', 'Ilmu Budaya', 'Jl. Pulau Flores No.1, Pelabuhan, Samarinda Kota, Kota Samarinda, Kalimantan Timur 75112', '0541734582', 'fib.unmul.ac.id'),
('FK015', 'Pascasarjana', 'Jalan Ki Hajar Dewantara 2, Gn. Kelua, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243', '0541732146', 'pasca.unmul.ac.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(5) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `masa_jabatan` varchar(10) NOT NULL,
  `kuota` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `masa_jabatan`, `kuota`) VALUES
('JB001', 'Rektor', '4', 1),
('JB002', 'Wakil Rektor', '4', 4),
('JB003', 'Dekan', 'tdk tetap', 14),
('JB004', 'Wakil Dekan', 'tdk tetap', 28),
('JB005', 'Dosen', 'tdk tetap', 500),
('JB006', 'Ketua Satuan Pengawas', 'tdk tetap', 1),
('JB007', 'Ketua Lembaga', 'tdk tetap', 28),
('JB008', 'Sekretaris Lembaga', 'tdk tetap', 28),
('JB009', 'Kepala Biro', 'tdk tetap', 84),
('JB010', 'Kepala Bagian', 'tdk tetap', 4),
('JB011', 'Kasubbag', 'tdk tetap', 140),
('JB012', 'Ketua Jurusan', 'tdk tetap', 92),
('JB013', 'Koordinator Prodi', 'tdk tetap', 46),
('JB014', 'Kepala BPU', '4', 1),
('JB015', 'Wakil BPU', '4', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga`
--

CREATE TABLE `lembaga` (
  `id_lembaga` varchar(5) NOT NULL,
  `nama_lembaga` varchar(30) NOT NULL,
  `laman_web` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lembaga`
--

INSERT INTO `lembaga` (`id_lembaga`, `nama_lembaga`, `laman_web`) VALUES
('LB001', 'LP3M', 'lp3m.unmul.ac.id'),
('LB002', 'LP2M', 'lp2m.unmul.ac.id'),
('LB003', 'SPI', 'spi.unmul.ac.id'),
('LB004', 'UPT TIK', 'ict.unmul.ac.id'),
('LB005', 'BEM KM', 'bemkm.unmul.ac.id'),
('LB006', 'UPT Perpustakaan', 'perpustakaan.unmul.ac.id/web/'),
('LB007', 'UPT Balai Bahasa', 'balai-bahasa.unmul.ac.id/'),
('LB008', 'UPT Layanan Internasional', 'io.unmul.ac.id/'),
('LB009', 'UPT Perkasa', 'perkasa.unmul.ac.id/'),
('LB010', 'UPT Kearsipan', 'kearsipan.unmul.ac.id/'),
('LB011', 'UPT LSHK Pusrehut', 'pusrehut.unmul.ac.id/'),
('LB012', 'ULS Halal Centre', ''),
('LB013', 'ULS Perpajakan', ''),
('LB014', 'ULS Sains dan Keteknikan', ''),
('LB015', 'ULS Perhutanan Sosial', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `kd_prodi` varchar(5) NOT NULL,
  `id_beasiswa` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `kd_prodi`, `id_beasiswa`) VALUES
('0707015063', 'Agus Prianto', 'PR005', 'BS006'),
('0807015018', 'Ade Yayan Septian', 'PR005', 'BS012'),
('1101015293', 'Rajib Muntaha', 'PR007', 'BS010'),
('1201015390', 'Abdul Rahman', 'PR007', 'BS003'),
('1401045041', 'Abdul Aziz Ferharevi', 'PR007', 'BS005'),
('1707065007', 'Aina Syafrianti Wildani', 'PR014', 'BS011'),
('1707065025', 'Anggi Winda Mustika', 'PR014', 'BS015'),
('1715015003', 'Ahmad Mufli Hasan', 'PR006', 'BS002'),
('1715015011', 'Thoriq F.', 'PR006', 'BS001'),
('1715015012', 'Wiyatni Nur Isarah Maulwi', 'PR006', 'BS004'),
('1715015021', 'Fitri Ameliani Syawalidah', 'PR006', 'BS001'),
('1715015040', 'Muhammad Alief Septian Ditya', 'PR006', 'BS003'),
('1807065016', 'Aprillia Rinjani', 'PR014', 'BS011'),
('1807065020', 'Andre Setiawan', 'PR014', 'BS006'),
('1807065023', 'Benny Maryam Halim', 'PR014', 'BS005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_lembaga`
--

CREATE TABLE `mahasiswa_lembaga` (
  `id_mahasiswa_lembaga` varchar(5) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `id_lembaga` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa_lembaga`
--

INSERT INTO `mahasiswa_lembaga` (`id_mahasiswa_lembaga`, `nim`, `id_lembaga`) VALUES
('ML001', '1715015003', 'LB004'),
('ML002', '1715015011', 'LB001'),
('ML003', '1715015012', 'LB005'),
('ML004', '1715015021', 'LB002'),
('ML005', '1715015040', 'LB003'),
('ML006', '0707015063', 'LB013'),
('ML007', '0707015063', 'LB005'),
('ML008', '0807015018', 'LB003'),
('ML009', '1101015293', 'LB011'),
('ML010', '1101015293', 'LB013'),
('ML011', '1807065016', 'LB004'),
('ML012', '1807065016', 'LB010'),
('ML013', '1707065007', 'LB003'),
('ML014', '1401045041', 'LB001'),
('ML015', '1807065023', 'LB004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat_unmul`
--

CREATE TABLE `pejabat_unmul` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL,
  `pendidikan` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pejabat_unmul`
--

INSERT INTO `pejabat_unmul` (`nip`, `nama`, `status`, `pendidikan`) VALUES
('196208241988031002', 'Prof. Dr. Ir. Mustofa Agung Sardjono', 'Aktif', 'S3'),
('196208241988031003', 'Dr. Ir. H. Encik Akhmad Syaifudin, M.P.', 'Aktif', 'S3'),
('196208241988031004', 'Dr. Bohari Yusuf, M. Si', 'Aktif', 'S3'),
('196212311991031024', 'Prof. Dr. H. Masjaya, M.Si', 'Aktif', 'S3'),
('196605131992032003', 'Dr. Justina Ade Judiarni, SE., MM', 'Aktif', 'S3'),
('196703081992031001', 'Dr. Ir. Abdunnur, M.Si', 'Aktif', 'S3'),
('196811141993032001', 'Dr. Tetra Hidayati, SE, M.Si', 'Aktif', 'S3'),
('197007092005011002', 'Purwadi, SE, M.Si', 'Aktif', 'S3'),
('197607262006042001', 'Andi Tejawati, S.Sos., M.Si', 'Aktif', 'S2'),
('197703292003122001', 'Uni W. Sagena, M.Si., Ph.D.', 'Aktif', 'S3'),
('198004042012121003', 'Edy Budiman, S.Pd., M.T.', 'Aktif', 'S2'),
('198408062015042002', 'Ummul Hairah, S.Pd., M.T.', 'Aktif', 'S2'),
('198511032014042002', 'Masna Wati, S.Si., M.T.', 'Aktif', 'S2'),
('198811062015042002', 'Novianti Puspitasari, S.Kom., M.Eng.', 'Aktif', 'S2'),
('199305222018032001', 'Heni Rahayu Rahmawati, S.ST., MM', 'Aktif', 'S2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat_unmul_fakultas`
--

CREATE TABLE `pejabat_unmul_fakultas` (
  `id_pejabat_unmul_fakultas` varchar(5) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `kd_fakultas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pejabat_unmul_fakultas`
--

INSERT INTO `pejabat_unmul_fakultas` (`id_pejabat_unmul_fakultas`, `nip`, `kd_fakultas`) VALUES
('PUF01', '196208241988031002', 'FK015'),
('PUF02', '196208241988031003', 'FK015'),
('PUF03', '196208241988031004', 'FK015'),
('PUF04', '196212311991031024', 'FK015'),
('PUF05', '196605131992032003', 'FK003'),
('PUF06', '196703081992031001', 'FK015'),
('PUF07', '196811141993032001', 'FK003'),
('PUF08', '197007092005011002', 'FK003'),
('PUF09', '197607262006042001', 'FK005'),
('PUF10', '197703292003122001', 'FK015'),
('PUF11', '198004042012121003', 'FK005'),
('PUF12', '198408062015042002', 'FK005'),
('PUF13', '198511032014042002', 'FK005'),
('PUF14', '198811062015042002', 'FK005'),
('PUF15', '199305222018032001', 'FK015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat_unmul_jabatan`
--

CREATE TABLE `pejabat_unmul_jabatan` (
  `id_pejabat_unmul_jabatan` varchar(5) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_jabatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pejabat_unmul_jabatan`
--

INSERT INTO `pejabat_unmul_jabatan` (`id_pejabat_unmul_jabatan`, `nip`, `id_jabatan`) VALUES
('PUJ01', '196208241988031002', 'JB002'),
('PUJ02', '196208241988031003', 'JB002'),
('PUJ03', '196208241988031004', 'JB002'),
('PUJ04', '196212311991031024', 'JB001'),
('PUJ05', '196605131992032003', 'JB005'),
('PUJ06', '196703081992031001', 'JB002'),
('PUJ07', '196811141993032001', 'JB005'),
('PUJ08', '197007092005011002', 'JB005'),
('PUJ09', '197607262006042001', 'JB005'),
('PUJ10', '197703292003122001', 'JB007'),
('PUJ11', '198004042012121003', 'JB012'),
('PUJ12', '198408062015042002', 'JB005'),
('PUJ13', '198511032014042002', 'JB013'),
('PUJ14', '198811062015042002', 'JB005'),
('PUJ15', '199305222018032001', 'JB005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` varchar(5) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `kd_fakultas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `nama_prodi`, `kd_fakultas`) VALUES
('PR001', 'Ilmu Pemerintahan', 'FK001'),
('PR002', 'Ilmu Komputer', 'FK002'),
('PR003', 'Akuntansi', 'FK003'),
('PR004', 'Kimia', 'FK002'),
('PR005', 'Statistika', 'FK002'),
('PR006', 'Teknik Informatika', 'FK005'),
('PR007', 'Ekonomi Islam', 'FK003'),
('PR008', 'Ilmu Sosiatri', 'FK001'),
('PR009', 'Agroekoteknologi', 'FK006'),
('PR010', 'Pendidikan Kimia', 'FK008'),
('PR011', 'Ilmu Lingkungan', 'FK015'),
('PR012', 'Profesi Apoteker', 'FK013'),
('PR013', 'Petro dan Oleo Kimia', 'FK010'),
('PR014', 'Matematika', 'FK002'),
('PR015', 'Teknik Geologi', 'FK010');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `alumni_prodi`
--
ALTER TABLE `alumni_prodi`
  ADD PRIMARY KEY (`id_alumni_prodi`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kd_fakultas`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kd_prodi` (`kd_prodi`),
  ADD KEY `id_beasiswa` (`id_beasiswa`);

--
-- Indeks untuk tabel `mahasiswa_lembaga`
--
ALTER TABLE `mahasiswa_lembaga`
  ADD PRIMARY KEY (`id_mahasiswa_lembaga`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- Indeks untuk tabel `pejabat_unmul`
--
ALTER TABLE `pejabat_unmul`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `pejabat_unmul_fakultas`
--
ALTER TABLE `pejabat_unmul_fakultas`
  ADD PRIMARY KEY (`id_pejabat_unmul_fakultas`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kd_fakultas` (`kd_fakultas`);

--
-- Indeks untuk tabel `pejabat_unmul_jabatan`
--
ALTER TABLE `pejabat_unmul_jabatan`
  ADD PRIMARY KEY (`id_pejabat_unmul_jabatan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nama_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`),
  ADD KEY `kd_fakultas` (`kd_fakultas`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alumni_prodi`
--
ALTER TABLE `alumni_prodi`
  ADD CONSTRAINT `alumni_prodi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `alumni` (`nim`),
  ADD CONSTRAINT `alumni_prodi_ibfk_2` FOREIGN KEY (`kd_prodi`) REFERENCES `prodi` (`kd_prodi`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kd_prodi`) REFERENCES `prodi` (`kd_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_beasiswa`) REFERENCES `beasiswa` (`id_beasiswa`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa_lembaga`
--
ALTER TABLE `mahasiswa_lembaga`
  ADD CONSTRAINT `mahasiswa_lembaga_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `mahasiswa_lembaga_ibfk_2` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id_lembaga`);

--
-- Ketidakleluasaan untuk tabel `pejabat_unmul_fakultas`
--
ALTER TABLE `pejabat_unmul_fakultas`
  ADD CONSTRAINT `pejabat_unmul_fakultas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pejabat_unmul` (`nip`),
  ADD CONSTRAINT `pejabat_unmul_fakultas_ibfk_2` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`);

--
-- Ketidakleluasaan untuk tabel `pejabat_unmul_jabatan`
--
ALTER TABLE `pejabat_unmul_jabatan`
  ADD CONSTRAINT `pejabat_unmul_jabatan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pejabat_unmul` (`nip`),
  ADD CONSTRAINT `pejabat_unmul_jabatan_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
