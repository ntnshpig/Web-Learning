USE ucode_web;

CREATE TABLE IF NOT EXISTS  powers
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    hero_id INT NOT NULL,
    name VARCHAR(30) NOT NULL,
    points INT,
    type ENUM('attack', 'defense'),

    FOREIGN KEY (hero_id)  REFERENCES heroes(id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS  races
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    hero_id INT NOT NULL UNIQUE,
    name TEXT,
 
    FOREIGN KEY (hero_id)  REFERENCES heroes(id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS  teams
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    hero_id INT NOT NULL,
    name TEXT,

    FOREIGN KEY (hero_id)  REFERENCES heroes(id) ON DELETE CASCADE
);


INSERT INTO powers (hero_id, name, points, type) values ( 1, 'bloody fist', 110, 'attack');
INSERT INTO powers (hero_id, name, points, type) values ( 2, 'iron shield', 200, 'defense');
INSERT INTO powers (hero_id, name, points, type) values ( 3, 'iron shield', 100, 'defense');
INSERT INTO powers (hero_id, name, points, type) values ( 4, 'bloody fist', 140, 'attack');
INSERT INTO powers (hero_id, name, points, type) values ( 6, 'iron shield', 90, 'defense');
INSERT INTO powers (hero_id, name, points, type) values ( 8, 'bloody fist', 240, 'attack');

INSERT INTO races (hero_id, name) values (1, 'Human' );
INSERT INTO races (hero_id, name) values ( 2, 'Kree' );

INSERT INTO teams (hero_id, name) values ( 1, 'Avengers');
INSERT INTO teams (hero_id, name) values ( 2, 'Avengers');
INSERT INTO teams (hero_id, name) values ( 3, 'Avengers');
INSERT INTO teams (hero_id, name) values ( 4, 'Avengers');
INSERT INTO teams (hero_id, name) values ( 5, 'Avengers');
INSERT INTO teams (hero_id, name) values ( 5, 'Hydra');
INSERT INTO teams (hero_id, name) values ( 6, 'Hydra');
INSERT INTO teams (hero_id, name) values ( 7, 'Hydra' );
INSERT INTO teams (hero_id, name) values ( 8, 'Hydra' );
INSERT INTO teams (hero_id, name) values ( 9, 'Hydra' );
INSERT INTO teams (hero_id, name) values ( 10, 'Avengers');
INSERT INTO teams (hero_id, name) values ( 10, 'Hydra');