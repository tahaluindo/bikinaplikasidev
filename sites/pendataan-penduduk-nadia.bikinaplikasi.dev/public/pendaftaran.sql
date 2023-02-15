-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2020 at 11:24 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `no` tinyint(4) NOT NULL,
  `status` enum('Belum','Sudah','Skip') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `no`, `status`) VALUES
(1, 1, 'Belum'),
(2, 2, 'Belum'),
(4, 3, 'Belum'),
(5, 4, 'Belum'),
(6, 5, 'Belum'),
(7, 6, 'Belum'),
(8, 7, 'Belum'),
(9, 8, 'Belum'),
(10, 9, 'Belum'),
(11, 10, 'Belum'),
(12, 11, 'Belum'),
(13, 12, 'Belum'),
(14, 13, 'Belum'),
(15, 14, 'Belum'),
(16, 15, 'Belum'),
(17, 16, 'Belum'),
(18, 17, 'Belum'),
(19, 18, 'Belum'),
(20, 19, 'Belum'),
(21, 20, 'Belum'),
(22, 21, 'Belum'),
(23, 22, 'Belum'),
(24, 23, 'Belum'),
(25, 24, 'Belum'),
(26, 25, 'Belum'),
(27, 26, 'Belum'),
(28, 27, 'Belum'),
(29, 28, 'Belum'),
(30, 29, 'Belum'),
(31, 30, 'Belum'),
(32, 31, 'Belum'),
(33, 32, 'Belum'),
(34, 33, 'Belum'),
(35, 34, 'Belum'),
(36, 35, 'Belum'),
(37, 36, 'Belum'),
(38, 37, 'Belum'),
(39, 38, 'Belum'),
(40, 39, 'Belum'),
(41, 40, 'Belum'),
(42, 41, 'Belum'),
(43, 42, 'Belum'),
(44, 43, 'Belum'),
(45, 44, 'Belum'),
(46, 45, 'Belum'),
(47, 46, 'Belum'),
(48, 47, 'Belum'),
(49, 48, 'Belum'),
(50, 49, 'Belum'),
(51, 50, 'Belum'),
(52, 51, 'Belum'),
(53, 52, 'Belum'),
(54, 53, 'Belum'),
(55, 54, 'Belum'),
(56, 55, 'Belum'),
(57, 56, 'Belum'),
(58, 57, 'Belum'),
(59, 58, 'Belum'),
(60, 59, 'Belum'),
(61, 60, 'Belum'),
(62, 61, 'Belum'),
(63, 62, 'Belum'),
(64, 63, 'Belum'),
(65, 64, 'Belum'),
(66, 65, 'Belum'),
(67, 66, 'Belum'),
(68, 67, 'Belum'),
(69, 68, 'Belum'),
(70, 69, 'Belum'),
(71, 70, 'Belum'),
(72, 71, 'Belum'),
(73, 72, 'Belum'),
(74, 73, 'Belum'),
(75, 74, 'Belum'),
(76, 75, 'Belum'),
(77, 76, 'Belum'),
(78, 77, 'Belum'),
(79, 78, 'Belum'),
(80, 79, 'Belum'),
(81, 80, 'Belum'),
(82, 81, 'Belum'),
(83, 82, 'Belum'),
(84, 83, 'Belum'),
(85, 84, 'Belum'),
(86, 85, 'Belum'),
(87, 86, 'Belum'),
(88, 87, 'Belum'),
(89, 88, 'Belum'),
(90, 89, 'Belum'),
(91, 90, 'Belum'),
(92, 91, 'Belum'),
(93, 92, 'Belum'),
(94, 93, 'Belum'),
(95, 94, 'Belum'),
(96, 95, 'Belum'),
(97, 96, 'Belum'),
(98, 97, 'Belum'),
(99, 98, 'Belum'),
(100, 99, 'Belum'),
(101, 100, 'Belum'),
(102, 101, 'Belum'),
(103, 102, 'Belum'),
(104, 103, 'Belum'),
(105, 104, 'Belum'),
(106, 105, 'Belum'),
(107, 106, 'Belum'),
(108, 107, 'Belum'),
(109, 108, 'Belum'),
(110, 109, 'Belum'),
(111, 110, 'Belum'),
(112, 111, 'Belum'),
(113, 112, 'Belum'),
(114, 113, 'Belum'),
(115, 114, 'Belum'),
(116, 115, 'Belum'),
(117, 116, 'Belum'),
(118, 117, 'Belum'),
(119, 118, 'Belum'),
(120, 119, 'Belum'),
(121, 120, 'Belum'),
(122, 121, 'Belum'),
(123, 122, 'Belum'),
(124, 123, 'Belum'),
(125, 124, 'Belum'),
(126, 125, 'Belum'),
(127, 126, 'Belum'),
(128, 127, 'Belum'),
(129, 127, 'Belum'),
(130, 127, 'Belum'),
(131, 127, 'Belum'),
(132, 127, 'Belum'),
(133, 127, 'Belum'),
(134, 127, 'Belum'),
(135, 127, 'Belum'),
(136, 127, 'Belum'),
(137, 127, 'Belum'),
(138, 127, 'Belum'),
(139, 127, 'Belum'),
(140, 127, 'Belum'),
(141, 127, 'Belum'),
(142, 127, 'Belum'),
(143, 127, 'Belum'),
(144, 127, 'Belum'),
(145, 127, 'Belum'),
(146, 127, 'Belum'),
(147, 127, 'Belum'),
(148, 127, 'Belum'),
(149, 127, 'Belum'),
(150, 127, 'Belum'),
(151, 127, 'Belum'),
(152, 127, 'Belum'),
(153, 127, 'Belum'),
(154, 127, 'Belum'),
(155, 127, 'Belum'),
(156, 127, 'Belum'),
(157, 127, 'Belum'),
(158, 127, 'Belum'),
(159, 127, 'Belum'),
(160, 127, 'Belum'),
(161, 127, 'Belum'),
(162, 127, 'Belum'),
(163, 127, 'Belum'),
(164, 127, 'Belum'),
(165, 127, 'Belum'),
(166, 127, 'Belum'),
(167, 127, 'Belum'),
(168, 127, 'Belum'),
(169, 127, 'Belum'),
(170, 127, 'Belum'),
(171, 127, 'Belum'),
(172, 127, 'Belum'),
(173, 127, 'Belum'),
(174, 127, 'Belum'),
(175, 127, 'Belum'),
(176, 127, 'Belum'),
(177, 127, 'Belum'),
(178, 127, 'Belum'),
(179, 127, 'Belum'),
(180, 127, 'Belum'),
(181, 127, 'Belum'),
(182, 127, 'Belum'),
(183, 127, 'Belum'),
(184, 127, 'Belum'),
(185, 127, 'Belum'),
(186, 127, 'Belum'),
(187, 127, 'Belum'),
(188, 127, 'Belum'),
(189, 127, 'Belum'),
(190, 127, 'Belum'),
(191, 127, 'Belum'),
(192, 127, 'Belum'),
(193, 127, 'Belum'),
(194, 127, 'Belum'),
(195, 127, 'Belum'),
(196, 127, 'Belum'),
(197, 127, 'Belum'),
(198, 127, 'Belum'),
(199, 127, 'Belum'),
(200, 127, 'Belum'),
(201, 127, 'Belum'),
(202, 127, 'Belum'),
(203, 127, 'Belum'),
(204, 127, 'Belum'),
(205, 127, 'Belum'),
(206, 127, 'Belum'),
(207, 127, 'Belum'),
(208, 127, 'Belum'),
(209, 127, 'Belum'),
(210, 127, 'Belum'),
(211, 127, 'Belum'),
(212, 127, 'Belum'),
(213, 127, 'Belum'),
(214, 127, 'Belum'),
(215, 127, 'Belum'),
(216, 127, 'Belum'),
(217, 127, 'Belum'),
(218, 127, 'Belum'),
(219, 127, 'Belum'),
(220, 127, 'Belum'),
(221, 127, 'Belum'),
(222, 127, 'Belum'),
(223, 127, 'Belum'),
(224, 127, 'Belum'),
(225, 127, 'Belum'),
(226, 127, 'Belum'),
(227, 127, 'Belum'),
(228, 127, 'Belum'),
(229, 127, 'Belum'),
(230, 127, 'Belum'),
(231, 127, 'Belum'),
(232, 127, 'Belum'),
(233, 127, 'Belum'),
(234, 127, 'Belum'),
(235, 127, 'Belum'),
(236, 127, 'Belum'),
(237, 127, 'Belum'),
(238, 127, 'Belum'),
(239, 127, 'Belum'),
(240, 127, 'Belum'),
(241, 127, 'Belum'),
(242, 127, 'Belum'),
(243, 127, 'Belum'),
(244, 127, 'Belum'),
(245, 127, 'Belum'),
(246, 127, 'Belum'),
(247, 127, 'Belum'),
(248, 127, 'Belum'),
(249, 127, 'Belum'),
(250, 127, 'Belum'),
(251, 127, 'Belum'),
(252, 127, 'Belum'),
(253, 127, 'Belum'),
(254, 127, 'Belum'),
(255, 127, 'Belum'),
(256, 127, 'Belum'),
(257, 127, 'Belum'),
(258, 127, 'Belum'),
(259, 127, 'Belum'),
(260, 127, 'Belum'),
(261, 127, 'Belum'),
(262, 127, 'Belum'),
(263, 127, 'Belum'),
(264, 127, 'Belum'),
(265, 127, 'Belum'),
(266, 127, 'Belum'),
(267, 127, 'Belum'),
(268, 127, 'Belum'),
(269, 127, 'Belum'),
(270, 127, 'Belum'),
(271, 127, 'Belum'),
(272, 127, 'Belum'),
(273, 127, 'Belum'),
(274, 127, 'Belum'),
(275, 127, 'Belum'),
(276, 127, 'Belum'),
(277, 127, 'Belum'),
(278, 127, 'Belum'),
(279, 127, 'Belum'),
(280, 127, 'Belum'),
(281, 127, 'Belum'),
(282, 127, 'Belum'),
(283, 127, 'Belum'),
(284, 127, 'Belum'),
(285, 127, 'Belum'),
(286, 127, 'Belum'),
(287, 127, 'Belum'),
(288, 127, 'Belum'),
(289, 127, 'Belum'),
(290, 127, 'Belum'),
(291, 127, 'Belum'),
(292, 127, 'Belum'),
(293, 127, 'Belum'),
(294, 127, 'Belum'),
(295, 127, 'Belum'),
(296, 127, 'Belum'),
(297, 127, 'Belum'),
(298, 127, 'Belum'),
(299, 127, 'Belum'),
(300, 127, 'Belum'),
(301, 127, 'Belum'),
(302, 127, 'Belum'),
(303, 127, 'Belum'),
(304, 127, 'Belum'),
(305, 127, 'Belum'),
(306, 127, 'Belum'),
(307, 127, 'Belum'),
(308, 127, 'Belum'),
(309, 127, 'Belum'),
(310, 127, 'Belum'),
(311, 127, 'Belum'),
(312, 127, 'Belum'),
(313, 127, 'Belum'),
(314, 127, 'Belum'),
(315, 127, 'Belum'),
(316, 127, 'Belum'),
(317, 127, 'Belum'),
(318, 127, 'Belum'),
(319, 127, 'Belum'),
(320, 127, 'Belum'),
(321, 127, 'Belum'),
(322, 127, 'Belum'),
(323, 127, 'Belum'),
(324, 127, 'Belum'),
(325, 127, 'Belum'),
(326, 127, 'Belum'),
(327, 127, 'Belum'),
(328, 127, 'Belum'),
(329, 127, 'Belum'),
(330, 127, 'Belum'),
(331, 127, 'Belum'),
(332, 127, 'Belum'),
(333, 127, 'Belum'),
(334, 127, 'Belum'),
(335, 127, 'Belum'),
(336, 127, 'Belum'),
(337, 127, 'Belum'),
(338, 127, 'Belum'),
(339, 127, 'Belum'),
(340, 127, 'Belum'),
(341, 127, 'Belum'),
(342, 127, 'Belum'),
(343, 127, 'Belum'),
(344, 127, 'Belum'),
(345, 127, 'Belum'),
(346, 127, 'Belum'),
(347, 127, 'Belum'),
(348, 127, 'Belum'),
(349, 127, 'Belum'),
(350, 127, 'Belum'),
(351, 127, 'Belum'),
(352, 127, 'Belum'),
(353, 127, 'Belum'),
(354, 127, 'Belum'),
(355, 127, 'Belum'),
(356, 127, 'Belum'),
(357, 127, 'Belum'),
(358, 127, 'Belum'),
(359, 127, 'Belum'),
(360, 127, 'Belum'),
(361, 127, 'Belum'),
(362, 127, 'Belum'),
(363, 127, 'Belum'),
(364, 127, 'Belum'),
(365, 127, 'Belum'),
(366, 127, 'Belum'),
(367, 127, 'Belum'),
(368, 127, 'Belum'),
(369, 127, 'Belum'),
(370, 127, 'Belum'),
(371, 127, 'Belum'),
(372, 127, 'Belum'),
(373, 127, 'Belum'),
(374, 127, 'Belum'),
(375, 127, 'Belum'),
(376, 127, 'Belum'),
(377, 127, 'Belum'),
(378, 127, 'Belum'),
(379, 127, 'Belum'),
(380, 127, 'Belum'),
(381, 127, 'Belum'),
(382, 127, 'Belum'),
(383, 127, 'Belum'),
(384, 127, 'Belum'),
(385, 127, 'Belum'),
(386, 127, 'Belum'),
(387, 127, 'Belum'),
(388, 127, 'Belum'),
(389, 127, 'Belum'),
(390, 127, 'Belum'),
(391, 127, 'Belum'),
(392, 127, 'Belum'),
(393, 127, 'Belum'),
(394, 127, 'Belum'),
(395, 127, 'Belum'),
(396, 127, 'Belum'),
(397, 127, 'Belum'),
(398, 127, 'Belum'),
(399, 127, 'Belum'),
(400, 127, 'Belum'),
(401, 127, 'Belum'),
(402, 127, 'Belum'),
(403, 127, 'Belum'),
(404, 127, 'Belum'),
(405, 127, 'Belum'),
(406, 127, 'Belum'),
(407, 127, 'Belum'),
(408, 127, 'Belum'),
(409, 127, 'Belum'),
(410, 127, 'Belum'),
(411, 127, 'Belum'),
(412, 127, 'Belum'),
(413, 127, 'Belum'),
(414, 127, 'Belum'),
(415, 127, 'Belum'),
(416, 127, 'Belum'),
(417, 127, 'Belum'),
(418, 127, 'Belum'),
(419, 127, 'Belum'),
(420, 127, 'Belum'),
(421, 127, 'Belum'),
(422, 127, 'Belum'),
(423, 127, 'Belum'),
(424, 127, 'Belum'),
(425, 127, 'Belum'),
(426, 127, 'Belum'),
(427, 127, 'Belum'),
(428, 127, 'Belum'),
(429, 127, 'Belum'),
(430, 127, 'Belum'),
(431, 127, 'Belum'),
(432, 127, 'Belum'),
(433, 127, 'Belum'),
(434, 127, 'Belum'),
(435, 127, 'Belum'),
(436, 127, 'Belum'),
(437, 127, 'Belum'),
(438, 127, 'Belum'),
(439, 127, 'Belum'),
(440, 127, 'Belum'),
(441, 127, 'Belum'),
(442, 127, 'Belum'),
(443, 127, 'Belum'),
(444, 127, 'Belum'),
(445, 127, 'Belum'),
(446, 127, 'Belum'),
(447, 127, 'Belum'),
(448, 127, 'Belum'),
(449, 127, 'Belum'),
(450, 127, 'Belum'),
(451, 127, 'Belum'),
(452, 127, 'Belum'),
(453, 127, 'Belum'),
(454, 127, 'Belum'),
(455, 127, 'Belum'),
(456, 127, 'Belum'),
(457, 127, 'Belum'),
(458, 127, 'Belum'),
(459, 127, 'Belum'),
(460, 127, 'Belum'),
(461, 127, 'Belum'),
(462, 127, 'Belum'),
(463, 127, 'Belum'),
(464, 127, 'Belum'),
(465, 127, 'Belum'),
(466, 127, 'Belum'),
(467, 127, 'Belum'),
(468, 127, 'Belum'),
(469, 127, 'Belum'),
(470, 127, 'Belum'),
(471, 127, 'Belum'),
(472, 127, 'Belum'),
(473, 127, 'Belum'),
(474, 127, 'Belum'),
(475, 127, 'Belum'),
(476, 127, 'Belum'),
(477, 127, 'Belum'),
(478, 127, 'Belum'),
(479, 127, 'Belum'),
(480, 127, 'Belum'),
(481, 127, 'Belum'),
(482, 127, 'Belum'),
(483, 127, 'Belum'),
(484, 127, 'Belum'),
(485, 127, 'Belum'),
(486, 127, 'Belum'),
(487, 127, 'Belum'),
(488, 127, 'Belum'),
(489, 127, 'Belum'),
(490, 127, 'Belum'),
(491, 127, 'Belum'),
(492, 127, 'Belum'),
(493, 127, 'Belum'),
(494, 127, 'Belum'),
(495, 127, 'Belum'),
(496, 127, 'Belum'),
(497, 127, 'Belum'),
(498, 127, 'Belum'),
(499, 127, 'Belum'),
(500, 127, 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_akte`
--

CREATE TABLE `daftar_akte` (
  `id` int(11) NOT NULL,
  `nama_bayi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `kepala_keluarga` varchar(30) NOT NULL,
  `kec` varchar(15) NOT NULL,
  `kel` varchar(30) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `jam_terima` time NOT NULL,
  `jam_dtrm_opr` time DEFAULT NULL,
  `jam_slsai_opr` time DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_akte`
--

INSERT INTO `daftar_akte` (`id`, `nama_bayi`, `tanggal`, `no_kk`, `kepala_keluarga`, `kec`, `kel`, `penerima`, `jam_terima`, `jam_dtrm_opr`, `jam_slsai_opr`, `status`, `ket`, `operator`) VALUES
(1, '-', '2020-07-02', '123456789044', 'yanto suryanto', '2', 'SENGETI', 'Nando', '20:42:23', '20:51:33', '20:58:07', 'Sudah diajukan', '-sst', ''),
(2, '-', '2020-07-03', '9876542345', '', '', '', '', '01:30:07', '01:30:07', '00:00:00', 'diterima', '-', ''),
(4, '-', '2020-07-13', '24234234', 'dfsfsdf', '3', 'BETUNG', 'Mery', '14:28:51', '14:28:51', '14:38:05', 'Sudah diajukan', '-', ''),
(5, 'hyrtyrty', '2020-07-16', '24234234', 'sdfsdfsdf', '3', 'TANJUNG', 'Devy', '01:55:46', '01:55:46', '00:00:00', 'diterima', '-', ''),
(6, 'sdgsg', '2020-07-23', '2352525', 'sdgdsgsdg', '1', 'PIJOAN', 'Putri', '07:47:59', '07:47:59', '00:00:00', 'diterima', '-', 'Jefri'),
(7, 'yeyen', '2020-08-26', '1505012110190001', 'yanto', '3', 'TANJUNG', 'Putri', '16:11:53', '16:11:53', '00:00:00', 'diterima', '-', 'Jefri'),
(8, 'asdasd', '2020-08-26', '21314', 'asdasd', '2', 'SENGETI', 'Putri', '16:12:35', '16:12:35', '00:00:00', 'diterima', '-', 'Nori'),
(9, 'wefsd', '2020-08-26', '234523', 'fdsfsdf', '2', 'SENGETI', 'Putri', '16:15:05', '16:15:05', '00:00:00', 'diterima', '-', 'Nori');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_akte_kematian`
--

CREATE TABLE `daftar_akte_kematian` (
  `id` int(11) NOT NULL,
  `nama_almarhum` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `kepala_keluarga` varchar(30) NOT NULL,
  `kec` varchar(15) NOT NULL,
  `kel` varchar(30) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `jam_terima` time NOT NULL,
  `jam_dtrm_opr` time DEFAULT NULL,
  `jam_slsai_opr` time DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_akte_kematian`
--

INSERT INTO `daftar_akte_kematian` (`id`, `nama_almarhum`, `tanggal`, `no_kk`, `kepala_keluarga`, `kec`, `kel`, `penerima`, `jam_terima`, `jam_dtrm_opr`, `jam_slsai_opr`, `status`, `ket`, `operator`) VALUES
(1, 'fdghdhdf', '2020-07-23', '43636', 'hdfhfdh', '2', 'SENGETI', 'Putri', '07:49:38', '07:49:38', '00:00:00', 'diterima', '-', 'Aman'),
(2, 'yeyen', '2020-08-26', '1505012110190001', 'yanto', '2', 'SUAK PUTAT', 'Putri', '16:21:51', '16:21:51', '00:00:00', 'diterima', '-', 'Aman');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_akte_perceraian`
--

CREATE TABLE `daftar_akte_perceraian` (
  `id` int(11) NOT NULL,
  `nama_suami` varchar(50) NOT NULL,
  `nama_istri` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `kepala_keluarga` varchar(30) NOT NULL,
  `kec` varchar(15) NOT NULL,
  `kel` varchar(30) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `jam_terima` time NOT NULL,
  `jam_dtrm_opr` time DEFAULT NULL,
  `jam_slsai_opr` time DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_akte_perceraian`
--

INSERT INTO `daftar_akte_perceraian` (`id`, `nama_suami`, `nama_istri`, `tanggal`, `no_kk`, `kepala_keluarga`, `kec`, `kel`, `penerima`, `jam_terima`, `jam_dtrm_opr`, `jam_slsai_opr`, `status`, `ket`, `operator`) VALUES
(1, 'sfdfgf', 'sgdsgdsg', '2020-07-23', '235252', 'dsgdsgsg', '2', 'SENGETI', 'Putri', '07:50:27', '07:50:27', '00:00:00', 'diterima', '-', 'Nori');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_akte_perkawinan`
--

CREATE TABLE `daftar_akte_perkawinan` (
  `id` int(11) NOT NULL,
  `nama_suami` varchar(50) NOT NULL,
  `nama_istri` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `kepala_keluarga` varchar(30) NOT NULL,
  `kec` varchar(15) NOT NULL,
  `kel` varchar(30) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `jam_terima` time NOT NULL,
  `jam_dtrm_opr` time DEFAULT NULL,
  `jam_slsai_opr` time DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_akte_perkawinan`
--

INSERT INTO `daftar_akte_perkawinan` (`id`, `nama_suami`, `nama_istri`, `tanggal`, `no_kk`, `kepala_keluarga`, `kec`, `kel`, `penerima`, `jam_terima`, `jam_dtrm_opr`, `jam_slsai_opr`, `status`, `ket`, `operator`) VALUES
(1, 'sddgsg', 'sdgsg', '2020-07-23', '23425', 'fsdfsdgdsgsg', '3', 'TANJUNG', 'Putri', '07:49:57', '07:49:57', '00:00:00', 'diterima', '-', 'Jefri'),
(2, 'dgsgsg', 'sgsg', '2020-07-23', '23532532', 'fsdfsdgdsgsg', '2', 'SENGETI', 'Putri', '07:50:14', '07:50:14', '00:00:00', 'diterima', '-', 'Jefri');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kk`
--

CREATE TABLE `daftar_kk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `kepala_keluarga` varchar(30) NOT NULL,
  `kec` varchar(15) NOT NULL,
  `kel` varchar(30) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `jam_terima` time NOT NULL,
  `operator` varchar(30) DEFAULT NULL,
  `jam_dtrm_opr` time DEFAULT NULL,
  `jam_slsai_opr` time DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_kk`
--

INSERT INTO `daftar_kk` (`id`, `tanggal`, `no_kk`, `kepala_keluarga`, `kec`, `kel`, `penerima`, `jam_terima`, `operator`, `jam_dtrm_opr`, `jam_slsai_opr`, `status`, `ket`) VALUES
(23, '2020-07-22', '150502211210006', 'SUGENG SANTOSO', '2', 'SUKO AWIN JAYA', 'Nando', '19:00:58', 'Komar', '19:00:58', '19:08:32', 'Sudah dicetak', '-'),
(24, '2020-07-22', '1505061303170004', 'ADI INDIRA', '6', 'ARANG-ARANG', 'Nando', '19:02:01', 'Satri', '19:02:01', '19:08:39', 'Sudah dicetak', '-'),
(25, '2020-07-22', '1505051103080562', 'SUHARDI', '5', 'TANJUNG PAUH KM 32', 'Nando', '19:02:58', 'Mita', '19:02:58', '19:09:02', 'Sudah dicetak', '-'),
(26, '2020-07-22', '1505020801130003', 'ABDUL KAMIT', '2', 'SENGETI', 'Nando', '19:03:43', 'Febby', '19:03:43', '19:09:14', 'Sudah dicetak', '-'),
(27, '2020-07-22', '1505022107200003', 'HABIBI', '2', 'SEKERNAN', 'Nando', '19:04:30', 'Widia', '19:04:30', '19:09:49', 'Sudah dicetak', '-'),
(28, '2020-07-22', '1505023001170004', 'ARDIYANTO', '4', 'MUDUNG DARAT', 'Nando', '19:11:27', 'Yeni', '19:11:27', '19:33:38', 'Sudah dicetak', '-'),
(29, '2020-07-22', '1505061304150005', 'SALIM', '6', 'PUDAK', 'Nando', '19:12:44', 'Komar', '19:12:44', '19:33:56', 'Sudah dicetak', '-'),
(30, '2020-07-22', '150504110308598', 'MUKHTAR', '4', 'MUDUNG DARAT', 'Nando', '19:13:43', 'Satri', '19:13:43', '19:34:08', 'Sudah dicetak', '-'),
(31, '2020-07-22', '1505010406140007', 'HUSIN', '1', 'SUNGAI DUREN', 'Nando', '19:15:05', 'Mita', '19:15:05', '19:34:17', 'Sudah dicetak', '-'),
(32, '2020-07-22', '1505071103083643', 'JURI', '7', 'PANCA MULYA', 'Nando', '19:16:25', 'Febby', '19:16:25', '19:34:29', 'Sudah dicetak', '-'),
(33, '2020-07-22', '1505051103082897', 'RIZAL', '5', 'MUARO SEBAPO', 'Nando', '19:19:35', 'Widia', '19:19:35', '19:34:37', 'Sudah dicetak', '-'),
(34, '2020-07-22', '1505051001870004', 'SABRAN', '5', 'NAGA SARI', 'Nando', '19:22:07', 'Yeni', '19:22:07', '19:34:51', 'Sudah dicetak', '-'),
(35, '2020-07-22', '150501030412009', 'AMAN SYAH', '1', 'PENYENGAT OLAK', 'Nando', '19:23:17', 'Komar', '19:23:17', '19:34:59', 'Sudah dicetak', '-'),
(36, '2020-07-22', '150501103088466', 'YASMADI', '1', 'SARANG BURUNG', 'Nando', '19:25:25', 'Satri', '19:25:25', '19:35:08', 'Sudah dicetak', '-'),
(37, '2020-07-22', '1505011203083339', 'SUTION', '5', 'SUKA MAJU', 'Nando', '19:27:28', 'Mita', '19:27:28', '19:35:15', 'Sudah dicetak', '-'),
(38, '2020-07-22', '1505002110308248', 'ZARLI HAIDIR', '2', 'BEREMBANG', 'Nando', '19:28:33', 'Widia', '19:28:33', '19:35:26', 'Sudah dicetak', '-'),
(39, '2020-07-22', '15050811130008', 'PURNOMO', '8', 'TANGKIT', 'Nando', '19:29:36', 'Yeni', '19:29:36', '19:35:37', 'Sudah dicetak', '-'),
(40, '2020-07-22', '1505011604200011', 'MURSIAM', '1', 'PIJOAN', 'Nando', '19:31:02', 'Yeni', '19:31:02', '19:35:49', 'Sudah dicetak', '-'),
(41, '2020-07-22', '1505072501180001', 'RUDIONO PASARIBU', '7', 'MARGA MULYA', 'Nando', '19:32:25', 'Widia', '19:32:25', '19:36:02', 'Sudah dicetak', '-'),
(42, '2020-07-22', '1505071106080054', 'SUANTO', '7', 'MARGA MULYA', 'Nando', '19:33:26', 'Febby', '19:33:26', '19:36:14', 'Sudah dicetak', '-'),
(43, '2020-07-22', '1505062711170008', 'MURYANTI', '6', 'PUDAK', 'Nando', '19:37:19', 'Mita', '19:37:19', '19:47:21', 'Sudah dicetak', '-'),
(44, '2020-07-22', '1505041207780001', 'HERMAN', '11', 'KUNANGAN', 'Nando', '19:38:17', 'Satri', '19:38:17', '19:47:29', 'Sudah dicetak', '-'),
(45, '2020-07-22', '1505041103084885', 'ZAINAL', '11', 'KUNANGAN', 'Nando', '19:39:41', 'Komar', '19:39:41', '19:47:53', 'Sudah dicetak', '-'),
(46, '2020-07-22', '1505032003140047', 'M. ISA', '3', 'TANJUNG', 'Nando', '19:40:42', 'Komar', '19:40:42', '19:48:03', 'Sudah dicetak', '-'),
(47, '2020-07-22', '1505011809190004', 'MUSTAWA RAHMAN', '1', 'MENDALO DARAT', 'Nando', '19:41:48', 'Satri', '19:41:48', '19:48:11', 'Sudah dicetak', '-'),
(48, '2020-07-22', '1505082301180008', 'SUGIYEM M. MULYO', '8', 'SUMBER AGUNG', 'Nando', '19:43:35', 'Mita', '19:43:35', '19:48:59', 'Sudah dicetak', '-'),
(49, '2020-07-22', '1505051103085927', 'AHMAD SUNDOYONO', '5', 'NYOGAN', 'Nando', '19:44:48', 'Febby', '19:44:48', '19:48:28', 'Sudah dicetak', '-'),
(50, '2020-07-22', '1505011512100040', 'AZHARI ISHAK', '1', 'SARANG BURUNG', 'Nando', '19:45:54', 'Widia', '19:45:54', '19:48:40', 'Sudah dicetak', '-'),
(51, '2020-07-22', '1505010306131096', 'sopian', '1', 'MUHAJIRIN', 'Nando', '19:47:08', 'Yeni', '19:47:08', '19:47:38', 'Sudah dicetak', '-'),
(52, '2020-07-22', '1505010407140003', 'M. HAFIS', '1', 'MENDALO INDAH', 'Nando', '19:50:54', 'Febby', '19:50:54', '19:53:55', 'Sudah dicetak', '-'),
(53, '2020-07-22', '150509150719001', 'RIAN IRAWAN', '9', 'BUKIT MULYA', 'Nando', '19:52:12', 'Komar', '19:52:12', '19:59:48', 'Sudah dicetak', '-'),
(54, '2020-07-22', '1507096806570002', 'ZUBAIDAH', '6', 'MUARA KUMPEH', 'Nando', '19:53:37', 'Satri', '19:53:37', '19:59:56', 'Sudah dicetak', '-'),
(55, '2020-07-23', '234252525', 'ggsgsg', '2', 'SENGETI', 'Nando', '07:37:33', 'Satri', '07:37:33', '00:00:00', 'diterima Satri', '-'),
(56, '2020-08-26', '2342342343243253', 'cfdasdfasf', '2', 'SENGETI', 'Nando', '16:17:21', 'Komar', '16:17:21', '00:00:00', 'diterima Komar', '-'),
(57, '2020-08-26', '1505012110190001', 'yanto', '11', 'KUNANGAN', 'Nando', '16:20:50', 'Komar', '16:20:50', '00:00:00', 'diterima Komar', '-');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ktp`
--

CREATE TABLE `daftar_ktp` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kec` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `jam_terima` varchar(15) NOT NULL,
  `selesai_operator` time NOT NULL DEFAULT '00:00:00',
  `status` varchar(15) NOT NULL,
  `ket` varchar(100) NOT NULL DEFAULT '-',
  `ip` varchar(20) NOT NULL,
  `nama_pc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_ktp`
--

INSERT INTO `daftar_ktp` (`id`, `tanggal`, `nik`, `nama`, `kec`, `desa`, `jam_terima`, `selesai_operator`, `status`, `ket`, `ip`, `nama_pc`) VALUES
(1, '2020-07-03', '08765345678', 'bintang', '2', 'SENGETI', '00:19:13', '00:31:44', 'Dalam Proses', '3', '::1', 'DESKTOP-R8G2IGL'),
(2, '2020-07-07', '1505022607020002', 'indri', '2', 'SENGETI', '11:21:14', '11:21:41', 'Tercetak blm di', '-', '10.9.226.141', 'ip-10-9-226-141.ec2.internal'),
(4, '2020-07-13', '345345345', 'gfhgfhfgh', '3', 'BETUNG', '15:53:00', '00:00:00', '-', '-', '::1', 'DESKTOP-ECN9CSG'),
(5, '2020-07-13', '2342342', 'ssdfsdfdsf', '3', 'TANJUNG', '17:21:53', '00:00:00', '-', '-', '::1', 'DESKTOP-ECN9CSG'),
(6, '2020-07-22', '1505015609680002', 'FATMA ABDULLAH', '1', 'SIMPANG LIMO', '20:12:24', '00:00:00', '-', '-', '::1', 'Lenovo'),
(7, '2020-07-22', '1505012507920002', 'RIDWAN', '1', 'SIMPANG LIMO', '20:14:04', '00:00:00', '-', '-', '::1', 'Lenovo'),
(8, '2020-08-26', '1505012110190001', 'Yuyun', '2', 'SUAK PUTAT', '16:21:16', '00:00:00', '-', '-', '::1', 'DESKTOP-ECN9CSG');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_surat_pindah`
--

CREATE TABLE `daftar_surat_pindah` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `kepala_keluarga` varchar(30) NOT NULL,
  `kec` varchar(15) NOT NULL,
  `kel` varchar(30) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `jam_terima` time NOT NULL,
  `operator` varchar(30) DEFAULT NULL,
  `jam_dtrm_opr` time DEFAULT NULL,
  `jam_slsai_opr` time DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `nama_anggota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_surat_pindah`
--

INSERT INTO `daftar_surat_pindah` (`id`, `tanggal`, `no_kk`, `kepala_keluarga`, `kec`, `kel`, `penerima`, `jam_terima`, `operator`, `jam_dtrm_opr`, `jam_slsai_opr`, `status`, `ket`, `nama_anggota`) VALUES
(18, '2020-07-03', '0987654321', 'dfgdfgdfgdfg', '5', 'TEMPINO', 'Devy', '03:08:54', 'Tati', '03:08:54', '00:00:00', 'diterima Tati', '-', 'dfghjkl,fghjkl'),
(19, '2020-07-03', '0987654321', 'dfgdfgdfgdfg', '5', 'TEMPINO', 'Devy', '03:09:27', 'Mery', '03:09:27', '00:00:00', 'diterima Mery', '-', 'jhgstet345,sfsfsdfsdfsdfsdf'),
(21, '2020-07-13', '123', 'dfgdfgdfgdg', '3', 'BETUNG', 'Mery', '15:57:41', 'Devy', '15:57:41', '00:00:00', 'diterima Devy', '-', 'asdsad'),
(22, '2020-07-22', '150502211210006', 'SUGENG SANTOSO', '2', 'SUKO AWIN JAYA', 'Devy', '20:07:57', 'Mery', '20:07:57', '00:00:00', 'diterima Mery', '-', ''),
(23, '2020-07-22', '1505061303170004', 'ADI INDIRA', '6', 'ARANG-ARANG', 'Devy', '20:10:26', 'Tati', '20:10:26', '00:00:00', 'diterima Tati', '-', ''),
(24, '2020-07-23', '150502211210006', 'SUGENG SANTOSO', '2', 'SENGETI', 'Devy', '07:41:19', 'Devy', '07:41:19', '00:00:00', 'diterima Devy', '-', 'sdfdsfs'),
(25, '2020-08-26', '1505012110190001', 'yanto', '5', 'TANJUNG PAUH KM 32', 'Devy', '16:23:03', 'Tati', '16:23:03', '00:00:00', 'diterima Tati', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(6) NOT NULL,
  `id_kec_fk` int(2) NOT NULL,
  `nama_desa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `id_kec_fk`, `nama_desa`) VALUES
(11003, 1, 'PIJOAN'),
(12002, 1, 'SUNGAI BERTAM'),
(12004, 1, 'PEMATANG JERING'),
(12005, 1, 'MUARO PIJOAN'),
(12006, 1, 'SUNGAI DUREN'),
(12007, 1, 'MENDALO DARAT'),
(12008, 1, 'RENGAS BANDUNG'),
(12009, 1, 'SARANG BURUNG'),
(12010, 1, 'MENDALO LAUT'),
(12011, 1, 'SEMBUBUK'),
(12012, 1, 'SENAUNG'),
(12013, 1, 'PENYENGAT OLAK'),
(12014, 1, 'SIMPANG SUNGAI DUREN'),
(12015, 1, 'KEDEMANGAN'),
(12016, 1, 'MUHAJIRIN'),
(12017, 1, 'MARO SEBO'),
(12019, 1, 'DANAU SARANG ELANG'),
(12020, 1, 'SIMPANG LIMO'),
(12021, 1, 'MENDALO INDAH'),
(12022, 1, 'PEMATANG GAJAH'),
(21010, 2, 'SENGETI'),
(22001, 2, 'SUAK PUTAT'),
(22002, 2, 'RANTAU MAJO'),
(22003, 2, 'PULAU KAYU ARO'),
(22004, 2, 'PEMATANG PULAI'),
(22005, 2, 'TANTAN'),
(22006, 2, 'KEDOTAN'),
(22007, 2, 'KERANGGAN'),
(22008, 2, 'BEREMBANG'),
(22009, 2, 'SEKERNAN'),
(22011, 2, 'GERUNGGUNG'),
(22012, 2, 'TUNAS BARU'),
(22013, 2, 'BUKIT BALING'),
(22014, 2, 'TANJUNG LANJUT'),
(22015, 2, 'SUKO AWIN JAYA'),
(22016, 2, 'TUNAS MUDO'),
(31008, 3, 'TANJUNG'),
(32001, 3, 'PUDING'),
(32002, 3, 'PULAU MENTARO'),
(32003, 3, 'BETUNG'),
(32004, 3, 'PEMATANG RAMAN'),
(32005, 3, 'SUNGAI BUNGUR'),
(32006, 3, 'SEPONJEN'),
(32007, 3, 'SOGO'),
(32009, 3, 'SUNGAI AUR'),
(32010, 3, 'JEBUS'),
(32011, 3, 'GEDONG KARYA'),
(32013, 3, 'RANTAU PANJANG'),
(32014, 3, 'LONDERANG'),
(32016, 3, 'PETANANG'),
(32017, 3, 'MEKAR SARI'),
(32018, 3, 'RONDANG'),
(32019, 3, 'MAJU JAYA'),
(41002, 4, 'JAMBI KECIL'),
(42001, 4, 'SETIRIS'),
(42003, 4, 'TANJUNG KATUNG'),
(42004, 4, 'JAMBI TULO'),
(42005, 4, 'BARU'),
(42006, 4, 'DANAU LAMO'),
(42007, 4, 'MUARA JAMBI'),
(42016, 4, 'NIASO'),
(42017, 4, 'BAKUNG'),
(42018, 4, 'DANAU KEDAP'),
(42019, 4, 'MUDUNG DARAT'),
(42020, 4, 'LUBUK RAMAN'),
(51009, 5, 'TEMPINO'),
(52001, 5, 'TANJUNG PAUH KM 32'),
(52002, 5, 'PELEMPANG'),
(52003, 5, 'SUNGAI LANDAI'),
(52004, 5, 'IBRU'),
(52005, 5, 'NAGA SARI'),
(52006, 5, 'SEBAPO'),
(52010, 5, 'BARU'),
(52011, 5, 'TANJUNG PAUH KM 39'),
(52012, 5, 'NYOGAN'),
(52015, 5, 'SUKA DAMAI'),
(52016, 5, 'PONDOK MEJA'),
(52017, 5, 'SUKA MAJU'),
(52018, 5, 'TANJUNG PAUH TALANG PELITA'),
(52019, 5, 'MUARO SEBAPO'),
(62001, 6, 'PUDAK'),
(62002, 6, 'MUARA KUMPEH'),
(62003, 6, 'KOTA KARANG'),
(62004, 6, 'KASANG LOPAK ALAI'),
(62005, 6, 'KASANG PUDAK'),
(62008, 6, 'SOLOK'),
(62009, 6, 'SAKEAN'),
(62010, 6, 'LOPAK ALAI'),
(62011, 6, 'TARIKAN'),
(62012, 6, 'RAMIN'),
(62013, 6, 'TELUK RAYA'),
(62014, 6, 'PEMUNDURAN'),
(62015, 6, 'SIPIN TELUK DUREN'),
(62016, 6, 'ARANG-ARANG'),
(62017, 6, 'SUMBER JAYA'),
(62018, 6, 'SUNGAI TERAP'),
(62023, 6, 'KASANG KUMPEH'),
(62024, 6, 'KASANG KOTA KARANG'),
(72004, 7, 'SUKA MAKMUR'),
(72005, 7, 'MARGA MULYA'),
(72006, 7, 'PANCA MULYA'),
(72007, 7, 'MARGA MANUNGGAL JAYA'),
(72012, 7, 'TANJUNG HARAPAN'),
(72013, 7, 'BERKAH'),
(72018, 7, 'BUKIT MAKMUR'),
(72021, 7, 'BUKIT MAS'),
(72025, 7, 'MEKAR SARI MAKMUR'),
(72033, 7, 'BAKTI MULYA'),
(72034, 7, 'PANCA BAKTI'),
(82001, 8, 'KEBON IX'),
(82002, 8, 'TALANG BELIDO'),
(82003, 8, 'TALANG KERINCI'),
(82004, 8, 'LADANG PANJANG'),
(82005, 8, 'TANGKIT'),
(82006, 8, 'TANGKIT BARU'),
(82007, 8, 'SUNGAI GELAM'),
(82008, 8, 'PARIT'),
(82009, 8, 'PETALING JAYA'),
(82010, 8, 'SUMBER AGUNG'),
(82011, 8, 'MINGKUNG JAYA'),
(82012, 8, 'TRI MULYA JAYA'),
(82013, 8, 'MEKAR JAYA'),
(82014, 8, 'SIDO MUKTI'),
(82015, 8, 'GAMBUT JAYA'),
(92001, 9, 'TALANG BUKIT'),
(92002, 9, 'TALANG DATAR'),
(92003, 9, 'SUMBER MULYA'),
(92004, 9, 'MULYA JAYA'),
(92005, 9, 'MATRA MANUNGGAL'),
(92006, 9, 'BUKIT MULYA'),
(92007, 9, 'SUMBER JAYA'),
(92008, 9, 'PINANG TINGGI'),
(92009, 9, 'MARKANDING'),
(92010, 9, 'SUNGAI DAYO'),
(92011, 9, 'BAHAR MULYA'),
(102001, 10, 'BUKIT SUBUR'),
(102002, 10, 'TRI JAYA'),
(102003, 10, 'MEKAR JAYA'),
(102004, 10, 'UJUNG TANJUNG'),
(102005, 10, 'TANJUNG BARU'),
(102006, 10, 'TANJUNG MULYA'),
(102007, 10, 'ADIPURA KENCANA'),
(102008, 10, 'BUKIT JAYA'),
(102009, 10, 'TANJUNG SARI'),
(102010, 10, 'TANJUNG LEBAR'),
(112001, 11, 'KUNANGAN'),
(112002, 11, 'TALANG DUKU'),
(112003, 11, 'TEBAT PATAH'),
(112004, 11, 'KEMINGKING DALAM'),
(112005, 11, 'TELUK JAMBU'),
(112006, 11, 'DUSUN MUDO'),
(112007, 11, 'SEKUMBUNG'),
(112008, 11, 'KEMINGKING LUAR'),
(112009, 11, 'RUKAM'),
(112010, 11, 'MANIS MATO');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(2) NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `kecamatan`) VALUES
(1, 'JAMBI LUAR KOTA'),
(2, 'SEKERNAN'),
(3, 'KUMPEH'),
(4, 'MARO SEBO'),
(5, 'MESTONG'),
(6, 'KUMPEH ULU'),
(7, 'SUNGAI BAHAR'),
(8, 'SUNGAI GELAM'),
(9, 'BAHAR UTARA'),
(10, 'BAHAR SELATAN'),
(11, 'TAMAN RAJO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'sdfsdfdsf', 'sdfsdfsdf', 'dcd989387b401ac29bf44755f31c0952'),
(4, 'sdfsdfsdfsdfdsf', 'sdfsdfsdfdsf', 'ba6c58494547a8170bbdfc26f7219b92'),
(5, 'dsfdsf', 'sdfsdf', 'd58e3582afa99040e27b92b13c8f2280');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_akte`
--
ALTER TABLE `daftar_akte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_akte_kematian`
--
ALTER TABLE `daftar_akte_kematian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_akte_perceraian`
--
ALTER TABLE `daftar_akte_perceraian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_akte_perkawinan`
--
ALTER TABLE `daftar_akte_perkawinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_kk`
--
ALTER TABLE `daftar_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_ktp`
--
ALTER TABLE `daftar_ktp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_surat_pindah`
--
ALTER TABLE `daftar_surat_pindah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `districts_id_index` (`id_kec_fk`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `daftar_akte`
--
ALTER TABLE `daftar_akte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `daftar_akte_kematian`
--
ALTER TABLE `daftar_akte_kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftar_akte_perceraian`
--
ALTER TABLE `daftar_akte_perceraian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_akte_perkawinan`
--
ALTER TABLE `daftar_akte_perkawinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftar_kk`
--
ALTER TABLE `daftar_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `daftar_ktp`
--
ALTER TABLE `daftar_ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daftar_surat_pindah`
--
ALTER TABLE `daftar_surat_pindah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
