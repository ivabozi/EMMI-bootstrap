-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 04:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibozic`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartmani`
--

CREATE TABLE `apartmani` (
  `Id_apartmana` int(11) NOT NULL,
  `Naziv_apartmana` varchar(50) NOT NULL,
  `Opis` varchar(1000) NOT NULL,
  `Slika_apartmani` varchar(255) NOT NULL,
  `ID_lokacija_apartmana` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `apartmani`
--

INSERT INTO `apartmani` (`Id_apartmana`, `Naziv_apartmana`, `Opis`, `Slika_apartmani`, `ID_lokacija_apartmana`, `link`) VALUES
(1, 'Apartman ENA', 'ENA apartman pruža pogled na morsku stranu mjesta Vrsi. Dvosoban je, prostran, s prostranom kupaonicom i malenom terasom na kojoj će te uživati piti jutarnje kave!', 'soba1.jpg', 1, 'ENA.php'),
(2, 'Apartman MARINA', 'MARINA apartman pruža pogled na Velebit, planinu koja oduzima dah. Dvokrevetan je, s prostranom kupaonicom te prikladan za parove. Opremljen je svim potrebnim uređajima koji će Vaš boravak učiniti potpunim!', 'soba2.jpg', 1, 'MARINA.php'),
(3, 'Apartman MARIN', 'MARIN apartman pruža pogled na morsku stranu mjesta Vrsi. Dvokrevetan je, prostran, s prostranom kupaonicom i velikom terasom na kojoj se možete osunčati, raditi ljetne koktele ili pak uživati u fjaci!', 'soba3.jpg', 1, 'MARIN.php');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `apartman` text NOT NULL,
  `odrasli` int(10) NOT NULL,
  `djeca` int(10) NOT NULL,
  `date` date NOT NULL,
  `id_apartmana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `ime`, `prezime`, `email`, `apartman`, `odrasli`, `djeca`, `date`, `id_apartmana`) VALUES
(1, 'iva', '', 'bla@gmail.com', '', 0, 0, '2020-05-27', 0),
(2, 'iva', '', 'bla@gmail.com', '', 0, 0, '2020-05-27', 0),
(3, 'iva', '', 'iva@iva', '', 0, 0, '2020-05-28', 0),
(4, 'fhfghf', '', 'dfxf@gdfg', '', 0, 0, '2020-06-03', 0),
(5, '', '', '', '', 0, 0, '2020-06-02', 0),
(6, 'bgchgh', 'vbvnbvnbvnbv', 'bcvbcv@gg', 'ENA', 2, 2, '2020-06-06', 0),
(7, 'marinko', 'marinkic', 'mm@gmail.com', 'MARINA', 3, 2, '2020-06-07', 0),
(8, 'marinko', 'marinkic', 'mm@gmail.com', 'MARINA', 3, 2, '2020-06-07', 0),
(9, 'iva', 'bozi', 'ivabozi96@gmail.com', 'ENA', 3, 1, '2020-06-08', 0),
(10, 'ena', 'bozic', 'ivabozi96@gmail.com', 'ENA', 2, 3, '2020-06-08', 0),
(11, 'bla', 'blabla', 'ivabozi96@gmail.com', 'MARINA', 3, 3, '2020-06-08', 0),
(12, 'ena', 'bozic', 'ivabozi96@gmail.com', 'ENA', 2, 3, '2020-06-08', 0),
(13, 'Marina', 'Marinica', 'ivabozi96@gmail.com', 'MARIN', 4, 1, '2020-06-05', 0),
(14, 'ena', 'enina', 'ivabozi96@gmail.com', 'MARIN', 3, 3, '2020-06-09', 0),
(15, 'bla', 'dsfsdfdsfg', 'ivabozi96@gmail.com', 'ENA', 2, 3, '2020-07-07', 0),
(16, 'csdfsdf', 'dsfsdf', 'ivabozi96@gmail.com', 'MARIN', 2, 2, '2020-07-08', 0),
(17, 'ena', 'enina', 'ivabozi96@gmail.com', 'ENA', 3, 1, '2020-07-09', 0),
(18, 'ena', 'enina', 'ivabozi96@gmail.com', 'ENA', 3, 1, '2020-07-09', 0),
(19, 'filip', 'grzic', 'fgrzic123@gmail.com', 'ENA', 1, 2, '2020-07-10', 0),
(20, 'mirna', 'mirnic', 'mirna@gmail.com', 'MARINA', 2, 1, '2020-06-10', 0),
(21, 'ena', 'bozic', 'ivabozi96@gmail.com', 'MARINA', 2, 0, '2020-07-11', 0),
(22, 'enina', 'ycyvyxcv', 'ivabozi96@gmail.com', 'MARIN', 2, 1, '2020-07-06', 0),
(23, 'enina', 'xycxvcxvcx', 'ivabozi96@gmail.com', 'MARIN', 2, 2, '2020-07-05', 0),
(24, 'hrvoje', 'zlokovic', 'ivabozi96@gmail.com', 'MARIN', 1, 1, '2020-07-12', 0),
(25, 'ena', 'zlokovic', 'ivabozi96@gmail.com', 'MARINA', 2, 1, '2020-07-13', 0),
(26, 'enina', 'eninic', 'ivabozi96@gmail.com', 'MARIN', 2, 1, '2020-09-30', 0),
(27, 'filip', 'grzic', 'ivabozi96@gmail.com', 'ENA', 2, 0, '2020-08-01', 0),
(28, 'karla', 'bozic', 'ivabozi96@gmail.com', 'MARIN', 1, 1, '2020-08-02', 0),
(29, 'lorena', 'lapenda', 'ivabozi96@gmail.com', 'MARIN', 2, 1, '2020-06-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE `lokacija` (
  `id_lokacije` int(11) NOT NULL,
  `Naziv_lokacije` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`id_lokacije`, `Naziv_lokacije`) VALUES
(1, 'Vrsi'),
(2, 'Zadar'),
(3, 'Nin');

-- --------------------------------------------------------

--
-- Table structure for table `objekt`
--

CREATE TABLE `objekt` (
  `id_objekta` int(11) NOT NULL,
  `Naziv_objekta` varchar(100) NOT NULL,
  `Opis` varchar(255) NOT NULL,
  `Slike_objekta` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  `id_lokacije` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `objekt`
--

INSERT INTO `objekt` (`id_objekta`, `Naziv_objekta`, `Opis`, `Slike_objekta`, `link`, `id_lokacije`) VALUES
(4, 'Restoran Foša', 'Foša je poznati obalni dio grada Zadra, osim što se restoran nalazi na tako lijepome mjestu, nudi još lijepšu hranu koja je spoj tradicionalne i moderne kuhinje!', 'fosa.jpg', 'https://www.fosa.hr/', 2),
(5, 'Butler Gourmet & Cocktails Garden', 'Butler Gourmet & Cocktails odlično je mjesto za osobe željne dobre zabave, sočnih koktela i fine hrane! Butler nudi sve što Vam treba za ljetno opuštanje!', 'butler.jpg', 'https://www.facebook.com/butlergourmetgarden/', 2),
(6, 'Kaštel', 'Restoran Kaštel jedan je od najboljih restorana na području Zadra i okolice. Za ovaj restoran se definitivno može reći da se pola porcije jede očima!', 'kastel.jpg', 'https://www.hotel-bastion.hr/hr/restoran-kastel', 2),
(10, 'Pizzeria Peperoni', 'Kamena kuća iz 1904.godine renovirana je u autohtonu Trattoriu Peperoni. Osim ukusne hrane, uživajte u pogledu na stari grad i doživite povijest ovoga mjesta.', 'peperoni.jpg', 'https://www.peperoni-nin.com/hr/pizzeria-peperoni-nin\" class=\"btn btn-primary', 1),
(11, 'Mad Duck - Buger & Pizza Bar', 'Burger & Pizza Bar Mad Duck izvrsno je mjesto za mlade, hrana mami svojim privlačnim izgledom, brzo je spremljena, ukusna je, možete ju ponjeti sa sobom ili pak uživati na barskim stolicama!', 'madduck.jpg', 'https://www.facebook.com/madducknin/', 1),
(12, 'Konoba Sentimenti', 'Konoba sentimenti osim što ima prekrasan autohtoni interijer i eksterijer, nudi i pravu domaću spizu, probajte carpaccio od hobotnice, dagnje na buzaru ili pak brujet! ', 'sentimenti.jpg', 'https://www.facebook.com/pg/konobasentimenti/posts/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Ime_user` text NOT NULL,
  `Prezime_user` varchar(50) NOT NULL,
  `Mail_user` varchar(50) NOT NULL,
  `Lozinka_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `Ime_user`, `Prezime_user`, `Mail_user`, `Lozinka_user`) VALUES
(1, '', '', '', ''),
(2, '', '', '', ''),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, '', '', '', ''),
(6, '', '', '', ''),
(7, '', '', '', ''),
(8, 'frvgf', 'pavlovic', 'mpavlovic@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'morena', 'pavlovic', 'pavlovicm@gmail.com', '8aa87050051efe26091a13dbfdf901c6'),
(10, 'ena', 'bozic', 'ebozic@gmail.com', '636f59f19324a1081a1e6bfa23a1df0f'),
(11, 'beljulji', 'meljulji', 'bm@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 'filip', 'grzic', 'fgrzic123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(13, 'filip', 'grzic', 'fgrzic123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'iva', 'bozic', 'ibozic@gmail.com', '1858b78054f5328781ab9c1b3d30b6d3'),
(15, 'mirna', 'mirnic', 'mirna@gmail.com', '10c248ba417154af2bcbe85b58f86446');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartmani`
--
ALTER TABLE `apartmani`
  ADD PRIMARY KEY (`Id_apartmana`),
  ADD KEY `FK_LOKACIJA_APARTMAN` (`ID_lokacija_apartmana`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD PRIMARY KEY (`id_lokacije`);

--
-- Indexes for table `objekt`
--
ALTER TABLE `objekt`
  ADD PRIMARY KEY (`id_objekta`),
  ADD KEY `FK_LOKACIJA_OBJEKT` (`id_lokacije`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `Ime_user` (`Ime_user`(768)),
  ADD KEY `Prezime_user` (`Prezime_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartmani`
--
ALTER TABLE `apartmani`
  MODIFY `Id_apartmana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `lokacija`
--
ALTER TABLE `lokacija`
  MODIFY `id_lokacije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `objekt`
--
ALTER TABLE `objekt`
  MODIFY `id_objekta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartmani`
--
ALTER TABLE `apartmani`
  ADD CONSTRAINT `FK_LOKACIJA_APARTMAN` FOREIGN KEY (`ID_lokacija_apartmana`) REFERENCES `lokacija` (`id_lokacije`) ON UPDATE CASCADE;

--
-- Constraints for table `objekt`
--
ALTER TABLE `objekt`
  ADD CONSTRAINT `FK_LOKACIJA_OBJEKT` FOREIGN KEY (`id_lokacije`) REFERENCES `lokacija` (`id_lokacije`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
