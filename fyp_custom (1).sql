-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 11:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp_custom`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_books`
--

CREATE TABLE `account_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_books`
--

INSERT INTO `account_books` (`id`, `project_id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 4, 4, '50,000', '2024-02-20 04:43:19', '2024-02-20 04:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `duration` varchar(11) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `portfolio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `user_id`, `project_id`, `duration`, `cover_letter`, `experience`, `cost`, `portfolio`, `created_at`, `updated_at`) VALUES
(1, 4, 4, '1x', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 3, '50,000', 'Issues.docx', '2024-02-20 03:42:53', '2024-02-20 03:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `blog_image` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `role_id`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Product Design', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(2, 'Consumer Products', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(3, 'Electronics Enclosures', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(4, 'Tools and Equipment', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(5, 'Architectural Design', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(6, 'Residential Buildings', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(7, 'Commercial Buildings', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(8, 'Landscape and Urban Planning', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(9, 'Character and Creature Design', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(10, 'Video Games', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(11, 'Animation', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(12, 'Collectibles', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(13, 'Jewelry Design', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(14, 'Rings', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(15, 'Necklaces', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(16, 'Bracelets', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(17, 'Automotive Design', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(18, 'Vehicle Parts', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(19, 'Custom Car Accessories', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(20, 'Prototyping Components', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(21, 'Industrial Design', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(22, 'Machinery Parts', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(23, 'Prototypes for Manufacturing', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(24, 'Custom Fixtures', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(25, 'Fashion and Apparel', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(26, 'Accessories', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(27, 'Footwear', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(28, 'Wearable Technology', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(29, 'Medical and Dental', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(30, 'Prosthetics', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(31, 'Dental Devices', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(32, 'Anatomical Models', 2, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(33, 'Prototyping and Manufacturing', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(34, 'Rapid Prototyping', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(35, 'End-use Parts', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(36, 'Batch Production', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(37, 'Art and Sculptures', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(38, 'Figurines', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(39, 'Art Installations', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(40, 'Custom Sculptures', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(41, 'Home and Garden', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(42, 'Home Decor', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(43, 'Kitchen Gadgets', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(44, 'Outdoor and Garden Accessories', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(45, 'Educational Models', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(46, 'Scientific Models', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(47, 'Geographical Terrain Models', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(48, 'Historical Artifacts Replicas', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(49, 'Toys and Games', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(50, 'Board Game Pieces', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(51, 'Custom Toys', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(52, 'Educational Toys', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(53, 'Custom Gifts and Personalization', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(54, 'Personalized Figurines', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(55, 'Customized Keychains', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(56, 'Bespoke Jewelry', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(57, 'Medical Models and Prosthetics', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(58, 'Patient-specific Models for Surgical Planning', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(59, 'Custom Prosthetics and Orthotics', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(60, 'Dental Models', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(61, 'Tech Gadgets and Accessories', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(62, 'Smartphone Cases', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(63, 'Computer and Gaming Accessories', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(64, 'Drone Parts', 3, NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` int(10) UNSIGNED NOT NULL,
  `to_user_id` int(10) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `file_path` text DEFAULT NULL,
  `project_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user_id`, `to_user_id`, `message`, `file_path`, `project_name`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 'You are hired for this job', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 03:45:24', '2024-02-20 03:45:24'),
(2, 4, 3, '<i>Greetings, I wanted to commit that your given task has been completed please provide me the amount of the project and close this project.</i>', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 03:55:46', '2024-02-20 03:55:46'),
(3, 3, 4, '<i>Greetings, I wanted to commit that your given task has been completed please provide me the amount of the project and close this project.</i>', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 04:32:01', '2024-02-20 04:32:01'),
(4, 3, 4, 'Payment has been clear/completed', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 04:43:19', '2024-02-20 04:43:19'),
(5, 3, 4, '<i>Payment has been clear/completed</i>', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 04:50:28', '2024-02-20 04:50:28'),
(6, 3, 4, '<i>Payment has been clear/completed</i>', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 04:53:01', '2024-02-20 04:53:01'),
(7, 3, 4, '<i>Payment has been clear/completed</i>', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 04:55:16', '2024-02-20 04:55:16'),
(8, 3, 4, '<i>Payment has been clear/completed</i>', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 04:55:58', '2024-02-20 04:55:58'),
(9, 3, 4, '<i>Payment has been clear/completed</i>', NULL, '3D Jewelry Designer for Custom Rings', '2024-02-20 04:58:40', '2024-02-20 04:58:40');

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
(166, '2014_10_12_000000_create_users_table', 1),
(167, '2014_10_12_100000_create_password_resets_table', 1),
(168, '2019_08_19_000000_create_failed_jobs_table', 1),
(169, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(170, '2020_10_14_071934_create_permission_tables', 1),
(171, '2024_02_06_101029_create_projects_table', 1),
(172, '2024_02_08_235953_create_payment_methods_table', 1),
(173, '2024_02_09_000342_create_categories_table', 1),
(174, '2024_02_09_234017_create_blogs_table', 1),
(175, '2024_02_11_121613_create_testimonials_table', 1),
(176, '2024_02_14_005028_create_applicants_table', 1),
(177, '2024_02_16_213338_create_messages_table', 1),
(178, '2024_02_18_211548_create_sub_categories_table', 1),
(179, '2024_02_20_093531_create_account_books_table', 2);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3);

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `service_image` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method_title`, `description`, `service_image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Online Payment Method', 'Online payment allows you to pay money via the internet. Buyers will use this type of payment when they purchase goods online or offline. They can use different types of online payment methods, including debit/credit cards, wire transfers, net banking, and digital wallets.', NULL, 1, '2024-02-20 02:27:23', '2024-02-20 02:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(2, 'user-create', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(3, 'user-edit', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(4, 'user-delete', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(5, 'role-list', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(6, 'role-create', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(7, 'role-edit', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(8, 'role-delete', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(9, 'job-list', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(10, 'job-create', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(11, 'job-edit', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(12, 'job-delete', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(13, 'category-list', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(14, 'category-create', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(15, 'category-edit', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(16, 'category-delete', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(17, 'blogs-list', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(18, 'blogs-create', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(19, 'blogs-edit', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(20, 'blogs-delete', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(21, 'payment-methods-list', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(22, 'payment-methods-create', 'web', '2024-02-20 02:27:22', '2024-02-20 02:27:22'),
(23, 'payment-methods-edit', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(24, 'payment-methods-delete', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(25, 'testimonials-list', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(26, 'testimonials-create', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(27, 'testimonials-edit', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(28, 'testimonials-delete', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` text NOT NULL DEFAULT '(untitled-job)',
  `delivery_time` varchar(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `job_image` text DEFAULT NULL,
  `project_file` text DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `job_category` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `job_title`, `delivery_time`, `location`, `description`, `job_image`, `project_file`, `payment_method`, `price`, `role_id`, `job_category`, `user_id`, `active`, `created_at`, `updated_at`) VALUES
(1, '3D Designer for Consumer Electronics Enclosure', '3x', 'Remote', '<p>We are seeking an experienced 3D Designer specialized in creating sleek, functional electronics enclosures. The ideal candidate will have a portfolio demonstrating innovative designs that not only protect the electronics but also enhance the user experience. The project involves designing an enclosure for our latest wearable device, focusing on durability, aesthetics, and ergonomics.</p>', 'WhatsApp Image 2024-02-20 at 3.02.47 AM.jpeg', 'Issues.docx', 1, '120,000', 2, '0', 2, 1, '2024-02-20 02:51:27', '2024-02-20 02:51:27'),
(2, '3D Architectural Designer for Residential Project', '3x', 'Karachi, Pakistan (Remote considered)', '<p>We are looking for a 3D Architectural Designer with expertise in residential buildings. The project entails creating a comprehensive 3D model of a luxury villa, including interiors, exteriors, and landscaping. The designer should be skilled in realistic texturing and lighting to bring the villa to life.</p>', 'WhatsApp Image 2024-02-20 at 3.04.03 AM.jpeg', '', 1, '180,000', 2, '4', 2, 1, '2024-02-20 02:56:39', '2024-02-20 02:56:39'),
(3, '3D Character Designer for an Upcoming Video Game', '6x', 'Remote', '<p>Join our game development team as a 3D Character Designer to create memorable, dynamic characters for our next RPG title. Your designs will bring depth to our game world, requiring a blend of creativity, technical skill, and a passion for storytelling. Experience in animation and rigging is a plus.</p>', 'WhatsApp Image 2024-02-20 at 3.04.58 AM.jpeg', '', 1, '250,000', 2, '8', 2, 1, '2024-02-20 02:57:59', '2024-02-20 02:57:59'),
(4, '3D Jewelry Designer for Custom Rings', '1x', 'Lahore, Pakistan (Remote considered)', '<p>We are seeking a talented 3D Jewelry Designer to create unique and intricate ring designs for our bespoke jewelry line. The ideal candidate should have experience in fine jewelry design, with a portfolio showcasing elegance, creativity, and precision.</p>', 'WhatsApp Image 2024-02-20 at 3.06.34 AM.jpeg', '', 1, '50,000', 2, '12', 3, 0, '2024-02-20 03:03:20', '2024-02-20 04:43:19'),
(5, '3D Designer for Custom Car Accessories', '3x', 'Remote', '<p>We&#39;re looking for a 3D Designer with a passion for automotive excellence. This project involves designing custom accessories for high-end vehicles, focusing on aesthetics, functionality, and innovation. Experience with automotive standards and materials is required.</p>', 'WhatsApp Image 2024-02-20 at 3.07.29 AM.jpeg', '', 1, '150,000', 2, '16', 3, 1, '2024-02-20 03:04:29', '2024-02-20 03:04:29'),
(6, 'Industrial 3D Designer for Manufacturing Prototypes', '3x', NULL, '<p>Our company is searching for an Industrial 3D Designer to develop prototypes for a new product line. The role requires a blend of creativity and technical skill to design prototypes that are both innovative and manufacturable. Familiarity with various manufacturing processes and materials is essential.<br />\r\nThese sample job postings cover a range of 3D design categories, each tailored to attract skilled professionals in their respective fields. The descriptions highlight the key responsibilities and requirements, aiming to give a realistic feel of the job opportunities available in the 3D design industry.</p>', 'WhatsApp Image 2024-02-20 at 3.08.29 AM.jpeg', '', 1, '200,000', 2, '22', 3, 1, '2024-02-20 03:05:53', '2024-02-20 03:05:53'),
(7, 'Rapid Prototyping Project Specialist', '3x', 'Remote', '<p>Experienced Rapid Prototyping Specialist needed for a comprehensive project involving the creation of functional prototypes across consumer electronics and automotive sectors. Must have expertise in various 3D printing technologies and materials, capable of delivering high-quality prototypes that meet exacting standards.</p>', 'WhatsApp Image 2024-02-20 at 3.14.18 AM.jpeg', 'Issues.docx', 1, '200,000', 3, '0', 3, 1, '2024-02-20 03:07:55', '2024-02-20 03:07:55'),
(8, '3D Printed Art Installation Project', '3x', 'Remote', '<p>Seeking a creative 3D Artist to design and execute a large-scale, custom sculpture for an upcoming art installation. The project demands innovation, a strong artistic vision, and proficiency in 3D modeling and printing to realize an engaging and memorable piece.</p>', 'WhatsApp Image 2024-02-20 at 3.15.27 AM.jpeg', '', 1, '250,000', 3, '4', 3, 1, '2024-02-20 03:09:25', '2024-02-20 03:09:25'),
(9, 'Innovative Home Decor Design Project', '1x', 'Remote', '<p>Looking for a 3D Printing Designer with a flair for modern, stylish home decor. This project involves designing a series of home and garden accessories that combine functionality with aesthetic appeal. The ideal candidate will bring fresh ideas and an understanding of current home trends.</p>', 'WhatsApp Image 2024-02-20 at 3.16.26 AM.jpeg', '', 1, '120,000', 3, '8', 3, 1, '2024-02-20 03:11:08', '2024-02-20 03:11:08'),
(10, 'Educational 3D Model Creation Project', '3x', 'Remote', '<p>We require a 3D Printing Engineer to develop detailed and accurate educational models for a new science curriculum. This project includes creating both scientific models and geographical terrain replicas, demanding precision, educational value, and durability.</p>', 'WhatsApp Image 2024-02-20 at 3.17.45 AM.jpeg', '', 1, '180,000', 3, '12', 2, 1, '2024-02-20 03:14:10', '2024-02-20 03:14:10'),
(11, 'Custom Toy and Game Pieces Design Project', '3x', 'Remote', '<p>Creative Custom Toy Designer wanted for an exciting project to design and produce innovative toys and game pieces. The project focuses on creating engaging, safe, and educational toys that inspire play and learning. Experience in child-safe materials and imaginative design is essential.</p>', 'WhatsApp Image 2024-02-20 at 3.19.02 AM.jpeg', '', 1, '150,000', 3, '16', 2, 1, '2024-02-20 03:16:18', '2024-02-20 03:16:18');

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
(1, 'Super-Admin', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(2, '3D Designer', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(3, '3D Vendor', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(4, 'User', 'web', '2024-02-20 02:27:23', '2024-02-20 02:27:23');

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
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 4),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 4),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `tagline`, `email`, `email_verified_at`, `password`, `contact_no`, `description`, `education`, `experience`, `profile_pic`, `balance`, `active`, `remember_token`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', NULL, '$2y$10$QVqfkxW5.vFw7yLVEt/7XutgvFSD9zyPCzWXQI.nhEpSXUX4r3.Je', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-02-20 02:27:23', '2024-02-20 02:27:23'),
(2, 'Kawish Zaman', NULL, 'kawish@qistabzaa.pk', NULL, '$2y$10$6X/9ntcEpkoSiXXatE9ZreLSlYxH60PlRci9uct3xUPirs4hFPSK2', NULL, NULL, NULL, NULL, '1708414717_315775176_846185736532181_3945840034109890573_n (1) (1).jpg', NULL, 1, NULL, NULL, NULL, NULL, '2024-02-20 02:38:37', '2024-02-20 02:38:37'),
(3, 'Aquib Sheikh', NULL, 'aquib.sh@gmail.com', NULL, '$2y$10$sskfBucyZb7ApIggU5cMfOZg.9gxcDath5OdzZT5QeA1.7hxI0B0W', NULL, NULL, NULL, NULL, '1708416049_122053403.jpg', NULL, 1, NULL, NULL, NULL, NULL, '2024-02-20 03:00:49', '2024-02-20 03:00:49'),
(4, 'Bilal Sohail', NULL, 'abrobilal135@gmail.com', NULL, '$2y$10$8JNf6al7qsxOzuUzIFe6A.17MfpKAF/MPQ4SUxqhYfyCs6XlwOSsy', NULL, NULL, NULL, NULL, '1708418302_177420601.jpg', '50150', 1, NULL, NULL, NULL, NULL, '2024-02-20 03:38:22', '2024-02-20 04:58:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_books`
--
ALTER TABLE `account_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_no_unique` (`contact_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_books`
--
ALTER TABLE `account_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
