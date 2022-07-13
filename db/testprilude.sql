-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2022 pada 10.40
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testprilude`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `absenid` int(11) NOT NULL,
  `idkaryawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `absen` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`absenid`, `idkaryawan`, `tanggal`, `absen`) VALUES
(1, 2, '2022-07-13', 'H'),
(2, 2, '2022-07-12', 'T'),
(3, 2, '2022-07-11', 'I'),
(4, 2, '2022-07-10', 'A'),
(5, 3, '2022-07-13', 'H'),
(6, 4, '2022-07-13', 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `aksesid` int(11) NOT NULL,
  `akses` enum('SA','ADM') NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`aksesid`, `akses`, `description`) VALUES
(1, 'SA', 'SuperAdmin'),
(2, 'ADM', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailkaryawan`
--

CREATE TABLE `detailkaryawan` (
  `detailid` int(11) NOT NULL,
  `idkaryawan` int(11) NOT NULL,
  `namakaryawan` varchar(255) NOT NULL,
  `noteleponkaryawan` varchar(15) NOT NULL,
  `emailkaryawan` varchar(100) NOT NULL,
  `kotalahirkaryawan` varchar(25) NOT NULL,
  `tanggallahirkaryawan` date NOT NULL,
  `nikkaryawan` varchar(24) NOT NULL,
  `alamatkaryawan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailkaryawan`
--

INSERT INTO `detailkaryawan` (`detailid`, `idkaryawan`, `namakaryawan`, `noteleponkaryawan`, `emailkaryawan`, `kotalahirkaryawan`, `tanggallahirkaryawan`, `nikkaryawan`, `alamatkaryawan`) VALUES
(5, 2, 'Lukman Aditiya Anggara', '089510396303', 'bunga.langensari@gmail.com', 'Bekasi', '2004-04-06', '123456789', 'Indonesia'),
(6, 3, 'Lukman Aditiya Anggara', '089510396303', 'bunga.langensari@gmail.com', 'Bekasi', '2004-04-06', '123456789', 'Indonesia'),
(7, 4, 'Lukman', '089510396303', 'bunga.langensari@gmail.com', 'Bekasi', '2004-04-06', '123456789', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawanid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`karyawanid`, `username`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'lukman@karyawan.com', '$2y$10$qB.Yqw1UbBl2.XN2PNwmV.B7GHxeJ3TLp6BIYnI2q.qtUUQnCtDlO', 'lukmankaryawancom-Karyawan.jpg', '2022-07-12 16:10:39', '2022-07-12 16:10:39'),
(3, 'lukmanaditiyaanggara@karyawan.com', '$2y$10$No9UmwU7MvxzhY/xpy/4deNHJpf9r4C8.nU86j0Wi7VaALlcmuCMC', 'lukmanaditiyaanggarakaryawancom-Karyawan.png', '2022-07-13 05:22:46', '2022-07-13 05:23:08'),
(4, 'lukmanaditiya@karyawan.com', '$2y$10$smAr3AnM5C3r6eQ/n4iBhOij7trkDArmJUauaqVbXUR.cyps/UNti', 'lukmanaditiyakaryawancom-Karyawan.png', '2022-07-13 05:26:25', '2022-07-13 05:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `idakses` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `idakses`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Data User', '', 'fas fa-fw fa-users', 'Y'),
(2, 2, 'Absen', 'adminn/Absen', 'fas fa-fw fa-table', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenus`
--

CREATE TABLE `submenus` (
  `id` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `sub_url` varchar(255) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `submenus`
--

INSERT INTO `submenus` (`id`, `menuid`, `sub_title`, `sub_url`, `is_active`) VALUES
(1, 1, 'Admin', 'adminn/User', 'Y'),
(2, 1, 'Karyawan', 'adminn/Karyawan', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `namauser` varchar(255) NOT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `notelepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `idakses` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `namauser`, `jeniskelamin`, `notelepon`, `alamat`, `username`, `password`, `idakses`, `created_at`, `updated_at`, `photo`) VALUES
(2, 'Lukman Aditiya Anggara', 'Laki-laki', '089510396303', 'Indonesia', 'lukman@admin.com', '$2y$10$33L8BCM.R6rlTimx47DujOrVzB7wJeHFYXYFOZ06C2muimPeX94U2', 2, '2022-07-12 10:20:07', '2022-07-12 10:20:07', 'lukmanadmincom-.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`absenid`),
  ADD KEY `iddetailkaryawan` (`idkaryawan`),
  ADD KEY `idkaryawan` (`idkaryawan`);

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`aksesid`);

--
-- Indeks untuk tabel `detailkaryawan`
--
ALTER TABLE `detailkaryawan`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `idkaryawan` (`idkaryawan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawanid`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idakses` (`idakses`);

--
-- Indeks untuk tabel `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menuid` (`menuid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `idakses` (`idakses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `absenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `aksesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detailkaryawan`
--
ALTER TABLE `detailkaryawan`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `karyawanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idakses`) REFERENCES `akses` (`aksesid`);

--
-- Ketidakleluasaan untuk tabel `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_ibfk_1` FOREIGN KEY (`menuid`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
