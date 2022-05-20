-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2022 г., 15:38
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_en`, `code`, `description`, `description_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Мобильные телефоны', 'Mobile phones', 'mobiles', 'В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!', NULL, 'categories/mobile.jpg', NULL, NULL),
(2, 'Портативная техника', 'Portable', 'portable', 'Раздел с портативной техникой.', NULL, 'products/iphone_x_silver.jpg', NULL, NULL),
(3, 'Бытовая техника', 'Appliances', 'appliances', 'Раздел с бытовой техникой', NULL, 'categories/appliance.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `rate` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `symbol`, `is_main`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'RUB', '₽', 1, 1, '2022-05-05 21:43:33', '2022-05-05 21:43:33'),
(2, 'USD', '$', 0, 65, '2022-05-05 21:43:33', '2022-05-05 21:43:33'),
(3, 'EUR', '€', 0, 70, '2022-05-05 21:43:33', '2022-05-05 21:43:33');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_25_203434_create_products_table', 2),
(7, '2022_04_25_203932_create_categories_table', 2),
(8, '2022_04_25_232818_create_orders_table', 3),
(9, '2022_04_25_233158_create_order_product_table', 3),
(10, '2022_04_26_010856_add_column_count_to_order_product_table', 4),
(11, '2022_04_28_180716_add_column_admin_to_users_table', 5),
(12, '2022_04_28_183355_add_column_user_id_to_orders_table', 6),
(13, '2022_05_01_215732_add_column_to_products_table', 7),
(14, '2022_05_05_000631_create_subscriptions_table', 8),
(15, '2022_05_05_230800_add_column_locale_to_products_table', 8),
(16, '2022_05_05_231016_add_column_locale_to_categories_table', 8),
(17, '2022_05_06_003450_create_currencies_table', 9),
(18, '2022_05_07_211123_add_column_sum_and_currency_id_to_orders_table', 10),
(19, '2022_05_07_211215_add_column_price_to_order_product_table', 10),
(20, '2022_05_11_233436_create_skus_table', 11),
(21, '2022_05_11_233536_create_properties_table', 11),
(22, '2022_05_11_233551_create_property_options_table', 11),
(23, '2022_05_11_233815_create_sku_property_options', 11),
(24, '2022_05_11_233841_create_property_product', 11),
(25, '2022_05_15_205047_add_column_soft_deleted_to_properties_table', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `currency_id` bigint UNSIGNED NOT NULL,
  `sum` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `status`, `created_at`, `updated_at`, `user_id`, `currency_id`, `sum`) VALUES
(1, NULL, NULL, 0, '2022-04-25 20:54:30', '2022-04-25 20:54:30', 1, 0, 0),
(2, NULL, NULL, 0, '2022-04-25 20:54:35', '2022-04-25 20:54:35', 1, 0, 0),
(3, NULL, NULL, 0, '2022-04-25 20:54:38', '2022-04-25 20:54:38', 1, 0, 0),
(4, NULL, NULL, 0, '2022-04-25 20:54:43', '2022-04-25 20:54:43', 1, 0, 0),
(5, NULL, NULL, 0, '2022-04-25 20:55:58', '2022-04-25 20:55:58', NULL, 0, 0),
(6, NULL, NULL, 0, '2022-04-25 20:56:02', '2022-04-25 20:56:02', NULL, 0, 0),
(7, NULL, NULL, 0, '2022-04-25 20:56:05', '2022-04-25 20:56:05', NULL, 0, 0),
(8, NULL, NULL, 0, '2022-04-25 20:56:44', '2022-04-25 20:56:44', NULL, 0, 0),
(9, NULL, NULL, 0, '2022-04-25 20:57:56', '2022-04-25 20:57:56', NULL, 0, 0),
(10, NULL, NULL, 0, '2022-04-25 20:57:59', '2022-04-25 20:57:59', NULL, 0, 0),
(11, NULL, NULL, 0, '2022-04-25 21:20:33', '2022-04-25 21:20:33', NULL, 0, 0),
(12, NULL, NULL, 0, '2022-04-25 21:21:23', '2022-04-25 21:21:23', NULL, 0, 0),
(13, NULL, NULL, 0, '2022-04-25 21:22:08', '2022-04-25 21:22:08', NULL, 0, 0),
(14, NULL, NULL, 0, '2022-04-25 21:22:11', '2022-04-25 21:22:11', NULL, 0, 0),
(15, NULL, NULL, 0, '2022-04-25 21:22:14', '2022-04-25 21:22:14', NULL, 0, 0),
(16, NULL, NULL, 0, '2022-04-25 21:22:17', '2022-04-25 21:22:17', NULL, 0, 0),
(17, NULL, NULL, 0, '2022-04-25 21:22:20', '2022-04-25 21:22:20', NULL, 0, 0),
(18, NULL, NULL, 0, '2022-04-25 21:22:46', '2022-04-25 21:22:46', NULL, 0, 0),
(19, 'error_log.txt', 'F43bds3_3Cs', 1, '2022-04-27 14:15:32', '2022-04-27 14:59:50', NULL, 0, 0),
(20, 'error_log.txt', '0669290428', 1, '2022-04-27 14:59:57', '2022-04-27 15:02:33', NULL, 0, 0),
(21, 'view_now.txt', '6777777777', 1, '2022-04-27 15:02:46', '2022-04-27 15:06:25', NULL, 0, 0),
(22, 'error_log.txt', '9999', 1, '2022-04-27 15:12:17', '2022-04-27 15:14:22', NULL, 0, 0),
(23, 'error_log.txt', 'F43bds3_3Cs', 1, '2022-04-27 15:14:26', '2022-04-27 15:15:37', NULL, 0, 0),
(24, 'error_log.txt', '+380988747363', 1, '2022-04-27 15:15:39', '2022-04-27 15:18:34', NULL, 0, 0),
(25, 'index.php', 'F43bds3_3Cs', 1, '2022-04-27 15:18:37', '2022-04-27 15:19:17', NULL, 0, 0),
(26, '567567765', '55555555556', 1, '2022-04-27 15:19:19', '2022-04-27 15:36:22', NULL, 0, 0),
(27, 'error_log.txt', '6555555', 1, '2022-04-27 15:36:47', '2022-04-27 15:37:01', NULL, 0, 0),
(28, 'pornuz.ru', '6555555', 1, '2022-04-28 15:53:50', '2022-04-28 15:55:28', 2, 0, 0),
(29, 'video_ppl.php', 'F43bds3_3Cs', 1, '2022-04-28 15:55:31', '2022-04-28 15:56:48', 2, 0, 0),
(30, 'Українське порно', '6777777777', 1, '2022-04-28 15:56:56', '2022-04-28 16:09:41', 2, 0, 0),
(31, 'Vlad', '55555555556', 1, '2022-04-28 16:09:45', '2022-04-28 16:12:55', 2, 0, 0),
(32, 'Vlad', '0669290428', 1, '2022-04-28 16:12:59', '2022-04-28 16:17:02', 2, 0, 0),
(33, 'Українське порно', '6777777777', 1, '2022-04-28 16:17:08', '2022-04-28 16:22:41', 2, 0, 0),
(34, NULL, NULL, 0, '2022-04-28 16:18:15', '2022-04-28 16:18:15', NULL, 0, 0),
(35, NULL, NULL, 0, '2022-04-28 16:21:38', '2022-04-28 16:21:38', NULL, 0, 0),
(36, 'Українське порно', '6777777777', 1, '2022-04-28 16:22:42', '2022-04-28 16:24:20', 2, 0, 0),
(37, 'video_ppl.php', '6555555', 1, '2022-04-28 16:24:35', '2022-04-28 16:25:26', 2, 0, 0),
(38, 'Українське порно', '55555555556', 1, '2022-04-28 16:25:28', '2022-04-28 16:26:15', 2, 0, 0),
(39, NULL, NULL, 0, '2022-04-28 16:26:21', '2022-04-28 16:26:21', 2, 0, 0),
(40, 'error_log.txt', '0669290428', 1, '2022-04-29 17:53:35', '2022-04-29 17:55:04', 2, 0, 0),
(41, 'Vladik', '+380988747363', 1, '2022-04-29 17:55:07', '2022-04-29 17:56:01', 2, 0, 0),
(42, 'Vladik', '+380988747363', 1, '2022-04-29 17:56:04', '2022-04-29 17:56:12', 2, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count` int NOT NULL DEFAULT '1',
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`, `count`, `price`) VALUES
(10, 18, 4, '2022-04-25 22:31:23', '2022-04-25 22:53:16', 3, 0),
(11, 18, 9, '2022-04-25 22:53:21', '2022-04-25 22:53:35', 2, 0),
(12, 19, 5, '2022-04-27 14:30:41', '2022-04-27 14:40:40', 3, 0),
(16, 20, 1, '2022-04-27 15:02:18', '2022-04-27 15:02:18', 1, 0),
(17, 20, 2, '2022-04-27 15:02:27', '2022-04-27 15:02:27', 1, 0),
(18, 21, 1, '2022-04-27 15:06:19', '2022-04-27 15:06:19', 1, 0),
(19, 22, 1, '2022-04-27 15:14:15', '2022-04-27 15:14:15', 1, 0),
(20, 23, 3, '2022-04-27 15:15:32', '2022-04-27 15:15:32', 1, 0),
(21, 24, 2, '2022-04-27 15:18:29', '2022-04-27 15:18:29', 1, 0),
(22, 25, 1, '2022-04-27 15:19:10', '2022-04-27 15:19:10', 1, 0),
(23, 26, 2, '2022-04-27 15:36:12', '2022-04-27 15:36:16', 2, 0),
(24, 27, 2, '2022-04-27 15:36:53', '2022-04-27 15:36:57', 3, 0),
(26, 28, 2, '2022-04-28 15:55:23', '2022-04-28 15:55:23', 1, 0),
(27, 29, 2, '2022-04-28 15:56:43', '2022-04-28 15:56:43', 1, 0),
(28, 30, 3, '2022-04-28 15:58:48', '2022-04-28 15:58:48', 1, 0),
(29, 31, 2, '2022-04-28 16:12:50', '2022-04-28 16:12:50', 1, 0),
(30, 32, 2, '2022-04-28 16:12:59', '2022-04-28 16:16:58', 2, 0),
(31, 33, 3, '2022-04-28 16:17:08', '2022-04-28 16:17:08', 1, 0),
(32, 33, 5, '2022-04-28 16:22:19', '2022-04-28 16:22:25', 2, 0),
(33, 36, 2, '2022-04-28 16:22:42', '2022-04-28 16:22:42', 1, 0),
(34, 37, 5, '2022-04-28 16:24:35', '2022-04-28 16:24:35', 1, 0),
(35, 38, 2, '2022-04-28 16:25:28', '2022-04-28 16:25:28', 1, 0),
(36, 39, 1, '2022-04-28 16:26:21', '2022-04-28 16:27:21', 3, 0),
(37, 40, 2, '2022-04-29 17:54:48', '2022-04-29 17:54:58', 2, 0),
(38, 41, 3, '2022-04-29 17:55:45', '2022-04-29 17:55:47', 2, 0),
(39, 41, 8, '2022-04-29 17:55:53', '2022-04-29 17:55:55', 2, 0),
(40, 42, 6, '2022-04-29 17:56:04', '2022-04-29 17:56:07', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `hit` tinyint(1) NOT NULL DEFAULT '0',
  `recomend` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `name_en`, `category_id`, `code`, `description`, `description_en`, `image`, `price`, `created_at`, `updated_at`, `new`, `hit`, `recomend`) VALUES
(1, 'iPhone X 64GB', NULL, 1, 'iphone_x_64', 'Отличный продвинутый телефон с памятью на 64 gb', NULL, 'products/qkiU7igeTFdlkSRB9E5KGIJC4sDYFN05gv4xd2hm.png', 71990, NULL, '2022-04-29 15:38:59', 0, 0, 0),
(2, 'iPhone X 256GB', NULL, 1, 'iphone_x_256', 'Отличный продвинутый телефон с памятью на 256 gb', NULL, NULL, 89990, NULL, NULL, 0, 0, 0),
(3, 'HTC One S', NULL, 1, 'htc_one_s', 'Зачем платить за лишнее? Легендарный HTC One S', NULL, NULL, 12490, NULL, NULL, 0, 0, 0),
(4, 'iPhone 5SE', NULL, 1, 'iphone_5se', 'Отличный классический iPhone', NULL, NULL, 17221, NULL, NULL, 0, 0, 0),
(5, 'Наушники Beats Audio', NULL, 2, 'beats_audio', 'Отличный звук от Dr. Dre', NULL, NULL, 20221, NULL, NULL, 0, 0, 0),
(6, 'Камера GoPro', NULL, 2, 'gopro', 'Снимай самые яркие моменты с помощью этой камеры', NULL, 'products/rw4xgUckIVj0nz6JnzJGpeqHDuVFxYGyKxr2qfBz.png', 12000, NULL, '2022-04-29 15:54:23', 0, 0, 0),
(7, 'Камера Panasonic HC-V770', NULL, 2, 'panasonic_hc-v770', 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!', NULL, NULL, 27900, NULL, NULL, 0, 0, 0),
(8, 'Кофемашина DeLongi', NULL, 2, 'delongi', 'Хорошее утро начинается с хорошего кофе!', NULL, NULL, 25200, NULL, '2022-05-16 19:01:12', 1, 0, 0),
(9, 'Холодильник Haier', NULL, 3, 'haier', 'Для большой семьи большой холодильник!', NULL, NULL, 40200, NULL, NULL, 0, 0, 0),
(10, 'Блендер Moulinex', NULL, 1, 'moulinex', 'Для самых смелых идей', NULL, NULL, 4200, NULL, '2022-05-16 20:33:05', 0, 0, 0),
(11, 'Мясорубка Bosch', NULL, 3, 'bosch', 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!', NULL, NULL, 9200, NULL, NULL, 0, 0, 0),
(12, 'dfgdfgdfgfdg', NULL, 2, 'y5s3c', 'dfgdfgdfggfdfdgfgd', NULL, NULL, 345, '2022-05-01 20:00:35', '2022-05-01 20:00:35', 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `properties`
--

INSERT INTO `properties` (`id`, `name`, `name_en`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Пизда', 'PIZDA', '2022-05-15 18:10:35', '2022-05-15 18:18:34', '2022-05-15 18:18:34'),
(2, 'Размер памяти', 'Memory size', '2022-05-15 18:12:13', '2022-05-15 18:12:13', NULL),
(3, 'Цвет устройства', 'Color ganget', '2022-05-15 18:12:37', '2022-05-15 18:18:50', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `property_options`
--

CREATE TABLE `property_options` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `property_options`
--

INSERT INTO `property_options` (`id`, `property_id`, `name`, `name_en`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Vladik', 'Nice porno', '2022-05-15 18:55:55', '2022-05-15 19:08:36', '2022-05-15 19:08:36'),
(2, 2, '32ГБ', '32Gb', '2022-05-15 19:10:09', '2022-05-15 19:10:09', NULL),
(3, 2, '64гб', '64gb', '2022-05-16 19:43:56', '2022-05-16 19:43:56', NULL),
(4, 2, '128гб', '128gb', '2022-05-16 19:44:39', '2022-05-16 19:44:39', NULL),
(5, 3, 'черный', 'black', '2022-05-16 19:48:08', '2022-05-16 19:48:08', NULL),
(6, 3, 'красный', 'red', '2022-05-16 19:48:30', '2022-05-16 19:48:30', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `property_product`
--

CREATE TABLE `property_product` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `property_product`
--

INSERT INTO `property_product` (`id`, `product_id`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 8, 2, '2022-05-16 18:58:35', '2022-05-16 18:58:35'),
(2, 1, 2, '2022-05-16 19:01:55', '2022-05-16 19:01:55'),
(3, 1, 3, '2022-05-16 19:01:55', '2022-05-16 19:01:55'),
(4, 10, 2, '2022-05-16 20:33:05', '2022-05-16 20:33:05'),
(5, 10, 3, '2022-05-16 20:33:05', '2022-05-16 20:33:05');

-- --------------------------------------------------------

--
-- Структура таблицы `skus`
--

CREATE TABLE `skus` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `count` bigint UNSIGNED NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `skus`
--

INSERT INTO `skus` (`id`, `product_id`, `count`, `price`, `created_at`, `updated_at`) VALUES
(7, 8, 5, 25, '2022-05-16 20:32:46', '2022-05-16 20:32:46');

-- --------------------------------------------------------

--
-- Структура таблицы `sku_property_options`
--

CREATE TABLE `sku_property_options` (
  `id` bigint UNSIGNED NOT NULL,
  `property_option_id` bigint UNSIGNED NOT NULL,
  `sku_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sku_property_options`
--

INSERT INTO `sku_property_options` (`id`, `property_option_id`, `sku_id`, `created_at`, `updated_at`) VALUES
(1, 2, 6, '2022-05-16 20:32:03', '2022-05-16 20:32:03'),
(2, 5, 6, '2022-05-16 20:32:03', '2022-05-16 20:32:03'),
(3, 2, 7, '2022-05-16 20:32:46', '2022-05-16 20:32:46'),
(4, 4, 8, '2022-05-16 20:33:17', '2022-05-16 20:33:17'),
(5, 6, 8, '2022-05-16 20:33:17', '2022-05-16 20:33:17');

-- --------------------------------------------------------

--
-- Структура таблицы `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Администратор', 'admin@mail.ru', NULL, '$2y$10$34VbC/BPxzcr1Lig1hJDpOQb7hTkjmGtu44Di3RlrZQFPwGjGfJFq', NULL, NULL, NULL, 1),
(2, 'Лаврапрва', 'a@m.ru', NULL, '$2y$10$fB1377NSPCmX766LdEdwAup4X/Y2/VswcUNj8JSk7GZnhQAvrO.Ma', NULL, '2022-05-11 21:09:59', '2022-05-11 21:09:59', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `property_options`
--
ALTER TABLE `property_options`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `property_product`
--
ALTER TABLE `property_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sku_property_options`
--
ALTER TABLE `sku_property_options`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `property_options`
--
ALTER TABLE `property_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `property_product`
--
ALTER TABLE `property_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `skus`
--
ALTER TABLE `skus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `sku_property_options`
--
ALTER TABLE `sku_property_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
