-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 05:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `EducationID` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `Degree` varchar(100) DEFAULT NULL,
  `Description` varchar(400) DEFAULT NULL,
  `DateFrom` int(11) DEFAULT NULL,
  `DateTo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`EducationID`, `userid`, `Degree`, `Description`, `DateFrom`, `DateTo`) VALUES
(16, 2, 'B.Tech | SRM', 'Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.', 2022, 2026),
(17, 2, 'High School | Woodcreek High', 'Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.', 2018, 2022),
(18, 2, 'School | Narayana', 'Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.', 2014, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `jobcards`
--

CREATE TABLE `jobcards` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `salary_range` varchar(100) DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `job_type` varchar(100) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `website_link` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `postedById` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobcards`
--

INSERT INTO `jobcards` (`id`, `title`, `company`, `category`, `description`, `salary_range`, `vacancy`, `experience`, `degree`, `job_type`, `responsibilities`, `qualifications`, `skills`, `email`, `phone_number`, `website_link`, `address`, `city`, `state`, `country`, `zipcode`, `logo`, `postedById`) VALUES
(1, 'Marketing Manager', 'ABC Company', 'Marketing', 'As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for\n                                  our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into\n                                  the FinTech or Big Data arenas.', '50000', 3, '2-3 Years', 'Bachelors Degree', 'Full Time', 'Develop and implement effective marketing strategies to drive sales growth. Coordinate with the sales team to align marketing efforts with business goals. Analyze market trends and competitor activities to identify opportunities for growth.', 'Bachelors degree in Marketing, Business Administration, or a related field. Strong communication and interpersonal skills. Ability to work well under pressure and meet deadlines.', 'HTML, CSS, JavaScript', 'info@example.com', '123-456-7890', 'www.abctech.com', '123 Main Street', 'Anytown', 'Virginia', 'America', 12345, 'company_logo_6.png', 2),
(2, 'Flutist', 'Tabla', 'Hardware', 'You have to place very good tabla', '1,00,000', 9, '0 To 6 months', 'Bachelors Degree', 'Freelancer', 'Tabla. Tabla. Tabla.', 'Flute. Flute', 'Flute, PHP', 'yuvakarthikshyamacharan_komara@srmap.edu.in', '1234567890', 'www.tabla.com', 'Tabla Land', 'TablaCity', 'TablaState', 'Germany', 2345678, 'uploads/company_logo_6.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `managejobs`
--

CREATE TABLE `managejobs` (
  `id` int(11) NOT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `jobtitle` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `appliedbyId` int(11) DEFAULT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `logo` varchar(100) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id`, `email`) VALUES
(4, 2, 'yuvaksc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Designation` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Experience` int(11) DEFAULT NULL,
  `JobType` varchar(50) DEFAULT NULL,
  `ExpectPackage` varchar(50) DEFAULT NULL,
  `Skills` text DEFAULT NULL,
  `Career` text DEFAULT NULL,
  `Birth` date DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT NULL,
  `Facebook` varchar(100) DEFAULT NULL,
  `GooglePlus` varchar(100) DEFAULT NULL,
  `Twitter` varchar(100) DEFAULT NULL,
  `LinkedIn` varchar(100) DEFAULT NULL,
  `Pinterest` varchar(100) DEFAULT NULL,
  `Instagram` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`EmployeeID`, `FirstName`, `LastName`, `Email`, `Phone`, `Designation`, `Category`, `Experience`, `JobType`, `ExpectPackage`, `Skills`, `Career`, `Birth`, `Address`, `City`, `State`, `Country`, `ZipCode`, `Facebook`, `GooglePlus`, `Twitter`, `LinkedIn`, `Pinterest`, `Instagram`, `userid`) VALUES
(0, 'Yuva', 'Komara', 'yuvaksc@gmail.com', '91 234 567 8765', 'Front End Designer', 'Information Of Technology', 1, 'Full Time', '$21 / hr', 'HTML, CSS, JS, REACT', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.\r\n\r\nThe point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English.', '2024-05-16', '2726 Shinn', 'Pratapgarh', 'Uttrakhand', 'United Kingdom', '95747', 'facebook.com', 'google.com', 'twitter.com', 'linkedin.com', 'pinterest.com', 'insta.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Yuva Komara', 'yuvaksc@gmail.com', '55b9e74b55f76476994ec64c62003921', 'client-1.jpg'),
(2, 'Black Lancher', 'bla@gmail.com', '5a53fe7d7ccf71c7955e9292a4de43b1', 'company_logo_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `workexperience`
--

CREATE TABLE `workexperience` (
  `ExperienceID` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `DateFrom` int(11) DEFAULT NULL,
  `DateTo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workexperience`
--

INSERT INTO `workexperience` (`ExperienceID`, `userid`, `Designation`, `Description`, `DateFrom`, `DateTo`) VALUES
(14, 2, 'PHP Developer | Oracle', 'Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.', 2020, 2024),
(15, 2, 'ML Engineer | Google', 'Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.', 2008, 2012);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`EducationID`);

--
-- Indexes for table `jobcards`
--
ALTER TABLE `jobcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managejobs`
--
ALTER TABLE `managejobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companyId` (`companyId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workexperience`
--
ALTER TABLE `workexperience`
  ADD PRIMARY KEY (`ExperienceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `EducationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobcards`
--
ALTER TABLE `jobcards`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `managejobs`
--
ALTER TABLE `managejobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workexperience`
--
ALTER TABLE `workexperience`
  MODIFY `ExperienceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
