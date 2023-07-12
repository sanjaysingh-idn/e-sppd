-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 09:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perjadin`
--

-- --------------------------------------------------------

--
-- Table structure for table `biayas`
--

CREATE TABLE `biayas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prov_id` int(11) NOT NULL,
  `nama_provinsi` varchar(255) DEFAULT NULL,
  `luar_kota` int(11) DEFAULT NULL,
  `dalam_kota` int(11) DEFAULT NULL,
  `diklat` int(11) DEFAULT NULL,
  `eselon_1` int(11) DEFAULT NULL,
  `eselon_2` int(11) DEFAULT NULL,
  `eselon_3_golongan_4` int(11) DEFAULT NULL,
  `eselon_4_golongan_3` int(11) DEFAULT NULL,
  `biaya_taksi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biayas`
--

INSERT INTO `biayas` (`id`, `prov_id`, `nama_provinsi`, `luar_kota`, `dalam_kota`, `diklat`, `eselon_1`, `eselon_2`, `eselon_3_golongan_4`, `eselon_4_golongan_3`, `biaya_taksi`, `created_at`, `updated_at`) VALUES
(1, 1, 'ACEH', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(2, 2, 'SUMATERA UTARA', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(3, 3, 'SUMATERA BARAT', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(4, 4, 'RIAU', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(5, 5, 'JAMBI', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(6, 6, 'SUMATERA SELATAN', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(7, 7, 'BENGKULU', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(8, 8, 'LAMPUNG', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(9, 9, 'KEPULAUAN BANGKA BELITUNG', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(10, 10, 'KEPULAUAN RIAU', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(11, 11, 'DKI JAKARTA', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(12, 12, 'JAWA BARAT', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(13, 13, 'JAWA TENGAH', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(14, 14, 'DI YOGYAKARTA', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(15, 15, 'JAWA TIMUR', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(16, 16, 'BANTEN', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(17, 17, 'BALI', 480000, 190000, 140000, 5478000, 1946000, 1348000, 1138000, 189000, NULL, '2023-06-02 07:04:03'),
(18, 18, 'NUSA TENGGARA BARAT', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(19, 19, 'NUSA TENGGARA TIMUR', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(20, 20, 'KALIMANTAN BARAT', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(21, 21, 'KALIMANTAN TENGAH', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(22, 22, 'KALIMANTAN SELATAN', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(23, 23, 'KALIMANTAN TIMUR', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(24, 24, 'KALIMANTAN UTARA', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(25, 25, 'SULAWESI UTARA', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(26, 26, 'SULAWESI TENGAH', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(27, 27, 'SULAWESI SELATAN', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(28, 28, 'SULAWESI TENGGARA', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(29, 29, 'GORONTALO', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(30, 30, 'SULAWESI BARAT', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(31, 31, 'MALUKU', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(32, 32, 'MALUKU UTARA', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(33, 33, 'PAPUA', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(34, 34, 'PAPUA BARAT', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_tiket_pesawats`
--

CREATE TABLE `biaya_tiket_pesawats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `besaran` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biaya_tiket_pesawats`
--

INSERT INTO `biaya_tiket_pesawats` (`id`, `asal`, `tujuan`, `besaran`, `created_at`, `updated_at`) VALUES
(1, 'TANGERANG', 'BANDA ACEH', 3425000, '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(2, 'TANGERANG', 'DENPASAR', 3262000, '2023-06-02 07:39:36', '2023-06-02 07:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_transportasi_darats`
--

CREATE TABLE `biaya_transportasi_darats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) DEFAULT NULL,
  `ibu_kota_provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `besaran` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golongans`
--

CREATE TABLE `golongans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `golongan_id` bigint(20) UNSIGNED NOT NULL,
  `golongan_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongans`
--

INSERT INTO `golongans` (`id`, `golongan_id`, `golongan_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'PEJABAT ESELON I', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(2, 2, 'PEJABAT ESELON II', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(3, 3, 'PEJABAT ESELON III', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(4, 4, 'PEJABAT ESELON IV', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(5, 5, 'GOLONGAN IV', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(6, 6, 'GOLONGAN III', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(7, 7, 'GOLONGAN II', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(8, 8, 'GOLONGAN I', '2023-06-01 04:01:17', '2023-06-01 04:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_name` varchar(255) NOT NULL,
  `jabatan_alias` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `jabatan_id`, `jabatan_name`, `jabatan_alias`, `created_at`, `updated_at`) VALUES
(1, 1, 'Direktur Bina Usaha Dan Pelaku Distribusi', 'Dirut', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(2, 2, 'Kepala Subdirektorat Distribusi Langsung Dan Waralaba pada Dit. Bina Usaha dan Pelaku Distribusi', 'Kasub', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(3, 3, 'Analis Perdagangan pada Dit. Bina Usaha dan Pelaku Distribusi', 'Analsis', '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(4, 4, 'Honorer pada Dit. Bina Usaha dan Pelaku Distribusi', 'Honorer', '2023-06-01 04:01:17', '2023-06-01 04:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `kotas`
--

CREATE TABLE `kotas` (
  `city_id` int(11) NOT NULL,
  `nama_kota` varchar(255) DEFAULT NULL,
  `prov_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kotas`
--

INSERT INTO `kotas` (`city_id`, `nama_kota`, `prov_id`) VALUES
(1, 'PIDIE JAYA', 1),
(2, 'SIMEULUE', 1),
(3, 'BIREUEN', 1),
(4, 'ACEH TIMUR', 1),
(5, 'ACEH UTARA', 1),
(6, 'PIDIE', 1),
(7, 'ACEH BARAT DAYA', 1),
(8, 'GAYO LUES', 1),
(9, 'ACEH SELATAN', 1),
(10, 'ACEH TAMIANG', 1),
(11, 'ACEH BESAR', 1),
(12, 'ACEH TENGGARA', 1),
(13, 'BENER MERIAH', 1),
(14, 'ACEH JAYA', 1),
(15, 'LHOKSEUMAWE', 1),
(16, 'ACEH BARAT', 1),
(17, 'NAGAN RAYA', 1),
(18, 'LANGSA', 1),
(19, 'BANDA ACEH', 1),
(20, 'ACEH SINGKIL', 1),
(21, 'SABANG', 1),
(22, 'ACEH TENGAH', 1),
(23, 'SUBULUSSALAM', 1),
(24, 'NIAS SELATAN', 2),
(25, 'MANDAILING NATAL', 2),
(26, 'DAIRI', 2),
(27, 'LABUHAN BATU UTARA', 2),
(28, 'TAPANULI UTARA', 2),
(29, 'SIMALUNGUN', 2),
(30, 'LANGKAT', 2),
(31, 'SERDANG BEDAGAI', 2),
(32, 'TAPANULI SELATAN', 2),
(33, 'ASAHAN', 2),
(34, 'PADANG LAWAS UTARA', 2),
(35, 'PADANG LAWAS', 2),
(36, 'LABUHAN BATU SELATAN', 2),
(37, 'PADANG SIDEMPUAN', 2),
(38, 'TOBA SAMOSIR', 2),
(39, 'TAPANULI TENGAH', 2),
(40, 'HUMBANG HASUNDUTAN', 2),
(41, 'SIBOLGA', 2),
(42, 'BATU BARA', 2),
(43, 'SAMOSIR', 2),
(44, 'PEMATANG SIANTAR', 2),
(45, 'LABUHAN BATU', 2),
(46, 'DELI SERDANG', 2),
(47, 'GUNUNGSITOLI', 2),
(48, 'NIAS UTARA', 2),
(49, 'NIAS', 2),
(50, 'KARO', 2),
(51, 'NIAS BARAT', 2),
(52, 'MEDAN', 2),
(53, 'PAKPAK BHARAT', 2),
(54, 'TEBING TINGGI', 2),
(55, 'BINJAI', 2),
(56, 'TANJUNG BALAI', 2),
(57, 'DHARMASRAYA', 3),
(58, 'SOLOK SELATAN', 3),
(59, 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)', 3),
(60, 'PASAMAN BARAT', 3),
(61, 'SOLOK', 3),
(62, 'PASAMAN', 3),
(63, 'PARIAMAN', 3),
(64, 'TANAH DATAR', 3),
(65, 'PADANG PARIAMAN', 3),
(66, 'PESISIR SELATAN', 3),
(67, 'PADANG', 3),
(68, 'SAWAH LUNTO', 3),
(69, 'LIMA PULUH KOTO / KOTA', 3),
(70, 'AGAM', 3),
(71, 'PAYAKUMBUH', 3),
(72, 'BUKITTINGGI', 3),
(73, 'PADANG PANJANG', 3),
(74, 'KEPULAUAN MENTAWAI', 3),
(75, 'INDRAGIRI HILIR', 4),
(76, 'KUANTAN SINGINGI', 4),
(77, 'PELALAWAN', 4),
(78, 'PEKANBARU', 4),
(79, 'ROKAN HILIR', 4),
(80, 'BENGKALIS', 4),
(81, 'INDRAGIRI HULU', 4),
(82, 'ROKAN HULU', 4),
(83, 'KAMPAR', 4),
(84, 'KEPULAUAN MERANTI', 4),
(85, 'DUMAI', 4),
(86, 'SIAK', 4),
(87, 'TEBO', 5),
(88, 'TANJUNG JABUNG BARAT', 5),
(89, 'MUARO JAMBI', 5),
(90, 'KERINCI', 5),
(91, 'MERANGIN', 5),
(92, 'BUNGO', 5),
(93, 'TANJUNG JABUNG TIMUR', 5),
(94, 'SUNGAIPENUH', 5),
(95, 'BATANG HARI', 5),
(96, 'JAMBI', 5),
(97, 'SAROLANGUN', 5),
(98, 'PALEMBANG', 6),
(99, 'LAHAT', 6),
(100, 'OGAN KOMERING ULU TIMUR', 6),
(101, 'MUSI BANYUASIN', 6),
(102, 'PAGAR ALAM', 6),
(103, 'OGAN KOMERING ULU SELATAN', 6),
(104, 'BANYUASIN', 6),
(105, 'MUSI RAWAS', 6),
(106, 'MUARA ENIM', 6),
(107, 'OGAN KOMERING ULU', 6),
(108, 'OGAN KOMERING ILIR', 6),
(109, 'EMPAT LAWANG', 6),
(110, 'LUBUK LINGGAU', 6),
(111, 'PRABUMULIH', 6),
(112, 'OGAN ILIR', 6),
(113, 'BENGKULU TENGAH', 7),
(114, 'REJANG LEBONG', 7),
(115, 'MUKO MUKO', 7),
(116, 'KAUR', 7),
(117, 'BENGKULU UTARA', 7),
(118, 'LEBONG', 7),
(119, 'KEPAHIANG', 7),
(120, 'BENGKULU SELATAN', 7),
(121, 'SELUMA', 7),
(122, 'BENGKULU', 7),
(123, 'LAMPUNG UTARA', 8),
(124, 'WAY KANAN', 8),
(125, 'LAMPUNG TENGAH', 8),
(126, 'MESUJI', 8),
(127, 'PRINGSEWU', 8),
(128, 'LAMPUNG TIMUR', 8),
(129, 'LAMPUNG SELATAN', 8),
(130, 'TULANG BAWANG', 8),
(131, 'TULANG BAWANG BARAT', 8),
(132, 'TANGGAMUS', 8),
(133, 'LAMPUNG BARAT', 8),
(134, 'PESISIR BARAT', 8),
(135, 'PESAWARAN', 8),
(136, 'BANDAR LAMPUNG', 8),
(137, 'METRO', 8),
(138, 'BELITUNG', 9),
(139, 'BELITUNG TIMUR', 9),
(140, 'BANGKA', 9),
(141, 'BANGKA SELATAN', 9),
(142, 'BANGKA BARAT', 9),
(143, 'PANGKAL PINANG', 9),
(144, 'BANGKA TENGAH', 9),
(145, 'KEPULAUAN ANAMBAS', 10),
(146, 'BINTAN', 10),
(147, 'NATUNA', 10),
(148, 'BATAM', 10),
(149, 'TANJUNG PINANG', 10),
(150, 'KARIMUN', 10),
(151, 'LINGGA', 10),
(152, 'JAKARTA UTARA', 11),
(153, 'JAKARTA BARAT', 11),
(154, 'JAKARTA TIMUR', 11),
(155, 'JAKARTA SELATAN', 11),
(156, 'JAKARTA PUSAT', 11),
(157, 'KEPULAUAN SERIBU', 11),
(158, 'DEPOK', 12),
(159, 'KARAWANG', 12),
(160, 'CIREBON', 12),
(161, 'BANDUNG', 12),
(162, 'SUKABUMI', 12),
(163, 'SUMEDANG', 12),
(164, 'INDRAMAYU', 12),
(165, 'MAJALENGKA', 12),
(166, 'KUNINGAN', 12),
(167, 'TASIKMALAYA', 12),
(168, 'CIAMIS', 12),
(169, 'SUBANG', 12),
(170, 'PURWAKARTA', 12),
(171, 'BOGOR', 12),
(172, 'BEKASI', 12),
(173, 'GARUT', 12),
(174, 'PANGANDARAN', 12),
(175, 'CIANJUR', 12),
(176, 'BANJAR', 12),
(177, 'BANDUNG BARAT', 12),
(178, 'CIMAHI', 12),
(179, 'PURBALINGGA', 13),
(180, 'KEBUMEN', 13),
(181, 'MAGELANG', 13),
(182, 'CILACAP', 13),
(183, 'BATANG', 13),
(184, 'BANJARNEGARA', 13),
(185, 'BLORA', 13),
(186, 'BREBES', 13),
(187, 'BANYUMAS', 13),
(188, 'WONOSOBO', 13),
(189, 'TEGAL', 13),
(190, 'PURWOREJO', 13),
(191, 'PATI', 13),
(192, 'SUKOHARJO', 13),
(193, 'KARANGANYAR', 13),
(194, 'PEKALONGAN', 13),
(195, 'PEMALANG', 13),
(196, 'BOYOLALI', 13),
(197, 'GROBOGAN', 13),
(198, 'SEMARANG', 13),
(199, 'DEMAK', 13),
(200, 'REMBANG', 13),
(201, 'KLATEN', 13),
(202, 'KUDUS', 13),
(203, 'TEMANGGUNG', 13),
(204, 'SRAGEN', 13),
(205, 'JEPARA', 13),
(206, 'WONOGIRI', 13),
(207, 'KENDAL', 13),
(208, 'SURAKARTA (SOLO)', 13),
(209, 'SALATIGA', 13),
(210, 'SLEMAN', 14),
(211, 'BANTUL', 14),
(212, 'YOGYAKARTA', 14),
(213, 'GUNUNG KIDUL', 14),
(214, 'KULON PROGO', 14),
(215, 'GRESIK', 15),
(216, 'KEDIRI', 15),
(217, 'SAMPANG', 15),
(218, 'BANGKALAN', 15),
(219, 'SUMENEP', 15),
(220, 'SITUBONDO', 15),
(221, 'SURABAYA', 15),
(222, 'JEMBER', 15),
(223, 'PAMEKASAN', 15),
(224, 'JOMBANG', 15),
(225, 'PROBOLINGGO', 15),
(226, 'BANYUWANGI', 15),
(227, 'PASURUAN', 15),
(228, 'BOJONEGORO', 15),
(229, 'BONDOWOSO', 15),
(230, 'MAGETAN', 15),
(231, 'LUMAJANG', 15),
(232, 'MALANG', 15),
(233, 'BLITAR', 15),
(234, 'SIDOARJO', 15),
(235, 'LAMONGAN', 15),
(236, 'PACITAN', 15),
(237, 'TULUNGAGUNG', 15),
(238, 'MOJOKERTO', 15),
(239, 'MADIUN', 15),
(240, 'PONOROGO', 15),
(241, 'NGAWI', 15),
(242, 'NGANJUK', 15),
(243, 'TUBAN', 15),
(244, 'TRENGGALEK', 15),
(245, 'BATU', 15),
(246, 'TANGERANG', 16),
(247, 'SERANG', 16),
(248, 'PANDEGLANG', 16),
(249, 'LEBAK', 16),
(250, 'TANGERANG SELATAN', 16),
(251, 'CILEGON', 16),
(252, 'KLUNGKUNG', 17),
(253, 'KARANGASEM', 17),
(254, 'BANGLI', 17),
(255, 'TABANAN', 17),
(256, 'GIANYAR', 17),
(257, 'BADUNG', 17),
(258, 'JEMBRANA', 17),
(259, 'BULELENG', 17),
(260, 'DENPASAR', 17),
(261, 'MATARAM', 18),
(262, 'DOMPU', 18),
(263, 'SUMBAWA BARAT', 18),
(264, 'SUMBAWA', 18),
(265, 'LOMBOK TENGAH', 18),
(266, 'LOMBOK TIMUR', 18),
(267, 'LOMBOK UTARA', 18),
(268, 'LOMBOK BARAT', 18),
(269, 'BIMA', 18),
(270, 'TIMOR TENGAH SELATAN', 19),
(271, 'FLORES TIMUR', 19),
(272, 'ALOR', 19),
(273, 'ENDE', 19),
(274, 'NAGEKEO', 19),
(275, 'KUPANG', 19),
(276, 'SIKKA', 19),
(277, 'NGADA', 19),
(278, 'TIMOR TENGAH UTARA', 19),
(279, 'BELU', 19),
(280, 'LEMBATA', 19),
(281, 'SUMBA BARAT DAYA', 19),
(282, 'SUMBA BARAT', 19),
(283, 'SUMBA TENGAH', 19),
(284, 'SUMBA TIMUR', 19),
(285, 'ROTE NDAO', 19),
(286, 'MANGGARAI TIMUR', 19),
(287, 'MANGGARAI', 19),
(288, 'SABU RAIJUA', 19),
(289, 'MANGGARAI BARAT', 19),
(290, 'LANDAK', 20),
(291, 'KETAPANG', 20),
(292, 'SINTANG', 20),
(293, 'KUBU RAYA', 20),
(294, 'PONTIANAK', 20),
(295, 'KAYONG UTARA', 20),
(296, 'BENGKAYANG', 20),
(297, 'KAPUAS HULU', 20),
(298, 'SAMBAS', 20),
(299, 'SINGKAWANG', 20),
(300, 'SANGGAU', 20),
(301, 'MELAWI', 20),
(302, 'SEKADAU', 20),
(303, 'KOTAWARINGIN TIMUR', 21),
(304, 'SUKAMARA', 21),
(305, 'KOTAWARINGIN BARAT', 21),
(306, 'BARITO TIMUR', 21),
(307, 'KAPUAS', 21),
(308, 'PULANG PISAU', 21),
(309, 'LAMANDAU', 21),
(310, 'SERUYAN', 21),
(311, 'KATINGAN', 21),
(312, 'BARITO SELATAN', 21),
(313, 'MURUNG RAYA', 21),
(314, 'BARITO UTARA', 21),
(315, 'GUNUNG MAS', 21),
(316, 'PALANGKA RAYA', 21),
(317, 'TAPIN', 22),
(318, 'BANJAR', 22),
(319, 'HULU SUNGAI TENGAH', 22),
(320, 'TABALONG', 22),
(321, 'HULU SUNGAI UTARA', 22),
(322, 'BALANGAN', 22),
(323, 'TANAH BUMBU', 22),
(324, 'BANJARMASIN', 22),
(325, 'KOTABARU', 22),
(326, 'TANAH LAUT', 22),
(327, 'HULU SUNGAI SELATAN', 22),
(328, 'BARITO KUALA', 22),
(329, 'BANJARBARU', 22),
(330, 'KUTAI BARAT', 23),
(331, 'SAMARINDA', 23),
(332, 'PASER', 23),
(333, 'KUTAI KARTANEGARA', 23),
(334, 'BERAU', 23),
(335, 'PENAJAM PASER UTARA', 23),
(336, 'BONTANG', 23),
(337, 'KUTAI TIMUR', 23),
(338, 'BALIKPAPAN', 23),
(339, 'MALINAU', 24),
(340, 'NUNUKAN', 24),
(341, 'BULUNGAN (BULONGAN)', 24),
(342, 'TANA TIDUNG', 24),
(343, 'TARAKAN', 24),
(344, 'BOLAANG MONGONDOW (BOLMONG)', 25),
(345, 'BOLAANG MONGONDOW SELATAN', 25),
(346, 'MINAHASA SELATAN', 25),
(347, 'BITUNG', 25),
(348, 'MINAHASA', 25),
(349, 'KEPULAUAN SANGIHE', 25),
(350, 'MINAHASA UTARA', 25),
(351, 'KEPULAUAN TALAUD', 25),
(352, 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)', 25),
(353, 'MANADO', 25),
(354, 'BOLAANG MONGONDOW UTARA', 25),
(355, 'BOLAANG MONGONDOW TIMUR', 25),
(356, 'MINAHASA TENGGARA', 25),
(357, 'KOTAMOBAGU', 25),
(358, 'TOMOHON', 25),
(359, 'BANGGAI KEPULAUAN', 26),
(360, 'TOLI-TOLI', 26),
(361, 'PARIGI MOUTONG', 26),
(362, 'BUOL', 26),
(363, 'DONGGALA', 26),
(364, 'POSO', 26),
(365, 'MOROWALI', 26),
(366, 'TOJO UNA-UNA', 26),
(367, 'BANGGAI', 26),
(368, 'SIGI', 26),
(369, 'PALU', 26),
(370, 'MAROS', 27),
(371, 'WAJO', 27),
(372, 'BONE', 27),
(373, 'SOPPENG', 27),
(374, 'SIDENRENG RAPPANG / RAPANG', 27),
(375, 'TAKALAR', 27),
(376, 'BARRU', 27),
(377, 'LUWU TIMUR', 27),
(378, 'SINJAI', 27),
(379, 'PANGKAJENE KEPULAUAN', 27),
(380, 'PINRANG', 27),
(381, 'JENEPONTO', 27),
(382, 'PALOPO', 27),
(383, 'TORAJA UTARA', 27),
(384, 'LUWU', 27),
(385, 'BULUKUMBA', 27),
(386, 'MAKASSAR', 27),
(387, 'SELAYAR (KEPULAUAN SELAYAR)', 27),
(388, 'TANA TORAJA', 27),
(389, 'LUWU UTARA', 27),
(390, 'BANTAENG', 27),
(391, 'GOWA', 27),
(392, 'ENREKANG', 27),
(393, 'PAREPARE', 27),
(394, 'KOLAKA', 28),
(395, 'MUNA', 28),
(396, 'KONAWE SELATAN', 28),
(397, 'KENDARI', 28),
(398, 'KONAWE', 28),
(399, 'KONAWE UTARA', 28),
(400, 'KOLAKA UTARA', 28),
(401, 'BUTON', 28),
(402, 'BOMBANA', 28),
(403, 'WAKATOBI', 28),
(404, 'BAU-BAU', 28),
(405, 'BUTON UTARA', 28),
(406, 'GORONTALO UTARA', 29),
(407, 'BONE BOLANGO', 29),
(408, 'GORONTALO', 29),
(409, 'BOALEMO', 29),
(410, 'POHUWATO', 29),
(411, 'MAJENE', 30),
(412, 'MAMUJU', 30),
(413, 'MAMUJU UTARA', 30),
(414, 'POLEWALI MANDAR', 30),
(415, 'MAMASA', 30),
(416, 'MALUKU TENGGARA BARAT', 31),
(417, 'MALUKU TENGGARA', 31),
(418, 'SERAM BAGIAN BARAT', 31),
(419, 'MALUKU TENGAH', 31),
(420, 'SERAM BAGIAN TIMUR', 31),
(421, 'MALUKU BARAT DAYA', 31),
(422, 'AMBON', 31),
(423, 'BURU', 31),
(424, 'BURU SELATAN', 31),
(425, 'KEPULAUAN ARU', 31),
(426, 'TUAL', 31),
(427, 'HALMAHERA BARAT', 32),
(428, 'TIDORE KEPULAUAN', 32),
(429, 'TERNATE', 32),
(430, 'PULAU MOROTAI', 32),
(431, 'KEPULAUAN SULA', 32),
(432, 'HALMAHERA SELATAN', 32),
(433, 'HALMAHERA TENGAH', 32),
(434, 'HALMAHERA TIMUR', 32),
(435, 'HALMAHERA UTARA', 32),
(436, 'YALIMO', 33),
(437, 'DOGIYAI', 33),
(438, 'ASMAT', 33),
(439, 'JAYAPURA', 33),
(440, 'PANIAI', 33),
(441, 'MAPPI', 33),
(442, 'TOLIKARA', 33),
(443, 'PUNCAK JAYA', 33),
(444, 'PEGUNUNGAN BINTANG', 33),
(445, 'JAYAWIJAYA', 33),
(446, 'LANNY JAYA', 33),
(447, 'NDUGA', 33),
(448, 'BIAK NUMFOR', 33),
(449, 'KEPULAUAN YAPEN (YAPEN WAROPEN)', 33),
(450, 'PUNCAK', 33),
(451, 'INTAN JAYA', 33),
(452, 'WAROPEN', 33),
(453, 'NABIRE', 33),
(454, 'MIMIKA', 33),
(455, 'BOVEN DIGOEL', 33),
(456, 'YAHUKIMO', 33),
(457, 'SARMI', 33),
(458, 'MERAUKE', 33),
(459, 'DEIYAI (DELIYAI)', 33),
(460, 'KEEROM', 33),
(461, 'SUPIORI', 33),
(462, 'MAMBERAMO RAYA', 33),
(463, 'MAMBERAMO TENGAH', 33),
(464, 'RAJA AMPAT', 34),
(465, 'MANOKWARI SELATAN', 34),
(466, 'MANOKWARI', 34),
(467, 'KAIMANA', 34),
(468, 'MAYBRAT', 34),
(469, 'SORONG SELATAN', 34),
(470, 'FAKFAK', 34),
(471, 'PEGUNUNGAN ARFAK', 34),
(472, 'TAMBRAUW', 34),
(473, 'SORONG', 34),
(474, 'TELUK WONDAMA', 34),
(475, 'TELUK BINTUNI', 34);

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_spd` varchar(255) DEFAULT NULL,
  `maksud` varchar(255) NOT NULL,
  `status_spd` varchar(255) NOT NULL,
  `jenis_perjalanan` varchar(255) NOT NULL,
  `jenis_transportasi` varchar(255) NOT NULL,
  `provinsi` bigint(20) UNSIGNED NOT NULL,
  `kota` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `lama` int(11) NOT NULL,
  `malam` int(11) NOT NULL,
  `verifikasi_pada` date DEFAULT NULL,
  `verifikasi_oleh` varchar(255) DEFAULT NULL,
  `verifikasi_pelaksanaan_pada` date DEFAULT NULL,
  `verifikasi_pelaksanaan_oleh` varchar(255) DEFAULT NULL,
  `verifikasi_bendahara_pada` date DEFAULT NULL,
  `verifikasi_bendahara_oleh` bigint(20) UNSIGNED DEFAULT NULL,
  `ditolak_oleh` bigint(20) UNSIGNED DEFAULT NULL,
  `input_by` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_permintaans`
--

CREATE TABLE `laporan_permintaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `laporan_spd_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `lama` varchar(255) NOT NULL,
  `malam` varchar(255) NOT NULL,
  `biaya_taksi` int(11) NOT NULL,
  `biaya_transportasi_darat` int(11) NOT NULL,
  `tiket_pesawat` int(11) NOT NULL,
  `biaya_penginapan` int(11) NOT NULL,
  `uang_harian` int(11) NOT NULL,
  `uang_representasi` int(11) NOT NULL,
  `jumlah_biaya_penginapan` int(11) NOT NULL,
  `jumlah_uang_harian` int(11) NOT NULL,
  `jumlah_uang_representasi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mata_anggarans`
--

CREATE TABLE `mata_anggarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mak` varchar(255) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `input_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_anggarans`
--

INSERT INTO `mata_anggarans` (`id`, `kode_mak`, `ket`, `input_by`, `created_at`, `updated_at`) VALUES
(1, '3722.PAC.002.051.A.524111', '', 'Dima Septa', '2023-06-01 04:01:16', '2023-06-01 04:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_01_144158_create_jabatans_table', 1),
(6, '2023_03_03_054412_create_golongans_table', 1),
(7, '2023_03_07_123338_create_spds_table', 1),
(8, '2023_03_08_102955_create_representasis_table', 1),
(9, '2023_03_17_112327_create_kotas_table', 1),
(10, '2023_03_23_150835_create_permintaans_table', 1),
(11, '2023_04_04_064545_create_provinsis_table', 1),
(12, '2023_04_04_070012_create_biaya_transportasi_darats_table', 1),
(13, '2023_04_04_070304_create_biaya_tiket_pesawats_table', 1),
(14, '2023_04_04_112551_create_biayas_table', 1),
(15, '2023_04_28_151106_create_mata_anggarans_table', 1),
(16, '2023_05_02_013325_create_laporans_table', 1),
(17, '2023_05_02_013345_create_laporan_permintaans_table', 1),
(18, '2023_05_12_182844_create_notas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permintaan_id` bigint(20) UNSIGNED NOT NULL,
  `ket_nota` varchar(255) NOT NULL,
  `foto_nota` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id`, `user_id`, `permintaan_id`, `ket_nota`, `foto_nota`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'tes', 'foto_nota/mgdib10vkc9jFiTOjoZIcgE3ywqlLFZJvQInQsGe.png', '2023-07-11 11:21:04', '2023-07-11 11:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permintaans`
--

CREATE TABLE `permintaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `spd_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `lama` varchar(255) NOT NULL,
  `malam` varchar(255) NOT NULL,
  `biaya_taksi` int(11) NOT NULL,
  `biaya_transportasi_darat` int(11) NOT NULL,
  `tiket_pesawat` int(11) NOT NULL,
  `biaya_penginapan` int(11) NOT NULL,
  `uang_harian` int(11) NOT NULL,
  `uang_representasi` int(11) NOT NULL,
  `jumlah_biaya_penginapan` int(11) NOT NULL,
  `jumlah_uang_harian` int(11) NOT NULL,
  `jumlah_uang_representasi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permintaans`
--

INSERT INTO `permintaans` (`id`, `user_id`, `spd_id`, `nama`, `nip`, `golongan`, `provinsi`, `kota`, `lama`, `malam`, `biaya_taksi`, `biaya_transportasi_darat`, `tiket_pesawat`, `biaya_penginapan`, `uang_harian`, `uang_representasi`, `jumlah_biaya_penginapan`, `jumlah_uang_harian`, `jumlah_uang_representasi`, `jumlah`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'Dima Septa', '199917062003', 'PEJABAT ESELON I', '17', '260', '3', '2', 189000, 0, 0, 5478000, 480000, 250000, 10956000, 1440000, 750000, 13335000, '2023-06-02 08:11:39', '2023-06-02 08:11:39'),
(5, 4, 2, 'Beny Wahyudi', '199917062226', 'GOLONGAN II', '17', '260', '3', '2', 189000, 0, 0, 1138000, 480000, 0, 2276000, 1440000, 0, 1807000, '2023-06-02 08:11:39', '2023-06-02 08:11:39'),
(6, 6, 2, 'Danu Mulki', '1999170623141', 'GOLONGAN III', '17', '260', '3', '2', 189000, 0, 0, 1138000, 480000, 0, 2276000, 1440000, 0, 1807000, '2023-06-02 08:11:39', '2023-06-02 08:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prov_id` int(11) NOT NULL,
  `nama_provinsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `prov_id`, `nama_provinsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'ACEH', NULL, NULL),
(2, 2, 'SUMATERA UTARA', NULL, NULL),
(3, 3, 'SUMATERA BARAT', NULL, NULL),
(4, 4, 'RIAU', NULL, NULL),
(5, 5, 'JAMBI', NULL, NULL),
(6, 6, 'SUMATERA SELATAN', NULL, NULL),
(7, 7, 'BENGKULU', NULL, NULL),
(8, 8, 'LAMPUNG', NULL, NULL),
(9, 9, 'KEPULAUAN BANGKA BELITUNG', NULL, NULL),
(10, 10, 'KEPULAUAN RIAU', NULL, NULL),
(11, 11, 'DKI JAKARTA', NULL, NULL),
(12, 12, 'JAWA BARAT', NULL, NULL),
(13, 13, 'JAWA TENGAH', NULL, NULL),
(14, 14, 'DI YOGYAKARTA', NULL, NULL),
(15, 15, 'JAWA TIMUR', NULL, NULL),
(16, 16, 'BANTEN', NULL, NULL),
(17, 17, 'BALI', NULL, NULL),
(18, 18, 'NUSA TENGGARA BARAT', NULL, NULL),
(19, 19, 'NUSA TENGGARA TIMUR', NULL, NULL),
(20, 20, 'KALIMANTAN BARAT', NULL, NULL),
(21, 21, 'KALIMANTAN TENGAH', NULL, NULL),
(22, 22, 'KALIMANTAN SELATAN', NULL, NULL),
(23, 23, 'KALIMANTAN TIMUR', NULL, NULL),
(24, 24, 'KALIMANTAN UTARA', NULL, NULL),
(25, 25, 'SULAWESI UTARA', NULL, NULL),
(26, 26, 'SULAWESI TENGAH', NULL, NULL),
(27, 27, 'SULAWESI SELATAN', NULL, NULL),
(28, 28, 'SULAWESI TENGGARA', NULL, NULL),
(29, 29, 'GORONTALO', NULL, NULL),
(30, 30, 'SULAWESI BARAT', NULL, NULL),
(31, 31, 'MALUKU', NULL, NULL),
(32, 32, 'MALUKU UTARA', NULL, NULL),
(33, 33, 'PAPUA', NULL, NULL),
(34, 34, 'PAPUA BARAT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `representasis`
--

CREATE TABLE `representasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `luar_kota` int(11) DEFAULT NULL,
  `dalam_kota` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `representasis`
--

INSERT INTO `representasis` (`id`, `pangkat`, `luar_kota`, `dalam_kota`, `created_at`, `updated_at`) VALUES
(1, 'PEJABAT ESELON I', 250000, 125000, '2023-06-01 04:01:16', '2023-06-01 04:01:16'),
(2, 'PEJABAT ESELON II', 200000, 100000, '2023-06-01 04:01:16', '2023-06-01 04:01:16'),
(3, 'PEJABAT ESELON III', 150000, 75000, '2023-06-01 04:01:16', '2023-06-01 04:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `spds`
--

CREATE TABLE `spds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_spd` varchar(255) DEFAULT NULL,
  `maksud` varchar(255) NOT NULL,
  `nomor_surat_tugas` varchar(255) DEFAULT NULL,
  `status_spd` enum('usulan','verifikasi','pelaksanaan','selesai','ditolak') NOT NULL DEFAULT 'usulan',
  `jenis_perjalanan` enum('luar kota','dalam kota','diklat') NOT NULL,
  `jenis_transportasi` enum('darat','udara') NOT NULL,
  `provinsi` bigint(20) UNSIGNED NOT NULL,
  `kota` bigint(20) UNSIGNED NOT NULL,
  `mata_anggaran` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `lama` int(11) NOT NULL,
  `malam` int(11) NOT NULL,
  `undangan` varchar(255) DEFAULT NULL,
  `verifikasi_pada` datetime DEFAULT NULL,
  `verifikasi_oleh` bigint(20) UNSIGNED DEFAULT NULL,
  `verifikasi_pelaksanaan_pada` datetime DEFAULT NULL,
  `verifikasi_pelaksanaan_oleh` bigint(20) UNSIGNED DEFAULT NULL,
  `verifikasi_bendahara_pada` datetime DEFAULT NULL,
  `verifikasi_bendahara_oleh` bigint(20) UNSIGNED DEFAULT NULL,
  `bendahara` bigint(20) UNSIGNED DEFAULT NULL,
  `input_by` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spds`
--

INSERT INTO `spds` (`id`, `kode_spd`, `maksud`, `nomor_surat_tugas`, `status_spd`, `jenis_perjalanan`, `jenis_transportasi`, `provinsi`, `kota`, `mata_anggaran`, `tanggal_mulai`, `tanggal_pulang`, `lama`, `malam`, `undangan`, `verifikasi_pada`, `verifikasi_oleh`, `verifikasi_pelaksanaan_pada`, `verifikasi_pelaksanaan_oleh`, `verifikasi_bendahara_pada`, `verifikasi_bendahara_oleh`, `bendahara`, `input_by`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, '31/XI/2023/E', 'TES', 'tesst', 'selesai', 'luar kota', 'udara', 17, 260, 1, '2023-06-02', '2023-06-03', 3, 2, NULL, '2023-06-02 15:14:20', 8, '2023-06-02 15:27:25', 9, NULL, NULL, 10, 'Dima Septa', NULL, '2023-06-02 08:11:39', '2023-07-11 12:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `golongan_id` bigint(20) UNSIGNED NOT NULL,
  `spd_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permintaan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','pegawai','penanggung jawab kegiatan','pejabat pembuat komitmen','bendahara pengeluaran') NOT NULL DEFAULT 'pegawai',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `jabatan_id`, `golongan_id`, `spd_id`, `permintaan_id`, `name`, `nip`, `email`, `role`, `email_verified_at`, `image`, `contact`, `address`, `password`, `tempat_lahir`, `tgl_lahir`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 'Dima Septa', '199917062003', 'admin@gmail.com', 'admin', NULL, NULL, '0895327788649', 'lorem', '$2y$10$wCOYzkQZAomNa/QIh8u0Lut15KwKn8621QG/1txsbz6C.cZT3fvia', NULL, '1995-12-07', NULL, '2023-06-01 04:01:16', '2023-07-11 12:05:11'),
(2, 1, 1, NULL, NULL, 'Ahmad Akmal', '199917062004', 'pegawai@gmail.com', 'pegawai', NULL, NULL, '081234567891', 'lorem', '$2y$10$faynWAslOs4QMIJUSW8rUeu/386nQnK4eZDTgPRmaYiyDE4Vi7kde', NULL, '1995-12-07', NULL, '2023-06-01 04:01:16', '2023-06-01 04:01:16'),
(3, 1, 1, NULL, NULL, 'Eko Purwanto', '199917062005', 'ekopurwanto@gmail.com', 'pegawai', NULL, NULL, '081234567891', 'lorem', '$2y$10$1RxiJSqIXRm4DoEU7bwHeuUnv95C9eN/4hMJb3aS1vPJf8zfcCEAu', NULL, '1995-12-07', NULL, '2023-06-01 04:01:16', '2023-06-01 04:01:16'),
(4, 3, 7, NULL, NULL, 'Beny Wahyudi', '199917062226', 'beny@gmail.com', 'pegawai', NULL, NULL, '081234567891', 'lorem', '$2y$10$mTa8fuVjc4Cr1jDYTN7O5ujGdNMGIjYer.DK9AUPBd5WKflVS8pGS', NULL, '1995-12-07', NULL, '2023-06-01 04:01:16', '2023-07-11 12:05:11'),
(5, 3, 8, NULL, NULL, 'Rahmat Efendy', '1999170623361', 'rahmat@gmail.com', 'pegawai', NULL, NULL, '081234567891', 'lorem', '$2y$10$qj0lvlUzIB6d/h9/S/gimuXCn5ysFwXgc9j7ZV1GZCRdx6Dy/nzue', NULL, '1995-12-07', NULL, '2023-06-01 04:01:16', '2023-06-02 07:47:11'),
(6, 3, 6, NULL, NULL, 'Danu Mulki', '1999170623141', 'danu@gmail.com', 'pegawai', NULL, NULL, '081234567891', 'lorem', '$2y$10$6poPUZLhAiIIxAIm1O6OMO6dgaZ4chqT0RZlmFYvhqHwZ0qfGNfv2', NULL, '1995-12-07', NULL, '2023-06-01 04:01:16', '2023-07-11 12:05:11'),
(7, 3, 6, NULL, NULL, 'Restu Aryadi', '19991706214314', 'restu@gmail.com', 'pegawai', NULL, NULL, '081234567891', 'lorem', '$2y$10$YvW9NaZ9TJIfqUqHtfymtujS8IFqNXpQ5LwVGZiRW1lKPdBYtXPSS', NULL, '1995-12-07', NULL, '2023-06-01 04:01:16', '2023-06-01 04:01:16'),
(8, 2, 3, NULL, NULL, 'Drs. Widiantoro Puji W., M.Si', '19991706214532', 'penanggungjwb@gmail.com', 'penanggung jawab kegiatan', NULL, NULL, '081234567891', 'lorem', '$2y$10$h8KhgKN2lwMNPaqIEU3EVuxru.tRMZ/bgSZDZ96a7b6I0NFuZxWrC', NULL, '1995-12-07', NULL, '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(9, 2, 3, NULL, NULL, 'Erwansyah, S.E., M.Si.', '199917062152521', 'ppk@gmail.com', 'pejabat pembuat komitmen', NULL, NULL, '081234567891', 'lorem', '$2y$10$tD7g3pPxw/ZVM/PozuLOhOLzhxeirvnrAuTM9aM9GwpjhKvCY3BWS', NULL, '1995-12-07', NULL, '2023-06-01 04:01:17', '2023-06-01 04:01:17'),
(10, 2, 4, NULL, NULL, 'Resti Gustiawati', '19991706215887', 'bendahara@gmail.com', 'bendahara pengeluaran', NULL, NULL, '081234567891', 'lorem', '$2y$10$fLaKdBEnWl9lx221a1IotuHrmSMueDsNVno0wWIgo5BNS53DQDm0m', NULL, '1995-12-07', NULL, '2023-06-01 04:01:17', '2023-06-01 04:01:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biayas`
--
ALTER TABLE `biayas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biaya_tiket_pesawats`
--
ALTER TABLE `biaya_tiket_pesawats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biaya_transportasi_darats`
--
ALTER TABLE `biaya_transportasi_darats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `golongans_golongan_name_unique` (`golongan_name`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatans_jabatan_name_unique` (`jabatan_name`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_permintaans`
--
ALTER TABLE `laporan_permintaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_permintaans_user_id_foreign` (`user_id`);

--
-- Indexes for table `mata_anggarans`
--
ALTER TABLE `mata_anggarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_user_id_foreign` (`user_id`),
  ADD KEY `notas_permintaan_id_foreign` (`permintaan_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permintaans`
--
ALTER TABLE `permintaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permintaans_user_id_foreign` (`user_id`),
  ADD KEY `permintaans_spd_id_foreign` (`spd_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representasis`
--
ALTER TABLE `representasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spds`
--
ALTER TABLE `spds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spds_kode_spd_unique` (`kode_spd`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biayas`
--
ALTER TABLE `biayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `biaya_tiket_pesawats`
--
ALTER TABLE `biaya_tiket_pesawats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `biaya_transportasi_darats`
--
ALTER TABLE `biaya_transportasi_darats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_permintaans`
--
ALTER TABLE `laporan_permintaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_anggarans`
--
ALTER TABLE `mata_anggarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permintaans`
--
ALTER TABLE `permintaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `representasis`
--
ALTER TABLE `representasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spds`
--
ALTER TABLE `spds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan_permintaans`
--
ALTER TABLE `laporan_permintaans`
  ADD CONSTRAINT `laporan_permintaans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_permintaan_id_foreign` FOREIGN KEY (`permintaan_id`) REFERENCES `permintaans` (`id`),
  ADD CONSTRAINT `notas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permintaans`
--
ALTER TABLE `permintaans`
  ADD CONSTRAINT `permintaans_spd_id_foreign` FOREIGN KEY (`spd_id`) REFERENCES `spds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permintaans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
