<?php

include('../connect.php');

$sql = "SELECT * From ds_niveleducacion";

$pedido = $pdo->query($sql);
$departamento = $pedido->fetchAll();

echo "<h1>Lista de departamentos</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>tipo</th><th>acciones</th></tr>";
foreach ($departamento as $departamentos) {
    echo "<tr>
            <td>{$departamentos['id']}</td>
            <td>{$departamentos['descripcion']}</td>
            <td>
                <a href='update.php?id={$departamentos['id']}'>Actualizar</a>
                <a href='delete.php?id={$departamentos['id']}'>Eliminar</a>
                <a href='crear.php?id={$departamentos['id']}'>crear</a>
            </td>
          </tr>";
}

echo "</table>";
echo "<a href='../index.php'> menu</a>";
