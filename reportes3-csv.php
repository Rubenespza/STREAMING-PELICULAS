<?php
require('cn.php');
require('vendor/autoload.php');
 
$consulta="SELECT * FROM reporte WHERE fechaVisualizacion BETWEEN '2024-01-01' AND '2024-03-31'";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Reporte3.csv"');

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