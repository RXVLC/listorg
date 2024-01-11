<!DOCTYPE html>
<html>
<head>
    <title>Crear Lista</title>
    <!-- Agregar referencia a los estilos de Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <style>
        /* Estilos adicionales personalizados */
        body {
            background-color: #f0f0f0; /* Modo claro: Cambiar el color de fondo del cuerpo */
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: background-color 0.3s ease-in-out; /* Agregar transición para cambio de color de fondo */
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #fff; /* Modo claro: Cambiar el color de fondo del formulario */
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1); /* Agregar sombra al formulario */
            transition: background-color 0.3s ease-in-out; /* Agregar transición para cambio de color de fondo */
        }

        .card-body {
            padding: 30px;
        }

        .btn-primary {
            background-color: #3498db; /* Modo claro: Cambiar el color de fondo del botón */
            border-color: #3498db; /* Modo claro: Cambiar el color del borde del botón */
            transition: background-color 0.3s ease-in-out; /* Agregar transición para cambio de color de fondo */
        }

        .btn-primary:hover {
            background-color: #2980b9; /* Modo claro: Cambiar el color de fondo del botón al pasar el mouse */
            border-color: #2980b9; /* Modo claro: Cambiar el color del borde del botón al pasar el mouse */
        }

        .form-control {
            border-color: #ccc; /* Modo claro: Cambiar el color del borde de los campos de entrada */
            color: #333; /* Modo claro: Cambiar el color del texto dentro de los campos de entrada */
            background-color: #fff; /* Modo claro: Cambiar el color de fondo de los campos de entrada */
        }

        label {
            color: #333; /* Modo claro: Cambiar el color de las etiquetas */
        }

        .card-title {
            color: #333; /* Modo claro: Cambiar el color del título */
        }

        /* Estilos para el Modo Oscuro */
        body.dark-mode {
            background-color: #1e272e; /* Modo oscuro: Cambiar el color de fondo del cuerpo */
        }

        .card.dark-mode {
            background-color: #2f3640; /* Modo oscuro: Cambiar el color de fondo del formulario */
        }

        .btn-primary.dark-mode {
            background-color: #3498db; /* Modo oscuro: Cambiar el color de fondo del botón */
            border-color: #3498db; /* Modo oscuro: Cambiar el color del borde del botón */
        }

        .btn-primary.dark-mode:hover {
            background-color: #2980b9; /* Modo oscuro: Cambiar el color de fondo del botón al pasar el mouse */
            border-color: #2980b9; /* Modo oscuro: Cambiar el color del borde del botón al pasar el mouse */
        }

        .form-control.dark-mode {
            border-color: #ccc; /* Modo oscuro: Cambiar el color del borde de los campos de entrada */
            color: #fff; /* Modo oscuro: Cambiar el color del texto dentro de los campos de entrada */
            background-color: #34495e; /* Modo oscuro: Cambiar el color de fondo de los campos de entrada */
        }

        label.dark-mode {
            color: #fff; /* Modo oscuro: Cambiar el color de las etiquetas */
        }

        .card-title.dark-mode {
            color: #fff; /* Modo oscuro: Cambiar el color del título */
        }

        /* Estilos para centrar el botón "Cambiar Tema" */
        .theme-btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .change-theme {
            color: #3498db;
            transition: color 0.3s ease-in-out;
        }

        .change-theme:hover {
            color: #2980b9;
        }
    </style>
</head>
<body class="dark-mode">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Crear Nueva Lista/Lista Existente</h2>
                    <form action="crear_lista.php" method="post">
                        <div class="form-group">
                            <label for="nombre_lista">Nombre de la Lista:</label>
                            <input type="text" class="form-control" id="nombre_lista" name="nombre_lista" value="<?php echo isset($_GET['nombre_lista']) ? htmlspecialchars($_GET['nombre_lista']) : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="pin">PIN:</label>
                            <input type="password" class="form-control" id="pin" name="pin" required>
                        </div>
                        <?php
                            // Mostrar mensaje de error si existe en la URL
                            if (isset($_GET['error'])) {
                                echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
                            }
                            ?>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">Crear Lista/Ver Lista</button>
                        </div>
                    </form>
                    <div class="theme-btn-container">
                        <a href="#" class="change-theme">Cambiar Tema</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agregar los scripts de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.querySelector('.change-theme').addEventListener('click', function() {
        const body = document.querySelector('body');
        const cards = document.querySelectorAll('.card');
        const buttons = document.querySelectorAll('.btn-primary');
        const formControls = document.querySelectorAll('.form-control');
        const labels = document.querySelectorAll('label');
        const cardTitles = document.querySelectorAll('.card-title');

        body.classList.toggle('dark-mode');
        cards.forEach(card => card.classList.toggle('dark-mode'));
        buttons.forEach(button => button.classList.toggle('dark-mode'));
        formControls.forEach(control => control.classList.toggle('dark-mode'));
        labels.forEach(label => label.classList.toggle('dark-mode'));
        cardTitles.forEach(title => title.classList.toggle('dark-mode'));
    });
</script>
</body>
</html>
