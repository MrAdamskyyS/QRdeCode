-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 21, 2023 at 05:28 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrcodedb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `qrcodes`
--

CREATE TABLE `qrcodes` (
  `ID` int(255) NOT NULL,
  `QRText` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qrcodes`
--

INSERT INTO `qrcodes` (`ID`, `QRText`, `Date`) VALUES
(8, 'testniedziela', '2023-06-11'),
(9, 'testponiedziałek', '2023-06-12'),
(10, 'testwtorek', '2023-06-13'),
(11, 'testśroda', '2023-06-14'),
(12, 'testczwartek', '2023-06-15'),
(13, 'testpiatek', '2023-06-16'),
(14, 'testsobota', '2023-06-17'),
(15, 'czwartek2', '2023-06-15'),
(16, 'test', '2023-06-13'),
(17, '', '2023-06-16'),
(18, '', '2023-06-16'),
(19, '', '2023-06-17'),
(20, '', '2023-06-17'),
(21, '', '2023-06-17'),
(22, '', '2023-06-17'),
(23, '', '2023-06-21'),
(24, '', '2023-06-21');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `qrcodes`
--
ALTER TABLE `qrcodes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qrcodes`
--
ALTER TABLE `qrcodes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
