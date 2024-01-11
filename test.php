<!DOCTYPE html>
<html>
<head>
    <title>Test de Conexión a la Base de Datos</title>
</head>
<body>
    <h1>Test de Conexión a la Base de Datos</h1>

    <?php
    $servidor = "nombre_del_servidor"; // Reemplaza con la dirección del servidor de MySQL
    $usuario = "tu_usuario_de_base_de_datos";
    $contrasena = "tu_contraseña_de_base_de_datos";
    $base_datos = "nombre_de_tu_base_de_datos";

    // Intenta establecer la conexión
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        echo "<p>Error al conectar a la base de datos: " . $conexion->connect_error . "</p>";
    } else {
        echo "<p>¡Conexión exitosa a la base de datos!</p>";
    }

    // Cerrar la conexión
    $conexion->close();
    ?>

</body>
</html>
