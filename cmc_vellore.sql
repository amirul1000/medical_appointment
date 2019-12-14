-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 03:11 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmc_vellore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_a_slot`
--

CREATE TABLE `book_a_slot` (
  `id` int(11) NOT NULL,
  `registration_id` int(10) DEFAULT NULL,
  `department_id` int(10) DEFAULT NULL,
  `doctor_users_id` int(10) DEFAULT NULL,
  `Patient_ID` varchar(127) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `request_time` varchar(64) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `doctor_type_id` int(10) DEFAULT NULL,
  `fee_type` varchar(64) DEFAULT NULL,
  `fee_amount` decimal(10,2) DEFAULT NULL,
  `description` text,
  `doctor_comments` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','approved','completed','rejected','canceled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_a_slot`
--

INSERT INTO `book_a_slot` (`id`, `registration_id`, `department_id`, `doctor_users_id`, `Patient_ID`, `request_date`, `request_time`, `subject`, `doctor_type_id`, `fee_type`, `fee_amount`, `description`, `doctor_comments`, `created_at`, `updated_at`, `status`) VALUES
(26, 1, 4, 14, 'e1599c39ef', '2019-10-15', '11:40 am', '43434', 1, 'General', '260.00', '54545', NULL, '2019-10-15 15:08:28', NULL, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text,
  `country` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`) VALUES
(1, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'US', 'PArk', 'NY', '1212', 'company_images/1_2.jpg', 'company_images/1_8.jpg', 'company_images/1_15.jpg', 'footer content XXXXXXXXX XXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D''Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People''s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `dept_name` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `created_at`, `updated_at`) VALUES
(1, 'Heart', '2019-08-17 16:41:13', NULL),
(2, 'Skin', '2019-08-17 16:41:23', NULL),
(3, 'Nose', '2019-08-17 16:41:39', NULL),
(4, 'Eye', '2019-08-17 16:41:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_type`
--

CREATE TABLE `doctor_type` (
  `id` int(11) NOT NULL,
  `fee_type` varchar(64) DEFAULT NULL,
  `fee_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_type`
--

INSERT INTO `doctor_type` (`id`, `fee_type`, `fee_amount`) VALUES
(1, 'General', '200.00'),
(2, 'Private', '250.00');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `Hospital_ID` varchar(127) DEFAULT NULL,
  `Patient_Title` enum('Mr.','Mrs','Ms.','Miss','Mstr.','Dr.','Er.','Prof.','Rev.') DEFAULT NULL,
  `Patient_Name` varchar(127) DEFAULT NULL,
  `Patient_Initial` varchar(20) DEFAULT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Age` int(10) DEFAULT NULL,
  `Nationality` varchar(64) DEFAULT NULL,
  `Patients_Occupation` enum('ACCOUNTANT','ACCOUNTS OFFICER','ADM. OFFICER','ADVOCATE','AGENT','AGRICULTURE','AIR FORCE','ARMY','ARTIST','ASSESSOR','ASSISTANT MANAGER','ATTENDER','AUDITOR','AUTO DRIVER','BANK SERVICE','BEEDIWORKER','BISHOP','BUSINESS','CARPENTER','CASHIER','CHARTERED ACCOUNTANT','CHEF','CHEMIST','CHILD','CLERK','COLLEGE STUDENT','COMMISSIONER','COMPUTER OPERATOR','CONDUCTOR','CONTRACTOR','COOLIE','COPY WRITTER','CYCLE SHOP','DAILY WAGES','DEPUTY DIRECTOR','DHOBI','DIRECTOR','DOCTOR','DOCUMENT WRITER','DRAFTSMAN','DRIVER','ELECTRICIAN','ENGINEER','EVANGELIST','EX-SERVICEMAN','EXAMINER','EXECUTIVE','EXECUTIVE MANAGER','FARMER','FINANCE','FISHERMAN','FITTER','FOREMAN','FOREST OFFICER','FREEDOM FIGHTER','GOLD SMITH','GUMASTHA','HAVILDAR','HAWKER','HEAD CLERK','HEAD CONSTABLE','HEADMASTER','HORTICULTURIST','HOUSE WIFE','INCOME TAX SERVICE','INSPECTOR','JOURNALIST','JR.ENGINEER','JUDGE','LAB TECHNICIAN','LABOURER','LECTURER','LIBRARIAN','LIBRARY  ASSISTANT','LIC AGENT','LIC STAFF','MANAGER','MARKETING MANAGER','MASON','MECHANIC','MILK VENDOR','MOTHER SUPERIOR','NAVY','NEW BORN','NUN SISTER','NURSE','OFFICER','OPERATOR','ORGANISER','PAINTER','PASTOR','PENSIONER','PEON','PHARMACIST','PHOTOGRAPHER','PILOT','POLICE','POSTAL SERVICE','PRIEST','PRINCIPAL','PRIVATE SERVICE','PROFESSOR','RADIOGRAPHER','RAILWAY SERVICE','RECEPTIONIST','RETIRED','SALESMAN','SANITARY INSPECTOR','SCIENTIST','SECURITY','SERVICE','SERVICE (GOVT)','SMALL BUSINESS','SOCIAL WORKER','SOFTWARE ENGINEER','STAFF NURSE','STENOGRAPHER','STORE KEEPER','STUDENT','SUB INSPECTOR OF POLICE','SUPERINTENDENT','SUPERVISOR','SURVEYOR','SWEEPER','TAILOR','TEACHER','TECHNICIAN','TYPIST','WATCHMAN','WEAVER','WELDER','OTHERS') DEFAULT NULL,
  `Father_Mother_Husband_Name` varchar(64) DEFAULT NULL,
  `Gender` enum('Male','Female','Ambiguous') DEFAULT NULL,
  `Marital_Status` enum('SINGLE','MARRIED','WIDOW','WIDOWED','DIVORCED') DEFAULT NULL,
  `Religion` enum('BUDDHIST','CHRISTIAN','HINDU','JAIN','MUSLIM','SIKH','OTHERS') DEFAULT NULL,
  `Religion_Others` varchar(64) DEFAULT NULL,
  `Relationship` enum('FATHER','HUSBAND','MOTHER') DEFAULT NULL,
  `PerA_Door_No_Street` varchar(127) DEFAULT NULL,
  `PerA_Area` varchar(127) DEFAULT NULL,
  `PerA_country_id` int(10) DEFAULT NULL,
  `PerA_State` varchar(127) DEFAULT NULL,
  `PerA_District` varchar(127) DEFAULT NULL,
  `PerA_Thana` varchar(127) DEFAULT NULL,
  `PerA_Post_Code` varchar(127) DEFAULT NULL,
  `PreA_Door_No_Street` varchar(127) DEFAULT NULL,
  `PreA_Area` varchar(127) DEFAULT NULL,
  `PreA_country_id` int(10) DEFAULT NULL,
  `PreA_State` varchar(127) DEFAULT NULL,
  `PreA_District` varchar(127) DEFAULT NULL,
  `PreA_Thana` varchar(127) DEFAULT NULL,
  `PreA_Post_Code` varchar(127) DEFAULT NULL,
  `Mobile_No` varchar(127) DEFAULT NULL,
  `Email_ID` varchar(127) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `LandLine_No` varchar(127) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `Hospital_ID`, `Patient_Title`, `Patient_Name`, `Patient_Initial`, `file_picture`, `Date_of_Birth`, `Age`, `Nationality`, `Patients_Occupation`, `Father_Mother_Husband_Name`, `Gender`, `Marital_Status`, `Religion`, `Religion_Others`, `Relationship`, `PerA_Door_No_Street`, `PerA_Area`, `PerA_country_id`, `PerA_State`, `PerA_District`, `PerA_Thana`, `PerA_Post_Code`, `PreA_Door_No_Street`, `PreA_Area`, `PreA_country_id`, `PreA_State`, `PreA_District`, `PreA_Thana`, `PreA_Post_Code`, `Mobile_No`, `Email_ID`, `password`, `LandLine_No`, `created_at`, `updated_at`, `status`) VALUES
(1, '1b8e7d0fc2', 'Mr.', 'gfgfgfgfgf11', 'gfgfg', 'registration_images/1_10.jpg', '2019-08-18', 1, 'Aruba', 'ACCOUNTANT', 'gfgfg', 'Male', 'SINGLE', 'BUDDHIST', '', 'FATHER', 'C-20,JAkir Hossain Road,Block-E', '', 13, '', '', '', '', '65655665', '665', 13, '56656', '66656', '656565', '656565', '56655665', 'ttrtr@dgg.com', '51699877', '6566565', '2019-08-18 18:28:03', '2019-09-30 13:04:05', 'active'),
(2, 'c8f84106c2', 'Mr.', 'gfgfgfgfgf', 'gfgfg', 'registration_images/2_3.jpg', '2019-08-19', 2, 'Argentina', 'ACCOUNTANT', 'gfgfg', 'Male', 'SINGLE', 'BUDDHIST', '', 'FATHER', 'ttertret', 'etrt', 14, 'trtretrt', 'rtretret', 'rtretretre', 'trtret', 'trtrtrt', 'trtrt', 15, 'trtrte', 'trtrt', 'retretr', 'etretr', 'rtrtrtrt', 'trtretret', '1355079', 'tretrtret', '2019-08-19 12:33:29', NULL, 'active'),
(3, 'b4de7df8c2', 'Mr.', 'rtrtr', 'trt', 'registration_images/3_3.jpg', '2019-08-19', 4, '', 'ACCOUNTANT', '', '', 'SINGLE', 'BUDDHIST', '', 'FATHER', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', 'trtrtrtrt', '', '41235410', '', '2019-08-19 12:40:05', NULL, 'active'),
(4, 'e3058e78c2', 'Mr.', 'ggdfgdf', '434', 'registration_images/4_3.jpg', '2019-08-19', 5, 'Armenia', 'ACCOUNTANT', 'gdfgdfgfd', 'Male', 'SINGLE', 'BUDDHIST', '', 'FATHER', 'dfgdfgdg', 'dfgfgdfg', 15, 'gdfgfdg', 'gdfgdfg', 'dgdgdfg', 'dgdgdfg', 'dfggdg', 'dgdfgfdg', 16, 'fgdfgfdg', 'dfgdfgdfg', 'dfgdfg', 'dfgdfgd', '54545435', 'amirrucst@gmail.com', '75589013', 'Dhaka Division', '2019-08-19 15:26:01', '2019-08-19 15:31:42', 'active'),
(5, '8a9b5396e2', 'Mr.', 'gfgfgfgfgf', '656', 'registration_images/5_1.jpg', '2019-09-12', 6, 'Albania', 'ACCOUNTANT', '56565', 'Male', 'MARRIED', 'CHRISTIAN', '', 'FATHER', '6565', '566', 16, '', '', '', '', '', '', 0, '', '', '', '', '5656', '5656', '67797883', '', '2019-09-29 17:12:24', NULL, 'active'),
(6, '8c4b0563e2', 'Mr.', 'gfgfgfgfgf', '656', 'registration_images/6_1.jpg', '2019-09-12', 7, 'Albania', 'ACCOUNTANT', '56565', 'Male', 'MARRIED', 'CHRISTIAN', '', 'FATHER', '6565', '566', 16, '', '', '', '', '', '', 0, '', '', '', '', '5656', '5656', '69082672', '', '2019-09-29 17:12:27', NULL, 'active'),
(7, '8db2efdee2', 'Mr.', 'gfgfgfgfgf', '656', 'registration_images/7_1.jpg', '2019-09-12', 4, 'Albania', 'ACCOUNTANT', '56565', 'Male', 'MARRIED', 'CHRISTIAN', '', 'FATHER', '6565', '566', 16, '', '', '', '', '', '', 0, '', '', '', '', '5656', '5656', '15139855', '', '2019-09-29 17:12:29', NULL, 'active'),
(8, 'c853788be2', 'Mr.', '6656', '6656', 'registration_images/8_6.jpg', '2019-09-26', 2, 'Bahamas', 'ACCOUNTANT', '65665', '', 'SINGLE', 'BUDDHIST', '', 'FATHER', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '65656', '656', '55566450', '', '2019-09-29 22:07:37', NULL, 'active'),
(9, '78a685bae3', 'Mr.', 'fgfgfg', 'gfg', 'registration_images/9_1.jpg', '1929-09-20', 10, 'Andorra', 'ACCOUNTANT', 'gfgfg', '', 'SINGLE', 'BUDDHIST', '', 'FATHER', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '5656565', '6565656', '78674337', '6565656', '2019-09-30 12:02:54', '2019-09-30 12:06:59', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id` int(10) NOT NULL,
  `display_order_no` int(10) DEFAULT NULL,
  `slot_time` varchar(64) DEFAULT NULL,
  `comment` text,
  `status` enum('enabled','disabled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `display_order_no`, `slot_time`, `comment`, `status`) VALUES
(1, 1, '10:30 am', '', 'enabled'),
(2, 2, '11:40 am', '', 'enabled'),
(3, 3, '4:11 pm', '', 'enabled'),
(4, 4, '12:40 pm', 'fff', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `department_id` int(10) DEFAULT NULL,
  `doctor_type_id` int(10) DEFAULT NULL,
  `doctor_fee` decimal(10,2) DEFAULT NULL,
  `email` varchar(127) DEFAULT NULL,
  `password` varchar(127) DEFAULT NULL,
  `title` varchar(127) DEFAULT NULL,
  `first_name` varchar(127) DEFAULT NULL,
  `last_name` varchar(127) DEFAULT NULL,
  `designation` varchar(127) DEFAULT NULL,
  `in_special` text,
  `bio` text,
  `degree` varchar(127) DEFAULT NULL,
  `institutute` text,
  `passing_year` varchar(127) DEFAULT NULL,
  `experience` text,
  `success_stories` text,
  `file_picture` varchar(256) DEFAULT NULL,
  `cell_phone` varchar(20) DEFAULT NULL,
  `land_phone` varchar(20) DEFAULT NULL,
  `company` varchar(127) DEFAULT NULL,
  `address` varchar(127) DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(127) DEFAULT NULL,
  `zip` varchar(127) DEFAULT NULL,
  `country_id` varchar(127) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_type` enum('super','doctor','nurse','staff') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `doctor_type_id`, `doctor_fee`, `email`, `password`, `title`, `first_name`, `last_name`, `designation`, `in_special`, `bio`, `degree`, `institutute`, `passing_year`, `experience`, `success_stories`, `file_picture`, `cell_phone`, `land_phone`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, 1, 2, '34.00', 'xx', 'xx', 'Mr.', 'Anil', 'kumar', 'Sr Doctor', 'Heart', 'I am a  professional heart cergery', 'MBBS', 'DMC', '1967', 'Heart', '100 more patints get sucess', 'users_images/9_3.jpg', 'gggggg', 'ggggggggg', '', '', '', '', '', '231', '2011-10-19 00:00:00', '2019-10-15 13:07:16', 'super', 'active'),
(13, 3, 2, '100.00', 'aa', 'aa', 'xxxxxxxxxxxxx', 'xxxxxxxxxxxx', 'xxxxxxxxxxxxxxxx', '', '', '', '', '', '', '', '', 'users_images/13_2.jpg', '', '', '', '', '', '', '', '16', '2019-08-05 09:56:51', '2019-10-15 13:07:24', 'super', 'active'),
(14, 4, 1, '260.00', 'abc@abc.com', '123', '', 'ytytytrytr', 'ytryrty', '', '', '', '', '', '', 'trtretrt', 'etet', 'users_images/14_5.jpg', '', '', '', 'tretertre', '', 'tretret', '', '16', '2019-08-05 18:23:19', '2019-10-15 13:07:31', 'doctor', 'active'),
(15, 4, 2, '230.00', 'ffdfdsf', 'dsfsdfsdfds', 'fdsfdsfdsf', 'dsfdsfdf', 'dsfdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'users_images/15_feature_graphic.jpg', NULL, NULL, 'dfdfdfdfd', 'fdfdsfdf', 'dfdfdf', 'fdfdf', 'fdfdf', '16', '2019-08-18 13:19:56', '2019-10-15 13:03:55', 'doctor', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_a_slot`
--
ALTER TABLE `book_a_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_type`
--
ALTER TABLE `doctor_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_a_slot`
--
ALTER TABLE `book_a_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctor_type`
--
ALTER TABLE `doctor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
