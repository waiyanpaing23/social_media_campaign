-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 08:17 PM
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
-- Database: `smc_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `email` varchar(300) NOT NULL,
  `sentdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `message`, `email`, `sentdate`) VALUES
(7, 'I recently attended one of your online workshops on privacy settings optimization. It was very informative and the tips provided were easy to implement. Keep up the great work!', 'waiyan@gmail.com', '2024-07-19 18:21:49'),
(8, 'Could you consider offering workshops at different times of the day? I would love to attend, but the current schedule clashes with my work hours.', 'kyawswar@gmail.com', '2024-07-19 18:29:13'),
(9, 'Do you have any romantic workshop? ', 'yamone@gmail.com', '2024-07-31 07:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `howparenthelp`
--

CREATE TABLE `howparenthelp` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `publishdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `howparenthelp`
--

INSERT INTO `howparenthelp` (`id`, `title`, `content`, `image1`, `image2`, `publishdate`) VALUES
(1, 'Encourage Open Communication', 'Kids use social media in many ways, from messaging friends and “meeting” new people to sharing their daily lives and even learning. Parents can support their children for healthy use of social media by fostering open communication. It is essential to create a safe and non-judgmental environment where children feel comfortable discussing their online experiences. Encourage your children to talk about what they do on social media, who they interact with, and any concerns they might have. By being approachable and understanding, parents can guide their children through the complexities of the online world. This open dialogue helps children feel supported and allows parents to provide timely advice on handling potential issues like cyberbullying or inappropriate content. Regular conversations about social media use can also help parents stay informed about online activities of their children and be proactive in addressing any risks.', 'parents-and-social-media.jpg', 'parentshelp.png', '2024-07-18 13:52:55'),
(2, 'Set Clear Boundaries and Expectations', 'Setting clear boundaries and educating children about responsible social media use is crucial for their safety and well-being. It’s important to understand more about the online activities and experiences their children has or wants to explore. Talk to them about what they do online, how they use devices and who they’re talking to. Establishing rules regarding screen time, types of content that are appropriate, and privacy settings can help children develop healthy online habits. Discuss the potential risks of sharing personal information and the importance of maintaining privacy. Teach children how to recognize and report harmful behavior, such as cyberbullying or online predators. By providing guidance on how to use social media platforms responsibly, parents can help their children navigate the digital landscape safely. Educating children about the positive and negative aspects of social media can empower them to make informed decisions and use these platforms in a healthy and secur', 'parentshelp1.webp', 'images.jpg', '2024-07-18 14:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(20) NOT NULL,
  `city` varchar(200) NOT NULL,
  `subscription` int(11) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `password`, `city`, `subscription`, `usertype`) VALUES
(2, 'Admin', 'info@smcsafety.org', 'admin$mc2024', 'Yangon', 0, 1),
(3, 'Kyaw Swar', 'kyawswar@gmail.com', 'ky@w998', 'Yangon', 1, 0),
(6, 'Wai Yan', 'waiyan@gmail.com', 'waiyan23', 'Yangon', 1, 0),
(7, 'Emily', 'emily@gmail.com', 'emily22', 'New York', 0, 0),
(8, 'Yamone', 'yamone@gmail.com', '170802', 'New York', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `publishdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `title`, `content`, `image`, `publishdate`) VALUES
(5, 'Internet Safety For Kids', 'Parents, if you have children of any age, you need a strategy for how to keep your kids safe online. The internet can be a great tool for learning and entertainment, but children should only look at age-appropriate images, videos and information.\r\n\r\nParental controls and content filters are a great place to start. Search engines have “safe search” features for filtering objectionable content, and there are even special search engines for kids. Cell phones also have parental control options and apps to help parents keep kids safe while online. Unfortunately, some hackers and online predators find ways to bypass filters and censorship efforts.\r\n\r\nSome content that appears to be designed for children may have hidden disturbing violent or sexual content. When it doubt, be cautious. Watch videos before children are allowed to watch them, and be wary of games with built-in chat functions. Encourage your children to avoid talking to strangers online, and make sure they’re aware of online dangers. There’s no need to be paranoid, just take basic safety precautions, monitor your children’s internet usage and talk to them about how to stay safe online.', 'internet safety .jpg', '2024-07-13 07:42:51'),
(6, 'Tips for Protecting Your Privacy and Online Reputation', 'Social media is a powerful tool that connects us to friends, trends, and communities, but it also comes with risks. To stay safe online, managing privacy settings is crucial; ensure your profiles are private and be selective about what you share. Protect your accounts with strong, unique passwords and enable two-factor authentication for added security. Be cautious of suspicious links and messages, as these can be phishing scams designed to steal personal information. Educating yourself and others about online safety, and reporting harmful activity, can help prevent negative experiences like cyberbullying. Regularly reviewing account activity and permissions for connected apps ensures your information remains secure. Additionally, focusing on online reputation management helps maintain control over your digital presence, protecting against reputational damage from inappropriate content or harassment. This approach not only creates a safer environment but also minimizes interactions with cyberbullies, enhancing the overall online experience. By implementing these practices and staying informed, users can enjoy the benefits of social media while safeguarding their privacy and well-being.', 'onlinesafety.png', '2024-07-19 18:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `info`, `category`, `image`, `createdat`) VALUES
(8, 'Helplines', 'Feel free to reach out to our helpline for any issues related to online harassment, cyberbullying, or privacy concerns.', 'Helpline:+1-800-183-3344\r\nEmail Address:support@smcsafety.org', 'Support', 'helpline.jpg', '2024-07-15 07:42:08'),
(9, 'Educational Contents', 'A comprehensive library of articles, guides, and videos on social media safety.', 'Our educational content aims to equip users with the knowledge and skills necessary to navigate social media platforms safely and responsibly.', 'Education', 'platforms1.jpg', '2024-07-15 07:51:03'),
(10, 'Online Safety Workshop', 'Interactive sessions led by experts to cover topics such as cyberbullying prevention, privacy settings optimization, and digital etiquette. ', 'Date: August 17, 2024\r\nVia: Online (Zoom)', 'Online Workshop', 'social-media-safety.jpg', '2024-07-15 08:03:33'),
(12, 'Parental Control', 'Tools and guides to help parents monitor and manage online activities of their children.', 'Learn how to set up parental controls, discuss internet safety with your children, and protect them from online risks.', 'Family Support', 'parentalcontrol.jpg', '2024-08-02 17:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `socialmediaapps`
--

CREATE TABLE `socialmediaapps` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `description` varchar(300) NOT NULL,
  `link` varchar(500) NOT NULL,
  `privacylink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `socialmediaapps`
--

INSERT INTO `socialmediaapps` (`id`, `name`, `logo`, `description`, `link`, `privacylink`) VALUES
(5, 'Facebook', 'facebook.png', 'A social networking site that connects people with friends and family.', 'https://www.facebook.com/login/', 'https://www.facebook.com/settings?tab=privacy'),
(6, 'Instagram', 'instagram.png', ' A photo and video sharing social network to connect with friends, celebrities, and brands.', 'https://www.instagram.com/accounts/login/', 'https://www.instagram.com/accounts/privacy_and_security/'),
(7, 'Twitter', 'twitter.png', 'A microblogging platform for sharing short updates, news, and engaging in real-time conversations.', 'https://twitter.com/login', 'https://twitter.com/settings/safety'),
(9, 'Youtube', 'youtube.png', 'A video-sharing website where users can upload, view, and comment on videos.', 'https://www.youtube.com/signin', 'https://www.youtube.com/howyoutubeworks/user-settings/privacy/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howparenthelp`
--
ALTER TABLE `howparenthelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmediaapps`
--
ALTER TABLE `socialmediaapps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `howparenthelp`
--
ALTER TABLE `howparenthelp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `socialmediaapps`
--
ALTER TABLE `socialmediaapps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
