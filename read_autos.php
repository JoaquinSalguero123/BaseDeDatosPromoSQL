<?php
include 'db_connection.php';

$marca = isset($_GET['marca']) ? $_GET['marca'] : '';
$disponibilidad = isset($_GET['disponibilidad']) ? $_GET['disponibilidad'] : '';

$sql = "SELECT * FROM autos";
$conditions = [];
if ($marca) {
    $conditions[] = "marca = '$marca'";
}
if ($disponibilidad !== '') {
    $conditions[] = "disponibilidad = $disponibilidad";
}
if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(' AND ', $conditions);
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Año</th><th>Precio</th><th>Disponibilidad</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["marca"]. "</td><td>" . $row["modelo"]. "</td><td>" . $row["anio"]. "</td><td>" . $row["precio"]. "</td><td>" . ($row["disponibilidad"] ? 'Disponible' : 'No Disponible') . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron autos.";
}
?>

<form action="read_autos.php" method="GET">
    Filtrar por Marca: <input type="text" name="marca"><br>
    Disponibilidad:
    <select name="disponibilidad">
        <option value="">Cualquiera</option>
        <option value="1">Disponible</option>
        <option value="0">No Disponible</option>
    </select><br>
    <input type="submit" value="Filtrar">
    <li><a href="index.php">Volver a Inicio</a></li>
</form>
