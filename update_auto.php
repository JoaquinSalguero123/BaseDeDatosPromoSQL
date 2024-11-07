<?php
include 'db_connection.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $precio = $_POST['precio'];
    $disponibilidad = isset($_POST['disponibilidad']) ? 1 : 0;

    $sql = "UPDATE autos SET precio = $precio, disponibilidad = $disponibilidad WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Auto actualizado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form action="update_auto.php" method="POST">
    ID del Auto: <input type="number" name="id" required><br>
    Nuevo Precio: <input type="number" step="0.01" name="precio" required><br>
    Disponible: <input type="checkbox" name="disponibilidad"><br>
    <input type="submit" name="submit" value="Actualizar Auto">
    <li><a href="index.php">Volver a Inicio</a></li>
</form>
