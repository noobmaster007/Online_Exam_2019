-- COPY THE CODE AND PASTE IT ON SQL TAB

CREATE DATABASE onlineproject;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET TIME_ZONE = "+00:00";

-- table structure for the `admin`

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- INSERT data for table `admin`

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1,'gablusarkar91@gmail.com','admin'),
(2,'sudiptagupta14@gmail.com','admin'),
(3,'pranaykarmakar9@gmail.com','admin'),
(4,'bishalchanda2110@gmail.com','admin');

-- -----------------------------------------------------------------------
-- table structure for `answer`

CREATE TABLE `answer` (
  `qid` text NOT NULL, -- qid = question id
  `ansid` text NOT NULL -- ansid = answer id
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insert data for table `answer`

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('',''),
('',''),
('','');

-- ---------------------------------------------------------

-- table structure for table `options`

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- inserting data for table 'option'

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('','',''),
('','','');

-- ----------------------------------------------------------------

-- table structure for table 'questions'

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text not null,
  `qns` text not null,
  `choice` int(10) not null,
  `sn` int(11) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- inserting data into table 'questions'

INSERT INTO `questions` (`eid`,`qid`,`qns`,`choice`,`sn`) VALUES 
('','','',0,0);

-- ----------------------------------------------------------------------

-- table structure for table `quiz`

CREATE TABLE `quiz` (
  `eid` text not null,
  `title` text not null,
  `right` int(11) not null,
  `wrong` int(11) not null,
  `total` int(11) not null,
  `time` bigint(20) not null,
  `date` timestamp not null DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- inserting data for table `quiz`

INSERT INTO `quiz` (`eid`,`title`,`right`,`wrong`,`total`,`time`,`date`) VALUES
('','',0,0,0,0,'');

-- ---------------------------------------------------------------------

--
-- table structure for table 'rank'
--

create table `rank` (
  `email` varchar(50) not null,
  `score` int(11) not null,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- insert data for table `rank`

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('',0,'');

-- -----------------------------------------------------------------

-- table structure for HISTORY

CREATE TABLE `history` (
  `email` varchar(50) not null,
  `eid` text not null,
  `score` int(11) not null,
  `quescount` int(11) not null,
  `right` int(11) not null,
  `wrong` int(11) not null,
  `date` timestamp not null DEFAULT CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- inserting data into history table

INSERT INTO `history` (`email`,`eid`,`score`,`quescount`,`right`,`wrong`,`date`) values 
('','','','','','','');

 -- ------------------------------------------------------------------------------------

-- table structure for table `user`

create table `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL ,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insert data for table `user`
 
INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('','','','',0,'');


-- ----------------------------------------------------------------------

-- indexes for table 'admin'

ALTER TABLE `admin` ADD PRIMARY KEY (`admin_id`);

-- indexes for table 'user'

ALTER TABLE `user` ADD PRIMARY KEY (`email`);

ALTER TABLE `admin` MODIFY `admin_id` int(11) not null AUTO_INCREMENT, AUTO_INCREMENT=5;