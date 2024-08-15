--TODO: Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS gestion_proyectos;

--TODO: Usar la base de datos gestion_proyectos
USE gestion_proyectos;

--TODO: Crear la tabla Proyectos con las columnas necesarias
CREATE TABLE IF NOT EXISTS Proyectos (
    proyecto_id INT AUTO_INCREMENT PRIMARY KEY, --TODO: Columna para el ID del proyecto, clave primaria con autoincremento
    nombre VARCHAR(100) NOT NULL, --TODO: Columna para el nombre del proyecto, no nulo
    descripcion TEXT NOT NULL, --TODO: Columna para la descripción del proyecto, no nulo
    fecha_inicio DATE NOT NULL, --TODO: Columna para la fecha de inicio del proyecto, no nulo
    fecha_fin DATE --TODO: Columna para la fecha de finalización del proyecto, puede ser nulo
);

--TODO: Crear la tabla Empleados con las columnas necesarias
CREATE TABLE IF NOT EXISTS Empleados (
    empleado_id INT AUTO_INCREMENT PRIMARY KEY, --TODO: Columna para el ID del empleado, clave primaria con autoincremento
    nombre VARCHAR(100) NOT NULL, --TODO: Columna para el nombre del empleado, no nulo
    apellido VARCHAR(100) NOT NULL, --TODO: Columna para el apellido del empleado, no nulo
    email VARCHAR(100) NOT NULL, --TODO: Columna para el email del empleado, no nulo y único
    posicion VARCHAR(50) NOT NULL --TODO: Columna para la posición o cargo del empleado, no nulo
);

--TODO: Crear la tabla Asignaciones para manejar la relación entre Proyectos y Empleados
CREATE TABLE IF NOT EXISTS Asignaciones (
    asignacion_id INT AUTO_INCREMENT PRIMARY KEY, --TODO: Columna para el ID de la asignación, clave primaria con autoincremento
    proyecto_id INT NOT NULL, --TODO: Columna para el ID del proyecto, clave foránea no nula
    empleado_id INT NOT NULL, --TODO: Columna para el ID del empleado, clave foránea no nula
    FOREIGN KEY (proyecto_id) REFERENCES Proyectos(proyecto_id) ON DELETE CASCADE, --TODO: Clave foránea que refiere al ID del proyecto, con borrado en cascada
    FOREIGN KEY (empleado_id) REFERENCES Empleados(empleado_id) ON DELETE CASCADE --TODO: Clave foránea que refiere al ID del empleado, con borrado en cascada
);

--TODO: Insertar datos de ejemplo en la tabla Proyectos
INSERT INTO Proyectos (nombre, descripcion, fecha_inicio, fecha_fin) VALUES
('Proyecto Alpha', 'Descripción del Proyecto Alpha', '2024-01-01', '2024-06-30'), --TODO: Insertar el Proyecto Alpha con fechas de inicio y fin
('Proyecto Beta', 'Descripción del Proyecto Beta', '2024-03-15', '2024-09-15'); --TODO: Insertar el Proyecto Beta con fechas de inicio y fin

--TODO: Insertar datos de ejemplo en la tabla Empleados
INSERT INTO Empleados (nombre, apellido, email, posicion) VALUES
('Juan', 'Perez', 'juan.perez@example.com', 'Desarrollador'), --TODO: Insertar al empleado Juan Pérez, desarrollador
('Maria', 'Gomez', 'maria.gomez@example.com', 'Diseñadora'); --TODO: Insertar a la empleada María Gómez, diseñadora

--TODO: Insertar datos de ejemplo en la tabla Asignaciones para relacionar proyectos y empleados
INSERT INTO Asignaciones (proyecto_id, empleado_id) VALUES
(1, 1), --TODO: Asignar al empleado Juan Pérez al Proyecto Alpha
(2, 2); --TODO: Asignar a la empleada María Gómez al Proyecto Beta
