
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `Competition` (
  `competitionID` int(11) NOT NULL,
  `competitionName` varchar(50) NOT NULL,
  `_sportsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `Competition` (`competitionID`, `competitionName`, `_sportsID`) VALUES
(1, 'Bundesliga', 2),
(2, 'ICE Hockey League', 1),
(3, 'Champions League', 2),
(4, 'Europa League', 2);



CREATE TABLE `Game` (
  `gameID` int(11) NOT NULL,
  `_home` int(11) NOT NULL,
  `_away` int(11) NOT NULL,
  `startTime` datetime NOT NULL,
  `_competitionID` int(11) NOT NULL,
  `_matchdayID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `Game` (`gameID`, `_home`, `_away`, `startTime`, `_competitionID`, `_matchdayID`) VALUES
(11, 3, 4, '2019-07-18 18:30:00', 1, 1),
(12, 1, 2, '2019-10-23 09:45:00', 2, 6);



CREATE TABLE `Matchday` (
  `matchdayID` int(11) NOT NULL,
  `matchdayName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `Matchday` (`matchdayID`, `matchdayName`) VALUES
(1, 'Matchday 1'),
(2, 'Matchday 2'),
(3, 'Matchday 3'),
(4, 'Matchday 4'),
(5, 'Matchday 5'),
(6, 'Matchday 6'),
(7, 'Matchday 7'),
(8, 'Matchday 8'),
(9, 'Matchday 9'),
(10, 'Matchday 10'),
(11, 'Matchday 11'),
(12, 'Matchday 12'),
(13, 'Matchday 13'),
(14, 'Matchday 14'),
(15, 'Matchday 15'),
(16, 'Matchday 16'),
(17, 'Matchday 17'),
(18, 'Matchday 18'),
(19, 'Matchday 19'),
(20, 'Matchday 20'),
(21, 'Matchday 21'),
(22, 'Matchday 22'),
(23, 'Matchday 23'),
(24, 'Matchday 24'),
(25, 'Matchday 25'),
(26, 'Matchday 26'),
(27, 'Matchday 27'),
(28, 'Matchday 28'),
(29, 'Matchday 29'),
(30, 'Matchday 30'),
(31, 'Matchday 31'),
(32, 'Matchday 32'),
(33, 'Matchday 33'),
(34, 'Matchday 34'),
(35, 'Matchday 35'),
(36, 'Matchday 36'),
(37, 'Matchday 37'),
(38, 'Matchday 38'),
(39, 'Round of 16 - 1st leg'),
(40, 'Round of 16 - 2nd leg'),
(41, 'Quarter-Final 1st leg'),
(42, 'Quarter-Final 2nd leg'),
(43, 'Semi-Final 1st leg'),
(44, 'Semi-Final 2nd leg'),
(45, 'Final');



CREATE TABLE `Sports` (
  `sportsID` int(11) NOT NULL,
  `sportsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `Sports` (`sportsID`, `sportsName`) VALUES
(1, 'Ice Hockey'),
(2, 'Football');



CREATE TABLE `Team` (
  `teamID` int(11) NOT NULL,
  `teamName` varchar(50) NOT NULL,
  `_sportsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `Team` (`teamID`, `teamName`, `_sportsID`) VALUES
(1, 'KAC', 1),
(2, 'Capitals', 1),
(3, 'Red Bull Salzburg', 2),
(4, 'Sturm Graz', 2),
(5, 'Rapid Wien', 2),
(6, 'Austria Wien', 2),
(7, 'Graz 99ers', 1),
(8, 'Black Wings Linz', 1);

ALTER TABLE `Competition`
  ADD PRIMARY KEY (`competitionID`),
  ADD KEY `_sportsID` (`_sportsID`);


ALTER TABLE `Game`
  ADD PRIMARY KEY (`gameID`),
  ADD KEY `_competitionID` (`_competitionID`),
  ADD KEY `_matchdayID` (`_matchdayID`),
  ADD KEY `_away` (`_away`),
  ADD KEY `_home` (`_home`);

ALTER TABLE `Matchday`
  ADD PRIMARY KEY (`matchdayID`);


ALTER TABLE `Sports`
  ADD PRIMARY KEY (`sportsID`);


ALTER TABLE `Team`
  ADD PRIMARY KEY (`teamID`),
  ADD KEY `_sportsID` (`_sportsID`);


ALTER TABLE `Competition`
  MODIFY `competitionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `Game`
  MODIFY `gameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


ALTER TABLE `Matchday`
  MODIFY `matchdayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

ALTER TABLE `Sports`
  MODIFY `sportsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `Team`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `Competition`
  ADD CONSTRAINT `Competition_ibfk_1` FOREIGN KEY (`_sportsID`) REFERENCES `Sports` (`sportsID`);


ALTER TABLE `Game`
  ADD CONSTRAINT `Game_ibfk_1` FOREIGN KEY (`_competitionID`) REFERENCES `Competition` (`competitionID`),
  ADD CONSTRAINT `Game_ibfk_2` FOREIGN KEY (`_matchdayID`) REFERENCES `Matchday` (`matchdayID`),
  ADD CONSTRAINT `Game_ibfk_3` FOREIGN KEY (`_away`) REFERENCES `Team` (`teamID`),
  ADD CONSTRAINT `Game_ibfk_4` FOREIGN KEY (`_home`) REFERENCES `Team` (`teamID`);


ALTER TABLE `Team`
  ADD CONSTRAINT `Team_ibfk_1` FOREIGN KEY (`_sportsID`) REFERENCES `Sports` (`sportsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
