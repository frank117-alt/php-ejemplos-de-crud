<?php
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ciudad = $_POST['ciudad'];
    $departamento = $_POST['departamento'];


    $sql = "INSERT INTO ds_departamento (nombre_departamento, ciudad_departamento) 
    VALUES (:departamento, :ciudad)";
    $pedido = $pdo->prepare($sql);
    $pedido->execute([
    ':ciudad' => $ciudad,
    ':departamento' => $departamento,
    ]);

    echo " creado.";
    echo "  <a href='panel-departamento.php'>crear</a>";


}
?>

<form method="POST" action="crear.php">
    <label>ciudad: <input type="text" name="ciudad" required></label><br>
    <label> Departamento: <input type="text" name="departamento" required></label><br>
    <input type="submit" value="Crear departamento">
</form>
