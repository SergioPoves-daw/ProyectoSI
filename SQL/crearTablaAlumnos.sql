CREATE TABLE alumnos (
	idAlumno TINYINT UNSIGNED PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL UNIQUE,
	pwd VARCHAR(50) NOT NULL,
	nombreJesuita VARCHAR(50) NULL,
	descripcionJesuita VARCHAR(200) NULL,
	imagenJesuita VARCHAR(100) NULL
);