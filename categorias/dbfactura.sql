CREATE DATABASE supermarket;
USE supermarket;

CREATE TABLE categorias(
    Categoria_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    Descripcion VARCHAR(50), 
    imagen MEDIUMBLOB

);
