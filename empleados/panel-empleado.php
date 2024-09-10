<?php
include '../connect.php';


$sql = "SELECT e.id, e.nombre, e.apellido, d.nombre_departamento, e.salario, n.descripcion AS nivel_educacion
        FROM ds_empleado e
        JOIN ds_departamento d ON e.id_departamento = d.id
        JOIN ds_niveleducacion n ON e.id_niveleducacion = n.id";
$stmt = $pdo->query($sql);
$empleados = $stmt->fetchAll();


echo "<h1>Lista de Empleados</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>ID Departamento</th><th>Salario</th><th>ID Nivel Educación</th><th>Acciones</th></tr>";

foreach ($empleados as $empleado) {
    echo "<tr>
            <td>{$empleado['id']}</td>
            <td>{$empleado['nombre']}</td>
            <td>{$empleado['apellido']}</td>
            <td>{$empleado['nombre_departamento']}</td>
            <td>{$empleado['salario']}</td>
            <td>{$empleado['nivel_educacion']}</td>
            <td>
                <a href='update.php?id={$empleado['id']}'>Actualizar</a>
                <a href='delete.php?id={$empleado['id']}'>Eliminar</a>
                <a href='crear.php?id={$empleado['id']}'>crear</a>
            </td>
          </tr>";
}

echo "</table>";

echo "<a href='../index.php'> menu</a>";
