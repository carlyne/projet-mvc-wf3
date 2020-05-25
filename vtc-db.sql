-- CREATE DATABASE vtc;
-- USE `vtc`;

-- CREATE TABLE conducteur (
-- id_conducteur INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
-- prenom VARCHAR(150),
-- nom VARCHAR(150)
-- );

-- CREATE TABLE vehicule (
-- id_vehicule INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
-- marque VARCHAR(150),
-- modele VARCHAR(150),
-- couleur VARCHAR(75),
-- immatriculation VARCHAR(200)
-- );

-- CREATE TABLE association_vehicule_conducteur (
-- id_association INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
-- id_vehicule INT,
-- id_conducteur INT,
-- CONSTRAINT fk_id_vehicule
--     FOREIGN KEY (id_vehicule) REFERENCES vehicule (id_vehicule)
--     ON DELETE CASCADE,
-- CONSTRAINT fk_id_conducteur
--     FOREIGN KEY (id_conducteur) REFERENCES conducteur (id_conducteur)
--     ON DELETE CASCADE
-- );

-- SET FOREIGN_KEY_CHECKS=0;

SELECT * from association_vehicule_conducteur;

 
