<?php

include '../connect.php';

if (isset($_GET['id'])){
    
    
    $id = $_GET['id'];
    echo $id;
    $sql = "DELETE FROM ds_departamento WHERE id = :id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute([':id'=>$id]);

    echo "eliminacion completa";
    echo "   <a href='panel-departamento.php'>volver</a>";
}