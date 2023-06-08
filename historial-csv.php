<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo'
    <script>
    alert("Por favor debe iniciar sesion");
    window.location = "index.php";
    </script>
    ';
    session_destroy();
    die();   
}
else {
    $user = $_SESSION['usuario'];
}
require('cn.php');
require('vendor/autoload.php');
 
$consulta="SELECT
h.nombrePelicula,
h.fechaVisualizacion,
h.duracionVisualizacion 
FROM
usuariohistorialvisualizacion v
JOIN usuario u ON
v.idUsuario = u.idUsuario
JOIN historialvisualizacion h ON
v.idHistorialVisualizacion = h.idHistorialVisualizacion
WHERE
v.estatus = 1 AND u.correo = '".$user."'";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Historial.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'Fecha de Visualizacion', 'Duracion de Visualizacion'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombrePelicula'],
        $rows['fechaVisualizacion'],
        $rows['duracionVisualizacion']
    ));
}

fclose($output);
exit;

    ?>