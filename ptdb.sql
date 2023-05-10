-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2020 年 02 月 08 日 21:15
-- 伺服器版本: 5.7.29-0ubuntu0.18.04.1
-- PHP 版本： 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ptdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `post_number` int(10) UNSIGNED NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` mediumtext NOT NULL,
  `post_hot` mediumint(8) UNSIGNED NOT NULL,
  `post_time` datetime NOT NULL,
  `post_hide` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='for practice';

--
-- 資料表的匯出資料 `post`
--

INSERT INTO `post` (`post_number`, `post_title`, `post_content`, `post_hot`, `post_time`, `post_hide`) VALUES
(1, 'test', '<p><span style=\"font-size:72px\">早安</span></p>\r\n', 20, '2020-02-04 17:33:25', 0),
(2, 'that is a test', '<p>這是隻兔兔</p>\r\n', 75, '2020-02-04 16:55:32', 0),
(3, '123312323', '<p>qwrewrqr</p>\r\n', 5, '2020-02-04 16:55:20', 0),
(4, 'fuffufudus', '<p>asfdsafadsf</p>\r\n', 6, '2020-02-04 16:47:13', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_number` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_pw` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='for user';

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`user_number`, `user_id`, `user_pw`) VALUES
(1, 'ubereats', '$2y$10$eB6QfUibm4iXJGt.aY8eaOglj0mjt2u3EqfxgBLUupvhu11ELsURy'),
(2, 'test', '$2y$10$sGCa33GL7sJU9.rbDIwENOL24jApAeWZQDEnDdu8LjR6TDGGnH/wq'),
(3, 'this is a test', '$2y$10$9ffKZt5Fzpf2q9JZsDsZgentQ9v/NNg.MJ6bIob4kACQ7nlEFDP36'),
(4, '', '$2y$10$q7N005T138X/m2ohRhEmteKoU81OJXPEzLrz1tgpchEaBYqy6pwyK'),
(5, 'qwe', '$2y$10$WVJXxCgtgCNoNb..jtrza.BLcL3nWzd1MVpzmzzw2UKO5hyCdDyJO');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_number`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_number`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `post_number` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
