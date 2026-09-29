CREATE DATABASE IF NOT EXISTS `technical3_pos` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `technical3_pos`;

DROP TABLE IF EXISTS `migrations`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customers` (`full_name`, `email`, `phone`, `created_at`) VALUES
('Andrea Santos', 'andrea.santos@example.com', '0917 482 1103', NOW()),
('Miguel Reyes', 'miguel.reyes@example.com', '0918 735 2246', NOW()),
('Sofia Lim', 'sofia.lim@example.com', '0920 614 3891', NOW()),
('Paolo Garcia', 'paolo.garcia@example.com', '0921 847 5062', NOW()),
('Camille Dela Cruz', 'camille.delacruz@example.com', '0927 330 7485', NOW()),
('Noah Mendoza', 'noah.mendoza@example.com', '0935 912 6614', NOW());

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `full_name`, `avatar`, `created_at`) VALUES
('admin.mara', 'Mara Villanueva', NULL, NOW()),
('cashier.jules', 'Jules Navarro', NULL, NOW()),
('cashier.ren', 'Ren Castillo', NULL, NOW()),
('inventory.ana', 'Ana Flores', NULL, NOW()),
('manager.eli', 'Elijah Ramos', NULL, NOW()),
('support.kim', 'Kim Bautista', NULL, NOW());
