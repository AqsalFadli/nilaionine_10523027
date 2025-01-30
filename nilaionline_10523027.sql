-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2025 pada 15.30
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilaionline_10523027`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`username`, `password`, `nama`) VALUES
('aqsal22', 'admin123', 'Aqsal Fadli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_mtkul` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `jam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `kode_mtkul`, `password`, `hari`, `jam`) VALUES
('030', 'Anton Abok', '001', '81dc9bdb52d04dc20036dbd8313ed055', 'Rabu', '07.00-08.00'),
('032', 'Iting Meledax', '002', '81dc9bdb52d04dc20036dbd8313ed055', '', '0'),
('0365', 'Napoleon Bonaparte', '003', 'admin123', 'Selasa', '9.30-12.00'),
('112', 'Mongol', '', '', 'Jumat', '07.00-08.30'),
('123', 'Eca Terangknlah', '007', '139e0493ea48dbe6814afe4690c61be5', '', '0'),
('131', 'Cokro', '', '', '', ''),
('7728', 'Raulee', '005', 'tula234', 'Senin', '12.00-13.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` char(10) NOT NULL,
  `jur` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `jur`, `password`) VALUES
(879, 'Udin Pelek', 'Laki-Laki', 'Sistem Informasi', '575c97f9a9af336898455e30b4f9995c'),
(3204, 'Cici Igel', 'Perempuan', 'Sistem Informasi', '98986c005e5def2da341b4e0627d4712'),
(1349, 'Paws Hurricane', 'Laki-Laki', 'Teknik Komputer', '6293cdbdcf5ed856163c6548e1a533a5'),
(555, 'Manusia Silver', 'Perempuan', 'Teknik Informatika', '81b073de9370ea873f548e31b8adc081'),
(102836, 'Hercules', 'Perempuan', 'Teknik Komputer', '5263e96c31e338c1710e5926783b37a9'),
(0, 'Onoki', '', '', ''),
(0, 'badak', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mtkul` varchar(10) NOT NULL,
  `nama_mtkul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mtkul`, `nama_mtkul`) VALUES
('001', 'Agama'),
('002', 'Pencak Silat'),
('003', 'Ilmu Pemerentihan'),
('004', 'Strategi bisnis'),
('007', 'Olaharga dan Jasmani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `nl_tugas` int(11) NOT NULL,
  `nl_uts` int(11) NOT NULL,
  `nl_uas` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`nl_tugas`, `nl_uts`, `nl_uas`, `nim`, `nip`) VALUES
(78, 67, 75, '1349', '7728'),
(95, 85, 90, '555', '7728'),
(100, 100, 100, '879', '123'),
(76, 67, 50, '1349', '032');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mtkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
