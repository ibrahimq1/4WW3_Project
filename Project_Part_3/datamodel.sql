--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rating` float NOT NULL,
  `username` varchar(100) NOT NULL,
  `id` int NOT NULL,
  `courtId` int NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Test1` (`courtId`);

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Test1` FOREIGN KEY (`courtId`) REFERENCES `submitted_courts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `submitted_courts`
--

CREATE TABLE `submitted_courts` (
  `userId` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `playerCount` int NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `audioRef` varchar(500) NOT NULL,
  `videoRef` varchar(500) NOT NULL,
  `rating` float DEFAULT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for table `submitted_courts`
--
ALTER TABLE `submitted_courts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Test` (`userId`);

--
-- AUTO_INCREMENT for table `submitted_courts`
--
ALTER TABLE `submitted_courts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for table `submitted_courts`
--
ALTER TABLE `submitted_courts`
  ADD CONSTRAINT `Test` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `userId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;
