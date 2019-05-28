-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 21 2019 г., 02:37
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
  `Opt` varchar(255) NOT NULL,
  `Sell` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('pushka3', 'jfkdjfk', 'gucci', '3', '3', '80bf6962d74a2dfbda5a7ed5e5dde799', '7dc9fed6e644c88686398bb4f1f21de0', 'Різне', 1, 0, 1, 'jfkdjfkdjfkjdkgfjdkgjkdjgikejiejiejiej', 11),
('second', '834786347', 'hsha', '3', '666', '952d872b3749ce5c5289ffb4eedb2f6c', 'e3615500da78be43bebd6a463bba2149', 'Декор', 1, 0, 0, 'gjjfhvkjhfjhg jkhjh n jh sj fjhgjfhgjh kmgv g', 12),
('Ручка', '74873684376', '1 Вересня', '67', '120', '0438c57201ef8516140a706291b831ea', 'daeabda8ba282624a4b32bda4c7ebe41', 'Декор', 1, 0, 0, 'офвамрвялоарп лоіурквдлпві тршгпіуртоланроарркорпорукрвдлопасоупаоуцр мйц4 цуркуор', 13),
('Книжка1', '8785437857', 'Топ', '3', '89', '6e912adddfe76122d3f292d075f7b97b', '28f46230a02ee47134b0546c071c8c2c', 'Книжки та розмальовки', 1, 0, 0, 'олаволіполраплаовлповло л лопліво  лівоіловпр ецурлдіавові л а лалдоіавлоавловіа   о ра длол двава  ораор пкравпрпопрволророатрп оар воп ролрпола', 14),
('Книжка2', '6876854', 'Топ', '6', '500', '753bd332b97380d306d57c843f77fe1b', 'a4abad9c569a373d9fdf6127e0b42d87', 'Книжки та розмальовки', 1, 0, 0, 'бваолоп рфвілдмреглрлові оруцор аол рварт', 15),
('Книжка3', '586754968', 'Топ', '68', '785', 'd7190566a1c08c577f16a8118ae00a23', '45aae9393ec482ba1ebc142abc5a98c1', 'Книжки та розмальовки', 1, 0, 0, 'шкгпшукгешукешгомшугощш  гоу н угшщ уковіа  уп ол п огиу шол', 16),
('smth', '1234567', 're', '90', '56', '8153097f9e37459185af6b00ee7a0a3f', '92539f3555304d2b07aa2622fab304f5', 'Декор', 1, 0, 0, 'fdfgfvjghghgh', 17);

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
  `Usertype` varchar(255) NOT NULL,
  `Sell1` float NOT NULL,
  `Sell2` float NOT NULL,
  `Sell3` float NOT NULL,
  `Sell4` float NOT NULL,
  `Sell5` float NOT NULL,
  `Sell6` float NOT NULL,
  `Sell7` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`Login`, `Phone`, `Email`, `Pass`, `Id`, `Opt`, `Usertype`, `Sell1`, `Sell2`, `Sell3`, `Sell4`, `Sell5`, `Sell6`, `Sell7`) VALUES
('Bodya', '36363', 'vremapriklucenij16@gmail.com', '4545', 63, '1', 'User', 0, 0, 0, 0, 0, 0, 0);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
