-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 09 2020 г., 20:26
-- Версия сервера: 8.0.19
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
-- Структура таблицы `dinner`
--

CREATE TABLE `dinner` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `gramm` int DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dinner`
--

INSERT INTO `dinner` (`id`, `name`, `price`, `gramm`, `picture`, `category`) VALUES
(1, 'Куриный супчик с домашней лапшой', 300, 240, 'kurini_sup.png', 'Обед'),
(2, 'Лосось с Птитином', 620, 270, 'losos.png', 'Обед'),
(3, 'Рис с курицей Тереяки', 410, 230, 'tereaki.png', 'Обед'),
(4, 'Суп крем тыквенный', 290, 300, 'sup_tik.png', 'Обед'),
(5, 'Стейк из вырезки говядины под перечным соусом', 750, 180, 'staik.png', 'Обед'),
(6, 'Бефстроганов с картофельным пюре по особому рецепту', 510, 350, 'befstrog.png', 'Обед'),
(7, 'Котлета по-киевски', 410, 310, 'kotletakiev.png', 'Обед'),
(8, 'Кальмар в сливочном соусе с булгуром', 470, 290, 'kalmar.png', 'Обед');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dinner`
--
ALTER TABLE `dinner`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dinner`
--
ALTER TABLE `dinner`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
