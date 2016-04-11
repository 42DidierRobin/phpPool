CREATE DATABASE rdidier;

USE rdidier;

DROP TABLE peoples;

CREATE TABLE peoples
(
  id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
  pseudo VARCHAR(20) NOT NULL UNIQUE,
  date DATE NOT NULL DEFAULT '2000-12-24',
  mobile INT DEFAULT NULL
);CREATE TABLE peoples
(
  id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
  pseudo VARCHAR(20) NOT NULL UNIQUE,
  date DATE NOT NULL DEFAULT '2000-12-24',
  mobile INT DEFAULT NULL
);

INSERT INTO peoples (pseudo, mobile) VALUES ('toto', 1);

SELECT date FROM peoples WHERE pseudo = 'toto';

CREATE TABLE mobile
(
  id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
  name VARCHAR(20) NOT NULL
);

INSERT INTO mobile (name) VALUE ('apple');

SELECT * FROM peoples
  INNER JOIN mobile ON mobile.id = peoples.mobile
  WHERE pseudo = 'toto';