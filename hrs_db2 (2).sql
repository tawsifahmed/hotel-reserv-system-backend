-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2025 at 01:18 AM
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
-- Database: `hrs_db2`
--

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
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(18, 'Level 1, Semi Bedroom', '2025-03-12 14:16:11', '2025-03-12 14:16:11'),
(19, 'Level 2, Single Bedroom', '2025-03-12 14:16:23', '2025-03-12 14:16:23'),
(20, 'Level 2, Master Bedroom', '2025-03-12 14:51:21', '2025-03-12 14:51:21'),
(21, 'Level 3, Semi Bedroom', '2025-03-13 17:49:26', '2025-03-13 17:49:26'),
(22, 'Level 4, Master Bedroom', '2025-03-13 17:49:36', '2025-03-13 17:49:36'),
(23, 'Rooftop, Tarrance Garden', '2025-03-13 17:49:49', '2025-03-13 17:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `imageable_id` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `imageable_type`, `imageable_id`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EXrHoYSGxVLk.png', 'App\\Models\\User', '1', 'users/EXrHoYSGxVLk.png', '2025-03-11 13:55:33', '2025-03-11 13:55:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_07_032218_create_permission_tables', 1),
(7, '2023_11_02_124836_create_jobs_table', 1),
(8, '2025_03_08_001916_create_floors_table', 1),
(9, '2025_03_08_002647_create_rooms_table', 1),
(10, '2025_03_08_002647_create_seats_table', 1),
(12, '2025_03_09_010452_create_user_otps_table', 2),
(13, '2024_02_13_055545_create_images_table', 3),
(14, '2025_03_08_003319_create_reservations_table', 4),
(15, '2025_03_13_145630_create_notifications_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `reservation_id` bigint(20) NOT NULL DEFAULT 0,
  `text` varchar(255) DEFAULT NULL,
  `is_read` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `created_by`, `reservation_id`, `text`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 09:45:12', '2025-03-13 09:45:12'),
(2, 1, 1, 6, 'User Administrativehas booked a room.', 0, '2025-03-13 09:45:12', '2025-03-13 09:45:12'),
(3, 12, 1, 6, 'User Administrativehas booked a room.', 1, '2025-03-13 09:45:12', '2025-03-13 17:42:15'),
(4, 1, 1, 7, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 13:16:12', '2025-03-13 13:16:12'),
(5, 1, 1, 7, 'User Administrative has booked a room.', 0, '2025-03-13 13:16:12', '2025-03-13 13:16:12'),
(6, 12, 1, 7, 'User Administrative has booked a room.', 1, '2025-03-13 13:16:12', '2025-03-13 18:22:47'),
(7, 1, 1, 8, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 13:38:46', '2025-03-13 13:38:46'),
(8, 1, 1, 8, 'User Administrative has booked a room.', 0, '2025-03-13 13:38:46', '2025-03-13 13:38:46'),
(9, 12, 1, 8, 'User Administrative has booked a room.', 1, '2025-03-13 13:38:46', '2025-03-13 17:54:24'),
(10, 1, 1, 8, 'An admin has cancelled your reservation.', 0, '2025-03-13 14:19:09', '2025-03-13 14:19:09'),
(11, 1, 1, 8, 'An admin has cancelled your reservation.', 0, '2025-03-13 14:19:09', '2025-03-13 14:19:09'),
(12, 12, 1, 8, 'An admin has cancelled your reservation.', 1, '2025-03-13 14:19:09', '2025-03-13 17:41:31'),
(13, 12, 12, 9, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 18:36:25', '2025-03-13 18:36:25'),
(14, 1, 12, 9, 'User authenticated has booked a room.', 0, '2025-03-13 18:36:25', '2025-03-13 18:36:25'),
(15, 12, 12, 9, 'User authenticated has booked a room.', 0, '2025-03-13 18:36:25', '2025-03-13 18:36:25'),
(16, 12, 12, 10, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 18:38:36', '2025-03-13 18:38:36'),
(17, 1, 12, 10, 'User authenticated has booked a room.', 0, '2025-03-13 18:38:36', '2025-03-13 18:38:36'),
(18, 12, 12, 10, 'User authenticated has booked a room.', 0, '2025-03-13 18:38:36', '2025-03-13 18:38:36'),
(19, 12, 12, 10, 'An admin has cancelled your reservation.', 0, '2025-03-13 18:39:12', '2025-03-13 18:39:12'),
(20, 1, 12, 10, 'An admin has cancelled your reservation.', 0, '2025-03-13 18:39:12', '2025-03-13 18:39:12'),
(21, 12, 12, 10, 'An admin has cancelled your reservation.', 0, '2025-03-13 18:39:12', '2025-03-13 18:39:12'),
(22, 12, 12, 9, 'An admin has cancelled your reservation.', 0, '2025-03-13 18:41:00', '2025-03-13 18:41:00'),
(23, 1, 12, 9, 'An admin has cancelled your reservation.', 0, '2025-03-13 18:41:00', '2025-03-13 18:41:00'),
(24, 12, 12, 9, 'An admin has cancelled your reservation.', 0, '2025-03-13 18:41:00', '2025-03-13 18:41:00'),
(25, 12, 12, 11, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 18:42:56', '2025-03-13 18:42:56'),
(26, 1, 12, 11, 'User authenticated has booked a room.', 0, '2025-03-13 18:42:56', '2025-03-13 18:42:56'),
(27, 12, 12, 11, 'User authenticated has booked a room.', 1, '2025-03-13 18:42:56', '2025-03-13 19:08:12'),
(28, 12, 12, 12, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 18:43:10', '2025-03-13 18:43:10'),
(29, 1, 12, 12, 'User authenticated has booked a room.', 0, '2025-03-13 18:43:10', '2025-03-13 18:43:10'),
(30, 12, 12, 12, 'User authenticated has booked a room.', 0, '2025-03-13 18:43:10', '2025-03-13 18:43:10'),
(31, 12, 12, 13, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 18:43:38', '2025-03-13 18:43:38'),
(32, 1, 12, 13, 'User authenticated has booked a room.', 0, '2025-03-13 18:43:38', '2025-03-13 18:43:38'),
(33, 12, 12, 13, 'User authenticated has booked a room.', 0, '2025-03-13 18:43:38', '2025-03-13 18:43:38'),
(34, 12, 12, 14, 'You have booked a room. An admin will review soon.', 1, '2025-03-13 18:45:04', '2025-03-13 19:07:59'),
(35, 1, 12, 14, 'User authenticated has booked a room.', 0, '2025-03-13 18:45:04', '2025-03-13 18:45:04'),
(36, 12, 12, 14, 'User authenticated has booked a room.', 1, '2025-03-13 18:45:04', '2025-03-13 19:07:57'),
(37, 12, 12, 10, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:00:26', '2025-03-13 20:00:26'),
(38, 1, 12, 10, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:00:26', '2025-03-13 20:00:26'),
(39, 12, 12, 10, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:00:26', '2025-03-13 20:00:26'),
(40, 12, 12, 10, 'An admin has cancelled your reservation.', 0, '2025-03-13 20:01:28', '2025-03-13 20:01:28'),
(41, 1, 12, 10, 'An admin has cancelled your reservation.', 0, '2025-03-13 20:01:28', '2025-03-13 20:01:28'),
(42, 12, 12, 10, 'An admin has cancelled your reservation.', 0, '2025-03-13 20:01:28', '2025-03-13 20:01:28'),
(43, 12, 12, 11, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:05:45', '2025-03-13 20:05:45'),
(44, 1, 12, 11, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:05:45', '2025-03-13 20:05:45'),
(45, 12, 12, 11, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:05:45', '2025-03-13 20:05:45'),
(46, 12, 12, 11, 'An admin has cancelled your reservation.', 0, '2025-03-13 20:05:49', '2025-03-13 20:05:49'),
(47, 1, 12, 11, 'An admin has cancelled your reservation.', 0, '2025-03-13 20:05:49', '2025-03-13 20:05:49'),
(48, 12, 12, 11, 'An admin has cancelled your reservation.', 0, '2025-03-13 20:05:49', '2025-03-13 20:05:49'),
(49, 12, 12, 14, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:06:54', '2025-03-13 20:06:54'),
(50, 1, 12, 14, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:06:54', '2025-03-13 20:06:54'),
(51, 12, 12, 14, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:06:54', '2025-03-13 20:06:54'),
(52, 12, 12, 11, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:07:03', '2025-03-13 20:07:03'),
(53, 1, 12, 11, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:07:03', '2025-03-13 20:07:03'),
(54, 12, 12, 11, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:07:03', '2025-03-13 20:07:03'),
(55, 12, 12, 9, 'An admin has confirmed your reservation.', 1, '2025-03-13 20:07:09', '2025-03-13 20:08:55'),
(56, 1, 12, 9, 'An admin has confirmed your reservation.', 0, '2025-03-13 20:07:09', '2025-03-13 20:07:09'),
(57, 12, 12, 9, 'An admin has confirmed your reservation.', 1, '2025-03-13 20:07:09', '2025-03-13 20:08:58'),
(58, 17, 17, 15, 'You have booked a room. An admin will review soon.', 1, '2025-03-13 20:09:27', '2025-03-14 00:11:26'),
(59, 1, 17, 15, 'User daddy has booked a room.', 0, '2025-03-13 20:09:27', '2025-03-13 20:09:27'),
(60, 12, 17, 15, 'User daddy has booked a room.', 0, '2025-03-13 20:09:27', '2025-03-13 20:09:27'),
(61, 12, 12, 16, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 20:25:18', '2025-03-13 20:25:18'),
(62, 1, 12, 16, 'User authenticated has booked a room.', 0, '2025-03-13 20:25:18', '2025-03-13 20:25:18'),
(63, 12, 12, 16, 'User authenticated has booked a room.', 0, '2025-03-13 20:25:18', '2025-03-13 20:25:18'),
(64, 17, 17, 17, 'You have booked a room. An admin will review soon.', 0, '2025-03-13 23:11:35', '2025-03-13 23:11:35'),
(65, 1, 17, 17, 'User daddy has booked a room.', 0, '2025-03-13 23:11:35', '2025-03-13 23:11:35'),
(66, 12, 17, 17, 'User daddy has booked a room.', 0, '2025-03-13 23:11:35', '2025-03-13 23:11:35'),
(67, 12, 12, 16, 'An admin has confirmed your reservation.', 0, '2025-03-13 23:12:18', '2025-03-13 23:12:18'),
(68, 1, 12, 16, 'An admin has confirmed your reservation.', 0, '2025-03-13 23:12:18', '2025-03-13 23:12:18'),
(69, 12, 12, 16, 'An admin has confirmed your reservation.', 0, '2025-03-13 23:12:18', '2025-03-13 23:12:18'),
(70, 12, 12, 16, 'An admin has cancelled your reservation.', 0, '2025-03-13 23:12:25', '2025-03-13 23:12:25'),
(71, 1, 12, 16, 'An admin has cancelled your reservation.', 0, '2025-03-13 23:12:25', '2025-03-13 23:12:25'),
(72, 12, 12, 16, 'An admin has cancelled your reservation.', 1, '2025-03-13 23:12:25', '2025-03-14 00:11:11'),
(73, 12, 12, 16, 'An admin has pending your reservation.', 1, '2025-03-13 23:12:29', '2025-03-14 00:11:01'),
(74, 1, 12, 16, 'An admin has pending your reservation.', 0, '2025-03-13 23:12:29', '2025-03-13 23:12:29'),
(75, 12, 12, 16, 'An admin has pending your reservation.', 0, '2025-03-13 23:12:29', '2025-03-13 23:12:29');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user_list', 'web', '2025-03-08 18:48:48', '2025-03-08 18:48:48'),
(2, 'user_create', 'web', '2025-03-08 18:48:48', '2025-03-08 18:48:48'),
(3, 'user_edit', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(4, 'user_delete', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(5, 'permission_list', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(6, 'permission_edit', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(7, 'permission_create', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(8, 'permission_delete', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(9, 'role_list', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(10, 'role_create', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(11, 'role_edit', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(12, 'role_delete', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49'),
(13, 'user_profile', 'web', '2025-03-08 18:48:49', '2025-03-08 18:48:49');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'API Token', 'b031b5f6be27980693e98492db614bc5de8eff5f5350465490f3e7982cfe0ba6', '[\"*\"]', NULL, NULL, '2025-03-08 19:15:41', '2025-03-08 19:15:41'),
(3, 'App\\Models\\User', 1, 'API Token', 'fa3e08b187362ba42488822034904e2679bd9885c6da656b48f2c3bbe4acc35f', '[\"*\"]', '2025-03-11 14:54:04', NULL, '2025-03-11 13:41:25', '2025-03-11 14:54:04'),
(4, 'App\\Models\\User', 1, 'API Token', '07546f3dde1ec71763d9934684fcf2d5e76bcc4ec7a5a6bda40f33d106009e72', '[\"*\"]', NULL, NULL, '2025-03-11 19:36:29', '2025-03-11 19:36:29'),
(5, 'App\\Models\\User', 1, 'API Token', 'eca0d538be73b0b34eac55f5b90bb9351a755b1450c46de6480459937467a637', '[\"*\"]', NULL, NULL, '2025-03-11 19:37:32', '2025-03-11 19:37:32'),
(6, 'App\\Models\\User', 1, 'API Token', '52a3eaed6ed5ea8e3782397b076b22a37278d9746f770937edca0bd203721b42', '[\"*\"]', NULL, NULL, '2025-03-11 19:50:10', '2025-03-11 19:50:10'),
(7, 'App\\Models\\User', 1, 'API Token', '62010f5363d52eafe2dfb80df8a981edeff3a8ab37af1ea8b21bb55c9ff19bb2', '[\"*\"]', NULL, NULL, '2025-03-11 19:50:34', '2025-03-11 19:50:34'),
(8, 'App\\Models\\User', 1, 'API Token', '2efe186bc981e687157f06125924a602e7717b93a2f52292f78400fcb6e62059', '[\"*\"]', NULL, NULL, '2025-03-11 19:53:39', '2025-03-11 19:53:39'),
(9, 'App\\Models\\User', 1, 'API Token', '70a0ab62da3f3c3d14004d3e9ad9e876e83df2195f11ebd0b3349aa104a61eb2', '[\"*\"]', NULL, NULL, '2025-03-11 20:00:42', '2025-03-11 20:00:42'),
(10, 'App\\Models\\User', 1, 'API Token', '8b5101cf02e4e0d5df47801c14522c704bb684278b77980264fbd2f36b3ea95a', '[\"*\"]', NULL, NULL, '2025-03-11 20:05:21', '2025-03-11 20:05:21'),
(11, 'App\\Models\\User', 1, 'API Token', '03be2862cb7f30f6a33a047bb3b6b0503a3a16e1db060c937082d73f200cccee', '[\"*\"]', NULL, NULL, '2025-03-11 20:05:32', '2025-03-11 20:05:32'),
(12, 'App\\Models\\User', 1, 'API Token', '8896e55ad1b506674ca42d8ebc65bb3326951925a7fb8d6a379eb6f917e5a313', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:53', '2025-03-11 20:06:53'),
(13, 'App\\Models\\User', 1, 'API Token', '899cbe03be8df2be7cce6dd6a1f0a32667842019fd7ecae1e6a717f283ef2881', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:54', '2025-03-11 20:06:54'),
(14, 'App\\Models\\User', 1, 'API Token', '378a328ecc6353daa69ee127581c5cca6494cd843b944ef69a87800f33cefd30', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:55', '2025-03-11 20:06:55'),
(15, 'App\\Models\\User', 1, 'API Token', '4dcd511ff9d917ab2cebf007b6afca04be03965d2220a9fb6dc7784410f12fc6', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:55', '2025-03-11 20:06:55'),
(16, 'App\\Models\\User', 1, 'API Token', 'e8252753fdcb286e20e6d1666817e27eb4bdf57ec1a758fc2727093374ebf335', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:55', '2025-03-11 20:06:55'),
(17, 'App\\Models\\User', 1, 'API Token', 'ef327b312c88dd264a208f18beac2cfdfd811de6dc2b6dbeb7e3b53cec681178', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:55', '2025-03-11 20:06:55'),
(18, 'App\\Models\\User', 1, 'API Token', 'ea90b17bc9e6dba349aa83bc1ae797ec7ffe007d5904559c12015019110b6009', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:55', '2025-03-11 20:06:55'),
(19, 'App\\Models\\User', 1, 'API Token', '6dda835720e3a755c8aeb82f9372f95ba66e0db845eb9143bb13efe7d66bbbca', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:56', '2025-03-11 20:06:56'),
(20, 'App\\Models\\User', 1, 'API Token', '16b51755c2b40a7b3324d0f3878f04fd6a635b9878b3807a22177c035d146b03', '[\"*\"]', NULL, NULL, '2025-03-11 20:06:56', '2025-03-11 20:06:56'),
(21, 'App\\Models\\User', 1, 'API Token', 'a5619aec5ae6647b1a7df540261d2ead8dd1271ff2853abe3c32967fab9fb639', '[\"*\"]', NULL, NULL, '2025-03-11 20:19:31', '2025-03-11 20:19:31'),
(22, 'App\\Models\\User', 1, 'API Token', 'b6c95ed663da61a32b9e0d79063af72e2fee48b9fa7bb0c61f02e000d5edc405', '[\"*\"]', NULL, NULL, '2025-03-11 20:21:07', '2025-03-11 20:21:07'),
(23, 'App\\Models\\User', 1, 'API Token', '685778fb3d5824e42b2ef6cfe4f99999da27a63d9b0c9209c39283986efa2d91', '[\"*\"]', NULL, NULL, '2025-03-11 20:29:16', '2025-03-11 20:29:16'),
(24, 'App\\Models\\User', 1, 'API Token', '2e5ce9cb9e94746e35b84dff778fd09e240ad03fe816dbf983b8563fb1ac7e25', '[\"*\"]', NULL, NULL, '2025-03-11 20:30:06', '2025-03-11 20:30:06'),
(25, 'App\\Models\\User', 1, 'API Token', 'c548fa219e3707ceafa9c19ec5b0f0cbd230b93f12babfc604ec887b486e683c', '[\"*\"]', NULL, NULL, '2025-03-11 20:31:24', '2025-03-11 20:31:24'),
(26, 'App\\Models\\User', 1, 'API Token', 'dc4df172579e50390d68f5d144de794b9b24e9ab076faef79c6c7c5dc73269e7', '[\"*\"]', NULL, NULL, '2025-03-11 20:33:00', '2025-03-11 20:33:00'),
(27, 'App\\Models\\User', 1, 'API Token', 'e016f6714a3c36630c1218488b717b164466897c3bdd894e0184aaafb25e5254', '[\"*\"]', NULL, NULL, '2025-03-11 20:34:32', '2025-03-11 20:34:32'),
(28, 'App\\Models\\User', 1, 'API Token', '173732cccb7729c1eac7041d82f41912cadc5927c7170b225780b4d342fdf9bc', '[\"*\"]', NULL, NULL, '2025-03-11 20:35:11', '2025-03-11 20:35:11'),
(29, 'App\\Models\\User', 9, 'API Token', '9f39ce9172db01368bf7a7c63db862a00348afdf90370a889a6a57391d5d5422', '[\"*\"]', NULL, NULL, '2025-03-11 21:03:59', '2025-03-11 21:03:59'),
(30, 'App\\Models\\User', 10, 'API Token', '6bf5d8fa56559d76181cca70cb42f7c70f1831ad94360643c34eea48b6823222', '[\"*\"]', NULL, NULL, '2025-03-11 21:05:34', '2025-03-11 21:05:34'),
(31, 'App\\Models\\User', 11, 'API Token', 'c986ba9704e91422e5edb27fa3c0e23d01529424a43a455bcaff7c4642c1cae3', '[\"*\"]', NULL, NULL, '2025-03-11 21:06:38', '2025-03-11 21:06:38'),
(32, 'App\\Models\\User', 12, 'API Token', '8bdc4ab9af52ef3251b0bc16a03858a627cc9c6616d20a89ed20414cbcc3887f', '[\"*\"]', NULL, NULL, '2025-03-11 21:08:08', '2025-03-11 21:08:08'),
(33, 'App\\Models\\User', 1, 'API Token', '8f49c6d56f348a6ae567052617ae2c3458319a501f86fb0257a0f8cd1b3ab054', '[\"*\"]', NULL, NULL, '2025-03-11 21:18:51', '2025-03-11 21:18:51'),
(34, 'App\\Models\\User', 13, 'API Token', '8df2564018150f2dca3fede17c4791cf178e498c2d7507078c8a32e781dd5d38', '[\"*\"]', NULL, NULL, '2025-03-11 21:19:12', '2025-03-11 21:19:12'),
(35, 'App\\Models\\User', 14, 'API Token', '76739f85c447f2b69927f4bf7c5e7edbbd9f4476571ec9aac63f93d035c9087b', '[\"*\"]', NULL, NULL, '2025-03-11 21:20:50', '2025-03-11 21:20:50'),
(36, 'App\\Models\\User', 1, 'API Token', '4940165d0199810af0920dc15273b6a565bbfd9293b42a79135a955e22160075', '[\"*\"]', NULL, NULL, '2025-03-11 21:23:06', '2025-03-11 21:23:06'),
(37, 'App\\Models\\User', 1, 'API Token', 'c969319d4b5ea4008e72076150d4865ae7336b8d71eaaae8492efc5534dae7c6', '[\"*\"]', NULL, NULL, '2025-03-11 21:23:12', '2025-03-11 21:23:12'),
(38, 'App\\Models\\User', 1, 'API Token', '3854006064208eea20d5a32688ebd9af231c8be05a1e778350f9ed88450bcb3f', '[\"*\"]', NULL, NULL, '2025-03-11 21:23:17', '2025-03-11 21:23:17'),
(39, 'App\\Models\\User', 1, 'API Token', '95ab4a9f1f339b011752d479df16c161c7297a3e01b0119a31af78dd123044a7', '[\"*\"]', NULL, NULL, '2025-03-11 21:24:19', '2025-03-11 21:24:19'),
(40, 'App\\Models\\User', 1, 'API Token', '8cd90746e153547de5a6684db946c2aed35b8b53f647d06186efe6ad128ae57b', '[\"*\"]', NULL, NULL, '2025-03-11 21:24:22', '2025-03-11 21:24:22'),
(41, 'App\\Models\\User', 1, 'API Token', '51e64cf25b32880c84e171aa511b6a37517f19c217921ead0a3b17514ece6cfd', '[\"*\"]', NULL, NULL, '2025-03-11 21:24:26', '2025-03-11 21:24:26'),
(42, 'App\\Models\\User', 1, 'API Token', 'e7242f755a77d652c85f28b065ea1fef8182b98f592c670e8d7ec9b6aefe073e', '[\"*\"]', NULL, NULL, '2025-03-11 21:24:29', '2025-03-11 21:24:29'),
(43, 'App\\Models\\User', 15, 'API Token', '73bd0ff3103d34f397c807336c5f08638a689e6a28d1324df28d6e9cb0ebff91', '[\"*\"]', NULL, NULL, '2025-03-12 04:51:03', '2025-03-12 04:51:03'),
(44, 'App\\Models\\User', 16, 'API Token', 'd674c1c2df4593194e7a9cdff465f26d620aa5fa1b92b59ff4ea02bdbea60c8d', '[\"*\"]', NULL, NULL, '2025-03-12 04:52:49', '2025-03-12 04:52:49'),
(45, 'App\\Models\\User', 1, 'API Token', '40f4051aeef1baf6e237c5e90369ead0ed682d0f1a1d089dbf106ca9ee6e7a51', '[\"*\"]', NULL, NULL, '2025-03-12 06:01:15', '2025-03-12 06:01:15'),
(46, 'App\\Models\\User', 17, 'API Token', '8d2dab3cd373f2dfc7fb5e9c35046bc86f6d0c18300e3f612ea165cb1f5c3e2e', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 06:12:07', '2025-03-13 18:25:24'),
(47, 'App\\Models\\User', 1, 'API Token', 'b96058ab593b7716611cf4c29731d107db4bc4a233083e18294e06ee4709a423', '[\"*\"]', NULL, NULL, '2025-03-12 06:14:27', '2025-03-12 06:14:27'),
(48, 'App\\Models\\User', 1, 'API Token', 'e5e653ad61238ea3f229d7df81d7860ac23acb8a27d9803a875ed6aeae11cf5e', '[\"*\"]', NULL, NULL, '2025-03-12 06:15:42', '2025-03-12 06:15:42'),
(49, 'App\\Models\\User', 1, 'API Token', 'f9348f5eb8cf0dd927072ae704878f41adedcc226de86225064863c36b267b27', '[\"*\"]', NULL, NULL, '2025-03-12 06:20:08', '2025-03-12 06:20:08'),
(50, 'App\\Models\\User', 17, 'API Token', 'e379b9078e835c2e7a66fa54ed19c6d9fa3f42a37ea8e238013b029c32d43cd8', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 06:22:45', '2025-03-13 18:25:24'),
(51, 'App\\Models\\User', 1, 'API Token', '3d222523998768a4841200f603318a69e646eb085f1dd553dbcd3690b6802acb', '[\"*\"]', NULL, NULL, '2025-03-12 06:24:22', '2025-03-12 06:24:22'),
(52, 'App\\Models\\User', 16, 'API Token', 'd0a52acaa4fa53c01a869e04ea211cec0809d89d55b238911d1d628930ff756a', '[\"*\"]', NULL, NULL, '2025-03-12 06:26:03', '2025-03-12 06:26:03'),
(53, 'App\\Models\\User', 1, 'API Token', 'f14320f6b69db79bf18a72f27f643e4bc6c22ed408290efc3121edb20a94a052', '[\"*\"]', NULL, NULL, '2025-03-12 06:26:36', '2025-03-12 06:26:36'),
(54, 'App\\Models\\User', 1, 'API Token', '2a51b7a6ea9f8945d82234ddf2eccc0438f034fc9c3ab14c2a10a851a63ed854', '[\"*\"]', NULL, NULL, '2025-03-12 06:28:06', '2025-03-12 06:28:06'),
(55, 'App\\Models\\User', 1, 'API Token', '88f2143fd0863ce1294dc6786d1186d18d869ec5a883b3d7c9113b94d4b4f93d', '[\"*\"]', NULL, NULL, '2025-03-12 06:28:12', '2025-03-12 06:28:12'),
(56, 'App\\Models\\User', 1, 'API Token', '81521fadc7ef6c4d71c9962a39fefc656cc9c5e230b507989500ca7f97ef99ea', '[\"*\"]', NULL, NULL, '2025-03-12 06:28:16', '2025-03-12 06:28:16'),
(57, 'App\\Models\\User', 1, 'API Token', '1d7b9917bd8be45412620832f722da620d9891b02ea45e1d6e0e937f2d9e73f4', '[\"*\"]', NULL, NULL, '2025-03-12 06:30:05', '2025-03-12 06:30:05'),
(58, 'App\\Models\\User', 1, 'API Token', 'b3d98f109cf3cc930c15d44dc5b407aabb129984497943d3ef33452f0a44f1db', '[\"*\"]', NULL, NULL, '2025-03-12 06:30:09', '2025-03-12 06:30:09'),
(59, 'App\\Models\\User', 1, 'API Token', '2af21bc75b1cf75e1f692879e87ffd00985f969f42ae1bd0c99676726838e439', '[\"*\"]', NULL, NULL, '2025-03-12 06:30:12', '2025-03-12 06:30:12'),
(60, 'App\\Models\\User', 1, 'API Token', '786d8a1f79779e054cc75386d9727d2e49e8dcf11675505b8ddd131b0fcaeb6f', '[\"*\"]', NULL, NULL, '2025-03-12 06:30:30', '2025-03-12 06:30:30'),
(61, 'App\\Models\\User', 1, 'API Token', '34745126bd560f5b268ddf2bd514c39f89fe0eb7eac777e7b862b40df6c97672', '[\"*\"]', NULL, NULL, '2025-03-12 06:31:25', '2025-03-12 06:31:25'),
(62, 'App\\Models\\User', 1, 'API Token', '683f3e372fdac52ae1278cc12fe4fad6a2d2d524f4b5238378d183d6041132a0', '[\"*\"]', NULL, NULL, '2025-03-12 06:31:28', '2025-03-12 06:31:28'),
(63, 'App\\Models\\User', 1, 'API Token', 'f755a47287db44e36c21ffa7cab789315b135f65f81f870320dbf57a2fbbe1a8', '[\"*\"]', NULL, NULL, '2025-03-12 06:31:42', '2025-03-12 06:31:42'),
(64, 'App\\Models\\User', 1, 'API Token', 'c10640fe2fad5c4248f7c0ebac89f22e4a68e3279337949308adcf7dbfb98758', '[\"*\"]', NULL, NULL, '2025-03-12 06:31:49', '2025-03-12 06:31:49'),
(65, 'App\\Models\\User', 1, 'API Token', 'a10174fe07d72cc16d385a588c25da4da33c5c68da40e5accd177ae2d0530413', '[\"*\"]', NULL, NULL, '2025-03-12 06:32:21', '2025-03-12 06:32:21'),
(66, 'App\\Models\\User', 1, 'API Token', '9cce3a49839e5aa72ee5053c3c1d36cdc83f97117b047946ffb664385829bb4b', '[\"*\"]', NULL, NULL, '2025-03-12 06:32:35', '2025-03-12 06:32:35'),
(67, 'App\\Models\\User', 1, 'API Token', '702a5bd6ec11f65fde9c767c584c7d03a12c855bb58d7580fbac633c09f258a3', '[\"*\"]', NULL, NULL, '2025-03-12 06:32:40', '2025-03-12 06:32:40'),
(68, 'App\\Models\\User', 1, 'API Token', '506607c63e926998a1b276981e46940aa0e825e4949ad81f7079ca167b92975b', '[\"*\"]', NULL, NULL, '2025-03-12 06:33:05', '2025-03-12 06:33:05'),
(69, 'App\\Models\\User', 1, 'API Token', 'f842560bc8bb401979cfd10ad88e6dd459a1e61a0d22bbf720925fd264262f9c', '[\"*\"]', NULL, NULL, '2025-03-12 06:35:18', '2025-03-12 06:35:18'),
(70, 'App\\Models\\User', 1, 'API Token', '2a135358321cd0f7afee4195f278f24d740909a11fb61091df774a29043623b4', '[\"*\"]', NULL, NULL, '2025-03-12 06:35:24', '2025-03-12 06:35:24'),
(71, 'App\\Models\\User', 1, 'API Token', 'c665933d3716251272dc4de88152823ebf54d117a129f4815b406864d6423ec7', '[\"*\"]', NULL, NULL, '2025-03-12 06:36:34', '2025-03-12 06:36:34'),
(72, 'App\\Models\\User', 1, 'API Token', 'b25a5801efc0c2975532437b067abfac39bb874c7d636f7c6b46b6229a3c392d', '[\"*\"]', NULL, NULL, '2025-03-12 06:38:41', '2025-03-12 06:38:41'),
(73, 'App\\Models\\User', 17, 'API Token', '216a9f846ce4bfe343361e00721858391b00253069a52100a3090d16dfba4c51', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 06:38:57', '2025-03-13 18:25:24'),
(74, 'App\\Models\\User', 1, 'API Token', 'c4b7de1bd86fca6fea9d0522bd7a374af3b01a0c848ee1f41cd59de82fe87cd2', '[\"*\"]', NULL, NULL, '2025-03-12 06:39:19', '2025-03-12 06:39:19'),
(75, 'App\\Models\\User', 7, 'API Token', '057165d16be89b8b1d86baa786254defe51559a4e204d4b02bf8eae2bd72fbb3', '[\"*\"]', '2025-03-12 14:42:08', NULL, '2025-03-12 08:11:12', '2025-03-12 14:42:08'),
(76, 'App\\Models\\User', 1, 'API Token', '07d73393d9d5a1c3ab64a75df18f70558a0948c8da21885fa404aae932ad5fb3', '[\"*\"]', NULL, NULL, '2025-03-12 08:17:03', '2025-03-12 08:17:03'),
(77, 'App\\Models\\User', 1, 'API Token', '9a6d4a5990be8a10ff4ca1ff2e1e8f44d7ff34c3670197b4fbb0fca8fd4b09b9', '[\"*\"]', NULL, NULL, '2025-03-12 08:22:55', '2025-03-12 08:22:55'),
(78, 'App\\Models\\User', 1, 'API Token', '884d49d355ea3f4adb07dc9a31d82839c1869503eaf3e5fc189327f5d3ec954e', '[\"*\"]', NULL, NULL, '2025-03-12 08:29:37', '2025-03-12 08:29:37'),
(79, 'App\\Models\\User', 17, 'API Token', '4f11777a43a3085c7cfc04fc49a3411579f0a5c081f72c76e9b1a83354b91361', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 08:29:54', '2025-03-13 18:25:24'),
(80, 'App\\Models\\User', 1, 'API Token', '6fe487ffcb7f78ec860fcfc956388a2b336aa7794c4ba3af1a66e4da4b267407', '[\"*\"]', NULL, NULL, '2025-03-12 08:30:08', '2025-03-12 08:30:08'),
(81, 'App\\Models\\User', 17, 'API Token', '16e82614ab88c8e9e3ad368c2a24752a385f586e40add96721e42a062b9806c2', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 08:30:20', '2025-03-13 18:25:24'),
(82, 'App\\Models\\User', 1, 'API Token', '22f171fe29f1431a5fa9c9a8b4b9c2e71f210f73a740bc79023dd58e699a2472', '[\"*\"]', NULL, NULL, '2025-03-12 08:35:41', '2025-03-12 08:35:41'),
(83, 'App\\Models\\User', 17, 'API Token', 'fd7b91c39ca514aa4df2eb5e6e99c104cb847917cdb87a794e07fc74fc21b9e4', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 08:39:22', '2025-03-13 18:25:24'),
(84, 'App\\Models\\User', 1, 'API Token', '34399aa056721b288b6c39ab4cea955f7b22b2757a20eee78b2af65baf2ad958', '[\"*\"]', NULL, NULL, '2025-03-12 08:48:24', '2025-03-12 08:48:24'),
(85, 'App\\Models\\User', 1, 'API Token', '32581f511a6a0c54d44f6554855ffd36540a03f8069b70920979721c2c63d86e', '[\"*\"]', NULL, NULL, '2025-03-12 09:14:35', '2025-03-12 09:14:35'),
(86, 'App\\Models\\User', 1, 'API Token', '4b1c02f8cc6942780dd4b16e0724a401e7d41990136a884ff4a78930d9a57326', '[\"*\"]', NULL, NULL, '2025-03-12 09:24:37', '2025-03-12 09:24:37'),
(87, 'App\\Models\\User', 1, 'API Token', '515a25f7974c9d3f64bd22d21ccce543a654dbb677826aa29bd1673a2101bcc1', '[\"*\"]', '2025-03-12 14:34:54', NULL, '2025-03-12 10:31:34', '2025-03-12 14:34:54'),
(88, 'App\\Models\\User', 17, 'API Token', '9cf7a72920dfede3602699b4fbf295146702fb9bc9931f0c83fc2990713f5947', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 14:44:46', '2025-03-13 18:25:24'),
(89, 'App\\Models\\User', 1, 'API Token', '199773f715d919ed6c5ae42b0d73461b610b862092b72782428668f58fd21c28', '[\"*\"]', '2025-03-12 14:51:21', NULL, '2025-03-12 14:45:05', '2025-03-12 14:51:21'),
(90, 'App\\Models\\User', 1, 'API Token', '50f9727d4bfe5f5a7b79610c0fc1c56e4e0bae0ca2fadc3dfb756e6653d5ba1b', '[\"*\"]', '2025-03-13 20:51:47', NULL, '2025-03-12 16:11:50', '2025-03-13 20:51:47'),
(91, 'App\\Models\\User', 1, 'API Token', '6c288ecbffd2cbb5dae4d0ef94444e690f2fd873814ca90002e60c2e373d8bfe', '[\"*\"]', NULL, NULL, '2025-03-12 17:31:21', '2025-03-12 17:31:21'),
(92, 'App\\Models\\User', 17, 'API Token', 'f8c48a50526922aa15a06dd805c5938ea36f5e86a65895d7d7502d90e06eeb8e', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 17:31:34', '2025-03-13 18:25:24'),
(93, 'App\\Models\\User', 1, 'API Token', '8b16f76b12172514d35ac2e7d6d19f4064ce62dd99d6287b1a0447e44c1819b8', '[\"*\"]', '2025-03-12 18:52:43', NULL, '2025-03-12 18:01:06', '2025-03-12 18:52:43'),
(94, 'App\\Models\\User', 1, 'API Token', 'a4fdd06382643ceceef295a1bac7b2897a29afd559100c304ba22ea886fc74a4', '[\"*\"]', '2025-03-12 19:03:22', NULL, '2025-03-12 18:44:12', '2025-03-12 19:03:22'),
(95, 'App\\Models\\User', 12, 'API Token', 'f0f2abc0b5160d50989014e3ba5dd1ac365228330e74f3cd7a36ff5dd9eadf7a', '[\"*\"]', '2025-03-12 23:18:46', NULL, '2025-03-12 19:04:11', '2025-03-12 23:18:46'),
(96, 'App\\Models\\User', 17, 'API Token', '706a58125c9ccd8e38c9e7b3311b66007e94d2310958ff68105b70a0600f3f37', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:25:44', '2025-03-13 18:25:24'),
(97, 'App\\Models\\User', 12, 'API Token', '7e202099a88782539be2125567d71ee0f86a7f17f4a38b0f3733a169db89cbc8', '[\"*\"]', NULL, NULL, '2025-03-12 23:25:53', '2025-03-12 23:25:53'),
(98, 'App\\Models\\User', 17, 'API Token', '2ec345ef0ffa1e023c1db279865f8da7e70f6c68629e1ec568b226a9792addb9', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:31:19', '2025-03-13 18:25:24'),
(99, 'App\\Models\\User', 17, 'API Token', 'b35f8c8328bfc60507955dad37812f6396c6624e3e49f708a9db55f8e352fae0', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:36:43', '2025-03-13 18:25:24'),
(100, 'App\\Models\\User', 17, 'API Token', '35277f7da2155b86ecdc3d68ee27ce3ff068d9792341cf4348770eef40fb7ef3', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:45:43', '2025-03-13 18:25:24'),
(101, 'App\\Models\\User', 12, 'API Token', '88e34afd6c32c55da99d7ec7ad99cb04a558b31651288fe2e61272bc9e86bfe4', '[\"*\"]', NULL, NULL, '2025-03-12 23:45:55', '2025-03-12 23:45:55'),
(102, 'App\\Models\\User', 17, 'API Token', '80aba65434852a72398186bb9ee7433e90c1a89635a700da17a24ebe75120f43', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:46:06', '2025-03-13 18:25:24'),
(103, 'App\\Models\\User', 12, 'API Token', 'c17b14a206f9e31f7b0d77f25cce0d51593f99753d6aea195f848be1d46f5943', '[\"*\"]', NULL, NULL, '2025-03-12 23:49:21', '2025-03-12 23:49:21'),
(104, 'App\\Models\\User', 17, 'API Token', '5382d41406aadfe8a89a2cbd9b4d16ad29414b2a48bc8896425c3ac9c08381d5', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:50:57', '2025-03-13 18:25:24'),
(105, 'App\\Models\\User', 12, 'API Token', 'fd05fd68c0b1b7ab7141412ae32d136ed1c5eacac9c0f4d0d8e8c1ef4c06a85b', '[\"*\"]', NULL, NULL, '2025-03-12 23:51:06', '2025-03-12 23:51:06'),
(106, 'App\\Models\\User', 17, 'API Token', 'f22926cd4c7ca1b14c3cbd6abc7b0a5ec14ee6fa92545a5b00fab0a5cf80fe02', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:51:31', '2025-03-13 18:25:24'),
(107, 'App\\Models\\User', 17, 'API Token', '792322efa88c0269899aec94a205e15d7c91498badd8ce3188bf24a9ce2587e7', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:52:54', '2025-03-13 18:25:24'),
(108, 'App\\Models\\User', 12, 'API Token', 'f1630b22157b65ebe315785a786e9e3e962fd5f793938f82de6bdf2e5f720413', '[\"*\"]', NULL, NULL, '2025-03-12 23:54:33', '2025-03-12 23:54:33'),
(109, 'App\\Models\\User', 17, 'API Token', 'b77cc6eb0262394a180cb46bbc1cc691cfe365e49f44066d0acee8445d7429a9', '[\"*\"]', NULL, '2025-03-13 20:25:24', '2025-03-12 23:58:40', '2025-03-13 18:25:24'),
(110, 'App\\Models\\User', 12, 'API Token', 'b8aa541f5efe4fb422d10980d33b159e8f669cc07ff120ca6e7050ab1c992c05', '[\"*\"]', '2025-03-13 00:30:07', NULL, '2025-03-12 23:58:49', '2025-03-13 00:30:07'),
(111, 'App\\Models\\User', 1, 'API Token', '57c28b96b807c84dcb742f3f115c12eb26e4c8fb7cb3afe5e29b0daf5025cc79', '[\"*\"]', '2025-03-13 04:29:22', NULL, '2025-03-13 04:26:42', '2025-03-13 04:29:22'),
(112, 'App\\Models\\User', 11, 'API Token', '997c10a339143a25955c449744cc3d6f7490e18e7b115cfb1e79a79d38033051', '[\"*\"]', NULL, NULL, '2025-03-13 04:29:30', '2025-03-13 04:29:30'),
(113, 'App\\Models\\User', 12, 'API Token', '3b9f9d3018c13330787af0b0fe84d3d861b9183fc7b4c0819a9494d1cb52fa09', '[\"*\"]', '2025-03-13 07:35:30', NULL, '2025-03-13 04:32:54', '2025-03-13 07:35:30'),
(114, 'App\\Models\\User', 1, 'API Token', 'd8353cc42e09fb524c293b9de79d314ec0547e20318b82e25fb07c1a87e28d0b', '[\"*\"]', NULL, NULL, '2025-03-13 08:31:50', '2025-03-13 08:31:50'),
(115, 'App\\Models\\User', 17, 'API Token', 'cc07d41272172259ac400899bde439bbc4ebc45cf2eb6b808de3534b831d6b1c', '[\"*\"]', '2025-03-13 12:04:18', '2025-03-13 20:25:24', '2025-03-13 12:04:08', '2025-03-13 18:25:24'),
(116, 'App\\Models\\User', 1, 'API Token', '2c5b2a452e17f9df7514445e9455bbdfd5a0d653851b0eb58cf38d15282be4b6', '[\"*\"]', '2025-03-13 12:05:28', NULL, '2025-03-13 12:05:13', '2025-03-13 12:05:28'),
(117, 'App\\Models\\User', 1, 'API Token', 'a764780f9d88efd0beb5af10b9a17dafdbe9e09586b69288fdf74b23822ce816', '[\"*\"]', '2025-03-13 12:06:12', NULL, '2025-03-13 12:06:07', '2025-03-13 12:06:12'),
(118, 'App\\Models\\User', 1, 'API Token', '0d3478eb136466a073a414b11421b307a83385bd796d63febf99334d34d644d7', '[\"*\"]', '2025-03-13 12:31:29', NULL, '2025-03-13 12:31:27', '2025-03-13 12:31:29'),
(119, 'App\\Models\\User', 1, 'API Token', 'e1098feee912cf89c33e993f5e7acadd1088b521ef764c77367fc098b9f53b67', '[\"*\"]', '2025-03-13 13:43:17', NULL, '2025-03-13 12:57:10', '2025-03-13 13:43:17'),
(120, 'App\\Models\\User', 1, 'API Token', 'da8656ebc3e2fee7190beefeb9a7d5a0a04b0c92eaf8c302e5c42d3a39140bd6', '[\"*\"]', '2025-03-13 14:31:10', NULL, '2025-03-13 13:52:11', '2025-03-13 14:31:10'),
(121, 'App\\Models\\User', 17, 'API Token', 'eaa7c2b37c11363754d6246d88683df9b7bb7b7b4e4a92bfc662be93a97e7a01', '[\"*\"]', '2025-03-13 14:32:09', '2025-03-13 20:25:24', '2025-03-13 14:31:57', '2025-03-13 18:25:24'),
(122, 'App\\Models\\User', 1, 'API Token', '9db1814f2919bc2b311c9f54902f8976151dce9b7140e7fe16ccc1d7f6359287', '[\"*\"]', '2025-03-13 14:32:22', NULL, '2025-03-13 14:32:20', '2025-03-13 14:32:22'),
(123, 'App\\Models\\User', 12, 'API Token', '23b10490d5d8340dc8c7a68f2968899067f1a943b67662ce3dec1a0c72d68003', '[\"*\"]', '2025-03-13 18:22:47', NULL, '2025-03-13 16:45:25', '2025-03-13 18:22:47'),
(124, 'App\\Models\\User', 1, 'API Token', '9f6d8097b32453f02f9cdb1d4ff2443248b804c36904d51d635f494f85feafa9', '[\"*\"]', '2025-03-13 16:48:31', NULL, '2025-03-13 16:46:43', '2025-03-13 16:48:31'),
(125, 'App\\Models\\User', 17, 'API Token', '9a3c8af984354a9034baa78cbad15d3a3d5426801a414424e5659deaa79969b0', '[\"*\"]', '2025-03-13 18:25:37', '2025-03-13 20:25:24', '2025-03-13 18:25:24', '2025-03-13 18:25:37'),
(126, 'App\\Models\\User', 17, 'API Token', '35a55dac2abf47ca9f4a631cbbe1ede9c5653bfcb510e2a07cd92ad00dc6fa14', '[\"*\"]', '2025-03-13 18:25:55', NULL, '2025-03-13 18:25:45', '2025-03-13 18:25:55'),
(127, 'App\\Models\\User', 17, 'API Token', 'e6242e2661105459939beee46b4e0bd248e4550d5b6c1dd8b75ef337617f934f', '[\"*\"]', '2025-03-13 18:34:46', NULL, '2025-03-13 18:31:42', '2025-03-13 18:34:46'),
(128, 'App\\Models\\User', 12, 'API Token', '411399fbb3a91ba74c977ce2bbc44c10d77215842b66fbaf85e14f25208e176c', '[\"*\"]', '2025-03-13 18:59:07', NULL, '2025-03-13 18:34:54', '2025-03-13 18:59:07'),
(129, 'App\\Models\\User', 12, 'API Token', 'd55b722f2e698aa108323846c91e7da446dca9abbeb6f34f5886b5c371b53d54', '[\"*\"]', '2025-03-13 18:59:52', NULL, '2025-03-13 18:59:11', '2025-03-13 18:59:52'),
(130, 'App\\Models\\User', 12, 'API Token', '74d9f79e9e629fda5676e3f28ac8f834c24142ce93375b199b8a880e9e99a1eb', '[\"*\"]', '2025-03-13 19:02:18', NULL, '2025-03-13 18:59:54', '2025-03-13 19:02:18'),
(131, 'App\\Models\\User', 12, 'API Token', '97b4d3cbb72565ea941b696d9b15472e23c2ed036ef45744c2e331a382d4555e', '[\"*\"]', '2025-03-13 19:02:40', NULL, '2025-03-13 19:02:20', '2025-03-13 19:02:40'),
(132, 'App\\Models\\User', 12, 'API Token', '07860748f627f2e8e616359c5759bcb16c5a96f1d7d8e3d1938d83defba53ac4', '[\"*\"]', '2025-03-13 20:08:58', NULL, '2025-03-13 19:02:43', '2025-03-13 20:08:58'),
(133, 'App\\Models\\User', 17, 'API Token', 'c1dde16d043ed16ad55dfa7b263e4f82678a46efd0f5b39cb71b6e1768cc5bb3', '[\"*\"]', '2025-03-13 20:10:17', NULL, '2025-03-13 20:09:08', '2025-03-13 20:10:17'),
(134, 'App\\Models\\User', 12, 'API Token', '155984842ba7716334533a4734d10a5e776a73130f37b632d8befe7b0ff9e77b', '[\"*\"]', '2025-03-13 23:11:16', NULL, '2025-03-13 20:10:26', '2025-03-13 23:11:16'),
(135, 'App\\Models\\User', 17, 'API Token', 'ae8b23009ad573959b2d834f25bee7f9e090ef64475212162b810c3de17fc88f', '[\"*\"]', '2025-03-13 23:11:37', NULL, '2025-03-13 23:11:22', '2025-03-13 23:11:37'),
(136, 'App\\Models\\User', 12, 'API Token', 'f26ed2ca3df8fa99b8cdd2d90104a232c1b0191d2a838da4e7401c2b7571a3a9', '[\"*\"]', '2025-03-14 00:11:11', NULL, '2025-03-13 23:11:45', '2025-03-14 00:11:11'),
(137, 'App\\Models\\User', 17, 'API Token', '2f988f3ee061162d673ce76b9c81ab5586a734fd836d7f268a88a5f5b0034788', '[\"*\"]', '2025-03-14 00:11:30', NULL, '2025-03-14 00:11:18', '2025-03-14 00:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `room_id`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(9, 12, 7, '2025-03-14', '2025-03-14', 'confirmed', '2025-03-13 18:36:25', '2025-03-13 20:07:09'),
(10, 12, 7, '2025-03-10', '2025-03-12', 'cancelled', '2025-03-13 18:38:36', '2025-03-13 20:01:28'),
(16, 12, 7, '2025-03-01', '2025-03-01', 'pending', '2025-03-13 20:25:18', '2025-03-13 23:12:29'),
(17, 17, 5, '2025-01-07', '2025-02-20', 'pending', '2025-03-13 23:11:35', '2025-03-13 23:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrative', 'web', '2025-03-08 18:48:48', '2025-03-08 18:48:48'),
(2, 'User', 'web', '2025-03-08 18:48:48', '2025-03-08 18:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `price_per_night` decimal(8,2) NOT NULL,
  `seats` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `floor_id`, `price_per_night`, `seats`, `created_at`, `updated_at`) VALUES
(1, '211', 18, '101.00', 2, '2025-03-13 08:41:59', '2025-03-13 13:19:37'),
(5, '101', 19, '200.00', 3, '2025-03-13 13:31:06', '2025-03-13 17:43:14'),
(7, '111', 18, '210.00', 2, '2025-03-13 13:34:53', '2025-03-13 13:34:53'),
(9, '303', 21, '110.00', 2, '2025-03-13 20:22:18', '2025-03-13 20:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `seat_number` varchar(255) NOT NULL,
  `status` enum('available','reserved') NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_hint` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `password_hint`, `image`, `type`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrative', 'hrs_admin@gmail.com', '01710000000', NULL, '$2y$10$1oz33m4iDo4RE1BkACZOeeH9EupvUxaW2deRRxw8zorR2VCAgzIwS', 'MTIzNDU2Nzg=', 'C:\\Users\\kamru\\AppData\\Local\\Temp\\phpE453.tmp', 'admin', 'dhaka', 1, NULL, '2025-03-08 18:48:48', '2025-03-13 04:25:34'),
(2, 'tawsif', 'sesatay592@rinseart.com', '01252454', NULL, '$2y$10$3ar4UfK7EUK3L/gDZzKIdOuwuCeLvzwxE4e.fO.CHrV4PRxPC/0OK', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-08 19:14:18', '2025-03-13 05:54:16'),
(3, 'riyad', 'riyad22@gmail.com', NULL, NULL, '$2y$10$6t4B/frwYUgZKSvWaBXbl.69I7/75FDWCWK9J6UgoSk0aBcSn3g3q', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-08 19:17:46', '2025-03-13 05:57:13'),
(4, 'riyad', 'test@gmail.com', NULL, NULL, '$2y$10$2L6Zrv7ygK8lHyVS5srvL.PuyxOtCFuGh7.OlOhwE/MzvXIBPK/UC', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-08 19:18:13', '2025-03-08 19:18:13'),
(7, 'namsms', 'platform.asdasd@gmail.com', NULL, NULL, '$2y$10$8FKszLr28wK9Z3R9j0WmeeDvrg6EUzEmE5959/S7sA8H1zjjmpGNK', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-11 19:54:53', '2025-03-11 19:54:53'),
(8, 'platform.as11dasd@gmail.com', 'platform.asd11asd@gmail.com', NULL, NULL, '$2y$10$9/xiYVGElJeC3nRbDCpoAuc6WFr5KeyWAIEsI0BCIM0nZQzJh0suC', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-11 21:02:07', '2025-03-11 21:02:07'),
(9, 'faruq', 'faruq@gmail.com', NULL, NULL, '$2y$10$7yk/6Veu9ODkglsMDfxL9utlT8Tvk5pYpHKuZemqsKiDigtTxyrJO', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-11 21:03:59', '2025-03-11 21:03:59'),
(10, 'Fahim', 'fahim@gmail.com', NULL, NULL, '$2y$10$VOUoSx3jbJb52VKU4Ku7Ceuh80WuYnYJRLh8yIZ9EpVGxXMmMlBLi', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-11 21:05:33', '2025-03-11 21:05:33'),
(11, 'ornob', 'ornob@gmail.com', NULL, NULL, '$2y$10$tjzm4Hkxn7heGJHgNY4.0ezQafs.LZEIHHd74nsMVTk13ONmILsTa', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-11 21:06:38', '2025-03-13 04:29:21'),
(12, 'authenticated', 'authenticated@gmail.com', NULL, NULL, '$2y$10$vITDuNnt4NfVzJdEQ2Qlju7xRvpdpqz9v6bUTTeKFRXEYHqnG3cEy', NULL, NULL, 'admin', NULL, 1, NULL, '2025-03-11 21:08:08', '2025-03-12 19:03:22'),
(13, 'Olive', 'olive@gmail.com', NULL, NULL, '$2y$10$vS/zmSpPhheJzHQVhQzZBOaSTaMX837rjxTrW2aJbCBRp/w9I23cy', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-11 21:19:12', '2025-03-11 21:19:12'),
(14, 'Rover', 'rover@gmail.com', NULL, NULL, '$2y$10$4ISONsr7TiI9N3Th2iQh4uezkEMRQTY.w00Z9fZTNMmX5mVXpWTM.', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-11 21:20:50', '2025-03-11 21:20:50'),
(15, 'Frek', 'frek@gmail.com', NULL, NULL, '$2y$10$pXxkYhGVNtSa05j0ClWfYuZWerDgN4xDzwGwKITcrwJxZk7RMSOzW', NULL, NULL, 'client', NULL, 1, NULL, '2025-03-12 04:51:03', '2025-03-12 04:51:03'),
(17, 'daddy', 'daddy@gmail.com', NULL, NULL, '$2y$10$EpFu5UI09YCrWO9twBl17egE9MI1SBxPV96H3LUjTbmH47y7IOHVu', NULL, NULL, 'client', 't5rtjhg', 1, NULL, '2025-03-12 06:12:07', '2025-03-13 18:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_otps`
--

INSERT INTO `user_otps` (`id`, `user_id`, `otp`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 17, '123456', '2025-03-13 12:28:05', '2025-03-13 12:23:06', '2025-03-13 12:23:06'),
(2, 17, '123456', '2025-03-13 12:28:24', '2025-03-13 12:23:24', '2025-03-13 12:23:24'),
(3, 1, '123456', '2025-03-13 12:29:12', '2025-03-13 12:24:12', '2025-03-13 12:24:12'),
(4, 17, '123456', '2025-03-13 12:35:43', '2025-03-13 12:30:43', '2025-03-13 12:30:43'),
(5, 17, '123456', '2025-03-13 12:40:25', '2025-03-13 12:35:25', '2025-03-13 12:35:25'),
(6, 17, '123456', '2025-03-13 17:21:49', '2025-03-13 17:16:49', '2025-03-13 17:16:49'),
(7, 17, '123456', '2025-03-13 17:27:13', '2025-03-13 17:22:13', '2025-03-13 17:22:13'),
(8, 17, '123456', '2025-03-13 17:28:15', '2025-03-13 17:23:15', '2025-03-13 17:23:15'),
(9, 17, '123456', '2025-03-13 18:30:18', '2025-03-13 18:25:18', '2025-03-13 18:25:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_room_id_foreign` (`room_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_floor_id_foreign` (`floor_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_room_id_foreign` (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
