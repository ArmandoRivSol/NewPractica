CREATE DATABASE escuela;
USE escuela;

CREATE TABLE carreras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  activo BOOLEAN DEFAULT 1
);

CREATE TABLE turnos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  activo BOOLEAN DEFAULT 1
);

CREATE TABLE grados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  activo BOOLEAN DEFAULT 1
);

CREATE TABLE grupos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  carrera_id INT,
  turno_id INT,
  grado_id INT,
  clave VARCHAR(20),
  numero_grupo INT,
  FOREIGN KEY (carrera_id) REFERENCES carreras(id),
  FOREIGN KEY (turno_id) REFERENCES turnos(id),
  FOREIGN KEY (grado_id) REFERENCES grados(id)
);

CREATE TABLE alumnos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  apellido_paterno VARCHAR(100),
  apellido_materno VARCHAR(100),
  grupo_id INT,
  activo BOOLEAN DEFAULT 1,
  FOREIGN KEY (grupo_id) REFERENCES grupos(id)
);
