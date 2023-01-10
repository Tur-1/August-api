-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 08:21 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `full_name`, `address`, `city`, `phone_number`, `street`, `created_at`, `updated_at`) VALUES
(9, 10, 'turki alharbi', 'In consequatur id', 'Ducimus nisi autem', '0552952593', 'Do assumenda ducimus', '2023-01-03 12:25:15', '2023-01-10 16:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `type` enum('small','medium','large') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `link`, `is_active`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Dfgdfgdfg', '1672949301-slide_1.webp', '#', 1, 'large', '2023-01-05 17:08:21', '2023-01-05 17:48:26'),
(3, 'Dsfsdf', '1672951722-slide_page1_2.webp', '#', 1, 'large', '2023-01-05 17:48:42', '2023-01-05 17:48:42'),
(4, '...', '1672951877-download.webp', '#', 1, 'medium', '2023-01-05 17:51:17', '2023-01-05 17:51:17'),
(5, '..', '1672951891-module_01_en_3.webp', '#', 1, 'medium', '2023-01-05 17:51:31', '2023-01-05 17:51:31'),
(6, '...K', '1672951901-module_01_en_2.webp', '#', 1, 'medium', '2023-01-05 17:51:41', '2023-01-05 17:51:41'),
(7, '...', '1672951923-module_01_en_4.webp', '#', 1, 'medium', '2023-01-05 17:52:03', '2023-01-05 17:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Nike', '1672124331-nike.webp', 'nike', NULL, '2022-12-27 03:58:51'),
(3, 'Addidas', '1672124344-adidas.webp', 'addidas', '2022-12-27 03:59:04', '2022-12-27 03:59:04'),
(4, 'Fila', '1672575965-fila.webp', 'fila', '2023-01-01 09:26:05', '2023-01-01 09:26:05'),
(5, 'Guess', '1672575979-guess.webp', 'guess', '2023-01-01 09:26:19', '2023-01-01 09:26:19'),
(7, 'Womens Best', '1672576006-womens_best.webp', 'womens-best', '2023-01-01 09:26:46', '2023-01-01 09:26:56'),
(8, 'Tommy Hilfiger', '1672576035-tommy_hilfiger.webp', 'tommy-hilfiger', '2023-01-01 09:27:15', '2023-01-01 09:27:15'),
(9, 'Puma', '1672576044-puma.webp', 'puma', '2023-01-01 09:27:24', '2023-01-01 09:27:24'),
(10, 'Calvin Klein', '1672576061-calvin_klein.webp', 'calvin-klein', '2023-01-01 09:27:41', '2023-01-01 09:27:41'),
(11, 'Levis', '1672576081-levis.webp', 'levis', '2023-01-01 09:28:01', '2023-01-01 09:28:01'),
(12, 'Trendyol', '1672580105-trendyol.webp', 'trendyol', '2023-01-01 10:35:05', '2023-01-05 17:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `section_id`, `parent_id`, `parents_ids`, `is_section`, `is_active`, `created_at`, `updated_at`) VALUES
(9, 'Women', 'women', NULL, NULL, NULL, NULL, 1, 1, '2023-01-01 09:34:45', '2023-01-01 09:34:45'),
(10, 'Men', 'men', NULL, NULL, NULL, NULL, 1, 1, '2023-01-01 09:34:54', '2023-01-01 09:34:54'),
(11, 'Kids', 'kids', NULL, NULL, NULL, NULL, 1, 1, '2023-01-01 09:34:59', '2023-01-01 09:34:59'),
(12, 'Clothing', 'women-clothing', '1673102442-screenshot_2021_10_28_044257.webp', 9, 9, '[9]', 0, 1, '2023-01-01 09:35:13', '2023-01-07 11:40:42'),
(13, 'Accessories', 'women-accessories', '1673102461-screenshot_2022_02_18_140238.webp', 9, 9, '[9]', 0, 1, '2023-01-01 09:35:42', '2023-01-07 11:41:01'),
(14, 'Bags', 'women-bags', '1673102473-screenshot_2021_10_14_144458.webp', 9, 9, '[9]', 0, 1, '2023-01-01 09:35:51', '2023-01-07 11:41:13'),
(15, 'Shoes', 'women-shoes', '1673102486-screenshot_2021_10_14_144424.webp', 9, 9, '[9]', 0, 1, '2023-01-01 09:35:59', '2023-01-07 11:41:26'),
(16, 'Dresses', 'women-clothing-dresses', '1672576602-screenshot_2021_10_14_142550.webp', 9, 12, '[9,12]', 0, 1, '2023-01-01 09:36:42', '2023-01-01 09:36:42'),
(17, 'Tops', 'women-clothing-tops', '1672576630-screenshot_2021_10_28_051013.webp', 9, 12, '[9,12]', 0, 1, '2023-01-01 09:37:10', '2023-01-01 09:37:10'),
(18, 'Pants & Leggings', 'women-clothing-pants_leggings', '1672576720-screenshot_2023_01_01_153828.webp', 9, 12, '[9,12]', 0, 1, '2023-01-01 09:38:40', '2023-01-01 09:38:40'),
(19, 'T-Shirts & Vests', 'women-clothing-t_shirts_vests', '1672576743-screenshot_2021_10_28_042743.webp', 9, 12, '[9,12]', 0, 1, '2023-01-01 09:39:03', '2023-01-01 09:39:03'),
(20, 'Hoodies & Sweatshirts', 'women-clothing-hoodies_sweatshirts', '1672576763-screenshot_2021_10_28_043853.webp', 9, 12, '[9,12]', 0, 1, '2023-01-01 09:39:23', '2023-01-01 09:39:23'),
(21, 'Jackets & Coats', 'women-clothing-jackets_coats', '1672576782-screenshot_2021_10_28_042247.webp', 9, 12, '[9,12]', 0, 1, '2023-01-01 09:39:42', '2023-01-01 09:39:42'),
(22, 'Jeans', 'women-clothing-jeans', '1672576859-screenshot_2022_02_18_134819.webp', 9, 12, '[9,12]', 0, 1, '2023-01-01 09:40:59', '2023-01-01 09:40:59'),
(23, 'Clothing', 'men-clothing', '1673102412-screenshot_2022_08_13_104807.webp', 10, 10, '[10]', 0, 1, '2023-01-07 11:40:12', '2023-01-07 11:40:12'),
(24, 'T-Shirt And Visits', 'men-clothing-t_shirt_and_visits', '1673103163-screenshot_2021_10_14_145605.webp', 10, 23, '[10,23]', 0, 1, '2023-01-07 11:52:43', '2023-01-07 11:52:43'),
(25, 'Hoodies & Sweatshirts', 'men-clothing-hoodies_sweatshirts', '1673103188-screenshot_2021_10_14_145908.webp', 10, 23, '[10,23]', 0, 1, '2023-01-07 11:53:08', '2023-01-07 11:53:08'),
(26, 'Pants & Chinos', 'men-clothing-pants_chinos', '1673103212-screenshot_2021_10_14_145839.webp', 10, 23, '[10,23]', 0, 1, '2023-01-07 11:53:32', '2023-01-07 11:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Red', '1672124360-color_red_web.webp', 'red', '2022-12-22 18:03:35', '2022-12-27 03:59:20'),
(6, 'Grey', '1672276150-php2445tmp.webp', 'grey', '2022-12-28 22:09:10', '2022-12-28 22:09:10'),
(7, 'Green', '1672276347-color_green_web.webp', 'green', '2022-12-28 22:12:27', '2022-12-28 22:12:27'),
(8, 'Black', '1672276413-black.webp', 'black', '2022-12-28 22:13:33', '2022-12-28 22:13:33'),
(9, 'Purple', '1672575892-color_purple_web.webp', 'purple', '2023-01-01 09:24:52', '2023-01-01 09:24:52'),
(10, 'White', '1672575916-color_white_web.webp', 'white', '2023-01-01 09:25:16', '2023-01-01 09:25:16'),
(11, 'Pink', '1672575924-color_pink_web.webp', 'pink', '2023-01-01 09:25:24', '2023-01-01 09:25:24'),
(12, 'Navy', '1672575934-color_navy_web.webp', 'navy', '2023-01-01 09:25:34', '2023-01-01 09:25:34'),
(13, 'Blue', '1672575947-color_blue.webp', 'blue', '2023-01-01 09:25:47', '2023-01-01 09:25:47'),
(14, 'Bige', '1672580095-color_beige_web.webp', 'bige', '2023-01-01 10:34:55', '2023-01-01 10:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Percentage','Fixed') COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'august', 'Percentage', 20, 100, 8, '10.00', '2023-01-08', '2024-01-13', 1, NULL, '2023-01-03 09:55:03', '2023-01-10 16:20:52');

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
(5, '2022_10_28_190211_create_categories_table', 1),
(6, '2022_12_16_152718_create_colors_table', 1),
(7, '2022_12_16_223229_create_brands_table', 1),
(8, '2022_12_16_233842_create_sizes_table', 1),
(9, '2022_12_17_112549_create_coupons_table', 1),
(10, '2022_12_17_141848_create_addresses_table', 1),
(11, '2022_12_17_142303_create_roles_table', 1),
(12, '2022_12_17_142530_add_column_to_users_table', 1),
(13, '2022_12_17_200143_create_permissions_table', 1),
(14, '2022_12_17_200209_create_role_permissions_table', 1),
(15, '2022_12_17_200242_create_user_permission_table', 1),
(16, '2022_12_20_165639_create_products_table', 2),
(17, '2022_12_20_171026_create_product_categories_table', 2),
(18, '2022_12_20_171240_create_product_sizes_table', 3),
(19, '2022_12_20_171359_create_product_images_table', 3),
(20, '2022_12_31_063657_create_reviews_table', 4),
(21, '2023_01_01_190700_create_shopping_carts_table', 5),
(22, '2023_01_01_191310_create_wish_lists_table', 6),
(29, '2023_01_01_191310_create_wishlists_table', 7),
(30, '2023_01_03_160052_create_orders_table', 7),
(31, '2023_01_03_160218_create_order_products_table', 7),
(32, '2023_01_03_160245_create_order_addresses_table', 7),
(33, '2023_01_03_160302_create_order_coupons_table', 7),
(34, '2023_01_05_155108_create_banners_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Pending','Awaiting Payment','Partially Shipped','Completed','Shipped','Cancelled','Refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `shipping_fees` decimal(6,2) NOT NULL DEFAULT 0.00,
  `subTotal` decimal(18,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `shipping_fees`, `subTotal`, `total`, `created_at`, `updated_at`) VALUES
(91, 10, 'Pending', '0.00', '875.00', '805.00', '2023-01-05 09:18:20', '2023-01-05 09:18:20'),
(92, 10, 'Pending', '0.00', '714.00', '656.88', '2023-01-05 09:20:11', '2023-01-05 09:20:11'),
(93, 10, 'Pending', '0.00', '1118.00', '1028.56', '2023-01-07 12:09:50', '2023-01-07 12:09:50'),
(94, 10, 'Pending', '0.00', '1332.00', '1531.80', '2023-01-07 12:26:53', '2023-01-07 12:26:53'),
(95, 10, 'Pending', '0.00', '811.00', '746.12', '2023-01-10 16:16:06', '2023-01-10 16:16:06'),
(96, 10, 'Pending', '0.00', '803.00', '738.76', '2023-01-10 16:20:52', '2023-01-10 16:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_addresses`
--

CREATE TABLE `order_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `order_id`, `full_name`, `address`, `city`, `phone_number`, `street`, `created_at`, `updated_at`) VALUES
(7, 91, 'turki noman alharbi', 'In consequatur id', 'Ducimus nisi autem', '0552952593', 'Do assumenda ducimus', '2023-01-05 09:18:20', '2023-01-05 09:18:20'),
(8, 92, 'turki noman alharbi', 'In consequatur id', 'Ducimus nisi autem', '0552952593', 'Do assumenda ducimus', '2023-01-05 09:20:11', '2023-01-05 09:20:11'),
(9, 93, 'turki noman alharbi', 'In consequatur id', 'Ducimus nisi autem', '0552952593', 'Do assumenda ducimus', '2023-01-07 12:09:50', '2023-01-07 12:09:50'),
(10, 94, 'turki noman alharbi', 'In consequatur id', 'Ducimus nisi autem', '0552952593', 'Do assumenda ducimus', '2023-01-07 12:26:53', '2023-01-07 12:26:53'),
(11, 95, 'turki noman alharbi', 'In consequatur id', 'Ducimus nisi autem', '0552952593', 'Do assumenda ducimus', '2023-01-10 16:16:06', '2023-01-10 16:16:06'),
(12, 96, 'turki alharbi', 'In consequatur id', 'Ducimus nisi autem', '0552952593', 'Do assumenda ducimus', '2023-01-10 16:20:52', '2023-01-10 16:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_coupons`
--

CREATE TABLE `order_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discounted_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_coupons`
--

INSERT INTO `order_coupons` (`id`, `order_id`, `code`, `type`, `amount`, `discounted_amount`, `created_at`, `updated_at`) VALUES
(5, 91, 'app', 'Percentage', '20', '201.25', '2023-01-05 09:18:20', '2023-01-05 09:18:20'),
(6, 92, 'app', 'Percentage', '20', '164.22', '2023-01-05 09:20:11', '2023-01-05 09:20:11'),
(7, 93, 'app', 'Percentage', '20', '257.14', '2023-01-07 12:09:50', '2023-01-07 12:09:50'),
(8, 95, 'august', 'Percentage', '20', '186.53', '2023-01-10 16:16:06', '2023-01-10 16:16:06'),
(9, 96, 'august', 'Percentage', '20', '184.69', '2023-01-10 16:20:52', '2023-01-10 16:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` decimal(6,2) DEFAULT NULL,
  `total_price` decimal(18,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_name`, `product_slug`, `product_brand`, `product_image`, `product_size`, `product_quantity`, `product_price`, `total_price`, `created_at`, `updated_at`) VALUES
(258, 91, 'High Low Zipped Jacket', 'high-low-zipped-jacket', 'Trendyol', 'products/product_67/1672580669-1_zoom_desktop_19.webp', 'S', 1, '226.00', '226.00', NULL, NULL),
(259, 91, 'Nsw Cropped T-Shirt', 'nsw-cropped-t-shirt', 'Nike', 'products/product_55/1672579635-1_zoom_desktop_8.webp', 'M', 1, '213.00', '213.00', NULL, NULL),
(260, 91, 'High Waist Straight Jeans', 'high-waist-straight-jeans', 'Calvin Klein', 'products/product_73/1672581330-1_zoom_desktop_2.webp', 'S', 1, '436.00', '436.00', NULL, NULL),
(261, 92, 'Flare Cut Out Joggers', 'flare-cut-out-joggers', 'Calvin Klein', 'products/product_51/1672579235-5_zoom_desktop.webp', 'S', 1, '178.00', '178.00', NULL, NULL),
(262, 92, 'Soft-Touch Tencel™ Trousers', 'soft-touch-tencel-trousers', 'Levis', 'products/product_52/1672579293-1_zoom_desktop_5.webp', 'M', 1, '180.00', '180.00', NULL, NULL),
(263, 92, 'Trefoil Dress', 'trefoil-dress', 'Addidas', 'products/product_48/1672578820-1_zoom_desktop_2.webp', 'M', 1, '356.00', '356.00', NULL, NULL),
(264, 93, 'High Waist Straight Jeans', 'high-waist-straight-jeans-UK-29-C', 'Levis', 'products/product_74/1672581370-1_zoom_desktop_3.webp', 'S', 2, '234.00', '468.00', NULL, NULL),
(265, 93, 'Deco Glam Women Jacket', 'deco-glam-women-jacket', 'Puma', 'products/product_69/1672580840-4_zoom_desktop_3.webp', 'S', 2, '325.00', '650.00', NULL, NULL),
(266, 94, 'Monogram Beanie', 'monogram-beanie', 'Calvin Klein', 'products/product_81/1673103060-1_zoom_desktop_5.webp', 'S', 1, '436.00', '436.00', NULL, NULL),
(267, 94, 'Re Lock Convertible Crossbody Bag', 're-lock-convertible-crossbody-bag', 'Calvin Klein', 'products/product_78/1673102879-1_zoom_desktop_3.webp', 'S', 1, '896.00', '896.00', NULL, NULL),
(268, 95, 'Pocket Detail Button Down Shirt', 'pocket-detail-button-down-shirt', 'Trendyol', 'products/product_75/1672581496-1_zoom_desktop_4.webp', 'S', 1, '124.60', '124.00', NULL, NULL),
(269, 95, 'Ess Men T-Shirt', 'ess-men-t-shirt', 'Puma', 'products/product_82/1673103280-1_zoom_desktop_6.webp', 'M', 1, '234.00', '234.00', NULL, NULL),
(270, 95, 'Logo Printed Hoodie', 'logo-printed-hoodie', 'Calvin Klein', 'products/product_85/1673103421-1_zoom_desktop_9.webp', 'S', 1, '453.00', '453.00', NULL, NULL),
(271, 96, 'Essential Sweatpants', 'essential-sweatpants', 'Addidas', 'products/product_86/1673103495-1_zoom_desktop_10.webp', 'M', 1, '353.00', '353.00', NULL, NULL),
(272, 96, 'Nsw T-Shirt', 'nsw-t-shirt', 'Nike', 'products/product_83/1673103327-1_zoom_desktop_7.webp', 'S', 1, '125.00', '125.00', NULL, NULL),
(273, 96, 'Iconic T7 Track Pants', 'iconic-t7-track-pants', 'Puma', 'products/product_87/1673103534-1_zoom_desktop_11.webp', 'M', 1, '325.00', '325.00', NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(11, 'Create Users', 'create-users', 'users', NULL, NULL),
(12, 'Update Users', 'update-users', 'users', NULL, NULL),
(13, 'View Users', 'view-users', 'users', NULL, NULL),
(14, 'Access Users', 'access-users', 'users', NULL, NULL),
(15, 'Delete Users', 'delete-users', 'users', NULL, NULL),
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
(41, 'Create Size Options', 'create-size-options', 'size options', NULL, NULL),
(42, 'Update Size Options', 'update-size-options', 'size options', NULL, NULL),
(43, 'View Size Options', 'view-size-options', 'size options', NULL, NULL),
(44, 'Access Size Options', 'access-size-options', 'size options', NULL, NULL),
(45, 'Delete Size Options', 'delete-size-options', 'size options', NULL, NULL),
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
(69, 'Access Dashboard', 'access-dashboard', 'dashboard', NULL, NULL);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'a90df8d3ca01fe0338fbd30da1ab35878bf5f215e449a2f502c599e038f648af', '[\"*\"]', NULL, NULL, '2023-01-03 04:32:59', '2023-01-03 04:32:59'),
(2, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'e48fe549f79241f0b26dad0cefe1895a242306d09d3c1ba4b726434a077c6446', '[\"*\"]', NULL, NULL, '2023-01-03 04:53:57', '2023-01-03 04:53:57'),
(3, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'acffad94d8d21f4d0a46aeffcdafe27a9cb6d0f565fdabe0ccd97d8bac4b29c5', '[\"*\"]', NULL, NULL, '2023-01-03 08:32:55', '2023-01-03 08:32:55'),
(4, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '18124437d68137a7da856284632e78b1c5f159e3949ca9ea1d0609c83234e494', '[\"*\"]', NULL, NULL, '2023-01-03 09:26:44', '2023-01-03 09:26:44'),
(5, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'b8dd0136689636db99aa13bed792d0bc4f23af017a223721e0adc25e7257ac86', '[\"*\"]', NULL, NULL, '2023-01-05 11:05:58', '2023-01-05 11:05:58'),
(6, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '67e53b7f1e1eeddf684a5edf88b71fd2677c1d03f01f040cbdb81a4694df7885', '[\"*\"]', NULL, NULL, '2023-01-05 11:11:04', '2023-01-05 11:11:04'),
(7, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'da1b0f933ce96d02eaf3c6ea055d775dfee748bd99a0ca19e728046f9bcc854f', '[\"*\"]', NULL, NULL, '2023-01-05 11:14:34', '2023-01-05 11:14:34'),
(8, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'ce2be5de666b2c92bc0b0cf56e35e25afd7a85e4c58e2467bc10e2f53984425b', '[\"*\"]', NULL, NULL, '2023-01-05 18:40:49', '2023-01-05 18:40:49'),
(9, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '83b197b6ed2f6d251d168404feac162f819048003db0322b3a9db878ee1da6e3', '[\"*\"]', NULL, NULL, '2023-01-05 18:42:11', '2023-01-05 18:42:11'),
(10, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '94f361191d35039547d9e28a31e44fb94c54346cef513bae26b4c278e6f03255', '[\"*\"]', NULL, NULL, '2023-01-05 18:43:59', '2023-01-05 18:43:59'),
(11, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'b2951997180660e239626430112fe36b4442b25e0e2fbc296c3fccf385b45c81', '[\"*\"]', NULL, NULL, '2023-01-05 22:00:16', '2023-01-05 22:00:16'),
(12, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '52220138619062081f22a4e919e1d98330fa90df3e701ab9751ba4b306780845', '[\"*\"]', NULL, NULL, '2023-01-06 08:46:44', '2023-01-06 08:46:44'),
(13, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '6b4475496a0fbacd7df46cd90bdec27058148bd371634cd696284dd5f3ffcadf', '[\"*\"]', NULL, NULL, '2023-01-06 08:50:25', '2023-01-06 08:50:25'),
(14, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'c28c028bd47713eb0aa8620c904056e523c7e89560b165c774e68be8b45fbf45', '[\"*\"]', NULL, NULL, '2023-01-06 09:06:39', '2023-01-06 09:06:39'),
(15, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '703b10df5605d948846c100ff053e25bc677bff392c9753cc018784063732c70', '[\"*\"]', NULL, NULL, '2023-01-06 09:08:25', '2023-01-06 09:08:25'),
(16, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '78dfb3c497176e2ac34d9b5aeca36a6e12c1a2d97a905a8c22284464f5317479', '[\"*\"]', NULL, NULL, '2023-01-06 09:12:58', '2023-01-06 09:12:58'),
(17, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'cefaea83c2249b9c7de34c6538b50b0b3a5bdf9f140bbb7d1a984cd581e08151', '[\"*\"]', NULL, NULL, '2023-01-06 09:15:05', '2023-01-06 09:15:05'),
(18, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '61a81e05548aa1a6b4f53c7dab8a47d523ad3010c168da55dc58399162d28804', '[\"*\"]', NULL, NULL, '2023-01-06 09:20:26', '2023-01-06 09:20:26'),
(19, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'f48863a12ec8146561464c44ba3edac17523ab0fe7e84daee36b3fbd3ff01b18', '[\"*\"]', NULL, NULL, '2023-01-06 09:21:59', '2023-01-06 09:21:59'),
(20, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '27f8cc6da8d704d76c02d9ad3d335e67adf66caab3971ced530d8cb8f39d043d', '[\"*\"]', NULL, NULL, '2023-01-06 09:24:54', '2023-01-06 09:24:54'),
(21, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '36cdb79ef36e74ecb350ae071a6d68407848e329e6fa705cc5282932d989c176', '[\"*\"]', NULL, NULL, '2023-01-06 09:26:18', '2023-01-06 09:26:18'),
(22, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '30db497672440b915b6a48099b1930ebdfe67fb0c923c0db60a75a6023a5e339', '[\"*\"]', NULL, NULL, '2023-01-06 09:27:07', '2023-01-06 09:27:07'),
(23, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'b56d6efde27bacc7797e0f879fadf49bb3ad1a3b013530d4c1c8e7f5c8b03a78', '[\"*\"]', NULL, NULL, '2023-01-06 09:28:35', '2023-01-06 09:28:35'),
(24, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '767e38fae7bdc01c1d71fc52e0c152a03b5b2c58165db1e3b5bb5a40b6796304', '[\"*\"]', NULL, NULL, '2023-01-06 09:28:44', '2023-01-06 09:28:44'),
(25, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '97507ebfb5f9ad7c02dee029f7bb38aeaebcc8f27071118112f2b45986df461f', '[\"*\"]', NULL, NULL, '2023-01-06 09:45:00', '2023-01-06 09:45:00'),
(26, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '17773a6b035e4e3fa7673640190e6cbeddcda340b762560015db9ff1d7cb05b1', '[\"*\"]', NULL, NULL, '2023-01-06 09:47:40', '2023-01-06 09:47:40'),
(27, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '73e7e558cf70c655cbcfe4a4807f926032c15612e24fa391cd36a56ea4bad4c6', '[\"*\"]', NULL, NULL, '2023-01-06 10:18:17', '2023-01-06 10:18:17'),
(28, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'ea4dcc224ee90ee9957824c5f89fa2481cd1dbfc5ec4d6da4d58ced2a36ca5fd', '[\"*\"]', NULL, NULL, '2023-01-06 10:27:00', '2023-01-06 10:27:00'),
(29, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'e256c8ec4ef3bb576aa0a89d65e35fc6a82032460f6114d1827f5f02ea9661f6', '[\"*\"]', NULL, NULL, '2023-01-06 10:31:40', '2023-01-06 10:31:40'),
(30, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '0212219a207c2000855ab80014ddba8bccd21ee1b8112d0095e63b0e40d7da3d', '[\"*\"]', NULL, NULL, '2023-01-06 11:48:46', '2023-01-06 11:48:46'),
(31, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'efa2a9673010b37e7724247dae79d55d00287a13cef00734293f48a1e6c8e800', '[\"*\"]', NULL, NULL, '2023-01-06 21:34:17', '2023-01-06 21:34:17'),
(32, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '95dbeb38646d23af137555dad404c1d32cb7597cacbe7cde4d46b74f0be649d1', '[\"*\"]', NULL, NULL, '2023-01-07 10:10:45', '2023-01-07 10:10:45'),
(33, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '941bbbeedecd102783cfbec028dbdd9c078e8433be8bb6c18730c14ffa527ce7', '[\"*\"]', NULL, NULL, '2023-01-07 10:42:35', '2023-01-07 10:42:35'),
(34, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '116b02c1571cd10e7d77c632d991f54f8e314db0b21caa112f1169d5f7f1eb8c', '[\"*\"]', NULL, NULL, '2023-01-07 10:49:36', '2023-01-07 10:49:36'),
(35, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '2557e7ce57112ccaea13a4a16074a9e66c3598b24be8e730e33bc29a42381f0d', '[\"*\"]', NULL, NULL, '2023-01-07 10:50:44', '2023-01-07 10:50:44'),
(36, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '11d2ae57042ae96cdf6e0f1909e41ac9787bdd1c0cd013bca027eb4156f56f28', '[\"*\"]', NULL, NULL, '2023-01-07 10:52:13', '2023-01-07 10:52:13'),
(37, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'eab93f3dfb38dba078de65d2fc93351824e31db6f075e092b9c971c60a7cd876', '[\"*\"]', NULL, NULL, '2023-01-07 10:52:36', '2023-01-07 10:52:36'),
(38, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '6bbaf171d2eea2798dabd58dff92b2ef2b69770f2e05ce6796c567e3edcbd4d0', '[\"*\"]', NULL, NULL, '2023-01-07 10:52:44', '2023-01-07 10:52:44'),
(39, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', 'aaafff039cffeeb9b3b9ca9c1a1619d0b8afe53d891bb15f1cfe9f5a332d5590', '[\"*\"]', NULL, NULL, '2023-01-07 10:56:08', '2023-01-07 10:56:08'),
(40, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '7be53ecc327e4e91216240ec3ff86a3baf846c0e08ae9c99e9191f51d2f5d741', '[\"*\"]', NULL, NULL, '2023-01-07 20:16:54', '2023-01-07 20:16:54'),
(41, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '015593fea25407bb5e66e1bf735b821ec1201687ee7cfa960ef696c40ec48dde', '[\"*\"]', NULL, NULL, '2023-01-07 20:26:33', '2023-01-07 20:26:33'),
(42, 'App\\Modules\\Users\\Models\\User', 11, 'access-token', 'ac0b7ca296cf8b2d71ceb95ae7edca940636da103607556b381a54ca177e8a2f', '[\"*\"]', NULL, NULL, '2023-01-07 20:53:46', '2023-01-07 20:53:46'),
(43, 'App\\Modules\\Users\\Models\\User', 11, 'access-token', '2319889d0d5d3d9d1c39d97b1ad0423cbfff4d2b9b36f42c4b3eb8a685b9f936', '[\"*\"]', NULL, NULL, '2023-01-07 20:54:14', '2023-01-07 20:54:14'),
(44, 'App\\Modules\\Users\\Models\\User', 11, 'access-token', '9b157b1defbc7f436f617256f27332a91ed02a1a9f8633ed4be9936cdbd2fcae', '[\"*\"]', NULL, NULL, '2023-01-10 15:47:35', '2023-01-10 15:47:35'),
(45, 'App\\Modules\\Users\\Models\\User', 10, 'access-token', '2d33c208bb8c20888c9162329cba5e9962e82b3cfab8d91d2bed9405aa8f75ab', '[\"*\"]', NULL, NULL, '2023-01-10 16:10:29', '2023-01-10 16:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_and_care` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `shipping_cost` decimal(6,2) DEFAULT 0.00,
  `discount_amount` int(11) DEFAULT NULL,
  `discount_type` enum('Percentage','Fixed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_start_at` date DEFAULT NULL,
  `discount_expires_at` date DEFAULT NULL,
  `discounted_price` decimal(6,2) DEFAULT NULL,
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

INSERT INTO `products` (`id`, `name`, `slug`, `details`, `info_and_care`, `price`, `shipping_cost`, `discount_amount`, `discount_type`, `discount_start_at`, `discount_expires_at`, `discounted_price`, `stock`, `is_active`, `brand_id`, `color_id`, `created_at`, `updated_at`) VALUES
(46, 'Ribbed Button Detail Dress', 'ribbed-button-detail-dress', '<p><strong>Feminine and glamorous, this outfit makes an alluring addition to your evening Dress collection.<br><span style=\"color: rgb(102, 102, 102)\">Reconsidered: Made with 65% Naia™ Triacetate, created from wood pulp.</span><br><br></strong></p><ul><li><p>Rib-knit and comfortable acetate blend fabric</p></li><li><p>Cut-out detail to shoulders</p></li><li><p>Collar neck and long raglan sleeves</p></li><li><p>Secure button down closure to front</p></li><li><p>Midi dress style</p></li><li><p>Calvin Klein signature branding</p></li></ul>', '<p>SKU78768ATPPYKPColorblackNeck TypeCollar NeckApparel TypeDressModel Height178 cmSize shown in imageSSupplier Style No.K20K205107Model MeasurementsBust: 85 cm - Waist: 62 cm - Hips: 91 cmWashing InstructionsWash according to instructions on Care Label.Product Material63% Acetate 37% Polyamide</p>', '832.00', '0.00', NULL, NULL, NULL, NULL, NULL, 16, 1, 10, 8, '2023-01-01 09:12:58', '2023-01-01 10:58:19'),
(47, 'Always Original Laced Track Jacket', 'always-original-laced-track-jacket', '<p><strong>Each day presents a new opportunity for play, and this adidas track jacket encourages you to do just that.<br><span style=\"color: rgb(102, 102, 102)\">Recycled: Recycling helps use natural resources efficiently and it supports sustainable development.</span><br><br></strong></p><ul><li><p>Soft and stretchable polyester fabric</p></li><li><p>High neck and long sleeves</p></li><li><p>Secure zipper closure to front</p></li><li><p>Lace-up side details for cinched look</p></li><li><p>Dual, easy slip-in side pockets</p></li><li><p>Embroidered adidas Originals trefoil branding</p></li><li><p>Each item sold separately</p></li></ul>', '<p>SKU14448ATJSGHPColorblackNeck TypeHigh NeckApparel TypeJacketModel Height174 cmSize shown in imageSSupplier Style No.HK5075Model MeasurementsBust: 92 cm - Waist: 60 cm - Hips: 84 cmWashing InstructionsWash according to instructions on care label.Product MaterialRecycled Polyester</p>', '470.00', '0.00', NULL, NULL, NULL, NULL, NULL, 15, 1, 3, 8, '2023-01-01 10:08:53', '2023-01-01 10:58:19'),
(48, 'Trefoil Dress', 'trefoil-dress', '<p><strong>So much style and just as much comfort make this adidas dress a must-have in your closet.<br><span style=\"color: rgb(102, 102, 102)\">Recycled: Recycling helps use natural resources efficiently and it supports sustainable development.</span><br><br></strong></p><ul><li><p>Soft and comfortable cotton blend fabric</p></li><li><p>Round neck and long sleeves</p></li><li><p>Ribbed trims to neck and cuffs</p></li><li><p>adidas Originals trefoil and 3-stripe branding</p></li></ul>', '<p>SKU14448ATDRGNPColordark purpleNeck TypeRound NeckApparel TypeDressModel Height174 cmSize shown in imageSSupplier Style No.HM1734Model MeasurementsBust: 92 cm - Waist: 60 cm - Hips: 84 cmWashing InstructionsWash according to instructions on care label.Product Material67% Cotton 33% Recycled Polyester</p>', '356.00', '0.00', NULL, NULL, NULL, NULL, NULL, 11, 1, 3, 8, '2023-01-01 10:08:55', '2023-01-05 09:20:11'),
(49, 'Velour Pants', 'velour-pants', '<ul><li><p>SKU14448ATRBALP</p></li><li><p>Color blue</p></li><li><p> Supplier Style No.IB2048</p></li></ul>', NULL, '320.00', '0.00', NULL, NULL, NULL, NULL, NULL, 22, 1, 3, 13, '2023-01-01 10:08:58', '2023-01-01 10:58:19'),
(50, 'Qatar Sweatpants', 'qatar-sweatpants', '<p><strong>Relaxed fit everyday casual outfit. A must have in every individual\'s wardrobe.<br></strong></p><ul><li><p>Smooth soft cotton blend fabric</p></li><li><p>Contrast graphic taping detail along the legs</p></li><li><p>Elasticated waistband with adjustable drawstrings</p></li><li><p>Dual side easy slip-in pockets to front</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '236.00', '0.00', NULL, NULL, NULL, NULL, NULL, 14, 1, 2, 12, '2023-01-01 10:08:59', '2023-01-01 10:58:19'),
(51, 'Flare Cut Out Joggers', 'flare-cut-out-joggers', '<p></p>', NULL, '178.00', '0.00', NULL, NULL, NULL, NULL, NULL, 12, 1, 10, 13, '2023-01-01 10:19:30', '2023-01-05 09:20:11'),
(52, 'Soft-Touch Tencel™ Trousers', 'soft-touch-tencel-trousers', NULL, NULL, '180.00', '0.00', NULL, NULL, NULL, NULL, NULL, 17, 1, 11, 11, '2023-01-01 10:19:33', '2023-01-05 09:20:11'),
(53, 'Button Detail Pants', 'button-detail-pants', '<p><strong>If you are looking for versatile casual staples, these pants tick all of the right boxes.<br></strong></p><ul><li><p>Soft and comfortable polyester fabric</p></li><li><p>Concealed zipper closure to waist</p></li><li><p>Dual easy slip-in pockets to side</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '569.00', '0.00', NULL, NULL, NULL, NULL, NULL, 7, 1, 10, 9, '2023-01-01 10:19:35', '2023-01-01 10:58:19'),
(54, 'Adicolor 3 Stripe Classics Sweatpants', 'adicolor-3-stripe-classics-sweatpants', '<p></p>', NULL, '235.00', '0.00', NULL, NULL, NULL, NULL, NULL, 8, 1, 3, 8, '2023-01-01 10:19:38', '2023-01-01 10:58:19'),
(55, 'Nsw Cropped T-Shirt', 'nsw-cropped-t-shirt', '<p><strong>This slim fit crop top is a dazzling yet versatile addition to the collection of feminine masterpieces.<br></strong></p><ul><li><p>Soft and comfortable modal blend fabric</p></li><li><p>Round neck and short sleeves</p></li><li><p>Contrast Nike swoosh branding</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '213.00', '0.00', NULL, NULL, NULL, NULL, NULL, 24, 1, 2, 1, '2023-01-01 10:23:25', '2023-01-05 09:18:20'),
(56, 'Round Neck Logo T-Shirt', 'round-neck-logo-t-shirt', '<p><strong>This T-shirt adds an understated cool factor to your staples collection that explores unmistakable identity.<br></strong></p><ul><li><p>Soft and comfortable cotton fabric</p></li><li><p>Round neck and short sleeves</p></li><li><p>Embroidered Tommy Jeans signature branding</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '210.00', '0.00', NULL, NULL, NULL, NULL, NULL, 7, 1, 8, 1, '2023-01-01 10:27:36', '2023-01-01 10:58:19'),
(57, '3 Stripe T-Shirt', '3-stripe-t-shirt', NULL, NULL, '352.00', '0.00', NULL, NULL, NULL, NULL, NULL, 16, 1, 3, 8, '2023-01-01 10:30:57', '2023-01-05 08:42:27'),
(58, 'Oversize Logo T-Shirt', 'oversize-logo-t-shirt', NULL, NULL, '236.00', '0.00', NULL, NULL, NULL, NULL, NULL, 11, 1, 8, 8, '2023-01-01 10:31:00', '2023-01-01 10:58:19'),
(59, 'Graphic Logo T-Shirt', 'graphic-logo-t-shirt', NULL, NULL, '234.00', '0.00', NULL, NULL, NULL, NULL, NULL, 5, 1, 5, 8, '2023-01-01 10:31:01', '2023-01-01 10:58:19'),
(60, 'Crew Neck Knitted Sweatshirt', 'crew-neck-knitted-sweatshirt', '<p><strong>A remixed classic text print infuses this sweatshirt with a cool attitude to make your casual edits stand out.<br></strong></p><ul><li><p>Lightweight, knitted poly-cotton blend fabric</p></li><li><p>Contrast text prints to front</p></li><li><p>Round neck and long sleeves</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '358.00', '0.00', NULL, NULL, NULL, NULL, NULL, 12, 1, 12, 14, '2023-01-01 10:33:46', '2023-01-04 20:03:41'),
(61, 'Essential Logo Hoodie', 'essential-logo-hoodie', NULL, NULL, '367.00', '0.00', NULL, NULL, NULL, NULL, NULL, 10, 1, 3, 14, '2023-01-01 10:33:47', '2023-01-01 10:58:19'),
(62, 'Trefoil Hoodie', 'trefoil-hoodie', NULL, NULL, '363.00', '0.00', NULL, NULL, NULL, NULL, NULL, 8, 1, 3, 7, '2023-01-01 10:33:48', '2023-01-04 20:03:41'),
(63, 'Dri-Fit Graphic Hoodie', 'dri-fit-graphic-hoodie', NULL, NULL, '189.00', '0.00', NULL, NULL, NULL, NULL, NULL, 5, 1, 2, 10, '2023-01-01 10:38:42', '2023-01-01 10:58:19'),
(64, 'Mesh Combo Hoodie', 'mesh-combo-hoodie', '<ul><li><p><strong>Smooth, stretchable polyester fabric</strong></p></li><li><p><strong>Inner attached mesh lining for breathability</strong></p></li><li><p><strong>Hoodie neck and long sleeves</strong></p></li><li><p><strong>Visible and secure front zipper placket</strong></p></li><li><p><strong>Cropped silhouette</strong></p></li><li><p><strong>Contrast FILA signature branding</strong></p></li><li><p><strong>Each item sold separately</strong></p></li></ul>', NULL, '170.00', '0.00', NULL, NULL, NULL, NULL, NULL, 17, 1, 4, 12, '2023-01-01 10:38:43', '2023-01-01 10:58:19'),
(65, 'Knitted Hoodie', 'knitted-hoodie', NULL, NULL, '276.00', '0.00', NULL, NULL, NULL, NULL, NULL, 12, 1, 12, 10, '2023-01-01 10:38:44', '2023-01-05 08:42:27'),
(66, 'Oversized Double Breasted Coat', 'oversized-double-breasted-coat', NULL, NULL, '248.00', '0.00', NULL, NULL, NULL, NULL, '248.00', 19, 1, 12, 14, '2023-01-01 10:41:41', '2023-01-04 19:40:20'),
(67, 'High Low Zipped Jacket', 'high-low-zipped-jacket', '<p><strong>Chilly days are on the horizon, so cosy up with this stylish jacket designed for a casual look with a premium feel.<br><span style=\"color: rgb(102, 102, 102)\">Recycled: Recycling helps use natural resources efficiently and it supports sustainable development.</span><br><br></strong></p><ul><li><p>Quilted and comfortable polyester fabric</p></li><li><p>Padded lining for extra warmth</p></li><li><p>Long, detachable sleeves with elasticated cuffs</p></li><li><p>Secure zipper closure to front</p></li><li><p>Dual easy slip-in pockets to side</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '226.00', '0.00', NULL, NULL, NULL, NULL, '226.00', 8, 1, 12, 12, '2023-01-01 10:41:42', '2023-01-05 09:18:20'),
(68, 'Zip Through Fur Detail Jacket', 'zip-through-fur-detail-jacket', '<p><strong>Opulent yet understated, Trendyol’s range will complete both smart and casual outfits with finesse.<br></strong></p><ul><li><p>Soft and comfortable polyester fabric</p></li><li><p>Collar neck with long sleeves</p></li><li><p>Secure zipper closure to front</p></li><li><p>Dual side slip-in pockets</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '386.00', '0.00', NULL, NULL, NULL, NULL, NULL, 12, 1, 12, 8, '2023-01-01 10:41:43', '2023-01-05 08:42:27'),
(69, 'Deco Glam Women Jacket', 'deco-glam-women-jacket', '<p><strong>Embrace the winter in this regular fit jacket designed by PUMA to keep you in style for off-duty days.<br></strong></p><ul><li><p>Soft and comfortable polyester blend fabric</p></li><li><p>High neck with long sleeves</p></li><li><p>Secure zipper closure to front</p></li><li><p>Elasticated hem for adjustable fit</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '325.00', '0.00', NULL, NULL, NULL, NULL, NULL, 6, 1, 9, 1, '2023-01-01 10:41:44', '2023-01-07 12:09:50'),
(70, 'Longline Coat', 'longline-coat', '<p><strong>Layer your outfit with this coat from Trendyol for a casual yet stylish look, ideal for daily wear.<br></strong></p><ul><li><p>Made from polyester fabric</p></li><li><p>Long sleeves with adjustable straps to cuffs</p></li><li><p>Secure double breasted button down closure</p></li><li><p>Adjustable self-tie belt to waist</p></li><li><p>Dual side easy slip-in pockets</p></li><li><p>Product Length: 110 cm</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '340.00', '0.00', NULL, NULL, NULL, NULL, NULL, 13, 1, 10, 6, '2023-01-01 10:41:45', '2023-01-04 13:53:50'),
(71, 'High Waist Jeans', 'high-waist-jeans', '<p><strong>Casual with edgy edits, these jeans adds up for an effortlessly comfortable fit.<br></strong></p><ul><li><p>Made from comfortable cotton denim fabric</p></li><li><p>Concealed zipper fly and button top closure</p></li><li><p>Classic five pocket styling</p></li><li><p>Contrast Tommy Hilfiger signature patch branding</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '426.00', '0.00', NULL, NULL, NULL, NULL, NULL, 9, 1, 8, 13, '2023-01-01 10:53:22', '2023-01-05 08:42:27'),
(72, 'High Waist Skinny Jeans', 'high-waist-skinny-jeans', '<p><strong>An elevated take on the timeless Jeans with this iconic look.<br></strong></p><ul><li><p>Comfortable, soft cotton blend fabric</p></li><li><p>Concealed zipper fly with button top closure</p></li><li><p>Classic five pocket styling and secure belt hooks</p></li><li><p>Calvin Klein branded hardware and leather badge</p></li><li><p>Each item sold separately</p></li></ul>', NULL, '563.00', '0.00', NULL, NULL, NULL, NULL, NULL, 5, 1, 10, 6, '2023-01-01 10:53:23', '2023-01-04 13:51:50'),
(73, 'High Waist Straight Jeans', 'high-waist-straight-jeans', NULL, NULL, '436.00', '0.00', NULL, NULL, NULL, NULL, NULL, 7, 1, 10, 8, '2023-01-01 10:53:24', '2023-01-05 09:18:20'),
(74, 'High Waist Straight Jeans', 'high-waist-straight-jeans-UK-29-C', NULL, NULL, '234.00', '0.00', NULL, NULL, NULL, NULL, NULL, 14, 1, 11, 13, '2023-01-01 10:53:25', '2023-01-07 12:09:50'),
(75, 'Pocket Detail Button Down Shirt', 'pocket-detail-button-down-shirt', NULL, NULL, '178.00', '0.00', 30, 'Percentage', '2023-01-02', '2023-01-21', '124.60', 11, 1, 12, 13, '2023-01-01 10:53:26', '2023-01-10 16:16:06'),
(76, 'Air Max Excee Ewt Style', 'air-max-excee-ewt-style', '<p><strong>Inspired by the Nike Air Max 90, the Nike Air Max Excee Ewt Style celebrates a classic through a new lens.<br></strong></p><ul><li><p>Durable genuine leather upper with synthetic overlays</p></li><li><p>Eyelets with secure lace-up closure</p></li><li><p>Max Air unit delivers lightweight cushioning with every step</p></li><li><p>Foam midsole and foam and rubber outsole pods for added durability</p></li><li><p>Waffle patterned rubber outsole adds traction</p></li><li><p>Embroidered Nike swoosh branding</p></li></ul>', '<p>SKU72704SHWVKDPColorpinkClosingLace upToe ShapeRoundSole MaterialRubberUpper MaterialLeatherLining MaterialTextileSupplier Style No.DX0113-600</p>', '574.00', '0.00', NULL, NULL, NULL, NULL, '574.00', 5, 1, 2, 11, '2023-01-07 11:42:04', '2023-01-07 11:46:26'),
(77, '4Dfwd', '4dfwd', NULL, NULL, '346.00', '0.00', NULL, NULL, NULL, NULL, '346.00', 8, 1, 3, 8, '2023-01-07 11:42:06', '2023-01-07 11:46:26'),
(78, 'Re Lock Convertible Crossbody Bag', 're-lock-convertible-crossbody-bag', '<p><strong>The ultimate hands-free accessory, keeping everything organized and your look effortless.<br></strong></p><ul><li><p>Lightweight, durable PU upper</p></li><li><p>Main compartment with zipper closure</p></li><li><p>Dual inner slip-in slots</p></li><li><p>Easy accessible external pocket with magnetic closure</p></li><li><p>Dual side shoulder straps</p></li><li><p>Embossed Calvin Klein signature branding</p></li></ul>', NULL, '896.00', '0.00', NULL, NULL, NULL, NULL, '896.00', 7, 1, 10, 8, '2023-01-07 11:46:38', '2023-01-07 12:26:53'),
(79, 'Must Large Tote Bag', 'must-large-tote-bag-Js-2-4', NULL, NULL, '975.00', '0.00', NULL, NULL, NULL, NULL, '975.00', 8, 1, 10, 14, '2023-01-07 11:47:04', '2023-01-07 11:48:56'),
(80, 'Re Lock Buckle Belt 30Mm', 're-lock-buckle-belt-30mm', NULL, NULL, '353.00', '0.00', NULL, NULL, NULL, NULL, '353.00', 7, 1, 10, 8, '2023-01-07 11:49:17', '2023-01-07 11:50:32'),
(81, 'Monogram Beanie', 'monogram-beanie', NULL, NULL, '436.00', '0.00', NULL, NULL, NULL, NULL, '436.00', 7, 1, 10, 14, '2023-01-07 11:49:19', '2023-01-07 12:26:53'),
(82, 'Ess Men T-Shirt', 'ess-men-t-shirt', NULL, NULL, '234.00', '0.00', NULL, NULL, NULL, NULL, '234.00', 14, 1, 9, 7, '2023-01-07 11:53:38', '2023-01-10 16:16:06'),
(83, 'Nsw T-Shirt', 'nsw-t-shirt', NULL, NULL, '125.00', '0.00', NULL, NULL, NULL, NULL, '125.00', 6, 1, 2, 10, '2023-01-07 11:53:39', '2023-01-10 16:20:52'),
(84, 'N31 Fleece Essential Logo Hoodie', 'n31-fleece-essential-logo-hoodie', NULL, NULL, '245.00', '0.00', NULL, NULL, NULL, NULL, '245.00', 7, 1, 2, 8, '2023-01-07 11:53:41', '2023-01-10 16:10:34'),
(85, 'Logo Printed Hoodie', 'logo-printed-hoodie', NULL, NULL, '453.00', '0.00', NULL, NULL, NULL, NULL, '453.00', 15, 1, 10, 10, '2023-01-07 11:53:43', '2023-01-10 16:16:06'),
(86, 'Essential Sweatpants', 'essential-sweatpants', NULL, NULL, '353.00', '0.00', NULL, NULL, NULL, NULL, '353.00', 14, 1, 3, 14, '2023-01-07 11:53:45', '2023-01-10 16:20:52'),
(87, 'Iconic T7 Track Pants', 'iconic-t7-track-pants', NULL, NULL, '325.00', '0.00', NULL, NULL, NULL, NULL, '325.00', 7, 1, 9, 8, '2023-01-07 11:53:47', '2023-01-10 16:20:52');

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
(46, 9),
(46, 12),
(46, 16),
(47, 9),
(47, 12),
(47, 16),
(48, 9),
(48, 12),
(48, 16),
(49, 9),
(49, 12),
(49, 18),
(50, 9),
(50, 12),
(50, 18),
(51, 9),
(51, 12),
(51, 18),
(52, 9),
(52, 12),
(52, 18),
(53, 9),
(53, 12),
(53, 18),
(54, 9),
(54, 12),
(54, 18),
(55, 9),
(55, 12),
(55, 19),
(56, 9),
(56, 12),
(56, 19),
(58, 9),
(58, 12),
(58, 19),
(57, 9),
(57, 12),
(57, 19),
(59, 9),
(59, 12),
(59, 19),
(60, 9),
(60, 12),
(60, 20),
(61, 9),
(61, 12),
(61, 20),
(62, 9),
(62, 12),
(62, 20),
(63, 9),
(63, 12),
(63, 20),
(64, 9),
(64, 12),
(64, 20),
(65, 9),
(65, 12),
(65, 20),
(66, 9),
(66, 12),
(66, 21),
(67, 9),
(67, 12),
(67, 21),
(68, 9),
(68, 12),
(68, 21),
(69, 9),
(69, 12),
(69, 21),
(70, 9),
(70, 12),
(70, 21),
(71, 9),
(71, 12),
(71, 22),
(72, 9),
(72, 12),
(72, 22),
(73, 9),
(73, 12),
(73, 22),
(74, 9),
(74, 12),
(74, 22),
(75, 9),
(75, 12),
(75, 17),
(76, 9),
(76, 15),
(77, 9),
(77, 15),
(78, 9),
(78, 14),
(79, 9),
(79, 14),
(80, 9),
(80, 13),
(81, 9),
(81, 13),
(82, 10),
(82, 23),
(82, 24),
(83, 10),
(83, 23),
(83, 24),
(84, 10),
(84, 23),
(84, 25),
(85, 10),
(85, 23),
(85, 25),
(86, 10),
(86, 23),
(86, 26),
(87, 10),
(87, 23),
(87, 26);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main_image` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `is_main_image`) VALUES
(67, 46, '1672578388-1_zoom_desktop.webp', 1),
(68, 46, '1672578389-2_zoom_desktop.webp', 0),
(69, 46, '1672578389-4_zoom_desktop.webp', 0),
(70, 47, '1672578605-1_zoom_desktop_1.webp', 1),
(71, 47, '1672578605-2_web_desktop_list.webp', 0),
(72, 48, '1672578820-1_zoom_desktop_2.webp', 1),
(73, 48, '1672578821-2_zoom_desktop_1.webp', 0),
(74, 49, '1672578987-1_zoom_desktop_3.webp', 1),
(75, 49, '1672578987-2_zoom_desktop_2.webp', 0),
(76, 50, '1672579163-1_zoom_desktop_4.webp', 1),
(77, 50, '1672579164-3_zoom_desktop.webp', 0),
(78, 51, '1672579235-5_zoom_desktop.webp', 1),
(79, 52, '1672579293-1_zoom_desktop_5.webp', 1),
(80, 53, '1672579346-1_zoom_desktop_6.webp', 1),
(81, 53, '1672579346-3_zoom_desktop_1.webp', 0),
(82, 54, '1672579396-1_zoom_desktop_7.webp', 1),
(83, 54, '1672579396-2_zoom_desktop_3.webp', 0),
(84, 55, '1672579635-1_zoom_desktop_8.webp', 1),
(85, 55, '1672579636-2_zoom_desktop_4.webp', 0),
(86, 56, '1672579823-1_zoom_desktop_9.webp', 1),
(87, 56, '1672579823-2_zoom_desktop_5.webp', 0),
(88, 58, '1672579907-1_zoom_desktop_10.webp', 1),
(89, 58, '1672579907-2_zoom_desktop_6.webp', 0),
(90, 57, '1672579952-1_zoom_desktop_11.webp', 1),
(91, 59, '1672579986-1_zoom_desktop_12.webp', 1),
(92, 59, '1672579986-2_zoom_desktop_7.webp', 0),
(93, 60, '1672580148-1_zoom_desktop_13.webp', 1),
(94, 60, '1672580148-2_zoom_desktop_8.webp', 0),
(95, 61, '1672580221-1_zoom_desktop_14.webp', 1),
(96, 61, '1672580221-2_zoom_desktop_9.webp', 0),
(97, 62, '1672580316-1_zoom_desktop_15.webp', 1),
(98, 63, '1672580364-1_zoom_desktop_16.webp', 1),
(99, 64, '1672580428-1_zoom_desktop_17.webp', 1),
(100, 64, '1672580428-4_zoom_desktop_1.webp', 0),
(101, 65, '1672580473-2_zoom_desktop_10.webp', 1),
(102, 66, '1672580610-1_zoom_desktop_18.webp', 1),
(103, 66, '1672580610-2_zoom_desktop_11.webp', 0),
(104, 67, '1672580669-1_zoom_desktop_19.webp', 1),
(105, 67, '1672580669-3_zoom_desktop_2.webp', 0),
(106, 68, '1672580752-1_zoom_desktop_20.webp', 1),
(107, 68, '1672580752-4_zoom_desktop_2.webp', 0),
(108, 69, '1672580840-4_zoom_desktop_3.webp', 1),
(109, 70, '1672580949-1_zoom_desktop_21.webp', 1),
(110, 70, '1672580949-3_zoom_desktop_3.webp', 0),
(111, 71, '1672581236-1_zoom_desktop.webp', 1),
(112, 72, '1672581285-1_zoom_desktop_1.webp', 1),
(113, 72, '1672581285-4_zoom_desktop.webp', 0),
(114, 73, '1672581330-1_zoom_desktop_2.webp', 1),
(115, 74, '1672581370-1_zoom_desktop_3.webp', 1),
(116, 75, '1672581496-1_zoom_desktop_4.webp', 1),
(117, 75, '1672581496-2_zoom_desktop.webp', 0),
(118, 76, '1673102634-1_zoom_desktop_1.webp', 1),
(119, 76, '1673102634-2_zoom_desktop.webp', 0),
(120, 77, '1673102779-1_zoom_desktop.webp', 1),
(121, 78, '1673102879-1_zoom_desktop_3.webp', 1),
(122, 78, '1673102879-2_zoom_desktop_2.webp', 0),
(123, 79, '1673102936-1_zoom_desktop_2.webp', 1),
(124, 79, '1673102936-2_zoom_desktop_1.webp', 0),
(125, 80, '1673103028-1_zoom_desktop_4.webp', 1),
(126, 81, '1673103060-1_zoom_desktop_5.webp', 1),
(127, 82, '1673103280-1_zoom_desktop_6.webp', 1),
(128, 83, '1673103327-1_zoom_desktop_7.webp', 1),
(129, 84, '1673103387-1_zoom_desktop_8.webp', 1),
(130, 85, '1673103421-1_zoom_desktop_9.webp', 1),
(131, 86, '1673103495-1_zoom_desktop_10.webp', 1),
(132, 87, '1673103534-1_zoom_desktop_11.webp', 1);

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
(72, 46, 1, 5),
(73, 46, 2, 3),
(74, 46, 3, 8),
(75, 47, 1, 5),
(76, 47, 2, 7),
(77, 47, 3, 3),
(78, 48, 1, 6),
(79, 48, 2, 5),
(80, 49, 1, 7),
(81, 49, 2, 7),
(82, 49, 3, 8),
(83, 50, 1, 5),
(84, 50, 2, 2),
(85, 50, 3, 7),
(86, 51, 1, 5),
(87, 51, 2, 7),
(88, 52, 1, 6),
(89, 52, 2, 8),
(90, 52, 3, 3),
(91, 53, 1, 4),
(92, 53, 2, 3),
(93, 54, 2, 5),
(94, 54, 1, 3),
(95, 55, 1, 23),
(96, 55, 2, 1),
(97, 56, 1, 3),
(98, 56, 2, 2),
(99, 58, 1, 5),
(100, 58, 2, 6),
(101, 57, 1, 6),
(102, 57, 2, 7),
(103, 57, 3, 3),
(104, 59, 1, 3),
(105, 59, 2, 2),
(106, 60, 1, 5),
(107, 60, 2, 7),
(108, 61, 1, 6),
(109, 61, 2, 4),
(110, 62, 1, 6),
(111, 62, 2, 2),
(112, 63, 1, 3),
(113, 63, 2, 0),
(114, 64, 1, 6),
(115, 64, 2, 3),
(116, 64, 3, 8),
(117, 65, 1, 5),
(118, 65, 2, 7),
(119, 66, 1, 7),
(120, 66, 2, 5),
(121, 66, 3, 7),
(122, 67, 2, 3),
(123, 67, 1, 5),
(124, 68, 1, 4),
(125, 68, 2, 8),
(126, 69, 1, 4),
(127, 69, 2, 2),
(128, 70, 1, 8),
(129, 70, 2, 5),
(130, 70, 3, 9),
(131, 71, 1, 5),
(132, 71, 2, 4),
(133, 72, 1, 6),
(134, 72, 2, 7),
(135, 73, 1, 4),
(136, 73, 2, 3),
(137, 74, 1, 5),
(138, 74, 2, 9),
(139, 75, 1, 6),
(140, 75, 2, 5),
(141, 76, 1, 5),
(142, 77, 1, 8),
(143, 78, 1, 7),
(144, 79, 1, 8),
(145, 80, 1, 7),
(146, 81, 1, 7),
(147, 82, 1, 7),
(148, 82, 2, 7),
(149, 83, 1, 6),
(150, 84, 1, 7),
(151, 85, 2, 7),
(152, 85, 1, 8),
(153, 86, 1, 7),
(154, 86, 2, 7),
(155, 87, 1, 5),
(156, 87, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review_id`, `comment`, `is_read`, `created_at`, `updated_at`) VALUES
(17, 10, 73, NULL, 'turkifb', 0, '2023-01-06 09:45:00', '2023-01-06 09:45:00'),
(19, 10, 73, 17, 'thank you', 0, '2023-01-06 21:08:47', '2023-01-06 21:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(4, 'Content Editor', 'content-editor', '2022-12-20 13:00:01', '2022-12-20 13:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
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
(1, 69),
(4, 1),
(4, 5),
(4, 10),
(4, 6);

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
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'S', 's', '2022-12-21 21:20:05', '2022-12-21 21:20:05'),
(2, 'M', 'm', '2022-12-21 21:20:09', '2022-12-21 21:20:09'),
(3, 'L', 'l', '2022-12-21 21:20:14', '2022-12-21 21:20:14'),
(4, 'XL', 'xl', '2023-01-05 16:49:45', '2023-01-05 16:49:45'),
(5, 'XS', 'xs', '2023-01-05 17:03:01', '2023-01-05 17:03:01');

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
  `phone_number` bigint(20) DEFAULT NULL,
  `gender` enum('Female','Male') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `gender`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(10, 'turki alharbi', 'turki@example.com', NULL, '$2y$10$bjOIcqSKdTsX.//eQk80UO4fUEeJaHMHUjjys1xFFfyVJc9E40Zfu', 5529525933, 'Male', '5I9gQ0yEaxlVXJ2ihJlbj0Q2pUhf5WrZoblmLwnw1JnV4EnygUqUlWQPJ7NI', '2023-01-01 16:42:05', '2023-01-06 14:54:11', 1),
(11, 'admin', 'admin@admin.com', NULL, '$2y$10$L8B1vf4.FIrsPlKjs8u13OCGPsqS6p7JDgAxYqZhw7.nEl4vbrpc.', NULL, 'Male', '4AE4hbJFP5OGxFaoonMmzMb6nlihllxHIkvOjslCKc72AaxDRJHbvTYmotG4', '2023-01-07 20:51:43', '2023-01-07 20:51:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`user_id`, `permission_id`) VALUES
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 8),
(10, 7),
(10, 10),
(10, 9),
(10, 20),
(10, 19),
(10, 18),
(10, 17),
(10, 16),
(10, 11),
(10, 12),
(10, 13),
(10, 14),
(10, 15),
(10, 26),
(10, 27),
(10, 28),
(10, 29),
(10, 30),
(10, 25),
(10, 24),
(10, 23),
(10, 22),
(10, 21),
(10, 35),
(10, 34),
(10, 33),
(10, 32),
(10, 31),
(10, 41),
(10, 42),
(10, 43),
(10, 44),
(10, 45),
(10, 50),
(10, 49),
(10, 48),
(10, 47),
(10, 46),
(10, 40),
(10, 39),
(10, 38),
(10, 37),
(10, 36),
(10, 56),
(10, 57),
(10, 58),
(10, 59),
(10, 60),
(10, 55),
(10, 54),
(10, 53),
(10, 52),
(10, 51),
(10, 69),
(10, 6),
(11, 4),
(11, 9),
(11, 8),
(11, 3),
(11, 13),
(11, 14),
(11, 19),
(11, 18),
(11, 28),
(11, 29),
(11, 24),
(11, 23),
(11, 34),
(11, 33),
(11, 39),
(11, 38),
(11, 49),
(11, 48),
(11, 43),
(11, 44),
(11, 53),
(11, 54),
(11, 59),
(11, 58),
(11, 69);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`user_id`, `product_id`) VALUES
(10, 70),
(10, 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

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
  ADD KEY `categories_slug_index` (`slug`);

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
  ADD KEY `reviews_review_id_foreign` (`review_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_name_index` (`name`),
  ADD KEY `roles_slug_index` (`slug`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD KEY `user_permission_user_id_foreign` (`user_id`),
  ADD KEY `user_permission_permission_id_foreign` (`permission_id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `order_addresses`
--
ALTER TABLE `order_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_coupons`
--
ALTER TABLE `order_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_permission_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
