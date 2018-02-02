-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2015 at 11:30 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JAVASCRIPT'),
(4, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `mst_admin`
--

CREATE TABLE IF NOT EXISTS `mst_admin` (
  `loginid` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_admin`
--

INSERT INTO `mst_admin` (`loginid`, `pass`) VALUES
('phptpoint', 'phptpoint');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_name` text NOT NULL,
  `answer1` varchar(250) NOT NULL,
  `answer2` varchar(250) NOT NULL,
  `answer3` varchar(250) NOT NULL,
  `answer4` varchar(250) NOT NULL,
  `answer5` varchar(250) NOT NULL,
  `answer6` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_name`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `answer6`, `answer`, `category_id`) VALUES
(1, 'What does HTML stand for ?	 ', 'Hyper Text  Markup Language', 'Hyperlinks and Text Markup Language', 'Home Tool Markup Language', 'Hyper Texk Pre  Markup Language', '', '', '1', 1),
(2, 'Who defines the rules of  Web standards ?', 'Microsoft', 'The World Wide Web Consortium', 'Google ', 'Mozila', '', '', '2', 1),
(3, 'Choose the correct HTML tag for the most important Heading', '&lt;heading&gt;', '&lt;h1&gt;', '&lt;head&gt;', '&lt;h6&gt;', '', '', '2', 1),
(4, 'The correct HTML tag for  line break ?\r\n	 ', '&lt;br&gt;', '&lt;hr&gt;', '&lt;break&gt;', '&lt;p&gt;', '', '', '1', 1),
(5, 'How to add background color in HTML ?	 ', '&lt;background>yellow&lt;/background&gt;', '&lt;body style="background-color:yellow;"&gt;', '&lt;body background="yellow"&gt;', '&lt;body style="background:yellow;"&gt;', '', '', '3', 1),
(6, 'CSS stand for	What ? ', 'Colorful Style Sheets', 'Cascading Style Sheets', 'Computer Style Sheets', 'Creative Style Sheets', '', '', '2', 2),
(7, 'What is the correct tag to call external CSS ? ', '&lt;link rel="stylesheet" type="text/css" href="mystyle.css"&gt;', '&lt;style src="mystyle.css"&gt;', '&lt;stylesheet&gt;mystyle.css&lt;/stylesheet&gt;', '&lt;style&gt;mystyle.css&lt;/style&gt;', '', '', '1', 2),
(8, 'Where in an HTML document is the correct place to refer to an external style sheet?\r\n	 ', 'At the end of the document', 'At the top of the document', 'In the &lt;head&gt; section', 'In the &lt;body&gt; section', '', '', '3', 2),
(9, 'Which HTML tag is used to define an internal style sheet?	 ', '&lt;script&gt;', '&lt;style&gt;', '&lt;css&gt;', '&lt;link&gt;', '', '', '2', 2),
(10, 'Which HTML attribute is used to define inline styles?	 ', 'font', 'class', 'styles', 'style', '', '', '4', 2),
(11, 'Inside which HTML element do we put the JavaScript?	 ', '&lt;script&gt;', '&lt;javascript&gt;', '&lt;js&gt;', '&lt;scripting&gt;', '', '', '1', 3),
(12, 'Where is the correct place to insert a JavaScript?	 ', 'Both the &lt;head&gt; section and the &lt;body&gt; section are correct', 'The &lt;body&gt; section', 'The &lt;head&gt; section', 'None of above', '', '', '1', 3),
(13, 'What is the correct syntax for calling  an external script called "myscript.js"?	 ', '&lt;script href="myscript.js"&gt;', '&lt;script src="myscript.js"&gt;', '&lt;script name="myscript.js"&gt;', '&lt;script type="myscript.js"&gt;', '', '', '2', 3),
(16, 'How do you write "Hello World" in an alert box?	 ', 'msg("Hello World")', 'alert("Hello World")', 'msgBox("Hello World")', 'alertBox("Hello World")', '', '', '2', 3),
(17, 'What does PHP stand for?	 ', 'Personal Hypertext Processor', 'Private Home Page', 'PHP: Hypertext Preprocessor', 'Personal Home Page', '', '', '3', 4),
(18, 'PHP server scripts are surrounded by delimiters, which?		 ', '&lt;script&gt;...&lt;/script&gt;', '&lt;&&gt;...&lt;/&&gt;', '&lt;?php&gt;...&lt;/?&gt;', '&lt;?php...?&gt;', '', '', '4', 4),
(19, 'How do you write "Hello World" in PHP ? ', 'Document.Write("Hello World");', '"Hello World";', 'echo "Hello World";', 'alertBox("Hello World");', '', '', '3', 4),
(20, 'All variables in PHP start with which symbol ?	 ', '$', '&', '|', '%', '', '', '1', 4),
(21, 'What is the correct way to end a PHP statement ?	 ', '.', '/', ';', '&lt;/php&gt;', '', '', '3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `unanswered` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `scores`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `social_id` varchar(100) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `uuid` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `login` (`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `social_id`, `picture`, `created`, `uuid`) VALUES
(5, 'Kashif', 'ahmedwebtech112@gmail.com', 'd31237492a5b0b9a4b21494de800a400', '', '', '2015-08-18 11:22:58', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
