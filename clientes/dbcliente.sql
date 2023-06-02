CREATE DATABASE supermarket;
USE supermarket;

CREATE TABLE clientes(
    Cliente_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    celular VARCHAR(50), 
    compañia VARCHAR(50)
);
