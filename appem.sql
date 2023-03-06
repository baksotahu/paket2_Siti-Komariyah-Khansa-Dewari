-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2023 pada 06.53
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level` int(1) NOT NULL,
  `aktif` int(1) NOT NULL,
  `id_kategori` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`, `no_telp`, `level`, `aktif`, `id_kategori`) VALUES
(60, 'siti komariyah khansa dewari', 'khansaa', 'e10adc3949ba59abbe56e057f20f883e', '3300330033003', 1, 0, 0),
(62, 'yunita chusnul', 'yunita', '827ccb0eea8a706c4c34a16891f84e7b', '2222222000000', 2, 0, 0),
(64, 'anwar sodik', 'anwar', '827ccb0eea8a706c4c34a16891f84e7b', '0000000000000', 1, 0, 0),
(65, 'bahrul amin', 'bahrul', '827ccb0eea8a706c4c34a16891f84e7b', '1111111111111', 1, 0, 0),
(66, 'lukman hidayat', 'lukman', '827ccb0eea8a706c4c34a16891f84e7b', '777777777777', 2, 0, 0),
(67, 'rahmat rendi', 'rendy', '827ccb0eea8a706c4c34a16891f84e7b', '8888888888888', 2, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masyarakat`
--

CREATE TABLE `tbl_masyarakat` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kode_negara` varchar(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_masyarakat`
--

INSERT INTO `tbl_masyarakat` (`nik`, `nama`, `username`, `password`, `kode_negara`, `no_telp`, `email`, `aktif`) VALUES
('0000000000000000', 'ridwan kamil', 'ridwan', '827ccb0eea8a706c4c34a16891f84e7b', '', '5555555555555', '', 1),
('0808080808080808', 'siti komariyah khansa dewari', 'khansa', '81dc9bdb52d04dc20036dbd8313ed055', '', '085806236623', '', 1),
('2222222222222222', 'solihin mustopa', 'solihin', '827ccb0eea8a706c4c34a16891f84e7b', '', '3333333333333', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `id_kategori` int(1) NOT NULL,
  `status_diterima` enum('diterima','ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `id_kategori`, `status_diterima`) VALUES
(1677810455, '2023-03-03', '0808080808080808', 'Keresahan masyarakat akibat adanya balap liar di.Jln Menuju Hatimu,no.07 Jember', 'balap-liar.jpg', 1, 0, 'diterima'),
(1677903838, '2023-03-04', '0000000000000000', 'adanya penyebaran ulat bulu di desa paleran', 'ulat_bulu.jpeg', 1, 0, 'diterima'),
(1677903942, '2023-03-04', '2222222222222222', 'keresahan akibat adanya pedagang bakso yg menggunakan daging tikus di desa semboro', 'bakso-tikus.jpg', 2, 0, 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tanggapan`
--

CREATE TABLE `tbl_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD CONSTRAINT `tbl_pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_masyarakat` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  ADD CONSTRAINT `tbl_tanggapan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`),
  ADD CONSTRAINT `tbl_tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `tbl_pengaduan` (`id_pengaduan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
