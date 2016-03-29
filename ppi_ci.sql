-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jan 2016 pada 08.25
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppi_ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `person`
--

CREATE TABLE `person` (
  `id` int(3) NOT NULL,
  `mhs_nim` bigint(9) NOT NULL,
  `mhs_nama` varchar(30) NOT NULL,
  `mhs_alamat` varchar(30) NOT NULL,
  `mhs_jk` varchar(6) NOT NULL,
  `mhs_tm` int(4) NOT NULL,
  `mhs_ttl` date NOT NULL,
  `mhs_asal` varchar(25) NOT NULL,
  `mhs_jurusan` varchar(35) NOT NULL,
  `mhs_agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `person`
--

INSERT INTO `person` (`id`, `mhs_nim`, `mhs_nama`, `mhs_alamat`, `mhs_jk`, `mhs_tm`, `mhs_ttl`, `mhs_asal`, `mhs_jurusan`, `mhs_agama`) VALUES
(2, 120103036, 'Agus Tri Haryanto', 'Sukoharjo', 'PRIA', 2012, '1991-08-08', 'STM BP 1 Sukoharjo', 'TI', 'ISLAM'),
(3, 120103037, 'Agustina Rahmawati', 'Ngawi', 'WANITA', 2012, '1994-08-14', 'SMA Negeri 1 Ngawi', 'TI', 'ISLAM'),
(4, 120103039, 'Aji Budi Susilo', 'Kartosuro', 'PRIA', 2012, '1994-10-10', 'SMK Negeri 9 Surakarta', 'TI', 'ISLAM'),
(5, 120103039, 'Alfian Dwi Budiyanto', 'Boyolali', 'PRIA', 2012, '1993-12-11', 'SMK Negeri 9 Surakarta', 'TI', 'ISLAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
