<?php
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_departamento = $_POST['id_departamento'];
    $salario = $_POST['salario'];
    $id_niveleducacion = $_POST['id_niveleducacion'];
    

    $sql = "INSERT INTO ds_empleado (nombre, apellido, id_departamento, salario, id_niveleducacion) 
            VALUES (:nombre, :apellido, :id_departamento, :salario, :id_niveleducacion)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':id_departamento' => $id_departamento,
        ':salario' => $salario,
        ':id_niveleducacion' => $id_niveleducacion
    ]);

    echo "Empleado creado.";
    echo "  <a href='panel-empleado.php'>crear</a>";


}
?>

<form method="POST" action="crear.php">
    <label>Nombre: <input type="text" name="nombre" required></label><br>
    <label>Apellido: <input type="text" name="apellido" required></label><br>
    <label> Departamento: 
        
    <select name="id_departamento" required>
        <option value=''>selecionar</option>
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
<br>
    <label>Salario: <input type="number" name="salario" required></label><br>
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
    <input type="submit" value="Crear Empleado">
</form>
