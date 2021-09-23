-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 16 2021 г., 05:46
-- Версия сервера: 5.6.47
-- Версия PHP: 7.4.5

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
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `short_content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `meta_title`, `meta_description`, `content`, `short_content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Смартфоны и мобильные телефоны', 'Тайтл Смартфоны и мобильные телефоны ', 'Дескрипшен Смартфоны и мобильные телефоны\r\n', 'Какая-то статья', 'Какой-то маленький текст Смартфоны и мобильные телефоны\r\n', NULL, NULL, NULL, NULL),
(2, NULL, 'Аксессуары для мобильных телефонов и смартфонов', 'Тайтл Аксессуары для мобильных телефонов и смартфонов ', 'Дескрипшен Аксессуары для мобильных телефонов и смартфонов', 'Какая-то статья', 'Какой-то маленький текст Аксессуары для мобильных телефонов и смартфонов', NULL, NULL, NULL, NULL),
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
(26, 1, 'Мобильные телефоны', 'Тайтл мобильн телеф', 'Дескр моб тел', NULL, NULL, NULL, 1, NULL, NULL),
(27, 1, 'Смартфоны', 'Тайт смартф', 'Дескр смартфон', NULL, NULL, NULL, 1, NULL, NULL),
(28, 26, 'Самсунг', 'тайтл самсунг', 'дескр самсунг', NULL, NULL, NULL, 1, NULL, NULL);

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
('m210910_170441_change_product_table', 1631293887);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT '1',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Мобильный телефон Самсунг',
  `content` text COLLATE utf8_unicode_ci,
  `price` int(11) DEFAULT '1700',
  `old_price` int(11) DEFAULT '2100',
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Купить Тайтл для телефона Самсунг',
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Заказать Дескрипшен Описание для телефона Самсунг',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'imagesproductproduct-1.jpg',
  `is_offer` tinyint(3) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `content`, `price`, `old_price`, `meta_title`, `meta_description`, `image`, `is_offer`, `created_at`) VALUES
(1, 1, 'Мобильный телефон Самсунг', '', 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(2, 2, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(3, 3, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(4, 4, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(5, 5, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg-1.jpg', 0, NULL),
(6, 6, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(7, 7, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 1, NULL),
(8, 8, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(9, 9, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(10, 10, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(11, 11, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 1, NULL),
(12, 12, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(13, 13, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(14, 14, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(15, 15, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 1, NULL),
(16, 16, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 0, NULL),
(17, 17, 'Мобильный телефон Самсунг', NULL, 1700, 2100, 'Купить Тайтл для телефона Самсунг', 'Заказать Дескрипшен Описание для телефона Самсунг', '\\images\\product\\product-1.jpg', 1, NULL);

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
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-product-category_id` (`category_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk-product-category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
