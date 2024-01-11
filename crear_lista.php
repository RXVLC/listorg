<?php
include 'conexion.php';

$nombre_lista = $_POST['nombre_lista'];
$pin = $_POST['pin'];

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Buscar la lista en la base de datos
    $buscar_lista = "SELECT pin FROM listas WHERE nombre_lista = '$nombre_lista'";
    $resultado = $conexion->query($buscar_lista);

    if ($resultado->num_rows > 0) {
        // La lista existe, obtener el PIN almacenado
        $fila = $resultado->fetch_assoc();
        $pin_almacenado = $fila['pin'];

        // Verificar si el PIN ingresado coincide con el almacenado
        if ($pin === $pin_almacenado) {
            // Acceso permitido
            // Redirigir a la página de visualización de participantes
            header("Location: ver_participantes.php?nombre_lista=$nombre_lista");
            exit(); // Asegurarse de que el script se detenga después de la redirección
        } else {
            $error_message = "Error: PIN incorrecto";
        $url_parameters = "?error=" . urlencode($error_message) . "&nombre_lista=" . urlencode($nombre_lista);
        header("Location: ./" . $url_parameters);
        exit();
        }
    } else {
        // La lista no existe, crearla con el PIN proporcionado y la tabla correspondiente
        $crear_lista = "INSERT INTO listas (nombre_lista, pin) VALUES ('$nombre_lista', '$pin')";
        $crear_tabla = "CREATE TABLE part_$nombre_lista (nombre VARCHAR(50))"; // Cambiar la estructura si necesitas más campos

        if ($conexion->query($crear_lista) === TRUE) {
            // Lista creada exitosamente
            echo "Lista '$nombre_lista' creada exitosamente";
            // Crear la tabla para esta lista
            if ($conexion->query($crear_tabla) === TRUE) {
                header("Location: ver_participantes.php?nombre_lista=$nombre_lista");
                exit();
                // Aquí podrías redirigir a la página que desees
            } else {
                // Error al crear la tabla
                echo "Error al crear la tabla: " . $conexion->error;
            }
        } else {
            // Error al crear la lista
            echo "Error al crear la lista: " . $conexion->error;
        }
    }
}
?>
