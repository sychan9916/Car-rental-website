-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 08:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_data`
--

CREATE TABLE `car_data` (
  `CAR_ID` int(255) NOT NULL,
  `CAR_BRAND` varchar(255) NOT NULL,
  `CAR_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(255) NOT NULL,
  `send_user` varchar(255) NOT NULL,
  `receive_user` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `send_user`, `receive_user`, `message`, `time`) VALUES
(49, 'yong', 'kit', 'hi kit', '2021-05-14 08:57:54'),
(50, 'kit', 'yong', 'what', '2021-05-14 09:05:46'),
(51, 'kit', 'yong', 'hi yong', '2021-05-14 09:08:27'),
(52, 'kit', 'yong', 'hi yong', '2021-05-14 09:08:31'),
(53, 'kit', 's', 'dsa', '2021-05-14 11:09:37'),
(54, 'yong', 'kit', 'hi', '2021-05-14 11:37:38'),
(55, 'yong', 'kit', 'how r u', '2021-05-14 14:15:01'),
(56, 's', 'kit', 'hi kit u there?', '2021-05-14 14:23:13'),
(57, 'kit', 'yong', 'morning', '2021-05-15 01:34:35'),
(58, 's', 'yong', 'hi', '2021-05-15 03:09:15'),
(59, 'YONG', 'KIT', 'hehe', '2021-05-15 13:54:31'),
(60, 'YONG', 'KIT', 'how u doing', '2021-05-15 13:54:35'),
(61, 'YONG', 'KIT', 'eaten', '2021-05-15 13:54:39'),
(62, 'YONG', 'KIT', 'sda', '2021-05-15 13:54:40'),
(63, 'YONG', 'KIT', 'ss', '2021-05-15 13:54:40'),
(64, 'YONG', 'KIT', 's', '2021-05-15 13:54:41'),
(65, 'YONG', 'KIT', 's', '2021-05-15 13:54:41'),
(66, 'YONG', 'KIT', 's', '2021-05-15 13:54:42'),
(67, 'YONG', 'KIT', 's', '2021-05-15 13:54:42'),
(68, 'lim', 'kit', 'hi are u there ?', '2021-05-16 08:55:31'),
(69, 'kit', 'lim', 'hi ya are u interested to rent?', '2021-05-16 08:56:35'),
(70, 'yong', 'kit', 'hey', '2021-05-23 09:37:52'),
(71, 's', 'kit', 'YA', '2021-05-24 03:20:59'),
(72, 'yong ', 'kit', 'How much is this kancil', '2021-05-24 06:12:41'),
(73, 'kit', 'yong', 'rm30', '2021-05-24 06:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `inv_id` int(255) NOT NULL,
  `list_id` int(255) NOT NULL,
  `Buyer` varchar(255) NOT NULL,
  `amount` double(65,0) NOT NULL,
  `cardnumber` int(255) NOT NULL,
  `expmonth` varchar(255) NOT NULL,
  `expyear` int(255) NOT NULL,
  `cvv` int(255) NOT NULL,
  `bookdate` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `day` int(11) NOT NULL,
  `priceperday` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`inv_id`, `list_id`, `Buyer`, `amount`, `cardnumber`, `expmonth`, `expyear`, `cvv`, `bookdate`, `day`, `priceperday`) VALUES
(48, 55, 'kit', 30, 0, '', 0, 0, '2021-05-15 17:16:02.885561', 1, 30),
(57, 57, 'yong', 0, 1, 'september352', 2, 0, '2021-05-16 10:58:18.907087', 1, 0),
(66, 58, 'yong', 30, 11111111, 'september', 2, 352, '2021-05-16 11:06:38.109584', 1, 30),
(69, 59, 'kit', 0, 11111111, 'september', 2, 352, '2021-05-16 11:09:54.014437', 1, 40),
(72, 60, 'yong', 0, 11111111, 'september', 2, 352, '2021-05-16 11:11:47.202566', 1, 30),
(75, 61, 'kit', 4464, 11111111, 'september', 2, 352, '2021-05-16 11:13:56.061170', 2, 2232),
(89, 62, 'yong', 30, 11111111, 'september', 2019, 352, '2021-05-16 11:26:53.622115', 1, 30),
(92, 63, 'kit', 0, 0, '', 0, 0, '2021-05-16 11:36:23.645748', 0, 50),
(93, 56, 'kit', 0, 0, '', 0, 0, '2021-05-16 11:37:43.053898', 0, 30),
(101, 64, 'yong', 200, 11111111, 'september', 2019, 352, '2021-05-16 11:45:38.278178', 2, 100),
(102, 65, 'kit', 30, 11111111, 'september', 2019, 352, '2021-05-16 17:49:30.090246', 1, 30),
(103, 66, 'yong', 100, 0, '', 0, 0, '2021-05-16 17:52:28.972006', 1, 100),
(104, 67, 'yong', 30, 0, '', 0, 0, '2021-05-18 09:11:18.721717', 1, 30),
(105, 68, 's', 30, 11111111, 'september', 2, 352, '2021-05-18 09:12:30.040534', 1, 30),
(106, 69, 'yong', 30, 0, '', 0, 0, '2021-05-18 11:23:55.521568', 1, 30),
(107, 70, 'yong', 30, 0, '', 0, 0, '2021-05-18 12:42:09.018478', 1, 30),
(108, 71, 'yong', 30, 11111111, 'september', 2019, 352, '2021-05-24 08:56:11.301843', 1, 30),
(109, 79, 'yong ', 20, 11111111, 'september', 2, 352, '2021-05-24 14:14:02.198546', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `LIST_ID` int(255) NOT NULL,
  `CAR_NAME` varchar(255) DEFAULT NULL,
  `CAR_BRAND` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `name` text NOT NULL,
  `CAR_SEAT` int(255) NOT NULL,
  `EXTRA` varchar(255) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available',
  `date_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`LIST_ID`, `CAR_NAME`, `CAR_BRAND`, `USERNAME`, `image`, `name`, `CAR_SEAT`, `EXTRA`, `price`, `status`, `date_time`) VALUES
(55, 'toyota', 'cxs', 'yong', 'chr.jpg', '', 5, 'conditon top good', '30.00', 'booked', '2021-05-15 11:15:46.000000'),
(56, 'toyota', 'cxs', 'KIT', 'a.png', '', 5, 'OFFER ', '30.00', 'booked', '2021-05-15 15:31:56.000000'),
(57, 'toyota', 'cxs', 'kit', 'a.png', '', 5, 'asdasda', '30.00', 'booked', '2021-05-16 04:57:54.000000'),
(58, 'toyota', 'cxs', 'kit', 'chansaiyongb0642_exercisecp4.jpg', '', 5, 'a', '30.00', 'booked', '2021-05-16 05:05:25.000000'),
(59, 'toyota', 'cxs', 'yong', 'chansaiyongb0642_exercisecp4.jpg', '', 3, 'hewhe', '40.00', 'booked', '2021-05-16 05:09:09.000000'),
(60, 'toyota', 'cxs', 'kit', 'chr.jpg', '', 2, '11223', '30.00', 'booked', '2021-05-16 05:11:35.000000'),
(61, 'toyota', 'dsad', 'yong', 'a.png', '', 5, 'f', '2232.00', 'booked', '2021-05-16 05:13:38.000000'),
(62, 's', 'cxs', 'kit', 'a.png', '', 5, 'pog', '30.00', 'booked', '2021-05-16 05:26:39.000000'),
(63, 'pog', 'pog', 'yong', 'a.png', '', 3, 'pog', '50.00', 'booked', '2021-05-16 05:36:03.000000'),
(64, 'bugati', 'he', 'kit', 'chr.jpg', '', 5, 'whops', '100.00', 'booked', '2021-05-16 05:45:17.000000'),
(65, 'chr', 'TOYOTA', 'yong', 'chr.jpg', '', 5, 'top condition, air cond excellent', '30.00', 'booked', '2021-05-16 10:39:44.000000'),
(66, '631', 'lambo', 'kit', 'images.jpg', '', 2, 'fast, comfortable', '100.00', 'booked', '2021-05-16 10:49:02.000000'),
(67, 'CAMRY', 'TOYOTA', 'kit', 'chr.jpg', '', 5, 'air coond good, fast, stable ', '30.00', 'booked', '2021-05-16 11:39:26.000000'),
(68, 'toyota', 'cxs', 'kit', 'chr.jpg', '', 5, 'dsdsa', '30.00', 'booked', '2021-05-18 03:12:08.000000'),
(69, 'toyota', 'cxs', 's', 'a.png', '', 5, 'sdas', '30.00', 'booked', '2021-05-18 03:12:48.000000'),
(70, 'toyota', 'dsad', 'kit', 'a.png', '', 5, 'sdaaabcd', '30.00', 'booked', '2021-05-18 03:13:36.000000'),
(71, 'toyota', 'cxs', 's', 'chr.jpg', '', 5, 'hi top product', '30.00', 'booked', '2021-05-18 07:08:32.000000'),
(79, 'perodua', 'kancil', 'kit', 'Perodua_Kancil_(3).jpg', '', 5, 'good air cond ', '20.00', 'booked', '2021-05-24 08:11:49.000000'),
(81, 'kancil', 'perodua', 'yong ', 'Perodua_Kancil_(3).jpg', '', 5, 'fast, cold', '20.00', 'available', '2021-05-24 08:45:33.000000'),
(82, 'city', 'hond', 'kit', 'honda.jpg', '', 5, 'fast and cool', '50.00', 'available', '2021-05-24 08:46:52.000000'),
(83, 'bugati', '55', 'tan', 'bugati.jpg', '', 2, 'cool . fast , 2.5 engine', '200.00', 'available', '2021-05-24 08:47:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `ratubg`
--

CREATE TABLE `ratubg` (
  `RATING_ID` int(255) NOT NULL,
  `push_user` varchar(255) NOT NULL,
  `pull_user` varchar(255) NOT NULL,
  `star` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratubg`
--

INSERT INTO `ratubg` (`RATING_ID`, `push_user`, `pull_user`, `star`, `comment`, `date`) VALUES
(66, 'yong', 'kit', 5, '', '2021-05-18 04:07:54.000000'),
(67, 'yong', 'kit', 3, 'normal services', '2021-05-18 04:11:55.000000'),
(68, 'yong', 'kit', 3, '', '2021-05-18 04:35:21.000000'),
(69, 'yong', 'kit', 2, '', '2021-05-18 04:53:19.000000'),
(70, 'yong', 'kit', 2, '', '2021-05-18 04:53:21.000000'),
(71, 'yong', 'kit', 1, '', '2021-05-18 04:53:24.000000'),
(72, 'yong', 'kit', 0, '', '2021-05-18 04:53:27.000000'),
(73, 'yong', 'kit', 0, '', '2021-05-18 04:53:34.000000'),
(74, 'yong', 'kit', 0, '', '2021-05-18 04:53:37.000000'),
(75, 'yong', 'kit', 0, '', '2021-05-18 04:53:40.000000'),
(76, 'yong', 'kit', 0, '', '2021-05-18 04:55:28.000000'),
(77, 'yong', 's', 5, '', '2021-05-18 04:55:40.000000'),
(78, 'yong', 's', 5, 'nice car and seller', '2021-05-18 05:03:24.000000'),
(79, 'yong', 's', 2, '', '2021-05-18 05:16:28.000000'),
(80, 'yong', 's', 2, '', '2021-05-18 05:16:44.000000'),
(81, 'yong', 's', 1, '', '2021-05-18 05:16:56.000000'),
(82, 'yong', 's', 1, '', '2021-05-18 05:18:09.000000'),
(83, 'yong', 's', 0, '', '2021-05-18 05:18:15.000000'),
(84, 'yong', 's', 0, '', '2021-05-18 05:18:18.000000'),
(85, 'yong', 's', 0, '', '2021-05-18 05:18:21.000000'),
(86, 'yong', 's', 0, '', '2021-05-18 05:18:22.000000'),
(87, 'yong', 's', 0, '', '2021-05-18 05:20:17.000000'),
(88, 'yong', 's', 0, '', '2021-05-18 05:20:18.000000'),
(89, 'yong', 's', 0, '', '2021-05-18 05:20:25.000000'),
(90, 'kit', 'yong', 5, '', '2021-05-24 07:49:19.000000'),
(91, 'kit', 'yong', 0, '', '2021-05-24 07:50:50.000000'),
(92, 'kit', 'yong', 5, 'very good seller ', '2021-05-24 08:15:32.000000'),
(93, 'kit', 'yong', 5, 'very good seller ', '2021-05-24 08:15:37.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `phone`) VALUES
('b0641', '61568053', 'sychan9916@gmail.com', 123289627),
('b0642', 'abc123', 'sychan9916@gmail.com', 123289627),
('choo', '61568053', 'sad', 1223286327),
('chpp', '61568053', 'choo@gmail.com', 123289627),
('kit', '61568153', 'chansaikit18788@gmail.com', 176088028),
('LIM', '61568053', 'LIM@GMAIL.COM', 123289627),
('s', '', '', 0),
('sadsad', '23213', 'sychan9916@gmail.com', 2147483647),
('tan', 'abc123', 'sychan9916@gmail.com', 123289627),
('yong', '61568053', 'scchan27@yahoo.com', 61568053);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_data`
--
ALTER TABLE `car_data`
  ADD PRIMARY KEY (`CAR_ID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `send_user` (`send_user`,`receive_user`),
  ADD KEY `receive_user` (`receive_user`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`inv_id`),
  ADD UNIQUE KEY `list_id` (`list_id`),
  ADD UNIQUE KEY `list_id_2` (`list_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`LIST_ID`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `ratubg`
--
ALTER TABLE `ratubg`
  ADD PRIMARY KEY (`RATING_ID`),
  ADD KEY `push_user` (`push_user`,`pull_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `inv_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `LIST_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `ratubg`
--
ALTER TABLE `ratubg`
  MODIFY `RATING_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`send_user`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`receive_user`) REFERENCES `users` (`username`);

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `list` (`LIST_ID`);

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
