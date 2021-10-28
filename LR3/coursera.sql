-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 28 2021 г., 08:25
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `coursera`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `course-id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(45) NOT NULL DEFAULT 'catalogue-img/no_img.png',
  `name` varchar(45) NOT NULL,
  `id-teacher-type` int(10) UNSIGNED NOT NULL,
  `program` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`course-id`, `img_path`, `name`, `id-teacher-type`, `program`, `cost`) VALUES
(1, 'catalogue-img/HTMLCSSJS.jpg', 'HTML,CSS, and JS for Web Developers', 6, 'In this course, we will learn the basic tools that every web page coder needs to know. We will start from the ground up by learning how to implement modern web pages with HTML and CSS. We will then advance to learning how to code our pages such that its c', 3500),
(2, 'catalogue-img/Full-Website-WordPress.jpg', 'Build Full Website using WordPress', 3, 'By the end of this project, you will create a full web-site that is attractive and user friendly using a free content management system, WordPress. You will learn how to create a website utilizing themes and plug-ins using the web creation tool. You’ll ha', 2500),
(3, 'catalogue-img/backendExpress.jpg', 'Build a Node Server backend with Express', 2, 'By the end of this project, you will Build a Node Server backend with Express that will fetch data from a MongoDB database.\n\nOften, a dynamic web application is connected to a database on the server side. Node.js serves as the web server used to access ', 3000),
(4, 'catalogue-img/JS ES6 Basics.jpg', 'Modern JavaScript: ES6 Basics', 4, 'In this project, you\'ll learn the most fundamental ES6 features and practice them with live hands-on examples. You\'ll start writing modern JavaScript and really understand why we need ES6.Mastering modern JavaScript starts with understanding the reasoning', 2500),
(5, 'catalogue-img/JS jQuery and JSON.jpg', 'JavaScript, jQuery and JSON', 1, 'In this course, we\'ll look at the JavaScript language, and how it supports the Object-Oriented pattern, with a focus on the unique aspect of how JavaScript approaches OO. We\'ll explore a brief introduction to the jQuery library, which is widely used to do', 5000),
(6, 'catalogue-img/MySQL with PHP.jpg', 'Using MySQL Database with PHP', 4, '1)Using PDO to access an SQL-based database with PHP\n2)Using MySQLi to access a MySQL database with PHP', 3000),
(7, 'catalogue-img/Django.jpg', 'Django for Everybody', 1, 'This specialization introduces Python programmers to building websites using the Django library. Across the four courses, you will learn HTML, CSS, SQL, Django, JavaScript, jQuery, and JSON Web Services.  During the course, you will build online websites ', 4000),
(8, 'catalogue-img/Wordpress Website in Azure.jpg', 'Deploy a Wordpress Website in Microsoft Azure', 3, 'In this one hour project, you will learn how to use Microsoft Azure Cloud Platform and its compute services to host and deploy a WordPress Website. WordPress is a world-class content management platform to create websites, blogs, e-learning systems, and o', 3500),
(9, 'catalogue-img/Web Applications.jpg', 'Web Applications for Everybody', 1, 'This Specialization is an introduction to building web applications for anybody who already has a basic understanding of responsive web design with JavaScript,  HTML, and CSS. Web Applications for Everybody is your introduction to web application developm', 4500),
(10, 'catalogue-img/Listing Website with PHP.jpg', 'Build an Automobile Listing Website with PHP', 4, 'In this 1.5 hours guided project, you will quickly get up to speed with the fundamentals of PHP and build a functional, dynamic website at the end. No prior knowledge of PHP is required but basic to intermediate HTML is required as a prerequisite.', 2000),
(11, 'catalogue-img/Dynamic Web App.jpg', 'Building a Dynamic Web App using PHP & MySQL', 3, 'In this 1-hour long project-based course, you will learn how to create a simple note-taking web app using PHP and MySQL.  PHP and MySQL enable developing powerful dynamic web pages and applications. They are some of the most widely used technologies in th', 2500),
(12, 'catalogue-img/Introduction to RDB.jpg', 'Introduction to Relational Database and SQL', 2, 'In this guided project, you will get hands-on experience working with a relational database using MySQL Workbench from Oracle. The basic knowledge you learn will allow you to work with any other relational database.At the end of this project, you will be ', 3500),
(13, 'catalogue-img/Introduction to SQL.jpg', 'Introduction to SQL', 1, 'In this course, you\'ll walk through installation steps for installing a text editor, installing MAMP or XAMPP (or equivalent) and creating a MySql Database. You\'ll learn about single table queries and the basic syntax of the SQL language, as well as datab', 4000),
(14, 'catalogue-img/Web Application Development.jpg', 'Web Application Development:Basic Concepts', 4, 'This is the first course in a Coursera Specialization track involving Web Application Architectures.  This course will give you the basic background, terminology and fundamental concepts that you need to understand in order to build modern full stack web ', 3500),
(15, 'catalogue-img/Wordpress Website AWS EC2.jpg', 'Deploy a Wordpress Website in AWS EC2', 2, 'In this two hours project, you will learn how to use Amazon Web Services EC2 compute services to host and deploy a WordPress Website. WordPress is a world-class content management platform to create websites, blogs, e-learning systems, and others. Once yo', 4000),
(16, 'catalogue-img/SQL Basics for DS.jpg', 'Learn SQL Basics for Data Science', 2, 'This Specialization is intended for a learner with no previous coding experience seeking to develop SQL query fluency. Through four progressively more difficult SQL projects with data science applications, you will cover topics such as SQL basics, data wr', 5000),
(17, 'catalogue-img/PHP DB Connectivity.jpg', 'Learn PHP Database Connectivity', 4, 'In this 1.5-hours long project-based course, you will (Learn PHP database connectivity , Build Web pages with back-end database).You will learn PHP database connectivity functions , how to connect into a back-end database, how to insert data into a databa', 3000),
(18, 'catalogue-img/Web Design.jpg', 'WebDesign:Basics of Web Development', 2, 'This Specialization covers how to write syntactically correct HTML5 and CSS3, and how to create interactive web experiences with JavaScript. Mastering this range of technologies will allow you to develop high quality web sites that, work seamlessly on mob', 4000),
(19, 'catalogue-img/DB Applications in PHP.jpg', 'Building Web Applications in PHP', 3, 'In this course, you\'ll explore the basic structure of a web application, and how a web browser interacts with a web server. You\'ll be introduced to the request/response cycle, including GET/POST/Redirect. You\'ll also gain an introductory understanding of ', 3500),
(20, 'catalogue-img/SQL for DS.jpg', 'SQL for Data Science', 4, 'This course is designed to give you a primer in the fundamentals of SQL and working with data so that you can begin analyzing it for data science purposes. You will begin to ask the right questions and come up with good answers to deliver valuable insight', 4000);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers_types`
--

CREATE TABLE `teachers_types` (
  `type-id` int(11) UNSIGNED NOT NULL,
  `type-name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `teachers_types`
--

INSERT INTO `teachers_types` (`type-id`, `type-name`) VALUES
(1, 'Clinical Professor'),
(2, 'Subject Matter Expert / Instructor'),
(3, 'Guided Projects Instructor'),
(4, 'Professor and Associate Vice Provost'),
(6, 'Instructor');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user-id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `dateOfBirth` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `interests` varchar(255) NOT NULL,
  `VK` varchar(255) NOT NULL,
  `bloodType` int(1) UNSIGNED NOT NULL,
  `factor` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user-id`, `email`, `password`, `fullName`, `dateOfBirth`, `address`, `gender`, `interests`, `VK`, `bloodType`, `factor`) VALUES
(1, 'letter-mile@yandex.ru', 'A1zekAz1mov!', 'Milly', '2002-04-15', 'mmmmmm', 'f', 'qqqqjaefhjefhdfhhdfhks', 'https://vk.com/milena1502', 1, '+'),
(2, 'letter-mile@yandex.ru', 'A1zekAz1mov!', 'Milly', '2002-04-15', 'mmmmmm', 'f', 'qqqqjaefhjefhdfhhdfhks', 'https://vk.com/milena1502', 1, '+'),
(3, 'letter-mile@yandex.ru', 'A1zekAz1mov!', 'Milly', '2002-04-15', 'mmmmmm', 'f', 'qqqqjaefhjefhdfhhdfhks', 'https://vk.com/milena1502', 1, '+'),
(4, 'lisahlv@yandex.ru', 'qwerty', 'Lilly', '1111-11-11', 'qqqq', 'f', 'rrrrrr', 'https://vk.com/mila1502', 3, '-'),
(5, 'lisahlv@yandex.ru', 'qwerty', 'Lilly', '1111-11-11', 'qqqq', 'f', 'rrrrrr', 'https://vk.com/mila1502', 3, '-'),
(6, 'alisahlv@yandex.ru', 'qwerty', 'Lilly', '1111-11-11', 'qqqq', 'f', 'rrrrrr', 'https://vk.com/mila1502', 3, '-'),
(7, 'alisahlv@yandex.ru', 'qwerty', 'Lilly', '1111-11-11', 'qqqq', 'f', 'rrrrrr', 'https://vk.com/mila1502', 3, '-'),
(8, 'lalisahlv@yandex.ru', 'qwerty', 'Lilly', '1111-11-11', 'qqqq', 'f', 'rrrrrr', 'https://vk.com/mila1502', 3, '-'),
(9, 'lalisahlv@yandex.ru', 'qwerty', 'Lilly', '1111-11-11', 'qqqq', 'f', 'rrrrrr', 'https://vk.com/mila1502', 3, '-'),
(10, 'larisahlv@yandex.ru', 'qwerty', 'Lilly', '1111-11-11', 'qqqq', 'f', 'rrrrrr', 'https://vk.com/mila1502', 3, '-'),
(11, 'larisahlvyandex.ru', 'qwerty', 'Lilly !!!!', '1111-11-11', 'qqqq', 'f', 'rrrrrr', 'https://vk.com/mila1502', 3, '-'),
(12, 'iwtiuoerit@mail.ru', 'A1zekAz1mov!', 'Milly', '2222-02-22', 'eafrwwrg', 'm', 'zfggsrsg', 'https://vk.com/mila1502', 2, '-'),
(13, 'iwjtiuoerit@mail.ru', 'A1zekAz1mov!', 'Milly', '2222-02-22', 'eafrwwrg', 'm', 'zfggsrsg', 'https://vk.com/mila1502', 2, '-'),
(14, 'iwqjtiuoerit@mail.ru', 'A1zekAz1mov!', 'Milly', '2222-02-22', 'eafrwwrg', 'm', 'zfggsrsg', 'https://vk.com/mila1502', 2, '-'),
(15, 'eiwqjtiuoerit@mail.ru', 'A1zekAz1mov!', 'Milly', '2222-02-22', 'eafrwwrg', 'm', 'zfggsrsg', 'https://vk.com/mila1502', 2, '-'),
(16, 'brown@mail.ru', 'A1zekAz1mov!', 'Milly', '2020-01-11', 'hkrfhgrfhghgfhgkdsfghkdsfhgkdsfhksf', 'm', 'rrrrrr', 'https://vk.com/milena1502', 1, '+'),
(17, 'lilywashere@mail.com', 'qwertyy', 'Lilly', '2001-11-11', 'qqqq', 'f', 'ijtrwirtr9rtkorgk', 'https://vk.com/mila1502', 3, '+'),
(18, 'cat@gmail.com', 'qwertyy', 'Cat Dogov', '1999-12-11', 'hkrfhgrfhghgfhgkdsfghkdsfhgkdsfhksf', 'm', 'ccpp[[x[s[[s[s[s', 'https://vk.com/mil502', 3, '-'),
(19, 'l1etter-mile@yandex.ru', 'qwertyu', 'danuiewiweioeaf', '11111-11-1', 'dxghjkl;', 'f', 'fghjkl;\';', 'sdfghjkl;', 1, '-'),
(20, 'qqqq@mail.ru', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'Milly', '3333-03-31', 'mmmmmm', 'f', 'ccpp[[x[s[[s[s[s', 'https://vk.com/mil502', 2, '-'),
(21, 'cloud@mail.ru', '$2y$10$iu43Fbywxx2zz3/Uo1pFuOY/ZlsAanww.aSQWiS8jpEya9yP4yJWa', 'Milly', '2000-12-11', 'lkjkgjhfhhuiopoiuytrfdtyuio;piuyjgtf', 'f', 'gyrwuoiweldfjklsdj,kvgd', 'https://vk.com/milena1502', 1, '-'),
(22, 'kitty@gmail.com', 'qwertyu', 'kitty', '1111-11-11', 'ydi7assdihuhfuhdfkuboagu8wak', 'f', 'sudahsfp[orae9eipj', 'https://vk.com/milena1502', 1, '-'),
(23, 'dog@mail.ru', 'qwertyu', 'Cat Dogov', '7777-07-07', 'hkrfhgrfhghgfhgkdsfghkdsfhgkdsfhksf', 'm', 'qqqqjaefhjefhdfhhdfhks', '1', 1, '+'),
(24, 'sun@mail.ru', '$2y$10$Kxn8GINcUQTpOkcO9LYGge15zg5GSQWWwyFnDC4DETm0T/SMs1fFW', 'sun', '1111-11-11', '11111111111111111111', 'f', '1111111111111', '111111111111111111111', 1, '+'),
(25, 'cat.cat@mail.ru', '$2y$10$LgiwYUGg6mYX7bm7KTY8Y.CxweArh5.lEvxkYx8w4U7QPkYyHpMdS', 'gcduhhsguuhwo', '1111-11-11', 'jhdsusghjvkslj', 'f', 'ksvuhgwpgip', 'njshskjdkjgrek', 1, '-');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course-id`),
  ADD KEY `index_1` (`id-teacher-type`);

--
-- Индексы таблицы `teachers_types`
--
ALTER TABLE `teachers_types`
  ADD PRIMARY KEY (`type-id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user-id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `course-id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `teachers_types`
--
ALTER TABLE `teachers_types`
  MODIFY `type-id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user-id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`id-teacher-type`) REFERENCES `teachers_types` (`type-id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
