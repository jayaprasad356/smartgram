-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 10:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `pincode` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `country` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `landmark`, `city`, `district`, `pincode`, `state`, `country`) VALUES
(1, 1, 'nandanapuram', 'Post office', 'Junction', 'Trichy', '624535', 'Tamilnadu', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `age` text DEFAULT NULL,
  `disease` text DEFAULT NULL,
  `place` text DEFAULT NULL,
  `history` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `appointment_date` varchar(255) DEFAULT NULL,
  `appointment_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `doctor_id`, `name`, `mobile`, `age`, `disease`, `place`, `history`, `description`, `appointment_date`, `appointment_time`) VALUES
(1, 5, 1, 'kerant', '8847474844', '45', 'Bacterial Disease', 'Trichy', NULL, 'last one weeks i am injured by this', '09-03-2021', '04:30 PM'),
(2, 5, 1, 'prasad', NULL, '25', 'sugar', 'sholapuram', 'nothing', 'prasad am patient', NULL, NULL),
(3, 10, 1, 'pradf', NULL, '25', 'vvvvv', 'tvvv', 'gghh', 'vvh', NULL, NULL),
(4, 11, 1, 'Prasas', NULL, '25', 'disease', 'kumbajb', 'bsjjsbsvs', 'hsyshbs', NULL, NULL),
(5, 9, 1, 'lala', NULL, '40', 'diabeties', 'delhi', 'heart attack', 'about to die.', NULL, NULL),
(6, 7, 1, 'harsh', NULL, '55', 'feve', 'Ghaziabad', 'hh', 'gbxbx', NULL, NULL),
(7, 11, 1, 'ghh', NULL, '808', 'cv', 'vvv', 'gg', 'ggg', NULL, NULL),
(8, 11, 1, 'ffgggh', NULL, '88', 'vvbbbv', 'vvvvv', 'vvvv', 'vvvv', NULL, NULL),
(9, 11, 2, 'ghhhhh', NULL, '25', 'cvbbbvg bhh', 'kumbakonqm', 'gbb', 'vbb', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `date_created`) VALUES
(1, 1, 1, 3, '2022-09-09 10:22:55'),
(12, 10, 1, 2, '2022-09-12 13:24:01'),
(14, 7, 1, 1, '2022-09-14 06:08:56'),
(15, 5, 1, 2, '2022-09-15 11:27:05'),
(17, 12, 1, 1, '2022-09-16 06:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `last_updated`, `date_created`) VALUES
(1, 'Daily Needs ', 'upload/images/1663412150.2429.jpg', 1, '2022-09-17 10:55:50', '2022-09-02 04:36:07'),
(2, 'Health Care', 'upload/images/1662994580.2559.jpg', 0, '2022-09-12 14:56:20', '2022-09-09 07:27:24'),
(3, 'Fintech', 'upload/images/1663412206.5938.jpg', 1, '2022-09-17 10:56:46', '2022-09-09 07:28:57'),
(4, 'Agriculture ', 'upload/images/9708-2022-09-17.jpg', 0, NULL, '2022-09-17 10:57:13'),
(5, 'test', 'upload/images/2211-2022-10-06.png', 0, NULL, '2022-10-06 16:35:45'),
(6, 'demo', 'upload/images/6471-2022-10-06.jpg', 1, '2022-10-06 16:56:24', '2022-10-06 16:54:34'),
(7, 'demo cat', 'upload/images/7579-2022-10-06.jpg', 0, NULL, '2022-10-06 17:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

CREATE TABLE `delivery_charges` (
  `id` int(11) NOT NULL,
  `delivery_charge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`id`, `delivery_charge`) VALUES
(1, 58);

-- --------------------------------------------------------

--
-- Table structure for table `deliver_pincodes`
--

CREATE TABLE `deliver_pincodes` (
  `id` int(11) NOT NULL,
  `pincode` int(200) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliver_pincodes`
--

INSERT INTO `deliver_pincodes` (`id`, `pincode`) VALUES
(1, 621313),
(2, 675894),
(3, 600028);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `mobile`, `password`, `role`, `experience`, `fees`, `image`) VALUES
(1, 'James', '8428225519', 'james@134', 'Physician ', '14 Years', 500, 'upload/doctors/1662113175.0499.jpg'),
(2, 'Tom', NULL, NULL, 'Cardiologist', '12 Years', 600, 'upload/doctors/2171-2022-09-17.jpg'),
(3, 'Brad', NULL, NULL, 'Orthopedic ', '13 Years', 600, 'upload/doctors/0313-2022-09-17.jpg'),
(4, 'Sarah', '9025635534', 'sarah@123', 'Gynecologist', '18 Years', 600, 'upload/doctors/4249-2022-09-17.jpg'),
(5, 'test', NULL, NULL, 'test', '3', 344, 'upload/doctors/7776-2022-10-06.png');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`) VALUES
(1, 'Payments', 'Hi Divakar how i help you'),
(2, 'Hi', 'new offer availble'),
(3, 'Discounted Health Checkup ', 'Avail the discount on Basic/Specific test packages at our Pathology Centres '),
(4, 'test', 'etetete');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `delivery_charges` int(11) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `method`, `total`, `quantity`, `address`, `mobile`, `delivery_charges`, `order_date`, `status`) VALUES
(6, 5, 1, 'UPI', 2000, 3, '50', '9898989898', 50, '01-11-2000', 'Ordered'),
(7, 5, 1, 'Wallet', 2000, 1, '50', '9898989898', 50, '2022-09-11', 'Ordered'),
(8, 5, 1, 'Wallet', 2000, 1, '50', '9898989898', 50, '2022-09-11', 'Ordered'),
(9, 11, 1, 'COD', 2000, 2, '60', '9797979797', 60, '2022-09-12', 'Ordered'),
(10, 12, 1, 'COD', 2000, 1, '60', '8709095817', 60, '2022-09-16', 'Ordered'),
(11, 14, 2, 'COD', 5000, 1, '60', '9191919191', 60, '2022-09-17', 'Ordered'),
(12, 14, 3, 'COD', 280, 1, '60', '9191919191', 60, '2022-09-17', 'Ordered'),
(13, 14, 3, 'COD', 280, 1, '58', '9191919191', 58, '2022-09-20', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_name` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `pincodes` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `price`, `brand`, `type`, `pincodes`, `description`, `image`) VALUES
(1, 4, 'Pottasium Fertilizer', 2000, 'NPK', NULL, NULL, 'Industry Standard', 'upload/products/9231-2022-09-02.jpg'),
(2, 4, 'Cattle Feed ', 5000, 'RCF', NULL, NULL, 'Best Nutrition For Your Cattle ', 'upload/products/9729-2022-09-17.jpg'),
(3, 1, 'Tea', 280, 'Patent Tea Gold', NULL, NULL, 'Finest Blend Superior Taste ', 'upload/products/7051-2022-09-17.jpg'),
(4, 1, 'Tea', 260, 'Patent Tea Gold', NULL, NULL, 'Premium Tea ', 'upload/products/3134-2022-09-17.jpg'),
(5, 1, 'Tea', 240, 'Patent Tea Morning', NULL, NULL, 'Superior Taste ', 'upload/products/0826-2022-09-17.jpg'),
(6, 1, 'Tea', 220, 'Patent Tea 100', NULL, NULL, 'Bestselling Tea', 'upload/products/9265-2022-09-17.jpg'),
(7, 1, 'test', 3566, 'test', NULL, NULL, 'test', 'upload/products/5967-2022-10-06.png'),
(8, 1, 'test', 3000, 'test', 'all', '', 'fdfdfd', 'upload/products/2282-2022-10-06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `instagram` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `mobile`, `email`, `address`, `whatsapp`, `facebook`, `twitter`, `instagram`) VALUES
(1, 'Admin', '9875689344', 'admin344@gmail.com', 'Tamilnadu,India', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `status`) VALUES
(4, 'Accessibility ', 'upload/slides/6441-2022-09-17.jpg', 1),
(5, 'Daily Needs ', 'upload/slides/5950-2022-09-17.jpg', 1),
(11, 'HealthCare', 'upload/slides/5033-2022-09-17.jpg', 1),
(12, 'Agriculture ', 'upload/slides/6177-2022-09-17.jpg', 1),
(13, 'Fintech ', 'upload/slides/6598-2022-09-17.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` text DEFAULT NULL,
  `end_time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `date`, `start_time`, `end_time`) VALUES
(2, '2022-11-30', '12:08', '04:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `password`, `occupation`, `gender`, `email`, `address`, `village`, `pincode`, `district`, `balance`) VALUES
(1, 'Nehan', '9876543210', '1234', 'Farmer', 'Male', 'sridahar12@gmail.com', NULL, NULL, NULL, NULL, 0),
(2, 'Sanjay', '6544678899', 'sanjay123', 'Farmer', 'Male', 'sanjay123@gmail.com', NULL, NULL, NULL, NULL, 0),
(3, 'Sanjay', '6555678899', 'sanjay123', 'Farmer', 'Male', 'sanjay123@gmail.com', 'ewew', 'ewew', 'dswewe', NULL, 0),
(4, 'Sanjay', '6995678899', 'sanjay123', 'Farmer', 'Male', 'sanjay123@gmail.com', 'ewew', 'ewew', 'dswewe', 'dsds', 0),
(5, 'prasad jp', '9898989898', 'jp123', 'Farmer', 'Male', 'jayaprasad356@gmail.com', 'ghahs', 'jaja', '613279', 'hsbsbs', 650),
(6, 'huhhh', '9999999999', 'sweswe', 'Business', 'Female', 'jayaprasad.s@care.ac.in', 'fgg', 'hhh', 'gy', 'vh', 0),
(7, 'harsh Vardhan', '9717723876', 'Harsh@3434', 'Farmer', 'Male', 'Vardhan1109@gmail.com', 'H.n 343 balu Pura', 'gha', '201001', 'Ghaziabad', 600),
(8, 'Deepak Sharma', '9254447828', 'Dabbu@15', 'Others', 'Male', 'deepaksharma015@gmail.com', 'Narnaul', 'Narnaul', '123001', 'Mahendergarh', 0),
(9, 'prabal pratap singh', '9716332976', '781974', 'Others', 'Male', 'hiprabal@gmail.com', '232/30 E, new kot gaon, G T road', 'new kot gaon', '201001', 'ghaziabad', 0),
(10, 'Surya', '8080808080', '12345678', 'business', 'Male', 'surya@gmail.com', 'East street', 'Nehru Nagar (Ghaziabad)', '201001', 'Ghaziabad', 0),
(11, 'sundar', '9797979797', 'jp123', 'software', 'Male', 'sundar@gmail.com', 'East Street', 'Manambadi', '612503', 'Thanjavur', 500),
(12, 'pankaj', '8709095817', '8709095817', 'Business', 'Male', 'singh4384@gmail.com', 'Bibiganj', 'Bampali', '802312', 'Bhojpur', 0),
(13, 'harry', '9717723878', 'Harsh@3434', 'Business', 'Male', 'vardhan1109@gmail.com', 'hhh', 'Ashok Nagar (Ghaziabad)', '201001', 'Ghaziabad', 0),
(14, 'testID', '9191919191', 'abc123', 'Distributor', 'Male', 'abc@xyz.com', 'n/a', 'New Friends Colony', '110025', 'South Delhi', 0),
(15, 'Nirali', '9650472984', 'qwert6789', 'business', 'Female', 'niralisingh24@gmail.com', 'Uninav heights', 'Raj Nagar Extension', '201017', 'Ghaziabad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`id`, `user_id`, `date`, `amount`, `type`) VALUES
(1, 5, '2022-09-11', 100, 'credit'),
(2, 5, '2022-09-11', 500, 'debit'),
(3, 5, '2022-09-11', 100, 'credit'),
(4, 5, '2022-09-11', 500, 'credit'),
(5, 5, '2022-09-11', 100, 'credit'),
(6, 5, '2022-09-11', 2000, 'credit'),
(7, 11, '2022-09-12', 500, 'credit'),
(8, 7, '2022-09-14', 100, 'credit'),
(9, 7, '2022-09-14', 500, 'credit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver_pincodes`
--
ALTER TABLE `deliver_pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliver_pincodes`
--
ALTER TABLE `deliver_pincodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
