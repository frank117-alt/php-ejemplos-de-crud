-- Estructura de tabla para la tabla ds_departamento
CREATE TABLE ds_departamento (
  id SERIAL PRIMARY KEY,
  nombre_departamento VARCHAR(200) NOT NULL,
  ciudad_departamento VARCHAR(200) NOT NULL
);


-- Estructura de tabla para la tabla ds_niveleducacion
CREATE TABLE ds_niveleducacion (
  id SERIAL PRIMARY KEY,
  descripcion VARCHAR(200) NOT NULL
);

-- Estructura de tabla para la tabla ds_empleado
CREATE TABLE ds_empleado (
  id SERIAL PRIMARY KEY,
  nombre VARCHAR(200) NOT NULL,
  apellido VARCHAR(200) NOT NULL,
  id_departamento INTEGER NOT NULL,
  salario NUMERIC(10, 0) NOT NULL,
  id_niveleducacion INTEGER NOT NULL,
  FOREIGN KEY (id_departamento) REFERENCES ds_departamento(id),
  FOREIGN KEY (id_niveleducacion) REFERENCES ds_niveleducacion(id)
);

