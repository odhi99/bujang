-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Jun 2024 pada 12.53
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bujang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `harga` int NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama`, `jumlah`, `harga`, `foto`) VALUES
(9, 'Cappuchino', 9, 25004, '1719316557.png'),
(10, 'Mocha', 9, 10000, '1719316546.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL,
  `total_harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_produk`, `total_harga`, `jumlah`, `tanggal`) VALUES
(2, 2, 9, 25000, 1, '2024-05-25 00:00:00'),
(3, 2, 9, 125000, 5, '2024-05-25 02:46:20'),
(4, 2, 9, 75000, 3, '2024-05-28 07:56:41'),
(5, 2, 9, 25000, 1, '2024-05-28 08:12:53'),
(6, 2, 10, 10000, 1, '2024-05-28 08:43:35'),
(7, 2, 9, 25000, 1, '2024-06-25 13:20:21'),
(8, 2, 9, 25004, 1, '2024-06-25 19:30:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `alamat`, `hp`, `username`, `password`, `foto`, `role`) VALUES
(1, 'Ridho', 'BTP', '0909301290', 'admin', 'admin', '2', 'admin'),
(2, 'Ridho', 'BTP', '081231231', 'user', 'user', '1716227621.jpg', 'user'),
(3, 'Nama', 'Alamat', '0800', '81783', '231', '1716227673.jpg', 'user'),
(4, 'h', 'jh', 'jhj', 'qw', 'wqe', '1716857112.jpg', 'user'),
(5, 'h', 'jh', 'jhj', 'qw', 'wqe', '1716857121.jpg', 'user'),
(6, 'h', 'jh', 'jhj', 'qw', 'wqe', '1716842953.jpg', 'user'),
(7, 'h', 'jh', 'jhj', 'qw', 'wqe', '1716842956.jpg', 'user'),
(8, 'dsdf', 'hjh', 'jh', 'f', 'f', '1716843006.jpg', 'user'),
(9, 'asda', '8', '8', '8', '8', '1716843026.jpg', 'user'),
(10, '76', '676', '767', 'ad', 'fs', '1716843047.jpg', 'user'),
(11, '76', '67', '676', '3r', '23', '1716843075.jpg', 'user');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi` (
`foto_produk` text
,`harga_produk` int
,`id_produk` int
,`id_transaksi` int
,`id_user` int
,`jumlah` int
,`nama_produk` varchar(255)
,`nama_user` varchar(255)
,`tanggal` datetime
,`total_harga` int
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `tb_users`.`nama` AS `nama_user`, `tb_produk`.`nama` AS `nama_produk`, `tb_produk`.`harga` AS `harga_produk`, `tb_produk`.`foto` AS `foto_produk`, `tb_transaksi`.`id_transaksi` AS `id_transaksi`, `tb_transaksi`.`id_user` AS `id_user`, `tb_transaksi`.`id_produk` AS `id_produk`, `tb_transaksi`.`total_harga` AS `total_harga`, `tb_transaksi`.`jumlah` AS `jumlah`, `tb_transaksi`.`tanggal` AS `tanggal` FROM ((`tb_transaksi` join `tb_users` on((`tb_users`.`id_user` = `tb_transaksi`.`id_user`))) join `tb_produk` on((`tb_produk`.`id_produk` = `tb_transaksi`.`id_produk`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
