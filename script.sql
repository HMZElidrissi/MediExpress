CREATE DATABASE IF NOT EXISTS PharmacyDB;

-- Create 'users' table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('admin', 'patient') NOT NULL
);

CREATE TABLE patients (
    patient_id INT NOT NULL,
    patient_type ENUM('En Ligne', 'En Magasin') NOT NULL,
    FOREIGN KEY (patient_id) REFERENCES users(id),
    PRIMARY KEY (patient_id)
);

-- Create 'medicaments' table
CREATE TABLE medicaments (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(255) NOT NULL,
     description TEXT,
     price INT NOT NULL,
     quantity_in_stock INT NOT NULL
);

-- Create 'ventes' table
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE DEFAULT (CURRENT_DATE),
    patient_id INT NOT NULL,
    medicament_id INT NOT NULL,
    quantity INT NOT NULL,
    sale_type ENUM('En Ligne', 'En Magasin') NOT NULL,
    FOREIGN KEY (medicament_id) REFERENCES medicaments(id),
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id)
);

-- Create 'rapports' table
CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATETIME DEFAULT (CURRENT_DATE),
    report_type ENUM('vente', 'stock')
);

/*
 Another approach would be:
 ALTER TABLE ventes ADD COLUMN vente_type ENUM('En Ligne', 'En Magasin') NOT NULL;
DELIMITER $$

CREATE TRIGGER after_vente_insert_en_ligne
AFTER INSERT ON ventes
FOR EACH ROW
BEGIN
    IF NEW.vente_type = 'En Ligne' THEN
        INSERT INTO vente_en_ligne (vente_id) VALUES (NEW.id);
    END IF;
END$$

CREATE TRIGGER after_vente_insert_en_magasin
AFTER INSERT ON ventes
FOR EACH ROW
BEGIN
    IF NEW.vente_type = 'En Magasin' THEN
        INSERT INTO vente_en_magasin (vente_id) VALUES (NEW.id);
    END IF;
END$$

DELIMITER ;

 */