<?php
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_departamento = $_POST['id_departamento'];
    $salario = $_POST['salario'];
    $id_niveleducacion = $_POST['id_niveleducacion'];

    $sql = "UPDATE ds_empleado SET nombre = :nombre, apellido = :apellido, id_departamento = :id_departamento, 
            salario = :salario, id_niveleducacion = :id_niveleducacion WHERE id = :id";
    $pedido = $pdo->prepare($sql);
    $pedido->execute([
        ':id' => $id,
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':id_departamento' => $id_departamento,
        ':salario' => $salario,
        ':id_niveleducacion' => $id_niveleducacion
    ]);

    echo "Empleado actualizado .";
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM ds_empleado WHERE id = :id";
    $pedido = $pdo->prepare($sql);
    $pedido->execute([':id' => $id]);
    $empleado = $pedido->fetch();
}
?>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">
    <label>Nombre: <input type="text" name="nombre" value="<?php echo $empleado['nombre']; ?>" required></label><br>
    <label>Apellido: <input type="text" name="apellido" value="<?php echo $empleado['apellido']; ?>" required></label><br>
    
    <label> Departamento:
         <select  name="id_departamento" value="" required>selecionar

    <?php
            $sql = "SELECT id,nombre_departamento FROM ds_departamento";
            $stmt = $pdo->query($sql);
            $departamento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($departamento as $departamentos) {
                echo "<option value='" . $departamentos['id'] . "'>" . $departamentos['nombre_departamento'] . "</option>";
            }
            ?>
            </select>

    </label><br>
    <label> Nivel Educación:
         <select  name="id_niveleducacion" required>
            <option value="">selecionar</option>

            <?php
            $sql = "SELECT id, descripcion FROM ds_niveleducacion";
            $stmt = $pdo->query($sql);
            $nivelesEducacion = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($nivelesEducacion as $nivel) {
                echo "<option value='" . $nivel['id'] . "'>" . $nivel['descripcion'] . "</option>";
            }
            ?>
            </select>
</label><br>

    <label>Salario: <input type="number" name="salario" value="<?php echo $empleado['salario']; ?>" required></label><br>
    
   

    <input type="submit" value="actualizar">

</form>

<a href="panel-empleado.php">volver</a>
