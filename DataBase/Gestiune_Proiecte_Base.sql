-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 09 Ian 2020 la 15:27
-- Versiune server: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.24-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Gestiune_Proiecte_Base`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `ANGAJATI`
--

CREATE TABLE `ANGAJATI` (
  `ID_ANGAJAT` int(11) NOT NULL,
  `EMAIL` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `CNP` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFON` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `SALARIU` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FUNCTIE` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ID_ECHIPA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `ANGAJATI`
--

INSERT INTO `ANGAJATI` (`ID_ANGAJAT`, `EMAIL`, `CNP`, `TELEFON`, `SALARIU`, `FUNCTIE`, `ID_ECHIPA`) VALUES
(2, 'admin@company.com', '1972423728341', '0765377362', '11000', 'Admin', 4),
(3, 'vlad.costel@company.com', '1972423728341', '0765377362', '4313', 'Angajat', 1),
(4, 'andrei.costel@company.com', '1972423728341', '0765377362', '1321', 'Angajat', 2),
(9, 'mirel.cosmin@company.com', '1234123412342', '0754366463', '8000', 'Manager', 2),
(10, 'george.bogdan@company.com', '1234123412343', '074633645', '9000', 'Angajat', 1),
(12, 'pintilie.marcel@company.com', '1234123412341', '0736188463', '110000', 'Angajat', 1),
(13, 'Leroy.Marcel@company.com', '1972423728341', '0765377362', '4000', 'Angajat', 2),
(14, 'Yango.Gary@company.com', '1972423728321', '0763217362', '5000', 'Angajat', 2),
(15, 'Mohamed.Haroon@company.com', '1972421128341', '0765312362', '7000', 'Manager', 3),
(16, 'Franklin.Nicolas@company.com', '1972421238341', '0763217362', '8000', 'Angajat', 3),
(17, 'Ronan.Anton@company.com', '1972423111341', '0765377362', '6000', 'Angajat', 3),
(18, 'Rhys.Benjamin@company.com', '1972312728341', '0763217362', '5500', 'Angajat', 3),
(19, 'pavel.bogdan@company.com', '1971223728341', '0758022313', '8000', 'Manager', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `AUTH`
--

CREATE TABLE `AUTH` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NUME` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRENUME` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IS_ADMIN` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `AUTH`
--

INSERT INTO `AUTH` (`ID`, `EMAIL`, `PASSWORD`, `NUME`, `PRENUME`, `IS_ADMIN`) VALUES
(1, 'admin@company.com', '1234', 'Andrei', 'Stefan', 1),
(2, 'vlad.costel@company.com', '1234', 'Vlad', 'Costel', 0),
(3, 'andrei.costel@company.com', '1234', 'Andrei', 'Costel', 0),
(13, 'mirel.cosmin@company.com', '1234', 'Mirel', 'Costel', 0),
(14, 'george.bogdan@company.com', '1234', 'George', 'Bogdan', 0),
(16, 'pintilie.marcel@company.com', '1234', 'Pintilie', 'Marcel', 0),
(17, 'Leroy.Marcel@company.com', '1234', 'Marcel', 'Leroy', 0),
(18, 'Yango.Gary@company.com', '1234', 'Yango', 'Gary', 0),
(19, 'Mohamed.Haroon@company.com', '1234', 'Mohamed', ' Haroon', 0),
(20, 'Franklin.Nicolas@company.com', '1234', 'Franklin', ' Nicolas', 0),
(21, 'Ronan.Anton@company.com', '1234', 'Ronan', 'Anton', 0),
(22, 'Rhys.Benjamin@company.com', '1234', 'Rhys', 'Benjamin', 0),
(23, 'pavel.bogdan@company.com', '1234', 'Pavel', 'Bogdan', 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `ECHIPE`
--

CREATE TABLE `ECHIPE` (
  `ID_ECHIPA` int(11) NOT NULL,
  `NUME_ECHIPA` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `SPECIALITATE` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `ECHIPE`
--

INSERT INTO `ECHIPE` (`ID_ECHIPA`, `NUME_ECHIPA`, `SPECIALITATE`) VALUES
(1, 'Team_1', 'Foundation'),
(2, 'Team_2', 'Installations'),
(3, 'Team_3', 'Design'),
(4, 'Admin', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `MATERIALE`
--

CREATE TABLE `MATERIALE` (
  `ID_MATERIAL` int(11) NOT NULL,
  `NUME_MATERIAL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `STOC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `MATERIALE`
--

INSERT INTO `MATERIALE` (`ID_MATERIAL`, `NUME_MATERIAL`, `STOC`) VALUES
(1, 'Steel framing systems', 1000),
(2, 'Mezzanine floors', 300),
(3, 'Concrete', 450),
(4, 'Composites', 100),
(5, 'Conformal coating', 300),
(6, 'AC power plugs and sockets', 900),
(7, 'Plaster & gypsum board', 700),
(8, 'Artificial stone', 240),
(9, 'Stone dry stacked ', 100),
(10, 'Structural steel: I-beam & column', 240),
(11, 'Plumbing fixtures and equipment	', 500),
(12, 'Building safety', 194),
(13, 'Decorative metal', 50),
(14, 'Noxer block', 231),
(15, 'Marble', 131);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `MATERIALE_PROIECT`
--

CREATE TABLE `MATERIALE_PROIECT` (
  `ID` int(11) NOT NULL,
  `ID_MATERIAL` int(11) NOT NULL,
  `ID_PROIECT` int(11) NOT NULL,
  `CANTITATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `MATERIALE_PROIECT`
--

INSERT INTO `MATERIALE_PROIECT` (`ID`, `ID_MATERIAL`, `ID_PROIECT`, `CANTITATE`) VALUES
(2, 2, 2, 20),
(3, 4, 3, 20),
(6, 8, 4, 90),
(11, 1, 4, 10),
(15, 3, 4, 20),
(16, 12, 4, 20);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `PROIECTE`
--

CREATE TABLE `PROIECTE` (
  `ID_PROIECT` int(11) NOT NULL,
  `NUME_PROIECT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIERE` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DEADLINE` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `PROIECTE`
--

INSERT INTO `PROIECTE` (`ID_PROIECT`, `NUME_PROIECT`, `DESCRIERE`, `DEADLINE`) VALUES
(2, 'PLAN 1070-7', 'All plans are drawn at ¼” scale or larger and include :\r\n\r\nFoundation Plan: Drawn to 1/4\" scale, this page shows all necessary notations and dimensions including support columns, walls and excavated and unexcavated areas.\r\nExterior Elevations: A blueprint picture of all four sides showing exterior materials and measurements.\r\nFloor Plan(s): Detailed plans, drawn to 1/4\" scale for each level showing room dimensions, wall partitions, windows, etc. as well as the location of electrical outlets and switches.\r\nCross Section: A vertical cutaway view of the house from roof to foundation showing details of framing, construction, flooring and roofing.\r\nInterior Elevations: Detailed drawings of kitchen cabinet elevations and other elements as required', '2020-04-29 00:00:00.000000'),
(3, 'PLAN 933-5', 'Our house design principle is; Simple Living with “just what we need,” using sustainable techniques to achieve healthy living, while keeping construction, operation, and maintenance costs to a minimum.', '2020-06-17 00:00:00.000000'),
(4, 'PLAN 455-208', ' This modern farmhouse keeps it extremely simple update\r\n', '2020-12-29 00:00:00.000000'),
(5, 'PLAN 25-4415', 'Modern, warm, and welcoming, this 2,370-square-foot home can fit on a modestly sized lot. A 3-sided fireplace creates a neat focal point in the living room. Over in the kitchen, four people can sit at the large island. Check out the private master suite upstairs.', '2021-12-28 17:00:00.000000'),
(6, 'PLAN 484-7', 'The Hummingbird H3 is this century\'s mid-century modern with the evolution of green technology and efficiencies.', '2022-03-18 00:00:00.000000'),
(7, 'PLAN 890-1', 'A modern cottage plan where adventuresome, playful design makes the most of a small space with private and public areas that connect elegantly to the outdoors.', '2021-12-30 00:00:00.000000'),
(8, 'PLAN 924-2', 'LIVE IN NATURE - Nowadays, many people are looking for a smaller second home to live somewhere in the nature. This modern cabin was designed to fulfill temporary living needs as a vacation home. House character is expressed in continuing connection of interior and exterior spaces. Spacious kitchen and great room were designed as one continuing space in an open floor plan. A home office or hobby room is located next to the great room. As the number of people working from home increases, we believe this work space gives people an opportunity to escape to nature and also get some work done at the same time. This space could be transformed to an additional bedroom with a sliding door or partition wall. The master bedroom is located separately, to allow privacy and comfort. The master suite has its own master bathroom and wall closet. The master suite is also opens to the open porch, which gives opportunities for outside activities. The utility room and storage are located at the front of the house. This is a flexible area as this spaces could be extended to have more room if necessary. The cabin layout allows to have the view in all four directions South, East, North and West, which ensures continuing sun light in the house. Variation of exterior cladding gives you a choice of cabin’s exterior look according to your own taste. Interior design in this case show what possibilities home has from inside. This is only suggestion of how house could look from inside and we believe that everyone will design their own interior space according to their specific living taste.', '2020-12-03 00:00:00.000000'),
(9, 'PLAN 497-57', 'This design is simple and efficient making it an ideal house plan for a modern family on a tight budget. This plan hosts 3 bedrooms, a large master bath room, a simple cost effective bathroom, a large common room and plenty of storage. The single level layout and universal design options make it an excellent house plan for empty nesters. This informal layout is appropriate for home owners who value durable, high performance construction, more than fancy foyers and extra powder rooms. This home features Passive solar design techniques such as Southern exposure for large areas of glazing, window shading devices and super insulated construction options make this modern house plan green. The simple shape and D.I.Y. options make this an extremely affordable home design. The large common room, with its sliding glass door out onto the patio deck, features polished concrete floors, built in office nook, and large sloped wood ceilings. The large glass windows and doors on the south side flood the great room with light. Open shelving and a complete D.I.Y. kitchen are cost saving design options. This D.I.Y. kitchen option features shop table style counters made from concrete slabs and scrap lumber', '2021-10-28 17:00:00.000000'),
(10, 'PLAN 892-28', 'Two master suites make this plan a great choice to appeal to multigenerational families – and they’re both impressive spaces, with large showers, double sinks, and outdoor access. The other two bedrooms (one on this level, the other upstairs next to a large bonus room) also boast private bathrooms. In the middle of the home, the island kitchen flows into the open dining area and the great room. Rugged Craftsman details on the exterior include exposed rafter tails and decorative trusses.', '2021-12-02 00:00:00.000000'),
(13, 'PLAN 892-399', 'test 3 add project', '2020-04-09 00:00:00.000000'),
(14, 'PLAN 892-999', 'Add project test 4', '2020-01-31 00:00:00.000000'),
(15, 'Test project', 'test', '2020-01-08 00:00:00.000000');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `PROIECTE_ECHIPE`
--

CREATE TABLE `PROIECTE_ECHIPE` (
  `ID` int(11) NOT NULL,
  `ID_PROIECT` int(11) NOT NULL,
  `ID_ECHIPA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `PROIECTE_ECHIPE`
--

INSERT INTO `PROIECTE_ECHIPE` (`ID`, `ID_PROIECT`, `ID_ECHIPA`) VALUES
(2, 2, 2),
(3, 3, 3),
(4, 4, 1),
(8, 5, 1),
(9, 6, 1),
(10, 7, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `RAPORT_PROIECT`
--

CREATE TABLE `RAPORT_PROIECT` (
  `ID_RAPORT` int(11) NOT NULL,
  `ID_PROIECT` int(11) NOT NULL,
  `ID_ANGAJAT` int(11) NOT NULL,
  `DESCRIERE` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `RAPORT_PROIECT`
--

INSERT INTO `RAPORT_PROIECT` (`ID_RAPORT`, `ID_PROIECT`, `ID_ANGAJAT`, `DESCRIERE`) VALUES
(2, 2, 4, 'Task 2 is done and we had a problem with electricity.We need a generator.'),
(5, 4, 19, 'hello'),
(9, 5, 3, 'hello'),
(10, 7, 19, 'test raport 890\r\n');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `TO_DO_PROIECT`
--

CREATE TABLE `TO_DO_PROIECT` (
  `ID_TASK` int(11) NOT NULL,
  `ID_PROIECT` int(11) NOT NULL,
  `ID_ECHIPA` int(11) NOT NULL,
  `TASK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `STATUS_TASK` tinyint(1) NOT NULL DEFAULT '0',
  `DEADLINE` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `TO_DO_PROIECT`
--

INSERT INTO `TO_DO_PROIECT` (`ID_TASK`, `ID_PROIECT`, `ID_ECHIPA`, `TASK`, `STATUS_TASK`, `DEADLINE`) VALUES
(4, 2, 2, 'Retaining walls must be included in the building consent and signed off.', 0, '2020-01-19 00:00:00.000000'),
(5, 2, 2, 'Is the ground supported during construction?', 0, '2020-01-24 00:00:00.000000'),
(6, 2, 2, 'Ensure the wall is drained behind and waterproofed/tanked if necessary.', 1, '2020-01-30 00:00:00.000000'),
(7, 3, 3, 'Footings need to be straight and correctly positioned, though the finish doesn’t have to be smooth.', 0, '2020-02-02 00:00:00.000000'),
(8, 3, 3, 'Are the drain holes or pipe vents in locations that will interfere with future use of the grounds', 0, '2020-02-07 00:00:00.000000'),
(9, 3, 3, 'Ensure the floor is fully laid in one pour and there is no lag between deliveries.', 0, '2020-02-21 00:00:00.000000'),
(10, 4, 1, 'Task 1', 0, '2020-01-01 00:00:00.000000'),
(19, 4, 1, 'Task 4', 1, '2020-02-29 00:00:00.000000'),
(20, 4, 1, 'dwada\r\n', 1, '2020-01-08 00:00:00.000000'),
(21, 4, 1, 'test 2', 1, '2020-01-15 00:00:00.000000'),
(22, 5, 1, 'Task 9\r\n', 0, '2020-01-09 00:00:00.000000'),
(23, 7, 1, 'task 10', 0, '2020-01-31 00:00:00.000000');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `UTILAJE`
--

CREATE TABLE `UTILAJE` (
  `ID_UTILAJ` int(11) NOT NULL,
  `NUME_UTILAJ` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `UTILAJE`
--

INSERT INTO `UTILAJE` (`ID_UTILAJ`, `NUME_UTILAJ`) VALUES
(1, 'Excavators'),
(2, 'Backhoe'),
(3, 'Dragline Excavator'),
(4, 'Bulldozer'),
(5, 'Wheel Tractor Scraper'),
(6, 'Trencher'),
(7, 'Loaders'),
(8, 'Paver'),
(9, 'Dump Truck'),
(10, 'Pile Driving Machine');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `UTILAJE_PROIECT`
--

CREATE TABLE `UTILAJE_PROIECT` (
  `ID` int(11) NOT NULL,
  `ID_UTILAJ` int(11) NOT NULL,
  `ID_PROIECT` int(11) NOT NULL,
  `DATA_START` datetime(6) NOT NULL,
  `DATA_FINISH` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `UTILAJE_PROIECT`
--

INSERT INTO `UTILAJE_PROIECT` (`ID`, `ID_UTILAJ`, `ID_PROIECT`, `DATA_START`, `DATA_FINISH`) VALUES
(2, 3, 2, '2020-01-02 00:00:00.000000', '2020-01-12 00:00:00.000000'),
(3, 7, 3, '2020-01-21 00:00:00.000000', '2020-01-28 00:00:00.000000'),
(6, 1, 4, '2019-12-01 00:00:00.000000', '2019-12-02 00:00:00.000000'),
(7, 2, 4, '2022-06-08 00:00:00.000000', '2022-06-30 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ANGAJATI`
--
ALTER TABLE `ANGAJATI`
  ADD PRIMARY KEY (`ID_ANGAJAT`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `ANGAJATI_ibfk_1` (`ID_ECHIPA`);

--
-- Indexes for table `AUTH`
--
ALTER TABLE `AUTH`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `ECHIPE`
--
ALTER TABLE `ECHIPE`
  ADD PRIMARY KEY (`ID_ECHIPA`);

--
-- Indexes for table `MATERIALE`
--
ALTER TABLE `MATERIALE`
  ADD PRIMARY KEY (`ID_MATERIAL`);

--
-- Indexes for table `MATERIALE_PROIECT`
--
ALTER TABLE `MATERIALE_PROIECT`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_MATERIAL` (`ID_MATERIAL`),
  ADD KEY `ID_PROIECT` (`ID_PROIECT`);

--
-- Indexes for table `PROIECTE`
--
ALTER TABLE `PROIECTE`
  ADD PRIMARY KEY (`ID_PROIECT`);

--
-- Indexes for table `PROIECTE_ECHIPE`
--
ALTER TABLE `PROIECTE_ECHIPE`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_PROIECT` (`ID_PROIECT`),
  ADD KEY `ID_ECHIPA` (`ID_ECHIPA`);

--
-- Indexes for table `RAPORT_PROIECT`
--
ALTER TABLE `RAPORT_PROIECT`
  ADD PRIMARY KEY (`ID_RAPORT`),
  ADD KEY `ID_PROIECT` (`ID_PROIECT`),
  ADD KEY `ID_ANGAJAT` (`ID_ANGAJAT`);

--
-- Indexes for table `TO_DO_PROIECT`
--
ALTER TABLE `TO_DO_PROIECT`
  ADD PRIMARY KEY (`ID_TASK`),
  ADD KEY `ID_PROIECT` (`ID_PROIECT`),
  ADD KEY `ID_ECHIPA` (`ID_ECHIPA`);

--
-- Indexes for table `UTILAJE`
--
ALTER TABLE `UTILAJE`
  ADD PRIMARY KEY (`ID_UTILAJ`);

--
-- Indexes for table `UTILAJE_PROIECT`
--
ALTER TABLE `UTILAJE_PROIECT`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_UTILAJ` (`ID_UTILAJ`),
  ADD KEY `ID_PROIECT` (`ID_PROIECT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ANGAJATI`
--
ALTER TABLE `ANGAJATI`
  MODIFY `ID_ANGAJAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `AUTH`
--
ALTER TABLE `AUTH`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `ECHIPE`
--
ALTER TABLE `ECHIPE`
  MODIFY `ID_ECHIPA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `MATERIALE`
--
ALTER TABLE `MATERIALE`
  MODIFY `ID_MATERIAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `MATERIALE_PROIECT`
--
ALTER TABLE `MATERIALE_PROIECT`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `PROIECTE`
--
ALTER TABLE `PROIECTE`
  MODIFY `ID_PROIECT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `PROIECTE_ECHIPE`
--
ALTER TABLE `PROIECTE_ECHIPE`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `RAPORT_PROIECT`
--
ALTER TABLE `RAPORT_PROIECT`
  MODIFY `ID_RAPORT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `TO_DO_PROIECT`
--
ALTER TABLE `TO_DO_PROIECT`
  MODIFY `ID_TASK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `UTILAJE`
--
ALTER TABLE `UTILAJE`
  MODIFY `ID_UTILAJ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `UTILAJE_PROIECT`
--
ALTER TABLE `UTILAJE_PROIECT`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `ANGAJATI`
--
ALTER TABLE `ANGAJATI`
  ADD CONSTRAINT `ANGAJATI_ibfk_1` FOREIGN KEY (`ID_ECHIPA`) REFERENCES `ECHIPE` (`ID_ECHIPA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ANGAJATI_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `AUTH` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `MATERIALE_PROIECT`
--
ALTER TABLE `MATERIALE_PROIECT`
  ADD CONSTRAINT `MATERIALE_PROIECT_ibfk_1` FOREIGN KEY (`ID_MATERIAL`) REFERENCES `MATERIALE` (`ID_MATERIAL`),
  ADD CONSTRAINT `MATERIALE_PROIECT_ibfk_2` FOREIGN KEY (`ID_PROIECT`) REFERENCES `PROIECTE` (`ID_PROIECT`);

--
-- Restrictii pentru tabele `PROIECTE_ECHIPE`
--
ALTER TABLE `PROIECTE_ECHIPE`
  ADD CONSTRAINT `PROIECTE_ECHIPE_ibfk_1` FOREIGN KEY (`ID_PROIECT`) REFERENCES `PROIECTE` (`ID_PROIECT`),
  ADD CONSTRAINT `PROIECTE_ECHIPE_ibfk_2` FOREIGN KEY (`ID_ECHIPA`) REFERENCES `ECHIPE` (`ID_ECHIPA`);

--
-- Restrictii pentru tabele `RAPORT_PROIECT`
--
ALTER TABLE `RAPORT_PROIECT`
  ADD CONSTRAINT `RAPORT_PROIECT_ibfk_1` FOREIGN KEY (`ID_PROIECT`) REFERENCES `PROIECTE` (`ID_PROIECT`),
  ADD CONSTRAINT `RAPORT_PROIECT_ibfk_2` FOREIGN KEY (`ID_ANGAJAT`) REFERENCES `ANGAJATI` (`ID_ANGAJAT`);

--
-- Restrictii pentru tabele `TO_DO_PROIECT`
--
ALTER TABLE `TO_DO_PROIECT`
  ADD CONSTRAINT `TO_DO_PROIECT_ibfk_1` FOREIGN KEY (`ID_PROIECT`) REFERENCES `PROIECTE` (`ID_PROIECT`),
  ADD CONSTRAINT `TO_DO_PROIECT_ibfk_2` FOREIGN KEY (`ID_ECHIPA`) REFERENCES `ECHIPE` (`ID_ECHIPA`);

--
-- Restrictii pentru tabele `UTILAJE_PROIECT`
--
ALTER TABLE `UTILAJE_PROIECT`
  ADD CONSTRAINT `UTILAJE_PROIECT_ibfk_1` FOREIGN KEY (`ID_UTILAJ`) REFERENCES `UTILAJE` (`ID_UTILAJ`),
  ADD CONSTRAINT `UTILAJE_PROIECT_ibfk_2` FOREIGN KEY (`ID_PROIECT`) REFERENCES `PROIECTE` (`ID_PROIECT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
