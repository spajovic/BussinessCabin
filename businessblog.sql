-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 11:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `businessblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', NULL, NULL),
(2, 'Enterprise', NULL, '2021-03-14 20:01:02'),
(3, 'Wholesale', NULL, NULL),
(4, 'Education', NULL, NULL),
(5, 'Industry', NULL, NULL),
(6, 'Management', NULL, '2021-03-14 19:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `parent_id`, `comment`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 7, 0, 'Neki komentar zgrado', 14, '2020-03-12 17:57:43', NULL),
(5, 7, 0, 'Nice post, but what do you think about ajdljasdlkasjdlkasj ?', 5, '2021-03-12 08:06:13', '2021-03-12 20:06:13'),
(6, 7, 0, 'Neki komentar covece', 1, '2021-03-13 07:34:43', '2021-03-13 19:34:43'),
(7, 7, 0, 'Testiranje komentara na postu!', 16, '2021-03-14 11:06:23', '2021-03-14 11:06:23'),
(8, 7, 0, 'Neki komentar !', 2, '2021-03-14 00:47:52', '2021-03-14 12:47:52'),
(9, 7, 0, 'Isprobavanje obavestenja za komentare!', 3, '2021-03-14 02:51:55', '2021-03-14 14:51:55'),
(10, 7, 0, 'Proba da li log radi', 15, '2021-03-14 03:29:31', '2021-03-14 15:29:31'),
(11, 7, 0, 'Nice post, but what do you think about..........?', 25, '2021-03-14 04:06:47', '2021-03-14 16:06:47'),
(12, 18, 0, 'Test komentar !', 1, '2021-03-14 06:00:41', '2021-03-14 18:00:41'),
(14, 18, 0, 'Test komentar ponovo!', 12, '2021-03-14 08:35:31', '2021-03-14 20:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_10_155719_create_socials_models_table', 1),
(2, '2021_03_10_164029_create_categories_table', 2),
(3, '2021_03_10_170329_create_tags_table', 3),
(4, '2021_03_10_172548_create_posts_table', 4),
(5, '2021_03_10_200020_create_navigations_table', 5),
(6, '2021_03_11_101534_create_navigations_table', 6),
(7, '2021_03_11_104522_create_roles_table', 7),
(8, '2021_03_11_105117_create_users_table', 8),
(9, '2021_03_11_184812_tags_users', 9),
(10, '2021_03_11_193755_tags_posts', 10),
(11, '2021_03_12_153540_create_user_pictures_table', 11),
(12, '2021_03_12_155357_create_user_pictures_table', 12),
(13, '2021_03_12_174233_create_comments_table', 13),
(14, '2021_03_13_110947_create_user_posts_table', 14),
(15, '2021_03_13_113256_create_user_posts_table', 15),
(16, '2021_03_14_123715_create_newsletters_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `navigations_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`navigations_id`, `name`, `href`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', NULL, NULL),
(2, 'About', 'home', NULL, NULL),
(3, 'Posts', 'posts.index', NULL, NULL),
(4, 'Login', '#loginModal', NULL, NULL),
(5, 'Register', '#registerModal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'nancy@chinookcorp.com', '2021-03-14 11:49:35', '2021-03-14 11:49:35'),
(2, 'sasa.pajovic.37.18@ict.edu.rs', '2021-03-14 19:57:22', '2021-03-14 19:57:22'),
(3, 'lukic@gmail.com', '2021-03-15 09:29:58', '2021-03-15 09:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading2` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2` varchar(1200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `heading`, `main_text`, `heading2`, `text2`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'How millennials can contribute to their financial futures?', 'Millennials have made headlines for everything from their tendency to job-hop to their fondness for avocados. There’s a reason the media has a laser-focus on millennial habits: In the not-too-distant future, the spending power of this avocado-loving generation has significant implications for governments, NGOs, and businesses the world over.\r\nFinancial experts are keeping a close watch on millennial investment data to gain insight into what this generation cares about and how it affects their long-term choices. According to a UBS Investor Watch report, millennials are optimistic about achieving their financial goals — even though they tend to invest conservatively. They also express interest in sustainable investments. This suggests that they’re more likely to put financial support behind initiatives that generate environmental, social, and governance results.', NULL, NULL, 4, '2006-02-24 15:53:47', '2021-03-14 19:43:07'),
(2, 'Solve a burning problem', 'An important business tip for new entrepreneurs is to create a business that solves a problem. If you asked most failed business owners what problem they solved, they either can’t answer or the problem they solved wasn’t urgent enough. The problem you solve doesn’t need to be complicated like curing a disease. It can be simple, such as we help people overcome boredom by providing an entertaining experience. But ultimately, you need to know what you’re trying to accomplish with your business. By knowing what burning problem you’re solving, you can use that in your marketing to help people understand how you can help them best. For example, if you sell anti-snoring products, you’ll want your ad to show the frustration a snorer can have on a person’s sleep. And then showcase your product as the handy solution that’ll allow them to sleep through the night again.', NULL, NULL, 6, '1971-07-06 17:02:19', '2021-03-14 19:48:33'),
(3, 'Ask people what they think', 'To understand what energizes, inspires, and terrifies your audience, you must ask people what they think about your proposal for change. This requires direct, pointed, and sincere questioning asked out of genuine curiosity and openness. When you ask people what they think, be silent when they respond. This will make space for them to share candid perspectives and give you the opportunity to deepen your understanding. It may even open your mind to possibilities you may not have considered before.', NULL, NULL, 4, '2004-09-26 21:54:19', '2021-03-14 19:56:13'),
(4, 'What the 1918 pandemic can tell us about a post-COVID-19 world', 'It has now been a year since many office workers were sent home, schools were shuttered, and essential businesses went into overdrive keeping up with customer demand for comestibles and toilet paper. Although vaccinations continue apace, social distancing and mask wearing are still a reality, along with remote work. Which raises some questions: When will it end? And more to the point: What will our new “normal” look like? According to Catherine Ettman, chief of staff and director of strategic initiatives in the office of the dean at Boston University School of Public Health, there have been more mental health problems during this pandemic than have been documented after other large-scale traumas. “The reason for that is probably that this is not one event. This is due to both COVID and the fear and anxiety around COVID, as well as its dramatic economic consequences,” she said. Anna Meuller, a sociologist at Indiana University Bloomington, is more explicit. “Given the number of families that have lost jobs or income due to the pandemic, we’re going to see an increase in children who have experienced deprivation, insecurity, and traumatic stress,” she told Science News. “These challenges early in life can have lasting consequences for physical and mental health, and for academic achievement. Without active steps to help affected children and their families, this will have a long-term tragic effect on U.S. society.”', NULL, NULL, 2, '2002-03-09 09:29:31', '2021-03-14 19:59:35'),
(5, 'Should You Invest in Bitcoin Right Now?', 'Bitcoin is an incredibly risky investment that may or may not pay off, so it\'s probably not the best fit for most people. But if you\'re eager to invest in the cryptocurrency, it\'s important to do so safely.\r\nFirst, make sure you have a well-diversified portfolio. The last thing you want to do is invest all your money in Bitcoin, because if it drops in value (and there is a good chance it will at some point), you could experience devastating losses.\r\nAim to invest in at least 10 to 15 different companies from multiple industries, or opt for index funds or mutual funds to further limit your risk. Because Bitcoin is so volatile, it\'s crucial to make sure the rest of your investments are as stable as possible.\r\n\r\nNext, only invest money you can afford to lose. This is a good rule of thumb to remember with all investments, but especially the riskier ones. You may not lose money investing in Bitcoin, but it\'s a good idea to be prepared for the worst just in case.Bitcoin may be gaining popularity right now, but that alone doesn\'t make it a smart investment. Before you invest any money, think about your tolerance for risk. If you have money to burn and are willing to risk it, it may be worth the gamble. But for most investors, it\'s best to steer clear of Bitcoin for right now.', NULL, NULL, 1, '1976-02-09 20:01:21', '2021-03-14 20:05:27'),
(6, 'Getting to trustworthy AI', 'Artificial intelligence will be key to helping humanity travel to new frontiers and solve problems that today seem insurmountable. It enhances human expertise, makes predictions more accurate, automates decisions and processes, frees humans to focus on higher value work, and improves our overall efficiency.\r\n\r\nBut public trust in the technology is at a low point, and there is good reason for that. Over the past several years, we’ve seen multiple examples of AI that makes unfair decisions, or that doesn’t give any explanation for its decisions, or that can be hacked.\r\n\r\nTo get to trustworthy AI, organizations have to resolve these problems with investments on three fronts: First, they need to nurture a culture that adopts and scales AI safely. Second, they need to create investigative tools to see inside black box algorithms. And third, they need to make sure their corporate strategy includes strong data governance principles.', NULL, NULL, 1, '2018-08-12 11:15:28', '2021-03-14 20:12:05'),
(7, 'What are the costs involved in opening a video game company?', 'The business requires numerous computers, computer monitors, specialized computer software, printers, video game consoles, employees, insurance, and a facility to create the games. Plan on investing tens of thousands of dollars in the initial equipment and facility. However, if you plan on launching a video game business from your home, apartment or other space without the assistance of a staff, it is possible to create a game with a high-powered computer and specialized software. Though this approach will save plenty of money, it will prove to be a Herculean effort unless you have extensive experience making video games.', NULL, NULL, 2, '2002-11-21 00:04:00', '2021-03-14 20:15:51'),
(8, 'Offer specials that bring retailers better-than-wholesale prices', 'Building double savings into your offerings through daily, weekly, or monthly deals will put you at a competitive advantage and help you move your merchandise more quickly and easily. B2B buyers will watch for these specials and will appreciate the added savings they receive when they deal with your company — which means more orders for you.\r\nLike any retail establishment, wholesale businesses can also offer special deals on merchandise, beyond the initial wholesale discount. You can also offer incentives in the form of discounted prices for bulk orders.\r\nThorn Apple Valley, maker of various types of sausage, hot dogs, and other meat products is a great example of this. The company created an incentive program that won the Association of Incentive Marketing (AIM) Gold Incentive Showcase Award. What made it so great? They incentivized meat managers at Pathmark supermarkets with various Sony products or AT&T telephones, based on the percentage of their sales increase. The sales did increase, by a whopping 22%.', NULL, NULL, 3, '1980-04-15 04:25:05', '2021-03-14 20:19:30'),
(9, 'Reshaping The Online Experience For Virtual Events', 'As a professional speaker, what are some things you’ve learned about virtual events that you’ve come away with?\r\nAdoption of new technologies is on the rise especially in the last few months, and one of those new technologies is virtual reality. Is virtual reality still in the state where only a few people have truly adopted it?\r\nHave you studied virtual reality enough to be able to recommend the right headset or what device you should get?\r\nHow do we get more engagement on Zoom?\r\nHow have you altered your presentations for a virtual audience?\r\nAre you producing any events?', NULL, NULL, 6, '2010-01-31 13:12:20', '2021-03-14 20:21:49'),
(10, 'What’s Your Signature Response to Problems?', 'One of the ways to create goodwill, positive buzz, and happy customers is to exceed expectations. Responding proactively to problems is, in my opinion, one of the easiest ways to exceed the expectations available.\r\n\r\nProblems happen, that’s a fact. You can choose to respond to customer challenges, problems, let downs, screw-ups, and mistakes in one of two ways. You can ignore them and create the kind of friction that drags your trust into the ground or you can respond in such an over-the-top, out of control, nobody does that kind of way that can turn problems into gold mines. If you want to exceed expectations, choose the latter!\r\n\r\nFor the longest time, Nordstrom had a policy that granted refunds with no receipt, no time limit, no questions asked. A variation of that policy still remains today. This policy is often an example given whenever someone talks about customer service. But it’s really a signature response to a customer problem, and it’s become something that creates incredible word of mouth for them.\r\n\r\nCreating what I call your signature response to problem-solving takes a little thought, planning, implementation, and even training, but it can become a very valuable tool for your organization. I’ve mapped out four things you can do to quickly, proactively, and creatively address customer problems with a signature response of your own.', NULL, NULL, 5, '1985-07-27 00:54:07', '2021-03-14 20:25:14'),
(11, 'How to Create Meaningful Business Communication', 'Designing conversations – how does one become such a designer?\r\nWhat did the art of conversation play in the development of species and culture?\r\nHave we lost the art of being able to write a letter?\r\nIs 2020 causing us to want more?\r\nWhy is meaningful conversation so hard?\r\nWhat do you want people to do once they’ve read your book?\r\nThe 7Cs is a core element to your book – what are the 7Cs?\r\nCreative listening – I’ve found this the hardest – why?\r\nHow does digital communication get in the way?', NULL, NULL, 2, '1978-12-27 22:46:40', '2021-03-14 20:28:15'),
(12, 'What is Cryptocurrency?', 'Simply put, cryptocurrency is a type of money that only exists electronically—digital money, if you will. The technology behind it aims to solve some of the most significant pain points about traditional banknotes.\r\n\r\nFor one, it eliminates the need for having a governing body, such as a bank, to print and issue it. Transfers are done from person to person, not having to go through an intermediary. This also spells out instantaneous transactions that do not get imposed with high fees', NULL, NULL, 1, '2011-01-25 12:53:14', '2021-03-14 20:34:45'),
(13, 'Pandemic impact \'yet to be felt\' on High Streets', 'The coronavirus pandemic has thrown Britain\'s High Streets into crisis, yet the full force of its impact has yet to be felt, according to accountants PwC.\r\n\r\nMore than 17,500 chain stores and other venues closed in Great Britain last year, according to new data.\r\n\r\nThat\'s an average rate of 48 closures a day.\r\n\r\nBut the figures, which include hospitality and leisure venues, but not independent retailers, suggest the trend began before the pandemic.\r\n\r\nThe research was conducted by the Local Data Company which tracks vacancy rates in nearly 3,500 High Streets, shopping centres and retail parks.\r\n\r\nIt recorded 17,532 closures in 2020. It also reported 7,665 store openings. This resulted in a net loss of 9,877 outlets, the worst annual decline researchers have seen in more than a decade.', NULL, NULL, 2, '1982-04-13 22:10:25', '2021-03-14 20:57:35'),
(14, 'Content Marketing in 2020', 'Content marketing gets a bad rap because a lot of it is so badly wrapped. What happens in the land of marketing and business (b2b marketing or B2C – it doesn’t matter) is that someone takes a good concept and sullies it with poor execution. A strong intention becomes a watered down effort to lure people into a sales funnel with search terms. While SEO is a useful part of earning attention, it’s not the soul of content marketing. Let’s talk about that. Attention spans in 2020 are shot. The COVID-19 pandemic and other world events pushed us into having to consume more than our share of news. It’s built an intention of shutting out too much information. But what types of content earn attention? Helpful material never goes out of style.', NULL, NULL, 4, '2004-09-10 19:39:02', '2021-03-14 20:44:44'),
(17, 'Personal Leadership', 'Personal leadership is at the core of my new project, StoryLeader™. My premise is that in a world where effective leadership is more of a team sport, great leaders are the kind who work to develop their teams with good leadership qualities of their own. Let’s talk about which leadership attributes will help the most, and how being a leader means growing even more leaders along the way. One change since the COVID-19 pandemic is that team members must work much more independently, especially as more people work-from-home (WFH). Personal leadership is the art of training up your team and empowering them. The goal for those teams is to operate as leaders from within their role while still supporting the greater structure of the organization. An effective leader is now one who motivates and encourages the unique strengths of her team and seeks a collaborative experience to grow team capabilities.', NULL, NULL, 6, '2017-08-11 10:58:58', '2021-03-14 20:31:50'),
(40, 'How to Create a Wholesale Channel and Sell to Other Retailers', 'The first examples of wholesale businesses that might come to mind are probably large brick-and-mortar department stores, like Walmart or Zellers. Wholesale is, after all, often thought of as an old fashioned business model that’s being disrupted by newer direct-to-consumer ecommerce businesses.\r\n\r\nHowever, in more recent years, wholesale has experienced a revolution of its own due to online selling sites like Amazon, Wish and Wayfair. While ecommerce enables direct-to-consumer brands to thrive by lowering the barrier to setting up shop, wholesale still offers consumers a convenient shopping experience where they can find everything they need in one place.', NULL, NULL, 3, '2021-03-14 08:48:31', '2021-03-14 20:48:31'),
(41, 'Go The Extra Mile For Your Profit', 'Average brands deliver exactly what is asked of them. Exceptional brands deliver more. Finding novel and surprising ways to go the extra mile turns sceptics into fanatics and passive bystanders into loyal customers who tell their friends.\r\n\r\nWithout their clients, businesses wouldn’t exist. Safeguarding your future means putting energy into the extra mile until it’s second nature. Here are six ways to go the extra mile for your customers, with examples from business owners who put their customers first. It doesn’t need to be complicated. Save them time, save them money, and be their eyes and ears ready to assist. Join forces and focus on the same goals.\r\n\r\nProperty photographer Donatas Viskontas doesn’t mind rolling up his sleeves to get the perfect shot. “I get really involved with staging a property, including tidying up and cleaning windows. Even though that’s extra to the service, it ensures my clients get better-looking photos.”', NULL, NULL, 6, '2021-03-14 08:53:11', '2021-03-14 21:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `post_pictures`
--

CREATE TABLE `post_pictures` (
  `post_pictures_id` bigint(20) UNSIGNED NOT NULL,
  `posts_id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'slika.jpeg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_pictures`
--

INSERT INTO `post_pictures` (`post_pictures_id`, `posts_id`, `filename`, `created_at`, `updated_at`) VALUES
(1, 1, 'A9PODcISmg1hyzQRCSaEkoEW9RLBNIkJeKgCekrz.jpg', NULL, '2021-03-14 19:43:07'),
(2, 2, 'pHntua3jwtm9dkrcfN5XShggBqfD7gWE59Ivvark.webp', NULL, '2021-03-14 19:48:33'),
(3, 3, 'FLXPQFFpeH9OIFoAnhHNeBNKwNxjIUhEOqYsREXW.webp', NULL, '2021-03-14 19:56:13'),
(4, 4, 'SLv8wJE3bbskphJx4WVPbtPhT9eFsPPqrbMT9b78.webp', NULL, '2021-03-14 19:59:35'),
(5, 5, 'xE6rQXPpeM5COIr2BoKC5XVtZcfOX4YMXvD8ogkd.jpg', NULL, '2021-03-14 20:05:27'),
(6, 6, 'QzWG1D2DaTENVxPUX2JI4pzRvbfB6VS4WztEUdID.jpg', NULL, '2021-03-14 20:12:05'),
(7, 7, 'S4I1MdtcKwe36eopxQNP7oK5N0YEitkInhOt6rJ2.jpg', NULL, '2021-03-14 20:17:04'),
(8, 8, '5pbgCviBoNyX0FSQtKgWRddW75mFXBAkzVy8hW1B.jpg', NULL, '2021-03-14 20:19:30'),
(9, 9, 'Bib85rmbMbvOjWP0LgLoR23EuAwigVIJCMw4bxOL.jpg', NULL, '2021-03-14 20:22:28'),
(10, 10, 'pvBBqnDpwpnDhuYXVBIqc0UbDrDE78bcbnxpvTAa.jpg', NULL, '2021-03-14 20:25:14'),
(11, 11, 'tdTzc8tFtGQcTrMFouZP07kaWFJ9zOzfPh1xda9P.jpg', NULL, '2021-03-14 20:39:32'),
(12, 12, '3UzFN7qzBEnmYY3C6xG8L3RC25jlSpaxMPEFngyA.jpg', NULL, '2021-03-14 20:34:45'),
(13, 13, 'j0hoXX2ZgsCIbFFohAl4NUvzKltpCezxizxd4OMe.jpg', NULL, '2021-03-14 20:58:51'),
(14, 14, '27rAwBs3tG6bY46cYz57YKVKjAXnsLlxe42p7gAO.jpg', NULL, '2021-03-14 20:44:44'),
(15, 15, 'slika.jpeg', NULL, NULL),
(16, 16, 'slika.jpeg', NULL, NULL),
(17, 17, 'qZm5GH63JzjNJxDyta5kvgAr0szBCOUXRztwvwoV.jpg', NULL, '2021-03-14 20:31:50'),
(18, 18, 'slika.jpeg', NULL, NULL),
(19, 19, 'slika.jpeg', NULL, NULL),
(20, 20, 'slika.jpeg', NULL, NULL),
(21, 21, 'slika.jpeg', NULL, NULL),
(22, 22, 'slika.jpeg', NULL, NULL),
(23, 23, 'slika.jpeg', NULL, NULL),
(24, 24, 'slika.jpeg', NULL, NULL),
(25, 25, 'slika.jpeg', NULL, NULL),
(26, 26, 'slika.jpeg', NULL, NULL),
(27, 27, 'slika.jpeg', NULL, NULL),
(37, 39, 'slika.jpeg', '2021-03-14 15:02:05', '2021-03-14 15:02:05'),
(38, 40, '4Rep9kk6ERjkOUOybDbXPRX58GeFD3KXcsMETf6Z.jpg', '2021-03-14 20:48:31', '2021-03-14 20:48:31'),
(39, 41, 'bsACjvi4F52teQbAIqViZAoOYVgeAO7mTJgMIzSq.jpg', '2021-03-14 20:53:11', '2021-03-14 21:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `i_class` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(82) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `i_class`, `name`, `href`, `created_at`, `updated_at`) VALUES
(1, 'bx bxl-twitter', 'Twitter', 'https://twitter.com/?lang=en', NULL, NULL),
(2, 'bx bxl-facebook', 'Facebook', 'https://www.facebook.com/', NULL, NULL),
(3, 'bx bxl-instagram', 'Instagram', 'https://www.instagram.com/accounts/login/', NULL, NULL),
(4, 'bx bxl-linkedin', 'Linkedin', 'https://www.linkedin.com/\'', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', NULL, NULL),
(2, 'Tips', NULL, NULL),
(3, 'Marketing', NULL, NULL),
(4, 'Office', NULL, NULL),
(5, 'News', NULL, NULL),
(6, 'Smart', NULL, NULL),
(7, 'App', NULL, NULL),
(8, 'Crypto', NULL, NULL),
(12, 'New Tag promena', '2021-03-14 21:00:50', '2021-03-14 21:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `tags_posts`
--

CREATE TABLE `tags_posts` (
  `tags_posts_id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `posts_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags_posts`
--

INSERT INTO `tags_posts` (`tags_posts_id`, `tags_id`, `posts_id`, `created_at`, `updated_at`) VALUES
(1, 8, 14, NULL, NULL),
(5, 6, 7, NULL, NULL),
(9, 2, 5, NULL, NULL),
(16, 1, 6, NULL, NULL),
(17, 2, 7, NULL, NULL),
(18, 4, 17, NULL, NULL),
(21, 3, 4, NULL, NULL),
(24, 4, 14, NULL, NULL),
(38, 6, 11, NULL, NULL),
(42, 3, 10, NULL, NULL),
(46, 4, 1, NULL, NULL),
(48, 2, 3, NULL, NULL),
(52, 6, 17, NULL, NULL),
(54, 4, 7, NULL, NULL),
(56, 7, 7, NULL, NULL),
(85, 6, 14, NULL, NULL),
(86, 2, 1, NULL, NULL),
(87, 2, 2, NULL, NULL),
(88, 4, 2, NULL, NULL),
(89, 6, 2, NULL, NULL),
(90, 1, 3, NULL, NULL),
(91, 4, 3, NULL, NULL),
(92, 6, 3, NULL, NULL),
(93, 2, 4, NULL, NULL),
(94, 6, 4, NULL, NULL),
(95, 7, 4, NULL, NULL),
(96, 1, 5, NULL, NULL),
(97, 8, 5, NULL, NULL),
(98, 5, 6, NULL, NULL),
(99, 6, 6, NULL, NULL),
(100, 4, 8, NULL, NULL),
(101, 6, 8, NULL, NULL),
(102, 1, 9, NULL, NULL),
(103, 2, 9, NULL, NULL),
(104, 3, 9, NULL, NULL),
(105, 4, 9, NULL, NULL),
(106, 6, 9, NULL, NULL),
(107, 2, 10, NULL, NULL),
(108, 6, 10, NULL, NULL),
(109, 4, 11, NULL, NULL),
(110, 1, 17, NULL, NULL),
(111, 2, 17, NULL, NULL),
(112, 1, 12, NULL, NULL),
(113, 6, 12, NULL, NULL),
(114, 8, 12, NULL, NULL),
(115, 5, 13, NULL, NULL),
(116, 6, 13, NULL, NULL),
(117, 5, 14, NULL, NULL),
(118, 7, 14, NULL, NULL),
(119, 2, 40, NULL, NULL),
(120, 3, 40, NULL, NULL),
(121, 4, 40, NULL, NULL),
(122, 6, 40, NULL, NULL),
(123, 2, 41, NULL, NULL),
(124, 3, 41, NULL, NULL),
(125, 4, 41, NULL, NULL),
(126, 6, 41, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `surname`, `email`, `password`, `roles_id`, `created_at`, `updated_at`) VALUES
(7, 'Sasa', 'Pajovic', 'spajovicjw@gmail.com', '$2y$10$6OcS2qdC76sQNLNtiVbbROo2kONrMPfvZCFMFoCq0C7.lSBSY3rG.', 2, '2021-03-11 12:19:38', '2021-03-11 12:19:38'),
(18, 'Luka', 'Lukic', 'luka.lukic@ict.edu.rs', '$2y$10$ue3kwHAF6.ZqxiwYwti5eev9bMlQZhq3GFaMSmEndYKLw2HIGLEpK', 2, '2021-03-14 13:34:55', '2021-03-14 14:09:35'),
(20, 'Miladin', 'Pajovic', 'miladin@gmail.com', '$2y$10$sWxh0AyDhHH6RJf1348jJOws5IkthtmJoRXkbznqFpCrMfek6wrFu', 2, '2021-03-14 15:30:10', '2021-03-14 15:59:50'),
(21, 'Luka', 'Lukic', 'lukic@gmail.com', '$2y$10$0x.pZq0DNufw9WGfTJF5eOr33F8VS7sC1DJdCwAhUQEy/T3KH3zRi', 1, '2021-03-15 09:29:31', '2021-03-15 09:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_pictures`
--

CREATE TABLE `user_pictures` (
  `user_pictures_id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profilna.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_pictures`
--

INSERT INTO `user_pictures` (`user_pictures_id`, `filename`, `created_at`, `updated_at`) VALUES
(7, 'OIYRX7WilbNUbzf2phV7DztcHWw5pUPkFIblxzlZ.jpg', NULL, '2021-03-14 14:50:11'),
(18, 'xgjjxCMZm59WzDMwYLPC9E5WISd2ybKj18XY63oB.jpg', '2021-03-14 13:34:55', '2021-03-14 18:03:44'),
(20, 'profilna.jpg', '2021-03-14 15:30:10', '2021-03-14 15:30:10'),
(21, 'profilna.jpg', '2021-03-15 09:29:31', '2021-03-15 09:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_posts`
--

CREATE TABLE `user_posts` (
  `user_posts_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `posts_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_posts`
--

INSERT INTO `user_posts` (`user_posts_id`, `users_id`, `posts_id`) VALUES
(1, 7, 1),
(2, 7, 2),
(3, 7, 3),
(4, 7, 4),
(5, 7, 5),
(6, 7, 6),
(7, 7, 7),
(8, 7, 8),
(9, 7, 9),
(10, 7, 10),
(11, 7, 11),
(12, 7, 12),
(13, 7, 13),
(14, 7, 14),
(17, 7, 17),
(35, 18, 40),
(36, 18, 41);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`navigations_id`),
  ADD UNIQUE KEY `navigations_name_unique` (`name`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_pictures`
--
ALTER TABLE `post_pictures`
  ADD PRIMARY KEY (`post_pictures_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `tags_posts`
--
ALTER TABLE `tags_posts`
  ADD PRIMARY KEY (`tags_posts_id`),
  ADD KEY `tags_posts_tags_id_foreign` (`tags_id`),
  ADD KEY `tags_posts_posts_id_foreign` (`posts_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- Indexes for table `user_pictures`
--
ALTER TABLE `user_pictures`
  ADD PRIMARY KEY (`user_pictures_id`);

--
-- Indexes for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD PRIMARY KEY (`user_posts_id`),
  ADD KEY `user_posts_users_id_foreign` (`users_id`),
  ADD KEY `user_posts_posts_id_foreign` (`posts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `navigations_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `post_pictures`
--
ALTER TABLE `post_pictures`
  MODIFY `post_pictures_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tags_posts`
--
ALTER TABLE `tags_posts`
  MODIFY `tags_posts_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_pictures`
--
ALTER TABLE `user_pictures`
  MODIFY `user_pictures_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `user_posts_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags_posts`
--
ALTER TABLE `tags_posts`
  ADD CONSTRAINT `tags_posts_posts_id_foreign` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_posts_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pictures`
--
ALTER TABLE `user_pictures`
  ADD CONSTRAINT `user_pictures_user_pictures_id_foreign` FOREIGN KEY (`user_pictures_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD CONSTRAINT `user_posts_posts_id_foreign` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_posts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
