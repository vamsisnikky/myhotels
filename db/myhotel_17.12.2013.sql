-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2013 at 07:21 PM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `iBookingId` int(11) NOT NULL AUTO_INCREMENT,
  `iHotelRoomId` int(11) DEFAULT NULL,
  `iCustomerId` int(11) DEFAULT NULL,
  `iAdult` int(11) DEFAULT NULL,
  `iChild` int(11) DEFAULT NULL,
  `dtBookedDate` date DEFAULT NULL,
  `dtBookedFrom` date DEFAULT NULL,
  `dtBookedTo` date DEFAULT NULL,
  `fTotalPrice` float DEFAULT NULL,
  `vPaymentMethod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eStatus` enum('Succes','Fail') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iBookingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE IF NOT EXISTS `city_master` (
  `iCityId` int(11) NOT NULL AUTO_INCREMENT,
  `vCityName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iStateId` int(11) DEFAULT NULL,
  PRIMARY KEY (`iCityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`iCityId`, `vCityName`, `iStateId`) VALUES
(1, 'Adilabad', 2),
(2, 'Anantapur', 2),
(3, 'Chittoor', 2),
(4, 'Kakinada', 2),
(5, 'Guntur', 2),
(6, 'Hyderabad', 2),
(7, 'Karimnagar', 2),
(8, 'Khammam', 2),
(9, 'Krishna', 2),
(10, 'Kurnool', 2),
(11, 'Mahbubnagar', 2),
(12, 'Medak', 2),
(13, 'Nalgonda', 2),
(14, 'Nizamabad', 2),
(15, 'Ongole', 2),
(16, 'Hyderabad', 2),
(17, 'Srikakulam', 2),
(18, 'Nellore', 2),
(19, 'Visakhapatnam', 2),
(20, 'Vizianagaram', 2),
(21, 'Warangal', 2),
(22, 'Eluru', 2),
(23, 'Kadapa', 2),
(24, 'Ahmedabad', 12),
(25, 'Amreli', 12),
(26, 'district', 12),
(27, 'Anand', 12),
(28, 'Banaskantha', 12),
(29, 'Bharuch', 12),
(30, 'Bhavnagar', 12),
(31, 'Dahod', 12),
(32, 'The', 12),
(33, 'Dangs', 12),
(34, 'Gandhinagar', 12),
(35, 'Jamnagar', 12),
(36, 'Junagadh', 12),
(37, 'Kutch', 12),
(38, 'Kheda', 12),
(39, 'Mehsana', 12),
(40, 'Narmada', 12),
(41, 'Navsari', 12),
(42, 'Patan', 12),
(43, 'Panchmahal', 12),
(44, 'Porbandar', 12),
(45, 'Rajkot', 12),
(46, 'Sabarkantha', 12),
(47, 'Surendranagar', 12),
(48, 'Surat', 12),
(49, 'Vyara', 12),
(50, 'Vadodara', 12),
(51, 'Valsad', 12);

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `iCountryId` int(11) NOT NULL AUTO_INCREMENT,
  `vCountryName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iCountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=192 ;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`iCountryId`, `vCountryName`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antarctica'),
(7, 'Antigua and Barbuda'),
(8, 'Argentina'),
(9, 'Armenia'),
(10, 'Australia'),
(11, 'Austria'),
(12, 'Azerbaijan'),
(13, 'Bahamas'),
(14, 'Bahrain'),
(15, 'Bangladesh'),
(16, 'Barbados'),
(17, 'Belarus'),
(18, 'Belgium'),
(19, 'Belize'),
(20, 'Benin'),
(21, 'Bermuda'),
(22, 'Bhutan'),
(23, 'Bolivia'),
(24, 'Bosnia and Herzegovina'),
(25, 'Botswana'),
(26, 'Brazil'),
(27, 'Brunei'),
(28, 'Bulgaria'),
(29, 'Burkina Faso'),
(30, 'Burma'),
(31, 'Burundi'),
(32, 'Cambodia'),
(33, 'Cameroon'),
(34, 'Canada'),
(35, 'Cape Verde'),
(36, 'Central African Republic'),
(37, 'Chad'),
(38, 'Chile'),
(39, 'China'),
(40, 'Colombia'),
(41, 'Comoros'),
(42, 'Congo, Democratic Republic'),
(43, 'Congo, Republic of the'),
(44, 'Costa Rica'),
(45, 'Cote d''Ivoire'),
(46, 'Croatia'),
(47, 'Cuba'),
(48, 'Cyprus'),
(49, 'Czech Republic'),
(50, 'Denmark'),
(51, 'Djibouti'),
(52, 'Dominica'),
(53, 'Dominican Republic'),
(54, 'East Timor'),
(55, 'Ecuador'),
(56, 'Egypt'),
(57, 'El Salvador'),
(58, 'Equatorial Guinea'),
(59, 'Eritrea'),
(60, 'Estonia'),
(61, 'Ethiopia'),
(62, 'Fiji'),
(63, 'Finland'),
(64, 'France'),
(65, 'Gabon'),
(66, 'Gambia'),
(67, 'Georgia'),
(68, 'Germany'),
(69, 'Ghana'),
(70, 'Greece'),
(71, 'Greenland'),
(72, 'Grenada'),
(73, 'Guatemala'),
(74, 'Guinea'),
(75, 'Guinea-Bissau'),
(76, 'Guyana'),
(77, 'Haiti'),
(78, 'Honduras'),
(79, 'Hong Kong'),
(80, 'Hungary'),
(81, 'Iceland'),
(82, 'India'),
(83, 'Indonesia'),
(84, 'Iran'),
(85, 'Iraq'),
(86, 'Ireland'),
(87, 'Israel'),
(88, 'Italy'),
(89, 'Jamaica'),
(90, 'Japan'),
(91, 'Jordan'),
(92, 'Kazakhstan'),
(93, 'Kenya'),
(94, 'Kiribati'),
(95, 'Korea, North'),
(96, 'Korea, South'),
(97, 'Kuwait'),
(98, 'Kyrgyzstan'),
(99, 'Laos'),
(100, 'Latvia'),
(101, 'Lebanon'),
(102, 'Lesotho'),
(103, 'Liberia'),
(104, 'Libya'),
(105, 'Liechtenstein'),
(106, 'Lithuania'),
(107, 'Luxembourg'),
(108, 'Macedonia'),
(109, 'Madagascar'),
(110, 'Malawi'),
(111, 'Malaysia'),
(112, 'Maldives'),
(113, 'Mali'),
(114, 'Malta'),
(115, 'Marshall Islands'),
(116, 'Mauritania'),
(117, 'Mauritius'),
(118, 'Mexico'),
(119, 'Micronesia'),
(120, 'Moldova'),
(121, 'Mongolia'),
(122, 'Morocco'),
(123, 'Monaco'),
(124, 'Mozambique'),
(125, 'Namibia'),
(126, 'Nauru'),
(127, 'Nepal'),
(128, 'Netherlands'),
(129, 'New Zealand'),
(130, 'Nicaragua'),
(131, 'Niger'),
(132, 'Nigeria'),
(133, 'Norway'),
(134, 'Oman'),
(135, 'Pakistan'),
(136, 'Panama'),
(137, 'Papua New Guinea'),
(138, 'Paraguay'),
(139, 'Peru'),
(140, 'Philippines'),
(141, 'Poland'),
(142, 'Portugal'),
(143, 'Qatar'),
(144, 'Romania'),
(145, 'Russia'),
(146, 'Rwanda'),
(147, 'Samoa'),
(148, 'San Marino'),
(149, ' Sao Tome'),
(150, 'Saudi Arabia'),
(151, 'Senegal'),
(152, 'Serbia and Montenegro'),
(153, 'Seychelles'),
(154, 'Sierra Leone'),
(155, 'Singapore'),
(156, 'Slovakia'),
(157, 'Slovenia'),
(158, 'Solomon Islands'),
(159, 'Somalia'),
(160, 'South Africa'),
(161, 'Spain'),
(162, 'Sri Lanka'),
(163, 'Sudan'),
(164, 'Suriname'),
(165, 'Swaziland'),
(166, 'Sweden'),
(167, 'Switzerland'),
(168, 'Syria'),
(169, 'Taiwan'),
(170, 'Tajikistan'),
(171, 'Tanzania'),
(172, 'Thailand'),
(173, 'Togo'),
(174, 'Tonga'),
(175, 'Trinidad and Tobago'),
(176, 'Tunisia'),
(177, 'Turkey'),
(178, 'Turkmenistan'),
(179, 'Uganda'),
(180, 'Ukraine'),
(181, 'United Arab Emirates'),
(182, 'United Kingdom'),
(183, 'United States'),
(184, 'Uruguay'),
(185, 'Uzbekistan'),
(186, 'Vanuatu'),
(187, 'Venezuela'),
(188, 'Vietnam'),
(189, 'Yemen'),
(190, 'Zambia'),
(191, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `iCustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `vFirstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vLastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vDob` date DEFAULT NULL,
  `vAddress1` text COLLATE utf8_unicode_ci,
  `vAddress2` text COLLATE utf8_unicode_ci,
  `iCountryId` int(11) DEFAULT NULL,
  `iStateId` int(11) DEFAULT NULL,
  `iCityId` int(11) DEFAULT NULL,
  `iZip` int(11) DEFAULT NULL,
  `vPhone` bigint(20) DEFAULT NULL,
  `vAltPhone` bigint(20) DEFAULT NULL,
  `vEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vPassword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eStatus` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iCustomerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `home_gallery`
--

CREATE TABLE IF NOT EXISTS `home_gallery` (
  `IGalleryId` int(11) NOT NULL AUTO_INCREMENT,
  `vImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eStatus` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  PRIMARY KEY (`IGalleryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `home_gallery`
--

INSERT INTO `home_gallery` (`IGalleryId`, `vImage`, `eStatus`) VALUES
(1, '1.jpg', 'Active'),
(2, '2.jpg', 'Active'),
(3, '3.jpg', 'Active'),
(4, '4.jpg', 'Active'),
(5, '5.jpg', 'Active'),
(6, '6.jpg', 'Active'),
(7, '7.jpg', 'Active'),
(9, '9.jpg', 'Active'),
(10, '10.jpg', 'Active'),
(11, '11.jpg', 'Active'),
(12, '12.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `iHotelId` int(11) NOT NULL AUTO_INCREMENT,
  `vHotelName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vHotelDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `vHotelMainImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vHotelAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `iCountryId` int(11) NOT NULL,
  `iStateId` int(11) NOT NULL,
  `iCityId` int(11) NOT NULL,
  `vContactNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `eStatus` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `eFeatured` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `vMapUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iHotelId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`iHotelId`, `vHotelName`, `vHotelDescription`, `vHotelMainImage`, `vHotelAddress`, `iCountryId`, `iStateId`, `iCityId`, `vContactNumber`, `eStatus`, `eFeatured`, `vMapUrl`) VALUES
(1, 'Hyatt Ahmedabad', 'Hyatt Ahemedabad is located at a 15-minute drive from Sabarmati Ashram and has 2 restaurants, pool bar and Wi-Fi (surcharge).', 'Hyatt.jpg', 'Near Vastrapur Lake', 82, 12, 24, '(079) 61601234', 'Active', 'Yes', 'http://goo.gl/9lun7h'),
(2, 'NOVOTEL Ahmedabad', 'A 5 star luxury hotel, just few minutes walk away from Iscon Mega Mall, Iscon Temple and Fun Republic Cinema making it an ideal location for leisure transit travellers ', 'novotel.jpg', 'Iskcon Cross Road, S.G Highway', 82, 12, 24, '(079) 40606060', 'Active', 'Yes', 'http://goo.gl/9lun7h');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_facilities`
--

CREATE TABLE IF NOT EXISTS `hotel_facilities` (
  `iFacilityId` int(11) NOT NULL AUTO_INCREMENT,
  `iHotelId` int(11) DEFAULT NULL,
  `iHotelRoomId` int(11) NOT NULL,
  `vFacility` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vSpecialOffer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iFacilityId`),
  KEY `iHotelId` (`iHotelId`),
  KEY `iHotelRoomId` (`iHotelRoomId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `hotel_facilities`
--

INSERT INTO `hotel_facilities` (`iFacilityId`, `iHotelId`, `iHotelRoomId`, `vFacility`, `vSpecialOffer`) VALUES
(1, 1, 1, 'Minibar', NULL),
(2, 1, 1, 'Tea/Coffee Maker', NULL),
(3, 1, 1, 'Electronic Safe', NULL),
(4, 1, 1, 'DVD Player', NULL),
(5, 1, 1, 'Wifi Internet', NULL),
(6, 1, 1, 'Hot & Cold Water', NULL),
(7, 1, 1, 'Refridgerator', NULL),
(8, 1, 2, 'Minibar', NULL),
(9, 1, 2, 'Refridgerator', NULL),
(10, 1, 2, 'Hot & Cold Water', NULL),
(11, 1, 2, 'Wifi Internet', NULL),
(12, 1, 2, 'DVD Player', NULL),
(13, 1, 2, 'Tea/Coffee Maker', NULL),
(14, 1, 2, 'Electronic Safe', NULL),
(15, 2, 2, 'Electronic Safe', NULL),
(16, 2, 2, 'Tea/Coffee Maker', NULL),
(17, 2, 2, 'Minibar', NULL),
(18, 2, 2, 'DVD Player', NULL),
(19, 2, 2, 'Wifi Internet', NULL),
(20, 2, 2, 'Refridgerator', NULL),
(21, 2, 2, 'Hot & Cold Water', NULL),
(22, 2, 1, 'Hot & Cold Water', NULL),
(23, 2, 1, 'Air conditioning', NULL),
(24, 2, 1, 'Intercom Facility', NULL),
(25, 2, 1, 'Snack Basket', NULL),
(26, 2, 1, 'Shower Area', NULL),
(27, 2, 1, 'Wifi Internet', NULL),
(28, 2, 1, 'Dining Table', NULL),
(29, 1, 3, 'Dining Table', NULL),
(30, 1, 3, 'Wifi Internet', NULL),
(31, 1, 3, 'Laundry Service', NULL),
(32, 1, 3, 'Pets', NULL),
(33, 1, 3, 'Intercom', NULL),
(34, 1, 3, 'DataPort', NULL),
(35, 1, 3, 'Hot & Cold Water', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_rooms`
--

CREATE TABLE IF NOT EXISTS `hotel_rooms` (
  `iHotelRoomId` int(11) NOT NULL AUTO_INCREMENT,
  `iHotelId` int(11) DEFAULT NULL,
  `vRoomType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iRoomDescription` text COLLATE utf8_unicode_ci,
  `iCount` int(11) DEFAULT NULL,
  `iMaxAdult` int(11) DEFAULT NULL,
  `iMaxChild` int(11) DEFAULT NULL,
  `iBeds` int(11) DEFAULT NULL,
  `iBathrooms` int(11) DEFAULT NULL,
  `fPrice` float DEFAULT NULL,
  `iAvailableCount` int(11) DEFAULT NULL,
  `vRoomImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eStatus` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  PRIMARY KEY (`iHotelRoomId`),
  KEY `iHotelId` (`iHotelId`),
  KEY `iRoomId` (`vRoomType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`iHotelRoomId`, `iHotelId`, `vRoomType`, `iRoomDescription`, `iCount`, `iMaxAdult`, `iMaxChild`, `iBeds`, `iBathrooms`, `fPrice`, `iAvailableCount`, `vRoomImage`, `eStatus`) VALUES
(1, 1, 'Hyatt King/twin', 'Spacious and well-furnished, the rooms have all the modern amenities, including mini bar, 32'' LCD TV, safe, Wi-Fi, and tea/coffee maker.', 12, 3, 2, 2, 2, 8500, 8, 'hyatt1.jpg', 'Active'),
(2, 1, 'Hyatt Club King', 'Spacious and well-furnished, the rooms have all the modern amenities, including mini bar, 32'' LCD TV, safe, Wi-Fi, and tea/coffee maker.', 10, 3, 2, 2, 2, 9500, 5, 'hyatt2.jpg', 'Active'),
(3, 1, 'Hyatt Suite', 'Spacious and well-furnished, the rooms have all the modern amenities, including mini bar, 32'' LCD TV, safe, Wi-Fi, and tea/coffee maker.', 8, 3, 2, 2, 2, 12000, 3, 'hyatt3.jpg', 'Active'),
(4, 2, 'Superior Room Twin', 'Guest can avail facilities like Wi-Fi internet, guide services, babysitting services, transfer, room service, sightseeing and temple drop & pick up at an additional cost. Complimentary services include handicap facilities, parking facility, doctor on call, DVDs on request and travel desk ', 15, 2, 2, 2, 2, 8000, 10, 'novotel1.jpg', 'Active'),
(5, 2, 'Superior Room King', 'Guest can avail facilities like Wi-Fi internet, guide services, babysitting services, transfer, room service, sightseeing and temple drop & pick up at an additional cost. Complimentary services include handicap facilities, parking facility, doctor on call, DVDs on request and travel desk ', 8, 2, 2, 2, 2, 8500, 5, 'novotel1.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE IF NOT EXISTS `news_events` (
  `iNewsEventId` int(11) NOT NULL AUTO_INCREMENT,
  `dtDate` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vDescription` text COLLATE utf8_unicode_ci,
  `vUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iNewsEventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`iNewsEventId`, `dtDate`, `vTitle`, `vDescription`, `vUrl`) VALUES
(1, '18-Dec-2013', 'Winter Special', 'Make a Booking for International Hotels and get Rs. 1,500 OFF* ', 'http://makemytrip.com'),
(2, '21-Dec-2013', 'X-mas & New Year Sale', 'Countdown to your best ever holiday starts now ', 'http://in.hotels.com/hotel-deals/xmasnewyearsale-in/?intlid=in_hero_winterapac#tab1'),
(3, '23-Dec-2013', 'Avail Flat 60% off', '  2D/1N Couple Stay @ Hotel Delhi Darbar. Includes Daily Breakfast!', 'http://timesdeal.com/ahmedabad-deals/hotel-delhi-darbar-new-delhi-accommodation-14271');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `iRoomId` int(11) NOT NULL AUTO_INCREMENT,
  `iRoomType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iRoomId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `special_offers`
--

CREATE TABLE IF NOT EXISTS `special_offers` (
  `iOfferId` int(11) NOT NULL AUTO_INCREMENT,
  `vImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vDescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eStatus` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`iOfferId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `special_offers`
--

INSERT INTO `special_offers` (`iOfferId`, `vImage`, `vTitle`, `vDescription`, `vUrl`, `eStatus`) VALUES
(1, 'kashmir.jpg', 'Kashmir Packages', 'Winter Special Charismatic Kashmir (Standard and Deluxe)', 'http://goo.gl/1E0lZK', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `iStateId` int(11) NOT NULL AUTO_INCREMENT,
  `vStateName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iCountryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`iStateId`),
  KEY `fk_countryid` (`iCountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`iStateId`, `vStateName`, `iCountryId`) VALUES
(1, 'Andaman and Nicobar Islands', 82),
(2, 'Andhra Pradesh', 82),
(3, 'Arunachal Pradesh', 82),
(4, 'Assam', 82),
(5, 'Bihar', 82),
(6, 'Chandigarh', 82),
(7, 'Chhattisgarh', 82),
(8, 'Dadra and Nagar Haveli', 82),
(9, 'Daman and Diu', 82),
(10, 'Delhi', 82),
(11, 'Goa', 82),
(12, 'Gujarat', 82),
(13, 'Haryana', 82),
(14, 'Himachal Pradesh', 82),
(15, 'Jammu and Kashmir', 82),
(16, 'Jharkhand', 82),
(17, 'Karnataka', 82),
(18, 'Kerala', 82),
(19, 'Lakshadweep', 82),
(20, 'Madhya Pradesh', 82),
(21, 'Maharashtra', 82),
(22, 'Manipur', 82),
(23, 'Meghalaya', 82),
(24, 'Mizoram', 82),
(25, 'Nagaland', 82),
(26, 'Orissa', 82),
(27, 'Pondicherry', 82),
(28, 'Punjab', 82),
(29, 'Rajasthan', 82),
(30, 'Sikkim', 82),
(31, 'Tamil Nadu', 82),
(32, 'Tripura', 82),
(33, 'Uttaranchal', 82),
(34, 'Uttar Pradesh', 82),
(35, 'West Bengal', 82);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_facilities`
--
ALTER TABLE `hotel_facilities`
  ADD CONSTRAINT `hotel_facilities_ibfk_2` FOREIGN KEY (`iHotelRoomId`) REFERENCES `hotel_rooms` (`iHotelRoomId`),
  ADD CONSTRAINT `hotel_facilities_ibfk_1` FOREIGN KEY (`iHotelId`) REFERENCES `hotels` (`iHotelId`);

--
-- Constraints for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD CONSTRAINT `hotel_rooms_ibfk_1` FOREIGN KEY (`iHotelId`) REFERENCES `hotels` (`iHotelId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
