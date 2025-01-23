-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-03-25 16:45:06
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `phpdb`
--
CREATE DATABASE IF NOT EXISTS `phpdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpdb`;

-- --------------------------------------------------------

--
-- テーブルの構造 `messages`
--

CREATE TABLE `messages` (
  `no` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `messages`
--

INSERT INTO `messages` (`no`, `name`, `message`, `created`, `deleted`, `image`) VALUES
(12, 'ああああ', 'ああああ', '2024-03-22 11:42:50', 0, NULL),
(13, 'ああああ', 'ああああ', '2024-03-22 11:42:55', 0, NULL),
(14, 'ああああ', 'ああああ', '2024-03-22 11:43:05', 0, NULL),
(15, 'ああああ', 'ああああ', '2024-03-22 11:43:09', 0, NULL),
(16, 'ああああ', 'ああああ', '2024-03-22 11:43:14', 0, NULL),
(17, 'ああああ', 'ああああ', '2024-03-22 11:43:20', 0, NULL),
(18, 'ああああ', 'ああああ', '2024-03-22 11:43:24', 0, NULL),
(19, 'ああああ', 'ああああ', '2024-03-22 11:43:29', 0, NULL),
(20, 'ああああ', 'あああ1', '2024-03-22 11:43:33', 1, NULL),
(21, 'ああああ', 'ああああ', '2024-03-22 11:43:50', 1, NULL),
(22, 'ｗｗｗｗ', 'ｗｗｗ1', '2024-03-22 11:44:02', 1, NULL),
(23, 'taro', '1111', '2024-03-22 11:51:40', 1, NULL),
(26, 'taro', '111', NULL, 1, 'uploads/空白の図.png'),
(27, 'taro', 'ああ', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(28, 'taro', 'あ', NULL, 1, 'uploads/827c350ab3243846-photo.jpg'),
(29, 'taro', 'あ', NULL, 1, ''),
(30, '', '', NULL, 0, ''),
(31, '', '', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(32, 'taro', '1', NULL, 0, ''),
(33, 'taro', '', NULL, 0, ''),
(34, 'taro', '', NULL, 0, ''),
(35, 'ああああ', '1', NULL, 0, ''),
(36, 'taro', '', NULL, 0, ''),
(37, 'taro', '1', NULL, 0, ''),
(38, '', '', NULL, 0, ''),
(39, '1', '1', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(40, 'taro', '1', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(41, 'taro1', '11', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(42, 'あ', 'あ', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(43, 'taro', '1', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(44, 'あ', 'あ', NULL, 1, 'uploads/0314_06.png'),
(45, 'taro', '1', NULL, 1, 'uploads/1a9e5683555d31bc-photo.png'),
(46, '', '', NULL, 1, 'uploads/827c350ab3243846-photo.jpg'),
(47, 'ああああ', '1', NULL, 1, ''),
(48, '1', '1', NULL, 1, 'uploads/0314_04.jpg'),
(49, 'あ', 'あ', NULL, 1, 'uploads/1a9e5683555d31bc-photo.JPG'),
(50, 'taro', '1', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(51, 'あ', 'あ', NULL, 1, 'uploads/0314_07.png'),
(52, '1', '1', NULL, 1, 'uploads/827c350ab3243846-photo.jpg'),
(53, 'あ', 'あ', NULL, 1, 'uploads/1a9e5683555d31bc-photo.JPG'),
(54, 'あ', 'あ', NULL, 1, ''),
(55, 'ああああ', '1', NULL, 1, 'uploads/827c350ab3243846-photo.jpg'),
(56, 'ああああ', '1', NULL, 1, 'uploads/1a9e5683555d31bc-photo.png'),
(57, 'あ', 'あ', NULL, 1, 'uploads/827c350ab3243846-photo.jpg'),
(58, 'あ', 'あ', NULL, 1, 'uploads/1a9e5683555d31bc-photo.png'),
(59, 'taro', '1', NULL, 0, ''),
(60, 'taro', '1', NULL, 1, 'uploads/0314_05.png'),
(61, 'taro', '1', NULL, 1, ''),
(62, 'taro', '1', NULL, 0, ''),
(63, 'taro', '1', NULL, 1, 'uploads/827c350ab3243846-photo.jpg'),
(64, 'taro', '1', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(65, 'taro', '1', NULL, 1, 'uploads/0314_04.jpg'),
(66, 'taro', '1', NULL, 1, 'uploads/827c350ab3243846-photo.jpg'),
(67, 'taro', '1あ', NULL, 1, ''),
(68, 'taro', '1', NULL, 1, 'uploads/1a9e5683555d31bc-photo.png'),
(69, 'taro', '1', NULL, 1, 'uploads/tOHIfSBABQkf7L01711174882_1711174905.png'),
(70, 'taro', '2', NULL, 1, ''),
(71, 'taro', '3', NULL, 1, 'uploads/tOHIfSBABQkf7L01711174882_1711174905.png'),
(72, 'taro', '1', NULL, 1, ''),
(73, 'taro', '2', NULL, 1, 'uploads/0314_04.jpg'),
(74, 'taro', 'あ', NULL, 1, 'uploads/827c350ab3243846-photo.jpg'),
(75, 'あ', 'あ1', NULL, 1, 'uploads/スクリーンショット 2024-02-20 153501.png'),
(76, 'taro', '11', NULL, 0, ''),
(77, 'taro', '1', NULL, 0, ''),
(78, 'あ', 'あ', NULL, 0, ''),
(79, 'あ', 'あ', NULL, 1, 'uploads/空白の図.png'),
(80, 'taro', '1', NULL, 0, ''),
(81, '1', '1', NULL, 0, ''),
(82, 'taro', 'あ', '2024-03-25 15:50:49', 0, ''),
(83, '1', '1', '2024-03-25 15:51:58', 1, 'uploads/1a9e5683555d31bc-photo.JPG'),
(84, 'taro', '22', '2024-03-25 16:26:11', 1, 'uploads/0314_04.jpg'),
(85, 'a', 'a', '2024-03-25 16:32:55', 1, 'uploads/空白の図.png');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`no`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
