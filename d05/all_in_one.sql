#ex00
CREATE DATABASE db_rdidier;

#utile pour chaque exo
USE db_rdidier;

#DROP TABLE ft_table;

#ex01
CREATE TABLE ft_table
(
  id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
  login VARCHAR(8) NOT NULL DEFAULT 'toto',
  groupe ENUM ('staff', 'student', 'other') NOT NULL,
  date_de_creation DATE NOT NULL
);

#ex02
INSERT INTO ft_table (login, groupe, date_de_creation) VALUES ('loki', 'staff', '2013-05-01');
INSERT INTO ft_table (login, groupe, date_de_creation) VALUES ('scadoux', 'student', '2014-01-01');
INSERT INTO ft_table (login, groupe, date_de_creation) VALUES ('chap', 'staff', '2011-04-27');
INSERT INTO ft_table (login, groupe, date_de_creation) VALUES ('bambou', 'staff', '2014-03-01');
INSERT INTO ft_table (login, groupe, date_de_creation) VALUES ('fantomet', 'staff', '2010-04-03');

#ex03
INSERT INTO ft_table (login, date_de_creation, groupe)
          SELECT nom, date_naissance, 'other' AS groupe
          FROM fiche_personne
          WHERE LENGTH(nom) < 9 AND nom LIKE '%a%'
          ORDER BY nom
          LIMIT 10;

#ex04
UPDATE ft_table SET date_de_creation = DATE_ADD(date_de_creation, INTERVAL 20 YEAR)
          WHERE id > 5;

#ex05 (to do)
DELETE FROM ft_table WHERE id < 6;

#ex06
SELECT titre, resum FROM film
                    WHERE resum LIKE '%vincent%'
                    ORDER BY id_film;

#ex07
SELECT titre, resum FROM film
                    WHERE resum LIKE '%42%' OR titre LIKE '%42%'
                    ORDER BY  duree_min;

#ex08 --> pas vraiment compris lennonce..

#ex09
SELECT COUNT(id_film) AS 'nb_court-metrage'
            FROM film
            WHERE duree_min <= 42;

#ex10 (Super la database -_-)
SELECT titre AS Titre, resum AS Resume, annee_prod FROM film
            INNER JOIN genre ON film.id_genre = genre.id_genre
            WHERE genre.nom = 'erotic'
            ORDER BY film.annee_prod DESC;

#ex11
SELECT UPPER(abonnement.nom) AS 'NOM', prenom, prix FROM abonnement
            INNER JOIN fiche_personne ON abonnement.nom = fiche_personne.nom
            WHERE abonnement.prix > 42
            ORDER BY nom, fiche_personne.prenom;

#ex12
SELECT nom, prenom FROM fiche_personne
            WHERE nom LIKE '%-%' OR prenom LIKE '%-%'
            ORDER BY nom, prenom;

#ex13
SELECT ROUND(AVG(nbr_siege)) AS 'moyenne' FROM salle

#ex14
