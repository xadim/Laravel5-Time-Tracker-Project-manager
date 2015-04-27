-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2015 at 02:36 PM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c3drive_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `city` text COLLATE utf8_unicode_ci,
  `state` text COLLATE utf8_unicode_ci,
  `country` text COLLATE utf8_unicode_ci,
  `postal` int(11) DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `phone1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `person` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `postal`, `email`, `phone1`, `phone2`, `person`, `created_at`, `updated_at`) VALUES
(1, 3, 'Graphite', '2800 Shirlington Road, 9th Floor', 'Arlington', 'VA', 'US', 22206, 'hoon@hoondesigns.com', '703-998-3000', '703-998-3000', 'Hoon', '2015-04-10 01:18:34', '2015-04-10 18:25:33'),
(2, 3, 'The Lukens Company', '2800 Shirlington Road, 9th Floor', 'Arlington', 'VA', 'US', 22206, 'info@thelukenscompany.com', '703-998-3000', '703-998-3000', 'Lukens', '2015-04-10 18:24:02', '2015-04-10 18:26:37'),
(3, 3, 'ILC', '2800 Shirlington Road, 9th Floor', 'Arlington', 'VA', 'US', 22206, 'danielle@ilc.com', '703-998-3000', '703-998-3000', 'Danielle', '2015-04-10 18:30:45', '2015-04-10 18:30:45'),
(4, 3, 'B-BOB-Q', '2800 Shirlington Road, 9th Floor', 'Arlington', 'VA', 'US', 22206, 'sts@bbobq.com', '703-998-3000', '703-998-3000', 'Test', '2015-04-10 18:31:56', '2015-04-10 18:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_project_id_foreign` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `project_id`, `created_at`, `updated_at`) VALUES
(25, 3, 'test dev', 21, '2015-04-06 23:45:32', '2015-04-06 23:45:32'),
(26, 3, 'test 2!', 21, '2015-04-06 23:46:37', '2015-04-06 23:46:37'),
(27, 3, 'test3', 21, '2015-04-06 23:49:03', '2015-04-06 23:49:03'),
(28, 3, 'test redirect.', 21, '2015-04-06 23:50:37', '2015-04-06 23:50:37'),
(29, 3, 'test3', 21, '2015-04-06 23:53:56', '2015-04-06 23:53:56'),
(30, 3, 'First set of designs to be done later today.', 32, '2015-04-09 19:53:26', '2015-04-09 19:53:26'),
(31, 3, 'Use LA Event program as template.', 32, '2015-04-09 19:54:23', '2015-04-09 19:54:23'),
(32, 3, 'Phase 2  Received changes, making...	', 32, '2015-04-09 20:05:34', '2015-04-09 20:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_17_155742_create_users_table', 1),
('2015_03_19_201051_create_credentials_table', 1),
('2015_03_18_153425_create_projects_table', 2),
('2015_03_20_192359_create_comments_table', 3),
('2015_03_23_153425_create_projects_table', 4),
('2015_03_23_192359_create_comments_table', 5),
('2015_03_24_214836_create_projects_and_tasks_tables', 6),
('2015_03_25_214836_create_projects_and_tasks_tables', 7),
('2015_03_25_914836_create_projects_and_tasks_tables', 8),
('2015_03_31_192359_create_comments_table', 9),
('2015_04_09_182500_create_clients_table', 10),
('2015_04_10_142628_create_types_table', 11),
('2015_04_10_150832_create_phases_table', 12),
('2015_04_13_151818_create_timings_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khadime@hoondesigns.com', 'db8e7a194a4fa0abe191726bd1f7559e1732239d454956f3efcef23f181d80c7', '2015-03-31 19:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE IF NOT EXISTS `phases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type_id` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phases_project_id_foreign` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `user_id`, `project_id`, `description`, `type_id`, `created_at`, `updated_at`, `client_id`) VALUES
(13, 3, 30, 'Phase test III', '2', '2015-04-13 20:40:30', '2015-04-23 23:46:06', 3),
(14, 3, 31, 'American Liberty Design Package', '1', '2015-04-20 21:21:17', '2015-04-22 00:07:08', 1),
(15, 3, 32, 'McCain DirectMail Campaign Design', '1', '2015-04-21 21:32:50', '2015-04-22 21:11:00', 2),
(17, 3, 21, 'test with client', '3', '2015-04-22 00:05:37', '2015-04-22 00:05:37', 1),
(20, 3, 8, 'BBQ Developments', '1', '2015-04-22 02:24:22', '2015-04-22 21:10:21', 4),
(21, 2, 32, 'Test with connected user', '2', '2015-04-22 23:40:37', '2015-04-22 23:40:37', 2),
(24, 3, 32, 'Campaign 99 Design', '2', '2015-04-24 01:42:50', '2015-04-24 01:42:50', 2),
(25, 3, 32, 'Campaign 99 Production', '2', '2015-04-24 01:43:15', '2015-04-24 01:43:15', 2),
(26, 3, 38, 'American Liberty Design Package', '1', '2015-04-24 01:47:11', '2015-04-24 01:47:11', 2),
(27, 3, 38, 'American Liberty Design Package', '1', '2015-04-24 01:48:41', '2015-04-24 01:48:41', 2),
(28, 3, 38, 'American Liberty Design Package', '1', '2015-04-24 01:54:54', '2015-04-24 22:06:20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `tags` text COLLATE utf8_unicode_ci,
  `unit` text COLLATE utf8_unicode_ci,
  `status` text COLLATE utf8_unicode_ci,
  `user_id` int(10) unsigned NOT NULL,
  `authorized_users` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `title`, `desc`, `tags`, `unit`, `status`, `user_id`, `authorized_users`, `slug`, `created_at`, `updated_at`) VALUES
(3, 1, 'Mary Kate Cary', 'Mary Kate Cary is executive producer of “41ON41,” a documentary film about former President George H.W. Bush, the 41st president of the United States.  In it, 41 extraordinary people tell their best stories about his leadership, good humor, bipartisanship and integrity.  The film debuted on CNN domestically in June 2014, receiving good ratings and a very positive response on social media.  “41ON41” was a featured film at the 2014 Virginia Film Festival in Charlottesville, Virginia and will soon be available on Netflix.\r\n\r\nMs. Cary served as a White House speechwriter for President Bush from 1989 to early 1992, authoring over 100 Presidential addresses by him.  She has ghostwritten several books, two of them about the former President.  Ms. Cary has been an Advisory Board member of the George Bush Presidential Library and Museum at Texas A&M University since 2004.\r\n\r\nIn addition to making “41ON41,” Ms. Cary is a professional speechwriter specializing in political and corporate communications, writing for a variety of national political and corporate leaders.  Some of her assignments have included State of the Union responses, Republican National Convention addresses, TED talks, and domestic and international speeches.', 'web, designs', 'MKC', 'Billed', 3, 'khadime@hoondesigns.com, ', 'mary-kate-cary', '2015-03-14 06:47:01', '2015-04-23 20:49:17'),
(8, 4, 'BBQ Letterhead', 'Create a letterhead that can be used for financial w/ a watermark.\r\n\r\n', 'print', 'n/a', 'Work-in-Progress', 3, '', 'BBQ_Letterhead', '2015-03-25 06:09:30', '2015-04-10 18:33:51'),
(21, 1, 'After migration', 'after the migration', 'dev', '0', 'On-hold', 3, 'khadime@hoondesigns.com, ', 'after', '2015-04-01 00:01:14', '2015-04-23 23:31:52'),
(24, 1, 'Real project', 'This is a Real project for xadim\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'designs', '0/n', 'On-hold', 2, 'khadime@hoondesigns.com, ', 'task-1', '2015-04-01 00:49:51', '2015-04-23 23:44:21'),
(30, 3, 'ILC Catering Website Graphics', 'Creating web graphics to customize standard www.restaurantcateringsystems.com template for ILC.\r\n\r\nContact: Danielle Ballantyne', 'ILC, catering', '', 'Work-in-Progress', 4, '', 'ILC-Catering-Website-Graphics', '2015-04-01 02:09:01', '2015-04-23 23:42:46'),
(31, 1, 'America''s Liberty PAC', 'Quick logo comps for Rand Paul''s PAC', 'Political, TLC', '', 'Work-in-Progress', 4, 'khadime@hoondesigns.com, ', 'Americas-Liberty-PAC', '2015-04-02 19:10:26', '2015-04-23 23:43:50'),
(32, 2, 'McCain - Program', 'Create design - Phase 1', 'NYC Event Program', '', 'Finished', 3, '', 'tmi-program', '2015-04-09 19:51:46', '2015-04-23 21:17:15'),
(36, 2, 'Test Project with modal', '', '', '', 'Finished', 3, 'ariel@hoondesigns.com, ', 'Test-Project-with-modal', '2015-04-24 00:24:19', '2015-04-25 02:59:44'),
(37, 2, 'Test Project with modal validation', 'test Ajax validation', 'test', 'test', 'Work-in-Progress', 3, '', 'valid', '2015-04-24 01:14:19', '2015-04-24 01:14:19'),
(38, 2, 'Test Project with modal validation 2', 'test Ajax validation', 'test', 'test', 'Work-in-Progress', 3, '', 'valid-2', '2015-04-24 01:21:23', '2015-04-24 01:21:23'),
(39, 1, 'Test Project with modal 3', '', '', '', 'Archived', 3, '', 'Test-Project-with-modal-3', '2015-04-24 01:22:27', '2015-04-24 01:36:21'),
(41, 1, 'Website building', '', 'web', '', 'Work-in-Progress', 2, '', 'website-building', '2015-04-27 23:47:43', '2015-04-27 23:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_designs` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_prod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_dev` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_task_designs` text COLLATE utf8_unicode_ci NOT NULL,
  `status_task_prod` text COLLATE utf8_unicode_ci NOT NULL,
  `status_task_dev` text COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `phase_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tasks_project_id_foreign` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=140 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_designs`, `task_prod`, `task_dev`, `status_task_designs`, `status_task_prod`, `status_task_dev`, `project_id`, `phase_id`, `created_at`, `updated_at`) VALUES
(23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'notStart', 'notStart', 'notStart', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'notStart', 'notStart', 'notStart', 8, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'notStart', 'notStart', 'notStart', 21, 0, '2015-04-01 00:01:14', '2015-04-01 00:01:14'),
(51, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'notStart', 'notStart', 'notStart', 24, 0, '2015-04-01 00:49:51', '2015-04-01 00:49:51'),
(54, '2015-04-01 02:09:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'start', 'notStart', 'notStart', 30, 0, '2015-04-01 02:09:01', '2015-04-01 02:09:01'),
(55, '2015-04-01 02:28:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'start', 'notStart', 'notStart', 24, 0, '2015-04-01 02:28:46', '2015-04-01 02:28:46'),
(56, '2015-04-01 02:57:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 30, 0, '2015-04-01 02:57:09', '2015-04-01 02:57:09'),
(57, '2015-04-01 02:57:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'end', 'notStart', 'notStart', 24, 0, '2015-04-01 02:57:27', '2015-04-01 02:57:27'),
(58, '2015-04-01 19:09:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'restart', 'notStart', 'notStart', 30, 0, '2015-04-01 19:09:56', '2015-04-01 19:09:56'),
(63, '2015-04-01 20:40:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 30, 0, '2015-04-01 20:40:00', '2015-04-01 20:40:00'),
(64, '2015-04-02 19:10:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'start', 'notStart', 'notStart', 31, 0, '2015-04-02 19:10:26', '2015-04-02 19:10:26'),
(65, '2015-04-06 20:02:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 31, 0, '2015-04-06 20:02:41', '2015-04-06 20:02:41'),
(66, '2015-04-06 20:05:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'start', 'notStart', 'notStart', 8, 0, '2015-04-06 20:05:50', '2015-04-06 20:05:50'),
(67, '2015-04-06 20:06:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 8, 0, '2015-04-06 20:06:00', '2015-04-06 20:06:00'),
(101, '0000-00-00 00:00:00', '2015-04-08 21:35:53', '0000-00-00 00:00:00', 'notStart', 'start', 'notStart', 21, 0, '2015-04-08 21:35:53', '2015-04-08 21:35:53'),
(102, '0000-00-00 00:00:00', '2015-04-08 21:35:53', '2015-04-08 21:36:35', 'notStart', 'start', 'start', 21, 0, '2015-04-08 21:36:35', '2015-04-08 21:36:35'),
(103, '2015-04-08 21:37:00', '2015-04-08 21:35:53', '2015-04-08 21:36:35', 'start', 'start', 'start', 21, 0, '2015-04-08 21:37:00', '2015-04-08 21:37:00'),
(104, '2015-04-08 21:37:00', '2015-04-08 21:37:19', '2015-04-08 21:36:35', 'start', 'pause', 'start', 21, 0, '2015-04-08 21:37:19', '2015-04-08 21:37:19'),
(105, '2015-04-08 21:37:00', '2015-04-08 21:37:19', '2015-04-08 21:37:31', 'start', 'pause', 'pause', 21, 0, '2015-04-08 21:37:31', '2015-04-08 21:37:31'),
(106, '2015-04-08 21:37:51', '2015-04-08 21:37:19', '2015-04-08 21:37:31', 'pause', 'pause', 'pause', 21, 0, '2015-04-08 21:37:51', '2015-04-08 21:37:51'),
(107, '2015-04-01 02:57:27', '2015-04-08 21:38:41', '0000-00-00 00:00:00', 'end', 'start', 'notStart', 24, 0, '2015-04-08 21:38:41', '2015-04-08 21:38:41'),
(114, '2015-04-01 02:57:27', '2015-04-08 21:38:41', '2015-04-08 21:39:34', 'end', 'start', 'start', 24, 0, '2015-04-08 21:39:34', '2015-04-08 21:39:34'),
(115, '2015-04-01 02:57:27', '2015-04-08 21:39:37', '2015-04-08 21:39:34', 'end', 'pause', 'start', 24, 0, '2015-04-08 21:39:37', '2015-04-08 21:39:37'),
(116, '2015-04-08 21:39:39', '2015-04-08 21:39:37', '2015-04-08 21:39:34', 'start', 'pause', 'start', 24, 0, '2015-04-08 21:39:39', '2015-04-08 21:39:39'),
(117, '2015-04-08 21:39:39', '2015-04-08 21:39:37', '2015-04-08 21:39:41', 'start', 'pause', 'pause', 24, 0, '2015-04-08 21:39:41', '2015-04-08 21:39:41'),
(118, '2015-04-08 21:39:44', '2015-04-08 21:39:37', '2015-04-08 21:39:41', 'pause', 'pause', 'pause', 24, 0, '2015-04-08 21:39:44', '2015-04-08 21:39:44'),
(119, '2015-04-08 21:39:44', '2015-04-08 21:53:26', '2015-04-08 21:39:41', 'pause', 'restart', 'pause', 24, 0, '2015-04-08 21:53:26', '2015-04-08 21:53:26'),
(120, '2015-04-08 21:39:44', '2015-04-08 22:01:45', '2015-04-08 21:39:41', 'pause', 'pause', 'pause', 24, 0, '2015-04-08 22:01:45', '2015-04-08 22:01:45'),
(121, '2015-04-09 00:44:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'restart', 'notStart', 'notStart', 31, 0, '2015-04-09 00:44:22', '2015-04-09 00:44:22'),
(122, '2015-04-09 00:44:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 31, 0, '2015-04-09 00:44:26', '2015-04-09 00:44:26'),
(123, '2015-04-06 20:06:00', '0000-00-00 00:00:00', '2015-04-09 02:13:56', 'pause', 'notStart', 'start', 8, 0, '2015-04-09 02:13:56', '2015-04-09 02:13:56'),
(124, '2015-04-06 20:06:00', '0000-00-00 00:00:00', '2015-04-09 02:15:16', 'pause', 'notStart', 'pause', 8, 0, '2015-04-09 02:15:16', '2015-04-09 02:15:16'),
(125, '2015-04-06 20:06:00', '0000-00-00 00:00:00', '2015-04-09 02:15:48', 'pause', 'notStart', 'restart', 8, 0, '2015-04-09 02:15:48', '2015-04-09 02:15:48'),
(126, '2015-04-06 20:06:00', '0000-00-00 00:00:00', '2015-04-09 02:15:57', 'pause', 'notStart', 'pause', 8, 0, '2015-04-09 02:15:57', '2015-04-09 02:15:57'),
(127, '2015-04-06 20:06:00', '0000-00-00 00:00:00', '2015-04-09 02:16:11', 'pause', 'notStart', 'restart', 8, 0, '2015-04-09 02:16:11', '2015-04-09 02:16:11'),
(128, '2015-04-06 20:06:00', '0000-00-00 00:00:00', '2015-04-09 02:16:28', 'pause', 'notStart', 'pause', 8, 0, '2015-04-09 02:16:28', '2015-04-09 02:16:28'),
(129, '2015-04-09 02:56:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'restart', 'notStart', 'notStart', 30, 0, '2015-04-09 02:56:47', '2015-04-09 02:56:47'),
(130, '2015-04-09 02:56:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 30, 0, '2015-04-09 02:56:51', '2015-04-09 02:56:51'),
(131, '2015-04-09 19:49:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'restart', 'notStart', 'notStart', 31, 0, '2015-04-09 19:49:16', '2015-04-09 19:49:16'),
(132, '2015-04-09 19:51:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'start', 'notStart', 'notStart', 32, 0, '2015-04-09 19:51:46', '2015-04-09 19:51:46'),
(133, '2015-04-09 19:52:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 32, 0, '2015-04-09 19:52:42', '2015-04-09 19:52:42'),
(134, '2015-04-09 19:52:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'restart', 'notStart', 'notStart', 32, 0, '2015-04-09 19:52:54', '2015-04-09 19:52:54'),
(135, '2015-04-09 19:53:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 32, 0, '2015-04-09 19:53:01', '2015-04-09 19:53:01'),
(136, '2015-04-09 19:54:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'restart', 'notStart', 'notStart', 32, 0, '2015-04-09 19:54:11', '2015-04-09 19:54:11'),
(137, '2015-04-09 20:13:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pause', 'notStart', 'notStart', 32, 0, '2015-04-09 20:13:30', '2015-04-09 20:13:30'),
(138, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'notStart', 'notStart', 'notStart', 8, 0, '2015-04-13 19:45:21', '2015-04-13 19:45:21'),
(139, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'notStart', 'notStart', 'notStart', 3, 9, '2015-04-13 20:06:13', '2015-04-13 20:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE IF NOT EXISTS `timings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `tracker` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `project_id` int(10) unsigned NOT NULL,
  `phase_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `timings_phase_id_foreign` (`phase_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=181 ;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`id`, `type_id`, `status`, `tracker`, `project_id`, `phase_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'notStart', '0000-00-00 00:00:00', 24, 13, '2015-04-13 20:40:30', '2015-04-13 20:40:30'),
(83, 1, 'restart', '2015-04-14 01:41:32', 24, 13, '2015-04-14 01:41:32', '2015-04-14 01:41:32'),
(82, 1, 'pause', '2015-04-14 01:41:30', 24, 13, '2015-04-14 01:41:30', '2015-04-14 01:41:30'),
(81, 1, 'restart', '2015-04-14 01:41:25', 24, 13, '2015-04-14 01:41:25', '2015-04-14 01:41:25'),
(80, 1, 'pause', '2015-04-14 01:41:21', 24, 13, '2015-04-14 01:41:21', '2015-04-14 01:41:21'),
(78, 1, 'restart', '2015-04-14 01:39:26', 24, 13, '2015-04-14 01:39:26', '2015-04-14 01:39:26'),
(77, 1, 'pause', '2015-04-14 01:38:53', 24, 13, '2015-04-14 01:38:53', '2015-04-14 01:38:53'),
(74, 1, 'restart', '2015-04-14 01:31:59', 24, 13, '2015-04-14 01:31:59', '2015-04-14 01:31:59'),
(73, 1, 'pause', '2015-04-14 01:28:36', 24, 13, '2015-04-14 01:28:36', '2015-04-14 01:28:36'),
(72, 1, 'restart', '2015-04-14 01:28:10', 24, 13, '2015-04-14 01:28:10', '2015-04-14 01:28:10'),
(71, 1, 'pause', '2015-04-14 01:28:07', 24, 13, '2015-04-14 01:28:07', '2015-04-14 01:28:07'),
(70, 1, 'restart', '2015-04-14 01:28:01', 24, 13, '2015-04-14 01:28:01', '2015-04-14 01:28:01'),
(69, 1, 'pause', '2015-04-14 01:27:13', 24, 13, '2015-04-14 01:27:13', '2015-04-14 01:27:13'),
(68, 1, 'restart', '2015-04-14 01:26:57', 24, 13, '2015-04-14 01:26:57', '2015-04-14 01:26:57'),
(67, 1, 'pause', '2015-04-14 01:26:37', 24, 13, '2015-04-14 01:26:37', '2015-04-14 01:26:37'),
(66, 1, 'restart', '2015-04-14 01:26:30', 24, 13, '2015-04-14 01:26:30', '2015-04-14 01:26:30'),
(65, 1, 'pause', '2015-04-14 01:25:17', 24, 13, '2015-04-14 01:25:17', '2015-04-14 01:25:17'),
(64, 1, 'restart', '2015-04-14 01:22:24', 24, 13, '2015-04-14 01:22:24', '2015-04-14 01:22:24'),
(63, 1, 'pause', '2015-04-14 01:22:14', 24, 13, '2015-04-14 01:22:14', '2015-04-14 01:22:14'),
(62, 1, 'restart', '2015-04-14 01:21:40', 24, 13, '2015-04-14 01:21:40', '2015-04-14 01:21:40'),
(61, 1, 'pause', '2015-04-14 01:21:05', 24, 13, '2015-04-14 01:21:05', '2015-04-14 01:21:05'),
(60, 1, 'restart', '2015-04-14 01:20:15', 24, 13, '2015-04-14 01:20:15', '2015-04-14 01:20:15'),
(59, 1, 'pause', '2015-04-14 01:20:13', 24, 13, '2015-04-14 01:20:13', '2015-04-14 01:20:13'),
(58, 1, 'start', '2015-04-14 01:20:04', 24, 13, '2015-04-14 01:20:04', '2015-04-14 01:20:04'),
(84, 1, 'pause', '2015-04-14 01:42:06', 24, 13, '2015-04-14 01:42:06', '2015-04-14 01:42:06'),
(85, 1, 'restart', '2015-04-14 01:42:39', 24, 13, '2015-04-14 01:42:39', '2015-04-14 01:42:39'),
(86, 1, 'pause', '2015-04-14 01:43:02', 24, 13, '2015-04-14 01:43:02', '2015-04-14 01:43:02'),
(87, 1, 'restart', '2015-04-14 01:43:39', 24, 13, '2015-04-14 01:43:39', '2015-04-14 01:43:39'),
(88, 1, 'pause', '2015-04-14 01:43:45', 24, 13, '2015-04-14 01:43:45', '2015-04-14 01:43:45'),
(89, 1, 'restart', '2015-04-14 01:44:25', 24, 13, '2015-04-14 01:44:25', '2015-04-14 01:44:25'),
(90, 1, 'pause', '2015-04-14 01:44:29', 24, 13, '2015-04-14 01:44:29', '2015-04-14 01:44:29'),
(91, 1, 'restart', '2015-04-14 01:44:36', 24, 13, '2015-04-14 01:44:36', '2015-04-14 01:44:36'),
(92, 1, 'pause', '2015-04-14 01:45:16', 24, 13, '2015-04-14 01:45:16', '2015-04-14 01:45:16'),
(93, 1, 'restart', '2015-04-14 01:47:52', 24, 13, '2015-04-14 01:47:52', '2015-04-14 01:47:52'),
(94, 1, 'pause', '2015-04-14 01:47:59', 24, 13, '2015-04-14 01:47:59', '2015-04-14 01:47:59'),
(95, 1, 'restart', '2015-04-14 01:48:03', 24, 13, '2015-04-14 01:48:03', '2015-04-14 01:48:03'),
(96, 1, 'pause', '2015-04-14 01:48:58', 24, 13, '2015-04-14 01:48:58', '2015-04-14 01:48:58'),
(97, 1, 'restart', '2015-04-14 01:50:02', 24, 13, '2015-04-14 01:50:02', '2015-04-14 01:50:02'),
(98, 1, 'pause', '2015-04-14 01:50:37', 24, 13, '2015-04-14 01:50:37', '2015-04-14 01:50:37'),
(99, 1, 'restart', '2015-04-14 01:51:48', 24, 13, '2015-04-14 01:51:48', '2015-04-14 01:51:48'),
(100, 1, 'pause', '2015-04-14 01:52:19', 24, 13, '2015-04-14 01:52:19', '2015-04-14 01:52:19'),
(101, 1, 'restart', '2015-04-14 01:56:57', 24, 13, '2015-04-14 01:56:57', '2015-04-14 01:56:57'),
(102, 1, 'pause', '2015-04-14 01:57:38', 24, 13, '2015-04-14 01:57:38', '2015-04-14 01:57:38'),
(103, 1, 'restart', '2015-04-14 02:02:14', 24, 13, '2015-04-14 02:02:14', '2015-04-14 02:02:14'),
(104, 1, 'pause', '2015-04-14 02:06:12', 24, 13, '2015-04-14 02:06:12', '2015-04-14 02:06:12'),
(105, 1, 'restart', '2015-04-14 02:10:09', 24, 13, '2015-04-14 02:10:09', '2015-04-14 02:10:09'),
(106, 1, 'pause', '2015-04-14 02:10:43', 24, 13, '2015-04-14 02:10:43', '2015-04-14 02:10:43'),
(107, 1, 'restart', '2015-04-14 02:11:02', 24, 13, '2015-04-14 02:11:02', '2015-04-14 02:11:02'),
(108, 1, 'pause', '2015-04-14 02:11:34', 24, 13, '2015-04-14 02:11:34', '2015-04-14 02:11:34'),
(109, 1, 'restart', '2015-04-14 02:12:18', 24, 13, '2015-04-14 02:12:18', '2015-04-14 02:12:18'),
(110, 1, 'pause', '2015-04-14 02:12:51', 24, 13, '2015-04-14 02:12:51', '2015-04-14 02:12:51'),
(111, 1, 'restart', '2015-04-14 02:13:29', 24, 13, '2015-04-14 02:13:29', '2015-04-14 02:13:29'),
(112, 1, 'pause', '2015-04-14 02:14:09', 24, 13, '2015-04-14 02:14:09', '2015-04-14 02:14:09'),
(113, 1, 'restart', '2015-04-14 02:14:30', 24, 13, '2015-04-14 02:14:30', '2015-04-14 02:14:30'),
(114, 1, 'pause', '2015-04-14 02:14:35', 24, 13, '2015-04-14 02:14:35', '2015-04-14 02:14:35'),
(115, 1, 'restart', '2015-04-14 02:15:21', 24, 13, '2015-04-14 02:15:21', '2015-04-14 02:15:21'),
(116, 1, 'pause', '2015-04-14 02:15:36', 24, 13, '2015-04-14 02:15:36', '2015-04-14 02:15:36'),
(117, 1, 'restart', '2015-04-14 02:16:35', 24, 13, '2015-04-14 02:16:35', '2015-04-14 02:16:35'),
(118, 1, 'pause', '2015-04-14 02:17:31', 24, 13, '2015-04-14 02:17:31', '2015-04-14 02:17:31'),
(119, 1, 'restart', '2015-04-14 02:18:23', 24, 13, '2015-04-14 02:18:23', '2015-04-14 02:18:23'),
(120, 1, 'pause', '2015-04-14 02:19:38', 24, 13, '2015-04-14 02:19:38', '2015-04-14 02:19:38'),
(121, 1, 'restart', '2015-04-14 02:19:55', 24, 13, '2015-04-14 02:19:55', '2015-04-14 02:19:55'),
(122, 1, 'pause', '2015-04-14 02:20:54', 24, 13, '2015-04-14 02:20:54', '2015-04-14 02:20:54'),
(123, 1, 'restart', '2015-04-14 02:22:38', 24, 13, '2015-04-14 02:22:38', '2015-04-14 02:22:38'),
(124, 1, 'pause', '2015-04-14 02:26:48', 24, 13, '2015-04-14 02:26:48', '2015-04-14 02:26:48'),
(125, 1, 'restart', '2015-04-14 02:39:42', 24, 13, '2015-04-14 02:39:42', '2015-04-14 02:39:42'),
(126, 1, 'pause', '2015-04-14 02:42:02', 24, 13, '2015-04-14 02:42:02', '2015-04-14 02:42:02'),
(127, 1, 'restart', '2015-04-14 02:45:02', 24, 13, '2015-04-14 02:45:02', '2015-04-14 02:45:02'),
(128, 1, 'pause', '2015-04-14 02:48:15', 24, 13, '2015-04-14 02:48:15', '2015-04-14 02:48:15'),
(129, 1, 'restart', '2015-04-14 02:49:33', 24, 13, '2015-04-14 02:49:33', '2015-04-14 02:49:33'),
(130, 1, 'pause', '2015-04-14 02:49:41', 24, 13, '2015-04-14 02:49:41', '2015-04-14 02:49:41'),
(131, 1, 'restart', '2015-04-14 02:49:48', 24, 13, '2015-04-14 02:49:48', '2015-04-14 02:49:48'),
(132, 1, 'pause', '2015-04-14 02:50:17', 24, 13, '2015-04-14 02:50:17', '2015-04-14 02:50:17'),
(133, 1, 'notStart', '0000-00-00 00:00:00', 32, 14, '2015-04-20 21:21:17', '2015-04-20 21:21:17'),
(134, 1, 'start', '2015-04-20 21:21:26', 32, 14, '2015-04-20 21:21:26', '2015-04-20 21:21:26'),
(135, 1, 'pause', '2015-04-20 21:21:57', 32, 14, '2015-04-20 21:21:57', '2015-04-20 21:21:57'),
(136, 1, 'restart', '2015-04-20 21:22:11', 32, 14, '2015-04-20 21:22:11', '2015-04-20 21:22:11'),
(137, 1, 'restart', '2015-04-20 21:22:14', 24, 13, '2015-04-20 21:22:14', '2015-04-20 21:22:14'),
(138, 1, 'pause', '2015-04-20 21:22:35', 32, 14, '2015-04-20 21:22:35', '2015-04-20 21:22:35'),
(139, 1, 'pause', '2015-04-20 21:22:40', 24, 13, '2015-04-20 21:22:40', '2015-04-20 21:22:40'),
(140, 1, 'restart', '2015-04-21 21:30:37', 32, 14, '2015-04-21 21:30:37', '2015-04-21 21:30:37'),
(141, 1, 'pause', '2015-04-21 21:31:27', 32, 14, '2015-04-21 21:31:27', '2015-04-21 21:31:27'),
(142, 1, 'restart', '2015-04-21 21:31:55', 24, 13, '2015-04-21 21:31:55', '2015-04-21 21:31:55'),
(143, 1, 'pause', '2015-04-21 21:32:08', 24, 13, '2015-04-21 21:32:08', '2015-04-21 21:32:08'),
(144, 1, 'notStart', '0000-00-00 00:00:00', 32, 15, '2015-04-21 21:32:50', '2015-04-21 21:32:50'),
(145, 1, 'start', '2015-04-21 21:34:50', 32, 15, '2015-04-21 21:34:50', '2015-04-21 21:34:50'),
(146, 1, 'restart', '2015-04-21 21:37:51', 24, 13, '2015-04-21 21:37:51', '2015-04-21 21:37:51'),
(147, 1, 'pause', '2015-04-21 21:37:57', 24, 13, '2015-04-21 21:37:57', '2015-04-21 21:37:57'),
(148, 1, 'pause', '2015-04-21 21:38:00', 32, 15, '2015-04-21 21:38:00', '2015-04-21 21:38:00'),
(149, 1, 'restart', '2015-04-21 21:46:52', 32, 14, '2015-04-21 21:46:52', '2015-04-21 21:46:52'),
(150, 1, 'restart', '2015-04-21 21:46:55', 24, 13, '2015-04-21 21:46:55', '2015-04-21 21:46:55'),
(151, 1, 'pause', '2015-04-21 21:46:58', 32, 14, '2015-04-21 21:46:58', '2015-04-21 21:46:58'),
(152, 1, 'pause', '2015-04-21 21:47:00', 24, 13, '2015-04-21 21:47:00', '2015-04-21 21:47:00'),
(153, 1, 'restart', '2015-04-21 21:47:02', 32, 15, '2015-04-21 21:47:02', '2015-04-21 21:47:02'),
(154, 1, 'pause', '2015-04-21 21:47:06', 32, 15, '2015-04-21 21:47:06', '2015-04-21 21:47:06'),
(155, 1, 'restart', '2015-04-21 21:49:59', 32, 14, '2015-04-21 21:49:59', '2015-04-21 21:49:59'),
(156, 1, 'pause', '2015-04-21 21:50:02', 32, 14, '2015-04-21 21:50:02', '2015-04-21 21:50:02'),
(157, 1, 'restart', '2015-04-21 21:50:05', 32, 15, '2015-04-21 21:50:05', '2015-04-21 21:50:05'),
(158, 1, 'pause', '2015-04-21 21:50:09', 32, 15, '2015-04-21 21:50:09', '2015-04-21 21:50:09'),
(159, 3, 'notStart', '0000-00-00 00:00:00', 21, 17, '2015-04-22 00:05:37', '2015-04-22 00:05:37'),
(160, 1, 'notStart', '0000-00-00 00:00:00', 8, 20, '2015-04-22 02:24:22', '2015-04-22 02:24:22'),
(161, 1, 'start', '2015-04-22 18:40:40', 8, 20, '2015-04-22 18:40:40', '2015-04-22 18:40:40'),
(162, 1, 'pause', '2015-04-22 18:42:25', 8, 20, '2015-04-22 18:42:25', '2015-04-22 18:42:25'),
(163, 1, 'restart', '2015-04-22 18:42:30', 8, 20, '2015-04-22 18:42:30', '2015-04-22 18:42:30'),
(164, 1, 'restart', '2015-04-22 18:51:18', 32, 15, '2015-04-22 18:51:18', '2015-04-22 18:51:18'),
(165, 1, 'pause', '2015-04-22 18:51:26', 32, 15, '2015-04-22 18:51:26', '2015-04-22 18:51:26'),
(166, 1, 'pause', '2015-04-22 18:51:28', 8, 20, '2015-04-22 18:51:28', '2015-04-22 18:51:28'),
(167, 2, 'notStart', '0000-00-00 00:00:00', 32, 21, '2015-04-22 23:40:37', '2015-04-22 23:40:37'),
(168, 1, 'restart', '2015-04-23 20:47:12', 24, 13, '2015-04-23 20:47:12', '2015-04-23 20:47:12'),
(169, 1, 'pause', '2015-04-23 21:45:19', 24, 13, '2015-04-23 21:45:19', '2015-04-23 21:45:19'),
(170, 1, 'notStart', '0000-00-00 00:00:00', 40, 22, '2015-04-24 01:29:31', '2015-04-24 01:29:31'),
(171, 1, 'notStart', '0000-00-00 00:00:00', 32, 23, '2015-04-24 01:39:25', '2015-04-24 01:39:25'),
(172, 2, 'notStart', '0000-00-00 00:00:00', 32, 24, '2015-04-24 01:42:50', '2015-04-24 01:42:50'),
(173, 2, 'notStart', '0000-00-00 00:00:00', 32, 25, '2015-04-24 01:43:15', '2015-04-24 01:43:15'),
(174, 1, 'notStart', '0000-00-00 00:00:00', 38, 26, '2015-04-24 01:47:11', '2015-04-24 01:47:11'),
(175, 1, 'notStart', '0000-00-00 00:00:00', 38, 27, '2015-04-24 01:48:41', '2015-04-24 01:48:41'),
(176, 1, 'notStart', '0000-00-00 00:00:00', 38, 28, '2015-04-24 01:54:54', '2015-04-24 01:54:54'),
(177, 1, 'start', '2015-04-24 20:14:01', 38, 28, '2015-04-24 20:14:01', '2015-04-24 20:14:01'),
(178, 1, 'pause', '2015-04-24 21:30:52', 38, 28, '2015-04-24 21:30:52', '2015-04-24 21:30:52'),
(179, 1, 'restart', '2015-04-24 21:55:22', 38, 28, '2015-04-24 21:55:22', '2015-04-24 21:55:22'),
(180, 1, 'pause', '2015-04-24 22:06:20', 38, 28, '2015-04-24 22:06:20', '2015-04-24 22:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `toDelete`
--

CREATE TABLE IF NOT EXISTS `toDelete` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `tags` text COLLATE utf8_unicode_ci,
  `unit` text COLLATE utf8_unicode_ci,
  `status` text COLLATE utf8_unicode_ci,
  `user_id` int(10) unsigned NOT NULL,
  `authorized_users` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `toDelete`
--

INSERT INTO `toDelete` (`id`, `title`, `desc`, `tags`, `unit`, `status`, `user_id`, `authorized_users`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Location Headshots', 'BEFORE THE SHOOT\r\nTwo weeks prior to the shoot, Location Headshots advertises the specific day of the shoot in the company or building lobby.\r\nCustomers have an option to prepay and reserve their 10 minute time slot online for a discounted price, or drop in (if available) on the day of the shoot for the full price.\r\n\r\nAT THE DAY OF THE SHOOT \r\nLocation Headshots arrives to the location two hours prior to the first time slot and sets up their portable studio in a reserved space. \r\nThe studio consists of professional strobes, white background, partitions for the customer’s privacy and computer table for previewing.\r\n\r\nWe shoot the whole day with a one hour lunch break.\r\nEach customer will have ten minutes to have their pictures taken and to select the final image at our computer table, which will be edited later. \r\nThe customer has to be present and ready at the shoot 15 minutes prior to their reserved time slot. Late arrivals will not be accommodated. \r\n\r\nAFTER THE SHOOT \r\nWe edit all the pictures and e-mail them directly to the customers within 5-7 business days.', 'photography, web', 'HD', 'Work-in-Progress', 2, 'jan', 'location-headshots', '2015-03-24 01:44:55', '2015-03-24 01:44:55'),
(3, 'Mary Kate Cary', 'Mary Kate Cary is executive producer of “41ON41,” a documentary film about former President George H.W. Bush, the 41st president of the United States.  In it, 41 extraordinary people tell their best stories about his leadership, good humor, bipartisanship and integrity.  The film debuted on CNN domestically in June 2014, receiving good ratings and a very positive response on social media.  “41ON41” was a featured film at the 2014 Virginia Film Festival in Charlottesville, Virginia and will soon be available on Netflix.\r\n\r\nMs. Cary served as a White House speechwriter for President Bush from 1989 to early 1992, authoring over 100 Presidential addresses by him.  She has ghostwritten several books, two of them about the former President.  Ms. Cary has been an Advisory Board member of the George Bush Presidential Library and Museum at Texas A&M University since 2004.\r\n\r\nIn addition to making “41ON41,” Ms. Cary is a professional speechwriter specializing in political and corporate communications, writing for a variety of national political and corporate leaders.  Some of her assignments have included State of the Union responses, Republican National Convention addresses, TED talks, and domestic and international speeches.', 'web, designs', 'MKC', 'Work-Done', 1, 'xadim', 'mary-kate-cary', '2015-03-14 01:47:01', '2015-03-24 01:47:01'),
(4, 'Political Campaign', '2014 Official Political Campaign', 'web, designs, print', 'DC Office', 'Work-in-Progress', 3, 'David, Curtis', 'Political-Campaign', '2015-03-24 02:35:51', '2015-03-24 02:35:51'),
(7, 'test', '', 'test', 'test', 'Shipped', 3, '', 'test', '2015-03-13 20:07:37', '2015-03-24 20:07:37'),
(8, 'BBQ Letterhead', 'Create a letterhead that can be used for financial w/ a watermark.\r\n\r\n', 'print', 'n/a', 'Work-Done', 3, '', 'BBQ_Letterhead', '2015-03-25 01:09:30', '2015-03-25 01:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `user_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 3, 'Design', '2015-04-10 19:58:26', '2015-04-10 20:02:44'),
(2, 3, 'Production', '2015-04-10 19:58:43', '2015-04-10 19:58:43'),
(3, 3, 'Development', '2015-04-10 19:58:56', '2015-04-10 19:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Curtis Chang', 'test@test.com', '$2y$10$PuxSjn3kx0sTcSk/vB34ROOSzcpK6kqOPuzqVoL6p9Hjs8wS3FuMa', '0cOWXYgKU5qnx3o2IYWYBz4TkiIZz1fyz3NTEqi6UbHqr3Zt4CsPKFpE56ab', '2015-03-23 23:45:38', '2015-04-01 00:09:40'),
(2, 'Khadim Diakhate', 'khadime@hoondesigns.com', '$2y$10$j7Y5UsbcOx1d0hkMZJ5BPehZNosS06X4lS3ceWZ6.S8hqjOUXSFR2', 'yCBffjGr0KSyBsuqlqyJlETBabYHGywCdoi7wiybPp9JSsmnUz92iYZCC5Vc', '2015-03-24 00:46:09', '2015-04-22 23:41:30'),
(3, 'Hoon Choi', 'hoon@hoondesigns.com', '$2y$10$cwb2fN7tvTgude9tntAQQOgVtPQvHQB5leFD78og8KlrCHzbQlrTS', 'xJ5ZgCRl3R7qCnlv3CTPM8Lf4fGg0uWY1B2Aeph9hYtEe2t1z1F7B4uEla1g', '2015-03-24 02:28:10', '2015-04-22 23:36:12'),
(4, 'Ariel Harwick', 'ariel@hoondesigns.com', '$2y$10$hpZikw/0euVNqhNFWPdVPOXjYl2yYJuftTr23cUef4Gp0/pbxSWv.', 'ScMfhWuBMeXpVS4WUCBvkztZeixoFpBlXdleqIpmZWJFh3UjnReA74yNy9pq', '2015-04-01 01:51:11', '2015-04-01 01:51:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phases`
--
ALTER TABLE `phases`
  ADD CONSTRAINT `phases_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `toDelete`
--
ALTER TABLE `toDelete`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
