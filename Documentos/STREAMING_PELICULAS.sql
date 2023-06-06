USE master;
GO
IF DB_ID (N'StreamingPeliculas') IS NOT NULL
DROP DATABASE StreamingPeliculas;
CREATE DATABASE StreamingPeliculas
ON
( NAME = StreamingPeliculas_dat,
    FILENAME = 'C:\samples\StreamingPeliculas.mdf',
    SIZE = 10,
    MAXSIZE = 50,
    FILEGROWTH = 5 )
LOG ON
( NAME = StreamingPeliculas_log,
    FILENAME = 'C:\samples\StreamingPeliculas.ldf',
    SIZE = 5MB,
    MAXSIZE = 25MB,
    FILEGROWTH = 5MB ) ;
GO
USE StreamingPeliculas;
GO
CREATE TABLE Dispositivo
(
idDispositivo INT NOT NULL,
idUsuario INT NOT NULL,
ubicacion VARCHAR(40) NOT NULL,
tipo VARCHAR(10) NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO
CREATE TABLE Evento
(
idEvento INT NOT NULL,
titulo VARCHAR(40) NOT NULL,
fecha DATE NOT NULL,
hora TIME NOT NULL,
referencia VARCHAR(40) NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO
CREATE TABLE HistorialVisualizacion
(
idHistorialVisualizacion INT NOT NULL,
nombrePelicula VARCHAR(40) NOT NULL,
fechaVisualizacion DATETIME NOT NULL,
duracionVisualizacion TIME NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO
CREATE TABLE Pelicula
(
idPelicula INT NOT NULL,
idUsuario INT NOT NULL,
nombre VARCHAR(40) NOT NULL,
duracion TIME NOT NULL,
fechaLanzamiento DATE NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO
CREATE TABLE Suscripcion
(
idSuscripcion INT NOT NULL,
tipo VARCHAR(10) NOT NULL,
fechaInicial DATETIME NOT NULL,
fechaTerminal DATETIME NOT NULL,
metodoPago VARCHAR(40) NOT NULL,
precio VARCHAR(10) NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO
CREATE TABLE Usuario
(
idUsuario INT NOT NULL,
nombre VARCHAR (40) NOT NULL,
apellido VARCHAR(40) NOT NULL,
correo VARCHAR (40) NOT NULL,
contrasena VARCHAR(40) NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO
CREATE TABLE UsuarioEvento
(
idUsuarioEvento INT NOT NULL,
idUsuario INT NOT NULL,
idEvento INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO
CREATE TABLE UsuarioHistorialVisualizacion
(
idUsuarioHistorialVisualizacion INT NOT NULL,
idUsuario INT NOT NULL,
idHistorialVisualizacion INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO
CREATE TABLE UsuarioSuscripcion
(
idUsuarioSuscripcion INT NOT NULL,
idUsuario INT NOT NULL,
idSuscripcion INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
);
GO

ALTER TABLE Dispositivo ADD CONSTRAINT PK_Dispositivo PRIMARY KEY(idDispositivo)
ALTER TABLE Evento ADD CONSTRAINT PK_Evento PRIMARY KEY(idEvento)
ALTER TABLE HistorialVisualizacion ADD CONSTRAINT PK_HistorialVisualizacion PRIMARY KEY(idHistorialVisualizacion)
ALTER TABLE Pelicula ADD CONSTRAINT PK_Pelicula PRIMARY KEY(idPelicula)
ALTER TABLE Suscripcion ADD CONSTRAINT PK_Suscripcion PRIMARY KEY(idSuscripcion)
ALTER TABLE Usuario ADD CONSTRAINT PK_Usuario PRIMARY KEY(idUsuario)
ALTER TABLE UsuarioEvento ADD CONSTRAINT PK_UsuarioEvento PRIMARY KEY(idUsuarioEvento)
ALTER TABLE UsuarioHistorialVisualizacion ADD CONSTRAINT PK_UsuarioHistorialVisualizacion PRIMARY KEY(idUsuarioHistorialVisualizacion)
ALTER TABLE UsuarioSuscripcion ADD CONSTRAINT PK_UsuarioSuscripcion PRIMARY KEY (idUsuarioSuscripcion)

ALTER TABLE Dispositivo ADD CONSTRAINT FK_DispositivoUsuario FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario)
ALTER TABLE Pelicula ADD CONSTRAINT FK_PeliculaUsuario FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
ALTER TABLE UsuarioEvento ADD CONSTRAINT FK_UsuarioEventoUsuario FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario)
ALTER TABLE UsuarioEvento ADD CONSTRAINT FK_UsuarioEventoEvento FOREIGN KEY(idEvento) REFERENCES Evento(idEvento)
ALTER TABLE UsuarioHistorialVisualizacion ADD CONSTRAINT FK_UsuarioHistorialVisualizacionUsuario FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario)
ALTER TABLE UsuarioHistorialVisualizacion ADD CONSTRAINT FK_UsuarioHistorialVisualizacionHistorialVisualizacion FOREIGN KEY(idHistorialVisualizacion) REFERENCES HistorialVisualizacion(idHistorialVisualizacion)
ALTER TABLE UsuarioSuscripcion ADD CONSTRAINT FK_UsuarioSuscripcionUsuario FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario)
ALTER TABLE UsuarioSuscripcion ADD CONSTRAINT FK_UsuarioSuscripcionSuscripcion FOREIGN KEY(idSuscripcion) REFERENCES Suscripcion(idSuscripcion)
