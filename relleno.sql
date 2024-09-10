
INSERT INTO ds_departamento(nombre_departamento,ciudad_departamento) VALUES( 'Amazonas','Leticia' );
INSERT INTO ds_departamento(nombre_departamento,ciudad_departamento) VALUES( 'antioquia','medellin' );
INSERT INTO ds_departamento(nombre_departamento,ciudad_departamento) VALUES( 'arauca','arauca' );
INSERT INTO ds_departamento(nombre_departamento,ciudad_departamento) VALUES( 'Atlantico','Barranquilla');


INSERT INTO ds_niveleducacion(descripcion) VALUES ( 'BACHILLER');
INSERT INTO ds_niveleducacion(descripcion) VALUES ( 'PROFESIONAL');
INSERT INTO ds_niveleducacion(descripcion) VALUES ( 'LICENCIADO');



INSERT INTO ds_empleado(nombre,apellido,id_departamento,salario,id_niveleducacion) VALUES ('Juan', 'Pérez', 1, 50000, 2),
('Ana', 'García', 1, 60000, 3),
('Luis', 'Martínez', 2, 55000, 1),
('Marta', 'Rodríguez', 2, 70000, 2),
('Pedro', 'Fernández', 2, 75000, 3),
('Laura', 'López', 1, 65000, 1),
('Carlos', 'Gómez', 1, 72000, 2),
('Elena', 'Vásquez', 2, 68000, 3),
('Sofía', 'Morales', 2, 72000, 1),
('Jorge', 'Muñoz', 2, 69000, 2);