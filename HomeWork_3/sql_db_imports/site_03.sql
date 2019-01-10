-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 20 2018 г., 12:31
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site_03`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages`
(
  `id`        int(10) UNSIGNED NOT NULL,
  `page_name` varchar(255)     NOT NULL,
  `isActive`  tinyint(1)       NOT NULL DEFAULT '0',
  `parent_id` int(10) UNSIGNED          DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures`
(
  `id`          int(10) UNSIGNED NOT NULL,
  `name`        varchar(255)     NOT NULL,
  `size`        int(10) UNSIGNED NOT NULL,
  `imagepath`   varchar(255)     NOT NULL,
  `description` varchar(1250) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `size`, `imagepath`, `description`)
VALUES (1, 'log_in', 64, 'images/log_in.png', 'This is icon for log_in form and page)');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user`
(
  `id`            int(10) UNSIGNED NOT NULL,
  `user_name`     varchar(250) DEFAULT NULL,
  `user_login`    varchar(250)     NOT NULL,
  `user_password` varchar(250)     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_login`, `user_password`)
VALUES (1, 'sidorenkoegor1999@mail.ru', 'sidorenkoegor1999@mail.ru', 'test123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_login_Unique` (`user_login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
