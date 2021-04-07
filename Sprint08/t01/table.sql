USE ucode_web;

CREATE TABLE IF NOT EXISTS  heroes
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL UNIQUE,
    description TEXT,
    race VARCHAR(30) DEFAULT 'human',
    class_role ENUM('tankman', 'healer', 'dps')
);