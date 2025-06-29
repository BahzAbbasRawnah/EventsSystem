-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2025 at 03:22 PM
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
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `tickets_count` int(11) NOT NULL,
  `guest_name` text NOT NULL,
  `ticket_price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected','cancelled','finished') NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `event_id`, `payment_id`, `tickets_count`, `guest_name`, `ticket_price`, `total_price`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, 'Admin', '150', '0', 'pending', NULL, '2025-06-28 09:38:43', '2025-06-28 09:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Concerts', 'الحفلات الموسيقية', NULL, '2025-06-28 12:20:34', '2025-06-28 12:20:34'),
(2, 'Conferences', 'المؤتمرات', NULL, '2025-06-28 12:20:34', '2025-06-28 12:20:34'),
(3, 'Exhibitions', 'المعارض', NULL, '2025-06-28 12:20:34', '2025-06-28 12:20:34'),
(4, 'Sports', 'الرياضة', NULL, '2025-06-28 12:20:34', '2025-06-28 12:20:34'),
(5, 'Cultural Festivals', 'المهرجانات الثقافية', NULL, '2025-06-28 12:20:34', '2025-06-28 12:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `country_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Riyadh', 'الرياض', 1, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(2, 'Jeddah', 'جدة', 1, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(3, 'Mecca', 'مكة', 1, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `flag` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_en`, `name_ar`, `flag`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Saudi Arabia', 'المملكة العربية السعودية', '🇸🇦', 'SA', NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name_en`, `name_ar`, `city_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Al Olaya', 'العالية', 1, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(2, 'Al Malaz', 'الملز', 1, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(3, 'Al Narjis', 'النجرس', 1, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(4, 'Al Hamra', 'الحمرا', 2, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(5, 'Al Rawdah', 'الروضة', 2, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(6, 'Al Safa', 'الصفا', 2, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(7, 'Al Aziziyah', 'العزيزية', 3, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(8, 'Al Shisha', 'الششة', 3, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18'),
(9, 'Al Masfalah', 'المسفلة', 3, NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `tickets_quantity` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name_en`, `name_ar`, `ticket_price`, `tickets_quantity`, `category_id`, `user_id`, `country_id`, `city_id`, `district_id`, `start_date`, `end_date`, `description_en`, `description_ar`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Riyadh Music Night', 'ليلة موسيقية في الرياض', 150, 200, 1, 1, 1, 1, 1, '2025-07-10 18:00:00', '2025-07-10 23:00:00', 'Live music event in Riyadh', 'فعالية موسيقية مباشرة في الرياض', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(2, 'Tech Future Conference', 'مؤتمر مستقبل التقنية', 300, 100, 2, 1, 1, 2, 1, '2025-08-05 09:00:00', '2025-08-06 17:00:00', 'Tech innovation and AI talks', 'أحاديث عن الابتكار والتقنية والذكاء الاصطناعي', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(3, 'Jeddah Art Expo', 'معرض جدة للفنون', 100, 150, 3, 1, 1, 3, 1, '2025-07-20 10:00:00', '2025-07-25 20:00:00', 'Exhibition of modern art in Jeddah', 'معرض للفن المعاصر في جدة', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(4, 'Football Match: Al Hilal vs Al Nassr', 'مباراة الهلال والنصر', 200, 500, 4, 1, 1, 1, 1, '2025-07-15 19:00:00', '2025-07-15 21:00:00', 'Top football rivalry in Saudi Arabia', 'أكبر منافسة كروية في السعودية', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(5, 'Heritage Festival in Riyadh', 'مهرجان التراث في الرياض', 50, 300, 5, 1, 1, 1, 1, '2025-07-22 16:00:00', '2025-07-28 22:00:00', 'Cultural festival in Riyadh', 'مهرجان ثقافي في الرياض', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(6, 'Jeddah Jazz Night', 'ليلة الجاز في جدة', 120, 120, 1, 1, 1, 3, 1, '2025-08-01 20:00:00', '2025-08-01 23:59:00', 'Jazz concert in Jeddah', 'حفلة جاز في جدة', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(7, 'Medical Innovation Forum', 'منتدى الابتكار الطبي', 350, 80, 2, 1, 1, 2, 1, '2025-09-01 08:00:00', '2025-09-02 17:00:00', 'Forum for medical technology breakthroughs', 'منتدى لاختراقات التقنية الطبية', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(8, 'Saudi Book Fair', 'معرض الكتاب السعودي', 20, 1000, 3, 1, 1, 1, 1, '2025-10-01 10:00:00', '2025-10-07 20:00:00', 'National exhibition of books', 'معرض وطني للكتب', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(9, 'Camel Racing Tournament', 'سباق الهجن', 75, 400, 4, 1, 1, 2, 1, '2025-08-15 14:00:00', '2025-08-15 18:00:00', 'Traditional Saudi camel race', 'سباق الهجن التقليدي السعودي', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53'),
(10, 'AlUla Culture Days (in Jeddah)', 'أيام العلا الثقافية (في جدة)', 60, 250, 5, 1, 1, 3, 1, '2025-11-01 12:00:00', '2025-11-05 22:00:00', 'Art and culture event in Jeddah', 'فعالية ثقافية وفنية في جدة', 'active', NULL, '2025-06-28 12:23:53', '2025-06-28 12:23:53');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_en` varchar(255) NOT NULL,
  `question_ar` varchar(255) NOT NULL,
  `answer_en` text NOT NULL,
  `answer_ar` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name_en`, `name_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Unlimited Event Listings', 'عدد غير محدود من الفعاليات', NULL, '2025-06-28 12:27:14', '2025-06-28 12:27:14'),
(2, 'Priority Support', 'دعم فني مميز', NULL, '2025-06-28 12:27:14', '2025-06-28 12:27:14'),
(3, 'Analytics Dashboard', 'لوحة تحكم التحليلات', NULL, '2025-06-28 12:27:14', '2025-06-28 12:27:14'),
(4, 'Custom Branding', 'العلامة التجارية المخصصة', NULL, '2025-06-28 12:27:14', '2025-06-28 12:27:14'),
(5, 'Multi-user Access', 'وصول متعدد المستخدمين', NULL, '2025-06-28 12:27:14', '2025-06-28 12:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_name` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `imageable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `imageable_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_19_165803_create_categories_table', 1),
(5, '2025_02_19_170445_create_countries_table', 1),
(6, '2025_02_19_172137_create_cities_table', 1),
(7, '2025_02_19_172418_create_districts_table', 1),
(8, '2025_02_19_173213_create_subscription_packages_table', 1),
(9, '2025_02_19_173507_create_vendor_subscriptions_table', 1),
(10, '2025_02_19_173526_create_features_table', 1),
(11, '2025_02_19_173630_create_package_features_table', 1),
(12, '2025_02_19_173932_create_events_table', 1),
(13, '2025_02_19_174206_create_payment_methods_table', 1),
(14, '2025_02_19_174206_create_payments_table', 1),
(15, '2025_02_19_174504_create_booking_table', 1),
(16, '2025_02_19_174627_create_tickets_table', 1),
(17, '2025_02_19_174917_create_images_table', 1),
(18, '2025_03_05_000309_create_contact_us_table', 1),
(19, '2025_03_05_003356_create_f_a_q_s_table', 1),
(20, '2025_04_30_190156_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_features`
--

CREATE TABLE `package_features` (
  `subscription_package_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_features`
--

INSERT INTO `package_features` (`subscription_package_id`, `feature_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(1, 2, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(2, 1, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(2, 2, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(2, 3, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(2, 5, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(3, 1, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(3, 2, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(3, 3, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(3, 4, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL),
(3, 5, '2025-06-28 12:27:35', '2025-06-28 12:27:35', NULL);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `cvv` varchar(255) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `event_id`, `payment_method_id`, `card_number`, `card_name`, `cvv`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '123456789', 'WQRQWER', '123456789', '300', '2025-06-28 09:38:43', '2025-06-28 09:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name_en`, `name_ar`, `image`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mada', 'مدى', 'mada.png', 'mada', NULL, '2025-06-28 12:37:32', '2025-06-28 12:37:32'),
(2, 'Apple Pay', 'أبل باي', 'apple_pay.png', 'apple_pay', NULL, '2025-06-28 12:37:32', '2025-06-28 12:37:32'),
(3, 'STC Pay', 'STC باي', 'stc_pay.png', 'stc_pay', NULL, '2025-06-28 12:37:32', '2025-06-28 12:37:32'),
(4, 'Credit Card', 'بطاقة ائتمان', 'credit_card.png', 'credit_card', NULL, '2025-06-28 12:37:32', '2025-06-28 12:37:32'),
(5, 'Cash on Delivery', 'الدفع عند الاستلام', 'cash.png', 'cash', NULL, '2025-06-28 12:37:32', '2025-06-28 12:37:32');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eRCWUZ340jQsfBobhSe1Ez0g9W47c1jzHVVSW0BA', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidlBIdDhTbEFYa2VSUzhTSVBjMWo4VVU3bVc1UG9PU3p2UU5DVHgzRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9FdmVudHMvZXZlbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo2OiJsb2NhbGUiO3M6MjoiZW4iO30=', 1751114445),
('X6zv6EZsBnp9NbfyvBPelWjH6AXiOkDXHQEpxatM', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHU4UFpmMFpPcEduMkM2OEQ2dDgyZ2E2cmpyUlh5STBObE92UG1yNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9FdmVudHMvZXZlbnRzP3BhZ2U9MSI7fX0=', 1751113839);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_packages`
--

CREATE TABLE `subscription_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `period` enum('daily','weekly','monthly','yearly') NOT NULL DEFAULT 'daily',
  `price` double NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_packages`
--

INSERT INTO `subscription_packages` (`id`, `name_en`, `name_ar`, `period`, `price`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Daily Access', 'الوصول اليومي', 'daily', 5, 'Access to events and updates for one day.', NULL, '2025-06-28 12:26:32', '2025-06-28 12:26:32'),
(2, 'Monthly Plan', 'الخطة الشهرية', 'monthly', 49.99, 'Enjoy full features for a whole month.', NULL, '2025-06-28 12:26:32', '2025-06-28 12:26:32'),
(3, 'Yearly VIP', 'الخطة السنوية المميزة', 'yearly', 499.99, 'VIP access with maximum benefits for a year.', NULL, '2025-06-28 12:26:32', '2025-06-28 12:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `subscription_package_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `role` enum('admin','vendor','customer') NOT NULL DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `profile_picture`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2025-06-28 09:17:17', '$2y$12$tmbT/1hCkJJOYz53qtaW0uy5Gg.USpWzBbj44ydAwNbuTxH.qO/Si', 'admin', NULL, NULL, 'OwqkHtcqujd5KwTfjRRzwQgBYZYbqhh4eky7uqM1bQyRPv9f2Xc3Apc7u1uS', NULL, '2025-06-28 09:17:18', '2025-06-28 09:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_subscriptions`
--

CREATE TABLE `vendor_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subscription_package_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_event_id_foreign` (`event_id`),
  ADD KEY `bookings_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `categories_name_ar_unique` (`name_ar`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `cities_name_ar_unique` (`name_ar`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `countries_name_ar_unique` (`name_ar`),
  ADD UNIQUE KEY `countries_flag_unique` (`flag`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `districts_name_ar_unique` (`name_ar`),
  ADD KEY `districts_city_id_foreign` (`city_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_category_id_foreign` (`category_id`),
  ADD KEY `events_user_id_foreign` (`user_id`),
  ADD KEY `events_country_id_foreign` (`country_id`),
  ADD KEY `events_city_id_foreign` (`city_id`),
  ADD KEY `events_district_id_foreign` (`district_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `features_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `features_name_ar_unique` (`name_ar`);

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
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_features`
--
ALTER TABLE `package_features`
  ADD PRIMARY KEY (`subscription_package_id`,`feature_id`),
  ADD KEY `package_features_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_event_id_foreign` (`event_id`),
  ADD KEY `payments_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `payment_methods_name_ar_unique` (`name_ar`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscription_packages`
--
ALTER TABLE `subscription_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_packages_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `subscription_packages_name_ar_unique` (`name_ar`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `tickets_name_ar_unique` (`name_ar`),
  ADD KEY `tickets_event_id_foreign` (`event_id`),
  ADD KEY `tickets_subscription_package_id_foreign` (`subscription_package_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_subscriptions`
--
ALTER TABLE `vendor_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `vendor_subscriptions_subscription_package_id_foreign` (`subscription_package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_packages`
--
ALTER TABLE `subscription_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_subscriptions`
--
ALTER TABLE `vendor_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_features`
--
ALTER TABLE `package_features`
  ADD CONSTRAINT `package_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_features_subscription_package_id_foreign` FOREIGN KEY (`subscription_package_id`) REFERENCES `subscription_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_subscription_package_id_foreign` FOREIGN KEY (`subscription_package_id`) REFERENCES `subscription_packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_subscriptions`
--
ALTER TABLE `vendor_subscriptions`
  ADD CONSTRAINT `vendor_subscriptions_subscription_package_id_foreign` FOREIGN KEY (`subscription_package_id`) REFERENCES `subscription_packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
