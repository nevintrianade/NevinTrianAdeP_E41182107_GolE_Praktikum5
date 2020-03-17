-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2020 pada 15.59
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hutan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hewan`
--

CREATE TABLE `hewan` (
  `KD_HEWAN` int(11) NOT NULL,
  `NAMA_HEWAN` varchar(20) DEFAULT NULL,
  `JENIS` varchar(20) DEFAULT NULL,
  `DESKRIPSI` varchar(100) DEFAULT NULL,
  `GAMBAR` varchar(50) DEFAULT NULL,
  `JUMLAH_JANTAN` int(11) DEFAULT NULL,
  `JUMLAH_BETINA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hewan`
--

INSERT INTO `hewan` (`KD_HEWAN`, `NAMA_HEWAN`, `JENIS`, `DESKRIPSI`, `GAMBAR`, `JUMLAH_JANTAN`, `JUMLAH_BETINA`) VALUES
(1, 'gajah', 'mamalia', 'gajah adalah hewan yang memiliki belalai', 'gajah.jpg', 3, 2),
(2, 'harimau', 'mamalia', 'harimau adalah hewan bertaring', 'harimau.jpg', 10, 10),
(5, 'badak', 'mamalia', 'badak adalah hewan bercula', 'badak.jpg', 3, 4),
(6, 'orangutan', 'mamalia', 'orangiutana adalah binatang sejenis kera', 'orangutan.jpg', 5, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keturunan`
--

CREATE TABLE `keturunan` (
  `KD_KET` int(11) NOT NULL,
  `KD_HEWAN` int(11) NOT NULL,
  `TGLLAHIR_HEWAN` date DEFAULT NULL,
  `JUMLAH_KET_JANTAN` int(11) DEFAULT NULL,
  `JUMLAH_KET_BETINA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keturunan`
--

INSERT INTO `keturunan` (`KD_KET`, `KD_HEWAN`, `TGLLAHIR_HEWAN`, `JUMLAH_KET_JANTAN`, `JUMLAH_KET_BETINA`) VALUES
(1, 1, '2020-03-02', 1, NULL),
(2, 2, '2020-03-03', 3, 1),
(4, 2, '2020-03-19', 2, 3);

--
-- Trigger `keturunan`
--
DELIMITER $$
CREATE TRIGGER `betina1` AFTER INSERT ON `keturunan` FOR EACH ROW BEGIN
	UPDATE hewan SET JUMLAH_BETINA=JUMLAH_BETINA+NEW.JUMLAH_KET_BETINA
    WHERE KD_HEWAN=NEW.KD_HEWAN;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jantan1` AFTER INSERT ON `keturunan` FOR EACH ROW BEGIN
	UPDATE hewan SET JUMLAH_JANTAN=JUMLAH_JANTAN+NEW.JUMLAH_KET_JANTAN
    WHERE KD_HEWAN=NEW.KD_HEWAN;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meninggal`
--

CREATE TABLE `meninggal` (
  `KD_MEN` int(11) NOT NULL,
  `KD_HEWAN` int(11) NOT NULL,
  `PENYEBAB` varchar(50) DEFAULT NULL,
  `TGL_MEN` date DEFAULT NULL,
  `JUMLAH_MEN_JANTAN` int(11) DEFAULT NULL,
  `JUMLAH_MEN_BETINA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meninggal`
--

INSERT INTO `meninggal` (`KD_MEN`, `KD_HEWAN`, `PENYEBAB`, `TGL_MEN`, `JUMLAH_MEN_JANTAN`, `JUMLAH_MEN_BETINA`) VALUES
(1, 1, 'sakit', '2020-03-02', NULL, 2),
(2, 2, 'dimakan gajah', '2020-03-02', NULL, 2),
(3, 2, 'sakit hati', '2020-03-10', 2, NULL),
(4, 2, 'sakit hati lagi', '2020-03-03', 5, 6);

--
-- Trigger `meninggal`
--
DELIMITER $$
CREATE TRIGGER `betina` AFTER INSERT ON `meninggal` FOR EACH ROW BEGIN
	UPDATE hewan SET JUMLAH_BETINA=JUMLAH_BETINA-NEW.JUMLAH_MEN_BETINA
    WHERE KD_HEWAN=NEW.KD_HEWAN;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jantan` AFTER INSERT ON `meninggal` FOR EACH ROW BEGIN
	UPDATE hewan SET JUMLAH_JANTAN=JUMLAH_JANTAN-NEW.JUMLAH_MEN_JANTAN
    WHERE KD_HEWAN=NEW.KD_HEWAN;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `USERNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `NAMA` varchar(20) DEFAULT NULL,
  `TGLLAHIR_USER` date DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `JK_USER` varchar(10) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `FOTO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`USERNAME`, `EMAIL`, `PASSWORD`, `NAMA`, `TGLLAHIR_USER`, `ALAMAT`, `JK_USER`, `STATUS`, `FOTO`) VALUES
('nevin', 'nevin@gmail.com', '57dd6150d6302a88892a0c5e09dfc7fc', 'nevin trian ade', '2020-01-27', 'Letjend Sutoyo 1s', 'laki-laki', 'admin', 'pp.jpg'),
('nt', 'nt', '25930e3036f13852cb0b29694bbab611', 'nt', '2020-03-18', 'nt', 'laki-laki', 'karyawan', 'pp.jpg'),
('trian', 'trian@gmail.com', 'c7425058b5ec3bae83fbc109f1b7fe7d', 'trian ade putera', '2000-01-27', 'Sutoyo 1', 'laki-laki', 'karyawan', 'pp5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`KD_HEWAN`);

--
-- Indeks untuk tabel `keturunan`
--
ALTER TABLE `keturunan`
  ADD PRIMARY KEY (`KD_KET`),
  ADD KEY `FK_MENDAPAT` (`KD_HEWAN`);

--
-- Indeks untuk tabel `meninggal`
--
ALTER TABLE `meninggal`
  ADD PRIMARY KEY (`KD_MEN`),
  ADD KEY `FK_MEMPUNYAI` (`KD_HEWAN`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hewan`
--
ALTER TABLE `hewan`
  MODIFY `KD_HEWAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `keturunan`
--
ALTER TABLE `keturunan`
  MODIFY `KD_KET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `meninggal`
--
ALTER TABLE `meninggal`
  MODIFY `KD_MEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keturunan`
--
ALTER TABLE `keturunan`
  ADD CONSTRAINT `FK_MENDAPAT` FOREIGN KEY (`KD_HEWAN`) REFERENCES `hewan` (`KD_HEWAN`);

--
-- Ketidakleluasaan untuk tabel `meninggal`
--
ALTER TABLE `meninggal`
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`KD_HEWAN`) REFERENCES `hewan` (`KD_HEWAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
