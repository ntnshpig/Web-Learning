CREATE DATABASE IF NOT EXISTS ucode_web;
CREATE USER 'ashpigunov'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';
GRANT all privileges ON ucode_web . * to 'ashpigunov'@'localhost';
FLUSH PRIVILEGES;