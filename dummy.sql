-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 11, 2022 at 05:06 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wanamove`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `title`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'about_1606837703.jpg', 'who we are', 'Wanamove Logistics is Nigeria\'s fastest growing condumer oriented logistics company with a world class technology platform. Hundreds of merchants ship daily their parcels and packages by leveraging Wanamove\'s Pay-on-delivery, tracking and business intelligence services. At Wanamove, we are committed to provide cost efective Logistics Solutions for every business. With a timed delivery that offers complete flexibility, Wanamove Logistics ensures that you never have to wait.', NULL, '2020-12-25 02:00:24'),
(2, 'about_1606837720.jpg', 'what we do', 'As the fastest growing logistics service provider among other delivery companis in Nigeria, we offer a host of top tier solutions to cater to every business sector. From freight forwarding to e-commerce logistics and express courier delivery, we offer customers time bound and professional courier services that allow our discerning customers focus on their business without having to worry about their consignment.', NULL, NULL),
(3, 'about_1606837734.jpg', 'who we are', 'As the fastest growing logistics service provider among other delivery companis in Nigeria, we offer a host of top tier solutions to cater to every business sector. From freight forwarding to e-commerce logistics and express courier delivery, we offer customers time bound and professional courier services that allow our discerning customers focus on their business without having to worry about their consignment', NULL, '2021-01-10 10:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customer_infos`
--

DROP TABLE IF EXISTS `customer_infos`;
CREATE TABLE IF NOT EXISTS `customer_infos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_infos_order_number_unique` (`order_number`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_infos`
--

INSERT INTO `customer_infos` (`id`, `user_id`, `order_number`, `first_name`, `last_name`, `state`, `city`, `street`, `email`, `phone_no`, `alt_phone_no`, `created_at`, `updated_at`) VALUES
(3, 1, '1234', 'wande', 'oluwatosin', 'lagos', 'ikeja', 'sola martins', 'wande@hotmail.com', '09024472025', '09024472025', '2020-10-04 22:59:52', '2020-10-04 22:59:52'),
(4, 1, '12345', 'busayo', 'oluwatosin', 'lagos', 'ikeja', 'sola martins', 'busayo@hotmail.com', '09024472025', '09024472025', '2020-10-05 22:59:52', '2020-10-05 22:59:52'),
(5, 1, '1234567', 'mercy', 'oluwatosin', 'lagos', 'ikeja', 'sola martins', 'mercy@yahoo.com', '09024472024', '09024472025', '2020-10-07 16:40:22', '2020-10-07 16:40:22'),
(7, 6, '123456', 'wande', 'oluwatosin', 'lagos', 'ikeja', '6,ikeja', 'ayooluwa71@gmail.com', '09024472024', '09024472025', '2020-10-16 01:40:34', '2020-10-16 01:40:34'),
(9, 1, 'w1234', 'taiwo', 'olajungu', 'lagos', 'ikeja', '3,paries', 'ayooluwa71@gmail.com', '09024472025', '09024472025', '2020-10-27 10:43:17', '2020-10-27 10:43:17'),
(10, 1, '11111111', 'temi', 'oluwatosin', 'lagos', 'ikeja', '9,ifako', 'ov.ayowande@hotmail.com', '09024472025', '09024474444', '2021-01-07 08:20:59', '2021-01-07 08:20:59'),
(11, 1, '111222', 'ayowande', 'oluwatosin', 'lagos', 'ikeja', '9,ifako', 'ov.ayowande@hotmail.com', '09024472025', '09024474444', '2021-01-09 00:02:19', '2021-01-09 00:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

DROP TABLE IF EXISTS `footers`;
CREATE TABLE IF NOT EXISTS `footers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'wanamoveIt', '2022-08-11 14:37:37', '2022-08-11 14:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'logo1609448798.png', 'wanamove-home', 'wanamove logistics transportation', 'wanamove logistics transportation network', NULL, '2021-01-10 10:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_09_29_224743_create_user_details_table', 2),
(8, '2020_10_02_223334_create_pick_up_details_table', 3),
(9, '2020_10_02_224443_create_customer_infos_table', 3),
(10, '2020_10_02_224528_create_package_details_table', 3),
(11, '2020_10_07_175710_create_admins_table', 4),
(12, '2020_11_30_133949_create_services_table', 5),
(13, '2020_11_30_165824_create_abouts_table', 5),
(14, '2020_12_01_161953_create_general_settings_table', 5),
(15, '2020_12_01_223013_create_footers_table', 5),
(19, '2021_01_31_182347_create_user_pick_ups_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

DROP TABLE IF EXISTS `package_details`;
CREATE TABLE IF NOT EXISTS `package_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`id`, `user_id`, `order_number`, `description`, `unit_price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(3, 1, '1234', 'flat shoe', 3000.00, 2, 6000.00, '2020-10-04 22:59:52', '2020-10-04 22:59:52'),
(4, 1, '1234', 'short skirt', 2000.00, 1, 2000.00, '2020-10-04 22:59:52', '2020-10-04 22:59:52'),
(5, 1, '12345', 'red skirt', 3000.00, 1, 3000.00, '2020-10-05 22:59:52', '2020-10-05 22:59:52'),
(6, 1, '1234567', 'test', 7000.00, 1, 7000.00, '2020-10-07 16:40:22', '2020-10-07 16:40:22'),
(7, 1, '1234567', 'testt', 1000.00, 3, 3000.00, '2020-10-07 16:40:22', '2020-10-07 16:40:22'),
(10, 6, '123456', 'test', 5000.00, 1, 5000.00, '2020-10-16 01:40:34', '2020-10-16 01:40:34'),
(11, 6, '123456', 'test2', 3000.00, 2, 6000.00, '2020-10-16 01:40:34', '2020-10-16 01:40:34'),
(13, 1, 'w1234', 'shoe', 10000.00, 2, 20000.00, '2020-10-27 10:43:17', '2020-10-27 10:43:17'),
(14, 1, 'w1234', 'shirt', 20000.00, 6, 120000.00, '2020-10-27 10:43:17', '2020-10-27 10:43:17'),
(15, 1, '11111111', 'test', 1000.00, 2, 2000.00, '2021-01-07 08:20:59', '2021-01-07 08:20:59'),
(16, 1, '111222', 'test', 1000.00, 2, 2000.00, '2021-01-09 00:02:19', '2021-01-09 00:02:19'),
(17, 1, '111222', 'test', 2000.00, 3, 6000.00, '2021-01-09 00:02:19', '2021-01-09 00:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@hotmail.com', 'zv0XIH25pUUjmLcgdk4mODUH5sxsQcdZtBnA6OSLAOIcu0Wj55x1qebbc1o1', '2020-10-24 23:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `pick_up_details`
--

DROP TABLE IF EXISTS `pick_up_details`;
CREATE TABLE IF NOT EXISTS `pick_up_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `request_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total` float NOT NULL,
  `shipping_cost` double(8,2) NOT NULL,
  `grand_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pick_up_details_order_number_unique` (`order_number`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pick_up_details`
--

INSERT INTO `pick_up_details` (`id`, `request_type`, `user_id`, `order_number`, `first_name`, `payment_method`, `pickup_status`, `order_total`, `shipping_cost`, `grand_price`, `created_at`, `updated_at`) VALUES
(4, '0', 1, '1234', 'wande', 'COD', 'Shipped', 8000, 1000.00, 9000.00, '2020-10-04 22:59:52', '2020-12-25 02:04:12'),
(5, '0', 1, '12345', 'busayo', 'COD', 'Shipped', 3000, 1000.00, 4000.00, '2020-10-05 22:59:52', '2021-01-06 13:03:46'),
(6, '0', 1, '1234567', 'mercy', 'COD', 'In Process', 10000, 1000.00, 11000.00, '2020-10-07 16:40:22', '2020-10-09 23:31:22'),
(8, '0', 6, '123456', 'wande', 'COD', 'New', 11000, 1000.00, 12000.00, '2020-10-16 01:40:34', '2021-01-09 01:39:31'),
(11, '0', 1, 'w1234', 'taiwo', 'Prepaid', 'New', 140000, 2000.00, 142000.00, '2020-10-27 10:43:17', '2021-01-11 01:21:29'),
(12, '0', 1, '11111111', 'temi', 'COD', 'Shipped', 2000, 11111.00, 13111.00, '2021-01-07 08:20:59', '2021-01-10 09:18:12'),
(13, '0', 1, '111222', 'ayowande', 'COD', 'Shipped', 8000, 1000.00, 9000.00, '2021-01-09 00:02:19', '2021-01-10 09:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `detail`, `created_at`, `updated_at`) VALUES
(23, 'fa fa-user', 'Corporate Courier', 'The word cargo refers in particular to goods or produce being conveyed generally for commercial gain by ship, boat, or aircraft, altough the term is now often extended to cover all types of freight, including that carried by train, van, truck, or container', '2020-12-25 01:48:20', '2021-01-10 10:11:19'),
(11, 'fa fa-user', 'International Courier', 'The word cargo refers in particular to goods or produce being conveyed generally for commercial gain by ship, boat, or aircraft, altough the term is now often extended to cover all types of freight, including that carried by train, van, truck, or container', '2020-12-25 01:49:07', '2021-01-10 10:11:07'),
(7, 'fa fa-plane', 'Domestic Courier', 'The word cargo refers in particular to goods or produce being conveyed generally for commercial gain by ship, boat, or aircraft, altough the term is now often extended to cover all types of freight, including that carried by train, van, truck, or container', '2020-12-25 01:47:36', '2021-01-10 10:11:33'),
(56, 'fa fa-user', 'Corporate Courier', 'The word cargo refers in particular to goods or produce being conveyed generally for commercial gain by ship, boat, or aircraft, altough the term is now often extended to cover all types of freight, including that carried by train, van, truck, or container', '2020-12-25 01:48:20', '2020-12-25 01:48:20'),
(53, 'fa fa-user', 'Corporate Courier', 'The word cargo refers in particular to goods or produce being conveyed generally for commercial gain by ship, boat, or aircraft, altough the term is now often extended to cover all types of freight, including that carried by train, van, truck, or container', '2020-12-25 01:48:20', '2020-12-25 01:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `merchant` tinyint(1) DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `merchant`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ayowande', 'admin@hotmail.com', '$2y$10$cGaviFGl6vcy22O8t7ikau38qCXWL5vvUcDx6BukwcnQdOPH/tJGK', 1, 1, 1, 'cfmEkkJmigxsKgcpcN9h4VPPvzg5radoeXITOJCz0OlCzE2bjaYDNvyWVVzD', '2020-09-28 23:13:03', '2021-01-03 04:58:56'),
(4, 'wande', 'wande@yahoo.com', '$2y$10$Tchvs3kW9/cbE5MMoEd/BuYr65A3i/o.V1xWY8NOVojDyiioCVAfi', 0, 0, 1, NULL, '2020-09-30 22:53:46', '2021-02-06 00:40:50'),
(6, 'ayowande', 'ayooluwa71@gmail.com', '$2y$10$3ZjYIPsIYwT1dALHBIMACeTYAiU3llF/jhSzS56BZeNhoh12UbaNa', 0, 1, 1, 'rZJnNXmyKivmFLNLI3BcaDijQS3Yeatb7Rx6OxF8HwP5AXViHdUSG2TGtNo9', '2020-10-15 22:37:10', '2021-02-06 00:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_myself` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `dob`, `city`, `state`, `country`, `about_myself`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'wande', 'oluwatosin', 'Male', '2011-08-19', '', 'lagos', 'Nigeria', 'i am good yeah', 0, '2020-09-30 00:07:43', '2020-10-27 10:50:30'),
(2, 4, 'wande', 'ola', '', '', '', '', '', '', 0, '2020-09-30 22:53:46', '2020-09-30 22:53:46'),
(3, 6, 'ayowande', 'oluwatosin', '', '', '', '', '', '', 0, '2020-10-15 22:37:10', '2020-10-15 22:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_pick_ups`
--

DROP TABLE IF EXISTS `user_pick_ups`;
CREATE TABLE IF NOT EXISTS `user_pick_ups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dropoff_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_pick_ups_order_no_unique` (`order_no`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_pick_ups`
--

INSERT INTO `user_pick_ups` (`id`, `order_no`, `s_first_name`, `s_lastname`, `s_email`, `s_phone`, `r_first_name`, `r_lastname`, `r_email`, `r_phone`, `pickup_address`, `dropoff_address`, `package_description`, `payment_type`, `payment_status`, `status`, `order_cost`, `created_at`, `updated_at`) VALUES
(3, 'XZ4llq', 'wande', 'oluwatosin', 'wande@yahoo.com', '09023378976', 'temi', 'oluatosin', 'temi@gmail.com', '09024472025', '10, mojisola', '13,mojisola', '', 'Prepaid', 'success', 'In Process', 1500.00, '2021-02-06 00:54:36', '2021-02-07 17:04:30'),
(4, 'n1l8AR', 'ola', 'oluwa', 'ola@gmail.com', '09087765435', 'daniel', 'oluwatosin', 'daniel@yahoo.com', '08055768878', '59,ketu street, ifako', '33,lekki street, island', 'very heavy', 'Prepaid', 'Pending', 'New', 1500.00, '2021-02-07 16:40:40', '2021-02-07 16:40:40'),
(5, 'DncFDb', 'ola', 'oluwa', 'ola@gmail.com', '09087765435', 'daniel', 'oluwatosin', 'daniel@yahoo.com', '08055768878', '59,ketu street, ifako', '33,lekki street, island', 'very heavy', 'Prepaid', 'Pending', 'New', 1500.00, '2021-02-07 17:03:24', '2021-02-07 17:03:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
