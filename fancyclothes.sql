-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 06 2019 kl. 09:25:48
-- Serverversion: 10.1.40-MariaDB
-- PHP-version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fancyclothes`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `categories`
--

INSERT INTO `categories` (`categoryId`, `name`) VALUES
(1, 'Bukser'),
(2, 'Jakker'),
(3, 'Skjorter'),
(4, 'Strik'),
(5, 'T-shirts og tanktops'),
(6, 'Tasker'),
(7, 'Sko');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `productId` int(5) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `imgSrc` varchar(100) NOT NULL,
  `imgAlt` varchar(200) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `userId` int(5) NOT NULL,
  `stars` int(1) NOT NULL,
  `categoryId` int(5) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`productId`, `heading`, `imgSrc`, `imgAlt`, `timestamp`, `content`, `userId`, `stars`, `categoryId`, `price`) VALUES
(1, 'Herre Skjorte', 'herre-skjorte.jpg', 'blå herreskjorte', 1561453017, 'Blå herre skjorte Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus molestiae commodi laborum praesentium deserunt, nostrum doloribus similique quam, nisi facere, error omnis nam rem? Distinctio reiciendis quos fuga modi. Sunt.', 1, 4, 3, 340.00),
(2, 'Brune arbejdssko', 'arbejdssko.jpg', 'Brune arbejdssko', 1561456141, 'Brune arbejdssko Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis autem officia sed voluptatem, neque possimus repudiandae voluptatibus. Commodi consectetur magni earum! Veniam odit id quisquam iste voluptates tempora sapiente optio.', 1, 2, 7, 190.00),
(3, 'Læderjakke', 'læderjakke.jpg', 'Læderjakke', 1561456209, 'Læderjakke Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium ipsa maxime inventore rem odit repellat doloribus delectus vitae sit quae excepturi suscipit sed porro ipsum recusandae cupiditate, dicta voluptatibus asperiores!', 1, 4, 2, 230.00),
(4, 'Højhælede sko', 'højhælede-sko.jpg', 'Højhælede sko', 1561553361, 'Højhølede sko Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus voluptates nam consectetur illum nulla fugiat cum accusantium itaque modi error! Ad provident eligendi ea. Laudantium incidunt ad cum vero facilis?', 1, 4, 7, 370.00),
(6, 'Hvid dameskjorte', 'dame-skjorte.jpg', 'Hvid dameskjorte', 1561553580, 'Hvid dameskjorte Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga eos necessitatibus labore vitae non, sunt, excepturi nisi illo laboriosam, iusto earum minus? Fuga eos, odio sapiente qui labore iure dignissimos.', 2, 1, 3, 430.00),
(7, 'strik', 'strikketrøje.jpg', 'Strik', 1561630183, 'trik', 1, 3, 4, 0.00);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `userId` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `accessLevel` int(1) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `accessLevel`, `email`) VALUES
(1, 'Nickolai', 'nickolai', 1, 'nickolai@mail.dk'),
(2, 'Level2', 'level2', 2, 'level2@mail.dk'),
(3, 'Level3', 'level3', 3, 'level3@mail.dk'),
(7, 'level3-1', '123', 3, 'level3-1@mail.dk'),
(8, 'level2-1', 'level2-1', 3, 'Level2-1@mail.dk'),
(9, 'level2-2', 'level2-2', 3, 'Level2-2@email.dk');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
