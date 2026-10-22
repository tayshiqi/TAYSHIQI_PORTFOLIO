-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2026 at 01:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` char(35) NOT NULL,
  `admin_contact` char(15) NOT NULL,
  `admin_gender` char(7) NOT NULL,
  `admin_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_contact`, `admin_gender`, `admin_image`) VALUES
(1, 'Tay Shi Qi', 'shiqi@gmail.com', 'e5716d45c49c7538984045b0e526e31a', '0197508983', 'Female', 'shiqi.jpg'),
(2, 'Sinvvy Foo Hui Qing', 'sinvvy@gmail.com', 'acca926c454681635bd0eeeed4004def', '0102061189', 'Female', 'sinvvy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categorytbl`
--

CREATE TABLE `categorytbl` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorytbl`
--

INSERT INTO `categorytbl` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Premium Fruits', 'Premium fruits are high-end, meticulously grown varieties that are known for their exceptional quality, taste, and appearance. These fruits often have specific cultivation techniques, unique flavors, and are considered luxury items. They are perfect for gifting or as a treat for special occasions.'),
(2, 'Stone Fruits', 'Stone fruits are characterized by a large, hard seed or \"stone\" in the center. They are highly valued for their juicy, sweet flesh and are popular in desserts, cooking, or as a fresh snack.'),
(3, 'Seasonal Fruits', 'Seasonal fruits are fresh and available only during specific times of the year. Their limited availability adds to their allure, and they are highly sought after for their peak flavor and quality.'),
(4, 'Citrus Fruits', 'Citrus fruits are known for their tangy and refreshing taste, often used in cooking, beverages, or as fresh snacks. They are versatile and packed with vitamins, especially Vitamin C.');

-- --------------------------------------------------------

--
-- Table structure for table `customertbl`
--

CREATE TABLE `customertbl` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(150) NOT NULL,
  `cust_email` varchar(150) NOT NULL,
  `cust_password` char(35) NOT NULL,
  `cust_contact` char(15) NOT NULL,
  `cust_gender` char(7) NOT NULL,
  `cust_dob` date NOT NULL,
  `cust_join_date` date NOT NULL,
  `cust_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`cust_id`, `cust_name`, `cust_email`, `cust_password`, `cust_contact`, `cust_gender`, `cust_dob`, `cust_join_date`, `cust_image`) VALUES
(1, 'Olaf', 'olaf@gmail.com', '889902e8685899f14a7859d960dc0129', '0123456789', 'Female', '2004-06-13', '2024-12-06', 'lalala.jpg'),
(2, 'Jerry', 'jerry@gmail.com', '750664a5394b899dac8bf17d0a27bda4', '', '', '0000-00-00', '2024-12-25', ''),
(3, 'Totoro', 'totoro@gmail.com', '6d43fc7360732148f35ac43d64daa2fb', '', '', '0000-00-00', '2025-01-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktbl`
--

CREATE TABLE `feedbacktbl` (
  `feedback_id` int(11) NOT NULL,
  `feedback_name` varchar(150) NOT NULL,
  `feedback_email` varchar(150) NOT NULL,
  `feedback_message` text NOT NULL,
  `feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacktbl`
--

INSERT INTO `feedbacktbl` (`feedback_id`, `feedback_name`, `feedback_email`, `feedback_message`, `feedback_date`) VALUES
(1, 'Jerry', 'jerry@gmail.com', 'Hi', '2024-12-07'),
(2, 'Tom', 'tom@gmail.com', 'haha', '2024-12-24'),
(3, 'aa', 'aa@gmail.com', 'aa', '2024-12-24'),
(4, 'hhh', 'ghh@gmail.com', 'haha', '2025-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `itemtbl`
--

CREATE TABLE `itemtbl` (
  `item_id` int(11) NOT NULL,
  `item_product_price` decimal(10,2) NOT NULL,
  `item_quantity` int(5) NOT NULL,
  `item_rating` int(1) NOT NULL,
  `item_comment` text NOT NULL,
  `item_rating_date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemtbl`
--

INSERT INTO `itemtbl` (`item_id`, `item_product_price`, `item_quantity`, `item_rating`, `item_comment`, `item_rating_date`, `product_id`, `order_id`) VALUES
(32, 800.00, 2, 4, 'aa', '2024-12-20', 1, 8),
(33, 350.00, 2, 0, '', '0000-00-00', 2, 8),
(34, 1000.00, 2, 3, 'aa', '2024-12-20', 3, 8),
(35, 1115.00, 2, 0, '', '0000-00-00', 4, 8),
(36, 340.00, 2, 5, 'aa', '2024-12-20', 5, 8),
(37, 900.00, 2, 0, '', '0000-00-00', 6, 8),
(38, 457.00, 2, 0, '', '0000-00-00', 7, 8),
(39, 110.00, 2, 0, '', '0000-00-00', 8, 8),
(40, 120.00, 2, 0, '', '0000-00-00', 9, 8),
(41, 310.00, 2, 0, '', '0000-00-00', 10, 8),
(42, 98.00, 2, 0, '', '0000-00-00', 11, 8),
(43, 309.00, 2, 0, '', '0000-00-00', 12, 8),
(44, 87.00, 2, 0, '', '0000-00-00', 13, 8),
(45, 150.00, 2, 0, '', '0000-00-00', 14, 8),
(46, 98.00, 2, 0, '', '0000-00-00', 15, 8),
(47, 95.00, 2, 0, '', '0000-00-00', 16, 8),
(48, 457.00, 1, 0, '', '0000-00-00', 7, 9),
(49, 180.00, 3, 0, '', '0000-00-00', 17, 9),
(50, 87.00, 2, 0, '', '0000-00-00', 13, 9),
(51, 95.00, 3, 0, '', '0000-00-00', 16, 10),
(52, 900.00, 3, 0, '', '0000-00-00', 6, 10),
(53, 110.00, 2, 0, '', '0000-00-00', 8, 11),
(54, 98.00, 4, 0, '', '0000-00-00', 11, 11),
(55, 150.00, 1, 0, '', '0000-00-00', 14, 11),
(56, 87.00, 2, 0, '', '0000-00-00', 13, 12),
(57, 98.00, 1, 0, '', '0000-00-00', 15, 12),
(58, 350.00, 1, 0, '', '0000-00-00', 2, 12),
(59, 120.00, 1, 0, '', '0000-00-00', 9, 13),
(60, 180.00, 2, 0, '', '0000-00-00', 17, 13),
(61, 800.00, 2, 0, '', '0000-00-00', 1, 14),
(62, 1115.00, 1, 0, '', '0000-00-00', 4, 15),
(63, 98.00, 2, 0, '', '0000-00-00', 11, 16),
(64, 350.00, 2, 0, '', '0000-00-00', 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_receiver_name` varchar(150) NOT NULL,
  `order_receiver_contact` char(15) NOT NULL,
  `order_delivery_address` text NOT NULL,
  `order_delivery_date` date NOT NULL,
  `order_payment_method` varchar(100) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`order_id`, `order_date`, `order_receiver_name`, `order_receiver_contact`, `order_delivery_address`, `order_delivery_date`, `order_payment_method`, `order_status`, `cust_id`) VALUES
(8, '2024-12-20', 'aa', '012-3456789', 'aa', '2024-12-19', 'Pay-Pal', 'Received', 1),
(9, '2024-12-25', 'qq', '0189632365', 'qq', '0000-00-00', 'Pay-Pal', 'Pending', 2),
(10, '2024-12-25', 'ww', 'ww', 'ww', '0000-00-00', 'Pay-Pal', 'Pending', 2),
(11, '2024-12-25', 'rr', '0154789235', 'rr', '2024-12-25', 'Credit Card', 'Out for Delivery', 2),
(12, '2024-12-25', 'kk', '0145632145', 'kk', '0000-00-00', 'Debit Card', 'Pending', 2),
(13, '2024-12-25', 'ff', '0189632365', 'ff', '0000-00-00', 'Touch n Go eWallet', 'Pending', 2),
(14, '2025-01-17', 'Totoro', '0134562345', 'No.5, Jalan Toro 1, Taman Toro, 78963, Melaka, Malaysia.', '2025-01-17', 'Online Banking', 'Received', 3),
(15, '2025-01-23', 'll', '4554', 'll', '0000-00-00', 'Debit Card', 'Pending', 1),
(16, '2025-01-30', 'ss', '12304562113', 'ss', '0000-00-00', 'Debit Card', 'Pending', 1),
(17, '2025-01-30', 'ee', '1235', 'ee', '0000-00-00', 'Pay-Pal', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `producttbl`
--

CREATE TABLE `producttbl` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_stock_level` int(5) NOT NULL,
  `product_date_created` date NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttbl`
--

INSERT INTO `producttbl` (`product_id`, `product_name`, `product_description`, `product_price`, `product_stock_level`, `product_date_created`, `product_image`, `category_id`) VALUES
(1, 'Yubari King Melons', 'These prized melons from Hokkaido are known for their vibrant orange flesh, intensely sweet taste, and a fragrance that sets them apart as a luxury fruit.', 800.00, 292, '2024-12-05', 'yubari king melon.jpg', 1),
(2, 'Kyoho Grapes', 'Large, juicy, and dark purple, Kyoho grapes have a delicate balance of sweetness and acidity with a unique muscat flavor.', 350.00, 93, '2024-12-05', 'Kyoho_Grapes.jpg', 1),
(3, 'Shine Muscat Grapes', 'Renowned for their crisp, seedless texture, these green grapes offer a sweet, aromatic profile, often described as candy-like.', 1000.00, 198, '2024-12-17', 'Shine_Muscat_Grapes.jpg', 1),
(4, 'Ruby Roman Grapes', 'This high-end variety boasts large, ruby-red grapes with a perfect balance of sweetness and low acidity, making them one of the most luxurious grapes worldwide.\r\n', 1115.00, 145, '2024-12-06', 'Ruby_Roman_Grapes.jpg', 1),
(5, ' Amaou', 'Known for their large size, sweetness, and distinct aroma, these Fukuoka-grown strawberries are a seasonal favorite in Japan. ', 340.00, 398, '2024-12-07', 'Amaou.webp', 3),
(6, 'Sato Nishiki', 'Known for their glossy red color and delicate sweetness, these cherries from Yamagata are celebrated for their rich flavor and juiciness.', 900.00, 105, '2024-12-08', 'Sato_Nishiki.jpg', 3),
(7, 'Kaki', 'A traditional Japanese autumn fruit, persimmons offer a honey-like sweetness and smooth, tender texture when fully ripe.', 457.00, 117, '2024-12-10', 'Kaki.webp', 3),
(8, 'Nashi Pears ', 'These round, crisp pears have a refreshing, juicy texture with a mild sweetness, making them a favorite during the fall season.', 110.00, 144, '2024-12-08', 'Nashi_Pears.jpg', 3),
(9, 'Japanese Mandarins', 'Seedless, easy to peel, and rich in sweetness, Mikans are a winter staple with a bright, tangy flavor.', 120.00, 225, '2024-12-17', 'Japanese_Mandarins.webp', 4),
(10, 'Yuzu', 'Known for its unique aromatic zest, Yuzu is used to enhance the flavor of dishes and beverages with its refreshing, tangy citrus taste.', 310.00, 498, '2024-12-13', 'Yuzu.jpg', 4),
(11, 'Dekopon', 'This citrus variety is prized for its exceptionally sweet, juicy flesh and a unique, knobby appearance at the top.\r\n', 98.00, 272, '2024-12-13', 'Dekopon.jpg', 4),
(12, 'Sudachi', 'Small, green, and very aromatic, Sudachi is often used as a garnish or in sauces for its sour, zesty flavor, enhancing savory dishes.', 309.00, 398, '2024-12-10', 'Sudachi.jpg', 4),
(13, 'Momo', 'With their delicate, fragrant aroma, these peaches have tender, juicy flesh and are celebrated for their mild sweetness.', 87.00, 124, '2024-12-12', 'Momo.jpeg', 2),
(14, 'Ume', 'Known for their tart flavor, ume plums are often used for pickling and making the popular Japanese plum wine, umeshu.', 150.00, 147, '2024-12-12', 'Ume.webp', 2),
(15, 'Sakuranbo', 'These small, red cherries have a delicate balance of sweetness and tartness and are a beloved summer fruit.', 98.00, 117, '2024-12-11', 'Sakuranbo.jpeg', 2),
(16, 'Anzu', 'Offering a mildly sweet and slightly tangy flavor, Japanese apricots are enjoyed fresh or in jams, bringing a hint of summer to the palate.', 95.00, 95, '2024-12-09', 'Anzu.jpeg', 2),
(17, 'Densuke Watermelon', 'The Densuke Watermelon is a rare, black-skinned variety from Hokkaido, prized for its exceptional sweetness and crisp texture. It’s a luxury item often gifted in premium packaging.', 180.00, 115, '2024-12-13', 'Densuke Watermelon.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categorytbl`
--
ALTER TABLE `categorytbl`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `itemtbl`
--
ALTER TABLE `itemtbl`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `producttbl`
--
ALTER TABLE `producttbl`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorytbl`
--
ALTER TABLE `categorytbl`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itemtbl`
--
ALTER TABLE `itemtbl`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `ordertbl`
--
ALTER TABLE `ordertbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `producttbl`
--
ALTER TABLE `producttbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
