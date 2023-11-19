<?php
// Conectar a la base de datos
$conexion = new mysqli("127.0.0.1", "root", "", "jonijo", 3307);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombreUsuario = $_POST['nombreUsuario'];
    $correoElectronico = $_POST['correoElectronico'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para insertar datos en la tabla Usuarios
    $sql = "INSERT INTO Usuarios (NombreUsuario, CorreoElectronico, Contraseña) VALUES ('$nombreUsuario', '$correoElectronico', '$contrasena')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso. ¡Gracias por registrarte!";
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
