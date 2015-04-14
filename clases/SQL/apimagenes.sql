CREATE TABLE carpetas(
    id integer PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    ruta varchar(100) NOT NULL,
    id_user integer NOT NULL,
    foreign key (id_user)
    REFERENCES usuarios(id)
    ON UPDATE CASCADE ON DELETE RESTRICT
    )

CREATE TABLE imagenes(
    id integer PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    id_carpeta integer NOT NULL,
    FOREIGN KEY(id_carpeta)
    REFERENCES carpetas(id)
    ON UPDATE CASCADE ON DELETE RESTRICT
    )