-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 10:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coaching_institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Developer', 'developer@gmail.com', '9694404527', 'kuch nhi', 'wait some time', '2021-11-19 07:56:52', '2021-11-19 07:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_information`
--

CREATE TABLE `contact_us_information` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_information`
--

INSERT INTO `contact_us_information` (`id`, `email`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, 'info@indianhometutor.com', '1234567879', 'PSB Group 2nd floor ,sudama Hardware, Bajnamath Chowk , Shashtri nagar Jabalpur (M.P.) Pin:-482001', '2021-11-19 07:32:25', '2021-11-19 07:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subjects` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `established_year` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `user_id`, `subjects`, `type`, `established_year`, `city`, `pincode`, `address`, `created_at`, `updated_at`) VALUES
(1, 12, NULL, 'coaching', '2222', NULL, NULL, NULL, '2021-10-28 11:34:42', '2021-10-28 06:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `institute_forms`
--

CREATE TABLE `institute_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjects` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `established_year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institute_forms`
--

INSERT INTO `institute_forms` (`id`, `name`, `email`, `mobile`, `subjects`, `type`, `established_year`, `city`, `pincode`, `address`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'gopal saini', 'admin@gmail.com', '1234567879', 'Coures Name 1', 'Institute', '2020', 'Kishangarh Bas', '12542', 'alwar rajasthan', '1', '2021-10-29 07:15:13', '2021-10-29 07:15:13'),
(2, 'dj', 'admin@gmail.com', '1234567879', 'Coures Name 1', 'Coaching', '2222', 'Kishangarh Bas', '12542554444', 'alwar rajasthan', '1', '2021-10-29 07:15:32', '2021-10-29 07:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_06_21_074852_users', 1),
(11, '2021_10_26_074605_testimonials', 3),
(14, '2021_10_26_062158_create_students_table', 4),
(15, '2021_10_27_070507_create_tutors_table', 4),
(16, '2021_10_28_071226_update_users_table', 5),
(17, '2021_10_28_071654_create_otp_table', 5),
(18, '2021_10_28_070507_create_institutes_table', 6),
(22, '2021_10_29_061016_create_student_forms_table', 7),
(23, '2021_10_29_061046_create_tutor_forms_table', 7),
(24, '2021_10_29_061059_create_institute_forms_table', 7),
(25, '2021_11_01_074010_create_subscription_plans_table', 8),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 9),
(28, '2020_04_10_090559_create_seeders_table', 10),
(29, '2021_11_02_095509_create_paytms_table', 11),
(30, '2021_11_19_063352_create_contact_us_table', 12),
(31, '2021_11_19_071351_create_contact_us_information_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('94c78f89-adc6-44f8-96a3-c70e4e86f03b', NULL, 'Laravel Personal Access Client', 'wNu9WBCOO3J97BrIKNAfhgrNEAh4TufBVuqCAl85', NULL, 'http://localhost', 1, 0, 0, '2021-11-02 04:47:55', '2021-11-02 04:47:55'),
('94c78f89-e8b3-49c9-9b17-6c15ecd608d5', NULL, 'Laravel Password Grant Client', 'r9i3uVAowMsK6A8B4hqRLWgj2ObfeAYKwJ56QQAS', 'users', 'http://localhost', 0, 1, 0, '2021-11-02 04:47:55', '2021-11-02 04:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '94c78f89-adc6-44f8-96a3-c70e4e86f03b', '2021-11-02 04:47:55', '2021-11-02 04:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paytms`
--

CREATE TABLE `paytms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subscription_plan_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=>failed, 1=>success, 2=>pending',
  `amount` int(11) NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paytms`
--

INSERT INTO `paytms` (`id`, `user_id`, `subscription_plan_id`, `name`, `mobile`, `services`, `status`, `amount`, `order_id`, `transaction_id`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 'Developer', '9876543210', 'Web Developement', '0', 400, '9876543210651', '0', '1', '2021-11-11 04:55:00', '2021-11-11 04:55:00'),
(2, 5, 3, 'gopal saini', '9694404527', 'dfsddvddgdgdg', '0', 400, '9694404527821', '0', '1', '2021-11-12 03:49:50', '2021-11-12 03:49:50'),
(3, 5, 3, 'dj', '9876543210', 'dscfsdf', '0', 400, '9876543210881', '0', '1', '2021-11-19 04:24:41', '2021-11-19 04:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seeders`
--

CREATE TABLE `seeders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seeder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seeded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subjects` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parents_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `subjects`, `city`, `gender`, `address`, `institute_name`, `parents_name`, `profile_image`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, NULL, 'Male', 'scs', NULL, 'skdflsd', 'student_55654891.jpeg', '2021-10-27 08:39:53', '2021-10-28 02:32:41'),
(3, 8, NULL, NULL, 'Male', 'alwar', NULL, NULL, NULL, '2021-10-28 10:56:26', '2021-10-28 05:45:30'),
(4, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-28 12:11:24', '2021-10-28 12:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `student_forms`
--

CREATE TABLE `student_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjects` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_forms`
--

INSERT INTO `student_forms` (`id`, `name`, `email`, `mobile`, `subjects`, `city`, `pincode`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Gopal Saini', 'admin@gmail.com', '9694404527', 'html, css, js', 'Alwar', '12542554444', '1', '2021-10-29 07:34:46', '2021-10-29 07:34:46'),
(2, 'gopal saini', 'admin@gmail.com', '7976821913', 'html, css, js', 'Alwar', '12542554444', '1', '2021-11-09 10:56:09', '2021-11-09 10:56:09'),
(3, 'dj', 'dj@gmail.com', '9694404527', 'PHP', 'Alwar', '12542554444', '1', '2021-11-10 04:56:25', '2021-11-10 04:56:25'),
(4, 'dj', 'admin@gmail.com', '7742544602', 'PHP', 'kg bas', '12542554444', '1', '2021-11-10 05:00:23', '2021-11-10 05:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=>student, 2=>teacher, 3=>institute',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `user_type`, `name`, `price`, `discount`, `description`, `features`, `delete_status`, `created_at`, `updated_at`) VALUES
(2, '1', 'student plan', '300', '20', 'kjdlkckd', '<ul class=\"plan-stats\">\r\n											<li>Regular seating</li>\r\n											<li>Free snacks</li>\r\n											<li>Regular badge</li>\r\n											<li>Free Coffe</li>\r\n										</ul>', '1', '2021-11-01 08:46:35', '2021-11-02 06:16:47'),
(3, '2', 'tutor plan 1', '400', '20', 'kjscnksfc', '<ul class=\"plan-stats\">\r\n											<li>Regular seating</li>\r\n											<li>Free snacks</li>\r\n											<li>Regular badge</li>\r\n											<li>Free Coffe</li>\r\n										</ul>', '1', '2021-11-01 08:46:58', '2021-11-02 06:17:06'),
(4, '2', 'tutor plan 2', '600', '30', 'kmks', '<ul class=\"plan-stats\">\r\n											<li>Regular seating</li>\r\n											<li>Free snacks</li>\r\n											<li>Regular badge</li>\r\n											<li>Free Coffe</li>\r\n										</ul>', '1', '2021-11-01 08:47:23', '2021-11-02 06:17:23'),
(5, '3', 'Institute plan 1', '650', '20', 'kmldv', '<ul class=\"plan-stats\">\r\n											<li>Regular seating</li>\r\n											<li>Free snacks</li>\r\n											<li>Regular badge</li>\r\n											<li>Free Coffe</li>\r\n										</ul>', '1', '2021-11-01 08:47:45', '2021-11-02 06:17:39'),
(6, '3', 'institute plan 2', '900', '20', 'mvklfvkf', '<ul class=\"plan-stats\">\r\n											<li>Regular seating</li>\r\n											<li>Free snacks</li>\r\n											<li>Regular badge</li>\r\n											<li>Free Coffe</li>\r\n										</ul>', '1', '2021-11-01 08:48:08', '2021-11-02 06:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `about`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(4, 'Student Name', '70840374.jpeg', 'Ladies, meet your new hero. Men, prepare to be humbled. My friend Staci, or Spezzy as she’s known health Coach.', '1', '1', '2021-10-26 09:46:52', '2021-10-29 02:08:49'),
(5, 'Student Name', '42079713.jpeg', 'Ladies, meet your new hero. Men, prepare to be humbled. My friend Staci, or Spezzy as she’s known health Coach.', '1', '1', '2021-10-26 09:47:13', '2021-11-02 05:38:15'),
(6, 'Student Name', '32646642.jpeg', 'Ladies, meet your new hero. Men, prepare to be humbled. My friend Staci, or Spezzy as she’s known health Coach.', '1', '1', '2021-10-26 09:47:28', '2021-10-29 02:09:20'),
(7, 'Student Name', '92745771.jpeg', 'Ladies, meet your new hero. Men, prepare to be humbled. My friend Staci, or Spezzy as she’s known health Coach.', '1', '1', '2021-10-26 09:47:38', '2021-10-29 02:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subjects` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_qualification` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_qualification_doc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_proof` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `user_id`, `subjects`, `fee`, `gender`, `city`, `pincode`, `address`, `highest_qualification`, `highest_qualification_doc`, `profile_image`, `id_proof`, `occupation`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, NULL, 'Male', NULL, NULL, 'Neemdi, Chomu, Jaipur (Rajasthan) India. 303702', NULL, NULL, 'tutor_22312513.jpg', NULL, 'dsdssdjadjssd', '2021-10-27 10:42:23', '2021-10-28 22:17:02'),
(2, 5, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-12 03:49:30', '2021-11-11 22:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_forms`
--

CREATE TABLE `tutor_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjects` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highest_qualification` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_forms`
--

INSERT INTO `tutor_forms` (`id`, `name`, `email`, `mobile`, `subjects`, `city`, `pincode`, `highest_qualification`, `experience`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'dj', 'dj@gmail.com', '9694097246', 'html, css, js', 'Alwar', '12542', 'svsfv', 'svsv', '1', '2021-10-29 07:13:37', '2021-10-29 07:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_verify` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_type` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=>student, 2=>teacher, 3=>institute, 4=>admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `admin_verify`, `status`, `delete_status`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '9988552266', '$2y$10$hM.B2QG9LBKUTdDdpsIz7eT0ovyrHfZOHnsVEwLMO8roa6BDIFNx2', '0', '1', '1', '4', '2021-10-26 06:58:50', '2021-10-26 06:58:50'),
(2, 'gopal saini', NULL, '7742544602', '7742544602', '1', '1', '1', '1', '2021-10-26 11:52:19', '2021-10-28 02:32:41'),
(3, 'amit saini jangid', NULL, '1234567879', '$2y$10$b3NWVQjC5iiKzIu4pImVTeX0l7GzhwDp2eCiC48itxe6tEK01YoQC', '1', '1', '1', '2', '2021-10-27 03:56:55', '2021-10-28 22:17:02'),
(4, 'dj', 'aaa@gmail.com', '7742544601', '$2y$10$BUwX6RZztKl0YEW1h3hSzeiifUgiWwL0VFefob5kMsR6jz55UpjU6', '0', '0', '1', '1', '2021-10-28 08:48:23', '2021-10-28 08:48:23'),
(5, 'gopal saini', 'dj@gmail.com', '9694404527', '$2y$10$Y8qbpQ.5fNVkU6BuIdzQG.QcgtLYnGh8uP.pwcyhiInmVG4NAhlmO', '0', '1', '1', '2', '2021-10-28 08:50:19', '2021-11-11 22:19:33'),
(6, 'saini ji', 'gopalsaincscdi.img1@gmail.com', '6644444444', '$2y$10$RKsN8VflIHRoe4utR7YGM.5tPWW3RctBknAqtEAh5VWB7iwmunB7.', '0', '0', '1', '1', '2021-10-28 10:02:12', '2021-10-28 10:02:12'),
(7, 'deepesh jangid', 'gopalsaini.img1@gmail.com', '9692404527', '$2y$10$XuvtCKDdWCJx5OYmXX10g.yRpQlLZ./0gK8X4RYLpMCD5CHe/0YZu', '0', '0', '1', '1', '2021-10-28 10:02:54', '2021-10-28 10:02:54'),
(8, 'lokesh', 'lokesh@gmail.com', '7976821913', '$2y$10$8Th7mDuyu01O29xLIrnsIufCqYpnygsQKIIsKz6OzD4r6h.BbnXOC', '1', '1', '1', '1', '2021-10-28 10:05:19', '2021-10-28 05:45:30'),
(9, 'sfvsvsd', 'gopalsainfei.img1@gmail.com', '6985541847', '$2y$10$.qEjlFKwTdGtMuw7b6pYW.YLUJHFBIRbcZ8sIb3jDwTQRf0756Qz6', '1', '1', '1', '1', '2021-10-28 10:24:01', '2021-10-28 10:24:01'),
(10, 'ins', 'ins@gmail.com', '9694404520', '$2y$10$XUIW3UbaYluINDz2ZzWWYOGb79yT0D/RbaHe0munEhm4Vzj07.c3e', '1', '1', '1', '3', '2021-10-28 10:38:36', '2021-10-28 10:38:36'),
(11, 'dj', 'adsdcsdcmin@gmail.com', '1234567872', '$2y$10$zt7KLmY.zU5bM99baFEb8uU5WTD8VYUIHZRp.mrD1FgdiN1L8wcAi', '1', '1', '1', '3', '2021-10-28 11:16:34', '2021-10-28 11:16:34'),
(12, 'coca', 'coca@gmail.com', '9694404521', '$2y$10$s70YOHFKylaW/yHgsk0NduIY7Ph1mfiOe3Zf8ak9MT31hwG/mI59e', '1', '1', '1', '3', '2021-10-28 11:33:00', '2021-10-28 06:41:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_information`
--
ALTER TABLE `contact_us_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institutes_user_id_foreign` (`user_id`);

--
-- Indexes for table `institute_forms`
--
ALTER TABLE `institute_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paytms`
--
ALTER TABLE `paytms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paytms_user_id_foreign` (`user_id`),
  ADD KEY `paytms_subscription_plan_id_foreign` (`subscription_plan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seeders`
--
ALTER TABLE `seeders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_forms`
--
ALTER TABLE `student_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutors_user_id_foreign` (`user_id`);

--
-- Indexes for table `tutor_forms`
--
ALTER TABLE `tutor_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us_information`
--
ALTER TABLE `contact_us_information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institute_forms`
--
ALTER TABLE `institute_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paytms`
--
ALTER TABLE `paytms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seeders`
--
ALTER TABLE `seeders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_forms`
--
ALTER TABLE `student_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutor_forms`
--
ALTER TABLE `tutor_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `institutes`
--
ALTER TABLE `institutes`
  ADD CONSTRAINT `institutes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `paytms`
--
ALTER TABLE `paytms`
  ADD CONSTRAINT `paytms_subscription_plan_id_foreign` FOREIGN KEY (`subscription_plan_id`) REFERENCES `subscription_plans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paytms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
