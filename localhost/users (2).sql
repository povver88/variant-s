-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2019 г., 13:39
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `Id` int(1) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`Id`, `Login`, `Password`) VALUES
(1, 'root', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `managers`
--

CREATE TABLE `managers` (
  `Login` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `Id` int(11) NOT NULL,
  `Usertype` varchar(255) NOT NULL,
  `Opt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `managers`
--

INSERT INTO `managers` (`Login`, `Phone`, `Email`, `Pass`, `Id`, `Usertype`, `Opt`) VALUES
('ZeRo_CU', '523523', 'vremapriklucenij16@gmail.com', '123', 37, 'Manager', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `Name` varchar(255) NOT NULL,
  `Article` varchar(255) NOT NULL,
  `Brend` varchar(255) NOT NULL,
  `Count` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `ArticlePhoto` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  `TopSell` tinyint(1) NOT NULL,
  `TopPrice` tinyint(1) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`Name`, `Article`, `Brend`, `Count`, `Price`, `Photo`, `ArticlePhoto`, `Category`, `Availability`, `TopSell`, `TopPrice`, `Description`, `Id`) VALUES
('pushka', '56657', 'jordan', '8', '67', '8ceb09d18f772969cb38b287dcb6ce90', '2876988e3710a3194f8891465af5b304', 'Різне', 1, 1, 1, 'PUUUUUUUUSHKA', 2),
('TopProduct', '46436', 'rterrgr', '3', '8888', '27df58c26cf0ec360c81d47a4fcf54b6', '3e3d5e709233f2baf81eb85e1b771f94', 'Дитячі товари', 1, 1, 0, 'ygerwggrg', 3),
('Вовк', '6546547', 'gucci', '6', '667', 'c2575789bab827831c3c74675a33494e', 'f6d195a00f8bf4ebb9c2c6d9a064d12c', 'Зошити та блокноти', 1, 0, 0, 'dgdgsddgrgregregfghtrrgfgafetg', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `Login` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Pass` varchar(32) NOT NULL,
  `Id` int(11) NOT NULL,
  `Opt` varchar(255) NOT NULL,
  `Usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`Login`, `Phone`, `Email`, `Pass`, `Id`, `Opt`, `Usertype`) VALUES
('povver88', 'grrrrrrrrrr', '', '1212', 43, '0', 'User'),
('BiLLiON_CU', '58678', '4342', '123', 45, '2', 'User'),
('Vanya', '7893457843975', '', '3434', 46, '0', 'User'),
('Olesya', 'eteteryrey', '', '3434', 47, '0', ''),
('Bodya', '89849584395', '', '3434', 48, '0', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `managers`
--
ALTER TABLE `managers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
