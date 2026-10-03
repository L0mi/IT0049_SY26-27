CREATE DATABASE IF NOT EXISTS `technical4_pos` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `technical4_pos`;

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
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `full_name`, `avatar`, `password`, `created_at`) VALUES
('admin.mara', 'Mara Villanueva', NULL, '$2y$12$mIzyVvWLVVX1gfdQ9zfFsexbAf3KbM.fTQ/Kj8VdYQvoxrwFOlLNK', NOW()),
('cashier.jules', 'Jules Navarro', NULL, '$2y$12$K2Xz5ysLWOJvTok8ttWYguMZcJopMqsrn5tfZfnyeslnsxUWFQPcO', NOW()),
('cashier.ren', 'Ren Castillo', NULL, '$2y$12$HkQxrxW/D2c7PEFSFIOEfOrLdF38XGUm4GLEPc7LKPDsR/jChGqeO', NOW()),
('inventory.ana', 'Ana Flores', NULL, '$2y$12$Qdyp9wnpFdOQe3aOrg9dgOX8n4KkSaC8oQFdmAWBTJLevCUGE06/.', NOW()),
('manager.eli', 'Elijah Ramos', NULL, '$2y$12$5ZI8bFyIkcK42gMUnQSBYu6M2ThGtKcwQ2TS1hymoRT6ciV0hn6Nu', NOW()),
('support.kim', 'Kim Bautista', NULL, '$2y$12$9Xl38l.WkS4uB3cizcezBOe8cXR7zUupb6eeDfc87mCKHRSv5WKQq', NOW());
