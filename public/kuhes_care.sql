-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 11:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuhes_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `client_id`, `topic`, `therapist_id`, `date_and_time`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'testing book appointment feature', '1', '2024-04-28 20:24:19', 'cancelled', '2024-04-22 07:44:07', '2024-04-28 20:24:19'),
(2, '2', 'i want you to help me discuss about abc', '1', '2024-04-28 20:10:17', 'cancelled', '2024-04-23 10:52:33', '2024-04-23 10:52:33'),
(3, '3', 'i want to discuss about how to deal with depression', '3', '2024-05-01 10:30:00', 'pending', '2024-05-01 11:53:19', '2024-05-01 11:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `table` varchar(255) NOT NULL,
  `caption` longtext NOT NULL,
  `read_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `blog_id` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment_replies`
--

CREATE TABLE `blog_comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment_id` varchar(255) NOT NULL,
  `reply` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `read_count` int(11) NOT NULL DEFAULT 0,
  `like_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `therapist_id`, `image_url`, `title`, `details`, `read_count`, `like_count`, `created_at`, `updated_at`) VALUES
(1, '1', 'BookPic-Therapist One_1712606328.jpg', 'How to deal with ABC', 'Depression is a prevalent mood disorder that can leave you feeling persistently down and devoid of motivation. While it can be a debilitating condition, there are effective ways to manage depression and improve your overall well-being. This article explores some practical strategies you can incorporate into your daily life to cope with depression. Self-Care Strategies: Harness the Power of Bewegung (Movement): Regular exercise is a scientifically proven mood booster. Aim for at least 20 minutes of moderate-intensity exercise most days of the week. Brisk walking, swimming, or dancing are all excellent options. Fuel Your Body Right: Eating a balanced diet rich in fruits, vegetables, and whole grains can significantly impact your mood. Limit processed foods and sugary drinks, which can worsen depressive symptoms. ', 21, 0, '2024-04-08 19:58:48', '2024-05-01 08:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `book_comments`
--

CREATE TABLE `book_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_comments`
--

INSERT INTO `book_comments` (`id`, `user_id`, `book_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, '3', '1', 'nice book', '2024-04-08 20:33:17', '2024-04-08 20:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `book_comment_replies`
--

CREATE TABLE `book_comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment_id` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_comment_replies`
--

INSERT INTO `book_comment_replies` (`id`, `user_id`, `comment_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, '3', '1', 'nice comment', '2024-04-08 20:42:48', '2024-04-08 20:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `client_id`, `therapist_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2024-04-08 19:26:45', '2024-04-08 19:26:45'),
(2, '2', '1', '2024-04-18 07:18:01', '2024-04-18 07:18:01'),
(3, '2', '3', '2024-04-30 20:26:48', '2024-04-30 20:26:48'),
(4, '2', '4', '2024-05-01 07:59:56', '2024-05-01 07:59:56'),
(5, '2', '5', '2024-05-01 08:00:12', '2024-05-01 08:00:12'),
(6, '3', '3', '2024-05-01 10:33:26', '2024-05-01 10:33:26'),
(7, '3', '1', '2024-05-01 10:33:40', '2024-05-01 10:33:40'),
(8, '3', '4', '2024-05-01 10:33:54', '2024-05-01 10:33:54'),
(9, '3', '5', '2024-05-01 10:34:06', '2024-05-01 10:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sub_exp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `phone_number`, `email`, `sub_exp_date`, `created_at`, `updated_at`) VALUES
(1, 'User', 'One', '2024-04-22', 'male', '0987465768', 'uuss@gmail.com', '2024-05-09 02:14:00', '2024-04-08 19:25:42', '2024-04-08 19:25:42'),
(2, 'John', 'Banda', '2004-05-08', 'male', '0885657456', 'johnbanda@gmail.com', '2024-05-11 06:15:00', '2024-04-10 09:36:22', '2024-04-10 09:36:22'),
(3, 'Leroy', 'Namarika', '2002-02-18', 'male', '0993930231', 'leroynamarika@gmail.com', '2024-05-31 14:06:33', '2024-05-01 10:19:50', '2024-05-01 14:06:34');

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
  `chat_id` varchar(255) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `sender_id`, `message`, `image_url`, `seen`, `created_at`, `updated_at`) VALUES
(1, '1', 'C-1', 'Hie Doc', NULL, 1, '2024-04-08 19:27:05', '2024-04-08 19:36:14'),
(2, '1', 'T-1', 'hey how are you doing', NULL, 1, '2024-04-08 19:37:05', '2024-04-08 19:45:45'),
(3, '1', 'C-1', 'am fine', NULL, 1, '2024-04-08 19:45:57', '2024-04-08 19:50:52'),
(4, '1', 'C-1', 'i have an issue i want to talk about', NULL, 1, '2024-04-08 19:48:08', '2024-04-08 19:50:52'),
(5, '1', 'T-1', 'good morning', NULL, 1, '2024-04-09 08:48:19', '2024-04-09 09:08:15'),
(6, '1', 'C-1', 'good afternoon', NULL, 1, '2024-04-09 11:17:33', '2024-04-09 11:22:03'),
(7, '1', 'C-1', 'how are you today', NULL, 1, '2024-04-09 11:17:53', '2024-04-09 11:26:50'),
(8, '1', 'T-1', 'am fine thank', NULL, 1, '2024-04-09 11:31:01', '2024-04-09 12:11:26'),
(9, '1', 'T-1', 'wud', NULL, 1, '2024-04-09 11:31:19', '2024-04-09 12:11:27'),
(10, '1', 'C-1', 'non much just testing out the chat feature', NULL, 1, '2024-04-09 12:12:46', '2024-04-09 12:18:44'),
(11, '1', 'C-1', 'user picture', 'MessagePic-User One_1712665079.jpg', 1, '2024-04-09 12:17:59', '2024-04-09 12:18:44'),
(12, '1', 'T-1', 'therapist picture', 'MessagePic-Therapist One_1712665292.jpg', 1, '2024-04-09 12:21:32', '2024-04-09 14:37:37'),
(13, '1', 'C-1', 'hie', NULL, 1, '2024-04-10 09:26:44', '2024-04-27 17:31:33'),
(14, '2', 'C-2', 'hie therapist', NULL, 1, '2024-04-18 07:22:22', '2024-04-27 17:31:36'),
(15, '2', 'C-2', 'hie', NULL, 1, '2024-04-27 17:54:14', '2024-04-27 17:54:21'),
(16, '2', 'T-1', 'how are you.. i am just testing out my self made real time chat feature', NULL, 1, '2024-04-27 17:57:38', '2024-04-27 17:57:50'),
(17, '2', 'C-2', 'test', NULL, 1, '2024-04-27 17:58:06', '2024-04-27 17:58:10'),
(18, '2', 'T-1', 'yes its kinda working', NULL, 1, '2024-04-27 18:03:33', '2024-04-27 18:04:21'),
(19, '2', 'C-2', 'test again', NULL, 1, '2024-04-27 18:04:39', '2024-04-27 18:04:43'),
(20, '2', 'T-1', 'yeeah', NULL, 1, '2024-04-27 18:04:55', '2024-04-27 18:07:44'),
(21, '2', 'C-2', 'testing real time with pic', 'MessagePic-John Banda_1714241345.jpg', 1, '2024-04-27 18:09:05', '2024-04-27 18:09:06'),
(22, '2', 'T-1', 'it didnt work...try again', NULL, 1, '2024-04-27 18:10:45', '2024-04-27 18:11:12'),
(23, '2', 'C-2', 'testing rea time with pic again', 'MessagePic-John Banda_1714241504.jpg', 1, '2024-04-27 18:11:44', '2024-04-27 18:11:50'),
(24, '2', 'T-1', 'yeah it works', NULL, 1, '2024-04-27 18:12:11', '2024-04-27 18:15:35'),
(25, '2', 'T-1', 'trying to send  pic from therapist side to test real time chat', 'MessagePic-Therapist One_1714241576.jpg', 1, '2024-04-27 18:12:56', '2024-04-27 18:15:36'),
(26, '2', 'C-2', 'it didnt work', NULL, 1, '2024-04-27 18:16:01', '2024-04-27 18:16:01'),
(27, '2', 'T-1', 'jj', NULL, 1, '2024-04-27 18:16:17', '2024-04-27 18:18:19'),
(28, '2', 'T-1', 'testing again', 'MessagePic-Therapist One_1714241809.jpg', 1, '2024-04-27 18:16:49', '2024-04-27 18:18:19'),
(29, '2', 'C-2', 'didnt work again', NULL, 1, '2024-04-27 18:18:16', '2024-04-27 18:18:18'),
(30, '2', 'T-1', 'ok', NULL, 1, '2024-04-27 18:18:42', '2024-04-27 18:20:02'),
(31, '2', 'T-1', 'trying again', 'MessagePic-Therapist One_1714241972.jpg', 1, '2024-04-27 18:19:32', '2024-04-27 18:20:02'),
(32, '2', 'C-2', 'its now working', NULL, 1, '2024-04-27 18:20:00', '2024-04-27 18:20:01'),
(33, '3', 'C-2', 'hey', NULL, 1, '2024-04-30 20:35:15', '2024-04-30 20:38:00'),
(34, '3', 'C-2', 'how are you today', NULL, 1, '2024-04-30 20:36:01', '2024-04-30 20:38:00'),
(35, '3', 'T-3', 'i am fine', NULL, 1, '2024-04-30 20:38:15', '2024-04-30 20:39:13'),
(36, '3', 'T-3', 'how can i help you today', NULL, 1, '2024-04-30 20:38:33', '2024-04-30 20:39:13'),
(37, '3', 'C-2', 'good morning', NULL, 0, '2024-05-01 08:07:27', '2024-05-01 08:07:27'),
(38, '3', 'C-2', 'i wanted to discuss about how to deal with depression', NULL, 0, '2024-05-01 08:07:52', '2024-05-01 08:07:52'),
(39, '6', 'C-3', 'Good morning madam', NULL, 1, '2024-05-01 10:35:40', '2024-05-01 10:37:57'),
(40, '6', 'T-3', 'Morning.. how are you today Leroy', NULL, 1, '2024-05-01 10:40:46', '2024-05-01 10:42:23'),
(41, '6', 'C-3', 'testing to send message with a picture', 'MessagePic-Leroy Namarika_1714563399.png', 1, '2024-05-01 11:36:39', '2024-05-01 18:03:18'),
(42, '6', 'T-3', 'oh nice.. so everything is working huh?.. nice.. Leroy is a real good code engineer lol', NULL, 0, '2024-05-01 18:07:32', '2024-05-01 18:07:32');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2024_04_04_093805_create_sessions_table', 1),
(10, '2024_04_04_115354_create_clients_table', 1),
(11, '2024_04_04_115712_create_therapists_table', 1),
(12, '2024_04_04_115724_create_chats_table', 1),
(13, '2024_04_04_115736_create_messages_table', 1),
(14, '2024_04_04_115806_create_blogs_table', 1),
(15, '2024_04_04_115902_create_blog_comments_table', 1),
(16, '2024_04_04_115924_create_blog_comment_replies_table', 1),
(17, '2024_04_04_115940_create_posts_table', 1),
(18, '2024_04_04_115949_create_post_comments_table', 1),
(19, '2024_04_04_115959_create_post_comment_replies_table', 1),
(20, '2024_04_04_120015_create_videos_table', 1),
(21, '2024_04_04_120026_create_video_comments_table', 1),
(22, '2024_04_04_120035_create_video_comment_replies_table', 1),
(23, '2024_04_04_120100_create_books_table', 1),
(24, '2024_04_04_120110_create_book_comments_table', 1),
(25, '2024_04_04_120119_create_book_comment_replies_table', 1),
(26, '2024_04_04_121026_create_peer_posts_table', 1),
(27, '2024_04_04_123358_create_payments_table', 1),
(28, '2024_04_16_084134_create_appointments_table', 2),
(30, '2024_04_22_065113_create_reviews_table', 3);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'malawi kwacha',
  `method` varchar(255) NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `client_id`, `amount`, `currency`, `method`, `trans_id`, `created_at`, `updated_at`) VALUES
(1, 'User One\'s April\'s subcription', '1', '2000', 'malawi kwacha', 'tnm mpamba', 'AK1234', '2024-04-08 19:25:42', '2024-04-08 19:25:42'),
(2, 'John Banda\'s April\'s subcription', '2', '2000', 'malawi kwacha', 'airtel money', 'MP240410.1123.D30652', '2024-04-10 09:36:22', '2024-04-10 09:36:22'),
(3, 'Leroy Namarika\'s May\'s subcription', '3', '2000', 'malawi kwacha', 'airtel money', 'MP1234', '2024-05-01 14:05:51', '2024-05-01 14:05:51'),
(4, 'Leroy Namarika\'s May\'s subcription', '3', '2000', 'malawi kwacha', 'airtel money', 'MP1234', '2024-05-01 14:06:33', '2024-05-01 14:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `peer_posts`
--

CREATE TABLE `peer_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` longtext NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `likes_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` longtext NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `likes_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `caption`, `image_url`, `likes_count`, `created_at`, `updated_at`) VALUES
(1, '3', 'My First Post', 'Heyyy here is the first peer chat post', NULL, 1, '2024-04-08 19:55:42', '2024-04-08 19:55:48'),
(2, '3', 'Comforting', 'very comforting post', 'PostPic-User One_1712610433.jpg', 1, '2024-04-08 21:07:13', '2024-04-19 14:35:39'),
(3, '3', 'dealing with mental health', 'i had an issue with mental health', NULL, 1, '2024-04-10 09:27:56', '2024-04-10 09:28:08'),
(4, '4', 'Hey Guys', 'How is everyone feeling today', 'PostPic-User One_1712610433.jpg', 0, '2024-05-01 08:25:46', '2024-05-01 08:25:46'),
(5, '4', 'How to deal with depression', 'guys today i wanted to get some feedback from you guys on how you dealt with depression', NULL, 0, '2024-05-01 08:27:56', '2024-05-01 08:27:56'),
(6, '9', 'Trying to add a new post', 'Just trying to add a new post for the final repost screenshot', NULL, 0, '2024-05-01 12:07:00', '2024-05-01 12:07:00'),
(7, '9', 'Adding a post with a Picture Attached', 'Here is a post with a picture attached', 'PostPic-Leroy Namarika_1714565654.jpg', 1, '2024-05-01 12:14:14', '2024-05-01 12:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'congrats on your first post', '2024-04-08 19:56:51', '2024-04-08 19:56:51'),
(2, '3', '1', 'thanks', '2024-04-08 20:58:26', '2024-04-08 20:58:26'),
(3, '3', '3', 'me too', '2024-04-10 09:28:30', '2024-04-10 09:28:30'),
(4, '9', '7', 'nice post.. trying the comment on post feature', '2024-05-01 12:25:13', '2024-05-01 12:25:13'),
(5, '2', '7', 'Nice post', '2024-05-01 12:33:51', '2024-05-01 12:33:51'),
(8, '4', '7', 'Nice Post', '2024-05-01 12:39:20', '2024-05-01 12:39:20'),
(9, '6', '7', 'nice post indeed', '2024-05-01 20:50:07', '2024-05-01 20:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment_replies`
--

CREATE TABLE `post_comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment_id` varchar(255) NOT NULL,
  `reply` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comment_replies`
--

INSERT INTO `post_comment_replies` (`id`, `user_id`, `comment_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, '3', '1', 'thanks', '2024-04-08 21:04:29', '2024-04-08 21:04:29'),
(2, '6', '4', 'yes the comment feature is working', '2024-05-01 20:53:59', '2024-05-01 20:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `review` longtext NOT NULL,
  `star_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `client_id`, `therapist_id`, `review`, `star_count`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'testing review feature', 3, '2024-04-22 05:35:10', '2024-04-22 05:35:10'),
(2, '2', '1', 'testing review average feature', 2, '2024-04-22 05:39:24', '2024-04-22 05:39:24'),
(3, '2', '1', 'testing review star average', 5, '2024-04-22 05:40:06', '2024-04-22 05:40:06'),
(4, '2', '1', 'this therapist is good because he has helped me overcome my depression', 5, '2024-04-23 10:50:38', '2024-04-23 10:50:38'),
(5, '2', '3', 'testing rating', 4, '2024-04-30 20:10:37', '2024-04-30 20:10:37'),
(6, '2', '4', 'nice', 2, '2024-05-01 07:56:05', '2024-05-01 07:56:05'),
(7, '2', '5', 'nice', 4, '2024-05-01 07:56:35', '2024-05-01 07:56:35');

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
('AWysulhWYf4Dq26BVOpTsZeVq81Zq6alWzFTAm3V', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib3Fja3dTemkwV3NURklMNnlMek1JWkJlM3dsTmdxem9sT2tMSnpjSCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cDovL2xvY2FsaG9zdC9rdWhlcy1jYXJlL3B1YmxpYy91c2VyL3RoZXJhcGlzdHMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MDoiaHR0cDovL2xvY2FsaG9zdC9rdWhlcy1jYXJlL3B1YmxpYy91c2VyL3RoZXJhcGlzdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1714568821),
('L9bKlYEtJu1VTqUumrqdGXnCOkzrAAq100G2SvBo', 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNHIwWFNhbVdHbXE0NDFnRjJSVFdxVFJwcllYSlo4VXROTnY4dnVETyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Qva3VoZXMtY2FyZS9wdWJsaWMvdGhlcmFwaXN0L3BlZXJfY2hhdC9wb3N0LzciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1714596841),
('TmifFr40Y38DUt6jTcNXFf4f7ifZoMf5ykmazDrV', 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQzZCQmxyb2wyb0tVNVphNlcxbGtxMWlwaXNQN2xJTk5ORXFVcEp6aSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3Qva3VoZXMtY2FyZS9wdWJsaWMvdGhlcmFwaXN0L3ZpZGVvLzUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1714571564);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 3, 'User\'s Team', 1, '2024-04-08 19:25:43', '2024-04-08 19:25:43'),
(2, 4, 'John\'s Team', 1, '2024-04-10 09:36:23', '2024-04-10 09:36:23'),
(3, 9, 'Leroy\'s Team', 1, '2024-05-01 10:19:51', '2024-05-01 10:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapists`
--

CREATE TABLE `therapists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_url` longtext NOT NULL,
  `about` longtext NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapists`
--

INSERT INTO `therapists` (`id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `phone_number`, `email`, `image_url`, `about`, `qualification`, `experience`, `created_at`, `updated_at`) VALUES
(1, 'Jake', 'Phiri', '2000-01-01', 'male', '0883083930', 'therapist_one@gmail.com', 'TherapistPic-Therapist One_Profile_Picture_1712597813.jpg', 'Therapist One Bio', 'PhD in Therapy', '10 years experience', '2024-04-08 17:36:53', '2024-04-08 17:36:53'),
(3, 'Catherine', 'Banda', '2000-05-08', 'female', '0997465768', 'catherine_banda@kuhes-care.com', 'TherapistPic-Catherine Banda_Profile_Picture_1714507471.jpg', 'Catherine Banda is a qualified therapist specializing in mental health', 'Therapist', '10 years', '2024-04-30 20:04:31', '2024-04-30 20:04:31'),
(4, 'Mathew', 'Chisi', '2001-01-09', 'male', '0883083930', 'mathew_Chisi@kuhes-care.com', 'TherapistPic-Mathew Chisi_Profile_Picture_1714549796.jpg', 'Mathew Chisi Bio', 'Depression Expert', '8 years experience', '2024-05-01 07:49:56', '2024-05-01 07:49:56'),
(5, 'Mercy', 'Nyirenda', '2000-06-01', 'female', '0999930231', 'mercy_nyirenda@kuhes-care.com', 'TherapistPic-Mercy Nyirenda_Profile_Picture_1714549969.jpg', 'Mercy Nyirenda Bio', 'Mental Health', '6 years experience', '2024-05-01 07:52:49', '2024-05-01 07:52:49'),
(6, 'Temwa', 'Ndilikuti', '2000-07-06', 'female', '0987993768', 'temwa_ndilikuti@kuhes-care.com', 'TherapistPic-Temwa Ndilikuti_Profile_Picture_1714583413.jpg', 'Temwa Ndilikuti is a well know mental health specialist who has helped many people in dealing with mental health issues', 'Mental Health Specialist', '4 years experience', '2024-05-01 17:10:13', '2024-05-01 17:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `last_seen` varchar(255) NOT NULL DEFAULT 'nn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `phone_number`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `last_seen`, `created_at`, `updated_at`) VALUES
(1, 'Leroy Admin', 'admin', '0983930231', 'leroy_admin@kuhes-care.com', NULL, '$2y$10$CfCUNyva//xDUPrAgkD1I.8aICgTgFOmbs9/caVX7aCd3SyYPkB9.', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 19:35:40', '2024-04-08 17:35:40', '2024-04-08 17:35:40'),
(2, 'Jake Phiri', 'therapist', '0883083930', 'therapist_one@gmail.com', NULL, '$2y$10$jmsXlZkOIfH5EBJeS3cVuugQeGlPUInpigUo2qboeF9Z0HxjSzetS', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 19:56:42', '2024-04-08 17:36:54', '2024-05-01 17:56:42'),
(3, 'User One', 'user', '0987465768', 'uuss@gmail.com', NULL, '$2y$10$nNTJ1pXiDG4yswyXCsyVRuAVzT6TR0QxkXfBAS42azfVE8RCKfiS2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-16 07:23:46', '2024-04-08 19:25:43', '2024-04-16 05:23:46'),
(4, 'John Banda', 'user', '0885657456', 'johnbanda@gmail.com', NULL, '$2y$10$GJWcpfrcWDOrMDtpp9Ts6OgIZPN2BdM.ZqDpuuW0pazKBAbfixm6m', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 14:39:38', '2024-04-10 09:36:22', '2024-05-01 12:39:38'),
(6, 'Catherine Banda', 'therapist', '0997465768', 'catherine_banda@kuhes-care.com', NULL, '$2y$10$Hqu856EOFWVtUrt5Q2GIFuPx2NvwDlqApYsW7hO27vLElTr.LOD5K', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 22:54:00', '2024-04-30 20:04:31', '2024-05-01 20:54:00'),
(7, 'Mathew Chisi', 'therapist', '0883083930', 'mathew_Chisi@kuhes-care.com', NULL, '$2y$10$qi/Hxa/Q1APFHR0mznAPr.YFxCTDVka.TpPUfwtt3Z3cWIYFfkS1a', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 09:53:22', '2024-05-01 07:49:56', '2024-05-01 07:53:22'),
(8, 'Mercy Nyirenda', 'therapist', '0999930231', 'mercy_nyirenda@kuhes-care.com', NULL, '$2y$10$esO8NrXcnTk6ag.j8JE35.k7hHFdPce5bVYLSQEDvmWrFBJlbd/Mm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 09:53:51', '2024-05-01 07:52:50', '2024-05-01 07:53:51'),
(9, 'Leroy Namarika', 'user', '0993930231', 'leroynamarika@gmail.com', NULL, '$2y$10$rbLPjUICdRSHp5sA/xvqIeRkI6.0EoNPITzPAoLpjXSgmoS1PWa6y', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 22:13:06', '2024-05-01 10:19:50', '2024-05-01 20:13:06'),
(10, 'Temwa Ndilikuti', 'therapist', '0987993768', 'temwa_ndilikuti@kuhes-care.com', NULL, '$2y$10$gD.6LSIboxSGqy/jlzIOseUggqtZXHt4nG4WZfDSB7mRTClyc/anq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 19:10:14', '2024-05-01 17:10:15', '2024-05-01 17:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `like_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_comment_replies`
--

CREATE TABLE `video_comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment_id` varchar(255) NOT NULL,
  `reply` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment_replies`
--
ALTER TABLE `blog_comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_comments`
--
ALTER TABLE `book_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_comment_replies`
--
ALTER TABLE `book_comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peer_posts`
--
ALTER TABLE `peer_posts`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comment_replies`
--
ALTER TABLE `post_comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `therapists`
--
ALTER TABLE `therapists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_comment_replies`
--
ALTER TABLE `video_comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comment_replies`
--
ALTER TABLE `blog_comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_comments`
--
ALTER TABLE `book_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_comment_replies`
--
ALTER TABLE `book_comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peer_posts`
--
ALTER TABLE `peer_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_comment_replies`
--
ALTER TABLE `post_comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_comment_replies`
--
ALTER TABLE `video_comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
