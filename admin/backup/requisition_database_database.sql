

CREATE TABLE `requisition_book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL,
  `utype` text NOT NULL,
  `dept` text NOT NULL,
  `papercode` varchar(50) NOT NULL,
  `studentstrength` int(50) NOT NULL,
  `date` date DEFAULT NULL,
  `reffno` int(30) NOT NULL,
  `slno` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `totalcopiesrequired` int(30) NOT NULL,
  `formno` int(10) NOT NULL,
  `availableinstock` int(20) NOT NULL,
  `newrequired` int(20) NOT NULL,
  `justification` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `approvedDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


