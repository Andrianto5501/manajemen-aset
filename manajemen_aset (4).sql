-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2021 pada 05.21
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_aset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) UNSIGNED NOT NULL,
  `nomor` varchar(11) DEFAULT NULL,
  `sub_nomor` varchar(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `no_aset` varchar(20) DEFAULT NULL,
  `tercatat` varchar(255) DEFAULT NULL,
  `kode_lokasi` varchar(255) DEFAULT NULL,
  `kode_perkap` varchar(20) DEFAULT NULL,
  `kondisi_aset` varchar(255) DEFAULT NULL,
  `uraian_aset` text DEFAULT NULL,
  `uraian_perkap` text DEFAULT NULL,
  `kode_ruang` varchar(20) DEFAULT NULL,
  `uraian_ruang` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `kondisi` text DEFAULT NULL,
  `nominal_aset` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_pengadaan` varchar(255) DEFAULT NULL,
  `sumber_pengadaan` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `user_penginput` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nomor`, `sub_nomor`, `satuan`, `kode_barang`, `no_aset`, `tercatat`, `kode_lokasi`, `kode_perkap`, `kondisi_aset`, `uraian_aset`, `uraian_perkap`, `kode_ruang`, `uraian_ruang`, `catatan`, `kondisi`, `nominal_aset`, `foto`, `tanggal_pengadaan`, `sumber_pengadaan`, `qr_code`, `user_penginput`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '99', '99', 'Paket', '12', '99', '99', '12', '99', 'Rusak', 'Elektronik', 'asd', '12', 'as', 'Baik', 'Baik', '123', '1636296682_b60a0e990e6c1e9a48b3.png', '2021-10-25', 'Hibah', '12.png', 'Super Admin', '2021-10-25 21:30:32', '2021-11-07 08:51:23', NULL),
(5, '0', '0', 'Unit', '', '', '', '12', '', 'Rusak', 'Elektronik', NULL, '12', NULL, '-', '-', '', 'default.jpg', '2021-10-25', 'Hibah', 'KB04.png', 'Super Admin', '2021-10-25 21:37:31', '2021-10-29 08:50:30', '2021-10-29 08:50:30'),
(6, '0', '0', 'Unit', '', '', '', '12', '', 'Kurang', 'Elektronik', NULL, '12', NULL, '-', '-', '', 'default.jpg', '2021-10-25', 'Hibah', 'KB05.png', 'Super Admin', '2021-10-25 21:38:57', '2021-10-29 08:50:33', '2021-10-29 08:50:33'),
(7, '', '', 'Unit', '', '', '', '12', '', 'Baik', 'Elektronik', NULL, '12', NULL, '-', '-', '', 'default.jpg', '2021-10-25', 'Hibah', 'KB06.png', 'Super Admin', '2021-10-25 21:41:02', '2021-10-29 08:50:37', '2021-10-29 08:50:37'),
(8, '', '', 'Unit', '', '', '', '12', '', 'Rusak', 'Elektronik', NULL, '12', NULL, '-', '-', '', 'default.jpg', '2021-10-25', 'Hibah', 'KB07.png', 'Super Admin', '2021-10-25 21:45:45', '2021-10-29 08:50:42', '2021-10-29 08:50:42'),
(9, '123', '123', 'Unit', 'KB08', '123', '22', '12', '12', 'Baik', 'Elektronik', 'Full Set', '12', 'Ruang Dosen', '-', 'Baik', '123', 'default.jpg', '2021-10-25', 'Hibah', 'KB08.png', 'Super Admin', '2021-10-25 21:56:33', '2021-10-29 08:50:45', '2021-10-29 08:50:45'),
(85, '1', '2', 'Unit', 'KB0001', '1', 'Jumlah 10', 'GD001', '10', 'Baik', 'Elektronik', 'Full Set', 'RG001', 'Ruang Kelas', 'Baik', 'Baik', '5000000', 'default.jpg', '2021-10-29', 'Hibah', 'KB0001.png', 'Super Admin', NULL, '2021-10-29 08:50:50', '2021-10-29 08:50:50'),
(110, '16', '16', 'Paket', 'KB05', '16', '22', '12', '12', 'Rusak', 'Elektronik', 'Full Set', '12', 'Ruang Dosen', '-', '-', '123', 'default.jpg', '2021-10-29', 'Hibah', 'KB05.png', 'Super Admin', '2021-10-29 07:32:06', '2021-11-07 08:25:51', NULL),
(111, '1', '2', 'Paket', 'KB0001', '1', 'Jumlah 10', 'GD001', '10', 'Rusak', 'Elektronik', 'Full Set', 'RG001', 'Ruang Kelas', 'Baik', 'Baik', '5000000', 'default.jpg', '2021-11-12', 'Hibah', 'KB0001.png', 'Super Admin', '2021-11-07 08:28:02', '2021-11-07 08:28:02', NULL),
(112, '1', '2', 'Unit', 'KB0002', '1', 'Jumlah 11', 'GD002', '10', 'Baik', 'Elektronik', 'Full Set', 'RG002', 'Ruang Kelas', 'Baik', 'Baik', '5000000', 'default.jpg', '2021-11-13', 'Hibah', 'KB0002.png', 'Super Admin', NULL, '2021-10-29 09:01:20', NULL),
(113, '1', '2', 'Set', 'KB0003', '1', 'Jumlah 12', 'GD003', '10', 'Rusak', 'Elektronik', 'Full Set', 'RG003', 'Ruang Kelas', 'Baik', 'Baik', '5.000.000', 'default.jpg', '2021-11-14', 'Hibah', 'KB0003.png', 'Super Admin', NULL, '2021-11-07 08:05:13', NULL),
(114, '1', '2', 'Paket', 'KB0004', '1', 'Jumlah 13', 'GD004', '10', 'Rusak', 'Elektronik', 'Full Set', 'RG004', 'Ruang Kelas', 'Baik', 'Baik', '5000000', 'default.jpg', '2021-11-15', 'Hibah', 'KB0004.png', 'Super Admin', NULL, '2021-11-07 00:04:15', NULL),
(115, '1', '2', 'Paket', 'KB0005', '1', 'Jumlah 14', 'GD005', '10', 'Rusak', 'Elektronik', 'Full Set', 'RG005', 'Ruang Kelas', 'Baik', 'Baik', '50.000.000', 'default.jpg', '2021-11-16', 'Hibah', 'KB0005.png', 'Super Admin', NULL, '2021-11-07 00:23:33', NULL),
(130, '121', '121', 'Unit', 'KB05', '16', '22', '12', '12', 'Kurang', 'Elektronik', 'Full Set', '12', 'Ruang Dosen', '-', '-', '123', 'default.jpg', '2021-11-01', 'Hibah', 'KB05.png', 'Dimas Cahyo Nur Aditya', '2021-11-01 09:08:30', '2021-11-01 09:08:30', NULL),
(131, '123', '123', 'Unit', '123', '123', '123', '123', '123', 'Baik', 'asd', 'asd', '123', 'asd', '-', '-', '12.000.000', 'default.jpg', '2021-11-07', 'Hibah', '123.png', 'Super Admin YA', '2021-11-06 23:18:39', '2021-11-06 23:18:39', NULL),
(132, '16', '12', 'Buah', 'KB0010', '44', '22', '12', '12', 'Baik', 'Elektronik', 'Full Set', '12', 'Ruang Dosen', '-', '-', '12.000.000', 'default.jpg', '2021-11-07', 'Hibah', 'KB0010.png', 'Super Admin', '2021-11-07 08:04:37', '2021-11-07 08:04:37', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode` varchar(12) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id`, `kode`, `nama`, `lokasi`) VALUES
(1, 'GD001', 'Pusat Edit', 'Sumampir'),
(2, 'GD002', 'Cabang 1', 'Purwokerto'),
(3, 'GD003', 'Cabang 2 Editans', 'Banyumas Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2021-10-19-141824', 'App\\Database\\Migrations\\Gedung', 'default', 'App', 1634661843, 1),
(3, '2021-10-19-171407', 'App\\Database\\Migrations\\Ruangan', 'default', 'App', 1634663762, 2),
(5, '2021-10-20-073955', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1634715610, 4),
(6, '2021-10-24-131451', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1635081534, 5),
(7, '2021-10-25-130145', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1635168077, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `otentikasi`
--

CREATE TABLE `otentikasi` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `otentikasi`
--

INSERT INTO `otentikasi` (`id`, `username`, `password`) VALUES
(1, 'SatDirPwt', '$2y$10$2E/IwGsRYRUGsowoM.bY..zlTvpTMHOavBIxis16nFudXyMx/bxAe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `kode`, `nama`) VALUES
(1, 'RG001', 'Ruang Administrasi Edit'),
(4, 'RG002', 'Ruang Sektetaris 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(16) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `name`, `username`, `password`, `email`, `gender`, `address`, `telephone`, `image`, `role`, `created_at`) VALUES
(1, '01', 'Super Admin', 'superadmin', '$2y$10$GaCe9yvTlBeK3gOeA9KZyeIkR7nw23npGoI5OmJZdgq9rUvlz/FPG', 'super@gmail.com', 'Laki-laki', 'Purwokerto Barat', '192192123123', '1633885524_2c6dae6acb77a922a4a8.png', 1, '0'),
(5, '03', 'Farhan Ramdhani Ashari', 'farhancrz99', '$2y$10$lIpHr3Hatwsnfdy6u7ybcOHs4NagxwGSL7y/oJ3X4yfd6R6ghLUia', 'farhan@gmail.com', 'Laki-laki', 'Bumiayu', '098765432112', 'default.jpg', 3, '03-10-2021'),
(6, '04', 'Anggie Febriansyah', 'anggie', '$2y$10$9uBc1u6YMvfKHlAVB4.2bOhBNpTqO.bSPMIiYAyR.BEP6ee8ffGwe', 'alvarogavriel570@gmail.com', 'Laki-laki', 'Sempor', '098765432112', 'default.jpg', 3, '03-10-2021'),
(13, '1231231231231231', 'Slamet Fauzi', 'ozimilanisty', '$2y$10$bqVD8qbCJY/RfEwOVTEpBeMIEZPpaDZ84eeQ0REx75mOx6ExIjxFe', 'ozimilanisty661@gmail.com', 'Laki-laki', 'Rancamaya, RT05/RW04, Kec. Cilongok, Kab. Banyumas', '081390773119', 'default.jpg', 2, '07-10-2021'),
(18, '2312312312312312', 'Dimas Cahyo Nur Aditya', 'dimaschronicles', '$2y$10$ljKwxZDgXTr4yy3KEl85C.RRl.kDiL16yWi2do2pcPpVYjwZJP3Sq', 'dimaschronicles@gmail.com', 'Laki-laki', 'Pliken', '08981086464', '1636266040_70dcf388697ac27eeef8.jpg', 2, '10-10-2021');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `otentikasi`
--
ALTER TABLE `otentikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `otentikasi`
--
ALTER TABLE `otentikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
