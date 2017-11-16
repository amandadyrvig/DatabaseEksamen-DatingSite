-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Vært: localhost:3306
-- Genereringstid: 16. 11 2017 kl. 14:22:40
-- Serverversion: 5.6.35
-- PHP-version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `SuperHeroDatingSite`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `messageText` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userEmail` varchar(100) NOT NULL,
  `sender_userEmail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gift`
--

CREATE TABLE `gift` (
  `title` varchar(60) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `messageText` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `message`
--

INSERT INTO `message` (`id`, `messageText`, `date`, `userEmail`) VALUES
(1, 'Fed Profil... måske vi skulle tage en drink en dag?', '2017-11-16 09:49:58', 'issabellaIwersen@hotmail.com');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `superpower`
--

CREATE TABLE `superpower` (
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `name` varchar(60) NOT NULL,
  `age` int(3) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `user`
--

INSERT INTO `user` (`email`, `name`, `age`, `description`, `image`, `likes`) VALUES
('Herman-pedersen@gmail.com', 'Hulk', 30, 'søger en partner der kan kapere min Overmenneskelig styrke som stiger i takt med mit raseri, dog er jeg en meget følsom og rar person indvendig. ', 'hulk.jpg', 123),
('issabellaIwersen@hotmail.com', 'Superwoman', 20, 'Tja, hvad er der at sige... JEG MANGLER MANDEN I MIT LIV, som kan beskytte og give kærlighed til mig! .. Måske kan jeg godt beskytte mig selv, men i hvert fald en til at tilbringe min hverdag med.', 'superwoman.jpg', 201),
('peterHansen@gmail.com', 'iceman', 45, 'Iceman er på farten og søger en kvinde, som kan ikke kan modstå mine kræfter. Jeg er en mand som er på farten, og mangler en kvinde i livet til at kunne dele mit livseventyr med. ', 'iceman.jpg', 50);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userEmail` (`userEmail`),
  ADD KEY `sender_userEmail` (`sender_userEmail`);

--
-- Indeks for tabel `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`title`);

--
-- Indeks for tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_ibfk_1` (`userEmail`);

--
-- Indeks for tabel `superpower`
--
ALTER TABLE `superpower`
  ADD PRIMARY KEY (`name`);

--
-- Indeks for tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userEmail`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`sender_userEmail`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`userEmail`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
