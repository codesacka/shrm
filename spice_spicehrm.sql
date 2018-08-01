-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2017 at 11:27 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1-log
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spice_spicehrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accrual_settings`
--

CREATE TABLE `accrual_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accrual_settings`
--

INSERT INTO `accrual_settings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Daily', NULL, NULL),
(2, 'Weekly', NULL, NULL),
(3, 'Every Other Week', NULL, NULL),
(4, 'Twice a month', NULL, NULL),
(5, 'Monthly', NULL, NULL),
(6, 'Twice a year', NULL, NULL),
(7, 'Quaterly', NULL, NULL),
(8, 'Yearly', NULL, NULL),
(9, 'Anniversary', NULL, NULL),
(10, 'Per Hours Worked', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `active_settings`
--

CREATE TABLE `active_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_settings`
--

INSERT INTO `active_settings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'Inactive', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appraisal_cycles`
--

CREATE TABLE `appraisal_cycles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `duedate` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `serialnumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acquired` date NOT NULL,
  `warrantystarts` date NOT NULL,
  `warrantyends` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `serialnumber`, `brand`, `vendor`, `model`, `category`, `location`, `acquired`, `warrantystarts`, `warrantyends`, `description`, `created_at`, `updated_at`) VALUES
(1, '234234', '1', '1', 'Mac   core  i5', '1', '1', '2017-04-27', '2017-05-01', '2017-11-30', 'Mac   core  i5', '2017-05-01 13:53:11', '2017-05-01 13:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE `asset_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_categories`
--

INSERT INTO `asset_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'Laptop', '2017-05-01 12:02:44', '2017-05-01 12:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `asset_vendors`
--

CREATE TABLE `asset_vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_vendors`
--

INSERT INTO `asset_vendors` (`id`, `name`, `contactNo`, `Email`, `Website`, `Address`, `created_at`, `updated_at`) VALUES
(1, 'Apple Computers', '0738339933', 'info@apple.com', 'www.apple.com', 'www.apple.com', '2017-05-01 13:00:14', '2017-05-01 13:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `assign_leaves`
--

CREATE TABLE `assign_leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leavetype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_leaves`
--

INSERT INTO `assign_leaves` (`id`, `name`, `leavetype`, `fromdate`, `todate`, `duration`, `comment`, `created_at`, `updated_at`) VALUES
(2, '1', '1', '2017-05-06', '2017-08-04', '1', 'Maternity', '2017-04-19 04:06:18', '2017-04-19 06:28:23'),
(3, '12', '2', '2017-06-23', '2017-06-25', '1', 'desc', '2017-06-17 05:36:39', '2017-06-17 05:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Barclays', 'Barclays', '2017-05-26 05:57:28', '2017-06-30 06:40:27'),
(2, 'Equity', 'Equity', '2017-05-26 05:58:28', '2017-05-26 05:58:28'),
(3, 'Cooperative', 'Cooperative', '2017-05-26 05:58:39', '2017-05-26 05:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Dental', 'Dental', '2017-04-15 12:22:35', '2017-07-05 04:32:41'),
(2, 'Health', 'Health', '2017-05-18 07:07:44', '2017-07-05 04:32:21'),
(3, 'Retirement', 'Retirement', '2017-07-05 04:33:05', '2017-07-05 04:33:05'),
(4, 'Life Insurance', 'Life Insurance', '2017-07-05 04:33:23', '2017-07-05 04:33:23'),
(5, 'Disability', 'Disability', '2017-07-05 04:33:56', '2017-07-05 04:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `benefits_plan_coverages`
--

CREATE TABLE `benefits_plan_coverages` (
  `id` int(10) UNSIGNED NOT NULL,
  `benefitplan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefits_plan_coverages`
--

INSERT INTO `benefits_plan_coverages` (`id`, `benefitplan`, `plan`, `created_at`, `updated_at`) VALUES
(4, '6', '6', '2017-07-06 06:08:51', '2017-07-06 06:08:51'),
(12, '9', '7', '2017-07-08 14:45:02', '2017-07-08 14:45:02'),
(16, '8', '7', '2017-07-08 15:00:48', '2017-07-08 15:00:48'),
(18, '10', '7', '2017-07-08 15:08:18', '2017-07-08 15:08:18'),
(19, '11', '1', '2017-07-08 15:10:04', '2017-07-08 15:10:04'),
(20, '12', '1', '2017-07-08 15:13:15', '2017-07-08 15:13:15'),
(21, '7', '7', '2017-07-09 14:30:47', '2017-07-09 14:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_groups`
--

CREATE TABLE `benefit_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benefit_group_employees`
--

CREATE TABLE `benefit_group_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `benefitgroup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefit_group_employees`
--

INSERT INTO `benefit_group_employees` (`id`, `benefitgroup`, `employee`, `created_at`, `updated_at`) VALUES
(1, '8', '1', '2017-07-08 15:00:48', '2017-07-08 15:00:48'),
(2, '8', '3', '2017-07-08 15:00:48', '2017-07-08 15:00:48'),
(3, '8', '6', '2017-07-08 15:00:48', '2017-07-08 15:00:48'),
(4, '10', '1', '2017-07-08 15:06:32', '2017-07-08 15:06:32'),
(5, '10', '2', '2017-07-08 15:06:32', '2017-07-08 15:06:32'),
(6, '10', '1', '2017-07-08 15:08:19', '2017-07-08 15:08:19'),
(8, '10', '5', '2017-07-08 15:08:19', '2017-07-08 15:08:19'),
(10, '12', '5', '2017-07-08 15:13:15', '2017-07-08 15:13:15'),
(11, '7', '1', '2017-07-09 14:30:47', '2017-07-09 14:30:47'),
(12, '7', '5', '2017-07-09 14:30:47', '2017-07-09 14:30:47'),
(13, '7', '7', '2017-07-09 14:30:47', '2017-07-09 14:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_holders`
--

CREATE TABLE `benefit_holders` (
  `id` int(10) UNSIGNED NOT NULL,
  `benefit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `releaseid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxrelief` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefit_holders`
--

INSERT INTO `benefit_holders` (`id`, `benefit`, `employee`, `releaseid`, `amount`, `taxrelief`, `created_at`, `updated_at`) VALUES
(1, '7', '7', '11', '3000', '0', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(2, '8', '6', '11', '6000', '0', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(3, '10', '5', '11', '6000', '0', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(4, '12', '5', '11', '5000', '1100', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(5, '7', '5', '11', '3000', '0', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(6, '8', '1', '11', '6000', '0', '2017-07-24 08:27:28', '2017-07-24 08:27:28'),
(7, '10', '1', '11', '6000', '0', '2017-07-24 08:27:28', '2017-07-24 08:27:28'),
(8, '10', '1', '11', '6000', '0', '2017-07-24 08:27:28', '2017-07-24 08:27:28'),
(9, '7', '1', '11', '3000', '0', '2017-07-24 08:27:28', '2017-07-24 08:27:28'),
(10, '8', '1', '11', '6000', '0', '2017-07-24 08:27:28', '2017-07-24 08:27:28'),
(11, '10', '1', '11', '6000', '0', '2017-07-24 08:27:28', '2017-07-24 08:27:28'),
(12, '10', '1', '11', '6000', '0', '2017-07-24 08:27:28', '2017-07-24 08:27:28'),
(13, '7', '1', '11', '3000', '0', '2017-07-24 08:27:28', '2017-07-24 08:27:28'),
(14, '7', '7', '12', '3000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(15, '8', '6', '12', '6000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(16, '10', '5', '12', '6000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(17, '12', '5', '12', '5000', '1100', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(18, '7', '5', '12', '3000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(19, '8', '1', '12', '6000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(20, '10', '1', '12', '6000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(21, '10', '1', '12', '6000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(22, '7', '1', '12', '3000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(23, '8', '1', '12', '6000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(24, '10', '1', '12', '6000', '0', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(25, '10', '1', '12', '6000', '0', '2017-09-12 06:41:38', '2017-09-12 06:41:38'),
(26, '7', '1', '12', '3000', '0', '2017-09-12 06:41:38', '2017-09-12 06:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'Apple', '2017-05-01 11:39:24', '2017-05-01 11:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `cary_over_settings`
--

CREATE TABLE `cary_over_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cary_over_settings`
--

INSERT INTO `cary_over_settings` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'None'),
(2, NULL, NULL, 'UnLimited');

-- --------------------------------------------------------

--
-- Table structure for table `competencies`
--

CREATE TABLE `competencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competencies`
--

INSERT INTO `competencies` (`id`, `name`, `description`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'IT Skill', 'IT Skill', NULL, '2017-04-29 04:09:46', '2017-04-29 04:09:46'),
(2, 'Database Management Systems', 'Database Management Systems', '1', '2017-04-29 04:19:46', '2017-04-29 04:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_structure` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_settings`
--

CREATE TABLE `day_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_settings`
--

INSERT INTO `day_settings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Days', NULL, NULL),
(2, 'Weeks', NULL, NULL),
(3, 'Months', NULL, NULL),
(4, 'Years', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `day_states`
--

CREATE TABLE `day_states` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_states`
--

INSERT INTO `day_states` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '0000-00-00 00:00:00', NULL, 'Full Day'),
(2, '0000-00-00 00:00:00', NULL, 'Half Day'),
(3, '0000-00-00 00:00:00', NULL, 'Non working Day');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Advances', 'Advances', '2017-04-17 06:42:15', '2017-04-17 06:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_holders`
--

CREATE TABLE `deduction_holders` (
  `id` int(10) UNSIGNED NOT NULL,
  `deduction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `releaseid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deduction_holders`
--

INSERT INTO `deduction_holders` (`id`, `deduction`, `employee`, `releaseid`, `amount`, `created_at`, `updated_at`) VALUES
(1, '1', '7', '11', '2000', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(2, '1', '7', '11', '2000', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(3, '1', '7', '12', '2000', '2017-09-12 06:41:37', '2017-09-12 06:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `dependents`
--

CREATE TABLE `dependents` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacts` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dependents`
--

INSERT INTO `dependents` (`id`, `firstname`, `lastname`, `relationship`, `contacts`, `notes`, `created_at`, `updated_at`, `telephone`, `employee_id`) VALUES
(1, 'Kennedy', 'webale', 'Aunt', 'Address', 'Notes', '2017-04-10 06:02:57', '2017-04-10 06:02:57', '737383883', '1'),
(2, 'james', 'kago', 'Father', 'address', 'notes', '2017-04-10 12:59:33', '2017-04-10 12:59:33', '43453453', '1'),
(3, 'james', 'kago', 'Father', 'address', 'notes', '2017-04-10 13:00:44', '2017-04-10 13:00:44', '43453453', '1'),
(4, 'james', 'kago', 'Father', 'address', 'notes', '2017-04-10 13:01:05', '2017-04-10 13:01:05', '43453453', '1'),
(5, 'james', 'kago', 'Father', 'address', 'notes', '2017-04-10 13:03:45', '2017-04-10 13:03:45', '43453453', '1');

-- --------------------------------------------------------

--
-- Table structure for table `difficulties`
--

CREATE TABLE `difficulties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `difficulties`
--

INSERT INTO `difficulties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, NULL),
(2, '2', NULL, NULL),
(3, '3', NULL, NULL),
(4, '4', NULL, NULL),
(5, '5', NULL, NULL),
(6, '6', NULL, NULL),
(7, '7', NULL, NULL),
(8, '8', NULL, NULL),
(9, '9', NULL, NULL),
(10, '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disciplinaries`
--

CREATE TABLE `disciplinaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `folder` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `notes`, `attachment`, `type`, `created_at`, `updated_at`, `folder`) VALUES
(1, 'test', 'document', '97f7f89d26319a464bf6584c3d9d7051.PNG', '1', '2017-05-18 06:44:07', '2017-05-18 06:44:07', NULL),
(2, 'test2', 'test2', 'd6368eb1ada0146fbabee40e79f3b4e4.pdf', '2', '2017-05-18 06:45:35', '2017-05-18 06:45:35', NULL),
(3, 'BULK%20Payments%20System%20Review%20-%20FEEDBACK.docx_0.odt', 'BULK%20Payments%20System%20Review%20-%20FEEDBACK.docx_0.odt', '1f422c75031b07a409aa665065fdc42b.odt', '2', '2017-07-06 15:52:51', '2017-07-06 15:52:51', '1'),
(4, 'BULK%20Payments%20System%20Review%20-%20FEEDBACK.docx_0.odt', 'BULK%20Payments%20System%20Review%20-%20FEEDBACK.docx_0.odt', 'e820a45f1dfc7b95282d10b6087e11c0.odt', '2', '2017-07-06 15:53:59', '2017-07-06 15:53:59', '1'),
(5, 'example2.pdf', 'example2.pdf', '5c5e5fce9c631d16c36f4ceecf803e21.pdf', '2', '2017-07-25 08:16:38', '2017-07-25 08:16:38', '2'),
(6, 'byproduct.xls', 'byproduct.xls', 'b014098db1b53dc33f9578a9dc325e08.xls', '1', '2017-07-25 08:17:50', '2017-07-25 08:17:50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `doc_folders`
--

CREATE TABLE `doc_folders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doc_folders`
--

INSERT INTO `doc_folders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Company Files', '2017-07-06 15:05:20', '2017-07-06 15:05:20'),
(2, 'Employee Documents', '2017-07-25 07:54:44', '2017-07-25 07:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'First Degree', 'First Degree', '2017-04-11 09:40:52', '2017-07-02 07:29:32'),
(2, 'Masters Degree', 'Masters Degree', '2017-06-29 13:21:26', '2017-06-29 13:21:26'),
(3, 'PHD', 'PHD', '2017-06-29 13:21:55', '2017-06-29 13:21:55'),
(4, 'Certificate', 'Certificate', '2017-07-02 07:29:48', '2017-07-02 07:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_nick_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_smoker` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ethnic_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_ssn_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_sin_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_other_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_dri_lice_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_dri_lice_exp_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_military_service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `job_title_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `eeo_cat_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `work_station` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_street1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_street2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `city_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `province_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_hm_telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_work_telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_work_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sal_grade_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `joined_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emp_oth_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `termination_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `terminationdate` timestamp NULL DEFAULT NULL,
  `onboarding` int(11) NOT NULL,
  `onboardingdate` timestamp NULL DEFAULT NULL,
  `custom1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `custom2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `custom3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `custom4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `custom5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `custom6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `custom7` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `bankbranch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `bankaccount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emp_photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `hash_code` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `krataxPin` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `nssf` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `nhif` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `userid` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `emp_lastname`, `emp_firstname`, `emp_middle_name`, `emp_nick_name`, `emp_smoker`, `ethnic_code`, `emp_birthday`, `emp_gender`, `emp_marital_status`, `emp_ssn_num`, `emp_sin_num`, `emp_other_id`, `emp_dri_lice_num`, `emp_dri_lice_exp_date`, `emp_military_service`, `emp_status`, `job_title_code`, `eeo_cat_code`, `work_station`, `emp_street1`, `emp_street2`, `city_code`, `country_code`, `province_code`, `emp_zipcode`, `emp_hm_telephone`, `emp_mobile`, `emp_work_telephone`, `emp_work_email`, `sal_grade_code`, `joined_date`, `emp_oth_email`, `termination_id`, `terminationdate`, `onboarding`, `onboardingdate`, `custom1`, `custom2`, `custom3`, `custom4`, `custom5`, `custom6`, `custom7`, `bank`, `bankbranch`, `bankaccount`, `created_at`, `updated_at`, `emp_photo`, `hash_code`, `krataxPin`, `nssf`, `nhif`, `userid`) VALUES
(1, '5675756', 'kamotho', 'martha', 'kimani', '', '', '', '1980-03-20', '1', '1', '', '', '', '', '', '', '', '3', '', '1', '', '', '', '', '', '', '', '', '', 'marthakimani@spicehrm.com', '', '2017-06-15', '', '0', '2017-09-13 17:44:23', 0, '2017-09-13 17:46:20', '', '', '', '', '', '', '', '', '', '', '2017-06-22 09:54:16', '2017-06-22 10:02:04', '', '068bcdad6accbee0b2adc53cb82eb533', '', '', '', 21),
(2, '3232323', 'Mueni', 'Tabitha', 'Kalonzo', '', '', '', '2017-05-29', '2', '1', '', '', '', '', '', '', '', '3', '', '3', '', '', '', '', '', '', '', '', '', 'tabitha@spicehrm.com', '', '2017-05-30', '', '0', '2017-09-13 17:44:23', 0, '2017-09-13 17:46:20', '', '', '', '', '', '', '', '', '', '', '2017-06-30 09:29:04', '2017-06-30 09:29:04', '', 'f529eef4ff33d9ab8bab28350c1be479', '', '', '', 0),
(3, '34234324', 'kamburi', 'kimani', 'jacky', '', '', '', '2017-05-28', '1', '1', '', '', '', '', '', '', '', '3', '', '3', '', '', '', '', '', '', '', '', '', 'kimanijacky@spicehrm.com', '', '2017-05-31', '', '0', '2017-09-13 17:44:23', 0, '2017-09-13 17:46:20', '', '', '', '', '', '', '', '', '', '', '2017-06-30 14:52:34', '2017-06-30 14:52:34', '', '3d1ef22f5385ae08de94a598f8dab891', '', '', '', 0),
(4, '09848439934', 'joseph', 'Edward', 'snowden', '', '', '', '1970-02-26', '1', '1', '', '', '', '', '', '', '', '5', '', '3', '', '', '', '', '', '', '23543543543', '234324324', '234324234', 'edwardsnowden@spicehrm.com', '', '2017-06-29', '', '0', '2017-09-13 17:44:23', 0, '2017-09-13 17:46:20', '', '', '', '', '', '', '', '', '', '', '2017-07-02 04:31:27', '2017-07-02 04:31:27', '', 'a94bebf97db7545f2386510086b9c09f', '', '', '', 0),
(5, '3454535345', 'Chebet', 'jane', 'Tarus', '', '', '', '1990-06-06', '2', '1', '', '', '', '', '', '', '', '5', '', '3', '', '', '', '', '', '', '34543543', '435435', '43435435', 'janetarus@spicehrm.com', '', '2017-06-29', '', '0', '2017-09-13 17:44:23', 0, '2017-09-13 17:46:20', '', '', '', '', '', '', '', '', '', '', '2017-07-03 03:34:56', '2017-07-03 03:34:56', '', 'e06d2665fd25bccb2bba25ab21762b6d', '', '', '', 24),
(6, '24678905', 'Chebet', 'Easther', 'Tarus', '', '', '', '1990-06-06', '2', '1', '', '', '', '', '', '', '', '4', '', '3', '', '', '', '', '', '', '34543543', '435435', '43435435', 'easthertarus@spicehrm.com', '', '2017-06-29', '', '0', '2017-09-13 17:44:23', 0, '2017-09-13 17:46:20', '', '', '', '', '', '', '', '', '', '', '2017-07-03 03:36:56', '2017-09-07 03:36:36', '', 'a8b22f5c9d9e5db4d97eda095a6192d5', '211232', '23432', '24324', 0),
(7, '287678905', 'Chebet', 'James', 'Tarus', '', '', '', '1990-06-06', '2', '1', '', '', '', '', '', '', '', '5', '', '3', '', '', '', '', '', '', '34543543', '435435', '43435435', 'jamestarus@spicehrm.com', '', '2017-06-29', '', '0', '2017-09-13 17:44:23', 0, '2017-09-13 17:46:20', '', '', '', '', '', '', '', '1', 'Moi Avenue', '9086338939', '2017-07-03 03:39:14', '2017-09-07 04:33:59', '3d19176aec803dccfbba9949039b8296.jpg', 'dccb34a54a51c705c88ba5cf7261d2c7', '38484848', '345435', '345435', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_documents`
--

INSERT INTO `employee_documents` (`id`, `name`, `attachment`, `notes`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 'Certificate', '7b3b85acc94d2df9ba27b7188e30d667.PNG', 'certificate', '2017-05-02 05:14:31', '2017-05-02 05:14:31', NULL),
(2, 'Certificate', '881cb5534ac04cd691cdfa681afffb45.PNG', 'certificate', '2017-05-02 05:18:10', '2017-05-02 05:18:10', '3'),
(3, 'Certificate', 'ef862a59a5728e21170530ebcfb17ef4.PNG', 'Certificate', '2017-05-24 03:25:45', '2017-05-24 03:25:45', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_reportings`
--

CREATE TABLE `employee_reportings` (
  `id` int(10) UNSIGNED NOT NULL,
  `employeereportto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_reportings`
--

INSERT INTO `employee_reportings` (`id`, `employeereportto`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 'Direct', '2017-04-11 16:34:23', '2017-04-11 16:34:23', NULL),
(2, 'Indirect', '2017-04-11 16:34:33', '2017-04-11 16:34:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_pay_rates`
--

CREATE TABLE `employee_salary_pay_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_salary_pay_rates`
--

INSERT INTO `employee_salary_pay_rates` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hour', NULL, NULL),
(2, 'Week', NULL, NULL),
(3, 'Month', NULL, NULL),
(4, 'Year', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_types`
--

CREATE TABLE `employee_salary_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_salary_types`
--

INSERT INTO `employee_salary_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Salary\\Overtime', NULL, NULL),
(2, 'Salary Eligible for Overtime', NULL, NULL),
(3, 'Paid By the Hour ', NULL, NULL),
(4, 'Owners Draw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_taskings`
--

CREATE TABLE `employee_taskings` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duedate` date NOT NULL,
  `effectivedate` date NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiedbefore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dayweek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_taskings`
--

INSERT INTO `employee_taskings` (`id`, `event`, `participant`, `owner`, `name`, `description`, `email`, `duedate`, `effectivedate`, `priority`, `notifiedbefore`, `dayweek`, `comment`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '2', 'Create Email Accounts', 'description', 'info@test.com', '2017-06-10', '2017-06-10', '2', '3', '1', 'comment', '2017-05-01 09:59:59', '2017-05-01 09:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `employment_statuses`
--

CREATE TABLE `employment_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_statuses`
--

INSERT INTO `employment_statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Probation', 'Probation', '2017-04-06 12:58:16', '2017-04-11 14:42:04'),
(2, 'Permanent', 'Permanent', '2017-04-06 13:04:37', '2017-04-11 14:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `empskills`
--

CREATE TABLE `empskills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empskills`
--

INSERT INTO `empskills` (`id`, `skills`, `experience`, `description`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 'skill', '5', 'notes', '2017-04-11 01:56:31', '2017-04-11 01:56:31', '1'),
(2, '1', '5 years', 'skills 5 years', '2017-04-11 13:36:58', '2017-04-11 13:36:58', '1'),
(3, '1', '10 years', 'Php Experience', '2017-06-16 04:08:30', '2017-06-16 04:11:20', '12'),
(4, '1', '5 years', 'Programming in C++', '2017-07-02 08:40:38', '2017-07-02 08:44:54', '4');

-- --------------------------------------------------------

--
-- Table structure for table `emp_bank_infos`
--

CREATE TABLE `emp_bank_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emp_bank_infos`
--

INSERT INTO `emp_bank_infos` (`id`, `employee_id`, `bank`, `branch`, `account`, `created_at`, `updated_at`) VALUES
(1, '9', 'Barclays', 'moi avenue', '11111111111111', '2017-05-15 05:09:55', '2017-05-17 13:48:12'),
(2, '1', '1', 'moi ', '378383838', '2017-05-18 06:16:46', '2017-05-18 06:16:46'),
(3, '10', '1', 'Kisumu', '09993567456', '2017-05-18 06:57:07', '2017-05-18 06:57:07'),
(4, '11', '1', 'Moi  avenue', '234234324134324', '2017-05-26 06:05:35', '2017-05-26 06:22:24'),
(5, '12', '1', 'Moi avenue', '645654757657', '2017-06-14 02:05:33', '2017-06-14 02:05:33'),
(6, '1', '1', 'moi avenue', '474748393943', '2017-06-22 10:00:56', '2017-06-22 10:00:56'),
(7, '1', '1', 'moi avenue', '474748393943', '2017-06-22 10:01:35', '2017-06-22 10:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `emp_contact_details`
--

CREATE TABLE `emp_contact_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `streetaddress1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `streetaddress2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hometelephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worktelephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workemail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otheremail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_contact_details`
--

INSERT INTO `emp_contact_details` (`id`, `streetaddress1`, `streetaddress2`, `city`, `country`, `county`, `postalcode`, `hometelephone`, `mobile`, `worktelephone`, `workemail`, `otheremail`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, '4454', '45435', 'Nairobi', '113', 'Nairobi', '254', '234324', '234', '234', 'Ken@gmail.com', 'Ken@gmail.com', '1', '2017-04-11 11:34:30', '2017-04-11 11:34:30'),
(2, '3454', '5445', 'Nairobi', '11', 'Nairobi', '254', '23432432', '254732323', '34324', 'Ken@gmail.com', 'Ken@gmail.com', '1', '2017-05-13 08:02:04', '2017-05-13 08:02:04'),
(3, 'Moi avneu', 'barclays', 'Nairobi', '113', '254', '002000', '254720311323', '254720311323', '254720311323', 'klun@gmail.com', 'klun@gmail.com', '12', '2017-06-15 12:04:09', '2017-06-15 13:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `emp_educations`
--

CREATE TABLE `emp_educations` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_educations`
--

INSERT INTO `emp_educations` (`id`, `level`, `college`, `specialization`, `score`, `startdate`, `enddate`, `description`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 'Bsc', 'UON', 'Arts', 'First Class Honour', '2016-10-06', '2017-04-29', 'notes', '2017-04-11 01:33:09', '2017-04-11 01:33:09', '9'),
(2, 'Bsc', 'Niarobi', 'Maths', '1st class', '2010-06-01', '2017-06-23', 'bsc Math', '2017-06-16 03:44:46', '2017-06-16 03:53:32', '12'),
(3, '2', 'UONairobi', 'Management2', '3.75', '2015-01-30', '2017-06-28', 'Management2', '2017-07-02 07:38:49', '2017-07-02 08:09:47', '4');

-- --------------------------------------------------------

--
-- Table structure for table `emp_emergency_contact_details`
--

CREATE TABLE `emp_emergency_contact_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hometelephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worktelephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_emergency_contact_details`
--

INSERT INTO `emp_emergency_contact_details` (`id`, `name`, `relationship`, `hometelephone`, `mobile`, `worktelephone`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'jane', 'sister', '234324', '2343242', '4324324', '1', '2017-05-13 09:04:39', '2017-05-13 09:08:05'),
(2, 'Christine', 'mother', '23434', '2343242', '432434', '1', '2017-05-13 09:13:46', '2017-05-13 09:13:46'),
(3, 'Joshua Harris', 'Uncle', '234324324', '3243243244', '24324324324', '12', '2017-06-15 14:05:29', '2017-06-15 15:19:31'),
(4, 'nakuru', 'Aunt 2', '0720311323', '720311323', '0720311323', '12', '2017-06-20 11:29:53', '2017-06-20 11:29:53'),
(5, 'James Kamau', 'Father', '4324324', '23424', '5435435', '7', '2017-07-04 09:28:47', '2017-07-04 09:28:47'),
(6, 'kaburu', 'Dad', '45654', '45654', '46546', '4', '2017-07-04 09:40:40', '2017-07-04 09:40:40'),
(7, 'James', 'Dad', '0720311323', '0720311323', '0720311323', '6', '2017-07-08 16:35:19', '2017-07-08 16:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `emp_job_details`
--

CREATE TABLE `emp_job_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `joineddate` date NOT NULL,
  `probationdate` date NOT NULL,
  `permanencydate` date NOT NULL,
  `jobtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employmentstatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `jobspecification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jobcategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reportto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_job_details`
--

INSERT INTO `emp_job_details` (`id`, `joineddate`, `probationdate`, `permanencydate`, `jobtitle`, `employmentstatus`, `jobspecification`, `jobcategory`, `location`, `reportto`, `employee_id`, `created_at`, `updated_at`, `status`) VALUES
(2, '2017-06-29', '2017-06-29', '2017-06-29', '5', '2', '0', '0', '3', '0', '7', '2017-07-03 03:39:14', '2017-07-03 03:39:14', 1),
(3, '2010-02-03', '2017-03-29', '2015-07-09', '3', '2', 'sales', '2', '3', '6', '7', '2017-07-03 08:16:22', '2017-07-03 08:16:22', 0),
(4, '2017-06-25', '2017-06-25', '2017-06-25', '4', '2', 'accounts', '2', '3', '5', '6', '2017-07-04 03:50:02', '2017-07-04 03:50:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_languages`
--

CREATE TABLE `emp_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fluencylevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_languages`
--

INSERT INTO `emp_languages` (`id`, `language`, `skill`, `fluencylevel`, `description`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, '1', '1', '1', 'Proficient', '2017-04-11 14:09:38', '2017-04-11 14:09:38', '1'),
(2, '2', '2', '3', 'Germany', '2017-07-02 10:12:27', '2017-07-02 10:29:22', '4');

-- --------------------------------------------------------

--
-- Table structure for table `emp_report_tos`
--

CREATE TABLE `emp_report_tos` (
  `id` int(10) UNSIGNED NOT NULL,
  `reportto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_report_tos`
--

INSERT INTO `emp_report_tos` (`id`, `reportto`, `employee_id`, `created_at`, `updated_at`) VALUES
(2, '3', '5', '2017-09-13 08:02:18', '2017-09-13 08:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `emp_social_details`
--

CREATE TABLE `emp_social_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_social_details`
--

INSERT INTO `emp_social_details` (`id`, `type`, `handle`, `link`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'Twitter', '@realDonaldTrump', 'https://twitter.com/realDonaldTrump', '1', '2017-04-11 12:11:53', '2017-05-12 15:52:09'),
(2, 'Facebook', 'kenlun', 'www.facebook.com', '1', '2017-05-12 14:22:14', '2017-05-12 14:22:14'),
(3, 'Youtube', 'klun', 'www.youtube.com', '1', '2017-05-12 14:24:13', '2017-05-12 15:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `emp_work_experiences`
--

CREATE TABLE `emp_work_experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_work_experiences`
--

INSERT INTO `emp_work_experiences` (`id`, `company`, `jobtitle`, `startdate`, `enddate`, `description`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 'company', 'title', '2016-08-04', '2017-05-06', 'notes', '2017-04-10 15:35:00', '2017-04-10 15:35:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duedate` date NOT NULL,
  `participant` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `owners` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `locations` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `duedate`, `participant`, `owners`, `created_at`, `updated_at`, `locations`) VALUES
(1, 'Intake for Technical Support Engineers in January', '2017-06-10', 'Engineers', 'engineers', '2017-05-01 06:54:42', '2017-05-01 06:54:42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `first_accruals`
--

CREATE TABLE `first_accruals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_accruals`
--

INSERT INTO `first_accruals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prorate', NULL, NULL),
(2, 'Full Amount', NULL, NULL),
(3, 'At the End of the Period', NULL, NULL),
(4, 'At the Beginning of the Period', NULL, NULL),
(5, 'Start of the Year', NULL, NULL),
(6, 'Employee Hire Date', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', NULL, NULL),
(2, 'Female', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holiday_date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recurrent` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `name`, `holiday_date`, `description`, `created_at`, `updated_at`, `recurrent`) VALUES
(1, 'Madaraka', '2017-06-01', 'Madaraka', '2017-04-18 04:50:55', '2017-04-18 04:51:46', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hour_policies`
--

CREATE TABLE `hour_policies` (
  `id` int(10) UNSIGNED NOT NULL,
  `hourrate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perhoursworked` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hmaxbalance` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leavetype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_outcomes`
--

CREATE TABLE `interview_outcomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interview_outcomes`
--

INSERT INTO `interview_outcomes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pass or Fail', NULL, NULL),
(2, 'Numeric Score', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interview_templates`
--

CREATE TABLE `interview_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interviewoutcome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximumscore` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Item 1', 'Item 2', '2016-11-21 05:09:33', '2016-11-21 05:09:33'),
(3, 'Item 1', 'Item 2', '2016-11-21 05:09:38', '2016-11-21 05:09:38'),
(4, 'Item 1', 'Item 1', '2016-11-21 05:09:59', '2016-11-21 05:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Sales and Marketing', 'Sales and Marketing', '2017-04-11 09:15:07', '2017-06-29 12:19:46'),
(3, 'Technicians', 'Technicians', '2017-04-11 14:43:51', '2017-04-11 14:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`id`, `name`, `description`, `attachment`, `created_at`, `updated_at`) VALUES
(3, 'Sales and Marketing', 'Sales and Marketing', '0', '2017-04-11 09:11:25', '2017-04-11 09:11:25'),
(4, 'Accounts Clerk', 'Accounts Clerk', '0', '2017-06-29 11:55:24', '2017-06-29 11:59:33'),
(5, 'Finance Manager', 'Finance Manager', '0', '2017-06-29 11:56:09', '2017-06-29 11:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Germany', 'Germany', '2017-04-11 09:56:55', '2017-05-17 09:19:38'),
(2, 'Spainish', 'Spainish', '2017-04-11 09:57:17', '2017-04-11 09:57:17'),
(3, 'Japanese', 'Japanese', '2017-06-29 15:27:24', '2017-06-29 15:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `language_fluency_levels`
--

CREATE TABLE `language_fluency_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_fluency_levels`
--

INSERT INTO `language_fluency_levels` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'Poor'),
(2, NULL, NULL, 'Basic'),
(3, NULL, NULL, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `language_skills`
--

CREATE TABLE `language_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_skills`
--

INSERT INTO `language_skills` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Reading', NULL, NULL),
(2, 'Speaking', NULL, NULL),
(3, 'Writing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_durations`
--

CREATE TABLE `leave_durations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_durations`
--

INSERT INTO `leave_durations` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Full Day', '', NULL, NULL),
(2, 'Half Day', '', NULL, NULL),
(3, 'Specify Time', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_earneds`
--

CREATE TABLE `leave_earneds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_earneds`
--

INSERT INTO `leave_earneds` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'throughout the year in pay periods', NULL, NULL),
(2, 'all at once (beginning of each year)', NULL, NULL),
(3, 'all at once (each anniversary date)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_policies`
--

CREATE TABLE `leave_policies` (
  `id` int(10) UNSIGNED NOT NULL,
  `policyname` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `start` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `daysetting` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leavetype` int(11) DEFAULT '0',
  `amounthouraccrued` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `accruedamountfrom` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `accruedamountto` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `maxaccrual` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `carryoveramount` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstaccrual` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `carryoverdate` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accrualshappen` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_policies`
--

INSERT INTO `leave_policies` (`id`, `policyname`, `start`, `daysetting`, `created_at`, `updated_at`, `leavetype`, `amounthouraccrued`, `accruedamountfrom`, `accruedamountto`, `maxaccrual`, `carryoveramount`, `firstaccrual`, `carryoverdate`, `accrualshappen`) VALUES
(2, 'Annual Leave', '1', '1', '2017-07-06 13:02:42', '2017-07-06 13:30:46', 2, '1', '1', '15', '0', NULL, '1', '5', '3');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `annual` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `hour` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `description`, `created_at`, `updated_at`, `annual`, `hour`) VALUES
(1, 'Maternity', 'Maternity', '2017-04-18 02:58:02', '2017-05-18 07:06:07', '1', '0'),
(2, 'Annual', 'Annual', '2017-05-18 07:06:52', '2017-05-18 07:06:52', '0', '0'),
(3, 'Bereavement', 'Bereavement', '2017-07-06 06:59:36', '2017-07-06 06:59:36', '0', '0'),
(4, 'Sick', 'Sick', '2017-07-06 06:59:55', '2017-07-06 06:59:55', '0', '0'),
(5, 'Vacation', 'Vacation', '2017-07-06 07:00:13', '2017-07-06 07:00:13', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(10, 'MCSC', 'MCSC', '2017-04-11 09:53:11', '2017-06-29 15:10:19'),
(11, 'Professional License', 'Professional License', '2017-04-11 09:55:12', '2017-06-29 15:10:46'),
(12, 'Driver License', 'Driver License', '2017-04-11 12:50:51', '2017-06-29 15:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `country`, `state`, `city`, `postalcode`, `phone`, `address`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'Solis', '113', 'Nyeri', 'Nyeri', '00111', '098764324', '3456789', 'dd', '2017-05-18 06:49:25', '2017-05-18 06:49:25'),
(3, 'Main Location', '113', 'Nyeri', 'Nyeri', '002000', '2737373773', 'address 1', 'Notes', '2017-06-29 11:22:54', '2017-06-29 11:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `marital_statuses`
--

CREATE TABLE `marital_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marital_statuses`
--

INSERT INTO `marital_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Single', NULL, NULL),
(2, 'Married', NULL, NULL),
(3, 'Separated', NULL, NULL),
(4, 'Divorced', NULL, NULL),
(5, 'Widowed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'British Computer Society', 'British Computer Society', '2017-04-11 09:59:59', '2017-06-29 15:52:28'),
(2, 'USAU Membership', 'USAU Membership', '2017-06-29 15:52:18', '2017-06-29 15:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_17_060621_entrust_setup_tables', 1),
(4, '2016_11_18_122550_create_items_table', 2),
(5, '2017_03_29_080132_create_payment_modes_table', 3),
(6, '2017_05_07_121952_create_genders_table', 4),
(7, '2017_05_07_124831_create_marital_statuses_table', 5),
(8, '2017_05_14_112728_create_employee_salary_types_table', 6),
(9, '2017_05_14_112801_create_employee_salary_pay_rates_table', 6),
(10, '2017_05_15_074642_create_emp_bank_infos_table', 7),
(11, '2017_05_16_081254_create_leave_earneds_table', 8),
(12, '2017_05_16_093258_create_annual_policies_table', 9),
(13, '2017_05_16_093328_create_hour_policies_table', 9),
(14, '2017_05_16_102647_create_documents_table', 10),
(15, '2017_05_16_155053_create_sysprefs_table', 11),
(16, '2017_05_24_083901_create_nssf__structures_table', 12),
(17, '2017_05_25_063602_create_salary_releases_table', 13),
(18, '2017_05_25_064546_create_salary_uploads_table', 13),
(19, '2017_05_25_082010_create_nhif__structureholders_table', 14),
(20, '2017_05_25_082126_create_nssf__structureholders_table', 14),
(21, '2017_05_26_084254_create_banks_table', 15),
(22, '2017_07_05_192303_create_plan_coverages_table', 16),
(23, '2017_07_06_070910_create_benefits_plan_coverages_table', 17),
(24, '2017_07_06_110012_create_day_settings_table', 18),
(25, '2017_07_06_111625_create_accrual_settings_table', 19),
(26, '2017_07_06_120544_create_cary_o_ver_settings_table', 20),
(27, '2017_07_06_151218_create_first_accruals_table', 21),
(28, '2017_07_06_170142_create_doc_folders_table', 22),
(29, '2017_07_07_064634_create_benefit_groups_table', 23),
(30, '2017_07_08_170537_create_benefit_group_employees_table', 23),
(31, '2017_07_12_201538_create_benefit_holders_table', 24),
(32, '2017_07_12_201711_create_deduction_holders_table', 24),
(33, '2017_07_25_163934_create_onboardings_table', 25),
(34, '2017_07_25_163946_create_offboardings_table', 25),
(35, '2017_09_15_062141_create_onboarding_reasons_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'ANDORRA', 'Andorra', NULL, NULL),
(5, 'UNITED ARAB EMIRATES', 'United Arab Emirates', NULL, NULL),
(6, 'AFGHANISTAN', 'Afghanistan', NULL, '2017-06-29 12:43:04'),
(7, 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', NULL, NULL),
(8, 'ANGUILLA', 'Anguilla', NULL, NULL),
(9, 'ALBANIA', 'Albania', NULL, NULL),
(10, 'ARMENIA', 'Armenia', NULL, NULL),
(11, 'NETHERLANDS ANTILLES', 'Netherlands Antilles', NULL, NULL),
(12, 'ANGOLA', 'Angola', NULL, NULL),
(13, 'ANTARCTICA', 'Antarctica', NULL, NULL),
(14, 'ARGENTINA', 'Argentina', NULL, NULL),
(15, 'AMERICAN SAMOA', 'American Samoa', NULL, NULL),
(16, 'AUSTRIA', 'Austria', NULL, NULL),
(17, 'AUSTRALIA', 'Australia', NULL, NULL),
(18, 'ARUBA', 'Aruba', NULL, NULL),
(19, 'AZERBAIJAN', 'Azerbaijan', NULL, NULL),
(20, 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', NULL, NULL),
(21, 'BARBADOS', 'Barbados', NULL, NULL),
(22, 'BANGLADESH', 'Bangladesh', NULL, NULL),
(23, 'BELGIUM', 'Belgium', NULL, NULL),
(24, 'BURKINA FASO', 'Burkina Faso', NULL, NULL),
(25, 'BULGARIA', 'Bulgaria', NULL, NULL),
(26, 'BAHRAIN', 'Bahrain', NULL, NULL),
(27, 'BURUNDI', 'Burundi', NULL, NULL),
(28, 'BENIN', 'Benin', NULL, NULL),
(29, 'BERMUDA', 'Bermuda', NULL, NULL),
(30, 'BRUNEI DARUSSALAM', 'Brunei Darussalam', NULL, NULL),
(31, 'BOLIVIA', 'Bolivia', NULL, NULL),
(32, 'BRAZIL', 'Brazil', NULL, NULL),
(33, 'BAHAMAS', 'Bahamas', NULL, NULL),
(34, 'BHUTAN', 'Bhutan', NULL, NULL),
(35, 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
(36, 'BOTSWANA', 'Botswana', NULL, NULL),
(37, 'BELARUS', 'Belarus', NULL, NULL),
(38, 'BELIZE', 'Belize', NULL, NULL),
(39, 'CANADA', 'Canada', NULL, NULL),
(40, 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
(41, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', NULL, NULL),
(42, 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', NULL, NULL),
(43, 'CONGO', 'Congo', NULL, NULL),
(44, 'SWITZERLAND', 'Switzerland', NULL, NULL),
(45, 'COTE D\'IVOIRE', 'Cote D\'Ivoire', NULL, NULL),
(46, 'COOK ISLANDS', 'Cook Islands', NULL, NULL),
(47, 'CHILE', 'Chile', NULL, NULL),
(48, 'CAMEROON', 'Cameroon', NULL, NULL),
(49, 'CHINA', 'China', NULL, NULL),
(50, 'COLOMBIA', 'Colombia', NULL, NULL),
(51, 'COSTA RICA', 'Costa Rica', NULL, NULL),
(52, 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
(53, 'CUBA', 'Cuba', NULL, NULL),
(54, 'CAPE VERDE', 'Cape Verde', NULL, NULL),
(55, 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
(56, 'CYPRUS', 'Cyprus', NULL, NULL),
(57, 'CZECH REPUBLIC', 'Czech Republic', NULL, NULL),
(58, 'GERMANY', 'Germany', NULL, NULL),
(59, 'DJIBOUTI', 'Djibouti', NULL, NULL),
(60, 'DENMARK', 'Denmark', NULL, NULL),
(61, 'DOMINICA', 'Dominica', NULL, NULL),
(62, 'DOMINICAN REPUBLIC', 'Dominican Republic', NULL, NULL),
(63, 'ALGERIA', 'Algeria', NULL, NULL),
(64, 'ECUADOR', 'Ecuador', NULL, NULL),
(65, 'ESTONIA', 'Estonia', NULL, NULL),
(66, 'EGYPT', 'Egypt', NULL, NULL),
(67, 'WESTERN SAHARA', 'Western Sahara', NULL, NULL),
(68, 'ERITREA', 'Eritrea', NULL, NULL),
(69, 'SPAIN', 'Spain', NULL, NULL),
(70, 'ETHIOPIA', 'Ethiopia', NULL, NULL),
(71, 'FINLAND', 'Finland', NULL, NULL),
(72, 'FIJI', 'Fiji', NULL, NULL),
(73, 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', NULL, NULL),
(74, 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', NULL, NULL),
(75, 'FAROE ISLANDS', 'Faroe Islands', NULL, NULL),
(76, 'FRANCE', 'France', NULL, NULL),
(77, 'GABON', 'Gabon', NULL, NULL),
(78, 'UNITED KINGDOM', 'United Kingdom', NULL, NULL),
(79, 'GRENADA', 'Grenada', NULL, NULL),
(80, 'GEORGIA', 'Georgia', NULL, NULL),
(81, 'FRENCH GUIANA', 'French Guiana', NULL, NULL),
(82, 'GHANA', 'Ghana', NULL, NULL),
(83, 'GIBRALTAR', 'Gibraltar', NULL, NULL),
(84, 'GREENLAND', 'Greenland', NULL, NULL),
(85, 'GAMBIA', 'Gambia', NULL, NULL),
(86, 'GUINEA', 'Guinea', NULL, NULL),
(87, 'GUADELOUPE', 'Guadeloupe', NULL, NULL),
(88, 'EQUATORIAL GUINEA', 'Equatorial Guinea', NULL, NULL),
(89, 'GREECE', 'Greece', NULL, NULL),
(90, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
(91, 'GUATEMALA', 'Guatemala', NULL, NULL),
(92, 'GUAM', 'Guam', NULL, NULL),
(93, 'GUINEA-BISSAU', 'Guinea-Bissau', NULL, NULL),
(94, 'GUYANA', 'Guyana', NULL, NULL),
(95, 'HONG KONG', 'Hong Kong', NULL, NULL),
(96, 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
(97, 'HONDURAS', 'Honduras', NULL, NULL),
(98, 'CROATIA', 'Croatia', NULL, NULL),
(99, 'HAITI', 'Haiti', NULL, NULL),
(100, 'HUNGARY', 'Hungary', NULL, NULL),
(101, 'INDONESIA', 'Indonesia', NULL, NULL),
(102, 'IRELAND', 'Ireland', NULL, NULL),
(103, 'ISRAEL', 'Israel', NULL, NULL),
(104, 'INDIA', 'India', NULL, NULL),
(105, 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
(106, 'IRAQ', 'Iraq', NULL, NULL),
(107, 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', NULL, NULL),
(108, 'ICELAND', 'Iceland', NULL, NULL),
(109, 'ITALY', 'Italy', NULL, NULL),
(110, 'JAMAICA', 'Jamaica', NULL, NULL),
(111, 'JORDAN', 'Jordan', NULL, NULL),
(112, 'JAPAN', 'Japan', NULL, NULL),
(113, 'KENYA', 'Kenya', NULL, NULL),
(114, 'KYRGYZSTAN', 'Kyrgyzstan', NULL, NULL),
(115, 'CAMBODIA', 'Cambodia', NULL, NULL),
(116, 'KIRIBATI', 'Kiribati', NULL, NULL),
(117, 'COMOROS', 'Comoros', NULL, NULL),
(118, 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', NULL, NULL),
(119, 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(120, 'KOREA, REPUBLIC OF', 'Korea, Republic of', NULL, NULL),
(121, 'KUWAIT', 'Kuwait', NULL, NULL),
(122, 'CAYMAN ISLANDS', 'Cayman Islands', NULL, NULL),
(123, 'KAZAKHSTAN', 'Kazakhstan', NULL, NULL),
(124, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', NULL, NULL),
(125, 'LEBANON', 'Lebanon', NULL, NULL),
(126, 'SAINT LUCIA', 'Saint Lucia', NULL, NULL),
(127, 'LIECHTENSTEIN', 'Liechtenstein', NULL, NULL),
(128, 'SRI LANKA', 'Sri Lanka', NULL, NULL),
(129, 'LIBERIA', 'Liberia', NULL, NULL),
(130, 'LESOTHO', 'Lesotho', NULL, NULL),
(131, 'LITHUANIA', 'Lithuania', NULL, NULL),
(132, 'LUXEMBOURG', 'Luxembourg', NULL, NULL),
(133, 'LATVIA', 'Latvia', NULL, NULL),
(134, 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', NULL, NULL),
(135, 'MOROCCO', 'Morocco', NULL, NULL),
(136, 'MONACO', 'Monaco', NULL, NULL),
(137, 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', NULL, NULL),
(138, 'MADAGASCAR', 'Madagascar', NULL, NULL),
(139, 'MARSHALL ISLANDS', 'Marshall Islands', NULL, NULL),
(140, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', NULL, NULL),
(141, 'MALI', 'Mali', NULL, NULL),
(142, 'MYANMAR', 'Myanmar', NULL, NULL),
(143, 'MONGOLIA', 'Mongolia', NULL, NULL),
(144, 'MACAO', 'Macao', NULL, NULL),
(145, 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', NULL, NULL),
(146, 'MARTINIQUE', 'Martinique', NULL, NULL),
(147, 'MAURITANIA', 'Mauritania', NULL, NULL),
(148, 'MONTSERRAT', 'Montserrat', NULL, NULL),
(149, 'MALTA', 'Malta', NULL, NULL),
(150, 'MAURITIUS', 'Mauritius', NULL, NULL),
(151, 'MALDIVES', 'Maldives', NULL, NULL),
(152, 'MALAWI', 'Malawi', NULL, NULL),
(153, 'MEXICO', 'Mexico', NULL, NULL),
(154, 'MALAYSIA', 'Malaysia', NULL, NULL),
(155, 'MOZAMBIQUE', 'Mozambique', NULL, NULL),
(156, 'NAMIBIA', 'Namibia', NULL, NULL),
(157, 'NEW CALEDONIA', 'New Caledonia', NULL, NULL),
(158, 'NIGER', 'Niger', NULL, NULL),
(159, 'NORFOLK ISLAND', 'Norfolk Island', NULL, NULL),
(160, 'NIGERIA', 'Nigeria', NULL, NULL),
(161, 'NICARAGUA', 'Nicaragua', NULL, NULL),
(162, 'NETHERLANDS', 'Netherlands', NULL, NULL),
(163, 'NORWAY', 'Norway', NULL, NULL),
(164, 'NEPAL', 'Nepal', NULL, NULL),
(165, 'NAURU', 'Nauru', NULL, NULL),
(166, 'NIUE', 'Niue', NULL, NULL),
(167, 'NEW ZEALAND', 'New Zealand', NULL, NULL),
(168, 'OMAN', 'Oman', NULL, NULL),
(169, 'PANAMA', 'Panama', NULL, NULL),
(170, 'PERU', 'Peru', NULL, NULL),
(171, 'FRENCH POLYNESIA', 'French Polynesia', NULL, NULL),
(172, 'PAPUA NEW GUINEA', 'Papua New Guinea', NULL, NULL),
(173, 'PHILIPPINES', 'Philippines', NULL, NULL),
(174, 'PAKISTAN', 'Pakistan', NULL, NULL),
(175, 'POLAND', 'Poland', NULL, NULL),
(176, 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', NULL, NULL),
(177, 'PITCAIRN', 'Pitcairn', NULL, NULL),
(178, 'PUERTO RICO', 'Puerto Rico', NULL, NULL),
(179, 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL),
(180, 'PORTUGAL', 'Portugal', NULL, NULL),
(181, 'PALAU', 'Palau', NULL, NULL),
(182, 'PARAGUAY', 'Paraguay', NULL, NULL),
(183, 'QATAR', 'Qatar', NULL, NULL),
(184, 'REUNION', 'Reunion', NULL, NULL),
(185, 'ROMANIA', 'Romania', NULL, NULL),
(186, 'RUSSIAN FEDERATION', 'Russian Federation', NULL, NULL),
(187, 'RWANDA', 'Rwanda', NULL, NULL),
(188, 'SAUDI ARABIA', 'Saudi Arabia', NULL, NULL),
(189, 'SOLOMON ISLANDS', 'Solomon Islands', NULL, NULL),
(190, 'SEYCHELLES', 'Seychelles', NULL, NULL),
(191, 'SUDAN', 'Sudan', NULL, NULL),
(192, 'SWEDEN', 'Sweden', NULL, NULL),
(193, 'SINGAPORE', 'Singapore', NULL, NULL),
(194, 'SAINT HELENA', 'Saint Helena', NULL, NULL),
(195, 'SLOVENIA', 'Slovenia', NULL, NULL),
(196, 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', NULL, NULL),
(197, 'SLOVAKIA', 'Slovakia', NULL, NULL),
(198, 'SIERRA LEONE', 'Sierra Leone', NULL, NULL),
(199, 'SAN MARINO', 'San Marino', NULL, NULL),
(200, 'SENEGAL', 'Senegal', NULL, NULL),
(201, 'SOMALIA', 'Somalia', NULL, NULL),
(202, 'SURINAME', 'Suriname', NULL, NULL),
(203, 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', NULL, NULL),
(204, 'EL SALVADOR', 'El Salvador', NULL, NULL),
(205, 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', NULL, NULL),
(206, 'SWAZILAND', 'Swaziland', NULL, NULL),
(207, 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', NULL, NULL),
(208, 'CHAD', 'Chad', NULL, NULL),
(209, 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
(210, 'TOGO', 'Togo', NULL, NULL),
(211, 'THAILAND', 'Thailand', NULL, NULL),
(212, 'TAJIKISTAN', 'Tajikistan', NULL, NULL),
(213, 'TOKELAU', 'Tokelau', NULL, NULL),
(214, 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
(215, 'TURKMENISTAN', 'Turkmenistan', NULL, NULL),
(216, 'TUNISIA', 'Tunisia', NULL, NULL),
(217, 'TONGA', 'Tonga', NULL, NULL),
(218, 'TURKEY', 'Turkey', NULL, NULL),
(219, 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', NULL, NULL),
(220, 'TUVALU', 'Tuvalu', NULL, NULL),
(221, 'TAIWAN, PROVINCE OF CHINA', 'Taiwan', NULL, NULL),
(222, 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', NULL, NULL),
(223, 'UKRAINE', 'Ukraine', NULL, NULL),
(224, 'UGANDA', 'Uganda', NULL, NULL),
(225, 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
(226, 'UNITED STATES', 'United States', NULL, NULL),
(227, 'URUGUAY', 'Uruguay', NULL, NULL),
(228, 'UZBEKISTAN', 'Uzbekistan', NULL, NULL),
(229, 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', NULL, NULL),
(230, 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', NULL, NULL),
(231, 'VENEZUELA', 'Venezuela', NULL, NULL),
(232, 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', NULL, NULL),
(233, 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', NULL, NULL),
(234, 'VIET NAM', 'Viet Nam', NULL, NULL),
(235, 'VANUATU', 'Vanuatu', NULL, NULL),
(236, 'WALLIS AND FUTUNA', 'Wallis and Futuna', NULL, NULL),
(237, 'SAMOA', 'Samoa', NULL, NULL),
(238, 'YEMEN', 'Yemen', NULL, NULL),
(239, 'MAYOTTE', 'Mayotte', NULL, NULL),
(240, 'SOUTH AFRICA', 'South Africa', NULL, NULL),
(241, 'ZAMBIA', 'Zambia', NULL, NULL),
(242, 'ZIMBABWE', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhif_structureholders`
--

CREATE TABLE `nhif_structureholders` (
  `id` int(10) UNSIGNED NOT NULL,
  `low` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `high` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deduction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `releaseid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhif_structureholders`
--

INSERT INTO `nhif_structureholders` (`id`, `low`, `high`, `deduction`, `releaseid`, `created_at`, `updated_at`) VALUES
(1, '0', '5999', '150', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(2, '6000', '7999', '300', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(3, '8000', '11999', '400', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(4, '12000', '14999', '500', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(5, '15000', '19999', '600', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(6, '20000', '24999', '750', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(7, '25000', '29999', '850', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(8, '30000', '34999', '900', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(9, '35000', '39999', '950', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(10, '40000', '44999', '1000', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(11, '45000', '49999', '1100', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(12, '50000', '59999', '1200', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(13, '70000', '79999', '1400', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(14, '80000', '89999', '1500', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(15, '90000', '99999', '1600', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(16, '100000', '0', '1700', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(17, '0', '5999', '150', '11', '2017-07-24 08:27:26', '2017-07-24 08:27:26'),
(18, '6000', '7999', '300', '11', '2017-07-24 08:27:26', '2017-07-24 08:27:26'),
(19, '8000', '11999', '400', '11', '2017-07-24 08:27:26', '2017-07-24 08:27:26'),
(20, '12000', '14999', '500', '11', '2017-07-24 08:27:26', '2017-07-24 08:27:26'),
(21, '15000', '19999', '600', '11', '2017-07-24 08:27:26', '2017-07-24 08:27:26'),
(22, '20000', '24999', '750', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(23, '25000', '29999', '850', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(24, '30000', '34999', '900', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(25, '35000', '39999', '950', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(26, '40000', '44999', '1000', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(27, '45000', '49999', '1100', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(28, '50000', '59999', '1200', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(29, '70000', '79999', '1400', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(30, '80000', '89999', '1500', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(31, '90000', '99999', '1600', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(32, '100000', '0', '1700', '11', '2017-07-24 08:27:27', '2017-07-24 08:27:27'),
(33, '0', '5999', '150', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(34, '6000', '7999', '300', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(35, '8000', '11999', '400', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(36, '12000', '14999', '500', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(37, '15000', '19999', '600', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(38, '20000', '24999', '750', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(39, '25000', '29999', '850', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(40, '30000', '34999', '900', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(41, '35000', '39999', '950', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(42, '40000', '44999', '1000', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(43, '45000', '49999', '1100', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(44, '50000', '59999', '1200', '12', '2017-09-12 06:41:36', '2017-09-12 06:41:36'),
(45, '70000', '79999', '1400', '12', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(46, '80000', '89999', '1500', '12', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(47, '90000', '99999', '1600', '12', '2017-09-12 06:41:37', '2017-09-12 06:41:37'),
(48, '100000', '0', '1700', '12', '2017-09-12 06:41:37', '2017-09-12 06:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `nhif_structures`
--

CREATE TABLE `nhif_structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `low` double(15,2) NOT NULL,
  `high` double(15,2) NOT NULL,
  `deduction` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhif_structures`
--

INSERT INTO `nhif_structures` (`id`, `low`, `high`, `deduction`, `created_at`, `updated_at`) VALUES
(1, 0.00, 5999.00, 150.00, NULL, NULL),
(2, 6000.00, 7999.00, 300.00, NULL, NULL),
(3, 8000.00, 11999.00, 400.00, NULL, NULL),
(4, 12000.00, 14999.00, 500.00, NULL, NULL),
(5, 15000.00, 19999.00, 600.00, NULL, NULL),
(6, 20000.00, 24999.00, 750.00, NULL, NULL),
(7, 25000.00, 29999.00, 850.00, NULL, NULL),
(8, 30000.00, 34999.00, 900.00, NULL, NULL),
(9, 35000.00, 39999.00, 950.00, NULL, NULL),
(10, 40000.00, 44999.00, 1000.00, NULL, NULL),
(11, 45000.00, 49999.00, 1100.00, NULL, NULL),
(12, 50000.00, 59999.00, 1200.00, NULL, NULL),
(13, 70000.00, 79999.00, 1400.00, NULL, NULL),
(14, 80000.00, 89999.00, 1500.00, NULL, NULL),
(15, 90000.00, 99999.00, 1600.00, NULL, NULL),
(16, 100000.00, 0.00, 1700.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nssf_structureholders`
--

CREATE TABLE `nssf_structureholders` (
  `id` int(10) UNSIGNED NOT NULL,
  `tier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `low` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `high` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `releaseid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nssf_structureholders`
--

INSERT INTO `nssf_structureholders` (`id`, `tier`, `low`, `high`, `releaseid`, `created_at`, `updated_at`) VALUES
(1, 'I', '0', '200', '10', '2017-07-24 08:10:33', '2017-07-24 08:10:33'),
(5, 'I', '0', '200', '11', NULL, NULL),
(6, 'I', '0', '200', '12', '2017-09-12 06:41:37', '2017-09-12 06:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `nssf_structures`
--

CREATE TABLE `nssf_structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `tier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `low` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `high` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nssf_structures`
--

INSERT INTO `nssf_structures` (`id`, `tier`, `low`, `high`, `created_at`, `updated_at`) VALUES
(1, 'I', '0', '200', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offboardings`
--

CREATE TABLE `offboardings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offboardings`
--

INSERT INTO `offboardings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Employee Termination', NULL, NULL),
(2, 'Disable Email Access', NULL, NULL),
(3, 'Deassign Assets', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `onboardings`
--

CREATE TABLE `onboardings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `onboardings`
--

INSERT INTO `onboardings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hire Orientation', NULL, NULL),
(2, 'Asset Assignment', NULL, NULL),
(3, 'Team Introduction', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `onboarding_reasons`
--

CREATE TABLE `onboarding_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `onboarding_reasons`
--

INSERT INTO `onboarding_reasons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Internship', NULL, NULL),
(2, 'Permanent', NULL, NULL),
(3, 'Temporary', NULL, NULL),
(4, 'Casual', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `passports`
--

CREATE TABLE `passports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issueddate` date NOT NULL,
  `renewdate` date NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `issued_by` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eligible_status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paye_structures`
--

CREATE TABLE `paye_structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `low` double(15,2) NOT NULL,
  `high` double(15,2) NOT NULL,
  `rate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paye_structures`
--

INSERT INTO `paye_structures` (`id`, `low`, `high`, `rate`, `created_at`, `updated_at`) VALUES
(1, 0.00, 11180.00, '10.00', NULL, NULL),
(2, 11181.00, 21714.00, '15.00', NULL, NULL),
(3, 21715.00, 32248.00, '20.00', NULL, NULL),
(4, 32249.00, 42782.00, '25.00', NULL, NULL),
(5, 42783.00, 0.00, '30.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paye_structure_holders`
--

CREATE TABLE `paye_structure_holders` (
  `id` int(10) UNSIGNED NOT NULL,
  `low` double(15,2) NOT NULL,
  `high` double(15,2) NOT NULL,
  `rate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `releaseid` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paye_structure_holders`
--

INSERT INTO `paye_structure_holders` (`id`, `low`, `high`, `rate`, `created_at`, `updated_at`, `releaseid`) VALUES
(1, 0.00, 11180.00, '10.00', '2017-05-25 07:21:34', '2017-05-25 07:21:34', '1'),
(2, 11181.00, 21714.00, '15.00', '2017-05-25 07:21:34', '2017-05-25 07:21:34', '1'),
(3, 21715.00, 32248.00, '20.00', '2017-05-25 07:21:34', '2017-05-25 07:21:34', '1'),
(4, 32249.00, 42782.00, '25.00', '2017-05-25 07:21:34', '2017-05-25 07:21:34', '1'),
(5, 42783.00, 0.00, '30.00', '2017-05-25 07:21:34', '2017-05-25 07:21:34', '1'),
(6, 0.00, 11180.00, '10.00', '2017-05-26 04:37:29', '2017-05-26 04:37:29', '2'),
(7, 11181.00, 21714.00, '15.00', '2017-05-26 04:37:29', '2017-05-26 04:37:29', '2'),
(8, 21715.00, 32248.00, '20.00', '2017-05-26 04:37:29', '2017-05-26 04:37:29', '2'),
(9, 32249.00, 42782.00, '25.00', '2017-05-26 04:37:29', '2017-05-26 04:37:29', '2'),
(10, 42783.00, 0.00, '30.00', '2017-05-26 04:37:29', '2017-05-26 04:37:29', '2'),
(11, 0.00, 11180.00, '10.00', '2017-05-26 06:39:24', '2017-05-26 06:39:24', '3'),
(12, 11181.00, 21714.00, '15.00', '2017-05-26 06:39:24', '2017-05-26 06:39:24', '3'),
(13, 21715.00, 32248.00, '20.00', '2017-05-26 06:39:24', '2017-05-26 06:39:24', '3'),
(14, 32249.00, 42782.00, '25.00', '2017-05-26 06:39:24', '2017-05-26 06:39:24', '3'),
(15, 42783.00, 0.00, '30.00', '2017-05-26 06:39:24', '2017-05-26 06:39:24', '3'),
(16, 0.00, 11180.00, '10.00', '2017-06-19 13:32:56', '2017-06-19 13:32:56', '4'),
(17, 11181.00, 21714.00, '15.00', '2017-06-19 13:32:56', '2017-06-19 13:32:56', '4'),
(18, 21715.00, 32248.00, '20.00', '2017-06-19 13:32:56', '2017-06-19 13:32:56', '4'),
(19, 32249.00, 42782.00, '25.00', '2017-06-19 13:32:56', '2017-06-19 13:32:56', '4'),
(20, 42783.00, 0.00, '30.00', '2017-06-19 13:32:56', '2017-06-19 13:32:56', '4'),
(21, 0.00, 11180.00, '10.00', '2017-06-19 13:33:30', '2017-06-19 13:33:30', '5'),
(22, 11181.00, 21714.00, '15.00', '2017-06-19 13:33:30', '2017-06-19 13:33:30', '5'),
(23, 21715.00, 32248.00, '20.00', '2017-06-19 13:33:30', '2017-06-19 13:33:30', '5'),
(24, 32249.00, 42782.00, '25.00', '2017-06-19 13:33:30', '2017-06-19 13:33:30', '5'),
(25, 42783.00, 0.00, '30.00', '2017-06-19 13:33:30', '2017-06-19 13:33:30', '5'),
(26, 0.00, 11180.00, '10.00', '2017-06-20 15:29:24', '2017-06-20 15:29:24', '6'),
(27, 11181.00, 21714.00, '15.00', '2017-06-20 15:29:24', '2017-06-20 15:29:24', '6'),
(28, 21715.00, 32248.00, '20.00', '2017-06-20 15:29:24', '2017-06-20 15:29:24', '6'),
(29, 32249.00, 42782.00, '25.00', '2017-06-20 15:29:24', '2017-06-20 15:29:24', '6'),
(30, 42783.00, 0.00, '30.00', '2017-06-20 15:29:24', '2017-06-20 15:29:24', '6'),
(31, 0.00, 11180.00, '10.00', '2017-07-23 04:37:26', '2017-07-23 04:37:26', '7'),
(32, 11181.00, 21714.00, '15.00', '2017-07-23 04:37:26', '2017-07-23 04:37:26', '7'),
(33, 21715.00, 32248.00, '20.00', '2017-07-23 04:37:26', '2017-07-23 04:37:26', '7'),
(34, 32249.00, 42782.00, '25.00', '2017-07-23 04:37:26', '2017-07-23 04:37:26', '7'),
(35, 42783.00, 0.00, '30.00', '2017-07-23 04:37:26', '2017-07-23 04:37:26', '7'),
(36, 0.00, 11180.00, '10.00', '2017-07-23 04:42:47', '2017-07-23 04:42:47', '8'),
(37, 11181.00, 21714.00, '15.00', '2017-07-23 04:42:47', '2017-07-23 04:42:47', '8'),
(38, 21715.00, 32248.00, '20.00', '2017-07-23 04:42:47', '2017-07-23 04:42:47', '8'),
(39, 32249.00, 42782.00, '25.00', '2017-07-23 04:42:47', '2017-07-23 04:42:47', '8'),
(40, 42783.00, 0.00, '30.00', '2017-07-23 04:42:47', '2017-07-23 04:42:47', '8'),
(41, 0.00, 11180.00, '10.00', '2017-07-24 08:03:31', '2017-07-24 08:03:31', '9'),
(42, 11181.00, 21714.00, '15.00', '2017-07-24 08:03:31', '2017-07-24 08:03:31', '9'),
(43, 21715.00, 32248.00, '20.00', '2017-07-24 08:03:31', '2017-07-24 08:03:31', '9'),
(44, 32249.00, 42782.00, '25.00', '2017-07-24 08:03:31', '2017-07-24 08:03:31', '9'),
(45, 42783.00, 0.00, '30.00', '2017-07-24 08:03:31', '2017-07-24 08:03:31', '9'),
(46, 0.00, 11180.00, '10.00', '2017-07-24 08:10:32', '2017-07-24 08:10:32', '10'),
(47, 11181.00, 21714.00, '15.00', '2017-07-24 08:10:32', '2017-07-24 08:10:32', '10'),
(48, 21715.00, 32248.00, '20.00', '2017-07-24 08:10:32', '2017-07-24 08:10:32', '10'),
(49, 32249.00, 42782.00, '25.00', '2017-07-24 08:10:32', '2017-07-24 08:10:32', '10'),
(50, 42783.00, 0.00, '30.00', '2017-07-24 08:10:32', '2017-07-24 08:10:32', '10'),
(51, 0.00, 11180.00, '10.00', '2017-07-24 08:27:26', '2017-07-24 08:27:26', '11'),
(52, 11181.00, 21714.00, '15.00', '2017-07-24 08:27:26', '2017-07-24 08:27:26', '11'),
(53, 21715.00, 32248.00, '20.00', '2017-07-24 08:27:26', '2017-07-24 08:27:26', '11'),
(54, 32249.00, 42782.00, '25.00', '2017-07-24 08:27:26', '2017-07-24 08:27:26', '11'),
(55, 42783.00, 0.00, '30.00', '2017-07-24 08:27:26', '2017-07-24 08:27:26', '11'),
(56, 0.00, 11180.00, '10.00', '2017-09-12 06:41:36', '2017-09-12 06:41:36', '12'),
(57, 11181.00, 21714.00, '15.00', '2017-09-12 06:41:36', '2017-09-12 06:41:36', '12'),
(58, 21715.00, 32248.00, '20.00', '2017-09-12 06:41:36', '2017-09-12 06:41:36', '12'),
(59, 32249.00, 42782.00, '25.00', '2017-09-12 06:41:36', '2017-09-12 06:41:36', '12'),
(60, 42783.00, 0.00, '30.00', '2017-09-12 06:41:36', '2017-09-12 06:41:36', '12');

-- --------------------------------------------------------

--
-- Table structure for table `pay_grades`
--

CREATE TABLE `pay_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_grades`
--

INSERT INTO `pay_grades` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pay Grade 1', 'Pay Grade 1', '2017-04-11 09:20:15', '2017-04-11 09:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `performance_trackers`
--

CREATE TABLE `performance_trackers` (
  `id` int(10) UNSIGNED NOT NULL,
  `trackname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'Display Role Listing', 'See only Listing Of Role', '2016-11-18 09:40:26', '2016-11-18 09:40:26'),
(2, ' role-create', 'Create Role', ' Create New Role', '2016-11-18 09:40:26', '2016-11-21 05:27:57'),
(3, 'role-edit', 'Edit Role', 'Edit Role', '2016-11-18 09:40:26', '2016-11-18 09:40:26'),
(4, 'role-delete', 'Delete Role', 'Delete Role', '2016-11-18 09:40:26', '2016-11-18 09:40:26'),
(5, 'item-list', 'Display Item Listing', 'See only Listing Of Item', '2016-11-18 09:40:26', '2016-11-18 09:40:26'),
(6, 'item-create', 'Create Item', 'Create New Item', '2016-11-18 09:40:26', '2016-11-18 09:40:26'),
(7, 'item-edit', 'Edit Item', 'Edit Item', '2016-11-18 09:40:26', '2016-11-18 09:40:26'),
(8, 'item-delete', 'Delete Item', 'Delete Item', '2016-11-18 09:40:26', '2016-11-18 09:40:26'),
(11, 'job-title', 'Job title', 'Job title', '2016-11-22 08:33:44', '2017-05-02 23:41:08'),
(12, 'job-category', 'job Category', 'job Category', '2016-11-22 08:34:20', '2017-05-02 23:41:34'),
(13, 'pay-grade', 'Pay Grade', 'Pay Grade', '2016-11-22 08:35:00', '2017-05-02 23:42:00'),
(14, 'employment-status', 'employment status', 'employment status', '2016-11-22 08:35:31', '2017-05-02 23:42:28'),
(15, 'work-shift', 'Work Shift', 'Work Shift', '2016-11-22 08:46:18', '2017-05-02 23:42:55'),
(16, 'reporting-to', 'Reporting To', 'Reporting To', '2016-11-22 08:46:41', '2017-05-02 23:43:22'),
(17, 'skills', 'Skills', 'Skills', '2016-11-22 08:55:59', '2017-05-02 23:49:24'),
(18, 'educations', 'Educations', 'Educations', '2016-11-22 08:56:19', '2017-05-02 23:51:27'),
(19, 'languages', 'Languages', 'Languages', '2016-11-22 09:04:59', '2017-05-02 23:52:00'),
(20, 'membership', 'Membership', 'Membership', '2016-11-22 09:05:22', '2017-05-02 23:52:32'),
(21, 'nationality', 'Nationality', 'Nationality', '2016-11-22 09:07:04', '2017-05-02 23:53:06'),
(22, 'category-delete', 'category delete', 'category delete', '2016-11-22 09:07:26', '2016-11-22 09:07:26'),
(23, ' benefit-add', 'Benefit add', 'Benefit add', '2016-11-22 09:08:51', '2017-05-02 23:53:51'),
(24, 'benefit-edit', 'Benefit edit', 'Benefit edit', '2016-11-22 09:09:15', '2017-05-02 23:54:27'),
(25, 'benefit-show', 'benefit show', 'Benefit show', '2016-11-22 09:09:56', '2017-05-02 23:55:01'),
(26, 'benefit-delete', 'Benefit delete', 'Benefit delete', '2016-11-22 09:11:29', '2017-05-02 23:55:34'),
(27, 'deduction-add', 'Deductions add', 'Deductions  add', '2016-11-22 09:13:59', '2017-05-02 23:56:05'),
(28, 'deduction-edit', 'Deductions edit', 'Deductions  edit', '2016-11-22 09:14:25', '2017-05-02 23:56:29'),
(29, ' deduction-show', 'Deductions show', ' Deductions  show', '2016-11-22 09:14:48', '2017-05-02 23:57:47'),
(30, 'deduction-delete', 'Deductions  delete', 'Deductions  delete', '2016-11-22 09:15:12', '2017-05-02 23:57:32'),
(31, 'location-delete', 'Locations delete', ' Locations delete', '2016-11-22 09:22:42', '2017-05-02 23:58:44'),
(32, 'location-show', 'Locations  show', 'Locations  show', '2016-11-22 09:23:09', '2017-05-02 23:59:13'),
(33, 'location-edit', 'Locations  edit', 'Locations  edit', '2016-11-22 09:23:33', '2017-05-02 23:59:33'),
(34, 'location-add', 'Locations  add', 'Locations  add', '2016-11-22 09:23:56', '2017-05-02 23:59:57'),
(35, 'Competency-delete', 'Competency-delete', 'Competency-delete', '2016-11-22 09:28:11', '2017-05-03 00:00:23'),
(36, 'Competency-show', 'Competency-show', 'Competency-show', '2016-11-22 09:29:02', '2017-05-03 00:00:36'),
(37, 'Competency-edit', 'Competency-edit', 'Competency-edit', '2016-11-22 09:29:22', '2017-05-03 00:00:52'),
(38, 'employee-delete', 'employee-delete', 'employee-delete', '2016-11-22 09:38:51', '2017-05-03 00:01:58'),
(39, 'employee-show', 'employee-show', 'employee-show', '2016-11-22 09:39:08', '2017-05-03 00:02:11'),
(40, 'employee-edit', 'employee-edit', 'employee-edit', '2016-11-22 09:39:23', '2017-05-03 00:02:26'),
(41, 'employee-add', 'employee-add', 'employee-add', '2016-11-22 09:39:39', '2017-05-03 00:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(11, 1),
(12, 1),
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
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `plan_coverages`
--

CREATE TABLE `plan_coverages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_coverages`
--

INSERT INTO `plan_coverages` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Employee', 'employee', '2017-07-06 02:23:30', '2017-07-06 02:23:30'),
(2, 'Family Only Employee not included', 'Family Only Employee not included', '2017-07-06 02:24:05', '2017-07-06 02:24:05'),
(3, 'Two Party', 'Two Party', '2017-07-06 02:24:21', '2017-07-06 02:24:21'),
(4, 'Employee + Spouse', 'Employee + Spouse', '2017-07-06 02:24:42', '2017-07-06 02:24:42'),
(5, 'Employee + Child', 'Employee + Child', '2017-07-06 02:25:03', '2017-07-06 02:46:04'),
(6, 'Employee + Children', 'Employee + Children', '2017-07-06 02:25:22', '2017-07-06 02:25:22'),
(7, 'Employee + Family', 'Employee + Family', '2017-07-06 02:40:46', '2017-07-06 02:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Low', NULL, NULL),
(2, 'Medium', NULL, NULL),
(3, 'High', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_directed_tos`
--

CREATE TABLE `question_directed_tos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_directed_tos`
--

INSERT INTO `question_directed_tos` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Candidate', NULL, NULL),
(2, 'Interviewer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_pools`
--

CREATE TABLE `question_pools` (
  `id` int(10) UNSIGNED NOT NULL,
  `competency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directedto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_pools`
--

INSERT INTO `question_pools` (`id`, `competency`, `question`, `answer`, `difficulty`, `directedto`, `created_at`, `updated_at`) VALUES
(1, '2', 'What is black-box and white-box testing?', 'Black-box testing checks if the desired outputs are produced when valid input values are given. It does not verify the actual implementation of the program', '3', '1', '2017-04-29 13:01:11', '2017-04-29 13:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_candidates`
--

CREATE TABLE `recruitment_candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationdate` date NOT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `resume` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recurrents`
--

CREATE TABLE `recurrents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recurrents`
--

INSERT INTO `recurrents` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Recurring', '', NULL, NULL),
(2, 'Non Recurrent', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'Administrator', NULL, NULL),
(2, 'owner', 'Human Reosurce Manager', 'Human Reosurce Management', NULL, '2017-05-25 16:52:13'),
(3, 'employee', 'Employee', 'Employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payfrom` date NOT NULL,
  `payto` date NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `saltype` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salper` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `jobtitle`, `employee_id`, `amount`, `payfrom`, `payto`, `active`, `created_at`, `updated_at`, `saltype`, `salper`) VALUES
(3, '3', '1', '400000', '2017-05-18', '2021-05-18', 1, '2017-05-15 04:09:16', '2017-05-23 03:50:36', '1', '3'),
(4, '3', '10', '150000', '2017-05-24', '2021-05-24', 1, '2017-05-18 06:55:17', '2017-05-18 06:55:17', '1', '3'),
(5, '3', '1', '400000', '2010-02-02', '2012-06-05', 2, '2017-05-23 09:55:50', '2017-05-23 10:09:42', '2', '3'),
(6, '3', '11', '200000', '2017-05-18', '2021-05-18', 1, '2017-05-26 06:00:30', '2017-05-26 06:00:30', '1', '3'),
(7, '3', '12', '400000', '2017-06-11', '2021-06-11', 1, '2017-06-13 15:29:42', '2017-06-13 15:29:42', '1', '3'),
(8, '3', '12', '200000', '2015-02-03', '2016-06-15', 2, '2017-06-16 14:16:29', '2017-06-16 14:16:29', '2', '3'),
(9, '3', '1', '100000', '2017-06-15', '2021-06-15', 1, '2017-06-22 09:54:43', '2017-06-22 09:54:43', '1', '3'),
(10, '5', '4', '150000', '2017-06-29', '2021-06-29', 1, '2017-07-02 04:31:28', '2017-07-02 04:31:28', '2', '3'),
(11, '5', '5', '200000', '2017-06-29', '2021-06-29', 1, '2017-07-03 03:34:56', '2017-07-03 03:34:56', '2', '3'),
(12, '5', '6', '200000', '2017-06-29', '2021-06-29', 1, '2017-07-03 03:36:56', '2017-07-03 03:36:56', '2', '3'),
(13, '5', '7', '200000', '2017-06-29', '2021-06-29', 1, '2017-07-03 03:39:14', '2017-07-03 03:39:14', '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `salary_benefits`
--

CREATE TABLE `salary_benefits` (
  `id` int(10) UNSIGNED NOT NULL,
  `planname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxrelief` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `planstart` date NOT NULL,
  `planend` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deductemployee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_benefits`
--

INSERT INTO `salary_benefits` (`id`, `planname`, `benefit`, `taxrelief`, `amount`, `planstart`, `planend`, `created_at`, `updated_at`, `description`, `deductemployee`) VALUES
(6, 'Jubilee', '2', '0', '8000', '2015-01-01', '2019-12-31', '2017-07-06 04:57:57', '2017-07-06 06:08:50', 'Jubileee', NULL),
(7, 'Dental Plan', '1', '0', '3000', '2017-01-01', '2018-12-31', '2017-07-06 06:13:46', '2017-07-09 14:30:47', 'Dental Plan', NULL),
(8, 'Plan 1', '2', '0', '6000', '2017-06-01', '2019-12-31', '2017-07-08 14:44:27', '2017-07-08 15:00:48', 'Plan 1', '1'),
(9, 'Plan 1', '2', '0', '6000', '2017-06-01', '2019-12-31', '2017-07-08 14:45:02', '2017-07-08 14:45:02', 'Plan 1', '1'),
(10, 'Plan 1', '2', '0', '6000', '2017-06-01', '2019-12-31', '2017-07-08 14:45:56', '2017-07-08 15:08:18', 'Plan 1', '1'),
(11, 'disability', '5', '0', '2000', '2016-01-01', '2017-12-31', '2017-07-08 15:10:04', '2017-07-08 15:10:04', 'disability', '0'),
(12, 'Retirement', '3', '1100', '5000', '2016-01-01', '2017-12-31', '2017-07-08 15:13:15', '2017-07-08 15:13:15', 'Retirement', '1');

-- --------------------------------------------------------

--
-- Table structure for table `salary_deductions`
--

CREATE TABLE `salary_deductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payfrom` date NOT NULL,
  `payto` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_deductions`
--

INSERT INTO `salary_deductions` (`id`, `name`, `deduction`, `employee_id`, `amount`, `payfrom`, `payto`, `created_at`, `updated_at`) VALUES
(1, 'Advances', '1', '1', '1000', '2017-04-01', '2017-06-29', '2017-04-17 06:46:41', '2017-04-17 06:46:41'),
(2, 'Loan', '1', '12', '3000', '2017-01-01', '2017-09-30', '2017-06-16 14:37:05', '2017-06-16 14:54:33'),
(3, 'Advances', '1', '7', '2000', '2017-07-01', '2017-08-31', '2017-07-08 16:06:53', '2017-07-09 14:14:13'),
(4, 'Loan', '1', '7', '2000', '2017-06-01', '2017-10-31', '2017-07-09 13:07:21', '2017-07-09 13:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `salary_postings`
--

CREATE TABLE `salary_postings` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double(30,2) NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_postings`
--

INSERT INTO `salary_postings` (`id`, `amount`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 100000.00, '3', '2017-04-27 07:15:04', '2017-04-27 07:15:04'),
(2, 100000.00, '2', '2017-04-27 07:15:04', '2017-04-27 07:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `salary_releases`
--

CREATE TABLE `salary_releases` (
  `id` int(10) UNSIGNED NOT NULL,
  `uploadid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `debit_ac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credit_ac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approved` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approvedby` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employeeid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_releases`
--

INSERT INTO `salary_releases` (`id`, `uploadid`, `debit_ac`, `credit_ac`, `amount`, `approved`, `approvedby`, `creator`, `created_at`, `updated_at`, `employeeid`, `status`) VALUES
(35, '11', '0', '0', '200000', '0', '0', '20', '2017-07-24 08:27:27', '2017-07-24 08:27:27', '7', 0),
(36, '11', '0', '0', '200000', '0', '0', '20', '2017-07-24 08:27:27', '2017-07-24 08:27:27', '6', 0),
(37, '11', '0', '0', '200000', '0', '0', '20', '2017-07-24 08:27:27', '2017-07-24 08:27:27', '5', 0),
(38, '11', '0', '0', '150000', '0', '0', '20', '2017-07-24 08:27:28', '2017-07-24 08:27:28', '4', 0),
(39, '11', '0', '0', '400000', '0', '0', '20', '2017-07-24 08:27:28', '2017-07-24 08:27:28', '1', 0),
(40, '11', '0', '0', '100000', '0', '0', '20', '2017-07-24 08:27:28', '2017-07-24 08:27:28', '1', 0),
(41, '12', '0', '0', '200000', '0', '0', '20', '2017-09-12 06:41:37', '2017-09-12 06:41:37', '7', 1),
(42, '12', '0', '0', '200000', '0', '0', '20', '2017-09-12 06:41:37', '2017-09-12 06:41:37', '6', 1),
(43, '12', '0', '0', '200000', '0', '0', '20', '2017-09-12 06:41:37', '2017-09-12 06:41:37', '5', 1),
(44, '12', '0', '0', '150000', '0', '0', '20', '2017-09-12 06:41:37', '2017-09-12 06:41:37', '4', 1),
(45, '12', '0', '0', '400000', '0', '0', '20', '2017-09-12 06:41:37', '2017-09-12 06:41:37', '1', 1),
(46, '12', '0', '0', '100000', '0', '0', '20', '2017-09-12 06:41:37', '2017-09-12 06:41:37', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_uploads`
--

CREATE TABLE `salary_uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `uploadid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `datefrom` date DEFAULT NULL,
  `dateto` date DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `processor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_uploads`
--

INSERT INTO `salary_uploads` (`id`, `uploadid`, `creator`, `created_at`, `updated_at`, `datefrom`, `dateto`, `description`, `processor`, `status`) VALUES
(1, '83ccf0d87de50e5f1b250ceee62cd6c2', '1', '2017-05-25 07:21:34', '2017-05-25 07:21:34', '2017-05-01', '2017-05-31', 'May  Salary Process', '2', 0),
(2, 'b8b1ed37cf3687b3ce7df5659f86a89d', '1', '2017-05-26 04:37:29', '2017-05-26 04:37:29', '2017-05-01', '2017-05-31', 'Salary for May', '2', 0),
(3, '532d0b0358782989da9e3621d4423ba3', '1', '2017-05-26 06:39:23', '2017-05-26 06:39:23', '2017-05-01', '2017-05-31', 'all', '2', 0),
(4, 'fcef73da102368b2514d8993ab2521ca', '1', '2017-06-19 13:32:56', '2017-06-19 13:32:56', '2017-06-01', '2017-06-30', 'June Salary', '2', 0),
(5, '906e214f0275d2847271acbbc56810ab', '1', '2017-06-19 13:33:30', '2017-06-19 13:33:30', '2017-06-01', '2017-06-30', 'June Salary', '2', 0),
(6, '5019203dacf524ea8d6556b84515dc35', '1', '2017-06-20 15:29:23', '2017-06-20 15:29:23', '2017-06-01', '2017-06-30', 'Bank Account 1110000', '2', 0),
(7, 'c5794770fee76aa0f0bed249992c29de', '20', '2017-07-23 04:37:26', '2017-07-23 04:37:26', NULL, NULL, 'Self Process Payroll', NULL, 0),
(8, 'cc494f8aed4eba80d7b843583f508f44', '20', '2017-07-23 04:42:46', '2017-07-23 04:42:46', NULL, NULL, 'Self Process Payroll', NULL, 0),
(9, '416730c98ac658601e26b826d17775c6', '20', '2017-07-24 08:03:31', '2017-07-24 08:03:31', NULL, NULL, 'Processed', NULL, 0),
(10, '9a6adfd2942db032005192f1df068e6f', '20', '2017-07-24 08:10:32', '2017-07-24 08:10:32', NULL, NULL, 'Notes', NULL, 0),
(11, '1af19eee280b90a3cc0b1d9b85867ed8', '20', '2017-07-24 08:27:26', '2017-07-24 08:27:26', NULL, NULL, 'Processed Salary', NULL, 0),
(12, '73f203e1abed0c5195c588ebaed05919', '20', '2017-09-12 06:41:36', '2017-09-12 06:41:36', NULL, NULL, 'Process the Following Employees Salary  Bank Details  Have been provided', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Accounting', 'processing and communication of financial information about economic entities', '2017-04-11 09:22:39', '2017-06-29 14:13:53'),
(2, 'Programming', 'Learn how to program drawings, animations, and games using JavaScript & ProcessingJS, or learn how to create webpages with HTML & CSS', '2017-06-29 14:15:47', '2017-06-29 14:16:28'),
(3, 'Research', 'analysis of market characteristics and trends', '2017-06-29 14:16:10', '2017-06-29 14:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `standard_tests`
--

CREATE TABLE `standard_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testoutcome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximumscore` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `starter`
--

CREATE TABLE `starter` (
  `id` int(11) NOT NULL,
  `question` text,
  `status` int(11) DEFAULT '0',
  `module` int(11) DEFAULT '1',
  `link` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `starter`
--

INSERT INTO `starter` (`id`, `question`, `status`, `module`, `link`) VALUES
(1, 'Tell us a little more about your company', 0, 1, NULL),
(2, 'Set up the Spice HRM Hiring app', 0, 1, NULL),
(3, 'Add your current employees in bulk', 0, 1, NULL),
(4, 'Set up a Time Off policy for your company', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `structures`
--

CREATE TABLE `structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `structures`
--

INSERT INTO `structures` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', 'Engineering', '2017-04-22 13:08:45', '2017-04-22 13:08:45'),
(2, 'IT', 'IT', '2017-04-22 13:09:10', '2017-04-22 13:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `subordinates`
--

CREATE TABLE `subordinates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sysprefs`
--

CREATE TABLE `sysprefs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sysprefs`
--

INSERT INTO `sysprefs` (`id`, `name`, `category`, `type`, `length`, `value`, `created_at`, `updated_at`) VALUES
(1, 'dba', 'setup.company', 'varchar', 60, 'Lunspace technologies', NULL, '2017-06-29 08:13:26'),
(2, 'legal_name', 'setup.company', 'varchar', 60, 'Lunspace technologies', NULL, '2017-06-29 08:13:26'),
(3, 'primaryadmin', 'setup.company', 'varchar', 60, 'admin@spicehr.com', NULL, '2017-06-29 08:13:26'),
(4, 'hrcontact', 'setup.company', 'varchar', 60, 'hr@spicehr.com', NULL, '2017-06-29 08:13:26'),
(5, 'legal_name', 'setup.company', 'varchar', 60, 'Lunspace technologies', NULL, '2017-06-29 08:13:26'),
(6, 'company_website', 'setup.company', 'varchar', 25, 'www.name.com', NULL, '2017-06-29 08:13:27'),
(7, 'coy_no', 'setup.company', 'varchar', 25, '123456789', NULL, NULL),
(8, 'kra_pin', 'setup.company', 'varchar', 11, 'P051395376Q', NULL, '2017-06-12 14:15:26'),
(9, 'telephone', 'setup.company', 'varchar', 11, '78943949', NULL, '2017-06-29 08:13:27'),
(10, 'postal_address', 'setup.company', 'tinytext', 0, '9818 -00200\r\nNairobi', NULL, '2017-06-29 08:13:27'),
(11, 'mobilephone', 'setup.company', 'varchar', 30, '254720311323', NULL, '2017-06-29 08:13:27'),
(12, 'fax', 'setup.company', 'varchar', 30, '', NULL, NULL),
(13, 'email', 'setup.company', 'varchar', 100, 'info@lunspace.com', NULL, NULL),
(14, 'coy_logo', 'setup.company', 'varchar', 100, '178c7744d6fc60005241b1e502d23abf.jpg', NULL, '2017-07-25 06:53:00'),
(15, 'domicile', 'setup.company', 'varchar', 55, '', NULL, NULL),
(16, 'currency', 'setup.company', 'char', 3, 'KES', NULL, '2017-06-12 14:15:26'),
(17, 'use_dimension', 'setup.company', 'tinyint', 1, '1', NULL, NULL),
(18, 'f_year', 'setup.company', 'int', 11, '10', NULL, NULL),
(19, 'no_item_list', 'setup.company', 'tinyint', 1, '0', NULL, NULL),
(20, 'no_customer_list', 'setup.company', 'tinyint', 1, '0', NULL, NULL),
(21, 'no_supplier_list', 'setup.company', 'tinyint', 1, '0', NULL, NULL),
(22, 'base_sales', 'setup.company', 'int', 11, '1', NULL, NULL),
(23, 'time_zone', 'setup.company', 'tinyint', 1, '0', NULL, NULL),
(24, 'add_pct', 'setup.company', 'int', 5, '-1', NULL, NULL),
(25, 'round_to', 'setup.company', 'int', 5, '1', NULL, NULL),
(26, 'login_tout', 'setup.company', 'smallint', 6, '600', NULL, NULL),
(27, 'past_due_days', 'glsetup.general', 'int', 11, '30', NULL, NULL),
(28, 'profit_loss_year_act', 'glsetup.general', 'varchar', 15, '9990', NULL, NULL),
(29, 'retained_earnings_act', 'glsetup.general', 'varchar', 15, '3590', NULL, NULL),
(30, 'bank_charge_act', 'glsetup.general', 'varchar', 15, '5690', NULL, NULL),
(31, 'exchange_diff_act', 'glsetup.general', 'varchar', 15, '4450', NULL, NULL),
(32, 'default_credit_limit', 'glsetup.customer', 'int', 11, '1000', NULL, NULL),
(33, 'accumulate_shipping', 'glsetup.customer', 'tinyint', 1, '0', NULL, NULL),
(34, 'legal_text', 'glsetup.customer', 'tinytext', 0, '', NULL, NULL),
(35, 'freight_act', 'glsetup.customer', 'varchar', 15, '4430', NULL, NULL),
(36, 'debtors_act', 'glsetup.sales', 'varchar', 15, '1200', NULL, NULL),
(37, 'default_sales_act', 'glsetup.sales', 'varchar', 15, '4010', NULL, NULL),
(38, 'default_sales_discount_act', 'glsetup.sales', 'varchar', 15, '4510', NULL, NULL),
(39, 'default_prompt_payment_act', 'glsetup.sales', 'varchar', 15, '4500', NULL, NULL),
(40, 'default_delivery_required', 'glsetup.sales', 'smallint', 6, '1', NULL, NULL),
(41, 'default_dim_required', 'glsetup.dims', 'int', 11, '20', NULL, NULL),
(42, 'pyt_discount_act', 'glsetup.purchase', 'varchar', 15, '5060', NULL, NULL),
(43, 'creditors_act', 'glsetup.purchase', 'varchar', 15, '2100', NULL, NULL),
(44, 'po_over_receive', 'glsetup.purchase', 'int', 11, '10', NULL, NULL),
(45, 'po_over_charge', 'glsetup.purchase', 'int', 11, '10', NULL, NULL),
(46, 'allow_negative_stock', 'glsetup.inventory', 'tinyint', 1, '0', NULL, NULL),
(47, 'default_inventory_act', 'glsetup.items', 'varchar', 15, '1510', NULL, NULL),
(48, 'default_cogs_act', 'glsetup.items', 'varchar', 15, '5010', NULL, NULL),
(49, 'default_adj_act', 'glsetup.items', 'varchar', 15, '5040', NULL, NULL),
(50, 'default_inv_sales_act', 'glsetup.items', 'varchar', 15, '4010', NULL, NULL),
(51, 'default_assembly_act', 'glsetup.items', 'varchar', 15, '1530', NULL, NULL),
(52, 'default_workorder_required', 'glsetup.manuf', 'int', 11, '20', NULL, NULL),
(53, 'version_id', 'system', 'varchar', 11, '2.3rc', NULL, NULL),
(54, 'auto_curr_reval', 'setup.company', 'smallint', 6, '1', NULL, NULL),
(55, 'grn_clearing_act', 'glsetup.purchase', 'varchar', 15, '1550', NULL, NULL),
(56, 'bcc_email', 'setup.company', 'varchar', 100, '', NULL, NULL),
(57, 'personalrelief', 'setup.company', 'int', 50, '1280', NULL, '2017-06-12 14:15:26'),
(58, 'nhifpin', 'setup.company', 'varchar', 100, '4848484848', NULL, NULL),
(59, 'nssfpin', 'setup.company', 'varchar', 100, '4848484848', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_types`
--

CREATE TABLE `task_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiedbefore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiedweeks_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxables`
--

CREATE TABLE `taxables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxables`
--

INSERT INTO `taxables` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Taxable', NULL, NULL),
(2, 'Non-Taxable', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terminationreasons`
--

CREATE TABLE `terminationreasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terminationreasons`
--

INSERT INTO `terminationreasons` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'End  of Contract', 'End  of Contract', '2017-04-11 10:16:51', '2017-04-11 10:19:11'),
(2, 'Fired ', 'Fired ', '2017-05-26 04:57:47', '2017-05-26 04:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `training_sessions`
--

CREATE TABLE `training_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `delivery_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tenant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `tenant`) VALUES
(1, 'Admin ', 'klunwebale@gmail.com', '$2y$10$hsSLr/.p2U9CaBKowyQ59OMEHQTOdDdRcX8xIqWhhotgRCMmupr8W', 'mfAgf5RXNhupajVURBcHR2EUqY1Sm1NiPVvpg7S2fRsyBnW9muHKoibpVJfW', '2016-11-17 03:40:12', '2017-06-13 08:42:43', 1),
(2, 'kennedy lun', 'kenwebale@yahoo.co.uk', '$2y$10$06Ap94F4l8.jzypMFJyKkuRSFvJ53UPLJZHTxBL/2cqP.hhm.uste', 'wlNvv2e9B32ckZ3oKXGSZXotJb7RiZSB5yyC7F4LXVdTNMXAW8Z7AQijOZTd', '2016-11-21 14:50:07', '2016-11-21 15:30:48', 1),
(3, 'klunwebale@gmail.com', 'klunwebale1@gmail.com', '$2y$10$Fb6jWI6PXlBUVbCF.DCm4.rjdUxr1RKU3A6Qu2Czkrppzri.wBCqa', NULL, '2016-11-23 03:32:39', '2016-11-23 03:32:39', 1),
(4, 'klunwebale@gmail.com', 'koskei.fredrick@yahoo.com', '$2y$10$xt0czx5mm2gPc5RyOUCHn.RE.5zvA.MrH8.kooCgrpB1/HwFLxCny', NULL, '2016-11-23 03:46:36', '2016-11-23 03:46:36', 1),
(5, 'klunwebale@gmail.com', 'koskei.fredrick2@yahoo.com', '$2y$10$NxbHgTDPJ9tscTKVKfoE.OcgDL08gCfnw746Pb/X9A289jFLgzNeK', NULL, '2016-11-23 03:47:18', '2016-11-23 03:47:18', 1),
(6, 'klunwebale@gmail.com', 'koskei.fredrick23@yahoo.com', '$2y$10$2shjTIQKzJDroRKmuQCr7.WX2eQRFAP6Nwd2EFFjl5XWGExS/9J6S', NULL, '2016-11-23 03:47:42', '2016-11-23 03:47:42', 1),
(7, '  klunwebale4@gmail.com', 'klunwebale34@gmail.com', '$2y$10$.WNKbY3OK8q..2tl./GaDea9Rtms9j3Pohp88FwMItQvITxYJgYBa', NULL, '2016-11-28 00:43:49', '2016-11-28 01:54:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(10) UNSIGNED NOT NULL,
  `vacancy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hiringmanager` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_positions` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_templates`
--

CREATE TABLE `vacancy_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `templatename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hiringmanager` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_positions` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vacancy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Days', NULL, NULL),
(2, 'Weeks', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_shifts`
--

CREATE TABLE `work_shifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_shifts`
--

INSERT INTO `work_shifts` (`id`, `name`, `starttime`, `endtime`, `created_at`, `updated_at`) VALUES
(1, 'General', '00:15:00', '00:15:00', '2017-04-11 15:17:18', '2017-04-11 15:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `work_weeks`
--

CREATE TABLE `work_weeks` (
  `id` int(10) UNSIGNED NOT NULL,
  `monday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tuesday` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `wednesday` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thursday` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friday` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saturday` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunday` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_weeks`
--

INSERT INTO `work_weeks` (`id`, `monday`, `tuesday`, `created_at`, `updated_at`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(1, '1', '1', '2017-04-30 06:15:03', '2017-04-30 06:15:03', '1', '1', '1', '3', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accrual_settings`
--
ALTER TABLE `accrual_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `active_settings`
--
ALTER TABLE `active_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appraisal_cycles`
--
ALTER TABLE `appraisal_cycles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_categories`
--
ALTER TABLE `asset_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_vendors`
--
ALTER TABLE `asset_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_leaves`
--
ALTER TABLE `assign_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits_plan_coverages`
--
ALTER TABLE `benefits_plan_coverages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_groups`
--
ALTER TABLE `benefit_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_group_employees`
--
ALTER TABLE `benefit_group_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_holders`
--
ALTER TABLE `benefit_holders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cary_over_settings`
--
ALTER TABLE `cary_over_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competencies`
--
ALTER TABLE `competencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_settings`
--
ALTER TABLE `day_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_states`
--
ALTER TABLE `day_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_holders`
--
ALTER TABLE `deduction_holders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dependents`
--
ALTER TABLE `dependents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `difficulties`
--
ALTER TABLE `difficulties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplinaries`
--
ALTER TABLE `disciplinaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_folders`
--
ALTER TABLE `doc_folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_reportings`
--
ALTER TABLE `employee_reportings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_pay_rates`
--
ALTER TABLE `employee_salary_pay_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_types`
--
ALTER TABLE `employee_salary_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_taskings`
--
ALTER TABLE `employee_taskings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_statuses`
--
ALTER TABLE `employment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empskills`
--
ALTER TABLE `empskills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_bank_infos`
--
ALTER TABLE `emp_bank_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_contact_details`
--
ALTER TABLE `emp_contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_educations`
--
ALTER TABLE `emp_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_emergency_contact_details`
--
ALTER TABLE `emp_emergency_contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_job_details`
--
ALTER TABLE `emp_job_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_languages`
--
ALTER TABLE `emp_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_report_tos`
--
ALTER TABLE `emp_report_tos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_social_details`
--
ALTER TABLE `emp_social_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_work_experiences`
--
ALTER TABLE `emp_work_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_accruals`
--
ALTER TABLE `first_accruals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hour_policies`
--
ALTER TABLE `hour_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_outcomes`
--
ALTER TABLE `interview_outcomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_templates`
--
ALTER TABLE `interview_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_fluency_levels`
--
ALTER TABLE `language_fluency_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_skills`
--
ALTER TABLE `language_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_durations`
--
ALTER TABLE `leave_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_earneds`
--
ALTER TABLE `leave_earneds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_policies`
--
ALTER TABLE `leave_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhif_structureholders`
--
ALTER TABLE `nhif_structureholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhif_structures`
--
ALTER TABLE `nhif_structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nssf_structureholders`
--
ALTER TABLE `nssf_structureholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nssf_structures`
--
ALTER TABLE `nssf_structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offboardings`
--
ALTER TABLE `offboardings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onboardings`
--
ALTER TABLE `onboardings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onboarding_reasons`
--
ALTER TABLE `onboarding_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passports`
--
ALTER TABLE `passports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `paye_structures`
--
ALTER TABLE `paye_structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paye_structure_holders`
--
ALTER TABLE `paye_structure_holders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_grades`
--
ALTER TABLE `pay_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_trackers`
--
ALTER TABLE `performance_trackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `plan_coverages`
--
ALTER TABLE `plan_coverages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_directed_tos`
--
ALTER TABLE `question_directed_tos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_pools`
--
ALTER TABLE `question_pools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment_candidates`
--
ALTER TABLE `recruitment_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recurrents`
--
ALTER TABLE `recurrents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_benefits`
--
ALTER TABLE `salary_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_postings`
--
ALTER TABLE `salary_postings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_releases`
--
ALTER TABLE `salary_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_uploads`
--
ALTER TABLE `salary_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_tests`
--
ALTER TABLE `standard_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starter`
--
ALTER TABLE `starter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subordinates`
--
ALTER TABLE `subordinates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sysprefs`
--
ALTER TABLE `sysprefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_types`
--
ALTER TABLE `task_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxables`
--
ALTER TABLE `taxables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminationreasons`
--
ALTER TABLE `terminationreasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_sessions`
--
ALTER TABLE `training_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancy_templates`
--
ALTER TABLE `vacancy_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_shifts`
--
ALTER TABLE `work_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_weeks`
--
ALTER TABLE `work_weeks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accrual_settings`
--
ALTER TABLE `accrual_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `active_settings`
--
ALTER TABLE `active_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `appraisal_cycles`
--
ALTER TABLE `appraisal_cycles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `asset_categories`
--
ALTER TABLE `asset_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `asset_vendors`
--
ALTER TABLE `asset_vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assign_leaves`
--
ALTER TABLE `assign_leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `benefits_plan_coverages`
--
ALTER TABLE `benefits_plan_coverages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `benefit_groups`
--
ALTER TABLE `benefit_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `benefit_group_employees`
--
ALTER TABLE `benefit_group_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `benefit_holders`
--
ALTER TABLE `benefit_holders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cary_over_settings`
--
ALTER TABLE `cary_over_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `competencies`
--
ALTER TABLE `competencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `day_settings`
--
ALTER TABLE `day_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `day_states`
--
ALTER TABLE `day_states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deduction_holders`
--
ALTER TABLE `deduction_holders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dependents`
--
ALTER TABLE `dependents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `difficulties`
--
ALTER TABLE `difficulties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `disciplinaries`
--
ALTER TABLE `disciplinaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doc_folders`
--
ALTER TABLE `doc_folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_reportings`
--
ALTER TABLE `employee_reportings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_salary_pay_rates`
--
ALTER TABLE `employee_salary_pay_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_salary_types`
--
ALTER TABLE `employee_salary_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_taskings`
--
ALTER TABLE `employee_taskings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employment_statuses`
--
ALTER TABLE `employment_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empskills`
--
ALTER TABLE `empskills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `emp_bank_infos`
--
ALTER TABLE `emp_bank_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `emp_contact_details`
--
ALTER TABLE `emp_contact_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emp_educations`
--
ALTER TABLE `emp_educations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emp_emergency_contact_details`
--
ALTER TABLE `emp_emergency_contact_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `emp_job_details`
--
ALTER TABLE `emp_job_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `emp_languages`
--
ALTER TABLE `emp_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emp_report_tos`
--
ALTER TABLE `emp_report_tos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emp_social_details`
--
ALTER TABLE `emp_social_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emp_work_experiences`
--
ALTER TABLE `emp_work_experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `first_accruals`
--
ALTER TABLE `first_accruals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hour_policies`
--
ALTER TABLE `hour_policies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interview_outcomes`
--
ALTER TABLE `interview_outcomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `interview_templates`
--
ALTER TABLE `interview_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `language_fluency_levels`
--
ALTER TABLE `language_fluency_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `language_skills`
--
ALTER TABLE `language_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_durations`
--
ALTER TABLE `leave_durations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_earneds`
--
ALTER TABLE `leave_earneds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_policies`
--
ALTER TABLE `leave_policies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `nhif_structureholders`
--
ALTER TABLE `nhif_structureholders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `nhif_structures`
--
ALTER TABLE `nhif_structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `nssf_structureholders`
--
ALTER TABLE `nssf_structureholders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nssf_structures`
--
ALTER TABLE `nssf_structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offboardings`
--
ALTER TABLE `offboardings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `onboardings`
--
ALTER TABLE `onboardings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `onboarding_reasons`
--
ALTER TABLE `onboarding_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `passports`
--
ALTER TABLE `passports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paye_structures`
--
ALTER TABLE `paye_structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paye_structure_holders`
--
ALTER TABLE `paye_structure_holders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `pay_grades`
--
ALTER TABLE `pay_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `performance_trackers`
--
ALTER TABLE `performance_trackers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `plan_coverages`
--
ALTER TABLE `plan_coverages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question_directed_tos`
--
ALTER TABLE `question_directed_tos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question_pools`
--
ALTER TABLE `question_pools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recruitment_candidates`
--
ALTER TABLE `recruitment_candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recurrents`
--
ALTER TABLE `recurrents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `salary_benefits`
--
ALTER TABLE `salary_benefits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salary_postings`
--
ALTER TABLE `salary_postings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `salary_releases`
--
ALTER TABLE `salary_releases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `salary_uploads`
--
ALTER TABLE `salary_uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `standard_tests`
--
ALTER TABLE `standard_tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `starter`
--
ALTER TABLE `starter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `structures`
--
ALTER TABLE `structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subordinates`
--
ALTER TABLE `subordinates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sysprefs`
--
ALTER TABLE `sysprefs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `task_types`
--
ALTER TABLE `task_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taxables`
--
ALTER TABLE `taxables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `terminationreasons`
--
ALTER TABLE `terminationreasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `training_sessions`
--
ALTER TABLE `training_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vacancy_templates`
--
ALTER TABLE `vacancy_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `work_shifts`
--
ALTER TABLE `work_shifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `work_weeks`
--
ALTER TABLE `work_weeks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
