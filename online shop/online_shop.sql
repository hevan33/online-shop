-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Lis 2021, 16:20
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `online_shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` char(32) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `short_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `short_description`) VALUES
('226222af-18f3-11ec-8949-3ee1aec4', 'iPhone 12 mini ', '650.00', 'good battery and memory'),
('58fbf359-18f3-11ec-8949-3ee1aec4', 'Toshiba EM131A5C', '1000.00', 'mute option, automatic reheating'),
('89304bc2-18f3-11ec-8949-3ee1aec4', 'Suzuki GSX-R1000R', '2300.00', 'fast and furious'),
('ae0c20ac-18f2-11ec-8949-3ee1aec4', 'Samsung Galaxy S21 ', '700.00', 'newest edition with great camera');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `registration_data`
--

CREATE TABLE `registration_data` (
  `user_id` char(32) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeksy dla tabeli `registration_data`
--
ALTER TABLE `registration_data`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
