<?php
// Conectar a la base de datos
$conexion = new mysqli("127.0.0.1", "root", "", "jonijo", 3307);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Consulta SQL para obtener productos
$query = "SELECT * FROM Productos";
$result = $conexion->query($query);

while ($row = $result->fetch_assoc()) {
    echo '<div class="producto">';
    echo '<h2>' . $row['Nombre'] . '</h2>';
    echo '<p>Precio: ' . $row['Precio'] . '</p>';
    echo '<p>Descripción: ' . $row['Descripcion'] . '</p>';
    echo '</div>';
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];

// Consulta SQL para agregar un producto
$insertQuery = "INSERT INTO Productos (Nombre, Precio, Descripcion) VALUES ('$nombre', '$precio', '$descripcion')";

// Ejecutar la consulta y verificar si fue exitosa
if ($conexion->query($insertQuery) === TRUE) {
    echo "Producto agregado exitosamente.";
} else {
    echo "Error al agregar el producto: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
