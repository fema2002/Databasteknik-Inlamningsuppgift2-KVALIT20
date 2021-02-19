-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 18 feb 2021 kl 10:28
-- Serverversion: 10.4.17-MariaDB
-- PHP-version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `category`
--

CREATE TABLE `category` (
  `category_ID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `category`
--

INSERT INTO `category` (`category_ID`, `category`) VALUES
(4, 'adventure'),
(11, 'american movie'),
(15, 'british movie'),
(9, 'comedy'),
(7, 'documentary'),
(6, 'drama'),
(14, 'french movie'),
(3, 'horror'),
(13, 'indian movie'),
(10, 'italian movie'),
(12, 'swiss movie'),
(5, 'thriller'),
(8, 'western');

-- --------------------------------------------------------

--
-- Tabellstruktur `customers`
--

CREATE TABLE `customers` (
  `customer_ID` int(11) NOT NULL,
  `customer_Name` varchar(50) NOT NULL,
  `customer_Email` varchar(50) NOT NULL,
  `customer_Tel` varchar(50) NOT NULL,
  `customer_Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `customers`
--

INSERT INTO `customers` (`customer_ID`, `customer_Name`, `customer_Email`, `customer_Tel`, `customer_Address`) VALUES
(10, 'Viktor Hagström', 'viha2001@yh.nackademin.se', '12344365', 'Hovslagarvägen 33'),
(11, 'Felix Marcusson', 'felix.marcusson@yh.nackademin.se', '12344365', 'Adressgatan 34');

-- --------------------------------------------------------

--
-- Tabellstruktur `messagesdb`
--

CREATE TABLE `messagesdb` (
  `messageID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `messagesdb`
--

INSERT INTO `messagesdb` (`messageID`, `name`, `email`, `message`) VALUES
(5, 'Viktor Hagström', 'viha2001@yh.nackademin.se', 'HEJ!'),
(6, 'Felix Marcusson', 'felix.marcusson@yh.nackademin.se', 'TJA!');

-- --------------------------------------------------------

--
-- Tabellstruktur `ordersdb`
--

CREATE TABLE `ordersdb` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `ordersdb`
--

INSERT INTO `ordersdb` (`orderID`, `productID`, `name`, `tel`, `email`, `address`) VALUES
(37, 15, 'Viktor Hagström', '12344365', 'viha2001@yh.nackademin.se', 'Hovslagarvägen 33'),
(38, 7, 'Felix Marcusson', '12344365', 'felix.marcusson@yh.nackademin.se', 'Adressgatan 34');

-- --------------------------------------------------------

--
-- Tabellstruktur `pictures`
--

CREATE TABLE `pictures` (
  `picture_ID` int(11) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `pictures`
--

INSERT INTO `pictures` (`picture_ID`, `picture`) VALUES
(9, '420.jpg'),
(4, 'cabiria.jpg'),
(5, 'collective.jpg'),
(2, 'drhichcock.jpg'),
(3, 'fromrussia.jpg'),
(11, 'fromrussia2.jpg'),
(6, 'mort.jpg'),
(8, 'skull.jpg'),
(7, 'space.jpg'),
(10, 'vedi.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `product_Name` varchar(50) NOT NULL,
  `product_Price` int(11) NOT NULL,
  `product_Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `product`
--

INSERT INTO `product` (`product_ID`, `product_Name`, `product_Price`, `product_Description`) VALUES
(3, 'The Horrible Dr. Hichcock (1962)', 100, 'In 19th century London, a woman weds a doctor with necrophiliac tendencies, and whose first wife died under mysterious circumstances - and might be coming back from the grave to torment her successor.'),
(4, 'From Russia with love (1963)', 100, 'James Bond willingly falls into an assassination plot involving a naive Russian beauty in order to retrieve a Soviet encryption device that was stolen by S.P.E.C.T.R.E.'),
(7, 'Cabiria (1914)', 100, 'Cabiria is a Roman child when her home is destroyed by a volcano. Sold in Carthage to be sacrificed in a temple, is saved by Fulvio, a Roman spy. But danger lurks, and hatred between Rome and Carthage can only lead to war.'),
(8, 'The Collective (2008)', 100, 'Tyler Clarke is on the red-eye to New York City. Two days ago she received a cryptic voice-mail from her sister Jessica. She was asking for help but she didn\'t say why. And now that Tyler has come to the city to help her, Jessica is nowhere to be found. In order to find out what has happened, Tyler must delve into a world of darkness and lies, the underbelly of a spiritually depraved community living in a deconsecrated cathedral.'),
(11, 'L\'heureuse mort (1925)', 100, 'Unsucessful writer Théodore Larue is mistakenly believed to be drowned during a vacation at the sea with his wife Lucie. The latter persuades him to play dead because the incident increases his popularity. Théodore pretends he is his brother Anselme. Trouble begins when the actual brother unexpectedly returns from Madagascar.'),
(12, 'Space Tourists (2009)', 100, 'Space Tourists succeeds in surprising its audience with images and situations that have very little to do with the futuristic fantasy of \'space-tourism\'. The filmmaker sets up encounters with the least likely people imaginable: places even stranger and more unknown than outer space itself. '),
(13, 'The Crimson Skull (1922)', 100, 'To rid the range of a gang of outlaws that are rustling cattle and robbing the banks and stagecoaches, cowhand Bob Calem, working on the gang-leader\'s superstitions, dons a skeleton-costume to strike fear into the gang. '),
(14, 'Reefer Madness (1936)', 100, 'Cautionary tale features a fictionalized take on the use of marijuana. A trio of drug dealers lead innocent teenagers to become addicted to \"reefer\" cigarettes by holding wild parties with jazz music.'),
(15, 'Vedivazhipadu (2013)', 100, 'Three friends decide to hire a prostitute on the day of the Aatukaal Pongala (a Hindu festival in Trivandrum) when their wives are busy.');

-- --------------------------------------------------------

--
-- Tabellstruktur `product_category`
--

CREATE TABLE `product_category` (
  `product_ID` int(11) NOT NULL,
  `category_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `product_category`
--

INSERT INTO `product_category` (`product_ID`, `category_ID`) VALUES
(3, 3),
(3, 10),
(4, 5),
(4, 15),
(7, 4),
(7, 10),
(8, 3),
(8, 11),
(11, 6),
(11, 14),
(12, 7),
(12, 12),
(13, 8),
(13, 11),
(14, 6),
(14, 11),
(15, 9),
(15, 13);

-- --------------------------------------------------------

--
-- Tabellstruktur `product_pictures`
--

CREATE TABLE `product_pictures` (
  `product_ID` int(11) NOT NULL,
  `picture_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `product_pictures`
--

INSERT INTO `product_pictures` (`product_ID`, `picture_ID`) VALUES
(3, 2),
(4, 3),
(4, 11),
(7, 4),
(8, 5),
(11, 6),
(12, 7),
(13, 8),
(14, 9),
(15, 10);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_ID`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Index för tabell `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Index för tabell `messagesdb`
--
ALTER TABLE `messagesdb`
  ADD PRIMARY KEY (`messageID`);

--
-- Index för tabell `ordersdb`
--
ALTER TABLE `ordersdb`
  ADD PRIMARY KEY (`orderID`);

--
-- Index för tabell `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_ID`),
  ADD UNIQUE KEY `picture` (`picture`);

--
-- Index för tabell `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Index för tabell `product_category`
--
ALTER TABLE `product_category`
  ADD UNIQUE KEY `product_ID` (`product_ID`,`category_ID`),
  ADD KEY `category_Product` (`category_ID`);

--
-- Index för tabell `product_pictures`
--
ALTER TABLE `product_pictures`
  ADD UNIQUE KEY `product_ID` (`product_ID`,`picture_ID`),
  ADD KEY `picture_Product` (`picture_ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `category`
--
ALTER TABLE `category`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT för tabell `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `messagesdb`
--
ALTER TABLE `messagesdb`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `ordersdb`
--
ALTER TABLE `ordersdb`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT för tabell `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `category_Product` FOREIGN KEY (`category_ID`) REFERENCES `category` (`category_ID`),
  ADD CONSTRAINT `product_Category` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

--
-- Restriktioner för tabell `product_pictures`
--
ALTER TABLE `product_pictures`
  ADD CONSTRAINT `picture_Product` FOREIGN KEY (`picture_ID`) REFERENCES `pictures` (`picture_ID`),
  ADD CONSTRAINT `product_Picture` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
