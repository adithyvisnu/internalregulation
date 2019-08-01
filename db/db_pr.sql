-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 06:33 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pr`
--

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `desk_pekerjaan` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `keterangan` longtext NOT NULL,
  `status` enum('Waiting','On Progress','Closed') NOT NULL,
  `upload_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `desk_pekerjaan`, `tgl_mulai`, `tgl_berakhir`, `keterangan`, `status`, `upload_file`) VALUES
(1, 'Membuat kerajinan tangan dari lidi', '2018-09-07', '2018-09-18', '<p>Bahan pokok belum terkumpul semua</p>', 'Waiting', ''),
(2, 'Membuat CRUD menggunakan PHP Framework CI', '2018-09-12', '2018-09-30', '<p>Untuk CREATE UPDATE proses sudah bisa, dan untuk READ dan DELETE proses masih belum bisa.</p>', 'On Progress', ''),
(3, 'Membuat flowchart proses produksi', '2018-09-16', '2018-10-12', '<p>Flowchart untuk proses produksi fiber optic sudah di kerjakan dan dikirimkan melalui email pada bp.coomot ke email <a href=\"mailto:coomotcode@gmail.com\" target=\"_blank\" rel=\"noopener noreferrer\">coomotcode@gmail.com</a></p>', 'Closed', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','karyawan') NOT NULL DEFAULT 'administrator',
  `last_login` datetime NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'noavatar.png',
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `alamat`, `telp`, `username`, `password`, `level`, `last_login`, `avatar`, `active`) VALUES
(1, 'Coomot', 'coomot.blogspot.com', '087823896226', 'administrator', '$2y$12$GqRxBDHtMnvSiVaBrs.INu85szqViRUNMiKPOLI7wuGTP0Vg2CHui', 'administrator', '2018-09-06 11:19:32', 'coomot.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
