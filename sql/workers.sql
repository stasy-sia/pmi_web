-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 05 2021 г., 16:59
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
-- База данных: `regist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_cafe` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `id_cafe`, `name`, `position`, `salary`) VALUES
(1, 1, 'Имя 1', 'Должность 1', 1000),
(2, 1, 'Имя 2', 'Должность 2', 2000),
(3, 1, 'Имя 3', 'Должность 3', 3000),
(4, 2, 'Имя 4', 'Должность 1', 1000),
(5, 2, 'Имя 5', 'Должность 2', 2000),
(6, 2, 'Имя 6', 'Должность 3', 3000),
(7, 3, 'Имя 7', 'Должность 1', 1000),
(8, 3, 'Имя 8', 'Должность 2', 2000),
(9, 3, 'Имя 9', 'Должность 3', 3000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
