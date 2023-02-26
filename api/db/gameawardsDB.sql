-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 07:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameawards`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'John Doe',
  `bio` text NOT NULL,
  `imgURL` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bio`, `imgURL`) VALUES
(1, 'Fillonit Ibishi', 'is a talented software developer with a passion for building innovative solutions. He has a wealth of experience in the tech industry and is always looking for new challenges.', 'https://xsgames.co/randomusers/assets/avatars/male/20.jpg'),
(2, 'Drin Vitia', 'is a talented software developer with a passion for building innovative solutions. He has a wealth of experience in the tech industry and is always looking for new challenges.', 'https://xsgames.co/randomusers/assets/avatars/male/21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `gameID`, `username`, `comment`, `createdAt`) VALUES
(5, 2, 'Fillonit', 'It is a fantastic game, filled with great characters, mechanics, and overall \"mood.\" Every character feel just right, and it is still playable and enjoyable after 100 hours, well beyond \"beating\" the game.', '2023-02-18 16:35:36'),
(6, 5, 'Fillonit', 'Best game of all time!!!', '2023-02-18 17:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(16, 'Fillonit Ibishi', 'filloniti_ibishi@hotmail.com', 'SPACED is a leading space news website that offers a comprehensive and informative view of the latest happenings in the space industry. Our mission is to bring the wonder and excitement of space exploration to a wider audience and to make space news accessible to everyone.\r\n\r\nWe cover a wide range of topics, from the latest space missions and scientific discoveries to technological innovations and the latest news from the commercial space industry. Our team of experienced journalists and space experts provides insightful analysis and commentary on the most important space news stories, as well as in-depth features and interviews with key figures in the industry.\r\n\r\nAt SPACED, we are passionate about space and we believe that exploration and discovery are fundamental to human progress. We are committed to bringing you the most accurate, up-to-date, and engaging space news coverage available, and we strive to inspire our readers to learn more about the universe and the many exciting opportunities that await us in space.');

-- --------------------------------------------------------

--
-- Table structure for table `gameslist`
--

CREATE TABLE `gameslist` (
  `id` int(11) NOT NULL,
  `gameTitle` varchar(255) NOT NULL,
  `gameRating` int(255) NOT NULL,
  `imageURL` varchar(400) NOT NULL,
  `videoURL` varchar(400) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `releaseDate` date NOT NULL,
  `platforms` varchar(255) NOT NULL,
  `gameDescription` text NOT NULL,
  `screenshots` text NOT NULL,
  `review` text NOT NULL,
  `lastEditBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gameslist`
--

INSERT INTO `gameslist` (`id`, `gameTitle`, `gameRating`, `imageURL`, `videoURL`, `genre`, `developer`, `publisher`, `releaseDate`, `platforms`, `gameDescription`, `screenshots`, `review`, `lastEditBy`) VALUES
(1, 'Grand Theft Auto V', 9, 'https://media-rockstargames-com.akamaized.net/rockstargames-newsite/img/global/games/fob/1280/V.jpg', 'https://cdn.akamai.steamstatic.com/steam/apps/256921436/movie_max_vp9.webm?t=1671116368', 'Action,Adventure', 'Rockstar North', 'Rockstar Games', '2013-09-17', 'PS 3,Xbox 360,PS 4,Xbox One,PC', 'Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. The game is set in the fictional city of Los Santos, based on Los Angeles, and follows three criminals as they perform heists and other missions. Grand Theft Auto V offers players a massive open-world environment to explore, filled with various side missions, random events, and dynamic content.', 'https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_32aa18ab3175e3002217862dd5917646d298ab6b.600x338.jpg?t=1671485100|https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_bc5fc79d3366c837372327717249a4887aa46d63.600x338.jpg?t=1671485100|https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_d2eb9d3e50f9e4cb8db37d2976990b3795da8187.600x338.jpg?t=1671485100', 'Grand Theft Auto V is a masterpiece of a game, offering players a vast open-world environment filled with endless possibilities. The characters are well-written and engaging, and the missions are both challenging and satisfying. Overall, this is a must-play for any fan of action-adventure games. This is one of the best games I have ever played. The open-world environment is huge and filled with interesting things to do, the graphics are stunning, and the storyline is engaging. Highly recommended!', 'Fillonit'),
(2, 'Hades', 10, 'https://image.api.playstation.com/vulcan/ap/rnd/202104/0517/9AcM3vy5t77zPiJyKHwRfnNT.png', 'https://cdn.akamai.steamstatic.com/steam/apps/256801252/movie_max_vp9.webm?t=1600353465', 'Action, Indie, RPG', ' Supergiant Games', ' Supergiant Games', '2020-09-17', 'PC,Xbox,PS 3, PS 4, Nintendo', 'Hades is a god-like rogue-like dungeon crawler that combines the best aspects of Supergiant\'s critically acclaimed titles, including the fast-paced action of Bastion, the rich atmosphere and depth of Transistor, and the character-driven storytelling of Pyre. BATTLE OUT OF HELL As the immortal Prince of the Underworld, you\'ll wield the powers and mythic weapons of Olympus to break free from the clutches of the god of the dead himself, while growing stronger and unraveling more of the story with each unique escape attempt.', 'https://cdn.akamai.steamstatic.com/steam/apps/1145360/ss_c0fed447426b69981cf1721756acf75369801b31.600x338.jpg?t=1670649855|https://cdn.akamai.steamstatic.com/steam/apps/1145360/ss_8a9f0953e8a014bd3df2789c2835cb787cd3764d.600x338.jpg?t=1670649855|https://cdn.akamai.steamstatic.com/steam/apps/1145360/ss_68300459a8c3daacb2ec687adcdbf4442fcc4f47.600x338.jpg?t=1670649855', 'Hades is a one-of-a-kind rogue-lite that sets the bar for creatively combining wildly different genres together and using their strengths to complement each other in unexpected ways. Its blend of satisfying, twitch-based action with countless modifiers to build replayability, dating simulator-esque character interactions, and turning failure into a thing you look forward to as a means of progressing the story coalesce to an experience that is more than the sum of its parts. Hades skillfully navigates the millenia-old baggage of ancient characters, reinterpreted through a contemporary lens that feels like they’re straight out of some animated series that’s way ahead of its time. I’m now over 50 hours in, 70 escape attempts deep and I can’t stop thinking about my next trip to Hell. Hades is an experience I never want to end.', 'Fillonit'),
(5, 'Elden Ring', 10, 'https://4kwallpapers.com/images/wallpapers/elden-ring-2022-games-pc-games-playstation-4-xbox-series-x-1024x1024-7474.jpg', 'https://cdn.akamai.steamstatic.com/steam/apps/256889456/movie_max_vp9.webm?t=1654109241', 'Action, RPG', 'FromSoftware Inc. ', 'FromSoftware Inc. ', '2022-02-25', 'PS 5,PS 4,Xbox Series X,Xbox One,PC', 'Elden Ring is an action role-playing game played in a third person perspective, with gameplay focusing on combat and exploration. It features elements similar to those found in other games developed by FromSoftware, such as the Dark Souls series, Bloodborne, and Sekiro: Shadows Die Twice.', 'https://cdn.akamai.steamstatic.com/steam/apps/1245620/ss_ae44317e3bd07b7690b4d62cc5d0d1df30367a91.600x338.jpg?t=1674441703|https://cdn.akamai.steamstatic.com/steam/apps/1245620/ss_e80a907c2c43337e53316c71555c3c3035a1343e.600x338.jpg?t=1674441703|https://cdn.akamai.steamstatic.com/steam/apps/1245620/ss_b6c4cdb36cebdbd52b97ab6e0851b7d3e41f03b3.600x338.jpg?t=1674441703', 'It is no exaggeration to say that Elden Ring is FromSoftware’s largest and most ambitious game yet, and that ambition has more than paid off. Even after 87 hours of blood, sweat, and tears that included some of the most challenging fights I’ve ever fought, and innumerable surprises, there are still bosses that I left on the table, secrets that I’ve yet to uncover, sidequests that I missed out on, tons of weapons, spells, and skills that I’ve never used. And this is all on top of PVP and cooperative play that I’ve barely been able to scratch the surface of. Throughout it all, while the fundamentals of combat haven’t changed much from what we’ve seen before, the enormous variety of viciously designed enemies and the brutal but surmountable bosses have brought its battles to a new level. Even with all the threads I didn’t manage to tug on my first playthrough (of what I’m sure will be several), what I was treated to can easily be held amongst the best open-world games I’ve ever played. Like The Legend of Zelda: Breath of the Wild before it, Elden Ring is one that we’ll be looking back on as a game that moved a genre forward.', 'Fillonit'),
(6, 'Yakuza: Like a Dragon', 9, 'https://image.api.playstation.com/vulcan/ap/rnd/202007/0917/fid2e7IysrUvFqmppIxi48GT.png', 'https://cdn.akamai.steamstatic.com/steam/apps/256808898/movie_max_vp9.webm?t=1605027719', 'Action,Adventure,RPG', 'Ryu Ga Gotoku Studio', 'SEGA', '2020-11-10', 'PS 5, PS 4, Xbox One, Xbox Series X, Xbox Cloud, PC', 'Ichiban Kasuga, a low-ranking grunt of a low-ranking yakuza family in Tokyo, faces an 18-year prison sentence after taking the fall for a crime he didn\'t commit. Never losing faith, he loyally serves his time and returns to society to discover that no one was waiting for him on the outside, and his clan has been destroyed by the man he respected most. Ichiban sets out to discover the truth behind his family\'s betrayal and take his life back, drawing a ragtag group of society’s outcasts to his side: Adachi, a rogue cop, Nanba, a homeless ex-nurse, and Saeko, a hostess on a mission. Together, they are drawn into a conflict brewing beneath the surface in Yokohama and must rise to become the heroes they never expected to be.', 'https://cdn.akamai.steamstatic.com/steam/apps/1235140/ss_3672df00523861cd37b0f969d80604003ba14fd4.600x338.jpg?t=1671624544|https://cdn.akamai.steamstatic.com/steam/apps/1235140/ss_d8bcb8c72368ec09506d3a60d42ff2a1901e39f7.600x338.jpg?t=1671624544|https://cdn.akamai.steamstatic.com/steam/apps/1235140/ss_9cecfb713527a480f607bbde54c01763b18bf354.600x338.jpg?t=1671624544', 'Yakuza: Like a Dragon’s colourful turn-based combat, engaging lead characters, and detail-rich setting make for a refreshingly different and mostly thrilling instalment in the long-running Japanese crime series. However, pathfinding annoyances and a number of escalating difficulty spikes in its closing chapters made completing its story feel like much more of a repetitive slog than any of the previous games. While I applaud the developers for daring to transform its established brawling into more tactically complex team-based battles, the grueling progression system it brings along with it means that Yakuza: Like a Dragon ultimately takes some bold steps in a new direction for the series but neglects to completely maintain its balance.', 'Fillonit'),
(7, 'Stray', 8, 'https://www.cloudgamingcatalogue.com/wp-content/uploads/2022/07/Stray.jpg', 'https://cdn.akamai.steamstatic.com/steam/apps/256896952/movie_max_vp9.webm?t=1658250380', 'Adventure, Indie', 'BlueTwelve Studio', 'Annapurna Interactive', '2022-07-19', 'PS 5, PS 4, PC', 'Stray is a third-person cat adventure game set amidst the detailed, neon-lit alleys of a decaying cybercity and the murky environments of its seedy underbelly. Roam surroundings high and low, defend against unforeseen threats and solve the mysteries of this unwelcoming place inhabited by curious droids and dangerous creatures.', 'https://cdn.akamai.steamstatic.com/steam/apps/1332010/ss_88e209a90c2039fa76bca6fa08c641365be38d50.600x338.jpg?t=1670349423|https://cdn.akamai.steamstatic.com/steam/apps/1332010/ss_e8f0cbd5efdba352e89c4cfcee3fe991a1e1be8a.600x338.jpg?t=1670349423|https://cdn.akamai.steamstatic.com/steam/apps/1332010/ss_a697971e484b3deef50153a13f2afd0539347d23.600x338.jpg?t=1670349423', 'Stray is a delightful adventure in a dark but endearingly hopeful cyberpunk world, and that’s thanks in no small part to the fact that you are playing as an adorable cat the whole time. Its mix of simple platforming and puzzles with item-hunting quests is balanced very well across the roughly five-hour story – and though I wished my movement was a little more nimble during that time, I still loved hopping across rooftops and scampering through back alleys to find its well-hidden secrets. The new ideas it introduces along the way help keep things as fresh as a new bag of litter, too, even if not all of those ideas work quite as well as others. But whether I was scratching at a carpet or curling up into a ball and taking a catnap, Stray does a great job of setting itself apart in a way that feels like more than just a novelty.', 'Flamur'),
(8, 'Sekiro™: Shadows Die Twice', 9, 'https://assets1.ignimgs.com/2018/09/04/sekiro---button-1536103897438.jpg?width=1200&crop=1%3A1%2Csmart', 'https://cdn.akamai.steamstatic.com/steam/apps/256806899/movie_max_vp9.webm?t=1603837979', 'Action,Adventure', 'FromSoftware', 'Activision, FromSoftware', '2019-03-21', 'PS 3,PS 4,Xbox,PC', 'In Sekiro™: Shadows Die Twice you are the \'one-armed wolf\', a disgraced and disfigured warrior rescued from the brink of death. Bound to protect a young lord who is the descendant of an ancient bloodline, you become the target of many vicious enemies, including the dangerous Ashina clan. When the young lord is captured, nothing will stop you on a perilous quest to regain your honor, not even death itself.  Explore late 1500s Sengoku Japan, a brutal period of constant life and death conflict, as you come face to face with larger than life foes in a dark and twisted world. Unleash an arsenal of deadly prosthetic tools and powerful ninja abilities while you blend stealth, vertical traversal, and visceral head to head combat in a bloody confrontation.', 'https://cdn.akamai.steamstatic.com/steam/apps/814380/ss_0f7b0f8ed9ffc49aba26f9328caa9a1d59ad60f0.600x338.jpg?t=1669076148|https://cdn.akamai.steamstatic.com/steam/apps/814380/ss_2685dd844a2a523b6c7ec207d46a538db6a908cd.600x338.jpg?t=1669076148|https://cdn.akamai.steamstatic.com/steam/apps/814380/ss_15f0e9982621aed44900215ad283811af0779b1d.600x338.jpg?t=1669076148', 'Sekiro evolves From Software’s formula into a stylish stealth-action adventure that, naturally, emphasizes precision and skill in its combat. It walks the line between deliberate and patient stealth and breakneck melee combat against threats both earthly and otherworldly. Its imaginative and flexible tools support a more focused experience that shaves down some of From Software’s overly cryptic sensibilities without losing its air of mystery. Sekiro is an amazing new twist on a familiar set of ideas that can stand on its own alongside its predecessors.', 'Fillonit'),
(9, 'Red Dead Redemption 2', 10, 'https://image.api.playstation.com/cdn/UP1004/CUSA03041_00/Hpl5MtwQgOVF9vJqlfui6SDB5Jl4oBSq.png', 'https://cdn.cloudflare.steamstatic.com/steam/apps/256768371/movie_max.webm?t=1574881352', 'Action,Adventure', 'Rockstar Games', 'Rockstar Games', '2019-12-05', 'PS 4, Xbox, PC', 'America, 1899. <br/>Arthur Morgan and the Van der Linde gang are outlaws on the run. With federal agents and the best bounty hunters in the nation massing on their heels, the gang must rob, steal and fight their way across the rugged heartland of America in order to survive. As deepening internal divisions threaten to tear the gang apart, Arthur must make a choice between his own ideals and loyalty to the gang who raised him.', 'https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/ss_66b553f4c209476d3e4ce25fa4714002cc914c4f.600x338.jpg?t=1671485009|https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/ss_668dafe477743f8b50b818d5bbfcec669e9ba93e.600x338.jpg?t=1671485009|https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/ss_d1a8f5a69155c3186c65d1da90491fcfd43663d9.600x338.jpg?t=1671485009', 'Red Dead Redemption is a must-play game. Rockstar has taken the Western to new heights and created one of the deepest, most fun, and most gorgeous games around. You can expect the occasional bug or visual hiccup, but you can also expect a fantastic game that offers the Western experience we\'ve all been waiting for. Red Dead Redemption is a complete game in every sense -- both the single player and multiplayer modes are excellent -- and still manages to offer an attention to detail you rarely see from a game of this scope.', 'Fillonit'),
(10, 'Atomic Heart', 8, 'https://pbs.twimg.com/media/FnVbrqrXEAEpk2p.jpg:large', 'https://cdn.cloudflare.steamstatic.com/steam/apps/256931819/movie_max_vp9.webm?t=1676995611', 'Action,Adventure,RPG', 'Mundfish', 'Focus Entertainment', '2023-02-20', 'PC,Xbox,PS 5, PS 4', 'Welcome to a utopian world of wonders and perfection, in which humans live in harmony with their loyal and fervent robots.    Well, that\'s how it used to be. With the launch of the latest robot-control system mere days away, only a tragic accident or a global conspiracy could disrupt it…  The unstoppable course of technology along with secret experiments have brought rise to mutant creatures, terrifying machines and superpowered robots—all suddenly rebelling against their creators. Only you can stop them and find out what lies behind the idealized world.', 'https://cdn.cloudflare.steamstatic.com/steam/apps/668580/ss_1dc8661cde295efc2d1ff8612e079f5c74803748.600x338.jpg?t=1676995676|https://cdn.cloudflare.steamstatic.com/steam/apps/668580/ss_9dedae959672ac7d7f2db16638a5b65f80bfe125.600x338.jpg?t=1676995676|https://cdn.cloudflare.steamstatic.com/steam/apps/668580/ss_ce0e6d590cf0b6d5a2c9a69d8d0e215a745922e9.600x338.jpg?t=1676995676', 'Atomic Heart is a deeply ambitious, highly imaginative, and consistently impressive atompunk-inspired attempt at picking up where the likes of BioShock left off – something it’s done with a lot of success. It certainly makes missteps, chiefly with an irritating leading man and a self-indulgent habit of using the same tired tropes it tries to make fun of, but this stern, superpowered, and stringently solo shooter has worked its way under my skin despite these flaws. Atomic Heart didn’t always blow me away, but it definitely has the ticker to punch well above its weight.', 'Fillonit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT 0,
  `lastEditBy` varchar(255) NOT NULL DEFAULT 'Fillonit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`, `lastEditBy`) VALUES
(1, 'Fillonit', 'pass123', 1, 'Fillonit'),
(2, 'Drin', 'drini123', 0, 'Fillonit'),
(3, 'admin', 'admin123', 0, 'admin'),
(4, 'ArdianSutaj', 'Ardian123', 0, 'Fillonit'),
(5, 'Flamur', 'flamur123', 0, 'Fillonit'),
(6, 'Arlind', 'arlind123', 0, 'Fillonit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gameslist`
--
ALTER TABLE `gameslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gameslist`
--
ALTER TABLE `gameslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `gameID` FOREIGN KEY (`gameID`) REFERENCES `gameslist` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
