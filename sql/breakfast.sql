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
-- Структура таблицы `breakfast`
--

CREATE TABLE `breakfast` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `gramm` int DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `breakfast`
--

INSERT INTO `breakfast` (`id`, `name`, `price`, `gramm`, `picture`, `category`) VALUES
(1, 'Бутерброд с яйцом', 250, 100, 'eggs1.png', 'Завтрак'),
(2, 'Блинчики с мёдом', 120, 90, 'pankayk.png', 'Завтрак'),
(3, 'Домашняя овсяная каша', 150, 250, 'kasha.png', 'Завтрак'),
(4, 'Скрамбл', 260, 100, 'skrambl.png', 'Завтрак'),
(5, 'Авакадо Тост с лососем', 410, 120, 'avakado.png', 'Завтрак'),
(6, 'Гранола c йогуртом', 260, 150, 'granola.png', 'Завтрак'),
(7, 'Домашний йогурт с ягодным соусом', 180, 250, 'iogurt.png', 'Завтрак'),
(8, 'Сырники', 270, 130, 'sirniki.png', 'Завтрак'),
(31, 'test', 123, 1234, '', 'Завтрак');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
