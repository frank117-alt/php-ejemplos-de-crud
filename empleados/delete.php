<?php

include '../connect.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = "DELETE FROM ds_empleado WHERE id = :id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute([':id'=>$id]);

    echo "eliminacion completa";
    echo "   <a href='panel-empleado.php'>volver</a>";
}