CREATE DATABASE centro_de_salud;
USE centro_de_salud;

CREATE TABLE Direccion (
    idDireccion INT NOT NULL AUTO_INCREMENT,
    calle VARCHAR(45) NOT NULL,
    colonia VARCHAR(45) NOT NULL,
    CP VARCHAR(5) NOT NULL,
    estado VARCHAR(15) NOT NULL,
    PRIMARY KEY(idDireccion)
);

CREATE TABLE Centro (
    idCentro INT NOT NULL AUTO_INCREMENT,
    nombreCen VARCHAR(45) NOT NULL,
    TelefonoCen INT NOT NULL,
    idDireccionCen INT NOT NULL,
    PRIMARY KEY(idCentro),
    FOREIGN KEY(idDireccionCen) REFERENCES Direccion(idDireccion)
);

CREATE TABLE Area (
    idArea INT NOT NULL AUTO_INCREMENT,
    nombreAre VARCHAR(45) NOT NULL,
    PRIMARY KEY(idArea)
);

CREATE TABLE Medico (
    idMedico INT NOT NULL AUTO_INCREMENT,
    nombreMed VARCHAR(45) NOT NULL,
    apellidoPMed VARCHAR(45) NOT NULL,
    apellidoMMed VARCHAR(45) NOT NULL,
    fecha_ingresoMed DATE NOT NULL,
    idCentroMed INT NOT NULL,
    idAreaMed INT NOT NULL,
    PRIMARY KEY(idMedico),
    FOREIGN KEY(idCentroMed) REFERENCES Centro(idCentro),
    FOREIGN KEY(idAreaMed) REFERENCES Area(idArea)
);

CREATE TABLE Paciente (
    idPaciente INT NOT NULL AUTO_INCREMENT,
    nombrePac VARCHAR(45) NOT NULL,
    apellidoPPac VARCHAR(45) NOT NULL,
    apellidoMPAc VARCHAR(45) NOT NULL,
    fecha_ingresoPac DATE NOT NULL,
    fecha_nacimientoPAc DATE NOT NULL,
    telefonoPac INT NOT NULL,
    PRIMARY KEY(idPaciente)
);

CREATE TABLE Cita (
    idCita INT NOT NULL AUTO_INCREMENT,
    idMedicoCit INT NOT NULL,
    fechaCit DATETIME NOT NULL,
    costoCit FLOAT NOT NULL,
    idPacienteCit INT NOT NULL,
    PRIMARY KEY(idcita),
    FOREIGN KEY(idMedicoCit) REFERENCES Medico(idMedico),
    FOREIGN KEY(idPacienteCit) REFERENCES Paciente(idPaciente)
);

CREATE TABLE Receta (
    idReceta INT NOT NULL,
    idCitaRec INT NOT NULL,
    PRIMARY KEY(idReceta),
    FOREIGN KEY(idCitaRec) REFERENCES Cita(idCita)
);

CREATE TABLE Medicamento (
    idMedicamento INT NOT NULL AUTO_INCREMENT,
    nombreMedi VARCHAR(45) NOT NULL,
    idRecetaMedi INT NOT NULL,
    PRIMARY KEY(idMedicamento),
    FOREIGN KEY(idRecetaMedi) REFERENCES Receta(idReceta)
);
