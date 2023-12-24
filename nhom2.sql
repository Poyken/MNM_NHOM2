-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 06:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(63) NOT NULL,
  `slug` varchar(63) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `photo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', 'banner-1', '/storage/photos/1/Banner/sh0.jpg', NULL, 'active', '2023-12-23 02:28:11', '2023-12-24 00:40:30'),
(2, 'Banner 2', 'banner-2', '/storage/photos/1/Banner/sh1.jpg', NULL, 'active', '2023-12-24 00:38:01', '2023-12-24 00:38:01'),
(3, 'Banner 3', 'banner-3', '/storage/photos/1/Banner/sh2.jpg', NULL, 'active', '2023-12-24 00:40:57', '2023-12-24 00:40:57'),
(4, 'Banner 4', 'banner-4', '/storage/photos/1/Banner/sh3.jpg', NULL, 'active', '2023-12-24 00:41:12', '2023-12-24 00:41:12'),
(5, 'Banner 5', 'banner-5', '/storage/photos/1/Banner/sh4.jpg', NULL, 'active', '2023-12-24 00:41:46', '2023-12-24 00:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(63) NOT NULL,
  `slug` varchar(63) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Louis Vuitton', 'louis-vuitton', 'active', '2023-12-23 10:16:10', '2023-12-23 10:16:10'),
(2, 'Chanel', 'chanel', 'active', '2023-12-23 10:16:33', '2023-12-23 10:16:33'),
(3, 'Gucci', 'gucci', 'active', '2023-12-23 10:16:40', '2023-12-23 10:16:40'),
(4, 'Hermès', 'hermes', 'active', '2023-12-23 10:16:49', '2023-12-23 10:32:43'),
(5, 'Prada', 'prada', 'active', '2023-12-23 10:16:54', '2023-12-23 10:32:52'),
(6, 'Dior', 'dior', 'active', '2023-12-23 10:17:01', '2023-12-23 10:17:01'),
(7, 'Yves Saint Laurent', 'yves-saint-laurent', 'active', '2023-12-23 10:17:11', '2023-12-23 23:28:17'),
(8, 'Balenciaga', 'balenciaga', 'active', '2023-12-23 10:17:17', '2023-12-23 10:17:17'),
(9, 'Givenchy', 'givenchy', 'active', '2023-12-23 10:17:22', '2023-12-23 10:17:22'),
(10, 'Fendi', 'fendi', 'active', '2023-12-23 10:17:28', '2023-12-23 10:17:28'),
(11, 'Celine', 'celine', 'active', '2023-12-23 10:17:34', '2023-12-23 10:17:34'),
(12, 'Chloé', 'chloe', 'active', '2023-12-23 10:17:41', '2023-12-23 23:28:05'),
(13, 'Coach', 'coach', 'active', '2023-12-23 10:17:46', '2023-12-23 10:17:46'),
(14, 'Kate Spade', 'kate-spade', 'active', '2023-12-23 10:17:52', '2023-12-23 10:17:52'),
(15, 'Burberry', 'burberry', 'active', '2023-12-23 10:17:57', '2023-12-23 10:17:57'),
(16, 'Marc Jacobs', 'marc-jacobs', 'active', '2023-12-23 10:18:02', '2023-12-23 10:18:02'),
(17, 'Bottega Veneta', 'bottega-veneta', 'active', '2023-12-23 10:18:08', '2023-12-23 10:18:08'),
(18, 'Valentino', 'valentino', 'active', '2023-12-23 10:18:13', '2023-12-23 10:18:13'),
(19, 'Alexander McQueen', 'alexander-mcqueen', 'active', '2023-12-23 10:18:19', '2023-12-23 10:18:19'),
(20, 'Longchamp', 'longchamp', 'active', '2023-12-23 10:18:30', '2023-12-23 10:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(10,0) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` enum('new','processing','delivered','failed','cancelled','returned') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `order_id`, `price`, `quantity`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 3, NULL, 165000000, 1, 165000000, 'new', '2023-12-24 02:00:43', '2023-12-24 02:00:43'),
(5, 1, 5, 1, 22500000, 1, 22500000, 'new', '2023-12-24 05:48:01', '2023-12-24 05:55:56'),
(6, 1, 2, NULL, 26000000, 1, 26000000, 'new', '2023-12-24 06:51:56', '2023-12-24 06:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `photo`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Túi đeo chéo', 'tui-deo-cheo', NULL, '/storage/photos/1/DanhMucSanPham/tui-deo-cheo.png', NULL, 'active', '2020-08-13 21:27:10', '2023-12-24 00:59:52'),
(4, 'Túi xách tay', 'tui-xach-tay', NULL, '/storage/photos/1/DanhMucSanPham/tui-xach-tay.png', NULL, 'active', '2020-08-13 21:32:14', '2023-12-24 01:02:50'),
(5, 'Túi clutch', 'tui-clutch', NULL, '/storage/photos/1/DanhMucSanPham/tui-clutch.png', NULL, 'active', '2020-08-13 21:32:49', '2023-12-24 01:02:40'),
(6, 'Túi đeo vai', 'tui-deo-vai', NULL, '/storage/photos/1/DanhMucSanPham/tui-deo-vai.png', NULL, 'active', '2020-08-13 21:33:37', '2023-12-24 01:00:17'),
(7, 'Túi tote', 'tui-tote', NULL, '/storage/photos/1/DanhMucSanPham/tui-tote.png', NULL, 'active', '2020-08-13 21:34:04', '2023-12-24 01:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `type` enum('fixed','percent') NOT NULL DEFAULT 'fixed',
  `value` decimal(20,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `subject` text NOT NULL,
  `email` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `message` longtext NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
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
(6, '2023_11_11_000000_create_banners_table', 1),
(7, '2023_11_11_000001_create_brands_table', 1),
(8, '2023_11_11_000002_create_categories_table', 1),
(9, '2023_11_11_000003_create_products_table', 1),
(10, '2023_11_11_000004_create_shippings_table', 1),
(11, '2023_11_11_000005_create_orders_table', 1),
(12, '2023_11_11_000006_create_carts_table', 1),
(13, '2023_11_11_000007_create_post_categories_table', 1),
(14, '2023_11_11_000008_create_post_tags_table', 1),
(15, '2023_11_11_000009_create_posts_table', 1),
(16, '2023_11_11_000010_create_messages_table', 1),
(17, '2023_11_11_000011_create_notifications_table', 1),
(18, '2023_11_11_000012_create_coupons_table', 1),
(19, '2023_11_11_000013_create_product_reviews_table', 1),
(20, '2023_11_11_000014_create_post_comments_table', 1),
(21, '2023_11_11_000015_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('5904fb33-29f0-47e3-baac-e881cc75696f', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/1\",\"fas\":\"fa-file-alt\"}', NULL, '2023-12-24 05:55:55', '2023-12-24 05:55:55'),
('9608a92c-9c41-47fc-b082-0db4993e564c', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/order\\/2\",\"fas\":\"fa-file-alt\"}', NULL, '2023-12-24 06:54:05', '2023-12-24 06:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `shipping_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon` double(10,0) DEFAULT NULL,
  `total_amount` double(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` enum('cod','banking') NOT NULL DEFAULT 'cod',
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `status` enum('new','process','delivered','cancel') NOT NULL DEFAULT 'new',
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address1` text NOT NULL,
  `address2` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `sub_total`, `shipping_id`, `coupon`, `total_amount`, `quantity`, `payment_method`, `payment_status`, `status`, `first_name`, `last_name`, `email`, `phone`, `address1`, `address2`, `created_at`, `updated_at`) VALUES
(1, 'ORD-UGC9PDVWAH', 1, 22500000, 4, NULL, 22500000, 1, 'cod', 'unpaid', 'new', 'An', 'Nguyễn Văn', 'annv@gmail.com', '0987654321', 'Nguyên Xá, Minh Khai, Bắc Từ Liêm, Hà Nội', NULL, '2023-12-24 05:55:54', '2023-12-24 05:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `summary` text NOT NULL,
  `description` longtext DEFAULT NULL,
  `quote` text DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `tags` varchar(191) DEFAULT NULL,
  `post_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `replied_comment` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `description` longtext DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `photo`, `summary`, `description`, `stock`, `price`, `discount`, `cat_id`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Túi Xách Nữ Louis Vuitton LV Alma BB Monogram', 'tui-lv', '/storage/photos/1/SanPham/LV-01.jpg', '<div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-detail-box\" style=\"margin: 0px; padding: 0px; display: flex; justify-content: flex-start; align-items: flex-start; font-size: var(--fontsize); color: rgb(49, 49, 49); font-family: Arial, Helvetica, sans-serif;\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-title\" style=\"margin: 0px 6px 0px 0px; padding: 0px; color: var(--darkness); min-width: 110px;\"><span style=\"color: rgb(89, 89, 89);\">Xuất xứ:&nbsp;</span><span _ngcontent-vuahanghieu-app-c6=\"\" style=\"margin: 0px; padding: 0px; color: var(--black);\">Pháp</span><br>Giới tính:&nbsp;<span style=\"color: var(--darkness); font-size: var(--fontsize);\">Nữ</span></div></div><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-detail-box\" style=\"margin: 0px; padding: 0px; display: flex; justify-content: flex-start; align-items: flex-start; font-size: var(--fontsize); color: rgb(49, 49, 49); font-family: Arial, Helvetica, sans-serif;\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-title\" style=\"margin: 0px 6px 0px 0px; padding: 0px; color: var(--darkness); min-width: 110px;\">Màu sắc:&nbsp;<span style=\"color: var(--darkness); font-size: var(--fontsize);\">Nâu</span></div></div><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-detail-box\" style=\"margin: 0px; padding: 0px; display: flex; justify-content: flex-start; align-items: flex-start; font-size: var(--fontsize); color: rgb(49, 49, 49); font-family: Arial, Helvetica, sans-serif;\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-title\" style=\"margin: 0px 6px 0px 0px; padding: 0px; color: var(--darkness); min-width: 110px;\">Chất liệu:&nbsp;<span style=\"color: var(--darkness); font-size: var(--fontsize);\">Da bò</span></div></div><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-detail-box\" style=\"margin: 0px; padding: 0px; display: flex; justify-content: flex-start; align-items: flex-start; font-size: var(--fontsize); color: rgb(49, 49, 49); font-family: Arial, Helvetica, sans-serif;\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-title\" style=\"margin: 0px 6px 0px 0px; padding: 0px; color: var(--darkness); min-width: 110px;\">Kích thước:&nbsp;<span style=\"color: var(--darkness); font-size: var(--fontsize);\">12cm x 25cm x 19cm</span></div></div>', '<p>--Mô tả--</p>', 1, 49000000, NULL, 4, 1, 'active', '2023-12-23 11:00:34', '2023-12-23 23:13:19'),
(2, 'Túi Đeo Vai Balenciaga Wallet Black Calf Leather Shoulder Bag Màu Đen Nhũ', 'tui-deo-vai-balenciaga-wallet-black-calf-leather-shoulder-bag-mau-den-nhu', '/storage/photos/1/SanPham/Balenciaga-02.jpg', '<div _ngcontent-vuahanghieu-app-c6=\"\" class=\"by-origin\" style=\"margin: 0px; padding: 0px; color: rgb(89, 89, 89); font-family: Arial, Helvetica, sans-serif;\">Xuất xứ:&nbsp;<span _ngcontent-vuahanghieu-app-c6=\"\" style=\"margin: 0px; padding: 0px; color: var(--black);\">Tây Ban Nha</span></div><div><span _ngcontent-vuahanghieu-app-c6=\"\" style=\"margin: 0px; padding: 0px; color: var(--black);\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-detail-box\" style=\"margin: 0px; padding: 0px; display: flex; justify-content: flex-start; align-items: flex-start; font-size: var(--fontsize); color: rgb(49, 49, 49); font-family: Arial, Helvetica, sans-serif;\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-title\" style=\"margin: 0px 6px 0px 0px; padding: 0px; color: var(--darkness); min-width: 110px;\">Giới tính:&nbsp;<span style=\"color: var(--darkness); font-size: var(--fontsize);\">Nữ</span></div></div><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-detail-box\" style=\"margin: 0px; padding: 0px; display: flex; justify-content: flex-start; align-items: flex-start; font-size: var(--fontsize); color: rgb(49, 49, 49); font-family: Arial, Helvetica, sans-serif;\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-title\" style=\"margin: 0px 6px 0px 0px; padding: 0px; color: var(--darkness); min-width: 110px;\">Màu sắc:&nbsp;<span style=\"color: var(--darkness); font-size: var(--fontsize);\">Đen nhũ</span></div></div><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-detail-box\" style=\"margin: 0px; padding: 0px; display: flex; justify-content: flex-start; align-items: flex-start; font-size: var(--fontsize); color: rgb(49, 49, 49); font-family: Arial, Helvetica, sans-serif;\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-title\" style=\"margin: 0px 6px 0px 0px; padding: 0px; color: var(--darkness); min-width: 110px;\">Chất liệu:&nbsp;<span style=\"color: var(--darkness); font-size: var(--fontsize);\">Da + Vải cao cấp</span></div></div><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-detail-box\" style=\"margin: 0px; padding: 0px; display: flex; justify-content: flex-start; align-items: flex-start; font-size: var(--fontsize); color: rgb(49, 49, 49); font-family: Arial, Helvetica, sans-serif;\"><div _ngcontent-vuahanghieu-app-c6=\"\" class=\"attr-title\" style=\"margin: 0px 6px 0px 0px; padding: 0px; color: var(--darkness); min-width: 110px;\">Kích thước:&nbsp;<span style=\"color: var(--darkness); font-size: var(--fontsize);\">5cm x 12cm x 20cm</span></div></div></span></div>', NULL, 1, 26000000, NULL, 3, 8, 'active', '2023-12-23 23:15:28', '2023-12-23 23:15:28'),
(3, 'Túi Xách Chanel Boy Medium Black Carvia Leather Antique Gold Metal Màu Đen', 'tui-xach-chanel-boy-medium-black-carvia-leather-antique-gold-metal-mau-den', '/storage/photos/1/SanPham/chanel-03.jpg', '<p>Xuất xứ: Pháp</p>', '<p>--Mô tả--</p>', 1, 165000000, NULL, 4, 2, 'active', '2023-12-23 23:18:37', '2023-12-23 23:18:37'),
(4, 'Túi Xách See By Chloé Hana Shoulder Bag Màu Trắng Kem', 'tui-xach-see-by-chloe-hana-shoulder-bag-mau-trang-kem', '/storage/photos/1/SanPham/chloe-05.jpg', '<p>Xuất xứ: Pháp</p><p>Giới tính: Nữ</p><p>Màu sắc: Trắng kem</p><p>Chất liệu: Da cao cấp</p><p>Kích thước: 18 x 22cm x 9cm</p>', NULL, 1, 6390000, NULL, 4, 12, 'active', '2023-12-23 23:27:37', '2023-12-23 23:27:37'),
(5, 'Túi Đeo Chéo Nữ Gucci Dionysus Super Mini Bag Màu Đen Xám', 'tui-deo-cheo-nu-gucci-dionysus-super-mini-bag-mau-den-xam', '/storage/photos/1/SanPham/GuCi-02.jpg', '<p>Xuất xứ: Ý<br></p><p>Giới tính:&nbsp;<span style=\"font-size: 1rem;\">Nữ</span></p><p>Màu sắc:&nbsp;<span style=\"font-size: 1rem;\">Đen xám</span></p><p>Chất liệu:&nbsp;<span style=\"font-size: 1rem;\">Canvas, Da</span></p><p>Kích thước:&nbsp;<span style=\"font-size: 1rem;\">10cm x 16.5cm x 4.5cm</span></p>', NULL, 1, 22500000, NULL, 3, 3, 'active', '2023-12-23 23:31:00', '2023-12-23 23:31:00'),
(6, 'Túi Xách Dior Pochette Lady Con Asa Superior S0980ONMJ M900 Màu Đen', 'tui-xach-dior-pochette-lady-con-asa-superior-s0980onmj-m900-mau-den', '/storage/photos/1/SanPham/Dior-03.jpg', '<p>Xuất xứ: Pháp</p><p>Giới tính:&nbsp;<span style=\"font-size: 1rem;\">Nữ</span></p><p>Màu sắc:&nbsp;<span style=\"font-size: 1rem;\">Đen</span></p><p>Chất liệu:&nbsp;<span style=\"font-size: 1rem;\">Da cao cấp</span></p><p>Kích thước:&nbsp;<span style=\"font-size: 1rem;\">11.5cm x 4.5cm x 21cm</span></p>', NULL, 1, 65000000, NULL, 5, 6, 'active', '2023-12-23 23:37:52', '2023-12-23 23:37:52'),
(7, 'Túi Xách Hermès Garden Party 30 Bag Màu Kem', 'tui-xach-hermes-garden-party-30-bag-mau-kem', '/storage/photos/1/SanPham/hermes-01.jpg', '<p>Xuất xứ: Pháp</p><p>Giới tính:&nbsp;<span style=\"font-size: 1rem;\">Nữ</span></p><p>Màu sắc:&nbsp;<span style=\"font-size: 1rem;\">Kem</span></p><p>Chất liệu:&nbsp;<span style=\"font-size: 1rem;\">Da / Vải</span></p><p>Kích thước:&nbsp;<span style=\"font-size: 1rem;\">10cm x 30cm x 20cm</span></p>', NULL, 1, 82700000, NULL, 7, 4, 'active', '2023-12-24 01:53:51', '2023-12-24 01:53:51'),
(8, 'Túi Đeo Vai Prada Saffiano Leather Mini Envelope Bag 1BP020_2EVU_F0002_V_N2O Màu Đen', 'tui-deo-vai-prada-saffiano-leather-mini-envelope-bag-1bp020-2evu-f0002-v-n2o-mau-den', '/storage/photos/1/SanPham/prada-01.jpg', '<p>Xuất xứ: Ý</p><p>Giới tính:&nbsp;<span style=\"font-size: 1rem;\">Nữ</span></p><p>Màu sắc:&nbsp;<span style=\"font-size: 1rem;\">Đen</span></p><p>Chất liệu:&nbsp;<span style=\"font-size: 1rem;\">Nylon / Da</span></p><p>Kích thước:&nbsp;<span style=\"font-size: 1rem;\">4cm x 12cm x 20cm</span></p>', NULL, 1, 45700000, NULL, 6, 5, 'active', '2023-12-24 01:57:04', '2023-12-24 01:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT 0,
  `review` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(127) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `photo`, `description`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, '/storage/photos/1/CuaHang/HaUI-logo.jpg', '/storage/photos/1/CuaHang/HaUI-logo.jpg', 'Chào mừng quý khách đến với \"Lharmés Bags\" - điểm đến lý tưởng cho những tín đồ thời trang và đam mê túi xách nữ. Tại cửa hàng của chúng tôi, quý khách&nbsp;sẽ khám phá một thế giới đa dạng và phong phú của những chiếc túi xách tinh tế, phản ánh đẳng cấp và phong cách riêng biệt. Với sự kết hợp hoàn hảo giữa chất liệu chất lượng cao, thiết kế sáng tạo và sự tận tâm trong từng đường may, \"Lharmés Bags\"&nbsp;không chỉ là nơi để mua sắm mà còn là trải nghiệm thú vị cho những người yêu thời trang. Hãy để chúng tôi làm nổi bật phong cách và cá tính của quý khách thông qua bộ sưu tập độc đáo của chúng tôi, nơi mà sự quan tâm đến chi tiết được đặt lên hàng đầu. Hãy đến và khám phá \"Lharmés Bags\" ngay hôm nay để tìm kiếm chiếc túi xách hoàn hảo làm tôn lên vẻ đẹp của quý khách!<br>', 'Bắc Từ Liêm, Hà Nội', '0123456789', 'shoptuixach@email.com', NULL, '2023-12-24 01:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(15) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `type`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Thường', 20000, 'active', '2023-12-24 06:50:46', '2023-12-24 06:50:46'),
(2, 'Nhanh', 40000, 'active', '2023-12-24 06:51:01', '2023-12-24 06:51:01'),
(3, 'Hoả tốc', 100000, 'active', '2023-12-24 06:51:11', '2023-12-24 06:51:11'),
(4, 'Miễn phí', 0, 'active', '2023-12-24 06:51:27', '2023-12-24 06:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(63) NOT NULL,
  `email` varchar(127) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', NULL, '$2y$10$3tQyBygmXq8jbTc.RLydDujUMkVsD6qbu4JkJtm.sahnW/IkuagCm', NULL, 'admin', 'active', NULL, '2023-11-10 17:00:00', NULL),
(2, 'USER', 'user@email.com', NULL, '$2y$10$UN.r5i5/DSGX8g/X7Wzbuuz74D5QfdJsM.g4kXpfbdPOG6hMSc9Bu', NULL, 'user', 'active', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_added_by_foreign` (`added_by`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

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
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  ADD KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  ADD KEY `posts_added_by_foreign` (`added_by`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_tags_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_post_cat_id_foreign` FOREIGN KEY (`post_cat_id`) REFERENCES `post_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_post_tag_id_foreign` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tags` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
