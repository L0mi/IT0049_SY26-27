CREATE DATABASE IF NOT EXISTS it0049_tsa1;
USE it0049_tsa1;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS tasks;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Review project requirements', 'completed', '2026-09-25', NOW()),
('Prepare database tables', 'completed', '2026-09-25', NOW()),
('Check today''s priorities', 'pending', '2026-09-26', NOW()),
('Update task progress', 'in progress', '2026-09-26', NOW()),
('Test all application pages', 'pending', '2026-09-26', NOW()),
('Send daily status report', 'pending', '2026-09-26', NOW()),
('Plan next development step', 'pending', '2026-09-27', NOW()),
('Organize project documentation', 'pending', '2026-09-27', NOW());

INSERT INTO users (username, full_name, email, created_at) VALUES
('lamuelreyes', 'Lamuel Christopher Reyes', 'loreyesfeudilamn.edu.ph', NOW());
