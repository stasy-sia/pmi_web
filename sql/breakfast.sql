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
-- Структура таблицы `breakfast`
--

CREATE TABLE `breakfast` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `gramm` int DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `name_page` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `breakfast`
--

INSERT INTO `breakfast` (`id`, `name`, `price`, `gramm`, `picture`, `category`, `name_page`) VALUES
(1, 'Бутерброд с яйцом', 250, 100, 'eggs1.png', 'Завтрак', 'eggs1.html'),
(2, 'Блинчики с мёдом', 120, 90, 'pankayk.png', 'Завтрак', 'pankayk.html'),
(3, 'Домашняя овсяная каша', 150, 250, 'kasha.png', 'Завтрак', 'kasha.html'),
(4, 'Скрамбл', 260, 100, 'skrambl.png', 'Завтрак', 'skrambl.html'),
(5, 'Авакадо Тост с лососем', 410, 120, 'avakado.png', 'Завтрак', 'avakado.html'),
(6, 'Гранола c йогуртом', 260, 150, 'granola.png', 'Завтрак', 'granola.html'),
(7, 'Домашний йогурт с ягодным соусом', 180, 250, 'iogurt.png', 'Завтрак', 'iogurt.html'),
(8, 'Сырники', 270, 130, 'sirniki.png', 'Завтрак', 'sirniki.html');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `breakfast`
--
ALTER TABLE `breakfast`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `breakfast`
--
ALTER TABLE `breakfast`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
