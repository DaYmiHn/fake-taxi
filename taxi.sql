-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 19 2019 г., 22:09
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taxi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `mail` text NOT NULL,
  `number` text NOT NULL,
  `fio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id_drivers` int(11) NOT NULL,
  `fio` text NOT NULL,
  `number1` text NOT NULL,
  `staj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `poezdki`
--

CREATE TABLE `poezdki` (
  `id_client` int(11) NOT NULL,
  `id_drivers` int(11) NOT NULL,
  `otkuda` text NOT NULL,
  `kuda` text NOT NULL,
  `data` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Индексы таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_drivers`);

--
-- Индексы таблицы `poezdki`
--
ALTER TABLE `poezdki`
  ADD PRIMARY KEY (`id_client`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_drivers` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `poezdki`
--
ALTER TABLE `poezdki`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `poezdki` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
