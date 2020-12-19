-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2020 г., 00:23
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
  `category` varchar(500) DEFAULT NULL,
  `name_page` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dinner`
--

INSERT INTO `dinner` (`id`, `name`, `price`, `gramm`, `picture`, `category`, `name_page`) VALUES
(1, 'Куриный супчик с домашней лапшой', 300, 240, 'kurini_sup.png', 'Обед', 'kurini_sup.html'),
(2, 'Лосось с Птитином', 620, 270, 'losos.png', 'Обед', 'losos.html'),
(3, 'Рис с курицей Тереяки', 410, 230, 'tereaki.png', 'Обед', 'tereaki.html'),
(4, 'Суп крем тыквенный', 290, 300, 'sup_tik.png', 'Обед', 'sup_tik.html'),
(5, 'Стейк из вырезки говядины под перечным соусом', 750, 180, 'staik.png', 'Обед', 'staik.html'),
(6, 'Бефстроганов с картофельным пюре по особому рецепту', 510, 350, 'befstrog.png', 'Обед', 'befstrog.html'),
(7, 'Котлета по-киевски', 410, 310, 'kotletakiev.png', 'Обед', 'kotletakiev.html'),
(8, 'Кальмар в сливочном соусе с булгуром', 470, 290, 'kalmar.png', 'Обед', 'kalmar.html');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
