-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2024 at 06:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_storev1`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city` enum('EGYPT') NOT NULL DEFAULT 'EGYPT',
  `state` varchar(70) NOT NULL,
  `street` varchar(70) NOT NULL,
  `not` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatead_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(3, 'mohamed Abdelhady', 'qweqwe2752002@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '', '2024-09-20 00:14:29', '2024-09-20 00:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Zed A. Shaw', '01.jpg', 'Zaid A. Shaw is a software developer known for his programming tutorial series \"Learn Hard Programming\", as well as his development of \"Mungrel\". He is also the author of several fanan programming books.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(2, 'Marijn Haverbeke', '02.jpg', 'Marijn Haverbeek is a Dutch programmer and technical writer known for his influence on the development of JavaScript. He is the author of Eloquent JavaScript and has several open source projects on GitHub, including CodeMirror, a web-based code editor.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(3, 'Robert C. Martin', '03.jpg', 'Robert S. Martin, also known as \"Uncle Abdul\", is an American software engineer, author, and trainer, born on December 5, 1952. Martin is a leading expert in the field of programming, and is the author of Clean Code: A Handbook of Agile Software Craftsmanship, in which he presents important principles of software development. Martin also teaches programming skills such as test-driven software development (TDD) and code refactoring.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(4, 'Andrew Hunt', '04.jpg', 'Andrew Hunt is a well-known figure in several fields, one of which is film directing, having directed The Infernal Machine (2022) and written and directed other films such as Frost Bite and Level. He is also known for his contributions to software development through his writing, including co-authoring The Pragmatic Programmer.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(5, 'Thomas H. Cormen', '05.jpg', 'Thomas H. Cormen is an American computer scientist and politician, best known as the co-author, with Charles Lesser, of Introduction to Algorithms. He is Professor Emeritus of Computer Science at Dartmouth College.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(6, 'Douglas Crockford', '06.jpg', 'Douglas Crockford is an American programmer known for his contribution to the development of the JavaScript programming language. He also created the standards for the JSON data format.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(7, 'Kathy Sierra', '07.jpg', 'Kathy Sierra is an American programming instructor and game developer, born in June 1957. She was a distinguished Java instructor at Sun Microsystems, where she taught Sun instructors how to teach the latest Java technologies. She also has a background in developing educational games and software for the film industry, and she also created the first interaction design courses at UCLA.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(8, 'Eric Matthes', '08.jpg', 'Eric Mathis is the author of the popular book \"Python Crash Course,\" which is a comprehensive introduction to learning the Python programming language. The book is divided into two parts: the first part focuses on the basics of Python, while the second part includes a series of practical projects.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(9, 'Joshua Bloch', '09.jpg', 'Joshua Bloch is an American software engineer and technical author born on August 28, 1961. He led the design and implementation of several Java platforms. He is also known as the author of \"Effective Java\", in which he presents complex technical concepts in a fun way.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(10, 'Brian W. Kernighan', '10.jpg', 'Brian W. Kernehan is a Canadian computer scientist, known for his work at Bell Laboratories and his contributions to the development of the Unix operating system. He received his Ph.D. in electrical engineering from Princeton University in 1969, and joined the faculty there in 2000.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(11, 'Kyle Simpson', '11.jpg', 'Kyle Simpson is a web-oriented software engineer, best known for his widely acclaimed series “You Don’t Know JS.” He also has a huge teaching experience with his online courses viewed over a million hours. He is known for his ability to ask the right questions and his belief in using only the necessary tools to get the job done.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(12, 'Erich Gamma', '12.jpg', 'Eric Gamma is a Swiss computer scientist and one of the four authors of the book \"Design Patterns: Elements of Reusable Object-Oriented Software\". He has also worked on software tools such as JUnit and Eclipse, and joined Microsoft in 2011 as a distinguished engineer.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(13, 'Aditya Bhargava', '13.jpg', 'Aditya Bhargava is a full-stack software engineer with extensive programming experience, 500+ LinkedIn connections, and a personal blog. He has a passion for drawing and programming, and started his programming career building video games using Basic and ActionScript.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(14, 'Gayle Laakmann McDowell', '.jpg', 'Gayle Lachman McDowell is an American software engineer and author. She worked at Google where she was part of the hiring committee and interviewed over 120 candidates. She is also known for her book \"Cracking the Coding Interview\" which focuses on developing programming careers.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(15, 'Luciano Ramalho', '15.jpg', 'Lucien Ramhalo is the author of Fluent Python and a member of the global Learning and Development team at ThoughtWorks. He joined as a developer in 2015 after the release of his book, which became a global success and was translated into seven languages.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(16, 'Herbert Schildt', '16.jpg', 'Herbert Schildt is a prominent American author on computing, as well as a programmer and musician. He has written books on programming languages ​​for more than three decades, and his books have sold millions of copies worldwide.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(17, 'Donald Knuth', '17.jpg', 'Donald Ervin Knuth is an American mathematical computer scientist and professor emeritus at Stanford University. He was born on January 10, 1938 in Milwaukee, Wisconsin. He is best known for his work in programming and computational theory, and is the author of the book series The Art of Computer Programming.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(18, 'Martin Fowler', '18.jpg', 'Martin Fowler is a British software developer, author and international speaker specialising in software development, particularly in enterprise applications. He works for Thoughtworks and has written extensively on models and practices that facilitate the building of useful software.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(19, 'Steve Klabnik', '19.jpg', 'Steve Klapnik is a developer known for his work on the Rust and Ruby on Rails programming languages. He is also known for his involvement in the programming community through blogging and technical writing.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(20, 'Scott Meyers', '20.jpg', 'Scott Myers is an American software author and consultant, specializing in the C++ programming language. Born on April 9, 1959, he has devoted over 25 years of his life to the language. He is best known for authoring four popular books on C++, as well as two sets of book-like training materials.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(21, 'Wes McKinney', '21.jpg', 'Wes McKinney is an American software developer and entrepreneur, best known as the creator of the Pandas open data library. He has also been involved in other projects such as Apache Arrow and Ibis. Wes McKinney is a prominent figure in the data space and also serves on the board of directors of Voltron Data.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(22, 'Stanley B. Lippman', '22.jpg', 'Stanley B. Lippman was an American computer scientist and author, best known as the author of the book \"C++ Primer\", now in its fifth edition. He died on July 31, 2022.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(23, 'Craig Walls', '23.jpg', 'Craig Walls is a senior engineer at VMware, the Spring Social project lead, and the author of popular books such as \"Spring in Action\" and \"Spring Boot in Action.\" He is known for his passion for the Spring framework and sharing his knowledge in software development through writing and speaking at conferences.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(24, 'Ian Goodfellow', '24.jpg', 'Jan J. Goodfellow is an American computer scientist and engineer, born in 1987, who is particularly known for his work in artificial neural networks and deep learning. Goodfellow also has expertise in machine learning and worked at DeepMind.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(25, 'Steve McConnell', '25.jpg', 'Stephen C. McConnell is a software engineering author whose most notable books include Code Complete, Rapid Development, and Software Estimation. His books are considered some of the best practical guides to programming and help developers improve their skills.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(26, 'Harold Abelson', '26.jpg', 'Harold Abelson is an American mathematician and computer scientist, born on April 26, 1947. He is a professor of computer science and engineering at the Massachusetts Institute of Technology (MIT) and is known for his efforts to make information technology more accessible to people, especially children.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(27, 'Scott Chacon', '27.jpg', 'Scott Chacon is a former co-founder of GitHub, and now co-founder of GitButler, a new version control tool, based in Berlin.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(28, 'Alan Beaulieu', '28.jpg', 'Alan Pew Lee is President and Director of ITR Economics, where he has provided rigorous economic analysis and workshops in a variety of countries since 1990. He is known as a rigorous and straightforward economist with a strong reputation for providing research-based insights into the economy and the future.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(29, 'Robert Whitaker', '29.jpg', 'Robert Whitaker is the author of four books: Mad in America, The Mapmaker\'s Wife, On the Laps of Gods, and Anatomy of an Epidemic. Please check important information for accuracy.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(30, 'Jeffrey E. F. Friedl', '30.jpg', 'Jeffrey E. F. Friedl is the author of Mastering Regular Expressions, which helps you master the use of regular expressions. Friedl also worked on kernel development for Omron in Kyoto, Japan, before moving to Silicon Valley in 1997.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(31, 'Daniel J. Barrett', '31.jpg', 'Daniel J. Barrett is a writer, software engineer, and musician who has written several technical books, including The Linux Pocket Guide and Powerful Linux from the Command Line, published by O\'Reilly. He has been active in the Internet technology field since 1985.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(32, 'Dave Thomas', '32.jpg', 'Dave Thomas is the author of Elixir Programming, a comprehensive guide to Elixir for experienced programmers. Updated to cover features from version 1.6 and beyond, the book shows how to use effective functional functions.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(33, 'Martin Kleppmann', '33.jpg', 'Martin Klepman is an Associate Professor in the Department of Computer Science and Technology at the University of Cambridge, working on native software first and security protocols. He also speaks on topics related to databases and operations.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(34, 'Scott Oaks', '34.jpg', 'Scott Oakes is a Java Technologist at Sun Microsystems, where he has worked since 1987. During his time there, he has specialized in many different technologies.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(35, 'Michael Kerrisk', '35.jpg', 'Michael Keriske is a technical author and programmer, and since 2004 has been responsible for the Linux man-pages project, succeeding Andreas Breuer. He also works as a freelance trainer and consultant, and has been using and programming on UNIX systems since 1987.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(36, 'Dan Bader', '36.jpg', 'Dan Bader is the owner and editor of Real Python, and lead developer at the realpython.com learning platform. He has over 20 years of programming experience and is the author of the best-selling book, Python Tricks. Dan helps Python developers improve their skills through his tutorials, videos, and exercises.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(37, 'Jon Bentley', '37.jpg', 'John Bentley is a name associated with two well-known people. The first is American computer scientist John Lewis Bentley, known for his contributions to programming and algorithms. The second is a British journalist and television presenter best known for his appearance on Channel 5\'s \"The Gadget Show\". It is advisable to check the relevant information to ensure the context in which you are looking for this name.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(38, 'Frederick P. Brooks Jr.', '38.jpg', 'Frederick B. Brooks, Jr. (April 19, 1931 – November 17, 2022) was an American computer engineer and computer scientist who was a key designer of the computers that contributed to IBM\'s dominance for decades. He also wrote a book on software engineering that became an important reference in the field.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(39, 'Mohammed Emad Ghabayen', '39.jpg', 'Communications Engineer and Application Developer, holds several academic certificates, interested in the field of networks and servers in addition to developing Android applications. Recently specialized in cloud computing.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(40, 'Lisa Tagliferri', '40.jpg', 'Lisa Tagliferri is a programming and computer science expert, known for being a writer and contributor to technical education, especially in learning programming languages ​​like Python. Lisa used to work as a curriculum manager at educational platforms like DigitalOcean, where she developed and prepared educational materials related to programming and cloud computing technologies.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(41, 'Alan Gauld', '41.jpg', 'Alan Gauld is a well-known writer and technical expert, best known for his work in programming education, especially in Python. He has authored a book titled “Learn to Program Using Python,” which is a popular guide for beginners who want to learn to program using Python. The book focuses on the fundamentals of programming and explains concepts in a way that is easy for beginners to understand.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(42, 'Mike Banahan', '42.jpg', 'Mike Banahan is a major figure in the history of computer programming, and was particularly involved in the development of the C programming language. He co-authored \"The C Book\" Banahan\'s contributions were influential in helping programmers understand the intricacies of the C language, which has remained a cornerstone of systems programming, embedded systems, and operating system development.', '2024-09-19 10:23:16', '2024-09-19 10:23:27'),
(43, 'Mark Pilgrim', '43.jpg', 'Mark Pilgrim is a software developer, writer, and open source software advocate. He is known for his influential work promoting open source software and his technical writings, particularly his books and tutorials on programming.', '2024-09-19 10:23:16', '2024-09-19 10:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `offer` tinyint(20) DEFAULT NULL,
  `code` varchar(12) NOT NULL,
  `number_of_pages` smallint(6) NOT NULL,
  `recommended` int(11) NOT NULL,
  `lang` enum('en','ar') NOT NULL,
  `top_selling` int(11) NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `image`, `description`, `price`, `offer`, `code`, `number_of_pages`, `recommended`, `lang`, `top_selling`, `author_id`, `category_id`, `publisher_id`, `created_at`, `updated_at`) VALUES
(1, 'Learn Python the Hard Way', '01.jpg', 'An excellent book to start learning Python programming from scratch.', 29.99, 0, 'PY001', 320, 0, 'en', 9, 1, 1, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(2, 'Eloquent JavaScript', '02.jpg', 'A modern introduction to JavaScript programming.', 25.50, 10, 'JS001', 450, 0, 'en', 8, 2, 2, 2, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(3, 'Clean Code', '03.jpg', 'A Handbook of Agile Software Craftsmanship.', 34.99, 0, 'CC001', 464, 0, 'en', 5, 3, 3, 3, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(4, 'The Pragmatic Programmer', '04.jpg', 'Your Journey to Mastery.', 40.00, 0, 'PP001', 352, 0, 'en', 6, 4, 3, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(5, 'Introduction to Algorithms', '05.jpg', 'The comprehensive guide to algorithms.', 99.99, 0, 'ALGO001', 1312, 0, 'en', 10, 5, 4, 4, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(6, 'JavaScript: The Good Parts', '06.jpg', 'Unearthing the excellence in JavaScript.', 22.50, 10, 'JS002', 176, 0, 'en', 9, 6, 2, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(7, 'Head First Java', '07.jpg', 'A brain-friendly guide to Java programming.', 45.00, 0, 'JAVA001', 720, 0, 'en', 5, 7, 5, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(8, 'Python Crash Course', '08.jpg', 'A Hands-On, Project-Based Introduction to Programming.', 39.99, 0, 'PY002', 544, 0, 'en', 5, 8, 1, 2, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(9, 'Effective Java', '09.jpg', 'Best practices for the Java platform.', 49.99, 0, 'JAVA002', 412, 0, 'en', 5, 9, 5, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(10, 'C Programming Language', '10.jpg', 'The classic book on C programming.', 29.99, 0, 'C001', 274, 0, 'en', 5, 10, 6, 3, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(11, 'You Don’t Know JS', '11.jpg', 'A series diving deep into JavaScript.', 35.99, 0, 'JS003', 278, 0, 'en', 5, 11, 2, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(12, 'Design Patterns', '12.jpg', 'Elements of Reusable Object-Oriented Software.', 59.99, 0, 'DP001', 395, 0, 'en', 5, 12, 7, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(13, 'Grokking Algorithms', '13.jpg', 'An illustrated guide for programmers.', 39.50, 0, 'ALGO002', 256, 0, 'en', 5, 13, 4, 6, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(14, 'Cracking the Coding Interview', '14.jpg', '189 Programming Questions and Solutions.', 49.99, 0, 'CCI001', 687, 0, 'en', 5, 14, 8, 7, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(15, 'Fluent Python', '15.jpg', 'Clear, Concise, and Effective Programming.', 59.99, 10, 'PY003', 792, 0, 'en', 5, 15, 1, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(16, 'Java: The Complete Reference', '16.jpg', 'Comprehensive guide to the Java programming language.', 59.50, 0, 'JAVA003', 1280, 0, 'en', 5, 16, 5, 8, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(17, 'The Art of Computer Programming', '17.jpg', 'A comprehensive series on algorithms.', 250.00, 0, 'ACP001', 3168, 0, 'en', 5, 17, 4, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(18, 'Refactoring', '18.jpg', 'Improving the Design of Existing Code.', 65.00, 10, 'RF001', 448, 0, 'en', 5, 18, 3, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(19, 'The Rust Programming Language', '19.jpg', 'A detailed guide to Rust programming.', 40.00, 0, 'RUST001', 560, 0, 'en', 5, 19, 9, 2, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(20, 'Effective C++', '20.jpg', '55 Specific Ways to Improve Your Programs and Designs.', 45.00, 0, 'CPP001', 352, 0, 'en', 5, 20, 10, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(21, 'Python for Data Analysis', '21.jpg', 'Data wrangling with pandas, NumPy, and IPython.', 49.99, 0, 'PY004', 550, 0, 'en', 5, 21, 1, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(22, 'C++ Primer', '22.jpg', 'A comprehensive guide to C++.', 65.00, 10, 'CPP002', 976, 0, 'en', 5, 22, 10, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(23, 'Spring in Action', '23.jpg', 'A comprehensive guide to Spring Framework.', 49.99, 0, 'SPR001', 600, 0, 'en', 5, 23, 12, 6, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(24, 'Deep Learning', '24.jpg', 'A detailed guide to deep learning techniques.', 89.99, 0, 'DL001', 775, 0, 'en', 5, 24, 13, 4, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(25, 'The Clean Coder', '25.jpg', 'A Code of Conduct for Professional Programmers.', 39.99, 0, 'CC002', 256, 0, 'en', 5, 3, 3, 3, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(26, 'Code Complete', '26.jpg', 'A Practical Handbook of Software Construction.', 60.00, 0, 'CC003', 960, 0, 'en', 5, 25, 3, 9, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(27, 'Structure and Interpretation of Computer Programs', '27.jpg', 'A classic book in computer science.', 70.00, 0, 'SICP001', 657, 0, 'en', 5, 26, 16, 4, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(28, 'Pro Git', '28.jpg', 'Everything you need to know about Git.', 25.99, 0, 'GIT001', 456, 0, 'en', 5, 27, 15, 10, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(29, 'Learning SQL', '29.jpg', 'Mastering SQL basics.', 40.00, 0, 'SQL001', 396, 0, 'en', 5, 28, 14, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(30, 'The C# Player’s Guide', '30.jpg', 'A comprehensive C# guide.', 34.99, 0, 'CS001', 515, 0, 'en', 5, 29, 11, 11, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(31, 'Mastering Regular Expressions', '31.jpg', 'Powerful techniques for searching and manipulating text.', 49.99, 0, 'RE001', 515, 0, 'en', 5, 30, 17, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(32, 'Linux Pocket Guide', '32.jpg', 'Essential Commands.', 15.00, 0, 'LINUX001', 240, 0, 'en', 5, 31, 18, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(33, 'Programming Elixir', '33.jpg', 'Functional |> Concurrent |> Pragmatic |> Fun', 49.50, 0, 'ELIXIR001', 396, 0, 'en', 5, 32, 20, 12, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(34, 'Designing Data-Intensive Applications', '34.jpg', 'The Big Ideas Behind Reliable, Scalable, and Maintainable Systems.', 65.00, 0, 'DIA001', 624, 0, 'en', 5, 33, 13, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(35, 'Java Performance', '35.jpg', 'The Definitive Guide.', 59.99, 0, 'JP001', 700, 0, 'en', 5, 34, 5, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(36, 'The Linux Programming Interface', '36.jpg', 'A comprehensive guide to system programming on Linux.', 89.99, 0, 'LINUX002', 1552, 0, 'en', 5, 35, 18, 2, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(37, 'Effective Modern C++', '37.jpg', '42 Specific Ways to Improve Your Use of C++11 and C++.', 55.00, 0, 'CPP003', 336, 0, 'en', 5, 20, 10, 5, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(38, 'Python Tricks', '38.jpg', 'A Buffet of Awesome Python Features.', 29.99, 0, 'PY005', 301, 0, 'en', 5, 36, 1, 13, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(39, 'Programming Pearls', '39.jpg', 'Classic programming problem-solving.', 39.99, 0, 'PEARL001', 256, 0, 'en', 5, 37, 21, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(40, 'The Mythical Man-Month', '40.jpg', 'Essays on Software Engineering.', 35.00, 0, 'MMM001', 322, 0, 'en', 5, 38, 3, 1, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(41, 'Learn Java Programming', '41.jpg', 'A comprehensive guide to learning programming using the Java language.', 55.00, 0, 'JAVA_AR001', 266, 0, 'ar', 5, 22, 5, 14, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(42, 'Programming with Python', '42.jpg', 'A practical guide to learning programming with Python.', 45.00, 0, 'PYTHON_AR001', 418, 0, 'ar', 5, 40, 1, 15, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(43, 'Programming Basics', '43.jpg', 'Introduction to Programming for Beginners.', 35.00, 0, 'PROG_AR001', 508, 0, 'ar', 5, 41, 23, 15, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(44, 'Programming using C', '44.jpg', 'Learn to program applications using C.', 50.00, 0, 'CSHARP_AR001', 394, 0, 'ar', 5, 42, 6, 15, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(45, 'Website design using HTML', '45.jpg', 'A comprehensive guide to website design and development.', 40.00, 0, 'HTML_AR001', 358, 0, 'ar', 5, 43, 19, 15, '2024-09-19 10:22:24', '2024-09-19 10:22:31'),
(46, 'Website Design Using CSS', '46.jpg', 'A comprehensive guide to website design and development.', 40.00, 0, 'CSS_AR001', 350, 0, 'ar', 5, 43, 19, 15, '2024-09-19 10:22:24', '2024-09-19 10:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Python programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(2, 'JavaScript programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(3, 'software engineering', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(4, 'Algorithms', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(5, 'Java programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(6, 'C programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(7, 'Object-Oriented Software', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(8, 'Programming Questions and Solutions', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(9, 'Rust programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(10, 'C++ programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(11, 'C# programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(12, 'Spring Framework', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(13, 'application development', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(14, 'SQL', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(15, 'GIT', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(16, 'computer science', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(17, 'Regex programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(18, 'Linux programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(19, 'HTML and CSS', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(20, 'Elixir programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(21, 'problem-solving', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(22, 'Swift Programming', '2024-09-17 17:13:45', '2024-09-19 10:26:02'),
(23, 'Programming Basics', '2024-09-17 17:13:45', '2024-09-19 10:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `email`, `phone`, `title`, `message`, `created_at`, `updated_at`) VALUES
(7, 3, 'mohamed Abdelhady', 'qweqwe2752002@gmail.com', '1158071449', 'استرجاع', 'مش عايزه خلاص ', '2024-09-20 14:08:24', '2024-09-20 14:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_address_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','shipped','delivered','canceled') NOT NULL DEFAULT 'pending',
  `total_amount` decimal(6,3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Addison-Wesley', '12348567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(2, 'No Starch Press', '1234867890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(3, 'Prentice Hall', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(4, 'MIT Press', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(5, 'O\'Reilly Media', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(6, 'Manning Publications', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(7, 'CareerCup', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(8, 'McGraw-Hill', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(9, 'Microsoft Press', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(10, 'Apress', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(11, 'Starbound Software', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(12, 'Pragmatic Bookshelf', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(13, 'Dan Bader Books', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(14, 'Noor Book', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05'),
(15, 'Hasoub Academy', '1234567890', '2024-09-19 10:11:06', '2024-09-19 10:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext NOT NULL,
  `value` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatead_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `status` enum('active','notactive','blocked','') NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `code` varchar(5) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `status`, `email`, `image`, `phone`, `code`, `password`, `updated_at`, `created_at`) VALUES
(3, 'mohamed', 'Abdelhady', 'active', 'qweqwe2752002@gmail.com', NULL, '01158071449', NULL, '601f1889667efaebb33b8c12572835da3f027f78', '2024-09-19 20:59:36', '2024-09-19 15:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `visit_date`) VALUES
(1, '2024-09-20 14:37:56'),
(2, '2024-09-20 14:37:58'),
(3, '2024-09-20 14:37:59'),
(4, '2024-09-20 14:42:18'),
(5, '2024-09-20 15:50:21'),
(6, '2024-09-20 15:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_address_k` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_publisher_fk` (`publisher_id`),
  ADD KEY `book_author_fk` (`author_id`),
  ADD KEY `subcategory_book_fk` (`category_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_book_id_foreign` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_contact_fk` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_order_fk` (`user_id`),
  ADD KEY `order_address_fk` (`shipping_address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_orderitems_fk` (`order_id`),
  ADD KEY `orderitems_book_fk` (`book_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_review_fk` (`user_id`),
  ADD KEY `book_review_fk` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_phone_uniqe` (`phone`) USING BTREE,
  ADD UNIQUE KEY `user_email_uniqe` (`email`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_book_id_foreign` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15822;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `user_address_k` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `book_author_fk` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `book_publisher_fk` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`),
  ADD CONSTRAINT `subcategory_book_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_book_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wishlists_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `user_contact_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_address_fk` FOREIGN KEY (`shipping_address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `user_order_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_orderitems_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderitems_book_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `book_review_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `user_review_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `book_wishlist_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_wishlist_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
