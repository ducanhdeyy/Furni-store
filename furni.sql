-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for furni
CREATE DATABASE IF NOT EXISTS `furni` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `furni`;

-- Dumping structure for table furni.backgrounds
CREATE TABLE IF NOT EXISTS `backgrounds` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.backgrounds: ~0 rows (approximately)

-- Dumping structure for table furni.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.banners: ~0 rows (approximately)
INSERT INTO `banners` (`id`, `name`, `path_image`, `description`, `path_link`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Modern Interior Design Studio', 'uploads/banner/1695556934couch.png', 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.', NULL, 1, NULL, '2023-09-20 20:33:20', '2023-09-24 05:35:33');

-- Dumping structure for table furni.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.blogs: ~9 rows (approximately)
INSERT INTO `blogs` (`id`, `user_id`, `title`, `path_image`, `content`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 2, 'First Time Home Owner Ideas', 'uploads/blog/1695568401post-1.jpg', 'đẹp mê ly', 1, NULL, '2023-09-24', '2023-09-24 08:13:21'),
	(2, 1, 'How To Keep Your Furniture Clean', 'uploads/blog/1695569149post-2.jpg', 'đẹp vãi', 1, NULL, '2023-09-24', '2023-09-24 08:25:49'),
	(3, 2, 'Small Space Furniture Apartment Ideas', 'uploads/blog/1695569206post-3.jpg', 'đẹp chưa', 1, NULL, '2023-09-24', '2023-09-24 08:26:46'),
	(4, 2, 'First Time Home Owner Ideas', 'uploads/blog/1695607257post-1.jpg', 'đẹp', 1, NULL, '2023-09-25', '2023-09-24 19:00:57'),
	(5, 1, 'How To Keep Your Furniture Clean', 'uploads/blog/1695607288post-2.jpg', 'đẹp', 1, NULL, '2023-09-25', '2023-09-24 19:01:28'),
	(6, 2, 'Small Space Furniture Apartment Ideas', 'uploads/blog/1695607329post-3.jpg', 'đẹp vãi', 1, NULL, '2023-09-25', '2023-09-24 19:02:09'),
	(7, 2, 'First Time Home Owner Ideas', 'uploads/blog/1695607347post-1.jpg', 'đẹp vãi', 1, NULL, '2023-09-25', '2023-09-24 19:02:27'),
	(8, 1, 'How To Keep Your Furniture Clean', 'uploads/blog/1695607360post-2.jpg', 'đẹp vãi', 1, NULL, '2023-09-25', '2023-09-24 19:02:40'),
	(9, 2, 'Small Space Furniture Apartment Ideas', 'uploads/blog/1695607381post-3.jpg', 'đẹp vãi', 1, NULL, '2023-09-25', '2023-09-24 19:03:01');

-- Dumping structure for table furni.blog_comments
CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.blog_comments: ~0 rows (approximately)

-- Dumping structure for table furni.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.brands: ~0 rows (approximately)
INSERT INTO `brands` (`id`, `name`, `path_image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Nguyen Duc Anh 1', 'uploads/brand/1695267288331554261_565628505625931_2489934859021835637_n.jpg', 0, NULL, '2023-09-20 20:34:48', '2023-09-20 20:34:58');

-- Dumping structure for table furni.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.categories: ~2 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `parent_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Table', 0, 0, '2023-09-20 21:28:13', '2023-09-24 04:48:05', NULL),
	(2, 'Chair', 0, 1, '2023-09-20 21:28:33', '2023-09-24 04:48:16', NULL);

-- Dumping structure for table furni.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.contacts: ~0 rows (approximately)

-- Dumping structure for table furni.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.customers: ~3 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `path_image`, `phone`, `address`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Nguyen Duc Anh', 'lanhnhubang2k3@gmail.com', NULL, '$2y$10$wNVC2JH3Nt.n/2cvKgnFxOz3AXWS/b4Kifc9HjXfB8qGUvw23vsC2', 'uploads/users/1695883801person_1.jpg', '0368353135', 'Hà Nội', NULL, NULL, '2023-09-27 23:50:01', '2023-09-27 23:50:01'),
	(2, 'Hung', 'Hung@gmail.com', NULL, '$2y$10$ETaBOOQRrF.L.HHP7XHHrO0/yVRHXmmrAXk7azg5ZI17jBeGTSWm6', NULL, '0336065900', 'Thị xã Phú Thọ, Phú Thọ', NULL, NULL, '2023-10-04 00:38:09', '2023-10-04 00:38:09'),
	(3, 'Nguyễn Đức Anh', 'ducanhnguyen@gmail.com', NULL, '$2y$10$njYfYsX7jwL4FppB4wF7eObOX6/uw28HqBKojvcpC.WIZhXZsud4a', NULL, '0368353135', 'Hà Nội', NULL, NULL, '2023-10-04 00:50:18', '2023-10-04 00:50:18');

-- Dumping structure for table furni.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table furni.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.menus: ~1 rows (approximately)
INSERT INTO `menus` (`id`, `name`, `parent_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Nguyen Duc Anh 1', 0, 0, NULL, '2023-09-20 20:32:10', '2023-09-20 20:32:21');

-- Dumping structure for table furni.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.migrations: ~31 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_11_30_020219_create_categories_table', 1),
	(6, '2022_11_30_152048_create_add_column_user_table', 1),
	(7, '2022_11_30_155337_create_add_column_phone_user_table', 1),
	(8, '2022_12_02_004922_create_menus_table', 1),
	(9, '2022_12_02_011030_create_brands_table', 1),
	(10, '2022_12_03_014156_create_banners_table', 1),
	(11, '2022_12_03_025400_create_products_table', 1),
	(12, '2022_12_03_025454_create_product_colors_table', 1),
	(13, '2022_12_03_025508_create_product_images_table', 1),
	(14, '2022_12_03_085647_create_colors_table', 1),
	(15, '2022_12_04_090324_create_roles_table', 1),
	(16, '2022_12_04_090343_create_permissions_table', 1),
	(17, '2022_12_04_090425_role_user', 1),
	(18, '2022_12_04_090441_role_permission', 1),
	(19, '2022_12_06_034026_create_orders_table', 1),
	(20, '2022_12_06_034042_create_order_details_table', 1),
	(21, '2022_12_06_133010_create_backgrounds_table', 1),
	(22, '2022_12_06_141204_create_product_sizes_table', 1),
	(23, '2022_12_06_141224_create_sizes_table', 1),
	(24, '2022_12_11_074359_create_contacts_table', 1),
	(25, '2022_12_11_081443_create_porduct_comments_table', 1),
	(26, '2022_12_12_033616_create_blogs_table', 1),
	(27, '2022_12_13_014433_create_blog_comments_table', 1),
	(28, '2022_12_15_124919_create_customers_table', 1),
	(29, '2022_12_25_022918_create_tbl_socials_table', 1),
	(30, '2022_12_28_031514_alter2_customerss_table', 1),
	(31, '2023_09_21_042358_create_blogs_table', 2);

-- Dumping structure for table furni.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `payment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.orders: ~3 rows (approximately)
INSERT INTO `orders` (`id`, `customer_id`, `name`, `address`, `email`, `phone`, `status`, `payment_name`, `total`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Nguyen Duc Anh', 'Hà Nội', 'lanhnhubang2k3@gmail.com', '0368353135', 1, 'pay_last', '', '2023-09-29 02:27:59', '2023-09-29 02:27:59'),
	(2, 1, 'Nguyen Duc Anh', 'Hà Nội', 'lanhnhubang2k3@gmail.com', '0368353135', 2, 'pay_last}', '', '2023-09-29 02:31:45', '2023-10-04 00:01:05'),
	(3, 1, 'Nguyen Duc Anh', 'Hà Nội', 'lanhnhubang2k3@gmail.com', '0368353135', 1, 'pay_last', '', '2023-09-29 02:35:56', '2023-09-29 02:35:56'),
	(7, 3, 'Nguyễn Đức Anh', 'Hà Nội', 'ducanhnguyen@gmail.com', '0368353135', 3, 'pay_last}', '250', '2023-10-04 00:52:45', '2023-10-04 00:53:59');

-- Dumping structure for table furni.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.order_details: ~4 rows (approximately)
INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `quantity`, `price`, `total`, `created_at`, `updated_at`) VALUES
	(1, '1', '3', '1', '50', '50', '2023-09-29 02:27:59', '2023-09-29 02:27:59'),
	(2, '4', '3', '6', '78', '468', '2023-09-29 02:27:59', '2023-09-29 02:27:59'),
	(3, '5', '4', '1', '43', '43', '2023-09-29 02:31:45', '2023-09-29 02:31:45'),
	(4, '3', '5', '1', '50', '50', '2023-09-29 02:35:56', '2023-09-29 02:35:56'),
	(5, '3', '7', '5', '50', '250', '2023-10-04 00:52:45', '2023-10-04 00:52:45');

-- Dumping structure for table furni.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.password_resets: ~0 rows (approximately)

-- Dumping structure for table furni.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.permissions: ~53 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `parent_id`, `key_code`, `created_at`, `updated_at`) VALUES
	(1, 'category', 0, NULL, NULL, NULL),
	(2, 'category.index', 1, 'category.index', '2023-10-01 19:48:36', '2023-10-01 19:48:36'),
	(3, 'category.create', 1, 'category.create', '2023-10-01 19:48:36', '2023-10-01 19:48:36'),
	(4, 'category.store', 1, 'category.store', '2023-10-01 19:48:36', '2023-10-01 19:48:36'),
	(5, 'category.show', 1, 'category.show', '2023-10-01 19:48:36', '2023-10-01 19:48:36'),
	(6, 'category.edit', 1, 'category.edit', '2023-10-01 19:48:36', '2023-10-01 19:48:36'),
	(7, 'category.update', 1, 'category.update', '2023-10-01 19:48:36', '2023-10-01 19:48:36'),
	(8, 'category.destroy', 1, 'category.destroy', '2023-10-01 19:48:36', '2023-10-01 19:48:36'),
	(9, 'banner', 0, NULL, NULL, NULL),
	(10, 'banner.index', 9, 'banner.index', '2023-10-01 19:50:19', '2023-10-01 19:50:19'),
	(11, 'banner.create', 9, 'banner.create', '2023-10-01 19:50:19', '2023-10-01 19:50:19'),
	(12, 'banner.store', 9, 'banner.store', '2023-10-01 19:50:19', '2023-10-01 19:50:19'),
	(13, 'banner.show', 9, 'banner.show', '2023-10-01 19:50:19', '2023-10-01 19:50:19'),
	(14, 'banner.edit', 9, 'banner.edit', '2023-10-01 19:50:19', '2023-10-01 19:50:19'),
	(15, 'banner.update', 9, 'banner.update', '2023-10-01 19:50:19', '2023-10-01 19:50:19'),
	(16, 'banner.destroy', 9, 'banner.destroy', '2023-10-01 19:50:19', '2023-10-01 19:50:19'),
	(17, 'menu', 0, NULL, NULL, NULL),
	(18, 'menu.index', 17, 'menu.index', '2023-10-01 19:59:10', '2023-10-01 19:59:10'),
	(19, 'menu.create', 17, 'menu.create', '2023-10-01 19:59:10', '2023-10-01 19:59:10'),
	(20, 'menu.store', 17, 'menu.store', '2023-10-01 19:59:10', '2023-10-01 19:59:10'),
	(21, 'menu.show', 17, 'menu.show', '2023-10-01 19:59:10', '2023-10-01 19:59:10'),
	(22, 'menu.edit', 17, 'menu.edit', '2023-10-01 19:59:10', '2023-10-01 19:59:10'),
	(23, 'menu.update', 17, 'menu.update', '2023-10-01 19:59:10', '2023-10-01 19:59:10'),
	(24, 'menu.destroy', 17, 'menu.destroy', '2023-10-01 19:59:10', '2023-10-01 19:59:10'),
	(25, 'role', 0, NULL, NULL, NULL),
	(26, 'role.index', 25, 'role.index', '2023-10-01 19:59:19', '2023-10-01 19:59:19'),
	(27, 'role.create', 25, 'role.create', '2023-10-01 19:59:19', '2023-10-01 19:59:19'),
	(28, 'role.store', 25, 'role.store', '2023-10-01 19:59:19', '2023-10-01 19:59:19'),
	(29, 'role.show', 25, 'role.show', '2023-10-01 19:59:19', '2023-10-01 19:59:19'),
	(30, 'role.edit', 25, 'role.edit', '2023-10-01 19:59:19', '2023-10-01 19:59:19'),
	(31, 'role.update', 25, 'role.update', '2023-10-01 19:59:19', '2023-10-01 19:59:19'),
	(32, 'role.destroy', 25, 'role.destroy', '2023-10-01 19:59:19', '2023-10-01 19:59:19'),
	(33, 'user', 0, NULL, NULL, NULL),
	(34, 'user.index', 33, 'user.index', '2023-10-01 19:59:29', '2023-10-01 19:59:29'),
	(35, 'user.create', 33, 'user.create', '2023-10-01 19:59:29', '2023-10-01 19:59:29'),
	(36, 'user.store', 33, 'user.store', '2023-10-01 19:59:29', '2023-10-01 19:59:29'),
	(37, 'user.show', 33, 'user.show', '2023-10-01 19:59:29', '2023-10-01 19:59:29'),
	(38, 'user.edit', 33, 'user.edit', '2023-10-01 19:59:29', '2023-10-01 19:59:29'),
	(39, 'user.update', 33, 'user.update', '2023-10-01 19:59:29', '2023-10-01 19:59:29'),
	(40, 'user.destroy', 33, 'user.destroy', '2023-10-01 19:59:29', '2023-10-01 19:59:29'),
	(41, 'product', 0, NULL, NULL, NULL),
	(42, 'product.index', 41, 'product.index', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(43, 'product.create', 41, 'product.create', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(44, 'product.store', 41, 'product.store', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(45, 'product.show', 41, 'product.show', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(46, 'product.edit', 41, 'product.edit', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(47, 'product.update', 41, 'product.update', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(48, 'product.destroy', 41, 'product.destroy', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(49, 'product_detail', 41, 'product_detail', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(50, 'product_cart_update', 41, 'product_cart_update', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(51, 'product_cart_checkout', 41, 'product_cart_checkout', '2023-10-01 19:59:52', '2023-10-01 19:59:52'),
	(52, 'permission', 0, NULL, NULL, NULL),
	(53, 'permission.index', 52, 'permission.index', '2023-10-01 20:00:04', '2023-10-01 20:00:04'),
	(54, 'permission.create', 52, 'permission.create', '2023-10-01 20:00:04', '2023-10-01 20:00:04'),
	(55, 'permission.store', 52, 'permission.store', '2023-10-01 20:00:04', '2023-10-01 20:00:04'),
	(56, 'permission.show', 52, 'permission.show', '2023-10-01 20:00:04', '2023-10-01 20:00:04'),
	(57, 'permission.edit', 52, 'permission.edit', '2023-10-01 20:00:04', '2023-10-01 20:00:04'),
	(58, 'permission.update', 52, 'permission.update', '2023-10-01 20:00:04', '2023-10-01 20:00:04'),
	(59, 'permission.destroy', 52, 'permission.destroy', '2023-10-01 20:00:04', '2023-10-01 20:00:04'),
	(60, 'order', 0, NULL, NULL, NULL),
	(61, 'order.index', 60, 'order.index', '2023-10-03 23:51:51', '2023-10-03 23:51:51'),
	(62, 'order.create', 60, 'order.create', '2023-10-03 23:51:51', '2023-10-03 23:51:51'),
	(63, 'order.store', 60, 'order.store', '2023-10-03 23:51:51', '2023-10-03 23:51:51'),
	(64, 'order.show', 60, 'order.show', '2023-10-03 23:51:51', '2023-10-03 23:51:51'),
	(65, 'order.edit', 60, 'order.edit', '2023-10-03 23:51:51', '2023-10-03 23:51:51'),
	(66, 'order.update', 60, 'order.update', '2023-10-03 23:51:51', '2023-10-03 23:51:51'),
	(67, 'order.destroy', 60, 'order.destroy', '2023-10-03 23:51:51', '2023-10-03 23:51:51');

-- Dumping structure for table furni.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table furni.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `amount` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `category_id` int NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.products: ~8 rows (approximately)
INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `amount`, `title`, `description`, `path_image`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Nordic Chair', 50.00, 0.00, 99, 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio', 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio', 'uploads/product/1695555990product-3.png', 2, NULL, NULL, '2023-09-29 02:27:59'),
	(3, 'Nordic Chair', 50.00, 0.00, 94, 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio', 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio', 'uploads/product/1695556263product-1.png', 2, NULL, NULL, '2023-10-04 00:52:45'),
	(4, 'Kruzo Aero Chair', 78.00, 0.00, 94, 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio', 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio', 'uploads/product/1695556397product-2.png', 2, NULL, NULL, '2023-09-29 02:27:59'),
	(5, 'Ergonomic Chair', 43.00, 0.00, 99, 'đẹp', 'đẹp', 'uploads/product/1695556482product-3.png', 2, NULL, NULL, '2023-09-29 02:31:45'),
	(6, 'Nordic Chair', 50.00, 0.00, 100, 'đẹp', 'đẹp', 'uploads/product/1695556521product-3.png', 2, NULL, NULL, NULL),
	(7, 'Nordic Chair', 50.00, 0.00, 100, 'đẹp', 'đẹp', 'uploads/product/1695556556product-1.png', 2, NULL, NULL, NULL),
	(8, 'Kruzo Aero Chair', 78.00, 0.00, 100, 'đẹp', 'đẹp', 'uploads/product/1695556714product-2.png', 2, NULL, NULL, '2023-09-24 04:59:25'),
	(9, 'Ergonomic Chair', 43.00, 0.00, 100, 'đẹp', 'đẹp', 'uploads/product/1695556752product-3.png', 2, NULL, NULL, '2023-09-24 04:59:35');

-- Dumping structure for table furni.product_comments
CREATE TABLE IF NOT EXISTS `product_comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.product_comments: ~0 rows (approximately)

-- Dumping structure for table furni.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.product_images: ~8 rows (approximately)
INSERT INTO `product_images` (`id`, `path_image`, `product_id`, `created_at`, `updated_at`) VALUES
	(3, 'uploads/productImage/1695555990product-3.png', 2, '2023-09-24 04:46:30', '2023-09-24 04:46:30'),
	(4, 'uploads/productImage/1695556263product-2.png', 3, '2023-09-24 04:51:03', '2023-09-24 04:51:03'),
	(5, 'uploads/productImage/1695556397product-2.png', 4, '2023-09-24 04:53:17', '2023-09-24 04:53:17'),
	(6, 'uploads/productImage/1695556482product-3.png', 5, '2023-09-24 04:54:42', '2023-09-24 04:54:42'),
	(7, 'uploads/productImage/1695556521product-3.png', 6, '2023-09-24 04:55:21', '2023-09-24 04:55:21'),
	(8, 'uploads/productImage/1695556556product-1.png', 7, '2023-09-24 04:55:56', '2023-09-24 04:55:56'),
	(9, 'uploads/productImage/1695556714product-2.png', 8, '2023-09-24 04:58:34', '2023-09-24 04:58:34'),
	(10, 'uploads/productImage/1695556752product-3.png', 9, '2023-09-24 04:59:12', '2023-09-24 04:59:12'),
	(19, 'uploads/productImage/1695800175ghe_2-removebg-preview.png', 1, '2023-09-27 00:36:15', '2023-09-27 00:36:15'),
	(20, 'uploads/productImage/1695800175product-3.png', 1, '2023-09-27 00:36:15', '2023-09-27 00:36:15');

-- Dumping structure for table furni.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.roles: ~1 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
	(2, 'Admin', 'Admin', '2023-09-20 19:28:41', '2023-09-20 19:28:41'),
	(4, 'Admin2', 'Admin2', '2023-10-01 20:34:07', '2023-10-01 20:34:07');

-- Dumping structure for table furni.role_permissions
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.role_permissions: ~104 rows (approximately)
INSERT INTO `role_permissions` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 2, NULL, NULL),
	(2, 3, 3, NULL, NULL),
	(3, 3, 4, NULL, NULL),
	(4, 3, 5, NULL, NULL),
	(5, 3, 6, NULL, NULL),
	(6, 3, 7, NULL, NULL),
	(7, 3, 8, NULL, NULL),
	(8, 3, 10, NULL, NULL),
	(9, 3, 11, NULL, NULL),
	(10, 3, 12, NULL, NULL),
	(11, 3, 13, NULL, NULL),
	(12, 3, 14, NULL, NULL),
	(13, 3, 15, NULL, NULL),
	(14, 3, 16, NULL, NULL),
	(15, 3, 18, NULL, NULL),
	(16, 3, 19, NULL, NULL),
	(17, 3, 20, NULL, NULL),
	(18, 3, 21, NULL, NULL),
	(19, 3, 22, NULL, NULL),
	(20, 3, 23, NULL, NULL),
	(21, 3, 24, NULL, NULL),
	(22, 3, 26, NULL, NULL),
	(23, 3, 27, NULL, NULL),
	(24, 3, 28, NULL, NULL),
	(25, 3, 29, NULL, NULL),
	(26, 3, 30, NULL, NULL),
	(27, 3, 31, NULL, NULL),
	(28, 3, 32, NULL, NULL),
	(29, 3, 34, NULL, NULL),
	(30, 3, 35, NULL, NULL),
	(31, 3, 36, NULL, NULL),
	(32, 3, 37, NULL, NULL),
	(33, 3, 38, NULL, NULL),
	(34, 3, 39, NULL, NULL),
	(35, 3, 40, NULL, NULL),
	(36, 3, 42, NULL, NULL),
	(37, 3, 43, NULL, NULL),
	(38, 3, 44, NULL, NULL),
	(39, 3, 45, NULL, NULL),
	(40, 3, 46, NULL, NULL),
	(41, 3, 47, NULL, NULL),
	(42, 3, 48, NULL, NULL),
	(43, 3, 49, NULL, NULL),
	(44, 3, 50, NULL, NULL),
	(45, 3, 51, NULL, NULL),
	(46, 3, 53, NULL, NULL),
	(47, 3, 54, NULL, NULL),
	(48, 3, 55, NULL, NULL),
	(49, 3, 56, NULL, NULL),
	(50, 3, 57, NULL, NULL),
	(51, 3, 58, NULL, NULL),
	(52, 3, 59, NULL, NULL),
	(53, 2, 2, NULL, NULL),
	(54, 2, 3, NULL, NULL),
	(55, 2, 4, NULL, NULL),
	(56, 2, 5, NULL, NULL),
	(57, 2, 6, NULL, NULL),
	(58, 2, 7, NULL, NULL),
	(59, 2, 8, NULL, NULL),
	(60, 2, 10, NULL, NULL),
	(61, 2, 11, NULL, NULL),
	(62, 2, 12, NULL, NULL),
	(63, 2, 13, NULL, NULL),
	(64, 2, 14, NULL, NULL),
	(65, 2, 15, NULL, NULL),
	(66, 2, 16, NULL, NULL),
	(67, 2, 18, NULL, NULL),
	(68, 2, 19, NULL, NULL),
	(69, 2, 20, NULL, NULL),
	(70, 2, 21, NULL, NULL),
	(71, 2, 22, NULL, NULL),
	(72, 2, 23, NULL, NULL),
	(73, 2, 24, NULL, NULL),
	(74, 2, 26, NULL, NULL),
	(75, 2, 27, NULL, NULL),
	(76, 2, 28, NULL, NULL),
	(77, 2, 29, NULL, NULL),
	(78, 2, 30, NULL, NULL),
	(79, 2, 31, NULL, NULL),
	(80, 2, 32, NULL, NULL),
	(81, 2, 34, NULL, NULL),
	(82, 2, 35, NULL, NULL),
	(83, 2, 36, NULL, NULL),
	(84, 2, 37, NULL, NULL),
	(85, 2, 38, NULL, NULL),
	(86, 2, 39, NULL, NULL),
	(87, 2, 40, NULL, NULL),
	(88, 2, 42, NULL, NULL),
	(89, 2, 43, NULL, NULL),
	(90, 2, 44, NULL, NULL),
	(91, 2, 45, NULL, NULL),
	(92, 2, 46, NULL, NULL),
	(93, 2, 47, NULL, NULL),
	(94, 2, 48, NULL, NULL),
	(95, 2, 49, NULL, NULL),
	(96, 2, 50, NULL, NULL),
	(97, 2, 51, NULL, NULL),
	(98, 2, 53, NULL, NULL),
	(99, 2, 54, NULL, NULL),
	(100, 2, 55, NULL, NULL),
	(101, 2, 56, NULL, NULL),
	(102, 2, 57, NULL, NULL),
	(103, 2, 58, NULL, NULL),
	(104, 2, 59, NULL, NULL),
	(105, 4, 2, NULL, NULL),
	(106, 4, 10, NULL, NULL),
	(107, 4, 18, NULL, NULL),
	(108, 4, 26, NULL, NULL),
	(109, 4, 34, NULL, NULL),
	(110, 4, 42, NULL, NULL),
	(111, 4, 53, NULL, NULL),
	(112, 2, 61, NULL, NULL),
	(113, 2, 62, NULL, NULL),
	(114, 2, 63, NULL, NULL),
	(115, 2, 64, NULL, NULL),
	(116, 2, 65, NULL, NULL),
	(117, 2, 66, NULL, NULL),
	(118, 2, 67, NULL, NULL);

-- Dumping structure for table furni.role_users
CREATE TABLE IF NOT EXISTS `role_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.role_users: ~1 rows (approximately)
INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(4, 1, 2, NULL, NULL),
	(5, 2, 4, NULL, NULL);

-- Dumping structure for table furni.tbl_socials
CREATE TABLE IF NOT EXISTS `tbl_socials` (
  `id` int NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.tbl_socials: ~0 rows (approximately)

-- Dumping structure for table furni.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table furni.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `image`, `address`, `phone`) VALUES
	(1, 'Robert Fox', 'lanhnhubang2k2@gmail.com', NULL, '$2y$10$lCSHZIGzGNjocP92A54y6udwO07NrnqbDxLRaVUvB9HJmQ/qGirXi', NULL, NULL, '2023-09-20 20:56:50', '2023-09-24 08:21:17', 'uploads/users/1695268610331554261_565628505625931_2489934859021835637_n.jpg', 'Hà Nội', '0368353135'),
	(2, 'Kristin Watson', 'lanhnhubang2k@gmail.com', NULL, '$2y$10$9UdGsNR9xqvmBu335O8TWe/br/z1jZdlYtows9ExDUhX88RrJtCPW', NULL, NULL, '2023-09-23 07:49:39', '2023-09-24 08:20:59', 'uploads/users/1695568828273442913_1086595465514027_7129215462402483553_n.jpg', 'Hà Nội', '0368353135');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
