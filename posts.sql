-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2020 at 11:24 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `thumbnail`, `title`, `slug`, `sub_title`, `details`, `country`, `post_type`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 6, 'fffff', 'Accusamus et nobis molestias molestias facilis.', 'accusamus-et-nobis-molestias-molestias-facilis', 'Qui ea quaerat molestiae impedit nihil voluptates.', '<p>Possimus vel velit qui enim delectus sit sunt quis. Enim earum est aspernatur quia ut quasi. Rerum porro et provident aperiam quam. Qui laboriosam minus ab sequi.</p>', 'Zimbabwe', 'post', '1', '2020-09-12 11:51:34', '2020-09-12 11:54:36'),
(2, 5, 'sssasa', 'Porro voluptatem et consequatur aspernatur.', 'porro-voluptatem-et-consequatur-aspernatur', 'Dolore nisi quidem ipsum rem id quas.', '<p>Enim excepturi nobis reiciendis quos. Ipsam debitis unde enim. Necessitatibus ea cupiditate et suscipit voluptatem fugiat commodi. Cupiditate quisquam ducimus fugit tenetur.</p>', 'Indonesia', 'post', '1', '2020-09-12 11:51:34', '2020-09-12 20:53:35'),
(3, 2, NULL, 'Omnis qui impedit nihil placeat.', 'omnis-qui-impedit-nihil-placeat', 'Ducimus reprehenderit excepturi provident non.', 'Ut eius quisquam qui fuga quo quo velit. Expedita perspiciatis accusamus saepe deleniti adipisci.', 'Poland', 'post', '1', '2020-09-12 11:51:34', '2020-09-12 11:51:34'),
(4, 3, NULL, 'Assumenda quis cupiditate doloribus in aperiam quae sunt tenetur.', 'assumenda-quis-cupiditate-doloribus-in-aperiam-quae-sunt-tenetur', 'Nemo harum quasi voluptate vero deleniti praesentium voluptate quibusdam.', 'Dolor reiciendis corrupti et architecto est. Et omnis eum dignissimos consequatur rem voluptates exercitationem. Pariatur et aut corporis laboriosam repudiandae error fugiat. Unde ut alias quia ratione voluptas illum.', 'Azerbaijan', 'post', '1', '2020-09-12 11:51:34', '2020-09-12 11:51:34'),
(5, 5, 'sss', 'Sequi omnis quidem quaerat.', 'sequi-omnis-quidem-quaerat', 'Molestiae harum voluptatem rerum cumque necessitatibus unde quis.', '<p>Sint reprehenderit nobis est esse voluptas veritatis. Exercitationem iusto aperiam eum nihil et quos. Magnam unde in magni harum. Asperiores corporis iste sapiente est blanditiis.</p>', 'Tunisia', 'post', '1', '2020-09-12 11:51:34', '2020-09-12 20:53:15'),
(6, 7, 'hhhhhhhhhh', 'abo hany', 'abo-hany', NULL, '<p>ggggg</p>', 'cairo', 'post', '1', '2020-09-12 20:55:49', '2020-09-12 21:00:53'),
(7, 7, 'cairo', 'cairo', 'cairo', NULL, 'cairo', NULL, 'post', '0', '2020-09-12 21:01:50', '2020-09-12 21:01:50'),
(8, 7, 'aaaa', 'aaaaaa', 'aaaaaa', NULL, 'aaaaaa', 'cairo', 'post', '0', '2020-09-12 21:03:38', '2020-09-12 21:03:38'),
(9, 7, 'fff', 'fff', 'fff', NULL, '<p>ggggggggg</p>', 'cairo', 'post', '1', '2020-09-12 21:11:57', '2020-09-12 21:12:47'),
(10, 7, 'dddddddd', 'ddddddddd', 'ddddddddd', NULL, '<p>ddddddd</p>', 'caiop', 'post', '1', '2020-09-12 21:13:19', '2020-09-12 21:13:53'),
(11, 7, 'f', 'd', 'd', NULL, '<p>d</p>', 'd', 'post', '0', '2020-09-12 21:14:35', '2020-09-12 21:22:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
