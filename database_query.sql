SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--table structure for the `admin`

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,AUTO_INCREMENT=4,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--INSERT data for table `admin`

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(    ),
(    );

--table structure for `answer`

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--insert data for table `answer`

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('   '),
('   '),
('   ');

--table structure for table `options`

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice` ) VALUES
(' '),
(' ');

--table structure for table `rank`

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--insert data for table `rank`

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
(' '),
(' ');

--table structure for table `user`

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL PRIMARY KEY,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--insert data for table `user`
 
INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
(' '),
(' ');




