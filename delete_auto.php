<?php
include 'db_connection.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM autos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Auto eliminado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form action="delete_auto.php" method="POST">
    ID del Auto: <input type="number" name="id" required><br>
    <input type="submit" name="submit" value="Eliminar Auto">
    <li><a href="index.php">Volver a Inicio</a></li>
</form>
