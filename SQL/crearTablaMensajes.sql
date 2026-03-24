CREATE TABLE mensajes (
	idMensaje SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	mensaje TEXT NOT NULL,
	idEmisor TINYINT UNSIGNED,
	idReceptor TINYINT UNSIGNED,
	FOREIGN KEY (idEmisor) REFERENCES alumnos(idAlumno),
	FOREIGN KEY (idReceptor) REFERENCES alumnos(idAlumno),
	CONSTRAINT UQEmisorReceptor UNIQUE (idEmisor, idReceptor),
	CONSTRAINT CHEmisorNoEmisor CHECK (idEmisor != idReceptor)
);