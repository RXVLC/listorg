<?php
session_start();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio o cualquier otra página después de cerrar sesión
header("Location: ./"); // Puedes cambiar esto según tus necesidades
exit();
?>