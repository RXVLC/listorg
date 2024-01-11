<?php
$servidor = "localhost"; // Cambia esto si tu servidor de MySQL está en otro lugar
$usuario = "root";
$contrasena = "";
$base_datos = "listorg"; // Nombre de tu base de datos

try {
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);
    
    // Resto del código aquí

} catch (mysqli_sql_exception $e) {
    // Manejar el error de manera más controlada y redirigir al usuario a la página de error
    header("Location: error_bbdd.php");
    exit();
}
?>
