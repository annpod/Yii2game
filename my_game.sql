-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 24 2014 г., 14:44
-- Версия сервера: 5.5.32
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `my_game`
--
CREATE DATABASE IF NOT EXISTS `my_game` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `my_game`;

-- --------------------------------------------------------

--
-- Структура таблицы `experiment`
--

CREATE TABLE IF NOT EXISTS `experiment` (
  `id_exp` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `name` varchar(30) NOT NULL,
  `bones_num` int(10) NOT NULL,
  `throws` int(10) NOT NULL,
  PRIMARY KEY (`id_exp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id_result` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(10) NOT NULL,
  `count` int(10) NOT NULL,
  `id_exp` int(11) NOT NULL,
  PRIMARY KEY (`id_result`),
  KEY `id_exp` (`id_exp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`id_exp`) REFERENCES `experiment` (`id_exp`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
