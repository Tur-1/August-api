-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 12:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tur_august`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `gender` enum('Female','Male') NOT NULL DEFAULT 'Male',
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `gender`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$xSugoyKv765TY8DsERJ2/.mPIOwLNdM5Iw1n3x1XNVymBlHNG4cX6', NULL, 'Male', 1, '6bTqrzDqjSidiTDN8Z44aS7OhPxBDeYLNyYii8ePxK8ssQx79T6ADjk8rxDk', '2023-08-25 09:44:33', '2023-10-10 00:34:12'),
(11, 'ahemd', 'ahmed@admin.com', NULL, '$2y$10$1kNLI27kGNZI/Ih8jKCgKe76jRzoEi77uwAsw2.9aUS.qpQvALzZC', 46632329563, 'Male', 1, 'HBGlnpJp1kdqbyfUa6MlMuBCj53pIHeh0uDzNkxspi7ZDQ77p0aRdjgSkNfW', '2024-05-24 10:00:49', '2024-05-24 10:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permission`
--

CREATE TABLE `admin_permission` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permission`
--

INSERT INTO `admin_permission` (`admin_id`, `permission_id`) VALUES
(1, 1),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 10),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 11),
(1, 24),
(1, 4),
(1, 19),
(1, 3),
(1, 2),
(1, 14),
(1, 12),
(1, 64),
(1, 9),
(11, 19),
(11, 29),
(11, 3),
(11, 50),
(11, 49),
(11, 48),
(11, 46),
(11, 47);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `type` enum('small','medium','large') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `link`, `is_active`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Men Banner', '1694829757-1672949301-slide_1.webp', '#', 1, 'large', '2023-09-15 23:02:37', '2023-09-15 23:02:37'),
(2, 'Banner2', '1694829774-1672951891-module_01_en_3.webp', '#', 1, 'medium', '2023-09-15 23:02:54', '2023-09-15 23:02:54'),
(3, 'Banner3', '1694829788-1672951901-module_01_en_2.webp', '#', 1, 'medium', '2023-09-15 23:03:08', '2023-09-15 23:03:08'),
(4, 'Banner4', '1694829814-1691857899-module_01_en.webp', '#', 1, 'medium', '2023-09-15 23:03:34', '2023-09-15 23:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(7, 'Nike', '65676605e2f90_60acc7078348f30d.png', 'nike', '2023-08-29 08:38:44', '2023-11-29 16:25:41'),
(8, 'Addidas', NULL, 'addidas', '2023-09-19 02:51:27', '2023-09-19 02:51:27'),
(9, 'Puma', NULL, 'puma', '2023-09-19 02:51:43', '2023-09-19 02:51:43'),
(10, 'Adidas Originals', NULL, 'adidas-originals', '2023-09-19 02:52:16', '2023-09-19 02:52:16'),
(11, 'Aldo', NULL, 'aldo', '2023-09-19 02:52:27', '2023-09-19 02:52:27'),
(12, 'American Eagle', NULL, 'american-eagle', '2023-09-19 02:52:56', '2023-09-19 02:52:56'),
(13, 'Calvin Klein', NULL, 'calvin-klein', '2023-09-19 02:53:20', '2023-09-19 02:53:20'),
(14, 'Fila', NULL, 'fila', '2023-09-19 02:53:37', '2023-09-19 02:53:37'),
(15, 'Guess', NULL, 'guess', '2023-09-19 02:53:48', '2023-09-19 02:53:48'),
(16, 'Levi\'s®', NULL, 'levis', '2023-09-19 02:54:16', '2023-09-19 02:54:16'),
(17, 'Under Armour', NULL, 'under-armour', '2023-09-19 06:56:02', '2023-09-19 06:56:02'),
(18, 'Tommy Hilfiger', NULL, 'tommy-hilfiger', '2023-09-19 06:58:23', '2023-09-19 06:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parents_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`parents_ids`)),
  `is_section` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `url`, `image`, `section_id`, `parent_id`, `parents_ids`, `is_section`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Women', 'women', 'women', NULL, NULL, NULL, NULL, 1, 1, '2023-09-03 08:09:57', '2023-09-03 08:09:57'),
(2, 'Clothing', 'clothing', 'women-clothing', NULL, 1, 1, '[1]', 0, 1, '2023-09-03 08:17:20', '2023-09-03 08:17:20'),
(3, 'Men', 'men', 'men', NULL, NULL, NULL, NULL, 1, 1, '2023-09-19 03:07:44', '2023-09-19 03:07:44'),
(4, 'Kids', 'kids', 'kids', NULL, NULL, NULL, NULL, 1, 1, '2023-09-19 03:07:49', '2023-09-19 03:07:49'),
(5, 'Clothing', 'clothing', 'men-clothing', NULL, 3, 3, '[3]', 0, 1, '2023-09-19 03:08:00', '2023-09-19 03:08:00'),
(6, 'Accessories', 'accessories', 'men-accessories', NULL, 3, 3, '[3]', 0, 1, '2023-09-19 03:08:14', '2023-09-19 03:08:14'),
(7, 'Shoes', 'shoes', 'men-shoes', NULL, 3, 3, '[3]', 0, 1, '2023-09-19 03:08:26', '2023-09-19 03:08:26'),
(8, 'Bags', 'bags', 'men-bags', NULL, 3, 3, '[3]', 0, 1, '2023-09-19 03:09:12', '2023-09-19 03:09:12'),
(9, 'Hoodies & Sweatshirts', 'hoodies_sweatshirts', 'men-clothing-hoodies_sweatshirts', '1695103824-1673102412-screenshot_2022_08_13_104807.webp', 3, 5, '[3,5]', 0, 1, '2023-09-19 03:10:24', '2023-09-19 03:10:24'),
(10, 'T-Shirt & Visits', 't_shirt_visits', 'men-clothing-t_shirt_visits', '1695103937-1673103163-screenshot_2021_10_14_145605.webp', 3, 5, '[3,5]', 0, 1, '2023-09-19 03:12:17', '2023-09-19 03:12:17'),
(11, 'Jackets & Coats', 'jackets_coats', 'men-clothing-jackets_coats', '1695104077-1-web-desktop-list.png', 3, 5, '[3,5]', 0, 1, '2023-09-19 03:14:37', '2023-09-19 03:14:37'),
(12, 'T-Shirt', 't_shirt', 'men-clothing-t_shirt_visits-t_shirt', NULL, 3, 10, '[3,5,10]', 0, 1, '2023-09-19 03:15:33', '2023-09-20 01:06:29'),
(13, 'Visits', 'visits', 'men-clothing-t_shirt_visits-visits', NULL, 3, 10, '[3,5,10]', 0, 1, '2023-09-19 03:16:03', '2023-09-19 03:16:03'),
(14, 'Hoodies', 'hoodies', 'men-clothing-hoodies_sweatshirts-hoodies', NULL, 3, 9, '[3,5,9]', 0, 1, '2023-09-19 03:16:30', '2023-09-19 03:16:30'),
(15, 'Sweeatshitrs', 'sweeatshitrs', 'men-clothing-hoodies_sweatshirts-sweeatshitrs', NULL, 3, 9, '[3,5,9]', 0, 1, '2023-09-19 03:16:54', '2023-09-19 03:16:54'),
(16, 'Pants & Chinos', 'pants_chinos', 'men-clothing-pants_chinos', '1695104240-1673103212-screenshot_2021_10_14_145839.webp', 3, 5, '[3,5]', 0, 1, '2023-09-19 03:17:20', '2023-09-19 03:17:20'),
(17, 'Jeans', 'jeans', 'men-clothing-jeans', '1695104289-1-we545b-desktop-list.png', 3, 5, '[3,5]', 0, 1, '2023-09-19 03:18:09', '2023-09-19 03:18:09'),
(18, 'Pants', 'pants', 'men-clothing-pants_chinos-pants', NULL, 3, 16, '[3,5,16]', 0, 1, '2023-09-19 03:24:03', '2023-09-19 03:24:03'),
(19, 'Sneakers', 'sneakers', 'men-shoes-sneakers', '1695104715-1-w56eb-desktop-list.png', 3, 7, '[3,7]', 0, 1, '2023-09-19 03:25:15', '2023-09-19 03:25:15'),
(20, 'Sports Shoes', 'sports_shoes', 'men-shoes-sports_shoes', '1695104767-1-web-de65sktop-list.png', 3, 7, '[3,7]', 0, 1, '2023-09-19 03:26:07', '2023-09-19 03:26:07'),
(21, 'Boots', 'boots', 'men-shoes-boots', '1695104829-1888-web-desktop-list.png', 3, 7, '[3,7]', 0, 1, '2023-09-19 03:27:09', '2023-09-19 03:27:09'),
(22, 'Sunglasses', 'sunglasses', 'men-accessories-sunglasses', '1695111183-1-web-desktop-listdfd.png', 3, 6, '[3,6]', 0, 1, '2023-09-19 05:13:03', '2023-09-19 05:13:03'),
(23, 'Sports Bags', 'sports_bags', 'men-bags-sports_bags', '1695111242-1-web-desktop-listddfdffdfd.png', 3, 8, '[3,8]', 0, 1, '2023-09-19 05:14:02', '2023-09-19 05:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Blue', '1694262624-1672575947-color_blue.webp', 'blue', '2023-09-03 08:09:36', '2023-09-09 09:30:24'),
(2, 'Black', '1694581199-1672276413-black.webp', 'black', '2023-09-13 01:59:59', '2023-09-13 01:59:59'),
(3, 'Green', '1694581213-1672276347-color_green_web.webp', 'green', '2023-09-13 02:00:13', '2023-09-13 02:00:13'),
(4, 'Pruple', '1695102375-1672575892-color_purple_web.webp', 'pruple', '2023-09-19 02:46:15', '2023-09-19 02:46:15'),
(5, 'Pink', '1695102389-1672575924-color_pink_web.webp', 'pink', '2023-09-19 02:46:29', '2023-09-19 02:46:29'),
(6, 'White', '1695102401-1672575916-color_white_web.webp', 'white', '2023-09-19 02:46:41', '2023-09-19 02:46:41'),
(7, 'Red', '1695102411-1672124360-color_red_web.webp', 'red', '2023-09-19 02:46:51', '2023-09-19 02:46:51'),
(8, 'Grey', '1695102426-1672276150-php2445tmp.webp', 'grey', '2023-09-19 02:47:06', '2023-09-19 02:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('Percentage','Fixed') NOT NULL,
  `amount` int(11) NOT NULL,
  `use_times` bigint(20) UNSIGNED DEFAULT NULL,
  `used_times` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `minimum_purchases` decimal(11,2) UNSIGNED DEFAULT NULL,
  `starts_at` date NOT NULL,
  `expires_at` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `amount`, `use_times`, `used_times`, `minimum_purchases`, `starts_at`, `expires_at`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'app', 'Percentage', 10, 100, 4, 100.00, '2023-09-03', '2025-12-19', 1, NULL, '2023-09-03 08:46:49', '2023-10-22 10:12:32'),
(2, 'cod', 'Percentage', 30, 50, 2, 100.00, '2023-09-09', '2023-09-23', 1, NULL, '2023-09-09 10:02:42', '2023-09-21 08:43:19');

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

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(3, 'default', '{\"uuid\":\"a91b5ffd-2ee4-4e74-9b91-4ae89e8b0181\",\"displayName\":\"App\\\\Mail\\\\WelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:20:\\\"App\\\\Mail\\\\WelcomeMail\\\":3:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"tur.1i@hotmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1695269857-4508-658783627\",\"clockwork_parent_id\":\"1695269856-9641-854410945\"}', 0, NULL, 1695269857, 1695269857),
(4, 'default', '{\"uuid\":\"d360d0f4-5cf1-4de4-90b7-3f11927f5b51\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:5;s:7:\\\"address\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:9:\\\"full_name\\\";s:19:\\\"turki noman alharbi\\\";s:4:\\\"city\\\";s:29:\\\"المدينة المنورة\\\";s:6:\\\"street\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:12:\\\"phone_number\\\";s:13:\\\"1223232323232\\\";s:8:\\\"order_id\\\";i:9;}s:13:\\\"orderProducts\\\";a:1:{i:0;a:8:{s:8:\\\"order_id\\\";i:9;s:12:\\\"product_name\\\";s:37:\\\"Chicago Bulls Essential Fleece Hoodie\\\";s:12:\\\"product_slug\\\";s:37:\\\"chicago-bulls-essential-fleece-hoodie\\\";s:13:\\\"product_image\\\";s:93:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-9\\/1695182285-1-mobile-web-catalodgdfgdg.png\\\";s:13:\\\"product_price\\\";s:6:\\\"368.00\\\";s:16:\\\"product_quantity\\\";i:2;s:11:\\\"total_price\\\";s:6:\\\"736.00\\\";s:18:\\\"product_attributes\\\";s:27:\\\"{\\\"brand\\\":\\\"Nike\\\",\\\"size\\\":\\\"S\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:5:\\\"email\\\";s:18:\\\"tur.1i@hotmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"tur.1i@hotmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1695274504-9710-1027813910\",\"clockwork_parent_id\":\"1695274504-7436-1138831827\"}', 0, NULL, 1695274504, 1695274504),
(5, 'default', '{\"uuid\":\"221c62bc-5b0d-474e-8976-3110677534c7\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:5;s:7:\\\"address\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:9:\\\"full_name\\\";s:19:\\\"turki noman alharbi\\\";s:4:\\\"city\\\";s:29:\\\"المدينة المنورة\\\";s:6:\\\"street\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:12:\\\"phone_number\\\";s:13:\\\"1223232323232\\\";s:8:\\\"order_id\\\";i:10;}s:13:\\\"orderProducts\\\";a:2:{i:0;a:8:{s:8:\\\"order_id\\\";i:10;s:12:\\\"product_name\\\";s:37:\\\"Chicago Bulls Essential Fleece Hoodie\\\";s:12:\\\"product_slug\\\";s:37:\\\"chicago-bulls-essential-fleece-hoodie\\\";s:13:\\\"product_image\\\";s:94:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-10\\/1695182285-1-mobile-web-catalodgdfgdg.png\\\";s:13:\\\"product_price\\\";s:6:\\\"368.00\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"368.00\\\";s:18:\\\"product_attributes\\\";s:28:\\\"{\\\"brand\\\":\\\"Nike\\\",\\\"size\\\":\\\"XS\\\"}\\\";}i:1;a:8:{s:8:\\\"order_id\\\";i:10;s:12:\\\"product_name\\\";s:34:\\\"Airflex+ Light Wash Slim Fit Jeans\\\";s:12:\\\"product_slug\\\";s:33:\\\"airflex-light-wash-slim-fit-jeans\\\";s:13:\\\"product_image\\\";s:96:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-10\\/1695182727-1-mobile-web-catalogspkrgd;l.png\\\";s:13:\\\"product_price\\\";s:6:\\\"256.80\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"256.80\\\";s:18:\\\"product_attributes\\\";s:37:\\\"{\\\"brand\\\":\\\"American Eagle\\\",\\\"size\\\":\\\"M\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:5:\\\"email\\\";s:18:\\\"tur.1i@hotmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"tur.1i@hotmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1695296599-4927-604831245\",\"clockwork_parent_id\":\"1695296599-2409-242858996\"}', 0, NULL, 1695296599, 1695296599),
(6, 'default', '{\"uuid\":\"267aeaa0-1d0f-4427-ab40-a6c39722781e\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:5;s:7:\\\"address\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:9:\\\"full_name\\\";s:19:\\\"turki noman alharbi\\\";s:4:\\\"city\\\";s:29:\\\"المدينة المنورة\\\";s:6:\\\"street\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:12:\\\"phone_number\\\";s:13:\\\"1223232323232\\\";s:8:\\\"order_id\\\";i:11;}s:13:\\\"orderProducts\\\";a:1:{i:0;a:8:{s:8:\\\"order_id\\\";i:11;s:12:\\\"product_name\\\";s:34:\\\"Airflex+ Light Wash Slim Fit Jeans\\\";s:12:\\\"product_slug\\\";s:33:\\\"airflex-light-wash-slim-fit-jeans\\\";s:13:\\\"product_image\\\";s:96:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-11\\/1695182727-1-mobile-web-catalogspkrgd;l.png\\\";s:13:\\\"product_price\\\";s:6:\\\"256.80\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"256.80\\\";s:18:\\\"product_attributes\\\";s:37:\\\"{\\\"brand\\\":\\\"American Eagle\\\",\\\"size\\\":\\\"M\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:5:\\\"email\\\";s:18:\\\"tur.1i@hotmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"tur.1i@hotmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1695296800-0062-1836497664\",\"clockwork_parent_id\":\"1695296799-7374-1346487661\"}', 0, NULL, 1695296800, 1695296800),
(7, 'default', '{\"uuid\":\"82f1f017-0962-4424-b973-a34bc71a3534\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:2;s:7:\\\"address\\\";s:20:\\\"Odio maxime assumend\\\";s:9:\\\"full_name\\\";s:15:\\\"turki n alharbi\\\";s:4:\\\"city\\\";s:18:\\\"Id quam voluptatem\\\";s:6:\\\"street\\\";s:19:\\\"Quia lorem nesciunt\\\";s:12:\\\"phone_number\\\";s:10:\\\"5529525933\\\";s:8:\\\"order_id\\\";i:12;}s:13:\\\"orderProducts\\\";a:2:{i:0;a:8:{s:8:\\\"order_id\\\";i:12;s:12:\\\"product_name\\\";s:34:\\\"Airflex+ Light Wash Slim Fit Jeans\\\";s:12:\\\"product_slug\\\";s:33:\\\"airflex-light-wash-slim-fit-jeans\\\";s:13:\\\"product_image\\\";s:96:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-12\\/1695182727-1-mobile-web-catalogspkrgd;l.png\\\";s:13:\\\"product_price\\\";s:6:\\\"256.80\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"256.80\\\";s:18:\\\"product_attributes\\\";s:38:\\\"{\\\"brand\\\":\\\"American Eagle\\\",\\\"size\\\":\\\"XS\\\"}\\\";}i:1;a:8:{s:8:\\\"order_id\\\";i:12;s:12:\\\"product_name\\\";s:25:\\\"Logo Crew Neck Sweatshirt\\\";s:12:\\\"product_slug\\\";s:25:\\\"logo-crew-neck-sweatshirt\\\";s:13:\\\"product_image\\\";s:104:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-12\\/1695182121-1-mobile-web-catalogdflgkdflfgjdflgd.png\\\";s:13:\\\"product_price\\\";s:6:\\\"392.40\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"392.40\\\";s:18:\\\"product_attributes\\\";s:35:\\\"{\\\"brand\\\":\\\"Calvin Klein\\\",\\\"size\\\":\\\"M\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:13:\\\"Turki Alharbi\\\";s:5:\\\"email\\\";s:22:\\\"alharbi.tur1@gmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:22:\\\"alharbi.tur1@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1696320949-0873-148087234\",\"clockwork_parent_id\":\"1696320946-6093-1833789746\"}', 0, NULL, 1696320949, 1696320949),
(8, 'default', '{\"uuid\":\"8de74425-084c-4955-ac31-1b144787c0d6\",\"displayName\":\"App\\\\Mail\\\\WelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:20:\\\"App\\\\Mail\\\\WelcomeMail\\\":3:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"tur.1i@hotmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1696598736-7516-230825425\",\"clockwork_parent_id\":\"1696598734-5168-653852155\"}', 0, NULL, 1696598736, 1696598736),
(9, 'default', '{\"uuid\":\"56adcf84-8b26-4a8d-a476-ac1da3e017b8\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:6;s:7:\\\"address\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:9:\\\"full_name\\\";s:13:\\\"turki alharbi\\\";s:4:\\\"city\\\";s:29:\\\"المدينة المنورة\\\";s:6:\\\"street\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:12:\\\"phone_number\\\";s:10:\\\"0552952593\\\";s:8:\\\"order_id\\\";i:13;}s:13:\\\"orderProducts\\\";a:1:{i:0;a:8:{s:8:\\\"order_id\\\";i:13;s:12:\\\"product_name\\\";s:34:\\\"Airflex+ Light Wash Slim Fit Jeans\\\";s:12:\\\"product_slug\\\";s:33:\\\"airflex-light-wash-slim-fit-jeans\\\";s:13:\\\"product_image\\\";s:98:\\\"http:\\/\\/192.168.1.8:8000\\/storage\\/images\\/orders\\/order-13\\/1695182727-1-mobile-web-catalogspkrgd;l.png\\\";s:13:\\\"product_price\\\";s:6:\\\"256.80\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"256.80\\\";s:18:\\\"product_attributes\\\";s:37:\\\"{\\\"brand\\\":\\\"American Eagle\\\",\\\"size\\\":\\\"S\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:5:\\\"email\\\";s:18:\\\"tur.1i@hotmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"tur.1i@hotmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1696609463-6041-1913316270\",\"clockwork_parent_id\":\"1696609463-0524-268054904\"}', 0, NULL, 1696609463, 1696609463),
(10, 'default', '{\"uuid\":\"30d748e5-4de3-470f-88bf-167a335b8a79\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:6;s:7:\\\"address\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:9:\\\"full_name\\\";s:13:\\\"turki alharbi\\\";s:4:\\\"city\\\";s:29:\\\"المدينة المنورة\\\";s:6:\\\"street\\\";s:28:\\\"Alzubair Ibn al Awwam street\\\";s:12:\\\"phone_number\\\";s:10:\\\"0552952593\\\";s:8:\\\"order_id\\\";i:14;}s:13:\\\"orderProducts\\\";a:1:{i:0;a:8:{s:8:\\\"order_id\\\";i:14;s:12:\\\"product_name\\\";s:20:\\\"Classic Bos Backpack\\\";s:12:\\\"product_slug\\\";s:20:\\\"classic-bos-backpack\\\";s:13:\\\"product_image\\\";s:93:\\\"http:\\/\\/192.168.1.8:8000\\/storage\\/images\\/orders\\/order-14\\/1695111675-1-mobile-web-sfscatalog.png\\\";s:13:\\\"product_price\\\";s:6:\\\"207.00\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"207.00\\\";s:18:\\\"product_attributes\\\";s:40:\\\"{\\\"brand\\\":\\\"Adidas Originals\\\",\\\"size\\\":\\\"OS\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:5:\\\"email\\\";s:18:\\\"tur.1i@hotmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"tur.1i@hotmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1696610978-1243-799553697\",\"clockwork_parent_id\":\"1696610977-9790-484449612\"}', 0, NULL, 1696610978, 1696610978),
(11, 'default', '{\"uuid\":\"85932c70-7d6e-4b66-bc1d-3248a7814c52\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:7;s:7:\\\"address\\\";s:19:\\\"Velit delectus amet\\\";s:9:\\\"full_name\\\";s:16:\\\"Carolyn Holloway\\\";s:4:\\\"city\\\";s:20:\\\"Qui autem tempora se\\\";s:6:\\\"street\\\";s:20:\\\"Aperiam ratione id a\\\";s:12:\\\"phone_number\\\";s:11:\\\"35005005050\\\";s:8:\\\"order_id\\\";i:15;}s:13:\\\"orderProducts\\\";a:1:{i:0;a:8:{s:8:\\\"order_id\\\";i:15;s:12:\\\"product_name\\\";s:32:\\\"Essential Logo Fleece Sweatpants\\\";s:12:\\\"product_slug\\\";s:32:\\\"essential-logo-fleece-sweatpants\\\";s:13:\\\"product_image\\\";s:100:\\\"http:\\/\\/192.168.1.8:8000\\/storage\\/images\\/orders\\/order-15\\/1695182590-1-mobile-web-catalogfsfsfsfsds.png\\\";s:13:\\\"product_price\\\";s:6:\\\"136.00\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"136.00\\\";s:18:\\\"product_attributes\\\";s:27:\\\"{\\\"brand\\\":\\\"Puma\\\",\\\"size\\\":\\\"S\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:5:\\\"email\\\";s:18:\\\"tur.1i@hotmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"tur.1i@hotmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1696724047-1939-1034182638\",\"clockwork_parent_id\":\"1696724044-4105-376061647\"}', 0, NULL, 1696724047, 1696724047),
(12, 'default', '{\"uuid\":\"0e2d99b6-c700-4740-a46c-027094501183\",\"displayName\":\"App\\\\Mail\\\\WelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:20:\\\"App\\\\Mail\\\\WelcomeMail\\\":3:{s:4:\\\"name\\\";s:6:\\\"august\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:16:\\\"august@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1696909472-3368-2128284862\",\"clockwork_parent_id\":\"1696909470-0345-89565507\"}', 0, NULL, 1696909472, 1696909472),
(13, 'default', '{\"uuid\":\"f5e2da46-70d1-4fde-bfbb-359687b80700\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:8;s:7:\\\"address\\\";s:20:\\\"Voluptatem qui offic\\\";s:9:\\\"full_name\\\";s:6:\\\"august\\\";s:4:\\\"city\\\";s:20:\\\"Voluptates repudiand\\\";s:6:\\\"street\\\";s:19:\\\"Veritatis id eu aut\\\";s:12:\\\"phone_number\\\";s:11:\\\"25656323232\\\";s:8:\\\"order_id\\\";i:16;}s:13:\\\"orderProducts\\\";a:2:{i:0;a:8:{s:8:\\\"order_id\\\";i:16;s:12:\\\"product_name\\\";s:37:\\\"Chicago Bulls Essential Fleece Hoodie\\\";s:12:\\\"product_slug\\\";s:37:\\\"chicago-bulls-essential-fleece-hoodie\\\";s:13:\\\"product_image\\\";s:94:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-16\\/1695182285-1-mobile-web-catalodgdfgdg.png\\\";s:13:\\\"product_price\\\";s:6:\\\"368.00\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"368.00\\\";s:18:\\\"product_attributes\\\";s:27:\\\"{\\\"brand\\\":\\\"Nike\\\",\\\"size\\\":\\\"L\\\"}\\\";}i:1;a:8:{s:8:\\\"order_id\\\";i:16;s:12:\\\"product_name\\\";s:34:\\\"Airflex+ Light Wash Slim Fit Jeans\\\";s:12:\\\"product_slug\\\";s:33:\\\"airflex-light-wash-slim-fit-jeans\\\";s:13:\\\"product_image\\\";s:96:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-16\\/1695182727-1-mobile-web-catalogspkrgd;l.png\\\";s:13:\\\"product_price\\\";s:6:\\\"256.80\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"256.80\\\";s:18:\\\"product_attributes\\\";s:37:\\\"{\\\"brand\\\":\\\"American Eagle\\\",\\\"size\\\":\\\"S\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:6:\\\"august\\\";s:5:\\\"email\\\";s:16:\\\"august@gmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:16:\\\"august@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1696909795-9706-2013737364\",\"clockwork_parent_id\":\"1696909795-4645-1594550939\"}', 0, NULL, 1696909795, 1696909795),
(14, 'default', '{\"uuid\":\"fad36ea5-d1f6-4b97-9445-216300b737c5\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:8;s:7:\\\"address\\\";s:20:\\\"Voluptatem qui offic\\\";s:9:\\\"full_name\\\";s:6:\\\"august\\\";s:4:\\\"city\\\";s:20:\\\"Voluptates repudiand\\\";s:6:\\\"street\\\";s:19:\\\"Veritatis id eu aut\\\";s:12:\\\"phone_number\\\";s:11:\\\"25656323232\\\";s:8:\\\"order_id\\\";i:17;}s:13:\\\"orderProducts\\\";a:4:{i:0;a:8:{s:8:\\\"order_id\\\";i:17;s:12:\\\"product_name\\\";s:32:\\\"Essential Logo Fleece Sweatpants\\\";s:12:\\\"product_slug\\\";s:32:\\\"essential-logo-fleece-sweatpants\\\";s:13:\\\"product_image\\\";s:98:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-17\\/1695182590-1-mobile-web-catalogfsfsfsfsds.png\\\";s:13:\\\"product_price\\\";s:6:\\\"136.00\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"136.00\\\";s:18:\\\"product_attributes\\\";s:28:\\\"{\\\"brand\\\":\\\"Puma\\\",\\\"size\\\":\\\"XS\\\"}\\\";}i:1;a:8:{s:8:\\\"order_id\\\";i:17;s:12:\\\"product_name\\\";s:20:\\\"Air Force 1 \'07 An21\\\";s:12:\\\"product_slug\\\";s:19:\\\"air-force-1-07-an21\\\";s:13:\\\"product_image\\\";s:101:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-17\\/1695117206-1-mobile-web-catalogefsfsfsfsfdfs.png\\\";s:13:\\\"product_price\\\";s:6:\\\"523.20\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"523.20\\\";s:18:\\\"product_attributes\\\";s:28:\\\"{\\\"brand\\\":\\\"Nike\\\",\\\"size\\\":\\\"41\\\"}\\\";}i:2;a:8:{s:8:\\\"order_id\\\";i:17;s:12:\\\"product_name\\\";s:17:\\\"Mesh-Back T-Shirt\\\";s:12:\\\"product_slug\\\";s:17:\\\"mesh-back-t-shirt\\\";s:13:\\\"product_image\\\";s:86:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-17\\/1695181402-5-web-desktop-list.png\\\";s:13:\\\"product_price\\\";s:6:\\\"136.00\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"136.00\\\";s:18:\\\"product_attributes\\\";s:30:\\\"{\\\"brand\\\":\\\"Addidas\\\",\\\"size\\\":\\\"L\\\"}\\\";}i:3;a:8:{s:8:\\\"order_id\\\";i:17;s:12:\\\"product_name\\\";s:33:\\\"205814Fll60Ku Oversize Sunglasses\\\";s:12:\\\"product_slug\\\";s:33:\\\"205814fll60ku-oversize-sunglasses\\\";s:13:\\\"product_image\\\";s:93:\\\"http:\\/\\/localhost:8000\\/storage\\/images\\/orders\\/order-17\\/1695117606-1-mobile-web-catalogefsff.png\\\";s:13:\\\"product_price\\\";s:6:\\\"488.70\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"488.70\\\";s:18:\\\"product_attributes\\\";s:38:\\\"{\\\"brand\\\":\\\"Tommy Hilfiger\\\",\\\"size\\\":\\\"OS\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:6:\\\"august\\\";s:5:\\\"email\\\";s:16:\\\"august@gmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:16:\\\"august@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1696909906-2230-394380154\",\"clockwork_parent_id\":\"1696909905-9213-1107103632\"}', 0, NULL, 1696909906, 1696909906),
(15, 'default', '{\"uuid\":\"d399dcaa-ee33-4057-9dbb-3bf830def260\",\"displayName\":\"App\\\\Mail\\\\WelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:20:\\\"App\\\\Mail\\\\WelcomeMail\\\":3:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"alhardsfsfsbi.tur1@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1697429351-4502-527630419\",\"clockwork_parent_id\":\"1697429351-0153-844080554\"}', 0, NULL, 1697429351, 1697429351),
(16, 'default', '{\"uuid\":\"3dbd1e49-c226-4102-b345-5843056e0afa\",\"displayName\":\"App\\\\Mail\\\\WelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:20:\\\"App\\\\Mail\\\\WelcomeMail\\\":3:{s:4:\\\"name\\\";s:13:\\\"turki alharbi\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:32:\\\"alhardfcddsfsfsbi.tur1@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1697429401-7453-1255423162\",\"clockwork_parent_id\":\"1697429401-3366-2133668448\"}', 0, NULL, 1697429401, 1697429401),
(17, 'default', '{\"uuid\":\"5e96c510-e37a-4bb1-92cc-3fc7b45b1b2a\",\"displayName\":\"App\\\\Mail\\\\WelcomeMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:20:\\\"App\\\\Mail\\\\WelcomeMail\\\":3:{s:4:\\\"name\\\";s:5:\\\"tukri\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:36:\\\"alharedfsdfcddsfsfsbi.tur1@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1697432657-5613-1721070930\",\"clockwork_parent_id\":\"1697432657-0829-1862897187\"}', 0, NULL, 1697432657, 1697432657),
(18, 'default', '{\"uuid\":\"ae4bfaa5-cf09-455b-8a45-d288f2dedfa7\",\"displayName\":\"App\\\\Mail\\\\NewOrderMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\NewOrderMail\\\":6:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"App\\\\Modules\\\\Orders\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:15:\\\"shippingAddress\\\";a:7:{s:10:\\\"address_id\\\";i:8;s:7:\\\"address\\\";s:20:\\\"Voluptatem qui offic\\\";s:9:\\\"full_name\\\";s:6:\\\"august\\\";s:4:\\\"city\\\";s:20:\\\"Voluptates repudiand\\\";s:6:\\\"street\\\";s:19:\\\"Veritatis id eu aut\\\";s:12:\\\"phone_number\\\";s:11:\\\"25656323232\\\";s:8:\\\"order_id\\\";i:18;}s:13:\\\"orderProducts\\\";a:1:{i:0;a:8:{s:8:\\\"order_id\\\";i:18;s:12:\\\"product_name\\\";s:34:\\\"Airflex+ Light Wash Slim Fit Jeans\\\";s:12:\\\"product_slug\\\";s:33:\\\"airflex-light-wash-slim-fit-jeans\\\";s:13:\\\"product_image\\\";s:98:\\\"http:\\/\\/192.168.1.6:8000\\/storage\\/images\\/orders\\/order-18\\/1695182727-1-mobile-web-catalogspkrgd;l.png\\\";s:13:\\\"product_price\\\";s:6:\\\"256.80\\\";s:16:\\\"product_quantity\\\";i:1;s:11:\\\"total_price\\\";s:6:\\\"256.80\\\";s:18:\\\"product_attributes\\\";s:37:\\\"{\\\"brand\\\":\\\"American Eagle\\\",\\\"size\\\":\\\"S\\\"}\\\";}}s:4:\\\"user\\\";a:2:{s:4:\\\"name\\\";s:6:\\\"august\\\";s:5:\\\"email\\\";s:16:\\\"august@gmail.com\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:16:\\\"august@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"},\"clockwork_id\":\"1697969553-3378-9865813\",\"clockwork_parent_id\":\"1697969552-1329-2109073044\"}', 0, NULL, 1697969553, 1697969553);

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
(5, '2022_10_28_190211_create_categories_table', 1),
(6, '2022_12_16_152718_create_colors_table', 1),
(7, '2022_12_16_223229_create_brands_table', 1),
(8, '2022_12_16_233842_create_sizes_table', 1),
(9, '2022_12_17_112549_create_coupons_table', 1),
(10, '2022_12_17_141848_create_user_addresses_table', 1),
(11, '2022_12_17_142303_create_roles_table', 1),
(12, '2022_12_17_200143_create_permissions_table', 1),
(13, '2022_12_17_200209_create_role_permission_table', 1),
(14, '2022_12_20_165639_create_products_table', 1),
(15, '2022_12_20_171026_create_product_categories_table', 1),
(16, '2022_12_20_171240_create_product_sizes_table', 1),
(17, '2022_12_20_171359_create_product_images_table', 1),
(18, '2022_12_31_063657_create_reviews_table', 1),
(19, '2023_01_01_190700_create_shopping_carts_table', 1),
(20, '2023_01_01_191310_create_wishlists_table', 1),
(21, '2023_01_03_160052_create_orders_table', 1),
(22, '2023_01_03_160218_create_order_products_table', 1),
(23, '2023_01_03_160245_create_order_addresses_table', 1),
(24, '2023_01_03_160302_create_order_coupons_table', 1),
(25, '2023_01_05_155108_create_banners_table', 1),
(26, '2023_08_24_113202_create_admins_table', 1),
(27, '2023_08_24_113204_create_admin_permission_table', 1),
(28, '2023_09_19_014149_create_jobs_table', 2),
(29, '2024_05_25_123632_add_admin_id_column_to_reviews_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Pending','Awaiting Payment','Partially Shipped','Completed','Shipped','Cancelled','Refunded') NOT NULL DEFAULT 'Pending',
  `shipping_fees` decimal(6,2) NOT NULL DEFAULT 0.00,
  `sub_total` decimal(18,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_addresses`
--

CREATE TABLE `order_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `street` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_coupons`
--

CREATE TABLE `order_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `discounted_amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_attributes`)),
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` decimal(6,2) DEFAULT NULL,
  `total_price` decimal(18,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `page_name`, `created_at`, `updated_at`) VALUES
(1, 'Create Brands', 'create-brands', 'brands', NULL, NULL),
(2, 'Update Brands', 'update-brands', 'brands', NULL, NULL),
(3, 'View Brands', 'view-brands', 'brands', NULL, NULL),
(4, 'Access Brands', 'access-brands', 'brands', NULL, NULL),
(5, 'Delete Brands', 'delete-brands', 'brands', NULL, NULL),
(6, 'Create Banners', 'create-banners', 'banners', NULL, NULL),
(7, 'Update Banners', 'update-banners', 'banners', NULL, NULL),
(8, 'View Banners', 'view-banners', 'banners', NULL, NULL),
(9, 'Access Banners', 'access-banners', 'banners', NULL, NULL),
(10, 'Delete Banners', 'delete-banners', 'banners', NULL, NULL),
(11, 'Create Admins', 'create-admins', 'admins', NULL, NULL),
(12, 'Update Admins', 'update-admins', 'admins', NULL, NULL),
(13, 'View Admins', 'view-admins', 'admins', NULL, NULL),
(14, 'Access Admins', 'access-admins', 'admins', NULL, NULL),
(15, 'Delete Admins', 'delete-admins', 'admins', NULL, NULL),
(16, 'Create Customers', 'create-customers', 'customers', NULL, NULL),
(17, 'Update Customers', 'update-customers', 'customers', NULL, NULL),
(18, 'View Customers', 'view-customers', 'customers', NULL, NULL),
(19, 'Access Customers', 'access-customers', 'customers', NULL, NULL),
(20, 'Delete Customers', 'delete-customers', 'customers', NULL, NULL),
(21, 'Create Roles', 'create-roles', 'roles', NULL, NULL),
(22, 'Update Roles', 'update-roles', 'roles', NULL, NULL),
(23, 'View Roles', 'view-roles', 'roles', NULL, NULL),
(24, 'Access Roles', 'access-roles', 'roles', NULL, NULL),
(25, 'Delete Roles', 'delete-roles', 'roles', NULL, NULL),
(26, 'Create Categories', 'create-categories', 'categories', NULL, NULL),
(27, 'Update Categories', 'update-categories', 'categories', NULL, NULL),
(28, 'View Categories', 'view-categories', 'categories', NULL, NULL),
(29, 'Access Categories', 'access-categories', 'categories', NULL, NULL),
(30, 'Delete Categories', 'delete-categories', 'categories', NULL, NULL),
(31, 'Create Products', 'create-products', 'products', NULL, NULL),
(32, 'Update Products', 'update-products', 'products', NULL, NULL),
(33, 'View Products', 'view-products', 'products', NULL, NULL),
(34, 'Access Products', 'access-products', 'products', NULL, NULL),
(35, 'Delete Products', 'delete-products', 'products', NULL, NULL),
(36, 'Create Colors', 'create-colors', 'colors', NULL, NULL),
(37, 'Update Colors', 'update-colors', 'colors', NULL, NULL),
(38, 'View Colors', 'view-colors', 'colors', NULL, NULL),
(39, 'Access Colors', 'access-colors', 'colors', NULL, NULL),
(40, 'Delete Colors', 'delete-colors', 'colors', NULL, NULL),
(41, 'Create Sizes', 'create-sizes', 'sizes', NULL, NULL),
(42, 'Update Sizes', 'update-sizes', 'sizes', NULL, NULL),
(43, 'View Sizes', 'view-sizes', 'sizes', NULL, NULL),
(44, 'Access Sizes', 'access-sizes', 'sizes', NULL, NULL),
(45, 'Delete Sizes', 'delete-sizes', 'sizes', NULL, NULL),
(46, 'Create Reviews', 'create-reviews', 'reviews', NULL, NULL),
(47, 'Update Reviews', 'update-reviews', 'reviews', NULL, NULL),
(48, 'View Reviews', 'view-reviews', 'reviews', NULL, NULL),
(49, 'Access Reviews', 'access-reviews', 'reviews', NULL, NULL),
(50, 'Delete Reviews', 'delete-reviews', 'reviews', NULL, NULL),
(51, 'Create Coupons', 'create-coupons', 'coupons', NULL, NULL),
(52, 'Update Coupons', 'update-coupons', 'coupons', NULL, NULL),
(53, 'View Coupons', 'view-coupons', 'coupons', NULL, NULL),
(54, 'Access Coupons', 'access-coupons', 'coupons', NULL, NULL),
(55, 'Delete Coupons', 'delete-coupons', 'coupons', NULL, NULL),
(56, 'Create Orders', 'create-orders', 'orders', NULL, NULL),
(57, 'Update Orders', 'update-orders', 'orders', NULL, NULL),
(58, 'View Orders', 'view-orders', 'orders', NULL, NULL),
(59, 'Access Orders', 'access-orders', 'orders', NULL, NULL),
(60, 'Delete Orders', 'delete-orders', 'orders', NULL, NULL),
(61, 'Create Orders Status', 'create-orders-status', 'orders status', NULL, NULL),
(62, 'Update Orders Status', 'update-orders-status', 'orders status', NULL, NULL),
(63, 'View Orders Status', 'view-orders-status', 'orders status', NULL, NULL),
(64, 'Access Orders Status', 'access-orders-status', 'orders status', NULL, NULL),
(65, 'Delete Orders Status', 'delete-orders-status', 'orders status', NULL, NULL),
(66, 'Create Dashboard', 'create-dashboard', 'dashboard', NULL, NULL),
(67, 'Update Dashboard', 'update-dashboard', 'dashboard', NULL, NULL),
(68, 'View Dashboard', 'view-dashboard', 'dashboard', NULL, NULL),
(69, 'Access Dashboard', 'access-dashboard', 'dashboard', NULL, NULL),
(70, 'Delete Dashboard', 'delete-dashboard', 'dashboard', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `info_and_care` text DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `shipping_cost` decimal(6,2) DEFAULT 0.00,
  `discount_amount` int(11) DEFAULT NULL,
  `discount_type` enum('Percentage','Fixed') DEFAULT NULL,
  `discount_start_at` date DEFAULT NULL,
  `discount_expires_at` date DEFAULT NULL,
  `price_after_discount` decimal(6,2) DEFAULT NULL,
  `discount` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`discount`)),
  `stock` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `details`, `info_and_care`, `price`, `shipping_cost`, `discount_amount`, `discount_type`, `discount_start_at`, `discount_expires_at`, `price_after_discount`, `discount`, `stock`, `is_active`, `brand_id`, `color_id`, `created_at`, `updated_at`) VALUES
(4, 'Classic Bos Backpack', 'classic-bos-backpack', NULL, NULL, 230.00, 0.00, 10, 'Percentage', '2023-09-19', '2024-12-19', 207.00, '{\"price_after_discount\":207,\"type\":\"Percentage\",\"amount\":\"10\",\"start_at\":\"2023-09-19\",\"expires_at\":\"2024-12-19\"}', 3, 1, 10, 2, '2023-09-19 05:19:21', '2024-02-03 00:55:50'),
(5, 'Air Force 1 \'07 An21', 'air-force-1-07-an21', NULL, NULL, 654.00, 0.00, 20, 'Percentage', '2023-09-19', '2024-12-28', 523.20, '{\"price_after_discount\":523.2,\"type\":\"Percentage\",\"amount\":\"20\",\"start_at\":\"2023-09-19\",\"expires_at\":\"2024-12-28\"}', 13, 1, 7, 6, '2023-09-19 05:29:23', '2024-02-03 00:55:50'),
(6, 'Ultraboost 1.0', 'ultraboost-10', NULL, NULL, 763.00, 0.00, 15, 'Percentage', '2023-09-19', '2024-12-28', 648.55, '{\"price_after_discount\":648.55,\"type\":\"Percentage\",\"amount\":\"15\",\"start_at\":\"2023-09-19\",\"expires_at\":\"2024-12-28\"}', 10, 1, 8, 2, '2023-09-19 05:31:30', '2024-02-03 00:55:50'),
(7, 'Charged Assert 10', 'charged-assert-10', NULL, NULL, 342.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 8, 1, 17, 6, '2023-09-19 05:34:52', '2024-02-03 00:55:50'),
(8, '205814Fll60Ku Oversize Sunglasses', '205814fll60ku-oversize-sunglasses', NULL, NULL, 543.00, 0.00, 10, 'Percentage', '2023-09-19', '2024-12-21', 488.70, '{\"price_after_discount\":488.7,\"type\":\"Percentage\",\"amount\":\"10\",\"start_at\":\"2023-09-19\",\"expires_at\":\"2024-12-21\"}', 3653, 1, 18, 1, '2023-09-19 05:36:20', '2024-02-03 00:55:50'),
(9, 'Logo Toiletry Bag', 'logo-toiletry-bag', NULL, NULL, 365.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 1, 1, 16, 2, '2023-09-19 05:36:47', '2024-02-03 00:55:50'),
(10, 'Adicolor 3 Stripe Classics T-Shirt', 'adicolor-3-stripe-classics-t-shirt', NULL, NULL, 230.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 12, 1, 10, 6, '2023-09-19 06:49:52', '2024-02-03 00:55:50'),
(11, 'Mesh-Back T-Shirt', 'mesh-back-t-shirt', NULL, NULL, 136.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 8, 1, 8, 6, '2023-09-19 06:51:12', '2024-02-03 00:55:50'),
(12, 'Nsw Icon Futura T-Shirt', 'nsw-icon-futura-t-shirt', NULL, NULL, 167.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 5, 1, 7, 1, '2023-09-20 00:44:51', '2024-02-03 00:55:50'),
(13, 'Adicolor 3 Stripe Classics T-Shirt', 'adicolor-3-stripe-classics-t-shirt-pJ-88-s', NULL, NULL, 242.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 5, 1, 10, 2, '2023-09-20 00:46:41', '2024-02-03 00:55:50'),
(14, 'Project Rock Iron Muscle Tank', 'project-rock-iron-muscle-tank', NULL, NULL, 356.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 15, 1, 17, 1, '2023-09-20 00:46:50', '2024-02-03 00:55:50'),
(15, 'Teamgoal 23 Causals Hoodie', 'teamgoal-23-causals-hoodie', NULL, NULL, 423.00, 0.00, 10, 'Percentage', '2023-09-20', '2024-12-06', 380.70, '{\"price_after_discount\":380.7,\"type\":\"Percentage\",\"amount\":\"10\",\"start_at\":\"2023-09-20\",\"expires_at\":\"2024-12-06\"}', 5, 1, 9, 2, '2023-09-20 00:49:57', '2024-02-03 00:55:50'),
(16, 'Essential Sweatshirt', 'essential-sweatshirt', NULL, NULL, 341.00, 0.00, 15, 'Percentage', '2023-09-20', '2025-01-04', 289.85, '{\"price_after_discount\":289.85,\"type\":\"Percentage\",\"amount\":\"15\",\"start_at\":\"2023-09-20\",\"expires_at\":\"2025-01-04\"}', 10, 1, 18, 2, '2023-09-20 00:50:01', '2024-02-03 00:55:50'),
(17, 'Logo Crew Neck Sweatshirt', 'logo-crew-neck-sweatshirt', NULL, NULL, 436.00, 0.00, 10, 'Percentage', '2023-09-20', '2024-12-27', 392.40, '{\"price_after_discount\":392.4,\"type\":\"Percentage\",\"amount\":\"10\",\"start_at\":\"2023-09-20\",\"expires_at\":\"2024-12-27\"}', 14, 1, 13, 2, '2023-09-20 00:50:03', '2024-02-03 00:55:50'),
(18, 'Air Fleece Sweatshirt', 'air-fleece-sweatshirt', NULL, NULL, 463.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 15, 1, 7, 8, '2023-09-20 00:56:12', '2024-02-03 00:55:50'),
(19, 'Chicago Bulls Essential Fleece Hoodie', 'chicago-bulls-essential-fleece-hoodie', NULL, NULL, 368.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 5, 1, 7, 7, '2023-09-20 00:56:59', '2024-02-03 00:55:50'),
(20, 'Nsw Repeat Swoosh Fleece Cargo', 'nsw-repeat-swoosh-fleece-cargo', NULL, NULL, 233.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 9, 1, 7, 7, '2023-09-20 01:00:56', '2024-02-03 00:55:50'),
(21, 'Essential Logo Fleece Sweatpants', 'essential-logo-fleece-sweatpants', NULL, NULL, 136.00, 0.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 16, 1, 9, 1, '2023-09-20 01:01:46', '2024-02-03 00:55:50'),
(23, 'Airflex+ Light Wash Slim Fit Jeans', 'airflex-light-wash-slim-fit-jeans', NULL, NULL, 233.00, 903.00, NULL, NULL, NULL, NULL, NULL, '{\"price_after_discount\":null,\"type\":null,\"amount\":null,\"start_at\":null,\"expires_at\":null}', 6, 0, 8, 1, '2023-10-18 11:31:22', '2024-02-03 00:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(4, 3),
(4, 8),
(9, 3),
(9, 8),
(5, 3),
(5, 7),
(5, 19),
(6, 3),
(6, 7),
(6, 19),
(7, 3),
(7, 7),
(7, 20),
(8, 3),
(8, 6),
(8, 22),
(10, 3),
(10, 5),
(11, 3),
(11, 5),
(11, 12),
(12, 3),
(12, 5),
(12, 12),
(10, 12),
(13, 3),
(13, 5),
(13, 12),
(14, 3),
(14, 5),
(14, 10),
(14, 13),
(15, 3),
(15, 5),
(15, 9),
(15, 14),
(16, 3),
(16, 5),
(16, 9),
(16, 15),
(17, 3),
(17, 5),
(17, 9),
(18, 3),
(18, 5),
(18, 9),
(19, 3),
(19, 5),
(19, 9),
(19, 14),
(18, 15),
(17, 15),
(20, 3),
(20, 5),
(20, 16),
(20, 18),
(21, 3),
(21, 5),
(21, 16),
(21, 18),
(23, 3),
(23, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_main_image` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `is_main_image`) VALUES
(12, 4, '1695111675-1-mobile-web-sfscatalog.png', 1),
(13, 9, '1695116982-1-mobile-web-catalogdofgjdfkg.png', 1),
(14, 5, '1695117206-1-mobile-web-catalogefsfsfsfsfdfs.png', 1),
(15, 6, '1695117316-1-mobile-web-cataloggdgdfdfd.png', 1),
(16, 7, '1695117442-1-mobile-web-catalogsdfddfdfd.png', 1),
(17, 8, '1695117606-1-mobile-web-catalogefsff.png', 1),
(18, 10, '1695181052-1-mobile-web-cataloggddfdf.png', 1),
(19, 11, '1695181402-5-web-desktop-list.png', 1),
(20, 12, '1695181580-1-mobile-web-cataloggfggdllg.png', 1),
(21, 13, '1695181677-1-mobile-web-catalogfgdfgdgd.png', 1),
(22, 14, '1695181754-1-mobile-web-catalogsgrdfljgdf.png', 1),
(23, 15, '1695181895-1-mobile-web-cataloglfjdldfddf.png', 1),
(24, 16, '1695181996-1-mobile-web-cataloglskdfflsks.png', 1),
(25, 17, '1695182121-1-mobile-web-catalogdflgkdflfgjdflgd.png', 1),
(26, 18, '1695182215-1-mobile-web-catalogdflkgdf.png', 1),
(27, 19, '1695182285-1-mobile-web-catalodgdfgdg.png', 1),
(28, 20, '1695182498-1-mobile-web-catalogddfgpo.png', 1),
(29, 21, '1695182590-1-mobile-web-catalogfsfsfsfsds.png', 1),
(54, 23, '6568fbd42cb23_8e3d74f16769ef31.png', 0),
(55, 23, '6568fbd42f5bd_75b0ced1c3a9dea0.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `stock`) VALUES
(6, 4, 6, 3),
(7, 9, 6, 1),
(8, 5, 3, 2),
(9, 5, 9, 3),
(10, 5, 4, 5),
(11, 5, 5, 3),
(12, 6, 3, 3),
(13, 6, 4, 4),
(14, 6, 5, 3),
(15, 7, 9, 2),
(16, 7, 4, 6),
(17, 8, 6, 3653),
(18, 10, 1, 3),
(19, 10, 2, 2),
(20, 10, 8, 1),
(21, 10, 7, 6),
(22, 11, 2, 6),
(23, 11, 7, 2),
(24, 12, 1, 3),
(25, 12, 2, 2),
(26, 13, 2, 3),
(27, 13, 1, 2),
(28, 14, 1, 9),
(29, 14, 2, 3),
(30, 14, 8, 3),
(31, 15, 1, 3),
(32, 15, 2, 2),
(33, 16, 2, 5),
(34, 16, 8, 3),
(35, 16, 1, 2),
(36, 17, 1, 3),
(37, 17, 2, 5),
(38, 17, 8, 6),
(39, 18, 1, 6),
(40, 18, 7, 9),
(41, 19, 1, 3),
(42, 19, 7, 1),
(43, 19, 8, 1),
(44, 20, 1, 3),
(45, 20, 8, 6),
(46, 21, 1, 5),
(47, 21, 8, 2),
(48, 21, 2, 9),
(52, 23, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Content Editor', 'content-editor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'S', 's', '2023-09-03 06:47:15', '2023-09-03 06:47:15'),
(2, 'M', 'm', '2023-09-09 09:30:33', '2023-09-09 09:30:33'),
(3, '40', '40', '2023-09-19 05:14:16', '2023-09-19 05:14:16'),
(4, '41', '41', '2023-09-19 05:14:21', '2023-09-19 05:14:21'),
(5, '42', '42', '2023-09-19 05:14:26', '2023-09-19 05:14:26'),
(6, 'OS', 'os', '2023-09-19 05:14:32', '2023-09-19 05:14:32'),
(7, 'L', 'l', '2023-09-19 05:14:39', '2023-09-19 05:14:39'),
(8, 'XS', 'xs', '2023-09-19 05:14:47', '2023-09-19 05:14:47'),
(9, '39', '39', '2023-09-19 05:15:01', '2023-09-19 05:15:01'),
(10, 'MODL', 'rgdf', '2024-02-03 01:04:24', '2024-02-03 01:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `gender` enum('Female','Male') NOT NULL DEFAULT 'Male',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `street` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_role_id_foreign` (`role_id`);

--
-- Indexes for table `admin_permission`
--
ALTER TABLE `admin_permission`
  ADD KEY `admin_permission_admin_id_foreign` (`admin_id`),
  ADD KEY `admin_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_slug_index` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_section_id_foreign` (`section_id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_slug_index` (`slug`),
  ADD KEY `categories_url_index` (`url`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_slug_index` (`slug`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_addresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_coupons`
--
ALTER TABLE `order_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_coupons_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`),
  ADD KEY `permissions_page_name_index` (`page_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`),
  ADD KEY `product_sizes_size_id_foreign` (`size_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_review_id_foreign` (`review_id`),
  ADD KEY `reviews_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_name_index` (`name`),
  ADD KEY `roles_slug_index` (`slug`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_user_id_foreign` (`user_id`),
  ADD KEY `shopping_carts_product_id_foreign` (`product_id`),
  ADD KEY `shopping_carts_size_id_foreign` (`size_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`),
  ADD UNIQUE KEY `sizes_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_addresses`
--
ALTER TABLE `order_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_coupons`
--
ALTER TABLE `order_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `admin_permission`
--
ALTER TABLE `admin_permission`
  ADD CONSTRAINT `admin_permission_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD CONSTRAINT `order_addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_coupons`
--
ALTER TABLE `order_coupons`
  ADD CONSTRAINT `order_coupons_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
