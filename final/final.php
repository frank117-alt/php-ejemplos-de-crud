<?php

include('../connect.php');


$sql = "SELECT e.apellido, n.descripcion AS nivel_educacion
FROM ds_empleado e
JOIN ds_niveleducacion n ON e.id_niveleducacion = n.id
JOIN ds_departamento d ON e.id_departamento = d.id
GROUP BY e.apellido, n.descripcion, d.id
HAVING SUM(e.salario) > 250000
ORDER BY e.apellido;
";


$pedido = $pdo->query($sql);
$resultado = $pedido->fetchAll(PDO::FETCH_ASSOC);

echo "<table border='1'>";
echo "<tr><th>Apellido</th><th>Nivel educativo </th></tr>";

foreach ($resultado as $fila) {
    echo "<tr>
            <td>{$fila['apellido']}</td>
            <td>{$fila['nivel_educacion']}</td>
          </tr>";
}

echo "</table>";

echo "<a href='../index.php'> menu</a>";

?>