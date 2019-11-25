-- COPY THE CODE AND PASTE IT ON SQL TAB

CREATE DATABASE onlineproject;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET TIME_ZONE = "+00:00";

-- table structure for the `admin`

CREATE TABLE `admin` (    -- it contains only admin credentials
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

CREATE TABLE `answer` (     -- contains all the correct ans according to ques.
  `qid` text NOT NULL, -- qid = question id
  `ansid` text NOT NULL -- ansid = answer id
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insert data for table `answer`


-- ---------------------------------------------------------

-- table structure for table `options`

CREATE TABLE `options` (   -- contains all the options to print in each question
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- inserting data for table 'option'



-- ----------------------------------------------------------------

-- table structure for table 'questions'

CREATE TABLE `questions` (   -- contains all the ques of diff topic
  `eid` text NOT NULL,    -- who is the creator
  `qid` text not null,    -- ques id
  `qns` text not null,    -- questions
  `choice` int(10) not null,  -- there are 4 options 
  `sn` int(11) not null   -- denotes the serial no. of ques
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- inserting data into table 'questions'


-- ----------------------------------------------------------------------

-- table structure for table `exam`

CREATE TABLE `exam` (   -- contains all the exam topic wise
  `eid` text not null,  -- creator of that topic
  `title` text not null,  -- topic name
  `right` int(11) not null, -- marks of each ques
  `wrong` int(11) not null,   -- negative marks
  `total` int(11) not null,   -- total no of question
  `time` bigint(20) not null, -- total time of each topic
  `date` timestamp not null DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- inserting data for table `exam`



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
 


-- ----------------------------------------------------------------------

-- indexes for table 'admin'

ALTER TABLE `admin` ADD PRIMARY KEY (`admin_id`);

-- indexes for table 'user'

ALTER TABLE `user` ADD PRIMARY KEY (`email`);

ALTER TABLE `admin` MODIFY `admin_id` int(11) not null AUTO_INCREMENT, AUTO_INCREMENT=5;