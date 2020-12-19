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
-- Структура таблицы `dessert`
--

CREATE TABLE `dessert` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `gramm` int DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `name_page` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dessert`
--

INSERT INTO `dessert` (`id`, `name`, `price`, `gramm`, `picture`, `category`, `name_page`) VALUES
(1, 'Торт \"Чизкейк\"', 150, 1, 'chizcaick.png', 'Десерты', 'chizcaick.html'),
(2, 'Торт \"Манго\"', 150, 1, 'mango_cake.png', 'Десерты', 'mango_cake.html'),
(3, 'Пирожное \"Тирамису\"', 140, 1, 'tiramisu.png', 'Десерты', 'tiramisu.html'),
(4, 'Пирожное \"Наполеон\"', 130, 1, 'napoleon.png', 'Десерты', 'napoleon.html'),
(5, 'Пирожное \"Сочник\"', 50, 1, 'si4nik.png', 'Десерты', 'si4nik.html'),
(6, 'Яблочная шарлотка', 120, 1, 'applesharlota.png', 'Десерты', 'applesharlota.html'),
(7, 'Торт \"Медовик\"', 130, 1, 'medovik.png', 'Десерты', 'medovik.html'),
(8, 'Маффин с шоколадом', 100, 1, 'maffin.png', 'Десерты', 'maffin.html');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dessert`
--
ALTER TABLE `dessert`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dessert`
--
ALTER TABLE `dessert`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
