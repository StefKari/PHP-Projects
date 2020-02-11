-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 04:50 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitor`
--
CREATE DATABASE IF NOT EXISTS `monitor` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `monitor`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Conference'),
(2, 'Lecture'),
(3, 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `message` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `message`, `date`, `post_id`) VALUES
(29, 'Mika', 'oke je!', '2019-12-07 23:47:08', 7),
(31, 'Mihajlo', 'Sjajno!', '2019-12-08 15:45:26', 7),
(32, 'James', 'Nice people...:D', '2019-12-08 15:45:48', 7),
(33, 'Pera', 'Sve cestitke...', '2019-12-08 15:46:13', 6),
(34, 'Jasna', 'Zasluzeno!', '2019-12-08 15:46:29', 6),
(35, 'John', 'Cool... :D', '2019-12-08 15:46:57', 5),
(36, 'Milica', 'hmmm?', '2019-12-08 15:47:29', 5),
(37, 'Maldini', 'Ciao raggazi :D', '2019-12-08 15:47:54', 3),
(38, 'Stef', 'Pozz...sjajan rad...', '2019-12-08 15:48:30', 1),
(39, 'Mica', 'Sjajan prof...svej najbolje', '2019-12-08 15:49:06', 2),
(40, 'Kari', 'Veoma uspesna konferencija!', '2019-12-08 15:49:57', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `body` varchar(250) COLLATE utf8_slovenian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `copyright`
--

CREATE TABLE `copyright` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `copyright`
--

INSERT INTO `copyright` (`id`, `note`) VALUES
(1, 'All right reserved by Stef');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_title` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `page_body` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_title`, `page_body`) VALUES
(1, 'About us', 'The mission of the association of citizens &ldquo;MONITOR&rdquo; from Novi Pazar include the indication of current social problems and raising awareness of citizens about the same, as well as proposing Concrete recommendations and directing social actions towards their resolution. Through its work, the Association will try to point out the current problems of the society from the field of human rights, security, culture, information and ecology by conducting research, monitoring and transparent presentation of the state of socio-economic and socio-political circumstances, relationships and processes, as well as by education of citizens raise awareness of the same, all in order to build the capacity of society to solve them. The focus will be on promoting social, multicultural, multinational and multiconfessional interaction in society.'),
(2, 'Privacy', 'Cookies consist of portions of code installed in the browser that assist the Owner in providing the Service according to the purposes described. Some of the purposes for which Cookies are installed may also require the User\'s consent.\r\n\r\nWhere the installation of Cookies is based on consent, such consent can be freely withdrawn at any time following the instructions provided in this document.\r\n\r\nHow to provide or withdraw consent to the installation of Cookies\r\nIn addition to what is specified in this document, the User can manage preferences for Cookies directly from within their own browser and prevent â€“ for example â€“ third parties from installing Cookies.\r\nThrough browser preferences, it is also possible to delete Cookies installed in the past, including the Cookies that may have saved the initial consent for the installation of Cookies by this website.\r\nUsers can, for example, find information about how to manage Cookies in the most commonly used browsers at the following addresses: Google Chrome, Mozilla Firefox, Apple Safari and Microsoft Internet Explorer.\r\n\r\nWith regard to Cookies installed by third parties, Users can manage their preferences and withdrawal of their consent by clicking the related opt-out link (if provided), by using the means provided in the third party\'s privacy policy, or by contacting the third party.\r\n\r\nNotwithstanding the above, the Owner informs that Users may follow the instructions provided on the subsequently linked initiatives by the Your Online Choices (EU), the Network Advertising Initiative (US) and the Digital Advertising Alliance (US), DAAC (Canada), DDAI (Japan) or other similar services. Such initiatives allow Users to select their tracking preferences for most of the advertising tools. The Owner thus recommends that Users make use of these resources in addition to the information provided in this document.');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `author` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `body` text COLLATE utf8_slovenian_ci NOT NULL,
  `tags` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `image`, `author`, `body`, `tags`, `date`, `category_id`) VALUES
(1, 'Lecture at the International Summer School of Human Rights in Mostar', 'upload/963b981863.jpg', 'Admin', '<p><span>12 June 2019, at the premises of Faculty of Law, University &ldquo;Dzemal Bijedic&rdquo; at Mostar, within International summer school in the field of international human rights, Doc. dr Aleksandar R. IvanoviÄ‡, President of the Citizens&rsquo; Association Monitor held lecture on the topic &ldquo;Investigation and processing of war crimes in the Western Balkans&rdquo;</span><br /><span>International summer school in the field of international human rights organized by the School of Business, University of Southeast Norway has aim to introduce students to the international human rights regime. In addition, this school aims to familiarize students with international humanitarian law and international criminal law.</span></p>', 'Lecture', '2019-11-12 22:51:54', 2),
(2, 'Lecture on topic â€œConflict management on Western Balkans â€“ past, present and futureâ€', 'upload/83421b1ccf.jpg', 'Admin', '<p>Prof. dr Aleksandar Ivanovic, President of the Steering Committee of Association of Citizens&rsquo;&nbsp; MONITOR, delivered a lecture on &ldquo;Conflict management on Western Balkans &ndash; past, present and future&rdquo; on September 20, 2019, at master programs of Human Rights, Multiculturalism and Conflict Managemen of School of Business, Department of Business, Strategy and Political Sciences at Drammen, University of South-Eastern Norway.</p>\r\n<p>Professor Ivanovic presented the participants of this program a map of the conflicts in the Western Balkans, and then introduced them to their history, their nature, causes and current phase, as well as tendencies for the future, outlining the basic principles and guidelines on which their resolution should be based.</p>', 'Lecture', '2019-11-12 22:22:57', 2),
(3, 'Participation in the training â€œStrengthening community resilience to extremism and radicalism â€“ directions for possible joint actionâ€', 'upload/5c9ecc0ffa.jpg', 'Admin', '<p>In organization of Cultural Center DamaD from Novi Pazar, at Kopaonik in the period 18-20. October 3, 2019 a three-day training on the topic &ldquo;Strengthening community resilience to extremism and radicalism &ndash; directions for possible joint action&rdquo; was held.</p>\r\n<p><span>&nbsp;</span>The training is intended for representatives of civil society organizations, faith-based organizations, youth organizations and media associations, and aims to increase the number of CSOs and other entities able to contribute to the efforts to prevent and combat violent extremism, or through the implementation of programs, media, humanitarian or public actions, or through engagement in public policy-making, improve coordination of actions and facilitate the acquisition of knowledge, exchange of experience and lessons learned. Improving interactions between decision-makers, religious organizations and CSOs on the issue of preventing and combating violent extremism is certainly of particular importance in order to make informed policies and programs at local and national level in this area.</p>\r\n<p>The training was implemented within the framework of the regional project &ldquo;Community in the first place &ndash; Creating a hub for civil society organizations to prevent and combat violent extremism &ndash; from prevention to reintegration&rdquo;, implemented in 6 countries of the Western Balkans, and financially supported by the European Union through Civil Society Facility and Media Program 2016&ndash;2017, Consolidation of regional thematic networks of civil society organizations.</p>\r\n<p>In behalf of CSO Monitor, the board members, Doc. dr Dragana Randjelovic and MSC Ankica Ivanovic, participated at this training.</p>', 'Training', '2019-11-12 22:24:06', 3),
(4, 'Participation in the Regional Conference on Hate Crime Education', 'upload/44d60e3182.jpg', 'Admin', '<p>On October 24, 2019, at the premises of the Hayytt Hotel in Belgrade, a Regional Conference on Hate Crimes in Southeastern Europe was held with the working title &ldquo;Education on Hate Crimes&rdquo;. The conference was organized by the OSCE Mission to Serbia with the aim of facilitating the exchange of experiences and best practices among stakeholders in the region, as well as discussions on the challenges of education on hate crimes.</p>\r\n<p>His Excellency Adnre Orizio, Head of the OSCE Mission to Serbia, Suzana Paunovic, Director of the Office for the Human and Minority Rights, Dr Jasmina Kiurski, Deputy Republic Public Prosecutor, and Nenad Vujic, Director of the Judicial Academy, opened conference by introductory speeches.</p>\r\n<p>The main areas discussed at the conference concerned education on hate crimes for the judiciary, the prosecution, the police, as well as awareness campaigns on the issue of hate crimes and the initiation of initiatives to countering this form of criminal manifestation. In line with these topics, the last part of the conference discussed the education of students on hate crimes and the involvement of academia and scientific institutions in the process of education on hate crimes.</p>\r\n<p>Participation in the conference in behalf of CSO Monitor was taken by prof. dr Aleksandar R. Ivanovic, president of steering committee.</p>', 'Conference ', '2019-11-12 22:24:57', 1),
(5, 'Participation at International Scientific Conference PROTECTION OF THE RIGHTS OF THE CHILD â€œ30 YEARS AFTER THE ADOPTION OF THE CONVENTION ON THE RIGHT`S OF THE CHILDâ€', 'upload/344ad6169b.jpg', 'Admin', '<p>In the premises of the Rectorate of the University of Novi Sad, from 29-30. November 2019, organized by the Provincial Protector of Citizens &ndash; Ombudsman and Institute for Criminological and Sociological Research, was held the third international scientific-professional conference PROTECTION OF THE RIGHTS OF THE CHILD &ldquo;30 YEARS AFTER THE ADOPTION OF THE CONVENTION ON THE RIGHT`S OF THE CHILD&rdquo;.</p>\r\n<p>MONITOR members, prof. dr Aleksandar Ivanovic, president and Doc. Dr Dragana Randjelovic, a member of the steering committee, took part in the conference with paper on the topic: &ldquo;CHILD&rsquo;S RIGHTS TO INFORMATION AND PRIVACY AND APPLICATION OF THE LAW ON PERSONAL DATA PROTECTION IN THE REPUBLIC OF SERBIA&rdquo;.</p>', 'Conference ', '2019-11-12 22:25:55', 1),
(6, 'President of Association of Citizensâ€™ â€œMonitorâ€, prof. dr Aleksandar Ivanovic, among the recipients of the Person of the Year Award of Mission of the OSCE Mission to Serbia for 2019', 'upload/944ef7295d.jpg', 'Admin', '<p>The OSCE Mission to Serbia, on November 26, 2019, in Belgrade, presented one of the 2019 Person of the Year awards, to the President of the Association of Citizens&rsquo; &ldquo;Monitor&rdquo;, prof. dr Aleksandar Ivanovic.</p>\r\n<p>This award recognizes citizens of Serbia who contribute to the promotion of the OSCE values in the country. This year, the award focuses on youth as a means of enhancing security and stability in the OSCE region, and the importance of adapting to change.</p>\r\n<p>Professor Aleksandar Ivanovic was awarded the prize for advocating a comprehensive approach in the areas of the rule of law and human rights. &ldquo;Professor Ivanovic has made significant contributions in educating future generations on the rule of law, particularly incorporating clinical legal education and practical learning opportunities into students&rsquo; educational experiences. He initiated numerous projects and research initiatives aimed at combatting hate crimes, promoting multiculturalism and non-discrimination while fostering youth inclusion and co-operation among young people across the region.&rdquo;, the OSCE Mission said in a statement.</p>\r\n<p>In addition to Professor Ivanovic, the winners of its 2019 Person of the Year Award include Sonja Stojanovic Gajic, a member of the Board of Directors of the Belgrade Center for Security Policy, and Bojan Cvejic, Web Executive Director and Editor-in-Chief at the daily Danas.</p>\r\n<p>Sonja StojanoviÄ‡ GajiÄ‡,<span>&nbsp;</span>member of the Managing Board of the Belgrade Centre for Security Policy, is awarded for her dedication to promoting civilian oversight of the security sector in Serbia and youth inclusion in reform efforts. &ldquo;She performed a number of important roles, including as a member of the Gender Equality Council of the Ombudsperson and as co-chair of the Working Group for Chapter 24 within the National Convention of the EU. She has worked on numerous security initiatives including programmes introducing Serbia&rsquo;s youth to research and reform efforts.&rdquo;, the OSCE Mission said in a statement.</p>\r\n<p>Bojan CvejiÄ‡,<span>&nbsp;</span>Web Executive Director and Editor-in-Chief<em>&nbsp;</em>at the daily&nbsp;<em>Danas,</em><span>&nbsp;</span>was responsible for the development of the digital edition of daily&nbsp;<em>Danas,&nbsp;</em>leading to its recognizable unique profile, different from the print edition. &nbsp;&ldquo;He has significantly improved the digital/web and social media presence of the daily&nbsp;<em>Danas</em>&nbsp;by implementing skills and knowledge obtained in various media-related training courses organized by the OSCE. His accomplishments also include a fresh and novel approach to achieving self-sustainability of the daily&nbsp;<em>Danas</em>&nbsp;in a challenging, fast-changing technological environment. In his work, CvejiÄ‡ combined, in a creative manner, quality and ethical journalism, entrepreneurial management and innovative perspective.&rdquo;, the OSCE Mission said in a statement.</p>\r\n<p>Head of the OSCE Mission to Serbia, Andrea Orizio, stressed that the Mission has made efforts this year to develop a new media strategy, as it will ensure media freedom, ethics, professionalism and literacy and add that journalist safety remains a priority.</p>\r\n<p>&ldquo;All our activities are based on the principle of working with young people and for young people, especially in the fields of security, human rights, freedom of the media and the rule of law. The best values â€‹â€‹influenced on our selection for this year&rsquo;s Person of the Year Award. With this award, we choose to recognize individuals which actions behave according to the OSCE principles, &rdquo;Orizio explains at a ceremony at the Hyatt Hotel.</p>\r\n<p>Presentation and Ministry of Foreign Affairs Ivica Dacic, who said that Serbia will remain committed to the values â€‹â€‹and goals that the OSCE represent and continue to be a partner of this mission.</p>\r\n<p>&ldquo;Serbia is pleased with the cooperation achieved by the OSCE Mission and supporting which this organization, provides to our organizations and institutions, is very important. Serbia will be a sincere partner of the OSCE Mission to Serbia, which will continue to provide support and assistance, &ldquo;Dacic said.</p>', 'Conference ', '2019-12-06 19:05:26', 1),
(7, 'Swiss Ambassador visited Preparatory Seminar for Bar Exam in Novi Pazar', 'upload/23ca614b9b.jpg', 'Admin', '<p><span>The Ambassador of Switzerland, His Excellency Philippe Guex, visited on December 3, 2019, lectures, which are being implemented as part of the seminar for passing the bar exam for young lawyers from Novi Pazar, Raska, Sjenica, Tutin and Prijepolje. On this occasion, the Ambassador addressed the program participants, emphasizing the importance of the rule of law and the importance of involving young lawyers in the work of the judicial institutions of the Republic of Serbia, wishing them a successful work in the preparation for the bar exam. Preparation seminar for the bar exam started on November 13, 2019 and will run until December 10, 2019. The seminar was organized by the OSCE Mission to Serbia, in cooperation with the CSO Monitor from Novi Pazar, with the financial support of the Government of Switzerland.</span></p>', 'Lecture', '2019-12-06 19:06:33', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `slogan` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Monitor', 'Udruzenje gradjana', 'upload/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `instagram` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `linkedin` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `twitter` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `google` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `facebook`, `instagram`, `linkedin`, `twitter`, `google`) VALUES
(1, 'Stef', 'Stef', 'Stef', 'Stef', 'Stef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_post1_idx` (`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copyright`
--
ALTER TABLE `copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_category1_idx` (`category_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copyright`
--
ALTER TABLE `copyright`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
