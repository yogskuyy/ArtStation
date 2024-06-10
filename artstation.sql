-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 10, 2024 at 02:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artstation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_karya`
--

CREATE TABLE `tb_karya` (
  `id_karya` int NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `karya` varchar(50) NOT NULL,
  `harga` int NOT NULL,
  `seniman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_karya`
--

INSERT INTO `tb_karya` (`id_karya`, `photo`, `karya`, `harga`, `seniman`) VALUES
(5, '6656b04082066.png', 'anime', 200000, 'kevin'),
(12, '665b3b576a08e.png', 'ninja', 50000, 'Elsa'),
(13, '665b4aa8e23bd.png', 'jumat gaul', 10000, 'subahtiar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `nama_karya` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nama_karya`, `nama_pembeli`, `status`) VALUES
(14, 'Patung Miniatur', 'Sri', 'completed'),
(16, 'Keramik Tradisional', 'Hendra', 'pending'),
(17, 'Lukisan Klasik', 'Rini', 'completed'),
(18, 'Patung Singa', 'Ayu', 'cancelled'),
(19, 'Kaligrafi Jawi', 'Tono', 'completed'),
(20, 'Keramik Bersejarah', 'Hana', 'pending'),
(21, 'Lukisan Surreal', 'Faisal', 'completed'),
(22, 'Ukiran Relief', 'Lina', 'pending'),
(23, 'Patung Dewi Sri', 'Gita', 'completed'),
(24, 'Kaligrafi Cina', 'Yusuf', 'cancelled'),
(25, 'Lukisan Naturalis', 'Rita', 'completed'),
(26, 'Vas Dekoratif', 'Tina', 'pending'),
(27, 'Ukiran Modern', 'Feri', 'completed'),
(28, 'Patung Prasejarah', 'Lusi', 'pending'),
(29, 'Lukisan Impresionis', 'Anton', 'completed'),
(30, 'Keramik Etnik', 'Maya', 'cancelled'),
(31, 'Patung Buddha', 'Roni', 'pending'),
(32, 'Kaligrafi Jepang', 'Indra', 'completed'),
(33, 'Lukisan Romantis', 'Susi', 'pending'),
(34, 'Ukiran Hias', 'Dani', 'completed'),
(35, 'Keramik Kontemporer', 'Asep', 'cancelled'),
(36, 'Patung Modern', 'Tari', 'pending'),
(37, 'Kaligrafi Thailand', 'Edi', 'completed'),
(38, 'Lukisan Baroque', 'Lisa', 'pending'),
(39, 'Ukiran Tradisional', 'Rudi', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`) VALUES
(2, 'yogskuyy', 'rakaprayoga@gmail.com', '$2y$10$YppXDy1geKh38uFsYMFr5OAHAURhkfq9kT03kNpplu9vbvVjE01.m'),
(3, 'subahtiar', 'subahtiar@gmail.com', '$2y$10$eqPZL1XqZU4g8HvvDykRN.rfViTXcxpEr7Ms98Ncr8DTxBXrtM5a6'),
(4, 'satriaadiyoga', 'munet@gmail.com', '$2y$10$jcP6.ZTej2mfUDbNjoQVbu1vvYovlySgf5CXlEH/4n0MosikdQWpO'),
(5, 'hikmal', 'hikmal@gmail.com', '$2y$10$7vchXGGGUBtZCTtHNCihU.gxt9hOFHb4KofV9ZuVuJ7oL8KDZqcDC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_karya`
--
ALTER TABLE `tb_karya`
  ADD PRIMARY KEY (`id_karya`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_karya`
--
ALTER TABLE `tb_karya`
  MODIFY `id_karya` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
