CREATE DATABASE IF NOT EXISTS sword;

CREATE USER 'ashpigunov'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';
GRANT all privileges ON ucode_web . * to 'ashpigunov'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE KEY,
    password VARCHAR(50) NOT NULL,
    full_name VARCHAR(60) NOT NULL,
    email_address VARCHAR(50) NOT NULL UNIQUE,
    status_admin BOOLEAN NULL
);

