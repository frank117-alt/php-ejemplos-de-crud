<?php

include '../connect.php';


if (isset($_GET['id'])){
    
   try{
     
    $id = $_GET['id'];
    echo $id;
    $sql = "DELETE FROM ds_niveleducacion WHERE id = :id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute([':id'=>$id]);

    echo "eliminacion completa";
    echo "   <a href='panel-educacion.php'>volver</a>";
   }


catch (PDOException $e) {
    echo "Error al eliminar: " . $e->getMessage();
   
}
}