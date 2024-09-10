<?php
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $departamento=$_POST['departamento'];
    $ciudad=$_POST['ciudad']; 


    $sql = "UPDATE ds_departamento SET nombre_departamento=:departamento ,ciudad_departamento=:ciudad WHERE id=:id";
   $pedido = $pdo->prepare($sql);
   $pedido->execute([
     ':id' =>$id,
     ':departamento'=>$departamento,
     ':ciudad'=>$ciudad,
   ]);
  echo "exito";
  echo '    <a href="panel-departamento.php">volver</a>';


}
else{
    $id = $_GET['id'];
    $sql = "SELECT * FROM ds_departamento WHERE id = :id";
    $pedido = $pdo->prepare($sql);
    $pedido->execute([':id' => $id]);
    $departamento = $pedido->fetch();

    echo $departamento['1'];

}

?>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $departamento['id']; ?>">
    <label>ciudad: <input type="text" name="ciudad" value="<?php echo $departamento['ciudad_departamento']; ?>" required></label><br>
    <label>departamento: <input type="text" name="departamento" value="<?php echo $departamento['nombre_departamento']; ?>" required></label><br>
    <input type="submit" value="Actualizar ">

    <a href="panel-empleado.php">volver</a>
</form>
