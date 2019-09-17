-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Wrz 2019, 22:32
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `domki_wynajem`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `content`
--

CREATE TABLE `content` (
  `ID` int(11) NOT NULL,
  `fheader` text COLLATE utf8_polish_ci NOT NULL,
  `sheader` text COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `full_name` text COLLATE utf8_polish_ci NOT NULL,
  `mail` text COLLATE utf8_polish_ci NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `content`
--

INSERT INTO `content` (`ID`, `fheader`, `sheader`, `description`, `full_name`, `mail`, `phone`) VALUES
(1, 'Pokoje dla pracowników', 'Dbamy o swoich', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam justo metus, tempus maximus ex eget, lacinia cursus odio. Vivamus rhoncus fermentum pulvinar. Etiam mollis non ante sed luctus. Donec vel libero eu quam vulputate tincidunt. Suspendisse imperdiet purus sed diam consectetur eleifend. Nulla facilisi. Aliquam erat volutpat. ', 'Jan Kowalski', 'Jan.Kowalski@Niewiadomo.com', 111111111);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta_adm`
--

CREATE TABLE `konta_adm` (
  `ID` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `konta_adm`
--

INSERT INTO `konta_adm` (`ID`, `login`, `haslo`) VALUES
(1, 'Jaroslaw2345', '$2y$10$xzGuj1iHkpAtr0tjuUjDNOev7oKKxKtgwqpXj3gdoUblHDIfFUM/q');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `konta_adm`
--
ALTER TABLE `konta_adm`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `content`
--
ALTER TABLE `content`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `konta_adm`
--
ALTER TABLE `konta_adm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
