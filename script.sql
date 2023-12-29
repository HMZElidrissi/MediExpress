CREATE DATABASE IF NOT EXISTS PharmacyDB;
USE PharmacyDB;

-- Create 'users' table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('Admin', 'Patient En Ligne', 'Patient En Magasin') NOT NULL
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
    FOREIGN KEY (patient_id) REFERENCES users(id),
    FOREIGN KEY (medicament_id) REFERENCES medicaments(id)
);