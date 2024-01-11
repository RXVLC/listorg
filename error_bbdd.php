<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error en la conexión</title>
    <!-- Agregar referencia a los estilos de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <style>
        /* Estilos adicionales personalizados */
        body {
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: background-color 0.3s ease-in-out;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease-in-out;
        }

        .card-body {
            padding: 30px;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .form-control {
            border-color: #ccc;
            color: #333;
            background-color: #fff;
        }

        label {
            color: #333;
        }

        .card-title {
            color: #333;
        }

        .gif-container {
            text-align: center;
            margin-top: 20px;
        }

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

        .back-btn-container {
            text-align: center;
            margin-top: 20px;
        }

        /* Estilos para el Modo Oscuro */
        body.dark-mode {
            background-color: #1e272e;
        }

        .card.dark-mode {
            background-color: #2f3640;
        }

        .btn-primary.dark-mode {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary.dark-mode:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-danger.dark-mode {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger.dark-mode:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .form-control.dark-mode {
            border-color: #ccc;
            color: #fff;
            background-color: #34495e;
        }

        label.dark-mode {
            color: #fff;
        }

        .card-title.dark-mode {
            color: #fff;
        }
    </style>
</head>
<body class="dark-mode">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Error en la conexión a la base de datos</h2>
                    <p class="text-center card-title">Lo sentimos, no pudimos conectar con la base de datos en este momento. Por favor, inténtelo de nuevo más tarde.</p>
                    <div class="gif-container">
                        <img src="https://media.tenor.com/EUGsai_vzPUAAAAM/que-triste-gato.gif" alt="Gato Triste">
                    </div>
                    <div class="theme-btn-container text-center">
                        <a href="#" class="change-theme">Cambiar Tema</a>
                    </div>
                    <div class="back-btn-container">
                        <a href="/" class="btn btn-danger">Volver Atrás</a>
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
        const buttons = document.querySelectorAll('.btn-primary, .btn-danger');
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
