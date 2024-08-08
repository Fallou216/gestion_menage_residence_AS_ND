CREATE DATABASE gestion_menage;

USE gestion_menage;

CREATE TABLE appartements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    nom_femme_de_menage VARCHAR(50) NOT NULL,
    menage BOOLEAN NOT NULL,
    type_menage VARCHAR(50) NOT NULL,
    date_menage DATE NOT NULL,
    prochaine_date_menage DATE NOT NULL,
    commentaires TEXT
);
