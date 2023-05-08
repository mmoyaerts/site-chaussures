CREATE DATABASE IF NOT EXISTS mmoyaertsDB;

USE mmoyaertsDB

CREATE TABLE IF NOT EXISTS chaussures (
    id INT NOT NULL AUTO_INCREMENT,
    marque VARCHAR(255) NOT NULL,
    modele VARCHAR(255) NOT NULL,
    prix INT NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO chaussures (marque, modele, prix)
VALUES  ('Nike','AIR FORCE ONE','150'),
        ('Nike','DUNK','190'),
        ('Nike','JORDAN','210');
