-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 12:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funolympic`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `alid` int(11) NOT NULL,
  `activity` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`alid`, `activity`, `date`, `country`, `ip_address`) VALUES
(165, '<strong>sachink</strong> logged out.', '28-09-2022', 'Croatia', '78.1.204.132'),
(166, 'Admin logged in as <strong>sachin</strong>', '28-09-2022', 'United Kingdom', '31.67.30.53'),
(167, 'Admin logged in as <strong>sachin</strong>', '28-09-2022', 'Pakistan', '39.35.11.21'),
(168, 'Live video <strong>Pakistan vs England 5th T20 Live Scores</strong> added', '28-09-2022', 'Pakistan', '39.35.11.21'),
(169, 'Live video <strong>Pakistan vs England 5th T20 Live Scores</strong> updated', '29-09-2022', 'Pakistan', '39.35.11.21'),
(170, 'Live video <strong>Pakistan vs England 5th T20 Live Scores</strong> updated', '29-09-2022', 'Pakistan', '39.35.11.21'),
(171, 'Live video <strong>THIEM vs CILIC | Tel Aviv Open 2022</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(172, 'Live video <strong>LIVE BUCS SUPER RUGBY | Durham vs Loughborough</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(173, 'Live video <strong>Pakistan vs England 5th T20 Live Scores</strong> deleted', '29-09-2022', 'Pakistan', '39.35.11.21'),
(174, 'News <strong>All Assam Major Ranking Table Tennis tournament in Golaghat District</strong> updated', '29-09-2022', 'Pakistan', '39.35.11.21'),
(175, 'News <strong>All Assam Major Ranking Table Tennis tournament in Golaghat District</strong> updated', '29-09-2022', 'Pakistan', '39.35.11.21'),
(176, 'News <strong>Vermont’s archery deer season starts Oct. 1</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(177, 'News <strong>Women SAFF hit by India football suspension</strong> deleted', '29-09-2022', 'Pakistan', '39.35.11.21'),
(178, 'News <strong>UNC Basketball: Could the Tar Heels land Bronny James?</strong> deleted', '29-09-2022', 'Pakistan', '39.35.11.21'),
(179, 'News <strong>Former captain Gyanendra Malla recalled to national cricket squad</strong> deleted', '29-09-2022', 'Pakistan', '39.35.11.21'),
(180, 'News <strong>Lamichhane nominated in Big Bash League draft</strong> deleted', '29-09-2022', 'Pakistan', '39.35.11.21'),
(181, 'News <strong>Moeen Ali heroics in vain as Pakistan take series lead over England</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(182, 'News <strong>Quaid-e-Azam Trophy Round 1, Day 2: Abdullah Shafique smashes maiden double-century</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(183, 'Fixture <strong>afghanistan - algeria</strong> deleted', '29-09-2022', 'Pakistan', '39.35.11.21'),
(184, 'Fixture <strong>Indian Premier League</strong> updated', '29-09-2022', 'Pakistan', '39.35.11.21'),
(185, 'Fixture <strong>Brazil vs Germany</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(186, 'Category <strong>Weight Lifting</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(187, 'Category <strong>Volleyball</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(188, 'Video <strong>Top teams hold serve in latest Michigan high school volleyball rankings</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(189, 'Video <strong>Top teams hold serve in latest Michigan high school volleyball rankings</strong> updated', '29-09-2022', 'Pakistan', '39.35.11.21'),
(190, 'Video <strong>Top teams hold serve in latest Michigan high school volleyball rankings</strong> updated', '29-09-2022', 'Pakistan', '39.35.11.21'),
(191, 'Video <strong>Table tennis: Revenge on S\\\'pore\\\'s mind in rematch with Thailand at World C\\\'ships</strong> added', '29-09-2022', 'Pakistan', '39.35.11.21'),
(192, 'Video <strong>Top teams hold serve in latest Michigan high school volleyball rankings</strong> deleted', '29-09-2022', 'Pakistan', '39.35.11.21'),
(193, '<strong>sachin</strong> logged out.', '29-09-2022', 'Pakistan', '39.35.11.21'),
(194, 'Admin logged in as <strong>sachin</strong>', '29-09-2022', 'Japan', '160.195.54.2'),
(195, 'Admin logged in as <strong>sachin</strong>', '29-09-2022', 'United States', '205.178.176.171'),
(196, 'News <strong>Quaid-e-Azam Trophy Round 1, Day 2: Abdullah Shafique smashes maiden double-century</strong> updated', '29-09-2022', 'Nepal', '101.251.4.0'),
(197, 'Photo <strong>Moeen Ali heroics in vain as Pakistan take series lead over England</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(198, 'Photo <strong>Quaid-e-Azam Trophy Round 1, Day 2: Abdullah Shafique smashes maiden double-century</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(199, '<strong>sachin</strong> logged out.', '29-09-2022', 'Nepal', '101.251.4.0'),
(200, 'Admin logged in as <strong>sachin</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(201, 'Password link sent to <strong>sachin.khatri@es.cloudfactory.com</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(202, '<strong>sachin</strong> logged out.', '29-09-2022', 'Nepal', '101.251.4.0'),
(203, 'Admin logged in as <strong>sachin</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(204, 'Password link sent to <strong>sachin.khatri@es.cloudfactory.com</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(205, 'User logged in as <strong>sachink</strong>', '29-09-2022', 'Nepal', '237.248.178.141'),
(206, 'User logged in as <strong>sachink</strong>', '29-09-2022', 'Japan', '120.75.173.79'),
(207, '<strong>sachink</strong> logged out.', '29-09-2022', 'Japan', '120.75.173.79'),
(208, '<strong>sachin</strong> logged out.', '29-09-2022', 'Nepal', '101.251.4.0'),
(209, 'Admin logged in as <strong>sachin</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(210, 'User logged in as <strong>jenish</strong>', '29-09-2022', 'United States', '129.134.120.96'),
(211, 'Video <strong>5-year-old boy, exchanging badminton playing skills with Swiss team</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(212, 'Video <strong>Badminton training for beginners kids DAY 3</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(213, 'Video <strong>First training Indonesia</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(214, 'Removed from favorite videos by <strong>jenish</strong>', '29-09-2022', 'United States', '129.134.120.96'),
(215, 'Added to favorite videos by <strong>jenish</strong>', '29-09-2022', 'United States', '129.134.120.96'),
(216, 'Added to favorite videos by <strong>sachin</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(217, '<strong>sachin</strong> logged out.', '29-09-2022', 'Nepal', '101.251.4.0'),
(218, 'Admin logged in as <strong>sachin</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(219, 'Admin logged in as <strong>sachin</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(220, '<strong>jenish</strong> logged out.', '29-09-2022', 'United States', '129.134.120.96'),
(221, 'Registration confirmation link sent to <strong>sachinkhatri@ismt.edu.np</strong>', '29-09-2022', 'Japan', '221.190.32.250'),
(222, 'Registration for <strong>sachinkhatri@ismt.edu.np</strong> completed', '29-09-2022', 'Japan', '221.190.32.250'),
(223, 'User logged in as <strong>sachinkhatri</strong>', '29-09-2022', 'United States', '152.119.128.83'),
(224, '<strong>sachinkhatri</strong> logged out.', '29-09-2022', 'United States', '152.119.128.83'),
(225, 'User logged in as <strong>sachinkhatri</strong>', '29-09-2022', 'United States', '205.103.46.147'),
(226, 'User logged in as <strong>sachinkhatri</strong>', '29-09-2022', 'United Kingdom', '31.124.51.140'),
(227, 'New comment added by <strong>sachinkhatri</strong>', '29-09-2022', 'United Kingdom', '31.124.51.140'),
(228, 'New comment added by <strong>sachinkhatri</strong>', '29-09-2022', 'United Kingdom', '31.124.51.140'),
(229, '<strong>sachinkhatri</strong> searched for <strong>football</strong>', '29-09-2022', 'United Kingdom', '31.124.51.140'),
(230, '<strong>sachinkhatri</strong> searched for <strong>badminton</strong>', '29-09-2022', 'United Kingdom', '31.124.51.140'),
(231, '<strong>sachinkhatri</strong> searched for <strong>badminton</strong>', '29-09-2022', 'United Kingdom', '31.124.51.140'),
(232, '<strong>sachinkhatri</strong> logged out.', '29-09-2022', 'United Kingdom', '31.124.51.140'),
(233, 'Password link sent to <strong>sachinkhatri@ismt.edu.np</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(234, 'User logged in as <strong>sachinkhatri</strong>', '29-09-2022', 'Ghana', '196.50.29.143'),
(235, '<strong>Sachin Khatri</strong> sent an email', '29-09-2022', 'Ghana', '196.50.29.143'),
(236, '<strong>sachinkhatri</strong> changed password', '29-09-2022', 'Ghana', '196.50.29.143'),
(237, '<strong>sachinkhatri</strong> logged out.', '29-09-2022', 'Ghana', '196.50.29.143'),
(238, 'User logged in as <strong>sachinkhatri</strong>', '29-09-2022', 'Sweden', '130.243.117.104'),
(239, 'User logged in as <strong>sachinkhatri</strong>', '29-09-2022', 'United States', '20.220.199.86'),
(240, '<strong>sachin</strong> logged out.', '29-09-2022', 'Nepal', '101.251.4.0'),
(241, 'Admin logged in as <strong>sachink</strong>', '29-09-2022', 'Nepal', '101.251.4.0'),
(242, 'Live video <strong>Live Video</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(243, 'Category <strong>Tug of War</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(244, 'News <strong>Brian Burns on Panthers\\\' dominance of Cardinals: \\\'It means something\\\'</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(245, 'Fixture <strong>Mens Weight Lifting</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(246, 'Video <strong>Football Highlights</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(247, 'Photo <strong>eastern elite vs western elite</strong> added', '29-09-2022', 'Nepal', '101.251.4.0'),
(248, 'Video <strong>Table tennis: Revenge on S\\</strong> deleted', '29-09-2022', 'Nepal', '101.251.4.0'),
(249, '<strong>sachinkhatri</strong> logged out.', '29-09-2022', 'United States', '20.220.199.86'),
(250, 'User logged in as <strong>jenish</strong>', '29-09-2022', 'China', '113.218.54.54'),
(251, 'User logged in as <strong>jenish</strong>', '29-09-2022', 'Nepal', '0.81.136.150'),
(252, 'Added to favorite videos by <strong>jenish</strong>', '29-09-2022', 'Nepal', '0.81.136.150'),
(253, 'Removed from favorite videos by <strong>jenish</strong>', '29-09-2022', 'Nepal', '0.81.136.150'),
(254, 'User <strong>jenish</strong> deactivated', '29-09-2022', 'Nepal', '101.251.4.0'),
(255, '<strong>jenish</strong> logged out.', '29-09-2022', 'Nepal', '0.81.136.150'),
(256, 'User logged in as <strong>bishal</strong>', '29-09-2022', 'United States', '215.46.76.114'),
(257, 'User logged in as <strong>bishal</strong>', '29-09-2022', 'Nepal', '237.5.81.217'),
(258, 'Admin logged in as <strong>sachink</strong>', '04-10-2022', 'Nepal', '101.251.4.0'),
(259, 'Admin logged in as <strong>sachink</strong>', '10-10-2022', 'Nepal', '101.251.4.0'),
(260, 'Comment on <strong></strong> deleted', '10-10-2022', 'Nepal', '101.251.4.0'),
(261, 'Comment on <strong></strong> deleted', '10-10-2022', 'Nepal', '101.251.4.0'),
(262, 'Registration confirmation link sent to <strong>sachinkhatri@ismt.edu.np</strong>', '12-10-2022', 'China', '219.225.225.70'),
(263, 'Registration for <strong>sachinkhatri@ismt.edu.np</strong> completed', '12-10-2022', 'China', '219.225.225.70'),
(264, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(265, '<strong>sachink</strong> logged out.', '12-10-2022', 'Nepal', '101.251.4.0'),
(266, 'User logged in as <strong>sachin</strong>', '12-10-2022', 'United States', '69.98.159.50'),
(267, '<strong>sachin</strong> logged out.', '12-10-2022', 'United States', '69.98.159.50'),
(268, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(269, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(270, 'Category <strong>Gymnastics</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(271, 'Category <strong>Gymnastics</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(272, 'Category <strong>Gymnastics</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(273, 'Category <strong>Gymnastics</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(274, 'Category <strong>Gymnastics</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(275, 'Video <strong>5 Goals in 9 Minutes – The Legendary Lewandowski Show ｜ Bayern München vs. VfL Wolfsburg</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(276, 'Video <strong>5 Goals in 9 Minutes – The Legendary Lewandowski Show</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(277, 'Video <strong>5 Goals in 9 Minutes – The Legendary Lewandowski Show</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(278, 'Live video <strong>National Games 2022, Day 13 | Doordarshan Sports</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(279, 'Live video <strong>THIEM vs CILIC | Tel Aviv Open</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(280, 'Live video <strong>THIEM vs CILIC | Tel Aviv Open</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(281, 'News <strong>Charlton halted an eight-game winless run in League One in emphatic style as they defeated Exeter 4-2 at The Valley</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(282, 'News <strong>Vermont’s archery deer season starts</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(283, 'News <strong>Vermont’s archery deer season starts</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(284, 'Photo <strong>FIFA Half Time Duration</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(285, 'Photo <strong>Unfortunately Moeen Ali heroics in vain as Pakistan take series lead over England</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(286, 'Photo <strong>FIFA Half Time Duration</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(287, 'Fixture <strong>Men\\\'s weight lifting 50kg</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(288, 'Fixture <strong>Open Archery</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(289, 'Fixture <strong>Indian Premier League</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(290, '<strong>sachink</strong> logged out.', '12-10-2022', 'Nepal', '101.251.4.0'),
(291, 'User logged in as <strong>bishal</strong>', '12-10-2022', 'China', '36.195.165.198'),
(292, 'User logged in as <strong>bishal</strong>', '12-10-2022', 'Nepal', '246.217.133.113'),
(293, '<strong>bishal</strong> logged out.', '12-10-2022', 'Nepal', '246.217.133.113'),
(294, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(295, 'Registration confirmation link sent to <strong>sachinkhatri53@gmail.com</strong>', '12-10-2022', 'Austria', '185.119.46.47'),
(296, 'Registration for <strong>sachinkhatri53@gmail.com</strong> completed', '12-10-2022', 'Austria', '185.119.46.47'),
(297, 'Password link sent to <strong>sachinkhatri53@gmail.com</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(298, 'User logged in as <strong>sachinkhatri</strong>', '12-10-2022', 'United States', '162.111.29.152'),
(299, '<strong>Sabin Khatri</strong> sent an email', '12-10-2022', 'United States', '162.111.29.152'),
(300, 'Email from <strong>Sachin Khatri</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(301, 'User <strong>rabin</strong> deactivated', '12-10-2022', 'Nepal', '101.251.4.0'),
(302, 'New comment added by <strong>sachinkhatri</strong>', '12-10-2022', 'United States', '162.111.29.152'),
(303, '<strong>sachinkhatri</strong> logged out.', '12-10-2022', 'United States', '162.111.29.152'),
(304, 'User logged in as <strong>bishal</strong>', '12-10-2022', 'United States', '147.241.48.31'),
(305, 'New comment added by <strong>bishal</strong>', '12-10-2022', 'United States', '147.241.48.31'),
(306, 'New comment added by <strong>bishal</strong>', '12-10-2022', 'United States', '147.241.48.31'),
(307, '<strong>bishal</strong> logged out.', '12-10-2022', 'United States', '147.241.48.31'),
(308, 'User logged in as <strong>sachinkhatri</strong>', '12-10-2022', 'United States', '215.86.211.181'),
(309, 'User logged in as <strong>sachinkhatri</strong>', '12-10-2022', 'Italy', '87.19.109.123'),
(310, 'New comment added by <strong>sachinkhatri</strong>', '12-10-2022', 'Italy', '87.19.109.123'),
(311, '<strong>sachink</strong> logged out.', '12-10-2022', 'Nepal', '101.251.4.0'),
(312, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(313, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(314, '<strong>sachink</strong> logged out.', '12-10-2022', 'Nepal', '101.251.4.0'),
(315, 'User logged in as <strong>sachin</strong>', '12-10-2022', 'Malta', '141.8.91.20'),
(316, 'User logged in as <strong>sachin</strong>', '12-10-2022', 'United States', '6.225.229.138'),
(317, 'New comment added by <strong>sachin</strong>', '12-10-2022', 'United States', '6.225.229.138'),
(318, '<strong>sachin</strong> searched for <strong>badminton</strong>', '12-10-2022', 'United States', '6.225.229.138'),
(319, 'Added to favorite videos by <strong>sachin</strong>', '12-10-2022', 'United States', '6.225.229.138'),
(320, '<strong>sachinkhatri</strong> logged out.', '12-10-2022', 'Italy', '87.19.109.123'),
(321, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(322, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(323, 'Photo <strong>eastern elite vs western elite</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(324, 'Photo <strong>Quaid-e-Azam Trophy Round 1, Day 2: Abdullah Shafique smashes maiden double-century</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(325, '<strong>Jenish Dahal</strong> sent an email', '12-10-2022', 'United States', '6.225.229.138'),
(326, '<strong>sachin</strong> updated profile picture', '12-10-2022', 'United States', '6.225.229.138'),
(327, '<strong>sachin</strong> changed password', '12-10-2022', 'United States', '6.225.229.138'),
(328, '<strong>sachin</strong> logged out.', '12-10-2022', 'United States', '6.225.229.138'),
(329, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(330, '<strong>sachink</strong> logged out.', '12-10-2022', 'Nepal', '101.251.4.0'),
(331, 'Registration confirmation link sent to <strong>sachinkhatri@ismt.edu.np</strong>', '12-10-2022', 'United States', '96.62.198.242'),
(332, 'Registration for <strong>sachinkhatri@ismt.edu.np</strong> completed', '12-10-2022', 'United States', '96.62.198.242'),
(333, 'User logged in as <strong>sachinkhatri53</strong>', '12-10-2022', 'Sweden', '213.65.129.44'),
(334, '<strong>sachinkhatri53</strong> logged out.', '12-10-2022', 'Sweden', '213.65.129.44'),
(335, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(336, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(337, 'Category <strong>Wrestling</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(338, 'Category <strong>Tug of War</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(339, 'Category <strong>Wrestling</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(340, 'Live video <strong>A SPOR CANLI YAYINI</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(341, 'Live video <strong>A SPOR CANLI YAYINI test</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(342, 'Video <strong>Weight lifting men</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(343, 'Video <strong>Weight lifting men test</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(344, 'Video <strong>Weight lifting men test</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(345, '<strong>sachink</strong> logged out.', '12-10-2022', 'Nepal', '101.251.4.0'),
(346, 'Registration confirmation link sent to <strong>sachinkhatri@ismt.edu.np</strong>', '12-10-2022', 'United States', '13.174.15.120'),
(347, 'Registration for <strong>sachinkhatri@ismt.edu.np</strong> completed', '12-10-2022', 'United States', '13.174.15.120'),
(348, 'User logged in as <strong>sachinkhatri53</strong>', '12-10-2022', 'Finland', '87.95.16.73'),
(349, '<strong>sachinkhatri53</strong> logged out.', '12-10-2022', 'Finland', '87.95.16.73'),
(350, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(351, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(352, 'Category <strong>Gymnastics</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(353, 'Category <strong>Gymnastics</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(354, 'Live video <strong>A SPOR CANLI YAYINI</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(355, 'Live video <strong>A SPOR CANLI YAYINI test</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(356, 'Live video <strong>A SPOR CANLI YAYINI test</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(357, 'Video <strong>men\\\'s weight lifting</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(358, 'Video <strong>men\\\\\\\'s weight lifting test</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(359, 'Video <strong>Football Highlights</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(360, 'News <strong>UNC Basketball: Could the Tar Heels land Bronny James?</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(361, 'News <strong>UNC Basketball: Could the Tar Heels land Bronny James? test</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(362, 'News <strong>UNC Basketball: Could the Tar Heels land Bronny James? test</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(363, 'Fixture <strong>Football U-19 Men</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(364, 'Fixture <strong>Football U-19 Men test</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(365, 'Fixture <strong>Football U-19 Men test</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(366, 'Photo <strong>Nepal vs Brazil</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(367, 'Photo <strong>eastern elite vs western elite test</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(368, 'Photo <strong>Nepal vs Brazil</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(369, 'Comment on <strong>Badminton training for beginners kids DAY 3</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(370, 'User <strong>rabin</strong> activated', '12-10-2022', 'Nepal', '101.251.4.0'),
(371, 'Email from <strong>Jenish Dahal</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(372, '<strong>sachink</strong> logged out.', '12-10-2022', 'Nepal', '101.251.4.0'),
(373, 'User logged in as <strong>sachinkhatri53</strong>', '12-10-2022', 'Spain', '213.27.240.180'),
(374, 'User logged in as <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(375, 'New comment added by <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(376, 'New comment added by <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(377, 'Added to favorite videos by <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(378, 'New comment added by <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(379, '<strong>sachinkhatri53</strong> searched for <strong>brazil</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(380, '<strong>sachinkhatri53</strong> searched for <strong>cricket</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(381, '<strong>sachinkhatri53</strong> searched for <strong>lorem</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(382, '<strong>sachinkhatri53</strong> searched for <strong>badminton</strong>', '12-10-2022', 'United States', '50.26.209.152'),
(383, '<strong>sachin khatri</strong> sent an email', '12-10-2022', 'United States', '50.26.209.152'),
(384, '<strong>sachinkhatri53</strong> updated profile picture', '12-10-2022', 'United States', '50.26.209.152'),
(385, '<strong>sachinkhatri53</strong> changed password', '12-10-2022', 'United States', '50.26.209.152'),
(386, '<strong>sachinkhatri53</strong> logged out.', '12-10-2022', 'United States', '50.26.209.152'),
(387, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(388, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(389, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(390, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(391, 'Password link sent to <strong>sachinkhatri@ismt.edu.np</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(392, 'User logged in as <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '160.151.179.64'),
(393, 'Registration confirmation link sent to <strong>sachinkhatri@ismt.edu.np</strong>', '12-10-2022', 'China', '180.203.195.195'),
(394, 'Registration for <strong>sachinkhatri@ismt.edu.np</strong> completed', '12-10-2022', 'China', '180.203.195.195'),
(395, 'User logged in as <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '164.244.134.139'),
(396, '<strong>sachinkhatri53</strong> logged out.', '12-10-2022', 'United States', '164.244.134.139'),
(397, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(398, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(399, 'Category <strong>Gymnastics</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(400, 'Category <strong>Gymnastics</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(401, 'Live video <strong>A SPOR CANLI YAYINI</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(402, 'Live video <strong>Live Video</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(403, 'Live video <strong>A SPOR CANLI YAYINI test</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(404, 'Video <strong>cricket women</strong> added', '12-10-2022', 'Nepal', '101.251.4.0'),
(405, 'Video <strong>men\\\\\\\'s weight lifting test tes</strong> updated', '12-10-2022', 'Nepal', '101.251.4.0'),
(406, 'Video <strong>cricket women</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(407, 'Photo <strong>eastern elite vs western elite test</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(408, 'News <strong>Quaid-e-Azam Trophy Round 1, Day 2: Abdullah Shafique smashes maiden double-century</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(409, 'Fixture <strong>Basketball</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(410, 'Comment on <strong>First training Indonesia</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(411, 'User <strong>jenish</strong> activated', '12-10-2022', 'Nepal', '101.251.4.0'),
(412, 'User <strong>jenish</strong> deactivated', '12-10-2022', 'Nepal', '101.251.4.0'),
(413, 'Email from <strong>sachin khatri</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(414, 'Email from <strong>Sabin Khatri</strong> deleted', '12-10-2022', 'Nepal', '101.251.4.0'),
(415, 'Password link sent to <strong>jenish@gmail.com</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(416, '<strong>sachink</strong> logged out.', '12-10-2022', 'Nepal', '101.251.4.0'),
(417, '<strong>sachinkhatri53</strong> logged out.', '12-10-2022', 'United States', '160.151.179.64'),
(418, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(419, 'Password link sent to <strong>sachinkhatri@ismt.edu.np</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(420, 'User logged in as <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '32.38.81.87'),
(421, 'User logged in as <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '216.116.96.223'),
(422, 'New comment added by <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '216.116.96.223'),
(423, 'New comment added by <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '216.116.96.223'),
(424, 'Added to favorite videos by <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '216.116.96.223'),
(425, 'New comment added by <strong>sachinkhatri53</strong>', '12-10-2022', 'United States', '216.116.96.223'),
(426, '<strong>sachinkhatri53</strong> searched for <strong>cricket</strong>', '12-10-2022', 'United States', '216.116.96.223'),
(427, '<strong>sachinkhatri53</strong> searched for <strong>football</strong>', '12-10-2022', 'United States', '216.116.96.223'),
(428, '<strong>sachinkhatri53</strong> searched for <strong>badminton</strong>', '12-10-2022', 'United States', '216.116.96.223'),
(429, '<strong>Sabin Khatri</strong> sent an email', '12-10-2022', 'United States', '216.116.96.223'),
(430, '<strong>sachinkhatri53</strong> updated profile picture', '12-10-2022', 'United States', '216.116.96.223'),
(431, '<strong>sachinkhatri53</strong> changed password', '12-10-2022', 'United States', '216.116.96.223'),
(432, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(433, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(434, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0'),
(435, 'Admin logged in as <strong>sachink</strong>', '12-10-2022', 'Nepal', '101.251.4.0');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `category_title`) VALUES
(2, 'Cricket'),
(3, 'Basketball'),
(4, 'Rugby'),
(6, 'Table Tennis'),
(8, 'Badminton'),
(12, 'Tennis'),
(15, 'Archery'),
(16, 'Football'),
(27, 'Weight Lifting'),
(28, 'Volleyball');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `uid`, `vid`, `comment`, `date`, `time`) VALUES
(27, 2, 32, 'extremely talented boy', '12-10-2022', '05:15:35pm'),
(28, 13, 32, 'all the best for future', '12-10-2022', '05:16:13pm'),
(29, 12, 7, 'exceptional game', '12-10-2022', '05:58:42pm'),
(30, 15, 10, 'enjoyed alot', '12-10-2022', '08:20:10pm'),
(31, 15, 10, 'enjoyed alot', '12-10-2022', '08:20:25pm'),
(32, 15, 32, 'exceptional game', '12-10-2022', '08:21:47pm'),
(33, 16, 10, 'Rabin here', '12-10-2022', '08:40:51pm'),
(34, 16, 10, 'good game', '12-10-2022', '08:40:57pm'),
(35, 16, 38, 'hhhf hgaf', '12-10-2022', '08:42:01pm');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Åland'),
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
(28, 'Bonaire'),
(29, 'Bosnia and Herzegovina'),
(30, 'Botswana'),
(31, 'Bouvet Island'),
(32, 'Brazil'),
(33, 'British Indian Ocean Territory'),
(34, 'British Virgin Islands'),
(35, 'Brunei'),
(36, 'Bulgaria'),
(37, 'Burkina Faso'),
(38, 'Burundi'),
(39, 'Cambodia'),
(40, 'Cameroon'),
(41, 'Canada'),
(42, 'Cape Verde'),
(43, 'Cayman Islands'),
(44, 'Central African Republic'),
(45, 'Chad'),
(46, 'Chile'),
(47, 'China'),
(48, 'Christmas Island'),
(49, 'Cocos [Keeling] Islands'),
(50, 'Colombia'),
(51, 'Comoros'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Croatia'),
(55, 'Cuba'),
(56, 'Curacao'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Democratic Republic of the Congo'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guernsey'),
(93, 'Guinea'),
(94, 'Guinea-Bissau'),
(95, 'Guyana'),
(96, 'Haiti'),
(97, 'Heard Island and McDonald Islands'),
(98, 'Honduras'),
(99, 'Hong Kong'),
(100, 'Hungary'),
(101, 'Iceland'),
(102, 'India'),
(103, 'Indonesia'),
(104, 'Iran'),
(105, 'Iraq'),
(106, 'Ireland'),
(107, 'Isle of Man'),
(108, 'Israel'),
(109, 'Italy'),
(110, 'Ivory Coast'),
(111, 'Jamaica'),
(112, 'Japan'),
(113, 'Jersey'),
(114, 'Jordan'),
(115, 'Kazakhstan'),
(116, 'Kenya'),
(117, 'Kiribati'),
(118, 'Kosovo'),
(119, 'Kuwait'),
(120, 'Kyrgyzstan'),
(121, 'Laos'),
(122, 'Latvia'),
(123, 'Lebanon'),
(124, 'Lesotho'),
(125, 'Liberia'),
(126, 'Libya'),
(127, 'Liechtenstein'),
(128, 'Lithuania'),
(129, 'Luxembourg'),
(130, 'Macao'),
(131, 'Macedonia'),
(132, 'Madagascar'),
(133, 'Malawi'),
(134, 'Malaysia'),
(135, 'Maldives'),
(136, 'Mali'),
(137, 'Malta'),
(138, 'Marshall Islands'),
(139, 'Martinique'),
(140, 'Mauritania'),
(141, 'Mauritius'),
(142, 'Mayotte'),
(143, 'Mexico'),
(144, 'Micronesia'),
(145, 'Moldova'),
(146, 'Monaco'),
(147, 'Mongolia'),
(148, 'Montenegro'),
(149, 'Montserrat'),
(150, 'Morocco'),
(151, 'Mozambique'),
(152, 'Myanmar [Burma]'),
(153, 'Namibia'),
(154, 'Nauru'),
(155, 'Nepal'),
(156, 'Netherlands'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'North Korea'),
(165, 'Northern Mariana Islands'),
(166, 'Norway'),
(167, 'Oman'),
(168, 'Pakistan'),
(169, 'Palau'),
(170, 'Palestine'),
(171, 'Panama'),
(172, 'Papua New Guinea'),
(173, 'Paraguay'),
(174, 'Peru'),
(175, 'Philippines'),
(176, 'Pitcairn Islands'),
(177, 'Poland'),
(178, 'Portugal'),
(179, 'Puerto Rico'),
(180, 'Qatar'),
(181, 'Republic of the Congo'),
(182, 'Réunion'),
(183, 'Romania'),
(184, 'Russia'),
(185, 'Rwanda'),
(186, 'Saint Barthélemy'),
(187, 'Saint Helena'),
(188, 'Saint Kitts and Nevis'),
(189, 'Saint Lucia'),
(190, 'Saint Martin'),
(191, 'Saint Pierre and Miquelon'),
(192, 'Saint Vincent and the Grenadines'),
(193, 'Samoa'),
(194, 'San Marino'),
(195, 'São Tomé and Príncipe'),
(196, 'Saudi Arabia'),
(197, 'Senegal'),
(198, 'Serbia'),
(199, 'Seychelles'),
(200, 'Sierra Leone'),
(201, 'Singapore'),
(202, 'Sint Maarten'),
(203, 'Slovakia'),
(204, 'Slovenia'),
(205, 'Solomon Islands'),
(206, 'Somalia'),
(207, 'South Africa'),
(208, 'South Georgia and the South Sandwich Islands'),
(209, 'South Korea'),
(210, 'South Sudan'),
(211, 'Spain'),
(212, 'Sri Lanka'),
(213, 'Sudan'),
(214, 'Suriname'),
(215, 'Svalbard and Jan Mayen'),
(216, 'Swaziland'),
(217, 'Sweden'),
(218, 'Switzerland'),
(219, 'Syria'),
(220, 'Taiwan'),
(221, 'Tajikistan'),
(222, 'Tanzania'),
(223, 'Thailand'),
(224, 'Togo'),
(225, 'Tokelau'),
(226, 'Tonga'),
(227, 'Trinidad and Tobago'),
(228, 'Tunisia'),
(229, 'Turkey'),
(230, 'Turkmenistan'),
(231, 'Turks and Caicos Islands'),
(232, 'Tuvalu'),
(233, 'U.S. Minor Outlying Islands'),
(234, 'U.S. Virgin Islands'),
(235, 'Uganda'),
(236, 'Ukraine'),
(237, 'United Arab Emirates'),
(238, 'United Kingdom'),
(239, 'United States'),
(240, 'Uruguay'),
(241, 'Uzbekistan'),
(242, 'Vanuatu'),
(243, 'Vatican City'),
(244, 'Venezuela'),
(245, 'Vietnam'),
(246, 'Wallis and Futuna'),
(247, 'Western Sahara'),
(248, 'Yemen'),
(249, 'Zambia'),
(250, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `eid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sent_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`eid`, `fullname`, `phone`, `email`, `message`, `status`, `sent_date`) VALUES
(2, 'Jenish Dahal', '9860444555', 'jenishdahal42@gmail.com', 'hsa fj jdf jz xvhv d vsdj zvsjvxnv  vjxcv jbjcbvxvjkfs.', 'read', '19-09-2022'),
(6, 'Sabin Khatri', '9803394667', 'sachinkhatri53@gmail.com', 'I am enjoying all the games. Thank you very much', 'read', '12-10-2022'),
(9, 'Sabin Khatri', '9803394667', 'sachinkhatri@ismt.edu.np', 'I am facing problem', 'unread', '12-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_videos`
--

CREATE TABLE `favorite_videos` (
  `fv_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite_videos`
--

INSERT INTO `favorite_videos` (`fv_id`, `uid`, `vid`) VALUES
(6, 3, 31),
(7, 1, 32),
(9, 12, 32),
(10, 15, 32),
(11, 16, 38);

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `fid` int(11) NOT NULL,
  `fixture_title` varchar(255) NOT NULL,
  `fixture_date` varchar(255) NOT NULL,
  `fixture_time` varchar(255) NOT NULL,
  `fixture_category` varchar(255) NOT NULL,
  `fixture_countries` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`fid`, `fixture_title`, `fixture_date`, `fixture_time`, `fixture_category`, `fixture_countries`) VALUES
(1, 'Open Archery', '2022-11-29', '15:00', 'Archery', 'American Samoa, Andorra, Angola, Albania'),
(2, 'Football U-19 Men', '2022-08-26', '22:00', 'Football', 'Austria, Australia, Belgium, Bolivia, Brunei Darussalam, Cape Verde, Cote d\\\'Ivoire'),
(3, 'Football U-23 Women', '2022-09-28', '16:46', 'Football', 'Greece, Hungary'),
(10, 'Football U-23 Womensads', '2022-09-30', '17:20', 'Football', 'Benin, Central African Republic, Dominica, Georgia'),
(12, 'Brazil vs Germany', '2022-10-08', '17:00', 'Football', 'Brazil, Germany'),
(13, 'Mens Weight Lifting', '2022-10-19', '14:00', 'Weight Lifting', 'American Samoa, Antarctica, Armenia, Austria'),
(14, 'Men\\\'s weight lifting 50kg', '2022-10-28', '18:15', 'Weight Lifting', 'Argentina, Bahrain, Belize, Bermuda');

-- --------------------------------------------------------

--
-- Table structure for table `live_videos`
--

CREATE TABLE `live_videos` (
  `lvid` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_description` varchar(5000) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `video_category` varchar(255) NOT NULL,
  `uploaded_date` varchar(255) NOT NULL,
  `uploaded_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `live_videos`
--

INSERT INTO `live_videos` (`lvid`, `video_title`, `video_description`, `video_url`, `video_category`, `uploaded_date`, `uploaded_time`) VALUES
(7, 'LIVE BUCS SUPER RUGBY | Durham vs Loughborough', 'Watch as league holders Durham welcome Loughborough to hollow drift in this opening round fixture.', 'https://www.youtube.com/embed/zLei2XVdFlE?autoplay=1&mute=1', 'Rugby', '2022-09-29', '00:19'),
(9, 'National Games 2022, Day 13 | Doordarshan Sports', '#NationalGames2022 #36thNationalGames\\r\\nLIVE - National Games 2022, Day 13 | Doordarshan Sports', 'https://www.youtube.com/embed/Frp7z3HVa0k?autoplay=1&mute=1', 'Volleyball', '2022-10-12', '14:07'),
(10, 'A SPOR CANLI YAYINI test', 'hv dh h af fh aj hf dhfakj cool test', 'https://www.youtube.com/embed/DXNQGv-1B-w?autoplay=1&mute=1?autoplay=1&mute=1', 'Football', '2022-10-27', '00:05'),
(12, 'A SPOR CANLI YAYINI test', 'hfhfh af  ff cricket test', 'https://www.youtube.com/embed/DXNQGv-1B-w?autoplay=1&mute=1?autoplay=1&mute=1', 'Weight Lifting', '2022-10-12', '20:34');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `nid` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_description` varchar(255) NOT NULL,
  `news_thumbnail` varchar(255) NOT NULL,
  `news_category` varchar(255) NOT NULL,
  `uploaded_date` varchar(255) NOT NULL,
  `uploaded_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nid`, `news_title`, `news_description`, `news_thumbnail`, `news_category`, `uploaded_date`, `uploaded_time`) VALUES
(9, 'All Assam Major Ranking Table Tennis tournament in Golaghat District', 'GUWAHATI: Golaghat District Sports Association will host the 14th Madhurjya Gogoi All Assam Major Ranking Table Tennis tournament from August 25. Around 450 players from different parts of the state will participate in 12 different categories.', '1664390745pizzaSAsset 6.png', 'Table Tennis', '2022-09-30', '17:33'),
(13, 'Moeen Ali heroics in vain as Pakistan take series lead over England', 'Stand-in skipper Moeen Ali came close to hitting England out of trouble at the death only to be bested by a debutant as Pakistan took control of the Twenty20 series for the first time. The hosts were bowled out for just 145 in Lahore, Mark Wood excelling ', '1664391159michael-weir-dpd3Hn47ojg-unsplash.jpg', 'Cricket', '2022-09-29', '00:37'),
(15, 'Brian Burns on Panthers\\\' dominance of Cardinals: \\\'It means something\\\'', 'The Carolina Panthers achieve a unique type of mode whenever they play the Arizona Cardinals—greatness on a different level, some may say. And according to Brian Burns, we must at least acknowledge it.', '1664428257alex-motoc-OZ-hD7ndiEs-unsplash.jpg', 'Rugby', '2022-09-29', '10:55'),
(16, 'Charlton halted an eight-game winless run in League One in emphatic style as they defeated Exeter 4-2 at The Valley', 'The Addicks took the lead in the 20th minute, Miles Leaburn latching on to George Dobson\\\'s ball over the top of the Exeter defence and slamming a right-footed shot past Jamal Blackman from inside the area.\\r\\nJust four minutes later the home team extende', '1665565168football-reuters-m.jpg', 'Football', '2022-10-12', '14:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_request`
--

CREATE TABLE `password_reset_request` (
  `prrid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `requested_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset_request`
--

INSERT INTO `password_reset_request` (`prrid`, `email`, `requested_date`) VALUES
(9, 'bishalaryal@ismt.edu.np', '12-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `pid` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `upload_date` varchar(255) NOT NULL,
  `upload_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`pid`, `caption`, `category_title`, `image_path`, `upload_date`, `upload_time`) VALUES
(13, 'Unfortunately Moeen Ali heroics in vain as Pakistan take series lead over England', 'Cricket', '1665566017mudassir-ali-DvreeyPXQww-unsplash.jpg', '12-10-2022', '11:13:37am'),
(15, 'eastern elite vs western elite', 'Archery', '1664428471annie-spratt-jY9mXvA15W0-unsplash.jpg', '29-09-2022', '07:14:31am');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`) VALUES
(1, 'This is the first post'),
(2, 'This is the second piece of text'),
(3, 'This is the third post'),
(4, 'This is the fourth piece of text');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`uid`, `vid`, `action`) VALUES
(3, 31, 'like'),
(3, 32, 'like'),
(3, 33, 'like'),
(3, 34, 'like'),
(6, 33, 'like'),
(11, 7, 'dislike'),
(11, 31, 'like'),
(12, 7, 'like'),
(12, 32, 'like'),
(15, 10, 'dislike'),
(15, 32, 'dislike'),
(16, 38, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `registered_date` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fullname`, `phone`, `nationality`, `email`, `profile_image`, `username`, `password`, `status`, `registered_date`, `is_admin`, `last_login`) VALUES
(2, 'Bishal Aryal', '9803394667', 'Sweden', 'bishalaryal@ismt.edu.np', 'bishal.png', 'bishal', '$2y$12$GCJ7L3Co3kvic0W8yXNh1ejJfY8rLQvNhhgSm0Y8iXz9nkduS9lJO', 'active', '19-08-2022', 0, '12-10-2022'),
(3, 'Jenish Dahal', '98073738383', 'Afghanistan', 'jenish@gmail.com', '1664290208IMG_4747.JPG', 'jenish', '$2y$12$LLOS0F3NoRAJbqTSRccwnOYrbWFYJWyK56AcRdvoY1lcXmJ6usnLO', 'inactive', '05-09-2022', 0, '29-09-2022'),
(6, 'Sachin Khatri', '9803394667', 'Venezuela', 'sachin.khatri@es.cloudfactory.com', 'profile.png', 'sachink', '$2y$12$2DXuAUr/pEqNJjKSRmOBte75L9PRDPQyLg.t/UHG.MoyRBmQOfIB.', 'active', '17-09-2022', 1, '12-10-2022'),
(7, 'Rabin KC', '9867816889', 'Venezuela', 'kcrabin450@gmail.com', '1664290016IMG_4747.JPG', 'rabin', '$2y$12$i1PB2cx9t.YA21R9ibrDqOPiKlM2cWhSj0cPr1XFcj9Z4nPzOXlb.', 'active', '22-09-2022', 0, 'N/A'),
(10, 'Pratik Mishra', '9805533421', 'United States', 'prarikmishra2018@gmail.com', 'profile.png', 'pratik', '$2y$12$4e/O9omv0lO7YAqu7ovxNOmk2hQopAxz.YXbx9CIgqHCxZlvvheE2', 'active', '27-09-2022', 0, '27-09-2022'),
(13, 'Sachin Khatri', '9805566554', 'Australia', 'sachinkhatri53@gmail.com', 'profile.png', 'sachinkhatri', '$2y$12$Dlqu3OlcnHQ242W6UX6GuectEMHwbX9QqHbh6WhHN87yAdk0g3jCC', 'active', '12-10-2022', 0, '12-10-2022'),
(16, 'Sachin Khatri', '98078878324', 'Faroe Islands', 'sachinkhatri@ismt.edu.np', '1665586732alex-motoc-OZ-hD7ndiEs-unsplash.jpg', 'sachinkhatri53', '$2y$12$MDoAGvi8SV.bhsZmZuTk8u2qH9GxwBMLaKGuI7kU0u6LF3OLb43h.', 'active', '12-10-2022', 0, '12-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `vid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `upload_date` varchar(255) NOT NULL,
  `upload_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`vid`, `title`, `category_title`, `description`, `video_path`, `tags`, `views`, `upload_date`, `upload_time`) VALUES
(32, '5-year-old boy, exchanging badminton playing skills with Swiss team', 'Badminton', 'Rocky, 5-year-old boy, has been trained badminton playing skills for 2 years. 2012 has been invited to take part in the Beijing non-governmental badminton team to exchange badminton playing skills with Swiss non-governmental badminton team.', '16644229505-year-old boy, exchanging badminton playing skills with Swiss team.mp4', 'Rocky, Badminton, Beijing, 5-year-old', 143, '2022-09-29', '09:27'),
(33, 'Badminton training for beginners kids DAY 3', 'Badminton', 'Badminton training for beginners kids DAY 3', '1664423031Badminton training for beginners kids  DAY 3.mp4', 'Badminton', 70, '2022-09-29', '09:28'),
(34, 'First training Indonesia', 'Badminton', 'The Indonseians had their first training in Odense this morning - check it ou', '1664423106First training Indonesia.mp4', 'Badminton, Indonesians, Odense', 102, '2022-09-29', '09:30'),
(38, 'men\\\'s weight lifting test tes', 'Badminton', 'dhf aj hjgf adgf dshgf hgd hfgsdh fgsdas dghsadfa test', '1665586262Winning Moments ｜ Pakistan vs England ｜ 5th T20I 2022 ｜ PCB ｜ MU2L.mp4', 'cricket, football, basketball, badminton, test', 5, '2022-10-21', '13:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`alid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `favorite_videos`
--
ALTER TABLE `favorite_videos`
  ADD PRIMARY KEY (`fv_id`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `live_videos`
--
ALTER TABLE `live_videos`
  ADD PRIMARY KEY (`lvid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD PRIMARY KEY (`prrid`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`uid`,`vid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `alid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `favorite_videos`
--
ALTER TABLE `favorite_videos`
  MODIFY `fv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `live_videos`
--
ALTER TABLE `live_videos`
  MODIFY `lvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  MODIFY `prrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
