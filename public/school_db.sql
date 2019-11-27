-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2019 at 04:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `date` varchar(45) NOT NULL,
  `idTeach` int(11) NOT NULL,
  `idClass` varchar(45) NOT NULL,
  `deadline` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `text`, `subject`, `topic`, `date`, `idTeach`, `idClass`, `deadline`) VALUES
(1, 'Exercise N. 1', 'Math', 'Expressions', '2019-11-25', 1, '1A', '2019-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` varchar(45) NOT NULL,
  `capacity` int(20) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `capacity`, `description`, `created_at`, `updated_at`) VALUES
('1A', 20, 'This class contains a LIM.', '2019-11-24 20:09:21', '2019-11-24 20:09:21'),
('2A', 20, 'none', '2019-11-25 15:05:49', '2019-11-25 15:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `lecturetopic`
--

CREATE TABLE `lecturetopic` (
  `id` int(11) NOT NULL,
  `idClass` varchar(45) NOT NULL,
  `idTeach` int(11) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `topic` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecturetopic`
--

INSERT INTO `lecturetopic` (`id`, `idClass`, `idTeach`, `subject`, `date`, `topic`) VALUES
(1, '1A', 1, 'Math', '2019-11-25', 'Expressions');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `idClass` varchar(45) NOT NULL,
  `idTeach` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `date` date NOT NULL,
  `mark` float NOT NULL,
  `subject` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `idClass`, `idTeach`, `idStudent`, `date`, `mark`, `subject`, `topic`) VALUES
(1, '1A', 1, 1, '2019-11-25', 7, 'Math', 'Expressions');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `idClass` varchar(45) NOT NULL,
  `idTeach` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `idClass`, `idTeach`, `idStudent`, `subject`, `date`, `note`) VALUES
(1, '1A', 1, 1, 'Math', '2019-11-25', 'The student keeps on talking with her classmate despite of multiple recalls by the teacher.');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(45) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Parent'),
(4, 'Class Coordinator'),
(5, 'Super Admin'),
(6, 'Principal');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `postCode` varchar(10) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `gender` enum('F','M') DEFAULT 'M',
  `description` varchar(500) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `classId` varchar(45) DEFAULT NULL,
  `birthPlace` varchar(45) DEFAULT NULL,
  `fiscalCode` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `mailParent1` varchar(255) DEFAULT NULL,
  `mailParent2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstName`, `lastName`, `birthday`, `address`, `phone`, `postCode`, `photo`, `gender`, `description`, `email`, `classId`, `birthPlace`, `fiscalCode`, `created_at`, `updated_at`, `mailParent1`, `mailParent2`) VALUES
(1, 'Sara', 'Silvio', '2007-02-21', 'Corso Degli duca Abruzzi,25', '3362718391', '10137', NULL, 'F', NULL, 'sara.silvio@test.com', '1A', 'Milan', 'SDTSHR92L44424Xd', '2019-11-24 20:21:05', '2019-11-24 20:21:05', 'parent1@test.com', 'parent2@test.com'),
(2, 'Francesco', 'Barbagallo', '2004-06-23', 'Via Garibaldi, 4', '123456789', '12345', NULL, 'M', NULL, 'giovannimosa@test.com', '2A', 'Acireale', 'ABCDEFGH', '2019-11-25 18:28:53', '2019-11-25 18:28:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `studentId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `classId` varchar(45) NOT NULL,
  `lectureDate` date NOT NULL,
  `status` enum('present','absent') NOT NULL DEFAULT 'present',
  `presence_status` enum('full','early','late') NOT NULL DEFAULT 'full',
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studforparent`
--

CREATE TABLE `studforparent` (
  `idParent` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studforparent`
--

INSERT INTO `studforparent` (`idParent`, `idStudent`) VALUES
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppmaterial`
--

CREATE TABLE `suppmaterial` (
  `id` int(11) NOT NULL,
  `idClass` varchar(45) NOT NULL,
  `idTeach` int(11) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `material` varchar(255) NOT NULL,
  `date` varchar(45) NOT NULL,
  `mdescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `userId` bigint(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `postCode` varchar(10) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `birthPlace` varchar(45) DEFAULT NULL,
  `fiscalCode` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `firstName`, `lastName`, `birthday`, `userId`, `address`, `phone`, `postCode`, `photo`, `gender`, `description`, `birthPlace`, `fiscalCode`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Alva', '1993-07-29', 2, 'Via Paolo Gaidano,103/22', '3364728191', '10137', '20191124201116.jpg', 'M', NULL, 'Turin', 'SDTSHLS2L21224Xd', '2019-11-24 20:11:16', '2019-11-24 20:11:16'),
(2, 'Glori', 'Bianca', '1983-06-29', 5, 'Corso Giovanni Agnelli, 117', '3362718492', '10134', '20191124203933.jpg', 'F', NULL, 'Turin', 'SDTSHR92KS1Z224X', '2019-11-24 20:39:33', '2019-11-24 20:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `teaching`
--

CREATE TABLE `teaching` (
  `idClass` varchar(45) NOT NULL,
  `idTeach` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teaching`
--

INSERT INTO `teaching` (`idClass`, `idTeach`, `subject`) VALUES
('1A', 1, 'Math'),
('1A', 3, 'Art'),
('2A', 1, 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('active','deactive') DEFAULT 'active',
  `photo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roleId`, `remember_token`, `created_at`, `updated_at`, `status`, `photo`) VALUES
(1, 'Admin', 'admin@test.com', NULL, '$2y$10$3QCuQiTo1EULmEHmQzR0quelwceD.IuAghfLp94vMJ9eZarS2j/iC', 1, NULL, '2019-11-14 12:31:10', '2019-11-14 12:31:10', 'active', NULL),
(2, 'John Alva', 'teacher1@test.com', NULL, '$2y$10$LiGIGkYQYt9R7vxS/FtfAOeSJzpfDkQWEKSoHWHSTFT1C.DWm98VO', 2, NULL, '2019-11-24 20:10:33', '2019-11-24 20:10:33', 'active', NULL),
(3, 'Daniele Silvio', 'parent1@test.com', NULL, '$2y$10$26DjY58oBtQXwljEE/jD1.b7oJW7lMFB02uidI5L6Pt1adjYjKP.C', 3, NULL, '2019-11-24 20:25:29', '2019-11-24 20:25:29', 'active', NULL),
(4, 'Kate Alba', 'parent2@test.com', NULL, '$2y$10$Z3KodCOh3mfc/xJAkqcQ.uBGuku3mHT8zVa83kYSlH2wmqnJeBqBi', 3, NULL, '2019-11-24 20:25:31', '2019-11-24 20:25:31', 'active', NULL),
(5, 'Glori Bianca', 'teacher2@test.com', NULL, '$2y$10$/2mLmszFz9h/FbwdU/Wrf.zPdZRQpXz.wm/3Gw47pj3PgRWMjuLde', 2, NULL, '2019-11-24 20:39:33', '2019-11-24 20:39:33', 'active', NULL),
(6, 'SysAdmin', 'sadmin@test.com', NULL, '$2y$10$9s6hkG1Cjde/5kjDoYMTZekc2jg064aeb0O6Ipt9LrMZCN31Qr9ta', 5, NULL, '2019-11-27 13:35:42', '2019-11-27 13:35:42', 'active', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturetopic`
--
ALTER TABLE `lecturetopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClass` (`idClass`),
  ADD KEY `idTeach` (`idTeach`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ClassId_idx` (`classId`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`studentId`,`teacherId`,`classId`,`lectureDate`);

--
-- Indexes for table `studforparent`
--
ALTER TABLE `studforparent`
  ADD PRIMARY KEY (`idParent`,`idStudent`);

--
-- Indexes for table `suppmaterial`
--
ALTER TABLE `suppmaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teaching`
--
ALTER TABLE `teaching`
  ADD PRIMARY KEY (`idClass`,`idTeach`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_idx` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lecturetopic`
--
ALTER TABLE `lecturetopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppmaterial`
--
ALTER TABLE `suppmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `student_constraint` FOREIGN KEY (`idStudent`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_constraint` FOREIGN KEY (`idTeach`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
