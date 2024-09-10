<?php
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $educacion = $_POST['educacion'];


    $sql = "INSERT INTO ds_niveleducacion (descripcion) 
    VALUES (:educacion)";
    $pedido = $pdo->prepare($sql);
    $pedido->execute([
    ':educacion' => $educacion,
    ]);

    echo " creado.";
    echo "  <a href='panel-educacion.php'>crear</a>";


}
?>

<h1>educacion</h1>
<form method="POST" action="crear.php">
    <label> nivel educativo: <input type="text" name="educacion" required></label><br>
    <input type="submit" value="educacion">
</form>
