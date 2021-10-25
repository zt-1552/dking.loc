-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2021 г., 21:44
-- Версия сервера: 10.3.29-MariaDB
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dking`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `title` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `slug`, `type`) VALUES
(1, 'Цвет телефона', 'color', NULL),
(2, 'Объем памяти', 'memory', 'Гб'),
(3, 'Емкость аккумулятора', 'accumulator', 'мА*ч'),
(4, 'Производитель', 'producer', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `meta_title`, `meta_description`, `content`, `short_content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Смартфоны и мобильные телефоны', 'Тайтл Смартфоны и мобильные телефоны ', 'Дескрипшен Смартфоны и мобильные телефоны\r\n', 'Какая-то статья', 'Какой-то маленький текст Смартфоны и мобильные телефоны\r\n', '', NULL, NULL, '2021-10-24 00:00:00'),
(2, NULL, 'Аксессуары для телефонов и смартфонов', 'Тайтл Аксессуары для мобильных телефонов и смартфонов ', 'Дескрипшен Аксессуары для мобильных телефонов и смартфонов', 'Какая-то статья', 'Какой-то маленький текст Аксессуары для мобильных телефонов и смартфонов', NULL, NULL, NULL, NULL),
(3, 2, 'Чехлы для мобильных телефонов', 'Тайтл Чехлы для мобильных телефонов', 'Дескрипшен Чехлы для мобильных телефонов', 'Какая-то статья', 'Какой-то маленький текстЧехлы для мобильных телефонов', NULL, NULL, NULL, NULL),
(4, 2, 'Универсальные мобильные батареи', 'Тайтл Универсальные мобильные батареи', 'Дескрипшен Универсальные мобильные батареи', 'Какая-то статья', 'Какой-то маленький текст Универсальные мобильные батареи', NULL, NULL, NULL, NULL),
(5, 2, 'Зарядные устройства', 'Тайтл Смартфоны и мобильные телефоны ', 'Дескрипшен Смартфоны и мобильные телефоны\r\n', 'Какая-то статья', 'Какой-то маленький текст Смартфоны и мобильные телефоны\r\n', NULL, NULL, NULL, NULL),
(6, 2, 'Защитные пленки и стекла', 'Тайтл Защитные пленки и стекла', 'Дескрипшен Защитные пленки и стекла', 'Какая-то статья', 'Какой-то маленький текст Защитные пленки и стекла', NULL, NULL, NULL, NULL),
(7, 2, 'Мобильная связь и интернет', 'Тайтл Мобильная связь и интернет', 'Дескрипшен Мобильная связь и интернет', 'Какая-то статья', 'Какой-то маленький текст Мобильная связь и интернет', NULL, NULL, NULL, NULL),
(8, NULL, 'Портативная электроника', 'Тайтл Портативная электроника', 'Дескрипшен Портативная электроника', 'Какая-то статья', 'Какой-то маленький текст Портативная электроника', NULL, NULL, NULL, NULL),
(9, 8, 'Стилусы и аксессуары', 'Тайтл Стилусы и аксессуары', 'Дескрипшен Стилусы и аксессуары', 'Какая-то статья', 'Какой-то маленький текст Стилусы и аксессуары', NULL, NULL, NULL, NULL),
(10, 8, 'Электронные книги', 'Тайтл Электронные книги', 'Дескрипшен Электронные книги', 'Какая-то статья', 'Какой-то маленький текст Электронные книги', NULL, NULL, NULL, NULL),
(11, 8, 'Диктофоны', 'Тайтл Диктофоны', 'Дескрипшен Диктофоны', 'Какая-то статья', 'Какой-то маленький текст Диктофоны', NULL, NULL, NULL, NULL),
(12, 8, 'MP3-плееры', 'Тайтл MP3-плееры', 'Дескрипшен MP3-плееры', 'Какая-то статья', 'Какой-то маленький текст MP3-плееры', NULL, NULL, NULL, NULL),
(13, 8, 'Док-станции', 'Тайтл Док-станции', 'Дескрипшен Док-станции', 'Какая-то статья', 'Какой-то маленький текст Док-станции', NULL, NULL, NULL, NULL),
(14, 8, 'Электронные переводчики', 'Тайтл Электронные переводчики', 'Дескрипшен Электронные переводчики', 'Какая-то статья', 'Какой-то маленький текст Электронные переводчики', NULL, NULL, NULL, NULL),
(15, 8, 'Рекордеры', 'Тайтл Рекордеры', 'Дескрипшен Рекордеры', 'Какая-то статья', 'Какой-то маленький текст Рекордеры', NULL, NULL, NULL, NULL),
(16, 8, 'GPS приёмники', 'Тайтл GPS приёмники', 'Дескрипшен GPS приёмники', 'Какая-то статья', 'Какой-то маленький текст GPS приёмники', NULL, NULL, NULL, NULL),
(17, NULL, 'Носимые гаджеты', 'Тайтл Носимые гаджеты', 'Дескрипшен Носимые гаджеты', 'Какая-то статья', 'Какой-то маленький текст Носимые гаджеты', NULL, NULL, NULL, NULL),
(18, 17, 'Смарт-часы', 'Тайтл Смарт-часы', 'Дескрипшен Смарт-часы', 'Какая-то статья', 'Какой-то маленький текст Смарт-часы', NULL, NULL, NULL, NULL),
(19, 17, 'Фитнес-браслеты', 'Тайтл Фитнес-браслеты', 'Дескрипшен Фитнес-браслеты', 'Какая-то статья', 'Какой-то маленький текст Фитнес-браслеты', NULL, NULL, NULL, NULL),
(20, 17, 'Аксессуары для смарт-часов и трекеров', 'Тайтл Аксессуары для смарт-часов и трекеров', 'Дескрипшен Аксессуары для смарт-часов и трекеров', 'Какая-то статья', 'Какой-то маленький текст Аксессуары для смарт-часов и трекеров', NULL, NULL, NULL, NULL),
(21, 17, '3D и VR очки', 'Тайтл 3D и VR очки', 'Дескрипшен 3D и VR очки', 'Какая-то статья', 'Какой-то маленький текст 3D и VR очки', NULL, NULL, NULL, NULL),
(22, NULL, 'Наушники и аксессуары', 'Тайтл Наушники и аксессуары', 'Дескрипшен Наушники и аксессуары', 'Какая-то статья', 'Какой-то маленький текст Наушники и аксессуары', NULL, NULL, NULL, NULL),
(23, 22, 'Наушники', 'Тайтл Наушники', 'Дескрипшен Наушники', 'Какая-то статья', 'Какой-то маленький текст ННаушники', NULL, NULL, NULL, NULL),
(24, 22, 'Аксессуары для наушников', 'Тайтл Аксессуары для наушников', 'Дескрипшен Аксессуары для наушников', 'Какая-то статья', 'Какой-то маленький текст Аксессуары для наушников', NULL, NULL, NULL, NULL),
(25, 22, 'Усилители для наушников', 'Тайтл Усилители для наушников', 'Дескрипшен Усилители для наушников', 'Какая-то статья', 'Какой-то маленький текст Усилители для наушников', NULL, NULL, NULL, NULL),
(26, 1, 'Мобильные телефоны', 'Тайтл Мобильные телефоны', 'Дескр Мобильные телефоны', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, 'Смартфоны', 'Тайтл Смартфоны', 'Декс Смартфоны', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 26, 'Samsung', 'Samsung', 'Samsung', '', '', '', NULL, NULL, '2021-10-24 17:58:30'),
(29, 26, 'Apple', 'Apple', 'Apple', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category_attributes`
--

CREATE TABLE `category_attributes` (
  `category_id` int(11) NOT NULL DEFAULT 0,
  `attributes_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category_attributes`
--

INSERT INTO `category_attributes` (`category_id`, `attributes_id`) VALUES
(17, 1),
(17, 2),
(17, 3),
(17, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1630777563),
('m130524_201442_init', 1630777569),
('m190124_110200_add_verification_token_column_to_user_table', 1630777569),
('m210907_173645_create_category_table', 1631037142),
('m210909_172545_create_product_table', 1631210034),
('m210910_170441_change_product_table', 1631293887),
('m210923_170148_create_attributes_table', 1632848524),
('m210923_170220_create_values_table', 1632848524),
('m210927_064438_change_product_table', 1632845554),
('m210928_171613_create_junction_table_for_category_and_attributes_tables', 1632850348),
('m210928_173036_create_junction_table_for_product_and_values_tables', 1632850349),
('m211012_084932_create_orders_table', 1634054896),
('m211012_085218_create_orders_item_table', 1634054896);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'Без комментария',
  `summa` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `comment`, `summa`, `status`, `created_at`, `updated_at`) VALUES
(17, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'dsadsaвав', 1925, 0, '2021-10-17 07:54:25', '2021-10-24 07:31:12'),
(18, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'hgghf', 1925, 0, '2021-10-17 07:58:17', '2021-10-17 07:58:17'),
(19, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'dhg', 1925, 1, '2021-10-17 07:59:31', '2021-10-24 06:56:33'),
(20, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'sD', 1925, 0, '2021-10-17 08:02:53', '2021-10-17 08:02:53'),
(21, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'fxjh', 3156, 0, '2021-10-17 08:05:16', '2021-10-17 08:05:16'),
(22, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'zv', 1100, 0, '2021-10-17 08:11:43', '2021-10-17 08:11:43'),
(23, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'dhg', 1700, 0, '2021-10-17 08:16:54', '2021-10-17 08:16:54'),
(24, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'adfsdf', 2529, 0, '2021-10-17 10:09:50', '2021-10-17 10:09:50'),
(25, 2, 'Юрий', 'zt1552@gmail.com', 'ул. Леси Украинки 14', 'sfefgsd', 1279, 0, '2021-10-19 19:11:38', '2021-10-19 19:11:38'),
(26, 2, 'Юрий111', 'zt1552@gmail.com', 'ул. Леси Украинки 14', '262', 17575, 0, '2021-10-21 19:47:48', '2021-10-21 19:47:48');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `comment` varchar(100) COLLATE utf8_unicode_ci DEFAULT '<Без комментария',
  `summa` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders_item`
--

INSERT INTO `orders_item` (`id`, `orders_id`, `product_id`, `product_name`, `price`, `quantity`, `comment`, `summa`) VALUES
(19, 17, 13, 'Мобильный телефон Самсунг', 1700, 1, '<Без комментария', 1700),
(20, 17, 18, 'Huawei MediaPad', 225, 1, '<Без комментария', 225),
(21, 18, 13, 'Мобильный телефон Самсунг', 1700, 1, '<Без комментария', 1700),
(22, 18, 18, 'Huawei MediaPad', 225, 1, '<Без комментария', 225),
(23, 19, 13, 'Мобильный телефон Самсунг', 1700, 1, '<Без комментария', 1700),
(24, 19, 18, 'Huawei MediaPad', 225, 1, '<Без комментария', 225),
(25, 20, 13, 'Мобильный телефон Самсунг', 1700, 1, '<Без комментария', 1700),
(26, 20, 18, 'Huawei MediaPad', 225, 1, '<Без комментария', 225),
(27, 21, 3, 'Мобильный телефон Apple XS', 1700, 1, '<Без комментария', 1700),
(28, 21, 11, 'Мобильный телефон Самсунг', 1456, 1, '<Без комментария', 1456),
(29, 22, 5, 'Мобильный телефон Самсунг', 1100, 1, '<Без комментария', 1100),
(30, 23, 3, 'Мобильный телефон Apple XS', 1700, 1, '<Без комментария', 1700),
(31, 24, 17, 'Мобильный телефон Самсунг', 1700, 1, '<Без комментария', 1700),
(32, 24, 18, 'Huawei MediaPad', 225, 1, '<Без комментария', 225),
(33, 24, 19, 'Sony MDRZX310W', 379, 1, '<Без комментария', 379),
(34, 24, 20, 'Canon STM Kit...', 225, 1, '<Без комментария', 225),
(35, 25, 18, 'Huawei MediaPad', 225, 3, '<Без комментария', 675),
(36, 25, 19, 'Sony MDRZX310W', 379, 1, '<Без комментария', 379),
(37, 25, 20, 'Canon STM Kit...', 225, 1, '<Без комментария', 225),
(38, 26, 3, 'Мобильный телефон Apple XS', 1700, 6, '<Без комментария', 10200),
(39, 26, 17, 'Мобильный телефон Самсунг', 1700, 3, '<Без комментария', 5100),
(40, 26, 7, 'Мобильный телефон Самсунг', 2050, 1, '<Без комментария', 2050),
(41, 26, 18, 'Huawei MediaPad', 225, 1, '<Без комментария', 225);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `old_price` int(11) DEFAULT 2100,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Заказать Дескрипшен Описание для телефона Самсунг',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_offer` tinyint(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `bestsellers` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `content`, `price`, `old_price`, `meta_title`, `meta_description`, `image`, `is_offer`, `created_at`, `bestsellers`) VALUES
(1, 28, 'Мобильный телефон Самсунг', '', 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(2, 28, 'Мобильный телефон Самсунг', NULL, 1200, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(3, 29, 'Мобильный телефон Apple XS', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 1, NULL, 0),
(4, 29, 'Мобильный телефон Яблоко 6', NULL, 1234, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(5, 27, 'Мобильный телефон Самсунг', NULL, 1100, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(6, 29, 'Мобильный телефон Apple 8S', NULL, 987, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_5.png', 0, NULL, 0),
(7, 27, 'Мобильный телефон Самсунг', NULL, 2050, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 1, NULL, 0),
(8, 8, 'Мобильный телефон Самсунг', NULL, 2200, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(9, 9, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(10, 10, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(11, 11, 'Мобильный телефон Самсунг', NULL, 1456, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 1, NULL, 0),
(12, 12, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(13, 13, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 1, NULL, 0),
(14, 14, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(15, 15, 'Мобильный телефон Самсунг', NULL, 777, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(16, 16, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(17, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 1, NULL, 0),
(18, 17, 'Huawei MediaPad', NULL, 225, 300, 'Купить Тайтл Huawei MediaPad', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\featured_1.png', 1, NULL, 0),
(19, 17, 'Sony MDRZX310W', NULL, 379, 500, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\featured_3.png', 1, NULL, 0),
(20, 17, 'Canon STM Kit...', NULL, 225, 375, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\featured_5.png', 1, NULL, 0),
(21, 17, 'Lenovo IdeaPad', NULL, 379, 385, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\featured_7.png', 1, NULL, 1),
(22, 17, 'Apple iPod shuffle', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\featured_2.png', 1, NULL, 0),
(23, 17, 'LUNA Smartphone', NULL, 225, 300, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\featured_4.png', 1, NULL, 1),
(24, 17, 'Samsung J330F', NULL, 379, 415, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\featured_6.png', 1, NULL, 1),
(25, 17, 'Digitus EDNET', NULL, 333, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\featured_8.png', 1, NULL, 0),
(26, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(27, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(28, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_5.png', 0, NULL, 0),
(29, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(30, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(31, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(32, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_5.png', 0, NULL, 0),
(33, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(34, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(35, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(36, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(37, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(38, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(39, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(40, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\best_4.png', 0, NULL, 0),
(42, 27, 'Тестовый товар 51', '<p>asdfsdf</p>\r\n', 1888, 2100, 'вапва вапвап', 'Заказать Дескрипшен Описание для телефона Самсунг', NULL, 1, '2021-10-25 18:28:35', 1),
(43, 27, 'Тестовый товар 51', '<p>asdfsdf</p>\r\n', 1888, 2100, 'вапва вапвап', 'Заказать Дескрипшен Описание для телефона Самсунг', NULL, 1, '2021-10-25 18:31:08', 1),
(44, 1, 'Тестовый товар 55', '<p>2343</p>\r\n', 18, 2100, 'reter', 'Заказать Дескрипшен Описание для телефона Самсунг', NULL, 0, '2021-10-25 18:32:13', 0),
(45, 1, 'Тестовый товар 522', '<p>sdf</p>\r\n', 1888, 2100, '', 'Заказать Дескрипшен Описание для телефона Самсунг', 'products/2021-10-25/6176d7b6cd0c9_banner_2_background.jpg', 0, '2021-10-25 19:13:42', 0),
(46, 1, 'Тестовый товар 5144', '<p>смивапр</p>\r\n', 1888, 2100, 'вкп', 'Заказать Дескрипшен Описание для телефона Самсунг', '/products/2021-10-25/6176db8083bbe_brands_8.jpg', 0, '2021-10-25 19:29:52', 0),
(47, 1, 'Тестовый товар 577733', '', 34, 2100, 'вапвап', 'Заказать Дескрипшен Описание для телефона Самсунг', '/products/2021-10-25/6176de3a667db_new_10.jpg', 0, '2021-10-25 19:41:30', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product_values`
--

CREATE TABLE `product_values` (
  `product_id` int(11) NOT NULL DEFAULT 0,
  `values_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product_values`
--

INSERT INTO `product_values` (`product_id`, `values_id`) VALUES
(17, 1),
(17, 5),
(17, 9),
(17, 12),
(18, 2),
(18, 6),
(18, 10),
(18, 13),
(19, 3),
(19, 6),
(19, 10),
(19, 12),
(20, 3),
(20, 7),
(20, 11),
(20, 14),
(21, 1),
(21, 8),
(21, 9),
(21, 15),
(22, 2),
(22, 6),
(22, 10),
(22, 16),
(23, 3),
(23, 6),
(23, 10),
(23, 17),
(24, 3),
(24, 7),
(24, 11),
(24, 18),
(25, 1),
(25, 7),
(25, 9),
(25, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', '3npL4eCy5H0lBmkOIOft1Yix9ougDJAW', '$2y$13$tuDfjENGmEGBJah.DY5MROctwqgMN7801I7DOtR7vTUefeXNNhPSG', NULL, 'admin@admin.ua', 10, 1633021980, 1633021980, 'axGPROLFsoHZ8clfT7eCAOzTeR25ljmq_1633021980'),
(2, 'admin2', 'Z7CuTMLFHzkfkH7vWTY8ylWMyUzfhVIq', '$2y$13$8yVPMm61ZI3utqfCByqtnu/Iinc6xjv/rz8PuH5WG8DH8glVL/t8y', NULL, 'zt15521@gmail.com', 10, 1634314946, 1634314946, '5NCcW3ImXNTzVZotleom5auQehDYtQQe_1634314946');

-- --------------------------------------------------------

--
-- Структура таблицы `values`
--

CREATE TABLE `values` (
  `id` int(11) NOT NULL,
  `attributes_id` int(11) NOT NULL,
  `value` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `values`
--

INSERT INTO `values` (`id`, `attributes_id`, `value`, `slug`) VALUES
(1, 1, 'Белый', 'white'),
(2, 1, 'Золотой', 'gold'),
(3, 1, 'Красный', 'red'),
(4, 1, 'Черный', 'black'),
(5, 2, '16', '16gb'),
(6, 2, '32', '32gb'),
(7, 2, '64', '64gb'),
(8, 2, '128', '128gb'),
(9, 3, '2000', '2000ah'),
(10, 3, '3000', '3000ah'),
(11, 3, '3700', '3700ah'),
(12, 4, 'Apple', 'apple'),
(13, 4, 'Beoplay', 'beoplay'),
(14, 4, 'Meizu', 'meizu'),
(15, 4, 'Google', 'google'),
(16, 4, 'OnePlus', 'oneplus'),
(17, 4, 'Sony', 'sony'),
(18, 4, 'Xiaomi', 'xiaomi'),
(19, 4, 'Samsung', 'samsung');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`category_id`,`attributes_id`),
  ADD KEY `idx-category_attributes-category_id` (`category_id`),
  ADD KEY `idx-category_attributes-attributes_id` (`attributes_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-orders-user_id` (`user_id`);

--
-- Индексы таблицы `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-orders_item-orders_id` (`orders_id`),
  ADD KEY `fk-orders_item-product_id` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-product-category_id` (`category_id`);

--
-- Индексы таблицы `product_values`
--
ALTER TABLE `product_values`
  ADD PRIMARY KEY (`product_id`,`values_id`),
  ADD KEY `idx-product_values-product_id` (`product_id`),
  ADD KEY `idx-product_values-values_id` (`values_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-values-attributes_id` (`attributes_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `values`
--
ALTER TABLE `values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD CONSTRAINT `fk-category_attributes-attributes_id` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-category_attributes-category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk-orders-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders_item`
--
ALTER TABLE `orders_item`
  ADD CONSTRAINT `fk-orders_item-orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-orders_item-product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk-product-category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_values`
--
ALTER TABLE `product_values`
  ADD CONSTRAINT `fk-product_values-product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-product_values-values_id` FOREIGN KEY (`values_id`) REFERENCES `values` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `values`
--
ALTER TABLE `values`
  ADD CONSTRAINT `fk-values-attributes_id` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
