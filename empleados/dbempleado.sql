CREATE DATABASE supermarket;
USE supermarket;

CREATE TABLE empleados(
    empleado_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    celular VARCHAR(50),
    direccion VARCHAR(50), 
    imagen MEDIUMBLOB

);
