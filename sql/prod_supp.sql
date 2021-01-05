-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 05 2021 г., 16:58
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
-- Структура таблицы `prod_supp`
--

CREATE TABLE `prod_supp` (
  `id_supp` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prod_supp`
--

INSERT INTO `prod_supp` (`id_supp`, `id_prod`, `count`, `price`) VALUES
(1, 1, 1000, 10000),
(1, 2, 2000, 20000),
(1, 3, 3000, 30000),
(2, 4, 1000, 10000),
(2, 5, 2000, 20000),
(2, 6, 3000, 30000),
(3, 7, 1000, 10000),
(3, 8, 2000, 20000),
(3, 9, 3000, 30000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
