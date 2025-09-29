-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2025 at 12:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelmatebd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `type`, `mobile`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Super Admin', NULL, 1, '01763634878', 'admin@gmail.com', '$2y$10$HgJ9WCVRevM1e8yXz1ts7OCGRb29MdtDpBQLDhb.QObJmLPnP4ZOm', 'admin-1759037502.png', 1, '2024-08-30 13:03:44', '2025-09-28 05:31:42', 'nNfDxe8jHJetO89V2sufLncLDjB6hDTgS68nPwRS4UvcQ2lsGXHUkNzx9Avi'),
(2, 'Nowab Shorif', NULL, 3, '01839317038', 'nsanoman@gmail.com', '$2y$10$MG.kymzcIgDLbbiwTyLAe.uj2bhcB8Tef.XoM/T05tIbYj9AGuXDO', NULL, 1, '2025-07-21 06:52:23', '2025-07-21 07:26:08', NULL),
(3, 'Malek Azad', NULL, 3, '01839317038', 'malekazad@gmail.com', '$2y$10$oBCsjoWQ0ei91hx3DY1kmO3oXw0mIvtFxEB5gweTlHi1nazHWgfly', NULL, 1, '2025-07-21 07:25:50', '2025-07-21 07:46:13', NULL),
(4, 'Aquila Mendoza', NULL, 3, '65', 'xilyqiso@mailinator.com', '$2y$10$UuuDxN821Ge0j2H8R8694eW0BJwMcyl6f8nzcIcMzjbHSBKiq0gfq', NULL, 1, '2025-07-23 03:38:53', '2025-07-23 03:41:21', NULL),
(5, 'Nowab Shorif', NULL, 3, '2345678', 'noman@gmail.com', '$2y$10$Gr2OiWKHtQ6MXpA3OEWMgOYDQPEMyTvngY94wY15lFqwJoG5YsXFO', NULL, 1, '2025-07-23 04:43:12', '2025-09-18 08:32:49', NULL),
(6, 'Khairul Islam', NULL, 3, '018456789', 'khairulislam@gmail.com', '$2y$10$zXihtGLpBoTM/xzZUKx6N.0/AWlRsX1pQoIfRvPwSzSMnJUXCbbk.', NULL, 1, '2025-07-23 08:17:29', '2025-07-23 08:19:16', NULL),
(7, 'Noakhali Branch', NULL, 3, '010839317038', 'noakhalibranch@gmail.com', '$2y$10$e6lDM0myw3.ozdg2NcZkW.mA4jqDZ5XKW3HlWTn/TyQ6CpGLrZx4y', NULL, 1, '2025-09-18 12:15:40', '2025-09-18 12:16:04', '0WIyw3SBqQAk1hpeccCb3SGmptydPC76vuFtFaQ0m8rU2DoGs5VnTJhrHJfX');

-- --------------------------------------------------------

--
-- Table structure for table `basic_infos`
--

CREATE TABLE `basic_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `twitter_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `linkedin_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `youtube_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `assets_value` int NOT NULL,
  `total_employees` int NOT NULL,
  `total_companies` int NOT NULL,
  `start_year` int NOT NULL,
  `map_embed` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_embed_1` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_embed_2` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_embed_3` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_infos`
--

INSERT INTO `basic_infos` (`id`, `title`, `meta_keywords`, `meta_description`, `logo`, `favicon`, `phone`, `telephone`, `fax`, `email`, `location`, `address`, `web_link`, `facebook_link`, `twitter_link`, `linkedin_link`, `youtube_link`, `assets_value`, `total_employees`, `total_companies`, `start_year`, `map_embed`, `video_embed_1`, `video_embed_2`, `video_embed_3`, `currency_symbol`, `created_at`, `updated_at`) VALUES
(1, 'Travel Mate BD', 'In consequuntur quib', 'Iusto Nam consectetu', 'logo-1759035971.svg', 'favicon-1759035971.svg', '+88 01839317038', '456', '23456', 'info@travelmatebd.com', 'Velit quia corrupti', 'Plot No.-314/A, Road-18, Block-E, Bashundhara Residential Area, Dhaka 1229, Bangladesh.', 'Quia atque nostrum q', 'Enim neque culpa ex', 'Deserunt odio cum ad', 'Deserunt in ducimus', 'Obcaecati autem reru', 60, 23, 72, 1993, 'Sit placeat et ut o', 'Vel dolore necessita', 'Consequuntur ex nesc', 'Proident dolore off', '৳', NULL, '2025-09-28 05:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_cat_id` int NOT NULL DEFAULT '0',
  `cat_type_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_cat_id`, `cat_type_id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Standard Boxes', NULL, 1, '2025-09-22 09:56:11', '2025-09-22 09:56:11'),
(2, 0, 1, 'Fragile Boxes', NULL, 1, '2025-09-22 09:56:19', '2025-09-22 09:56:19'),
(3, 0, 1, 'Heavy-Duty Boxes', NULL, 1, '2025-09-22 09:56:34', '2025-09-22 09:56:34'),
(4, 0, 1, 'Document Envelopes', NULL, 1, '2025-09-22 09:56:43', '2025-09-22 09:56:43'),
(5, 0, 1, 'Palletized Shipments', NULL, 1, '2025-09-22 09:56:51', '2025-09-22 09:56:51'),
(6, 0, 1, 'Temperature-Controlled Boxes', NULL, 1, '2025-09-22 09:57:02', '2025-09-22 09:57:02'),
(7, 1, 1, 'Small Standard Box', NULL, 1, '2025-09-22 09:57:45', '2025-09-22 09:57:45'),
(8, 1, 1, 'Large Standard Box', NULL, 1, '2025-09-22 09:57:57', '2025-09-22 09:57:57'),
(9, 2, 1, 'Glass/Breakable Box', NULL, 1, '2025-09-22 09:58:09', '2025-09-22 09:58:09'),
(10, 2, 1, 'Electronics Box', NULL, 1, '2025-09-22 09:58:23', '2025-09-22 09:58:23'),
(11, 3, 1, 'Wooden Crate', NULL, 1, '2025-09-22 09:58:34', '2025-09-22 09:58:34'),
(12, 3, 1, 'Reinforced Cardboard Box', NULL, 1, '2025-09-22 09:58:47', '2025-09-22 09:58:47'),
(13, 4, 1, 'Standard Document Envelope', NULL, 1, '2025-09-22 09:59:01', '2025-09-22 09:59:01'),
(14, 4, 1, 'Tamper-Proof Envelope', NULL, 1, '2025-09-22 09:59:12', '2025-09-22 09:59:12'),
(15, 5, 1, 'Single-Item Pallet', NULL, 1, '2025-09-22 09:59:28', '2025-09-22 09:59:28'),
(16, 5, 1, 'Mixed-Box Pallet', NULL, 1, '2025-09-22 09:59:38', '2025-09-22 09:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, NULL, NULL),
(2, 'AL', 'Albania', 1, NULL, NULL),
(3, 'DZ', 'Algeria', 1, NULL, NULL),
(4, 'AS', 'American Samoa', 1, NULL, NULL),
(5, 'AD', 'Andorra', 1, NULL, NULL),
(6, 'AO', 'Angola', 1, NULL, NULL),
(7, 'AI', 'Anguilla', 1, NULL, NULL),
(8, 'AQ', 'Antarctica', 1, NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', 1, NULL, NULL),
(10, 'AR', 'Argentina', 1, NULL, NULL),
(11, 'AM', 'Armenia', 1, NULL, NULL),
(12, 'AW', 'Aruba', 1, NULL, NULL),
(13, 'AU', 'Australia', 1, NULL, NULL),
(14, 'AT', 'Austria', 1, NULL, NULL),
(15, 'AZ', 'Azerbaijan', 1, NULL, NULL),
(16, 'BS', 'Bahamas', 1, NULL, NULL),
(17, 'BH', 'Bahrain', 1, NULL, NULL),
(18, 'BD', 'Bangladesh', 1, NULL, NULL),
(19, 'BB', 'Barbados', 1, NULL, NULL),
(20, 'BY', 'Belarus', 1, NULL, NULL),
(21, 'BE', 'Belgium', 1, NULL, NULL),
(22, 'BZ', 'Belize', 1, NULL, NULL),
(23, 'BJ', 'Benin', 1, NULL, NULL),
(24, 'BM', 'Bermuda', 1, NULL, NULL),
(25, 'BT', 'Bhutan', 1, NULL, NULL),
(26, 'BO', 'Bolivia', 1, NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', 1, NULL, NULL),
(28, 'BW', 'Botswana', 1, NULL, NULL),
(29, 'BV', 'Bouvet Island', 1, NULL, NULL),
(30, 'BR', 'Brazil', 1, NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', 1, NULL, NULL),
(32, 'BN', 'Brunei Darussalam', 1, NULL, NULL),
(33, 'BG', 'Bulgaria', 1, NULL, NULL),
(34, 'BF', 'Burkina Faso', 1, NULL, NULL),
(35, 'BI', 'Burundi', 1, NULL, NULL),
(36, 'KH', 'Cambodia', 1, NULL, NULL),
(37, 'CM', 'Cameroon', 1, NULL, NULL),
(38, 'CA', 'Canada', 1, NULL, NULL),
(39, 'CV', 'Cape Verde', 1, NULL, NULL),
(40, 'KY', 'Cayman Islands', 1, NULL, NULL),
(41, 'CF', 'Central African Republic', 1, NULL, NULL),
(42, 'TD', 'Chad', 1, NULL, NULL),
(43, 'CL', 'Chile', 1, NULL, NULL),
(44, 'CN', 'China', 1, NULL, NULL),
(45, 'CX', 'Christmas Island', 1, NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', 1, NULL, NULL),
(47, 'CO', 'Colombia', 1, NULL, NULL),
(48, 'KM', 'Comoros', 1, NULL, NULL),
(49, 'CD', 'Democratic Republic of the Congo', 1, NULL, NULL),
(50, 'CG', 'Republic of Congo', 1, NULL, NULL),
(51, 'CK', 'Cook Islands', 1, NULL, NULL),
(52, 'CR', 'Costa Rica', 1, NULL, NULL),
(53, 'HR', 'Croatia (Hrvatska)', 1, NULL, NULL),
(54, 'CU', 'Cuba', 1, NULL, NULL),
(55, 'CY', 'Cyprus', 1, NULL, NULL),
(56, 'CZ', 'Czech Republic', 1, NULL, NULL),
(57, 'DK', 'Denmark', 1, NULL, NULL),
(58, 'DJ', 'Djibouti', 1, NULL, NULL),
(59, 'DM', 'Dominica', 1, NULL, NULL),
(60, 'DO', 'Dominican Republic', 1, NULL, NULL),
(61, 'TL', 'East Timor', 1, NULL, NULL),
(62, 'EC', 'Ecuador', 1, NULL, NULL),
(63, 'EG', 'Egypt', 1, NULL, NULL),
(64, 'SV', 'El Salvador', 1, NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', 1, NULL, NULL),
(66, 'ER', 'Eritrea', 1, NULL, NULL),
(67, 'EE', 'Estonia', 1, NULL, NULL),
(68, 'ET', 'Ethiopia', 1, NULL, NULL),
(69, 'FK', 'Falkland Islands (Malvinas)', 1, NULL, NULL),
(70, 'FO', 'Faroe Islands', 1, NULL, NULL),
(71, 'FJ', 'Fiji', 1, NULL, NULL),
(72, 'FI', 'Finland', 1, NULL, NULL),
(73, 'FR', 'France', 1, NULL, NULL),
(74, 'FX', 'France, Metropolitan', 1, NULL, NULL),
(75, 'GF', 'French Guiana', 1, NULL, NULL),
(76, 'PF', 'French Polynesia', 1, NULL, NULL),
(77, 'TF', 'French Southern Territories', 1, NULL, NULL),
(78, 'GA', 'Gabon', 1, NULL, NULL),
(79, 'GM', 'Gambia', 1, NULL, NULL),
(80, 'GE', 'Georgia', 1, NULL, NULL),
(81, 'DE', 'Germany', 1, NULL, NULL),
(82, 'GH', 'Ghana', 1, NULL, NULL),
(83, 'GI', 'Gibraltar', 1, NULL, NULL),
(84, 'GG', 'Guernsey', 1, NULL, NULL),
(85, 'GR', 'Greece', 1, NULL, NULL),
(86, 'GL', 'Greenland', 1, NULL, NULL),
(87, 'GD', 'Grenada', 1, NULL, NULL),
(88, 'GP', 'Guadeloupe', 1, NULL, NULL),
(89, 'GU', 'Guam', 1, NULL, NULL),
(90, 'GT', 'Guatemala', 1, NULL, NULL),
(91, 'GN', 'Guinea', 1, NULL, NULL),
(92, 'GW', 'Guinea-Bissau', 1, NULL, NULL),
(93, 'GY', 'Guyana', 1, NULL, NULL),
(94, 'HT', 'Haiti', 1, NULL, NULL),
(95, 'HM', 'Heard and Mc Donald Islands', 1, NULL, NULL),
(96, 'HN', 'Honduras', 1, NULL, NULL),
(97, 'HK', 'Hong Kong', 1, NULL, NULL),
(98, 'HU', 'Hungary', 1, NULL, NULL),
(99, 'IS', 'Iceland', 1, NULL, NULL),
(100, 'IN', 'India', 1, NULL, NULL),
(101, 'IM', 'Isle of Man', 1, NULL, NULL),
(102, 'ID', 'Indonesia', 1, NULL, NULL),
(103, 'IR', 'Iran (Islamic Republic of)', 1, NULL, NULL),
(104, 'IQ', 'Iraq', 1, NULL, NULL),
(105, 'IE', 'Ireland', 1, NULL, NULL),
(106, 'IL', 'Israel', 1, NULL, NULL),
(107, 'IT', 'Italy', 1, NULL, NULL),
(108, 'CI', 'Ivory Coast', 1, NULL, NULL),
(109, 'JE', 'Jersey', 1, NULL, NULL),
(110, 'JM', 'Jamaica', 1, NULL, NULL),
(111, 'JP', 'Japan', 1, NULL, NULL),
(112, 'JO', 'Jordan', 1, NULL, NULL),
(113, 'KZ', 'Kazakhstan', 1, NULL, NULL),
(114, 'KE', 'Kenya', 1, NULL, NULL),
(115, 'KI', 'Kiribati', 1, NULL, NULL),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1, NULL, NULL),
(117, 'KR', 'Korea, Republic of', 1, NULL, NULL),
(118, 'XK', 'Kosovo', 1, NULL, NULL),
(119, 'KW', 'Kuwait', 1, NULL, NULL),
(120, 'KG', 'Kyrgyzstan', 1, NULL, NULL),
(121, 'LA', 'Lao People\'s Democratic Republic', 1, NULL, NULL),
(122, 'LV', 'Latvia', 1, NULL, NULL),
(123, 'LB', 'Lebanon', 1, NULL, NULL),
(124, 'LS', 'Lesotho', 1, NULL, NULL),
(125, 'LR', 'Liberia', 1, NULL, NULL),
(126, 'LY', 'Libyan Arab Jamahiriya', 1, NULL, NULL),
(127, 'LI', 'Liechtenstein', 1, NULL, NULL),
(128, 'LT', 'Lithuania', 1, NULL, NULL),
(129, 'LU', 'Luxembourg', 1, NULL, NULL),
(130, 'MO', 'Macau', 1, NULL, NULL),
(131, 'MK', 'North Macedonia', 1, NULL, NULL),
(132, 'MG', 'Madagascar', 1, NULL, NULL),
(133, 'MW', 'Malawi', 1, NULL, NULL),
(134, 'MY', 'Malaysia', 1, NULL, NULL),
(135, 'MV', 'Maldives', 1, NULL, NULL),
(136, 'ML', 'Mali', 1, NULL, NULL),
(137, 'MT', 'Malta', 1, NULL, NULL),
(138, 'MH', 'Marshall Islands', 1, NULL, NULL),
(139, 'MQ', 'Martinique', 1, NULL, NULL),
(140, 'MR', 'Mauritania', 1, NULL, NULL),
(141, 'MU', 'Mauritius', 1, NULL, NULL),
(142, 'YT', 'Mayotte', 1, NULL, NULL),
(143, 'MX', 'Mexico', 1, NULL, NULL),
(144, 'FM', 'Micronesia, Federated States of', 1, NULL, NULL),
(145, 'MD', 'Moldova, Republic of', 1, NULL, NULL),
(146, 'MC', 'Monaco', 1, NULL, NULL),
(147, 'MN', 'Mongolia', 1, NULL, NULL),
(148, 'ME', 'Montenegro', 1, NULL, NULL),
(149, 'MS', 'Montserrat', 1, NULL, NULL),
(150, 'MA', 'Morocco', 1, NULL, NULL),
(151, 'MZ', 'Mozambique', 1, NULL, NULL),
(152, 'MM', 'Myanmar', 1, NULL, NULL),
(153, 'NA', 'Namibia', 1, NULL, NULL),
(154, 'NR', 'Nauru', 1, NULL, NULL),
(155, 'NP', 'Nepal', 1, NULL, NULL),
(156, 'NL', 'Netherlands', 1, NULL, NULL),
(157, 'AN', 'Netherlands Antilles', 1, NULL, NULL),
(158, 'NC', 'New Caledonia', 1, NULL, NULL),
(159, 'NZ', 'New Zealand', 1, NULL, NULL),
(160, 'NI', 'Nicaragua', 1, NULL, NULL),
(161, 'NE', 'Niger', 1, NULL, NULL),
(162, 'NG', 'Nigeria', 1, NULL, NULL),
(163, 'NU', 'Niue', 1, NULL, NULL),
(164, 'NF', 'Norfolk Island', 1, NULL, NULL),
(165, 'MP', 'Northern Mariana Islands', 1, NULL, NULL),
(166, 'NO', 'Norway', 1, NULL, NULL),
(167, 'OM', 'Oman', 1, NULL, NULL),
(168, 'PK', 'Pakistan', 1, NULL, NULL),
(169, 'PW', 'Palau', 1, NULL, NULL),
(170, 'PS', 'Palestine', 1, NULL, NULL),
(171, 'PA', 'Panama', 1, NULL, NULL),
(172, 'PG', 'Papua New Guinea', 1, NULL, NULL),
(173, 'PY', 'Paraguay', 1, NULL, NULL),
(174, 'PE', 'Peru', 1, NULL, NULL),
(175, 'PH', 'Philippines', 1, NULL, NULL),
(176, 'PN', 'Pitcairn', 1, NULL, NULL),
(177, 'PL', 'Poland', 1, NULL, NULL),
(178, 'PT', 'Portugal', 1, NULL, NULL),
(179, 'PR', 'Puerto Rico', 1, NULL, NULL),
(180, 'QA', 'Qatar', 1, NULL, NULL),
(181, 'RE', 'Reunion', 1, NULL, NULL),
(182, 'RO', 'Romania', 1, NULL, NULL),
(183, 'RU', 'Russian Federation', 1, NULL, NULL),
(184, 'RW', 'Rwanda', 1, NULL, NULL),
(185, 'KN', 'Saint Kitts and Nevis', 1, NULL, NULL),
(186, 'LC', 'Saint Lucia', 1, NULL, NULL),
(187, 'VC', 'Saint Vincent and the Grenadines', 1, NULL, NULL),
(188, 'WS', 'Samoa', 1, NULL, NULL),
(189, 'SM', 'San Marino', 1, NULL, NULL),
(190, 'ST', 'Sao Tome and Principe', 1, NULL, NULL),
(191, 'SA', 'Saudi Arabia', 1, NULL, NULL),
(192, 'SN', 'Senegal', 1, NULL, NULL),
(193, 'RS', 'Serbia', 1, NULL, NULL),
(194, 'SC', 'Seychelles', 1, NULL, NULL),
(195, 'SL', 'Sierra Leone', 1, NULL, NULL),
(196, 'SG', 'Singapore', 1, NULL, NULL),
(197, 'SK', 'Slovakia', 1, NULL, NULL),
(198, 'SI', 'Slovenia', 1, NULL, NULL),
(199, 'SB', 'Solomon Islands', 1, NULL, NULL),
(200, 'SO', 'Somalia', 1, NULL, NULL),
(201, 'ZA', 'South Africa', 1, NULL, NULL),
(202, 'GS', 'South Georgia South Sandwich Islands', 1, NULL, NULL),
(203, 'SS', 'South Sudan', 1, NULL, NULL),
(204, 'ES', 'Spain', 1, NULL, NULL),
(205, 'LK', 'Sri Lanka', 1, NULL, NULL),
(206, 'SH', 'St. Helena', 1, NULL, NULL),
(207, 'PM', 'St. Pierre and Miquelon', 1, NULL, NULL),
(208, 'SD', 'Sudan', 1, NULL, NULL),
(209, 'SR', 'Suriname', 1, NULL, NULL),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1, NULL, NULL),
(211, 'SZ', 'Eswatini', 1, NULL, NULL),
(212, 'SE', 'Sweden', 1, NULL, NULL),
(213, 'CH', 'Switzerland', 1, NULL, NULL),
(214, 'SY', 'Syrian Arab Republic', 1, NULL, NULL),
(215, 'TW', 'Taiwan', 1, NULL, NULL),
(216, 'TJ', 'Tajikistan', 1, NULL, NULL),
(217, 'TZ', 'Tanzania, United Republic of', 1, NULL, NULL),
(218, 'TH', 'Thailand', 1, NULL, NULL),
(219, 'TG', 'Togo', 1, NULL, NULL),
(220, 'TK', 'Tokelau', 1, NULL, NULL),
(221, 'TO', 'Tonga', 1, NULL, NULL),
(222, 'TT', 'Trinidad and Tobago', 1, NULL, NULL),
(223, 'TN', 'Tunisia', 1, NULL, NULL),
(224, 'TR', 'Turkey', 1, NULL, NULL),
(225, 'TM', 'Turkmenistan', 1, NULL, NULL),
(226, 'TC', 'Turks and Caicos Islands', 1, NULL, NULL),
(227, 'TV', 'Tuvalu', 1, NULL, NULL),
(228, 'UG', 'Uganda', 1, NULL, NULL),
(229, 'UA', 'Ukraine', 1, NULL, NULL),
(230, 'AE', 'United Arab Emirates', 1, NULL, NULL),
(231, 'GB', 'United Kingdom', 1, NULL, NULL),
(232, 'US', 'United States', 1, NULL, NULL),
(233, 'UM', 'United States minor outlying islands', 1, NULL, NULL),
(234, 'UY', 'Uruguay', 1, NULL, NULL),
(235, 'UZ', 'Uzbekistan', 1, NULL, NULL),
(236, 'VU', 'Vanuatu', 1, NULL, NULL),
(237, 'VA', 'Vatican City State', 1, NULL, NULL),
(238, 'VE', 'Venezuela', 1, NULL, NULL),
(239, 'VN', 'Vietnam', 1, NULL, NULL),
(240, 'VG', 'Virgin Islands (British)', 1, NULL, NULL),
(241, 'VI', 'Virgin Islands (U.S.)', 1, NULL, NULL),
(242, 'WF', 'Wallis and Futuna Islands', 1, NULL, NULL),
(243, 'EH', 'Western Sahara', 1, NULL, NULL),
(244, 'YE', 'Yemen', 1, NULL, NULL),
(245, 'ZM', 'Zambia', 1, NULL, NULL),
(246, 'ZW', 'Zimbabwe', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Walk-in Customer',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `organization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_balance` double(20,2) NOT NULL DEFAULT '0.00',
  `customer_type` tinyint NOT NULL DEFAULT '0' COMMENT '0=General Customer, 1=Default Customer',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by_id` int DEFAULT NULL,
  `updated_by_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `organization`, `current_balance`, `customer_type`, `status`, `created_by_id`, `updated_by_id`, `created_at`, `updated_at`) VALUES
(1, 'Walk-in Customer', NULL, NULL, NULL, NULL, 0.00, 0, '0', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_ledgers`
--

CREATE TABLE `customer_ledgers` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int NOT NULL,
  `sale_id` int DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `particular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `debit_amount` decimal(20,2) DEFAULT NULL,
  `credit_amount` decimal(20,2) DEFAULT NULL,
  `current_balance` decimal(20,2) NOT NULL,
  `reference_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by_id` int DEFAULT NULL,
  `updated_by_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_ledgers`
--

INSERT INTO `customer_ledgers` (`id`, `customer_id`, `sale_id`, `payment_id`, `account_id`, `particular`, `date`, `debit_amount`, `credit_amount`, `current_balance`, `reference_number`, `note`, `created_by_id`, `updated_by_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 'Sale', '2025-09-22', NULL, '0.00', '0.00', NULL, NULL, 1, NULL, '2025-09-22 10:31:06', '2025-09-22 10:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payments`
--

CREATE TABLE `customer_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint NOT NULL,
  `account_id` bigint NOT NULL,
  `sale_id` bigint DEFAULT NULL,
  `date` date NOT NULL,
  `amount` double(20,2) NOT NULL,
  `reference_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Approved',
  `created_by_id` int DEFAULT NULL,
  `updated_by_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `frontend_menus`
--

CREATE TABLE `frontend_menus` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `srln` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_in_menus` tinyint NOT NULL DEFAULT '1',
  `is_in_pages` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by_id` int DEFAULT NULL,
  `updated_by_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `srln` int NOT NULL DEFAULT '1',
  `menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `navicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_side_menu` tinyint NOT NULL DEFAULT '0',
  `create_route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `srln`, `menu_name`, `navicon`, `is_side_menu`, `create_route`, `route`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', '<i class=\"nav-icon fas fa-tachometer-alt\"></i>', 1, NULL, 'dashboard.index', 1, '2024-10-26 02:56:54', '2024-10-27 22:37:52'),
(2, 0, 2, 'Settings', '<i class=\"nav-icon fa-solid fa-gear\"></i>', 1, NULL, 'basic-infos.index', 1, '2024-10-26 03:11:38', '2025-05-21 22:32:26'),
(3, 0, 3, 'Admin Manage', '<i class=\"nav-icon fa-solid fa-users-line\"></i>', 1, NULL, NULL, 1, '2024-10-26 03:16:45', '2024-11-03 22:01:46'),
(4, 3, 1, 'Roles', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'roles.create', 'roles.index', 1, '2024-10-26 03:17:46', '2024-10-27 00:44:02'),
(5, 3, 2, 'Admins', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'admins.create', 'admins.index', 1, '2024-10-26 03:34:05', '2024-10-26 05:40:22'),
(6, 4, 1, 'Add', NULL, 0, NULL, 'roles.create', 1, '2024-10-26 03:37:12', '2024-10-27 05:12:43'),
(7, 4, 2, 'Edit', NULL, 0, NULL, 'roles.edit', 1, '2024-10-26 03:37:49', '2024-10-26 03:37:49'),
(8, 4, 3, 'Delete', NULL, 0, NULL, 'roles.destroy', 1, '2024-10-26 03:38:13', '2024-10-26 03:38:13'),
(9, 5, 1, 'Add', NULL, 0, NULL, 'admins.create', 1, '2024-10-26 03:47:35', '2024-10-27 04:57:28'),
(10, 5, 2, 'Edit', NULL, 0, NULL, 'admins.edit', 1, '2024-10-26 03:47:54', '2024-10-27 01:00:26'),
(11, 5, 3, 'Delete', NULL, 0, NULL, 'admins.destroy', 1, '2024-10-26 03:48:07', '2024-10-27 00:51:02'),
(12, 231, 4, 'Frontend Menus', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'menus.frontend.create', 'menus.frontend.index', 1, '2024-10-27 04:13:54', '2025-09-28 09:00:26'),
(13, 231, 5, 'Admin Menus', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'menus.admins.create', 'menus.admins.index', 1, '2024-10-27 05:17:41', '2025-09-28 09:00:32'),
(33, 2, 1, 'Edit', NULL, 0, NULL, 'basic-infos.edit', 1, '2024-11-09 04:07:19', '2024-11-09 04:07:19'),
(42, 36, 1, 'Edit', NULL, 0, NULL, 'transfer-requisitions.edit-incoming', 0, '2025-01-06 06:01:59', '2025-02-27 04:44:36'),
(46, 184, 1, 'Bike Stock', NULL, 0, NULL, NULL, 1, '2025-01-19 02:34:20', '2025-03-19 00:27:09'),
(47, 184, 2, 'Investors Bike', NULL, 0, NULL, NULL, 1, '2025-01-19 02:34:37', '2025-04-16 04:32:00'),
(49, 184, 4, 'Total Sold', NULL, 0, NULL, NULL, 1, '2025-01-19 02:35:06', '2025-04-16 04:32:29'),
(50, 184, 5, 'Today\'s Purchase', NULL, 0, NULL, NULL, 1, '2025-01-19 03:07:13', '2025-04-22 04:22:10'),
(65, 64, 1, 'Edit', NULL, 0, NULL, 'investor-transactions.edit', 1, '2025-02-25 23:36:31', '2025-02-25 23:36:31'),
(66, 64, 2, 'Delete', NULL, 0, NULL, 'investor-transactions.destroy', 1, '2025-02-25 23:37:01', '2025-02-25 23:37:01'),
(67, 64, 3, 'Approve', NULL, 0, NULL, 'investor-transactions.approve', 1, '2025-02-25 23:38:40', '2025-02-25 23:38:40'),
(68, 64, 1, 'Add', NULL, 0, NULL, 'investor-transactions.create', 1, '2025-02-26 00:09:30', '2025-02-26 00:09:30'),
(75, 72, 2, 'Add', NULL, 0, NULL, 'bike-service-categories.create', 1, '2025-03-08 03:30:58', '2025-03-08 03:31:30'),
(76, 72, 2, 'Edit', NULL, 0, NULL, 'bike-service-categories.edit', 1, '2025-03-08 03:32:41', '2025-03-08 03:32:41'),
(77, 36, 1, 'Add', NULL, 0, NULL, 'create-route:- bike-services.create', 1, '2025-03-08 03:34:17', '2025-03-08 03:34:17'),
(78, 36, 2, 'Edit', NULL, 0, NULL, 'bike-services.edit', 1, '2025-03-08 03:34:53', '2025-03-08 03:34:53'),
(86, 63, 1, 'Edit', NULL, 0, NULL, 'investors.edit', 1, '2025-03-11 02:14:15', '2025-03-11 02:14:15'),
(87, 63, -1, 'Add', NULL, 0, NULL, 'investors.create', 1, '2025-03-11 02:14:52', '2025-03-11 02:14:52'),
(88, 15, 1, 'Add', NULL, 0, NULL, 'payment-methods.create', 1, '2025-03-11 02:15:34', '2025-03-11 02:15:34'),
(89, 15, 2, 'Edit', NULL, 0, NULL, 'payment-methods.edit', 1, '2025-03-11 02:15:51', '2025-03-11 02:15:51'),
(90, 17, 1, 'Add', NULL, 0, NULL, 'accounts.create', 1, '2025-03-11 02:16:27', '2025-03-11 02:16:27'),
(91, 17, 2, 'Edit', NULL, 0, NULL, 'accounts.edit', 1, '2025-03-11 02:16:42', '2025-03-11 02:16:42'),
(103, 85, 1, 'Edit', NULL, 0, NULL, 'bike-profits.edit', 1, '2025-03-11 02:51:17', '2025-03-11 02:51:17'),
(104, 85, 2, 'Close', NULL, 0, NULL, 'bike-profits.change-status', 1, '2025-03-11 02:51:37', '2025-03-14 14:05:47'),
(107, 106, 1, 'Add', NULL, 0, 'expense-categories.create', 'expense-categories.create', 1, '2025-03-11 22:32:22', '2025-03-11 22:33:55'),
(108, 106, 2, 'Edit', NULL, 0, NULL, 'expense-categories.edit', 1, '2025-03-11 22:33:32', '2025-03-11 22:33:32'),
(111, 109, 1, 'Add', NULL, 0, NULL, 'expense-heads.create', 1, '2025-03-12 00:36:37', '2025-03-12 00:36:37'),
(112, 109, 2, 'Edit', NULL, 0, NULL, 'expense-heads.edit', 1, '2025-03-12 00:36:58', '2025-03-12 00:36:58'),
(113, 110, 1, 'Add', NULL, 0, NULL, 'expenses.create', 1, '2025-03-12 00:38:33', '2025-03-12 00:38:33'),
(114, 110, 2, 'Edit', NULL, 0, NULL, 'expenses.edit', 1, '2025-03-12 00:38:50', '2025-03-12 00:38:50'),
(115, 110, 3, 'Delete', NULL, 0, NULL, 'expenses.destroy', 1, '2025-03-12 00:39:22', '2025-03-12 00:39:22'),
(116, 110, 4, 'Approve', NULL, 0, NULL, 'expenses.approve', 1, '2025-03-12 00:39:54', '2025-03-12 00:39:54'),
(118, 110, 5, 'View', NULL, 0, NULL, 'expenses.view', 1, '2025-03-12 03:53:02', '2025-03-12 03:53:02'),
(119, 85, 3, 'View Records', NULL, 0, NULL, 'bike-profits.share-records', 1, '2025-03-14 14:06:39', '2025-03-14 14:06:39'),
(120, 119, 1, 'Edit', NULL, 0, NULL, 'bike-profits.share-records.edit', 1, '2025-03-14 14:08:04', '2025-03-14 14:08:04'),
(121, 119, 2, 'Delete', NULL, 0, NULL, 'bike-profits.share-records.destroy', 1, '2025-03-14 14:08:50', '2025-03-14 14:10:43'),
(122, 119, 3, 'Approve', NULL, 0, NULL, 'bike-profits.share-records.approve', 1, '2025-03-14 14:09:29', '2025-03-14 14:09:29'),
(123, 119, 0, 'Create', NULL, 0, NULL, 'bike-profits.share-records.create', 1, '2025-03-14 14:11:31', '2025-03-14 14:11:50'),
(125, 124, 1, 'Category', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'categories.create', 'categories.index', 1, '2025-03-14 22:26:40', '2025-03-14 22:37:43'),
(126, 124, 2, 'Sub Category', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'sub-categories.create', 'sub-categories.index', 1, '2025-03-14 22:39:29', '2025-03-14 22:39:29'),
(127, 124, 3, 'Items', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'items.create', 'items.index', 1, '2025-03-14 22:58:29', '2025-03-14 22:58:29'),
(128, 124, 4, 'Suppliers', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'suppliers.create', 'suppliers.index', 1, '2025-03-15 12:51:51', '2025-03-16 21:49:08'),
(136, 124, 5, 'Customers', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'customers.create', 'customers.index', 0, '2025-03-22 13:17:08', '2025-09-22 09:49:05'),
(143, 141, 1, 'Add', NULL, 0, NULL, 'loans.create', 1, '2025-04-11 11:13:03', '2025-04-11 11:13:03'),
(144, 141, 2, 'Edit', NULL, 0, NULL, 'loans.edit', 1, '2025-04-11 11:15:09', '2025-04-11 11:15:09'),
(145, 141, 3, 'Delete', NULL, 0, NULL, 'loans.destroy', 1, '2025-04-11 11:15:28', '2025-04-11 11:15:28'),
(146, 141, 4, 'Approve', NULL, 0, NULL, 'loans.approve', 1, '2025-04-11 11:16:04', '2025-04-11 11:16:04'),
(147, 141, 5, 'View', NULL, 0, NULL, 'loans.invoice', 1, '2025-04-11 11:17:32', '2025-04-11 11:17:32'),
(148, 141, 6, 'Print', NULL, 0, NULL, 'loans.invoice.print', 1, '2025-04-11 11:17:58', '2025-04-11 11:17:58'),
(149, 131, 1, 'Add', NULL, 0, NULL, 'purchases.create', 1, '2025-04-13 01:08:40', '2025-04-13 01:08:40'),
(150, 131, 2, 'Edit', NULL, 0, NULL, 'purchases.edit', 1, '2025-04-13 01:09:15', '2025-04-13 01:09:15'),
(151, 131, 3, 'Delete', NULL, 0, NULL, 'purchases.destroy', 1, '2025-04-13 01:09:32', '2025-04-13 01:09:32'),
(152, 131, 5, 'View', NULL, 0, NULL, 'purchases.vouchar', 1, '2025-04-13 01:11:25', '2025-04-13 01:11:25'),
(153, 131, 6, 'Print', NULL, 0, NULL, 'purchases.vouchar.print', 1, '2025-04-13 01:11:48', '2025-04-13 01:11:48'),
(154, 131, 4, 'Add Payment', NULL, 0, NULL, 'purchases.payment.store', 1, '2025-04-13 01:12:31', '2025-04-13 01:13:29'),
(155, 137, 1, 'Add', NULL, 0, NULL, 'sales.create', 1, '2025-04-13 02:50:15', '2025-04-13 02:50:15'),
(156, 137, 2, 'Edit', NULL, 0, NULL, 'sales.edit', 1, '2025-04-13 02:50:37', '2025-04-13 02:50:37'),
(157, 137, 3, 'Delete', NULL, 0, NULL, 'sales.destroy', 1, '2025-04-13 02:50:52', '2025-04-13 02:50:52'),
(158, 137, 4, 'Approve', NULL, 0, NULL, 'sales.approve', 1, '2025-04-13 02:51:25', '2025-04-13 02:51:25'),
(159, 137, 5, 'View', NULL, 0, NULL, 'sales.invoice', 1, '2025-04-13 02:52:47', '2025-04-13 02:52:47'),
(160, 137, 6, 'Print', NULL, 0, NULL, 'sales.invoice.print', 1, '2025-04-13 02:53:16', '2025-04-13 02:53:16'),
(161, 137, 7, 'Payment', NULL, 0, NULL, 'sales.payment.store', 1, '2025-04-13 02:53:58', '2025-04-13 02:53:58'),
(163, 71, 1, 'Add', NULL, 0, NULL, 'fundtransfers.create', 1, '2025-04-21 00:57:36', '2025-04-21 00:57:36'),
(164, 71, 2, 'Edit', NULL, 0, NULL, 'fundtransfers.edit', 1, '2025-04-21 00:57:55', '2025-04-21 00:57:55'),
(165, 71, 3, 'Delete', NULL, 0, NULL, 'fundtransfers.destroy', 1, '2025-04-21 00:58:14', '2025-04-21 00:58:14'),
(166, 71, 4, 'Approve', NULL, 0, NULL, 'fundtransfers.approve', 1, '2025-04-21 00:58:30', '2025-04-21 00:58:30'),
(168, 184, 6, 'Today\'s Sale', NULL, 0, NULL, NULL, 1, '2025-04-22 04:22:35', '2025-04-22 04:22:35'),
(173, 183, 1, 'Today\'s Investor\'s Profit Payment', NULL, 0, NULL, NULL, 1, '2025-04-22 04:24:26', '2025-04-22 04:24:26'),
(174, 183, 2, 'Today\'s New Investment', NULL, 0, NULL, NULL, 1, '2025-04-22 04:24:47', '2025-04-22 04:24:47'),
(175, 183, 3, 'Today\'s Investment Withdraw', NULL, 0, NULL, NULL, 1, '2025-04-22 04:25:10', '2025-04-22 04:25:10'),
(180, 183, 4, 'Investors Investment Capital', NULL, 0, NULL, NULL, 1, '2025-04-23 04:56:04', '2025-04-23 04:56:04'),
(181, 183, 5, 'My Investment Capital', NULL, 0, NULL, NULL, 1, '2025-04-23 04:57:37', '2025-04-23 04:57:37'),
(183, 1, 4, 'Investement Info', NULL, 0, NULL, NULL, 0, '2025-04-23 05:00:28', '2025-07-21 11:50:00'),
(184, 1, 5, 'Bike Info', NULL, 0, NULL, NULL, 0, '2025-04-23 05:01:24', '2025-07-21 11:49:21'),
(190, 1, 1, 'Financial Status', NULL, 0, NULL, NULL, 0, '2025-05-21 04:53:32', '2025-07-21 11:49:03'),
(191, 190, 1, 'Total Investment Capital', NULL, 0, NULL, NULL, 1, '2025-05-21 04:55:27', '2025-05-21 04:55:27'),
(192, 190, 2, 'Total Item Stock Value', NULL, 0, NULL, NULL, 1, '2025-05-21 04:55:36', '2025-05-21 04:55:36'),
(193, 190, 3, 'Total Bike Stock Value', NULL, 0, NULL, NULL, 1, '2025-05-21 04:55:45', '2025-05-21 04:55:45'),
(194, 190, 4, 'Cash Balance', NULL, 0, NULL, NULL, 1, '2025-05-21 04:55:54', '2025-05-21 04:55:54'),
(195, 190, 5, 'Total Expense', NULL, 0, NULL, NULL, 1, '2025-05-21 04:56:20', '2025-05-21 04:56:20'),
(196, 190, 6, 'Total Purchase', NULL, 0, NULL, NULL, 1, '2025-05-21 04:56:32', '2025-05-21 04:56:32'),
(197, 190, 7, 'Total Sale', NULL, 0, NULL, NULL, 1, '2025-05-21 04:56:42', '2025-05-21 04:56:42'),
(198, 189, 1, 'Total Loan Amount Receiveable', NULL, 0, NULL, NULL, 1, '2025-05-21 04:58:47', '2025-05-21 04:58:47'),
(199, 189, 2, 'Total Loan Amount Payable', NULL, 0, NULL, NULL, 1, '2025-05-21 04:59:03', '2025-05-21 04:59:03'),
(200, 183, 6, 'My Available Balance', NULL, 0, NULL, NULL, 1, '2025-05-21 06:07:28', '2025-05-21 06:07:28'),
(201, 190, 7, 'Total Bike Service Expense', NULL, 0, NULL, NULL, 1, '2025-05-28 02:28:24', '2025-05-28 02:37:46'),
(209, 208, 1, 'Add', NULL, 0, NULL, 'agents.create', 1, '2025-07-22 05:28:08', '2025-07-22 05:28:08'),
(210, 208, 2, 'Edit', NULL, 0, NULL, 'agents.edit', 1, '2025-07-22 05:28:28', '2025-07-22 05:28:28'),
(211, 208, 3, 'Delete', NULL, 0, NULL, 'agents.destroy', 1, '2025-07-22 05:29:01', '2025-07-22 05:29:01'),
(227, 0, 6, 'Vendor Manage', '<i class=\"nav-icon fas fa-user-tie\"></i>', 1, 'vendors.create', 'vendors.index', 1, '2025-09-28 08:07:08', '2025-09-28 08:07:26'),
(228, 227, 1, 'Edit', NULL, 0, NULL, 'vendors.edit', 1, '2025-09-28 08:43:11', '2025-09-28 08:43:11'),
(229, 227, 2, 'Create', '<i class=\"far fa-dot-circle nav-icon\"></i>', 0, NULL, 'vendors.create', 1, '2025-09-28 08:43:30', '2025-09-28 08:43:30'),
(230, 231, 7, 'Vendor Menus', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'menus.vendors.create', 'menus.vendors.index', 1, '2025-09-28 08:55:57', '2025-09-28 10:10:49'),
(231, 0, 8, 'Menu Manage', '<i class=\"nav-icon fas fa-clipboard-list\"></i>', 1, NULL, NULL, 1, '2025-09-28 08:57:44', '2025-09-28 08:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 2),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(5, '2024_01_30_123321_create_roles_table', 5),
(6, '2024_01_30_123933_create_privileges_table', 6),
(7, '2023_12_26_114309_create_admins_table', 7),
(8, '2023_10_21_001204_create_basic_infos_table', 8),
(9, '2024_01_30_140322_create_menus_table', 9),
(10, '2024_10_26_114524_create_frontend_menus_table', 10),
(61, '2023_12_13_144516_create_categories_table', 34),
(91, '2025_03_23_005944_create_customer_ledgers_table', 47),
(94, '2025_03_23_121648_create_customer_payments_table', 48),
(106, '2025_03_23_005302_create_customers_table', 54),
(149, '2025_02_19_163817_create_payment_methods_table', 55),
(150, '2025_09_28_122626_create_vendors_table', 56),
(163, '2014_10_12_000000_create_users_table', 57),
(164, '2025_09_28_130554_create_vendor_roles_table', 57),
(165, '2025_09_28_130625_create_vendor_basic_infos_table', 57),
(167, '2025_09_28_130922_create_vendor_privileges_table', 57),
(168, '2025_09_28_130651_create_vendor_menus_table', 58);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_virtual` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_by_id` bigint DEFAULT NULL,
  `updated_by_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2025-09-28 06:50:44', '2025-09-28 06:50:44'),
(2, 2, 1, '2025-09-28 06:51:04', '2025-09-28 06:51:04'),
(3, 2, 2, '2025-09-28 06:51:04', '2025-09-28 06:51:04'),
(4, 2, 33, '2025-09-28 06:51:04', '2025-09-28 06:51:04'),
(5, 1, 1, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(6, 1, 2, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(7, 1, 33, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(8, 1, 3, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(9, 1, 4, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(10, 1, 6, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(11, 1, 7, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(12, 1, 8, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(13, 1, 5, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(14, 1, 9, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(15, 1, 10, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(16, 1, 11, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(17, 1, 12, '2025-09-28 06:51:34', '2025-09-28 06:51:34'),
(18, 1, 13, '2025-09-28 06:51:34', '2025-09-28 06:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `is_superadmin` tinyint NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `is_superadmin`, `created_by`, `role`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Super Admin', 1, NULL, NULL),
(2, 0, 1, 'Sales Man', 1, NULL, '2025-09-28 06:51:04'),
(3, 0, 1, 'Manager', 1, NULL, '2025-09-28 06:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `vendor_id`, `name`, `type`, `mobile`, `email`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vendor', 1, '01898898955', 'vendor@gmail.com', '$2y$10$.TiNLk76jfZurFW7upg00O.no8TkBYGUUmteWJKVMOmQbBZBlLqSK', 'user-1759146890.png', 1, 'hOLdvB0XnIC9qbE9ANCW2bkMa8OCtAkqajr8qZ20sOXYwelss79QUJOLYdw1', '2025-09-28 10:57:14', '2025-09-29 11:56:16'),
(4, 4, 'JR Tour & Travels', 1, '01744-217237', 'jrtourandtravels37@gmail.com', '$2y$10$sgNZgddRpSBf0zN9tDWqEeNUd2MbWHgwsNdR2vZ9XGqPs0f7QlHO.', 'user-1759140698.jpg', 1, NULL, '2025-09-29 08:50:34', '2025-09-29 10:11:38'),
(5, 4, 'Brennan Atkins', 5, '+8801839317038', 'qiqawina@mailinator.com', '$2y$10$sgNZgddRpSBf0zN9tDWqEeNUd2MbWHgwsNdR2vZ9XGqPs0f7QlHO.', NULL, 1, NULL, '2025-09-29 09:48:55', '2025-09-29 09:55:43'),
(6, 4, 'Raya Vaughan', 6, '+8801839317038', 'hyrezowove@mailinator.com', '$2y$10$sgNZgddRpSBf0zN9tDWqEeNUd2MbWHgwsNdR2vZ9XGqPs0f7QlHO.', NULL, 1, NULL, '2025-09-29 09:49:47', '2025-09-29 11:09:52'),
(7, 4, 'Xandra Klein', 5, '34567890', 'hybu@mailinator.com', '$2y$10$kE5ImwH1prutPrBcprDjberNIELh/O6qytNawlY9T6gHEgevonpMq', NULL, 1, NULL, '2025-09-29 09:55:18', '2025-09-29 09:55:31'),
(8, 1, 'Rowan Christensen', 7, 'Dolorum amet cillum', 'host@gmail.com', '$2y$10$oNcU17BTly9UP1aeipqdpOW0BjHpl4KI6hNvwPPmfLU8PUoIW9DNO', NULL, 1, 'aMyJwy0yIQxrv5XxOUYdumqCHdmuNMixF9rtVfXuX5BR8cnt6PH1NA0ugOjP', '2025-09-29 12:05:35', '2025-09-29 12:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_type` enum('airline','hotel','transport','tour_operator','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tour_operator',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_rate` decimal(5,2) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_type`, `name`, `contact_person`, `phone`, `email`, `address`, `country`, `commission_rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tour_operator', 'Adventure Tour Group BD', 'Shoriful', '01498898955', 'malekazad@gmail.com', 'Plot No.-314/A, Road-18, Block-E, Bashundhara Avenue Road, Bashundhara Residential Area, Dhaka 1229, Bangladesh.', 'Bangladesh', '5.00', 1, '2025-09-28 10:57:14', '2025-09-29 08:54:03'),
(4, 'tour_operator', 'JR Tour & Travels', 'N/A', '01744-217237', 'jrtourandtravels37@gmail.com', NULL, 'Bangladesh', '5.00', 1, '2025-09-29 08:50:34', '2025-09-29 08:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_basic_infos`
--

CREATE TABLE `vendor_basic_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_basic_infos`
--

INSERT INTO `vendor_basic_infos` (`id`, `vendor_id`, `title`, `meta_keywords`, `meta_description`, `logo`, `favicon`, `phone`, `telephone`, `fax`, `email`, `location`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'Adventure Travel BD', 'Adventure Travel BD', 'Adventure Travel BD', 'logo-1759145154.jpg', 'favicon-1759145154.jpg', '+88 01306-170801', '234567', '23456789', 'info.adventuretourgroupbd@gmail.com', NULL, '1st Floor Plat-96, Borobagh Market Boundary Rood Mirpur -2 , Dhaka-1216 , Mirpur, Bangladesh', NULL, '2025-09-29 11:25:54'),
(2, 4, 'Blaine Cruz', 'Blaine Cruz', 'Blaine Cruz', 'logo-1759144633.jpg', 'favicon-1759144633.jpg', '+1 (306) 861-9726', '+1 (306) 861-9726', '+1 (306) 861-9726', 'gituv@mailinator.com', 'Non voluptates adipi', 'Non voluptates adipi', '2025-09-29 08:50:34', '2025-09-29 11:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_menus`
--

CREATE TABLE `vendor_menus` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `srln` int NOT NULL DEFAULT '1',
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_side_menu` tinyint NOT NULL DEFAULT '0',
  `create_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_menus`
--

INSERT INTO `vendor_menus` (`id`, `parent_id`, `srln`, `menu_name`, `navicon`, `is_side_menu`, `create_route`, `route`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', '<i class=\"nav-icon fas fa-tachometer-alt\"></i>', 1, NULL, 'dashboard.index', 1, '2025-09-28 10:20:35', '2025-09-28 12:53:38'),
(2, 0, 2, 'Settings', '<i class=\"nav-icon fa fa-cog\"></i>', 1, NULL, 'vendor-basic-infos.index', 1, '2025-09-28 10:22:18', '2025-09-29 10:45:44'),
(3, 0, 3, 'User Manage', '<i class=\"nav-icon fas fa-user-tie\"></i>', 1, NULL, NULL, 1, '2025-09-28 10:23:11', '2025-09-28 10:24:14'),
(4, 3, 1, 'Roles', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'roles.create', 'roles.index', 1, '2025-09-28 10:23:58', '2025-09-28 12:57:36'),
(5, 3, 2, 'Users', '<i class=\"far fa-dot-circle nav-icon\"></i>', 1, 'users.create', 'users.index', 1, '2025-09-28 10:24:47', '2025-09-28 10:24:47'),
(6, 2, 1, 'Edit', NULL, 0, NULL, 'vendor-basic-infos.edit', 1, '2025-09-29 10:46:05', '2025-09-29 10:46:05'),
(7, 2, 2, 'Update', NULL, 0, NULL, 'vendor-basic-infos.update', 1, '2025-09-29 10:46:27', '2025-09-29 10:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_privileges`
--

CREATE TABLE `vendor_privileges` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_privileges`
--

INSERT INTO `vendor_privileges` (`id`, `vendor_id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, '2025-09-28 06:42:32', '2025-09-28 06:42:32'),
(2, 0, 1, 2, '2025-09-28 06:42:32', '2025-09-28 06:42:32'),
(3, 0, 1, 3, '2025-09-28 06:42:32', '2025-09-28 06:42:32'),
(4, 0, 1, 4, '2025-09-28 06:42:32', '2025-09-28 06:42:32'),
(5, 0, 1, 5, '2025-09-28 06:42:32', '2025-09-28 06:42:32'),
(6, 0, 4, 1, '2025-09-29 02:55:46', '2025-09-29 02:55:46'),
(7, 0, 4, 2, '2025-09-29 02:55:46', '2025-09-29 02:55:46'),
(8, 0, 4, 3, '2025-09-29 02:55:46', '2025-09-29 02:55:46'),
(9, 0, 4, 4, '2025-09-29 02:55:46', '2025-09-29 02:55:46'),
(10, 0, 4, 5, '2025-09-29 02:55:46', '2025-09-29 02:55:46'),
(11, 0, 5, 1, '2025-09-29 03:10:16', '2025-09-29 03:10:16'),
(12, 0, 5, 2, '2025-09-29 03:10:16', '2025-09-29 03:10:16'),
(13, 0, 5, 3, '2025-09-29 03:10:16', '2025-09-29 03:10:16'),
(14, 0, 5, 4, '2025-09-29 03:10:16', '2025-09-29 03:10:16'),
(15, 0, 5, 5, '2025-09-29 03:10:16', '2025-09-29 03:10:16'),
(16, 0, 6, 1, '2025-09-29 04:00:00', '2025-09-29 04:00:00'),
(54, 1, 7, 1, '2025-09-29 12:49:37', '2025-09-29 12:49:37'),
(55, 1, 7, 2, '2025-09-29 12:49:37', '2025-09-29 12:49:37'),
(56, 1, 7, 6, '2025-09-29 12:49:37', '2025-09-29 12:49:37'),
(57, 1, 7, 7, '2025-09-29 12:49:37', '2025-09-29 12:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_roles`
--

CREATE TABLE `vendor_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint NOT NULL,
  `is_superadmin` tinyint NOT NULL DEFAULT '0',
  `is_default` tinyint NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_roles`
--

INSERT INTO `vendor_roles` (`id`, `vendor_id`, `is_superadmin`, `is_default`, `created_by`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'Super Admin', '2025-09-28 10:57:14', '2025-09-29 08:54:03'),
(4, 4, 1, 1, 4, 'Super Admin', '2025-09-29 08:50:34', '2025-09-29 08:55:46'),
(5, 4, 0, 0, 4, 'Manager', '2025-09-29 09:10:16', '2025-09-29 09:10:16'),
(6, 4, 0, 0, 4, 'Host', '2025-09-29 10:00:00', '2025-09-29 10:00:00'),
(7, 1, 0, 0, 1, 'Host', '2025-09-29 12:05:02', '2025-09-29 12:49:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `basic_infos`
--
ALTER TABLE `basic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_ledgers`
--
ALTER TABLE `customer_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payments`
--
ALTER TABLE `customer_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frontend_menus`
--
ALTER TABLE `frontend_menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `frontend_menus_slug_unique` (`slug`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_basic_infos`
--
ALTER TABLE `vendor_basic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_menus`
--
ALTER TABLE `vendor_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_privileges`
--
ALTER TABLE `vendor_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_roles`
--
ALTER TABLE `vendor_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `basic_infos`
--
ALTER TABLE `basic_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_ledgers`
--
ALTER TABLE `customer_ledgers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_payments`
--
ALTER TABLE `customer_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_menus`
--
ALTER TABLE `frontend_menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_basic_infos`
--
ALTER TABLE `vendor_basic_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_menus`
--
ALTER TABLE `vendor_menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_privileges`
--
ALTER TABLE `vendor_privileges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `vendor_roles`
--
ALTER TABLE `vendor_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
