-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 07:21 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkkubra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `username`, `password`, `lastlogin`, `ip`, `active`) VALUES
(2, 'Admin', 'Admin', 'admin@jkkubra.exmple', '12345', '1555785575', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `upload_date` varchar(100) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL,
  `for_slider` tinyint(4) NOT NULL DEFAULT '0',
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `src`, `upload_date`, `visible`, `position`, `for_slider`, `ip`) VALUES
(1, 'London Buses is the subsidiary of Transport for London', 'bus.jpg', '1555783626', 1, 1, 1, '1'),
(3, 'The City of London is a city and county that contains the historic centre and the primary central business district (CBD) of London', 'London-3.jpg', '1555785194', 1, 2, 1, '1'),
(4, 'Tower Bridge is one of London\'s famous bridges and one of many must-see landmarks in London with a glass floor and modern exhibitions it is a must visit', 'bridge.jpg', '1555785194', 1, 3, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '0',
  `update_time` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`id`, `page_id`, `heading`, `body`, `visible`, `update_time`, `position`, `ip`) VALUES
(1, 1, 'History', '<span style="box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">We are an independent Islamic Secondary School &amp; Madrasah for girls and boys based in India.</span><div><font color="#333333" face="Helvetica Neue, Helvetica, Arial, sans-serif"><span style="font-size: 14px;"><b><br></b></span></font><div><span style="box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: normal; text-align: justify;">Aliquam tincidunt fringilla mauris auctor gravida. Cras dui magna, condimentum et leo id, viverra posuere metus. Suspendisse a aliquet urna, sit amet auctor risus. Donec vel pharetra nulla. Suspendisse vel nulla scelerisque, pellentesque libero quis, aliquet justo. Morbi sem metus, interdum in leo nec, lobortis vestibulum lacus. Proin imperdiet nulla id nunc pretium, ut consectetur neque ornare. Integer lacinia diam semper mauris ornare ornare. Donec eu felis non nulla lacinia feugiat. Nulla non sodales neque. Nullam et erat quis erat ultrices egestas. Suspendisse sed nunc condimentum, interdum turpis eu, dapibus orci. Cras nulla augue, semper sed purus vel, rhoncus rhoncus sem. Donec nec massa velit.</span></span></div></div><div><span style="box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: normal; text-align: justify;"><br></span></span></div><div><span style="box-sizing: border-box; font-weight: 700; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: normal; text-align: justify;">In hac habitasse platea dictumst. Donec in ante id tellus semper consectetur ut sed nisi. Etiam luctus, orci eu tincidunt elementum, mi ipsum consequat enim, et tincidunt leo ipsum sagittis nisi. Etiam vitae hendrerit enim. Vivamus elementum ullamcorper tellus ut gravida. Sed placerat ante vel erat viverra, in posuere ante maximus. Vestibulum at lacus augue.</span></span></div>', 1, '1555782254', 1, '1'),
(2, 1, 'Latest Events', '<ul><li>Notifications: Hello world.</li><li>Notifications: Hello everyone.</li><li>Notifications: Hello world.</li><li>Notifications: Hello everyone.</li></ul>', 1, '1555782266', 2, '1'),
(3, 1, 'Madrasah Events', '<div><i><b>Admissions for September 2016</b></i></div><div><i>Open Days: Sat 10th October 2015 | Sat 21st November 2015</i></div><div><i>11am - 1pm</i></div><div><i>Please Click <a href="http://www.google.com">here to more details</a></i></div>', 1, '1473059355', 3, ''),
(4, 1, 'Donate to support', '<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Support the madrasah by donating:&nbsp;</div><a href="http://www.google.com/" style="box-sizing: border-box; background-color: rgb(255, 255, 255); color: rgb(51, 122, 183); text-decoration: none; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;">Click on the link below to print and complete the standing order mandate.</a><div>Thank you</div>', 1, '1473362711', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `submit_date` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `view` tinyint(4) NOT NULL DEFAULT '0',
  `important` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
