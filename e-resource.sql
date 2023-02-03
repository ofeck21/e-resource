-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2018 at 10:06 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-resource`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(10) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `jenis`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Mahasiswa'),
(4, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(35) NOT NULL,
  `ttl` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `status` varchar(35) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `ttl`, `alamat`, `jabatan`, `status`, `id_user`) VALUES
(2, '123456', 'Pamekasan, 21 November 1992', 'Pasanggar', 'Dosen WEB', 'Dosen Tetap', 2),
(3, '2521', 'Sampang, 25 Desember 1994', 'Bira Timur Sokobanah Sampang ', 'Dosen WEB ', 'Dosen Aktif', 13);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(150) NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'Teknik'),
(2, 'Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `ttl` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_user`, `ttl`, `alamat`, `jabatan`) VALUES
(1, 8, 'Pamekasan, 03 Maret 1989', 'Pademawu Pamekasan', 'Karyawan LP2M'),
(2, 16, 'Sampang, 04 April 1996', 'Karang Penang Sampang', 'Karyawan Fakultas');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `npm` varchar(35) NOT NULL,
  `ttl` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `fakultas` int(11) NOT NULL,
  `prodi` int(11) NOT NULL,
  `angkatan` varchar(35) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_user`, `npm`, `ttl`, `alamat`, `fakultas`, `prodi`, `angkatan`) VALUES
(1, 9, '123456', 'Pamekasan, 20 Agustus 1996', 'Bujur Barat', 1, 1, '2014'),
(2, 14, '1212', 'Sampang, 01 Januari 1996', 'Bira TimurSokobanahSampang', 1, 2, '2014'),
(3, 15, '123123', 'Pamekasan, 02 Februari 1995', 'Larangan Pamekasan', 2, 3, '2013');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `id_fakultas` int(11) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `prodi`) VALUES
(1, 1, 'Teknik Informatika'),
(2, 1, 'Sistem Informasi'),
(3, 2, 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `koreg` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` int(11) NOT NULL,
  `reg` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `akses` (`akses`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `koreg`, `nama`, `username`, `password`, `akses`, `reg`) VALUES
(1, '', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, '123', 'Mohammad Rofik', 'ofeck21', '', 2, 1),
(8, '9871', 'Agus Budiono', '', '', 4, 1),
(9, '7892', 'Hurdi', '', '', 3, 1),
(11, '2015.02.01.00067', 'Hananah', 'Han', '83832391027a1f2f4d46ef882ff3a47d', 2, 1),
(12, '12345', 'alief', 'al', '97282b278e5d51866f8e57204e4820e5', 2, 1),
(13, '25', 'Imamatur Rohmah', '', '', 2, 1),
(14, '1', 'Nur Umamah', '', '', 3, 1),
(15, '2', 'Kholifah', '', '', 3, 1),
(16, '42', 'Moh. Badri', '', '', 4, 1),
(17, '111', 'iim', 'iim', 'd78c060f6347e344f51a6ca296c8416b', 3, 1),
(18, '112', 'fix', 'fix', '8ab87d4fb3600cc53fc0c5c958a250b1', 2, 1),
(19, '113', 'coba', 'coba', 'c3ec0f7b054e729c5a716c8125839829', 4, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`akses`) REFERENCES `akses` (`id_akses`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
