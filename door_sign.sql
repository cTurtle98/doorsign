-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2019 at 12:42 AM
-- Server version: 5.5.60-0+deb8u1
-- PHP Version: 5.6.38-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `door_sign`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
`ID` int(11) NOT NULL,
  `Card#` tinytext NOT NULL,
  `message1` int(11) NOT NULL,
  `message2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`ID`, `Card#`, `message1`, `message2`) VALUES
(1, '%RTS2029212950473624?', 14, 5),
(2, '0005134907', 3, 4),
(3, '0005150671', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `type` text NOT NULL,
  `title` mediumtext NOT NULL,
  `status` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `active`, `name`, `type`, `title`, `status`) VALUES
(1, 0, 'HOME test', 'home', 'HOME TITLE', 'STATUS STATUS'),
(2, 0, 'test2', 'away', 'TITLE', 'STATUS'),
(3, 0, 'SLEEPING', 'do-not-disturb', 'SLEEPING', 'I AM ASLEEP DO NOT DISTURB'),
(4, 0, 'Home', 'home', 'Home', '<br>\r\nEnter at your own risk!\r\n<br><br>'),
(5, 1, 'location unknown', 'away', 'Location Unknown', 'Find Ciaran on his calendar\r\n<iframe src="https://calendar.google.com/calendar/embed?showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=WEEK&amp;height=850&amp;wkst=2&amp;hl=en&amp;bgcolor=%23FFFFFF&amp;src=1i17bbtmtmejm2p4cu3qe6ml30%40group.calendar.google.com&amp;color=%23875509&amp;src=3np5t5t7vn6pudj8vc0r6ic2gg%40group.calendar.google.com&amp;color=%23711616&amp;src=mqbcvav91mm616lf690cfiiknk%40group.calendar.google.com&amp;color=%23333333&amp;ctz=America%2FLos_Angeles" style="border-width:0" width="750" height="850" frameborder="0" scrolling="no"></iframe>'),
(6, 0, 'at ziah''s house', 'away', 'AWAY', 'Went to Ziah''s house, be back soon.'),
(7, 0, 'dinner', 'away', 'AWAY', 'Out To Dinner'),
(8, 0, 'picking up ziah', 'away', 'AWAY', 'picking up Ziah, be back soon'),
(9, 0, 'at beach', 'away', 'AWAY', 'Out, be back soon.'),
(10, 0, 'Home', 'home', 'home', '<style>#the-ccing-text { font-size: 65px; word-wrap: break-word; white-space: normal; text-wrap: normal; }\r\n.blink {\r\n  animation: blink-animation 1s steps(4, start) infinite;\r\n  -webkit-animation: blink-animation 1s steps(4, start) infinite;\r\n}\r\n@keyframes blink-animation {\r\n  to {\r\n    visibility: hidden;\r\n  }\r\n}\r\n@-webkit-keyframes blink-animation {\r\n  to {\r\n    visibility: hidden;\r\n  }\r\n}</style>\r\n<span id="the-ccing-text" class="blink">c2t3Ky9PM1RCcmtxdUYwSWZUYnhBTGxFMWJsdmxiNTE0QUlXbGFaT3pXS2NQb2dhemRZemdVdGd3RXArWnBWT0N6SXNGTS9EZmoyc3VIcFdKcEZKcERtcVBxUW90WXBodzlKVHg3L0dVS1dFMUEvc2tQVUVCVHlBT0FhMHNYWDM=</span>'),
(11, 0, 'Recording', 'do-not-disturb', 'Recording in Progress', 'Recording currently in progress, please stand by.'),
(12, 0, 'out to breakfast', 'away', 'AWAY', 'out to breakfast'),
(13, 0, 'at movie', 'away', 'AWAY', 'out to the movies. be back around 7:30'),
(14, 0, 'work Cinelux', 'away', 'AT WORK', 'at work at Cinelux in Capitola'),
(15, 0, 'Calendar agenda', 'away', 'See my schedule', '<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=850&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=1i17bbtmtmejm2p4cu3qe6ml30%40group.calendar.google.com&amp;color=%23875509&amp;ctz=America%2FLos_Angeles" style="border-width:0" width="750" height="850" frameborder="0" scrolling="no"></iframe>'),
(16, 0, 'streaming', 'do-not-disturb', 'LIVE STREAMING', '<br>\r\npreview:\r\n<br><br>\r\n<iframe src="http://player.twitch.tv/?volume=0.5&muted&channel=cturtle98" width="700px" height="400px"> </iframe>'),
(17, 0, 'online-class', 'do-not-disturb', 'DO NOT DISTURB', 'IN ONLINE CLASS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`), ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
