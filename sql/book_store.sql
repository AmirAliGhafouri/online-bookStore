-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 09:12 AM
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
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_ID` int(11) NOT NULL,
  `bookName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `page_count` int(11) NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `book_picture` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `book_file` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_ID`, `bookName`, `author`, `page_count`, `category`, `description`, `book_picture`, `book_file`) VALUES
(1, 'children_book1', 'author name', 11, 'children', 'Description of the book ...', 'children1.png', 'children_book_1.pdf'),
(2, 'children_book2', 'author name', 36, 'children', 'Description of the book ...', 'children2.png', 'children_book_2.pdf'),
(3, 'children_book3', 'author name', 32, 'children', 'Description of the book ...', 'children3.png', 'children_book_3.pdf'),
(4, 'children_book4', 'author name', 23, 'children', 'Description of the book ...', 'children4.png', 'children_book_4.pdf'),
(5, 'learn_php', 'author name', 175, 'educational', 'Description of the book ...', '51AkW1znNmL._SX379_BO1,204,203,200_.jpg', 'learn_php.pdf'),
(6, 'learn_php2', 'author name', 108, 'educational', 'Description of the book ...', '51eoCliNb-L._SX258_BO1,204,203,200_.jpg', 'learn_php2.pdf'),
(7, 'python', 'author name', 233, 'educational', 'Description of the book ...', '517m8+OZoTS._SS400_.jpg', 'python.pdf'),
(8, 'computer', 'author name', 124, 'educational', 'Description of the book ...', 'computer-graphics-and-multimedia-book-500x500.png', 'computer.pdf'),
(9, 'learn_c++', 'author name', 123, 'educational', 'Description of the book ...', 'computer-science-with-c-class-xi-500x500.jpg', 'c++.pdf'),
(10, 'learn_german', 'author name', 76, 'language', 'Description of the book ...', '9781119717140.jpg', 'german.pdf'),
(11, 'learn_russian', 'author name', 45, 'language', 'Description of the book ...', '9781119868606.jpg', 'russian.pdf'),
(12, 'learn_latin', 'author name', 96, 'language', 'Description of the book ...', '9781119874799.jpg', 'latin.pdf'),
(13, 'learn_brazilian', 'author name', 56, 'language', 'Description of the book ...', '9781119894650.jpg', 'brazilian.pdf'),
(14, 'kite runner', 'author name', 156, 'novel', 'Description of the book ...', '1-The-Kite-Runner-Riverhead-Edition.jpg', 'kite_runner.pdf'),
(15, 'To Kill A Mockingbird', 'author name', 531, 'novel', 'Description of the book ...', '4-To-Kill-A-Mockingbird-J.B.-Lippincott-and-Company-Edition.jpg', 'kill.pdf'),
(16, 'dune', 'author name', 459, 'novel', 'Description of the book ...', '71SZk092xML.jpg', 'dune.pdf'),
(17, 'death comes to call', 'author name', 453, 'novel', 'Description of the book ...', '517PJt-WqTL.jpg', 'death.pdf'),
(18, 'harry potter', 'author name', 452, 'novel', 'Description of the book ...', 'fiction_harry_potter_a.jpg', 'harry_pottre.pdf'),
(19, 'fal hafez', 'author name', 200, 'poem', 'Description of the book ...', 'hafez.jpg', 'hafez.pdf'),
(20, 'bosstan', 'author name', 259, 'poem', 'Description of the book ...', 'fsci890.jpg', 'boostan.pdf'),
(21, 'masnavi manavi', 'author name', 300, 'poem', 'Description of the book ...', 'masnavi.jpg', 'masnavi.pdf'),
(22, 'nahjol balagheh', 'author name', 156, 'religious', 'Description of the book ...', 'nahj.jpg', 'religious2.pdf'),
(23, 'sahife sajadie', 'author name', 42, 'religious', 'Description of the book ...', '8987817964665166.jpg', 'religious1.pdf'),
(24, 'creat scientists', 'author name', 453, 'scientific', 'Description of the book ...', '51V2GUtGNOL._SX381_BO1,204,203,200_.jpg', 'scientific1.pdf'),
(25, 'stephen hawking', 'author name', 12, 'scientific', 'Description of the book ...', 'best-scientific-books-1.jpg', 'scientific2.pdf'),
(26, 'science', '', 0, 'scientific', 'Description of the book ...', 'science-intermediate-book-500x500.jpg', 'scientific3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `download_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `book_ID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `credit_card_num` int(30) NOT NULL,
  `date` date NOT NULL,
  `subscription_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `firstName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `confirmCode` int(6) NOT NULL,
  `activation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `subscription` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `subscription_end` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nationalCard_pic` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_ID`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`download_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `download_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
