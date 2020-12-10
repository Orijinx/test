-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 10 2020 г., 17:46
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testprog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `SALES`
--

CREATE TABLE `sales` (
  `IDClient` int(11) NOT NULL,
  `NameClient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Period` date NOT NULL,
  `Sum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `SALES`
--

INSERT INTO `SALES` (`IDClient`, `NameClient`, `Period`, `Sum`) VALUES
(1, 'АВТОВОКЗАЛ КАЛУГА 1735', '2018-10-01', 19960),
(2, 'АДВОКАТСКАЯ_ПАЛАТА КАЛУГА 1061', '2018-10-01', 60);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `SALES`
--
ALTER TABLE `SALES`
  ADD PRIMARY KEY (`IDClient`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `SALES`
--
ALTER TABLE `SALES`
  MODIFY `IDClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
