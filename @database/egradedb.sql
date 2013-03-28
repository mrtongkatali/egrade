-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2013 at 06:00 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `egradedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv_courses`
--

DROP TABLE IF EXISTS `cv_courses`;
CREATE TABLE IF NOT EXISTS `cv_courses` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL DEFAULT '1',
  `college_id` int(11) NOT NULL DEFAULT '1',
  `course_code` varchar(30) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `units` varchar(10) NOT NULL,
  `has_laboratory` varchar(10) NOT NULL DEFAULT 'No' COMMENT 'Yes / No',
  `is_active` varchar(10) NOT NULL DEFAULT 'Yes' COMMENT 'Yes / No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cv_courses`
--

INSERT INTO `cv_courses` (`id`, `school_id`, `college_id`, `course_code`, `title`, `description`, `units`, `has_laboratory`, `is_active`) VALUES
(1, 1, 1, 'CS101P-1', 'Logic Formulation and Algorithm I', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3.0', 'No', 'Yes'),
(2, 1, 1, 'CS101P-2', 'Logic Formulation and Algorithm II', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3.0', 'No', 'Yes'),
(3, 1, 1, 'ENG001', 'English for the workplace 1', 'This is a professional english class', '3.0', 'No', 'Yes'),
(4, 1, 1, 'MATH021', 'Differential Calculus', 'This is a math subject', '3.0', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `cv_course_designation`
--

DROP TABLE IF EXISTS `cv_course_designation`;
CREATE TABLE IF NOT EXISTS `cv_course_designation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL DEFAULT '1',
  `college_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `program_code` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `section` varchar(20) NOT NULL,
  `max_size` varchar(2) NOT NULL,
  `professor_id` int(11) NOT NULL COMMENT 'main_teacher',
  `professor_name` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `schedule` varchar(50) NOT NULL COMMENT 'mwf  5-30 etc',
  `is_lock` varchar(5) NOT NULL DEFAULT 'No' COMMENT 'Yes / No',
  `submission_date` varchar(10) NOT NULL,
  `is_active` varchar(5) NOT NULL COMMENT 'Yes / No',
  `is_archive` varchar(5) NOT NULL COMMENT 'Yes / No',
  `date_added` varchar(10) NOT NULL,
  `added_by` int(11) NOT NULL COMMENT 'member_id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cv_course_designation`
--

INSERT INTO `cv_course_designation` (`id`, `school_id`, `college_id`, `program_id`, `program_code`, `course_id`, `course_code`, `course_title`, `school_year`, `semester`, `section`, `max_size`, `professor_id`, `professor_name`, `remarks`, `schedule`, `is_lock`, `submission_date`, `is_active`, `is_archive`, `date_added`, `added_by`) VALUES
(1, 1, 1, 1, 'BS IT', 1, 'CS101P-1', 'Logic Formulation and Algorithm I', '2013 - 2014', '1', 'a51', '', 13, 'Elenita Red', 'This is a test remarks', '', 'No', '2013-01-09', 'Yes', 'No', '', 1),
(2, 1, 1, 1, 'BS IT', 1, 'CS101P-1', 'Logic Formulation and Algorithm I', '2013 - 2014', '2', 'a52', '', 14, 'Jennifer Contreras', 'Tse', '', 'No', '2013-01-31', 'Yes', 'No', '', 1),
(4, 1, 1, 1, 'BS IT', 2, 'CS101P-2', 'Logic Formulation and Algorithm II', '2013 - 2014', '1', 'a51', '', 13, 'Elenita Red', 'test', '', 'No', '2013-01-16', 'Yes', 'No', '', 1),
(5, 1, 1, 2, 'BS CS', 2, 'CS101P-2', 'Logic Formulation and Algorithm II', '2013 - 2014', '1', 'a52', '', 13, 'Elenita Red', '', '', 'No', '2013-02-20', 'Yes', 'No', '', 1),
(8, 1, 1, 1, 'BS IT', 3, 'ENG001', 'English for the workplace 1', '2013 - 2014', '1', 'a51', '', 13, 'Elenita Red', 'Test', '', 'No', '2013-02-14', 'Yes', 'No', '', 1),
(10, 1, 1, 1, 'BS IT', 3, 'ENG001', 'English for the workplace 1', '2013 - 2014', '1', 'b45', '', 14, 'Jennifer Contreras', 'Test', '', 'No', '2013-02-26', 'Yes', 'No', '2013-02-16', 1),
(11, 1, 1, 1, 'BS IT', 4, 'MATH021', 'Differential Calculus', '2013 - 2014', '2', 'a56', '', 17, 'Dennis Tablante', 'Test', '', '', '2013-02-14', 'Yes', 'No', '2013-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cv_course_enrollees`
--

DROP TABLE IF EXISTS `cv_course_enrollees`;
CREATE TABLE IF NOT EXISTS `cv_course_enrollees` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL DEFAULT '1',
  `course_designation_id` bigint(15) NOT NULL,
  `program_id` bigint(15) NOT NULL,
  `program_code` varchar(20) NOT NULL,
  `student_id` bigint(15) NOT NULL,
  `student_code` varchar(30) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `course_id` bigint(15) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `professor_id` bigint(15) NOT NULL,
  `professor_name` varchar(50) NOT NULL,
  `pre_final_grade` varchar(10) NOT NULL,
  `final_exam_grade` varchar(10) NOT NULL,
  `final_grade` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `is_currently_enrolled` varchar(5) NOT NULL DEFAULT 'Yes' COMMENT 'Yes / No',
  `is_passed` varchar(10) NOT NULL COMMENT 'Passed, Dropped, Failed, Incomplete, Absent, Continuing',
  `enrolled_by` bigint(15) NOT NULL,
  `date_added` datetime NOT NULL,
  `is_archive` varchar(5) NOT NULL COMMENT 'Yes / No',
  PRIMARY KEY (`id`),
  KEY `enrollees` (`school_id`,`course_designation_id`,`program_code`,`student_id`,`student_code`,`professor_name`,`pre_final_grade`,`final_exam_grade`,`final_grade`,`is_currently_enrolled`,`is_archive`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `cv_course_enrollees`
--

INSERT INTO `cv_course_enrollees` (`id`, `school_id`, `course_designation_id`, `program_id`, `program_code`, `student_id`, `student_code`, `student_name`, `course_id`, `course_code`, `professor_id`, `professor_name`, `pre_final_grade`, `final_exam_grade`, `final_grade`, `remarks`, `is_currently_enrolled`, `is_passed`, `enrolled_by`, `date_added`, `is_archive`) VALUES
(1, 1, 1, 1, 'BS IT', 1, '2008180031', 'Leo Diaz', 1, 'CS101P-1', 13, 'Elenita Red', '5', '3', '3', '', 'Yes', 'Passed', 1, '2013-02-13 11:06:18', 'No'),
(5, 1, 1, 1, 'BS IT', 10, '2012120002', 'Maria Olivia Law', 1, 'CS101P-1', 13, 'Elenita Red', '', '', '', '', 'Yes', 'Failed', 1, '2013-02-13 11:11:37', 'No'),
(6, 1, 8, 1, 'BS IT', 15, '2013020015', 'Alvin Paderes', 3, 'ENG001', 13, 'Elenita Red', '', '', '', '', 'Yes', 'Failed', 1, '2013-02-23 12:48:04', 'No'),
(7, 1, 1, 1, 'BS IT', 15, '2013020015', 'Alvin Paderes', 1, 'CS101P-1', 13, 'Elenita Red', '', '', '', '', 'Yes', 'Failed', 1, '2013-02-23 12:48:46', 'No'),
(8, 1, 4, 1, 'BS IT', 15, '2013020015', 'Alvin Paderes', 2, 'CS101P-2', 13, 'Elenita Red', '', '', '', '', 'Yes', 'Failed', 1, '2013-02-23 12:49:02', 'No'),
(16, 1, 11, 1, 'BS IT', 15, '2013020015', 'Alvin Paderes', 4, 'MATH021', 17, 'Dennis Tablante', '', '', '', '', 'Yes', 'Failed', 1, '2013-02-28 03:49:41', 'No'),
(17, 1, 11, 1, 'BS IT', 10, '2012120002', 'Maria Olivia Law', 4, 'MATH021', 17, 'Dennis Tablante', '', '', '', '', 'Yes', 'Failed', 1, '2013-02-28 03:53:29', 'No'),
(18, 1, 11, 1, 'BS IT', 1, '2008180031', 'Leo Diaz', 4, 'MATH021', 17, 'Dennis Tablante', '', '', '', '', 'Yes', 'Failed', 1, '2013-02-28 03:53:50', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `cv_login`
--

DROP TABLE IF EXISTS `cv_login`;
CREATE TABLE IF NOT EXISTS `cv_login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `pass_hash` text NOT NULL,
  `account_type` varchar(10) NOT NULL COMMENT 'Admin / Dean / Registrar / Professor / Student',
  `modules` varchar(100) NOT NULL COMMENT 'serialize',
  `is_active` varchar(10) NOT NULL COMMENT 'Yes / No',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cv_login`
--

INSERT INTO `cv_login` (`id`, `member_id`, `full_name`, `username`, `email_address`, `pass_hash`, `account_type`, `modules`, `is_active`, `date_added`) VALUES
(1, 1, 'Leo Diaz', 'mrtongkatali', 'leoangelo.diaz@gmail.com', '0f7e35a30b8c44ce4cf9c57aa4a2a39f7e077c3a8fd089c20c76bc1d79269d30725e4cb4cd8fd9d745b06f60b186734568e83b8dd2ac25a26782788b63dca506', 'Admin', '', 'Yes', '2013-02-17 16:23:04'),
(6, 10, 'Maria Olivia Law', 'molaw0213', '', '0f7e35a30b8c44ce4cf9c57aa4a2a39f7e077c3a8fd089c20c76bc1d79269d30725e4cb4cd8fd9d745b06f60b186734568e83b8dd2ac25a26782788b63dca506', 'Registrar', '', 'Yes', '2013-02-21 11:56:47'),
(5, 13, 'Elenita Red', 'erred', 'redwb@afa.com', '0f7e35a30b8c44ce4cf9c57aa4a2a39f7e077c3a8fd089c20c76bc1d79269d30725e4cb4cd8fd9d745b06f60b186734568e83b8dd2ac25a26782788b63dca506', 'Professor', '', 'Yes', '2013-02-18 20:30:10'),
(7, 15, 'Alvin Paderes', 'alvin0915', '', '0f7e35a30b8c44ce4cf9c57aa4a2a39f7e077c3a8fd089c20c76bc1d79269d30725e4cb4cd8fd9d745b06f60b186734568e83b8dd2ac25a26782788b63dca506', 'Student', '', 'Yes', '2013-02-28 13:21:11'),
(8, 17, 'Dennis Tablante', 'dht', '', '0f7e35a30b8c44ce4cf9c57aa4a2a39f7e077c3a8fd089c20c76bc1d79269d30725e4cb4cd8fd9d745b06f60b186734568e83b8dd2ac25a26782788b63dca506', 'Professor', '', 'Yes', '2013-02-28 13:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `cv_members`
--

DROP TABLE IF EXISTS `cv_members`;
CREATE TABLE IF NOT EXISTS `cv_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL DEFAULT '1',
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `fullname` varchar(90) NOT NULL,
  `gender` varchar(10) NOT NULL COMMENT 'Male / Female',
  `birthdate` varchar(10) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `mobile_number` varchar(30) NOT NULL,
  `student_employee_code` varchar(30) NOT NULL COMMENT 'Student Code / Employee Code',
  `program_id` int(11) NOT NULL,
  `program_code` varchar(30) NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `college_id` int(11) NOT NULL COMMENT 'For Professors',
  `is_enrolled` varchar(5) NOT NULL COMMENT 'Yes / No',
  `is_active` varchar(5) NOT NULL COMMENT 'Yes / No',
  `member_type` varchar(20) NOT NULL COMMENT 'Admin, Dean, Registrar,  Student, Professor',
  `display_image` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `default_condition` (`school_id`,`is_enrolled`,`is_active`),
  KEY `basic_info` (`firstname`,`lastname`,`gender`,`birthdate`,`email_address`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cv_members`
--

INSERT INTO `cv_members` (`id`, `school_id`, `firstname`, `middlename`, `lastname`, `fullname`, `gender`, `birthdate`, `email_address`, `address`, `phone_number`, `mobile_number`, `student_employee_code`, `program_id`, `program_code`, `year_level`, `semester`, `college_id`, `is_enrolled`, `is_active`, `member_type`, `display_image`, `date_added`) VALUES
(1, 1, 'Leo', 'Lariba', 'Diaz', 'Leo Diaz', 'Female', '1991-08-01', 'leoangelo.diaz@gmail.com', 'Cabuyao, Laguna', '', '639231798118', '2008180031', 1, 'BS IT', '4', '', 0, 'Yes', 'Yes', 'Student', '', '2012-12-03 00:00:00'),
(10, 1, 'Maria Olivia', 'Catacutan', 'Law', 'Maria Olivia Law', 'Male', '1987-12-17', 'amethyst.livlaw@gmail.com', 'Sala, Cabuyao, Laguna', '123', '123', '2012120002', 1, 'BS IT', '4', '', 0, 'Yes', 'Yes', 'Student', '', '2012-12-08 16:06:03'),
(13, 1, 'Elenita', 'test', 'Red', 'Elenita Red', 'Male', '1987-12-15', 'redwb@afa.com', 'sadfdsaf', '123', '123', '2012120011', 2, 'BS CS', '5', '', 1, 'Yes', 'Yes', 'Professor', '', '2012-12-08 17:09:56'),
(14, 1, 'Jennifer', 'Coloma', 'Contreras', 'Jennifer Contreras', 'Female', '1987-12-17', 'jeniffer@benghazi,com', 'Benghazi, Libya', '123', '123', '201212014', 0, '', '', '', 1, '', 'Yes', 'Professor', '', '2012-12-18 22:32:48'),
(15, 1, 'Alvin', 'Aliiparo', 'Paderes', 'Alvin Paderes', 'Male', '1987-02-03', 'alvin.paderes@yahoo.com', 'Sala, Cabuyao, Laguna', '123', '123', '2013020015', 1, 'BS IT', '1', '', 0, 'Yes', 'Yes', 'Student', '', '2013-02-23 11:56:35'),
(16, 1, 'test', 'test', 'test', 'test test', 'Male', '1987-02-12', 'test@test.com', '', '', '', '2013020016', 1, 'BS IT', '1', '', 0, 'Yes', 'No', 'Student', '', '2013-02-26 12:02:47'),
(17, 1, 'Dennis', 'H', 'Tablante', 'Dennis Tablante', 'Male', '1987-02-11', 'dht@gmail.com', 'San Pedro, Laguna', '123', '123', '201302017', 0, '', '', '', 1, '', 'Yes', 'Professor', '', '2013-02-28 12:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `cv_settings_college`
--

DROP TABLE IF EXISTS `cv_settings_college`;
CREATE TABLE IF NOT EXISTS `cv_settings_college` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL COMMENT 'dean_id',
  `college_name` varchar(50) NOT NULL,
  `college_code` varchar(10) NOT NULL,
  `is_active` varchar(5) NOT NULL DEFAULT 'Yes' COMMENT 'Yes / No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cv_settings_college`
--

INSERT INTO `cv_settings_college` (`id`, `school_id`, `member_id`, `college_name`, `college_code`, `is_active`) VALUES
(1, 1, 17, 'College of Information Technology', 'CIT', 'Yes'),
(2, 1, 13, 'College of Nursing', 'CN', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `cv_settings_curriculum`
--

DROP TABLE IF EXISTS `cv_settings_curriculum`;
CREATE TABLE IF NOT EXISTS `cv_settings_curriculum` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL DEFAULT '1',
  `program_id` int(20) NOT NULL,
  `course_id` int(20) NOT NULL,
  `batch_year` varchar(20) NOT NULL,
  `year_level` varchar(10) NOT NULL COMMENT '1,2,3,4,5',
  `semester` varchar(10) NOT NULL COMMENT '1,2,3',
  `is_active` varchar(5) NOT NULL DEFAULT 'Yes',
  `is_archive` varchar(5) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`),
  KEY `default_query` (`school_id`,`program_id`,`course_id`,`batch_year`,`year_level`,`semester`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cv_settings_curriculum`
--

INSERT INTO `cv_settings_curriculum` (`id`, `school_id`, `program_id`, `course_id`, `batch_year`, `year_level`, `semester`, `is_active`, `is_archive`) VALUES
(1, 1, 1, 1, '2013 - 2014', '1', '1', 'Yes', 'No'),
(2, 1, 1, 2, '2013 - 2014', '1', '1', 'Yes', 'No'),
(3, 1, 2, 1, '2013 - 2014', '1', '1', 'Yes', 'No'),
(4, 1, 2, 2, '2013 - 2014', '1', '2', 'Yes', 'No'),
(6, 1, 1, 3, '2013 - 2014', '1', '1', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `cv_settings_program`
--

DROP TABLE IF EXISTS `cv_settings_program`;
CREATE TABLE IF NOT EXISTS `cv_settings_program` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL DEFAULT '1',
  `college_id` int(11) NOT NULL DEFAULT '1',
  `program_code` varchar(20) NOT NULL COMMENT 'BS IT, BS CS',
  `program_name` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `degree_type` varchar(20) NOT NULL COMMENT '2-year, Bachelor, Masters, Doctoral',
  `is_offered` varchar(5) NOT NULL COMMENT 'Yes / No',
  `is_active` varchar(5) NOT NULL COMMENT 'Yes / No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cv_settings_program`
--

INSERT INTO `cv_settings_program` (`id`, `school_id`, `college_id`, `program_code`, `program_name`, `title`, `description`, `degree_type`, `is_offered`, `is_active`) VALUES
(1, 1, 1, 'BS IT', 'Inforrmation Technology', 'Bachelor of Science in Information Technology', 'Certificate programs and associate''s degrees are designed for students who wish to obtain training in a specific area, such as nursing or mechanics, without obtaining a 4-year degree. Associate''s degrees are also offered for students who wish to begin their education at a community college in order to save costs. Students in transfer-oriented associate''s degree programs often obtain credits for basic courses such as English or Mathematics, then transfer to a 4-year institution to complete courses in their majors, or areas of academic concentration.', 'Bachelor', 'Yes', 'Yes'),
(2, 1, 1, 'BS CS', 'Computer  Science', 'Bachelor of Science in Computer Science', 'Bachelor''s degrees are 4-year degrees offered by liberal arts colleges, research universities, specialty educational institutions or technical schools. The bachelor''s degree is the degree which people refer to most often when they mention college degrees. Typically, a bachelor''s degree requires basic or foundation courses in the first 2 years of study, with the second 2 years of coursework largely devoted to the student''s chosen major.\n\n', 'Bachelor', 'Yes', 'Yes'),
(4, 1, 1, 'test123', 'test', 'test', 'test', 'Bachelor', 'Yes', 'No');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
