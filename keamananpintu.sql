-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Bulan Mei 2025 pada 16.10
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keamananpintu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `created_At`, `updated_At`) VALUES
(3, 'admin', 'admin', 'm.lukmanisma@gmail.com', '$2y$10$ULBw1nlzgzMnFsNPybizP.jw/IFSnekiqSaGX/lc1Sd4.baFWQpQO', '2025-01-06 04:12:46', NULL),
(4, 'admin', 'admin', 'm.lukmanisma@gmail.com', '$2y$10$lJYoLiX0dVNNsSTbqUgq7.ekCPEtQNM4NohOYo4BE66tuvuYPChm.', '2025-01-06 04:17:39', NULL),
(5, 'cek', 'cek', 'yayanti@gmail.com', '$2y$10$NdgZBxWkMfrL5ki7N2me0e.rfd33jKrbWuP2SKSM6jNWTMyOuGLcm', '2025-01-06 04:23:01', NULL),
(6, 'cek', 'cek', 'yayanti@gmail.com', '$2y$10$zKZsio7EjjZJkzWFiky69Ohv0n90wbVCI5mVh792iSKMruNXBzFu.', '2025-01-06 04:27:51', NULL),
(7, 'cek', 'cek', 'yayanti@gmail.com', '$2y$10$xEYVOvvlqu3p3B7zKQqzYe562mcGc1n.yN357T1t2PHfl1FgkRat2', '2025-01-06 04:32:04', NULL),
(8, 'cek', 'cek', 'yayanti@gmail.com', '$2y$10$0dDd3rwYU52p0aTcS6fHQ.Dm8kUEqmh12DsG9RxKKI1EDabunp0lq', '2025-01-06 04:32:31', NULL),
(9, 'cek', 'cek', 'yayanti@gmail.com', '$2y$10$PMZiFvyRdBkPvmN.nH.qLeIzlc5NUNI/jcYZ6GejrWc4O1FxYB1v6', '2025-01-06 04:33:04', NULL),
(10, 'lukman', 'lukman', 'hehe@gmail.com', '$2y$10$np0yG5T1nhH9tAqkFebeM.VjreuReeWVMeiOeVVjpZzDLWDWhF/oS', '2025-01-06 04:41:08', NULL),
(11, 'lukman', 'lukman', 'hehe@gmail.com', '$2y$10$.2elBdn4JtjJSEWRrBNbpuGY63H17AI7nsg5E/.rBQ5nc.DINNIPe', '2025-01-06 04:45:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `rfid_id` varchar(20) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `rfid_id`, `waktu`, `tanggal`, `created_At`, `updated_At`) VALUES
(13, '111202', '11:19:00', '0000-00-00', '2024-11-06 04:19:18', NULL),
(14, '111202', '00:00:00', '0000-00-00', '2025-01-08 04:31:29', NULL),
(15, '111202', '11:42:41', '0000-00-00', '2025-01-08 04:42:47', NULL),
(16, '111202', '11:46:23', '0000-00-00', '2025-01-08 04:46:29', NULL),
(17, '111202', '11:51:41', '2025-08-01', '2025-01-08 04:51:49', NULL),
(18, '111202', '11:59:41', '2025-08-01', '2025-01-08 04:59:46', NULL),
(19, '111202', '11:59:56', '2025-08-01', '2025-01-08 05:00:02', NULL),
(20, '111202', '12:00:05', '2025-08-01', '2025-01-08 05:00:14', NULL),
(21, '111202', '12:27:13', '2025-08-01', '2025-01-08 05:27:19', NULL),
(22, '111202', '12:27:22', '2025-08-01', '2025-01-08 05:27:28', NULL),
(23, '111202', '12:27:30', '2025-08-01', '2025-01-08 05:27:36', NULL),
(24, '111202', '12:27:40', '2025-08-01', '2025-01-08 05:27:46', NULL),
(25, '111202', '12:27:51', '2025-08-01', '2025-01-08 05:27:56', NULL),
(26, '111202', '12:27:59', '2025-08-01', '2025-01-08 05:28:05', NULL),
(27, '111202', '12:28:07', '2025-08-01', '2025-01-08 05:28:13', NULL),
(28, '111202', '12:28:21', '2025-08-01', '2025-01-08 05:28:27', NULL),
(29, '111202', '12:28:31', '2025-08-01', '2025-01-08 05:28:36', NULL),
(30, '111202', '12:28:40', '2025-08-01', '2025-01-08 05:28:46', NULL),
(31, '111202', '12:28:50', '2025-08-01', '2025-01-08 05:28:55', NULL),
(32, '111202', '12:38:54', '2025-08-01', '2025-01-08 05:39:01', NULL),
(33, '111202', '13:01:23', '2025-08-01', '2025-01-08 06:01:31', NULL),
(34, '111202', '13:01:43', '2025-08-01', '2025-01-08 06:01:49', NULL),
(35, '35:158:226:38', '14:48:26', '2025-08-01', '2025-01-08 07:48:28', NULL),
(36, '35:158:226:38', '14:48:36', '2025-08-01', '2025-01-08 07:48:38', NULL),
(37, '35:158:226:38', '14:51:08', '2025-08-01', '2025-01-08 07:51:15', NULL),
(38, '35:158:226:38', '14:51:16', '2025-08-01', '2025-01-08 07:51:22', NULL),
(39, '35:158:226:38', '14:53:13', '2025-08-01', '2025-01-08 07:53:17', NULL),
(40, '35:158:226:38', '14:53:24', '2025-08-01', '2025-01-08 07:53:29', NULL),
(41, '35:158:226:38', '14:53:37', '2025-08-01', '2025-01-08 07:53:41', NULL),
(42, '35:158:226:38', '14:57:27', '2025-08-01', '2025-01-08 07:57:31', NULL),
(43, '35:158:226:38', '15:07:52', '2025-08-01', '2025-01-08 08:07:58', NULL),
(44, '35:158:226:38', '15:21:26', '2025-08-01', '2025-01-08 08:21:30', NULL),
(45, '35:158:226:38', '15:51:06', '2025-08-01', '2025-01-08 08:51:10', NULL),
(46, '35:158:226:38', '15:51:10', '2025-08-01', '2025-01-08 08:51:15', NULL),
(47, '35:158:226:38', '15:55:45', '2025-08-01', '2025-01-08 08:55:51', NULL),
(48, '234:222:98:25', '15:57:09', '2025-08-01', '2025-01-08 08:57:14', NULL),
(49, '234:222:98:25', '15:57:18', '2025-08-01', '2025-01-08 08:57:22', NULL),
(50, '35:158:226:38', '15:57:28', '2025-08-01', '2025-01-08 08:57:33', NULL),
(51, '35:158:226:38', '15:57:44', '2025-08-01', '2025-01-08 08:57:48', NULL),
(52, '35:158:226:38', '15:58:45', '2025-08-01', '2025-01-08 08:58:49', NULL),
(53, '234:222:98:25', '15:58:49', '2025-08-01', '2025-01-08 08:58:53', NULL),
(54, '234:222:98:25', '15:59:40', '2025-08-01', '2025-01-08 08:59:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_id`
--

CREATE TABLE `reg_id` (
  `id` int(11) NOT NULL,
  `rfid_id` varchar(20) NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reg_id`
--

INSERT INTO `reg_id` (`id`, `rfid_id`, `created_At`, `updated_At`) VALUES
(3, '234:222:98:25', '2025-01-08 08:57:14', '2025-01-08 08:58:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `rfid_id` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `rfid_id`, `nama`, `created_At`, `updated_At`) VALUES
(13, '111202', 'ysy', '2024-11-04 13:29:18', NULL),
(14, '35:158:226:38', 'lukman isma', '2025-01-08 07:48:18', NULL),
(15, '234:222:98:25', 'Ega', '2025-01-08 08:56:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reg_id`
--
ALTER TABLE `reg_id`
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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `reg_id`
--
ALTER TABLE `reg_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
