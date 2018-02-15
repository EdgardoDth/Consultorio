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
    nombre VARCHAR(45) NOT NULL,
    Telefono INT NOT NULL,
    idDireccion INT NOT NULL,
    PRIMARY KEY(idCentro),
    FOREIGN KEY(idDireccion) REFERENCES Direccion(idDireccion)
);

CREATE TABLE Area (
    idArea INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    PRIMARY KEY(idArea)
);

CREATE TABLE Medico (
    idMedico INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    apellidoP VARCHAR(45) NOT NULL,
    apellidoM VARCHAR(45) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    idCentro INT NOT NULL,
    idArea INT NOT NULL,
    PRIMARY KEY(idMedico),
    FOREIGN KEY(idCentro) REFERENCES Centro(idCentro),
    FOREIGN KEY(idArea) REFERENCES Area(idArea)
);

CREATE TABLE Paciente (
    idPaciente INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    apellidoP VARCHAR(45) NOT NULL,
    apellidoM VARCHAR(45) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    telefono INT NOT NULL,
    PRIMARY KEY(idPaciente)
);

CREATE TABLE Cita (
    idCita INT NOT NULL AUTO_INCREMENT,
    idMedico INT NOT NULL,
    fecha DATETIME NOT NULL,
    costo FLOAT NOT NULL,
    idPaciente INT NOT NULL,
    PRIMARY KEY(idcita),
    FOREIGN KEY(idMedico) REFERENCES Medico(idMedico),
    FOREIGN KEY(idPaciente) REFERENCES Paciente(idPaciente)
);

CREATE TABLE Receta (
    idReceta INT NOT NULL,
    idCita INT NOT NULL,
    PRIMARY KEY(idReceta),
    FOREIGN KEY(idCita) REFERENCES Cita(idCita)
);

CREATE TABLE Medicamento (
    idMedicamento INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    idReceta INT NOT NULL,
    PRIMARY KEY(idMedicamento),
    FOREIGN KEY(idReceta) REFERENCES Receta(idReceta)
);
