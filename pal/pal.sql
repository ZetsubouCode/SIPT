-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Sep 2020 pada 17.39
-- Versi server: 10.3.23-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u9097916_pal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `gaji_pokok` varchar(20) NOT NULL,
  `jam_lembur` int(11) NOT NULL,
  `uang_lembur` double NOT NULL,
  `total_gaji` double NOT NULL,
  `bulan_transfer` varchar(20) NOT NULL,
  `tgl_transfer` varchar(20) NOT NULL,
  `jam_transfer` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `nip`, `nama`, `no_rek`, `gaji_pokok`, `jam_lembur`, `uang_lembur`, `total_gaji`, `bulan_transfer`, `tgl_transfer`, `jam_transfer`) VALUES
(1, '1234567890', 'Dedi Apriadi', '1234567890000', '5000000', 10, 289017, 5289017, 'Juli', '18/07/2017', '12:01:25'),
(2, '1234567890', 'Dedi Apriadi', '1234567890000', '5000000', 3, 86705, 5086705, 'Agustus', '17/08/2017', '07:49:43'),
(3, '1234567891', 'Ahmad Ridwan', '4121212121121212121', '5000000', 5, 144508, 5144508, 'Agustus', '17/08/2017', '09:17:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jab` varchar(4) NOT NULL,
  `n_jab` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `n_jab`) VALUES
('J001', 'Admin'),
('J002', 'Manager'),
('J003', 'Keuangan'),
('J004', 'Pekerja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gaji_pokok` varchar(20) NOT NULL,
  `no_rek` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_jab` varchar(4) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `sp` enum('Kontrak','Tetap') NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `gaji_pokok`, `no_rek`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `tgl_masuk`, `id_jab`, `foto`, `sp`, `tgl_selesai`) VALUES
('admin', 'Devita Septiana', '3500000', '223232323232323', 'Jakarta', '1982-04-02', 'P', 'Kalibata', '2013-11-19', 'J001', '721949info.php', 'Kontrak', '2020-11-23'),
('1234567890', 'Dedi Apriadi', '5000000', '1232324242424', 'Jakarta', '1987-05-03', 'L', 'Kalibata Selatan', '2014-10-08', 'J002', '6893001_176309352l.jpg', 'Kontrak', '2021-12-21'),
('1234567891', 'Ahmad Ridwan', '5000000', '1232324242424', 'Jakarta', '1960-05-04', 'L', 'Jl. Bangka 1', '2011-08-18', 'J002', '', 'Tetap', '0000-00-00'),
('672017188', 'sarkasi liau', '', '', 'papua', '0000-00-00', '', '', '0000-00-00', 'J004', '', '', '0000-00-00'),
('1234567', 'deni', '200000', '4384083859', 'papua', '1981-03-15', 'L', 'gfkfkkff', '2018-12-17', 'J001', '', 'Kontrak', '0000-01-01'),
('88888', 'Budi', '0', '', 'Yogyakarta', '1986-05-23', 'L', 'Jakarta', '2021-01-29', 'J001', '', 'Kontrak', '2020-09-23'),
('018086002', 'Anggun Rizkiono, S.T', '0', '', '-', '0000-00-00', 'L', '-', '2018-08-20', 'J004', '', 'Kontrak', '0000-00-00'),
('18086002', 'Anggun Rizkiono, S.T', '0', '', '-', '0000-00-00', 'L', '-', '2018-08-20', 'J004', '', 'Kontrak', '0000-00-00'),
('9999', 'Mikael', '0', '', 'Yogyakarta', '1986-02-14', 'L', 'jakarta', '2020-03-21', 'J002', '', 'Tetap', '0000-00-00'),
('1234', 'sarkasi liau', '0', '', 'papua', '1986-03-14', 'L', 'busidfdje', '2020-02-18', 'J003', '', 'Kontrak', '0000-00-00'),
('5632', 'Anggun Rizkiono,', '0', '', 'dhjdg', '1986-04-15', 'L', 'iuweduwkeg', '2017-09-16', 'J001', '', 'Kontrak', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` varchar(50) NOT NULL,
  `passid` varchar(50) NOT NULL,
  `level_user` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `passid`, `level_user`) VALUES
('admin', 'admin', 1),
('1234567890', 'admin', 3),
('1234567891', 'admini', 3),
('672017188', '', 3),
('1234567', '', 3),
('88888', '', 3),
('018086002', '', 3),
('18086002', '', 3),
('9999', '', 3),
('1234', '', 3),
('5632', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jab`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
