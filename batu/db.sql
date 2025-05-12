-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 10:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('super_admin','admin','constructor','admission','doctor') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'admin1', '$2y$10$JHaYu7mgpxym6ya3qN0y0Ooj.cFSRlnRG2Dvwi4UElxPTXmI23Mau', 'admin', 'super_admin', '2025-04-24 16:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `college` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `email`, `phone`, `college`, `program`, `created_at`, `status`) VALUES
(11, 'Tarek Abdelrahim Mohamed Elwan', 'zztarookzz@gmail.com', '01154794762', 'Industrial and Energy Technology', 'Textile Machinery', '2025-04-24 16:24:22', ''),
(12, 'Amir Karara', 'amir@gmail.com', '01101200255', 'Industrial and Energy Technology', 'Medical Informatics', '2025-04-24 16:50:31', 'pending'),
(13, 'Ahmed Mohamed', 'ahmed.mohamed@email.com', '01012345678', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(14, 'Fatima Zahra', 'fatima.zahra@email.com', '01198765432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(15, 'Ali Hassan', 'ali.hassan@email.com', '01234567890', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(16, 'Sara Ahmed', 'sara.ahmed@email.com', '01087654321', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(17, 'Mahmoud Salah', 'mahmoud.salah@email.com', '01555555555', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(18, 'Mariam Mohamed', 'mariam.mohamed@email.com', '01111111111', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(19, 'Youssef Abdullah', 'youssef.abdallah@email.com', '01022223333', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(20, 'Noor Abdel Rahman', 'noor.abdelrahman@email.com', '01223334455', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(21, 'Amin Abdullah', 'amin.abdullah@email.com', '01543332211', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(22, 'Jamila Mustafa', 'jamila.mustafa@email.com', '01134567890', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(23, 'Khaled Ali', 'khaled.ali@email.com', '01234567890', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(24, 'Rana Nabil', 'rana.nabil@email.com', '01123456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(25, 'Omar Ahmed', 'omar.ahmed@email.com', '01098765432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(26, 'Laila Fathi', 'laila.fathi@email.com', '01154321678', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(27, 'Tamer Youssef', 'tamer.youssef@email.com', '01287654321', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(28, 'Salma Zaki', 'salma.zaki@email.com', '01023456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(29, 'Kareem Salah', 'kareem.salah@email.com', '01132165498', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(30, 'Mona Adel', 'mona.adel@email.com', '01567834521', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(31, 'Hassan Mahmoud', 'hassan.mahmoud@email.com', '01045678901', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(32, 'Yasmin Tamer', 'yasmin.tamer@email.com', '01298765432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(33, 'Zainab Fawzy', 'zainab.fawzy@email.com', '01123456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(34, 'Mohamed Gamal', 'mohamed.gamal@email.com', '01078901234', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(35, 'Huda Ibrahim', 'huda.ibrahim@email.com', '01532214455', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(36, 'Mahmoud Yasser', 'mahmoud.yasser@email.com', '01166778899', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(37, 'Walaa Samir', 'walaa.samir@email.com', '01012398765', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(38, 'Ramy Mohamed', 'ramy.mohamed@email.com', '01287654321', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(39, 'Samira Ashraf', 'samira.ashraf@email.com', '01154321678', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(40, 'Ehab Saeed', 'ehab.saeed@email.com', '01098765432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(41, 'Amira Hossam', 'amira.hossam@email.com', '01123456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(42, 'Ahmed Tarek', 'ahmed.tarek@email.com', '01543210987', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(43, 'Nour Al-Din', 'nour.aldin@email.com', '01276543210', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(44, 'Fady Adel', 'fady.adel@email.com', '01123456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(45, 'Mona Saeed', 'mona.saeed@email.com', '01567823456', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(46, 'Rasha Mohamed', 'rasha.mohamed@email.com', '01087654321', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(47, 'Khaled Mounir', 'khaled.mounir@email.com', '01198765432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(48, 'Farah Hany', 'farah.hany@email.com', '01065432109', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(49, 'Alaa Ibrahim', 'alaa.ibrahim@email.com', '01234567890', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(50, 'Nada Nabil', 'nada.nabil@email.com', '01132165498', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(51, 'Sherif Maher', 'sherif.maher@email.com', '01543332211', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(52, 'Mohamed Hossam', 'mohamed.hossam@email.com', '01255555555', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(53, 'Layla Abdel-Rahman', 'layla.abdelrahman@email.com', '01123456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(54, 'Samiha Khaled', 'samiha.khaled@email.com', '01078965432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(55, 'Omar Fouad', 'omar.fouad@email.com', '01544332211', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(56, 'Laila Hany', 'laila.hany@email.com', '01144433221', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(57, 'Salah Farid', 'salah.farid@email.com', '01232234455', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(58, 'Mohamed Abdelrahman', 'mohamed.abdelrahman@email.com', '01012345678', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(59, 'Marwa Mustafa', 'marwa.mustafa@email.com', '01198765432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(60, 'Tamer Abdelaziz', 'tamer.abdelaziz@email.com', '01076543210', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(61, 'Mona Gamal', 'mona.gamal@email.com', '01287654321', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(62, 'Faten Yasser', 'faten.yasser@email.com', '01034567890', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(63, 'Hassan Shams', 'hassan.shams@email.com', '01123456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(64, 'Nadia Rami', 'nadia.rami@email.com', '01234567890', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', ''),
(65, 'Ayman Mohamed', 'ayman.mohamed@email.com', '01554332211', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(66, 'Maha Ali', 'maha.ali@email.com', '01087654321', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(67, 'Tariq Samir', 'tariq.samir@email.com', '01198765432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(68, 'Sarah Tarek', 'sarah.tarek@email.com', '01234567890', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(69, 'Mohamed Kamal', 'mohamed.kamal@email.com', '01543332211', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(70, 'Mariam Rami', 'mariam.rami@email.com', '01123456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(71, 'Khaled Adel', 'khaled.adel@email.com', '01276543210', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(72, 'Jasmine Saeed', 'jasmine.saeed@email.com', '01098765432', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'rejected'),
(73, 'Ahmed Karim', 'ahmed.karim@email.com', '01123456789', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'pending'),
(74, 'Mohamed Fathi', 'mohamed.fathi@email.com', '01533221144', 'Industrial and Energy Technology', 'Information Technology', '2025-04-24 16:56:58', 'approved'),
(75, 'Tark dasdagj', 'tasdkasdkasd@gmail.com', '01101225678', 'Industrial and Energy Technology', 'Dental Prosthetics', '2025-04-24 18:36:51', ''),
(76, '3agwa', '3agwamm@gmail.com', '01055664477', 'Health Sciences', 'Medical Informatics', '2025-04-24 18:40:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `short_content`, `content`, `image`, `facebook_link`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'تهنئة رئيس جامعة ٦ أكتوبر التكنولوجية بمناسبة عيد تحرير سيناء', 'تهنئة رئيس جامعة ٦ أكتوبر التكنولوجية بمناسبة عيد تحرير سيناء', '', '492144278_673806245512311_5592480004937174173_n.jpg', 'https://www.facebook.com/photo/?fbid=673806238845645&set=a.100865992806342', 1, '2025-04-24 17:41:51', '2025-04-24 17:41:51'),
(2, 'جامعة ٦ أكتوبر التكنولوجية تنظم تدريب عملي لطلاب تكنولوجيا السكك الحديدية بأكاديمية أخبار اليوم.', 'جامعة ٦ أكتوبر التكنولوجية تنظم تدريب عملي لطلاب تكنولوجيا السكك الحديدية بأكاديمية أخبار اليوم.\r\n', '', 'photo_2025-04-14_08-39-58.jpg', 'https://www.facebook.com/october.technological.university/posts/pfbid0bTSWSYxMp515EZWemM5KS2YAxfkmZ8pLzcYYo3ogmoA83d7qcXzfV4UzoyfQ1CJUl', 1, '2025-04-24 18:42:58', '2025-04-24 18:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `student_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
