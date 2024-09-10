<?php
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nivel=$_POST['nivel'];


    $sql = "UPDATE ds_niveleducacion SET descripcion=:nivel WHERE id=:id";
   $pedido = $pdo->prepare($sql);
   $pedido->execute([
     ':id' =>$id,
     ':nivel'=>$nivel,
   ]);
  echo "exito";
  echo '    <a href="panel-educacion.php">volver</a>';


}
else{
    $id = $_GET['id'];
    $sql = "SELECT * FROM ds_niveleducacion WHERE id = :id";
    $pedido = $pdo->prepare($sql);
    $pedido->execute([':id' => $id]);
    $ni = $pedido->fetch();


}

?>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $ni['id']; ?>">
    <label>nivel: <input type="text" name="nivel" value="<?php echo $ni['descripcion']; ?>" required></label><br>
    <input type="submit" value="Actualizar ">

    <a href="panel-empleado.php">volver</a>
</form>
