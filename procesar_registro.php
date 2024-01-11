<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si se han enviado datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y sanitizarlos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena']; // Recuerda siempre hacer hashing a la contraseña antes de almacenarla en la base de datos

    // Hash de la contraseña (ejemplo básico, usa algoritmos seguros en producción)
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para insertar los datos en la tabla 'usuarios'
    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
    
    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("sss", $nombre, $email, $contrasena_hash);

    // Ejecutar la sentencia preparada
    if ($stmt->execute()) {
        // Registro exitoso
        header("Location: index.php?registro=exitoso");
    } else {
        // Si hay un error al ejecutar la consulta
        header("Location: index.php?registro=error");
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
}
?>
