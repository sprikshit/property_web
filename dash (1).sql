-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 01:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dash`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `adminuser` varchar(255) NOT NULL,
  `adminpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `adminuser`, `adminpassword`) VALUES
(1, 'Dashadmin', 'prakash@123');

-- --------------------------------------------------------

--
-- Table structure for table `form_query`
--

CREATE TABLE `form_query` (
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(13) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_query`
--

INSERT INTO `form_query` (`name`, `email`, `number`, `message`) VALUES
('shivanshu', 'aaryika@gmail.com', 0, 'dsfdsfads'),
('shivanshu', 'manager@example.com', 0, 'sdfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImagesID` int(11) NOT NULL,
  `ImageName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImagesID`, `ImageName`, `Description`) VALUES
(8, 'p1.png', 'ww'),
(9, 'p1.png', ''),
(10, 'p2.jpeg', ''),
(11, 'p3.jpg', ''),
(12, 'p2.jpeg', ''),
(13, 'p1.png', ''),
(14, 'p2.jpeg', ''),
(15, 'p2.jpeg', ''),
(16, 'p1.png', ''),
(17, 'p2.jpeg', ''),
(18, 'p3.jpg', ''),
(19, 'p1.png', ''),
(20, 'p2.jpeg', ''),
(21, 'p3.jpg', ''),
(22, 'p2.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `imagess`
--

CREATE TABLE `imagess` (
  `ImagesID` int(11) NOT NULL,
  `ImageName` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Rooms` varchar(255) NOT NULL,
  `Washroom` varchar(255) NOT NULL,
  `Home` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `ImagesID` int(11) NOT NULL,
  `ImageName1` varchar(255) NOT NULL,
  `ImageName2` varchar(250) NOT NULL,
  `ImageName3` varchar(250) NOT NULL,
  `ImageName4` varchar(250) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `propertytype` text NOT NULL,
  `propertysize` varchar(200) NOT NULL,
  `Enterprise` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Description` varchar(222) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `video` varchar(250) NOT NULL,
  `selectprice` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`ImagesID`, `ImageName1`, `ImageName2`, `ImageName3`, `ImageName4`, `Status`, `Price`, `propertytype`, `propertysize`, `Enterprise`, `Location`, `Description`, `Contact`, `video`, `selectprice`) VALUES
(8, 'appdev.jpeg', 'Welcome.png', 'block.jpeg', 'block.jpeg', 'jksabsb', 'snmbmnsd ', 'jsbdmhsnabd', 'msna nmsad', 'smnbdmns d', 's,jbmnbf', 'SABKJBFDAS', '0', '', ''),
(9, '19362653.jpg', '', '', '', 'dfsdf', '12321', 'dsfcdsf', 'dsfdsfdfdsf', 'sdfcsafs', 'dsfdsf', 'dsfdsfdsf', '987654321', '', ''),
(10, 'block.jpeg', '', '', '', 'sell', '123432', 'shop', '2000sqft', 'sdsadd', 'noida', 'sadsadssa', '5432154321', '', '₹1cr - ₹3cr'),
(11, 'nft.jpg', '', '', '', 'sell', '123432', 'Office', '5000sqft', 'dfjlkdsajfj', 'gujrat', 'dsfsdfdsf sf ', '5432154321', '', '₹50,00,000 - ₹1cr');

-- --------------------------------------------------------

--
-- Table structure for table `picz`
--

CREATE TABLE `picz` (
  `ImagesID` int(11) NOT NULL,
  `ImageName1` varchar(250) NOT NULL,
  `ImageName2` varchar(250) NOT NULL,
  `ImageName3` varchar(250) NOT NULL,
  `ImageName4` varchar(11) NOT NULL,
  `Statuss` varchar(255) NOT NULL,
  `Pricee` varchar(50) DEFAULT NULL,
  `Bedroomm` varchar(255) NOT NULL,
  `Washroomm` varchar(200) NOT NULL,
  `Enterprisee` varchar(255) NOT NULL,
  `Locationn` varchar(255) NOT NULL,
  `Descriptionn` varchar(222) NOT NULL,
  `Contactt` varchar(255) NOT NULL,
  `videoss` varchar(40) DEFAULT NULL,
  `selectpricee` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `picz`
--

INSERT INTO `picz` (`ImagesID`, `ImageName1`, `ImageName2`, `ImageName3`, `ImageName4`, `Statuss`, `Pricee`, `Bedroomm`, `Washroomm`, `Enterprisee`, `Locationn`, `Descriptionn`, `Contactt`, `videoss`, `selectpricee`) VALUES
(100, 'Group 4.png', 'DSC09616.JPG', 'WhatsApp Image 2023-10-07 at 1.10.32 PM.jpeg', '0', 'rent', '2323232', '3', '3', 'asdfgg', 'delhi', 'werfdsd', '987654321', NULL, '₹50,00,000 - ₹1cr'),
(101, 'Group 4.png', 'newlogo (2).png', 'DSC09616.JPG', '0', 'sell', '2200000', '4', '2', 'dsssd', 'goa', 'fdssssdfssss', '9876545543', NULL, '₹50,00,000 - ₹1cr'),
(102, 'welcome 1.png', 'Group 4.png', 'WhatsApp Image 2023-10-07 at 1.10.32 PM.jpeg', '0', 'sell', '880000', '4', '2', 'wsem', 'ketal', 'fdsdfgfdsdffd', '93333333338', NULL, '₹0 - ₹50,00,000'),
(103, 'welcome.jpg', 'newlogo (2).png', 'Group 4.png', 'DSC09616.JP', 'Rent ', '552333', '5', '3', 'Shoba Divine', 'noida', 'gfbfb gsd ', '1234567890', 'video (2160p).mp4', ''),
(105, '19362653.jpg', '', '', '', 'sdsa', '21212', '3', '3', 'dfjlkdsajfj', 'sadasd', 'fsfsfsfs', 'sdsf', '', ''),
(106, '19362653.jpg', '', '', '', 'rent', '54324', '3', '3', 'fhsdf', 'asdjflasdj', 'dsfdsaf', '1234567890', '', '₹50,00,000 - ₹1cr'),
(107, 'nft.jpg', '', '', '', 'hhihih', '54324', '3', '3', 'sfsf', 'hkjhkh', 'dnfkjhdsahfilh ksudhfksadh  ', '5432154321', '', '₹3cr - ₹5cr'),
(108, '19362653.jpg', '', '', '', 'ddfdsaf', '4544324', '4', '4', 'dsfdsf3', 'sadsafs', 'sdfsdafasdf', '1234567890', '', '₹50,00,000 - ₹1cr');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(230) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`) VALUES
(1, 'bryt', 'bright.okrah@ashesi.edu.gh', '7b8b965ad4bca0e41ab51de7b31363a1'),
(0, 'demo', 'aaryika@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagess`
--
ALTER TABLE `imagess`
  ADD PRIMARY KEY (`ImagesID`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`ImagesID`);

--
-- Indexes for table `picz`
--
ALTER TABLE `picz`
  ADD PRIMARY KEY (`ImagesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imagess`
--
ALTER TABLE `imagess`
  MODIFY `ImagesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `ImagesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `picz`
--
ALTER TABLE `picz`
  MODIFY `ImagesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
