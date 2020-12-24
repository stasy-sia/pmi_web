-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 24 2020 г., 14:28
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
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `gramm` int DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `name_page` varchar(500) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `gramm`, `picture`, `category`, `name_page`) VALUES
(1, 'Бутерброд с яйцом', 250, 100, 'eggs1.png', 'Завтрак', 'eggs1.html'),
(2, 'Блинчики с мёдом', 120, 90, 'pankayk.png', 'Завтрак', 'pankayk.html'),
(3, 'Домашняя овсяная каша', 150, 250, 'kasha.png', 'Завтрак', 'kasha.html'),
(4, 'Скрамбл', 260, 100, 'skrambl.png', 'Завтрак', 'skrambl.html'),
(5, 'Авакадо Тост с лососем', 410, 120, 'avakado.png', 'Завтрак', 'avakado.html'),
(6, 'Гранола c йогуртом', 260, 150, 'granola.png', 'Завтрак', 'granola.html'),
(7, 'Домашний йогурт с ягодным соусом', 180, 250, 'iogurt.png', 'Завтрак', 'iogurt.html'),
(8, 'Сырники', 270, 130, 'sirniki.png', 'Завтрак', 'sirniki.html'),
(9, 'Куриный супчик с домашней лапшой', 300, 240, 'kurini_sup.png', 'Обед / Ужин', 'kurini_sup.html'),
(10, 'Лосось с Птитином', 620, 270, 'losos.png', 'Обед / Ужин', 'losos.html'),
(11, 'Рис с курицей Тереяки', 410, 230, 'tereaki.png', 'Обед / Ужин', 'tereaki.html'),
(12, 'Суп крем тыквенный', 290, 300, 'sup_tik.png', 'Обед / Ужин', 'sup_tik.html'),
(13, 'Стейк из вырезки говядины под перечным соусом', 750, 180, 'staik.png', 'Обед / Ужин', 'staik.html'),
(14, 'Бефстроганов с картофельным пюре по особому рецепту', 510, 350, 'befstrog.png', 'Обед / Ужин', 'befstrog.html'),
(15, 'Котлета по-киевски', 410, 310, 'kotletakiev.png', 'Обед / Ужин', 'kotletakiev.html'),
(16, 'Кальмар в сливочном соусе с булгуром', 470, 290, 'kalmar.png', 'Обед / Ужин', 'kalmar.html'),
(17, 'Торт \"Чизкейк\"', 150, 1, 'chizcaick.png', 'Десерты', 'chizcaick.html'),
(18, 'Торт \"Манго\"', 150, 1, 'mango_cake.png', 'Десерты', 'mango_cake.html'),
(19, 'Пирожное \"Тирамису\"', 140, 1, 'tiramisu.png', 'Десерты', 'tiramisu.html'),
(20, 'Пирожное \"Наполеон\"', 130, 1, 'napoleon.png', 'Десерты', 'napoleon.html'),
(21, 'Пирожное \"Сочник\"', 50, 1, 'si4nik.png', 'Десерты', 'si4nik.html'),
(22, 'Яблочная шарлотка', 120, 1, 'applesharlota.png', 'Десерты', 'applesharlota.html'),
(23, 'Торт \"Медовик\"', 130, 1, 'medovik.png', 'Десерты', 'medovik.html'),
(24, 'Маффин с шоколадом', 100, 1, 'maffin.png', 'Десерты', 'maffin.html'),
(25, 'TEALATTE', 190, 350, 'tealatte.png', 'Напитки', 'tealatte.html'),
(26, 'Малиновый чай с мёдом и мятой', 290, 600, 'malintea.png', 'Напитки', 'malintea.html'),
(27, 'Сенча', 250, 600, 'sencha.png', 'Напитки', 'sencha.html'),
(28, 'Молочный улун', 250, 600, 'ulun.png', 'Напитки', 'ulun.html'),
(29, 'Латте', 160, 250, 'latte.png', 'Напитки', 'latte.html'),
(30, 'Гляссе', 190, 250, 'glasse.png', 'Напитки', 'glasse.html'),
(31, 'Капучино', 150, 200, 'capuchino.png', 'Напитки', 'capuchino.html'),
(32, 'Грог', 580, 1000, 'grog.png', 'Напитки', 'grog.html');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
