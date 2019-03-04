-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2017 pada 09.55
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `studio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id`, `iduser`, `isi`, `tanggal`) VALUES
(1, 1, 'asdas', '2017-06-19'),
(2, 1, 'INformasi 2', '2017-06-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `ruangan` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`ruangan`, `jam`, `tanggal`) VALUES
('1', '08:00:00', '2017-06-13'),
('1', '09:00:00', '2017-06-13'),
('2', '08:00:00', '2017-06-14'),
('1', '08:00:00', '2017-06-16'),
('2', '08:00:00', '2017-06-15'),
('3', '08:00:00', '2017-06-19'),
('2', '08:00:00', '2017-06-18'),
('1', '08:00:00', '2017-06-14'),
('1', '08:00:00', '2017-06-15'),
('1', '08:00:00', '2017-06-17'),
('1', '08:00:00', '2017-06-18'),
('1', '09:00:00', '2017-06-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `no` int(5) NOT NULL DEFAULT '0',
  `id` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(15) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `nomor` varchar(10) NOT NULL,
  `lama` varchar(10) NOT NULL,
  `biaya` int(15) NOT NULL,
  `booking` varchar(27) NOT NULL,
  `umur` int(2) NOT NULL,
  `status` varchar(10) DEFAULT 'Masuk',
  `selesai` varchar(27) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpemesan` varchar(20) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `deposit` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `idpemesan`, `ruangan`, `jam`, `tanggal`, `deposit`, `status`) VALUES
(1, '1', '1', '08:00:00', '2017-06-13', 25000, 0),
(2, '1', '1', '09:00:00', '2017-06-13', 25000, 0),
(3, '1', '2', '08:00:00', '2017-06-14', 25000, 0),
(4, '1', '1', '08:00:00', '2017-06-16', 25000, 0),
(5, '1', '2', '08:00:00', '2017-06-15', 25000, 0),
(6, '1', '3', '08:00:00', '2017-06-19', 25000, 1),
(7, '1', '2', '08:00:00', '2017-06-18', 25000, 0),
(8, '1', '1', '08:00:00', '2017-06-14', 25000, 0),
(9, '1', '1', '08:00:00', '2017-06-15', 25000, 0),
(10, '1', '1', '08:00:00', '2017-06-17', 25000, 0),
(11, '1', '1', '08:00:00', '2017-06-18', 25000, 0),
(12, '7', '1', '09:00:00', '2017-06-15', 25000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `no` int(5) NOT NULL DEFAULT '0',
  `hari` varchar(7) NOT NULL,
  `nomor` varchar(10) NOT NULL,
  `jam` varchar(11) NOT NULL,
  `harga` int(10) NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`no`, `hari`, `nomor`, `jam`, `harga`, `status`) VALUES
(1, 'Senin', 'Ruangan 1', '07.00-08.00', 35000, 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruang`
--

CREATE TABLE IF NOT EXISTS `tbl_ruang` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_ruang`
--

INSERT INTO `tbl_ruang` (`id`, `nama`, `status`) VALUES
(1, 'ruangan 1', 0),
(2, 'ruangan 2', 0),
(3, 'ruangan 3', 0),
(4, 'ruangan 4', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(13) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `level` varchar(20) NOT NULL,
  `deposit` int(20) DEFAULT NULL,
  `stat` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `telp`, `user`, `pass`, `level`, `deposit`, `stat`) VALUES
(1, 'herman', 'pakem', '087', 'herman', 'admin', 'admin', 875000, 1),
(7, 'apem', 'jl mawar 21', '90', 'user', '1234', 'user', 25000, 1),
(8, 'aab', '', '', '', '', '', 25, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
