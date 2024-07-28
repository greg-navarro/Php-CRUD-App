-- create_users_table.sql

-- Drop the table if it already exists
DROP TABLE IF EXISTS `users`;

-- Create the table
CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `phone` VARCHAR(20),
    `website` VARCHAR(100),
    `image` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;