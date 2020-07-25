-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 03:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aloevera`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `nik` int(99) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `nik`, `nama`, `email`, `no_hp`) VALUES
(3, 181910553, 'Hari', 'hariiskandarmuda@gmail.com', '081313078365'),
(4, 181910551, 'Dendy', 'dendyjuliano2019@gmail.com', '087797824107'),
(5, 181910560, 'Sauki', 'sauki@gmail.com', '0879997656'),
(13, 181910556, 'Garly', 'garli@gmail.com', '0898776568'),
(19, 181910541, 'Adi', 'adi@gmail.com', '089987776556');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE `tb_item` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`id`, `nama`, `harga`, `stok`) VALUES
(2, 'Bantal', '30000', 56),
(3, 'Guling', '20000', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id` int(11) NOT NULL,
  `nama_kamar` varchar(125) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_kamar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id`, `nama_kamar`, `id_kategori`, `kode_kamar`, `status`) VALUES
(8, 'Singgle Room', 8, '00101', 1),
(9, 'Double Room', 10, '00201', 3),
(11, 'Twin Room', 9, '00301', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tamu` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `tamu`, `harga`, `image`) VALUES
(8, 'Standard', 2, 500000, 'IMG-20200225-WA0040.jpg'),
(9, 'Superior', 3, 700000, 'kamar6.jpg'),
(10, 'Deluxe', 2, 1000000, 'kamar4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_metode_pembayaran`
--

CREATE TABLE `tb_metode_pembayaran` (
  `id` int(11) NOT NULL,
  `nama_metode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_metode_pembayaran`
--

INSERT INTO `tb_metode_pembayaran` (`id`, `nama_metode`) VALUES
(1, 'CASH'),
(2, 'TRANSFER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `image` varchar(200) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama`, `username`, `password`, `image`, `role_id`) VALUES
(6, 'Administrator', 'admin', '$2y$10$2ZBcyXXgpwX7iU9nqYm5hudG6k67Nf/L8F1XMvttN/7b0Si4Tz/Nu', 'default.png', 1),
(7, 'Dendy', 'dendy', '$2y$10$.jHNk6y0gcvoRtcBpKspreQfMVR/3ugdprNb5YVINwkcQY.yi4HSu', 'default.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `kode_pembayaran` varchar(255) NOT NULL,
  `nomor_pesanan` varchar(255) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `id_pilih` int(11) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `is_email` int(1) NOT NULL,
  `transferred` int(1) NOT NULL,
  `is_transfer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `kode_pembayaran`, `nomor_pesanan`, `id_metode`, `id_pilih`, `qr_code`, `is_email`, `transferred`, `is_transfer`) VALUES
(5, '1778900001', 'AL2020-0001', 2, 4, '1778900001.png', 1, 1, 1),
(6, '1778900002', 'AL2020-0002', 1, 6, '1778900002.png', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pilih_pembayaran`
--

CREATE TABLE `tb_pilih_pembayaran` (
  `id` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `pembayaran` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pilih_pembayaran`
--

INSERT INTO `tb_pilih_pembayaran` (`id`, `id_metode`, `pembayaran`) VALUES
(2, 2, 'BRI'),
(3, 2, 'BNI'),
(4, 2, 'MANDIRI'),
(5, 2, 'BJB'),
(6, 1, 'PAY AT CHECKIN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `kode_reservasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id`, `tanggal`, `employee_id`, `customer_id`, `kode_reservasi`) VALUES
(58, '2020-07-18', 7, 4, 'AL-202007180001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi_request_item`
--

CREATE TABLE `tb_reservasi_request_item` (
  `id` int(11) NOT NULL,
  `reservasi_room_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reservasi_request_item`
--

INSERT INTO `tb_reservasi_request_item` (`id`, `reservasi_room_id`, `item_id`, `qty`, `total_bayar`) VALUES
(18, 55, 2, 1, 30000),
(19, 55, 3, 2, 40000),
(20, 55, 2, 2, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi_room`
--

CREATE TABLE `tb_reservasi_room` (
  `id` int(11) NOT NULL,
  `reservasi_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin_date` date DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reservasi_room`
--

INSERT INTO `tb_reservasi_room` (`id`, `reservasi_id`, `room_id`, `checkin_date`, `checkout_date`, `harga`) VALUES
(55, 58, 9, '2020-07-19', '2020-07-20', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id` int(11) NOT NULL,
  `nomor_pesanan` varchar(255) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tgl_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id`, `nomor_pesanan`, `id_kamar`, `nama_customer`, `checkin`, `checkout`, `durasi`, `harga`, `tgl_pesanan`) VALUES
(3, 'AL2020-0001', 2, 'Dendy', '07/08/2020', '07/16/2020', '8 Night', 'IDR 3.200.000', 2020),
(4, 'AL2020-0002', 6, 'Davin Nijar', '07/09/2020', '07/10/2020', '1 Night', 'IDR 3.000.000', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transfer`
--

CREATE TABLE `tb_transfer` (
  `id` int(11) NOT NULL,
  `kode_pembayaran` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(255) NOT NULL,
  `pemilik_rekening` varchar(255) NOT NULL,
  `jml_transfer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transfer`
--

INSERT INTO `tb_transfer` (`id`, `kode_pembayaran`, `nama_bank`, `nomor_rekening`, `pemilik_rekening`, `jml_transfer`, `image`) VALUES
(3, '1778900001', 'MANDIRI', '0090887877', 'Dendy', '90000000', 'Screenshot_(216).png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nomor_pesanan` varchar(50) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `kota_customer` varchar(255) NOT NULL,
  `no_customer` varchar(255) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `tamu` varchar(255) NOT NULL,
  `jml_room` int(11) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `is_email` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nomor_pesanan`, `id_kamar`, `nama_customer`, `email_customer`, `kota_customer`, `no_customer`, `alamat_customer`, `checkin`, `checkout`, `tamu`, `jml_room`, `durasi`, `harga`, `tgl_pesanan`, `is_email`) VALUES
(8, 'AL2020-0001', 3, 'Dendy', 'dendyjuliano2019@gmail.com', 'Ciamis', '0987654456789', 'dfd', '07/10/2020', '07/11/2020', '2 Guest', 0, '1 Night', 'IDR 2.000.000', '2020-07-09', 1),
(9, 'AL2020-0002', 2, 'Dendy', 'dendyjuliano2019@gmail.com', 'Ciamis', '087797824107', 'Alamat', '07/09/2020', '07/10/2020', '1 Guest', 2, '1 Night', 'IDR 800.000', '2020-07-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Reservasi'),
(3, 'Menu'),
(4, 'Housekeeper');

-- --------------------------------------------------------

--
-- Table structure for table `user_rule`
--

CREATE TABLE `user_rule` (
  `id` int(11) NOT NULL,
  `role` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rule`
--

INSERT INTO `user_rule` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Reservasi'),
(3, 'Customer'),
(4, 'Housekeeper');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(125) NOT NULL,
  `url` varchar(125) NOT NULL,
  `icon` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-tachometer-alt'),
(4, 1, 'Customer', 'admin/customer', 'fas fa-fw fa-user'),
(7, 1, 'Room', 'admin/room', 'fas fa-fw fa-bed'),
(12, 3, 'Menu Management', 'admin/menu', '	\r\nfas fa-fw fa-folder'),
(13, 3, 'Submenu Management', 'admin/submenu', 'fas fa-fw fa-folder-open'),
(14, 2, 'Reservasi', 'admin/reservasi', 'fas fa-cash-register'),
(16, 2, 'Active Room', 'admin/active_room', 'fas fa-fw fa-user-check'),
(17, 1, 'Category', 'admin/category', 'fas fa-fw fa-list-ul'),
(18, 2, 'First Check', 'admin/transaksi_ready', 'fas fa-fw fa-check-square'),
(19, 2, 'Second Check', 'admin/payment', 'fas fa-dollar-sign'),
(21, 2, 'History', 'admin/history', 'fas fa-history'),
(22, 2, 'Transfer', 'admin/transfer', 'far fa-credit-card'),
(102, 3, 'Role', 'admin/role', 'fas fa-fw fa-user-tag'),
(103, 1, 'Item', 'admin/item', 'fas fa-fw fa-luggage-cart');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_metode_pembayaran`
--
ALTER TABLE `tb_metode_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_pesanan` (`nomor_pesanan`);

--
-- Indexes for table `tb_pilih_pembayaran`
--
ALTER TABLE `tb_pilih_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reservasi_request_item`
--
ALTER TABLE `tb_reservasi_request_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reservasi_room`
--
ALTER TABLE `tb_reservasi_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_pesanan` (`nomor_pesanan`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rule`
--
ALTER TABLE `user_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_metode_pembayaran`
--
ALTER TABLE `tb_metode_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pilih_pembayaran`
--
ALTER TABLE `tb_pilih_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_reservasi_request_item`
--
ALTER TABLE `tb_reservasi_request_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_reservasi_room`
--
ALTER TABLE `tb_reservasi_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_rule`
--
ALTER TABLE `user_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `constrain_payment` FOREIGN KEY (`nomor_pesanan`) REFERENCES `transaksi` (`nomor_pesanan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
