-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Sep 2020 pada 08.07
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `jml_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga_barang`, `jml_barang`) VALUES
(1, '123', 'BARANG 1', 12000, 100000000),
(2, 'AW4863', '2/1 Twill', 2880, 100000000),
(3, 'AW 1338', 'Canvas', 2240, 100000000),
(4, 'AW 330', 'Canvas', 2100, 100000000),
(5, 'AW 309', 'Canvas', 2240, 100000000),
(6, 'SF 77', '3/1 Twill', 3450, 100000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_order`
--

CREATE TABLE `delivery_order` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `no_do` varchar(191) DEFAULT NULL,
  `do_date` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `no_so` varchar(191) DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `ship_to` varchar(100) DEFAULT NULL,
  `no_telp` int(13) DEFAULT NULL,
  `validasi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `delivery_order`
--

INSERT INTO `delivery_order` (`id`, `id_barang`, `no_do`, `do_date`, `qty`, `no_so`, `so_date`, `ship_date`, `customer`, `ship_to`, `no_telp`, `validasi`) VALUES
(18, NULL, 'DO14SEP0001', '2020-09-15', NULL, '14', NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 'DO15SEP0001', '2020-09-16', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 'DO15SEP0002', '0000-00-00', NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `delivery_order_v`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `delivery_order_v` (
`id_delivery_order` int(11)
,`no_do` varchar(191)
,`do_date` date
,`id` int(11)
,`id_barang` int(11)
,`pcs` int(191)
,`qty` int(11)
,`no_so` varchar(191)
,`so_date` date
,`ship_date` date
,`customer` varchar(100)
,`ship_to` varchar(100)
,`no_telp` int(13)
,`validasi` varchar(20)
,`nama_pelanggan` varchar(100)
,`kode_barang` varchar(50)
,`nama_barang` varchar(100)
,`harga_barang` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `no_invoice` varchar(191) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `no_so` int(11) DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `ship_to` varchar(100) DEFAULT NULL,
  `no_telp` int(13) DEFAULT NULL,
  `validasi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `id_barang`, `no_invoice`, `invoice_date`, `qty`, `no_so`, `so_date`, `ship_date`, `customer`, `ship_to`, `no_telp`, `validasi`) VALUES
(20, NULL, 'I15SEP0001', '2020-09-15', NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `invoice_v`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `invoice_v` (
`id` int(11)
,`no_invoice` varchar(191)
,`invoice_date` date
,`no_so` varchar(191)
,`so_date` date
,`ship_date` date
,`nama_pelanggan` varchar(100)
,`ship_to` varchar(100)
,`no_telp` int(13)
,`validasi` varchar(20)
,`kode_barang` varchar(50)
,`nama_barang` varchar(100)
,`harga_barang` int(11)
,`qty` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kode_pelanggan` varchar(50) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `email`, `no_telp`) VALUES
(32, 'P10004', 'PT Metro', 'Bandung', 'Metro@gmail.com', '0227187533'),
(33, 'P10003', 'PT Daese', 'Bandung', 'Daesegarmint@gmail.com', '02275331857'),
(34, 'P10002', 'Yoga', 'Surabaya', 'yogaguest3@gmail.com', '083242384257'),
(35, 'P10001', 'H. Aril', 'Pekalongan', 'Aril111@gmail.com', '081325313299');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_barang`
--

CREATE TABLE `rincian_barang` (
  `id_rincian` varchar(191) NOT NULL,
  `id_delivery_order` int(191) NOT NULL,
  `panjang` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincian_barang`
--

INSERT INTO `rincian_barang` (`id_rincian`, `id_delivery_order`, `panjang`) VALUES
('rincian-5f602b14be965', 19, 90),
('rincian-5f605809b654f', 19, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `pcs` int(191) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `no_so` varchar(191) DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `ship_to` varchar(100) DEFAULT NULL,
  `no_telp` int(13) DEFAULT NULL,
  `validasi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sales_order`
--

INSERT INTO `sales_order` (`id`, `id_barang`, `pcs`, `qty`, `no_so`, `so_date`, `ship_date`, `customer`, `ship_to`, `no_telp`, `validasi`) VALUES
(15, 3, NULL, 3000, 'SO15SEP0001', '2020-09-15', '2020-09-21', '33', 'Bandung', 227533187, 'valid'),
(16, 6, NULL, 3500, 'SO15SEP0002', '2020-09-15', '2020-09-21', '32', 'Bandung', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `sales_order_v`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sales_order_v` (
`id` int(11)
,`id_barang` int(11)
,`pcs` int(191)
,`qty` int(11)
,`no_so` varchar(191)
,`so_date` date
,`ship_date` date
,`customer` varchar(100)
,`ship_to` varchar(100)
,`no_telp` int(13)
,`validasi` varchar(20)
,`nama_pelanggan` varchar(100)
,`kode_barang` varchar(50)
,`nama_barang` varchar(100)
,`harga_barang` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `nama_user`, `level`) VALUES
(23, 'admin_penjualan', 'adcd7048512e64b48da55b027577886ee5a36350', 'Kinan@gmail.com', 'Kinanti Fatwa Mustika', 'Admin Penjualan'),
(27, 'staff_produksi', 'adcd7048512e64b48da55b027577886ee5a36350', 'Cecille@gmail.com', 'Cecille', 'Staff Produksi'),
(28, 'direktur', 'adcd7048512e64b48da55b027577886ee5a36350', 'yoonkhan@gmail.com', 'Yoon Kihan', 'Direktur'),
(29, 'bagas', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'bagassetia271@gmail.com', 'M. Bagas Setia', 'Admin'),
(30, 'Risma', 'adcd7048512e64b48da55b027577886ee5a36350', 'nrisma257@gmail.com', 'Risma', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi_lupa_pass`
--

CREATE TABLE `verifikasi_lupa_pass` (
  `kode` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `verifikasi_lupa_pass`
--

INSERT INTO `verifikasi_lupa_pass` (`kode`, `email`) VALUES
('25847', 'yohanes.oentarjo@gmail.com'),
('91218', 'yohanes.oentarjo@gmail.com'),
('67922', 'yohanes.oentarjo@gmail.com'),
('14790', ''),
('94199', 'yohanes.oentarjo@gmail.com'),
('78524', 'yohanes.oentarjo@gmail.com'),
('79842', 'yohanes.oentarjo@gmail.com'),
('26149', 'yohanes.oentarjo@gmail.com'),
('03406', 'yohanes.oentarjo@gmail.com'),
('99519', 'yohanes.oentarjo@gmail.com'),
('74550', 'yohanes.oentarjo@gmail.com'),
('06368', 'yohanes.oentarjo@gmail.com'),
('98960', 'yohanes.oentarjo@gmail.com'),
('54851', 'yohanes.oentarjo@gmail.com'),
('56029', 'yohanes.oentarjo@gmail.com'),
('17833', 'yohanes.oentarjo@gmail.com'),
('12677', 'yohanes.oentarjo@gmail.com'),
('29173', 'yohanes.oentarjo@gmail.com'),
('39878', 'yohanes.oentarjo@gmail.com'),
('73578', 'yohanes.oentarjo@gmail.com'),
('28858', 'yohanes.oentarjo@gmail.com'),
('76630', 'yogaadi138@gmail.com'),
('23613', 'yogaadi138@gmail.com');

-- --------------------------------------------------------

--
-- Struktur untuk view `delivery_order_v`
--
DROP TABLE IF EXISTS `delivery_order_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `delivery_order_v`  AS  select `delivery_order`.`id` AS `id_delivery_order`,`delivery_order`.`no_do` AS `no_do`,`delivery_order`.`do_date` AS `do_date`,`sales_order`.`id` AS `id`,`sales_order`.`id_barang` AS `id_barang`,`sales_order`.`pcs` AS `pcs`,`sales_order`.`qty` AS `qty`,`sales_order`.`no_so` AS `no_so`,`sales_order`.`so_date` AS `so_date`,`sales_order`.`ship_date` AS `ship_date`,`sales_order`.`customer` AS `customer`,`sales_order`.`ship_to` AS `ship_to`,`sales_order`.`no_telp` AS `no_telp`,`sales_order`.`validasi` AS `validasi`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`barang`.`kode_barang` AS `kode_barang`,`barang`.`nama_barang` AS `nama_barang`,`barang`.`harga_barang` AS `harga_barang` from (((`delivery_order` join `sales_order` on((`delivery_order`.`no_so` = `sales_order`.`id`))) join `pelanggan` on((`sales_order`.`customer` = `pelanggan`.`id`))) join `barang` on((`sales_order`.`id_barang` = `barang`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `invoice_v`
--
DROP TABLE IF EXISTS `invoice_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoice_v`  AS  select `invoice`.`id` AS `id`,`invoice`.`no_invoice` AS `no_invoice`,`invoice`.`invoice_date` AS `invoice_date`,`sales_order`.`no_so` AS `no_so`,`sales_order`.`so_date` AS `so_date`,`sales_order`.`ship_date` AS `ship_date`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`sales_order`.`ship_to` AS `ship_to`,`sales_order`.`no_telp` AS `no_telp`,`sales_order`.`validasi` AS `validasi`,`barang`.`kode_barang` AS `kode_barang`,`barang`.`nama_barang` AS `nama_barang`,`barang`.`harga_barang` AS `harga_barang`,`sales_order`.`qty` AS `qty` from (((`invoice` join `sales_order` on((`invoice`.`no_so` = `sales_order`.`id`))) join `barang` on((`sales_order`.`id_barang` = `barang`.`id`))) join `pelanggan` on((`sales_order`.`customer` = `pelanggan`.`id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sales_order_v`
--
DROP TABLE IF EXISTS `sales_order_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sales_order_v`  AS  select `sales_order`.`id` AS `id`,`sales_order`.`id_barang` AS `id_barang`,`sales_order`.`pcs` AS `pcs`,`sales_order`.`qty` AS `qty`,`sales_order`.`no_so` AS `no_so`,`sales_order`.`so_date` AS `so_date`,`sales_order`.`ship_date` AS `ship_date`,`sales_order`.`customer` AS `customer`,`sales_order`.`ship_to` AS `ship_to`,`sales_order`.`no_telp` AS `no_telp`,`sales_order`.`validasi` AS `validasi`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`barang`.`kode_barang` AS `kode_barang`,`barang`.`nama_barang` AS `nama_barang`,`barang`.`harga_barang` AS `harga_barang` from ((`sales_order` join `pelanggan` on((`sales_order`.`customer` = `pelanggan`.`id`))) join `barang` on((`sales_order`.`id_barang` = `barang`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rincian_barang`
--
ALTER TABLE `rincian_barang`
  ADD PRIMARY KEY (`id_rincian`);

--
-- Indeks untuk tabel `sales_order`
--
ALTER TABLE `sales_order`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
