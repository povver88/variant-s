-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 24 2019 г., 09:54
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
  `Id` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `ArticlePhoto` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  `TopSell` tinyint(1) NOT NULL,
  `TopPrice` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`Name`, `Article`, `Brend`, `Count`, `Price`, `Id`, `Photo`, `ArticlePhoto`, `Category`, `Availability`, `TopSell`, `TopPrice`) VALUES
('pushka', 'trtretr', 'balen', '4', '666', 17, '4144146670c5021c9815b89d0ae64ea9', '0395d846e4da253f5d3ef6910e83c74d', 'Зошити та блокноти', 1, 1, 0),
('bob', 'dggdrr7787', 'gucci', '4', '3', 18, '02ae8dec692f9b0dd8d6dd2e0fe80f94', 'eebf8eeec3b2ede09a5bd241ff2bbe37', 'Дитячі товари', 1, 0, 0);

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
('Olesya', 'eteteryrey', '', '3434', 47, '0', '');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
