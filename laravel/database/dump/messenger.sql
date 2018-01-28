-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2018 г., 13:08
-- Версия сервера: 5.7.19
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `messenger`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_12_064005_create_note_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `note_date` varchar(255) NOT NULL,
  `note_title` varchar(255) NOT NULL,
  `note_text` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `note_date`, `note_title`, `note_text`) VALUES
(1, '1', '27.01.2018 22:03', 'Note1-edit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit.edit'),
(2, '1', '27.01.2018 22:03', 'Note2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit.'),
(3, '1', '27.01.2018 22:03', 'Note3-edit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat error saepe itaque fugiat magni atque odit, reiciendis incidunt praesentium, sapiente sequi vero recusandae nostrum et quasi omnis illum. Sit dolorum cumque culpa harum, iste facilis, temporibus perferendis dignissimos earum consectetur dolore, alias provident deleniti dicta. Nisi cupiditate excepturi temporibus consequatur nihil tenetur dicta quas officiis similique, exercitationem facere. Soluta quam fuga cupiditate consequatur, assumenda architecto porro, debitis alias voluptas beatae, explicabo harum nesciunt at! Sint veritatis incidunt porro quas corporis ipsam sapiente, atque libero repellendus, fugit sunt laborum eaque nulla asperiores maxime unde ullam, aut neque fuga animi. Similique, deleniti quae. Eius architecto, vitae alias soluta nemo sed eos! Delectus harum sunt odit.');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@mail.ru', '$2y$10$vlsS.kYIOS81XoLFZzanWejLoM91rLF.0mbX4W91JdAVarMGr6A.G', 'BbSkjzhcCuMmIFMbIUTOqlbObeZAJh13bBptaVhpGlZkUNEhe2G2dqsnifuX', '2018-01-27 08:16:14', '2018-01-27 08:16:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
