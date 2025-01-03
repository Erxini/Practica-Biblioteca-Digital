-- Script para crear la base de datos biblioteca_digital
CREATE DATABASE IF NOT EXISTS biblioteca_digital;
USE biblioteca_digital;

-- Tabla USUARIOS
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    ape1 VARCHAR(50) NOT NULL,
    ape2 VARCHAR(50) NOT NULL,
    rol ENUM('administrador', 'registrado') NOT NULL
);

-- Tabla LIBROS
CREATE TABLE IF NOT EXISTS libros (
    ISBN VARCHAR(13) PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL
);

-- Tabla PRESTAMOS
CREATE TABLE IF NOT EXISTS prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(13) NOT NULL,
    id_usuario INT NOT NULL,
    fecha_desde DATE NOT NULL,
    fecha_hasta DATE NOT NULL,
    FOREIGN KEY (ISBN) REFERENCES libros(ISBN),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Inserciones de prueba
INSERT INTO usuarios (nombre, ape1, ape2, rol) VALUES 
('Admin', 'Admin', 'Admin', 'administrador'),
('Juan', 'Perez', 'Gomez', 'registrado'),
('Maria', 'Lopez', 'Garcia', 'registrado');

INSERT INTO libros (ISBN, titulo, autor) VALUES 
('9781234567890', 'El Quijote', 'Miguel de Cervantes'),
('9789876543210', 'Cien Años de Soledad', 'Gabriel Garcia Marquez');

INSERT INTO prestamos (ISBN, id_usuario, fecha_desde, fecha_hasta) VALUES 
('9781234567890', 2, '2025-01-01', '2025-01-15'),
('9789876543210', 3, '2025-02-01', '2025-02-15');
