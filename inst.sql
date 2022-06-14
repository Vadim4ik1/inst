-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 11 2022 г., 15:42
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `inst`
--

-- --------------------------------------------------------

--
-- Структура таблицы `archiv_kurs`
--

CREATE TABLE `archiv_kurs` (
  `id_kurs` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `date_reg` date NOT NULL,
  `password` varchar(1000) NOT NULL,
  `creator` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `archiv_user`
--

CREATE TABLE `archiv_user` (
  `id_user` int(11) NOT NULL,
  `fio` varchar(1000) NOT NULL,
  `date_born` date NOT NULL,
  `picture` varchar(2000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `login` varchar(1000) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `date_reg` datetime NOT NULL,
  `test_kolvo` int(11) DEFAULT NULL,
  `kurs_kolvo` int(11) DEFAULT NULL,
  `groupp` varchar(1000) NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `kurs`
--

CREATE TABLE `kurs` (
  `id_kurs` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `date_reg` datetime NOT NULL,
  `password` varchar(1000) NOT NULL,
  `creator` varchar(1000) NOT NULL,
  `prepod` varchar(1000) NOT NULL,
  `prepod_2` varchar(1000) DEFAULT NULL,
  `prepod_3` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `kurs`
--

INSERT INTO `kurs` (`id_kurs`, `name`, `date_reg`, `password`, `creator`, `prepod`, `prepod_2`, `prepod_3`) VALUES
(1, 'jopa morja', '2022-04-01 00:00:00', '', '', 'Админ', NULL, NULL),
(2, 'Название', '2022-04-01 00:00:00', '', '', 'Админ', NULL, NULL),
(3, 'Название', '2022-04-01 00:00:00', '', '', 'Админ', NULL, NULL),
(5, 'Название', '2022-04-01 13:00:01', 'отыфов', '', 'Студент', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id_lesson` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `creator` varchar(1000) NOT NULL,
  `id_kurs` int(11) NOT NULL,
  `video` varchar(2000) DEFAULT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id_lesson`, `name`, `text`, `creator`, `id_kurs`, `video`, `number`) VALUES
(1, 'Лекция 1', 'Что-то тут', 'Автор ', 1, NULL, 1),
(2, 'Лекция 2', 'Что-то тут', 'Автор ', 1, NULL, 2),
(4, 'Лекция 4', 'Что-то тут', 'Автор ', 1, NULL, 4),
(5, 'Лекция 5', 'Что-то тут', 'Автор ', 1, NULL, 5),
(6, 'Лекция 2', 'Что-то тут', 'Автор ', 2, NULL, 2),
(7, 'Лекция 3', 'Что-то тут', 'Автор ', 3, NULL, 7),
(12, 'Лекция 3', 'Лекция 3', 'admin', 1, '', 3),
(13, 'Лекция 1', 'Лекция 1', 'admin', 2, '', 1),
(15, 'Лекция 6', 'Лекция 6', 'admin', 1, NULL, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `term`
--

CREATE TABLE `term` (
  `id_term` int(11) NOT NULL,
  `worth` varchar(200) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `term`
--

INSERT INTO `term` (`id_term`, `worth`, `description`, `user`) VALUES
(1, '213', '222', 'admin'),
(2, ' Лужа', 'Грязная вода', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id_question` int(11) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `true_answer` varchar(2000) NOT NULL,
  `true_answer_2` varchar(2000) DEFAULT NULL,
  `true_answer_3` varchar(2000) DEFAULT NULL,
  `wrong_answer` varchar(2000) NOT NULL,
  `wrong_answer_2` varchar(2000) NOT NULL,
  `wrong_answer_3` varchar(2000) NOT NULL,
  `id_test` int(11) DEFAULT NULL,
  `id_kurs` int(11) DEFAULT NULL,
  `type_question` varchar(2000) NOT NULL,
  `number_q` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_test`, `id_kurs`, `type_question`, `number_q`) VALUES
(1, '2+2=', '4', '25', '33', '123', '321', '455', 1, NULL, 'check', 1),
(2, '3+3=', '6', '!!!2', '!!!3', 'wrong', 'wrong', 'wrong', 1, NULL, 'check', 2),
(3, '????', '!!!!', '', NULL, 'wrong', 'wrong', 'wrong', 4, NULL, 'check', 1),
(4, '2+2=!', '4', '25', '33', 'neprav_1', 'neprav_2', 'neprav_3', 1, NULL, 'check', 3),
(5, '3+3=', '6', '!!!2', '!!!3', 'wrong', 'wrong', 'wrong', 1, NULL, 'check', 4),
(6, '2+2=', '4', '', '', '', '', '', 1, NULL, 'input', 5),
(7, '3+3=', '6', '', '', '', '', '', 1, NULL, 'input', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `test_history`
--

CREATE TABLE `test_history` (
  `id_test_history` int(11) NOT NULL,
  `id_user` varchar(200) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `answer_2` varchar(200) DEFAULT NULL,
  `answer_3` varchar(200) DEFAULT NULL,
  `type_question` varchar(100) NOT NULL,
  `type_test` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `test_history`
--

INSERT INTO `test_history` (`id_test_history`, `id_user`, `id_test`, `id_question`, `answer`, `answer_2`, `answer_3`, `type_question`, `type_test`) VALUES
(187, 'admin', 1, 4, '', '25 ', '33 ', 'check', NULL),
(204, 'admin', 1, 7, '333', '', '', 'input', NULL),
(205, '', 1, 1, '4 ', '25 ', '33 ', 'check', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `test_name`
--

CREATE TABLE `test_name` (
  `id_test` int(11) NOT NULL,
  `test_name` varchar(1000) NOT NULL,
  `id_kurs` int(11) NOT NULL,
  `id_lesson` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `test_name`
--

INSERT INTO `test_name` (`id_test`, `test_name`, `id_kurs`, `id_lesson`) VALUES
(1, 'rename', 1, 4),
(15, '34ee', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `id_user` int(11) NOT NULL,
  `fio` varchar(1000) NOT NULL,
  `date_born` date NOT NULL,
  `picture` varchar(2000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `login` varchar(1000) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `date_reg` datetime NOT NULL,
  `test_kolvo` int(11) DEFAULT NULL,
  `kurs_kolvo` int(11) DEFAULT NULL,
  `groupp` varchar(1000) NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`id_user`, `fio`, `date_born`, `picture`, `status`, `city`, `phone`, `email`, `login`, `password`, `date_reg`, `test_kolvo`, `kurs_kolvo`, `groupp`, `level`) VALUES
(2, 'admin', '2022-03-01', 'uploads/Umolch.jpeg', 'admin', 'admin', '123123', '12322@mail.ru', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-03-29 09:11:08', NULL, NULL, '7123', NULL),
(3, '', '1970-01-01', 'uploads/Umolch.jpeg', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2022-03-29 09:14:30', NULL, NULL, '28288', NULL),
(4, 'Смольный Олег Викторович ', '2022-01-06', 'uploads/Umolch.jpeg', 'Студент', 'city', 'phone', 'email@mail.ru', 'student', 'cd73502828457d15655bbd7a63fb0bc8', '2022-04-07 12:02:18', NULL, NULL, '7123', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `archiv_kurs`
--
ALTER TABLE `archiv_kurs`
  ADD PRIMARY KEY (`id_kurs`);

--
-- Индексы таблицы `archiv_user`
--
ALTER TABLE `archiv_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id_kurs`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id_lesson`);

--
-- Индексы таблицы `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id_term`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_question`);

--
-- Индексы таблицы `test_history`
--
ALTER TABLE `test_history`
  ADD PRIMARY KEY (`id_test_history`);

--
-- Индексы таблицы `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`id_test`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `archiv_kurs`
--
ALTER TABLE `archiv_kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `archiv_user`
--
ALTER TABLE `archiv_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id_lesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `term`
--
ALTER TABLE `term`
  MODIFY `id_term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `test_history`
--
ALTER TABLE `test_history`
  MODIFY `id_test_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT для таблицы `test_name`
--
ALTER TABLE `test_name`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
