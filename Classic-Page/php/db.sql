
--
-- Database: `findyourway-2`
--

-- --------------------------------------------------------
DROP DATABASE IF EXISTS TouristApp;
CREATE DATABASE IF NOT EXISTS TouristApp;
USE TouristApp;




--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` INT PRIMARY KEY AUTO_INCREMENT,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Type` ENUM("ADMIN", "CUSTOMER"),
  `Password` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Address` text DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
  `Tour_ID` INT PRIMARY KEY AUTO_INCREMENT,
  `Start_Time` Time(4) NOT NULL, 
  `End_Time` Time(4) NOT NULL, 
  `Site_Name` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL, 
  `Site_Location` varchar(255) DEFAULT NULL,
  `Price` INT NOT NULL,
  `Average_Ratings` float DEFAULT NULL
);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `order` (
  `Order_ID` INT PRIMARY KEY AUTO_INCREMENT,
  `User_ID` int(11) DEFAULT NULL, 
  `Booking_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Total_Price` int DEFAULT NULL,
  `Order_Method` ENUM('Orange Money', 'Mobile Money'),
  `Payment_Reference`  varchar(100),
  FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`)

);


-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `Package_ID` INT PRIMARY KEY AUTO_INCREMENT,
  `Day` ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
  `Price` INT NOT NULL,
  `package_type` enum('Classic','Premium') DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `Booking_ID` INT PRIMARY KEY  AUTO_INCREMENT,
  `Order_ID` int(11) DEFAULT NULL,
  `Package_ID` int(11) DEFAULT NULL,
  `Price` INT NOT NULL,
  `NumberOfTickets` int(11) DEFAULT NULL,
  `Booking_Date` Date NOT NULL,
  FOREIGN KEY (`Package_ID`) REFERENCES `package` (`Package_ID`),
  FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`)
);


-- --------------------------------------------------------


--
-- Table structure for table `toursessionvip`
--

CREATE TABLE IF NOT EXISTS `toursessionvip` (
  `Tour_VIPSession_ID` INT PRIMARY KEY AUTO_INCREMENT,
  `Booking_ID` INT NOT NULL,
  `Tour_ID`  INT NOT NULL,
  FOREIGN KEY (`Booking_ID`) REFERENCES `booking` (`Booking_ID`),
  FOREIGN KEY (`Tour_ID`) REFERENCES `tour` (`Tour_ID`)
);


-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `Review_ID` INT PRIMARY KEY AUTO_INCREMENT,
  `Rating` decimal(3,2) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Tour_ID` int(11) DEFAULT NULL,
  FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  FOREIGN KEY (`Tour_ID`) REFERENCES `tour` (`Tour_ID`)
);

-- --------------------------------------------------------

--
-- Table structure for table `tourvisit`
--

CREATE TABLE IF NOT EXISTS `toursession` (
  `Tour_Session_ID` INT PRIMARY KEY AUTO_INCREMENT,
  `Package_ID` int(11) NOT NULL,
  `Tour_ID` int(11) NOT NULL,
  FOREIGN KEY (`Package_ID`) REFERENCES `package` (`Package_ID`),
  FOREIGN KEY (`Tour_ID`) REFERENCES `tour` (`Tour_ID`)
);

-- Inserting Data into Table

INSERT INTO tour(Start_Time, End_Time, Site_Name, Description, Site_Location, Price, Average_Ratings)
VALUES 
 ('09:00:00','11:00:00', "Mount Cameroon","Reach the highest naturally occuring altitude in Cameroon","Buea",'5000',5),
 ('12:10:00','14:00:00', "Prime Minister's Lodge"," The first Prime minister of West Cameroon Dr. John Ngu Foncha slept here from 1961-1965 as prime minister of West Cameroon and vice president of the Federal Republic of Cameroon.","Buea",'3000', 3),
 ('09:00:00','11:00:00', "Reunification Monument","50th-anniversary monument which symbolize power, growth, and emergence dynamics ","Buea",'2000',2),
 ('12:00:00','14:00:00', "Our Lady of Grace Shrine","This place is a place of prayer for all christians and people who beleive in God, located in Sasse-Buea in the South West Region of Cameroon","Buea",'2000',2),
 ('09:00:00','11:00:00', "Bismarck Fountain"," The fountain was built in in honour of Otto Von Bismarck","Buea",'2000',2),
 ('12:00:00','14:00:00', "German Burial Grounds","Old German tombs at the German cemetery laid out from 1898 during the German colonial peroid","Buea",'1000',2),
 ('14:00:00','15:00:00', "Quarter 15 Waterfall"," Waterfall with source originating from Mount Cameroon","Buea",'2000',2);
 


INSERT INTO package (`Day`, Price, package_type) values
('Monday', 10000, "Classic"),
('Monday', 20000, "Premium"),
('Tuesday', 10000, "Classic"),
('Tuesday', 20000, "Premium"),
('Wednesday', 10000, "Classic"),
('Wednesday', 20000, "Premium"),
('Thursday', 10000, "Classic"),
('Thursday', 20000, "Premium"),
('Friday', 10000, "Classic"),
('Friday', 20000, "Premium"),
('Saturday', 10000, "Classic"),
('Saturday', 20000, "Premium"),
('Sunday', 10000, "Classic"),
('Sunday', 20000, "Premium");

INSERT INTO toursession (package_id, Tour_ID) values

(3, 1),
(3, 2),
(3, 7),
(4, 3),
(4, 4),
(4, 7),
(5, 3),
(5, 4),
(5, 7),
(6, 5),
(6, 6),
(6, 7),
(7, 5),
(7, 6),
(7, 7),
(8, 1),
(8, 2),
(8, 7),
(9, 1),
(9, 2),
(9, 7),
(10, 3),
(10, 4),
(10, 7),
(11, 3),
(11, 4),
(11, 7);


INSERT INTO `user` (First_Name, Last_Name, Email, Type, Password, Phone_Number, Address) values 
("Cycee", "Zara", "ZaraCycee@ub.edu", "CUSTOMER", "zaracycee", "12345678", "WhoKnows?");
