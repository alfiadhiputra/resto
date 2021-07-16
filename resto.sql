-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 06:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_detail_order` enum('Pending','Confirmed','Canceled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `id_order`, `id_barang`, `keterangan`, `status_detail_order`) VALUES
(1, 1, 43, 'Pesan Makan Affogato', 'Pending'),
(3, 14, 44, 'Pesan Makan Coffe Latte', 'Pending'),
(4, 16, 86, 'Pesan Makan Hotdog ', 'Pending'),
(5, 18, 95, 'Pesan Makan Affogato', 'Pending'),
(6, 18, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(7, 19, 93, 'Pesan Makan Ice Lemon Tea', 'Pending'),
(8, 20, 77, 'Pesan Makan Nasi Plus Ayam', 'Pending'),
(9, 22, 76, 'Pesan Makan Hamburger ', 'Pending'),
(10, 25, 87, 'Pesan Makan Kentaki', 'Pending'),
(11, 26, 84, 'Pesan Makan Pizza Komplit', 'Pending'),
(12, 27, 74, 'Pesan Makan India Foods', 'Pending'),
(13, 27, 79, 'Pesan Makan Fried Pottato', 'Pending'),
(14, 28, 81, 'Pesan Makan Roti Caramel ', 'Pending'),
(15, 29, 95, 'Pesan Makan Affogato', 'Pending'),
(16, 30, 82, 'Pesan Makan Mie Kuah', 'Pending'),
(17, 31, 95, 'Pesan Makan Affogato', 'Pending'),
(18, 36, 91, 'Pesan Makan Sup Ikan', 'Pending'),
(19, 38, 95, 'Pesan Makan Affogato', 'Pending'),
(20, 40, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(21, 41, 78, 'Pesan Makan Nasi Komplit', 'Pending'),
(22, 42, 92, 'Pesan Makan Sup Udang ', 'Pending'),
(23, 43, 87, 'Pesan Makan Kentaki', 'Pending'),
(24, 50, 86, 'Pesan Makan Hotdog ', 'Pending'),
(25, 52, 95, 'Pesan Makan Affogato', 'Pending'),
(26, 55, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(27, 59, 94, 'Pesan Makan Coffe Latte', 'Pending'),
(28, 59, 76, 'Pesan Makan Hamburger ', 'Pending'),
(29, 59, 88, 'Pesan Makan Sup Kaldu Ayam ', 'Pending'),
(30, 59, 93, 'Pesan Makan Ice Lemon Tea', 'Pending'),
(31, 59, 82, 'Pesan Makan Mie Kuah', 'Pending'),
(32, 59, 83, 'Pesan Makan Nughet', 'Pending'),
(33, 0, 83, 'Pesan Makan Nughet', 'Pending'),
(34, 0, 82, 'Pesan Makan Mie Kuah', 'Pending'),
(35, 0, 93, 'Pesan Makan Ice Lemon Tea', 'Pending'),
(36, 0, 88, 'Pesan Makan Sup Kaldu Ayam ', 'Pending'),
(37, 0, 76, 'Pesan Makan Hamburger ', 'Pending'),
(38, 0, 94, 'Pesan Makan Coffe Latte', 'Pending'),
(39, 60, 86, 'Pesan Makan Hotdog ', 'Pending'),
(40, 61, 84, 'Pesan Makan Pizza Komplit', 'Pending'),
(41, 62, 95, 'Pesan Makan Affogato', 'Pending'),
(42, 64, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(43, 64, 84, 'Pesan Makan Pizza Komplit', 'Pending'),
(44, 65, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(45, 66, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(46, 66, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(47, 68, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(48, 68, 95, 'Pesan Makan Affogato', 'Pending'),
(49, 69, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(50, 70, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(51, 71, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(52, 71, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(53, 71, 95, 'Pesan Makan Affogato', 'Pending'),
(54, 72, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(55, 73, 91, 'Pesan Makan Sup Ikan', 'Pending'),
(56, 74, 96, 'Pesan Makan Milk Shake', 'Pending'),
(57, 75, 95, 'Pesan Makan Affogato', 'Pending'),
(58, 76, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(59, 77, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(60, 77, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(61, 78, 95, 'Pesan Makan Affogato', 'Pending'),
(62, 79, 94, 'Pesan Makan Coffe Latte', 'Pending'),
(63, 80, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(64, 80, 76, 'Pesan Makan Hamburger ', 'Pending'),
(65, 80, 96, 'Pesan Makan Milk Shake', 'Pending'),
(66, 81, 79, 'Pesan Makan Fried Pottato', 'Pending'),
(67, 82, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(68, 84, 95, 'Pesan Makan Affogato', 'Pending'),
(69, 84, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(70, 84, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(71, 84, 94, 'Pesan Makan Coffe Latte', 'Pending'),
(72, 84, 79, 'Pesan Makan Fried Pottato', 'Pending'),
(73, 84, 76, 'Pesan Makan Hamburger ', 'Pending'),
(74, 84, 86, 'Pesan Makan Hotdog ', 'Pending'),
(75, 84, 78, 'Pesan Makan Nasi Komplit', 'Pending'),
(76, 85, 94, 'Pesan Makan Coffe Latte', 'Pending'),
(77, 86, 0, 'Pesan Makan ', 'Pending'),
(78, 87, 89, 'Pesan Makan Roti Gandum ', 'Pending'),
(79, 87, 73, 'Pesan Makan Ayam Panggang ', 'Pending'),
(80, 88, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(81, 89, 80, 'Pesan Makan Chese Pizza', 'Pending'),
(82, 90, 76, 'Pesan Makan Hamburger ', 'Pending'),
(83, 91, 0, 'Pesan Makan ', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `dibuat` datetime NOT NULL,
  `diubah` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `dibuat`, `diubah`) VALUES
(1, 'Drink', '2014-06-01 00:35:07', '2014-05-30 10:34:33'),
(2, 'Food', '2014-06-01 00:35:07', '2014-05-30 10:34:33'),
(3, 'Sea Food', '2014-06-01 00:35:07', '2014-05-30 10:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `status_masakan` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(512) NOT NULL,
  `dibuat` datetime NOT NULL,
  `diubah` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id`, `nama`, `deskripsi`, `harga`, `status_masakan`, `id_kategori`, `gambar`, `dibuat`, `diubah`) VALUES
(94, 'Coffe Latte', 'Bikin Melekk', 80000, 'Ada', 1, 'dea874d4eb24505bc2a5cdf16b773419b950eecc-coffe latte.jpg', '2019-03-10 06:40:52', '2019-03-09 02:40:52'),
(93, 'Ice Lemon Tea', 'Segerr', 50000, 'Ada', 1, '11acc56f4a4fc3c2488c0468dc6da37dc6a0425f-lemon ice tea.jpg', '2019-03-10 06:39:56', '2019-03-09 02:39:56'),
(92, 'Sup Udang ', 'Enak', 40000, 'Ada', 3, '272964648e28ce7fbba704d21b4e0b875dc69e09-19.jpg', '2019-03-09 12:39:49', '2019-03-08 01:39:49'),
(91, 'Sup Ikan', 'Enak', 40000, 'Ada', 3, 'd920002498d13b6a64fadb9d11ed311dc65ba291-18.jpg', '2019-03-09 12:39:41', '2019-03-08 01:39:41'),
(90, 'Oat Sereal ', 'Sehat', 50000, 'Ada', 2, 'eaf4623763f0f64b1927067ab7c51f0be08f0d89-20.jpg', '2019-03-09 12:39:11', '2019-03-08 01:39:11'),
(89, 'Roti Gandum ', 'Yummy', 40000, 'Ada', 2, '39bdd01d914e7d9ad5121e0ec6841e9fdd60f6ac-17.jpg', '2019-03-09 12:38:27', '2019-03-08 01:38:27'),
(88, 'Sup Kaldu Ayam ', 'Beuh Edun Euy', 50000, 'Ada', 2, 'f5ec9f0d5b1c74d506328d7ad5796c6233c42851-16.jpg', '2019-03-09 12:37:29', '2019-03-08 01:37:29'),
(87, 'Kentaki', 'Mantaps', 70000, 'Ada', 2, '1e229acc74d6a291d07c26328670d07653b22296-15.jpg', '2019-03-09 12:36:19', '2019-03-08 01:36:19'),
(86, 'Hotdog ', 'Yummy', 60000, 'Ada', 2, '2be0e03909667ca456d3b1efd02dfd291a72ff8b-14.jpg', '2019-03-09 12:35:30', '2019-03-08 01:35:30'),
(73, 'Ayam Panggang ', 'Lezat ', 50000, 'Ada', 2, '60c1a281b0327ba83fd8c7e50be8778377154bbd-1.jpg', '2019-03-09 12:22:20', '2019-03-08 01:22:20'),
(74, 'India Foods', 'Enak Banget ', 100000, 'Ada', 2, '09f91369d8cda5d63abd38d3c6f15cb280c0eaa1-2.jpg', '2019-03-09 12:23:48', '2019-03-08 01:23:48'),
(80, 'Chese Pizza', 'Is Yummy', 100000, 'Ada', 2, 'bc83b4974b3a8654561c17ab50fcb3773cf67410-8.jpg', '2019-03-09 12:29:55', '2019-03-08 01:29:55'),
(79, 'Fried Pottato', 'Mantap', 20000, 'Ada', 2, '5732dea99c3a0c91f1cceff7cf19b4482d2f0e7d-7.jpg', '2019-03-09 12:28:56', '2019-03-08 01:28:56'),
(78, 'Nasi Komplit', 'Yummy', 60000, 'Ada', 2, '6db73acbeb03a2d71c5b34fb24dfc6b619538843-6.jpg', '2019-03-09 12:28:05', '2019-03-08 01:28:05'),
(77, 'Nasi Plus Ayam', 'Menyehatkan ', 60000, 'Ada', 2, '529520db5603e3a00608a56be726b1b38b875d9f-5.jpg', '2019-03-09 12:27:15', '2019-03-08 01:27:15'),
(83, 'Nughet', 'Yummy', 40000, 'Ada', 2, '0de2a0681b0412a93437e7e714db0dd756f973c9-11.jpg', '2019-03-09 12:32:39', '2019-03-08 01:32:39'),
(123, 'Latte Art', 'Mantape', 50000, 'Ada', 1, '234f0113b28155c855ab3078fc4f4ac6f7613b7a-latteart.jpg', '2019-04-09 23:25:10', '2019-04-09 16:25:10'),
(81, 'Roti Caramel ', 'Empuk dan Manis', 60000, 'Ada', 2, '213de6bdadffbd86704e5bf1fb7acaecd28963c3-9.jpg', '2019-03-09 12:30:53', '2019-03-08 01:30:53'),
(85, 'Udang Aja', 'Yummy', 60000, 'Ada', 3, '3119f9fbc0f832fd38947ee79a43cc06f604604e-13.jpg', '2019-03-09 12:34:30', '2019-03-08 01:34:30'),
(75, 'Sate Bebek', 'Enak manis, Gurih, Pedas ', 120000, 'Ada', 2, 'e5e0e29deb4e57f6e9a6df63aaf5573a147f8a52-3.jpg', '2019-03-09 12:25:11', '2019-03-08 01:25:11'),
(84, 'Pizza Komplit', 'Delicius', 100000, 'Ada', 2, '9bf5a0a106971314f386ef7f34632124f0dae701-12.jpeg', '2019-03-09 12:33:40', '2019-03-08 01:33:40'),
(76, 'Hamburger ', 'Yummy', 40000, 'Ada', 2, '0e71b5e912e0a5eb1f3ace6f29e9b6cc5d7bb3ba-4.jpg', '2019-03-09 12:25:56', '2019-03-08 01:25:56'),
(96, 'Milk Shake', 'Suegeerr abis', 50000, 'Ada', 1, '5daa238fa4ff3a9ef40019814aaf400239fe5e57-milk shake.jpg', '2019-03-10 06:42:44', '2019-03-09 02:42:44'),
(95, 'Affogato', 'Mantaps', 40000, 'Ada', 1, '994e4412c04f1da883ee6fe7229a30570cc15db4-affogato.jpg', '2019-03-10 06:41:44', '2019-03-09 02:41:44'),
(122, 'Mie Kuah', 'Hmm', 40000, 'Ada', 2, '524f2087cc227653898376e8fee70815433c09ce-524f2087cc227653898376e8fee70815433c09ce-10.jpg', '2019-04-09 23:23:55', '2019-04-09 16:23:55'),
(124, 'Ice Cream Oreo', 'Hmm', 50000, 'Ada', 1, '435ae281b0454e5fe8e47a4dddb7dde8a5a139da-Untitled-1.jpg', '2019-04-09 23:26:25', '2019-04-09 16:26:25'),
(125, 'Milk Tea', 'Hmm', 50000, 'Ada', 1, '4666b0064e8cfca09bbe8531867a8994b4119cad-1.jpg', '2019-04-09 23:30:35', '2019-04-09 16:30:35'),
(126, 'Flavoured Tea', 'Uhh', 50000, 'Ada', 1, 'aecf935910893822b3bd33d339b74fc51f4da1f7-Flavoured tea.jpg', '2019-04-09 23:33:21', '2019-04-09 16:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_order` enum('Pending','Confirmed','Canceled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `no_meja`, `tanggal`, `id_pengguna`, `keterangan`, `status_order`) VALUES
(35, 15, '2019-03-13 00:00:00', 3, 'Pesan Makanan', 'Pending'),
(36, 9, '2019-03-13 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(37, 12, '2019-03-13 00:00:00', 3, 'Pesan Makanan', 'Pending'),
(38, 17, '2019-03-13 00:00:00', 3, 'Pesan Makanan', 'Pending'),
(39, 8, '2019-03-13 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(40, 11, '2019-03-14 00:00:00', 4, 'Pesan Makanan', 'Pending'),
(41, 2, '2019-03-14 00:00:00', 4, 'Pesan Makanan', 'Pending'),
(42, 4, '2019-03-14 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(43, 12, '2019-03-14 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(44, 7, '2019-03-14 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(45, 11, '2019-03-14 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(46, 11, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(47, 19, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(48, 5, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(49, 13, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(50, 6, '2019-03-14 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(51, 1, '2019-03-14 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(52, 4, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(53, 15, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(54, 19, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(55, 10, '2019-03-14 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(56, 11, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(57, 8, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(58, 19, '2019-03-14 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(59, 19, '2019-03-14 00:00:00', 3, 'Pesan Makanan', 'Pending'),
(60, 6, '2019-03-14 00:00:00', 6, 'Pesan Makanan', 'Pending'),
(61, 17, '2019-03-14 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(62, 12, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(63, 8, '2019-03-15 00:00:00', 3, 'Pesan Makanan', 'Pending'),
(64, 9, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(65, 7, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(66, 10, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(67, 12, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(68, 20, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(69, 8, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(70, 2, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(71, 12, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(72, 12, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(73, 2, '2019-03-15 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(74, 14, '2019-03-15 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(75, 19, '2019-03-15 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(76, 6, '2019-03-16 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(77, 15, '2019-03-16 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(78, 4, '2019-03-16 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(79, 13, '2019-03-17 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(80, 12, '2019-03-17 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(81, 19, '2019-03-17 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(82, 15, '2019-03-20 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(83, 11, '2019-03-20 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(84, 15, '2019-03-21 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(85, 20, '2019-03-22 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(86, 15, '2019-03-22 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(87, 15, '2019-03-25 00:00:00', 5, 'Pesan Makanan', 'Pending'),
(88, 15, '2019-03-26 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(89, 20, '2019-03-30 00:00:00', 2, 'Pesan Makanan', 'Pending'),
(90, 20, '2019-04-09 00:00:00', 1, 'Pesan Makanan', 'Pending'),
(91, 5, '2019-04-09 00:00:00', 1, 'Pesan Makanan', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pengguna`, `id_order`, `tanggal`, `total_bayar`) VALUES
(69, 1, 78, '2019-03-16 00:00:00', 40000),
(70, 1, 79, '2019-03-17 00:00:00', 240000),
(71, 1, 80, '2019-03-17 00:00:00', 230000),
(72, 1, 81, '2019-03-17 00:00:00', 100000),
(73, 1, 82, '2019-03-20 00:00:00', 100000),
(74, 1, 83, '2019-03-20 00:00:00', 0),
(75, 1, 84, '2019-03-21 00:00:00', 450000),
(76, 1, 85, '2019-03-22 00:00:00', 160000),
(77, 1, 86, '2019-03-22 00:00:00', 0),
(78, 5, 87, '2019-03-25 00:00:00', 180000),
(79, 1, 88, '2019-03-26 00:00:00', 100000),
(80, 2, 89, '2019-03-30 00:00:00', 100000000),
(81, 1, 90, '2019-04-09 00:00:00', 80000),
(82, 1, 91, '2019-04-09 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(32) NOT NULL,
  `nama_belakang` varchar(32) NOT NULL,
  `nama_user` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `nomer_hp` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(512) NOT NULL,
  `id_level` int(11) NOT NULL,
  `level_akses` varchar(16) NOT NULL,
  `dibuat` datetime NOT NULL,
  `diubah` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_depan`, `nama_belakang`, `nama_user`, `username`, `email`, `nomer_hp`, `alamat`, `password`, `id_level`, `level_akses`, `dibuat`, `diubah`) VALUES
(1, 'Administrator', 'Admin', 'Alfiadhi Putra', 'administrator', 'administrator@gmail.com', '085229581801', 'Bentar ', '$2y$10$C9Opwu0OuBh.dcfAu2apIOubQlu98ohhUoBU8uwFwks3XGCtaiooG', 0, 'administrator', '2019-03-12 16:33:23', '2019-03-13 05:34:56'),
(2, 'Waiter', 'Waiter', 'Adzma Putra', 'waiter', 'waiter@gmail.com', '085229581802', 'Bentar ', '$2y$10$9cCEYz1gZjyI0ihHT1YsGuhPUwI1CXNSVLfHeSa..W2ZMBoURw68G', 0, 'waiter', '2019-03-12 16:39:27', '2019-03-13 05:34:57'),
(3, 'Kasir', 'Kasir', 'Abidzar Putra', 'kasir', 'kasir@gmail.com', '085229581803', 'Bentar ', '$2y$10$FKnW3dkNU2CUIFg0cAGBFORvYcTLpIZfaa/yCNyaFP.JG3bFtIivK', 0, 'kasir', '2019-03-12 16:40:10', '2019-03-13 05:34:57'),
(4, 'Owner ', 'Owner ', 'Fiadhi Al', 'owner', 'owner@gmail.com', '085229581804', 'Bentar ', '$2y$10$9L5AOrqU43T15y7pnaEl8eVxa85hTCiLtQt6l0gWkPoCpHNL2g982', 0, 'owner', '2019-03-12 16:40:41', '2019-03-13 05:34:57'),
(5, 'Alfiadhi', 'Putra', 'Alfiadhi Putra', 'alfi', 'alfiadhiputra@gmail.com', '085229581805', 'Bentar   ', '$2y$10$YW/mXa4bI8KudJxihgOv3eaGj1Tr3gBFtwFRTfiWY2eZS0ikwgUqi', 0, 'pelanggan', '2019-03-13 18:57:12', '2019-03-13 11:57:12'),
(6, 'Dilan', 'Bae', 'Dilan Bae', 'dilan', 'dilan@gmail.com', '085229581806', 'Bandung', '$2y$10$TBlwyxIjE/YU6VQGdBkxM.1oWYrRcDJ6sYC5B4PlHJaXJKuf6rcUG', 0, 'pelanggan', '2019-03-14 12:13:03', '2019-03-14 05:13:03'),
(7, 'Milea', 'Bae', 'Milea Bae', 'milea', 'milea@gmail.com', '085229581807', 'Bandung', '$2y$10$lyiPvSPcNAHOyOayR1qG3OD8Xrgi6VHpfIrP7jHE3QCGbCcP5BeNG', 0, 'pelanggan', '2019-03-14 18:50:20', '2019-03-14 11:50:20'),
(8, 'Alfiadhi', 'Putra', 'Alfiadhi Putra', 'owner2', 'owner2@gmail.com', '085229581802', 'Bentar', '$2y$10$yUflzMg0ULH4F/axj/bBtea2iokittEedXsDveGJZp6aKXi1Bt2nq', 0, 'owner', '2019-03-16 08:56:59', '2019-03-16 01:56:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
