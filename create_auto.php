<?php
include 'db_connection.php';

if (isset($_POST['submit'])) {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $precio = $_POST['precio'];
    $disponibilidad = isset($_POST['disponibilidad']) ? 1 : 0;

    $sql = "INSERT INTO autos (marca, modelo, anio, precio, disponibilidad)
            VALUES ('$marca', '$modelo', $anio, $precio, $disponibilidad)";

    if ($conn->query($sql) === TRUE) {
        echo "Auto agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form action="create_auto.php" method="POST">
    Marca: <input type="text" name="marca" required><br>
    Modelo: <input type="text" name="modelo" required><br>
    Año: <input type="number" name="anio" required><br>
    Precio: <input type="number" step="0.01" name="precio" required><br>
    Disponible: <input type="checkbox" name="disponibilidad"><br>
    <input type="submit" name="submit" value="Agregar Auto">
    <li><a href="index.php">Volver a Inicio</a></li>
</form>
