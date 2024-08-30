-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql206.byetcluster.com
-- Generation Time: Aug 30, 2024 at 05:11 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36993429_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_title`) VALUES
(1, 'Shoes'),
(2, 'Bags'),
(3, 'Belts'),
(4, 'Wallets');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `item_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`item_id`, `ip_address`) VALUES
(2, '223.224.1.141'),
(115, '223.224.30.148'),
(117, '101.2.182.199'),
(103, '223.224.1.174'),
(80, '223.224.1.174'),
(97, '223.224.1.174');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `item_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`item_id`, `color`) VALUES
(1, 'black'),
(1, 'brown'),
(2, 'brown'),
(3, 'black'),
(3, 'brown'),
(5, 'black'),
(5, 'blue'),
(6, 'black'),
(6, 'brown'),
(7, 'black'),
(7, 'brown'),
(8, 'brown'),
(10, 'brown'),
(10, 'blue'),
(11, 'brown'),
(12, 'brown'),
(13, 'brown'),
(23, 'black'),
(23, 'brown'),
(24, 'brown'),
(25, 'brown'),
(26, 'blue'),
(27, 'brown'),
(28, 'black'),
(28, 'pink'),
(29, 'brown'),
(29, 'red'),
(30, 'purple'),
(30, 'pink'),
(30, 'green'),
(31, 'green'),
(32, 'brown'),
(33, 'black'),
(33, 'red'),
(33, 'green'),
(34, 'black'),
(36, 'black'),
(36, 'brown'),
(37, 'black'),
(37, 'brown'),
(38, 'black'),
(38, 'brown'),
(39, 'black'),
(39, 'red'),
(39, 'blue'),
(40, 'brown'),
(41, 'brown'),
(42, 'purple'),
(43, 'black'),
(45, 'brown'),
(46, 'brown'),
(47, 'brown'),
(48, 'red'),
(49, 'pink'),
(50, 'black'),
(50, 'brown'),
(51, 'black'),
(51, 'brown'),
(51, 'yellow'),
(52, 'black'),
(53, 'black'),
(53, 'brown'),
(54, 'brown'),
(54, 'blue'),
(55, 'black'),
(55, 'brown'),
(56, 'black'),
(56, 'brown'),
(56, 'blue'),
(57, 'black'),
(57, 'brown'),
(58, 'black'),
(58, 'brown'),
(59, 'black'),
(59, 'brown'),
(60, 'black'),
(60, 'brown'),
(60, 'grey'),
(62, 'black'),
(62, 'brown'),
(63, 'black'),
(63, 'brown'),
(64, 'black'),
(64, 'brown'),
(64, 'blue'),
(65, 'black'),
(65, 'brown'),
(66, 'black'),
(66, 'brown'),
(67, 'black'),
(67, 'brown'),
(67, 'red'),
(68, 'black'),
(68, 'brown'),
(68, 'blue'),
(69, 'black'),
(69, 'white'),
(70, 'black'),
(70, 'brown'),
(71, 'black'),
(71, 'brown'),
(72, 'black'),
(73, 'black'),
(74, 'black'),
(74, 'brown'),
(75, 'red'),
(76, 'black'),
(76, 'brown'),
(77, 'black'),
(77, 'brown'),
(78, 'black'),
(78, 'brown'),
(79, 'black'),
(80, 'black'),
(80, 'brown'),
(81, 'black'),
(81, 'white'),
(82, 'black'),
(82, 'brown'),
(82, 'gold'),
(83, 'black'),
(83, 'brown'),
(83, 'purple'),
(84, 'black'),
(84, 'brown'),
(85, 'black'),
(85, 'brown'),
(86, 'black'),
(86, 'brown'),
(86, 'blue'),
(86, 'grey'),
(87, 'black'),
(87, 'brown'),
(88, 'black'),
(89, 'black'),
(89, 'brown'),
(90, 'black'),
(90, 'brown'),
(91, 'black'),
(92, 'black'),
(92, 'brown'),
(92, 'white'),
(93, 'black'),
(93, 'brown'),
(93, 'white'),
(93, 'grey'),
(94, 'black'),
(94, 'brown'),
(95, 'black'),
(95, 'brown'),
(95, 'blue'),
(95, 'white'),
(96, 'black'),
(96, 'brown'),
(96, 'white'),
(97, 'brown'),
(98, 'black'),
(98, 'brown'),
(99, 'black'),
(99, 'brown'),
(100, 'black'),
(100, 'brown'),
(101, 'black'),
(101, 'brown'),
(101, 'grey'),
(102, 'black'),
(102, 'pink'),
(102, 'red'),
(102, 'white'),
(103, 'black'),
(103, 'pink'),
(103, 'red'),
(103, 'yellow'),
(104, 'black'),
(104, 'purple'),
(104, 'green'),
(104, 'blue'),
(105, 'black'),
(105, 'brown'),
(105, 'purple'),
(105, 'blue'),
(106, 'black'),
(106, 'brown'),
(106, 'red'),
(106, 'blue'),
(107, 'black'),
(107, 'purple'),
(107, 'red'),
(107, 'white'),
(108, 'black'),
(108, 'pink'),
(108, 'blue'),
(108, 'grey'),
(109, 'black'),
(109, 'brown'),
(109, 'red'),
(109, 'grey'),
(110, 'brown'),
(111, 'brown'),
(111, 'pink'),
(111, 'white'),
(111, 'yellow'),
(112, 'black'),
(112, 'brown'),
(112, 'pink'),
(113, 'pink'),
(114, 'black'),
(114, 'purple'),
(114, 'green'),
(114, 'grey'),
(115, 'brown'),
(116, 'brown'),
(117, 'brown'),
(118, 'black'),
(118, 'brown'),
(119, 'black'),
(119, 'brown'),
(119, 'red'),
(120, 'black'),
(120, 'brown'),
(121, 'black'),
(122, 'black'),
(122, 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `item_image1` varchar(255) NOT NULL,
  `item_image2` varchar(255) NOT NULL,
  `item_image3` varchar(255) NOT NULL,
  `item_image4` varchar(255) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  `item_old_price` decimal(10,0) NOT NULL,
  `item_sold` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_title`, `item_description`, `item_keyword`, `category_id`, `batch_id`, `item_image1`, `item_image2`, `item_image3`, `item_image4`, `item_price`, `item_old_price`, `item_sold`, `star`, `date`) VALUES
(1, 'Classic Leather Wallet', 'The Classic Leather Original Wallet by Allett is a proven, tried-and-true wallet design that looks bigger than your usual bifold.', 'wallet,mens wallet,black wallet', 1, 4, 'classic leather wallet3.png.png', 'classic leather wallet1.png.png', 'classic leather wallet2.png.png', '71shcY+KkDL._AC_SX569_.jpg', '12000', '14000', 4, 4, '2024-08-29 07:57:51'),
(2, ' Backpack Lether Bag', 'Crafted from premium leather, this stylish backpack combines durability with a sleek design, offering ample storage for your essentials. Perfect for both casual and professional settings.', 'bags,backpack,mens backpack,brown backpack', 1, 2, 'Backpack1.png', 'Backpack2.png', 'Backpack3.png', 'Backpack4.png', '39000', '42000', 8, 4, '2024-08-29 07:52:26'),
(3, 'Bi-Fold Leather Wallet', ' Made from soft and supple genuine leather, this unique bifold wallet for men is really two wallets in one. The main wallet has six credit card slots, two key holders,and two stripe lined currency pockets with a separator.', 'mens wallet,bi fold wallet,brown wallet', 1, 4, 'bi fold wallet1.jpg.jpg', 'bi fold wallet.jpg.jpg', '91loyOMWR-L._AC_SY679_.jpg', '91SdFnVADyL._AC_SY679_.jpg', '14000', '16000', 5, 5, '2024-08-04 14:06:59'),
(5, 'Coin Wallet', 'A leather coin wallet is a small, compact pouch made from high-quality leather. It typically features a snap closure or zipper, ensuring that the coins stay in place, and often includes a lined interior for added durability and protection. Ideal for every', 'mens wallet,coin wallet,blue wallet', 1, 4, 'mens coin 1.jpg', 'mens coin 2.jpg', '61BW8U6u2zL._AC_SX466_.jpg', '81tMRii0NIL._AC_SX466_.jpg', '10500', '12000', 4, 4, '2024-08-07 05:59:42'),
(6, 'Hornbull Leather Wallet', 'Compact yet functional, its Effortless design is Compatible with a range of Styles.', 'wallet,mens wallet,coin wallet', 1, 4, 'hornbull1.jpg', 'hornbull2.jpg', 'hornbul3.jpg', 'hornbull4.jpg', '13000', '14000', 5, 4, '2024-08-04 15:04:11'),
(7, 'RFID Blocking Wallet', 'An RFID-blocking wallet prevents contactless scanning, which is also known as a \"skimming attack.RFID blocking is a proven, effective solution to keeping data safe.', 'wallet,mens wallet,rfid wallet', 1, 4, 'RFID1.jpg', 'RFID2.jpg', '71sAOUJg91L._AC_SX466_.jpg', '71qW1dfJ6VL._AC_SX466_.jpg', '10000', '11000', 5, 5, '2024-08-04 15:15:39'),
(8, 'Slim Minimalist Wallet', 'Pick up this Handmade Leather Front Pocket Wallet and cut down on the bulk of a conventional wallet. ', 'wallet,mens wallet,brown wallet', 1, 4, 'minimalist1.jpg', 'minimalist2.jpg', '81QoTtflFhL._AC_SX466_.jpg', '81xWgrVVWdL._AC_SX466_.jpg', '15000', '16000', 8, 5, '2024-08-04 15:31:13'),
(10, 'Money Clip Wallet', 'a money clip wallet typically features a slim profile, a sturdy clip to secure bills, and slots or pockets for cards, making it a practical and stylish option for those who prefer to carry only the essentials.', 'wallet,mens wallet,blue wallet', 1, 4, 'money new.jpg', 'money2.jpg', '91Pakr+lUDL._AC_SX569_ (1).jpg', '81yqeLNOcpL._AC_SX679_.jpg', '13000', '14000', 5, 5, '2024-08-04 15:56:09'),
(11, 'Messanger Lether Bag', 'A messenger bag is a versatile and practical accessory designed for both style and functionality. Messenger bags often include multiple pockets for organizing essentials such as laptops, documents, and personal items, making them ideal for commuting or ca', 'bag,mens bags,Brown', 1, 2, 'Messanger Bag1.png', 'Messanger Bag2.jpg', 'Messanger Bag3.jpg', 'Messanger Bag4.jpg', '34600', '36000', 9, 4, '2024-08-29 08:20:28'),
(12, 'Crossbody Lether Bag', 'Sleek and versatile, this leather crossbody bag offers hands-free convenience with a modern edge. Crafted from premium leather, it features an adjustable strap, secure zipper closure, and enough space to carry your essentials in style. Perfect for everyda', 'bags,mens bags,crossbody bags,brown bags', 1, 2, 'crossbody  bag1.png', 'Crossbody bag2.jpg', 'Crossbody bag3.jpg', 'Crossbody bag4.jpg', '34500', '36900', 10, 4, '2024-08-29 08:33:56'),
(13, 'Duffle Lether Bag', 'A sleek and durable leather duffle bag, perfect for weekend getaways or gym trips, featuring a spacious interior, sturdy handles, and a detachable shoulder strap for versatile carrying options.', 'bags,mens bags,duffle bags,brown bags', 1, 2, 'Duffle bag1.png', 'Duffle bag2.png', 'Duffle bag3.png', 'Duffle bag4.png', '43000', '45000', 7, 5, '2024-08-29 08:25:12'),
(23, 'Zip Around Wallet', 'A zip-around wallet is a type of wallet that features a zipper closure around its edges, ensuring the contents are securely enclosed. This design typically includes multiple compartments for organizing cards, cash, and coins, providing both security and c', 'wallet,mens wallet,black wallet', 1, 4, 'zip3.jpg', 'zip around2.jpg', '81-mJTrm8uL._AC_SX466_.jpg', '815ksiNkutL._AC_SX466_.jpg', '15000', '16500', 5, 4, '2024-08-05 05:33:43'),
(24, 'Fanny pack Bag', 'Stylish leather fanny pack with adjustable strap, multiple compartments, and sleek designâ€”perfect for hands-free convenience on the go.', 'bags,mens bags,fanny pack,brown bags', 1, 2, 'Fanny pack bag1.png', 'Fanny pack  bag2.png', 'Fanny pack  bag3.png', 'Fanny pack bag4.png', '22500', '25000', 10, 5, '2024-08-06 04:55:42'),
(25, 'Sling Lether Bag', 'This leather sling bag offers a sleek, compact design, perfect for carrying essentials with style. Crafted from high-quality leather, it features an adjustable strap, secure zip closures, and multiple pockets for organized storage. Ideal for everyday use ', 'bags,mens bags,sling bags,brown bags', 1, 2, 'Sling bag1.png', 'sling  bag2.png', 'Sling  bag3.png', 'sling bag4.png', '29000', '31000', 9, 4, '2024-08-29 08:26:22'),
(26, 'Clutch Wallet', ' leather clutch wallet is a stylish and practical accessory designed for carrying essential items. Made from high-quality leather, it typically features multiple compartments for organizing cash, cards, and identification. Compact yet spacious, it offers ', 'wallet,mens wallet,blue wallet', 1, 4, 'Brown Minimalist Typography Coming Soon Instagram Post.jpg', '71BH9cyA6tL._AC_SY575_.jpg', '81gqln-gMiL._AC_SY575_.jpg', '61Zp3EOKqVL._AC_SY575_.jpg', '14700', '16000', 6, 5, '2024-08-05 05:56:20'),
(27, 'Weekender Lether bag', 'A sleek and durable leather Weekender bag, perfect for short trips, featuring a spacious main compartment, sturdy handles, and a detachable shoulder strap for versatile carry options.', 'bags,mens bags,weekender bags,brown bags', 1, 2, 'weekender  bag1.png', 'Weekender  bag2.png', 'Weekender  bag3.png', 'Weekender bag4.png', '39000', '41000', 11, 5, '2024-08-29 08:28:11'),
(28, 'Trifold Wallet', 'Our ladies compact Trifold Wallet is handmade with the finest quality leather which is extremely soft, comfortable and durable.', 'wallet,womens wallet,black wallet', 2, 4, '3fold1.jpg', '3 fold2.jpg', '61v71p48UxL._AC_SX466_.jpg', '61sH2FkUxiL._AC_SX466_.jpg', '10000', '11500', 5, 5, '2024-08-05 08:16:30'),
(29, 'Classic Bifold Wallet', 'Check out our classic bifold wallet selection for the very best in unique or custom, handmade pieces from our wallets shops.', 'wallet,womens wallet,red wallet,brown wallet', 2, 4, 'bifold 1.jpg', 'bifold2.jpg', '81Iz5Oep+zL._AC_SX569_.jpg', '81V3sAGgGgL._AC_SX569_.jpg', '15000', '17000', 7, 5, '2024-08-05 08:36:28'),
(30, 'Leather Zipper Wallet', 'These zip-around wallets come in a range of colors, from classic nudes that can match any outfit to bright colors that will surely stand out.', 'wallet,womens wallet,purple wallet,green wallet', 2, 4, 'zipper1.jpg', 'zipper2.jpg', 'zipper3.jpg', '71TDux5jJhL._AC_SX569_.jpg', '16000', '17000', 6, 5, '2024-08-05 08:54:06'),
(31, 'Vegan Leather Wallet', ' high-quality vegan leather goods are made ethically and carbon-neutrally in Italy and Portugal. These are the best vegan wallets for women in 2024.', 'wallet,womens wallet,green wallet', 2, 4, 'vegan1.jpg', '61jNR+KbLfL._AC_SL1200_.jpg', '61c8ejNQYIL._AC_SL1200_.jpg', '61p-AW-R51L._AC_SX466_.jpg', '12000', '13500', 6, 4, '2024-08-05 09:02:33'),
(32, 'Briefcase Lether Bag', 'A leather briefcase bag is a stylish and durable accessory, perfect for professionals. It offers ample space for documents, laptops, and essentials, with secure compartments and a classic design suitable for any business setting.', 'bags,mens bags,briefcase,briefcase brown bags', 1, 2, 'Briefcase  bag1.png', 'Briefcase  bag2.png', 'Briefcase  bag3.png', 'briefcase bag4.png', '36500', '37000', 7, 5, '2024-08-29 08:31:05'),
(33, 'Double Zipper Wallet', 'wallet is made of high-quality genuine leather, soft, smooth, lightweight, portable, and durable. High-quality metal zipper, easy to use, more durable, and more protective.Large Storage Space and Zipper Protection', 'wallet,womens wallet,black wallet,green wallet,red wallet', 2, 4, 'double zipper1.jpg', 'double zipper2.jpg', '71ncbomXj9L._AC_SX466_.jpg', '71wUROob+-L._AC_SX466_.jpg', '13000', '14500', 7, 5, '2024-08-05 10:31:59'),
(34, 'Portfolio  Lether Bag', 'This leather portfolio bag offers a sleek design, combining elegance and functionality. Crafted from high-quality leather, it features multiple compartments for documents, a padded sleeve for laptops, and pockets for accessories. Ideal for professionals o', 'bags,mens bags,black bags', 1, 2, 'portfolio bag1.png', 'portfolio  bag2.png', 'portfolio  bag3.png', 'portfolio bag4.png', '29000', '32000', 12, 5, '2024-08-14 15:46:34'),
(36, 'Coin Wallet', 'The mini coin purse is made of high-quality leather, which is soft and smooth. The touch is comfortable, the zipper is strong, the stitches are well sewn, and the needle is neat. The most praise thing its the eye-catching bee decoration. It can be used fo', 'wallet,coin wallet,black wallet,brown wallet', 2, 4, 'womens coin wallet1.jpg', 'coin wallet2.jpg', '81oZsF-VMEL._AC_SX569_.jpg', '713EIdWpfjL._AC_SX569_.jpg', '8000', '10000', 5, 5, '2024-08-05 10:57:48'),
(37, 'Chain Wallet', ' A wallet chain is a must-have accessory for the person who is always on the go. It secures your wallet to your belt, providing an extra layer of security to your valuables, keeping your wallet from falling from your pocket.', 'wallet,womens wallet,black wallet,brown wallet', 2, 4, 'chain wallet 1.jpg', 'chain wallet2.jpg', 'chain wallet3.jpg', 'chain wallet4.jpg', '15000', '16500', 8, 4, '2024-08-05 11:10:38'),
(38, 'Wristlet Wallet', 'Wristlet wallet for women features as one small bag or wristlet purse. It also attaches to a wrist strap for carrying or wearing on your shoulder.  ', 'wallet,womens wallet,black wallet,brown wallet', 2, 4, 'wristlet4.jpg', 'wrislet wallet 1.jpg', '71jbBSB2nRL._AC_SX569_.jpg', '71hdqlwchPL._AC_SX569_.jpg', '14000', '16000', 8, 5, '2024-08-05 12:33:52'),
(39, 'Mini Wallet', ' Crafted from high-quality leather, it typically features a few card slots, a small compartment for cash, and sometimes a coin pocket. Its petite size makes it perfect for slipping into a small handbag or even a pocket, ideal for those who prefer to carry', 'wallet,womens wallet,mini wallet,blue wallet,red wallet', 2, 4, 'mini wallet1.jpg', 'mini wallet 2.jpg', '71LiyHp+ZEL._AC_SX569_.jpg', '81fIKAFgZTL._AC_SX569_.jpg', '8500', '10000', 8, 5, '2024-08-05 12:55:15'),
(40, 'Backpack Lether Bag', 'This women\'s leather backpack is a stylish and versatile accessory crafted from premium leather. It features multiple compartments for organized storage, adjustable straps for comfort, and a sleek design that complements any outfit, making it perfect for ', 'bags,womens bags,backpack bags,brown bags', 2, 2, 'backpack bag1.png', 'backpack  bag2.png', 'backpack  bag3.png', 'backpack bag4.png', '32500', '34000', 12, 4, '2024-08-29 08:46:06'),
(41, 'Bucket Lether Bag', 'This women\'s leather bucket bag is crafted from premium leather, offering a sleek and modern design. It features a spacious interior, adjustable strap, and secure drawstring closure, making it both stylish and functional for everyday use.', 'bags,womens bags,brown bags', 2, 2, '_ Bucket bag1.png', 'Bucket  bag2.png', 'Bucket  bag3.png', 'Bucket bag4.png', '38900', '41000', 9, 5, '2024-08-29 08:49:00'),
(42, 'Clutch Lether Bag', 'A sleek and stylish women\'s leather clutch bag, perfect for carrying essentials. Crafted from high-quality leather with a minimalist design, it features a secure zip closure and a versatile wrist strap for easy carrying. Ideal for both casual outings and ', 'bags,women bags,purple bags', 2, 2, 'clutch bag1.png', 'clutch  bag2.png', 'clutch  bag3.png', 'clutch bag4.png', '29000', '32000', 12, 5, '2024-08-05 14:49:08'),
(43, 'Doctor Lether Bag', 'A women\'s leather doctor bag, designed with classic elegance, features a structured silhouette, premium leather craftsmanship, and a spacious interior for essentials, making it both stylish and functional.', 'bags,womens bags,black bags,doctor bags', 2, 2, 'doctor bag1.png', 'doctor  bag2.png', 'doctor  bag3.png', 'doctor bag4.png', '45000', '47000', 13, 4, '2024-08-05 15:16:47'),
(45, 'Hobo Lether Bag', '\"Elegant and versatile, this women\'s leather hobo bag features a spacious interior, soft yet durable leather, and a slouchy silhouette perfect for everyday wear.\"', 'bags,womens bag,brown bags', 2, 2, 'hobo bag1.png', 'Hobo  bag2.png', 'Hobo  bag3.png', 'Hobo bag4.png', '30000', '31000', 5, 4, '2024-08-05 15:52:19'),
(46, 'Saddle Lether Bag', 'This women\'s leather saddle bag features a timeless design with a sleek, curved silhouette. Crafted from premium leather, it offers durability and style, perfect for both casual and formal occasions. The adjustable strap provides versatile carrying option', 'bags,womens bags,brown bags,saddle brown bags', 2, 2, 'saddle bag1.png', 'saddle  bag2.png', 'saddle  bag3.png', 'saddle bag4.png', '38500', '39500', 7, 4, '2024-08-05 16:08:02'),
(47, 'Shoulder Lether Bag', 'A chic and versatile women\'s leather shoulder bag, crafted from premium leather, features a sleek design with ample space for essentials. Perfect for both casual and formal occasions, this bag offers comfort and style with its adjustable strap and secure ', 'bags,womens bags,shoulder bags,brown bags', 2, 2, 'shoulder bag1.png', 'shoulder  bag2.png', 'shoulder  bag3.png', 'shoulder bag4.png', '29500', '32500', 5, 5, '2024-08-05 16:18:18'),
(48, 'Tote Lether Bag', 'A stylish women\'s leather tote bag, crafted from high-quality genuine leather, featuring spacious compartments, sturdy handles, and a sleek design perfect for everyday use or a night out.', 'bags,womens bags,tote womens tote bags,red bags', 2, 2, 'tote bag1.png', 'tote  bag2.png', 'tote  bag3.png', 'tote bag4.png', '46500', '48000', 9, 4, '2024-08-29 08:44:29'),
(49, 'Crossbody Lether Bag', 'A sleek and stylish women\'s leather crossbody bag, perfect for everyday use, featuring a durable strap, secure zip closure, and multiple compartments to keep your essentials organized.', 'bags,womens bags,pink bag,crossbody bag', 2, 2, 'women crossbody bag1.png', 'women crossbody  bag2.png', 'women crossbody  bag3.png', 'women crossbody  bag4.png', '34000', '37000', 10, 4, '2024-08-14 16:21:58'),
(50, 'Boot Leather Belt', 'Men\'s leather belt made with 100 percent genuine leather for a soft smooth feel.  Order 1 size larger than your pant size for the best fit Perfect men\'s durable work belt that will soon become your favorite go-to durable leather belt. The perfect men\'s be', 'belt, mens belt, boot, black belt, brown belt', 1, 3, 'boot 1.png', 'boot 2.png', 'boot 3.jpg', 'boot 4.jpg', '13000', '15000', 6, 4, '2024-08-05 17:41:20'),
(51, 'Noble Leather', 'Leather has a number of very special, natural properties: It is breathable, heat-insulating, stretchy, tearproof and  abrasion-resistant and acts a barrier against moisture evaporation. It is also robust, making the shoe more stable and functional.  From ', 'shoe,men shoe,brown shoe,black shoe,yellow shoe', 1, 1, 'Let1.png', 'let3.png', 'let4.png', 'let5.png', '19000', '22000', 6, 4, '2024-08-06 19:13:39'),
(52, 'Casual Leather Belt', 'Men\'s leather belt made with 100 percent genuine leather for a soft smooth feel. Order 1 size larger than your pant size for the best fit Perfect men\'s casual belt that will soon become your favorite go to every day leather belt. The perfect men\'s belt fo', 'belt, men belt, casual, black belt', 1, 3, 'casual 1.png', 'casual 2.png', 'casual 3.png', 'casual 4.jpg', '15000', '17000', 4, 5, '2024-08-05 17:43:31'),
(53, 'Classic Buckle Jean Belt Leather Belt', 'Men\'s leather belt made with 100% genuine leather with single loop antique finish buckle. Perfect men\'s casual belt that will soon become your favorite go to everyday leather belt. The perfect men\'s belt for jeans that can also convert into a men\'s dress ', 'belt, mens belt, classic Buckle Jean, brown belt, black belt', 1, 3, 'Classic Buckle Jean 1.png', 'Classic Buckle Jean 3.png', 'Classic Buckle Jean 2.png', 'Classic Buckle Jean Belt Leather Belt 4.jpg', '16000', '18000', 4, 7, '2024-08-05 17:46:36'),
(54, 'Vintage Sneakers', 'Sneakers are made for exercise and sports, but they\'re also very popular everyday shoes because they\'re so comfortable.  Sneaker, which is most common in the Northeast US, comes from their noiseless rubber soles, perfect for sneaking. Originally,  they we', 'shoe,men shoe,brown shoe,blue shoe', 1, 1, 'aa1.png', 'aa2.png', 'aa4.png', 'aa3.png', '12800', '13500', 8, 4, '2024-08-09 17:31:01'),
(55, 'Cortina Leather Belt', 'This timeless belt is an essential component of every man\'s wardrobe. The right belt instantly elevates any outfit, and with its detailed stitching and fine leather, this belt makes a powerful statement. Its clean lines and polished buckle will put the fi', 'belt, black belt. brown belt, cortina', 1, 3, 'Cortina Leather Bel 1.png', 'Cortina Leather Bel 2.png', 'Cortina Leather Belt 3.jpg', 'Cortina Leather Belt 4.jpg', '20000', '22000', 5, 4, '2024-08-05 17:55:46'),
(56, 'Harbor Loafers', 'The loafer is a type of shoe that is easily slipped on and off the foot without any laces to worry about.  It is often mentioned in the same breath as the moccasin, as some historical sources say both types of footwear have similar origins.', 'shoe,men shoe,black shoe,brown shoe,blue shoe', 1, 1, 'L4.png', 'L3.png', 'L1.png', 'L2.png', '14500', '16000', 7, 4, '2024-08-05 17:58:06'),
(57, 'Timberline Boots', 'Boots are a kind of boots originally designed for working, being made in different materials, mainly cow leather or  exotic skins like ostrich, crocodile, or snake.', 'shoe,men shoe,brown shoe,black shoe', 1, 1, 'tb1.png', 'tb2.png', 'tb3.png', 'tb4.png', '13900', '15000', 7, 4, '2024-08-06 17:04:30'),
(58, 'Classic Derby', 'People often refer to the derby shoe as the opposite of an Oxford. Contrary to its counterpart, Derbys have an open lacing system,  meaning that the facings, the part of the shoe that the laces go through, are sewn on top of the vamp instead of flush with', 'shoe,men shoe,brown shoe,black shoe', 1, 1, 'd1.png', 'd3.png', 'd1.png', 'd3.png', '8900', '9500', 6, 4, '2024-08-14 16:44:53'),
(59, 'Oxfords Classic', 'Oxford shoes are dress shoes that have shoelace eyelets stitched directly to the vamp in a way that the lacing is closed.  Check the picture to understand it better, you will find the attachment part in red: So, Oxfords are basically the classic dress  sh', 'shoe,men shoe,black shoe,brown shoe', 1, 1, 'cl5.png', 'cl2.png', 'cl1.png', 'cl4.png', '28000', '29500', 4, 4, '2024-08-06 17:08:10'),
(60, 'Rustic Moccassins', 'A soft leather heelless shoe or boot with the sole brought up the sides of the foot and over the toes where it is  joined with a puckered seam to a U-shaped piece lying on top of the foot.', 'shoe,men shoe,black shoe,brown shoe,grey shoe', 1, 1, 'mocc1.png', 'mocc2.png', 'mocc3.png', 'mocc4.png', '11990', '12500', 7, 4, '2024-08-09 17:38:29'),
(62, 'Cavalier Brogues', 'The brogue as we know it today is any low heeled shoe or boot which features decorative perforations or \'broguing\'.  They will often also have serrations along any visible edges of the multiple pieces of material (most often sturdy leather) from which the', 'shoe,men shoe,black shoe,brown shoe', 1, 1, 'B1.png', 'B3.png', 'B4.png', 'B5.png', '18000', '19900', 5, 4, '2024-08-05 18:28:44'),
(63, 'BISONSTRAP Luxury Watch strap', 'Caramel Brown, Coffee Brown and Black watch bands are made of Italian cowhide leather, which is durable and will fit your wrist over time for superior comfort,Equipped with quick release spring bars, this soft watch band can be put on and take off without', 'Watch strap,Men\'s strap,Caramel Brown strap, Coffee Brown strap,Black strap', 3, 0, 'Cyan And Blue Minimalist Special Cup Cake Instagram Post (45422.png', 'Cyan And Blue Minimalist Special Cup Cake Instagram Post (5).png', 'Cyan And Blue Minimalist Special Cup Cake Instagram Post (6).png', 'Cyan And Blue Minimalist Special Cup Cake Instagram Post (7).png', '5000', '5300', 5, 4, '2024-08-05 18:56:50'),
(64, 'WOCCI Vintage Leather Watch Strap', 'Made of genuine leather (crazy-horse leather) with clean edge stitching and come with matte stainless steel black buckle,Band Length: 12.5 cm long side and 7.5 cm short side strap,Designed to apply to most traditional watches and smart watches which lug w', 'Watch Strap, Men\'s watch strap,black strap,blue strap,brown strap', 3, 0, 'straps 1.png', 'straps 4.png', 'straps 3.png', 'straps 2.png', '3600', '3900', 6, 4, '2024-08-08 17:54:46'),
(65, 'BISONSTRAP Watch strap', 'watch straps are made of Italian calfskin, which is durable and will conform to your wrist with time  for superior comfort,Equipped with quick release spring bars, this soft watch band can be installed and removed without tools, very convenient,Fit for di', 'watch strap, men\'s watch strap, Toffee Brown strap , Coffee Brown strap,Black strap', 3, 0, 'le strap 1.png', 'le strap 3.png', 'le strap 4.png', 'le strap 2.png', '4500', '4900', 8, 5, '2024-08-08 17:55:34'),
(66, 'Cotton Strings Wrap Bracelet', 'Material: Cotton Strings,soft durabel leather ,brass snaps ,Fit the wirst of 6', 'bracelet,leather bracelet,black bracelet,brown bracelet', 3, 0, 'bracel1.png', 'bracel2.png', 'bracel4.png', 'bracel3.png', '2100', '2500', 6, 4, '2024-08-08 17:43:24'),
(67, 'Gemini Double Wrap Stainless Steel Wristband Bracelet', 'Item display length : 21.6 centimeters, Material : Stainless Steel, Clasp type : No clasp type', 'bracelet,Leather bracelet,black bracelet,red bracelet,brown bracelet', 3, 0, 'brace1.png', 'brace2.png', 'brace4.png', 'brace3.png', '2200', '2600', 6, 4, '2024-08-08 17:41:16'),
(68, ' Natural Black Lava Rock Stone Mens Anxiety Bracelet', 'Size of the leather beads bracelet is 8', 'bracelet,leather bracelet,black bracelet,blue bracelet,brown bracelet', 3, 0, 'bras1.png', 'bras2.png', 'bras3.png', 'bras4.png', '1600', '1850', 9, 4, '2024-08-08 17:36:56'),
(69, 'Cotton Web Belt with Military Logo Buckle Leather Belt', 'The silver metal plaque buckle on this belt adds the perfect finishing touch with the Dickies logo, offering a different and casual look with jeans or trousers.Being a fabric belt, this style will add a unique touch to any outfit. Whether you are out with', 'Cotton Web Belt with Military Logo, belt, mens belt, white belt, black belt Buckle', 1, 3, 'Cotton Web Belt with Military Logo Buckle  1.png', 'Cotton Web Belt with Military Logo Buckle  2.png', 'Cotton Web Belt with Military Logo Buckle  3.png', 'Cotton Web Belt with Military Logo Buckle 4.jpg', '18000', '20000', 7, 4, '2024-08-06 04:18:53'),
(70, 'Double Calf Lether Belt', 'This leather belt is finished with a satin-finish nickel buckle that exudes elegance and complements the chestnut leather beautifully. The sleek buckle design offers a modern yet timeless appeal, ensuring that the belt not only holds up well over time but', 'Double Calf, belt, mens belt, brown belt, black belt', 1, 3, 'Double Calf Belt 2.png', 'Double Calf Belt 1.png', 'Double Calf Belt 3.png', 'Double Calf Belt 4.png', '16000', '18000', 8, 5, '2024-08-06 03:49:25'),
(71, 'Durable Copper Buckle Lether Belt', 'This belt is designed to be both durable and stylish. It is made with high-quality materials and features a sturdy aluminum alloy buckle. The buckle is designed to be both stylish and durable, and is sure to last for years. The belt is also adjustable, al', 'Durable Copper Buckle, belt, mens belt, brown belt, black belt', 1, 3, 'Durable Copper Buckle 3.png', 'Durable Copper Buckle 1.png', 'Durable Copper Buckle 2.png', 'Durable Copper Buckle 4.png', '24000', '26000', 5, 3, '2024-08-06 03:50:58'),
(72, 'Leather Ratchet Leather Belt', 'Loosen and tighten as needed in a second. Just slide the belt into the buckle and pull the leather belt through, the buckle simply auto locks the belt, releasing the buckle by simply shifting the small lever.', 'Leather Ratchet, belt, mens belt, black belt', 1, 3, 'Leather Ratchet Belt 1.png', 'Leather Ratchet Belt 2.png', 'Leather Ratchet Belt 3.png', 'Leather Ratchet Belt 4.png', '16000', '18000', 4, 4, '2024-08-06 03:54:27'),
(73, 'No-Scratch No Buckle Mechanic Leather Belt', 'This men\'s no buckle leather belt features a leather buckle instead of a traditional metal buckle providing a safe belt to wear that won\'t scratch. This full grain leather belt features a leather covered buckle and is designed to be non-mutilating and fea', 'No-Scratch No Buckle Mechanic, belt, mens belt, black belt belt, mens belt, ', 1, 3, 'No-Scratch No Buckle Mechanic Belt 1.png', 'No-Scratch No Buckle Mechanic Belt 2.png', 'No-Scratch No Buckle Mechanic Belt 4.jpg', 'No-Scratch No Buckle Mechanic Belt 3.jpg', '15000', '17000', 6, 4, '2024-08-06 03:56:16'),
(74, 'Portfolio Braided Leather Belt', 'Enjoy our Italian leather ratchet belt and pin buckle belts. The mens belt is easy to fasten and adjust, offering a perfect, comfortable fit for any waistline with precision and style. Our reversible belts for men fits many waist sizes. If it\'s too long, ', 'Portfolio Braided, belt, black belt, brown belt, mens belt', 1, 3, 'Portfolio Braided Belt with Leather 1.png', 'Portfolio Braided Belt with Leather 2.png', 'Portfolio Braided Belt with Leather 3.png', 'Portfolio Braided Belt with Leather 4.png', '24000', '26000', 7, 4, '2024-08-06 03:57:59'),
(75, 'Reversible Leather Belt', 'Stretches up to 2 inches for more comfort. 2-in-1 versatile belt with rotating buckle. Reversible Buckle with Brass Tone Finish. Engraved logo.', 'Reversible, mens belt, belt, red belt', 1, 3, 'Reversible Belt 4.png', 'Reversible Belt 1.png', 'Reversible Belt 3.png', 'Reversible Belt 2.png', '17000', '19000', 3, 3, '2024-08-06 04:00:20'),
(76, 'Rugged Burnished Leather Box Belt', 'Men\'s hardworking belt made of rugged full-grain leather. Rugged and durable, this men\'s belt is purpose-built to get the job done. Made of smooth bridle leather with a gunmetal-finished buckle.', 'Rugged Burnished, mens belt, belt, black belt, brown belt', 1, 3, 'Rugged Burnished Leather Box Belts 2.png', 'Rugged Burnished Leather Box Belts 1.png', 'Rugged Burnished Leather Box Belts 4.png', 'Rugged Burnished Leather Box Belts 3.png', '20000', '22000', 6, 4, '2024-08-06 04:01:53'),
(77, 'Stretch Woven Braid Leather Belt', 'Get the dual ability of both comfort and style with this Classic Woven Stretch Belt. Pair with your favorite pair of jeans or khakis. Carefully crafted with 90% Polyester and 10% Polyurethane for the perfect blend of stretch. Belt width is 1.38\" to easily', 'Stretch Woven Braid, belt, mens belt, brown belt, black belt', 1, 3, 'Stretch Woven Braid Belt 1.png', 'Stretch Woven Braid Belt 2.png', 'Stretch Woven Braid Belt 3.png', 'Stretch Woven Braid Belt 4.png', '26000', '28000', 8, 5, '2024-08-06 04:03:51'),
(78, 'Western Engraved Tooled Leather Belt', 'Made from 100% high quality, one-piece cowhide leather. Backed with a Lifetime Warranty. 8-9 oz or 3.5mm thick vegetable tanned leather with a gorgeous floral tooled design. Convenient snap system for interchanging buckles making it a versatile strap for ', 'Western Engraved Tooled, mens belt, belt, black belt, brown belt', 1, 3, 'Western Engraved Tooled Leather Belt 2.png', 'Western Engraved Tooled Leather Belt 1.png', 'Western Engraved Tooled Leather Belt 4.png', 'Western Engraved Tooled Leather Belt 3.png', '26000', '28000', 5, 3, '2024-08-06 04:05:34'),
(79, 'Western Lether Belt', 'Immerse yourself in unparalleled comfort with our premium leather, boasting luxurious softness that enhances the feel of every wear. Each hipster western cowboy belt is meticulously handcrafted, ensuring a unique touch and sturdy construction for enduring', 'Western, mens belt, belt, black belt', 1, 3, 'Western Lether Belt 1.png', 'Western Lether Belt 2.png', 'Western Lether Belt 3.jpg', 'Western Lether Belt 4.jpg', '28000', '30000', 7, 5, '2024-08-06 04:07:00'),
(80, 'Workwear Work Leather Belt', 'Men\'s leather belt made with 100 percent genuine leather for a soft smooth feel. Sizing: order 1 size larger than your pant size for the best fit. Perfect men\'s durable work belt that will soon become your favorite go-to durable leather belt. The perfect ', 'Workwear Work, belt, mens belt, black belt, brown belt', 1, 3, 'Workwear Work Belt Leather Belt 1.png', 'Workwear Work Belt Leather Belt 2.png', 'Workwear Work Belt Leather Belt 4.jpg', 'Workwear Work Belt Leather Belt 3.jpg', '13000', '15000', 8, 4, '2024-08-06 04:08:34'),
(81, 'Chain Belt Rave Halloween Accessories Leather Belt ', 'Gothic Waist Belt with elastic at the back, it can be adjusted to fit your body shape and fits perfectly around your waist. Punk Bustier belts is made of PU Faux leather, soft, durable, adjustable and easy to wear. Punk Belt comes in a classic black desig', 'Chain Belt Rave Halloween Accessories, belt, womens belt, white belt, black belt', 2, 3, 'Chain Belt Rave Halloween Accessories Belt 1.png', 'Chain Belt Rave Halloween Accessories Belt 2.png', 'Chain Belt Rave Halloween Accessories Belt 3.png', 'Chain Belt Rave Halloween Accessories Belt 4.png', '24000', '28000', 6, 4, '2024-08-06 04:26:55'),
(82, 'Cowboy Metal Buckle Concho Leather Belt', 'The retro belt is made of high quality PU leather and metal, strong and durable, not easy to fade or break, can be worn for a long time. This wide disc belt is made of one disc connected with each other, unique design and versatile style, with alloy vinta', 'Cowboy Metal Buckle Concho, Belt, womens belt, gold belt, brown belt, black belt', 2, 3, 'Cowboy Metal Buckle Concho Belts 1.png', 'Cowboy Metal Buckle Concho Belts 2.png', 'Cowboy Metal Buckle Concho Belts 3.png', 'Cowboy Metal Buckle Concho Belts 4.jpg', '20000', '22000', 5, 4, '2024-08-06 04:37:01'),
(83, 'Gold Buckle Skinny Leather Belt', 'The skinny leather belt is an essential in every wardrobe, Its versatility lends it to wearing both with high-waisted jeans for a flattering, cinched-in look, with low-rise trousers, or even over a flowy dress. You can\'t go wrong with a plain leather belt', 'Gold Buckle Skinny, Belt, womens belt, black belt, brown belt, Purple belt', 2, 3, 'Gold Buckle Skinny Belts 1.png', 'Gold Buckle Skinny Belts  2.png', 'Gold Buckle Skinny Belts 3.jpg', 'Gold Buckle Skinny Belts 4.jpg', '18000', '20000', 7, 5, '2024-08-06 04:39:08'),
(84, 'Hollow Flower Leather Belt', 'Women Wide Leather Belt made of high quality cowhide leather that touch so soft and durable.The metal buckle is polish surface without blemishes that always keep shiny. The flower cuts are very precise and have no residual flakes of leather. The buckle is', 'Hollow Flower, belt, womens belt, brown belt, black belt, ', 2, 3, 'Hollow Flower Leather Belt 1.png', 'Hollow Flower Leather Belt 2.png', 'Hollow Flower Leather Belt 3.jpg', 'Hollow Flower Leather Belt 4.jpg', '22000', '24000', 8, 5, '2024-08-06 04:41:32'),
(85, 'Interlock Buckle Halloween Leather Belt', 'It has fashion design alloy smooth buckle with delicate rivet. Wide and high elastic, no bound feeling, keep a most comfortable day. The Stylish Wide Women Belt is perfect for decorating with all kinds of clothes as you like. This women belt is perfect fo', 'Interlock Buckle Halloween, belt, womens belt, brown belt, black belt', 2, 3, 'Interlock Buckle Halloween Belt 2.png', 'Interlock Buckle Halloween Belt 1.png', 'Interlock Buckle Halloween Belt 3.jpg', 'Interlock Buckle Halloween Belt 4.jpg', '14000', '16000', 5, 4, '2024-08-06 04:47:06'),
(86, 'Italian leather Obi Leater Belt', 'Full Grain Cowhide Leather, It is a leather with the highest fiber density, a strong and soft material. The excellence of Italian tanning is worldwide, the Leather of the CASSIANE women\'s belt is tanned with the greatest Italian know-how.', 'Italian leather Obi, belt, women belt', 2, 3, 'Italian leather Obi belt 1.png', 'Italian leather Obi belt 2.png', 'Italian leather Obi belt 3.png', 'Italian leather Obi belt 4.png', '23000', '25000', 8, 5, '2024-08-06 06:23:57'),
(87, 'Lace-up Cinch Elastic Waist Leather Belt', 'Classic vintage style leather lace-up tied waspie corset belt,high quality PU leather front sewed with well elastic wide band, fastened by 3 snap buttons, which is easy to put on and remove. This waspie corset belt is super comfortable to wear. Flatters y', 'Lace-up Cinch Elastic Waist, Belt, black belt, brown belt womens belt, ', 2, 3, 'Lace-up Cinch Elastic Waist Belt 1.png', 'Lace-up Cinch Elastic Waist Belt 2.png', 'Lace-up Cinch Elastic Waist Belt 3.png', 'Lace-up Cinch Elastic Waist Belt 4.png', '20000', '22000', 8, 5, '2024-08-06 04:55:11'),
(88, 'Snake Buckle Leather Belt ', 'This vintage women belt was made of soft and durable PU leather. Snake shape belt buckles stand out itâ€™s basic design belt strap. Simple and fashion design of this elegant waist belt. Basic and all match black belt, stylish light gold belt, as well as d', 'Snake Buckle, belt, women belt, black belt', 2, 3, 'Leather Belt with Snake Belt Buckle 1.png', 'Leather Belt with Snake Belt Buckle 2.png', 'Leather Belt with Snake Belt Buckle 3.jpg', 'Leather Belt with Snake Belt Buckle 4.jpg', '28000', '30000', 6, 4, '2024-08-06 05:07:59'),
(89, 'Multi-Perforate Fully Adjustable Casual Belt', 'The women belts are made of Genuine leather. The soft and comfortable feature provides a better-wearing feeling. The exquisite and good-looking stylish zinc alloy buckle is elegantly designed and never out of date.', 'Multi-Perforate Fully Adjustable Casual, belt, womens belt, brown belt, black belt', 2, 3, 'Multi-Perforate Fully Adjustable Casual Belt 1.png', 'Multi-Perforate Fully Adjustable Casual Belt 2.png', 'Multi-Perforate Fully Adjustable Casual Belt 3.png', 'Multi-Perforate Fully Adjustable Casual Belt 4.jpg', '21000', '23000', 4, 3, '2024-08-06 05:11:09'),
(90, 'Silver Buckle Leather belt', 'Made of supple faux leather construction with liquid shapes created trendy classic or stylish belt look, elevates everything from your daytime jeans to nighttime look.', 'Silver Buckle, womens belt, belt, black belt, brown belt', 2, 3, 'Silver Buckle Leather belt 1.png', 'Silver Buckle Leather belt 3.jpg', 'Silver Buckle Leather belt 2.png', 'Silver Buckle Leather belt 4.jpg', '17000', '19000', 6, 4, '2024-08-06 06:15:13'),
(91, 'Silver Gold Buckle Black Waist Leather Belt', 'Upgrade your outfit with our trendy leather women belts! Made from high-quality faux leather, this black ladies belt is soft, smooth, chunky and skin-friendly, providing comfort and durability all day long.', 'Silver Gold Buckle Black Waist, black belt, belt, womens belt', 2, 3, 'Silver Gold Buckle Black Waist Belt 1.png', 'Silver Gold Buckle Black Waist Belt 2.png', 'Silver Gold Buckle Black Waist Belt 3.jpg', 'Silver Gold Buckle Black Waist Belt 4.jpg', '22000', '24000', 5, 3, '2024-08-06 05:16:30'),
(92, 'Skinny Leather Belt', 'Thin Waist PU Leather Belt: Women\'s thin waist belt is made of soft PU leather, lightweight and durable, delicate and smooth, comfortable and durable. With a delicate alloy buckle, the buckle is easy to fasten and open through the belt hole, making it eas', 'Skinny, belt, white belt, black belt, brown belt, womens belt', 2, 3, 'Skinny Leather Belt 1.png', 'Skinny Leather Belt 2.jpg', 'Skinny Leather Belt 3.jpg', 'Skinny Leather Belt 4.jpg', '13000', '15000', 8, 4, '2024-08-06 05:18:05'),
(93, 'Straw Woven Elastic Stretch Waist Leather Belt', 'Bohemian style straw belt: made of natural woven material and equipped with vintage buckle, which makes it natural and durable, the straw woven bohemian belt makes your daily outfits more attractive.', 'Straw Woven Elastic Stretch Waist, Belt, womens belt, brown belt, black belt, white belt, gray belt', 2, 3, 'Straw Woven Elastic Stretch Waist Belt 1.png', 'Straw Woven Elastic Stretch Waist Belt 2.jpg', 'Straw Woven Elastic Stretch Waist Belt 3.jpg', 'Straw Woven Elastic Stretch Waist Belt 4.jpg', '19000', '21000', 5, 3, '2024-08-06 05:20:15'),
(94, 'Thin Waist Leather Belts', 'This 2 pack women thin belt is made of high quality genuine cowhide leather and raw leather inside, extremely soft and comfortable to wear.', 'Thin Waist, belt, women belt, brown belt, black belt', 2, 3, 'Thin Waist Belts 1.png', 'Thin Waist Belts 2.png', 'Thin Waist Belts 3.jpg', 'Thin Waist Belts 4.jpg', '14000', '16000', 5, 3, '2024-08-06 05:55:38'),
(95, 'Waist Belt with Fashion Gold Buckle', 'A simple leather belt is essential to every women\'s / girlsâ€™ lineup. These belts for jeans have been made of faux leather and fastened with a gold buckle and work well for both casual and dressed-up occasions.', 'Waist Belt with Fashion Gold Buckle, belt, blue belt, brown belt, black belt, white belt', 2, 3, 'Waist Belt with Fashion Gold Buckle 1.png', 'Waist Belt with Fashion Gold Buckle 2.png', 'Waist Belt with Fashion Gold Buckle 3.jpg', 'Waist Belt with Fashion Gold Buckle 4.jpg', '16000', '18000', 7, 4, '2024-08-06 06:00:16'),
(96, 'Western Buckle Leather Belt', 'PU leather fabric. Faux leather belt, oval decor metal buckle, retro style floral carved design. This vintage women belt is a good match with high waist jeans and crop tops, any casual pants or cowgirl style outfit.', 'Western Buckle, belt, womens belt, brown belt, white belt, black belt', 2, 3, 'Western Leather Buckle Belt 1.png', 'Western Leather Buckle Belt 2.png', 'Western Leather Buckle Belt 3.png', 'Western Leather Buckle Belt 4.png', '22000', '24000', 6, 4, '2024-08-06 06:06:20'),
(97, 'Executive Leather Wallet', 'Crafted from premium full-grain leather, this executive wallet combines timeless elegance with practical functionality. Its sleek design features multiple card slots, a spacious bill compartment, and a secure coin pocket, ensuring all your essentials are ', 'wallet,mens wallet,brown wallet', 1, 4, 'executive1.jpg', 'executive2.jpg', 'executive3.jpg', '71Y-nz3e-jL._AC_SX466_.jpg', '11000', '12000', 7, 5, '2024-08-06 14:25:28'),
(98, 'Genuine Trifold Leather Wallet', 'Experience timeless elegance and unmatched durability with our genuine leather wallet. Crafted from high-quality leather, this wallet combines classic style with practical functionality, featuring multiple card slots, a spacious bill compartment, and a sl', 'wallet,mens wallet,black wallet,brown wallet', 1, 4, 'genuine1.jpg', 'genuine2.jpg', '61OsxYDWlOL._AC_SX466_.jpg', '61q86mUMKLL._AC_SX466_.jpg', '15000', '16500', 5, 4, '2024-08-06 14:47:35'),
(99, 'Vintage Trifold Wallet', 'The Vintage Trifold Leather Wallet is a timeless accessory crafted from high-quality leather, exuding a classic and sophisticated charm. Designed with multiple compartments, it offers ample space for your cash, cards, and IDs, ensuring both functionality ', 'wallet,mens wallet,black wallet,brown wallet', 1, 4, 'vintage1.jpg', 'vintage 2.jpg', '71EOES-l9mL._AC_SX466_.jpg', '71EWhgbFB0L._AC_SX466_.jpg', '12000', '13000', 7, 4, '2024-08-06 15:01:36'),
(100, 'Cafe Racer Slim Fit Stand Collar Womens Motorcycle Jacket', 'Black leather jacket women is all time favorite for every season from cold winter days to breezy summer. Wear the womens leather jacket over dresses and jeans alike to instantly elevate your look,A perfect mix of quality and affordability that won\'t leave', 'jacket,leather jacket, women\'s leather jacket, black leather jacket,brown leather jacket', 3, 0, 'j1.png', 'j4.png', 'j2.png', 'j3.png', '50500', '52000', 3, 4, '2024-08-06 16:00:01'),
(101, 'Barren - Leather Jacket', 'Crafted from premium leather and meticulously tailored for a flattering fit, the Barren Leather Jacket exudes confidence with a hint of edgy charm, making it the perfect choice for any occasion.', 'jacket, men\'s leather jacket,black jacket,brown jacket,grey jacket', 3, 0, 'jac1.png', 'jac2.png', 'jac3.png', 'jac4.png', '45000', '46500', 5, 4, '2024-08-06 17:21:24'),
(102, 'Radiance Heels ', 'The heel in such shoes is raised above the ball of the foot. High heels cause the legs to appear longer, make the wearer appear taller,  and accentuate the calf muscle. There are many types of high heels in varying styles, heights, and materials.', 'shoe,women shoe,red shoe,black shoe,pink shoe,white shoe', 2, 1, 'H1.png', 'H2.png', 'H3.png', 'H4.png', '11300', '12000', 8, 4, '2024-08-06 17:29:30'),
(103, 'Urban Sneakers', 'Athletic or casual rubber-soled shoes are called sneakers. Before you walk your neighbor\'s Great Dane, you\'ll have to take off your work shoes and  put on your sneakers. You can also call sneakers tennis shoes, kicks, or running shoes, and if you\'re in Br', 'shoe,women shoe,black shoe,yellow shoe,pink shoe,orange shoe', 2, 1, 'sn1.png', 'sn2.png', 'sn3.png', 'sn4.png', '12200', '13500', 5, 4, '2024-08-06 17:38:38'),
(104, 'Graceful Flats', 'Flat shoes give your feet the freedom to move naturally, making physical activity more comfortable and easier. If you\'re someone who\'s always on the go,  flat shoes can offer convenience and comfort throughout the day.', 'shoe,women shoe,black shoe,purple shoe,blue shoe,green shoe', 2, 1, 'fl2.png', 'fl3.png', 'fl1.png', 'fl4.png', '8000', '9000', 8, 4, '2024-08-06 17:45:13'),
(105, 'Rustic Clogs', 'The clogs\' combination of flexible wooden soles and finest leather flatters your feet. The real leather makes every women\'s clog robust on the outside  and yet comfortable to wear. Inside the women\'s clogs, the high-quality, soft-feeling calfskin lining l', 'shoe,women shoe,black shoe,brown shoe,blue shoe,purple shoe', 2, 1, 'wc3.png', 'wc1.png', 'wc2.png', 'wc4.png', '17000', '20000', 7, 4, '2024-08-06 18:18:02'),
(106, 'Glamour Wedges', 'Wedges for women are more common and often have a sole that is much thicker at the back than at the front, making them high-heeled boots or shoes.', 'shoe,women shoe,black shoe,red shoe,blue shoe,brown shoe', 2, 1, 'w3.png', 'w1.png', 'w2.png', 'w4.png', '9000', '11000', 3, 4, '2024-08-06 18:35:19'),
(107, 'Elegance Boots', 'Booties are shorter in height and should ideally end right at your ankle, while ankle boots will end one to four inches above your ankle, like a Chelsea boot,  combat boot, or work boot. Pretty simple, right? With this knowledge, you will easily be able t', ' shoe,women shoe,black shoe,red shoe,white shoe,purple shoe', 2, 1, 'boots2.png', 'boots3.png', 'boots1.png', 'boots4.png', '13300', '15000', 10, 4, '2024-08-06 18:53:12'),
(108, 'Classic Canvas', 'Canvas shoes are made from canvas, with a rubber, leather or fibre sole. These multi-purpose shoes come in a range of styles, from lace-ups to slips-ons and pumps.', 'shoe,women shoe,black shoe,grey shoe,blue shoe,pink shoe', 2, 1, 'canvs1.png', 'canvs3.png', 'canvs2.png', 'canvs4.png', '6000', '7500', 7, 4, '2024-08-06 18:57:29'),
(109, 'Timeless Sandals', 'Any of various low shoes or slippers. a light, low, rubber overshoe covering only the front part of a woman\'s high-heeled shoe.  a band or strap that fastens a low shoe or slipper on the foot by passing over the instep or around the ankle.', ' shoe,women shoe,black shoe,red shoe,grey shoe,brown shoe', 2, 1, 'sa3.png', 'sa2.png', 'sa1.png', 'sa4.png', '8700', '9900', 5, 4, '2024-08-06 19:03:08'),
(110, 'Mini Tote Bags', 'A chic and compact leather mini tote bag, designed for modern women. This versatile accessory offers sleek style with enough space for essentials, perfect for daily use or a night out.', 'bags,womens bags,mini  tote,brown mini tote', 2, 2, 'mini tote bag   bag1.png', 'mini tote  bag2.png', 'minitote  bag3.png', 'minitote bag4.png', '36500', '38500', 7, 5, '2024-08-07 07:53:22'),
(111, 'Underarm Crescent Bag', 'This women\'s leather underarm crescent bag is a sleek and stylish accessory, featuring a curved silhouette that tucks perfectly under the arm. Made from premium leather, it offers both elegance and functionality, ideal for day-to-night wear.', 'bags,womens bags,underarm crescent,yellow bags,brown bags,black bags,brown bags,pink bags,white bags,', 2, 2, 'underarm crescent bag1   bag1.png', 'underarm crescent bag2.png', 'underarm crescent bag3.png', 'underarm crescent bag4.png', '32000', '35000', 5, 5, '2024-08-07 08:11:18'),
(112, 'Accordion Wallet', 'An accordion wallet typically features several sections for organizing cards, cash, coins, and other essentials, making it ideal for those who need ample storage in a compact form. The accordion-style layout ensures easy access and visibility of contents,', 'wallet,womens wallet,black wallet,pink wallet,brown wallet', 2, 4, 'accordion1.jpg', 'accordion2.jpg', '61Qa5YLOqCL._AC_SX569_.jpg', 'accordion1.jpg', '15000', '16500', 7, 5, '2024-08-14 16:56:53'),
(113, 'Bowling Lether bag', 'This women\'s leather bowling bag features a sleek design with a roomy interior, perfect for everyday essentials. Its durable leather construction adds a touch of sophistication, while double handles ensure comfortable carrying. Ideal for both casual and p', 'bags,womens bags,bowling bags,pink bowling', 2, 2, 'bowling bag1.png', 'bowling bag2.png', 'bowling bag3.png', 'bowling bag4.png', '45000', '47000', 9, 5, '2024-08-14 16:26:36'),
(114, 'Checkbook Wallet', 'A checkbook wallet . Typically larger than standard wallets, it often includes multiple card slots, a pen holder, and compartments for organizing documents, making it a practical choice for those who need to keep their finances in order while on the go. I', 'wallet,womens wallet,black wallet,green wallet,purple wallet,grey wallet', 2, 4, 'chech1.jpg', 'check 2.jpg', '81EVob6qyvL._AC_SX569_.jpg', '71GfiCGMhyL._AC_SX569_.jpg', '12000', '14000', 8, 5, '2024-08-07 08:36:24'),
(115, 'Continental Leather Wallet', 'Continental leather wallet designed for maximum organization. Typically longer in shape, it features multiple card slots, compartments for cash, and a zippered section for coins. Crafted from high-quality leather, it combines durability with elegance, mak', 'wallet,womens wallet,brown wallet', 2, 4, 'contain1.jpg', '810+uVhPgVL._AC_SX569_.jpg', '71S0VybyXOL._AC_SX569_.jpg', '810+uVhPgVL._AC_SX569_.jpg', '15000', '17000', 8, 5, '2024-08-14 16:57:42'),
(116, 'Laptop Lether Bags', 'A sleek and stylish womenâ€™s leather laptop bag featuring a spacious interior, secure compartments, and elegant design, perfect for work or travel.', 'bags,mens bags,laptop bags,brown laptop bags', 1, 2, 'laptop  bag1.png', 'laptop  bag2.png', 'laptop  bag3.png', 'laptop  bag4.png', '40000', '42500', 10, 4, '2024-08-14 16:08:06'),
(117, 'Satchel Lether Bags', 'A stylish women\'s leather satchel bag, crafted from premium leather, featuring a spacious interior, secure closures, and versatile straps for both hand and shoulder carry. Perfect for both casual and professional settings.', 'bags,mens bags,satchel bags,brown satchel bags', 1, 2, 'Satchel bag1.png', 'Satchel bag2.png', 'Satchel bag3.png', 'Satchel bag4.png', '38000', '40000', 9, 5, '2024-08-14 16:04:27'),
(118, 'Blingsoul Leather Jacket Men', 'MATERIAL: 100% REAL LEATHER, Handpicked and crafted to perfection. Moreover, we\'ve added soft polyester lining for extended comfort. FEATURES: This men\'s leather jacket comes with a zip fastener, four external zipped pockets, wind-breaking snap button col', 'jacket,leather men\'s jacket,black jacket,brown jacket', 3, 0, 'jacket 11.png', 'jacket 33.png', 'jacket 22.png', 'jacket 44.png', '62000', '63500', 5, 3, '2024-08-08 17:07:48'),
(119, 'MGGMOKAY Women Leather Gloves ', 'These winter gloves are made from the Italian highest quality lambskin with the softness, pliability,  strength and durable comfort. Made by expert craftsmen with professional tailoring and excellent lines. The leather gloves fit your fingers well and kee', 'gloves, leather gloves,black gloves,red gloves,brown gloves', 3, 0, 'g555.png', 'g333.png', 'g444.png', 'g222.png', '5900', '6500', 5, 4, '2024-08-08 17:59:51'),
(120, 'Bruno Magli Men\'s Classic Hand-stitched Leather Glove', 'Made of 100% Nappa Leather with 100% Cashmere knit lining. Design born from the combination of artisanal heritage and modern  Italian sensibilities. Great for driving, cold weather travel and more.', 'gloves,leather gloves,black gloves,brown gloves', 3, 0, 'g11.png', 'g33.png', 'g22.png', 'g44.png', '24000', '25500', 6, 4, '2024-08-08 17:30:02'),
(121, 'OWSOO Winter Motorcycle Gloves', 'Double finger touch screen design, no need to frequently remove gloves during cycling. Anti slip and waterproof design, which increases hand grip and provides better control performance. At same time, gloves also have waterproof function, which can effect', 'gloves,leather gloves,black gloves', 3, 0, 'gl1.png', 'gl2.png', 'gl3.png', 'gl4.png', '5400', '5950', 5, 4, '2024-08-08 17:32:41'),
(122, 'Tote Lether Bags', 'A stylish men\'s leather tote bag, crafted from premium leather, featuring a spacious interior, sturdy handles, and multiple compartments for daily essentialsâ€”perfect for work or casual use.', 'bags,tote,mens tote,brown tote bags', 1, 2, 'tote   bag men.png', 'tote bag men2.jpg', 'tote bag men3.jpg', 'tote bag men4.jpg', '38500', '39700', 8, 5, '2024-08-29 09:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `item_id`, `user_id`, `invoice_number`, `color`, `size`, `item_price`, `total_price`, `qty`, `item_title`, `date`) VALUES
(1, 117, 1, '#1030129879', 'brown', 'L', 38000, 76000, 2, 'Satchel Lether Bags', '2024-08-13'),
(3, 80, 1, '#951549448', 'brown', '', 13000, 13000, 1, 'Workwear Work Leather Belt', '2024-08-14'),
(5, 103, 3, '#148713729', 'black', 'L', 12200, 36600, 3, 'Urban Sneakers', '2024-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `card_num` int(11) DEFAULT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `expire` varchar(255) DEFAULT NULL,
  `security` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`order_id`, `user_id`, `f_name`, `l_name`, `address`, `city`, `state`, `zip`, `card_num`, `card_name`, `expire`, `security`) VALUES
(1, 1, 'aa', 'aa', 'aa', 'aa', 'aa', '11', 11, 'aa', 'aa', 11),
(2, 1, 'bb', 'bb', 'bb', 'bb', 'bb', 'bb', 22, 'bb', 'bb', 22),
(3, 1, 'dd', 'dd', 'dd', 'dd', 'dd', 'dd', 44, 'dd', 'dd', 44),
(4, 3, 'ff', 'ff', 'ff', 'ff', 'ff', 'ff', NULL, NULL, NULL, NULL),
(5, 3, 'rr', 'rr', 'rr', 'rr', 'rr', 'rr', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_mobille` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `user_email`, `user_password`, `user_ip`, `user_mobille`) VALUES
(1, 'induwara', 'induwara', 'sahasrainduwara35@gmail.com', '$2y$10$Q1ZjtLlaqyacc/543QoS2.gbtKsDJaIunKlxgHG5MtZGR3rPM17/O', '223.224.3.249', '0755050637'),
(2, 'oshan', 'oshan', 'oshanvishwajith2002@gmail.com', '$2y$10$z6EqYRzYrFXrj59U8o84SObe40cZnLaoSIhPHJ3ZrJQsbthniMPAK', '175.157.92.174', '0760882466'),
(3, 'heshan', 'kavishka', 'sheshan@gmai.com', '$2y$10$OnrqYdVBqG07HHNy8YBxTeWJAiF5F8hWtaFfaZ0Ou/ceb8XASltxe', '223.224.1.174', '0755050666');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
