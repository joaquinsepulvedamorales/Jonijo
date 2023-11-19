<?php
// Conectar a la base de datos
$conexion = new mysqli("127.0.0.1", "root", "", "jonijo", 3307);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombreUsuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta SQL para verificar el usuario y la contraseña
$sql = "SELECT * FROM Usuarios WHERE NombreUsuario='$nombreUsuario' AND Contraseña='$contrasena'";
$resultado = $conexion->query($sql);

// Verificar si las credenciales son válidas
if ($resultado->num_rows > 0) {
    // Inicio de sesión exitoso
    header("Location: inicio.html"); // Redirigir a la página de inicio después del inicio de sesión exitoso
} else {
    // Inicio de sesión fallido
    header("Location: index.html"); // Redirigir de vuelta a la página de inicio de sesión (index.html en este caso)
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
