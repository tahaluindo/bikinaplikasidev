-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Aug 05, 2022 at 07:34 AM
-- Server version: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- PHP Version: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_diskusi_maruli`
--

-- --------------------------------------------------------

--
-- Table structure for table `balasans`
--

CREATE TABLE `balasans` (
  `id` int(11) NOT NULL,
  `komen_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balasans`
--

INSERT INTO `balasans` (`id`, `komen_id`, `user_id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 'hai ini adalah contoh balasan dari sebuah komentar diatas', '2022-06-11 04:33:15', '2022-06-11 04:33:15'),
(2, 1, 8, 'oke ini adalah sebuah komentar dari isi postingan diatas', '2022-06-11 04:33:15', '2022-06-11 04:33:15'),
(3, 1, 1, 'oke ini adalah balasan yang akan diketik disini', '2022-06-10 22:15:20', '2022-06-10 22:15:20'),
(4, 2, 1, 'bukan balasan yang akan di balas disini', '2022-06-10 22:15:34', '2022-06-10 22:15:34'),
(5, 9, 1, 'saya membalas komentar yang sudah saya buat sendiri', '2022-06-10 22:41:35', '2022-06-10 22:41:35'),
(6, 12, 1, 'woi apa kabarrrsss', '2022-06-10 23:35:03', '2022-06-10 23:35:03'),
(7, 13, 1, 'sdfldjslfjkdsf', '2022-06-11 00:35:16', '2022-06-11 00:35:16'),
(8, 14, 1, 'nah kalau ini g mana?', '2022-06-11 07:49:51', '2022-06-11 07:49:51'),
(9, 15, 19, 'testtt', '2022-06-15 04:16:45', '2022-06-15 04:16:45'),
(10, 15, 1, 'oke ini adalah balasan testttt', '2022-06-15 06:46:31', '2022-06-15 06:46:31'),
(11, 15, 1, 'oke ini adalah balasan testttt...', '2022-06-15 07:27:40', '2022-06-15 07:27:40'),
(12, 12, 19, 'balasans', '2022-06-15 12:30:20', '2022-06-15 12:30:20'),
(13, 13, 19, 'oek saya akan membalas yang inii', '2022-06-15 12:32:00', '2022-06-15 12:32:00'),
(14, 21, 20, 'menarik sih..', '2022-07-02 21:03:00', '2022-07-02 21:03:00'),
(15, 21, 20, 'jadi nambah ilmu, thanks ya bro', '2022-07-02 21:03:23', '2022-07-02 21:03:23'),
(16, 21, 21, 'ini memudah sekali', '2022-07-02 21:23:33', '2022-07-02 21:23:33'),
(17, 15, 23, 'Annyeong!!', '2022-07-28 20:23:30', '2022-07-28 20:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Web Programing', 'web-programing', '2022-01-22 00:04:43', '2022-01-22 00:04:43'),
(2, 'Web Design', 'web-design', '2022-01-22 00:04:43', '2022-01-22 00:04:43'),
(3, 'Personal', 'Personal', '2022-01-22 00:04:43', '2022-06-11 00:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komens`
--

CREATE TABLE `komens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `is_the_best_komen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komens`
--

INSERT INTO `komens` (`id`, `user_id`, `isi`, `post_id`, `is_the_best_komen`, `created_at`, `updated_at`) VALUES
(12, 1, '<p><img alt=\"\" src=\"http://localhost:2000/storage/post-images/v7QsHnfohtu3TK1pxrWAExoNYp9lbDXluXwMmfMy.png\" style=\"height:100px; width:100px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>sdfsdfs dfds fds fsdf sdfs sdf sdfs fsdf</p>', 27, 0, '2022-06-10 23:30:40', '2022-06-10 23:30:40'),
(13, 1, '<p>sdfsd sdf sdf sdfs dfsfsdf sdfsdf</p>\r\n\r\n<p>sdfsdf sdfsdf sdfsd fs</p>\r\n\r\n<p>s</p>\r\n\r\n<p>dfsd fsd fsdf sdfsdf<img alt=\"\" src=\"http://localhost:2000/storage/post-images/1GoOYHbyr4dFL6qonC6IJMsMWRVwOVhctgZSHOxs.png\" style=\"height:100px; width:100px\" /></p>', 27, 1, '2022-06-10 23:34:51', '2022-06-10 23:34:51'),
(14, 1, '<p>okelah saya ingin membalas thread ini</p>', 27, 0, '2022-06-11 00:46:45', '2022-06-11 00:46:45'),
(15, 19, '<p>okeee okeee</p>', 24, 0, '2022-06-15 04:16:32', '2022-06-15 04:16:32'),
(17, 19, '<p>testt</p>', 24, 0, '2022-06-15 07:52:12', '2022-06-15 07:52:12'),
(19, 1, '<p>jawaban telah di ubah</p>', 24, 0, '2022-06-15 11:48:48', '2022-06-15 11:50:01'),
(20, 1, '<p>okelah iniii</p>', 24, 0, '2022-06-15 11:52:15', '2022-06-15 11:52:15'),
(21, 1, '<p>Jadi bagaimana menurut kalian ?</p>', 30, 0, '2022-07-02 20:54:02', '2022-07-02 20:54:02'),
(22, 1, '<p>mantap</p>', 31, 0, '2022-07-02 21:13:17', '2022-07-02 21:13:17'),
(23, 21, '<p>terimakasih</p>\r\n\r\n<p>&nbsp;</p>', 30, 0, '2022-07-02 21:24:12', '2022-07-02 21:24:12'),
(24, 21, '<p>wow.. canggih</p>', 31, 0, '2022-07-02 21:24:54', '2022-07-02 21:24:54'),
(25, 22, '<p>makasih infonya min</p>', 30, 0, '2022-07-02 21:32:52', '2022-07-02 21:32:52'),
(26, 22, '<p>Keren..</p>', 31, 0, '2022-07-02 21:33:37', '2022-07-02 21:33:37'),
(27, 22, '<p>Jadi penemu aslinya siapa ya kira ?</p>', 34, 0, '2022-07-02 21:34:35', '2022-07-02 21:34:35'),
(28, 22, '<p>Bikin penasaran aja</p>', 34, 0, '2022-07-02 21:34:55', '2022-07-02 21:34:55'),
(29, 22, '<p>Perusahaan besar sekelas cloudflare bisa bermasalah fatal juga ternya</p>', 33, 0, '2022-07-02 21:35:59', '2022-07-02 21:35:59'),
(30, 20, '<p>Ternyata itu digabung ya</p>\r\n\r\n<p>&nbsp;</p>', 36, 0, '2022-07-03 18:06:08', '2022-07-03 18:06:08'),
(32, 1, '<p>halo</p>', 30, 0, '2022-07-08 11:09:20', '2022-07-08 11:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2021_12_24_035642_create_posts_table', 1),
(6, '2021_12_28_105123_create_categories_table', 1),
(7, '2022_01_16_143458_add_is_admin_to_users_table', 1),
(8, '2022_01_16_163308_create_komens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `dari_user` bigint(20) UNSIGNED NOT NULL,
  `ke_user` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Komentar','Balasan') NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `post_id`, `dari_user`, `ke_user`, `type`, `dibaca`, `created_at`, `updated_at`) VALUES
(1, 24, 1, 19, 'Balasan', 1, '2022-06-15 06:46:31', '2022-06-15 07:49:17'),
(2, 24, 1, 19, 'Balasan', 1, '2022-06-15 07:27:40', '2022-06-15 07:46:11'),
(3, 24, 19, 1, 'Komentar', 1, '2022-06-15 07:52:12', '2022-06-15 08:14:49'),
(4, 27, 19, 1, 'Balasan', 0, '2022-06-15 12:30:20', '2022-06-15 12:30:20'),
(5, 27, 19, 1, 'Balasan', 0, '2022-06-15 12:32:00', '2022-06-15 12:32:00'),
(6, 30, 20, 1, 'Balasan', 0, '2022-07-02 21:03:00', '2022-07-02 21:03:00'),
(7, 30, 20, 1, 'Balasan', 1, '2022-07-02 21:03:23', '2022-07-08 11:06:35'),
(8, 31, 1, 20, 'Komentar', 0, '2022-07-02 21:13:17', '2022-07-02 21:13:17'),
(9, 30, 21, 1, 'Balasan', 1, '2022-07-02 21:23:33', '2022-07-08 09:11:51'),
(10, 30, 21, 1, 'Komentar', 0, '2022-07-02 21:24:12', '2022-07-02 21:24:12'),
(11, 31, 21, 20, 'Komentar', 0, '2022-07-02 21:24:54', '2022-07-02 21:24:54'),
(12, 30, 22, 1, 'Komentar', 1, '2022-07-02 21:32:52', '2022-07-08 11:08:45'),
(13, 31, 22, 20, 'Komentar', 0, '2022-07-02 21:33:37', '2022-07-02 21:33:37'),
(14, 34, 22, 21, 'Komentar', 0, '2022-07-02 21:34:35', '2022-07-02 21:34:35'),
(15, 34, 22, 21, 'Komentar', 0, '2022-07-02 21:34:55', '2022-07-02 21:34:55'),
(16, 33, 22, 21, 'Komentar', 0, '2022-07-02 21:35:59', '2022-07-02 21:35:59'),
(17, 36, 20, 22, 'Komentar', 0, '2022-07-03 18:06:08', '2022-07-03 18:06:08'),
(18, 24, 23, 19, 'Balasan', 0, '2022-07-28 20:23:30', '2022-07-28 20:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'Aspernatur numquam ad cum illum.', 'saepe-nulla-facilis-beatae-doloribus-ut-omnis-odio', NULL, 'Qui fugit autem expedita molestiae. Earum nulla porro perferendis sequi. Asperiores voluptas ut impedit quia et vero ullam.', '<p>Dolor voluptatem vero ipsa omnis et maiores mollitia. Tempore accusamus porro officia repellat ab est quis. Suscipit temporibus unde commodi eveniet aut. Pariatur sed vel laudantium mollitia voluptatibus. Est non quam est.</p><p>Sunt molestiae eum quas provident excepturi aperiam. Ut quis vitae soluta aliquid aut minima et. Ipsum placeat dolores vero impedit. Aut praesentium rerum dolores.</p><p>Sint ut nihil rerum voluptatibus quam libero quia. Facere sunt fugit consequatur rerum vel. Cumque natus ad sit et officiis pariatur. Sequi accusamus rem eius temporibus.</p><p>Ut consequatur mollitia rerum voluptas sit inventore. Fugit fugiat beatae nesciunt veniam reprehenderit. Recusandae qui modi sunt.</p><p>Deleniti fugiat doloremque sunt officiis vel. Tempore et veniam aut impedit accusantium dolor consectetur beatae. Amet laborum sapiente neque deleniti nostrum sed libero. Nemo error quo asperiores sit rem. Corporis id rerum dolorum enim unde iure.</p><p>Et itaque minus excepturi exercitationem. Qui vel nemo voluptas. Magni similique voluptas ex illum debitis ea aliquam. Dolorem hic rerum voluptatem.</p><p>Ut magnam impedit ut deleniti aliquid. Vel autem alias ratione voluptatum et molestiae sed. Omnis enim minus cumque eum fugit consectetur.</p><p>Magni ipsam eligendi tenetur ut qui assumenda amet sequi. Corrupti fuga rem nihil dolore. Dolore nihil veritatis laborum mollitia qui quos.</p><p>Reiciendis aut odio ea. Libero quo laboriosam distinctio ratione quod in animi sit. Beatae ipsam ea sint ut qui eaque.</p>', NULL, '2022-01-22 00:04:44', '2022-01-22 00:04:44'),
(2, 2, 2, 'Iste libero.', 'soluta-aut-consectetur-perferendis-est-aut', NULL, 'Earum sit reiciendis doloremque et voluptate labore sit recusandae. Est non temporibus sit praesentium deleniti eligendi blanditiis. Nihil quidem et eius nam. Aliquid occaecati odio tempore cum at.', '<p>Consequuntur possimus vero reprehenderit ipsum. Aut tenetur provident sed. Nesciunt et repudiandae reiciendis. Eos aut aspernatur asperiores ducimus sed facere.</p><p>Sunt et et labore natus voluptates. Architecto ut voluptatem enim accusantium. Officia fugit modi aliquam quis incidunt et.</p><p>Quos dolores iure nihil non doloremque facere vitae. Voluptas nesciunt sed iusto ducimus perspiciatis aperiam voluptatem. Dolorem nisi fuga consectetur omnis. Explicabo corporis rerum qui. Et voluptas recusandae officia nobis vel quis.</p><p>Voluptatem nesciunt odit voluptatem et error inventore. Vero repellendus quia quis eligendi. Nobis reiciendis libero consequuntur consequuntur illo et adipisci est. Nostrum voluptates dicta totam atque officiis.</p><p>Aut libero quis rerum placeat quo dicta id. Perferendis aut explicabo numquam enim aliquid ratione nobis.</p><p>Voluptates deleniti nihil ab. Accusamus odit recusandae impedit reiciendis nihil voluptatibus iusto. Maxime eius in quibusdam ad doloremque qui.</p><p>Voluptatem praesentium nihil eum eum impedit. Quae est praesentium unde consequatur et qui rerum. Sequi est quo quod soluta dolor saepe.</p><p>Nulla cum ipsa soluta laudantium praesentium. Ipsa nisi nisi ut possimus commodi eum quaerat. Et ut rem inventore officia.</p>', NULL, '2022-01-22 00:04:44', '2022-01-22 00:04:44'),
(3, 4, 5, 'Nisi quo recusandae natus ut voluptatem quos commodi provident dolores quis.', 'ratione-quasi-perspiciatis-molestiae-vel-ut', NULL, 'Recusandae in quidem a. Omnis quo facere suscipit labore quia voluptas non aut. Quo blanditiis voluptatem ut suscipit libero excepturi.', '<p>Velit unde debitis laboriosam quis rerum saepe officia. Et corporis quia dolor suscipit aspernatur placeat excepturi.</p><p>Dolores dignissimos qui rerum et praesentium consectetur ad. Quia est ut esse deserunt quod. Non possimus et nihil saepe perspiciatis explicabo dolores. Aut saepe consequatur nobis. Vitae ipsam ipsam quis est iusto omnis deserunt.</p><p>Non earum et dignissimos maiores. Quia nulla assumenda temporibus autem ipsa aut. Unde ea ratione beatae qui.</p><p>Reiciendis facilis quis et eos dolore repellat. Mollitia ut aspernatur facere amet sed quia ex aliquid.</p><p>Ullam eveniet nisi delectus ut exercitationem qui fuga. Dolor aspernatur eligendi adipisci consequuntur ex rerum est voluptas. Mollitia perferendis quo asperiores distinctio architecto.</p><p>Tempore suscipit enim eveniet asperiores eaque. Similique deserunt consectetur placeat sit cumque consequuntur a sint. Error cum rem culpa voluptatum est neque et magnam. Aliquid nam autem omnis maxime in quasi. Ea dicta tempora accusamus eaque doloremque qui ut qui.</p><p>Vitae eveniet illo recusandae consequatur consequatur molestiae rem. Ut ut qui architecto dolorem doloribus tempore accusamus. Enim facilis repellat eos nulla. Dolore facilis sed ipsa asperiores hic tempora est.</p>', NULL, '2022-01-22 00:04:44', '2022-01-22 00:04:44'),
(4, 1, 2, 'Molestiae quaerat unde dolorum enim consectetur enim tempore rem enim nihil.', 'hic-veniam-quia-rerum-ut-ipsum-ullam', NULL, 'Dolorem voluptatem in vero aperiam nostrum vel. Nam pariatur itaque at voluptate quisquam deleniti. Id itaque sit eaque et labore ut nesciunt. Reprehenderit quas sed ratione et rerum sunt et.', '<p>Est excepturi dolores unde. Aut veniam quo doloremque voluptatem et. Velit animi et et et dolores.</p><p>Facere ipsum sed non molestiae. Eveniet voluptas omnis totam aut aut. Enim ipsum quasi consequuntur maiores voluptates officiis.</p><p>Ut qui et architecto dolores tenetur consequatur quia. Qui deleniti consequuntur non.</p><p>Dolor quam quo nostrum vitae necessitatibus sed ratione. Deserunt voluptatem aut iure autem distinctio quaerat iusto. Dignissimos eos voluptatem mollitia omnis dolores placeat aut dolores. Maiores dolorem quia temporibus veniam tempora molestiae.</p><p>Ut dolores debitis et fugit mollitia ea exercitationem. Enim quis nihil distinctio fugit dolorem ea. Blanditiis dolores maiores voluptatem. Officia totam atque et aliquid dolor quo sapiente.</p><p>Laborum nihil dolorum sequi. Maxime nobis magni sed recusandae doloribus eligendi dicta. Quia molestiae voluptatibus praesentium est.</p><p>Nihil sit quis id optio fugit. Vel at libero recusandae natus. Minus reprehenderit adipisci natus. Nesciunt et et reprehenderit.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(7, 1, 4, 'Quia voluptatem distinctio repellat quos numquam provident sit expedita adipisci consequatur consequatur.', 'quod-provident-dolorem-ipsum-quo', NULL, 'Explicabo aut consequatur facere. Mollitia recusandae tempore est sapiente voluptates. Ab suscipit distinctio necessitatibus itaque dolore.', '<p>Et delectus non dolor eos repellat doloremque aut. Consectetur numquam repellendus animi. Possimus officia praesentium exercitationem omnis voluptatum quia aut ut.</p><p>Minus delectus excepturi velit aspernatur optio nesciunt et. Nesciunt esse at eius distinctio laborum adipisci. Labore iusto officiis perspiciatis qui unde. Exercitationem corrupti nihil doloribus eum vel neque.</p><p>Aut impedit odit quas aut sint laborum. Vel et qui ullam eius quae sit ducimus. Assumenda non autem nihil neque distinctio tempore hic.</p><p>Minima occaecati doloribus esse recusandae magni ipsum minima. Amet voluptatibus et vel saepe placeat. Dolorem dolores vel eos nam veritatis vero. Modi optio voluptatem natus voluptas.</p><p>Totam dignissimos sit at nesciunt sed exercitationem exercitationem aspernatur. Non officia non iste quia. Fuga tempora culpa aut quia molestiae dicta atque.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(8, 4, 2, 'Sint omnis quas aut tempore eum sequi.', 'doloribus-aperiam-alias-accusamus-numquam', NULL, 'Similique ut adipisci pariatur quis est dolor iusto. Et blanditiis voluptate laborum aut omnis aliquam. Odio aut id est eos veritatis sequi.', '<p>Et laudantium fuga labore optio nobis. Eligendi animi quibusdam distinctio sapiente eum dolores et. Consequatur praesentium quia distinctio consequatur nisi totam expedita.</p><p>Impedit sequi alias facere consequatur qui. Consequatur iusto odit modi voluptas. Ut aliquam ullam maiores exercitationem perspiciatis quo ducimus mollitia.</p><p>Quibusdam deleniti quo deleniti. Minima autem possimus aut ea. Minus fugiat unde itaque. Consequatur eum similique perspiciatis dolorem eos ad.</p><p>Unde dolor ipsam voluptas repellat placeat porro. Et quisquam cum dolores. Quam ratione dignissimos sed nemo quae.</p><p>Sit earum eius quibusdam ut aliquid assumenda. Praesentium praesentium provident dolor nostrum animi id voluptas. Vero in ullam ut dolore omnis.</p><p>Magnam ad laborum quia magnam officiis. Nulla sequi corporis est non.</p><p>Sint hic sint amet esse. Omnis modi ut voluptatem iure. Qui autem autem ut ut.</p><p>Voluptatem temporibus esse velit sunt doloribus. Eligendi nisi nesciunt rem at nostrum nostrum ad sit. Illo recusandae animi sint sit. Perferendis ipsa similique ex accusamus temporibus quaerat minus.</p><p>Et iusto aliquid ab rerum quae voluptatem. Mollitia repellat voluptatum quam ut.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(11, 1, 3, 'Repudiandae sunt dolore nemo.', 'dolorum-eaque-debitis-autem-autem-sint-tempora-rem', NULL, 'Excepturi ut soluta dolor et nostrum. Et amet placeat voluptatem nam pariatur accusamus. Optio doloremque totam optio dicta. Enim expedita eos nihil enim.', '<p>Eveniet sit sed eveniet laboriosam corporis rerum. Non labore unde cupiditate consequatur magni exercitationem soluta. Odit natus esse unde sint quisquam. Velit libero quod ipsa et rerum. Hic ad ex et sunt.</p><p>Numquam a voluptas quis nisi. Quae nulla commodi quis numquam. Pariatur rem et nam unde.</p><p>Voluptas rerum est culpa necessitatibus ut rerum. Minus sunt laborum excepturi consequatur. Sunt cum et voluptas in. Impedit ut et reprehenderit qui nesciunt.</p><p>Qui facere accusamus quas molestias exercitationem illum repellendus nisi. Doloremque quasi corrupti sequi aliquid. Doloremque velit dolore earum tempore ea.</p><p>Est tempore qui dolorem est eos illum hic. Excepturi sit nihil pariatur fuga soluta. Aliquid facilis quo eaque quod omnis. Dolor aliquid vitae accusamus consequuntur et rem.</p><p>Nam deserunt omnis facilis exercitationem at omnis nemo. Quia aut voluptas neque. Libero laudantium mollitia in dolores.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(12, 1, 5, 'Asperiores ipsa sapiente nemo praesentium consequatur eveniet ut in.', 'rem-magni-voluptate-adipisci-quae-et-sed-qui', NULL, 'Omnis natus assumenda numquam sed non non. Dolorem debitis aliquid consequuntur aperiam rerum ipsam placeat. Et harum quisquam voluptatem itaque. Eos facere dolor quas quia et cumque officiis. Sint harum qui ut qui.', '<p>Nobis molestiae maiores ab cum exercitationem sit. Non nulla alias eum eveniet. Est vel rem rerum enim earum.</p><p>Minima dolores ratione non dolores quos. Impedit ad magni quod sit. Et neque magnam deleniti quam odit qui consequatur. Deleniti maiores sed voluptatibus vel perferendis natus laudantium sed.</p><p>Quis quos amet temporibus nihil. Nostrum voluptatem pariatur dolor eligendi.</p><p>Illum qui vero eaque voluptas. Porro eos deserunt et exercitationem non error illum. Aut sit voluptatibus eos fuga eligendi. Autem cumque quod quo veritatis dolor molestiae eos explicabo. Quos voluptatem sapiente atque qui iure tempore atque sequi.</p><p>Id deleniti doloribus qui sed illo consequatur. Facilis impedit nulla tenetur ut corporis. Accusamus sed omnis optio.</p><p>Voluptatem necessitatibus reiciendis architecto. Sint pariatur iusto doloribus tenetur fuga. Facere sit sit quia laboriosam ipsam ut esse. Aperiam aut repellat qui facere ut iusto ratione quia.</p><p>Sit consequuntur adipisci voluptas minima ut consequatur voluptatum. Maiores laborum et ut qui sed unde. Modi nesciunt adipisci earum vel.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(13, 2, 3, 'Officia veniam ullam similique consequuntur aut ab voluptas alias.', 'minus-sit-suscipit-laborum-non', NULL, 'Occaecati id enim tempora quo est autem. Ex ipsum quasi omnis aspernatur at. Voluptatem eum consectetur officiis enim dolor. Hic repellat veniam facere laboriosam qui quaerat.', '<p>Et maiores tempore facere laboriosam vitae. Quia doloribus suscipit ipsam aut quis. Ut excepturi nam ab voluptates aut in. Voluptas optio autem odit aperiam.</p><p>Et eum eligendi quidem quisquam soluta iste consequatur. Occaecati ducimus exercitationem iure tempore. Accusamus voluptas rerum consequatur temporibus quia eaque.</p><p>Labore quia et sunt inventore ut praesentium. Aut recusandae qui inventore aut ut sed aut dolor. Voluptatem dolorem aspernatur eaque numquam.</p><p>Sed molestiae provident itaque ex. Autem aperiam rerum maxime. Optio sunt quidem aut a nesciunt. Voluptas ut facere laboriosam sequi beatae recusandae. Maxime doloremque recusandae adipisci aut eligendi porro et repellat.</p><p>Unde consequatur voluptatem at itaque. Autem reprehenderit ut quo quisquam dolores molestiae et.</p><p>Exercitationem voluptatem aperiam distinctio magni. Et omnis mollitia ut enim nemo a. Similique suscipit eum cum numquam velit ut pariatur.</p><p>Error non odio eum itaque autem deserunt dolorem. Et dicta aliquid at voluptatem deserunt dolore. Qui consequatur blanditiis aut. Sit id cumque temporibus ab explicabo accusantium.</p><p>Facilis animi qui illum et. At saepe molestiae delectus libero mollitia tempore ut. Aperiam ea non reiciendis eos dicta aspernatur. Minima consequatur totam dignissimos voluptas voluptatem eligendi eveniet.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(15, 1, 3, 'Sapiente aut nihil praesentium voluptatem amet.', 'ut-sapiente-dolorem-voluptas-fugiat-rem-aliquid', NULL, 'Maxime est quia rerum ex laboriosam deleniti. Est sequi aspernatur vitae voluptatum aut quo. Rem aut aut dignissimos placeat et nihil. Est illum consequuntur ut.', '<p>Accusantium nostrum dolor neque odio accusamus dolorem in. Beatae rem explicabo facilis velit hic esse quia. Eaque consequatur perspiciatis sint quam dolore non ut.</p><p>Eaque ad fugiat dolore vitae sequi molestiae quam. Porro illo officiis tempore culpa. Vitae qui doloremque quaerat accusantium repellat. Aspernatur in dolorem perferendis temporibus in possimus dolor dicta.</p><p>In labore ipsa consequatur. Sed porro fugit laboriosam unde qui. Quas corporis omnis temporibus ut perspiciatis mollitia. Aliquam velit unde ut corporis enim quisquam officiis facere.</p><p>Minima id harum vero dolor sint omnis. Non corporis qui eum. Aut quis et ut dolorem accusantium. Optio maiores rem cupiditate placeat ipsa.</p><p>Vitae et tempora omnis ex culpa. Mollitia et distinctio sequi vero autem. Est saepe quia illum quasi itaque inventore. Quo voluptas laborum voluptatem autem voluptas quisquam nulla.</p><p>Accusamus ut illo quo. Architecto quas corrupti aut eius velit non sit. Expedita autem laudantium sed odit fuga assumenda ullam.</p><p>Rerum eos ut sit et iusto laborum ipsam. Animi cumque officia beatae corporis tempora. Iure perferendis hic omnis temporibus molestias amet.</p><p>Eveniet voluptatum atque alias tempore sit qui quo vero. Amet eveniet eius quod. Voluptatem ad et qui tempora aliquam ut rerum.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(16, 2, 4, 'Rem ut provident ullam voluptatum itaque qui.', 'fuga-consequatur-in-dolores-nostrum-quaerat-fuga-laudantium', NULL, 'Sequi in beatae ipsa occaecati. Esse est voluptate dolore ipsam corrupti modi tenetur. Ad est odio officia. Autem ea voluptas quaerat consequatur nihil quia magnam.', '<p>Voluptas quos facere numquam est quia minus. Deserunt excepturi laudantium quaerat quia aperiam eius. Corporis vel consequatur ut voluptas dolorem eligendi. Reprehenderit odit error possimus.</p><p>Aut ut sed aliquam suscipit non. Praesentium quibusdam laudantium consectetur eius. Vel qui voluptatibus suscipit sequi.</p><p>Officiis culpa iure tenetur doloribus laudantium necessitatibus. Magnam beatae minima sed error consectetur nihil. Quis id qui ab consectetur fugiat.</p><p>Aut quaerat excepturi laborum hic pariatur. Et enim cumque facilis reiciendis dicta. Architecto maxime nam hic repudiandae dolorum.</p><p>Expedita est repudiandae et est sed. Ut ut possimus earum sit sit. Consequatur vitae rerum eaque rerum labore non. Temporibus excepturi asperiores facere ratione.</p><p>Dolores explicabo est quisquam et. Asperiores harum ut expedita ea dolores voluptatem. Maiores eum commodi doloribus et. Nesciunt fuga et fugiat maiores. Consequuntur molestiae at iste error.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(17, 2, 2, 'Vitae eum nemo.', 'est-perferendis-atque-explicabo-beatae-sunt-qui-quo', NULL, 'Voluptas temporibus reiciendis distinctio eius. Quia dolores doloribus rerum in qui quidem officia. Unde et ut aliquam magnam totam facere culpa est.', '<p>Praesentium ut consequuntur quia incidunt eum et inventore impedit. Recusandae recusandae iusto rerum est numquam similique natus blanditiis.</p><p>Impedit optio qui incidunt quod aut inventore et labore. Non in itaque sit. Ut error dolor non fugit sit veniam. Expedita totam ipsam quo natus necessitatibus aspernatur.</p><p>Quam dignissimos cumque velit autem rerum. Quia corporis dolores doloremque est. Qui voluptatibus consequuntur nam quia.</p><p>Possimus delectus voluptate sint quis vero doloribus. Qui provident et enim dignissimos. Qui illo reprehenderit omnis nam recusandae ut ea.</p><p>Quos est inventore ut enim voluptatem. Explicabo perspiciatis excepturi et explicabo nulla est nihil. Sit ratione magnam id.</p><p>Eligendi rerum mollitia ex. Voluptas enim soluta eum placeat id libero voluptas. Tempore ad dolorem corrupti voluptates minima.</p><p>Quas quo accusamus omnis veniam minima consequatur. Nam adipisci hic voluptatum. Qui et excepturi sint.</p>', NULL, '2022-01-22 00:04:45', '2022-01-22 00:04:45'),
(18, 2, 5, 'Qui quod enim.', 'aspernatur-et-expedita-ut-quasi-provident', NULL, 'Ut aliquam a assumenda totam delectus dolorum facere. Quia dolorem itaque nobis vitae modi. Adipisci quia et eum unde id consequatur. A dignissimos aperiam molestias qui ut.', '<p>Veniam ipsum aliquam quidem beatae tempora tenetur. Quae quis doloremque ex doloremque. Autem culpa amet ut odio hic. Et nesciunt molestias rerum doloremque autem.</p><p>Nobis quibusdam in culpa explicabo. Earum voluptas ducimus molestiae praesentium possimus alias hic. Aut unde voluptas tempore hic magni. Rerum ratione iure corporis pariatur omnis deleniti.</p><p>Est consequatur ut ut occaecati. Ut voluptas architecto earum et ut. Et rerum eligendi minima quaerat.</p><p>Et eligendi nam voluptatum ad eum asperiores consequatur. Molestiae quasi in ut odio odio. Libero debitis saepe maxime dolores saepe officiis cumque est. Ut iure amet voluptas sequi aliquid inventore exercitationem.</p><p>Quo hic voluptates provident quisquam qui deleniti. Facere ipsam rerum temporibus ipsam et ut non qui. Eveniet expedita dolores accusamus delectus et.</p><p>Repellendus eaque qui aspernatur consectetur soluta. Sapiente fuga doloremque porro ullam qui. Deleniti ab nostrum ipsam pariatur quis.</p><p>Et esse expedita velit et vel ratione excepturi. Sunt sequi voluptas natus molestias voluptatem et eius. Est nihil non nulla blanditiis alias.</p><p>Vel omnis repudiandae impedit ea vel. Quidem ducimus beatae odio perspiciatis illum voluptatem explicabo aut. Magni eligendi error quibusdam et nostrum.</p><p>Quia cumque delectus nulla praesentium nisi odit nemo maxime. Modi dolorem alias est excepturi non esse. Reiciendis accusamus maxime qui dolorem dolorem.</p>', NULL, '2022-01-22 00:04:46', '2022-01-22 00:04:46'),
(19, 3, 1, 'Sequi natus exercitationem sed ipsa et qui.', 'deserunt-culpa-incidunt-et-vero-perspiciatis', NULL, 'Praesentium corporis eos commodi officiis aut ea aliquam. Commodi praesentium ducimus inventore autem rerum. Nemo illum minus itaque voluptatibus. Corrupti mollitia animi et.', '<p>Odit aliquid quaerat doloribus dolorum. Recusandae tempora distinctio explicabo omnis. Voluptatem autem aut autem accusantium cum sed dolore.</p><p>Praesentium distinctio distinctio quia qui a quasi aut. Blanditiis ratione unde dolores asperiores repellat eos et. Consequatur autem voluptas modi fuga ratione praesentium. Esse dolor sint officiis suscipit aut.</p><p>Officiis ab harum sit deleniti quam qui occaecati. Deserunt impedit ad aut deserunt nihil non. Molestias magnam consequatur neque dolorum in explicabo qui. Qui iste fugit distinctio libero dolores provident.</p><p>Impedit et natus tempora doloribus praesentium ut nemo. Perferendis voluptas autem autem culpa et.</p><p>Odit ratione repellendus sequi ut. Omnis at eum odio quaerat. Accusamus aspernatur quod nihil voluptas.</p><p>Non est nemo dolores facere praesentium vel officia. Nobis veniam voluptatem labore. Numquam dolorum eos atque ea. Non modi ullam qui ipsa dolorem omnis quos. Necessitatibus ut consequatur sequi nihil.</p><p>Nihil minus labore exercitationem hic et. In ipsa sed perspiciatis suscipit aut sit maiores blanditiis. Numquam consectetur aut iure sunt temporibus.</p><p>Delectus tenetur rem quis praesentium voluptatem dolor et. Sed odit sunt non aliquid. Labore impedit sed necessitatibus. Excepturi esse et vero perferendis.</p><p>Error et id velit et hic ab quia. Maxime possimus et fugit enim dolorum vel quidem. Dolorem velit omnis esse dolorem id in est non.</p>', NULL, '2022-01-22 00:04:46', '2022-01-22 00:04:46'),
(20, 3, 3, 'Vero modi dolorum dicta.', 'voluptatibus-ut-rerum-et', NULL, 'Et accusamus ex non neque nisi dignissimos. Beatae soluta non expedita sit. Nostrum aliquid facilis quis quis ut tempore amet.', '<p>Animi animi id dolores a fugiat quis. Est blanditiis molestiae aut pariatur aliquam animi. Omnis placeat aliquid quo itaque. Non tempora amet molestias tenetur iusto.</p><p>In quaerat officiis veniam dolorem fuga facilis. Nihil cumque est dolores voluptatem quia. Asperiores soluta explicabo et temporibus ipsum. Libero sed aliquid modi.</p><p>Ipsum praesentium ipsum qui perspiciatis. Ut quo reiciendis a modi. Earum voluptatibus voluptatibus reiciendis optio ad in. Eaque et non corrupti est qui omnis ratione.</p><p>Occaecati quia dignissimos molestiae ullam dolorem molestiae molestiae. Enim cum vel aut sit reprehenderit. Illum totam est sequi quam assumenda consectetur at.</p><p>Rerum aut nihil qui commodi doloribus dignissimos amet voluptates. Quia exercitationem quos non inventore cum ut. Est totam velit harum in exercitationem odio. Eum dolore cum reprehenderit.</p><p>Occaecati reiciendis quia est magni sint aut commodi. Aut error amet et quia dolores beatae.</p><p>Reiciendis voluptatem ut aut aut et sit atque. Est quod earum libero. Qui ut voluptate atque.</p>', NULL, '2022-01-22 00:04:46', '2022-01-22 00:04:46'),
(22, 2, 5, 'logo unama baru', 'logo-unama', 'post-images/HzPeNe0G0gwXs3RlyRDcFQLwzAXA11GVnC8MCVkC.png', 'logo unama baru', '<div><strong>logo unama baru</strong></div>', NULL, '2022-01-22 03:24:43', '2022-01-22 03:26:47'),
(24, 2, 1, 'logo logi unama baru', 'logo-logi-unama', 'post-images/9iqgZ1uRV2QXRrpSbHLJHzmNVjFCeIaXvNSot8C6.jpg', 'UNAMA BARU LOGONYA&nbsp; BaruLorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum eum, suscipit ea...', '<div><strong>UNAMA BARU LOGONYA&nbsp; Baru</strong><br><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum eum, suscipit earum officiis hic nemo magnam amet quaerat ratione sint eaque fugit nisi beatae.&nbsp;<br><br>Unde, assumenda perferendis facere in cum sapiente magnam quis aliquid sed ducimus velit omnis adipisci modi! Aut, blanditiis officia voluptate, qui accusantium repudiandae architecto dolor, excepturi alias quam possimus corrupti in modi labore et animi distinctio commodi?<br><br>Sequi odio itaque nam quod recusandae error ratione est nostrum dolores eaque atque laboriosam alias, delectus exercitationem quam ipsam illum? Rem sint corrupti delectus iure minus, impedit laboriosam architecto ex molestias quisquam, quasi distinctio suscipit exercitationem aliquam. Tenetur, modi.&nbsp;<br><br><br><br></div>', NULL, '2022-01-24 21:22:52', '2022-07-03 18:07:33'),
(27, 2, 1, 'judul unama lagi naik', 'judul-unama', 'post-images/Nk9JS5M8rhRqc75ixiiZEtXNHianWeudQDvyIMxh.jpg', 'UNAMA BARU DIBUAT JADI UNIV', '<div>UNAMA BARU DIBUAT <strong>JADI UNIV</strong></div>', NULL, '2022-01-24 22:36:47', '2022-07-03 18:07:56'),
(28, 2, 5, 'contoh satu', 'contoh-satu', 'post-images/B9qREM3jGdujFEydhcJzsM0i7RLM7PKkSBFnqYxa.png', 'contoh1&nbsp;', '<div><strong>contoh1&nbsp;</strong></div>', NULL, '2022-01-25 19:53:38', '2022-01-25 19:53:38'),
(30, 2, 1, 'Forum diskusi online yang menarik', 'forum-diskusi-online-yang-menarik', 'post-images/uMeqWHkE5sLd4bs3VB579caSSaqdvgrUMp73Svyw.jpg', 'Postingan ini akan membahas cara-cara inovatif untuk membuat forum diskusi Anda menjadi “tempat yang tepat” di...', '<div>Postingan ini akan membahas cara-cara inovatif untuk membuat forum diskusi Anda menjadi “tempat yang tepat” di kelas online Anda. Forum adalah bagian paling interaktif dan jantung dari kelas online Anda.<br><br></div><div><strong>Berbagai Cara Untuk Membuat Forum Diskusi Online Menarik Dan Menyenangkan<br></strong><br></div><div>Forum diskusi adalah inti dari ruang kelas online Anda. Forum juga merupakan bagian paling interaktif dari ruang kelas tempat siswa berinteraksi satu sama lain dan guru daring memiliki kesempatan paling besar untuk terikat dengan siswanya dan menciptakan rasa kebersamaan di kelas daring. Menciptakan komunitas penting dalam pengajaran online sehingga guru online dapat menciptakan ruang belajar yang aman bagi siswa untuk berkembang dan belajar secara online. Hal ini sangat penting untuk pengajaran online karena mengikuti kelas online bisa sangat terisolasi dan sepi dibandingkan dengan kelas tatap muka tempat Anda dapat melihat teman sekelas dan guru Anda secara real time. Memiliki forum yang menarik mengurangi kesepian itu, membuat pengalaman online menjadi pengalaman yang lebih menarik.<br><br></div><div><strong>Berbagai Perspektif</strong><br><br></div><div>Buat forum Anda mencerminkan berbagai perspektif. Dalam dongeng Barat, pahlawan menentang orang tuanya, menikahi gadis yang dia inginkan / cintai dan berjalan menuju matahari terbenam bersama gadis itu. Dalam dongeng Asia, pahlawan mematuhi orang tuanya, mencampakkan gadis yang dia cintai untuk menuruti orang tuanya, dan menikahi gadis yang diinginkan orang tuanya. Dia berjalan menuju matahari terbenam bersama gadis yang diinginkan orang tuanya. Contoh lain dari pahlawan Asia adalah seorang pemuda yang mengorbankan kebahagiaannya dengan menolak gadis yang dicintainya demi menjaga orang tuanya yang sudah lanjut usia. Dengan kata lain, dalam budaya Barat, ini semua tentang mengejar kebahagiaan individu. Penekanannya ada pada individu. Namun, dalam budaya Asia, penekanannya ada pada keluarga dan kelompok. Diskusi dari berbagai perspektif biasanya cukup mengasyikkan dan menyenangkan dalam forum diskusi.<br><br></div><div><strong>Tinjauan Sejawat / Aktivitas Kolaboratif</strong><br><br></div><div>Anda dapat meminta siswa meninjau ulang versi draf makalah mereka. Siswa saling memberikan umpan balik dan kritik yang membangun pada makalah satu sama lain. Anda juga memberikan umpan balik juga. Siswa memberikan umpan balik tentang struktur esai dan tata bahasa (opsional). Saya mengajukan pertanyaan ini kepada siswa: Di manakah esai itu lemah? Di mana esai itu kuat? Apakah esai memiliki pernyataan tesis? Apakah pernyataan tesis ditempatkan dengan benar dalam esai? Apakah esai memiliki paragraf pendahuluan, badan, dan kesimpulan? Apakah kalimat topik dari setiap paragraf tubuh sesuai dengan pernyataan tesis? Dengan menjawab pertanyaan-pertanyaan ini dan melihat makalah satu sama lain, para siswa memperkuat apa yang mereka pelajari dalam kuliah mingguan mereka tentang struktur esai 5 paragraf.<br><br></div><div><strong>Kuis dan Game Online</strong><br><br></div><div>Anda dapat mengajari mahasiswa cara mengenali kekeliruan dan cara membedakan fakta dari opini. Ada banyak fallacy quiz yang dapat Anda temukan online untuk diambil. <a href=\"https://www.proprofs.com/quiz-school/story.php?title=logical-fallacies-quiz\">Ini adalah tautan</a> ke salah satu halaman kuis yang saya gunakan sepanjang waktu dengan mahasiswa. Ini adalah kuis informal dan sama sekali tidak menghitung nilai mereka. Mereka hanya mengambil kuis untuk bersenang-senang dan kemudian saling memberi tahu skor mereka di forum. Dengan mengikuti kuis online yang menyenangkan, siswa memperkuat dan menguji apa yang mereka ketahui tentang kesalahan.<br><br></div><div><strong>Game Tebak-Menebak</strong><br><br></div><div>Dalam bahasa Perancis, setiap kata dalam bahasa Perancis adalah maskulin atau feminin. Orang Perancis tidak memiliki masalah dalam menentukan kata benda Perancis mana yang maskulin dan kata benda Perancis mana yang feminin. Namun, mahasiswa Amerika memiliki banyak kesulitan untuk membedakannya. Aturan tata bahasanya adalah bahwa 80% kata benda Perancis yang diakhiri dengan “e” adalah feminin dan kata benda Perancis yang diakhiri dengan yang lain adalah maskulin. Jadi, saya meminta siswa memposting kata benda bahasa Perancis dan siswa lain harus menebak apakah kata benda bahasa Perancis itu maskulin atau feminin. Anda dapat memulai permainan dengan memposting kata benda Perancis misterius, dan kemudian Anda meminta seorang siswa menebak apa itu. Kemudian siswa itu akan memposting kata benda Perancis misteri mereka sendiri dan seterusnya. Permainan tebak tata bahasa juga bisa digunakan untuk tata bahasa (grammar) Inggris. Anda dapat meminta siswa menebak jika kalimat yang saya posting adalah kalimat sederhana, kalimat majemuk, kalimat kompleks, atau kalimat majemuk-kompleks.<br><br></div><div><strong>Aktivitas Sambung-cerita</strong><br><br></div><div>Aktivitas ini sangat cocok untuk mata pelajaran sastra, Anda dapat mulai menginisiasi aktivitas ini dengan memposting “Jack memasuki ruangan dan melihat sosok gelap …” Kemudian siswa berikutnya akan memposting sosok gelap apa yang mereka lihat dan kemudian siswa berikutnya akan melanjutkan cerita ini. Aktivitas ini dapat mendorong kreatifitas dan kemampuan bercerita siswa. Siswa bersenang-senang membuat cerita bersama. Dan siswa terakhir yang memposting minggu itu mendapat hak istimewa untuk menulis akhir cerita.<br><br></div><div><strong>Bermain Peran</strong><br><br></div><div>Anda dapat meminta siswa memerankan bahwa mereka adalah pahlawan dalam cerita dan kemudian saya bertanya kepada siswa apa yang akan mereka lakukan jika mereka adalah pahlawan dalam cerita. Pertanyaan “Bagaimana jika” itu menyenangkan. “Bagaimana jika Anda adalah Odiseus, bagaimana Anda akan kembali ke rumah untuk menyelamatkan Penelope dari para pelamar?” Pastikan peran yang Anda sebutkan cukup general oleh audiens Anda, tidak hanya diketahui oleh beberapa orang saja.<br><br></div><div><strong>Forum Pengajaran Mahasiswa</strong><br><br></div><div>Anda dapat memulai aktivitas ini dengan membagi kelas menjadi beberapa kelompok. Setiap kelompok bertanggung jawab untuk membaca selama seminggu. Kelompok 1 membaca untuk minggu 1. Kelompok 2 membaca untuk minggu 2. Setiap kelompok bertanggung jawab untuk memimpin forum minggu itu dan bermain sebagai guru untuk minggu itu. Dengan cara ini, Anda hanya berdiri untuk memastikan bahwa setiap kelompok melakukannya dengan baik di forum mereka dan tidak mengalami kesulitan untuk memahami bacaan mereka. Siswa senang bisa memimpin forum setiap minggu. Anda juga dapat meminta setiap grup memposting utas percakapan berdasarkan pertanyaan bacaan dari minggu itu dan kemudian anggota grup itu bertanggung jawab untuk menjawab semua posting untuk minggu itu.&nbsp;<br><br>Artikel ini akan membahas cara-cara inovatif untuk membuat forum diskusi Anda menjadi “tempat yang tepat” di kelas online Anda. Forum adalah bagian paling interaktif dan jantung dari kelas online Anda.<br><br></div><div><strong>Berbagai Cara Untuk Membuat Forum Diskusi Online Menarik Dan Menyenangkan<br></strong><br></div><div>Forum diskusi adalah inti dari ruang kelas online Anda. Forum juga merupakan bagian paling interaktif dari ruang kelas tempat siswa berinteraksi satu sama lain dan guru daring memiliki kesempatan paling besar untuk terikat dengan siswanya dan menciptakan rasa kebersamaan di kelas daring. Menciptakan komunitas penting dalam pengajaran online sehingga guru online dapat menciptakan ruang belajar yang aman bagi siswa untuk berkembang dan belajar secara online. Hal ini sangat penting untuk pengajaran online karena mengikuti kelas online bisa sangat terisolasi dan sepi dibandingkan dengan kelas tatap muka tempat Anda dapat melihat teman sekelas dan guru Anda secara real time. Memiliki forum yang menarik mengurangi kesepian itu, membuat pengalaman online menjadi pengalaman yang lebih menarik.<br><br></div><div>Berbagai Perspektif<br><br></div><div>Buat forum Anda mencerminkan berbagai perspektif. Dalam dongeng Barat, pahlawan menentang orang tuanya, menikahi gadis yang dia inginkan / cintai dan berjalan menuju matahari terbenam bersama gadis itu. Dalam dongeng Asia, pahlawan mematuhi orang tuanya, mencampakkan gadis yang dia cintai untuk menuruti orang tuanya, dan menikahi gadis yang diinginkan orang tuanya. Dia berjalan menuju matahari terbenam bersama gadis yang diinginkan orang tuanya. Contoh lain dari pahlawan Asia adalah seorang pemuda yang mengorbankan kebahagiaannya dengan menolak gadis yang dicintainya demi menjaga orang tuanya yang sudah lanjut usia. Dengan kata lain, dalam budaya Barat, ini semua tentang mengejar kebahagiaan individu. Penekanannya ada pada individu. Namun, dalam budaya Asia, penekanannya ada pada keluarga dan kelompok. Diskusi dari berbagai perspektif biasanya cukup mengasyikkan dan menyenangkan dalam forum diskusi.<br><br></div><div>Tinjauan Sejawat / Aktivitas Kolaboratif<br><br></div><div>Anda dapat meminta siswa meninjau ulang versi draf makalah mereka. Siswa saling memberikan umpan balik dan kritik yang membangun pada makalah satu sama lain. Anda juga memberikan umpan balik juga. Siswa memberikan umpan balik tentang struktur esai dan tata bahasa (opsional). Saya mengajukan pertanyaan ini kepada siswa: Di manakah esai itu lemah? Di mana esai itu kuat? Apakah esai memiliki pernyataan tesis? Apakah pernyataan tesis ditempatkan dengan benar dalam esai? Apakah esai memiliki paragraf pendahuluan, badan, dan kesimpulan? Apakah kalimat topik dari setiap paragraf tubuh sesuai dengan pernyataan tesis? Dengan menjawab pertanyaan-pertanyaan ini dan melihat makalah satu sama lain, para siswa memperkuat apa yang mereka pelajari dalam kuliah mingguan mereka tentang struktur esai 5 paragraf.<br><br></div><div>Kuis dan Game Online<br><br></div><div>Anda dapat mengajari siswa cara mengenali kekeliruan dan cara membedakan fakta dari opini. Ada banyak fallacy quiz yang dapat Anda temukan online untuk diambil siswa. <a href=\"https://www.proprofs.com/quiz-school/story.php?title=logical-fallacies-quiz\">Ini adalah tautan</a> ke salah satu halaman kuis yang saya gunakan sepanjang waktu dengan siswa saya. Ini adalah kuis informal dan sama sekali tidak menghitung nilai mereka. Mereka hanya mengambil kuis untuk bersenang-senang dan kemudian saling memberi tahu skor mereka di forum. Dengan mengikuti kuis online yang menyenangkan, siswa memperkuat dan menguji apa yang mereka ketahui tentang kesalahan.<br><br></div><div>Game Tebak-Menebak<br><br></div><div>Dalam bahasa Perancis, setiap kata dalam bahasa Perancis adalah maskulin atau feminin. Orang Perancis tidak memiliki masalah dalam menentukan kata benda Perancis mana yang maskulin dan kata benda Perancis mana yang feminin. Namun, mahasiswa Amerika memiliki banyak kesulitan untuk membedakannya. Aturan tata bahasanya adalah bahwa 80% kata benda Perancis yang diakhiri dengan “e” adalah feminin dan kata benda Perancis yang diakhiri dengan yang lain adalah maskulin. Jadi, saya meminta siswa memposting kata benda bahasa Perancis dan siswa lain harus menebak apakah kata benda bahasa Perancis itu maskulin atau feminin. Anda dapat memulai permainan dengan memposting kata benda Perancis misterius, dan kemudian Anda meminta seorang siswa menebak apa itu. Kemudian siswa itu akan memposting kata benda Perancis misteri mereka sendiri dan seterusnya. Permainan tebak tata bahasa juga bisa digunakan untuk tata bahasa (grammar) Inggris. Anda dapat meminta siswa menebak jika kalimat yang saya posting adalah kalimat sederhana, kalimat majemuk, kalimat kompleks, atau kalimat majemuk-kompleks.<br><br></div><div>Aktivitas Sambung-cerita<br><br></div><div>Aktivitas ini sangat cocok untuk mata pelajaran sastra, Anda dapat mulai menginisiasi aktivitas ini dengan memposting “Jack memasuki ruangan dan melihat sosok gelap …” Kemudian siswa berikutnya akan memposting sosok gelap apa yang mereka lihat dan kemudian siswa berikutnya akan melanjutkan cerita ini. Aktivitas ini dapat mendorong kreatifitas dan kemampuan bercerita siswa. Siswa bersenang-senang membuat cerita bersama. Dan siswa terakhir yang memposting minggu itu mendapat hak istimewa untuk menulis akhir cerita.<br><br></div><div>Bermain Peran<br><br></div><div>Anda dapat meminta siswa memerankan bahwa mereka adalah pahlawan dalam cerita dan kemudian saya bertanya kepada siswa apa yang akan mereka lakukan jika mereka adalah pahlawan dalam cerita. Pertanyaan “Bagaimana jika” itu menyenangkan. “Bagaimana jika Anda adalah Odiseus, bagaimana Anda akan kembali ke rumah untuk menyelamatkan Penelope dari para pelamar?” Pastikan peran yang Anda sebutkan cukup general oleh audiens Anda, tidak hanya diketahui oleh beberapa orang saja.<br><br></div><div>Forum Pengajaran Mahasiswa<br><br></div><div>Anda dapat memulai aktivitas ini dengan membagi kelas menjadi beberapa kelompok. Setiap kelompok bertanggung jawab untuk membaca selama seminggu. Kelompok 1 membaca untuk minggu 1. Kelompok 2 membaca untuk minggu 2. Setiap kelompok bertanggung jawab untuk memimpin forum minggu itu dan bermain sebagai guru untuk minggu itu. Dengan cara ini, Anda hanya berdiri untuk memastikan bahwa setiap kelompok melakukannya dengan baik di forum mereka dan tidak mengalami kesulitan untuk memahami bacaan mereka. Siswa senang bisa memimpin forum setiap minggu. Anda juga dapat meminta setiap grup memposting utas percakapan berdasarkan pertanyaan bacaan dari minggu itu dan kemudian anggota grup itu bertanggung jawab untuk menjawab semua posting untuk minggu itu.&nbsp;<br><br></div><div><br><strong>Sumber:</strong><br><a href=\"https://elearningindustry.com/how-create-engaging-online-discussion-forums\">https://elearningindustry.com/how-create-engaging-online-discussion-forums</a></div>', NULL, '2022-07-02 20:53:10', '2022-07-03 18:15:51'),
(31, 1, 20, 'WEB 3', 'web-3', 'post-images/6HfkjiZ2ouo28aj3l0eFvKBH1qdnvw4WTQeH72ID.jpg', 'Web 3.0 atau Web3 adalah istilah yang mengacu kepada konsep ekosistem internet yang lebih terbuka, beroperasi s...', '<div><br>Web 3.0 atau Web3 adalah istilah yang mengacu kepada konsep ekosistem internet yang lebih terbuka, beroperasi secara otonom, dan dikelola dalam cara yang terdesentralisasi. Pertama kali dicetuskan oleh Gavin Wood, konsep Web3 merupakan evolusi internet yang ingin menjauh dari sistem Web2 yang bersifat tersentralisasi di dalam perusahaan-perusahaan besar yang mengontrol internet (Google dan Amazon).</div><div><br>Konsep desentralisasi yang menjadi pusat Web3 secara alami kompatibel dengan teknologi <a href=\"https://pintu.co.id/academy/post/apa-itu-cryptocurrency-dan-blockchain\"><em>cryptocurrency</em>&nbsp;dan <em>blockchain</em></a><em>.</em> Bahkan, banyak pengembang aplikasi web3 berasal dari industri kripto dan secara aktif bekerja sama dengan berbagai <em>blockchain</em> seperti <a href=\"https://pintu.co.id/academy/post/apa-itu-ethereum\">Ethereum</a>. Banyak komunitas kripto yang menganggap bahwa masa depan Web3 akan menggunakan teknologi <em>blockchain</em> sebagai fondasinya. Anggapan ini didasarkan kepada sifat <em>blockchain</em> yang <em>trustless, permissionless,</em> dan <em>open-source.</em></div><div><br>Pada dasarnya, <em>blockchain</em> dapat memfasilitasi sistem terbuka di mana data dan algoritma komputer menjadi perantara yang menghubungkan semua penggunanya tanpa harus ada pihak perantara.</div>', NULL, '2022-07-02 21:02:12', '2022-07-03 18:04:46'),
(33, 1, 21, 'Cloudflare sempat down dan bikin panik', 'cloudflare-sempat-down-dan-bikin-panik', 'post-images/H001OPuNR7Rl3OXyrHgOPQOqLFQUwnPwz1v6VzJx.jpg', 'Dikutip situs resmi Cloudflare, gangguan layanan terjadi sekitar pulul 13.00 WIB, kemudian pukul 13.40 WIB peru...', '<div>Dikutip situs resmi Cloudflare, gangguan layanan terjadi sekitar pulul 13.00 WIB, kemudian pukul 13.40 WIB perusahaan sudah mengidentifikasi masalah gangguan.<br><br>Pukul 08.06 UTC atau pukul 15.06 WIB permasalahan berangsur teratasi. Dikutip dari Tech Crunch, Cloudflare mengatakan beberapa layanan bisnis mengonfirmasi bahwa mereka perlahan mulai pulih layanannya.<br><br>\"Insiden ini sudah teratasi,\" demikian dikutip dari keterangan resmi perusahaan.<br><br>Meski begitu, Cloudflare masih menginvestigasi kasus ini. \"Insiden P0 kritis diumumkan sekitar pukul 06:34 UTC. Konektivitas di jaringan Cloudflare telah terganggu di wilayah yang luas.\"<br><br>\"Pelanggan yang mencoba menjangkau situs Cloudflare di wilayah yang terkena dampak akan melihat \'500 error\'. Insiden tersebut berdampak pada semua layanan data plane di jaringan kami,\" lanjut perusahaan.<br><br>\"Kami akan terus memperbarui Anda ketika kami memiliki informasi lebih lanjut,\" demikian pernyataan resminya.<br><br>John Graham-Cumming, CTO Cloudflare mengatakan di utas Hacker News bahwa ini bukan pemadaman serempak yang terjadi di seluruh dunia, tetapi hanya terjadi di beberapa tempat.<br><br>Pengguna telah mengindikasikan layanan Coinbase, Shopify, dan League of Legends juga menghadapi masalah, menurut DownDetector, alat pemantauan web crowdsourced yang melacak lalu lintas platform internet.<br><br>Berdasarkan pantauan CNNIndonesia.com Selasa (21/6) siang, lebih dari 88 ribu kicauan meramaikan kata kunci Cloudflare dan menjadikannya masuk 10 besar trending topic.<br><br>Sejumlah warganet dalam negeri juga menuliskan kicauan di Twitter. Dia mengaku terganggu pekerjaanya karena Cloudflare down.<br><br><br></div>', NULL, '2022-07-02 21:22:35', '2022-07-03 18:12:14'),
(34, 1, 21, 'Apa itu Bitcoin ?', 'apa-itu-bitcoin', 'post-images/vLYowyqwHBszLj7VQWNg02k9lC9dDC77q7fKTSxx.jpg', 'Definisi dan Cara Kerja Bitcoin. Bitcoin adalah sebuah mata uang baru atau uang elektronik yang diciptakan pada...', '<div>Definisi dan <strong>Cara Kerja Bitcoin</strong>. <strong>Bitcoin</strong> adalah sebuah mata uang baru atau uang elektronik yang diciptakan pada tahun 2009 lalu oleh seseorang yang menggunakan nama samaran Satoshi Nakamoto. <strong>Bitcoin</strong> utamanya digunakan dalam transaksi di internet tanpa menggunakan perantara alias tidak menggunakan jasa bank.</div>', NULL, '2022-07-02 21:27:59', '2022-07-03 18:12:37'),
(35, 2, 22, 'Asal Usul Bendera Indonesia', 'asal-usul-bendera-indonesia', 'post-images/TEkKq495PPQ22W5FcgNbPSkU9mrADnrl5WJ0w0AT.jpg', 'Bendera merah putih dijahit oleh Fatmawati, dan dikibarkan ketika proklamasi kemerdekaan. Bendera Indonesia ber...', '<div><strong>Bendera merah putih</strong> dijahit oleh Fatmawati, dan dikibarkan ketika proklamasi kemerdekaan. <strong>Bendera</strong> Indonesia berwarna <strong>merah</strong> dan <strong>putih</strong> ternyata memiliki sejarah di baliknya. Kelahiran <strong>bendera merah putih</strong> terjadi tanggal 7 September 1944. Ketika itu Jepang berjanji akan memberikan kemerdekaan untuk Indonesia.</div>', NULL, '2022-07-02 21:31:43', '2022-07-03 18:13:18'),
(36, 2, 22, 'Sejarah UNAMA', 'sejarah-unama', 'post-images/blnb7y0qJASRhvGBsap5sXcw5xYNOUYEcwRnypGJ.jpg', 'Cikal bakal terbentuknya Universitas Dinamika Bangsa adalah ketika dua institusi STIKOM Dinamika Bangsa dan AKA...', '<div>Cikal bakal terbentuknya Universitas Dinamika Bangsa adalah ketika dua institusi STIKOM Dinamika Bangsa dan AKAKOM Stephen Jambi sepakat untuk bergabung menjadi satu Institusi. Keinginan kedua Kampus bergabung didasari dengan adanya kesamaan Visi dan cita-cita yang luhur terhadap pengembangan sumberdaya manusia dan pengetahuan. Saat ini Universitas Dinamika Bangsa menyelenggarakan 1 program magister, 5 program sarjana dan 2 program diploma. Secara resmi Universitas Dinamika Bangsa resmi beroperasi&nbsp; sejak bulan Februari Tahun 2020 dengan tebitnya izin penyelenggaran Universitas oleh Menteri Pendidikan dan Kebudayaan Republik Indonesia dengan surat Keputusan No.81/M/2020<br><br></div><div>Universitas Dinamika Bangsa berdiri dari pengalaman panjang STIKOM, yang telah mengelola institusi pendidikan selama 17 tahun. Berbekal pengalaman panjang ini diharapkan Universitas Dinamika bangsa akan dapat mewujudkan Visinya dengan lebih baik.<br><br></div>', NULL, '2022-07-02 21:37:34', '2022-07-03 18:49:43'),
(37, 1, 22, 'Ini kenapa error ya ?', 'ini-kenapa-error-ya', 'post-images/msRAuBXLEkFxcqWgIYPA4pU7yxLpSGyF8w7Xy8Yf.jpg', 'Bisa dibantu fix ini temaan2 ?', '<div>Bisa dibantu fix ini temaan2 ?</div>', NULL, '2022-07-02 21:42:14', '2022-07-03 18:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('Aktif','Dibanned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `level` enum('Admin','Siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `foto_profile`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `status`, `level`) VALUES
(1, 'Admin', 'admin', 'adminfordiskus@gmail.com', NULL, '$2y$10$n9fHjX6xRP6bv1XRsNVmbu2xEyse4DIbzL4Hp9snqU0sNN0oBAt.e', 'foto_profile/1657253313.jpg', NULL, '2022-01-22 00:04:42', '2022-07-08 11:08:33', 1, 'Aktif', 'Admin'),
(2, 'Satya Marpaung', 'winarsih.yuliana', 'mayasari.pia@example.net', '2022-01-22 00:04:43', '$2y$10$8doVm/5Vyc8aR4EDNHUflep7ffW3Vz3HqYL8guRw9wlSIA0Ki0Ypi', NULL, 'UckSG1PKvi', '2022-01-22 00:04:43', '2022-06-15 02:45:31', 0, 'Dibanned', 'Siswa'),
(3, 'Cengkal Prasetya S.IP', 'zaenab.pradana', 'oskar.marpaung@example.com', '2022-01-22 00:04:43', '$2y$10$gq7KK6tHJKy63ina0.VnJe0Ew8dWky005pRd.gK7z/iQx2cf6jWry', NULL, 'Jq4EUM0l1D', '2022-01-22 00:04:43', '2022-01-22 00:04:43', 0, 'Aktif', 'Siswa'),
(4, 'Nabila Zulaika', 'tfirmansyah', 'dimaz.wibisono@example.com', '2022-01-22 00:04:43', '$2y$10$.c4f7FtA9Lj.8DMLwcHkN.lNxmYXITg3tTjZf1P2JXFMwPb779Vl.', NULL, 'm16wGz3U5p', '2022-01-22 00:04:43', '2022-01-22 00:04:43', 0, 'Aktif', 'Siswa'),
(5, 'Saud Maruli Panjaitan', '8020180009', 'marulipanjaitan4@gmail.com', NULL, '$2y$10$7CkcyZCi.DH5l4gZIIhm7OnoqvQ41mVG10KvZ.XNu9lCRFG/.UB4i', NULL, NULL, '2022-01-22 03:21:16', '2022-01-22 03:21:16', 0, 'Aktif', 'Siswa'),
(6, 'Ronal Galang Persada', '8020180096', 'ronal96@gmail.com', NULL, '$2y$10$ODmSRSMFvTh34dxuCLjgIuuw0qWgoYE0iUbbcq7Cv5kFvPwkVrUyG', NULL, NULL, '2022-01-24 20:32:48', '2022-01-24 20:32:48', 0, 'Aktif', 'Siswa'),
(7, 'Mikhael Silaen', '8020180043', 'mikael27@gmail.com', NULL, '$2y$10$6MhTFp6xZiJP0lp8tVViye05xDyEtKBOaUa9L3qwsHYM2VwmxrAFW', NULL, NULL, '2022-01-24 20:33:54', '2022-01-24 20:33:54', 1, 'Aktif', 'Siswa'),
(8, 'Whine', '8020180196', 'whine12@gmail.com', NULL, '$2y$10$HP7Ah9M4HeoVAUfQi02OluzPKT581fn/8guSezP0q4neIay4KGfLS', NULL, NULL, '2022-01-24 20:35:31', '2022-01-24 20:35:31', 0, 'Aktif', 'Siswa'),
(9, 'Saud Marulii', '8020180080', 'marul@gmail.com', NULL, '$2y$10$/vxoj9iA3ZycrtRm8A4Uiu.zKG0FaKOISNL0opRz30obeucnK7P/u', NULL, NULL, '2022-01-24 21:08:41', '2022-01-24 21:08:41', 0, 'Aktif', 'Siswa'),
(10, 'Ucok', '8020180090', 'ucok@gmail.com', NULL, '$2y$10$xxHSSzRNxKZX6BKZq2yfMOxX.AFhf1./Y1cXgVuDeL9XLnVBtR1BK', NULL, NULL, '2022-01-24 21:19:45', '2022-01-24 21:19:45', 1, 'Aktif', 'Siswa'),
(11, 'Gilang', '8020180008', 'gilang1@gmail.com', NULL, '$2y$10$qYCYf/WJC0AwcLxr9j.RF.MRcftwHlLMFhhVFXNxzjI5vmnp6i5Nm', NULL, NULL, '2022-01-24 21:51:17', '2022-01-24 21:51:17', 0, 'Aktif', 'Siswa'),
(15, 'Joko', '8020180002', 'joko@gmail.com', NULL, '$2y$10$hwA0CNiXb75mrCdZopcNEOfJWcnCfygX9LNMyl/vRpOPWOfpuvEju', NULL, NULL, '2022-01-25 20:16:10', '2022-01-25 20:16:10', 0, 'Aktif', 'Siswa'),
(16, 'jeni', '8020180003', 'jeni@gmail.com', NULL, '$2y$10$wlLBUHslLh0WTw3qrKfml.p5EQ3by.e6IWuAdb6BMQt4v520uNlzm', NULL, NULL, '2022-01-25 20:20:29', '2022-01-25 20:20:29', 0, 'Aktif', 'Siswa'),
(17, 'joni febri', 'joni', 'joni@gmail.com', NULL, '$2y$10$roP5uR0FWXpOGKMEi1fcoOqaz5c4qSb3So8bVxW/6W8qt.DSJv87y', NULL, NULL, '2022-04-15 23:17:07', '2022-04-15 23:17:07', 0, 'Aktif', 'Siswa'),
(18, 'admin@gmail.com', 'admin@gmail.com', 'admin@gmail.com', NULL, '$2y$10$Ds.Ah2qApRUeLKekYoaTxOfqd9ueNWrLLolB3u2SuZ7pHXx9eyIfm', 'foto_profile/1656788620.png', NULL, '2022-06-10 15:45:33', '2022-07-03 02:03:40', 1, 'Aktif', 'Siswa'),
(19, 'ramdan riawan', 'ramdan3mts', 'ramdanriawan3@gmail.com', NULL, '$2y$10$KL5kbjHSUuV6hpi76P7iVeEYlehMq.W12RNOZGRlRAAslvr1Z5gzS', 'foto_profile/1655296266.jpeg', NULL, '2022-06-14 23:42:48', '2022-06-15 12:31:06', 0, 'Aktif', 'Siswa'),
(20, 'Paul', 'paul', 'paulgendut3@gmail.com', NULL, '$2y$10$P3CpGZJvTrm7igI8esVl/..Py9N7WEo0v/gPR/CTpAC1QDa2Cdnze', 'foto_profile/1656846313.jpg', NULL, '2022-07-02 21:00:10', '2022-07-03 18:05:13', 0, 'Aktif', 'Siswa'),
(21, 'Lisna', 'lisna', 'lisna@gmail.com', NULL, '$2y$10$Wd2OiekLR28kVZs0j1u68O/5NpTsX3mnM9Wt1ssHjy4FYsisql6Fq', NULL, NULL, '2022-07-02 21:17:31', '2022-07-02 21:17:31', 0, 'Aktif', 'Siswa'),
(22, 'Nuriani', 'nuriani', 'nuriani@gmail.com', NULL, '$2y$10$kma7aJO1PRUw3ziL9GnjHek/333BYiJoBsiDT0KF5JR07l7vmGRR6', NULL, NULL, '2022-07-02 21:28:37', '2022-07-02 21:28:37', 0, 'Aktif', 'Siswa'),
(23, 'Hanif Umi', 'Azizah', 'hanifumiazizah@gmail.com', NULL, '$2y$10$AFV9A0VXMC9lqcVLq.HZSuV9iWkBb/AfIky.ySuGfhbzJjvlGgq/K', NULL, NULL, '2022-07-28 20:22:08', '2022-07-28 20:22:08', 0, 'Aktif', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balasans`
--
ALTER TABLE `balasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komen_id` (`komen_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `komens`
--
ALTER TABLE `komens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dari_user` (`dari_user`),
  ADD KEY `ke_user` (`ke_user`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balasans`
--
ALTER TABLE `balasans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komens`
--
ALTER TABLE `komens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
