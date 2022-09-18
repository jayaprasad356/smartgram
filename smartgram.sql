-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 07:14 AM
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
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `doctor_id`, `name`, `mobile`, `age`, `disease`, `place`, `history`, `description`) VALUES
(1, NULL, 1, 'kerant', '8847474844', '45', 'Bacterial Disease', 'Trichy', NULL, 'last one weeks i am injured by this'),
(2, 5, 1, 'prasad', NULL, '25', 'sugar', 'sholapuram', 'nothing', 'prasad am patient');

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
(1, 1, 1, 3, '2022-09-09 10:22:55');

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
(1, 'solid Fertilizers', 'upload/images/6545-2022-09-02.jpg', 1, '2022-09-02 04:40:08', '2022-09-02 04:36:07'),
(2, 'Liquid', 'upload/images/4735-2022-09-09.', 0, NULL, '2022-09-09 07:27:24'),
(3, 'Liquid', 'upload/images/9572-2022-09-09.jpg', 0, NULL, '2022-09-09 07:28:57');

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
(1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `role` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `role`, `experience`, `fees`, `image`) VALUES
(1, 'James', 'Veterinary doctor', '4 Years', 100, 'upload/doctors/1662113175.0499.jpg');

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
(1, 'Payments', 'Hi Divakar how i help you');

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
(8, 5, 1, 'Wallet', 2000, 1, '50', '9898989898', 50, '2022-09-11', 'Ordered');

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
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `price`, `brand`, `description`, `image`) VALUES
(2, 1, 'Pottassium Fertilizer', 2000, 'NPK', 'You would use this material without adding water', 'upload/products/2218-2022-09-18.jpg');

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
(1, 'Admin', '9875689939', 'admin344@gmail.com', 'Tamilnadu,India', 'https;//whatsapp.com', 'https://admin.facebook.com', 'admin454@twitter.com', 'https://admin123.instagram.in');

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
(1, 'Fertilizers', 'upload/slides/7277-2022-09-02.jpg', 0);

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
(5, 'prasad jp', '9898989898', '12345', 'Farmer', 'Male', 'jayaprasad356@gmail.com', 'ghahs', 'jaja', '613279', 'hsbsbs', 650),
(6, 'huhhh', '9999999999', 'sweswe', 'Business', 'Female', 'jayaprasad.s@care.ac.in', 'fgg', 'hhh', 'gy', 'vh', 0),
(7, 'harsh Vardhan', '9717723876', 'Harsh@3434', 'Farmer', 'Male', 'Vardhan1109@gmail.com', 'H.n 343 balu Pura', 'gha', '201001', 'Ghaziabad', 0),
(8, 'Deepak Sharma', '9254447828', 'Dabbu@15', 'Others', 'Male', 'deepaksharma015@gmail.com', 'Narnaul', 'Narnaul', '123001', 'Mahendergarh', 0),
(9, 'prabal pratap singh', '9716332976', '781974', 'Others', 'Male', 'hiprabal@gmail.com', '232/30 E, new kot gaon, G T road', 'new kot gaon', '201001', 'ghaziabad', 0);

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
(6, 7, '2022-09-11', 2000, 'credit');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
