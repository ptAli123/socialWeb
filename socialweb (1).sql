-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 07:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `massage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user1_id` bigint(20) UNSIGNED NOT NULL,
  `user2_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `file`, `user_id`, `post_id`, `updated_at`, `created_at`) VALUES
(6, 'good', 'comment/pKYxLrobsBvvCY16NgQCUEubP1dLCC6edzF1UeWu.jpg', 7, 4, '2021-11-10 10:15:54', '2021-11-10 10:15:54'),
(7, 'welldone', 'comment/GwNFmLnQDTHaDonAlQ9Qy543D7TJFwLsp7cTQ9RG.jpg', 7, 4, '2021-11-10 10:16:03', '2021-11-10 10:16:03'),
(8, 'sharam kar', 'post/8ZsrERwhVgEQwLlzgpAdK06y4dLkGnnIrDP51OeH.jpg', 7, 5, '2021-11-10 10:16:16', '2021-11-10 10:16:16'),
(10, 'ganga choti', 'comment/91gJspI7fSO7mUs0rk2WfB5KJvHIO92UUIJ6dhkX.jpg', 8, 12, '2021-11-12 06:09:30', '2021-11-12 06:09:30'),
(11, 'ganga', 'comment/4UQqQCpzLzQ8fQFaiTabNFgGvwCBqyI2ggWDujPo.jpg', 8, 15, '2021-11-12 06:09:43', '2021-11-12 06:09:43'),
(12, 'ganga', 'comment/WP9OQ0s2PK6hPFWO3L08JvTg3wSIcOEIIAtsQ88u.jpg', 8, 15, '2021-11-12 11:08:00', '2021-11-12 11:08:00'),
(13, 'chal nikal', 'comment/R6R2HTflo6c1XkprZtO3wYOkbl4hvY8nt0kS7Vll.jpg', 8, 17, '2021-11-14 02:36:09', '2021-11-14 02:36:09'),
(14, 'chal nikal', 'comment/YBepG1usoIuMREdrJlNF7ARgLu7J8wT9BDRdkCqR.jpg', 8, 17, '2021-11-14 02:37:05', '2021-11-14 02:37:05');

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
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user1_id` bigint(20) UNSIGNED NOT NULL,
  `user2_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user1_id`, `user2_id`, `updated_at`, `created_at`) VALUES
(1, 7, 3, '2021-11-10 08:03:15', '2021-11-10 08:03:15'),
(2, 7, 2, '2021-11-10 10:54:51', '2021-11-10 10:54:51'),
(3, 8, 7, '2021-11-12 06:23:09', '2021-11-12 06:23:09');

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
(5, '2021_11_08_080524_database_creation', 1);

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
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `file`, `access`, `user_id`, `updated_at`, `created_at`) VALUES
(2, 'post/G7U2IgQz0kzHnEwmHo9m48ENDui3cqU1ouUfv5Go.jpg', 'public', 2, '2021-11-10 06:33:10', '2021-11-10 06:33:10'),
(4, 'post/rFiO0fbZjrhNS7rVlmUhx9qrHSvlxqrrwrwoZ4Ng.jpg', 'public', 7, '2021-11-10 10:14:54', '2021-11-10 10:14:54'),
(5, 'post/OGGQhBtcbD4Niu84c7XGqQjoPIcPlfUCpcQN98IK.jpg', 'private', 7, '2021-11-10 10:15:14', '2021-11-10 10:15:14'),
(6, 'post/WqLRdKBoASEEZsIvPeR6PbVrWR3Tvlcu8U7HblZV.jpg', 'private', 8, '2021-11-11 12:38:23', '2021-11-11 12:38:23'),
(7, 'post/VEwMKeewZphBJHJPdrCiVfJmxpY2IN9ck9d4UR7J.jpg', 'private', 8, '2021-11-11 12:38:53', '2021-11-11 12:38:53'),
(8, 'post/x5M1OvEHuFRlnpbFz8vLBkT6qukC0NSVPEdexovL.mp3', 'private', 8, '2021-11-11 12:39:10', '2021-11-11 12:39:10'),
(9, 'post/OLUHRnT3A6z8wsX1vaoI9cjxU0jBDFqgdH2j3FOB.jpg', 'private', 8, '2021-11-12 05:27:12', '2021-11-12 05:27:12'),
(10, 'post/uFE7iOFZi476B2TlDh3ovry4R8PTgSyCeSEFIP8q.jpg', 'public', 8, '2021-11-12 05:41:02', '2021-11-12 05:41:02'),
(11, 'post/ElPYrCQz5pFsOhFmrP3yxqxgmvwCSznVBhYXENGz.jpg', 'public', 8, '2021-11-12 05:50:00', '2021-11-12 05:50:00'),
(12, 'post/i2GAHiPnPHX12866EvXjNxtZbFzrNuwbuPdy208F.jpg', 'private', 8, '2021-11-12 05:50:10', '2021-11-12 05:50:10'),
(13, 'post/NEgp9HkQr2OsjH7ObCOSDFwZavbcrksvQKZr2Rhf.jpg', 'privat', 8, '2021-11-12 05:50:17', '2021-11-12 05:50:17'),
(14, 'post/1sbuqfJ0kGIghSKTpwNJJ8lw6l0hBMz1TAQTxXz8.jpg', 'private', 8, '2021-11-12 05:59:52', '2021-11-12 05:59:52'),
(15, 'post/I4dl31LzDM7Djv0nHA05L8874jxzE9kRttjL8ioO.jpg', 'public', 8, '2021-11-12 06:00:05', '2021-11-12 06:00:05'),
(16, 'post/62zkbfR5Ry0ZF2YD7xt8UhzptkcMwoMWXLFly5G6.jpg', 'public', 8, '2021-11-12 10:54:53', '2021-11-12 10:54:53'),
(17, 'post/wmOiEWDM0PZG7SeIx1WPbitbAVapLTJdaLtkMRlS.jpg', 'public', 8, '2021-11-14 02:37:24', '2021-11-14 02:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `varify_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_varify_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `gender`, `status`, `varify_token`, `remember_token`, `forget_password_varify_token`, `created_at`, `updated_at`) VALUES
(2, 'Ali Hussain', 'malikhusnain714@gmail.com', NULL, '$2y$10$fc0rRqBsSru9CBbYf6nwAuVPmMPgjuenknLgDXSJHVzE3TkLNpxn.', 'male', 0, '', NULL, '', '2021-11-08 08:06:31', '2021-11-08 08:06:31'),
(3, 'Malik Hussain', 'malikhusnain715@gmail.com', NULL, '$2y$10$50.ymYFXMOBKX0XyceNSKuhQS2lPNnwyZgtVNqYiEOPdVdXW6c6ye', 'male', 0, '', NULL, '', '2021-11-08 08:07:32', '2021-11-08 08:07:32'),
(7, 'Ali', 'malikhusnain713@gmail.com', '2021-11-09 12:28:06', '$2y$10$ZWmDCzp4bokIiBr5Qdrz6u315Vss0TNMTvaHKRLO.5Gxk8TiLGS1e', 'male', 1, '52142', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsb2NhbGhvc3QiLCJhdWQiOjE2MzY1MjcyNjIsImlhdCI6IjIwMjEtMTEtMTBUMDY6NTQ6MjIuMTAwNjc3WiIsIm5iZiI6MzQwMDAwMH0.BjGTRjAd08YKFC2ZMhHZUts6kAl_OgfQ8p_55xvht14', '', '2021-11-09 12:25:24', '2021-11-09 12:25:24'),
(8, 'Malik', 'pt.alihussain@gmail.com', '2021-11-11 12:36:59', '$2y$10$OE5Yu8pbRz284fuQ8tb7xeZ/bX5x/DJO59cf3sdSH1Y8ZlvFuqoru', 'male', 1, '64598', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsb2NhbGhvc3QiLCJhdWQiOjE2MzY5NTE1MjYsImlhdCI6IjIwMjEtMTEtMTVUMDQ6NDU6MjYuNDk5MDcwWiIsIm5iZiI6MzQwMDAwMH0.c02mAYSEITOGvnxqff-KiWK0KDHiy74nRrZZRdmDo20', '54535', '2021-11-11 12:36:25', '2021-11-11 12:36:25'),
(11, 'Malik Hussain', 'uzair.am10@gmail.com', '2021-11-15 04:55:12', '$2y$10$Siy7TGyFlrnfMUFMvWocCO1ufqZkH5GJBEBOirYyEnchyPuh.vyuO', 'male', 1, '50859', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsb2NhbGhvc3QiLCJhdWQiOjE2MzY5NTIxODAsImlhdCI6IjIwMjEtMTEtMTVUMDQ6NTY6MjAuNjU3NTc3WiIsIm5iZiI6MzQwMDAwMH0.pcrrQEm85NllTMwp0qnUV_BYq9Fm2q0UqmZsd70hMjM', NULL, '2021-11-15 04:54:35', '2021-11-15 04:54:35'),
(13, 'Hussain Ali', 'hussainhashmi1426@gmail.com', NULL, '$2y$10$HpycKQ5AtLqzSnhKlvpA1u8m1iXE.WZ50nSClYx/vkkxOw6CWqZzi', 'male', 1, '44259', NULL, NULL, '2021-11-19 04:22:13', '2021-11-19 04:22:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user1_id_foreign` (`user1_id`),
  ADD KEY `chats_user2_id_foreign` (`user2_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friends_user1_id_foreign` (`user1_id`),
  ADD KEY `friends_user2_id_foreign` (`user2_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chats_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
