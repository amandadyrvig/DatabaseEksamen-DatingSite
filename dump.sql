-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Vært: localhost:3306
-- Genereringstid: 16. 11 2017 kl. 23:05:40
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

--
-- Data dump for tabellen `comment`
--

INSERT INTO `comment` (`id`, `messageText`, `date`, `userEmail`, `sender_userEmail`) VALUES
(5, 'Nice Picture!', '2017-11-16 21:49:24', 'superwoman@hotmail.com', 'iceman@gmail.com'),
(6, 'You are so Cool!!', '2017-11-16 21:49:41', 'hulk@gmail.com', 'iceman@gmail.com'),
(7, 'I Like!', '2017-11-16 21:50:22', 'superwoman@hotmail.com', 'hulk@gmail.com');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gift`
--

CREATE TABLE `gift` (
  `title` varchar(60) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `gift`
--

INSERT INTO `gift` (`title`, `image`, `description`) VALUES
('Flowers', 'flowers.jpg', 'A flower cannot blossom without sunshine, and it cant live without love. ');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `messageText` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userEmail` varchar(100) NOT NULL,
  `sender_userEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `message`
--

INSERT INTO `message` (`id`, `messageText`, `date`, `userEmail`, `sender_userEmail`) VALUES
(6, 'HI, I really like you Profile!', '2017-11-16 21:51:47', 'iceman@gmail.com', 'superwoman@hotmail.com'),
(7, 'Would you like to have a drink together? :-D', '2017-11-16 21:52:29', 'superwoman@hotmail.com', 'iceman@gmail.com'),
(8, 'HI would you like to meet? ', '2017-11-16 22:05:17', 'jeangrey@gmail.com', 'iceman@gmail.com');

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
('hulk@gmail.com', 'Hulk', 30, 'he Hulk is typically seen as a hulking man with green skin, wearing only a pair of torn purple pants that survive his physical transformation.Originally, the Hulk was shown as simple minded and quick to anger.', 'hulk.jpg', 137),
('iceman@gmail.com', 'iceman', 45, 'one of Iceman\'s best personality traits is that emotionally Bobby Drake is like the ice he manipulates -- not cold but transparent. \'He\'s devastatingly honest. He is very up-front with his emotions and his thoughts all the time.Also, he\'s obviously incredibly brave both in terms of facing external, physical danger as well as facing up to unpleasant situations and admitting his own mistakes.', 'iceman.jpg', 50),
('jeangrey@gmail.com', 'Jean Grey', 22, 'Jean Grey is a member of a subspecies of humans known as mutants, who are born with superhuman abilities. She was born with telepathic and telekinetic powers. Her powers first manifested when she saw her childhood friend being hit by a car. She is a caring, nurturing figure, but she also has to deal with being an Omega-level mutant and the physical manifestation of the cosmic Phoenix Force.', 'jeangrey.jpg', 90),
('superwoman@hotmail.com', 'Superwoman', 20, 'Another orphan at the Midvale Orphanage who is one of Pre-Crisis Supergirl\'s/Linda Lee Danvers\'s best friends. Lena is unaware that she is the long lost younger sister of Lex Luthor. When Lena was still a small child and Lex was a teen, Lex turned evil after the laboratory accident he blamed on Superboy turned him bald. Lex\'s parents disowned him and told him to leave home. In order to prevent disgrace to Lena, they moved away from Smallville and told Lena that her brother had been killed in a mountain climbing accident. They changed their family name to Thorul, a rearrangement of the letters in Luthor. ', 'superwoman.jpg', 203);

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
  ADD KEY `message_ibfk_1` (`userEmail`),
  ADD KEY `sender_userEmail` (`sender_userEmail`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tilføj AUTO_INCREMENT i tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`userEmail`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`sender_userEmail`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
