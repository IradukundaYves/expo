-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 06:03 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dig_exipo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_profiles`
--

CREATE TABLE `business_profiles` (
  `business_ID` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `signup_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_profiles`
--

INSERT INTO `business_profiles` (`business_ID`, `business_name`, `logo`, `location`, `phone`, `email`, `website`, `type`, `password`, `status`, `signup_date`) VALUES
(1, 'fety group Ltd', '', 'nyamirambo', '0788888888', 'yves1@gmail.com', 'www.fetygroup.com', 'fashion', '199720yves', 'pending', '2020-04-17'),
(2, 'DigExpo Ltd', 'logo2.jpg', 'nyarugenge', '0789676664', 'irayves1@gmail.com', 'www.fetygroup.com', 'techology', '$2y$10$egGhrs.Wg5O54zG7YfeWxOjptWp5uOYMOaZer7JzwRkMgPzMUC0Se', 'pending', '2020-04-24'),
(3, 'fety group Ltd', 'logo.png', 'nyamirambo', '0788888888', 'fety@gmail.com', 'www.fetygroup.com', 'techology', '$2y$10$NkXBrabdYbsJ8P7aJe.hBODOyvjAWM.Wwe.fJ3DPhWHHMSPXrQOpa', 'pending', '2020-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `featured_product_id` int(11) NOT NULL,
  `images` varchar(5000) NOT NULL,
  `category` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `side` varchar(255) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`featured_product_id`, `images`, `category`, `short_description`, `phone`, `side`, `upload_date`) VALUES
(2, '../p_img/godas.jpeg', 'clothes', 'fdsfjkdjfkldfkdsmvcnvdv', '0788888888', 'right_side_2', '2020-04-15'),
(3, '../p_img/IMG-20180717-WA0018.jpg', 'clothes', 'this the best ever classic timber all the way from italy', '0788888888', 'right_side_1', '2020-04-18'),
(4, '../p_img/IMG-20180818-WA0011.jpg', 'clothes', 'this nike airforce first quality', '0788888888', 'right_side_1', '2020-04-18'),
(5, '../p_img/airmax.jpg', 'clothes', 'this brand new airmax for supper stars', '0788888888', 'right_side_2', '2020-04-21'),
(6, '../p_img/unnamed.jpg', 'electronic devices', 'MacBook Pro Model-A1990 - Intel Core i7 - 6-Core - 16GB RAM - 512GB SSD - Radeon Pro 555X with 4GB Graphics ', '0788888888', 'left_side_1', '2020-04-21'),
(7, '../p_img/IMG-20180717-WA0022.jpg', 'clothes', 'this bag is affordable  and is original quality number one ', '0788888888', 'left_side_1', '2020-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `profile_post_pictures`
--

CREATE TABLE `profile_post_pictures` (
  `profile_post_picture_id` int(11) NOT NULL,
  `product_post_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `red_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_description` longtext NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_image` varchar(255) NOT NULL,
  `job_source` varchar(100) NOT NULL,
  `deadline` date NOT NULL,
  `published_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_id`, `job_title`, `job_description`, `job_category`, `job_type`, `job_image`, `job_source`, `deadline`, `published_date`) VALUES
(20, 'fullstack web developer (2)', 'the following are the responsibilities: analyse all requirements design and develop solution needed\r\n', 'Technology', 'Full Time Entry Level (1 to 3 years of experience)', '../j_img/linkedin.jpeg', 'Digexpo Ltd', '2020-04-30', '2020-04-23'),
(21, 'software developer', '<p>the following are the responsibilities: analyse all requirements design and develop solution needed</p>\r\n', 'Technology', 'Full Time Entry Level (1 to 3 years of experience)', '../j_img/logo.png', 'fety group Ltd', '2020-04-30', '2020-04-23'),
(22, 'accountant (2)', '<p>the following are the responsibilities: analyse all requirements design and develop solution needed</p>\r\n', 'technical_engineering', 'Full Time Entry Level (0 to 2 years of experience)', '../j_img/phone1.jpeg', 'Kigali Phone repair Ltd', '2020-04-28', '2020-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_body` longtext NOT NULL,
  `news_category` varchar(100) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_source` varchar(255) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_body`, `news_category`, `news_image`, `news_source`, `upload_date`) VALUES
(1, 'uruganda rw\'inyange tugiye gutanga akazi kubantu 120', 'sadfjsahfjksahfkjadshfkjd\r\n', 'Business', '../images/house-duplex-exterior.jpg', 'mukamira', '2020-04-13'),
(5, 'uruganda rw\'inyange tugiye', '<p>al field are required</p>\r\n', 'Technology', '../images/1580742186554_1024.jpg', 'ubumwe tech circle', '2020-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` longtext NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `business_ID` int(11) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_description`, `product_image`, `company_name`, `business_ID`, `reg_date`) VALUES
(66, 'dell desptop', 'brand new macbook at row price  call us at +250789676664 sequat diam. Maecenas metus. Vivamus diam', 'p_img/IMG-20180818-WA0002.jpg', 'DigExpo Ltd', 2, '2020-04-25'),
(67, 'sneakers', 'brand new sneakers nike at row price  call us at +250789676664 sequat diam. Maecenas metus.', 'p_img/IMG-20180717-WA0008.jpg', 'DigExpo Ltd', 2, '2020-04-25'),
(68, 'sneakers', 'brand new airforceat row price  call us at +250789676664 sequat diam. Maecenas metus. Vivamus diam', 'p_img/IMG-20180717-WA0011.jpg', 'FETY group ltd', 3, '2020-04-25'),
(69, 'T-shirt, valez ', 'promotion: valez-black and white all size from small to x-large ', 'p_img/IMG-20180915-WA0003.jpg', 'Fety Group Ltd', 3, '2020-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainings`
--

CREATE TABLE `tbl_trainings` (
  `training_id` int(11) NOT NULL,
  `training_title` varchar(100) NOT NULL,
  `traning_description` longtext NOT NULL,
  `training_image` varchar(100) NOT NULL,
  `trainers_company_name` varchar(100) NOT NULL,
  `training_category` varchar(255) NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trainings`
--

INSERT INTO `tbl_trainings` (`training_id`, `training_title`, `traning_description`, `training_image`, `trainers_company_name`, `training_category`, `publish_date`) VALUES
(2, 'web development and graphic design', '<p>dsjfhdskjfjdslkfjdsklfmdskljfdlkslkjfdsm</p>\r\n', '../images/IMG-20180818-WA0002.jpg', 'digexpo ltd', 'Technology', '2020-04-13'),
(3, 'mysql database', '<p>in this training we will cover all basics you get start build your orw applications</p>\r\n', '../t_img/IMG-20180827-WA0009.jpg', 'digexpo ltd', 'Technology', '2020-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `user_name`, `password`, `user_role`, `created_date`) VALUES
(1, 'Danny ', 'Benshi', 'benshidanny11@gmail.com', '0784871958', 'danny123', 'Admin', '11', '0000-00-00'),
(2, 'Yves', 'Iradukunda', 'yves11@gmail.com', '0788888888', 'yves123', '112', 'Admin', '0000-00-00'),
(4, 'yves', 'IRADUKUNDA', 'irayves1@gmail.com', '0789676664', 'linson', '$2y$10$mzGNx9pictUYs8MRynQEr.hvls.5WC9O0d36zDuET6GqVWb5eORzW', 'Admin', '2020-04-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_profiles`
--
ALTER TABLE `business_profiles`
  ADD PRIMARY KEY (`business_ID`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`featured_product_id`);

--
-- Indexes for table `profile_post_pictures`
--
ALTER TABLE `profile_post_pictures`
  ADD PRIMARY KEY (`profile_post_picture_id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_trainings`
--
ALTER TABLE `tbl_trainings`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_profiles`
--
ALTER TABLE `business_profiles`
  MODIFY `business_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `featured_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile_post_pictures`
--
ALTER TABLE `profile_post_pictures`
  MODIFY `profile_post_picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_trainings`
--
ALTER TABLE `tbl_trainings`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
