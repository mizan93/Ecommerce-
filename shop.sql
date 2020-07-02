-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 09:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `level`) VALUES
(1, 'Mr. Mizan', 'mizan', 'mrmizanbd96@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', 0),
(2, 'Mr. Simul', 'admin', 'mrmizanbd93@gmail.com', '698d51a19d8a121ce581499d7b701668', 0),
(4, 'Elizabeth Price', 'admintest', 'ElizabethRPrice@jourrapide.com', '698d51a19d8a121ce581499d7b701668', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_title`
--

CREATE TABLE `admin_title` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tittle` varchar(155) NOT NULL,
  `slogan` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_title`
--

INSERT INTO `admin_title` (`id`, `image`, `tittle`, `slogan`) VALUES
(1, 'upload/6baa740e69.gif', 'Admin', 'Admin slogan');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandId`, `brandName`) VALUES
(1, 'Sumsang'),
(2, 'HP'),
(3, 'ASUS'),
(4, 'Lenevo'),
(5, 'Iphone');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Electronics'),
(2, 'Desktop'),
(3, 'Laptop'),
(5, 'Footwere'),
(6, 'Mobile'),
(11, 'Bicycle');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(155) NOT NULL,
  `fax` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `fb` varchar(155) NOT NULL,
  `tw` varchar(155) NOT NULL,
  `glplus` varchar(155) NOT NULL,
  `linkdin` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`id`, `address`, `phone`, `fax`, `email`, `fb`, `tw`, `glplus`, `linkdin`) VALUES
(1, '<p>4 No uk tower,Mirpur ,Dhaka</p>', '017XXXXXXXXX', 'xxxxxxxxxx', 'abc@gmail.com', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(155) NOT NULL,
  `brandName` varchar(155) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cmrId` int(11) NOT NULL,
  `sessionId` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mobile` varchar(55) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `gender` varchar(55) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cmrId`, `sessionId`, `name`, `email`, `mobile`, `comment`, `status`, `gender`, `datetime`, `address`) VALUES
(32, 'aiq483aq1jqcvpb9gpi0r7uem5', 'Elizabeth Price', 'ElizabethRPrice@jourrapide.com', '01795221226', 'This is a test comment', 1, 'male', '2020-04-08 18:42:04', 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(55) NOT NULL,
  `zipcode` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `email`, `phone`, `address`, `city`, `zipcode`, `country`) VALUES
(1, 'mizan', '111', 'ElizabethRPrice@jourrapide.com', '017xxxxxxxxxxx', '332 Cardinal Lane', 'Orange Park', '32003', 'India'),
(2, 'admin', '111', 'mrmizanbd96@gmail.com', '017xxxxxxxxxxx', '332 Cardinal Lane', 'Orange Park', '32003', 'Nepal'),
(3, 'mizan', '1234', 'Elizabethrice@jourrapide.com', '017xxxxxxxxxxx', '332 Cardinal Lane', 'Orange Park', '32003', 'India'),
(4, 'mizan', '111', 'mrmianbd96@gamil.com', '01795221226', '332 Cardinal Lane.', 'Orange Park', '32003', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(155) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`, `date`) VALUES
(6, 'lorem ipsum', 6, 5, '<p>The&nbsp;<strong>iPhone</strong>&nbsp;is a line of&nbsp;<a title=\"Smartphone\" href=\"https://en.wikipedia.org/wiki/Smartphone\">smartphones</a>&nbsp;designed and marketed by&nbsp;<a title=\"Apple Inc.\" href=\"https://en.wikipedia.org/wiki/Apple_Inc.\">Apple Inc.</a>&nbsp;All generations of the iPhone use Apple\'s&nbsp;<a title=\"IOS\" href=\"https://en.wikipedia.org/wiki/IOS\">iOS</a>&nbsp;mobile operating system software. The&nbsp;<a title=\"IPhone (1st generation)\" href=\"https://en.wikipedia.org/wiki/IPhone_(1st_generation)\">first-generation iPhone</a>&nbsp;was released on June 29, 2007, and multiple new hardware iterations with new iOS releases have been released since.</p>\r\n<p>The&nbsp;<a title=\"User interface\" href=\"https://en.wikipedia.org/wiki/User_interface\">user interface</a>&nbsp;is built around the device\'s&nbsp;<a title=\"Multi-touch\" href=\"https://en.wikipedia.org/wiki/Multi-touch\">multi-touch</a>&nbsp;screen, including a&nbsp;<a title=\"Virtual keyboard\" href=\"https://en.wikipedia.org/wiki/Virtual_keyboard\">virtual keyboard</a>. The iPhone has&nbsp;<a title=\"Wi-Fi\" href=\"https://en.wikipedia.org/wiki/Wi-Fi\">Wi-Fi</a>&nbsp;and can connect to&nbsp;<a title=\"Cellular network\" href=\"https://en.wikipedia.org/wiki/Cellular_network\">cellular networks</a>. An iPhone can&nbsp;<a title=\"Camera phone\" href=\"https://en.wikipedia.org/wiki/Camera_phone\">take photos</a>,&nbsp;<a title=\"Portable media player\" href=\"https://en.wikipedia.org/wiki/Portable_media_player\">play music</a>, send and receive&nbsp;<a title=\"Email\" href=\"https://en.wikipedia.org/wiki/Email\">emails</a>,&nbsp;<a title=\"Web browser\" href=\"https://en.wikipedia.org/wiki/Web_browser\">browse the web</a>, send and receive&nbsp;<a title=\"Text messaging\" href=\"https://en.wikipedia.org/wiki/Text_messaging\">text messages</a>, record notes, perform mathematical calculations, and receive&nbsp;<a title=\"Visual voicemail\" href=\"https://en.wikipedia.org/wiki/Visual_voicemail\">visual voicemail</a>.&nbsp;<a title=\"Video camera\" href=\"https://en.wikipedia.org/wiki/Video_camera\">Shooting video</a>&nbsp;also became a standard feature with the&nbsp;<a title=\"IPhone 3GS\" href=\"https://en.wikipedia.org/wiki/IPhone_3GS\">iPhone 3GS</a>. Other functionality, such as video games, reference works, and social networking, can be enabled by downloading&nbsp;<a title=\"Mobile app\" href=\"https://en.wikipedia.org/wiki/Mobile_app\">mobile apps</a>. As of January&nbsp;2017, Apple\'s&nbsp;<a title=\"App Store (iOS)\" href=\"https://en.wikipedia.org/wiki/App_Store_(iOS)\">App Store</a>&nbsp;contained more than 2.2&nbsp;million applications available for the iPhone.</p>\r\n<p>Apple has released twelve&nbsp;<a class=\"mw-redirect\" title=\"Comparison of Apple iPhone\" href=\"https://en.wikipedia.org/wiki/Comparison_of_Apple_iPhone\">generations</a>&nbsp;of iPhone models, each accompanied by one of the twelve major releases of the&nbsp;<a title=\"IOS\" href=\"https://en.wikipedia.org/wiki/IOS\">iOS</a>&nbsp;operating system. The&nbsp;<a title=\"IPhone (1st generation)\" href=\"https://en.wikipedia.org/wiki/IPhone_(1st_generation)\">first-generation iPhone</a>&nbsp;was a&nbsp;<a title=\"GSM\" href=\"https://en.wikipedia.org/wiki/GSM\">GSM</a>&nbsp;phone and established design precedents, such as a button placement that has persisted throughout all releases and a screen size maintained for the next four iterations. The&nbsp;<a title=\"IPhone 3G\" href=\"https://en.wikipedia.org/wiki/IPhone_3G\">iPhone 3G</a>&nbsp;added&nbsp;<a title=\"3G\" href=\"https://en.wikipedia.org/wiki/3G\">3G</a>&nbsp;network support and was followed by the&nbsp;<a title=\"IPhone 3GS\" href=\"https://en.wikipedia.org/wiki/IPhone_3GS\">iPhone 3GS</a>&nbsp;with improved hardware, the&nbsp;<a title=\"IPhone 4\" href=\"https://en.wikipedia.org/wiki/IPhone_4\">iPhone 4</a>&nbsp;with a metal chassis, higher display resolution, and front-facing camera, and the&nbsp;<a title=\"IPhone 4S\" href=\"https://en.wikipedia.org/wiki/IPhone_4S\">iPhone 4S</a>&nbsp;with improved hardware and the voice assistant&nbsp;<a title=\"Siri\" href=\"https://en.wikipedia.org/wiki/Siri\">Siri</a>. The&nbsp;<a title=\"IPhone 5\" href=\"https://en.wikipedia.org/wiki/IPhone_5\">iPhone 5</a>&nbsp;featured a taller, 4 inches (100&nbsp;mm) display and Apple\'s newly introduced&nbsp;<a title=\"Lightning (connector)\" href=\"https://en.wikipedia.org/wiki/Lightning_(connector)\">Lightning connector</a>. In 2013, Apple released the&nbsp;<a title=\"IPhone 5S\" href=\"https://en.wikipedia.org/wiki/IPhone_5S\">iPhone 5S</a>&nbsp;with improved hardware and a&nbsp;<a title=\"Touch ID\" href=\"https://en.wikipedia.org/wiki/Touch_ID\">fingerprint reader</a>&nbsp;(marketed as \'Touch ID\'), and the lower-cost&nbsp;<a title=\"IPhone 5C\" href=\"https://en.wikipedia.org/wiki/IPhone_5C\">iPhone 5C</a>, a version of the 5 with colored plastic casings instead of metal. They were followed by the larger&nbsp;<a title=\"IPhone 6\" href=\"https://en.wikipedia.org/wiki/IPhone_6\">iPhone 6 and iPhone 6 Plus</a>, with models featuring 4.7-and-5.5-inch (120 and 140&nbsp;mm) displays. The&nbsp;<a title=\"IPhone 6S\" href=\"https://en.wikipedia.org/wiki/IPhone_6S\">iPhone 6S</a>&nbsp;was introduced the following year, which featured hardware upgrades and support for&nbsp;<a class=\"mw-redirect\" title=\"3D Touch\" href=\"https://en.wikipedia.org/wiki/3D_Touch\">pressure-sensitive touch inputs</a>, as well as the&nbsp;<a title=\"IPhone SE\" href=\"https://en.wikipedia.org/wiki/IPhone_SE\">iPhone SE</a>&mdash;which featured hardware from the 6S but the smaller form factor of the 5S. In 2016, Apple unveiled the&nbsp;<a title=\"IPhone 7\" href=\"https://en.wikipedia.org/wiki/IPhone_7\">iPhone 7 and iPhone 7 Plus</a>, which add water resistance, improved system, and graphics performance, a new rear dual-camera setup on the Plus model, and new color options, while removing the 3.5&nbsp;mm headphone jack found on previous models. The&nbsp;<a title=\"IPhone 8\" href=\"https://en.wikipedia.org/wiki/IPhone_8\">iPhone 8 and iPhone 8 Plus</a>&nbsp;were released in 2017, adding a glass back and an improved screen and camera. The&nbsp;<a title=\"IPhone X\" href=\"https://en.wikipedia.org/wiki/IPhone_X\">iPhone X</a>&nbsp;was released alongside the iPhone 8 and iPhone 8 Plus, with its highlights being a near bezel-less design, an improved camera, and a new facial recognition system, named&nbsp;<a title=\"Face ID\" href=\"https://en.wikipedia.org/wiki/Face_ID\">Face ID</a>, but having no home button, and therefore, no&nbsp;<a title=\"Touch ID\" href=\"https://en.wikipedia.org/wiki/Touch_ID\">Touch ID</a>. In September 2018, Apple released 3 new iPhones, which are the&nbsp;<a title=\"IPhone XS\" href=\"https://en.wikipedia.org/wiki/IPhone_XS\">iPhone XS</a>, an upgraded version of the since discontinued iPhone X,&nbsp;<a class=\"mw-redirect\" title=\"IPhone XS Max\" href=\"https://en.wikipedia.org/wiki/IPhone_XS_Max\">iPhone XS Max</a>, a larger variant with the series\' biggest display as of 2018&nbsp;and&nbsp;<a title=\"IPhone XR\" href=\"https://en.wikipedia.org/wiki/IPhone_XR\">iPhone XR</a>, a lower-end version of the iPhone X. On September 10, 2019, Apple again released 3 new iPhones, which are&nbsp;<a title=\"IPhone 11 Pro\" href=\"https://en.wikipedia.org/wiki/IPhone_11_Pro\">iPhone 11 Pro</a>,&nbsp;<a class=\"mw-redirect\" title=\"IPhone 11 Pro Max\" href=\"https://en.wikipedia.org/wiki/IPhone_11_Pro_Max\">iPhone 11 Pro Max</a>, and the lower-end&nbsp;<a title=\"IPhone 11\" href=\"https://en.wikipedia.org/wiki/IPhone_11\">iPhone 11</a>.</p>\r\n<p>The first-generation iPhone was described as \"revolutionary\" and a \"game-changer\" for the mobile phone industry. Subsequent iterations of the iPhone have also garnered praise. The iPhone is one of the most widely used smartphones in the world, and its success has been credited with helping Apple become one of the world\'s&nbsp;<a title=\"List of public corporations by market capitalization\" href=\"https://en.wikipedia.org/wiki/List_of_public_corporations_by_market_capitalization\">most valuable publicly traded companies</a>.</p>', 507.000, 'upload/1c63e8b042.png', 1, '2020-04-05 18:58:33'),
(7, 'lorem ipsum', 3, 2, '<div>\r\n<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>', 507.000, 'upload/0cefbeea08.jpg', 0, '2020-04-05 19:24:23'),
(9, 'lorem ipsum', 6, 1, '<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 507.000, 'upload/f141edf256.jpg', 1, '2020-04-05 19:23:45'),
(10, 'lorem ipsum', 6, 5, '<p>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 609.000, 'upload/97d623797f.png', 1, '2020-04-05 19:04:10'),
(11, 'lorem ipsum', 2, 3, '<p><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an known printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 609.000, 'upload/ff309d3099.jpg', 0, '2020-04-05 18:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `title`) VALUES
(1, 'upload/slider/21c84d4b36.jpg', 'First slider tittle will go here'),
(5, 'upload/slider/e39e1b087d.jpg', 'Second slider tittle will go here'),
(6, 'upload/slider/0ec3f538e6.jpg', 'Third slider title will go here'),
(7, 'upload/slider/71e95f5b0c.jpg', 'Four slider title will go here');

-- --------------------------------------------------------

--
-- Table structure for table `website_logo`
--

CREATE TABLE `website_logo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_logo`
--

INSERT INTO `website_logo` (`id`, `image`) VALUES
(1, 'upload/ad4fca9d00.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(155) NOT NULL,
  `brandName` varchar(155) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_title`
--
ALTER TABLE `admin_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cmrId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_logo`
--
ALTER TABLE `website_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_title`
--
ALTER TABLE `admin_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companyinfo`
--
ALTER TABLE `companyinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cmrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `website_logo`
--
ALTER TABLE `website_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
