<!DOCTYPE html>
<html>
<head>
    <title>Ver Lista de Participantes</title>
    <!-- Agregar referencia a los estilos de Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <style>
        body {
            padding-top: 3rem;
        }
        #avisoModal {
            padding: 1.5rem;
        }
        #conteo-participantes {
            margin-top: 1rem;
            font-weight: bold;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-title {
            font-weight: bold;
        }
        #participantes-table th, #participantes-table td {
            vertical-align: middle;
        }
        .table thead th {
            border-top: none;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
            color: #495057;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Lista de Participantes</h2>
            <div class="text-center mb-4">
            <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#inscribirseModal">
                    Inscribirse
                </button>
            <button type="button" class="btn btn-primary btn-order d-inline-block mr-2" onclick="toggleOrden()">
                    Orden <span id="ordenText">Ascendente</span> <i id="arrowIcon" class="fas fa-arrow-down ml-2"></i>
                </button>
                        <a href="/" class="btn btn-danger">Volver Atrás</a>
            </div>
            <table id="participantes-table" class="table table-striped">
                <!-- Encabezados de la tabla -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'conexion.php';

                    // Mostrar los participantes en la tabla
                    if(isset($_GET['nombre_lista'])) {
                        $nombre_lista = $_GET['nombre_lista'];

                        $consulta = "SELECT * FROM part_$nombre_lista"; // Reemplaza 'nombre_tabla' por tu tabla
                        $resultado = $conexion->query($consulta);

                        if ($resultado->num_rows > 0) {
                            $contador = 1;
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $contador . "</td>";
                                echo "<td>" . $fila['nombre'] . "</td>"; // Reemplaza 'nombre_columna' por el nombre de la columna que contiene los nombres
                                echo "</tr>";
                                $contador++;
                            }
                        } else {
                            echo "<tr><td colspan='2'>No hay participantes en esta lista.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se proporcionó el nombre de la lista.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    let ordenAscendente = true; // Variable para controlar el estado de orden

    function toggleOrden() {
        const textoOrden = document.getElementById('ordenText');
        const iconoOrden = document.getElementById('arrowIcon');

        if (ordenAscendente) {
            textoOrden.textContent = 'Descendente';
            iconoOrden.classList.remove('fa-arrow-down');
            iconoOrden.classList.add('fa-arrow-up');
        } else {
            textoOrden.textContent = 'Ascendente';
            iconoOrden.classList.remove('fa-arrow-up');
            iconoOrden.classList.add('fa-arrow-down');
        }

        // Cambia el estado de orden
        ordenAscendente = !ordenAscendente;

        // Llamar aquí a la función de ordenación según sea ascendente o descendente
        // por ejemplo, ordenar('asc') o ordenar('desc')
        ordenar(ordenAscendente ? 'asc' : 'desc');
    }

    function ordenar(order) {
        // Tu código de ordenación aquí
        var table = document.getElementById("participantes-table");
        var rows = Array.from(table.querySelectorAll("tbody tr"));

        rows.sort(function(a, b) {
            var numA = parseInt(a.cells[0].innerText);
            var numB = parseInt(b.cells[0].innerText);

            if (order === 'asc') {
                return numA - numB;
            } else if (order === 'desc') {
                return numB - numA;
            }
            return 0;
        });

        while (table.querySelector("tbody tr")) {
            table.querySelector("tbody").removeChild(table.querySelector("tbody tr"));
        }

        rows.forEach(function(row) {
            table.querySelector("tbody").appendChild(row);
        });
    }
</script>
<!-- Modal para inscribirse en la lista -->
<div class="modal fade" id="inscribirseModal" tabindex="-1" role="dialog" aria-labelledby="inscribirseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inscribirseModalLabel">Inscribirse en la Lista</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="ver_participantes.php" method="post">
                    <input type="hidden" name="nombre_lista" value="<?php echo isset($_GET['nombre_lista']) ? $_GET['nombre_lista'] : ''; ?>">
                    <div class="form-group">
                        <label for="nombreParticipante">Nombre:</label>
                        <input type="text" class="form-control" id="nombreParticipante" name="nombreParticipante" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Inscribirse</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Agregar los scripts de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Función para mostrar la tabla de participantes y el contador
    function mostrarParticipantes() {
        $('#participantes-table').show();
    }
</script>
</body>
</html>



<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['nombre_lista']) && isset($_POST['nombreParticipante'])) {
        $nombre_lista = $_POST['nombre_lista'];
        $nombreParticipante = $_POST['nombreParticipante'];

        $consulta = "INSERT INTO part_$nombre_lista (nombre) VALUES ('$nombreParticipante')";
        if ($conexion->query($consulta) === TRUE) {
            echo "<script>window.location='ver_participantes.php?nombre_lista=$nombre_lista';</script>";

        } else {
            echo "Error al inscribirse en la lista: " . $conexion->error;
        }
    } else {
        echo "No se recibieron todos los datos necesarios.";
    }
}
?>


<?php
// Verificar si se ha enviado la variable nombre_lista en la URL
if(isset($_GET['nombre_lista'])) {
    // Obtener el valor de nombre_lista
    $nombre_lista = $_GET['nombre_lista'];
} else {
    echo "La variable nombre_lista no está definida en la URL.";
}
?>
